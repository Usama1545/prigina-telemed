<?php

namespace App\Console\Commands;

use App\Services\FirestoreService;
use App\Support\AppointmentTime;
use App\Support\LegacyAppointmentTime;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 * Moves appointments written before the UTC time model onto it
 * (timeModelVersion 2). Dry run by default: it only writes a CSV report.
 *
 *   php artisan appointments:migrate-times                  # report only
 *   php artisan appointments:migrate-times --apply          # upcoming, high confidence
 *   php artisan appointments:migrate-times --apply --low-confidence --historical
 */
class MigrateAppointmentTimes extends Command
{
    protected $signature = 'appointments:migrate-times
        {--apply : Write the changes (otherwise only report)}
        {--low-confidence : Also apply appointments resolved with low confidence}
        {--historical : Also apply past, completed and cancelled appointments}
        {--id=* : Only these appointment ids}';

    protected $description = 'Recalculate startTimeUTC/endTimeUTC for appointments created before the UTC time model';

    public function __construct(private FirestoreService $firestore)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $apply = (bool) $this->option('apply');
        $onlyIds = $this->option('id');
        $now = Carbon::now('UTC');
        $doctors = [];

        $reportPath = storage_path('app/appointment-time-migration-'.$now->format('Ymd-His').'.csv');
        $report = fopen($reportPath, 'w');
        fputcsv($report, [
            'id', 'status', 'action', 'confidence', 'rules', 'reason',
            'doctorTimezone', 'patientTimezone', 'old_date', 'old_startTime', 'old_endTime', 'old_startTimeUTC',
            'new_startTimeUTC', 'new_endTimeUTC', 'doctor_local', 'patient_local',
        ]);

        $counts = [];

        foreach ($this->firestore->each('appointments') as $id => $appointment) {
            if ($onlyIds && ! in_array($id, $onlyIds, true)) {
                continue;
            }
            if (AppointmentTime::isCanonical($appointment)) {
                $counts['already migrated'] = ($counts['already migrated'] ?? 0) + 1;

                continue;
            }

            $doctorId = $appointment['doctorId'] ?? '';
            $doctors[$doctorId] ??= $this->firestore->find('doctors', $doctorId) ?? [];

            $timezoneNote = '';
            $doctorTimezone = $appointment['doctorTimezone'] ?? null;
            if (! $doctorTimezone || AppointmentTime::timezone($doctorTimezone) !== $doctorTimezone) {
                $doctorTimezone = $doctors[$doctorId]['timezone'] ?? 'UTC';
                $timezoneNote = 'doctorTimezone taken from the doctor profile; ';
            }
            $patientTimezone = $appointment['patientTimezone'] ?? 'UTC';

            $result = LegacyAppointmentTime::resolve($appointment, $doctorTimezone);
            $action = $this->decide($appointment, $result, $now);

            $new = $result['resolved'] ? AppointmentTime::buildFields($result['start'], $result['end'], $doctorTimezone, $patientTimezone) : null;

            if ($apply && $action === 'apply') {
                $this->write($id, $appointment, $result, $new, $now);
                $action = 'applied';
            }

            $counts[$action] = ($counts[$action] ?? 0) + 1;

            fputcsv($report, [
                $id,
                $appointment['status'] ?? '',
                $action,
                $result['confidence'] ?? '',
                implode('+', $result['rules'] ?? []),
                $timezoneNote.($result['reason'] ?? ''),
                $doctorTimezone,
                $patientTimezone,
                (string) AppointmentTime::toUtc($appointment['date'] ?? null)?->toIso8601ZuluString(),
                $appointment['startTime'] ?? '',
                $appointment['endTime'] ?? '',
                (string) AppointmentTime::toUtc($appointment['startTimeUTC'] ?? null)?->toIso8601ZuluString(),
                $new ? $new['startTimeUTC']->toIso8601ZuluString() : '',
                $new ? $new['endTimeUTC']->toIso8601ZuluString() : '',
                $new ? $new['doctorLocalDate'].' '.$new['doctorLocalTime'].' '.$doctorTimezone : '',
                $new ? $new['patientLocalTime'].' '.$patientTimezone : '',
            ]);
        }

        fclose($report);

        foreach ($counts as $label => $count) {
            $this->line(str_pad($label, 28).$count);
        }
        $this->info("Report: {$reportPath}");
        if (! $apply) {
            $this->warn('Dry run: nothing was written. Review the report, then re-run with --apply.');
        }

        return self::SUCCESS;
    }

    /** apply | skip: <why> | flag: <why> */
    private function decide(array $appointment, array $result, Carbon $now): string
    {
        if (! $result['resolved']) {
            return 'flag: unresolved';
        }
        if ($result['confidence'] === LegacyAppointmentTime::LOW && ! $this->option('low-confidence')) {
            return 'flag: low confidence';
        }

        $upcoming = ! AppointmentTime::isReleased($appointment)
            && ($appointment['status'] ?? '') !== 'completed'
            && $result['end']->gt($now);

        if (! $upcoming && ! $this->option('historical')) {
            return 'skip: historical';
        }

        return 'apply';
    }

    private function write(string $id, array $appointment, array $result, array $fields, Carbon $now): void
    {
        $legacy = [];
        foreach (['date', 'startTime', 'endTime', 'startTimeUTC', 'endTimeUTC', 'patientLocalTime', 'doctorLocalTime', 'doctorTimezone', 'patientTimezone'] as $key) {
            $legacy[$key] = $appointment[$key] ?? null;
        }

        $this->firestore->update('appointments', $id, [
            ...$fields,
            'legacyTime' => $legacy,
            'timeMigration' => [
                'rules' => $result['rules'],
                'confidence' => $result['confidence'],
                'migratedAt' => $now,
            ],
        ]);

        // Give upcoming appointments a slot lock so new bookings can't take their slot.
        if (AppointmentTime::holdsSlot($appointment, $now) && $result['end']->gt($now)) {
            $lockId = AppointmentTime::slotLockId($appointment['doctorId'] ?? '', $result['start']);
            $existing = $this->firestore->find(AppointmentTime::SLOT_LOCKS, $lockId);

            if ($existing && ($existing['appointmentId'] ?? null) !== $id) {
                $this->error("Double booking: {$id} and {$existing['appointmentId']} both hold {$lockId}");

                return;
            }

            $this->firestore->update(AppointmentTime::SLOT_LOCKS, $lockId, [
                'appointmentId' => $id,
                'doctorId' => $appointment['doctorId'] ?? '',
                'startTimeUTC' => $result['start'],
                'endTimeUTC' => $result['end'],
                'holdExpiresAt' => AppointmentTime::unpaidHoldExpiresAt($appointment),
                'createdAt' => $now,
            ]);
        }
    }
}
