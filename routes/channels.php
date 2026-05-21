<?php
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{userId}', function ($user = null, $userId) {
    $current = current_user();

    if (!$current || !isset($current['uid'])) {
        return false;
    }

    return (string) $current['uid'] === (string) $userId;
});

Broadcast::channel('appointments.{doctorId}', function ($user = null, $doctorId) {

    $current = current_user();

    if (!$current || !isset($current['uid'])) {
        return false;
    }

    return (string) $current['uid'] === (string) $doctorId;
});