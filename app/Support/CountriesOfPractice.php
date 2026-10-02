<?php

namespace App\Support;

use Carbon\Carbon;
use Carbon\CarbonInterface;

/**
 * A doctor's Countries of Practice: one entry per country, each with its
 * medical licence. Mirrored by lib/utils/countries_of_practice.dart in the
 * Flutter app — keep the two in step.
 *
 * Doctor document fields:
 *  - countriesOfPractice: list of entries:
 *      id, country (ISO 3166 alpha-2), licensingAuthority, licenseNumber,
 *      licenseExpiry ("YYYY-MM-DD" or null), documentUrl (or null),
 *      status (pending | approved | rejected), submittedAt, reviewedAt,
 *      reviewedBy, rejectionReason
 *  - practiceCountryCodes: the approved countries, for filtering doctor lists
 *    (pending ones stay hidden until an admin approves them)
 *  - hasPendingPracticeCountries: for the admin review queue
 *  - practiceCountry / licenseNumber / documentUrls.medical_license: kept for
 *    older app versions and existing screens, copied from the main entry
 *
 * Licence numbers are reserved in doctor_licenses/{licenseKey()} so the same
 * number can't be registered twice in one country.
 */
final class CountriesOfPractice
{
    public const FIELD = 'countriesOfPractice';

    public const PENDING = 'pending';

    public const APPROVED = 'approved';

    public const REJECTED = 'rejected';

    /** Cleans one entry from a form or the database. */
    public static function normalize(array $entry): array
    {
        $expiry = trim((string) ($entry['licenseExpiry'] ?? ''));

        return [
            'id' => (string) ($entry['id'] ?? '') ?: self::newId(),
            'country' => strtoupper(trim((string) ($entry['country'] ?? ''))),
            'licensingAuthority' => trim((string) ($entry['licensingAuthority'] ?? '')),
            'licenseNumber' => trim((string) ($entry['licenseNumber'] ?? '')),
            'licenseExpiry' => preg_match('/^\d{4}-\d{2}-\d{2}$/', $expiry) ? $expiry : null,
            'documentUrl' => ($entry['documentUrl'] ?? null) ?: null,
            'status' => in_array($entry['status'] ?? null, [self::APPROVED, self::REJECTED], true)
                ? $entry['status'] : self::PENDING,
            'submittedAt' => $entry['submittedAt'] ?? null,
            'reviewedAt' => $entry['reviewedAt'] ?? null,
            'reviewedBy' => $entry['reviewedBy'] ?? null,
            'rejectionReason' => (string) ($entry['rejectionReason'] ?? ''),
        ];
    }

    public static function newId(): string
    {
        return bin2hex(random_bytes(8));
    }

    /** The doctor's entries, normalized. */
    public static function of(array $doctor): array
    {
        return array_map([self::class, 'normalize'], array_values($doctor[self::FIELD] ?? []));
    }

    /** The entry the legacy single-country fields mirror: the first approved one, else the first. */
    public static function primary(array $entries): ?array
    {
        foreach ($entries as $entry) {
            if (($entry['status'] ?? null) === self::APPROVED) {
                return $entry;
            }
        }

        return $entries[0] ?? null;
    }

    /**
     * Every field to write alongside the entries. Merge into the doctor
     * update; it includes the entries themselves.
     */
    public static function fields(array $entries): array
    {
        $entries = array_values(array_map([self::class, 'normalize'], $entries));
        $primary = self::primary($entries);

        $approved = [];
        $pending = false;
        foreach ($entries as $entry) {
            if ($entry['status'] === self::APPROVED && $entry['country'] !== '') {
                $approved[$entry['country']] = true;
            }
            $pending = $pending || $entry['status'] === self::PENDING;
        }

        $fields = [
            self::FIELD => $entries,
            'practiceCountryCodes' => array_keys($approved),
            'hasPendingPracticeCountries' => $pending,
            'practiceCountry' => $primary['country'] ?? '',
            'licenseNumber' => $primary['licenseNumber'] ?? '',
        ];
        if ($primary && $primary['documentUrl']) {
            $fields['documentUrls'] = ['medical_license' => $primary['documentUrl']];
        }

        return $fields;
    }

    /**
     * An entry built from a doctor's old single-country fields, or null if
     * there's nothing to build from. Approved if the doctor is verified.
     */
    public static function fromLegacy(array $doctor): ?array
    {
        $country = trim((string) ($doctor['practiceCountry'] ?? ''));
        $number = trim((string) ($doctor['licenseNumber'] ?? ''));
        if ($country === '' && $number === '') {
            return null;
        }

        $verified = ($doctor['isVerified'] ?? false) === true;

        return self::normalize([
            // Fixed id: built afresh on every read until the doctor is migrated or saves.
            'id' => 'legacy',
            'country' => $country,
            'licenseNumber' => $number,
            'documentUrl' => $doctor['documentUrls']['medical_license'] ?? null,
            'status' => $verified ? self::APPROVED : self::PENDING,
            'submittedAt' => $doctor['documentsUploadedAt'] ?? $doctor['createdAt'] ?? null,
            'reviewedAt' => $verified ? ($doctor['verifiedAt'] ?? null) : null,
        ]);
    }

    /**
     * The doctor's entries after editing them in the profile. Each submitted
     * entry carries the id of the saved entry it edits (or a new id) and a
     * documentUrl only when a new document was uploaded. Unchanged entries
     * keep their review status; new or changed ones go back to pending admin
     * review. Entries not submitted are removed. Appointments are unaffected.
     */
    public static function merge(array $existing, array $submitted, mixed $now): array
    {
        $saved = [];
        foreach ($existing as $entry) {
            $entry = self::normalize($entry);
            $saved[$entry['id']] = $entry;
        }

        $merged = [];
        foreach ($submitted as $input) {
            $old = $saved[$input['id'] ?? ''] ?? null;
            $entry = self::normalize([
                ...($old ?? []),
                'id' => $old['id'] ?? self::newId(),
                'country' => $input['country'] ?? '',
                'licensingAuthority' => $input['licensingAuthority'] ?? '',
                'licenseNumber' => $input['licenseNumber'] ?? '',
                'licenseExpiry' => $input['licenseExpiry'] ?? null,
                'documentUrl' => ($input['documentUrl'] ?? null) ?: ($old['documentUrl'] ?? null),
            ]);

            $changed = ! $old
                || ! empty($input['documentUrl'])
                || $entry['country'] !== $old['country']
                || $entry['licensingAuthority'] !== $old['licensingAuthority']
                || $entry['licenseNumber'] !== $old['licenseNumber']
                || $entry['licenseExpiry'] !== $old['licenseExpiry'];

            if ($changed) {
                $entry['status'] = self::PENDING;
                $entry['submittedAt'] = $now;
                $entry['reviewedAt'] = null;
                $entry['rejectionReason'] = '';
            }
            $merged[] = $entry;
        }

        return $merged;
    }

    /**
     * An admin's decision on one entry: approved, or rejected with a reason.
     *
     * @throws \InvalidArgumentException if the entry doesn't exist
     */
    public static function review(array $entries, string $entryId, string $decision, string $reason, mixed $now, ?string $reviewer): array
    {
        $found = false;
        $entries = array_map(function ($entry) use ($entryId, $decision, $reason, $now, $reviewer, &$found) {
            $entry = self::normalize($entry);
            if ($entry['id'] !== $entryId) {
                return $entry;
            }
            $found = true;

            return [
                ...$entry,
                'status' => $decision === self::APPROVED ? self::APPROVED : self::REJECTED,
                'rejectionReason' => $decision === self::APPROVED ? '' : trim($reason),
                'reviewedAt' => $now,
                'reviewedBy' => $reviewer,
            ];
        }, $entries);

        if (! $found) {
            throw new \InvalidArgumentException("No Country of Practice entry {$entryId}");
        }

        return $entries;
    }

    /** Approving a doctor approves their pending entries (rejected ones stay rejected). */
    public static function approvePending(array $entries, mixed $now, ?string $reviewer): array
    {
        return array_map(function ($entry) use ($now, $reviewer) {
            $entry = self::normalize($entry);

            return $entry['status'] === self::PENDING
                ? [...$entry, 'status' => self::APPROVED, 'reviewedAt' => $now, 'reviewedBy' => $reviewer]
                : $entry;
        }, $entries);
    }

    /** Whether any entry's licence has expired (flagged to admins). */
    public static function hasExpired(array $entries, ?CarbonInterface $today = null): bool
    {
        foreach ($entries as $entry) {
            if (self::isExpired(self::normalize($entry), $today)) {
                return true;
            }
        }

        return false;
    }

    /** doctor_licenses keys used by $before but no longer by $after. */
    public static function releasedLicenseKeys(array $before, array $after): array
    {
        $keys = fn (array $entries) => array_map(
            fn ($e) => self::licenseKey($e['country'] ?? '', $e['licenseNumber'] ?? ''),
            array_filter($entries, fn ($e) => ($e['country'] ?? '') !== '' && ($e['licenseNumber'] ?? '') !== ''),
        );

        return array_values(array_diff($keys($before), $keys($after)));
    }

    /** True once the licence's expiry date has passed (flagged to admins, not enforced). */
    public static function isExpired(array $entry, ?CarbonInterface $today = null): bool
    {
        $expiry = $entry['licenseExpiry'] ?? null;
        if (! $expiry) {
            return false;
        }
        $today ??= Carbon::now('UTC');

        return $expiry < $today->format('Y-m-d');
    }

    /** Licensing details still missing (e.g. entries migrated from the old fields). */
    public static function isIncomplete(array $entry): bool
    {
        return $entry['country'] === '' || $entry['licensingAuthority'] === '' || $entry['licenseNumber'] === '';
    }

    /** doctor_licenses document id: the same number may exist in different countries. */
    public static function licenseKey(string $country, string $licenseNumber): string
    {
        $number = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $licenseNumber));

        return strtoupper(trim($country)).'_'.$number;
    }
}
