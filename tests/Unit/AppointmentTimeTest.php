<?php

namespace Tests\Unit;

use App\Support\AppointmentTime;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class AppointmentTimeTest extends TestCase
{
    private function doctor(string $timezone, array $overrides = []): array
    {
        return array_merge([
            'timezone' => $timezone,
            'workingDays' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'workingHours' => ['09:00', '17:00'],
            'breaks' => [],
            'slotDuration' => 30,
        ], $overrides);
    }

    /** Slots starting within one doctor-local day. */
    private function slotsOn(array $doctor, string $date): array
    {
        $tz = $doctor['timezone'];
        $from = Carbon::parse($date.' 00:00', $tz)->utc();
        $to = Carbon::parse($date.' 00:00', $tz)->addDay()->utc();

        return AppointmentTime::generateSlots($doctor, $from, $to, AppointmentTime::slotMinutes($doctor));
    }

    private function iso(Carbon $c): string
    {
        return $c->copy()->utc()->format('Y-m-d\TH:i\Z');
    }

    private function local(Carbon $utc, string $tz): string
    {
        return $utc->copy()->setTimezone($tz)->format('Y-m-d H:i');
    }

    public function test_new_york_doctor_seen_from_karachi(): void
    {
        $slots = $this->slotsOn($this->doctor('America/New_York'), '2026-10-05');

        $this->assertCount(16, $slots);
        // 09:00 EDT (UTC-4) = 13:00 UTC = 18:00 PKT
        $this->assertSame('2026-10-05T13:00Z', $this->iso($slots[0]['start']));
        $this->assertSame('2026-10-05 18:00', $this->local($slots[0]['start'], 'Asia/Karachi'));
        // Last slot 16:30-17:00 EDT ends at 02:00 PKT the next day
        $this->assertSame('2026-10-06 02:00', $this->local(end($slots)['end'], 'Asia/Karachi'));
    }

    public function test_karachi_doctor_seen_from_new_york(): void
    {
        $slots = $this->slotsOn($this->doctor('Asia/Karachi'), '2026-10-05');

        // 09:00 PKT (UTC+5) = 04:00 UTC = 00:00 EDT, same calendar day
        $this->assertSame('2026-10-05T04:00Z', $this->iso($slots[0]['start']));
        $this->assertSame('2026-10-05 00:00', $this->local($slots[0]['start'], 'America/New_York'));
    }

    public function test_half_and_quarter_hour_offsets(): void
    {
        $india = $this->slotsOn($this->doctor('Asia/Kolkata'), '2026-10-05');
        $this->assertSame('2026-10-05T03:30Z', $this->iso($india[0]['start']));
        $this->assertSame('2026-10-05 08:30', $this->local($india[0]['start'], 'Asia/Karachi'));

        $nepal = $this->slotsOn($this->doctor('Asia/Kathmandu'), '2026-10-05');
        $this->assertSame('2026-10-05T03:15Z', $this->iso($nepal[0]['start']));
        $this->assertSame('2026-10-05 08:15', $this->local($nepal[0]['start'], 'Asia/Karachi'));

        $adelaide = $this->slotsOn($this->doctor('Australia/Adelaide'), '2026-10-05');
        // Adelaide is on daylight time (UTC+10:30) in October
        $this->assertSame('2026-10-04T22:30Z', $this->iso($adelaide[0]['start']));

        $this->assertSame('UTC+05:45', AppointmentTime::offsetLabel($nepal[0]['start'], 'Asia/Kathmandu'));
        $this->assertSame('UTC+05:30', AppointmentTime::offsetLabel($india[0]['start'], 'Asia/Kolkata'));
    }

    public function test_working_day_is_the_doctors_calendar_day(): void
    {
        // Doctor in New York works Mondays only, 20:00-23:00. In Karachi those
        // slots fall on Tuesday — they must still exist, and Tuesday in NY has none.
        $doctor = $this->doctor('America/New_York', [
            'workingDays' => ['Monday'],
            'workingHours' => ['20:00', '23:00'],
        ]);

        $monday = $this->slotsOn($doctor, '2026-10-05');
        $this->assertCount(6, $monday);
        $this->assertSame('2026-10-06 05:00', $this->local($monday[0]['start'], 'Asia/Karachi'));
        $this->assertSame([], $this->slotsOn($doctor, '2026-10-06'));
    }

    public function test_slots_across_midnight(): void
    {
        $doctor = $this->doctor('Asia/Karachi', ['workingHours' => ['22:00', '01:00']]);

        $slots = AppointmentTime::generateSlots(
            $doctor,
            Carbon::parse('2026-10-05 22:00', 'Asia/Karachi')->utc(),
            Carbon::parse('2026-10-06 01:00', 'Asia/Karachi')->utc(),
            30,
        );

        $this->assertCount(6, $slots);
        $midnight = $slots[3];
        $this->assertSame('2026-10-05 23:30', $this->local($midnight['start'], 'Asia/Karachi'));
        $this->assertSame('2026-10-06 00:00', $this->local($midnight['end'], 'Asia/Karachi'));
        $this->assertTrue($midnight['end']->gt($midnight['start']));
    }

    public function test_breaks_are_removed(): void
    {
        $doctor = $this->doctor('Asia/Karachi', ['breaks' => ['13:00-14:00']]);
        $times = array_map(fn ($s) => $s['start']->copy()->setTimezone('Asia/Karachi')->format('H:i'), $this->slotsOn($doctor, '2026-10-05'));

        $this->assertNotContains('13:00', $times);
        $this->assertNotContains('13:30', $times);
        $this->assertContains('12:30', $times);
        $this->assertContains('14:00', $times);
    }

    public function test_daylight_saving_changes(): void
    {
        $doctor = $this->doctor('America/New_York');

        // Before the change (EDT, UTC-4) and after it (EST, UTC-5): 09:00 stays 09:00 locally.
        $before = $this->slotsOn($doctor, '2026-10-30');
        $after = $this->slotsOn($doctor, '2026-11-02');
        $this->assertSame('2026-10-30T13:00Z', $this->iso($before[0]['start']));
        $this->assertSame('2026-11-02T14:00Z', $this->iso($after[0]['start']));
        // Karachi has no DST, so the patient sees the slot move by an hour.
        $this->assertSame('18:00', $before[0]['start']->copy()->setTimezone('Asia/Karachi')->format('H:i'));
        $this->assertSame('19:00', $after[0]['start']->copy()->setTimezone('Asia/Karachi')->format('H:i'));
        $this->assertSame('UTC-04:00', AppointmentTime::offsetLabel($before[0]['start'], 'America/New_York'));
        $this->assertSame('UTC-05:00', AppointmentTime::offsetLabel($after[0]['start'], 'America/New_York'));

        // A night shift over the spring-forward gap (02:00-03:00 doesn't exist on 2027-03-14).
        $night = $this->doctor('America/New_York', ['workingHours' => ['01:00', '04:00']]);
        $gapDay = array_map(fn ($s) => $this->local($s['start'], 'America/New_York'), $this->slotsOn($night, '2027-03-14'));
        $this->assertSame(['2027-03-14 01:00', '2027-03-14 01:30', '2027-03-14 03:00', '2027-03-14 03:30'], $gapDay);

        // Fall-back night (01:00-02:00 happens twice on 2026-11-01): the earlier (EDT) occurrence is used.
        $fallBack = $this->slotsOn($night, '2026-11-01');
        $this->assertSame('2026-11-01T05:00Z', $this->iso($fallBack[0]['start']));
        $this->assertSame('2026-11-01T05:30Z', $this->iso($fallBack[1]['start']));
        $this->assertSame('2026-11-01T07:00Z', $this->iso($fallBack[2]['start'])); // 02:00 EST
    }

    public function test_same_timezone_behaves_as_before(): void
    {
        $slots = $this->slotsOn($this->doctor('Asia/Karachi'), '2026-10-05');
        $fields = AppointmentTime::buildFields($slots[0]['start'], $slots[0]['end'], 'Asia/Karachi', 'Asia/Karachi');

        $this->assertSame('9:00 AM', $fields['startTime']);
        $this->assertSame('9:30 AM', $fields['endTime']);
        $this->assertSame('9:00 AM - 9:30 AM', $fields['doctorLocalTime']);
        $this->assertSame('9:00 AM - 9:30 AM', $fields['patientLocalTime']);
        $this->assertSame('2026-10-05', $fields['doctorLocalDate']);
    }

    public function test_build_fields_for_cross_timezone_booking(): void
    {
        $slots = $this->slotsOn($this->doctor('America/New_York'), '2026-10-05');
        $fields = AppointmentTime::buildFields($slots[0]['start'], $slots[0]['end'], 'America/New_York', 'Asia/Karachi');

        $this->assertSame(2, $fields['timeModelVersion']);
        $this->assertSame('2026-10-05T13:00Z', $this->iso($fields['startTimeUTC']));
        $this->assertSame('2026-10-05T13:30Z', $this->iso($fields['endTimeUTC']));
        $this->assertSame('9:00 AM', $fields['startTime']);
        $this->assertSame('9:00 AM - 9:30 AM', $fields['doctorLocalTime']);
        $this->assertSame('6:00 PM - 6:30 PM', $fields['patientLocalTime']);
        $this->assertEquals($fields['startTimeUTC'], $fields['date']);
    }

    public function test_for_viewer_and_parsing(): void
    {
        $appointment = [
            'startTimeUTC' => '2026-10-05 13:00:00',
            'endTimeUTC' => '2026-10-05 13:30:00',
        ];

        $patient = AppointmentTime::forViewer($appointment, 'Asia/Karachi');
        $doctor = AppointmentTime::forViewer($appointment, 'America/New_York');

        $this->assertSame('6:00 PM - 6:30 PM', $patient['time']);
        $this->assertSame('9:00 AM - 9:30 AM', $doctor['time']);
        $this->assertSame('UTC', AppointmentTime::timezone('Not/AZone'));
        $this->assertSame(570, AppointmentTime::minutes('9:30 AM'));
        $this->assertSame(0, AppointmentTime::minutes('12:00 AM'));
        $this->assertSame(1290, AppointmentTime::minutes('21:30'));
        $this->assertSame('doc1_1791205200', AppointmentTime::slotLockId('doc1', Carbon::parse('2026-10-05 13:00', 'UTC')));
    }

    public function test_unpaid_bookings_hold_their_slot_for_30_minutes(): void
    {
        $created = Carbon::parse('2026-10-05 10:00', 'UTC');
        $at = fn (string $time) => Carbon::parse('2026-10-05 '.$time, 'UTC');

        $app = ['status' => 'pending_payment', 'paymentStatus' => 'pending', 'createdAt' => $created];
        $this->assertTrue(AppointmentTime::holdsSlot($app, $at('10:29')));
        $this->assertFalse(AppointmentTime::holdsSlot($app, $at('10:30')));
        $this->assertSame('2026-10-05T10:30Z', $this->iso(AppointmentTime::unpaidHoldExpiresAt($app)));

        // Web bookings are "pending" until Stripe marks the payment completed.
        $web = ['status' => 'pending', 'createdAt' => $created];
        $this->assertFalse(AppointmentTime::holdsSlot($web, $at('10:31')));
        $this->assertTrue(AppointmentTime::holdsSlot($web + ['paymentStatus' => 'completed'], $at('11:00')));

        // "Pay again" restarts the hold.
        $retried = $app + ['holdStartedAt' => $at('10:40')];
        $this->assertTrue(AppointmentTime::holdsSlot($retried, $at('11:05')));
        $this->assertFalse(AppointmentTime::holdsSlot($retried, $at('11:10')));

        // Paid/confirmed never expire; cancelled never hold; unknown start keeps holding.
        $this->assertTrue(AppointmentTime::holdsSlot(['status' => 'confirmed', 'createdAt' => $created], $at('23:00')));
        $this->assertFalse(AppointmentTime::holdsSlot(['status' => 'cancelled'], $at('10:00')));
        $this->assertTrue(AppointmentTime::holdsSlot(['status' => 'pending_payment'], $at('23:00')));
    }
}
