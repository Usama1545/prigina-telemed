<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AppointmentPaymentService;
use App\Services\FirestoreService;
use App\Support\AppointmentTime;
use App\Support\CallWindow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 * Missed appointments: confirmed, but no consultation call was held before the
 * call window closed (CallWindow::isMissed). Nothing changes automatically; an
 * admin decides each one here. The Flutter app's admin screen does the same
 * (lib/services/amdin/missed_appointment_service.dart) — keep them in step.
 *
 * The decision is stored on the appointment as missedReview (decision, note,
 * decidedBy, decidedAt, appointmentStartUTC). Money moves first; if Stripe
 * fails nothing else changes.
 */
class AdminMissedAppointmentController extends Controller
{
    /** Payout states in which the payment is still held. */
    private const HELD_PAYOUTS = ['pending', 'held'];

    public function __construct(
        protected FirestoreService $firestore,
        protected AppointmentPaymentService $payments,
    ) {}

    public function index()
    {
        $now = Carbon::now('UTC');
        $byId = [];

        $open = $this->firestore->query('appointments', [
            ['field' => 'status', 'op' => 'in', 'value' => CallWindow::CALLABLE_STATUSES],
        ], null, null, null)['documents'] ?? [];
        foreach ($open as $appointment) {
            if (CallWindow::isMissed($appointment, $now)) {
                $byId[$appointment['id']] = $appointment;
            }
        }

        $reviewed = $this->firestore->query('appointments', [
            ['field' => 'missedReview.decision', 'op' => 'in', 'value' => CallWindow::MISSED_DECISIONS],
        ], null, null, null)['documents'] ?? [];
        foreach ($reviewed as $appointment) {
            $byId[$appointment['id']] = $appointment;
        }

        $reports = $this->reportsFor(array_keys($byId));

        $cases = [];
        foreach ($byId as $id => $appointment) {
            $review = CallWindow::missedReview($appointment);
            $isOpen = CallWindow::isMissed($appointment, $now);
            $cases[] = [
                'appointment' => $appointment,
                'when' => appointment_when($appointment, $appointment['doctorTimezone'] ?? 'UTC'),
                'reports' => $reports[$id] ?? [],
                'review' => $review,
                'isOpen' => $isOpen,
                'needsReview' => $isOpen && $review === null,
                'start' => AppointmentTime::startUtc($appointment)?->getTimestamp() ?? 0,
            ];
        }
        usort($cases, fn ($a, $b) => $b['start'] <=> $a['start']);

        $needsReview = array_values(array_filter($cases, fn ($c) => $c['needsReview']));
        $done = array_values(array_filter($cases, fn ($c) => ! $c['needsReview']));

        return view('admin.missed-appointments', compact('needsReview', 'done'));
    }

    public function resolve(Request $request, string $appointmentId)
    {
        $data = $request->validate([
            'decision' => 'required|in:'.implode(',', CallWindow::MISSED_DECISIONS),
            'note' => 'nullable|string|max:500',
        ]);
        $decision = $data['decision'];
        $note = trim($data['note'] ?? '');

        $appointment = $this->firestore->find('appointments', $appointmentId);
        if (! $appointment) {
            abort(404, 'Appointment not found');
        }
        $appointment['id'] = $appointmentId;

        if (! CallWindow::isMissed($appointment, Carbon::now('UTC'))) {
            return back()->with('error', 'This appointment is no longer missed (it was completed, cancelled or rescheduled).');
        }

        // 1. Money first: if Stripe fails, nothing else changes.
        $held = in_array($appointment['payoutStatus'] ?? 'held', self::HELD_PAYOUTS, true);
        if ($decision === 'refund_patient' && $held && ! empty($appointment['paymentIntentId'])) {
            if ($error = $this->payments->refund($appointmentId, $appointment)) {
                return back()->with('error', 'The refund failed, so nothing was changed. '.$error);
            }
        }
        if ($decision === 'pay_doctor' && $held && (float) ($appointment['amount'] ?? 0) > 0) {
            if ($error = $this->payments->release($appointmentId, $appointment)) {
                return back()->with('error', 'The payout failed, so nothing was changed. '.$error);
            }
        }

        // 2. The decision, and the status it implies.
        $now = Carbon::now('UTC');
        $update = [
            'missedReview' => [
                'decision' => $decision,
                'note' => $note,
                'decidedBy' => session('auth_uid'),
                'decidedAt' => $now,
                // The decision is for this time; a later reschedule makes it stale.
                'appointmentStartUTC' => AppointmentTime::toUtc($appointment['startTimeUTC'] ?? null),
            ],
            'updatedAt' => $now->toDateTimeString(),
            'updatedBy' => session('auth_uid'),
        ];
        if ($decision === 'refund_patient') {
            $update += [
                'status' => 'cancelled',
                'cancelledBy' => 'admin',
                'cancellationReason' => $note !== '' ? $note : 'Missed appointment: the doctor did not attend.',
                'cancelledAt' => $now,
            ];
        } elseif ($decision === 'pay_doctor') {
            $update += [
                'status' => 'completed',
                'completedAt' => $now->toDateTimeString(),
            ];
        }
        $this->firestore->update('appointments', $appointmentId, $update);

        // 3. Close the reports (kept as a record).
        foreach ($this->reportsFor([$appointmentId])[$appointmentId] ?? [] as $report) {
            if (($report['status'] ?? '') === 'voided') {
                continue;
            }
            $this->firestore->update('noShowReports', $report['id'], [
                'status' => $decision === 'dismissed' ? 'dismissed' : 'resolved',
                'resolution' => $decision,
                'resolvedAt' => $now,
                'resolvedBy' => session('auth_uid'),
            ]);
        }

        // 4. Tell both sides.
        $this->notify($appointment, $decision);

        Cache::forget('admin:stats');
        Cache::forget('admin:appointment-stats');
        Cache::forget('admin:dashboard-charts');

        return back()->with('success', 'Saved: '.self::label($decision).'.');
    }

    /** @return array<string, array<int, array>> no-show reports by appointment id, newest first */
    private function reportsFor(array $appointmentIds): array
    {
        $byAppointment = [];
        // Firestore "in" queries take at most 30 values.
        foreach (array_chunk($appointmentIds, 30) as $chunk) {
            try {
                $reports = $this->firestore->query('noShowReports', [
                    ['field' => 'appointmentId', 'op' => 'in', 'value' => $chunk],
                ], null, null, null)['documents'] ?? [];
            } catch (\Throwable $e) {
                Log::error('Loading no-show reports failed: '.$e->getMessage());
                $reports = [];
            }
            foreach ($reports as $report) {
                $byAppointment[$report['appointmentId']][] = $report;
            }
        }
        foreach ($byAppointment as &$list) {
            usort($list, fn ($a, $b) => (AppointmentTime::toUtc($b['reportedAt'] ?? null)?->getTimestamp() ?? 0)
                <=> (AppointmentTime::toUtc($a['reportedAt'] ?? null)?->getTimestamp() ?? 0));
        }

        return $byAppointment;
    }

    private function notify(array $appointment, string $decision): void
    {
        $doctor = trim('Dr. '.($appointment['doctorName'] ?? ''));
        $patient = $appointment['patientName'] ?? 'the patient';
        [$toPatient, $toDoctor] = match ($decision) {
            'refund_patient' => [
                "Your missed appointment with {$doctor} was cancelled and your payment refunded.",
                "The missed appointment with {$patient} was cancelled and the patient refunded.",
            ],
            'pay_doctor' => [
                "Your missed appointment with {$doctor} was closed as completed.",
                "The missed appointment with {$patient} was marked completed and your payment released.",
            ],
            'reschedule_allowed' => [
                "You can now pick a new time for your missed appointment with {$doctor} (Appointments > Missed).",
                "The missed appointment with {$patient} can now be rescheduled (Appointments > Missed).",
            ],
            default => [
                "Our team reviewed your missed appointment with {$doctor}. No changes were made.",
                "Our team reviewed the missed appointment with {$patient}. No changes were made.",
            ],
        };

        foreach ([[$appointment['patientId'] ?? null, $toPatient], [$appointment['doctorId'] ?? null, $toDoctor]] as [$userId, $text]) {
            if (! $userId) {
                continue;
            }
            try {
                $this->firestore->create('notifications', [
                    'userId' => $userId,
                    'title' => 'Missed appointment reviewed',
                    'description' => $text,
                    'type' => 'missed_appointment_reviewed',
                    'data' => ['appointmentId' => $appointment['id'], 'decision' => $decision],
                    'read' => false,
                    'isRead' => false,
                    'createdAt' => now(),
                ]);
            } catch (\Throwable $e) {
                Log::error('Missed appointment notification failed: '.$e->getMessage());
            }
        }
    }

    public static function label(string $decision): string
    {
        return match ($decision) {
            'refund_patient' => 'Patient refunded',
            'pay_doctor' => 'Doctor paid',
            'reschedule_allowed' => 'Reschedule allowed',
            default => 'Dismissed',
        };
    }
}
