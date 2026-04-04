<?php $page = 'patient-upcoming-appointment'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Appointments', 'li_2' => 'Appointments'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar patient-sidebar profile-sidebar-new">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="{{url('profile-settings')}}" class="booking-doc-img">
                                    <img src="{{URL::asset('build/img/doctors-dashboard/profile-06.jpg')}}"
                                        alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="{{url('profile-settings')}}">Hendrita Hayes</a></h3>
                                    <div class="patient-details">
                                        <h5 class="mb-0">Patient ID : PT254654</h5>
                                    </div>
                                    <span>Female <i class="fa-solid fa-circle"></i> 32 years 03 Months</span>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="{{url('patient-dashboard')}}">
                                            <i class="isax isax-category-2"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{url('patient-appointments')}}">
                                            <i class="isax isax-calendar-1"></i>
                                            <span>My Appointments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('favourites')}}">
                                            <i class="isax isax-star-1"></i>
                                            <span>Favourites</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('dependent')}}">
                                            <i class="isax isax-user-octagon"></i>
                                            <span>Dependants</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('medical-records')}}">
                                            <i class="isax isax-note-21"></i>
                                            <span>Medical Records</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('patient-accounts')}}">
                                            <i class="isax isax-wallet-2"></i>
                                            <span>Wallet</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('patient-invoices')}}">
                                            <i class="isax isax-document-text"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('chat')}}">
                                            <i class="isax isax-messages-1"></i>
                                            <span>Message</span>
                                            <small class="unread-msg">7</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('medical-details')}}">
                                            <i class="isax isax-note-1"></i>
                                            <span>Vitals</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('profile-settings')}}">
                                            <i class="isax isax-setting-2"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('login')}}">
                                            <i class="isax isax-logout"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->

                </div>
                <!-- / Profile Sidebar -->

                <div class="col-lg-8 col-xl-9">
                    <div class="dashboard-header">
                        <div class="header-back">
                            <a href="{{url('appointments')}}" class="back-arrow"><i class="fa-solid fa-arrow-left"></i></a>
                            <h3>Appointment Details</h3>
                        </div>
                    </div>
                    <div class="appointment-details-wrap">

                        <!-- Appointment Detail Card -->
                        <div class="appointment-wrap appointment-detail-card">
                            <ul>
                                <li>
                                    <div class="patinet-information">
                                        <a href="#">
                                            <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                                alt="User Image">
                                        </a>
                                        <div class="patient-info">
                                            <p>#Apt0001</p>
                                            <h6><a href="#">Dr Edalin Hendry</a></h6>
                                            <div class="mail-info-patient">
                                                <ul>
                                                    <li><i class="isax isax-sms5"></i>edalin@example.com</li>
                                                    <li><i class="isax isax-call5"></i> +1 504 368 6874</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="appointment-info">
                                    <div class="person-info">
                                        <p>Type of Appointment</p>
                                        <ul class="d-flex apponitment-types">
                                            <li><i class="isax isax-hospital5 text-green"></i>Direct Visit</li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="appointment-action">
                                    <div class="detail-badge-info">
                                        <span class="badge bg-secondary">Upcoming</span>
                                    </div>
                                    <div class="consult-fees">
                                        <h6>Consultation Fees : $200</h6>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="isax isax-messages-25"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="isax isax-close-circle5"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="detail-card-bottom-info">
                                <li>
                                    <h6>Appointment Date & Time</h6>
                                    <span>22 Jul 2023 - 12:00 pm</span>
                                </li>
                                <li>
                                    <h6>Clinic Location</h6>
                                    <span>Adrian’s Dentistry</span>
                                </li>
                                <li>
                                    <h6>Location</h6>
                                    <span>Newyork, United States</span>
                                </li>
                                <li>
                                    <h6>Visit Type</h6>
                                    <span>General</span>
                                </li>
                                <li>
                                    <div class="start-btn">
                                        <a href="#" class="btn btn-md btn-primary-gradient rounded-pill">Start Session</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /Appointment Detail Card -->

                        <div class="recent-appointments">
                            <h5 class="head-text">Recent Appointments</h5>
                            <!-- Appointment List -->
                            <div class="appointment-wrap">
                                <ul>
                                    <li>
                                        <div class="patinet-information">
                                            <a href="#">
                                                <img src="{{URL::asset('build/img/doctors/doctor-15.jpg')}}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <p>#Apt0002</p>
                                                <h6><a href="#">Dr.Shanta Nesmith</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="appointment-info">
                                        <p><i class="isax isax-clock5"></i>11 Nov 2024 10.45 AM</p>
                                        <ul class="d-flex apponitment-types">
                                            <li>General Visit</li>
                                            <li>Chat</li>
                                        </ul>

                                    </li>
                                    <li class="mail-info-patient">
                                        <ul>
                                            <li><i class="isax isax-sms5"></i>shanta@example.com</li>
                                            <li><i class="isax isax-call5"></i> +1 504 368 6874</li>
                                        </ul>
                                    </li>
                                    <li class="appointment-action">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="isax isax-eye4"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Appointment List -->
                            <!-- Appointment List -->
                            <div class="appointment-wrap">
                                <ul>
                                    <li>
                                        <div class="patinet-information">
                                            <a href="#">
                                                <img src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <p>#Apt0003</p>
                                                <h6><a href="#">Dr.John Ewel</a></h6>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="appointment-info">
                                        <p><i class="isax isax-clock5"></i>27 Oct 2024 09.30 AM</p>
                                        <ul class="d-flex apponitment-types">
                                            <li>General Visit</li>
                                            <li>Video Call</li>
                                        </ul>

                                    </li>
                                    <li class="mail-info-patient">
                                        <ul>
                                            <li><i class="isax isax-sms5"></i>john@example.com</li>
                                            <li><i class="isax isax-call5"></i> +1 749 104 6291</li>
                                        </ul>
                                    </li>
                                    <li class="appointment-action">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="isax isax-eye4"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Appointment List -->
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection