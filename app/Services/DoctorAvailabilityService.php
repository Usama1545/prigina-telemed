<?php

namespace App\Services;

use App\Models\Firestore\AppSetting;
use App\Models\Firestore\Doctor;

class DoctorAvailabilityService
{
    public function __construct(
        protected Doctor $doctors,
        protected AppSetting $appSetting,
        protected FirestoreService $firestore,
    ) {}

    /**
     * Compute the next 7 days of open slots for a doctor, based on their
     * working days/hours/breaks and their existing appointments.
     *
     * @param  string|null  $excludeAppointmentId  an appointment to ignore when
     *                                              marking slots as booked (used when rescheduling)
     * @return array{doctor: array, availability: array}|null  null if the doctor has no schedule configured
     */
    public function getAvailability(string $doctorId, ?string $excludeAppointmentId = null): ?array
    {
        $doctor = $this->doctors->find($doctorId);
        $setting = $this->appSetting->first();

        $breaks = $doctor['breaks'] ?? [];
        $workingDays = $doctor['workingDays'] ?? [];
        $workingHours = $doctor['workingHours'] ?? [];
        $slotDuration = $setting['slotDuration'] ?? 30;

        if (empty($workingDays) || empty($workingHours) || count($workingHours) < 2) {
            return null;
        }

        $bookedSlots = $this->firestore->query('appointments', [
            ['field' => 'doctorId', 'op' => '=', 'value' => $doctorId],
        ]);

        $bookedMap = [];

        foreach ($bookedSlots['documents'] ?? [] as $appointment) {
            if ($excludeAppointmentId && ($appointment['id'] ?? null) === $excludeAppointmentId) {
                continue;
            }

            // Cancelled appointments free up their slot for rebooking.
            if (($appointment['status'] ?? '') === 'cancelled') {
                continue;
            }

            $date = date('Y-m-d', strtotime($appointment['date']));
            $start = date('H:i', strtotime($appointment['startTime']));

            $bookedMap[$date][] = $start;
        }

        $weekDays = [];
        $today = now();

        for ($i = 0; $i < 7; $i++) {
            $day = $today->copy()->addDays($i);

            if (in_array($day->format('l'), $workingDays)) {
                $weekDays[] = $day->format('Y-m-d');
            }
        }

        $startTime = $workingHours[0]; // "09:00"
        $endTime = $workingHours[1];   // "17:00"

        $slots = [];

        foreach ($weekDays as $date) {

            $current = strtotime($startTime);
            $end = strtotime($endTime);

            while ($current < $end) {

                $slot = date('H:i', $current);

                if (isset($bookedMap[$date]) && in_array($slot, $bookedMap[$date])) {
                    $current += $slotDuration * 60;

                    continue;
                }

                if (! empty($breaks)) {
                    if (count($breaks) === 1) {
                        $breaks = explode('-', $breaks[0]);
                    }
                    $breakStart = strtotime($breaks[0]);
                    $breakEnd = strtotime($breaks[1]);

                    if ($current >= $breakStart && $current < $breakEnd) {
                        $current += $slotDuration * 60;

                        continue;
                    }
                }

                $slots[$date][] = $slot;

                $current += $slotDuration * 60;
            }
        }

        $availability = [];

        foreach ($slots as $date => $daySlots) {
            $availability[] = [
                'date' => $date,
                'day' => date('l', strtotime($date)),
                'slots' => $daySlots,
            ];
        }

        return [
            'doctor' => $doctor,
            'availability' => $availability,
            'slotDuration' => $slotDuration,
        ];
    }

    /**
     * Whether the given date + 24h "H:i" start time is one of the doctor's
     * currently open slots.
     */
    public function slotIsAvailable(string $doctorId, string $date, string $startTime24, ?string $excludeAppointmentId = null): bool
    {
        $result = $this->getAvailability($doctorId, $excludeAppointmentId);

        if (! $result) {
            return false;
        }

        foreach ($result['availability'] as $day) {
            if ($day['date'] === $date) {
                return in_array($startTime24, $day['slots'], true);
            }
        }

        return false;
    }
}
