<?php

namespace App\Services;

use App\Support\CountriesOfPractice;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\Intl\Countries;

/**
 * Doctors shown to patients, filtered by the country the patient chooses
 * ("Patient location"): only doctors approved to practise there — their
 * Countries of Practice, never where they are. Mirrored in the Flutter app by
 * DoctorsService (lib/services/patients/doctors_service.dart).
 */
class DoctorDirectory
{
    private const CACHE_KEY = 'directory.doctors';

    private const SESSION_KEY = 'doctor_country';

    /** "All countries" in the dropdown / ?country=all. */
    public const ALL = 'all';

    public function __construct(protected FirestoreService $firestore) {}

    /** Active, verified doctors, each with its approved practice countries in `practiceCountryCodes`. */
    public function doctors(): Collection
    {
        return Cache::remember(self::CACHE_KEY, 300, function () {
            $result = $this->firestore->query('doctors', [
                ['field' => 'isActive', 'op' => '=', 'value' => true],
                ['field' => 'isVerified', 'op' => '=', 'value' => true],
            ], null, null, null);

            return collect($result['documents'] ?? [])
                ->map(fn ($doctor) => [...$doctor, 'practiceCountryCodes' => self::approvedCountries($doctor)])
                ->values();
        });
    }

    /** Call after anything that changes which doctors appear where. */
    public static function forget(): void
    {
        Cache::forget(self::CACHE_KEY);
        Cache::forget('home.doctors');
    }

    /**
     * The doctor's approved Countries of Practice. Doctors not yet migrated
     * to the list count their old single practiceCountry (they are verified).
     */
    public static function approvedCountries(array $doctor): array
    {
        if (array_key_exists(CountriesOfPractice::FIELD, $doctor)) {
            return array_values(array_unique(array_filter((array) ($doctor['practiceCountryCodes'] ?? []))));
        }
        $legacy = CountriesOfPractice::fromLegacy($doctor);

        return $legacy && $legacy['status'] === CountriesOfPractice::APPROVED && $legacy['country'] !== ''
            ? [$legacy['country']]
            : [];
    }

    /** Doctors approved to practise in $country (all doctors for null). */
    public function inCountry(?string $country): Collection
    {
        $doctors = $this->doctors();

        return $country === null
            ? $doctors
            : $doctors->filter(fn ($d) => in_array($country, $d['practiceCountryCodes'], true))->values();
    }

    /**
     * The country the patient is browsing doctors for: ?country=XX (or "all")
     * when they pick one, remembered for the session; otherwise their country
     * of residence; otherwise null (all countries).
     */
    public function selectedCountry(Request $request): ?string
    {
        if ($request->has('country')) {
            $choice = strtoupper((string) $request->query('country'));
            $choice = Countries::exists($choice) ? $choice : self::ALL;
            session([self::SESSION_KEY => $choice]);
        } else {
            $choice = session(self::SESSION_KEY);
        }

        if ($choice === null) {
            $residence = strtoupper((string) (current_user()['countryOfResidence'] ?? ''));
            $choice = Countries::exists($residence) ? $residence : self::ALL;
        }

        return $choice === self::ALL ? null : $choice;
    }

    /**
     * Dropdown options: the patient's own country first, then every country
     * that has doctors, by name.
     *
     * @return array<string, string> code => name
     */
    public function countryOptions(): array
    {
        $names = Countries::getNames(app()->getLocale());
        $codes = $this->doctors()->pluck('practiceCountryCodes')->flatten()->unique()
            ->filter(fn ($code) => isset($names[$code]))
            ->sortBy(fn ($code) => $names[$code])
            ->values()
            ->all();

        $own = strtoupper((string) (current_user()['countryOfResidence'] ?? ''));
        if (isset($names[$own])) {
            $codes = [$own, ...array_diff($codes, [$own])];
        }

        return collect($codes)->mapWithKeys(fn ($code) => [$code => $names[$code]])->all();
    }

    public static function countryName(?string $code): string
    {
        return $code && Countries::exists($code) ? Countries::getName($code, app()->getLocale()) : '';
    }
}
