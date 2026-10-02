<?php

namespace App\Services;

use App\Support\CountriesOfPractice;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\ValidationException;

/**
 * Saving a doctor's Countries of Practice from the web forms (sign-up and
 * profile). The rules for the data itself live in App\Support\CountriesOfPractice.
 */
class CountriesOfPracticeService
{
    public const MAX_ENTRIES = 10;

    public function __construct(protected FirestoreService $firestore) {}

    /**
     * Validation rules for the "practice" form array. With $documentRequired
     * false (profile edits), entries that already have a document may omit it.
     */
    public function rules(bool $documentRequired = true): array
    {
        return [
            'practice' => 'required|array|min:1|max:'.self::MAX_ENTRIES,
            'practice.*.id' => 'nullable|string|max:40',
            'practice.*.country' => 'required|string|size:2|distinct:ignore_case',
            'practice.*.licensingAuthority' => 'required|string|max:200',
            'practice.*.licenseNumber' => 'required|string|max:100',
            'practice.*.licenseExpiry' => 'nullable|date_format:Y-m-d',
            'practice.*.document' => ($documentRequired ? 'required' : 'nullable').'|file|mimes:jpg,jpeg,png,pdf|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'practice.*.country.distinct' => __('app.countries_of_practice.duplicate_country'),
        ];
    }

    /**
     * Fails validation if any licence number is already registered to
     * another doctor in the same country.
     *
     * @throws ValidationException
     */
    public function assertLicensesAvailable(array $practice, ?string $doctorId): void
    {
        $errors = [];
        foreach (array_values($practice) as $i => $entry) {
            $country = strtoupper(trim((string) ($entry['country'] ?? '')));
            $number = trim((string) ($entry['licenseNumber'] ?? ''));
            if ($country === '' || $number === '') {
                continue;
            }

            $holder = $this->firestore->find('doctor_licenses', CountriesOfPractice::licenseKey($country, $number));
            if ($holder && ($holder['doctorId'] ?? null) !== $doctorId) {
                $errors["practice.$i.licenseNumber"] = __('app.countries_of_practice.license_taken', [
                    'number' => $number,
                    'country' => $country,
                ]);
            }
        }

        if ($errors) {
            throw ValidationException::withMessages($errors);
        }
    }

    /** Stores a licence document and returns its public URL. */
    public function uploadDocument(UploadedFile $file, string $doctorId, string $entryId): string
    {
        $bucket = app('firebase.storage')->getBucket();
        $path = "doctor_documents/{$doctorId}/licenses/{$entryId}_".time().'.'.$file->getClientOriginalExtension();

        $bucket->upload(fopen($file->getRealPath(), 'r'), [
            'name' => $path,
            'predefinedAcl' => 'publicRead',
        ]);

        return 'https://storage.googleapis.com/'.$bucket->name().'/'.$path;
    }

    /**
     * New entries from the sign-up form (all pending review), with their
     * documents uploaded.
     */
    public function entriesFromSignup(array $practice, array $files, string $doctorId): array
    {
        $now = Carbon::now('UTC');
        $entries = [];
        foreach (array_values($practice) as $i => $input) {
            $entry = CountriesOfPractice::normalize([
                'country' => $input['country'] ?? '',
                'licensingAuthority' => $input['licensingAuthority'] ?? '',
                'licenseNumber' => $input['licenseNumber'] ?? '',
                'licenseExpiry' => $input['licenseExpiry'] ?? null,
                'submittedAt' => $now,
            ]);
            $file = $files[$i]['document'] ?? null;
            if ($file instanceof UploadedFile) {
                $entry['documentUrl'] = $this->uploadDocument($file, $doctorId, $entry['id']);
            }
            $entries[] = $entry;
        }

        return $entries;
    }

    /**
     * The doctor's entries after a profile edit (see CountriesOfPractice::merge):
     * new documents are uploaded, and an entry without any document fails
     * validation. Licence numbers no longer used are released, and the
     * current ones reserved.
     *
     * @throws ValidationException
     */
    public function saveFromProfile(array $doctor, array $practice, array $files, string $doctorId): array
    {
        $existing = CountriesOfPractice::of($doctor);
        if (! $existing && ($legacy = CountriesOfPractice::fromLegacy($doctor))) {
            $existing = [$legacy];
        }
        $savedDocs = array_column($existing, 'documentUrl', 'id');

        $submitted = [];
        $errors = [];
        foreach (array_values($practice) as $i => $input) {
            $file = $files[$i]['document'] ?? null;
            $id = (string) ($input['id'] ?? '');
            if ($file instanceof UploadedFile) {
                $input['documentUrl'] = $this->uploadDocument($file, $doctorId, $id !== '' ? $id : CountriesOfPractice::newId());
            } else {
                unset($input['documentUrl']);
                if (empty($savedDocs[$id])) {
                    $errors["practice.$i.document"] = __('validation.required', ['attribute' => __('app.countries_of_practice.document')]);
                }
            }
            $submitted[] = $input;
        }
        if ($errors) {
            throw ValidationException::withMessages($errors);
        }

        $merged = CountriesOfPractice::merge($existing, $submitted, Carbon::now('UTC'));

        foreach (CountriesOfPractice::releasedLicenseKeys($existing, $merged) as $key) {
            $holder = $this->firestore->find('doctor_licenses', $key);
            if (($holder['doctorId'] ?? null) === $doctorId) {
                $this->firestore->delete('doctor_licenses', $key);
            }
        }
        $this->reserveLicenses($merged, $doctorId);

        return $merged;
    }

    /** Reserves each entry's licence number for this doctor. */
    public function reserveLicenses(array $entries, string $doctorId): void
    {
        foreach ($entries as $entry) {
            if ($entry['country'] === '' || $entry['licenseNumber'] === '') {
                continue;
            }
            $this->firestore->update('doctor_licenses', CountriesOfPractice::licenseKey($entry['country'], $entry['licenseNumber']), [
                'doctorId' => $doctorId,
                'country' => $entry['country'],
                'licenseNumber' => $entry['licenseNumber'],
                'createdAt' => Carbon::now('UTC'),
            ]);
        }
    }
}
