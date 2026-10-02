<?php

namespace Tests\Unit;

use App\Services\DoctorDirectory;
use PHPUnit\Framework\TestCase;

class DoctorDirectoryTest extends TestCase
{
    public function test_approved_countries(): void
    {
        // Migrated doctors: only approved countries.
        $this->assertSame(['GH'], DoctorDirectory::approvedCountries([
            'countriesOfPractice' => [['country' => 'GH', 'status' => 'approved'], ['country' => 'NG', 'status' => 'pending']],
            'practiceCountryCodes' => ['GH'],
        ]));
        // A doctor whose countries were all removed or rejected isn't listed anywhere.
        $this->assertSame([], DoctorDirectory::approvedCountries(['countriesOfPractice' => [], 'practiceCountryCodes' => []]));

        // Not yet migrated: the old practiceCountry counts once the doctor is verified.
        $this->assertSame(['GH'], DoctorDirectory::approvedCountries(['practiceCountry' => 'GH', 'isVerified' => true]));
        $this->assertSame([], DoctorDirectory::approvedCountries(['practiceCountry' => 'GH', 'isVerified' => false]));
        $this->assertSame([], DoctorDirectory::approvedCountries(['name' => 'Dr. X']));
    }
}
