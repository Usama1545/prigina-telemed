<?php
use Illuminate\Support\Facades\Broadcast;

//todo change to user id
Broadcast::channel('chat.22', function ($user, $userId) {
    return (string) $user->id === (string) $userId;
});