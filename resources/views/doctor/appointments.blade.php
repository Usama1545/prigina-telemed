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

@endsection