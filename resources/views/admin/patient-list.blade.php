<?php $page = 'patient-list'; ?>
@extends('admin.layout.mainlayout')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Patients</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Patients</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">

                {{-- Toolbar --}}
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <div class="flex-grow-1" style="max-width:280px;">
                        <input type="text" id="patientSearch" class="form-control form-control-sm"
                            placeholder="Search by name…">
                    </div>
                    <div class="ms-auto d-flex align-items-center gap-2">
                        <span id="patientPageInfo" class="text-muted small me-1"></span>
                        <button id="patientPrevBtn" class="btn btn-sm btn-outline-secondary" disabled>
                            <i class="fe fe-chevron-left"></i> Previous
                        </button>
                        <button id="patientNextBtn" class="btn btn-sm btn-outline-secondary" disabled>
                            Next <i class="fe fe-chevron-right"></i>
                        </button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Joined</th>
                                <th>Active</th>
                            </tr>
                        </thead>
                        <tbody id="patientTableBody">
                            @forelse($patients as $p)
                                @php
                                    $pid      = $p['id'] ?? '';
                                    $name     = $p['name'] ?? $p['displayName'] ?? 'Patient';
                                    $photo    = $p['photoUrl'] ?? asset('build/admin/img/user-placeholder.png');
                                    $email    = $p['email'] ?? '';
                                    $phone    = $p['phone'] ?? $p['phoneNumber'] ?? '-';
                                    $dob      = $p['dob'] ?? $p['dateOfBirth'] ?? null;
                                    $age      = $dob ? \Carbon\Carbon::parse($dob)->age : ($p['age'] ?? '-');
                                    $joined   = $p['createdAt'] ?? $p['registeredAt'] ?? null;
                                    $isActive = (bool) ($p['isActive'] ?? false);
                                @endphp
                                <tr>
                                    <td>
                                        <h2 class="table-avatar">
                                            <span class="avatar avatar-sm me-2">
                                                <img class="avatar-img rounded-circle"
                                                    src="{{ $photo }}" alt="{{ $name }}">
                                            </span>
                                            <span>
                                                {{ $name }}
                                                @if($email)
                                                    <span class="d-block text-muted small">{{ $email }}</span>
                                                @endif
                                            </span>
                                        </h2>
                                    </td>
                                    <td>{{ $phone }}</td>
                                    <td>{{ $age }}</td>
                                    <td>{{ $joined ? \Carbon\Carbon::parse($joined)->format('d M Y') : '-' }}</td>
                                    <td>
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input patient-active-toggle" type="checkbox"
                                                role="switch" data-id="{{ $pid }}"
                                                {{ $isActive ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No patients found.</td>
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
const patientConfig = {
    dataUrl: "{{ route('admin.patients.data') }}",
    activeUrl: (id) => `{{ url('admin/patients') }}/${id}/active`,
    csrf: "{{ csrf_token() }}",
};

const SPINNER_SM      = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
const PATIENT_LOADING = `<tr><td colspan="5" class="text-center py-4">${SPINNER_SM} <span class="ms-2 text-muted">Loading…</span></td></tr>`;
const PAGE_SIZE       = 10;

let cursorStack  = [null];   // stack[0] = first page (null cursor)
let currentCursor = null;
let currentCount  = 0;
let pageIndex     = 0;
let nextCursor    = {{ $nextCursor !== null ? $nextCursor : 'null' }};
let hasMore       = {{ $hasMore ? 'true' : 'false' }};

const tableBody    = document.getElementById('patientTableBody');
const prevBtn      = document.getElementById('patientPrevBtn');
const nextBtn      = document.getElementById('patientNextBtn');
const pageInfo     = document.getElementById('patientPageInfo');
const searchInput  = document.getElementById('patientSearch');

// ---- helpers ----

function getToastContainer() {
    let c = document.getElementById('toastContainer');
    if (!c) {
        c = document.createElement('div');
        c.id = 'toastContainer';
        c.className = 'toast-container position-fixed top-0 end-0 p-3';
        c.style.zIndex = '9999';
        document.body.appendChild(c);
    }
    return c;
}

function showToast(message, type = 'success') {
    const id = 'toast_' + Date.now();
    getToastContainer().insertAdjacentHTML('beforeend', `
        <div id="${id}" class="toast align-items-center text-bg-${type} border-0" role="alert" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fw-semibold">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>`);
    const el = document.getElementById(id);
    bootstrap.Toast.getOrCreateInstance(el, { delay: 3000 }).show();
    el.addEventListener('hidden.bs.toast', () => el.remove());
}

function updatePageInfo() {
    if (currentCount === 0) { pageInfo.textContent = ''; return; }
    const from = pageIndex * PAGE_SIZE + 1;
    const to   = from + currentCount - 1;
    pageInfo.textContent = nextCursor !== null
        ? `Showing ${from}–${to}`
        : `Showing ${from}–${to} of ${to}`;
}

function spinBtn(btn) {
    btn.dataset.origHtml = btn.innerHTML;
    btn.innerHTML = SPINNER_SM;
    btn.disabled  = true;
}

function restoreBtn(btn) {
    if (btn.dataset.origHtml) btn.innerHTML = btn.dataset.origHtml;
    btn.disabled = false;
}

// ---- row builder ----

function age(dob) {
    if (!dob) return '-';
    try {
        const birth = new Date(dob);
        const diff  = Date.now() - birth.getTime();
        return Math.floor(diff / (365.25 * 24 * 3600 * 1000));
    } catch { return '-'; }
}

function fmtDate(d) {
    if (!d) return '-';
    try {
        return new Date(d).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' });
    } catch { return d; }
}

function patientRow(p) {
    const photo    = p.photoUrl || '{{ asset("build/admin/img/user-placeholder.png") }}';
    const name     = p.name || p.displayName || 'Patient';
    const email    = p.email || '';
    const phone    = p.phone || p.phoneNumber || '-';
    const patAge   = p.age || age(p.dob || p.dateOfBirth);
    const joined   = fmtDate(p.createdAt || p.registeredAt);
    const isActive = !!p.isActive;
    const checked  = isActive ? 'checked' : '';

    return `<tr>
        <td>
            <h2 class="table-avatar">
                <span class="avatar avatar-sm me-2">
                    <img class="avatar-img rounded-circle" src="${photo}" alt="${name}">
                </span>
                <span>
                    ${name}
                    ${email ? `<span class="d-block text-muted small">${email}</span>` : ''}
                </span>
            </h2>
        </td>
        <td>${phone}</td>
        <td>${patAge}</td>
        <td>${joined}</td>
        <td>
            <div class="form-check form-switch mb-0">
                <input class="form-check-input patient-active-toggle" type="checkbox"
                    role="switch" data-id="${p.id || ''}" ${checked}>
            </div>
        </td>
    </tr>`;
}

// ---- fetch ----

function fetchPatients(cursor, triggerBtn = null) {
    if (triggerBtn) spinBtn(triggerBtn);
    tableBody.innerHTML = PATIENT_LOADING;
    prevBtn.disabled = true;
    nextBtn.disabled = true;

    const params = new URLSearchParams({ cursor: cursor ?? 0 });
    const term   = searchInput.value.trim();
    if (term) params.set('search', term);

    fetch(`${patientConfig.dataUrl}?${params}`, {
        headers: { 'Accept': 'application/json', 'X-CSRF-TOKEN': patientConfig.csrf },
    })
    .then(r => r.json())
    .then(data => {
        currentCount  = data.documents.length;
        nextCursor    = data.nextCursor ?? null;
        hasMore       = data.hasMore;
        currentCursor = cursor;

        if (currentCount === 0) {
            tableBody.innerHTML = '<tr><td colspan="5" class="text-center text-muted py-4">No patients found.</td></tr>';
        } else {
            tableBody.innerHTML = data.documents.map(patientRow).join('');
        }

        prevBtn.disabled = pageIndex === 0;
        nextBtn.disabled = !hasMore;
        updatePageInfo();
    })
    .catch(() => {
        tableBody.innerHTML = '<tr><td colspan="5" class="text-center text-danger py-4">Failed to load patients.</td></tr>';
        showToast('Failed to load patients.', 'danger');
    })
    .finally(() => {
        if (triggerBtn) restoreBtn(triggerBtn);
    });
}

// ---- pagination ----

nextBtn.addEventListener('click', () => {
    if (!hasMore || nextCursor === null) return;
    pageIndex++;
    cursorStack.push(nextCursor);
    fetchPatients(nextCursor, nextBtn);
});

prevBtn.addEventListener('click', () => {
    if (pageIndex === 0) return;
    pageIndex--;
    cursorStack.pop();
    const prev = cursorStack[cursorStack.length - 1];
    fetchPatients(prev, prevBtn);
});

// ---- search ----

let searchTimer;
searchInput.addEventListener('input', () => {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(() => {
        pageIndex   = 0;
        cursorStack = [null];
        fetchPatients(null);
    }, 350);
});

// ---- active toggle (event delegation) ----

tableBody.addEventListener('change', function (e) {
    const toggle = e.target.closest('.patient-active-toggle');
    if (!toggle) return;

    const id      = toggle.dataset.id;
    const checked = toggle.checked;

    toggle.disabled = true;
    const spinner = document.createElement('span');
    spinner.className = 'spinner-border spinner-border-sm ms-1 align-middle text-secondary';
    toggle.insertAdjacentElement('afterend', spinner);

    fetch(patientConfig.activeUrl(id), {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': patientConfig.csrf,
            'Accept': 'application/json',
        },
        body: JSON.stringify({ isActive: checked }),
    })
    .then(res => {
        if (!res.ok) throw new Error();
        showToast('Status updated.');
    })
    .catch(() => {
        toggle.checked = !checked;
        showToast('Failed to update status.', 'danger');
    })
    .finally(() => {
        spinner.remove();
        toggle.disabled = false;
    });
});

// ---- init ----
currentCount = {{ count($patients) }};
updatePageInfo();
prevBtn.disabled = true;
nextBtn.disabled = {{ !$hasMore ? 'true' : 'false' }};
</script>

@endsection
