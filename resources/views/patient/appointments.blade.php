<?php $page = 'patient-appoitnments'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content patient-content ">
        <div class="container">

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    @include('partials.patient-sidebar')
                    <!-- /Profile Sidebar -->

                </div>
                <!-- / Profile Sidebar -->

                <div class="col-lg-8 col-xl-9">
                    <div class="dashboard-header">
                        <h3>Appointments</h3>

                    </div>
                    <div class="appointment-tab-head">
                        <div class="appointment-tabs">
                            <ul class="nav nav-pills inner-tab " id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-upcoming-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-upcoming" type="button" role="tab"
                                        aria-controls="pills-upcoming"
                                        aria-selected="false">Upcoming<span>{{ count($appointments['upcoming']) }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-cancel-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-cancel" type="button" role="tab"
                                        aria-controls="pills-cancel"
                                        aria-selected="true">Cancelled<span>{{ count($appointments['cancelled']) }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-pending" type="button" role="tab"
                                        aria-controls="pills-pending"
                                        aria-selected="false">Pending<span>{{ count($appointments['pending']) }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-complete-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-complete" type="button" role="tab"
                                        aria-controls="pills-complete"
                                        aria-selected="true">Completed<span>{{ count($appointments['completed']) }}</span></button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content appointment-tab-content">

                        {{-- ── UPCOMING (confirmed) ── --}}
                        <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel"
                            aria-labelledby="pills-upcoming-tab">
                            <div class="row g-3 mt-1">
                                @forelse($appointments['upcoming'] as $appointment)
                                    @php
                                        $apptDate = isset($appointment['date'])
                                            ? \Carbon\Carbon::parse($appointment['date'])
                                            : null;
                                        $dateLabel = $apptDate ? $apptDate->format('d M Y') : '';
                                        $canCancel = $apptDate && $apptDate->gt(now()->addHours(24));
                                    @endphp
                                    <div class="col-xl-4 col-lg-6 col-md-12 d-flex appointment-card">
                                        <div class="appointment-wrap appointment-grid-wrap w-100">
                                            <ul>
                                                <li>
                                                    <div
                                                        class="appointment-grid-head d-flex justify-content-between align-items-start">
                                                        <div class="patinet-information d-flex align-items-center">
                                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-2 flex-shrink-0"
                                                                style="width:50px;height:50px;background:#e9f2ff;">
                                                                <i class="fa-solid fa-user-doctor"
                                                                    style="color:#0d6efd;font-size:20px;"></i>
                                                            </div>
                                                            <div class="patient-info">
                                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                                    <h6 class="mb-0">
                                                                        <a href="javascript:void(0);"
                                                                            class="view-appointment"
                                                                            data-id="{{ $appointment['id'] }}">
                                                                            {{ $appointment['doctorName'] ?? 'Doctor' }}
                                                                        </a>
                                                                    </h6>
                                                                    @if (!empty($appointment['doctorId']))
                                                                        <a href="{{ route('conversation.create', ['doctor_id' => $appointment['doctorId']]) }}"
                                                                            class="btn btn-xs btn-outline-primary rounded-pill px-2 py-1"
                                                                            title="Chat">
                                                                            <i class="isax isax-messages-25"></i>
                                                                        </a>
                                                                        <a href="{{ route('patient.appointment-video-call', $appointment['id']) }}"
                                                                            class="btn btn-xs btn-outline-success rounded-pill px-2 py-1"
                                                                            title="Video Call">
                                                                            <i class="fa-solid fa-video"></i>
                                                                        </a>
                                                                        <a href="{{ route('patient.appointment-audio-call', $appointment['id']) }}"
                                                                            class="btn btn-xs btn-outline-primary rounded-pill px-2 py-1"
                                                                            title="Audio Call">
                                                                            <i class="fa-solid fa-phone"></i>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                                <span
                                                                    class="badge bg-success mt-2">{{ ucfirst($appointment['status'] ?? 'Confirmed') }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-2">
                                                            @if (!empty($appointment['amount']))
                                                                <h6 class="text-primary fw-bold mb-0">
                                                                    ${{ number_format($appointment['amount'], 2) }}</h6>
                                                            @endif
                                                            <button type="button"
                                                                class="btn btn-xs btn-outline-info rounded-pill px-2 py-1 view-appointment"
                                                                data-id="{{ $appointment['id'] }}"
                                                                title="View Details">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info mb-3">
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <i class="isax isax-calendar-1 me-2 text-primary"></i>
                                                        <span>{{ $dateLabel }}</span>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <i class="isax isax-clock5 me-2 text-success"></i>
                                                        <span>{{ $appointment['startTime'] ?? '--' }} -
                                                            {{ $appointment['endTime'] ?? '--' }}</span>
                                                    </div>
                                                    @if (!empty($appointment['symptoms']))
                                                        <div class="mt-3">
                                                            <label class="fw-bold mb-1">Symptoms</label>
                                                            <p class="mb-0 text-muted"
                                                                style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                                {{ $appointment['symptoms'] }}
                                                            </p>
                                                        </div>
                                                    @endif
                                                </li>
                                                <li class="appointment-action d-flex gap-2">
                                                    @if ($canCancel)
                                                        <a href="{{ route('patient.cancel-appointment', $appointment['id']) }}"
                                                            class="btn btn-outline-danger w-100">
                                                            <i class="fa-solid fa-xmark me-1"></i>Cancel
                                                        </a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted text-center py-4">No upcoming appointments.</p>
                                    </div>
                                @endforelse
                            </div>
                            <div class="pagination dashboard-pagination mt-3">
                                <ul>
                                    @if ($hasPrev)
                                        <li><a href="?direction=prev" class="page-link prev">Prev</a></li>
                                    @endif
                                    @if ($hasMore && $nextCursor)
                                        <li><a href="?cursor={{ urlencode(json_encode($nextCursor)) }}&direction=next"
                                                class="page-link next">Next</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        {{-- ── CANCELLED ── --}}
                        <div class="tab-pane fade" id="pills-cancel" role="tabpanel" aria-labelledby="pills-cancel-tab">
                            <div class="row g-3 mt-1">
                                @forelse($appointments['cancelled'] as $appointment)
                                    @php
                                        $dateLabel = isset($appointment['date'])
                                            ? \Carbon\Carbon::parse($appointment['date'])->format('d M Y')
                                            : '';
                                    @endphp
                                    <div class="col-xl-4 col-lg-6 col-md-12 d-flex appointment-card">
                                        <div class="appointment-wrap appointment-grid-wrap w-100">
                                            <ul>
                                                <li>
                                                    <div
                                                        class="appointment-grid-head d-flex justify-content-between align-items-start">
                                                        <div class="patinet-information d-flex align-items-center">
                                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-2 flex-shrink-0"
                                                                style="width:50px;height:50px;background:#ffe9e9;">
                                                                <i class="fa-solid fa-user-doctor"
                                                                    style="color:#dc3545;font-size:20px;"></i>
                                                            </div>
                                                            <div class="patient-info">
                                                                <h6 class="mb-0">
                                                                    <a href="javascript:void(0);" class="view-appointment"
                                                                        data-id="{{ $appointment['id'] }}">
                                                                        {{ $appointment['doctorName'] ?? 'Doctor' }}
                                                                    </a>
                                                                </h6>
                                                                <span class="badge bg-danger mt-2">Cancelled</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-2">
                                                            @if (!empty($appointment['amount']))
                                                                <h6 class="text-primary fw-bold mb-0">
                                                                    ${{ number_format($appointment['amount'], 2) }}</h6>
                                                            @endif
                                                            <button type="button"
                                                                class="btn btn-xs btn-outline-info rounded-pill px-2 py-1 view-appointment"
                                                                data-id="{{ $appointment['id'] }}"
                                                                title="View Details">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info mb-3">
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <i class="isax isax-calendar-1 me-2 text-primary"></i>
                                                        <span>{{ $dateLabel }}</span>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <i class="isax isax-clock5 me-2 text-muted"></i>
                                                        <span>{{ $appointment['startTime'] ?? '--' }} -
                                                            {{ $appointment['endTime'] ?? '--' }}</span>
                                                    </div>
                                                    @if (!empty($appointment['symptoms']))
                                                        <div class="mt-3">
                                                            <label class="fw-bold mb-1">Symptoms</label>
                                                            <p class="mb-0 text-muted"
                                                                style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                                {{ $appointment['symptoms'] }}
                                                            </p>
                                                        </div>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted text-center py-4">No cancelled appointments.</p>
                                    </div>
                                @endforelse
                            </div>
                            <div class="pagination dashboard-pagination mt-3">
                                <ul>
                                    @if ($hasPrev)
                                        <li><a href="?direction=prev" class="page-link prev">Prev</a></li>
                                    @endif
                                    @if ($hasMore && $nextCursor)
                                        <li><a href="?cursor={{ urlencode(json_encode($nextCursor)) }}&direction=next"
                                                class="page-link next">Next</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        {{-- ── PENDING ── --}}
                        <div class="tab-pane fade" id="pills-pending" role="tabpanel"
                            aria-labelledby="pills-pending-tab">
                            <div class="row g-3 mt-1">
                                @forelse($appointments['pending'] as $appointment)
                                    @php
                                        $apptDate = isset($appointment['date'])
                                            ? \Carbon\Carbon::parse($appointment['date'])
                                            : null;
                                        $dateLabel = $apptDate ? $apptDate->format('d M Y') : '';
                                        $canCancel = $apptDate && $apptDate->gt(now()->addHours(24));
                                        $isPaid = ($appointment['paymentStatus'] ?? '') === 'completed';
                                        $canPay = !$isPaid && $apptDate && $apptDate->gt(now()->addDays(3));
                                    @endphp
                                    <div class="col-xl-4 col-lg-6 col-md-12 d-flex appointment-card">
                                        <div class="appointment-wrap appointment-grid-wrap w-100">
                                            <ul>
                                                <li>
                                                    <div
                                                        class="appointment-grid-head d-flex justify-content-between align-items-start">
                                                        <div class="patinet-information d-flex align-items-center">
                                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-2 flex-shrink-0"
                                                                style="width:50px;height:50px;background:#fff3e0;">
                                                                <i class="fa-solid fa-user-doctor"
                                                                    style="color:#ff7420;font-size:20px;"></i>
                                                            </div>
                                                            <div class="patient-info">
                                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                                    <h6 class="mb-0">
                                                                        <a href="javascript:void(0);"
                                                                            class="view-appointment"
                                                                            data-id="{{ $appointment['id'] }}">
                                                                            {{ $appointment['doctorName'] ?? 'Doctor' }}
                                                                        </a>
                                                                    </h6>
                                                                    @if ($isPaid && !empty($appointment['doctorId']))
                                                                        <a href="{{ route('conversation.create', ['doctor_id' => $appointment['doctorId']]) }}"
                                                                            class="btn btn-xs btn-outline-primary rounded-pill px-2 py-1"
                                                                            title="Chat">
                                                                            <i class="isax isax-messages-25"></i>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                                @if ($isPaid)
                                                                    <span class="badge bg-warning text-dark mt-2">Pending</span>
                                                                @else
                                                                    <span class="badge bg-danger mt-2">
                                                                        <i class="fa-solid fa-circle-exclamation me-1"></i>
                                                                        Not Paid
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-2">
                                                            @if (!empty($appointment['amount']))
                                                                <h6 class="text-primary fw-bold mb-0">
                                                                    ${{ number_format($appointment['amount'], 2) }}</h6>
                                                            @endif
                                                            <button type="button"
                                                                class="btn btn-xs btn-outline-info rounded-pill px-2 py-1 view-appointment"
                                                                data-id="{{ $appointment['id'] }}"
                                                                title="View Details">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info mb-3">
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <i class="isax isax-calendar-1 me-2 text-primary"></i>
                                                        <span>{{ $dateLabel }}</span>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <i class="isax isax-clock5 me-2 text-warning"></i>
                                                        <span>{{ $appointment['startTime'] ?? '--' }} -
                                                            {{ $appointment['endTime'] ?? '--' }}</span>
                                                    </div>
                                                    @if (!empty($appointment['symptoms']))
                                                        <div class="mt-3">
                                                            <label class="fw-bold mb-1">Symptoms</label>
                                                            <p class="mb-0 text-muted"
                                                                style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                                {{ $appointment['symptoms'] }}
                                                            </p>
                                                        </div>
                                                    @endif
                                                </li>
                                                <li class="appointment-action d-flex gap-2 flex-wrap">
                                                    @if ($isPaid)
                                                        @if ($canCancel)
                                                            <a href="{{ route('patient.cancel-appointment', $appointment['id']) }}"
                                                                class="btn btn-outline-danger w-100">
                                                                <i class="fa-solid fa-xmark me-1"></i>Cancel
                                                            </a>
                                                        @endif
                                                    @else
                                                        @if ($canPay)
                                                            <form method="POST" action="{{ route('patient.appointment-pay', $appointment['id']) }}" class="flex-grow-1">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success w-100">
                                                                    <i class="fa-solid fa-credit-card me-1"></i>Pay & Confirm
                                                                </button>
                                                            </form>
                                                        @endif
                                                        <form method="POST" action="{{ route('patient.appointment-delete', $appointment['id']) }}" onsubmit="return confirm('Delete this appointment?')">
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-danger">
                                                                <i class="fa-solid fa-trash me-1"></i>Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted text-center py-4">No pending appointments.</p>
                                    </div>
                                @endforelse
                            </div>
                            <div class="pagination dashboard-pagination mt-3">
                                <ul>
                                    @if ($hasPrev)
                                        <li><a href="?direction=prev" class="page-link prev">Prev</a></li>
                                    @endif
                                    @if ($hasMore && $nextCursor)
                                        <li><a href="?cursor={{ urlencode(json_encode($nextCursor)) }}&direction=next"
                                                class="page-link next">Next</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                        {{-- ── COMPLETED ── --}}
                        <div class="tab-pane fade" id="pills-complete" role="tabpanel"
                            aria-labelledby="pills-complete-tab">
                            <div class="row g-3 mt-1">
                                @forelse($appointments['completed'] as $appointment)
                                    @php
                                        $dateLabel = isset($appointment['date'])
                                            ? \Carbon\Carbon::parse($appointment['date'])->format('d M Y')
                                            : '';
                                    @endphp
                                    <div class="col-xl-4 col-lg-6 col-md-12 d-flex appointment-card">
                                        <div class="appointment-wrap appointment-grid-wrap w-100">
                                            <ul>
                                                <li>
                                                    <div
                                                        class="appointment-grid-head d-flex justify-content-between align-items-start">
                                                        <div class="patinet-information d-flex align-items-center">
                                                            <div class="rounded-circle d-flex align-items-center justify-content-center me-2 flex-shrink-0"
                                                                style="width:50px;height:50px;background:#e6f9ee;">
                                                                <i class="fa-solid fa-user-doctor"
                                                                    style="color:#198754;font-size:20px;"></i>
                                                            </div>
                                                            <div class="patient-info">
                                                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                                                    <h6 class="mb-0">
                                                                        <a href="javascript:void(0);"
                                                                            class="view-appointment"
                                                                            data-id="{{ $appointment['id'] }}">
                                                                            {{ $appointment['doctorName'] ?? 'Doctor' }}
                                                                        </a>
                                                                    </h6>
                                                                    @if (!empty($appointment['doctorId']))
                                                                        <a href="{{ route('conversation.create', ['doctor_id' => $appointment['doctorId']]) }}"
                                                                            class="btn btn-xs btn-outline-primary rounded-pill px-2 py-1"
                                                                            title="Chat">
                                                                            <i class="isax isax-messages-25"></i>
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                                <span class="badge bg-success mt-2">Completed</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-2">
                                                            @if (!empty($appointment['amount']))
                                                                <h6 class="text-primary fw-bold mb-0">
                                                                    ${{ number_format($appointment['amount'], 2) }}</h6>
                                                            @endif
                                                            <button type="button"
                                                                class="btn btn-xs btn-outline-info rounded-pill px-2 py-1 view-appointment"
                                                                data-id="{{ $appointment['id'] }}"
                                                                title="View Details">
                                                                <i class="fa-solid fa-eye"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="appointment-info mb-3">
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <i class="isax isax-calendar-1 me-2 text-primary"></i>
                                                        <span>{{ $dateLabel }}</span>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <i class="isax isax-clock5 me-2 text-success"></i>
                                                        <span>{{ $appointment['startTime'] ?? '--' }} -
                                                            {{ $appointment['endTime'] ?? '--' }}</span>
                                                    </div>
                                                    @if (!empty($appointment['symptoms']))
                                                        <div class="mt-3">
                                                            <label class="fw-bold mb-1">Symptoms</label>
                                                            <p class="mb-0 text-muted"
                                                                style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                                                {{ $appointment['symptoms'] }}
                                                            </p>
                                                        </div>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-muted text-center py-4">No completed appointments.</p>
                                    </div>
                                @endforelse
                            </div>
                            <div class="pagination dashboard-pagination mt-3">
                                <ul>
                                    @if ($hasPrev)
                                        <li><a href="?direction=prev" class="page-link prev">Prev</a></li>
                                    @endif
                                    @if ($hasMore && $nextCursor)
                                        <li><a href="?cursor={{ urlencode(json_encode($nextCursor)) }}&direction=next"
                                                class="page-link next">Next</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="modal fade custom-modals" id="viewAppointmentModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">
                    <h3 class="modal-title">Appointment Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <div class="modal-body">

                    <!-- Top Info Bar -->
                    <div class="prescribe-download">
                        <h5 id="modalDate"></h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i class="fa-solid fa-print"></i></a>
                            </li>
                        </ul>
                    </div>

                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo"
                                    style="max-width: 30%;">
                            </div>
                        </div>
                        <!-- Doctor + Meta -->
                        <div class="invoice-item">
                            <div class="row">

                                <!-- Doctor -->
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text" id="docName"></h6>
                                        <p id="docSpecialization"></p>
                                    </div>
                                </div>

                                <!-- Appointment Meta -->
                                <div class="col-md-6 text-md-end">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span><span id="appDate"></span></p>
                                        <p><span>Time : </span><span id="appTime"></span></p>
                                        <p><span>Status : </span>
                                            <span id="appStatus"></span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Patient -->
                                <div class="col-md-12">
                                    <div class="patient-id mt-3">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6 id="patientName"></h6>
                                            <ul>
                                                <li><strong>Appointment ID :</strong> <span id="appointmentId"></span></li>
                                                <li><strong>Created At :</strong> <span id="createdAt"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Notes Section -->
                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>

                        <!-- Symptoms -->
                        <div class="appoint-wrap">
                            <h5>Symptoms</h5>
                            <p id="symptoms"></p>
                        </div>

                        <!-- Notes -->
                        <div class="appoint-wrap">
                            <h5>Notes</h5>
                            <p id="notes"></p>
                        </div>

                        <!-- Documents -->
                        <div class="appoint-wrap" id="patient-modal-docs-wrap" style="display:none;">
                            <h5>Documents</h5>
                            <div id="patient-modal-docs" class="d-flex flex-wrap gap-2 mt-2"></div>
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

        .badge {
            padding: 0.75rem 0.45rem;
            font-weight: 800;
            letter-spacing: 0.7px;
            border-radius: 6px;
        }
    </style>
    <!-- /Page Content -->
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.view-appointment').forEach(btn => {
                btn.addEventListener('click', async function() {
                    const id = this.dataset.id;

                    const res = await fetch(`/patient/appointment-details/${id}`);
                    const data = await res.json();

                    document.getElementById('docName').innerText = data.doctorName ?? '';
                    document.getElementById('docSpecialization').innerText = (data
                        .specializations || []).join(', ');

                    document.getElementById('patientName').innerText = data.patientName ?? '';
                    document.getElementById('appointmentId').innerText = data.id ?? '';

                    document.getElementById('appDate').innerText = formatDate(data.date);
                    document.getElementById('modalDate').innerText = formatDate(data.date);

                    document.getElementById('appTime').innerText =
                        (data.startTime ?? '') + ' - ' + (data.endTime ?? '');

                    document.getElementById('appStatus').innerText = data.status ?? '';

                    document.getElementById('createdAt').innerText =
                        new Date(data.createdAt).toLocaleString();

                    document.getElementById('symptoms').innerText = data.symptoms ?? '-';
                    document.getElementById('notes').innerText = data.notes ?? '-';

                    // Documents
                    const docsWrap = document.getElementById('patient-modal-docs-wrap');
                    const docsContainer = document.getElementById('patient-modal-docs');
                    docsContainer.innerHTML = '';
                    const urls = Array.isArray(data.documentUrls) ? data.documentUrls : [];
                    if (urls.length) {
                        urls.forEach(url => {
                            const isImage = /\.(jpg|jpeg|png|gif|webp)(\?|$)/i.test(url);
                            const a = document.createElement('a');
                            a.href = url;
                            a.target = '_blank';
                            a.rel = 'noopener';
                            a.className = 'text-decoration-none';
                            if (isImage) {
                                a.innerHTML = `<img src="${url}" style="width:80px;height:80px;object-fit:cover;border-radius:8px;border:1px solid #dee2e6;" alt="document">`;
                            } else {
                                const ext = url.split('.').pop().split('?')[0].toUpperCase().slice(0, 4);
                                a.innerHTML = `<div style="width:80px;height:80px;border:1px solid #dee2e6;border-radius:8px;background:#f8f9fa;display:flex;flex-direction:column;align-items:center;justify-content:center;font-size:11px;color:#6c757d;text-align:center;padding:4px;"><i class="fa-solid fa-file-lines" style="font-size:22px;margin-bottom:4px;"></i><span>${ext}</span></div>`;
                            }
                            docsContainer.appendChild(a);
                        });
                        docsWrap.style.display = '';
                    } else {
                        docsWrap.style.display = 'none';
                    }

                    new bootstrap.Modal(document.getElementById('viewAppointmentModal')).show();
                });
            });

            function formatDate(date) {
                if (!date) return '';
                return new Date(date).toLocaleDateString('en-GB', {
                    day: '2-digit',
                    month: 'short',
                    year: 'numeric'
                });
            }

            // Show inline spinner on chat / call buttons when clicked
            document.querySelectorAll(
                '.appointment-card a[title="Chat"], .appointment-card a[title="Video Call"], .appointment-card a[title="Audio Call"]'
            ).forEach(function(link) {
                link.addEventListener('click', function() {
                    this.innerHTML = '<span class="spinner-border spinner-border-sm" role="status"></span>';
                    this.style.pointerEvents = 'none';
                });
            });

        });
    </script>
@endpush
