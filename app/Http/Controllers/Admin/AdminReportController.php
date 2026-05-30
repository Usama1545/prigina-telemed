<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ReportService;

class AdminReportController extends Controller
{
    public function __construct(protected ReportService $reports) {}

    public function index()
    {
        // All four methods share the same allAppointments() static cache,
        // so this is one Firestore round-trip per request on cache miss.
        return view('admin.reports', [
            'overview'     => $this->reports->overviewStats(),
            'transactions' => $this->reports->transactions(50),
            'revenue'      => $this->reports->revenueStats(12),
            'appointments' => $this->reports->appointmentStats(),
        ]);
    }
}
