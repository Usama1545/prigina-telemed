<?php

namespace App\Services;

use App\Exceptions\CallNotAllowedException;
use App\Support\AppointmentTime;
use App\Support\CallWindow;
use Carbon\Carbon;
use Google\Cloud\Firestore\FieldValue;
use Google\Cloud\Firestore\Transaction;

/**
 * Calls linked to appointments, the call window and no-show reports, for the
 * web app. The Flutter app gets the same behaviour from the Cloud Functions in
 * functions/appointmentCalls.js — keep them in step.
 *
 * Stored times are Firestore server timestamps; "now" is this server's clock.
 */
class AppointmentCallService
{
    public function __construct(protected FirestoreService $firestore) {}

    /**
     * The call button's state for one appointment, or for the chat with
     * another participant, labelled in the viewer's timezone.
     */
    public function access(string $uid, ?string $appointmentId, ?string $counterpartId, ?string $viewerTimezone): array
    {
        $now = Carbon::now('UTC');

        if ($appointmentId) {
            $callAppt = $reportAppt = $this->appointmentFor($uid, $appointmentId);
            $window = CallWindow::for($callAppt);
            if (! CallWindow::isCallable($callAppt) || ($window && $now->gt($window['reportUntil']))) {
                $reportAppt = null;
            }
        } else {
            $list = $this->appointmentsBetween($uid, (string) $counterpartId);
            $callAppt = CallWindow::pickCall($list, $now);
            $reportAppt = CallWindow::pickReport($list, $now);
        }

        return [
            'serverNow' => $now->getTimestampMs(),
            'call' => $this->callState($callAppt, $now, $viewerTimezone),
            'report' => $this->reportState($reportAppt, $uid),
        ];
    }

    /**
     * Opens a call record for the appointment whose window is open now.
     *
     * @return array{callId: string, appointment: array, counterpartId: string}
     *
     * @throws CallNotAllowedException
     */
    public function start(string $uid, ?string $appointmentId, ?string $counterpartId, string $callType, ?string $viewerTimezone): array
    {
        $now = Carbon::now('UTC');
        $appt = $appointmentId
            ? $this->appointmentFor($uid, $appointmentId)
            : CallWindow::pickCall($this->appointmentsBetween($uid, (string) $counterpartId), $now);

        if (! $appt || ! CallWindow::isOpen($appt, $now)) {
            $state = $appt ? $this->callState($appt, $now, $viewerTimezone) : null;
            throw new CallNotAllowedException($state['hint'] ?? __('app.calls.no_appointment'));
        }

        $role = CallWindow::roleIn($appt, $uid);
        $receiverId = CallWindow::counterpartOf($appt, $uid);
        $caller = $this->firestore->find($role === 'doctor' ? 'doctors' : 'patients', $uid) ?? [];
        $receiver = $this->firestore->find($role === 'doctor' ? 'patients' : 'doctors', $receiverId) ?? [];

        $this->closeStaleInvites($uid, $now);

        $callId = 'call_'.bin2hex(random_bytes(12));
        $this->firestore->createWithId('calls', $callId, [
            'id' => $callId,
            'appointmentId' => $appt['id'],
            'zegoCallId' => null, // set once the web invitation has its Zego call id
            'callerId' => $uid,
            'callerName' => $caller['name'] ?? '',
            'receiverId' => $receiverId,
            'receiverName' => $receiver['name'] ?? '',
            'callType' => $callType === 'audio' ? 'audio' : 'video',
            'status' => 'initiated',
            'source' => 'web',
            'roomId' => null,
            'duration' => 0,
            'createdAt' => FieldValue::serverTimestamp(),
            // Kept for the existing chat/call-history readers, which sort on these.
            'startTime' => FieldValue::serverTimestamp(),
            'endTime' => FieldValue::serverTimestamp(),
        ]);

        return ['callId' => $callId, 'appointment' => $appt, 'counterpartId' => $receiverId];
    }

    /** Records Zego's call id on our call, so the other side can find it. */
    public function attachZegoCallId(string $uid, string $callId, string $zegoCallId): void
    {
        $call = $this->firestore->find('calls', $callId);
        if ($call && ($call['callerId'] ?? null) === $uid && empty($call['zegoCallId'])) {
            $this->firestore->update('calls', $callId, ['zegoCallId' => $zegoCallId]);
        }
    }

    /** Both participants are in the call room: stamps connectedAt once. */
    public function connected(string $uid, array $ref): ?string
    {
        $callId = $this->findCallId($uid, $ref);
        if (! $callId) {
            return null;
        }

        $this->firestore->transaction(function (Transaction $t, $db) use ($callId) {
            $doc = $db->collection('calls')->document($callId);
            $call = $t->snapshot($doc)->data() ?? [];
            if (! empty($call['connectedAt']) || ! empty($call['endedAt'])) {
                return;
            }
            $t->set($doc, [
                'connectedAt' => FieldValue::serverTimestamp(),
                'startTime' => FieldValue::serverTimestamp(),
                'status' => 'ongoing',
            ], ['merge' => true]);
        });

        return $callId;
    }

    /**
     * The call is over (either side may report it; the first report wins).
     * Whether it counts as a consultation is decided by calls:process.
     */
    public function ended(string $uid, array $ref, ?string $reason): ?string
    {
        $callId = $this->findCallId($uid, $ref);
        if (! $callId) {
            return null;
        }

        $ended = false;
        $this->firestore->transaction(function (Transaction $t, $db) use ($callId, $uid, $reason, &$ended) {
            $doc = $db->collection('calls')->document($callId);
            $call = $t->snapshot($doc)->data() ?? [];
            if (! empty($call['endedAt'])) {
                return;
            }
            $ended = true;
            $connected = ! empty($call['connectedAt']);
            $t->set($doc, [
                'endedAt' => FieldValue::serverTimestamp(),
                'endTime' => FieldValue::serverTimestamp(),
                'status' => $connected ? 'completed' : ($reason === 'rejected' ? 'rejected' : 'missed'),
                'endedBy' => $uid,
                ...($connected ? ['evaluation' => 'pending'] : []),
            ], ['merge' => true]);
        });

        if ($ended) {
            // Display duration for the chat, from the two server timestamps.
            $call = $this->firestore->find('calls', $callId) ?? [];
            $connectedAt = AppointmentTime::toUtc($call['connectedAt'] ?? null);
            $endedAt = AppointmentTime::toUtc($call['endedAt'] ?? null);
            if ($connectedAt && $endedAt) {
                $this->firestore->update('calls', $callId, [
                    'duration' => max(0, $endedAt->getTimestamp() - $connectedAt->getTimestamp()),
                ]);
            }
        }

        return $callId;
    }

    /**
     * Reports that the other participant didn't join.
     *
     * @return bool false if this user had already reported it
     *
     * @throws CallNotAllowedException
     */
    public function reportNoShow(string $uid, string $appointmentId): bool
    {
        $appt = $this->appointmentFor($uid, $appointmentId);
        $now = Carbon::now('UTC');
        $window = CallWindow::isCallable($appt) ? CallWindow::for($appt) : null;

        if (! $window || $now->lt($window['reportFrom']) || $now->gt($window['reportUntil'])) {
            throw new CallNotAllowedException(__('app.calls.no_show_not_available'));
        }

        $calls = $this->callsFor($appointmentId);
        if ($this->hasConnectedCall($calls)) {
            throw new CallNotAllowedException(__('app.calls.no_show_call_connected'));
        }

        $reportId = $appointmentId.'_'.$uid;
        if ($this->firestore->find('noShowReports', $reportId)) {
            return false;
        }

        $this->firestore->createWithId('noShowReports', $reportId, [
            'appointmentId' => $appointmentId,
            'reporterId' => $uid,
            'reporterRole' => CallWindow::roleIn($appt, $uid),
            'reportedUserId' => CallWindow::counterpartOf($appt, $uid),
            'reportedAt' => FieldValue::serverTimestamp(),
            'callAttempted' => $this->attemptedBy($calls, $uid),
            'status' => 'active',
            'source' => 'web',
        ]);

        return true;
    }

    // ── helpers ──────────────────────────────────────────────────────────────

    public function callsFor(string $appointmentId): array
    {
        return $this->firestore->query('calls', [
            ['field' => 'appointmentId', 'op' => '=', 'value' => $appointmentId],
        ], null, null, null)['documents'] ?? [];
    }

    public function hasConnectedCall(array $calls): bool
    {
        foreach ($calls as $call) {
            if (! empty($call['connectedAt'])) {
                return true;
            }
        }

        return false;
    }

    private function attemptedBy(array $calls, string $uid): bool
    {
        foreach ($calls as $call) {
            if (($call['callerId'] ?? null) === $uid) {
                return true;
            }
        }

        return false;
    }

    /** @throws CallNotAllowedException */
    private function appointmentFor(string $uid, string $appointmentId): array
    {
        $appt = $this->firestore->find('appointments', $appointmentId);
        if (! $appt || ! CallWindow::roleIn($appt, $uid)) {
            throw new CallNotAllowedException(__('app.flash.appointment_not_found'));
        }

        return ['id' => $appointmentId] + $appt;
    }

    private function appointmentsBetween(string $uid, string $counterpartId): array
    {
        if ($counterpartId === '') {
            return [];
        }

        $docs = [];
        foreach ([['patientId', 'doctorId'], ['doctorId', 'patientId']] as [$me, $them]) {
            $docs = array_merge($docs, $this->firestore->query('appointments', [
                ['field' => $me, 'op' => '=', 'value' => $uid],
                ['field' => $them, 'op' => '=', 'value' => $counterpartId],
            ], null, null, null)['documents'] ?? []);
        }

        return $docs;
    }

    private function callState(?array $appt, Carbon $now, ?string $viewerTimezone): ?array
    {
        $window = $appt && CallWindow::isCallable($appt) ? CallWindow::for($appt) : null;
        if (! $window) {
            return null;
        }

        $opens = $this->label($window['opensAt'], $now, $viewerTimezone);
        $closes = $this->label($window['closesAt'], $now, $viewerTimezone);

        return [
            'appointmentId' => $appt['id'],
            'startUtc' => $window['start']->getTimestampMs(),
            'endUtc' => $window['end']->getTimestampMs(),
            'opensAt' => $window['opensAt']->getTimestampMs(),
            'closesAt' => $window['closesAt']->getTimestampMs(),
            'opensLabel' => $opens,
            'closesLabel' => $closes,
            // Shown when calling isn't open, e.g. "Calling opens at 2:50 PM."
            'hint' => $now->lt($window['opensAt'])
                ? __('app.calls.opens_at', ['time' => $opens])
                : __('app.calls.closed_at', ['time' => $closes]),
        ];
    }

    private function reportState(?array $appt, string $uid): ?array
    {
        $window = $appt ? CallWindow::for($appt) : null;
        if (! $window) {
            return null;
        }

        $calls = $this->callsFor($appt['id']);
        if ($this->hasConnectedCall($calls)) {
            return null; // both joined: nothing to report
        }

        return [
            'appointmentId' => $appt['id'],
            'availableFrom' => $window['reportFrom']->getTimestampMs(),
            'availableUntil' => $window['reportUntil']->getTimestampMs(),
            'alreadyReported' => (bool) $this->firestore->find('noShowReports', $appt['id'].'_'.$uid),
            'callAttempted' => $this->attemptedBy($calls, $uid),
            'role' => CallWindow::roleIn($appt, $uid),
        ];
    }

    /** "2:50 PM" today in the viewer's timezone, otherwise "Oct 5, 2:50 PM". */
    private function label(Carbon $at, Carbon $now, ?string $timezone): string
    {
        $timezone = AppointmentTime::timezone($timezone);
        $local = $at->copy()->setTimezone($timezone);

        return $local->isSameDay($now->copy()->setTimezone($timezone))
            ? AppointmentTime::clock($local)
            : $local->translatedFormat('M j').', '.AppointmentTime::clock($local);
    }

    /** Our call id from {callId}, {zegoCallId}, or the latest open call from {callerId} to this user. */
    private function findCallId(string $uid, array $ref): ?string
    {
        foreach (array_filter([$ref['callId'] ?? null, $ref['zegoCallId'] ?? null]) as $id) {
            $call = $this->firestore->find('calls', (string) $id);
            if ($call && $this->participates($call, $uid)) {
                return (string) $id;
            }
        }

        if (! empty($ref['zegoCallId'])) {
            $match = $this->firestore->query('calls', [
                ['field' => 'zegoCallId', 'op' => '=', 'value' => (string) $ref['zegoCallId']],
            ], 1, null, null)['documents'][0] ?? null;
            if ($match && $this->participates($match, $uid)) {
                return $match['id'];
            }
        }

        if (! empty($ref['callerId'])) {
            $open = array_filter($this->firestore->query('calls', [
                ['field' => 'receiverId', 'op' => '=', 'value' => $uid],
                ['field' => 'callerId', 'op' => '=', 'value' => (string) $ref['callerId']],
            ], null, null, null)['documents'] ?? [], fn ($c) => in_array($c['status'] ?? '', CallWindow::OPEN_CALL_STATUSES, true));
            usort($open, fn ($a, $b) => (AppointmentTime::toUtc($b['createdAt'] ?? null)?->getTimestamp() ?? 0)
                <=> (AppointmentTime::toUtc($a['createdAt'] ?? null)?->getTimestamp() ?? 0));

            return $open[0]['id'] ?? null;
        }

        return null;
    }

    private function participates(array $call, string $uid): bool
    {
        return ($call['callerId'] ?? null) === $uid || ($call['receiverId'] ?? null) === $uid;
    }

    /** Earlier invitations from this caller that nobody answered are over. */
    private function closeStaleInvites(string $callerId, Carbon $now): void
    {
        $open = $this->firestore->query('calls', [
            ['field' => 'callerId', 'op' => '=', 'value' => $callerId],
            ['field' => 'status', 'op' => '=', 'value' => 'initiated'],
        ], null, null, null)['documents'] ?? [];

        foreach ($open as $call) {
            $created = AppointmentTime::toUtc($call['createdAt'] ?? null);
            if ($created && $created->lt($now->copy()->subMinutes(CallWindow::STALE_INVITE_MINUTES))) {
                $this->firestore->update('calls', $call['id'], [
                    'status' => 'missed',
                    'endedAt' => FieldValue::serverTimestamp(),
                    'endTime' => FieldValue::serverTimestamp(),
                ]);
            }
        }
    }
}
