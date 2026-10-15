<?php

namespace App\Console\Commands;

use App\Services\CallOutcomeService;
use Illuminate\Console\Command;

/**
 * Safety net (hourly, routes/console.php). Calls are normally handled the
 * moment they connect or end, through the Firestore trigger → webhook
 * (CallWebhookController). This catches what no event signals: calls never
 * ended because an app closed mid-call, and anything a failed webhook missed.
 */
class ProcessAppointmentCalls extends Command
{
    protected $signature = 'calls:process';

    protected $description = 'Close abandoned calls and catch up on call outcomes and no-show voids that a webhook missed';

    public function handle(CallOutcomeService $outcomes): int
    {
        $result = $outcomes->sweep();

        $this->info("Abandoned calls closed: {$result['closed']}, calls judged: {$result['evaluated']}, no-show reports voided: {$result['voided']}");

        return self::SUCCESS;
    }
}
