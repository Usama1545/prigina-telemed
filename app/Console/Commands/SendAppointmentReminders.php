<?php

namespace App\Console\Commands;

use App\Mail\AppointmentReminder;
use App\Services\FirestoreService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAppointmentReminders extends Command
{
    protected $signature   = 'appointments:send-reminders';
    protected $description = 'Email patients whose appointment is tomorrow';

    public function __construct(private FirestoreService $firestore)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $tomorrowStart = Carbon::tomorrow()->startOfDay();
        $tomorrowEnd   = Carbon::tomorrow()->endOfDay();

        $result = $this->firestore->paginatedQuery(
            collection: 'appointments',
            filters: [
                ['field' => 'date', 'op' => '>=', 'value' => $tomorrowStart],
                ['field' => 'date', 'op' => '<=', 'value' => $tomorrowEnd],
                ['field' => 'status', 'op' => 'in', 'value' => ['pending', 'confirmed']],
            ],
            limit: 500,
            orderByField: 'date',
            orderByDirection: 'ASC'
        );

        $appointments = $result['documents'] ?? [];

        if (empty($appointments)) {
            $this->info('No appointments tomorrow — nothing to send.');
            return self::SUCCESS;
        }

        $sent = 0;
        foreach ($appointments as $appt) {
            $email = $appt['patientEmail'] ?? null;
            if (! $email) {
                $this->warn("Appointment {$appt['documentId']} has no patientEmail — skipped.");
                continue;
            }

            // Normalise id so the reminder view can use it
            $appt['id'] = $appt['documentId'] ?? $appt['id'] ?? '';

            try {
                Mail::to($email)->send(new AppointmentReminder($appt));
                $sent++;
            } catch (\Throwable $e) {
                Log::error('appointment-reminder-failed', [
                    'appointment' => $appt['id'],
                    'email'       => $email,
                    'error'       => $e->getMessage(),
                ]);
                $this->error("Failed for {$appt['id']}: {$e->getMessage()}");
            }
        }

        $this->info("Reminders sent: {$sent} / " . count($appointments));
        return self::SUCCESS;
    }
}
