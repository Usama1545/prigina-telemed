<?php $page = 'doctor-dashboard'; ?>
@extends('layouts.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                   @include('partials.doctor-sidebar')
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-lg-8 col-xl-9">

                    <div class="row">
                        <div class="col-xl-4 d-flex">
                            <div class="dashboard-box-col w-100">
                                <div class="dashboard-widget-box">
                                    <div class="dashboard-content-info">
                                        <h6>Waiting Patients</h6>
                                        <h4>{{ $waitingAppointments }}</h4>
                                        
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <span class="dash-icon-box"><i class="fa-solid fa-user-clock text-warning"></i></span>
                                    </div>
                                </div>
                                <div class="dashboard-widget-box">
                                    <div class="dashboard-content-info">
                                        <h6>Todays Appointments</h6>
                                        <h4>{{ $todayAppointments->count() }}</h4>
                                        
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <span class="dash-icon-box"><i class="fa-solid fa-calendar-days text-info"></i></span>
                                    </div>
                                </div>
                                <div class="dashboard-widget-box">
                                    <div class="dashboard-content-info">
                                        <h6>Total Earnings</h6>
                                        <h4>${{ number_format($totalEarnings, 2) }}</h4>
                                        
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <span class="dash-icon-box"><i class="fa-solid fa-wallet text-success"></i></span>
                                    </div>
                                </div>
                                <div class="dashboard-widget-box">
                                    <div class="dashboard-content-info">
                                        <h6>Total Rating</h6>
                                        <h4>{{ current_user()['rating'] }} / 5</h4>
                                        <span class="text-success"></i>Based on {{ current_user()['totalReviews'] }} Reviews</span>
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <span class="dash-icon-box"><i class="fa-solid fa-wallet text-success"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 d-flex">
                            <div class="dashboard-card w-100">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Today's Appointment</h5>
                                    </div>
                                   
                                    <span class="badge rounded-pill bg-primary-transparent text-md">
                                        {{ now()->format('M d, Y') }}
                                    </span>
                                    

                                </div>
                                <div class="dashboard-card-body">
                                    <div class="table-responsive">
                                        <table class="table dashboard-table appoint-table">
                                            <tbody>
                                                @foreach($todayAppointments as $appointment)
                                                <tr>
                                                    <td>
                                                        <div class="patient-info-profile">
                                                            {{-- <a href="{{url('appointments')}}" class="table-avatar">
                                                                <img src="{{URL::asset('build/img/doctors-dashboard/profile-01.jpg')}}"
                                                                    alt="Img">
                                                            </a> --}}
                                                            <div class="patient-name-info">
                                                                <span>#{{ $appointment->id }}</span>
                                                                <h5><a href="{{url('appointments')}}">{{ $appointment->patientName }}</a>
                                                                </h5>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="appointment-date-created">
                                                            <h6>{{ $appointment->date }}</h6>
                                                            <span class="badge table-badge">General</span>
                                                        </div>
                                                    </td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                       
                        <div class="col-xl-7 d-flex">
                            <div class="dashboard-card w-100">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Notifications</h5>
                                    </div>
                                    <div class="card-view-link">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="table-responsive">
                                        <table class="table dashboard-table">
                                            <tbody>
                                                @foreach ($notifications as $notification)
                                                    <tr>
                                                        <td>
                                                            <div class="table-noti-info align-items-start">
                                                                <div class="table-noti-icon color-violet">
                                                                    <i class="fa-solid fa-bell"></i>
                                                                </div>
                                                                <div class="table-noti-message flex-grow-1 overflow-hidden">
                                                                    <h6 class="mb-1 text-wrap" style="white-space: normal; word-break: break-word;">
                                                                        
                                                                            {{ $notification['description'] }}
                                                                        
                                                                    </h6>

                                                                    <span class="message-time">
                                                                        {{ \Carbon\Carbon::parse($notification['createdAt'])->format('M d, Y h:i A') }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                @endforeach
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-5 d-flex">
                            <div class="dashboard-card w-100">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Availability Schedule</h5>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="clinic-available">

                                        <div class="available-time">

                                            <ul>

                                                @php
                                                    $workingDays = current_user()['workingDays'] ?? [];
                                                    $workingHours = current_user()['workingHours'] ?? [];
                                                    $breaks = current_user()['breaks'] ?? [];

                                                    $startTime = $workingHours[0] ?? null;
                                                    $endTime = $workingHours[1] ?? null;

                                                @endphp

                                                @foreach($workingDays as $day)

                                                    <li class="mb-2">

                                                        <div class="d-flex flex-wrap align-items-center gap-2">

                                                            <span class="fw-semibold">
                                                                {{ substr($day, 0, 3) }} :
                                                            </span>

                                                            <span>
                                                                {{ \Carbon\Carbon::parse($startTime)->format('h:i A') }}
                                                                -
                                                                {{ \Carbon\Carbon::parse($endTime)->format('h:i A') }}
                                                            </span>

                                                            @foreach($breaks as $break)
                                                                <small class="text-muted">
                                                                    (Break:
                                                                     {{ $break }})
                                                                </small>
                                                            @endforeach

                                                        </div>

                                                    </li>

                                                @endforeach

                                            </ul>

                                            <div class="change-time">
                                                <a href="{{route('doctor.available-timings')}}">Change</a>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection