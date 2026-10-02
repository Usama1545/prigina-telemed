<?php

namespace App\Http\Controllers;

use App\Exceptions\CallNotAllowedException;
use App\Services\AppointmentCallService;
use App\Services\FirestoreService;
use Illuminate\Http\Request;

/**
 * Browser endpoints for appointment calls and no-show reports, for patients
 * and doctors. The rules live in AppointmentCallService.
 */
class CallController extends Controller
{
    public function __construct(protected AppointmentCallService $calls) {}

    /** Call button / no-show state for ?appointment=ID or the chat ?conversation=ID. */
    public function access(Request $request)
    {
        $user = current_user();

        $counterpartId = null;
        if ($conversationId = $request->query('conversation')) {
            $conversation = app(FirestoreService::class)->find('conversations', (string) $conversationId);
            $participants = [$conversation['patientId'] ?? null, $conversation['doctorId'] ?? null];
            if (! $conversation || ! in_array($user['uid'], $participants, true)) {
                return response()->json(['message' => __('app.chat.select_conversation')], 404);
            }
            $counterpartId = $participants[0] === $user['uid'] ? $participants[1] : $participants[0];
        }

        try {
            return response()->json($this->calls->access(
                $user['uid'],
                $counterpartId ? null : $request->query('appointment'),
                $counterpartId,
                $user['timezone'] ?? null,
            ));
        } catch (CallNotAllowedException $e) {
            return response()->json(['message' => $e->getMessage()], 404);
        }
    }

    public function attachZego(Request $request, string $callId)
    {
        $validated = $request->validate(['zegoCallId' => 'required|string|max:200']);
        $this->calls->attachZegoCallId(current_user()['uid'], $callId, $validated['zegoCallId']);

        return response()->json(['success' => true]);
    }

    public function connected(Request $request)
    {
        $callId = $this->calls->connected(current_user()['uid'], $this->callRef($request));

        return response()->json(['success' => (bool) $callId, 'callId' => $callId]);
    }

    public function ended(Request $request)
    {
        $reason = $request->input('reason');
        $callId = $this->calls->ended(current_user()['uid'], $this->callRef($request), is_string($reason) ? $reason : null);

        return response()->json(['success' => (bool) $callId, 'callId' => $callId]);
    }

    public function reportNoShow(string $appointmentId)
    {
        try {
            $created = $this->calls->reportNoShow(current_user()['uid'], $appointmentId);
        } catch (CallNotAllowedException $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }

        return response()->json([
            'success' => true,
            'alreadyReported' => ! $created,
            'message' => __('app.calls.no_show_reported'),
        ]);
    }

    private function callRef(Request $request): array
    {
        return array_map(
            fn ($v) => is_string($v) ? $v : null,
            $request->only(['callId', 'zegoCallId', 'callerId']),
        );
    }
}
