<?php

namespace App\Console\Commands;

use App\Mail\AppointmentReminder;
use App\Services\FirestoreService;
use App\Support\AppointmentTime;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAppointmentReminders extends Command
{
    protected $signature = 'appointments:send-reminders';

    protected $description = 'Email patients whose appointment is ~24 h away (runs hourly, deduplicates via reminderSentAt)';

    public function __construct(private FirestoreService $firestore)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        // Target window: appointments starting between 23 h and 25 h from now
        $windowStart = Carbon::now('UTC')->addHours(23);
        $windowEnd = Carbon::now('UTC')->addHours(25);

        // The query uses the legacy `date` field (which has the Firestore index)
        // over a wider range, since older appointments stored only their calendar
        // date there; the exact UTC start decides who is actually due.
        $result = $this->firestore->paginatedQuery(
            collection: 'appointments',
            filters: [
                ['field' => 'date', 'op' => '>=', 'value' => $windowStart->copy()->subDay()],
                ['field' => 'date', 'op' => '<=', 'value' => $windowEnd->copy()->addDay()],
                ['field' => 'status', 'op' => 'in', 'value' => ['pending', 'confirmed']],
            ],
            limit: 500,
            orderByField: 'date',
            orderByDirection: 'ASC'
        );

        $appointments = array_filter($result['documents'] ?? [], function ($appt) use ($windowStart, $windowEnd) {
            $start = AppointmentTime::startUtc($appt);

            return AppointmentTime::isCanonical($appt)
                && $start
                && $start->between($windowStart, $windowEnd);
        });

        if (empty($appointments)) {
            $this->info('No appointments in the 24-h window — nothing to send.');

            return self::SUCCESS;
        }

        $sent = 0;
        foreach ($appointments as $appt) {
            // Skip if reminder was already sent for this appointment
            if (! empty($appt['reminderSentAt'])) {
                continue;
            }
            $patient = $this->firestore->find('patients', $appt['patientId']);

            $email = $patient['email'] ?? null;
            if (! $email) {
                $this->warn('No email — skipped.');

                continue;
            }

            $appt['id'] = $appt['documentId'] ?? $appt['id'] ?? '';

            try {
                Mail::to($email)->send(new AppointmentReminder($appt));

                $this->firestore->update('appointments', $appt['id'], [
                    'reminderSentAt' => now()->toDateTimeString(),
                    'updatedAt' => now()->toDateTimeString(),
                ]);

                $sent++;
                $this->info("Reminder sent → {$email} (appt {$appt['id']})");
            } catch (\Throwable $e) {
                Log::error('appointment-reminder-failed', [
                    'appointment' => $appt['id'],
                    'email' => $email,
                    'error' => $e->getMessage(),
                ]);
                $this->error("Failed for {$appt['id']}: {$e->getMessage()}");
            }
        }

        $this->info("Reminders sent: {$sent} / ".count($appointments));

        return self::SUCCESS;
    }
}
