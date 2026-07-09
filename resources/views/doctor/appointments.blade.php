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

                        <h3>{{ __('app.appointments.title') }}</h3>

                    </div>

                    <div class="appointment-tab-head">

                        <div class="appointment-tabs">

                            <ul class="nav nav-pills inner-tab" id="pills-tab" role="tablist">

                                <li class="nav-item">

                                    <button class="nav-link active" id="pills-upcoming-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-upcoming" type="button">
                                        {{ __('app.appointments.upcoming') }}
                                        <span id="upcoming-count">
                                            {{ count($appointments['upcoming']) }}
                                        </span>
                                    </button>

                                </li>

                                <li class="nav-item">

                                    <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-pending" type="button">
                                        {{ __('app.common.pending') }}
                                        <span id="pending-count">
                                            {{ count($appointments['pending']) }}
                                        </span>
                                    </button>

                                </li>

                                <li class="nav-item">

                                    <button class="nav-link" id="pills-cancelled-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-cancelled" type="button">
                                        {{ __('app.common.cancelled') }}
                                        <span id="cancelled-count">
                                            {{ count($appointments['cancelled']) }}
                                        </span>
                                    </button>

                                </li>

                                <li class="nav-item">

                                    <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-completed" type="button">
                                        {{ __('app.common.completed') }}
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
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">{{ __('app.common.date') }}</span>
                                </div>
                                <p class="mb-0 fw-semibold" id="appt-detail-date" style="font-size:14px;"></p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-3 h-100" style="background:#f0fdf4; border:1px solid #bbf7d0;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="isax isax-clock5 text-success" style="font-size:16px;"></i>
                                    <span class="text-muted"
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">{{ __('app.common.time') }}</span>
                                </div>
                                <p class="mb-0 fw-semibold" id="appt-detail-time" style="font-size:14px;"></p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="p-3 rounded-3 h-100" style="background:#fefce8; border:1px solid #fde68a;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="fa-solid fa-dollar-sign text-warning" style="font-size:14px;"></i>
                                    <span class="text-muted"
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">{{ __('app.appointments.amount') }}</span>
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
                                        style="font-size:11px; text-transform:uppercase; letter-spacing:.5px;">{{ __('app.appointments.type') }}</span>
                                </div>
                                <p class="mb-0 fw-semibold" style="font-size:14px; color:#9333ea;">{{ __('app.appointments.video_call_type') }}</p>
                            </div>
                        </div>

                    </div>

                    {{-- Symptoms --}}
                    <div id="appt-detail-symptoms-section" class="d-none">
                        <div class="p-3 rounded-3" style="background:#f8fafc; border:1px solid #e2e8f0;">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <i class="fa-solid fa-notes-medical text-danger" style="font-size:14px;"></i>
                                <span class="fw-semibold"
                                    style="font-size:13px; text-transform:uppercase; letter-spacing:.5px; color:#475569;">{{ __('app.appointments.symptoms') }}</span>
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
                                    style="font-size:13px; text-transform:uppercase; letter-spacing:.5px; color:#475569;">{{ __('app.appointments.notes') }}</span>
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
                                    style="font-size:13px; text-transform:uppercase; letter-spacing:.5px; color:#475569;">{{ __('app.appointments.patient_documents') }}</span>
                            </div>
                            <div id="appt-detail-docs" class="d-flex flex-wrap gap-2"></div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer border-0 pt-0 px-4 pb-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">{{ __('app.common.close') }}</button>
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
                    <h5 class="modal-title" id="rescheduleModalLabel">{{ __('app.appointments.reschedule_title') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" id="reschedule-appointment-id">
                    <input type="hidden" id="reschedule-selected-date">
                    <input type="hidden" id="reschedule-selected-slot">

                    <small class="text-muted d-block mb-3">
                        <i class="isax isax-info-circle"></i>
                        {{ __('app.appointments.utc_notice') }}
                    </small>

                    <div id="reschedule-loading" class="text-center py-4 d-none">
                        <span class="spinner-border spinner-border-sm me-2"></span>{{ __('app.common.loading') }}
                    </div>

                    <div id="reschedule-empty" class="text-muted text-center py-4 d-none">
                        {{ __('app.booking.no_slots') }}
                    </div>

                    <div id="reschedule-picker" class="d-none">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('app.appointments.new_date') }}</label>
                            <select class="form-select" id="reschedule-day-select"></select>
                        </div>

                        <label class="form-label fw-semibold">{{ __('app.booking.available_slots') }}</label>
                        <div id="reschedule-slots" class="row g-2"></div>
                    </div>

                    <div id="reschedule-error" class="alert alert-danger mt-3 d-none"></div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('app.common.cancel') }}</button>
                    <button type="button" class="btn btn-primary" id="reschedule-save-btn" disabled>
                        <span id="reschedule-spinner" class="spinner-border spinner-border-sm me-1 d-none"></span>
                        {{ __('app.appointments.save_changes') }}
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

            const doctorId = "{{ current_user()['uid'] }}";

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

            // Reschedule modal: fetch the doctor's own real availability and let
            // them pick only from open slots (instead of a free-form date/time).
            let rescheduleAvailability = [];
            const rescheduleDaySelect = document.getElementById('reschedule-day-select');
            const rescheduleSlotsEl = document.getElementById('reschedule-slots');
            const rescheduleSaveBtn = document.getElementById('reschedule-save-btn');
            const rescheduleErrorEl = document.getElementById('reschedule-error');
            const rescheduleLoadingEl = document.getElementById('reschedule-loading');
            const rescheduleEmptyEl = document.getElementById('reschedule-empty');
            const reschedulePickerEl = document.getElementById('reschedule-picker');

            function renderRescheduleSlots(index) {
                const dayData = rescheduleAvailability[index];
                rescheduleSlotsEl.innerHTML = '';
                document.getElementById('reschedule-selected-date').value = dayData ? dayData.date : '';
                document.getElementById('reschedule-selected-slot').value = '';
                rescheduleSaveBtn.disabled = true;

                if (!dayData || !dayData.slots.length) {
                    rescheduleSlotsEl.innerHTML =
                        '<div class="col-12 text-muted">{{ __('app.booking.no_slots') }}</div>';
                    return;
                }

                dayData.slots.forEach(slot => {
                    const col = document.createElement('div');
                    col.className = 'col-4';
                    const slotId = `reschedule_slot_${dayData.date}_${slot.replace(/:/g, '')}`;
                    col.innerHTML = `
                        <input class="form-check-input d-none" type="radio" name="reschedule_slot_radio"
                            value="${slot}" id="${slotId}">
                        <label class="form-check-label w-100 p-2 border rounded text-center slot-label"
                            for="${slotId}" style="cursor:pointer;">${slot}</label>
                    `;
                    rescheduleSlotsEl.appendChild(col);
                });

                rescheduleSlotsEl.querySelectorAll('input[name="reschedule_slot_radio"]').forEach(radio => {
                    radio.addEventListener('change', function() {
                        rescheduleSlotsEl.querySelectorAll('.slot-label').forEach(label => {
                            label.classList.remove('active', 'bg-primary', 'text-white',
                                'border-primary');
                        });
                        this.nextElementSibling.classList.add('active', 'bg-primary', 'text-white',
                            'border-primary');
                        document.getElementById('reschedule-selected-slot').value = this.value;
                        rescheduleSaveBtn.disabled = false;
                    });
                });
            }

            // Populate modal when a reschedule button is clicked
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.reschedule-btn');
                if (!btn) return;

                document.getElementById('reschedule-appointment-id').value = btn.dataset.id;
                rescheduleErrorEl.classList.add('d-none');
                reschedulePickerEl.classList.add('d-none');
                rescheduleEmptyEl.classList.add('d-none');
                rescheduleLoadingEl.classList.remove('d-none');
                rescheduleSaveBtn.disabled = true;

                fetch(`/doctor/${doctorId}/available-slots?exclude=${btn.dataset.id}`)
                    .then(res => res.json())
                    .then(data => {
                        rescheduleLoadingEl.classList.add('d-none');

                        if (!data.success || !data.availability.length) {
                            rescheduleEmptyEl.classList.remove('d-none');
                            return;
                        }

                        rescheduleAvailability = data.availability;
                        rescheduleDaySelect.innerHTML = rescheduleAvailability.map((day, i) =>
                            `<option value="${i}">${day.day} (${day.date})</option>`
                        ).join('');

                        renderRescheduleSlots(0);
                        reschedulePickerEl.classList.remove('d-none');
                    })
                    .catch(() => {
                        rescheduleLoadingEl.classList.add('d-none');
                        rescheduleErrorEl.textContent = '{{ __('app.appointments.error_network') }}';
                        rescheduleErrorEl.classList.remove('d-none');
                    });
            });

            rescheduleDaySelect.addEventListener('change', function() {
                renderRescheduleSlots(this.value);
            });

            rescheduleSaveBtn.addEventListener('click', function() {
                const id = document.getElementById('reschedule-appointment-id').value;
                const date = document.getElementById('reschedule-selected-date').value;
                const startTime = document.getElementById('reschedule-selected-slot').value;
                const errorEl = rescheduleErrorEl;
                const spinner = document.getElementById('reschedule-spinner');

                errorEl.classList.add('d-none');

                if (!date || !startTime) {
                    errorEl.textContent = '{{ __('app.appointments.error_fill_fields') }}';
                    errorEl.classList.remove('d-none');
                    return;
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
                            startTime: startTime,
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
                        errorEl.textContent = '{{ __('app.appointments.error_network') }}';
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
