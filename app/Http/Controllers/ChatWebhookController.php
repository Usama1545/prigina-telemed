<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NewMessageEvent;
use App\Events\NewAppointmentEvent;

class ChatWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // 🔥 broadcast event for frontend
        broadcast(new NewMessageEvent($request->all()))->toOthers();

        return response()->json(['success' => true]);
    }

    public function appointment(Request $request)
    {
        broadcast(
            new NewAppointmentEvent($request->all())
        )->toOthers();

        return response()->json([
            'success' => true
        ]);
    }
}
