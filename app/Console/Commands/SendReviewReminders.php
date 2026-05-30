<?php

namespace App\Console\Commands;

use App\Mail\ReviewRequest;
use App\Services\FirestoreService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendReviewReminders extends Command
{
    protected $signature   = 'reviews:send-reminders';
    protected $description = 'Send 2nd and 3rd review-request follow-ups (24h apart) until patient reviews';

    public function __construct(private FirestoreService $firestore)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        // Fetch completed appointments from the last 4 days to keep the scan tight
        $since = Carbon::now()->subDays(4);

        $appointments = $this->fetchCompleted($since);

        if (empty($appointments)) {
            $this->info('No completed appointments in window — nothing to do.');
            return self::SUCCESS;
        }

        $cutoff = Carbon::now()->subHours(24);
        $sent   = 0;

        foreach ($appointments as $appt) {
            // Skip already-reviewed
            if (! empty($appt['reviewSubmitted'])) {
                continue;
            }

            $count       = (int) ($appt['reviewReminderCount'] ?? 0);
            $lastSentRaw = $appt['lastReviewEmailAt'] ?? null;

            // Only process 2nd and 3rd reminders here (1st is sent inline on status change)
            if ($count < 1 || $count >= 3) {
                continue;
            }

            if (! $lastSentRaw) {
                continue;
            }

            $lastSent = $this->parseTimestamp($lastSentRaw);
            if (! $lastSent || $lastSent->greaterThan($cutoff)) {
                continue; // Not yet 24 h since the last email
            }

            $email = $appt['patientEmail'] ?? null;
            if (! $email) {
                $this->warn("Appointment {$appt['documentId']} has no patientEmail — skipped.");
                continue;
            }

            $appt['id'] = $appt['documentId'] ?? $appt['id'] ?? '';

            try {
                Mail::to($email)->send(new ReviewRequest($appt));

                $newCount = $count + 1;
                $this->firestore->update('appointments', $appt['id'], [
                    'reviewReminderCount' => $newCount,
                    'lastReviewEmailAt'   => now()->toDateTimeString(),
                    'updatedAt'           => now()->toDateTimeString(),
                ]);

                $this->info("Sent reminder #{$newCount} → {$email} (appt {$appt['id']})");
                $sent++;
            } catch (\Throwable $e) {
                Log::error('review-reminder-failed', [
                    'appointment' => $appt['id'] ?? '',
                    'email'       => $email,
                    'error'       => $e->getMessage(),
                ]);
                $this->error("Failed for {$appt['id']}: {$e->getMessage()}");
            }
        }

        $this->info("Review reminders sent: {$sent}");
        return self::SUCCESS;
    }

    /**
     * Fetch completed/completedPaid appointments since $since.
     * Two separate queries to avoid needing an `in` composite index.
     */
    private function fetchCompleted(Carbon $since): array
    {
        $filters = [
            ['field' => 'completedAt', 'op' => '>=', 'value' => $since->toDateTimeString()],
        ];

        $a = $this->firestore->paginatedQuery(
            collection: 'appointments',
            filters: array_merge($filters, [['field' => 'status', 'op' => '=', 'value' => 'completed']]),
            limit: 500,
            orderByField: 'completedAt',
            orderByDirection: 'DESC'
        )['documents'] ?? [];

        $b = $this->firestore->paginatedQuery(
            collection: 'appointments',
            filters: array_merge($filters, [['field' => 'status', 'op' => '=', 'value' => 'completedPaid']]),
            limit: 500,
            orderByField: 'completedAt',
            orderByDirection: 'DESC'
        )['documents'] ?? [];

        return array_merge($a, $b);
    }

    private function parseTimestamp(mixed $value): ?Carbon
    {
        if ($value instanceof \Google\Cloud\Firestore\Timestamp) {
            return Carbon::instance($value->toDateTime());
        }
        if (is_string($value) || is_numeric($value)) {
            try {
                return Carbon::parse($value);
            } catch (\Throwable) {
                return null;
            }
        }
        return null;
    }
}
