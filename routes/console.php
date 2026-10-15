<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('appointments:send-reminders')->hourly();
Schedule::command('reviews:send-reminders')->dailyAt('10:00');
// Calls are handled the moment they connect or end (Firestore trigger → api
// /calls/{id}/changed); this hourly sweep only closes calls that never ended
// and catches up on any webhook that failed.
Schedule::command('calls:process')->hourly();
