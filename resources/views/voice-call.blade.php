<?php $page = 'voice-call'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'Voice Call', 'li_2' => 'Voice Call'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Call Wrapper -->
            <div class="call-wrapper">
                <div class="call-main-row">
                    <div class="call-main-wrapper">
                        <div class="call-view">
                            <div class="call-window">

                                <!-- Call Header -->
                                <div class="fixed-header">
                                    <div class="navbar">
                                        <div class="user-details me-auto">
                                            <div class="float-start user-img">
                                                <a class="avatar avatar-sm me-2" href="{{url('patient-profile')}}"
                                                    title="Deny Hendrawan">
                                                    <img src="{{URL::asset('build/img/patients/patient1.jpg')}}"
                                                        alt="User Image" class="rounded-circle">
                                                    <span class="status online"></span>
                                                </a>
                                            </div>
                                            <div class="user-info float-start">
                                                <a href="{{url('patient-profile')}}"><span>Deny Hendrawan</span></a>
                                                <span class="last-seen">Online</span>
                                            </div>
                                        </div>
                                        <ul class="nav float-end custom-menu">
                                            <li class="nav-item">
                                                <a href="#" class="user-icon"><i class="isax isax-user-add"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Call Header -->

                                <!-- Call Contents -->
                                <div class="call-contents">
                                    <div class="call-content-wrap">
                                        <div class="voice-call-avatar">
                                            <img src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"
                                                alt="User Image" class="call-avatar">
                                            <span class="username">Dr. Michael Brown</span>
                                            <span class="call-timing-count">00:59</span>
                                        </div>
                                        <div class="call-users">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <img src="{{URL::asset('build/img/patients/patient1.jpg')}}"
                                                            class="img-fluid" alt="User Image">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /Call Contents -->

                                <!-- Call Footer -->
                                <div class="call-footer">
                                    <div class="call-icons">
                                        <ul class="call-items">
                                            <li class="call-item">
                                                <a href="javascript:void(0)" class="mute-video" title="Enable Video"
                                                    data-placement="top" data-bs-toggle="tooltip">
                                                    <i class="isax isax-video"></i>
                                                </a>
                                            </li>
                                            <li class="call-item">
                                                <a href="javascript:void(0)" class="call-end">
                                                    <i class="isax isax-call"></i>
                                                </a>
                                            </li>
                                            <li class="call-item">
                                                <a href="javascript:void(0)" class="mute-bt" title="Mute"
                                                    data-placement="top" data-bs-toggle="tooltip">
                                                    <i class="isax isax-microphone-2"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Call Footer -->

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Call Wrapper -->

        </div>

    </div>
    <!-- /Page Content -->
@endsection