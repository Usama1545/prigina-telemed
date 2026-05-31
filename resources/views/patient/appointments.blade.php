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
                                        aria-selected="false">Upcoming<span>{{ count($appointments['upcoming'])  }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-cancel-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-cancel" type="button" role="tab" aria-controls="pills-cancel"
                                        aria-selected="true">Cancelled<span>{{ count($appointments['cancelled']) }}</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-pending" type="button" role="tab"
                                        aria-controls="pills-pending"
                                        aria-selected="false">Pending<span>{{ count($appointments['pending'])  }}</span></button>
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
                        <!-- upcoming -->
                        <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel"
                            aria-labelledby="pills-upcoming-tab">
                            @foreach($appointments['upcoming'] as $appointment)
                                <!-- Appointment List -->
                                <div class="appointment-wrap">
                                    <ul>
                                        <li>
                                            <div class="patinet-information">
                                                <a href="javascript:void(0);"
                                                        class="view-appointment"
                                                        data-id="{{ $appointment['id'] }}">
                                                    <img src="{{URL::asset('build/img/doctors/doctor-thumb-21.jpg')}}"
                                                        alt="User Image">
                                                </a>
                                                <div class="patient-info">
                                                     <p>{{ '#Apt' . (isset($appointment['id']) ? $appointment['id'] : '') }}</p>
                                                    <h6><a href="javascript:void(0);"
                                                        class="view-appointment"
                                                        data-id="{{ $appointment['id'] }}">{{$appointment['doctorName']}}</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="appointment-info">
                                            @php
                                                $apptDate = isset($appointment['date']) ? \Carbon\Carbon::parse($appointment['date']) : null;
                                                $date = $apptDate ? $apptDate->format('d M Y') : '';
                                                $canCancel = $apptDate && $apptDate->gt(now()->addHours(24));
                                            @endphp
                                            <p><i class="isax isax-clock5"></i>{{ $date }}</p>
                                            <ul class="d-flex apponitment-types">
                                                <li>Time : {{ $appointment['patientLocalTime'] ?? $appointment['startTime'] . ' - ' . $appointment['endTime'] ??  '' }}</li>
                                            </ul>
                                        </li>

                                        <li class="appointment-action">
                                            <span class="bg-blue badge" style="background-color: #8484eb"><i class="isax isax-video5 me-1"></i>{{ $appointment['status'] }}</span>
                                        </li>

                                        <li class="appointment-action">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                        class="view-appointment"
                                                        data-id="{{ $appointment['id'] }}">
                                                        <i class="isax isax-eye4"></i>
                                                    </a>
                                                </li>
                                                @if($canCancel)
                                                <li>
                                                    <a href="{{ route('patient.cancel-appointment', $appointment['id']) }}"><i class="isax isax-close-circle5"></i></a>
                                                </li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="appointment-detail-btn">
                                            <a href="{{ route('patient.conversations') }}" class="btn btn-md btn-primary-gradient"><i
                                                    class="isax isax-calendar-tick5 me-1"></i>Chat / Video</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Appointment List -->                         
                            @endforeach
                            <!-- Pagination -->
                            <!-- Pagination -->
                            <div class="pagination dashboard-pagination">
                                <ul>
                                    {{-- PREV --}}
                                    @if($hasPrev)
                                        <li>
                                            <a href="?direction=prev" class="page-link prev">Prev</a>
                                        </li>
                                    @endif

                                    {{-- NEXT --}}
                                    @if($hasMore && $nextCursor)
                                        <li>
                                            <a href="?cursor={{ urlencode(json_encode($nextCursor)) }}&direction=next"
                                            class="page-link next">
                                                Next
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /Pagination -->
                        </div>

                        <!-- completed -->
                        <div class="tab-pane fade " id="pills-complete" role="tabpanel"
                            aria-labelledby="pills-complete-tab">
                            @foreach($appointments['completed'] as $appointment)                            
                                <!-- Appointment List -->
                                <div class="appointment-wrap">
                                    <ul>
                                        <li>
                                            <div class="patinet-information">
                                                <a href="javascript:void(0);" 
                                                    class="view-appointment" 
                                                    data-id="{{ $appointment['id'] }}">
                                                    <img src="{{URL::asset('build/img/doctors/doctor-thumb-21.jpg')}}"
                                                        alt="User Image">
                                                </a>
                                                <div class="patient-info">
                                                     <p>{{ '#Apt' . (isset($appointment['id']) ? $appointment['id'] : '') }}</p>
                                                    <h6><a href="javascript:void(0);" 
                                                        class="view-appointment" 
                                                        data-id="{{ $appointment['id'] }}">{{$appointment['doctorName']}}</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="appointment-info">
                                            @php 
                                                $date = isset($appointment['date']) ? \Carbon\Carbon::parse($appointment['date'])->format('d M Y') : '';
                                            @endphp
                                            <p><i class="isax isax-clock5"></i>{{ $date }}</p>
                                            <ul class="d-flex apponitment-types">
                                                <li>Time : {{ $appointment['patientLocalTime'] ?? $appointment['startTime'] . ' - ' . $appointment['endTime'] ??  '' }}</li>
                                            </ul>
                                        </li>
                                        <li class="appointment-info">
                                            <span class="bg-blue badge" style="background-color: #4dfc5c"><i class="isax isax-video5 me-1"></i>{{ $appointment['status'] }}</span>
                                        </li>
                                        <li class="appointment-action">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" 
                                                    class="view-appointment" 
                                                    data-id="{{ $appointment['id'] }}">
                                                    <i class="isax isax-eye4"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('patient.conversations') }}"><i class="isax isax-messages-25"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <!-- /Appointment List -->                         
                            @endforeach
                            <!-- Pagination -->
                            <!-- Pagination -->
                            <div class="pagination dashboard-pagination">
                                <ul>
                                    {{-- PREV --}}
                                    @if($hasPrev)
                                        <li>
                                            <a href="?direction=prev" class="page-link prev">Prev</a>
                                        </li>
                                    @endif

                                    {{-- NEXT --}}
                                    @if($hasMore && $nextCursor)
                                        <li>
                                            <a href="?cursor={{ urlencode(json_encode($nextCursor)) }}&direction=next"
                                            class="page-link next">
                                                Next
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /Pagination -->
                        </div>

                        <!-- cancelled -->
                        <div class="tab-pane fade" id="pills-cancel" role="tabpanel"
                            aria-labelledby="pills-cancel-tab">
                            @foreach($appointments['cancelled'] as $appointment)                            
                                <!-- Appointment List -->
                                <div class="appointment-wrap">
                                    <ul>
                                        <li>
                                            <div class="patinet-information">
                                                <a href="javascript:void(0);" 
                                                    class="view-appointment" 
                                                    data-id="{{ $appointment['id'] }}">
                                                    <img src="{{URL::asset('build/img/doctors/doctor-thumb-21.jpg')}}"
                                                        alt="User Image">
                                                </a>
                                                <div class="patient-info">
                                                     <p>{{ '#Apt' . (isset($appointment['id']) ? $appointment['id'] : '') }}</p>
                                                    <h6><a href="javascript:void(0);" 
                                                        class="view-appointment" 
                                                        data-id="{{ $appointment['id'] }}">{{$appointment['doctorName']}}</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="appointment-info">
                                            @php 
                                                $date = isset($appointment['date']) ? \Carbon\Carbon::parse($appointment['date'])->format('d M Y') : '';
                                            @endphp
                                            <p><i class="isax isax-clock5"></i>{{ $date }}</p>
                                            <ul class="d-flex apponitment-types">
                                                <li>Time : {{ $appointment['patientLocalTime'] ?? $appointment['startTime'] . ' - ' . $appointment['endTime'] ??  '' }}</li>
                                            </ul>
                                        </li>
                                        <li class="appointment-info">
                                            <span class="bg-blue badge" style="background-color: #fc4d4d"><i class="isax isax-video5 me-1"></i>{{ $appointment['status'] }}</span>
                                        </li>
                                        <li class="appointment-action">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" 
                                                    class="view-appointment" 
                                                    data-id="{{ $appointment['id'] }}">
                                                    <i class="isax isax-eye4"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Appointment List -->                         
                            @endforeach
                            <!-- Pagination -->
                            <!-- Pagination -->
                            <div class="pagination dashboard-pagination">
                                <ul>
                                    {{-- PREV --}}
                                    @if($hasPrev)
                                        <li>
                                            <a href="?direction=prev" class="page-link prev">Prev</a>
                                        </li>
                                    @endif

                                    {{-- NEXT --}}
                                    @if($hasMore && $nextCursor)
                                        <li>
                                            <a href="?cursor={{ urlencode(json_encode($nextCursor)) }}&direction=next"
                                            class="page-link next">
                                                Next
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /Pagination -->
                        </div>

                        <!-- pending -->
                        <div class="tab-pane fade " id="pills-pending" role="tabpanel"
                            aria-labelledby="pills-pending-tab">
                            @foreach($appointments['pending'] as $appointment)
                                <!-- Appointment List -->
                                <div class="appointment-wrap">
                                    <ul>
                                        <li>
                                            <div class="patinet-information">
                                                <a href="javascript:void(0);"
                                                    class="view-appointment"
                                                    data-id="{{ $appointment['id'] }}">
                                                    <img src="{{URL::asset('build/img/doctors/doctor-thumb-21.jpg')}}"
                                                        alt="User Image">
                                                </a>
                                                <div class="patient-info">
                                                     <p>{{ '#Apt' . (isset($appointment['id']) ? $appointment['id'] : '') }}</p>
                                                    <h6><a href="javascript:void(0);"
                                                            class="view-appointment"
                                                            data-id="{{ $appointment['id'] }}">{{$appointment['doctorName']}}</a></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="appointment-info">
                                            @php
                                                $apptDate = isset($appointment['date']) ? \Carbon\Carbon::parse($appointment['date']) : null;
                                                $date = $apptDate ? $apptDate->format('d M Y') : '';
                                                $canCancel = $apptDate && $apptDate->gt(now()->addHours(24));
                                            @endphp
                                            <p><i class="isax isax-clock5"></i>{{ $date }}</p>
                                            <ul class="d-flex apponitment-types">
                                                <li>Time : {{ $appointment['patientLocalTime'] ?? $appointment['startTime'] . ' - ' . $appointment['endTime'] ??  '' }}</li>
                                            </ul>
                                        </li>
                                        <li class="appointment-info">
                                            <span class="bg-blue badge" style="background-color: #ff7420"><i class="isax isax-video5 me-1"></i>{{ $appointment['status'] }}</span>
                                        </li>

                                        <li class="appointment-action">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);"
                                                    class="view-appointment"
                                                    data-id="{{ $appointment['id'] }}">
                                                    <i class="isax isax-eye4"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('patient.conversations') }}"><i class="isax isax-messages-25"></i></a>
                                                </li>
                                                @if($canCancel)
                                                <li>
                                                    <a href="{{ route('patient.cancel-appointment', $appointment['id']) }}"><i class="isax isax-close-circle5"></i></a>
                                                </li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="appointment-detail-btn">
                                            <a href="#" class="btn btn-md btn-primary-gradient"><i
                                                    class="isax isax-calendar-tick5 me-1"></i>Confirm Now</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Appointment List -->                         
                            @endforeach
                            <!-- Pagination -->
                            <!-- Pagination -->
                            <div class="pagination dashboard-pagination">
                                <ul>
                                    {{-- PREV --}}
                                    @if($hasPrev)
                                        <li>
                                            <a href="?direction=prev" class="page-link prev">Prev</a>
                                        </li>
                                    @endif

                                    {{-- NEXT --}}
                                    @if($hasMore && $nextCursor)
                                        <li>
                                            <a href="?cursor={{ urlencode(json_encode($nextCursor)) }}&direction=next"
                                            class="page-link next">
                                                Next
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /Pagination -->
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
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                        </ul>
                    </div>

                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo" style="max-width: 30%;">
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
                                            <span id="appStatus" ></span>
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
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.view-appointment').forEach(btn => {
        btn.addEventListener('click', async function () {
            const id = this.dataset.id;

            const res = await fetch(`/patient/appointment-details/${id}`);
            const data = await res.json();

            document.getElementById('docName').innerText = data.doctorName ?? '';
            document.getElementById('docSpecialization').innerText = (data.specializations || []).join(', ');

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
            document.getElementById('notes').innerText = data.note ?? '-';

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

});
</script>
@endpush