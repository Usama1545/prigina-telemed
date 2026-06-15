<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DoctorReportController extends Controller
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
            [['field' => 'doctorId', 'op' => '=', 'value' => $uid]],
            100, null, 'created_at', 'DESC'
        );

        $reports = collect($result['documents'] ?? []);

        $grouped = [
            'draft' => $reports->where('status', 'draft')->values(),
            'submitted' => $reports->where('status', 'submitted')->values(),
            'revision_requested' => $reports->where('status', 'revision_requested')->values(),
            'published' => $reports->where('status', 'published')->values(),
        ];

        return view('doctor.reports.index', compact('grouped'));
    }

    public function edit(string $id)
    {
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report || $report['doctorId'] !== current_user()['uid']) {
            abort(403);
        }

        return view('doctor.reports.edit', compact('report'));
    }

    public function saveDraft(Request $request, string $id)
    {
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report || $report['doctorId'] !== current_user()['uid']) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        if (! in_array($report['status'], ['draft', 'revision_requested'])) {
            return response()->json(['error' => 'Report cannot be edited in current status'], 422);
        }

        $data = $request->validate([
            'patient_information' => 'nullable|array',
            'documents_reviewed' => 'nullable|array',
            'clinical_summary' => 'nullable|string',
            'second_opinion_assessment' => 'nullable|string',
            'key_findings' => 'nullable|array',
            'diagnostic_considerations' => 'nullable|string',
            'recommendations' => 'nullable|array',
            'questions_for_physician' => 'nullable|array',
            'patient_friendly_summary' => 'nullable|string',
        ]);

        $this->firestore->update('second_opinion_reports', $id, array_merge(
            $data,
            ['updated_at' => now()]
        ));

        return response()->json(['success' => true]);
    }

    public function submit(string $id)
    {
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report || $report['doctorId'] !== current_user()['uid']) {
            abort(403);
        }

        if (! in_array($report['status'], ['draft', 'revision_requested'])) {
            return back()->with('error', 'This report cannot be submitted in its current status.');
        }

        $this->firestore->update('second_opinion_reports', $id, [
            'status' => 'submitted',
            'submitted_at' => now(),
            'updated_at' => now(),
            'certification' => array_merge($report['certification'] ?? [], [
                'certified_at' => now()->toISOString(),
            ]),
        ]);

        // Notify admins
        $admins = $this->firestore->query('admins', [], 10)['documents'] ?? [];
        foreach ($admins as $admin) {
            $this->firestore->create('notifications', [
                'userId' => $admin['uid'] ?? $admin['id'],
                'title' => 'New Second Opinion Report Submitted',
                'message' => 'Dr. '.(current_user()['name'] ?? '').' has submitted a report for review.',
                'type' => 'report_submitted',
                'isRead' => false,
                'actionUrl' => '/admin/second-opinion/'.$id,
                'createdAt' => now(),
            ]);
        }

        return redirect()
            ->route('doctor.reports')
            ->with('success', 'Report submitted for review successfully.');
    }

    public function previewPdf(string $id)
    {
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report || $report['doctorId'] !== current_user()['uid']) {
            abort(403);
        }

        return view('doctor.reports.pdf', compact('report'));
    }

    public static function createFromAppointment(FirestoreService $firestore, array $appointment): array
    {
        $doctor = current_user();
        $patient = $firestore->find('patients', $appointment['patientId'] ?? '') ?? [];

        $reportId = Str::uuid()->toString();
        $reportNumber = 'RPT-'.now()->year.'-'.strtoupper(Str::random(6));

        $data = [
            'id' => $reportId,
            'report_number' => $reportNumber,
            'appointment_id' => $appointment['id'],
            'patientId' => $appointment['patientId'] ?? '',
            'doctorId' => $doctor['uid'],
            'status' => 'draft',
            'created_at' => now(),
            'updated_at' => now(),
            'submitted_at' => null,
            'approved_at' => null,
            'published_at' => null,
            'reviewed_by_admin_id' => null,
            'rejection_reason' => null,
            'pdf_url' => null,
            'report_year' => now()->year,

            'report_information' => [
                'report_number' => $reportNumber,
                'report_date' => now()->format('Y-m-d'),
                'appointment_id' => $appointment['id'],
                'case_id' => $appointment['id'],
                'physician_name' => $doctor['name'] ?? '',
                'specialty' => $doctor['specializations'][0] ?? '',
                'country_of_practice' => $doctor['country'] ?? '',
            ],

            'patient_information' => [
                'patient_id' => $appointment['patientId'] ?? '',
                'patient_name' => $appointment['patientName'] ?? ($patient['name'] ?? ''),
                'age' => $patient['age'] ?? '',
                'gender' => $patient['gender'] ?? '',
                'primary_concern' => '',
            ],

            'documents_reviewed' => [
                'medical_records' => false,
                'laboratory_results' => false,
                'imaging_studies' => false,
                'pathology_reports' => false,
                'operative_reports' => false,
                'consultation_notes' => false,
                'other' => '',
            ],

            'clinical_summary' => '',
            'second_opinion_assessment' => '',
            'key_findings' => [],
            'diagnostic_considerations' => '',

            'recommendations' => [
                'additional_testing' => false,
                'additional_imaging' => false,
                'specialist_referral' => false,
                'treatment_modification' => false,
                'monitoring' => false,
                'surgical_consultation' => false,
                'lifestyle_modifications' => false,
                'other' => false,
                'details' => '',
            ],

            'questions_for_physician' => [],
            'patient_friendly_summary' => '',

            'certification' => [
                'physician_name' => $doctor['name'] ?? '',
                'specialty' => $doctor['specializations'][0] ?? '',
                'signature_url' => $doctor['profilePicture'] ?? '',
                'certified_at' => null,
            ],
        ];

        $firestore->createWithId('second_opinion_reports', $reportId, $data);

        return $data;
    }
}
