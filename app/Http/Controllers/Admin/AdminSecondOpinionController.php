<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\FirestoreService;
use Illuminate\Http\Request;

class AdminSecondOpinionController extends Controller
{
    protected FirestoreService $firestore;

    public function __construct(FirestoreService $firestore)
    {
        $this->firestore = $firestore;
    }

    public function index()
    {
        $result = $this->firestore->query(
            'second_opinion_reports',
            [],
            200, null, 'created_at', 'DESC'
        );

        $reports = collect($result['documents'] ?? []);

        $stats = [
            'total' => $reports->count(),
            'draft' => $reports->where('status', 'draft')->count(),
            'submitted' => $reports->where('status', 'submitted')->count(),
            'revision_requested' => $reports->where('status', 'revision_requested')->count(),
            'approved' => $reports->where('status', 'approved')->count(),
            'published' => $reports->where('status', 'published')->count(),
        ];

        return view('admin.second-opinion.index', compact('reports', 'stats'));
    }

    public function show(string $id)
    {
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report) {
            abort(404);
        }

        return view('admin.second-opinion.show', compact('report'));
    }

    public function approve(string $id)
    {
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report || $report['status'] !== 'submitted') {
            return back()->with('error', 'Report cannot be approved in its current status.');
        }

        $adminId = session('auth_uid');

        $this->firestore->update('second_opinion_reports', $id, [
            'status' => 'approved',
            'approved_at' => now(),
            'reviewed_by_admin_id' => $adminId,
            'updated_at' => now(),
        ]);

        $this->notifyDoctor($report['doctorId'], 'Report Approved', 'Your second opinion report has been approved and is pending publication.', 'report_approved', '/doctor/reports/'.$id.'/edit');

        return back()->with('success', 'Report approved successfully.');
    }

    public function requestRevision(Request $request, string $id)
    {
        $request->validate([
            'revision_note' => 'required|string|max:1000',
        ]);

        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report || $report['status'] !== 'submitted') {
            return back()->with('error', 'Report cannot be sent for revision in its current status.');
        }

        $adminId = session('auth_uid');

        $this->firestore->update('second_opinion_reports', $id, [
            'status' => 'revision_requested',
            'rejection_reason' => $request->revision_note,
            'reviewed_by_admin_id' => $adminId,
            'updated_at' => now(),
        ]);

        $this->notifyDoctor($report['doctorId'], 'Report Revision Required', 'Your second opinion report requires revisions. Please review the feedback and resubmit.', 'report_revision', '/doctor/reports/'.$id.'/edit');

        return back()->with('success', 'Revision request sent to doctor.');
    }

    public function publish(string $id)
    {
        $report = $this->firestore->find('second_opinion_reports', $id);

        if (! $report || $report['status'] !== 'approved') {
            return back()->with('error', 'Only approved reports can be published.');
        }

        $this->firestore->update('second_opinion_reports', $id, [
            'status' => 'published',
            'published_at' => now(),
            'updated_at' => now(),
        ]);

        $this->notifyPatient($report['patientId'], 'Second Opinion Report Available', 'Your second opinion report is now available. You can view and download it from your Medical Reports section.', 'report_published', '/patient/reports/'.$id);

        return back()->with('success', 'Report published to patient successfully.');
    }

    private function notifyDoctor(string $doctorId, string $title, string $message, string $type, string $actionUrl): void
    {
        $this->firestore->create('notifications', [
            'userId' => $doctorId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'isRead' => false,
            'actionUrl' => $actionUrl,
            'createdAt' => now(),
        ]);
    }

    private function notifyPatient(string $patientId, string $title, string $message, string $type, string $actionUrl): void
    {
        $this->firestore->create('notifications', [
            'userId' => $patientId,
            'title' => $title,
            'message' => $message,
            'type' => $type,
            'isRead' => false,
            'actionUrl' => $actionUrl,
            'createdAt' => now(),
        ]);
    }

    public function previewPdf(string $id)
    {
        $report = $this->firestore->find('second_opinion_reports', $id);

        return view('doctor.reports.pdf', compact('report'));
    }
}
