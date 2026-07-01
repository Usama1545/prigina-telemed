<?php $page = 'second-opinion'; ?>
@extends('admin.layout.mainlayout')
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

    <div class="page-wrapper">
        <div class="content container-fluid" style="max-width:1100px;">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mb-0">
                            Report {{ $report['report_number'] ?? '' }}
                        </h3>
                        <ul class="breadcrumb mt-1">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.second-opinion.index') }}">Second
                                    Opinion</a></li>
                            <li class="breadcrumb-item active">{{ $report['report_number'] ?? 'View' }}</li>
                        </ul>
                    </div>
                    <div class="col-auto d-flex gap-2">
                        @php
                            $statusMap = [
                                'draft' => ['secondary', 'Draft'],
                                'submitted' => ['warning', 'Awaiting Review'],
                                'revision_requested' => ['danger', 'Revision Requested'],
                                'approved' => ['primary', 'Approved'],
                                'published' => ['success', 'Published'],
                            ];
                            [$statusColor, $statusLabel] = $statusMap[$report['status'] ?? 'draft'] ?? [
                                'secondary',
                                $report['status'],
                            ];
                        @endphp
                        <span class="badge bg-{{ $statusColor }}-subtle text-{{ $statusColor }} px-3 py-2"
                            style="font-size:13px;">
                            {{ $statusLabel }}
                        </span>
                        <a href="{{ route('admin.second-opinion.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fe fe-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button"
                        class="btn-close" data-bs-dismiss="alert"></button></div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}<button type="button"
                        class="btn-close" data-bs-dismiss="alert"></button></div>
            @endif

            <div class="row g-4">

                {{-- Left: Actions + Summary --}}
                <div class="col-lg-3">
                    <div class="card border-0 shadow-sm mb-3 sticky-top" style="top:76px;">
                        <div class="card-body p-3">

                            <p class="fw-semibold small text-uppercase text-muted mb-3" style="letter-spacing:.05em;">
                                Actions</p>

                            @if ($report['status'] === 'submitted')
                                <form method="POST" action="{{ route('admin.second-opinion.approve', $report['id']) }}"
                                    class="mb-2">
                                    @csrf
                                    <button type="submit" class="btn btn-success w-100"
                                        onclick="return confirm('Approve this report?')">
                                        <i class="fe fe-check-circle me-2"></i> Approve Report
                                    </button>
                                </form>
                                <button type="button" class="btn btn-outline-danger w-100 mb-2" data-bs-toggle="modal"
                                    data-bs-target="#revisionModal">
                                    <i class="fe fe-alert-circle me-2"></i> Request Revision
                                </button>
                            @endif

                            @if ($report['status'] === 'approved')
                                <form method="POST" action="{{ route('admin.second-opinion.publish', $report['id']) }}"
                                    class="mb-2">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100"
                                        onclick="return confirm('Publish this report to the patient?')">
                                        <i class="fe fe-send me-2"></i> Publish to Patient
                                    </button>
                                </form>
                            @endif

                            <a href="{{ route('admin.second-opinion.pdf', $report['id']) }}" target="_blank"
                                class="btn btn-outline-secondary w-100">
                                <i class="fe fe-file-text me-2"></i> View PDF
                            </a>

                            <hr class="my-3">

                            <p class="fw-semibold small text-uppercase text-muted mb-2" style="letter-spacing:.05em;">
                                Summary</p>
                            <div class="small">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Patient</span>
                                    <span class="fw-medium">{{ $patient['patient_name'] ?? '—' }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Age</span>
                                    <span>{{ $patient['age'] ?? '—' }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Gender</span>
                                    <span>{{ $patient['gender'] ?? '—' }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Doctor</span>
                                    <span>{{ $cert['physician_name'] ?? '—' }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-muted">Specialty</span>
                                    <span>{{ $cert['specialty'] ?? '—' }}</span>
                                </div>
                                @if (!empty($report['submitted_at']))
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Submitted</span>
                                        <span>{{ \Carbon\Carbon::parse($report['submitted_at'])->format('M d, Y') }}</span>
                                    </div>
                                @endif
                            </div>

                            @if (!empty($report['rejection_reason']))
                                <hr class="my-3">
                                <p class="fw-semibold small text-uppercase text-muted mb-2" style="letter-spacing:.05em;">
                                    Revision Note</p>
                                <div class="p-2 rounded-3" style="background:#fff5f5;border:1px solid #fecaca;">
                                    <p class="mb-0 small" style="color:#dc2626;">{{ $report['rejection_reason'] }}</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                {{-- Right: Report Content --}}
                <div class="col-lg-9">

                    {{-- 1. Report Information --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">1</span>
                            <h6 class="mb-0">Report Information</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                @foreach (['report_number' => 'Report Number', 'report_date' => 'Report Date', 'physician_name' => 'Physician', 'specialty' => 'Specialty', 'case_id' => 'Case ID', 'country_of_practice' => 'Country of Practice'] as $key => $label)
                                    <div class="col-md-6">
                                        <label class="form-label field-label">{{ $label }}</label>
                                        <?php
                                        $data = $info[$key] ?? '—';
                                        if ($key === 'case_id') {
                                            $data = $info[$key] ?? ($report['appointment_id'] ?? '—');
                                        }
                                        if ($key === 'report_number') {
                                            $data = $info[$key] ?? ($report['report_number'] ?? '—');
                                        }
                                        ?>
                                        <input type="text" class="form-control form-control-sm field-input" readonly
                                            value="{{ $data }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- 2. Patient Information --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">2</span>
                            <h6 class="mb-0">Patient Information</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label field-label">Patient Name</label>
                                    <input type="text" class="form-control form-control-sm field-input" readonly
                                        value="{{ $patient['patient_name'] ?? '—' }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label field-label">Age</label>
                                    <input type="text" class="form-control form-control-sm field-input" readonly
                                        value="{{ $patient['age'] ?? '—' }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label field-label">Gender</label>
                                    <input type="text" class="form-control form-control-sm field-input" readonly
                                        value="{{ $patient['gender'] ?? '—' }}">
                                </div>
                                @if (!empty($patient['primary_concern']))
                                    <div class="col-12">
                                        <label class="form-label field-label">Primary Concern</label>
                                        <textarea class="form-control form-control-sm field-input" readonly rows="2">{{ $patient['primary_concern'] }}</textarea>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- 3. Documents Reviewed --}}
                    @php
                        $docLabels = [
                            'medical_records' => 'Medical Records',
                            'laboratory_results' => 'Lab Results',
                            'imaging_studies' => 'Imaging Studies',
                            'pathology_reports' => 'Pathology Reports',
                            'operative_reports' => 'Operative Reports',
                            'consultation_notes' => 'Consultation Notes',
                        ];
                    @endphp
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">3</span>
                            <h6 class="mb-0">Documents Reviewed</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-2">
                                @foreach ($docLabels as $key => $label)
                                    <div class="col-6 col-md-4">
                                        <div
                                            class="doc-check-display p-2 rounded-3 border d-flex align-items-center gap-2
                                    {{ !empty($docs[$key]) ? 'checked' : '' }}">
                                            <span class="doc-check-icon flex-shrink-0">
                                                @if (!empty($docs[$key]))
                                                    <i class="fe fe-check-square"
                                                        style="color:#1d4ed8;font-size:16px;"></i>
                                                @else
                                                    <i class="fe fe-square" style="color:#cbd5e1;font-size:16px;"></i>
                                                @endif
                                            </span>
                                            <span class="small fw-medium"
                                                style="color:{{ !empty($docs[$key]) ? '#1d4ed8' : '#94a3b8' }};">{{ $label }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if (!empty($docs['other']))
                                <div class="mt-3">
                                    <label class="form-label field-label">Other</label>
                                    <input type="text" class="form-control form-control-sm field-input" readonly
                                        value="{{ $docs['other'] }}">
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- 4. Clinical Summary --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">4</span>
                            <h6 class="mb-0">Clinical Summary</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="rich-text-display">
                                {!! $report['clinical_summary'] ?? '<em class="text-muted">Not provided</em>' !!}
                            </div>
                        </div>
                    </div>

                    {{-- 5. Second Opinion Assessment --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">5</span>
                            <h6 class="mb-0">Second Opinion Assessment</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="rich-text-display">
                                {!! $report['second_opinion_assessment'] ?? '<em class="text-muted">Not provided</em>' !!}
                            </div>
                        </div>
                    </div>

                    {{-- 6. Key Findings --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">6</span>
                            <h6 class="mb-0">Key Findings</h6>
                        </div>
                        <div class="card-body p-4">
                            @if (!empty($findings))
                                <div class="row g-2">
                                    @foreach ($findings as $i => $f)
                                        @if (trim($f))
                                            <div class="col-12">
                                                <div class="finding-item d-flex align-items-center gap-2 p-2 rounded-3"
                                                    style="background:#f8fafc;border:1px solid #e2e8f0;">
                                                    <span class="finding-num flex-shrink-0"
                                                        style="width:22px;height:22px;border-radius:50%;background:#1d4ed8;color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;">
                                                        {{ $i + 1 }}
                                                    </span>
                                                    <span class="small fw-medium"
                                                        style="color:#374151;">{{ $f }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <em class="text-muted small">No findings listed</em>
                            @endif
                        </div>
                    </div>

                    {{-- 7. Diagnostic Considerations --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">7</span>
                            <h6 class="mb-0">Diagnostic Considerations</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="rich-text-display">
                                {!! $report['diagnostic_considerations'] ?? '<em class="text-muted">Not provided</em>' !!}
                            </div>
                        </div>
                    </div>

                    {{-- 8. Recommendations --}}
                    @php
                        $recLabels = [
                            'additional_testing' => 'Additional Testing',
                            'additional_imaging' => 'Additional Imaging',
                            'specialist_referral' => 'Specialist Referral',
                            'treatment_modification' => 'Treatment Modification',
                            'monitoring' => 'Monitoring',
                            'surgical_consultation' => 'Surgical Consultation',
                            'lifestyle_modifications' => 'Lifestyle Modifications',
                            'other' => 'Other',
                        ];
                    @endphp
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">8</span>
                            <h6 class="mb-0">Recommendations</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-2 mb-3">
                                @foreach ($recLabels as $key => $label)
                                    <div class="col-6 col-md-4">
                                        <div
                                            class="doc-check-display p-2 rounded-3 border d-flex align-items-center gap-2
                                    {{ !empty($recs[$key]) ? 'checked' : '' }}">
                                            <span class="doc-check-icon flex-shrink-0">
                                                @if (!empty($recs[$key]))
                                                    <i class="fe fe-check-square"
                                                        style="color:#16a34a;font-size:16px;"></i>
                                                @else
                                                    <i class="fe fe-square" style="color:#cbd5e1;font-size:16px;"></i>
                                                @endif
                                            </span>
                                            <span class="small fw-medium"
                                                style="color:{{ !empty($recs[$key]) ? '#15803d' : '#94a3b8' }};">{{ $label }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if (!empty($recs['details']))
                                <label class="form-label field-label">Details</label>
                                <textarea class="form-control form-control-sm field-input" readonly rows="3">{{ $recs['details'] }}</textarea>
                            @endif
                        </div>
                    </div>

                    {{-- 9. Questions for Physician --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">9</span>
                            <h6 class="mb-0">Questions for Treating Physician</h6>
                        </div>
                        <div class="card-body p-4">
                            @if (!empty($questions))
                                <div class="row g-2">
                                    @foreach ($questions as $i => $q)
                                        @if (trim($q))
                                            <div class="col-12">
                                                <div class="finding-item d-flex align-items-start gap-2 p-2 rounded-3"
                                                    style="background:#f8fafc;border:1px solid #e2e8f0;">
                                                    <span class="finding-num flex-shrink-0 mt-1"
                                                        style="width:22px;height:22px;border-radius:50%;background:#6366f1;color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:11px;font-weight:700;">
                                                        {{ $i + 1 }}
                                                    </span>
                                                    <span class="small"
                                                        style="color:#374151;line-height:1.5;">{{ $q }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <em class="text-muted small">No questions listed</em>
                            @endif
                        </div>
                    </div>

                    {{-- 10. Patient-Friendly Summary --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section" style="background:linear-gradient(90deg,#eef2ff,#f0fdf4);">
                            <span class="section-badge" style="background:#6366f1;">10</span>
                            <h6 class="mb-0">Patient-Friendly Summary</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="rich-text-display">
                                {!! $report['patient_friendly_summary'] ?? '<em class="text-muted">Not provided</em>' !!}
                            </div>
                        </div>
                    </div>

                    {{-- 11. Certification --}}
                    <div class="report-card card border-0 shadow-sm mb-4">
                        <div class="card-header-section">
                            <span class="section-badge">11</span>
                            <h6 class="mb-0">Physician Certification</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label field-label">Physician Name</label>
                                    <input type="text" class="form-control form-control-sm field-input" readonly
                                        value="Dr. {{ $cert['physician_name'] ?? '—' }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label field-label">Specialty</label>
                                    <input type="text" class="form-control form-control-sm field-input" readonly
                                        value="{{ $cert['specialty'] ?? '—' }}">
                                </div>
                            </div>
                            @if (!empty($cert['certified_at']))
                                <div class="d-flex align-items-center gap-2 p-3 rounded-3"
                                    style="background:#f0fdf4;border:1px solid #bbf7d0;">
                                    <i class="fe fe-check-circle" style="color:#16a34a;font-size:18px;flex-shrink:0;"></i>
                                    <div>
                                        <p class="mb-0 fw-semibold small" style="color:#15803d;">Certified by physician
                                        </p>
                                        <p class="mb-0 small" style="color:#166534;">
                                            {{ \Carbon\Carbon::parse($cert['certified_at'])->format('M d, Y \a\t h:i A') }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="d-flex align-items-center gap-2 p-3 rounded-3"
                                    style="background:#fefce8;border:1px solid #fde047;">
                                    <i class="fe fe-clock" style="color:#ca8a04;font-size:18px;flex-shrink:0;"></i>
                                    <p class="mb-0 small" style="color:#92400e;">Certification pending — report not yet
                                        submitted.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Revision Modal --}}
    <div class="modal fade" id="revisionModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request Revision</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('admin.second-opinion.revision', $report['id']) }}">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label fw-semibold">Revision Note <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="revision_note" rows="4" required
                            placeholder="Describe what needs to be corrected or added…"></textarea>
                        <small class="text-muted">This note will be shown to the doctor.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Send Revision Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .report-card {
            border-radius: 14px !important;
            overflow: hidden;
        }

        .card-header-section {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 20px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header-section h6 {
            font-size: 14px;
            font-weight: 700;
            color: #1e293b;
        }

        .section-badge {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #1d4ed8;
            color: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .field-label {
            font-size: 11px;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .04em;
            margin-bottom: 4px;
        }

        .field-input {
            background: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px !important;
            color: #1e293b !important;
            font-weight: 500;
            cursor: default;
        }

        .field-input:focus {
            box-shadow: none !important;
        }

        .doc-check-display {
            transition: border-color .15s, background .15s;
            background: #f8fafc;
        }

        .doc-check-display.checked {
            background: #eff6ff;
            border-color: #93c5fd !important;
        }

        .rich-text-display {
            font-size: 14px;
            line-height: 1.75;
            color: #374151;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 16px 18px;
            min-height: 60px;
        }

        .rich-text-display p {
            margin-bottom: 8px;
        }

        .rich-text-display p:last-child {
            margin-bottom: 0;
        }

        .rich-text-display em {
            color: #94a3b8;
        }
    </style>

@endsection
