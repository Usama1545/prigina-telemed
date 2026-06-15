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

                                <button
                                    class="nav-link active"
                                    id="pills-upcoming-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-upcoming"
                                    type="button"
                                >
                                    Upcoming
                                    <span id="upcoming-count">
                                        {{ count($appointments['upcoming']) }}
                                    </span>
                                </button>

                            </li>

                            <li class="nav-item">

                                <button
                                    class="nav-link"
                                    id="pills-pending-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-pending"
                                    type="button"
                                >
                                    Pending
                                    <span id="pending-count">
                                        {{ count($appointments['pending']) }}
                                    </span>
                                </button>

                            </li>

                            <li class="nav-item">

                                <button
                                    class="nav-link"
                                    id="pills-cancelled-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-cancelled"
                                    type="button"
                                >
                                    Cancelled
                                    <span id="cancelled-count">
                                        {{ count($appointments['cancelled']) }}
                                    </span>
                                </button>

                            </li>

                            <li class="nav-item">

                                <button
                                    class="nav-link"
                                    id="pills-completed-tab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#pills-completed"
                                    type="button"
                                >
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
                    <div
                        class="tab-pane fade show active"
                        id="pills-upcoming"
                    >

                        <div class="row" id="upcoming-appointments">

                            @foreach($appointments['upcoming'] as $appointment)

                                @include('doctor.partials.appointment-card', [
                                    'appointment' => $appointment
                                ])

                            @endforeach

                        </div>

                    </div>

                    {{-- PENDING --}}
                    <div
                        class="tab-pane fade"
                        id="pills-pending"
                    >

                        <div class="row" id="pending-appointments">

                            @foreach($appointments['pending'] as $appointment)

                                @include('doctor.partials.appointment-card-pending', [
                                    'appointment' => $appointment
                                ])

                            @endforeach

                        </div>

                    </div>

                    {{-- CANCELLED --}}
                    <div
                        class="tab-pane fade"
                        id="pills-cancelled"
                    >

                        <div class="row" id="cancelled-appointments">

                            @foreach($appointments['cancelled'] as $appointment)

                                @include('doctor.partials.appointment-card', [
                                    'appointment' => $appointment
                                ])

                            @endforeach

                        </div>

                    </div>

                    {{-- COMPLETED --}}
                    <div
                        class="tab-pane fade"
                        id="pills-completed"
                    >

                        <div class="row" id="completed-appointments">

                            @foreach($appointments['completed'] as $appointment)

                                @include('doctor.partials.appointment-card', [
                                    'appointment' => $appointment
                                ])

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

{{-- Reschedule Modal --}}
<div class="modal fade" id="rescheduleModal" tabindex="-1" aria-labelledby="rescheduleModalLabel" aria-hidden="true">
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

import { initializeApp }
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

function getContainer(status)
{
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

function updateCounts()
{
    document.getElementById('upcoming-count').innerText =
        document.querySelectorAll('#upcoming-appointments .appointment-card').length;

    document.getElementById('pending-count').innerText =
        document.querySelectorAll('#pending-appointments .appointment-card').length;

    document.getElementById('cancelled-count').innerText =
        document.querySelectorAll('#cancelled-appointments .appointment-card').length;

    document.getElementById('completed-count').innerText =
        document.querySelectorAll('#completed-appointments .appointment-card').length;
}

function renderAppointmentCard(id, data)
{
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
(function () {

    // Populate modal when a reschedule button is clicked
    document.addEventListener('click', function (e) {
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
        document.getElementById('reschedule-end').value   = toInputTime(btn.dataset.end);
        document.getElementById('reschedule-error').classList.add('d-none');
    });

    document.getElementById('reschedule-save-btn').addEventListener('click', function () {
        const id        = document.getElementById('reschedule-appointment-id').value;
        const date      = document.getElementById('reschedule-date').value;
        const startTime = document.getElementById('reschedule-start').value;
        const endTime   = document.getElementById('reschedule-end').value;
        const errorEl   = document.getElementById('reschedule-error');
        const spinner   = document.getElementById('reschedule-spinner');

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
                date:      date,
                startTime: toDisplayTime(startTime),
                endTime:   toDisplayTime(endTime),
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
                        btn.dataset.date  = date;
                        btn.dataset.start = data.startTime;
                        btn.dataset.end   = data.endTime;
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