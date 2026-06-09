<?php $page = 'patient-reports'; ?>
@extends('layouts.mainlayout')
@section('content')

<div class="content patient-content">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                @include('partials.patient-sidebar')
            </div>

            <div class="col-lg-8 col-xl-9">

                <div class="dashboard-header mb-3">
                    <h3>My Medical Reports</h3>
                </div>

                @if(empty($reports))
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center py-5">
                            <div style="width:72px;height:72px;border-radius:20px;background:#eef2ff;display:inline-flex;align-items:center;justify-content:center;margin-bottom:16px;">
                                <i class="isax isax-document-text" style="font-size:32px;color:#4338ca;"></i>
                            </div>
                            <h5 class="fw-bold mb-2">No Reports Yet</h5>
                            <p class="text-muted mb-0">Your second opinion reports will appear here once they are published by your doctor.</p>
                        </div>
                    </div>
                @else
                    <div class="row g-3">
                        @foreach($reports as $report)
                        <div class="col-12">
                            <div class="card border-0 shadow-sm report-card-patient">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start justify-content-between gap-3">
                                        <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0">
                                            <div style="width:52px;height:52px;border-radius:16px;background:linear-gradient(135deg,#1d4ed8,#0891b2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                                <i class="isax isax-document-text" style="font-size:24px;color:#fff;"></i>
                                            </div>
                                            <div class="min-w-0">
                                                <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                                    <h6 class="mb-0 fw-bold" style="color:#111827;">
                                                        {{ $report['report_number'] ?? 'Report' }}
                                                    </h6>
                                                    <span class="badge bg-success-subtle text-success">Published</span>
                                                </div>
                                                <p class="mb-1 text-muted small">
                                                    Doctor: <strong>Dr. {{ $report['certification']['physician_name'] ?? '—' }}</strong>
                                                    @if(!empty($report['certification']['specialty']))
                                                        · {{ $report['certification']['specialty'] }}
                                                    @endif
                                                </p>
                                                <p class="mb-0 text-muted small">
                                                    Published: {{ isset($report['published_at']) ? \Carbon\Carbon::parse($report['published_at'])->format('M d, Y') : '—' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-2 flex-shrink-0">
                                            <a href="{{ route('patient.reports.show', $report['id']) }}"
                                               class="btn btn-sm btn-primary">
                                                <i class="isax isax-eye me-1"></i> View
                                            </a>
                                            <a href="{{ route('patient.reports.pdf', $report['id']) }}" target="_blank"
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="isax isax-document-download me-1"></i> Download
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

<style>body { background-color: #f5f7fb !important; }</style>
@endsection
