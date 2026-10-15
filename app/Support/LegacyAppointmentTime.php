<?php

namespace App\Support;

use Carbon\Carbon;

/**
 * Works out the real start/end of an appointment written before the UTC time
 * model (timeModelVersion 2). Used by the appointments:migrate-times command;
 * the Cloud Function normalizer (functions/appointmentTime.js) mirrors the
 * rules for appointments still written by older app versions.
 *
 * In every old writer `startTime`/`endTime` were the doctor's clock times
 * (slots came straight from the doctor's working hours). What differs is how
 * the calendar date was stored, so each known writer is recognised by the
 * shape it left behind:
 *
 *  - web      (Laravel booking/reschedule): `date` == `startTimeUTC`, both the
 *              doctor's date + clock stored as if they were UTC.
 *  - app-book (Flutter booking): `startTimeUTC` is the doctor's clock read in
 *              the patient's timezone, on the date the patient picked.
 *  - app-doctor-reschedule (Flutter doctor side): `date` is the new date + clock
 *              in the doctor's device time; `startTimeUTC` was left stale.
 *  - app-patient-reschedule (Flutter patient side): `date` is only the picked
 *              calendar day; nothing else confirms it, so it is low confidence.
 */
final class LegacyAppointmentTime
{
    public const HIGH = 'high';

    public const LOW = 'low';

    /**
     * @return array{
     *   resolved: bool, confidence?: string, rules?: list<string>, reason?: string,
     *   doctorLocalDate?: string, start?: Carbon, end?: Carbon
     * }
     */
    public static function resolve(array $appointment, string $doctorTimezone): array
    {
        $doctorTimezone = AppointmentTime::timezone($doctorTimezone);
        $patientTimezone = AppointmentTime::timezone($appointment['patientTimezone'] ?? null);

        $startMinutes = AppointmentTime::minutes($appointment['startTime'] ?? null);
        $endMinutes = AppointmentTime::minutes($appointment['endTime'] ?? null);
        $date = AppointmentTime::toUtc($appointment['date'] ?? null);
        $startUtc = AppointmentTime::toUtc($appointment['startTimeUTC'] ?? null);

        if ($startMinutes === null || ! $date) {
            return ['resolved' => false, 'reason' => 'missing or unreadable date/startTime'];
        }

        $candidates = [];

        // web: date and startTimeUTC are the same instant, whose UTC clock is the doctor's clock.
        if ($startUtc && $startUtc->equalTo($date) && self::clockOf($date, 'UTC') === $startMinutes && $date->second === 0) {
            $candidates['web'] = $date->copy()->setTimezone('UTC')->format('Y-m-d');
        }

        // app-book: startTimeUTC is the doctor's clock read in the patient's timezone,
        // on the same patient-local day as `date`.
        if ($startUtc && ! $startUtc->equalTo($date) && self::clockOf($startUtc, $patientTimezone) === $startMinutes) {
            $bookedDay = $startUtc->copy()->setTimezone($patientTimezone)->format('Y-m-d');
            if ($bookedDay === $date->copy()->setTimezone($patientTimezone)->format('Y-m-d')) {
                $candidates['app-book'] = $bookedDay;
            }
        }

        // app-doctor-reschedule: `date` itself carries the doctor's clock time.
        if (self::clockOf($date, $doctorTimezone) === $startMinutes && $date->second === 0 && ! isset($candidates['web'])) {
            $candidates['app-doctor-reschedule'] = $date->copy()->setTimezone($doctorTimezone)->format('Y-m-d');
        }

        $days = array_unique(array_values($candidates));

        if (count($days) > 1) {
            return [
                'resolved' => false,
                'rules' => array_keys($candidates),
                'reason' => 'writers disagree on the date: '.json_encode($candidates),
            ];
        }

        if (count($days) === 1) {
            $day = $days[0];
            $confidence = self::HIGH;
            $rules = array_keys($candidates);
        } else {
            $day = $date->copy()->setTimezone($patientTimezone)->format('Y-m-d');
            $confidence = self::LOW;
            $rules = ['app-patient-reschedule'];
        }

        $start = self::at($day, $startMinutes, $doctorTimezone);
        if (! $start) {
            return ['resolved' => false, 'rules' => $rules, 'reason' => "{$day} {$appointment['startTime']} does not exist in {$doctorTimezone}"];
        }

        if ($endMinutes === null) {
            $end = $start->copy()->addMinutes(AppointmentTime::DEFAULT_SLOT_MINUTES);
        } else {
            $endDay = Carbon::parse($day, $doctorTimezone)->addDays($endMinutes <= $startMinutes ? 1 : 0)->format('Y-m-d');
            $end = self::at($endDay, $endMinutes, $doctorTimezone);
            if (! $end) {
                return ['resolved' => false, 'rules' => $rules, 'reason' => "{$endDay} {$appointment['endTime']} does not exist in {$doctorTimezone}"];
            }
        }

        return [
            'resolved' => true,
            'confidence' => $confidence,
            'rules' => $rules,
            'doctorLocalDate' => $day,
            'start' => $start->utc(),
            'end' => $end->utc(),
        ];
    }

    private static function clockOf(Carbon $instant, string $timezone): int
    {
        $local = $instant->copy()->setTimezone($timezone);

        return $local->hour * 60 + $local->minute;
    }

    private static function at(string $day, int $minutes, string $timezone): ?Carbon
    {
        $hour = intdiv($minutes, 60);
        $minute = $minutes % 60;
        $local = Carbon::parse($day, $timezone)->setTime($hour, $minute);

        return $local->hour === $hour && $local->minute === $minute ? $local : null;
    }
}
