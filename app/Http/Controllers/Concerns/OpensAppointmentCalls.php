<?php

namespace App\Http\Controllers\Concerns;

use App\Exceptions\CallNotAllowedException;
use App\Services\AppointmentCallService;

/**
 * The web call pages (patient and doctor). A call page only opens inside the
 * appointment's call window; it first creates the call record (linked to the
 * appointment) that the page then reports connection and end to.
 */
trait OpensAppointmentCalls
{
    /**
     * @param  string|null  $conversationId  the chat the call was started from, or
     * @param  string|null  $appointmentId  the appointment it was started from
     */
    protected function openCallPage(?string $conversationId, ?string $appointmentId, string $callType, string $backUrl)
    {
        $user = current_user();
        if (! $user) {
            abort(403);
        }

        $counterpartId = null;
        if ($conversationId) {
            $conversation = $this->firestore->find('conversations', $conversationId);
            if (! $conversation || ! in_array($user['uid'], [$conversation['patientId'] ?? null, $conversation['doctorId'] ?? null], true)) {
                abort(404);
            }
            $counterpartId = ($conversation['patientId'] ?? null) === $user['uid']
                ? ($conversation['doctorId'] ?? '')
                : ($conversation['patientId'] ?? '');
        }

        try {
            $call = app(AppointmentCallService::class)->start(
                $user['uid'], $appointmentId, $counterpartId, $callType, $user['timezone'] ?? null,
            );
        } catch (CallNotAllowedException $e) {
            return redirect($backUrl)->with('error', $e->getMessage());
        }

        $remoteCollection = session('auth_role') === 'doctor' ? 'patients' : 'doctors';
        $remote = $this->firestore->find($remoteCollection, $call['counterpartId']) ?? [];

        return view($callType === 'audio' ? 'patient.voice-call' : 'patient.video-call', [
            'id' => $conversationId ?? $appointmentId,
            'callId' => $call['callId'],
            'appointmentId' => $call['appointment']['id'],
            'doctor' => ['uid' => $call['counterpartId']] + $remote, // the remote party on the call screen
            'user' => $user,
            'token' => generateZegoToken($user['uid']),
            'backUrl' => $backUrl,
        ]);
    }
}
