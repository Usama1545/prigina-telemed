<?php $page = 'specialities'; ?>
@extends('admin.layout.mainlayout')

@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">

                    <div class="col">
                        <h3 class="page-title">Specialities</h3>

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/index') }}">
                                    Dashboard
                                </a>
                            </li>

                            <li class="breadcrumb-item active">
                                Specialities
                            </li>
                        </ul>
                    </div>

                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addSpecialityModal">

                            <i class="fa fa-plus me-2"></i>
                            Add Speciality
                        </button>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="row">

                <div class="col-sm-12">

                    <div class="card">

                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <input type="search" id="specialitySearchInput" class="form-control"
                                        placeholder="Search specialities...">
                                </div>
                            </div>

                            <div class="table-responsive">

                                <table class="table table-hover table-center mb-0">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Speciality</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody id="specialitiesTableBody">

                                        @forelse($specialities as $speciality)
                                            @php
                                                $image =
                                                    $speciality['imageUrl'] ??
                                                    URL::asset('build/admin/img/specialities/specialities-01.png');

                                                $isActive = (bool) ($speciality['isActive'] ?? false);
                                            @endphp

                                            <tr>

                                                <td>
                                                    {{ $speciality['id'] ?? '-' }}
                                                </td>

                                                <td>
                                                    <h2 class="table-avatar">

                                                        <a href="#" class="avatar avatar-sm me-2">

                                                            <img class="avatar-img rounded-circle" src="{{ $image }}"
                                                                alt="Speciality Image">
                                                        </a>

                                                        <a href="#">
                                                            {{ $speciality['name'] ?? '-' }}
                                                        </a>

                                                    </h2>
                                                </td>

                                                <td>

                                                    <div class="form-check form-switch">

                                                        <input class="form-check-input speciality-status-switch"
                                                            type="checkbox" role="switch" data-id="{{ $speciality['id'] }}"
                                                            {{ $isActive ? 'checked' : '' }}>

                                                        <label class="form-check-label">
                                                            {{ $isActive ? 'Active' : 'Inactive' }}
                                                        </label>

                                                    </div>

                                                </td>

                                                <td>

                                                    <div class="actions d-flex gap-2">

                                                        <button type="button" class="btn btn-sm bg-success-light"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editSpecialityModal{{ $speciality['id'] }}">

                                                            <i class="fe fe-pencil"></i>
                                                            Edit
                                                        </button>

                                                        <form method="POST"
                                                            action="{{ route('admin.specialities.delete', $speciality['id']) }}">

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-sm bg-danger-light"
                                                                onclick="return confirm('Delete this speciality?')">

                                                                <i class="fe fe-trash"></i>
                                                                Delete
                                                            </button>

                                                        </form>

                                                    </div>

                                                </td>

                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editSpecialityModal{{ $speciality['id'] }}"
                                                tabindex="-1" aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered">

                                                    <div class="modal-content border-0 shadow-lg">

                                                        <div class="modal-header">

                                                            <h5 class="modal-title fw-bold">
                                                                Edit Speciality
                                                            </h5>

                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal">
                                                            </button>

                                                        </div>

                                                        <form method="POST"
                                                            action="{{ route('admin.specialities.update', $speciality['id']) }}"
                                                            enctype="multipart/form-data">

                                                            @csrf
                                                            @method('PUT')

                                                            <div class="modal-body">

                                                                <div class="mb-3">

                                                                    <label class="form-label fw-semibold">
                                                                        Speciality Name
                                                                    </label>

                                                                    <input type="text" name="name"
                                                                        class="form-control"
                                                                        value="{{ $speciality['name'] }}" required>

                                                                </div>

                                                                <div class="mb-3">

                                                                    <label class="form-label fw-semibold">
                                                                        Replace Image
                                                                    </label>

                                                                    <input type="file" name="image"
                                                                        class="form-control" accept="image/*">

                                                                    @if (!empty($speciality['imageUrl']))
                                                                        <img src="{{ $speciality['imageUrl'] }}"
                                                                            class="img-fluid rounded mt-3"
                                                                            style="height:80px;width:80px;object-fit:cover;">
                                                                    @endif

                                                                </div>

                                                                <div class="form-check form-switch">

                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="isActive" value="1"
                                                                        {{ $isActive ? 'checked' : '' }}>

                                                                    <label class="form-check-label">
                                                                        Active
                                                                    </label>

                                                                </div>

                                                            </div>

                                                            <div class="modal-footer border-0">

                                                                <button type="button" class="btn btn-light"
                                                                    data-bs-dismiss="modal">

                                                                    Cancel
                                                                </button>

                                                                <button type="submit" class="btn btn-primary">

                                                                    Update Speciality
                                                                </button>

                                                            </div>

                                                        </form>

                                                    </div>

                                                </div>

                                            </div>
                                            <!-- /Edit Modal -->

                                        @empty

                                            <tr>

                                                <td colspan="4" class="text-center text-muted">

                                                    No specialities found.

                                                </td>

                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                            <div id="specialityModals"></div>

                            <div class="text-center mt-3">
                                <button type="button" id="loadMoreSpecialities"
                                    class="btn btn-outline-primary {{ $hasMore ? '' : 'd-none' }}"
                                    data-cursor="{{ $nextCursor }}">
                                    Load More
                                </button>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addSpecialityModal" tabindex="-1" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow-lg">

                <div class="modal-header">

                    <h5 class="modal-title fw-bold">
                        Add Speciality
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>

                </div>

                <form method="POST" action="{{ route('admin.specialities.store') }}" enctype="multipart/form-data">

                    @csrf

                    <div class="modal-body">

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Speciality Name
                            </label>

                            <input type="text" name="name" class="form-control" required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Speciality Image
                            </label>

                            <input type="file" name="image" class="form-control" accept="image/*">

                        </div>

                        <div class="form-check form-switch">

                            <input class="form-check-input" type="checkbox" name="isActive" value="1" checked>

                            <label class="form-check-label">
                                Active
                            </label>

                        </div>

                    </div>

                    <div class="modal-footer border-0">

                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">

                            Cancel
                        </button>

                        <button type="submit" class="btn btn-primary">

                            Save Speciality
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>
    <!-- /Add Modal -->

    <script>
        const specialityConfig = {
            dataUrl: "{{ route('admin.specialities.data') }}",
            baseUrl: "{{ url('/admin/specialities') }}",
            csrf: "{{ csrf_token() }}",
            fallbackImage: "{{ URL::asset('build/admin/img/specialities/specialities-01.png') }}"
        };

        let specialitySearch = '';
        let specialityCursor = @json($nextCursor);
        let specialitySearchTimer = null;

        const tableBody = document.getElementById('specialitiesTableBody');
        const modalContainer = document.getElementById('specialityModals');
        const loadMoreButton = document.getElementById('loadMoreSpecialities');
        const searchInput = document.getElementById('specialitySearchInput');

        function escapeHtml(value) {
            return String(value ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function formUrl(id, suffix = '') {
            return `${specialityConfig.baseUrl}/${encodeURIComponent(id)}${suffix}`;
        }

        function modalId(id) {
            return `editSpecialityModal${String(id).replace(/[^A-Za-z0-9_-]/g, '_')}`;
        }

        function specialityRow(speciality) {
            const id = speciality.id || '';
            const safeId = escapeHtml(id);
            const name = escapeHtml(speciality.name || '-');
            const image = escapeHtml(speciality.imageUrl || specialityConfig.fallbackImage);
            const isActive = Boolean(speciality.isActive);
            const editModalId = modalId(id);

            return `
                <tr>
                    <td>${safeId || '-'}</td>
                    <td>
                        <h2 class="table-avatar">
                            <a href="#" class="avatar avatar-sm me-2">
                                <img class="avatar-img rounded-circle" src="${image}" alt="Speciality Image">
                            </a>
                            <a href="#">${name}</a>
                        </h2>
                    </td>
                    <td>
                        <div class="form-check form-switch">
                            <input class="form-check-input speciality-status-switch" type="checkbox" role="switch"
                                data-id="${safeId}" ${isActive ? 'checked' : ''}>
                            <label class="form-check-label">${isActive ? 'Active' : 'Inactive'}</label>
                        </div>
                    </td>
                    <td>
                        <div class="actions d-flex gap-2">
                            <button type="button" class="btn btn-sm bg-success-light" data-bs-toggle="modal"
                                data-bs-target="#${editModalId}">
                                <i class="fe fe-pencil"></i> Edit
                            </button>
                            <form method="POST" action="${formUrl(id)}">
                                <input type="hidden" name="_token" value="${specialityConfig.csrf}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm bg-danger-light"
                                    onclick="return confirm('Delete this speciality?')">
                                    <i class="fe fe-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            `;
        }

        function specialityModal(speciality) {
            const id = speciality.id || '';
            const name = escapeHtml(speciality.name || '');
            const image = escapeHtml(speciality.imageUrl || '');
            const isActive = Boolean(speciality.isActive);
            const editModalId = modalId(id);

            return `
                <div class="modal fade" id="${editModalId}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 shadow-lg">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Edit Speciality</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form method="POST" action="${formUrl(id)}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="${specialityConfig.csrf}">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Speciality Name</label>
                                        <input type="text" name="name" class="form-control" value="${name}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Replace Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        ${image ? `<img src="${image}" class="img-fluid rounded mt-3" style="height:80px;width:80px;object-fit:cover;">` : ''}
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="isActive" value="1" ${isActive ? 'checked' : ''}>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update Speciality</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            `;
        }

        async function fetchSpecialities({ append = false, cursor = null } = {}) {
            const url = new URL(specialityConfig.dataUrl, window.location.origin);

            if (specialitySearch) {
                url.searchParams.set('search', specialitySearch);
            }

            if (cursor) {
                url.searchParams.set('cursor', cursor);
            }

            loadMoreButton.disabled = true;

            try {
                const response = await fetch(url, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error();
                }

                const data = await response.json();
                const rows = (data.documents || []).map(specialityRow).join('');
                const modals = (data.documents || []).map(specialityModal).join('');

                if (append) {
                    tableBody.insertAdjacentHTML('beforeend', rows);
                    modalContainer.insertAdjacentHTML('beforeend', modals);
                } else {
                    tableBody.innerHTML = rows || `
                        <tr>
                            <td colspan="4" class="text-center text-muted">No specialities found.</td>
                        </tr>
                    `;
                    modalContainer.innerHTML = modals;
                }

                specialityCursor = data.nextCursor || null;
                loadMoreButton.dataset.cursor = specialityCursor || '';
                loadMoreButton.classList.toggle('d-none', !data.hasMore);
            } catch (e) {
                alert('Failed to load specialities.');
            } finally {
                loadMoreButton.disabled = false;
            }
        }

        searchInput.addEventListener('input', function() {
            clearTimeout(specialitySearchTimer);

            specialitySearchTimer = setTimeout(() => {
                specialitySearch = this.value.trim();
                specialityCursor = null;
                fetchSpecialities();
            }, 350);
        });

        loadMoreButton.addEventListener('click', function() {
            if (!specialityCursor) {
                return;
            }

            fetchSpecialities({
                append: true,
                cursor: specialityCursor
            });
        });

        // ── Toast ────────────────────────────────────────────────────────────────
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
                <div id="${id}" class="toast align-items-center text-bg-${type} border-0"
                     role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body fw-semibold">${message}</div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto"
                                data-bs-dismiss="toast"></button>
                    </div>
                </div>
            `);
            const el = document.getElementById(id);
            bootstrap.Toast.getOrCreateInstance(el, { delay: 3000 }).show();
            el.addEventListener('hidden.bs.toast', () => el.remove());
        }

        // ── Status toggle ─────────────────────────────────────────────────────
        document.addEventListener('change', async function(event) {
            const toggle = event.target.closest('.speciality-status-switch');
            if (!toggle) return;

            const specialityId = toggle.dataset.id;
            const isActive     = toggle.checked ? 1 : 0;
            const formCheck    = toggle.closest('.form-check');
            const label        = formCheck?.querySelector('.form-check-label');

            // Loading state
            toggle.disabled = true;
            const spinner = document.createElement('span');
            spinner.className = 'spinner-border spinner-border-sm ms-2 align-middle text-secondary';
            spinner.setAttribute('role', 'status');
            label?.insertAdjacentElement('afterend', spinner);

            try {
                const response = await fetch(formUrl(specialityId, '/status'), {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': specialityConfig.csrf,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ isActive }),
                });

                if (!response.ok) throw new Error();

                if (label) label.textContent = toggle.checked ? 'Active' : 'Inactive';
                showToast(toggle.checked ? 'Speciality activated.' : 'Speciality deactivated.');

            } catch {
                toggle.checked = !toggle.checked;
                if (label) label.textContent = toggle.checked ? 'Active' : 'Inactive';
                showToast('Failed to update status. Please try again.', 'danger');

            } finally {
                spinner.remove();
                toggle.disabled = false;
            }
        });
    </script>
@endsection
