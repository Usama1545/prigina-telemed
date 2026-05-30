<?php $page = 'doctor-list'; ?>
@extends('admin.layout.mainlayout')
@section('content')

    @php
        $id = $doctor['id'] ?? '';
        $name = $doctor['name'] ?? ($doctor['displayName'] ?? 'Doctor');
        $photo = $doctor['profilePicture'] ?? ($doctor['photoUrl'] ?? asset('build/admin/img/doc-placeholder.png'));
        $email = $doctor['email'] ?? '-';
        $phone = $doctor['phone'] ?? '-';
        $spec =
            collect($doctor['specializations'] ?? [])
                ->filter()
                ->implode(', ') ?:
            $doctor['specialization'] ?? '-';
        $experience = $doctor['experience'] ?? '-';
        $qualification = $doctor['qualification'] ?? '-';
        $fee = $doctor['consultationFee'] ?? null;
        $earnings = $doctor['totalEarnings'] ?? 0;
        $about = $doctor['about'] ?? ($doctor['bio'] ?? null);
        $isVerified = (bool) ($doctor['isVerified'] ?? false);
        $isActive = (bool) ($doctor['isActive'] ?? false);
        $isTop = (bool) ($doctor['isTopDoctor'] ?? false);
        $since = $doctor['createdAt'] ?? null;
        $docUrls = $doctor['documentUrls'] ?? [];
        $rejection = $doctor['rejectionReason'] ?? null;

        $docLabels = [
            'clinic_registration' => 'Clinic Registration',
            'degree_certificate' => 'Degree Certificate',
            'id_proof' => 'ID Proof',
            'medical_license' => 'Medical License',
        ];
    @endphp

    <div class="page-wrapper">
        <div class="content container-fluid">

            {{-- Header --}}
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Doctor Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.doctor-list') }}">Doctors</a></li>
                            <li class="breadcrumb-item active">{{ $name }}</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.doctor-list') }}" class="btn btn-light">
                            <i class="fe fe-arrow-left me-1"></i> Back
                        </a>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}</div>
            @endif

            <div class="row">

                {{-- Profile Card --}}
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body pt-4">
                            <img src="{{ $photo }}" alt="{{ $name }}" class="rounded-circle mb-3"
                                style="width:100px;height:100px;object-fit:cover;">
                            <h5 class="fw-bold mb-1">{{ $name }}</h5>
                            <p class="text-muted mb-2">{{ $spec }}</p>

                            <div class="mb-3">
                                @if ($isVerified)
                                    <span class="badge bg-success">Verified</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending Verification</span>
                                @endif
                            </div>

                            <p class="text-muted small mb-0">
                                Member since {{ $since ? \Carbon\Carbon::parse($since)->format('d M Y') : '-' }}
                            </p>
                        </div>
                    </div>

                    {{-- Approve / Decline --}}
                    @if (!$isVerified)
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">Verification</h6>

                                @if ($rejection)
                                    <div class="alert alert-danger py-2 small mb-3">
                                        <strong>Declined:</strong> {{ $rejection }}
                                    </div>
                                @endif

                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-success flex-fill profile-approve-btn"
                                        data-id="{{ $id }}">
                                        <i class="fe fe-check me-1"></i>Approve
                                    </button>
                                    <button type="button" class="btn btn-danger flex-fill profile-decline-btn"
                                        data-id="{{ $id }}" data-name="{{ $name }}">
                                        <i class="fe fe-x me-1"></i>Decline
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Details --}}
                <div class="col-md-8">

                    {{-- Stats row --}}
                    <div class="row g-3 mb-3">
                        <div class="col-sm-4">
                            <div class="card text-center h-100">
                                <div class="card-body py-3">
                                    <h6 class="text-muted mb-1 small">Consultation Fee</h6>
                                    <h5 class="fw-bold mb-0">${{ $fee !== null ? number_format((float) $fee, 2) : '-' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-center h-100">
                                <div class="card-body py-3">
                                    <h6 class="text-muted mb-1 small">Total Earnings</h6>
                                    <h5 class="fw-bold mb-0">${{ number_format((float) $earnings, 2) }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-center h-100">
                                <div class="card-body py-3">
                                    <h6 class="text-muted mb-1 small">Experience</h6>
                                    <h5 class="fw-bold mb-0">{{ $experience }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="card">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Contact & Info</h6>
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <small class="text-muted d-block">Email</small>
                                    <span>{{ $email }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <small class="text-muted d-block">Phone</small>
                                    <span>{{ $phone }}</span>
                                </div>
                                <div class="col-sm-6 mt-2">
                                    <small class="text-muted d-block">Qualification</small>
                                    <span>{{ $qualification }}</span>
                                </div>
                                <div class="col-sm-6 mt-2">
                                    <small class="text-muted d-block">Speciality</small>
                                    <span>{{ $spec }}</span>
                                </div>
                            </div>

                            @if ($about)
                                <hr class="my-3">
                                <h6 class="fw-bold mb-2">About</h6>
                                <p class="text-muted mb-0">{{ $about }}</p>
                            @endif
                        </div>
                    </div>

                    {{-- Status toggles --}}
                    <div class="card">
                        <div class="card-body">
                            <h6 class="fw-bold mb-3">Status</h6>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input profile-active-switch" type="checkbox" role="switch"
                                            id="profileActiveSwitch" data-id="{{ $id }}"
                                            {{ $isActive ? 'checked' : '' }}>
                                        <label class="form-check-label" for="profileActiveSwitch">
                                            Active
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input profile-top-switch" type="checkbox" role="switch"
                                            id="profileTopSwitch" data-id="{{ $id }}"
                                            {{ $isTop ? 'checked' : '' }}>
                                        <label class="form-check-label" for="profileTopSwitch">
                                            Top Doctor
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Documents --}}
                    @if (!empty($docUrls) && is_array($docUrls))
                        <div class="card">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">Documents</h6>
                                <div class="row g-2">
                                    @foreach ($docLabels as $key => $label)
                                        @if (!empty($docUrls[$key]))
                                            <div class="col-sm-6">
                                                <a href="{{ $docUrls[$key] }}" target="_blank" rel="noopener"
                                                    class="btn btn-outline-secondary w-100 text-start">
                                                    <i class="fe fe-file-text me-2"></i>{{ $label }}
                                                    <i class="fe fe-external-link float-end mt-1"></i>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>

        {{-- Recent Appointments --}}
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">
                            Recent Appointments
                            <span class="badge bg-secondary ms-1">{{ count($appointments) }}</span>
                        </h6>

                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>Date / Time</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Payout</th>
                                    </tr>
                                </thead>
                                <tbody id="profileApptBody">
                                    @forelse($appointments as $appt)
                                        @php
                                            $aDate    = $appt['appointmentDate'] ?? $appt['date'] ?? null;
                                            $aTime    = trim(
                                                ($appt['startTime'] ?? $appt['time'] ?? '') .
                                                ($appt['endTime'] ?? null ? ' - ' . $appt['endTime'] : '')
                                            );
                                            $aStatus  = $appt['status'] ?? 'pending';
                                            $aPay     = $appt['paymentStatus'] ?? 'pending';
                                            $aPayout  = $appt['payoutStatus'] ?? 'pending';
                                            $aId      = $appt['id'] ?? $appt['documentId'] ?? '';
                                            $aDone    = in_array($aStatus, ['completed', 'completedPaid']);
                                            $aCanHold    = $aDone && !in_array($aPayout, ['held', 'released', 'refunded']);
                                            $aCanRelease = $aDone && $aPayout === 'held';
                                            $aCanRefund  = $aDone && !in_array($aPayout, ['released', 'refunded']);
                                        @endphp
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <span class="avatar avatar-sm me-2">
                                                        <img class="avatar-img rounded-circle"
                                                            src="{{ asset('build/admin/img/user-placeholder.png') }}"
                                                            alt="Patient">
                                                    </span>
                                                    {{ $appt['patientName'] ?? 'Patient' }}
                                                </h2>
                                            </td>
                                            <td>
                                                {{ $aDate ? \Carbon\Carbon::parse($aDate)->format('d M Y') : '-' }}
                                                @if($aTime)
                                                    <span class="text-primary d-block">{{ $aTime }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('admin.appointments.status', $aId) }}">
                                                    @csrf @method('PATCH')
                                                    <select name="status" class="form-select-sm"
                                                        onchange="this.form.submit()">
                                                        @foreach(['pending','confirmed','completed','completedPaid','cancelled'] as $opt)
                                                            <option value="{{ $opt }}"
                                                                {{ $aStatus === $opt ? 'selected' : '' }}>
                                                                {{ $opt === 'completedPaid' ? 'Completed & Paid' : ucfirst($opt) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>
                                            <td>
                                                ${{ number_format((float) ($appt['amount'] ?? 0), 2) }}
                                                <span class="badge {{ $aPay === 'completed' ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ $aPay === 'completed' ? 'Paid' : 'Unpaid' }}
                                                </span>
                                            </td>
                                            <td>
                                                @if($aPayout === 'released')
                                                    <span class="badge bg-success">Released</span>
                                                @elseif($aPayout === 'refunded')
                                                    <span class="badge bg-danger">Refunded</span>
                                                @else
                                                    <div class="d-flex flex-column gap-1">
                                                        <form method="POST"
                                                            action="{{ route('admin.appointments.payment.hold', $aId) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning btn-sm w-100"
                                                                {{ $aCanHold ? '' : 'disabled' }}>Hold</button>
                                                        </form>
                                                        <form method="POST"
                                                            action="{{ route('admin.appointments.payment.release', $aId) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm w-100"
                                                                {{ $aCanRelease ? '' : 'disabled' }}>Release</button>
                                                        </form>
                                                        <form method="POST"
                                                            action="{{ route('admin.appointments.payment.refund', $aId) }}">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm w-100"
                                                                {{ $aCanRefund ? '' : 'disabled' }}>Refund</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                No appointments found.
                                            </td>
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

    {{-- Decline Reason Modal --}}
    <div class="modal fade" id="profileDeclineModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Decline Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="text-muted mb-3">Optionally provide a reason for declining
                        <strong>{{ $name }}</strong>.
                    </p>
                    <textarea id="profileDeclineReason" class="form-control" rows="3" placeholder="Reason (optional)…"></textarea>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="profileConfirmDeclineBtn" class="btn btn-danger"
                        data-id="{{ $id }}">Confirm Decline</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const profileConfig = {
            baseUrl: "{{ url('/admin/doctors') }}",
            csrf: "{{ csrf_token() }}",
        };

        const SPINNER_SM = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

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

        function toggleSwitch(toggle, url, payload, onLabel, offLabel) {
            const label = toggle.closest('.form-check')?.querySelector('.form-check-label');
            const current = toggle.checked;

            toggle.disabled = true;
            const spinner = document.createElement('span');
            spinner.className = 'spinner-border spinner-border-sm ms-1 align-middle text-secondary';
            label?.insertAdjacentElement('afterend', spinner);

            fetch(url, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': profileConfig.csrf,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload),
            }).then(res => {
                if (!res.ok) throw new Error();
                if (label) label.textContent = current ? onLabel : offLabel;
                showToast('Status updated.');
            }).catch(() => {
                toggle.checked = !current;
                if (label) label.textContent = toggle.checked ? onLabel : offLabel;
                showToast('Failed to update status.', 'danger');
            }).finally(() => {
                spinner.remove();
                toggle.disabled = false;
            });
        }

        // Active toggle
        document.getElementById('profileActiveSwitch')?.addEventListener('change', function() {
            const id = this.dataset.id;
            toggleSwitch(this, `${profileConfig.baseUrl}/${id}/active`, {
                isActive: this.checked
            }, 'Active', 'Inactive');
        });

        // Top doctor toggle
        document.getElementById('profileTopSwitch')?.addEventListener('change', function() {
            const id = this.dataset.id;
            toggleSwitch(this, `${profileConfig.baseUrl}/${id}/top`, {
                isTopDoctor: this.checked
            }, 'Top Doctor', 'Top Doctor');
        });

        // Approve
        document.querySelector('.profile-approve-btn')?.addEventListener('click', async function() {
            const id = this.dataset.id;
            this.innerHTML = SPINNER_SM;
            this.disabled = true;

            try {
                const res = await fetch(`${profileConfig.baseUrl}/${id}/approve`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': profileConfig.csrf,
                        'Accept': 'application/json'
                    },
                });
                if (!res.ok) throw new Error();
                showToast('Doctor approved!');
                setTimeout(() => window.location.reload(), 1200);
            } catch {
                this.innerHTML = '<i class="fe fe-check me-1"></i>Approve';
                this.disabled = false;
                showToast('Failed to approve.', 'danger');
            }
        });

        // Decline (open modal)
        document.querySelector('.profile-decline-btn')?.addEventListener('click', function() {
            document.getElementById('profileDeclineReason').value = '';
            bootstrap.Modal.getOrCreateInstance(document.getElementById('profileDeclineModal')).show();
        });

        // Appointment table — spinner on payment button submit
        document.getElementById('profileApptBody')?.addEventListener('submit', function(e) {
            const btn = e.target.querySelector('button[type="submit"]');
            if (!btn) return;
            btn.innerHTML = SPINNER_SM;
            btn.disabled  = true;
        });

        // Appointment table — spinner on status select change
        document.getElementById('profileApptBody')?.addEventListener('change', function(e) {
            const select = e.target;
            if (select.tagName !== 'SELECT' || select.name !== 'status') return;
            select.disabled = true;
            const sp = document.createElement('span');
            sp.className = 'spinner-border spinner-border-sm ms-1 text-secondary align-middle';
            select.insertAdjacentElement('afterend', sp);
        });

        // Confirm decline
        document.getElementById('profileConfirmDeclineBtn')?.addEventListener('click', async function() {
            const id = this.dataset.id;
            const reason = document.getElementById('profileDeclineReason').value.trim();
            const modal = bootstrap.Modal.getInstance(document.getElementById('profileDeclineModal'));

            this.innerHTML = SPINNER_SM;
            this.disabled = true;

            try {
                const res = await fetch(`${profileConfig.baseUrl}/${id}/decline`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': profileConfig.csrf,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        reason
                    }),
                });
                if (!res.ok) throw new Error();
                modal?.hide();
                showToast('Doctor declined.');
                setTimeout(() => window.location.reload(), 1200);
            } catch {
                showToast('Failed to decline.', 'danger');
            } finally {
                this.innerHTML = 'Confirm Decline';
                this.disabled = false;
            }
        });
    </script>

@endsection
