<?php $page = 'support-tickets'; ?>
@extends('admin.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Support Tickets</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Support Tickets</li>
                        </ul>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Stat Cards --}}
            @php
                $statCards = [
                    ['label' => 'Total', 'count' => $stats['total'], 'icon' => 'fe-ticket', 'color' => '#0ea5e9', 'bg' => 'rgba(14,165,233,.1)'],
                    ['label' => 'Open', 'count' => $stats['open'], 'icon' => 'fe-warning', 'color' => '#f59e0b', 'bg' => 'rgba(245,158,11,.1)'],
                    ['label' => 'In Progress', 'count' => $stats['in_progress'], 'icon' => 'fe-clock', 'color' => '#6366f1', 'bg' => 'rgba(99,102,241,.1)'],
                    ['label' => 'Resolved', 'count' => $stats['resolved'], 'icon' => 'fe-check-circle', 'color' => '#10b981', 'bg' => 'rgba(16,185,129,.1)'],
                ];
            @endphp
            <div class="row g-3 mb-4">
                @foreach ($statCards as $card)
                    <div class="col-6 col-sm-3">
                        <div class="card h-100">
                            <div class="card-body py-3 px-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                                        style="width:44px;height:44px;background:{{ $card['bg'] }}">
                                        <i class="fe {{ $card['icon'] }}"
                                            style="color:{{ $card['color'] }};font-size:1.15rem"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-0" style="color:#0f172a">{{ $card['count'] }}</h5>
                                        <small class="text-muted fw-semibold"
                                            style="font-size:.7rem;text-transform:uppercase;letter-spacing:.05em">
                                            {{ $card['label'] }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Filter --}}
            <div class="d-flex align-items-end gap-2 mb-3 flex-wrap">
                <div>
                    <label class="form-label fw-semibold mb-1 small">Status</label>
                    <select id="statusFilter" class="form-select form-select-sm" style="min-width:180px">
                        <option value="">All Statuses</option>
                        <option value="open">Open</option>
                        <option value="in_progress">In Progress</option>
                        <option value="resolved">Resolved</option>
                    </select>
                </div>
                <button type="button" class="btn btn-sm btn-light" id="clearFilter">
                    <i class="fe fe-close me-1"></i>Clear
                </button>
            </div>

            {{-- Tickets --}}
            <div id="ticketsList">
                @forelse ($tickets as $ticket)
                    @php
                        $status = $ticket['status'] ?? 'open';
                        $statusMap = [
                            'open' => ['warning', 'Open'],
                            'in_progress' => ['primary', 'In Progress'],
                            'resolved' => ['success', 'Resolved'],
                        ];
                        [$statusColor, $statusLabel] = $statusMap[$status] ?? ['secondary', ucfirst($status)];

                        $userTypeMap = [
                            'patient' => ['info', 'Patient'],
                            'doctor' => ['dark', 'Doctor'],
                        ];
                        [$userTypeColor, $userTypeLabel] = $userTypeMap[$ticket['userType'] ?? ''] ?? ['secondary', 'User'];

                        $createdAt = !empty($ticket['createdAt']) ? \Carbon\Carbon::parse($ticket['createdAt'])->format('M d, Y \a\t h:i A') : '—';
                        $replySubject = 'Re: ' . ($ticket['subject'] ?? '');
                        $mailtoHref = 'mailto:' . rawurlencode($ticket['email'] ?? '') . '?subject=' . rawurlencode($replySubject);
                    @endphp
                    <div class="card mb-3" data-status="{{ $status }}">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between flex-wrap gap-2">
                                <div>
                                    <div class="d-flex align-items-center gap-2 flex-wrap mb-1">
                                        <h6 class="mb-0">{{ $ticket['subject'] ?? '(No subject)' }}</h6>
                                        <span class="badge bg-{{ $statusColor }}-subtle text-{{ $statusColor }}">{{ $statusLabel }}</span>
                                        <span class="badge bg-{{ $userTypeColor }}-subtle text-{{ $userTypeColor }}">{{ $userTypeLabel }}</span>
                                    </div>
                                    <p class="text-muted small mb-0">
                                        From: <span class="fw-semibold">{{ $ticket['name'] ?? 'Unknown' }}</span>
                                        ({{ $ticket['email'] ?? '—' }}) &middot; {{ $createdAt }}
                                    </p>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse"
                                    data-bs-target="#ticket-{{ $ticket['id'] }}">
                                    <i class="fe fe-eye me-1"></i>View
                                </button>
                            </div>

                            <div class="collapse mt-3" id="ticket-{{ $ticket['id'] }}">
                                <div class="p-3 rounded-3 mb-3" style="background:#f8fafc;border:1px solid #e2e8f0;">
                                    <p class="mb-0" style="white-space:pre-wrap;">{{ $ticket['message'] ?? '' }}</p>
                                </div>

                                <div class="d-flex align-items-center gap-2 flex-wrap mb-3">
                                    <span class="text-muted small">Reply via email:</span>
                                    <code class="ticket-email-value">{{ $ticket['email'] ?? '—' }}</code>
                                    <button type="button" class="btn btn-sm btn-outline-secondary copy-email-btn"
                                        data-email="{{ $ticket['email'] ?? '' }}">
                                        Copy Email
                                    </button>
                                    <a href="{{ $mailtoHref }}" class="btn btn-sm btn-primary">
                                        <i class="fe fe-mail me-1"></i>Open Mail
                                    </a>
                                </div>

                                <div class="d-flex gap-2 flex-wrap">
                                    @if ($status === 'open')
                                        <form method="POST"
                                            action="{{ route('admin.support-tickets.status', $ticket['id']) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="in_progress">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                <i class="fe fe-clock me-1"></i>Mark In Progress
                                            </button>
                                        </form>
                                        <form method="POST"
                                            action="{{ route('admin.support-tickets.status', $ticket['id']) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="resolved">
                                            <button type="submit" class="btn btn-sm btn-success"
                                                onclick="return confirm('Close this ticket?')">
                                                <i class="fe fe-check-circle me-1"></i>Close Ticket
                                            </button>
                                        </form>
                                    @elseif ($status === 'in_progress')
                                        <form method="POST"
                                            action="{{ route('admin.support-tickets.status', $ticket['id']) }}">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="resolved">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fe fe-check-circle me-1"></i>Mark Resolved
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body text-center text-muted py-4">No support tickets found.</div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    <script>
        document.getElementById('statusFilter')?.addEventListener('change', function() {
            const val = this.value;
            document.querySelectorAll('#ticketsList > [data-status]').forEach(card => {
                card.style.display = (!val || card.dataset.status === val) ? '' : 'none';
            });
        });

        document.getElementById('clearFilter')?.addEventListener('click', function() {
            document.getElementById('statusFilter').value = '';
            document.querySelectorAll('#ticketsList > [data-status]').forEach(card => {
                card.style.display = '';
            });
        });

        document.querySelectorAll('.copy-email-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const email = this.dataset.email;
                if (!email) return;
                navigator.clipboard.writeText(email).then(() => {
                    const original = this.textContent;
                    this.textContent = 'Copied!';
                    setTimeout(() => { this.textContent = original; }, 1500);
                });
            });
        });
    </script>
@endsection
