<?php

namespace Tests\Unit;

use App\Support\LegacyAppointmentTime;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

/** Documents shaped exactly as each pre-UTC writer left them. */
class LegacyAppointmentTimeTest extends TestCase
{
    private function utc(string $local, string $tz): Carbon
    {
        return Carbon::parse($local, $tz)->utc();
    }

    private function iso(Carbon $c): string
    {
        return $c->copy()->utc()->format('Y-m-d\TH:i\Z');
    }

    public function test_web_booking(): void
    {
        // Laravel stored the doctor's date + clock as if it were UTC.
        $fake = Carbon::parse('2026-10-05 09:00', 'UTC');
        $result = LegacyAppointmentTime::resolve([
            'date' => $fake, 'startTimeUTC' => $fake,
            'startTime' => '09:00 AM', 'endTime' => '09:30 AM',
            'patientTimezone' => 'Asia/Karachi',
        ], 'America/New_York');

        $this->assertTrue($result['resolved']);
        $this->assertSame('high', $result['confidence']);
        $this->assertSame(['web'], $result['rules']);
        $this->assertSame('2026-10-05T13:00Z', $this->iso($result['start']));
        $this->assertSame('2026-10-05T13:30Z', $this->iso($result['end']));
    }

    public function test_app_booking_from_date_picker(): void
    {
        // Patient in Karachi picked 5 Oct (local midnight) and the "9:00 AM" slot,
        // which was really the New York doctor's 9:00 AM.
        $result = LegacyAppointmentTime::resolve([
            'date' => $this->utc('2026-10-05 00:00', 'Asia/Karachi'),
            'startTimeUTC' => $this->utc('2026-10-05 09:00', 'Asia/Karachi'),
            'startTime' => '9:00 AM', 'endTime' => '9:30 AM',
            'patientTimezone' => 'Asia/Karachi',
        ], 'America/New_York');

        $this->assertTrue($result['resolved']);
        $this->assertSame(['app-book'], $result['rules']);
        $this->assertSame('high', $result['confidence']);
        $this->assertSame('2026-10-05', $result['doctorLocalDate']);
        $this->assertSame('2026-10-05T13:00Z', $this->iso($result['start']));
    }

    public function test_app_booking_from_quick_date_with_time_of_day(): void
    {
        // The date strip passed "now + n days", so `date` carries a random time of day.
        $result = LegacyAppointmentTime::resolve([
            'date' => $this->utc('2026-10-05 14:23:11', 'Asia/Karachi'),
            'startTimeUTC' => $this->utc('2026-10-05 09:00', 'Asia/Karachi'),
            'startTime' => '9:00 AM', 'endTime' => '9:30 AM',
            'patientTimezone' => 'Asia/Karachi',
        ], 'America/New_York');

        $this->assertSame(['app-book'], $result['rules']);
        $this->assertSame('2026-10-05T13:00Z', $this->iso($result['start']));
    }

    public function test_app_doctor_reschedule(): void
    {
        $result = LegacyAppointmentTime::resolve([
            'date' => $this->utc('2026-10-07 10:00', 'America/New_York'),
            'startTimeUTC' => $this->utc('2026-10-05 09:00', 'Asia/Karachi'), // stale
            'startTime' => '10:00 AM', 'endTime' => '10:30 AM',
            'patientTimezone' => 'Asia/Karachi',
        ], 'America/New_York');

        $this->assertSame(['app-doctor-reschedule'], $result['rules']);
        $this->assertSame('2026-10-07T14:00Z', $this->iso($result['start']));
    }

    public function test_app_patient_reschedule_is_low_confidence(): void
    {
        $result = LegacyAppointmentTime::resolve([
            'date' => $this->utc('2026-10-08 00:00', 'Asia/Karachi'),
            'startTimeUTC' => $this->utc('2026-10-05 09:00', 'Asia/Karachi'), // stale
            'startTime' => '11:00 AM', 'endTime' => '11:30 AM',
            'patientTimezone' => 'Asia/Karachi',
        ], 'America/New_York');

        $this->assertTrue($result['resolved']);
        $this->assertSame('low', $result['confidence']);
        $this->assertSame('2026-10-08T15:00Z', $this->iso($result['start']));
    }

    public function test_disagreeing_writers_are_flagged(): void
    {
        $result = LegacyAppointmentTime::resolve([
            'date' => $this->utc('2026-10-05 00:00', 'Asia/Karachi'),         // = 4 Oct 3:00 PM in New York
            'startTimeUTC' => $this->utc('2026-10-05 15:00', 'Asia/Karachi'), // app-book says 5 Oct
            'startTime' => '3:00 PM', 'endTime' => '3:30 PM',
            'patientTimezone' => 'Asia/Karachi',
        ], 'America/New_York');

        $this->assertFalse($result['resolved']);
        $this->assertStringContainsString('disagree', $result['reason']);
    }

    public function test_midnight_crossing_and_same_timezone(): void
    {
        $fake = Carbon::parse('2026-10-05 23:30', 'UTC');
        $result = LegacyAppointmentTime::resolve([
            'date' => $fake, 'startTimeUTC' => $fake,
            'startTime' => '11:30 PM', 'endTime' => '12:00 AM',
            'patientTimezone' => 'Asia/Karachi',
        ], 'Asia/Karachi');

        $this->assertSame('2026-10-05T18:30Z', $this->iso($result['start']));
        $this->assertSame('2026-10-05T19:00Z', $this->iso($result['end']));
        $this->assertTrue($result['end']->gt($result['start']));
    }

    public function test_unreadable_documents_are_flagged(): void
    {
        $this->assertFalse(LegacyAppointmentTime::resolve(['startTime' => '9:00 AM'], 'UTC')['resolved']);
        $this->assertFalse(LegacyAppointmentTime::resolve(['date' => '2026-10-05', 'startTime' => 'soon'], 'UTC')['resolved']);
    }
}
