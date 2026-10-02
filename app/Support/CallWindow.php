<?php

namespace App\Support;

use Carbon\Carbon;

/**
 * When an appointment can be called and when a no-show can be reported.
 * Mirrors functions/callWindow.js in the Flutter repo (used by the app's
 * Cloud Functions) — keep them in step.
 */
final class CallWindow
{
    /** Calling opens this long before the scheduled start... */
    public const OPEN_BEFORE_MINUTES = 10;

    /** ...and closes this long after the scheduled end. */
    public const CLOSE_AFTER_MINUTES = 10;

    /** A no-show can be reported from this long after the start... */
    public const REPORT_AFTER_MINUTES = 10;

    /** ...until this long after the end. */
    public const REPORT_UNTIL_DAYS = 7;

    /** A connected call shorter than this is a connectivity issue, not a consultation. */
    public const MIN_CONSULTATION_SECONDS = 180;

    /** An invitation nobody answered is over after this. */
    public const STALE_INVITE_MINUTES = 2;

    public const CALLABLE_STATUSES = ['confirmed', 'rescheduled'];

    public const OPEN_CALL_STATUSES = ['initiated', 'ongoing'];

    /**
     * @return array{start: Carbon, end: Carbon, opensAt: Carbon, closesAt: Carbon, reportFrom: Carbon, reportUntil: Carbon}|null
     *                                                                                                                            null for appointments without a reliable time
     */
    public static function for(array $appointment): ?array
    {
        if (! AppointmentTime::isCanonical($appointment)) {
            return null;
        }
        $start = AppointmentTime::toUtc($appointment['startTimeUTC'] ?? null);
        $end = AppointmentTime::toUtc($appointment['endTimeUTC'] ?? null);
        if (! $start || ! $end) {
            return null;
        }

        return [
            'start' => $start,
            'end' => $end,
            'opensAt' => $start->copy()->subMinutes(self::OPEN_BEFORE_MINUTES),
            'closesAt' => $end->copy()->addMinutes(self::CLOSE_AFTER_MINUTES),
            'reportFrom' => $start->copy()->addMinutes(self::REPORT_AFTER_MINUTES),
            'reportUntil' => $end->copy()->addDays(self::REPORT_UNTIL_DAYS),
        ];
    }

    public static function isCallable(array $appointment): bool
    {
        return in_array($appointment['status'] ?? '', self::CALLABLE_STATUSES, true);
    }

    public static function isOpen(array $appointment, Carbon $now): bool
    {
        $window = self::for($appointment);

        return self::isCallable($appointment) && $window
            && $now->gte($window['opensAt']) && $now->lte($window['closesAt']);
    }

    /** The appointment calling is about: one in its window, else the next upcoming. */
    public static function pickCall(array $appointments, Carbon $now): ?array
    {
        $callable = array_values(array_filter($appointments, fn ($a) => self::isCallable($a) && self::for($a)));
        usort($callable, fn ($a, $b) => self::for($a)['start'] <=> self::for($b)['start']);

        foreach ($callable as $a) {
            if (self::isOpen($a, $now)) {
                return $a;
            }
        }
        foreach ($callable as $a) {
            if (self::for($a)['opensAt']->gt($now)) {
                return $a;
            }
        }

        return null;
    }

    /** The most recent appointment that may be reported as a no-show now. */
    public static function pickReport(array $appointments, Carbon $now): ?array
    {
        $eligible = array_values(array_filter($appointments, function ($a) use ($now) {
            $w = self::isCallable($a) ? self::for($a) : null;

            return $w && $now->gte($w['reportFrom']) && $now->lte($w['reportUntil']);
        }));
        usort($eligible, fn ($a, $b) => self::for($b)['start'] <=> self::for($a)['start']);

        return $eligible[0] ?? null;
    }

    public static function roleIn(array $appointment, string $uid): ?string
    {
        return match ($uid) {
            $appointment['patientId'] ?? null => 'patient',
            $appointment['doctorId'] ?? null => 'doctor',
            default => null,
        };
    }

    public static function counterpartOf(array $appointment, string $uid): string
    {
        return ($appointment['patientId'] ?? null) === $uid
            ? ($appointment['doctorId'] ?? '')
            : ($appointment['patientId'] ?? '');
    }
}
