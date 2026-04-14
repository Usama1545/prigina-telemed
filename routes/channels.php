<?php
use Illuminate\Support\Facades\Broadcast;

//todo change to user id
Broadcast::channel('chat.{userId}', function ($user = null, $userId) {
    $current = current_user();
    dd($current);

    if (!$current || !isset($current['uid'])) {
        return false;
    }

    return (string) $current['uid'] === (string) $userId;
});