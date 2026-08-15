<?php

namespace App\Console\Commands;

use App\Services\FirestoreService;
use Illuminate\Console\Command;

class CleanTestData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:clean-test-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function handle()
    {
        $firestore = app(FirestoreService::class);

        $collecions = [
            'appointments',
            'calls',
            'doctor_activities',
            'doctor_licenses',
            'doctor_revenue',
            'doctors',
            'medical_records',
            'messages',
            'notifications',
            'patients',
            'reviews',
            'second_opinion_reports',
            'support_tickets',
            'user_tokens',
            'users',
        ];

        if (! $this->confirm('This will delete testing data. Continue?')) {
            return self::FAILURE;
        }

        foreach ($collecions as $collection) {
            try {
                $data = $firestore->get($collection);

                array_pop($data); // spare last document

                foreach ($data as $doc) {
                    try {
                        $docId = $doc['id'] ?? null;

                        if (! $docId) {
                            continue;
                        }

                        $firestore->delete($collection, $docId);

                    } catch (\Throwable $e) {
                        $this->error(
                            "Error deleting document: collection={$collection}, id=".($docId ?? 'N/A')
                        );

                        $this->error($e->getMessage());

                        return self::FAILURE;
                    }
                }
            } catch (\Throwable $e) {
                $this->error("Error processing collection: {$collection}");
                $this->error($e->getMessage());

                return self::FAILURE;
            }
        }

        $this->info('Test data cleaned successfully.');

        return self::SUCCESS;
    }
}
