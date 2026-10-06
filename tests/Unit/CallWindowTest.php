<?php

namespace Tests\Unit;

use App\Support\CallWindow;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

/** Same cases as functions/test/callWindow.test.js in the Flutter repo. */
class CallWindowTest extends TestCase
{
    private function appt(string $id, string $start, string $end, string $status = 'confirmed'): array
    {
        return [
            'id' => $id,
            'status' => $status,
            'timeModelVersion' => 2,
            'startTimeUTC' => Carbon::parse($start, 'UTC'),
            'endTimeUTC' => Carbon::parse($end, 'UTC'),
        ];
    }

    private function at(string $time): Carbon
    {
        return Carbon::parse($time, 'UTC');
    }

    public function test_window_opens_10_min_before_and_closes_10_min_after(): void
    {
        $w = CallWindow::for($this->appt('a', '2026-10-05 13:00', '2026-10-05 13:30'));

        $this->assertEquals($this->at('2026-10-05 12:50'), $w['opensAt']);
        $this->assertEquals($this->at('2026-10-05 13:40'), $w['closesAt']);
        $this->assertEquals($this->at('2026-10-05 13:10'), $w['reportFrom']);

        $a = $this->appt('a', '2026-10-05 13:00', '2026-10-05 13:30');
        $this->assertFalse(CallWindow::isOpen($a, $this->at('2026-10-05 12:49:59')));
        $this->assertTrue(CallWindow::isOpen($a, $this->at('2026-10-05 12:50')));
        $this->assertTrue(CallWindow::isOpen($a, $this->at('2026-10-05 13:40')));
        $this->assertFalse(CallWindow::isOpen($a, $this->at('2026-10-05 13:40:01')));
        $this->assertFalse(CallWindow::isOpen(['status' => 'cancelled'] + $a, $this->at('2026-10-05 13:00')));
    }

    public function test_appointments_not_on_the_utc_model_have_no_window(): void
    {
        $this->assertNull(CallWindow::for(['startTimeUTC' => '2026-10-05 13:00']));
    }

    public function test_chat_picks_the_appointment_in_its_window_else_the_next_one(): void
    {
        $list = [
            $this->appt('next', '2026-10-06 13:00', '2026-10-06 13:30'),
            $this->appt('past', '2026-10-04 13:00', '2026-10-04 13:30'),
            $this->appt('x', '2026-10-05 12:00', '2026-10-05 14:00', 'cancelled'),
            $this->appt('now', '2026-10-05 13:00', '2026-10-05 13:30'),
        ];

        $this->assertSame('now', CallWindow::pickCall($list, $this->at('2026-10-05 12:55'))['id']);
        $this->assertSame('now', CallWindow::pickCall($list, $this->at('2026-10-05 12:45'))['id']);
        $this->assertSame('next', CallWindow::pickCall($list, $this->at('2026-10-05 13:45'))['id']);
        $this->assertNull(CallWindow::pickCall([$list[1]], $this->at('2026-10-05 13:45')));
    }

    public function test_no_show_reporting_opens_10_min_after_the_start(): void
    {
        $older = $this->appt('older', '2026-10-04 13:00', '2026-10-04 13:30');
        $today = $this->appt('today', '2026-10-05 13:00', '2026-10-05 13:30');

        $this->assertSame('older', CallWindow::pickReport([$older, $today], $this->at('2026-10-05 13:09'))['id']);
        $this->assertSame('today', CallWindow::pickReport([$older, $today], $this->at('2026-10-05 13:10'))['id']);
        $this->assertNull(CallWindow::pickReport([$today], $this->at('2026-10-13 13:00')));
        $this->assertNull(CallWindow::pickReport([$this->appt('d', '2026-10-05 13:00', '2026-10-05 13:30', 'completed')], $this->at('2026-10-05 14:00')));
    }

    public function test_roles(): void
    {
        $a = ['patientId' => 'p', 'doctorId' => 'd'];
        $this->assertSame('patient', CallWindow::roleIn($a, 'p'));
        $this->assertSame('doctor', CallWindow::roleIn($a, 'd'));
        $this->assertNull(CallWindow::roleIn($a, 'x'));
        $this->assertSame('d', CallWindow::counterpartOf($a, 'p'));
    }
}
