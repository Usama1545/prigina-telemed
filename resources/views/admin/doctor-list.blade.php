<?php $page = 'doctor-list'; ?>
@extends('admin.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Doctors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Doctors</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            {{-- Toolbar --}}
                            <div class="d-flex align-items-end justify-content-between mb-3 flex-wrap gap-2">

                                <div>
                                    <label class="form-label fw-semibold mb-1">Search by Name</label>
                                    <input type="search" id="doctorSearchInput" class="form-control"
                                        placeholder="Doctor name…" style="min-width:220px">
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <small id="doctorPageInfo" class="text-muted me-1"></small>
                                    <button type="button" id="doctorPrevBtn" class="btn btn-outline-secondary"
                                        disabled>Previous</button>
                                    <button type="button" id="doctorNextBtn" class="btn btn-outline-primary"
                                        {{ $hasMore ? '' : 'disabled' }}>Next</button>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor</th>
                                            <th>Speciality</th>
                                            <th>Member Since</th>
                                            <th>Verified</th>
                                            <th>Active</th>
                                            <th>Top Doctor</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="doctorsTableBody">

                                        @forelse ($doctors as $doctor)
                                            @php
                                                $dId = $doctor['id'] ?? '';
                                                $dName = $doctor['name'] ?? ($doctor['displayName'] ?? 'Doctor');
                                                $dPhoto =
                                                    $doctor['profilePicture'] ??
                                                    ($doctor['photoUrl'] ??
                                                        asset('build/admin/img/doc-placeholder.png'));
                                                $dSpec =
                                                    collect($doctor['specializations'] ?? [])
                                                        ->filter()
                                                        ->implode(', ') ?:
                                                    $doctor['specialization'] ?? '-';
                                                $dSince = $doctor['createdAt'] ?? null;
                                                $dVerified = (bool) ($doctor['isVerified'] ?? false);
                                                $dActive = (bool) ($doctor['isActive'] ?? false);
                                                $dTop = (bool) ($doctor['isTopDoctor'] ?? false);
                                                $dDocs = $doctor['documentUrls'] ?? [];
                                            @endphp
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.doctors.show', $dId) }}"
                                                            class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-circle" src="{{ $dPhoto }}"
                                                                alt="{{ $dName }}">
                                                        </a>
                                                        <a
                                                            href="{{ route('admin.doctors.show', $dId) }}">{{ $dName }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $dSpec }}</td>
                                                <td>{{ $dSince ? \Carbon\Carbon::parse($dSince)->format('d M Y') : '-' }}
                                                </td>
                                                <td>
                                                    @if ($dVerified)
                                                        <span class="badge bg-success">Verified</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch mb-0">
                                                        <input class="form-check-input doctor-active-switch" type="checkbox"
                                                            role="switch" data-id="{{ $dId }}"
                                                            {{ $dActive ? 'checked' : '' }}>
                                                        <label
                                                            class="form-check-label">{{ $dActive ? 'Active' : 'Inactive' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch mb-0">
                                                        <input class="form-check-input doctor-top-switch" type="checkbox"
                                                            role="switch" data-id="{{ $dId }}"
                                                            {{ $dTop ? 'checked' : '' }}>
                                                        <label class="form-check-label">{{ $dTop ? 'Yes' : 'No' }}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1 flex-wrap">
                                                        @if (!empty($dDocs))
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-info doctor-docs-btn"
                                                                data-id="{{ $dId }}"
                                                                data-docs='@json($dDocs)'
                                                                title="View Documents">
                                                                <i class="fe fe-eye"></i>
                                                            </button>
                                                        @endif
                                                        @if (!$dVerified)
                                                            <button type="button"
                                                                class="btn btn-sm btn-success doctor-approve-btn"
                                                                data-id="{{ $dId }}">Approve</button>
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger doctor-decline-btn"
                                                                data-id="{{ $dId }}"
                                                                data-name="{{ $dName }}">Decline</button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted">No doctors found.</td>
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

    {{-- Documents Modal --}}
    <div class="modal fade" id="doctorDocsModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Doctor Documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="doctorDocsBody"></div>
            </div>
        </div>
    </div>

    {{-- Decline Reason Modal --}}
    <div class="modal fade" id="doctorDeclineModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Decline Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted mb-3">Declining <strong id="declineDoctorName"></strong>. Optionally provide a
                        reason.</p>
                    <textarea id="declineReason" class="form-control" rows="3" placeholder="Reason (optional)…"></textarea>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmDeclineBtn" class="btn btn-danger">Confirm Decline</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const doctorsConfig = {
            dataUrl: "{{ route('admin.doctors.data') }}",
            baseUrl: "{{ url('/admin/doctors') }}",
            csrf: "{{ csrf_token() }}",
            pageSize: 10,
        };

        // ── State ────────────────────────────────────────────────────────────────
        let cursorStack = [];
        let currentCursor = null;
        let nextCursor = @json($nextCursor ?? null);
        let pageIndex = 0;
        let currentCount = {{ count($doctors) }};
        let activeSearch = '';
        let searchTimer = null;
        let pendingDeclineId = null;

        const tableBody = document.getElementById('doctorsTableBody');
        const pageInfo = document.getElementById('doctorPageInfo');
        const nextBtn = document.getElementById('doctorNextBtn');
        const prevBtn = document.getElementById('doctorPrevBtn');
        const searchInput = document.getElementById('doctorSearchInput');

        const SPINNER_SM = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        const LOADING_ROW =
            `<tr><td colspan="7" class="text-center py-4">${SPINNER_SM} <span class="ms-2 text-muted">Loading…</span></td></tr>`;

        // ── Helpers ──────────────────────────────────────────────────────────────
        function esc(v) {
            return String(v ?? '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g,
                '&quot;').replace(/'/g, '&#039;');
        }

        function fmtDate(str) {
            if (!str) return '-';
            try {
                return new Date(str).toLocaleDateString('en-GB', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                });
            } catch {
                return str;
            }
        }

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
            bootstrap.Toast.getOrCreateInstance(el, {
                delay: 3000
            }).show();
            el.addEventListener('hidden.bs.toast', () => el.remove());
        }

        function spinBtn(btn) {
            if (!btn) return;
            btn.dataset.origHtml = btn.innerHTML;
            btn.innerHTML = SPINNER_SM;
            btn.disabled = true;
        }

        function restoreBtn(btn) {
            if (!btn || !btn.dataset.origHtml) return;
            btn.innerHTML = btn.dataset.origHtml;
            delete btn.dataset.origHtml;
        }

        function syncButtons() {
            prevBtn.disabled = cursorStack.length === 0;
            nextBtn.disabled = !nextCursor;
        }

        function updatePageInfo() {
            if (currentCount === 0) {
                pageInfo.textContent = '';
                return;
            }
            const from = pageIndex * doctorsConfig.pageSize + 1;
            const to = from + currentCount - 1;
            pageInfo.textContent = nextCursor ? `Showing ${from}–${to}` : `Showing ${from}–${to} of ${to}`;
        }

        // ── Row builder ──────────────────────────────────────────────────────────
        function doctorRow(doc) {
            const id = doc.id || '';
            const name = esc(doc.name || doc.displayName || 'Doctor');
            const photo = esc(doc.profilePicture || doc.photoUrl || '/build/admin/img/doc-placeholder.png');
            const spec = esc((doc.specializations || []).filter(Boolean).join(', ') || doc.specialization || '-');
            const since = fmtDate(doc.createdAt);
            const isVerified = Boolean(doc.isVerified);
            const isActive = Boolean(doc.isActive);
            const isTop = Boolean(doc.isTopDoctor);
            const hasDocs = doc.documentUrls && Object.keys(doc.documentUrls).length > 0;
            const docsJson = esc(JSON.stringify(doc.documentUrls || {}));

            return `
        <tr>
            <td>
                <h2 class="table-avatar">
                    <a href="${doctorsConfig.baseUrl}/${esc(id)}" class="avatar avatar-sm me-2">
                        <img class="avatar-img rounded-circle" src="${photo}" alt="${name}">
                    </a>
                    <a href="${doctorsConfig.baseUrl}/${esc(id)}">${name}</a>
                </h2>
            </td>
            <td>${spec}</td>
            <td>${since}</td>
            <td>${isVerified
                ? '<span class="badge bg-success">Verified</span>'
                : '<span class="badge bg-warning text-dark">Pending</span>'
            }</td>
            <td>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input doctor-active-switch" type="checkbox" role="switch"
                        data-id="${esc(id)}" ${isActive ? 'checked' : ''}>
                    <label class="form-check-label">${isActive ? 'Active' : 'Inactive'}</label>
                </div>
            </td>
            <td>
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input doctor-top-switch" type="checkbox" role="switch"
                        data-id="${esc(id)}" ${isTop ? 'checked' : ''}>
                    <label class="form-check-label">${isTop ? 'Yes' : 'No'}</label>
                </div>
            </td>
            <td>
                <div class="d-flex gap-1 flex-wrap">
                    ${hasDocs ? `<button type="button" class="btn btn-sm btn-outline-info doctor-docs-btn"
                                        data-id="${esc(id)}" data-docs="${docsJson}" title="View Documents">
                                        <i class="fe fe-eye"></i></button>` : ''}
                    ${!isVerified ? `
                                    <button type="button" class="btn btn-sm btn-success doctor-approve-btn" data-id="${esc(id)}">Approve</button>
                                    <button type="button" class="btn btn-sm btn-danger doctor-decline-btn"
                                        data-id="${esc(id)}" data-name="${name}">Decline</button>` : ''}
                </div>
            </td>
        </tr>`;
        }

        // ── Fetch page ────────────────────────────────────────────────────────────
        async function fetchDoctors(cursor, triggerBtn = null) {
            spinBtn(triggerBtn);
            tableBody.innerHTML = LOADING_ROW;
            pageInfo.textContent = '';
            nextBtn.disabled = prevBtn.disabled = true;

            const url = new URL(doctorsConfig.dataUrl, window.location.origin);
            if (activeSearch) url.searchParams.set('search', activeSearch);
            if (cursor !== null && cursor !== undefined) url.searchParams.set('cursor', cursor);

            try {
                const res = await fetch(url, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });
                if (!res.ok) throw new Error();
                const data = await res.json();
                const docs = data.documents || [];

                tableBody.innerHTML = docs.map(doctorRow).join('') ||
                    '<tr><td colspan="7" class="text-center text-muted">No doctors found.</td></tr>';

                currentCursor = cursor;
                nextCursor = data.hasMore ? (data.nextCursor ?? null) : null;
                currentCount = docs.length;
            } catch {
                tableBody.innerHTML =
                    '<tr><td colspan="7" class="text-center text-danger">Failed to load doctors.</td></tr>';
                currentCount = 0;
            }

            restoreBtn(triggerBtn);
            syncButtons();
            updatePageInfo();
        }

        // ── Nav buttons ───────────────────────────────────────────────────────────
        nextBtn.addEventListener('click', () => {
            if (!nextCursor) return;
            cursorStack.push(currentCursor);
            pageIndex++;
            fetchDoctors(nextCursor, nextBtn);
        });

        prevBtn.addEventListener('click', () => {
            if (!cursorStack.length) return;
            pageIndex--;
            fetchDoctors(cursorStack.pop(), prevBtn);
        });

        // ── Search ────────────────────────────────────────────────────────────────
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                activeSearch = this.value.trim();
                cursorStack = [];
                currentCursor = null;
                nextCursor = null;
                pageIndex = 0;
                fetchDoctors(null);
            }, 350);
        });

        // ── Toggle: Active ────────────────────────────────────────────────────────
        document.addEventListener('change', async function(e) {
            const toggle = e.target.closest('.doctor-active-switch');
            if (!toggle) return;

            const id = toggle.dataset.id;
            const isActive = toggle.checked;
            const label = toggle.closest('.form-check')?.querySelector('.form-check-label');

            toggle.disabled = true;
            const spinner = document.createElement('span');
            spinner.className = 'spinner-border spinner-border-sm ms-1 align-middle text-secondary';
            label?.insertAdjacentElement('afterend', spinner);

            try {
                const res = await fetch(`${doctorsConfig.baseUrl}/${id}/active`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': doctorsConfig.csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        isActive
                    }),
                });
                if (!res.ok) throw new Error();
                if (label) label.textContent = isActive ? 'Active' : 'Inactive';
                showToast(isActive ? 'Doctor activated.' : 'Doctor deactivated.');
            } catch {
                toggle.checked = !isActive;
                if (label) label.textContent = toggle.checked ? 'Active' : 'Inactive';
                showToast('Failed to update active status.', 'danger');
            } finally {
                spinner.remove();
                toggle.disabled = false;
            }
        });

        // ── Toggle: Top Doctor ────────────────────────────────────────────────────
        document.addEventListener('change', async function(e) {
            const toggle = e.target.closest('.doctor-top-switch');
            if (!toggle) return;

            const id = toggle.dataset.id;
            const isTop = toggle.checked;
            const label = toggle.closest('.form-check')?.querySelector('.form-check-label');

            toggle.disabled = true;
            const spinner = document.createElement('span');
            spinner.className = 'spinner-border spinner-border-sm ms-1 align-middle text-secondary';
            label?.insertAdjacentElement('afterend', spinner);

            try {
                const res = await fetch(`${doctorsConfig.baseUrl}/${id}/top`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': doctorsConfig.csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        isTopDoctor: isTop
                    }),
                });
                if (!res.ok) throw new Error();
                if (label) label.textContent = isTop ? 'Yes' : 'No';
                showToast(isTop ? 'Marked as Top Doctor.' : 'Removed from Top Doctors.');
            } catch {
                toggle.checked = !isTop;
                if (label) label.textContent = toggle.checked ? 'Yes' : 'No';
                showToast('Failed to update top doctor status.', 'danger');
            } finally {
                spinner.remove();
                toggle.disabled = false;
            }
        });

        // ── Approve ───────────────────────────────────────────────────────────────
        document.addEventListener('click', async function(e) {
            const btn = e.target.closest('.doctor-approve-btn');
            if (!btn) return;

            const id = btn.dataset.id;
            btn.innerHTML = SPINNER_SM;
            btn.disabled = true;

            try {
                const res = await fetch(`${doctorsConfig.baseUrl}/${id}/approve`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': doctorsConfig.csrf,
                        'Accept': 'application/json'
                    },
                });
                if (!res.ok) throw new Error();
                showToast('Doctor approved.');
                fetchDoctors(currentCursor);
            } catch {
                btn.innerHTML = 'Approve';
                btn.disabled = false;
                showToast('Failed to approve doctor.', 'danger');
            }
        });

        // ── Decline (modal) ───────────────────────────────────────────────────────
        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.doctor-decline-btn');
            if (!btn) return;
            pendingDeclineId = btn.dataset.id;
            document.getElementById('declineDoctorName').textContent = btn.dataset.name || 'this doctor';
            document.getElementById('declineReason').value = '';
            bootstrap.Modal.getOrCreateInstance(document.getElementById('doctorDeclineModal')).show();
        });

        document.getElementById('confirmDeclineBtn').addEventListener('click', async function() {
            if (!pendingDeclineId) return;
            const reason = document.getElementById('declineReason').value.trim();
            const modal = bootstrap.Modal.getInstance(document.getElementById('doctorDeclineModal'));

            this.innerHTML = SPINNER_SM;
            this.disabled = true;

            try {
                const res = await fetch(`${doctorsConfig.baseUrl}/${pendingDeclineId}/decline`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': doctorsConfig.csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        reason
                    }),
                });
                if (!res.ok) throw new Error();
                modal?.hide();
                showToast('Doctor declined.');
                fetchDoctors(currentCursor);
            } catch {
                showToast('Failed to decline doctor.', 'danger');
            } finally {
                this.innerHTML = 'Confirm Decline';
                this.disabled = false;
                pendingDeclineId = null;
            }
        });

        // ── Documents modal ───────────────────────────────────────────────────────
        const DOC_LABELS = {
            clinic_registration: 'Clinic Registration',
            degree_certificate: 'Degree Certificate',
            id_proof: 'ID Proof',
            medical_license: 'Medical License',
        };

        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.doctor-docs-btn');
            if (!btn) return;

            let docs = {};
            try {
                console.log(btn.dataset.docs);
                docs = JSON.parse(btn.dataset.docs || '{}');
                console.log(docs);
            } catch {
                console.error('Failed to parse doctor documents.');
            }

            const entries = Object.entries(docs).filter(([, v]) => v);
            const body = document.getElementById('doctorDocsBody');

            body.innerHTML = entries.length ?
                entries.map(([key, url]) => `
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                    <span class="fw-semibold">${DOC_LABELS[key] || key}</span>
                    <a href="${esc(url)}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-primary">
                        <i class="fe fe-external-link me-1"></i>View
                    </a>
                </div>`).join('') :
                '<p class="text-muted mb-0">No documents uploaded.</p>';

            bootstrap.Modal.getOrCreateInstance(document.getElementById('doctorDocsModal')).show();
        });

        // ── Init ──────────────────────────────────────────────────────────────────
        syncButtons();
        updatePageInfo();
    </script>
@endsection
