<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Illuminate\Support\Str;

class PatientReportController extends Controller
{
    protected FirestoreService $firestore;

    public function __construct(FirestoreService $firestore)
    {
        $this->firestore = $firestore;
    }

    public function index()
    {
        $uid = current_user()['uid'];

        $result = $this->firestore->query(
            'second_opinion_reports',
            [
                ['field' => 'patientId', 'op' => '=', 'value' => $uid],
                ['field' => 'status',     'op' => '=', 'value' => 'published'],
            ],
            50, null, 'published_at', 'DESC'
        );

        $reports = $result['documents'] ?? [];

        return view('patient.reports', compact('reports'));
    }

    public function show(string $id)
    {
        $uid = current_user()['uid'];
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report
            || $report['patientId'] !== $uid
            || $report['status'] !== 'published') {
            abort(403);
        }

        $report = $this->fixMissingFields($report);

        return view('patient.report-detail', compact('report'));
    }

    public function pdf(string $id)
    {
        $uid = current_user()['uid'];
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report
            || $report['patientId'] !== $uid
            || $report['status'] !== 'published') {
            abort(403);
        }
        $report = $this->fixMissingFields($report);

        return view('doctor.reports.pdf', compact('report'));
    }

    public function fixMissingFields(array $report): array
    {
        $appointment = $this->firestore->find('appointments', $report['appointment_id'] ?? '') ?? [];
        $patient = $this->firestore->find('patients', $appointment['patientId'] ?? '') ?? [];
        $doctor = $this->firestore->find('doctors', $report['doctorId'] ?? '') ?? [];

        $report['id'] ??= Str::uuid()->toString();
        $report['report_number'] ??= 'RPT-'.now()->year.'-'.strtoupper(Str::random(6));

        $report['report_information'] = $this->fillMissing($report['report_information'] ?? [], [
            'report_number' => $report['report_number'],
            'report_date' => now()->format('Y-m-d'),
            'appointment_id' => $report['appointment_id'] ?? '',
            'case_id' => $report['appointment_id'] ?? '',
            'physician_name' => $doctor['name'] ?? '',
            'specialty' => $doctor['specializations'][0] ?? '',
            'country_of_practice' => $doctor['practiceCountry'] ?? '',
            'country' => $doctor['country_code'] ?? '',
        ]);

        $report['patient_information'] = $this->fillMissing($report['patient_information'] ?? [], [
            'patient_id' => $appointment['patientId'] ?? '',
            'patient_name' => $appointment['patientName'] ?? ($patient['name'] ?? ''),
            'age' => $patient['age'] ?? patient_age($patient['dob'] ?? null),
            'gender' => $patient['gender'] ?? '',
            'primary_concern' => $appointment['symptoms'] ?? '',
        ]);

        $report['certification'] = $this->fillMissing($report['certification'] ?? [], [
            'physician_name' => $doctor['name'] ?? '',
            'specialty' => $doctor['specializations'][0] ?? '',
            'signature_url' => $doctor['profilePicture'] ?? '',
            'certified_at' => null,
        ]);

        return $report;
    }

    /**
     * Fill only the keys that are absent or empty in $existing, leaving present values untouched.
     */
    private function fillMissing(array $existing, array $defaults): array
    {
        foreach ($defaults as $key => $default) {
            if (! array_key_exists($key, $existing) || $existing[$key] === null || $existing[$key] === '') {
                $existing[$key] = $default;
            }
        }

        return $existing;
    }
}
