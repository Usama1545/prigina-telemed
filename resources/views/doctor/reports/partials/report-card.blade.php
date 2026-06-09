<div class="card mb-3 border-0 shadow-sm report-card">
    <div class="card-body">
        <div class="d-flex align-items-start justify-content-between gap-3">

            <div class="d-flex align-items-center gap-3 flex-grow-1 min-w-0">
                <div class="report-icon-box flex-shrink-0" style="width:48px;height:48px;background:#eef2ff;border-radius:14px;display:flex;align-items:center;justify-content:center;">
                    <i class="isax isax-document-text" style="font-size:22px;color:#4338ca;"></i>
                </div>
                <div class="min-w-0">
                    <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                        <h6 class="mb-0 fw-bold" style="color:#111827;">
                            {{ $report['report_number'] ?? 'N/A' }}
                        </h6>
                        <span class="badge bg-{{ $statusColor }}-subtle text-{{ $statusColor }} text-capitalize" style="font-size:11px;">
                            {{ str_replace('_', ' ', $report['status'] ?? 'draft') }}
                        </span>
                    </div>
                    <p class="mb-1 text-muted small">
                        Patient: <strong>{{ $report['patient_information']['patient_name'] ?? '—' }}</strong>
                    </p>
                    <p class="mb-0 text-muted small">
                        Created: {{ isset($report['created_at']) ? \Carbon\Carbon::parse($report['created_at'])->format('M d, Y') : '—' }}
                        @if(!empty($report['submitted_at']))
                            &nbsp;·&nbsp; Submitted: {{ \Carbon\Carbon::parse($report['submitted_at'])->format('M d, Y') }}
                        @endif
                    </p>
                    @if($report['status'] === 'revision_requested' && !empty($report['rejection_reason']))
                        <div class="mt-2 p-2 rounded-3" style="background:#fff5f5;border:1px solid #fecaca;">
                            <p class="mb-0 small" style="color:#dc2626;"><i class="isax isax-info-circle me-1"></i><strong>Revision note:</strong> {{ $report['rejection_reason'] }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-flex flex-column gap-2 flex-shrink-0">
                @if(in_array($report['status'], ['draft', 'revision_requested']))
                    <a href="{{ route('doctor.reports.edit', $report['id']) }}"
                       class="btn btn-sm btn-primary">
                        <i class="isax isax-edit me-1"></i> Edit
                    </a>
                @endif
                @if($report['status'] === 'submitted' || $report['status'] === 'approved' || $report['status'] === 'published')
                    <a href="{{ route('doctor.reports.edit', $report['id']) }}"
                       class="btn btn-sm btn-outline-secondary">
                        <i class="isax isax-eye me-1"></i> View
                    </a>
                @endif
                <a href="{{ route('doctor.reports.pdf', $report['id']) }}" target="_blank"
                   class="btn btn-sm btn-outline-primary">
                    <i class="isax isax-document-download me-1"></i> PDF
                </a>
            </div>

        </div>
    </div>
</div>
