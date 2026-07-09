<?php $page = 'doctor-reports'; ?>
@extends('layouts.mainlayout')

@section('content')

    @php
        $editable = in_array($report['status'], ['draft', 'revision_requested']);
        $info = $report['report_information'] ?? [];
        $patient = $report['patient_information'] ?? [];
        $docs = $report['documents_reviewed'] ?? [];
        $recs = $report['recommendations'] ?? [];
        $cert = $report['certification'] ?? [];
        $findings = $report['key_findings'] ?? [];
        $questions = $report['questions_for_physician'] ?? [];
        $reportId = $report['id'] ?? $report['report_id'];

        $sections = [
            ['id' => 'patient-info', 'label' => __('app.reports.section_patient_info')],
            ['id' => 'docs-reviewed', 'label' => __('app.reports.section_docs_reviewed')],
            ['id' => 'clinical', 'label' => __('app.reports.section_clinical')],
            ['id' => 'assessment', 'label' => __('app.reports.section_assessment')],
            ['id' => 'findings', 'label' => __('app.reports.section_findings')],
            ['id' => 'diagnostic', 'label' => __('app.reports.section_diagnostic')],
            ['id' => 'recommendations', 'label' => __('app.reports.section_recommendations')],
            ['id' => 'questions', 'label' => __('app.reports.section_questions')],
            ['id' => 'patient-summary', 'label' => __('app.reports.section_patient_summary')],
            ['id' => 'certification', 'label' => __('app.reports.section_certification')],
        ];
    @endphp

    <div class="content doctor-content">
        <div class="container doc-container">
            <div class="row">

                {{-- Doctor Sidebar --}}
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('partials.doctor-sidebar')
                </div>

                {{-- Main Content --}}
                <div class="col-lg-8 col-xl-9">

                    {{-- Header --}}
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3 pt-3">
                        <div>
                            <a href="{{ route('doctor.reports') }}" class="btn btn-sm btn-light me-2">
                                <i class="isax isax-arrow-left me-1"></i> {{ __('app.reports.back_to_reports') }}
                            </a>
                            <span class="fw-bold text-dark" style="font-size:18px;">
                                {{ $editable ? __('app.reports.write_report') : __('app.reports.view_report') }}
                            </span>
                            <span
                                class="badge ms-2 text-capitalize
                            {{ $report['status'] === 'published'
                                ? 'bg-success'
                                : ($report['status'] === 'submitted'
                                    ? 'bg-warning text-dark'
                                    : ($report['status'] === 'revision_requested'
                                        ? 'bg-danger'
                                        : 'bg-secondary')) }}">
                                {{ str_replace('_', ' ', $report['status']) }}
                            </span>
                        </div>
                        @if ($editable)
                            <div class="d-flex gap-2 flex-wrap">
                                <button type="button" id="btnSaveDraft" class="btn btn-outline-secondary btn-sm">
                                    <i class="isax isax-save-2 me-1"></i> {{ __('app.reports.save_draft') }}
                                </button>
                                <a href="{{ route('doctor.reports.pdf', $reportId) }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm">
                                    <i class="isax isax-document-download me-1"></i> {{ __('app.reports.preview_pdf') }}
                                </a>
                                <button type="button" id="btnSubmit" class="btn btn-primary btn-sm">
                                    <i class="isax isax-send-2 me-1"></i> {{ __('app.reports.submit_for_review') }}
                                </button>
                            </div>
                        @else
                            <div class="d-flex gap-2">
                                <a href="{{ route('doctor.reports.pdf', $reportId) }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm">
                                    <i class="isax isax-document-download me-1"></i> {{ __('app.reports.preview_pdf') }}
                                </a>
                            </div>
                        @endif
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}<button type="button" class="btn-close"
                                data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}<button type="button" class="btn-close"
                                data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if ($report['status'] === 'revision_requested' && !empty($report['rejection_reason']))
                        <div class="alert alert-warning" role="alert">
                            <strong><i
                                    class="isax isax-info-circle me-1"></i>{{ __('app.reports.revision_requested_alert') }}:</strong>
                            {{ $report['rejection_reason'] }}
                        </div>
                    @endif

                    <div class="row g-3">

                        {{-- Form --}}
                        <div class="col-lg-8">
                            <form id="reportForm" novalidate>
                                @csrf

                                {{-- 1. Patient Information --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="patient-info">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">1</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_patient_info') }}</h5>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.reports.patient_name') }}</label>
                                                <input type="text" class="form-control"
                                                    name="patient_information[patient_name]"
                                                    value="{{ $patient['patient_name'] ?? '' }}"
                                                    {{ $editable ? '' : 'readonly' }}>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">{{ __('app.reports.age') }} <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="patient_information[age]"
                                                    id="patient_age"
                                                    value="{{ $patient['age'] ?? '' }}" {{ $editable ? '' : 'readonly' }}>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">{{ __('app.reports.gender') }} <span class="text-danger">*</span></label>
                                                <select class="form-select" name="patient_information[gender]"
                                                    id="patient_gender"
                                                    {{ $editable ? '' : 'disabled' }}>
                                                    <option value="">{{ __('app.common.select') }}</option>
                                                    @foreach ([['val' => 'male', 'key' => 'gender_male'], ['val' => 'female', 'key' => 'gender_female'], ['val' => 'other', 'key' => 'gender_other']] as $g)
                                                        <option value="{{ $g['val'] }}"
                                                            {{ strtolower($patient['gender'] ?? '') === $g['val'] ? 'selected' : '' }}>
                                                            {{ __('app.reports.' . $g['key']) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.reports.case_id') }}</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $info['case_id'] ?? '' }}" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.reports.consultation_date') }}</label>
                                                <input type="text" class="form-control"
                                                    value="{{ isset($info['report_date']) ? \Carbon\Carbon::parse($info['report_date'])->format('M d, Y') : '' }}"
                                                    readonly>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">{{ __('app.reports.primary_concern') }}</label>
                                                <textarea class="form-control" name="patient_information[primary_concern]" rows="3"
                                                    {{ $editable ? '' : 'readonly' }}>{{ $patient['primary_concern'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- 2. Documents Reviewed --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="docs-reviewed">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">2</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_docs_reviewed') }}</h5>
                                        </div>
                                        <div class="row g-3">
                                            @php
                                                $docFields = [
                                                    'medical_records' => __('app.reports.doc_medical_records'),
                                                    'laboratory_results' => __('app.reports.doc_lab_results'),
                                                    'imaging_studies' => __('app.reports.doc_imaging'),
                                                    'pathology_reports' => __('app.reports.doc_pathology'),
                                                    'operative_reports' => __('app.reports.doc_operative'),
                                                    'consultation_notes' => __('app.reports.doc_consultation'),
                                                ];
                                            @endphp
                                            @foreach ($docFields as $key => $label)
                                                <div class="col-6 col-md-4">
                                                    <div class="doc-checkbox-card p-3 rounded-3 border {{ !empty($docs[$key]) ? 'checked' : '' }}"
                                                        style="cursor:{{ $editable ? 'pointer' : 'default' }};">
                                                        <div class="form-check mb-0 d-flex align-items-center gap-2">
                                                            <input class="form-check-input doc-check" type="checkbox"
                                                                name="documents_reviewed[{{ $key }}]"
                                                                value="1" id="doc_{{ $key }}"
                                                                {{ !empty($docs[$key]) ? 'checked' : '' }}
                                                                {{ $editable ? '' : 'disabled' }}>
                                                            <label class="form-check-label fw-medium"
                                                                for="doc_{{ $key }}" style="cursor:inherit;">
                                                                {{ $label }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="col-12">
                                                <label class="form-label">{{ __('app.reports.other_specify') }}</label>
                                                <input type="text" class="form-control"
                                                    name="documents_reviewed[other]" value="{{ $docs['other'] ?? '' }}"
                                                    placeholder="{{ __('app.reports.type_here_optional') }}"
                                                    {{ $editable ? '' : 'readonly' }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- 3. Clinical Summary --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="clinical">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">3</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_clinical') }}</h5>
                                        </div>
                                        @if ($editable)
                                            <div id="editor-clinical" class="quill-editor" style="min-height:180px;">
                                                {!! $report['clinical_summary'] ?? '' !!}</div>
                                            <input type="hidden" name="clinical_summary" id="input-clinical">
                                        @else
                                            <div class="report-text-view">{!! $report['clinical_summary'] ?? '<em class="text-muted">No content</em>' !!}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- 4. Second Opinion Assessment --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="assessment">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">4</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_assessment') }}</h5>
                                        </div>
                                        @if ($editable)
                                            <div id="editor-assessment" class="quill-editor" style="min-height:180px;">
                                                {!! $report['second_opinion_assessment'] ?? '' !!}</div>
                                            <input type="hidden" name="second_opinion_assessment" id="input-assessment">
                                        @else
                                            <div class="report-text-view">{!! $report['second_opinion_assessment'] ?? '<em class="text-muted">No content</em>' !!}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- 5. Key Findings --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="findings">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">5</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_findings') }}</h5>
                                        </div>
                                        <div id="findings-list">
                                            @foreach ($findings as $i => $finding)
                                                <div class="finding-row d-flex gap-2 mb-2">
                                                    <input type="text" class="form-control" name="key_findings[]"
                                                        value="{{ $finding }}"
                                                        placeholder="Finding {{ $i + 1 }}"
                                                        {{ $editable ? '' : 'readonly' }}>
                                                    @if ($editable)
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm remove-finding flex-shrink-0">
                                                            <i class="isax isax-minus-cirlce"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endforeach
                                            @if (empty($findings))
                                                <div class="finding-row d-flex gap-2 mb-2">
                                                    <input type="text" class="form-control" name="key_findings[]"
                                                        placeholder="Finding 1" {{ $editable ? '' : 'readonly' }}>
                                                    @if ($editable)
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm remove-finding flex-shrink-0">
                                                            <i class="isax isax-minus-cirlce"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        @if ($editable)
                                            <button type="button" id="addFinding"
                                                class="btn btn-outline-primary btn-sm mt-2">
                                                <i class="isax isax-add-circle me-1"></i>
                                                {{ __('app.reports.add_finding') }}
                                            </button>
                                        @endif
                                    </div>
                                </div>

                                {{-- 6. Diagnostic Considerations --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="diagnostic">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">6</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_diagnostic') }}</h5>
                                        </div>
                                        @if ($editable)
                                            <div id="editor-diagnostic" class="quill-editor" style="min-height:150px;">
                                                {!! $report['diagnostic_considerations'] ?? '' !!}</div>
                                            <input type="hidden" name="diagnostic_considerations" id="input-diagnostic">
                                        @else
                                            <div class="report-text-view">{!! $report['diagnostic_considerations'] ?? '<em class="text-muted">No content</em>' !!}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- 7. Recommendations --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="recommendations">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">7</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_recommendations') }}</h5>
                                        </div>
                                        <p class="text-muted small mb-3">{{ __('app.reports.select_all_apply') }}</p>
                                        @php
                                            $recFields = [
                                                'additional_testing' => __('app.reports.rec_additional_testing'),
                                                'additional_imaging' => __('app.reports.rec_additional_imaging'),
                                                'specialist_referral' => __('app.reports.rec_specialist_referral'),
                                                'treatment_modification' => __(
                                                    'app.reports.rec_treatment_modification',
                                                ),
                                                'monitoring' => __('app.reports.rec_monitoring'),
                                                'surgical_consultation' => __('app.reports.rec_surgical'),
                                                'lifestyle_modifications' => __('app.reports.rec_lifestyle'),
                                                'other' => __('app.reports.gender_other'),
                                            ];
                                        @endphp
                                        <div class="row g-2 mb-3">
                                            @foreach ($recFields as $key => $label)
                                                <div class="col-6 col-md-4">
                                                    <div class="rec-checkbox-card p-3 rounded-3 border {{ !empty($recs[$key]) ? 'checked' : '' }}"
                                                        style="cursor:{{ $editable ? 'pointer' : 'default' }};">
                                                        <div class="form-check mb-0 d-flex align-items-center gap-2">
                                                            <input class="form-check-input rec-check" type="checkbox"
                                                                name="recommendations[{{ $key }}]"
                                                                value="1" id="rec_{{ $key }}"
                                                                {{ !empty($recs[$key]) ? 'checked' : '' }}
                                                                {{ $editable ? '' : 'disabled' }}>
                                                            <label class="form-check-label fw-medium"
                                                                for="rec_{{ $key }}" style="cursor:inherit;">
                                                                {{ $label }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <label class="form-label">{{ __('app.reports.rec_details') }}</label>
                                        <textarea class="form-control" name="recommendations[details]" rows="3" {{ $editable ? '' : 'readonly' }}>{{ $recs['details'] ?? '' }}</textarea>
                                    </div>
                                </div>

                                {{-- 8. Questions for Physician --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="questions">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">8</div>
                                            <h5 class="mb-0">{{ __('app.reports.questions_title') }} <span
                                                    class="text-muted small fw-normal">({{ __('app.reports.optional') }})</span>
                                            </h5>
                                        </div>
                                        <div id="questions-list">
                                            @foreach ($questions as $i => $question)
                                                <div class="question-row d-flex gap-2 mb-2 align-items-center">
                                                    <span class="text-muted small fw-semibold flex-shrink-0"
                                                        style="width:20px;">{{ $i + 1 }}.</span>
                                                    <input type="text" class="form-control"
                                                        name="questions_for_physician[]" value="{{ $question }}"
                                                        placeholder="Question {{ $i + 1 }}"
                                                        {{ $editable ? '' : 'readonly' }}>
                                                    @if ($editable)
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm remove-question flex-shrink-0">
                                                            <i class="isax isax-minus-cirlce"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endforeach
                                            @if (empty($questions))
                                                <div class="question-row d-flex gap-2 mb-2 align-items-center">
                                                    <span class="text-muted small fw-semibold flex-shrink-0"
                                                        style="width:20px;">1.</span>
                                                    <input type="text" class="form-control"
                                                        name="questions_for_physician[]" placeholder="Question 1"
                                                        {{ $editable ? '' : 'readonly' }}>
                                                    @if ($editable)
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-sm remove-question flex-shrink-0">
                                                            <i class="isax isax-minus-cirlce"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        @if ($editable)
                                            <button type="button" id="addQuestion"
                                                class="btn btn-outline-primary btn-sm mt-2">
                                                <i class="isax isax-add-circle me-1"></i>
                                                {{ __('app.reports.add_question') }}
                                            </button>
                                        @endif
                                    </div>
                                </div>

                                {{-- 9. Patient-Friendly Summary --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="patient-summary">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">9</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_patient_summary') }}</h5>
                                        </div>
                                        @if ($editable)
                                            <div id="editor-patient-summary" class="quill-editor"
                                                style="min-height:150px;">{!! $report['patient_friendly_summary'] ?? '' !!}</div>
                                            <input type="hidden" name="patient_friendly_summary"
                                                id="input-patient-summary">
                                        @else
                                            <div class="report-text-view">{!! $report['patient_friendly_summary'] ?? '<em class="text-muted">No content</em>' !!}</div>
                                        @endif
                                    </div>
                                </div>

                                {{-- 10. Certification --}}
                                <div class="report-section card border-0 shadow-sm mb-4" id="certification">
                                    <div class="card-body p-4">
                                        <div class="section-header d-flex align-items-center gap-2 mb-4">
                                            <div class="section-num">10</div>
                                            <h5 class="mb-0">{{ __('app.reports.section_certification') }}</h5>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.reports.physician_name') }}</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $cert['physician_name'] ?? '' }}" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.reports.specialty') }}</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $cert['specialty'] ?? '' }}" readonly>
                                            </div>
                                            <div class="col-12">
                                                <div class="p-3 rounded-3"
                                                    style="background:#f8fafc;border:1px dashed #cbd5e1;">
                                                    <p class="mb-1 small text-muted">
                                                        {{ __('app.reports.certify_text') }}
                                                    </p>
                                                    @if (!empty($cert['certified_at']))
                                                        <p class="mb-0 small fw-semibold" style="color:#16a34a;">
                                                            <i class="isax isax-tick-circle me-1"></i>
                                                            {{ __('app.reports.certified_on') }}
                                                            {{ \Carbon\Carbon::parse($cert['certified_at'])->format('M d, Y \a\t h:i A') }}
                                                        </p>
                                                    @else
                                                        <p class="mb-0 small text-muted">
                                                            {{ __('app.reports.cert_pending') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($editable)
                                    {{-- Bottom Action Bar --}}
                                    <div class="d-flex gap-2 justify-content-end mb-5 flex-wrap">
                                        <button type="button" id="btnSaveDraft2" class="btn btn-outline-secondary">
                                            <i class="isax isax-save-2 me-1"></i> {{ __('app.reports.save_draft') }}
                                        </button>
                                        <a href="{{ route('doctor.reports.pdf', $reportId) }}" target="_blank"
                                            class="btn btn-outline-primary">
                                            <i class="isax isax-document-download me-1"></i>
                                            {{ __('app.reports.preview_pdf') }}
                                        </a>
                                        <button type="button" id="btnSubmit2" class="btn btn-primary px-4">
                                            <i class="isax isax-send-2 me-1"></i>
                                            {{ __('app.reports.submit_for_review') }}
                                        </button>
                                    </div>
                                @endif

                            </form>
                        </div>{{-- /col-lg-8 form --}}

                        {{-- Right: Section Stepper --}}
                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="card border-0 shadow-sm sticky-top" style="top:80px;">
                                <div class="card-body p-3">
                                    <p class="text-muted small fw-semibold mb-2 text-uppercase"
                                        style="letter-spacing:.05em;">{{ __('app.reports.report_progress') }}</p>
                                    <ul class="list-unstyled mb-0 stepper-nav" id="stepperNav">
                                        @foreach ($sections as $i => $s)
                                            <li>
                                                <a href="#{{ $s['id'] }}"
                                                    class="stepper-link d-flex align-items-center gap-2 py-2 px-2 rounded-3 text-decoration-none {{ $i === 0 ? 'active' : '' }}"
                                                    data-section="{{ $s['id'] }}">
                                                    <span
                                                        class="stepper-num d-flex align-items-center justify-content-center flex-shrink-0"
                                                        style="width:26px;height:26px;border-radius:50%;background:#f1f5f9;font-size:12px;font-weight:700;color:#64748b;">
                                                        {{ $i + 1 }}
                                                    </span>
                                                    <span
                                                        style="font-size:13px;font-weight:500;color:#374151;">{{ $s['label'] }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>{{-- /row g-3 --}}

                </div>{{-- /col-lg-8 col-xl-9 main content --}}

            </div>{{-- /row --}}
        </div>{{-- /container --}}
    </div>{{-- /content --}}

    {{-- Submit Form (hidden) --}}
    <form id="submitForm" method="POST" action="{{ route('doctor.reports.submit', $reportId) }}"
        style="display:none;">
        @csrf
    </form>

    {{-- Auto-save indicator --}}
    <div id="saveIndicator" style="display:none;position:fixed;bottom:24px;right:24px;z-index:9999;">
        <div class="d-flex align-items-center gap-2 px-3 py-2 rounded-3 shadow"
            style="background:#fff;border:1px solid #e5e7eb;">
            <span id="saveIcon" class="spinner-border spinner-border-sm text-primary" role="status"></span>
            <span id="saveText" class="small fw-medium" style="color:#374151;">Saving…</span>
        </div>
    </div>

    @if ($editable)
        {{-- Quill CDN --}}
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    @endif

    <style>
        body {
            background-color: #f5f7fb !important;
        }

        .section-num {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #2563eb;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .stepper-link {
            transition: background .15s;
        }

        .stepper-link:hover,
        .stepper-link.active {
            background: #eef2ff;
        }

        .stepper-link.active .stepper-num {
            background: #2563eb !important;
            color: #fff !important;
        }

        .stepper-link.active span:last-child {
            color: #2563eb !important;
        }

        .doc-checkbox-card,
        .rec-checkbox-card {
            transition: border-color .15s, background .15s;
        }

        .doc-checkbox-card.checked,
        .rec-checkbox-card.checked {
            border-color: #2563eb !important;
            background: #eef2ff;
        }

        .doc-checkbox-card:hover,
        .rec-checkbox-card:hover {
            border-color: #93c5fd;
        }

        .report-text-view {
            line-height: 1.7;
            color: #374151;
        }

        .report-text-view p {
            margin-bottom: 8px;
        }

        .ql-container {
            font-size: 14px;
        }

        .ql-editor {
            min-height: 150px;
        }
    </style>

    @if ($editable)
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const toolbarOptions = [
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    ['clean']
                ];

                function initQuill(editorId, inputId) {
                    const el = document.getElementById(editorId);
                    if (!el) return null;
                    const q = new Quill(el, {
                        theme: 'snow',
                        modules: {
                            toolbar: toolbarOptions
                        }
                    });
                    const input = document.getElementById(inputId);
                    q.on('text-change', () => {
                        if (input) input.value = q.root.innerHTML;
                    });
                    if (input) input.value = q.root.innerHTML;
                    return q;
                }

                initQuill('editor-clinical', 'input-clinical');
                initQuill('editor-assessment', 'input-assessment');
                initQuill('editor-diagnostic', 'input-diagnostic');
                initQuill('editor-patient-summary', 'input-patient-summary');

                // Checkbox card toggle
                document.querySelectorAll('.doc-check, .rec-check').forEach(cb => {
                    cb.addEventListener('change', () => {
                        cb.closest('.doc-checkbox-card, .rec-checkbox-card').classList.toggle('checked',
                            cb.checked);
                    });
                });

                // Dynamic findings
                document.getElementById('addFinding')?.addEventListener('click', () => {
                    const list = document.getElementById('findings-list');
                    const count = list.querySelectorAll('.finding-row').length + 1;
                    const row = document.createElement('div');
                    row.className = 'finding-row d-flex gap-2 mb-2';
                    row.innerHTML =
                        `<input type="text" class="form-control" name="key_findings[]" placeholder="Finding ${count}">
            <button type="button" class="btn btn-outline-danger btn-sm remove-finding flex-shrink-0"><i class="isax isax-minus-cirlce"></i></button>`;
                    list.appendChild(row);
                    row.querySelector('.remove-finding').addEventListener('click', () => row.remove());
                });

                document.querySelectorAll('.remove-finding').forEach(btn => {
                    btn.addEventListener('click', () => btn.closest('.finding-row').remove());
                });

                // Dynamic questions
                document.getElementById('addQuestion')?.addEventListener('click', () => {
                    const list = document.getElementById('questions-list');
                    const count = list.querySelectorAll('.question-row').length + 1;
                    const row = document.createElement('div');
                    row.className = 'question-row d-flex gap-2 mb-2 align-items-center';
                    row.innerHTML =
                        `<span class="text-muted small fw-semibold flex-shrink-0" style="width:20px;">${count}.</span>
            <input type="text" class="form-control" name="questions_for_physician[]" placeholder="Question ${count}">
            <button type="button" class="btn btn-outline-danger btn-sm remove-question flex-shrink-0"><i class="isax isax-minus-cirlce"></i></button>`;
                    list.appendChild(row);
                    row.querySelector('.remove-question').addEventListener('click', () => row.remove());
                });

                document.querySelectorAll('.remove-question').forEach(btn => {
                    btn.addEventListener('click', () => btn.closest('.question-row').remove());
                });

                // Stepper scroll spy
                const sectionEls = document.querySelectorAll('.report-section');
                const stepLinks = document.querySelectorAll('.stepper-link');

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            stepLinks.forEach(l => l.classList.remove('active'));
                            const link = document.querySelector(
                                `.stepper-link[data-section="${entry.target.id}"]`);
                            if (link) link.classList.add('active');
                        }
                    });
                }, {
                    threshold: 0.3
                });

                sectionEls.forEach(el => observer.observe(el));

                // Collect form data
                function collectData() {
                    const form = document.getElementById('reportForm');
                    const fd = new FormData(form);
                    const data = {};

                    // patient_information
                    data.patient_information = {};
                    for (const [k, v] of fd.entries()) {
                        if (k.startsWith('patient_information[')) {
                            const key = k.replace('patient_information[', '').replace(']', '');
                            data.patient_information[key] = v;
                        }
                    }

                    // documents_reviewed
                    data.documents_reviewed = {
                        medical_records: false,
                        laboratory_results: false,
                        imaging_studies: false,
                        pathology_reports: false,
                        operative_reports: false,
                        consultation_notes: false,
                        other: ''
                    };
                    for (const [k, v] of fd.entries()) {
                        if (k.startsWith('documents_reviewed[')) {
                            const key = k.replace('documents_reviewed[', '').replace(']', '');
                            data.documents_reviewed[key] = key === 'other' ? v : true;
                        }
                    }

                    // recommendations
                    data.recommendations = {
                        additional_testing: false,
                        additional_imaging: false,
                        specialist_referral: false,
                        treatment_modification: false,
                        monitoring: false,
                        surgical_consultation: false,
                        lifestyle_modifications: false,
                        other: false,
                        details: ''
                    };
                    for (const [k, v] of fd.entries()) {
                        if (k.startsWith('recommendations[')) {
                            const key = k.replace('recommendations[', '').replace(']', '');
                            data.recommendations[key] = key === 'details' ? v : true;
                        }
                    }

                    data.clinical_summary = fd.get('clinical_summary') || '';
                    data.second_opinion_assessment = fd.get('second_opinion_assessment') || '';
                    data.diagnostic_considerations = fd.get('diagnostic_considerations') || '';
                    data.patient_friendly_summary = fd.get('patient_friendly_summary') || '';
                    data.key_findings = fd.getAll('key_findings[]').filter(v => v.trim());
                    data.questions_for_physician = fd.getAll('questions_for_physician[]').filter(v => v.trim());

                    return data;
                }

                function showSaving() {
                    const ind = document.getElementById('saveIndicator');
                    const icon = document.getElementById('saveIcon');
                    const text = document.getElementById('saveText');
                    ind.style.display = 'block';
                    icon.className = 'spinner-border spinner-border-sm text-primary';
                    text.textContent = '{{ __('app.reports.saving') }}';
                }

                function showSaved() {
                    const icon = document.getElementById('saveIcon');
                    const text = document.getElementById('saveText');
                    icon.className = 'text-success';
                    icon.innerHTML = '✓';
                    text.textContent = '{{ __('app.reports.saved') }}';
                    setTimeout(() => {
                        document.getElementById('saveIndicator').style.display = 'none';
                        icon.innerHTML = '';
                        icon.className = 'spinner-border spinner-border-sm text-primary';
                    }, 2000);
                }

                function showError() {
                    const icon = document.getElementById('saveIcon');
                    const text = document.getElementById('saveText');
                    icon.className = 'text-danger';
                    icon.innerHTML = '✕';
                    text.textContent = '{{ __('app.reports.save_failed') }}';
                    setTimeout(() => {
                        document.getElementById('saveIndicator').style.display = 'none';
                    }, 3000);
                }

                async function saveDraft() {
                    showSaving();
                    const data = collectData();
                    try {
                        const res = await fetch('{{ route('doctor.reports.save-draft', $reportId) }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content ||
                                    '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify(data),
                        });
                        if (res.ok) showSaved();
                        else showError();
                    } catch (e) {
                        showError();
                    }
                }

                // Save draft buttons
                ['btnSaveDraft', 'btnSaveDraft2'].forEach(id => {
                    document.getElementById(id)?.addEventListener('click', saveDraft);
                });

                // Auto-save every 60s
                setInterval(saveDraft, 60000);

                // Ensure patient age & gender are filled before submitting
                function validatePatientInfo() {
                    const ageEl = document.getElementById('patient_age');
                    const genderEl = document.getElementById('patient_gender');
                    const missing = [];
                    if (!ageEl?.value.trim()) missing.push('{{ __('app.reports.age') }}');
                    if (!genderEl?.value.trim()) missing.push('{{ __('app.reports.gender') }}');

                    if (missing.length) {
                        alert('{{ __('app.reports.patient_info_required') }}: ' + missing.join(', '));
                        document.getElementById('patient-info').scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        (!ageEl.value.trim() ? ageEl : genderEl).focus();
                        return false;
                    }
                    return true;
                }

                // Submit
                async function submitReport() {
                    if (!validatePatientInfo()) return;
                    await saveDraft();
                    if (confirm('{{ __('app.reports.submit_confirm') }}')) {
                        document.getElementById('submitForm').submit();
                    }
                }

                ['btnSubmit', 'btnSubmit2'].forEach(id => {
                    document.getElementById(id)?.addEventListener('click', submitReport);
                });
            });
        </script>
    @endif

    <style>
        body {
            background-color: #f5f7fb !important;
        }
    </style>
@endsection
