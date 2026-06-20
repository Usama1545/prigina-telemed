<?php $page = 'doctor-appointments-grid'; ?>

@extends('layouts.mainlayout')

@section('content')
    @php
        $firebaseConfig = [
            'apiKey' => config('services.firebase.api_key'),
            'authDomain' => config('services.firebase.auth_domain'),
            'projectId' => config('services.firebase.project_id'),
        ];
    @endphp
    <div class="content doctor-content">
        <div class="container doc-container">

            <div class="row">

                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    @include('partials.doctor-sidebar')

                </div>

                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header">

                        <h3>Appointments</h3>

                    </div>

                    <div class="appointment-tab-head">

                        <div class="appointment-tabs">

                            <ul class="nav nav-pills inner-tab" id="pills-tab" role="tablist">

                                <li class="nav-item">

                                    <button class="nav-link active" id="pills-upcoming-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-upcoming" type="button">
                                        Upcoming
                                        <span id="upcoming-count">
                                            {{ count($appointments['upcoming']) }}
                                        </span>
                                    </button>

                                </li>

                                <li class="nav-item">

                                    <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-pending" type="button">
                                        Pending
                                        <span id="pending-count">
                                            {{ count($appointments['pending']) }}
                                        </span>
                                    </button>

                                </li>

                                <li class="nav-item">

                                    <button class="nav-link" id="pills-cancelled-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-cancelled" type="button">
                                        Cancelled
                                        <span id="cancelled-count">
                                            {{ count($appointments['cancelled']) }}
                                        </span>
                                    </button>

                                </li>

                                <li class="nav-item">

                                    <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-completed" type="button">
                                        Completed
                                        <span id="completed-count">
                                            {{ count($appointments['completed']) }}
                                        </span>
                                    </button>

                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="tab-content appointment-tab-content">

                        {{-- UPCOMING --}}
                        <div class="tab-pane fade show active" id="pills-upcoming">

                            <div class="row" id="upcoming-appointments">

                                @foreach ($appointments['upcoming'] as $appointment)
                                    @include('doctor.partials.appointment-card', [
                                        'appointment' => $appointment,
                                    ])
                                @endforeach

                            </div>

                        </div>

                        {{-- PENDING --}}
                        <div class="tab-pane fade" id="pills-pending">

                            <div class="row" id="pending-appointments">

                                @foreach ($appointments['pending'] as $appointment)
                                    @include('doctor.partials.appointment-card-pending', [
                                        'appointment' => $appointment,
                                    ])
                                @endforeach

                            </div>

                        </div>

                        {{-- CANCELLED --}}
                        <div class="tab-pane fade" id="pills-cancelled">

                            <div class="row" id="cancelled-appointments">

                                @foreach ($appointments['cancelled'] as $appointment)
                                    @include('doctor.partials.appointment-card', [
                                        'appointment' => $appointment,
                                    ])
                                @endforeach

                            </div>

                        </div>

                        {{-- COMPLETED --}}
                        <div class="tab-pane fade" id="pills-completed">

                            <div class="row" id="completed-appointments">

                                @foreach ($appointments['completed'] as $appointment)
                                    @include('doctor.partials.appointment-card', [
                                        'appointment' => $appointment,
                                    ])
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- Appointment Detail Modal --}}
    <div class="modal fade" id="appointmentDetailModal" tabindex="-1" aria-labelledby="appointmentDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">

                {{-- Gradient header --}}
                <div class="modal-header border-0 p-0">
                    <div class="w-100 d-flex align-items-center gap-3 p-4"
                        style="background: linear-gradient(135deg, #1e40af 0%, #2563eb 60%, #3b82f6 100%);">

                        <div id="appt-detail-avatar-wrap" class="flex-shrink-0">
                            <img id="appt-detail-avatar" src="" alt=""
                                class="rounded-circle border border-2 border-white"
                                style="width:64px; height:64px; object-fit:cover; display:none;">
                            <div id="appt-detail-avatar-fallback"
                                class="rounded-circle d-flex align-items-center justify-content-center border border-2 border-white"
                                style="width:64px; height:64px; background:rgba(255,255,255,0.2);">
                                <i class="fa-solid fa-user" style="color:#fff; font-size:26px;"></i>
                            </div>
                        </div>

                        <div class="flex-grow-1">
                            <p class="mb-0 text-white-50"
                                style="font-size:12px; letter-spacing:.5px; text-transform:uppercase;">
                                #<span id="appt-detail-number"></span>
                            </p>
                            <h5 class="mb-1 fw-bold text-white" id="appt-detail-patient-name"></h5>
                            <span id="appt-detail-status-badge" class="badge px-3 py-1"
                                style="font-size:12px; border-radius:50px;"></span>
                        </div>

                        <button type="button" class="btn-close btn-close-white align-self-start" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>

                <div class="modal-body p-4">

                    {{-- Key details grid --}}
                    <div class="row g-3 mb-4">

                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-3 h-100" style="background:#f0f7ff; border:1px solid #dbeafe;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="isax isax-calendar-1 text-primary" style="font-size:16px;"></i>
                                    <span class="text-muted"
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">Date</span>
                                </div>
                                <p class="mb-0 fw-semibold" id="appt-detail-date" style="font-size:14px;"></p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-3 h-100" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="isax isax-clock5 text-success" style="font-size:16px;"></i>
                                    <span class="text-muted"
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">Time</span>
                                </div>
                                <p class="mb-0 fw-semibold" id="appt-detail-time" style="font-size:14px;"></p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-3 h-100" style="background:#fefce8; border:1px solid #fde68a;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="fa-solid fa-dollar-sign text-warning" style="font-size:14px;"></i>
                                    <span class="text-muted"
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">Amount</span>
                                </div>
                                <p class="mb-0 fw-semibold text-warning" id="appt-detail-amount" style="font-size:14px;">
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-3 h-100" style="background:#fdf4ff; border:1px solid #e9d5ff;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="fa-solid fa-video text-purple" style="font-size:14px; color:#9333ea;"></i>
                                    <span class="text-muted"
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">Type</span>
                                </div>
                                <p class="mb-0 fw-semibold" style="font-size:14px; color:#9333ea;">Video Call</p>
                            </div>
                        </div>

                    </div>

                    {{-- Symptoms --}}
                    <div id="appt-detail-symptoms-section" class="d-none">
                        <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="fa-solid fa-notes-medical text-danger" style="font-size:14px;"></i>
                                <span class="fw-semibold"
                                    style="font-size:13px; text-transform:uppercase; letter-spacing:.5px; color:#475569;">Symptoms</span>
                            </div>
                            <p class="mb-0 text-secondary" id="appt-detail-symptoms"
                                style="font-size:14px; line-height:1.6;"></p>
                        </div>
                    </div>

                    {{-- Notes --}}
                    <div id="appt-detail-notes-section" class="mt-3 d-none">
                        <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="fa-solid fa-clipboard text-info" style="font-size:14px;"></i>
                                <span class="fw-semibold"
                                    style="font-size:13px; text-transform:uppercase; letter-spacing:.5px; color:#475569;">Notes</span>
                            </div>
                            <p class="mb-0 text-secondary" id="appt-detail-notes"
                                style="font-size:14px; line-height:1.6;"></p>
                        </div>
                    </div>

                    {{-- Documents --}}
                    <div id="appt-detail-docs-section" class="mt-3 d-none">
                        <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <i class="fa-solid fa-paperclip text-primary" style="font-size:14px;"></i>
                                <span class="fw-semibold"
                                    style="font-size:13px; text-transform:uppercase; letter-spacing:.5px; color:#475569;">Patient Documents</span>
                            </div>
                            <div id="appt-detail-docs" class="d-flex flex-wrap gap-2"></div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer border-0 pt-0 px-4 pb-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    {{-- Reschedule Modal --}}
    <div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="rescheduleModalLabel">Reschedule Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" id="reschedule-appointment-id">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">New Date</label>
                        <input type="date" id="reschedule-date" class="form-control" min="{{ date('Y-m-d') }}">
                    </div>

                    <div class="row g-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Start Time</label>
                            <input type="time" id="reschedule-start" class="form-control">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">End Time</label>
                            <input type="time" id="reschedule-end" class="form-control">
                        </div>
                    </div>

                    <div id="reschedule-error" class="alert alert-danger mt-3 d-none"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="reschedule-save-btn">
                        <span id="reschedule-spinner" class="spinner-border spinner-border-sm me-1 d-none"></span>
                        Save Changes
                    </button>
                </div>

            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f5f7fb !important
        }
    </style>

    <script type="module">
        import {
            initializeApp
        }
        from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";

        import {
            getFirestore,
            collection,
            query,
            where,
            orderBy,
            limit,
            onSnapshot
        }
        from "https://www.gstatic.com/firebasejs/10.12.2/firebase-firestore.js";

        const firebaseConfig = @json($firebaseConfig);

        const app = initializeApp(firebaseConfig);

        const db = getFirestore(app);

        const doctorId = "{{ current_user()['uid'] }}";

        const appointmentsQuery = query(
            collection(db, "appointments"),
            where("doctorId", "==", doctorId),
            orderBy("createdAt", "desc"),
            limit(20)
        );

        function getContainer(status) {
            if (status === 'confirmed') {
                return 'upcoming-appointments';
            }

            if (status === 'pending') {
                return 'pending-appointments';
            }

            if (status === 'cancelled') {
                return 'cancelled-appointments';
            }

            if (status === 'completed') {
                return 'completed-appointments';
            }

            return null;
        }

        function updateCounts() {
            document.getElementById('upcoming-count').innerText =
                document.querySelectorAll('#upcoming-appointments .appointment-card').length;

            document.getElementById('pending-count').innerText =
                document.querySelectorAll('#pending-appointments .appointment-card').length;

            document.getElementById('cancelled-count').innerText =
                document.querySelectorAll('#cancelled-appointments .appointment-card').length;

            document.getElementById('completed-count').innerText =
                document.querySelectorAll('#completed-appointments .appointment-card').length;
        }

        function renderAppointmentCard(id, data) {
            return `
        <div
            class="col-xl-4 col-lg-6 col-md-12 d-flex appointment-card"
            id="appointment-${id}"
        >
            <div class="appointment-wrap appointment-grid-wrap">

                <ul>

                    <li>

                        <div class="appointment-grid-head">

                            <div class="patinet-information">

                                <img
                                    src="${data.patientImage ?? '/default.png'}"
                                    alt=""
                                >

                                <div class="patient-info">

                                    <p>
                                        #${data.appointmentNumber ?? id}
                                    </p>

                                    <h6>
                                        ${data.patientName ?? 'Patient'}
                                    </h6>

                                </div>

                            </div>

                        </div>

                    </li>

                    <li class="appointment-info">

                        <p>
                            <i class="isax isax-clock5"></i>

                            ${data.appointmentDate ?? ''}
                        </p>

                    </li>

                </ul>

            </div>
        </div>
    `;
        }

        onSnapshot(appointmentsQuery, (snapshot) => {

            snapshot.docChanges().forEach((change) => {

                const data = change.doc.data();

                const id = change.doc.id;

                const existing =
                    document.getElementById(`appointment-${id}`);

                if (change.type === 'added') {

                    if (existing) {
                        return;
                    }

                    const containerId = getContainer(data.status);

                    if (!containerId) {
                        return;
                    }

                    document
                        .getElementById(containerId)
                        .insertAdjacentHTML(
                            'afterbegin',
                            renderAppointmentCard(id, data)
                        );
                }

                if (change.type === 'modified') {

                    if (existing) {
                        existing.remove();
                    }

                    const containerId = getContainer(data.status);

                    if (!containerId) {
                        return;
                    }

                    document
                        .getElementById(containerId)
                        .insertAdjacentHTML(
                            'afterbegin',
                            renderAppointmentCard(id, data)
                        );
                }

                if (change.type === 'removed') {

                    if (existing) {
                        existing.remove();
                    }
                }

            });

            updateCounts();

        });
    </script>

    <script>
        (function() {

            // Populate appointment detail modal
            document.getElementById('appointmentDetailModal').addEventListener('show.bs.modal', function(e) {
                const btn = e.relatedTarget;
                if (!btn || !btn.classList.contains('view-appointment-btn')) return;

                const d = btn.dataset;

                // Avatar
                const img = document.getElementById('appt-detail-avatar');
                const fallback = document.getElementById('appt-detail-avatar-fallback');
                if (d.patientImage) {
                    img.src = d.patientImage;
                    img.style.display = '';
                    fallback.style.display = 'none';
                } else {
                    img.style.display = 'none';
                    fallback.style.display = '';
                }

                document.getElementById('appt-detail-number').textContent = d.appointmentNumber;
                document.getElementById('appt-detail-patient-name').textContent = d.patientName;
                document.getElementById('appt-detail-date').textContent = d.date || '—';
                document.getElementById('appt-detail-time').textContent = d.start && d.end ?
                    `${d.start} – ${d.end}` : '—';
                document.getElementById('appt-detail-amount').textContent = `$${d.amount}`;

                // Status badge
                const badge = document.getElementById('appt-detail-status-badge');
                const statusMap = {
                    confirmed: {
                        label: 'Confirmed',
                        bg: '#dcfce7',
                        color: '#15803d',
                        border: '#86efac'
                    },
                    pending: {
                        label: 'Pending',
                        bg: '#fef9c3',
                        color: '#a16207',
                        border: '#fde047'
                    },
                    cancelled: {
                        label: 'Cancelled',
                        bg: '#fee2e2',
                        color: '#b91c1c',
                        border: '#fca5a5'
                    },
                    completed: {
                        label: 'Completed',
                        bg: '#ede9fe',
                        color: '#6d28d9',
                        border: '#c4b5fd'
                    },
                };
                const s = statusMap[d.status] || {
                    label: d.status || 'Unknown',
                    bg: '#f1f5f9',
                    color: '#475569',
                    border: '#cbd5e1'
                };
                badge.textContent = s.label;
                badge.style.cssText =
                    `background:${s.bg}; color:${s.color}; border:1px solid ${s.border}; border-radius:50px; font-size:12px;`;

                // Symptoms
                const sympSec = document.getElementById('appt-detail-symptoms-section');
                if (d.symptoms) {
                    document.getElementById('appt-detail-symptoms').textContent = d.symptoms;
                    sympSec.classList.remove('d-none');
                } else {
                    sympSec.classList.add('d-none');
                }

                // Notes
                const notesSec = document.getElementById('appt-detail-notes-section');
                if (d.notes) {
                    document.getElementById('appt-detail-notes').textContent = d.notes;
                    notesSec.classList.remove('d-none');
                } else {
                    notesSec.classList.add('d-none');
                }

                // Documents
                const docsSec = document.getElementById('appt-detail-docs-section');
                const docsContainer = document.getElementById('appt-detail-docs');
                docsContainer.innerHTML = '';
                let urls = [];
                try { urls = JSON.parse(d.documentUrls || '[]'); } catch (_) {}
                if (urls.length) {
                    urls.forEach(url => {
                        const isImage = /\.(jpg|jpeg|png|gif|webp)(\?|$)/i.test(url);
                        const item = document.createElement('a');
                        item.href = url;
                        item.target = '_blank';
                        item.rel = 'noopener';
                        item.className = 'text-decoration-none';
                        if (isImage) {
                            item.innerHTML = `<img src="${url}" style="width:80px;height:80px;object-fit:cover;border-radius:8px;border:1px solid #dee2e6;" alt="document">`;
                        } else {
                            const ext = url.split('.').pop().split('?')[0].toUpperCase().slice(0, 4);
                            item.innerHTML = `<div style="width:80px;height:80px;border:1px solid #dee2e6;border-radius:8px;background:#f8f9fa;display:flex;flex-direction:column;align-items:center;justify-content:center;font-size:11px;color:#6c757d;text-align:center;padding:4px;"><i class="fa-solid fa-file-lines" style="font-size:22px;margin-bottom:4px;"></i><span>${ext}</span></div>`;
                        }
                        docsContainer.appendChild(item);
                    });
                    docsSec.classList.remove('d-none');
                } else {
                    docsSec.classList.add('d-none');
                }
            });

            // Populate modal when a reschedule button is clicked
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.reschedule-btn');
                if (!btn) return;

                document.getElementById('reschedule-appointment-id').value = btn.dataset.id;

                // Parse date string to yyyy-mm-dd for the date input
                const rawDate = btn.dataset.date;
                let isoDate = '';
                if (rawDate) {
                    try {
                        const d = new Date(rawDate);
                        if (!isNaN(d)) {
                            isoDate = d.toISOString().split('T')[0];
                        }
                    } catch (_) {}
                }
                document.getElementById('reschedule-date').value = isoDate;

                // Convert "9:00 AM" → "09:00" for time inputs
                function toInputTime(str) {
                    if (!str) return '';
                    const [time, meridiem] = str.trim().split(' ');
                    if (!meridiem) return str; // already 24h
                    let [h, m] = time.split(':').map(Number);
                    if (meridiem.toUpperCase() === 'PM' && h !== 12) h += 12;
                    if (meridiem.toUpperCase() === 'AM' && h === 12) h = 0;
                    return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}`;
                }

                document.getElementById('reschedule-start').value = toInputTime(btn.dataset.start);
                document.getElementById('reschedule-end').value = toInputTime(btn.dataset.end);
                document.getElementById('reschedule-error').classList.add('d-none');
            });

            document.getElementById('reschedule-save-btn').addEventListener('click', function() {
                const id = document.getElementById('reschedule-appointment-id').value;
                const date = document.getElementById('reschedule-date').value;
                const startTime = document.getElementById('reschedule-start').value;
                const endTime = document.getElementById('reschedule-end').value;
                const errorEl = document.getElementById('reschedule-error');
                const spinner = document.getElementById('reschedule-spinner');

                errorEl.classList.add('d-none');

                if (!date || !startTime || !endTime) {
                    errorEl.textContent = 'Please fill in all fields.';
                    errorEl.classList.remove('d-none');
                    return;
                }

                if (endTime <= startTime) {
                    errorEl.textContent = 'End time must be after start time.';
                    errorEl.classList.remove('d-none');
                    return;
                }

                // Format time back to "9:00 AM"
                function toDisplayTime(val) {
                    const [h, m] = val.split(':').map(Number);
                    const meridiem = h >= 12 ? 'PM' : 'AM';
                    const h12 = h % 12 || 12;
                    return `${h12}:${String(m).padStart(2, '0')} ${meridiem}`;
                }

                this.disabled = true;
                spinner.classList.remove('d-none');

                fetch(`/doctor/appointment/${id}/reschedule`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            date: date,
                            startTime: toDisplayTime(startTime),
                            endTime: toDisplayTime(endTime),
                        }),
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            bootstrap.Modal.getInstance(document.getElementById('rescheduleModal')).hide();
                            // Update the card's displayed date/time without full reload
                            const card = document.getElementById(`appointment-${id}`);
                            if (card) {
                                const dateSpan = card.querySelectorAll('.appointment-info span')[0];
                                const timeSpan = card.querySelectorAll('.appointment-info span')[1];
                                if (dateSpan) dateSpan.textContent = data.formattedDate;
                                if (timeSpan) timeSpan.textContent = `${data.startTime} - ${data.endTime}`;
                                // Update button data attributes
                                const btn = card.querySelector('.reschedule-btn');
                                if (btn) {
                                    btn.dataset.date = date;
                                    btn.dataset.start = data.startTime;
                                    btn.dataset.end = data.endTime;
                                }
                            }
                        } else {
                            errorEl.textContent = data.message ?? 'Something went wrong.';
                            errorEl.classList.remove('d-none');
                        }
                    })
                    .catch(() => {
                        errorEl.textContent = 'Network error. Please try again.';
                        errorEl.classList.remove('d-none');
                    })
                    .finally(() => {
                        this.disabled = false;
                        spinner.classList.add('d-none');
                    });
            });

        })();
    </script>
@endsection
