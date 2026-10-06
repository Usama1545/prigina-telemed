<?php

namespace Tests\Unit;

use App\Support\CountriesOfPractice as COP;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

/** Same cases as test/countries_of_practice_test.dart in the Flutter app. */
class CountriesOfPracticeTest extends TestCase
{
    public function test_normalize(): void
    {
        $e = COP::normalize([
            'country' => ' gh ',
            'licensingAuthority' => ' Medical and Dental Council ',
            'licenseNumber' => ' MDC/123 ',
            'licenseExpiry' => '2027-05-31',
            'status' => 'weird',
        ]);

        $this->assertSame('GH', $e['country']);
        $this->assertSame('Medical and Dental Council', $e['licensingAuthority']);
        $this->assertSame('MDC/123', $e['licenseNumber']);
        $this->assertSame('2027-05-31', $e['licenseExpiry']);
        $this->assertSame('pending', $e['status']);
        $this->assertNotSame('', $e['id']);
        $this->assertNull(COP::normalize(['licenseExpiry' => '31/05/2027'])['licenseExpiry']);
    }

    public function test_fields_list_only_approved_countries(): void
    {
        $fields = COP::fields([
            ['country' => 'NG', 'licenseNumber' => 'N1', 'status' => 'pending'],
            ['country' => 'GH', 'licenseNumber' => 'G1', 'status' => 'approved', 'documentUrl' => 'https://x/g1.pdf'],
            ['country' => 'US', 'licenseNumber' => 'U1', 'status' => 'rejected'],
        ]);

        $this->assertSame(['GH'], $fields['practiceCountryCodes']);
        $this->assertTrue($fields['hasPendingPracticeCountries']);
        // Legacy fields mirror the first approved entry.
        $this->assertSame('GH', $fields['practiceCountry']);
        $this->assertSame('G1', $fields['licenseNumber']);
        $this->assertSame(['medical_license' => 'https://x/g1.pdf'], $fields['documentUrls']);
        $this->assertCount(3, $fields['countriesOfPractice']);
    }

    public function test_fields_for_a_new_doctor(): void
    {
        $fields = COP::fields([['country' => 'gh', 'licenseNumber' => 'G1']]);

        $this->assertSame([], $fields['practiceCountryCodes']);
        $this->assertTrue($fields['hasPendingPracticeCountries']);
        $this->assertSame('GH', $fields['practiceCountry']);
        $this->assertArrayNotHasKey('documentUrls', $fields);
    }

    public function test_from_legacy(): void
    {
        $verified = COP::fromLegacy([
            'practiceCountry' => 'GH',
            'licenseNumber' => 'MDC-1',
            'isVerified' => true,
            'documentUrls' => ['medical_license' => 'https://x/l.pdf', 'id_proof' => 'https://x/id.pdf'],
        ]);
        $this->assertSame('approved', $verified['status']);
        $this->assertSame('https://x/l.pdf', $verified['documentUrl']);
        $this->assertTrue(COP::isIncomplete($verified)); // no licensing authority yet
        $this->assertSame('legacy', $verified['id']); // stable across reads

        $this->assertSame('pending', COP::fromLegacy(['practiceCountry' => 'GH', 'isVerified' => false])['status']);
        $this->assertNull(COP::fromLegacy(['name' => 'Dr. X']));
    }

    public function test_expiry_and_license_key(): void
    {
        $today = Carbon::parse('2026-10-03', 'UTC');
        $this->assertTrue(COP::isExpired(['licenseExpiry' => '2026-10-02'], $today));
        $this->assertFalse(COP::isExpired(['licenseExpiry' => '2026-10-03'], $today));
        $this->assertFalse(COP::isExpired(['licenseExpiry' => null], $today));

        $this->assertSame('GH_MDC123', COP::licenseKey('gh', 'mdc/123'));
        $this->assertSame('GH_MDC123', COP::licenseKey('GH', 'MDC-123'));
    }

    public function test_merge_keeps_unchanged_and_reviews_changed_entries(): void
    {
        $existing = [
            ['id' => 'a', 'country' => 'GH', 'licensingAuthority' => 'MDC', 'licenseNumber' => 'G1', 'status' => 'approved', 'documentUrl' => 'https://x/g.pdf'],
            ['id' => 'b', 'country' => 'NG', 'licensingAuthority' => 'MDCN', 'licenseNumber' => 'N1', 'status' => 'approved', 'documentUrl' => 'https://x/n.pdf'],
            ['id' => 'c', 'country' => 'KE', 'licensingAuthority' => 'KMPDC', 'licenseNumber' => 'K1', 'status' => 'rejected'],
        ];

        $merged = COP::merge($existing, [
            ['id' => 'a', 'country' => 'GH', 'licensingAuthority' => 'MDC', 'licenseNumber' => 'G1'],                 // unchanged
            ['id' => 'b', 'country' => 'NG', 'licensingAuthority' => 'MDCN', 'licenseNumber' => 'N1', 'licenseExpiry' => '2028-01-31'], // changed
            ['id' => 'zzz', 'country' => 'US', 'licensingAuthority' => 'FSMB', 'licenseNumber' => 'U1', 'documentUrl' => 'https://x/u.pdf'], // new
        ], 'now');

        $this->assertCount(3, $merged); // KE removed
        $this->assertSame(['approved', 'pending', 'pending'], array_column($merged, 'status'));
        $this->assertSame('https://x/g.pdf', $merged[0]['documentUrl']); // kept
        $this->assertSame('https://x/n.pdf', $merged[1]['documentUrl']); // kept, details changed
        $this->assertNotSame('zzz', $merged[2]['id']);                   // unknown ids get a new one
        $this->assertSame('now', $merged[2]['submittedAt']);

        // A new document alone sends an entry back for review.
        $redoc = COP::merge($existing, [
            ['id' => 'a', 'country' => 'GH', 'licensingAuthority' => 'MDC', 'licenseNumber' => 'G1', 'documentUrl' => 'https://x/g2.pdf'],
        ], 'now');
        $this->assertSame('pending', $redoc[0]['status']);
        $this->assertSame('https://x/g2.pdf', $redoc[0]['documentUrl']);

        $this->assertSame(['NG_N1', 'KE_K1'], COP::releasedLicenseKeys($existing, $redoc));
    }

    public function test_admin_review(): void
    {
        $entries = [
            ['id' => 'a', 'country' => 'GH', 'licenseNumber' => 'G1', 'status' => 'pending'],
            ['id' => 'b', 'country' => 'NG', 'licenseNumber' => 'N1', 'status' => 'rejected', 'rejectionReason' => 'Blurry'],
            ['id' => 'c', 'country' => 'KE', 'licenseNumber' => 'K1', 'status' => 'pending', 'licenseExpiry' => '2020-01-01'],
        ];

        $rejected = COP::review($entries, 'a', 'rejected', ' Wrong authority ', 'now', 'admin1');
        $this->assertSame('rejected', $rejected[0]['status']);
        $this->assertSame('Wrong authority', $rejected[0]['rejectionReason']);
        $this->assertSame('admin1', $rejected[0]['reviewedBy']);

        $approved = COP::review($rejected, 'b', 'approved', 'ignored', 'now', 'admin1');
        $this->assertSame('approved', $approved[1]['status']);
        $this->assertSame('', $approved[1]['rejectionReason']);
        $this->assertSame(['NG'], COP::fields($approved)['practiceCountryCodes']);

        // Approving the doctor approves pending entries only.
        $all = COP::approvePending($entries, 'now', 'admin1');
        $this->assertSame(['approved', 'rejected', 'approved'], array_column($all, 'status'));

        $this->assertTrue(COP::hasExpired($entries, Carbon::parse('2026-10-03', 'UTC')));
        $this->assertFalse(COP::hasExpired([$entries[0]], Carbon::parse('2026-10-03', 'UTC')));

        $this->expectException(\InvalidArgumentException::class);
        COP::review($entries, 'missing', 'approved', '', 'now', 'admin1');
    }
}
