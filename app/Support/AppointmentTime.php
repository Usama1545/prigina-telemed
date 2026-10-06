<?php

namespace App\Support;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use DateTimeInterface;
use DateTimeZone;
use Google\Cloud\Core\Timestamp;

/**
 * The appointment-time model shared by the web app, the Flutter app
 * (lib/utils/appointment_time.dart) and the Cloud Functions. Keep them in step.
 *
 *  - A doctor's workingDays / workingHours / breaks are wall-clock values in
 *    the doctor's IANA timezone (doctors.timezone).
 *  - startTimeUTC / endTimeUTC on an appointment are the authoritative instants.
 *  - date, startTime, endTime, doctorLocalDate, doctorLocalTime and
 *    patientLocalTime are derived from them for display and older readers,
 *    and are never used for calculations.
 */
final class AppointmentTime
{
    public const MODEL_VERSION = 2;

    /** One document per booked doctor slot, keyed by slotLockId(). */
    public const SLOT_LOCKS = 'appointment_slots';

    /** Statuses that give their slot back. Every other status holds it. */
    public const RELEASED_STATUSES = ['cancelled', 'rejected', 'payment_failed'];

    /** Statuses of a booking that hasn't been paid yet. */
    public const UNPAID_STATUSES = ['pending_payment', 'pending'];

    /** How long an unpaid booking holds its slot. */
    public const UNPAID_HOLD_MINUTES = 30;

    public const DEFAULT_SLOT_MINUTES = 30;

    public static function timezone(?string $timezone): string
    {
        if (is_string($timezone) && $timezone !== '') {
            try {
                new DateTimeZone($timezone);

                return $timezone;
            } catch (\Exception) {
            }
        }

        return 'UTC';
    }

    /** Firestore Timestamp, DateTime, epoch seconds or a UTC date string → UTC Carbon. */
    public static function toUtc(mixed $value): ?Carbon
    {
        if ($value === null || $value === '') {
            return null;
        }
        if ($value instanceof Timestamp) {
            $value = $value->get();
        }
        if ($value instanceof DateTimeInterface) {
            return Carbon::instance($value)->utc();
        }
        if (is_numeric($value)) {
            return Carbon::createFromTimestamp((int) $value, 'UTC');
        }

        try {
            return Carbon::parse((string) $value, 'UTC')->utc();
        } catch (\Throwable) {
            return null;
        }
    }

    public static function isCanonical(array $appointment): bool
    {
        return (int) ($appointment['timeModelVersion'] ?? 0) >= self::MODEL_VERSION;
    }

    public static function startUtc(array $appointment): ?Carbon
    {
        return self::toUtc($appointment['startTimeUTC'] ?? null)
            ?? self::toUtc($appointment['date'] ?? null);
    }

    public static function endUtc(array $appointment, ?int $fallbackMinutes = null): ?Carbon
    {
        $end = self::toUtc($appointment['endTimeUTC'] ?? null);
        $start = self::startUtc($appointment);

        if ($end && $start && $end->gt($start)) {
            return $end;
        }

        return $start?->copy()->addMinutes($fallbackMinutes ?? self::DEFAULT_SLOT_MINUTES);
    }

    /**
     * Whether the appointment still occupies its slot: not cancelled/rejected/
     * failed, and not an unpaid booking whose 30-minute hold has run out.
     */
    public static function holdsSlot(array $appointment, ?CarbonInterface $now = null): bool
    {
        return ! self::isReleased($appointment) && ! self::unpaidHoldExpired($appointment, $now);
    }

    public static function isReleased(array $appointment): bool
    {
        return in_array($appointment['status'] ?? '', self::RELEASED_STATUSES, true);
    }

    /** Booked but not paid yet (app: pending_payment, web: pending without a completed payment). */
    public static function isUnpaid(array $appointment): bool
    {
        return in_array($appointment['status'] ?? '', self::UNPAID_STATUSES, true)
            && ($appointment['paymentStatus'] ?? '') !== 'completed';
    }

    /**
     * When an unpaid booking stops holding its slot: 30 minutes after it was
     * made, or after its last "pay again" (holdStartedAt). Null if it isn't
     * unpaid or the start of the hold is unknown (then it keeps holding).
     */
    public static function unpaidHoldExpiresAt(array $appointment): ?Carbon
    {
        if (! self::isUnpaid($appointment)) {
            return null;
        }

        $since = self::toUtc($appointment['holdStartedAt'] ?? null)
            ?? self::toUtc($appointment['createdAt'] ?? null);

        return $since?->copy()->addMinutes(self::UNPAID_HOLD_MINUTES);
    }

    public static function unpaidHoldExpired(array $appointment, ?CarbonInterface $now = null): bool
    {
        $expires = self::unpaidHoldExpiresAt($appointment);

        return $expires !== null && $expires->lte($now ?? Carbon::now('UTC'));
    }

    public static function slotLockId(string $doctorId, CarbonInterface $startUtc): string
    {
        return $doctorId.'_'.$startUtc->getTimestamp();
    }

    public static function slotMinutes(array $doctor): int
    {
        $value = $doctor['slotDuration'] ?? null;

        return is_numeric($value) && (int) $value > 0 ? (int) $value : self::DEFAULT_SLOT_MINUTES;
    }

    /** "9:00 AM" — the same clock format the Flutter app writes. */
    public static function clock(CarbonInterface $time): string
    {
        return $time->format('g:i A');
    }

    /** "UTC+05:30" for the offset in force at that instant. */
    public static function offsetLabel(CarbonInterface $utc, string $timezone): string
    {
        $offset = $utc->copy()->setTimezone(self::timezone($timezone))->format('P');

        return 'UTC'.$offset;
    }

    /**
     * The start/end of an appointment in one person's timezone, for display.
     *
     * @return array{start: Carbon, end: Carbon, date: string, time: string, timezone: string, offset: string}|null
     */
    public static function forViewer(array $appointment, ?string $timezone): ?array
    {
        $start = self::startUtc($appointment);
        if (! $start) {
            return null;
        }

        $timezone = self::timezone($timezone);
        $end = self::endUtc($appointment);
        $localStart = $start->copy()->setTimezone($timezone);
        $localEnd = $end->copy()->setTimezone($timezone);

        return [
            'start' => $localStart,
            'end' => $localEnd,
            'date' => $localStart->translatedFormat('d M Y'),
            'time' => self::clock($localStart).' - '.self::clock($localEnd),
            'timezone' => $timezone,
            'offset' => self::offsetLabel($start, $timezone),
        ];
    }

    /**
     * Every time field written to an appointment when it is booked or
     * rescheduled. Flutter's AppointmentTime.buildFields() must match.
     */
    public static function buildFields(
        CarbonInterface $startUtc,
        CarbonInterface $endUtc,
        string $doctorTimezone,
        string $patientTimezone,
    ): array {
        $doctorTimezone = self::timezone($doctorTimezone);
        $patientTimezone = self::timezone($patientTimezone);

        $start = Carbon::instance($startUtc)->utc();
        $end = Carbon::instance($endUtc)->utc();
        $doctorStart = $start->copy()->setTimezone($doctorTimezone);
        $doctorEnd = $end->copy()->setTimezone($doctorTimezone);
        $patientStart = $start->copy()->setTimezone($patientTimezone);
        $patientEnd = $end->copy()->setTimezone($patientTimezone);

        return [
            'timeModelVersion' => self::MODEL_VERSION,
            'startTimeUTC' => $start,
            'endTimeUTC' => $end,
            'doctorTimezone' => $doctorTimezone,
            'patientTimezone' => $patientTimezone,
            'doctorLocalDate' => $doctorStart->format('Y-m-d'),
            'doctorLocalTime' => self::clock($doctorStart).' - '.self::clock($doctorEnd),
            'patientLocalTime' => self::clock($patientStart).' - '.self::clock($patientEnd),
            // Legacy fields kept for older app versions and existing screens.
            'date' => $start,
            'startTime' => self::clock($doctorStart),
            'endTime' => self::clock($doctorEnd),
        ];
    }

    /**
     * The doctor's bookable slots whose start falls in [$fromUtc, $toUtc),
     * ignoring existing bookings and the current time.
     *
     * Each doctor-local date's working hours are laid out in wall-clock time
     * in the doctor's timezone, then each slot start is converted to UTC.
     * Working hours whose end is not after their start run past midnight.
     * Slot starts that do not exist locally (skipped by a DST change) are dropped.
     *
     * @return list<array{start: Carbon, end: Carbon}>
     */
    public static function generateSlots(array $doctor, CarbonInterface $fromUtc, CarbonInterface $toUtc, int $slotMinutes): array
    {
        $timezone = self::timezone($doctor['timezone'] ?? null);
        $workingDays = array_map('strval', $doctor['workingDays'] ?? []);
        $hours = array_values($doctor['workingHours'] ?? []);

        $workStart = self::minutes($hours[0] ?? null);
        $workEnd = self::minutes($hours[1] ?? null);
        if ($workStart === null || $workEnd === null || $slotMinutes <= 0 || ! $workingDays) {
            return [];
        }
        if ($workEnd <= $workStart) {
            $workEnd += 1440;
        }

        $breaks = self::breakRanges($doctor['breaks'] ?? [], $workStart, $slotMinutes);

        // A shift that starts the day before can still produce slots inside the range.
        $day = Carbon::instance($fromUtc)->setTimezone($timezone)->startOfDay()->subDay();
        $lastDay = Carbon::instance($toUtc)->setTimezone($timezone)->startOfDay();

        $slots = [];
        for (; $day->lte($lastDay); $day = $day->copy()->addDay()) {
            if (! in_array($day->format('l'), $workingDays, true)) {
                continue;
            }

            for ($m = $workStart; $m + $slotMinutes <= $workEnd; $m += $slotMinutes) {
                if (self::overlapsBreak($m, $m + $slotMinutes, $breaks)) {
                    continue;
                }

                $start = self::wallClock($day, $m, $timezone);
                if (! $start) {
                    continue;
                }

                $startUtc = $start->utc();
                if ($startUtc->lt($fromUtc) || $startUtc->gte($toUtc)) {
                    continue;
                }

                $slots[$startUtc->getTimestamp()] = [
                    'start' => $startUtc,
                    'end' => $startUtc->copy()->addMinutes($slotMinutes),
                ];
            }
        }

        ksort($slots);

        return array_values($slots);
    }

    /** "09:30" or "9:30 AM" → minutes after midnight. */
    public static function minutes(mixed $value): ?int
    {
        if (! is_string($value) || ! preg_match('/^\s*(\d{1,2}):(\d{2})\s*([AaPp][Mm])?\s*$/', $value, $m)) {
            return null;
        }

        $hour = (int) $m[1];
        $minute = (int) $m[2];
        $period = strtoupper($m[3] ?? '');

        if ($period === 'PM' && $hour !== 12) {
            $hour += 12;
        } elseif ($period === 'AM' && $hour === 12) {
            $hour = 0;
        }

        if ($hour > 23 || $minute > 59) {
            return null;
        }

        return $hour * 60 + $minute;
    }

    /**
     * Breaks are stored as "13:00-14:00" (a single legacy "13:00" means one
     * slot long), in the same wall-clock time as the working hours.
     *
     * @return list<array{0: int, 1: int}>
     */
    private static function breakRanges(mixed $breaks, int $workStart, int $slotMinutes): array
    {
        if (is_string($breaks)) {
            $breaks = explode(',', $breaks);
        }

        $ranges = [];
        foreach ((array) $breaks as $break) {
            $parts = array_map('trim', explode('-', (string) $break));
            $start = self::minutes($parts[0] ?? null);
            if ($start === null) {
                continue;
            }
            $end = isset($parts[1]) ? self::minutes($parts[1]) : $start + $slotMinutes;
            if ($end === null) {
                continue;
            }
            if ($end <= $start) {
                $end += 1440;
            }
            // Inside an overnight shift, an early-morning break belongs to the next day.
            if ($start < $workStart) {
                $start += 1440;
                $end += 1440;
            }
            $ranges[] = [$start, $end];
        }

        return $ranges;
    }

    private static function overlapsBreak(int $start, int $end, array $breaks): bool
    {
        foreach ($breaks as [$breakStart, $breakEnd]) {
            if ($start < $breakEnd && $end > $breakStart) {
                return true;
            }
        }

        return false;
    }

    /**
     * The given minutes after the start of $day, as wall-clock time in
     * $timezone; null if that time doesn't exist (DST gap). A time that occurs
     * twice (DST end) resolves to the earlier occurrence, as in the Flutter app.
     */
    private static function wallClock(CarbonInterface $day, int $minutes, string $timezone): ?Carbon
    {
        $date = $day->copy()->addDays(intdiv($minutes, 1440));
        $hour = intdiv($minutes % 1440, 60);
        $minute = $minutes % 60;

        $local = Carbon::create($date->year, $date->month, $date->day, $hour, $minute, 0, $timezone);

        $wall = fn (Carbon $c) => $c->format('Y-m-d H:i');
        $wanted = sprintf('%04d-%02d-%02d %02d:%02d', $date->year, $date->month, $date->day, $hour, $minute);
        if ($wall($local) !== $wanted) {
            return null;
        }

        foreach ([3600, 1800] as $shift) {
            $earlier = Carbon::createFromTimestamp($local->getTimestamp() - $shift, $timezone);
            if ($wall($earlier) === $wanted) {
                return $earlier;
            }
        }

        return $local;
    }
}
