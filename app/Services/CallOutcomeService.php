<?php

namespace App\Services;

use App\Support\AppointmentTime;
use App\Support\CallWindow;
use Carbon\Carbon;
use Google\Cloud\Firestore\FieldValue;

/**
 * What a call means for its appointment, applied as soon as the call connects
 * or ends (the Firestore `calls` trigger calls the webhook in
 * CallWebhookController). The calls:process command re-runs it as a safety net.
 *
 *  - A connected call voids (but keeps) the appointment's no-show reports.
 *  - An ended, connected call is judged on its length from the server
 *    timestamps connectedAt/endedAt: under 3 minutes it is a connectivity
 *    issue and the appointment stays open for a retry; otherwise it is
 *    recorded on the appointment as the consultation call.
 */
class CallOutcomeService
{
    public function __construct(
        protected FirestoreService $firestore,
        protected AppointmentCallService $calls,
    ) {}

    /** @return array{evaluated: ?string, voided: int} */
    public function process(string $callId): array
    {
        $call = $this->firestore->find('calls', $callId);
        if (! $call) {
            return ['evaluated' => null, 'voided' => 0];
        }
        $call['id'] = $callId;

        $voided = ! empty($call['connectedAt']) && ! empty($call['appointmentId'])
            ? $this->voidReports($call['appointmentId'], $callId)
            : 0;

        return ['evaluated' => $this->evaluate($call), 'voided' => $voided];
    }

    /** @return string|null the outcome, or null if the call isn't ready to judge */
    public function evaluate(array $call): ?string
    {
        if (($call['evaluation'] ?? null) !== 'pending') {
            return null;
        }
        $connected = AppointmentTime::toUtc($call['connectedAt'] ?? null);
        $ended = AppointmentTime::toUtc($call['endedAt'] ?? null);
        if (! $connected || ! $ended) {
            return null;
        }

        $seconds = max(0, $ended->getTimestamp() - $connected->getTimestamp());
        $outcome = $seconds >= CallWindow::MIN_CONSULTATION_SECONDS ? 'consultation' : 'connectivity_issue';

        $this->firestore->update('calls', $call['id'], [
            'durationSeconds' => $seconds,
            'outcome' => $outcome,
            'evaluation' => 'done',
            'evaluatedAt' => FieldValue::serverTimestamp(),
        ]);

        $appointmentId = $call['appointmentId'] ?? null;
        if ($appointmentId && $outcome === 'consultation') {
            $appointment = $this->firestore->find('appointments', $appointmentId) ?? [];
            // The first qualifying call is the consultation; the status is left
            // to the doctor's existing "complete" step.
            if (empty($appointment['consultationCallId'])) {
                $this->firestore->update('appointments', $appointmentId, [
                    'consultationCallId' => $call['id'],
                    'consultationDurationSeconds' => $seconds,
                    'consultationHeldAt' => $call['connectedAt'],
                ]);
            }
        } elseif ($appointmentId) {
            // The appointment stays open so they can call again.
            $this->firestore->update('appointments', $appointmentId, [
                'lastConnectivityIssueCallId' => $call['id'],
            ]);
        }

        return $outcome;
    }

    /** Voids the appointment's active no-show reports, keeping the records. */
    public function voidReports(string $appointmentId, string $connectedCallId): int
    {
        $active = $this->firestore->query('noShowReports', [
            ['field' => 'appointmentId', 'op' => '=', 'value' => $appointmentId],
            ['field' => 'status', 'op' => '=', 'value' => 'active'],
        ], null, null, null)['documents'] ?? [];

        foreach ($active as $report) {
            $this->firestore->update('noShowReports', $report['id'], [
                'status' => 'voided',
                'voidedAt' => FieldValue::serverTimestamp(),
                'voidReason' => 'connected_call',
                'voidingCallId' => $connectedCallId,
            ]);
        }

        return count($active);
    }

    /**
     * Safety net for what no event signals: calls never ended (an app closed
     * mid-call) are closed, and anything a failed webhook missed is processed.
     *
     * @return array{closed: int, evaluated: int, voided: int}
     */
    public function sweep(int $abandonedAfterHours = 2): array
    {
        $cutoff = Carbon::now('UTC')->subHours($abandonedAfterHours);
        $closed = $evaluated = $voided = 0;

        foreach (CallWindow::OPEN_CALL_STATUSES as $status) {
            $open = $this->firestore->query('calls', [
                ['field' => 'status', 'op' => '=', 'value' => $status],
            ], null, null, null)['documents'] ?? [];

            foreach ($open as $call) {
                $created = AppointmentTime::toUtc($call['createdAt'] ?? null);
                if (! $created || $created->gt($cutoff)) {
                    continue;
                }
                $this->firestore->update('calls', $call['id'], $status === 'initiated'
                    ? ['status' => 'missed', 'endedAt' => FieldValue::serverTimestamp(), 'endTime' => FieldValue::serverTimestamp()]
                    // Connected but never ended: its length is unknown, so it can't count as a consultation.
                    : ['status' => 'completed', 'outcome' => 'unknown_end', 'evaluation' => 'done', 'evaluatedAt' => FieldValue::serverTimestamp()]);
                $closed++;
            }
        }

        $pending = $this->firestore->query('calls', [
            ['field' => 'evaluation', 'op' => '=', 'value' => 'pending'],
        ], null, null, null)['documents'] ?? [];
        foreach ($pending as $call) {
            $evaluated += $this->evaluate($call) ? 1 : 0;
        }

        $active = $this->firestore->query('noShowReports', [
            ['field' => 'status', 'op' => '=', 'value' => 'active'],
        ], null, null, null)['documents'] ?? [];
        foreach ($active as $report) {
            $connected = array_values(array_filter(
                $this->calls->callsFor($report['appointmentId'] ?? ''),
                fn ($c) => ! empty($c['connectedAt']),
            ));
            if ($connected) {
                $voided += $this->voidReports($report['appointmentId'], $connected[0]['id']);
            }
        }

        return ['closed' => $closed, 'evaluated' => $evaluated, 'voided' => $voided];
    }
}
