<?php $page = 'patient-appoitnments'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Appointments', 'li_2' => 'Appointments'])
    @endcomponent

    <!-- Page Content -->
    <div class="content doctor-content">
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
                                        aria-selected="false">Upcoming<span>21</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-cancel-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-cancel" type="button" role="tab" aria-controls="pills-cancel"
                                        aria-selected="true">Cancelled<span>16</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-complete-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-complete" type="button" role="tab"
                                        aria-controls="pills-complete"
                                        aria-selected="true">Completed<span>214</span></button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content appointment-tab-content">
                        <div class="tab-pane fade show active" id="pills-upcoming" role="tabpanel"
                            aria-labelledby="pills-upcoming-tab">
                            @foreach($appointments as $appointment)
                            
                                <!-- Appointment List -->
                                <div class="appointment-wrap">
                                    <ul>
                                        <li>
                                            <div class="patinet-information">
                                                <a href="{{url('patient-upcoming-appointment')}}">
                                                    <img src="{{URL::asset('build/img/doctors/doctor-thumb-21.jpg')}}"
                                                        alt="User Image">
                                                </a>
                                                <div class="patient-info">
                                                     <p>{{ '#Apt' . (isset($appointment['id']) ? $appointment['id'] : '') }}</p>
                                                    <h6><a href="{{url('patient-upcoming-appointment')}}">{{$appointment['doctorName']}}</a></h6>
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
                                        
                                        <li class="appointment-action">
                                            <ul>
                                                <li>
                                                    <a href="{{url('patient-upcoming-appointment')}}"><i
                                                            class="isax isax-eye4"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="isax isax-messages-25"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="isax isax-close-circle5"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="appointment-detail-btn">
                                            <a href="#" class="btn btn-md btn-primary-gradient"><i
                                                    class="isax isax-calendar-tick5 me-1"></i>Attend</a>
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
    <!-- /Page Content -->
@endsection