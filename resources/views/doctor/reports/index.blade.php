<?php $page = 'doctor-reports'; ?>
@extends('layouts.mainlayout')

@section('content')
<div class="content doctor-content">
    <div class="container doc-container">
        <div class="row">

            <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                @include('partials.doctor-sidebar')
            </div>

            <div class="col-lg-8 col-xl-9">

                <div class="dashboard-header d-flex align-items-center justify-content-between mb-3">
                    <h3>{{ __('app.reports.title') }}</h3>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="appointment-tab-head">
                    <div class="appointment-tabs">
                        <ul class="nav nav-pills inner-tab" id="reportTabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-draft" type="button">
                                    Drafts <span>{{ $grouped['draft']->count() }}</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-submitted" type="button">
                                    Awaiting Review <span>{{ $grouped['submitted']->count() }}</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-revision" type="button">
                                    Revision Requested <span>{{ $grouped['revision_requested']->count() }}</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-published" type="button">
                                    Published <span>{{ $grouped['published']->count() }}</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content appointment-tab-content">

                    {{-- DRAFTS --}}
                    <div class="tab-pane fade show active" id="tab-draft">
                        @forelse($grouped['draft'] as $report)
                            @include('doctor.reports.partials.report-card', ['report' => $report, 'statusColor' => 'secondary'])
                        @empty
                            <div class="text-center py-5 text-muted">No draft reports.</div>
                        @endforelse
                    </div>

                    {{-- SUBMITTED --}}
                    <div class="tab-pane fade" id="tab-submitted">
                        @forelse($grouped['submitted'] as $report)
                            @include('doctor.reports.partials.report-card', ['report' => $report, 'statusColor' => 'warning'])
                        @empty
                            <div class="text-center py-5 text-muted">No reports awaiting review.</div>
                        @endforelse
                    </div>

                    {{-- REVISION --}}
                    <div class="tab-pane fade" id="tab-revision">
                        @forelse($grouped['revision_requested'] as $report)
                            @include('doctor.reports.partials.report-card', ['report' => $report, 'statusColor' => 'danger'])
                        @empty
                            <div class="text-center py-5 text-muted">No reports requiring revision.</div>
                        @endforelse
                    </div>

                    {{-- PUBLISHED --}}
                    <div class="tab-pane fade" id="tab-published">
                        @forelse($grouped['published'] as $report)
                            @include('doctor.reports.partials.report-card', ['report' => $report, 'statusColor' => 'success'])
                        @empty
                            <div class="text-center py-5 text-muted">No published reports.</div>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<style>body { background-color: #f5f7fb !important }</style>
@endsection
