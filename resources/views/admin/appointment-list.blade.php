<?php $page = 'appointment-list'; ?>
@extends('admin.layout.mainlayout')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Appointments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- ── Stat cards ──────────────────────────────────────────── --}}
        @php
            $statCards = [
                ['label' => 'Total',     'count' => $stats['total'],     'icon' => 'fe-activity',     'color' => '#0ea5e9', 'bg' => 'rgba(14,165,233,.1)',  'type' => '',        'val' => ''],
                ['label' => 'Completed', 'count' => $stats['completed'], 'icon' => 'fe-check-circle', 'color' => '#10b981', 'bg' => 'rgba(16,185,129,.1)',  'type' => 'status',  'val' => 'completed'],
                ['label' => 'Pending',   'count' => $stats['pending'],   'icon' => 'fe-clock',        'color' => '#f59e0b', 'bg' => 'rgba(245,158,11,.1)', 'type' => 'status',  'val' => 'pending'],
                ['label' => 'Confirmed', 'count' => $stats['confirmed'], 'icon' => 'fe-calendar',     'color' => '#6366f1', 'bg' => 'rgba(99,102,241,.1)',  'type' => 'status',  'val' => 'confirmed'],
                ['label' => 'Paid',      'count' => $stats['paid'],      'icon' => 'fe-dollar-sign',  'color' => '#22c55e', 'bg' => 'rgba(34,197,94,.1)',   'type' => 'payment', 'val' => 'completed'],
            ];
        @endphp

        <div class="row g-3 mb-4">
            @foreach ($statCards as $card)
                <div class="col-6 col-sm-4 col-lg">
                    <div class="card appt-stat h-100"
                         data-filter-type="{{ $card['type'] }}"
                         data-filter-val="{{ $card['val'] }}"
                         data-color="{{ $card['color'] }}"
                         style="cursor:pointer">
                        <div class="card-body py-3 px-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                                     style="width:44px;height:44px;background:{{ $card['bg'] }}">
                                    <i class="fe {{ $card['icon'] }}"
                                       style="color:{{ $card['color'] }};font-size:1.15rem"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0" style="color:#0f172a">{{ number_format($card['count']) }}</h5>
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

        {{-- ── Main table card ─────────────────────────────────────── --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        {{-- Filters --}}
                        <div class="d-flex align-items-end flex-wrap gap-2 mb-3">
                            <div>
                                <label class="form-label fw-semibold mb-1 small">Status</label>
                                <select id="statusFilter" class="form-select form-select-sm" style="min-width:150px">
                                    <option value="">All Statuses</option>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="completed">Completed</option>
                                    <option value="completedPaid">Completed &amp; Paid</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label fw-semibold mb-1 small">Date</label>
                                <input type="date" id="appointmentDateFilter" class="form-control form-control-sm">
                            </div>
                            <button type="button" class="btn btn-sm btn-light" id="clearAppointmentFilters">
                                <i class="fe fe-x me-1"></i>Clear
                            </button>
                        </div>

                        {{-- Pagination info + buttons --}}
                        <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                            <small id="paginationInfo" class="text-muted"></small>
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" id="previousAppointments"
                                        class="btn btn-sm btn-outline-secondary" disabled>Previous</button>
                                <button type="button" id="nextAppointments"
                                        class="btn btn-sm btn-outline-primary"
                                        {{ $hasMore ? '' : 'disabled' }}>Next</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Doctor</th>
                                        <th>Patient</th>
                                        <th>Date / Time</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Payout</th>
                                    </tr>
                                </thead>
                                <tbody id="appointmentsTableBody">
                                    @forelse($appointments as $appointment)
                                        @php
                                            $date      = $appointment['appointmentDate'] ?? ($appointment['date'] ?? null);
                                            $time      = trim(($appointment['startTime'] ?? ($appointment['time'] ?? '')) . ($appointment['endTime'] ?? null ? ' - ' . $appointment['endTime'] : ''));
                                            $status    = $appointment['status'] ?? 'pending';
                                            $payStatus = $appointment['paymentStatus'] ?? 'pending';
                                            $payoutSt  = $appointment['payoutStatus'] ?? 'pending';
                                            $apptId    = $appointment['id'] ?? ($appointment['documentId'] ?? '');
                                            $isCompleted = in_array($status, ['completed', 'completedPaid']);
                                            $canHold    = $isCompleted && !in_array($payoutSt, ['held', 'released', 'refunded']);
                                            $canRelease = $isCompleted && !in_array($payoutSt, ['released', 'refunded']);
                                            $canRefund  = $isCompleted && !in_array($payoutSt, ['released', 'refunded']);
                                        @endphp
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ url('admin/profile') }}" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle"
                                                             src="{{ asset('build/admin/img/doc-placeholder.png') }}" alt="">
                                                    </a>
                                                    <a href="{{ url('admin/profile') }}">
                                                        {{ $appointment['doctorName'] ?? 'Doctor' }}
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{ url('admin/profile') }}" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle"
                                                             src="{{ asset('build/admin/img/user-placeholder.png') }}" alt="">
                                                    </a>
                                                    <a href="{{ url('admin/profile') }}">
                                                        {{ $appointment['patientName'] ?? 'Patient' }}
                                                    </a>
                                                </h2>
                                            </td>
                                            <td>
                                                {{ $date ? \Carbon\Carbon::parse($date)->format('d M Y') : '-' }}
                                                <span class="text-primary d-block">{{ $time ?: '-' }}</span>
                                            </td>
                                            <td>
                                                <form method="POST"
                                                      action="{{ route('admin.appointments.status', $apptId) }}">
                                                    @csrf @method('PATCH')
                                                    <select name="status" class="form-select-sm"
                                                            onchange="this.form.submit()">
                                                        @foreach (['pending','confirmed','completed','completedPaid','cancelled'] as $opt)
                                                            <option value="{{ $opt }}"
                                                                    {{ $status === $opt ? 'selected' : '' }}>
                                                                {{ $opt === 'completedPaid' ? 'Completed & Paid' : ucfirst($opt) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>
                                            <td>
                                                ${{ number_format((float) ($appointment['amount'] ?? 0), 2) }}
                                                <span class="badge {{ $payStatus === 'completed' ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $payStatus === 'completed' ? 'Paid' : 'Unpaid' }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($payoutSt === 'released')
                                                    <span class="badge bg-success">Released</span>
                                                @elseif ($payoutSt === 'refunded')
                                                    <span class="badge bg-danger">Refunded</span>
                                                @else
                                                    <div class="d-flex flex-column gap-1">
                                                        <form method="POST" action="{{ route('admin.appointments.payment.hold',    $apptId) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning btn-sm w-100" {{ $canHold    ? '' : 'disabled' }}>Hold</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('admin.appointments.payment.release', $apptId) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm w-100" {{ $canRelease ? '' : 'disabled' }}>Release</button>
                                                        </form>
                                                        <form method="POST" action="{{ route('admin.appointments.payment.refund',  $apptId) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger  btn-sm w-100" {{ $canRefund  ? '' : 'disabled' }}>Refund</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No appointments found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
const APPOINTMENTS_URL = "{{ route('admin.appointments.data') }}";
const CSRF             = "{{ csrf_token() }}";

let cursorStack   = [];
let currentCursor = null;
let nextCursor    = @json($nextCursor ?? null);
let activeDate    = '';
let activeStatus  = '';
let activePayment = '';
let pageIndex     = 0;
const PAGE_SIZE   = 10;
let currentCount  = {{ count($appointments) }};

const tableBody    = document.getElementById('appointmentsTableBody');
const dateInput    = document.getElementById('appointmentDateFilter');
const statusSelect = document.getElementById('statusFilter');
const nextBtn      = document.getElementById('nextAppointments');
const prevBtn      = document.getElementById('previousAppointments');
const clearBtn     = document.getElementById('clearAppointmentFilters');
const pageInfo     = document.getElementById('paginationInfo');

const SPINNER_SM  = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
const LOADING_ROW = `<tr><td colspan="6" class="text-center py-4">${SPINNER_SM} <span class="ms-2 text-muted">Loading…</span></td></tr>`;

function spinBtn(btn)    { if (!btn) return; btn.dataset.origHtml = btn.innerHTML; btn.innerHTML = SPINNER_SM; btn.disabled = true; }
function restoreBtn(btn) { if (!btn || !btn.dataset.origHtml) return; btn.innerHTML = btn.dataset.origHtml; delete btn.dataset.origHtml; }
function syncButtons()   { prevBtn.disabled = cursorStack.length === 0; nextBtn.disabled = !nextCursor; }

function updatePageInfo() {
    if (currentCount === 0) { pageInfo.textContent = ''; return; }
    const from = pageIndex * PAGE_SIZE + 1;
    const to   = from + currentCount - 1;
    pageInfo.textContent = nextCursor ? `Showing ${from}–${to}` : `Showing ${from}–${to} of ${to}`;
}

// ── Stat card highlight ──────────────────────────────────────
function highlightStatCard(type, val) {
    document.querySelectorAll('.appt-stat').forEach(c => {
        c.classList.remove('stat-active');
        c.style.borderTop  = '';
        c.style.background = '';
    });
    const card = document.querySelector(`.appt-stat[data-filter-type="${type}"][data-filter-val="${val}"]`);
    if (card) {
        const color = card.dataset.color;
        card.classList.add('stat-active');
        card.style.borderTop  = `3px solid ${color}`;
        card.style.background = color + '12'; // ~7 % opacity
    }
}

// ── Stat card clicks ─────────────────────────────────────────
document.querySelectorAll('.appt-stat').forEach(card => {
    card.addEventListener('click', function () {
        const type = this.dataset.filterType;
        const val  = this.dataset.filterVal;

        const alreadyActive =
            (type === 'status'  && activeStatus  === val && activePayment === '') ||
            (type === 'payment' && activePayment === val && activeStatus  === '') ||
            (type === ''        && activeStatus  === '' && activePayment  === '');

        if (alreadyActive) {
            activeStatus  = '';
            activePayment = '';
            statusSelect.value = '';
            highlightStatCard('', '');
        } else {
            if (type === 'status') {
                activeStatus  = val;
                activePayment = '';
                statusSelect.value = val;
            } else if (type === 'payment') {
                activePayment = val;
                activeStatus  = '';
                statusSelect.value = '';
            } else {
                activeStatus  = '';
                activePayment = '';
                statusSelect.value = '';
            }
            highlightStatCard(type, val);
        }

        cursorStack = []; currentCursor = null; nextCursor = null; pageIndex = 0;
        fetchPage(null);
    });
});

// ── Status dropdown ──────────────────────────────────────────
statusSelect.addEventListener('change', function () {
    activeStatus  = this.value;
    activePayment = '';
    cursorStack   = []; currentCursor = null; nextCursor = null; pageIndex = 0;

    if (activeStatus) highlightStatCard('status', activeStatus);
    else              highlightStatCard('', '');

    fetchPage(null);
});

// ── Row builder ──────────────────────────────────────────────
const STATUS_LABELS = {
    pending: 'Pending', confirmed: 'Confirmed',
    completed: 'Completed', completedPaid: 'Completed & Paid', cancelled: 'Cancelled'
};

function appointmentRow(a) {
    const date       = a.appointmentDate || a.date || null;
    const time       = (a.startTime || a.time || '') + (a.endTime ? ' - ' + a.endTime : '');
    const status     = a.status       || 'pending';
    const payStatus  = a.paymentStatus || 'pending';
    const payoutSt   = a.payoutStatus  || 'pending';
    const id         = a.id || a.documentId || '';
    const completed  = ['completed', 'completedPaid'].includes(status);
    const canHold    = completed && !['held', 'released', 'refunded'].includes(payoutSt);
    const canRelease = completed && payoutSt === 'held';
    const canRefund  = completed && !['released', 'refunded'].includes(payoutSt);

    const dateFmt = date
        ? new Date(date).toLocaleDateString('en-GB', { day:'2-digit', month:'short', year:'numeric' })
        : '-';

    const statusOpts = Object.entries(STATUS_LABELS)
        .map(([v, l]) => `<option value="${v}" ${status === v ? 'selected' : ''}>${l}</option>`)
        .join('');

    const payoutHtml = payoutSt === 'released'
        ? '<span class="badge bg-success">Released</span>'
        : payoutSt === 'refunded'
            ? '<span class="badge bg-danger">Refunded</span>'
            : `<div class="d-flex flex-column gap-1">
                <form method="POST" action="/admin/appointments/${id}/payment/hold">
                    <input type="hidden" name="_token" value="${CSRF}">
                    <button type="submit" class="btn btn-warning btn-sm w-100" ${canHold    ? '' : 'disabled'}>Hold</button>
                </form>
                <form method="POST" action="/admin/appointments/${id}/payment/release">
                    <input type="hidden" name="_token" value="${CSRF}">
                    <button type="submit" class="btn btn-success btn-sm w-100" ${canRelease ? '' : 'disabled'}>Release</button>
                </form>
                <form method="POST" action="/admin/appointments/${id}/payment/refund">
                    <input type="hidden" name="_token" value="${CSRF}">
                    <button type="submit" class="btn btn-danger  btn-sm w-100" ${canRefund  ? '' : 'disabled'}>Refund</button>
                </form>
               </div>`;

    return `
    <tr>
        <td>
            <h2 class="table-avatar">
                <a href="#" class="avatar avatar-sm me-2">
                    <img class="avatar-img rounded-circle" src="/build/admin/img/doc-placeholder.png">
                </a>
                <a href="#">${a.doctorName || 'Doctor'}</a>
            </h2>
        </td>
        <td>
            <h2 class="table-avatar">
                <a href="#" class="avatar avatar-sm me-2">
                    <img class="avatar-img rounded-circle" src="/build/admin/img/user-placeholder.png">
                </a>
                <a href="#">${a.patientName || 'Patient'}</a>
            </h2>
        </td>
        <td>${dateFmt}<span class="text-primary d-block">${time || '-'}</span></td>
        <td>
            <form method="POST" action="/admin/appointments/${id}/status">
                <input type="hidden" name="_token" value="${CSRF}">
                <input type="hidden" name="_method" value="PATCH">
                <select name="status" class="form-select-sm" onchange="this.form.submit()">${statusOpts}</select>
            </form>
        </td>
        <td>
            $${Number(a.amount || 0).toFixed(2)}
            <span class="badge ${payStatus === 'completed' ? 'bg-success' : 'bg-secondary'}">
                ${payStatus === 'completed' ? 'Paid' : 'Unpaid'}
            </span>
        </td>
        <td>${payoutHtml}</td>
    </tr>`;
}

// ── Fetch ────────────────────────────────────────────────────
async function fetchPage(cursor, triggerBtn = null) {
    spinBtn(triggerBtn);
    tableBody.innerHTML  = LOADING_ROW;
    pageInfo.textContent = '';
    nextBtn.disabled = prevBtn.disabled = clearBtn.disabled = true;

    const url = new URL(APPOINTMENTS_URL, window.location.origin);
    if (activeDate)    url.searchParams.set('date',    activeDate);
    if (activeStatus)  url.searchParams.set('status',  activeStatus);
    if (activePayment) url.searchParams.set('payment', activePayment);
    if (cursor)        url.searchParams.set('cursor',  cursor);

    try {
        const res  = await fetch(url, { headers: { 'Accept': 'application/json' } });
        if (!res.ok) throw new Error();
        const data = await res.json();
        const docs = data.documents || [];

        tableBody.innerHTML = docs.length
            ? docs.map(appointmentRow).join('')
            : '<tr><td colspan="6" class="text-center text-muted">No appointments found.</td></tr>';

        currentCursor = cursor;
        nextCursor    = data.hasMore ? (data.nextCursor || null) : null;
        currentCount  = docs.length;
    } catch {
        tableBody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Failed to load.</td></tr>';
        currentCount = 0;
    }

    restoreBtn(triggerBtn);
    clearBtn.disabled = false;
    syncButtons();
    updatePageInfo();
}

// ── Navigation ───────────────────────────────────────────────
nextBtn.addEventListener('click', () => { if (!nextCursor) return; cursorStack.push(currentCursor); pageIndex++; fetchPage(nextCursor, nextBtn); });
prevBtn.addEventListener('click', () => { if (!cursorStack.length) return; pageIndex--; fetchPage(cursorStack.pop(), prevBtn); });

clearBtn.addEventListener('click', () => {
    activeDate = activeStatus = activePayment = '';
    dateInput.value = statusSelect.value = '';
    cursorStack = []; currentCursor = nextCursor = null; pageIndex = 0;
    highlightStatCard('', '');
    fetchPage(null, clearBtn);
});

dateInput.addEventListener('change', function () {
    activeDate = this.value;
    cursorStack = []; currentCursor = nextCursor = null; pageIndex = 0;
    fetchPage(null);
});

// ── Spinners on payment / status changes ─────────────────────
tableBody.addEventListener('submit', e => {
    const btn = e.target.querySelector('button[type="submit"]');
    if (btn) { btn.innerHTML = SPINNER_SM; btn.disabled = true; }
});
tableBody.addEventListener('change', e => {
    const sel = e.target;
    if (sel.tagName !== 'SELECT' || sel.name !== 'status') return;
    sel.disabled = true;
    const sp = document.createElement('span');
    sp.className = 'spinner-border spinner-border-sm ms-1 text-secondary align-middle';
    sp.setAttribute('role', 'status');
    sel.insertAdjacentElement('afterend', sp);
});

syncButtons();
updatePageInfo();
highlightStatCard('', ''); // start with Total highlighted
</script>

@endsection
