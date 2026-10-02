<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CallOutcomeService;
use Illuminate\Http\Request;

/**
 * Called by the Firestore `calls` trigger (functions/index.js,
 * onCallStateChanged) when a call connects or ends, so its outcome and any
 * no-show reports are handled straight away.
 */
class CallWebhookController extends Controller
{
    public function changed(Request $request, CallOutcomeService $outcomes, string $callId)
    {
        $secret = (string) config('services.calls_webhook.secret');
        if ($secret === '' || ! hash_equals($secret, (string) $request->header('X-Webhook-Secret'))) {
            abort(401);
        }

        return response()->json(['success' => true, ...$outcomes->process($callId)]);
    }
}
