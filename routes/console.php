<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('appointments:send-reminders')->hourly();
Schedule::command('reviews:send-reminders')->dailyAt('10:00');
