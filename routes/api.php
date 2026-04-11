<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatWebhookController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/chat/webhook', [ChatWebhookController::class, 'handle']);
Route::get('/test-broadcast', function () {
    broadcast(new \App\Events\NewMessageEvent([
        'messageId' => 'test123',
        'senderId' => 1,
        'receiverId' => auth()->id(),
        'text' => 'Test message working 🚀',
        'conversationId' => 'abc'
    ]));

    return 'sent';
});
