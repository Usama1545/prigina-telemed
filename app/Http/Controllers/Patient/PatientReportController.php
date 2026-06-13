<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;

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

        return view('doctor.reports.pdf', compact('report'));
    }
}
