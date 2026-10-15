<?php

namespace App\Console\Commands;

use App\Services\FirestoreService;
use App\Support\CountriesOfPractice;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 * Gives every doctor who only has the old single practiceCountry/licenseNumber
 * a Countries of Practice list with that one entry (approved if the doctor is
 * already verified), and reserves the licence under its per-country key.
 * Dry run by default: it only writes a CSV report.
 *
 *   php artisan doctors:migrate-countries-of-practice           # report only
 *   php artisan doctors:migrate-countries-of-practice --apply
 */
class MigrateCountriesOfPractice extends Command
{
    protected $signature = 'doctors:migrate-countries-of-practice
        {--apply : Write the changes (otherwise only report)}';

    protected $description = 'Move doctors from the single practiceCountry to the Countries of Practice list';

    public function __construct(private FirestoreService $firestore)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $apply = (bool) $this->option('apply');
        $now = Carbon::now('UTC');

        $reportPath = storage_path('app/countries-of-practice-migration-'.$now->format('Ymd-His').'.csv');
        $report = fopen($reportPath, 'w');
        fputcsv($report, ['doctorId', 'name', 'action', 'country', 'licenseNumber', 'status', 'note']);

        $counts = [];
        foreach ($this->firestore->each('doctors') as $id => $doctor) {
            if (! empty($doctor[CountriesOfPractice::FIELD])) {
                $counts['already migrated'] = ($counts['already migrated'] ?? 0) + 1;

                continue;
            }

            $entry = CountriesOfPractice::fromLegacy($doctor);
            if (! $entry) {
                $this->row($report, $id, $doctor, 'skip', null, 'no practiceCountry or licenseNumber');
                $counts['skip'] = ($counts['skip'] ?? 0) + 1;

                continue;
            }

            $notes = [];
            if ($entry['country'] === '') {
                $notes[] = 'no country';
            }
            if ($entry['licenseNumber'] === '') {
                $notes[] = 'no licence number';
            }
            $notes[] = 'licensing authority and expiry to be added by the doctor';

            $conflict = null;
            if ($entry['country'] !== '' && $entry['licenseNumber'] !== '') {
                $key = CountriesOfPractice::licenseKey($entry['country'], $entry['licenseNumber']);
                $holder = $this->firestore->find('doctor_licenses', $key);
                if ($holder && ($holder['doctorId'] ?? null) !== $id) {
                    $conflict = "licence {$key} already held by {$holder['doctorId']}";
                    $notes[] = $conflict;
                }
            }

            $action = $apply ? 'migrated' : 'would migrate';
            if ($apply) {
                $this->firestore->update('doctors', $id, [
                    ...CountriesOfPractice::fields([$entry]),
                    'updatedAt' => $now,
                ]);
                if (isset($key) && ! $conflict) {
                    $this->firestore->update('doctor_licenses', $key, [
                        'doctorId' => $id,
                        'country' => $entry['country'],
                        'licenseNumber' => $entry['licenseNumber'],
                        'createdAt' => $now,
                    ]);
                }
            }
            unset($key);

            $this->row($report, $id, $doctor, $action, $entry, implode('; ', $notes));
            $counts[$action] = ($counts[$action] ?? 0) + 1;
        }

        fclose($report);

        foreach ($counts as $label => $count) {
            $this->line(str_pad($label, 20).$count);
        }
        $this->info("Report: {$reportPath}");
        if (! $apply) {
            $this->warn('Dry run: nothing was written. Review the report, then re-run with --apply.');
        }

        return self::SUCCESS;
    }

    private function row($report, string $id, array $doctor, string $action, ?array $entry, string $note): void
    {
        fputcsv($report, [
            $id,
            $doctor['name'] ?? '',
            $action,
            $entry['country'] ?? '',
            $entry['licenseNumber'] ?? '',
            $entry['status'] ?? '',
            $note,
        ]);
    }
}
