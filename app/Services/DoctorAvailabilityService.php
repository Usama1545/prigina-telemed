<?php

namespace App\Services;

use App\Exceptions\SlotUnavailableException;
use App\Models\Firestore\AppSetting;
use App\Models\Firestore\Doctor;
use App\Support\AppointmentTime;
use Carbon\Carbon;
use Google\Cloud\Firestore\Transaction;

/**
 * Doctor availability and slot booking. The rules live in
 * App\Support\AppointmentTime and are mirrored by the Flutter app.
 */
class DoctorAvailabilityService
{
    public function __construct(
        protected Doctor $doctors,
        protected AppSetting $appSetting,
        protected FirestoreService $firestore,
    ) {}

    /**
     * Open slots for the next $days days of the viewer's calendar, grouped by
     * the viewer's local date and labelled in the viewer's timezone.
     *
     * @param  string|null  $excludeAppointmentId  an appointment whose own slot shouldn't block (rescheduling)
     * @return array{doctor: array, availability: array, slotDuration: int, timezone: string}|null
     *                                              null if the doctor has no schedule configured
     */
    public function getAvailability(
        string $doctorId,
        ?string $excludeAppointmentId = null,
        ?string $viewerTimezone = null,
        int $days = 7,
    ): ?array {
        $doctor = $this->doctors->find($doctorId);
        if (! $doctor || empty($doctor['workingDays']) || count($doctor['workingHours'] ?? []) < 2) {
            return null;
        }

        $viewerTimezone = AppointmentTime::timezone($viewerTimezone);
        $slotMinutes = AppointmentTime::slotMinutes($doctor);

        $from = Carbon::now('UTC');
        $to = Carbon::now($viewerTimezone)->startOfDay()->addDays($days)->utc();

        $slots = $this->openSlots($doctorId, $doctor, $from, $to, $slotMinutes, $excludeAppointmentId);

        $grouped = [];
        foreach ($slots as $slot) {
            $local = $slot['start']->copy()->setTimezone($viewerTimezone);
            $date = $local->format('Y-m-d');

            $grouped[$date] ??= [
                'date' => $date,
                'day' => $local->format('l'),
                'slots' => [],
            ];
            $grouped[$date]['slots'][] = [
                'time' => $local->format('H:i'),
                'label' => AppointmentTime::clock($local),
                'utc' => $slot['start']->toIso8601ZuluString(),
            ];
        }

        return [
            'doctor' => $doctor,
            'availability' => array_values($grouped),
            'slotDuration' => $slotMinutes,
            'timezone' => $viewerTimezone,
        ];
    }

    /**
     * The open slot starting exactly at $startUtc, or null if there isn't one.
     *
     * @return array{start: Carbon, end: Carbon, doctor: array}|null
     */
    public function findOpenSlot(string $doctorId, Carbon $startUtc, ?string $excludeAppointmentId = null): ?array
    {
        $doctor = $this->doctors->find($doctorId);
        if (! $doctor) {
            return null;
        }

        $slotMinutes = AppointmentTime::slotMinutes($doctor);
        $slots = $this->openSlots(
            $doctorId,
            $doctor,
            $startUtc->copy()->subMinute(),
            $startUtc->copy()->addMinute(),
            $slotMinutes,
            $excludeAppointmentId,
        );

        foreach ($slots as $slot) {
            if ($slot['start']->equalTo($startUtc)) {
                return $slot + ['doctor' => $doctor];
            }
        }

        return null;
    }

    /**
     * Create or move an appointment onto a slot atomically. The slot lock
     * document makes a second booking of the same doctor + start instant fail
     * even when both requests passed the availability check at the same time.
     *
     * $holdExpiresAt is set for unpaid bookings: after it the lock counts as
     * free (the Flutter app can check it without reading the appointment).
     *
     * @throws SlotUnavailableException
     */
    public function reserve(string $appointmentId, string $doctorId, Carbon $startUtc, Carbon $endUtc, array $fields, bool $isNew, ?Carbon $holdExpiresAt = null): void
    {
        $this->firestore->transaction(function (Transaction $t, $db) use ($appointmentId, $doctorId, $startUtc, $endUtc, $fields, $isNew, $holdExpiresAt) {
            $appointments = $db->collection('appointments');
            $locks = $db->collection(AppointmentTime::SLOT_LOCKS);

            $appointmentRef = $appointments->document($appointmentId);
            $lockRef = $locks->document(AppointmentTime::slotLockId($doctorId, $startUtc));

            // Firestore transactions need every read before the first write.
            $lock = $t->snapshot($lockRef);

            $oldLockRef = null;
            if (! $isNew) {
                $current = $t->snapshot($appointmentRef);
                $oldStart = $current->exists() ? AppointmentTime::toUtc($current->data()['startTimeUTC'] ?? null) : null;
                if ($oldStart && ! $oldStart->equalTo($startUtc)) {
                    $candidate = $locks->document(AppointmentTime::slotLockId($doctorId, $oldStart));
                    $oldLock = $t->snapshot($candidate);
                    if ($oldLock->exists() && ($oldLock->data()['appointmentId'] ?? null) === $appointmentId) {
                        $oldLockRef = $candidate;
                    }
                }
            }

            if ($lock->exists()) {
                $holderId = $lock->data()['appointmentId'] ?? null;
                if ($holderId && $holderId !== $appointmentId) {
                    $holder = $t->snapshot($appointments->document($holderId));
                    // A lock whose appointment was cancelled, moved, or is an unpaid
                    // booking past its 30-minute hold is stale and can be taken over.
                    if ($holder->exists()
                        && AppointmentTime::holdsSlot($holder->data())
                        && AppointmentTime::startUtc($holder->data())?->equalTo($startUtc)) {
                        throw new SlotUnavailableException;
                    }
                }
            }

            $t->set($lockRef, [
                'appointmentId' => $appointmentId,
                'doctorId' => $doctorId,
                'startTimeUTC' => $startUtc,
                'endTimeUTC' => $endUtc,
                'holdExpiresAt' => $holdExpiresAt,
                'createdAt' => Carbon::now('UTC'),
            ]);

            if ($oldLockRef) {
                $t->delete($oldLockRef);
            }

            if ($isNew) {
                $t->create($appointmentRef, $fields);
            } else {
                $t->set($appointmentRef, $fields, ['merge' => true]);
            }
        });
    }

    /**
     * Move an appointment to the slot starting at $startUtc, keeping its
     * length, and rewrite every derived time field. Patient- and doctor-side
     * rescheduling both go through here.
     *
     * @return array the fields written
     *
     * @throws SlotUnavailableException
     */
    public function reschedule(string $appointmentId, array $appointment, Carbon $startUtc): array
    {
        $doctorId = $appointment['doctorId'] ?? '';
        $doctor = $this->doctors->find($doctorId);
        if (! $doctor) {
            throw new SlotUnavailableException;
        }

        $slotMinutes = AppointmentTime::slotMinutes($doctor);

        $oldStart = AppointmentTime::startUtc($appointment);
        $oldEnd = $oldStart ? AppointmentTime::endUtc($appointment, $slotMinutes) : null;
        $minutes = $oldStart && $oldEnd ? (int) $oldStart->diffInMinutes($oldEnd) : $slotMinutes;
        if ($minutes <= 0) {
            $minutes = $slotMinutes;
        }
        $endUtc = $startUtc->copy()->addMinutes($minutes);

        $this->ensureOpen($doctorId, $doctor, $startUtc, $endUtc, $slotMinutes, $appointmentId);

        $patient = $this->firestore->find('patients', $appointment['patientId'] ?? '') ?? [];

        $fields = [
            ...AppointmentTime::buildFields(
                $startUtc,
                $endUtc,
                $doctor['timezone'] ?? 'UTC',
                $patient['timezone'] ?? $appointment['patientTimezone'] ?? 'UTC',
            ),
            'previousStartTimeUTC' => $oldStart,
            'updatedAt' => Carbon::now('UTC'),
        ];

        $this->reserve($appointmentId, $doctorId, $startUtc, $endUtc, $fields, isNew: false,
            holdExpiresAt: AppointmentTime::unpaidHoldExpiresAt($appointment));

        return $fields;
    }

    /**
     * Before paying again for an unpaid booking: takes its slot back (it may
     * have been released after 30 minutes) and restarts the 30-minute hold.
     *
     * @throws SlotUnavailableException if the time has passed or someone else booked it
     */
    public function reclaim(string $appointmentId, array $appointment): void
    {
        // Appointments from before the UTC time model have no reliable instant to lock.
        if (! AppointmentTime::isCanonical($appointment)) {
            return;
        }

        $doctorId = $appointment['doctorId'] ?? '';
        $doctor = $this->doctors->find($doctorId);
        $startUtc = AppointmentTime::startUtc($appointment);
        if (! $doctor || ! $startUtc) {
            throw new SlotUnavailableException;
        }

        $slotMinutes = AppointmentTime::slotMinutes($doctor);
        $endUtc = AppointmentTime::endUtc($appointment, $slotMinutes);
        $this->ensureOpen($doctorId, $doctor, $startUtc, $endUtc, $slotMinutes, $appointmentId);

        $now = Carbon::now('UTC');
        $this->reserve($appointmentId, $doctorId, $startUtc, $endUtc, [
            'holdStartedAt' => $now,
            'updatedAt' => $now,
        ], isNew: false, holdExpiresAt: $now->copy()->addMinutes(AppointmentTime::UNPAID_HOLD_MINUTES));
    }

    /**
     * [$startUtc, $endUtc) must be made of consecutive open slots (ignoring
     * $excludeAppointmentId's own booking), and must not have started.
     *
     * @throws SlotUnavailableException
     */
    private function ensureOpen(string $doctorId, array $doctor, Carbon $startUtc, Carbon $endUtc, int $slotMinutes, string $excludeAppointmentId): void
    {
        $open = $this->openSlots($doctorId, $doctor, $startUtc->copy()->subMinute(), $endUtc, $slotMinutes, $excludeAppointmentId);
        $coveredUntil = $startUtc->copy();
        foreach ($open as $slot) {
            if ($slot['start']->equalTo($coveredUntil)) {
                $coveredUntil = $slot['end']->copy();
            }
        }
        if ($coveredUntil->lt($endUtc)) {
            throw new SlotUnavailableException;
        }
    }

    /** @return list<array{start: Carbon, end: Carbon}> */
    private function openSlots(string $doctorId, array $doctor, Carbon $from, Carbon $to, int $slotMinutes, ?string $excludeAppointmentId): array
    {
        $now = Carbon::now('UTC');
        if ($from->lt($now)) {
            $from = $now;
        }

        $slots = AppointmentTime::generateSlots($doctor, $from, $to, $slotMinutes);
        if (! $slots) {
            return [];
        }

        $booked = $this->bookedIntervals($doctorId, $excludeAppointmentId, $slotMinutes);

        return array_values(array_filter($slots, function ($slot) use ($booked) {
            foreach ($booked as [$start, $end]) {
                if ($slot['start']->lt($end) && $slot['end']->gt($start)) {
                    return false;
                }
            }

            return true;
        }));
    }

    /** @return list<array{0: Carbon, 1: Carbon}> */
    private function bookedIntervals(string $doctorId, ?string $excludeAppointmentId, int $slotMinutes): array
    {
        $appointments = $this->firestore->query('appointments', [
            ['field' => 'doctorId', 'op' => '=', 'value' => $doctorId],
        ]);

        $intervals = [];
        foreach ($appointments['documents'] ?? [] as $appointment) {
            if ($excludeAppointmentId && ($appointment['id'] ?? null) === $excludeAppointmentId) {
                continue;
            }
            if (! AppointmentTime::holdsSlot($appointment)) {
                continue;
            }

            $start = AppointmentTime::startUtc($appointment);
            if ($start) {
                $intervals[] = [$start, AppointmentTime::endUtc($appointment, $slotMinutes)];
            }
        }

        return $intervals;
    }
}
