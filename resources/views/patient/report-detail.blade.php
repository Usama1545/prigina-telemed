<?php $page = 'patient-reports'; ?>
@extends('layouts.mainlayout')
@section('content')

    @php
        $info = $report['report_information'] ?? [];
        $patient = $report['patient_information'] ?? [];
        $docs = $report['documents_reviewed'] ?? [];
        $recs = $report['recommendations'] ?? [];
        $cert = $report['certification'] ?? [];
        $findings = $report['key_findings'] ?? [];
        $questions = $report['questions_for_physician'] ?? [];
    @endphp

    <div class="content patient-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('partials.patient-sidebar')
                </div>

                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                        <div>
                            <a href="{{ route('patient.reports') }}" class="btn btn-sm btn-light me-2">
                                <i class="isax isax-arrow-left me-1"></i> Back
                            </a>
                            <span class="fw-bold" style="font-size:18px;">{{ $report['report_number'] ?? 'Report' }}</span>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('patient.reports.pdf', $report['id']) }}" target="_blank"
                                class="btn btn-primary btn-sm">
                                <i class="isax isax-document-download me-1"></i> Download PDF
                            </a>
                            <a href="{{ route('patient.appointments') }}" class="btn btn-outline-primary btn-sm">
                                <i class="isax isax-calendar-add me-1"></i> Book Follow-up
                            </a>
                        </div>
                    </div>

                    {{-- Report Header Card --}}
                    <div class="card border-0 shadow-sm mb-4"
                        style="background:linear-gradient(135deg,#1d4ed8,#0891b2);border-radius:20px;overflow:hidden;">
                        <div class="card-body p-4 text-white">
                            <div class="row align-items-center">
                                <div class="col">
                                    <p class="mb-1 opacity-75 small fw-semibold text-uppercase text-white"
                                        style="letter-spacing:.06em;">Second Opinion Report</p>
                                    <h4 class="fw-bold mb-1 text-white">{{ $report['report_number'] ?? '—' }}</h4>
                                    <p class="mb-0 opacity-90 small text-white">
                                        Dr. {{ $cert['physician_name'] ?? '—' }}
                                        @if (!empty($cert['specialty']))
                                            · {{ $cert['specialty'] }}
                                        @endif
                                    </p>
                                </div>
                                <div class="col-auto text-end">
                                    <p class="mb-1 opacity-75 small text-white">Published</p>
                                    <p class="mb-0 fw-semibold text-white">
                                        {{ isset($report['published_at']) ? \Carbon\Carbon::parse($report['published_at'])->format('M d, Y') : '—' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Patient Info --}}
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3"
                                style="color:#1d4ed8;border-bottom:2px solid #dbeafe;padding-bottom:8px;">Patient
                                Information</h6>
                            <div class="row g-2">
                                <div class="col-6 col-md-4">
                                    <p class="mb-1 text-muted small fw-semibold">Name</p>
                                    <p class="mb-0 fw-medium">{{ $patient['patient_name'] ?? '—' }}</p>
                                </div>
                                <div class="col-6 col-md-4">
                                    <p class="mb-1 text-muted small fw-semibold">Age</p>
                                    <p class="mb-0">{{ $patient['age'] ?? '—' }}</p>
                                </div>
                                <div class="col-6 col-md-4">
                                    <p class="mb-1 text-muted small fw-semibold">Gender</p>
                                    <p class="mb-0">{{ $patient['gender'] ?? '—' }}</p>
                                </div>
                                @if (!empty($patient['primary_concern']))
                                    <div class="col-12">
                                        <p class="mb-1 text-muted small fw-semibold">Primary Concern</p>
                                        <p class="mb-0">{{ $patient['primary_concern'] }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Clinical Summary --}}
                    @if (!empty($report['clinical_summary']))
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3"
                                    style="color:#1d4ed8;border-bottom:2px solid #dbeafe;padding-bottom:8px;">Clinical
                                    Summary</h6>
                                <div class="report-text">{!! $report['clinical_summary'] !!}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Second Opinion Assessment --}}
                    @if (!empty($report['second_opinion_assessment']))
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3"
                                    style="color:#1d4ed8;border-bottom:2px solid #dbeafe;padding-bottom:8px;">Second Opinion
                                    Assessment</h6>
                                <div class="report-text">{!! $report['second_opinion_assessment'] !!}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Key Findings --}}
                    @if (!empty($findings))
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3"
                                    style="color:#1d4ed8;border-bottom:2px solid #dbeafe;padding-bottom:8px;">Key Findings
                                </h6>
                                <ul class="ps-4 mb-0">
                                    @foreach ($findings as $f)
                                        @if (trim($f))
                                            <li class="mb-1">{{ $f }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    {{-- Recommendations --}}
                    @php
                        $recLabels = [
                            'additional_testing' => 'Additional Testing',
                            'additional_imaging' => 'Additional Imaging',
                            'specialist_referral' => 'Specialist Referral',
                            'treatment_modification' => 'Treatment Modification',
                            'monitoring' => 'Monitoring / Observation',
                            'surgical_consultation' => 'Surgical Consultation',
                            'lifestyle_modifications' => 'Lifestyle Modifications',
                            'other' => 'Other',
                        ];
                        $selectedRecs = collect($recLabels)->filter(fn($l, $k) => !empty($recs[$k]));
                    @endphp
                    @if ($selectedRecs->isNotEmpty() || !empty($recs['details']))
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3"
                                    style="color:#1d4ed8;border-bottom:2px solid #dbeafe;padding-bottom:8px;">
                                    Recommendations</h6>
                                @if ($selectedRecs->isNotEmpty())
                                    <div class="d-flex flex-wrap gap-2 mb-3">
                                        @foreach ($selectedRecs as $key => $label)
                                            <span class="badge"
                                                style="background:#ecfdf3;color:#15803d;border:1px solid #bbf7d0;padding:7px 14px;font-size:13px;font-weight:600;border-radius:50px;">
                                                {{ $label }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                                @if (!empty($recs['details']))
                                    <p class="mb-0 text-muted">{{ $recs['details'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endif

                    {{-- Patient-Friendly Summary --}}
                    @if (!empty($report['patient_friendly_summary']))
                        <div class="card border-0 shadow-sm mb-3" style="border-left:4px solid #1d4ed8 !important;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-1" style="color:#1d4ed8;">Patient-Friendly Summary</h6>
                                <p class="text-muted small mb-3">Written specifically for you to understand easily</p>
                                <div class="report-text">{!! $report['patient_friendly_summary'] !!}</div>
                            </div>
                        </div>
                    @endif

                    {{-- Questions --}}
                    @if (!empty($questions))
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3"
                                    style="color:#1d4ed8;border-bottom:2px solid #dbeafe;padding-bottom:8px;">Questions to
                                    Discuss with Your Doctor</h6>
                                <ol class="ps-4 mb-0">
                                    @foreach ($questions as $q)
                                        @if (trim($q))
                                            <li class="mb-2">{{ $q }}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    @endif

                    {{-- Certification --}}
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center justify-content-between gap-3">
                                <div>
                                    <p class="mb-1 text-muted small fw-semibold">Report Prepared By</p>
                                    <h6 class="fw-bold mb-1">Dr. {{ $cert['physician_name'] ?? '—' }}</h6>
                                    <p class="mb-0 text-muted small">{{ $cert['specialty'] ?? '' }}</p>
                                </div>
                                @if (!empty($cert['certified_at']))
                                    <div class="text-center px-3 py-2 rounded-3"
                                        style="background:#ecfdf3;border:2px solid #22c55e;">
                                        <div style="font-size:22px;color:#22c55e;">✓</div>
                                        <div
                                            style="font-size:11px;font-weight:700;color:#15803d;text-transform:uppercase;letter-spacing:.05em;">
                                            Certified</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Disclaimer --}}
                    <div class="p-3 rounded-3 mb-4" style="background:#fefce8;border:1px solid #fde047;">
                        <p class="mb-0 small" style="color:#713f12;">
                            <strong>Disclaimer:</strong> This report is a second opinion based on reviewed documents and
                            does not replace your treating physician's judgment. Always consult your doctor before making
                            any medical decisions.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f5f7fb !important;
        }

        .report-text {
            font-size: 14px;
            line-height: 1.7;
            color: #374151;
        }

        .report-text p {
            margin-bottom: 8px;
        }
    </style>
@endsection
