<?php $page = 'second-opinion'; ?>
@extends('admin.layout.mainlayout')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Second Opinion Reports</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Second Opinion</li>
                    </ul>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Stat Cards --}}
        @php
            $statCards = [
                ['label' => 'Total',              'count' => $stats['total'],              'icon' => 'fe-file-text',    'color' => '#0ea5e9', 'bg' => 'rgba(14,165,233,.1)'],
                ['label' => 'Awaiting Review',    'count' => $stats['submitted'],          'icon' => 'fe-clock',        'color' => '#f59e0b', 'bg' => 'rgba(245,158,11,.1)'],
                ['label' => 'Revision Requested', 'count' => $stats['revision_requested'], 'icon' => 'fe-alert-circle', 'color' => '#ef4444', 'bg' => 'rgba(239,68,68,.1)'],
                ['label' => 'Approved',           'count' => $stats['approved'],           'icon' => 'fe-check-circle', 'color' => '#6366f1', 'bg' => 'rgba(99,102,241,.1)'],
                ['label' => 'Published',          'count' => $stats['published'],          'icon' => 'fe-send',         'color' => '#10b981', 'bg' => 'rgba(16,185,129,.1)'],
            ];
        @endphp
        <div class="row g-3 mb-4">
            @foreach($statCards as $card)
            <div class="col-6 col-sm-4 col-lg">
                <div class="card h-100">
                    <div class="card-body py-3 px-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                                 style="width:44px;height:44px;background:{{ $card['bg'] }}">
                                <i class="fe {{ $card['icon'] }}" style="color:{{ $card['color'] }};font-size:1.15rem"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0" style="color:#0f172a">{{ $card['count'] }}</h5>
                                <small class="text-muted fw-semibold" style="font-size:.7rem;text-transform:uppercase;letter-spacing:.05em">
                                    {{ $card['label'] }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="card-body">

                {{-- Filter --}}
                <div class="d-flex align-items-end gap-2 mb-3 flex-wrap">
                    <div>
                        <label class="form-label fw-semibold mb-1 small">Status</label>
                        <select id="statusFilter" class="form-select form-select-sm" style="min-width:180px">
                            <option value="">All Statuses</option>
                            <option value="draft">Draft</option>
                            <option value="submitted">Submitted</option>
                            <option value="revision_requested">Revision Requested</option>
                            <option value="approved">Approved</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-sm btn-light" id="clearFilter">
                        <i class="fe fe-x me-1"></i>Clear
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="reportsTable">
                        <thead>
                            <tr>
                                <th>Report #</th>
                                <th>Patient</th>
                                <th>Doctor</th>
                                <th>Appointment</th>
                                <th>Submitted</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports as $report)
                            <tr data-status="{{ $report['status'] }}">
                                <td>
                                    <span class="fw-semibold" style="color:#1d4ed8;">{{ $report['report_number'] ?? '—' }}</span>
                                </td>
                                <td>{{ $report['patient_information']['patient_name'] ?? '—' }}</td>
                                <td>
                                    <small class="text-muted">ID: {{ substr($report['doctor_id'] ?? '—', 0, 12) }}…</small>
                                </td>
                                <td>
                                    <small class="text-muted">{{ substr($report['appointment_id'] ?? '—', 0, 12) }}…</small>
                                </td>
                                <td>
                                    @if(!empty($report['submitted_at']))
                                        {{ \Carbon\Carbon::parse($report['submitted_at'])->format('M d, Y') }}
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $statusMap = [
                                            'draft'              => ['secondary', 'Draft'],
                                            'submitted'          => ['warning',   'Awaiting Review'],
                                            'revision_requested' => ['danger',    'Revision Requested'],
                                            'approved'           => ['primary',   'Approved'],
                                            'published'          => ['success',   'Published'],
                                        ];
                                        [$color, $label] = $statusMap[$report['status'] ?? 'draft'] ?? ['secondary', $report['status']];
                                    @endphp
                                    <span class="badge bg-{{ $color }}-subtle text-{{ $color }}">{{ $label }}</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <a href="{{ route('admin.second-opinion.show', $report['id']) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            <i class="fe fe-eye me-1"></i>View
                                        </a>
                                        @if($report['status'] === 'submitted')
                                        <form method="POST" action="{{ route('admin.second-opinion.approve', $report['id']) }}" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success"
                                                    onclick="return confirm('Approve this report?')">
                                                Approve
                                            </button>
                                        </form>
                                        @endif
                                        @if($report['status'] === 'approved')
                                        <form method="POST" action="{{ route('admin.second-opinion.publish', $report['id']) }}" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                    onclick="return confirm('Publish this report to the patient?')">
                                                Publish
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No reports found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

<script>
document.getElementById('statusFilter')?.addEventListener('change', function () {
    const val = this.value;
    document.querySelectorAll('#reportsTable tbody tr[data-status]').forEach(row => {
        row.style.display = (!val || row.dataset.status === val) ? '' : 'none';
    });
});

document.getElementById('clearFilter')?.addEventListener('click', function () {
    document.getElementById('statusFilter').value = '';
    document.querySelectorAll('#reportsTable tbody tr[data-status]').forEach(row => {
        row.style.display = '';
    });
});
</script>

@endsection
