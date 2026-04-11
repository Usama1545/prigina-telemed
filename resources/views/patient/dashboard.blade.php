<?php $page = 'patient-dashboard'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Dashboard', 'li_2' => 'Patient Dashboard'])
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
                                    <h3><a href="{{url('profile-settings')}}">{{ $patient['name'] }}</a></h3>
                                    <span>{{ $patient['gender'] }} <i class="fa-solid fa-circle"></i> {{ $patient['email'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li class="active">
                                        <a href="{{url('patient-dashboard')}}">
                                            <i class="isax isax-category-2"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('patient-appointments')}}">
                                            <i class="isax isax-calendar-1"></i>
                                            <span>My Appointments</span>
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
                        <h3>Dashboard</h3>   
                        <div class="favourites-dashboard w-100">
                            <div class="book-appointment-head">
                                <h3><span>Book a new</span>Appointment</h3>
                                <span class="add-icon"><a href="{{url('search')}}"><i
                                            class="fa-solid fa-circle-plus"></i></a></span>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 d-flex">
                            <div class="dashboard-card w-100">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Appointment</h5>
                                    </div>
                                    <div class="card-view-link">
                                        <div class="owl-nav slide-nav text-end nav-control"></div>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="apponiment-dates">
                                        <ul class="appointment-calender-slider owl-carousel">
                                            <li>
                                                <a href="#">
                                                    <h5>19 <span>Mon</span></h5>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <h5>20 <span>Mon</span></h5>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="available-date">
                                                    <h5>21 <span>Tue</span></h5>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="available-date">
                                                    <h5>22 <span>Wed</span></h5>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <h5>23 <span>Thu</span></h5>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <h5>24 <span>Fri</span></h5>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <h5>25 <span>Sat</span></h5>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="appointment-dash-card">
                                            <div class="doctor-fav-list">
                                                <div class="doctor-info-profile">
                                                    <a href="#" class="table-avatar">
                                                        <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                                            alt="Img">
                                                    </a>
                                                    <div class="doctor-name-info">
                                                        <h5><a href="#">Dr.Edalin Hendry</a></h5>
                                                        <span class="fs-12 fw-medium">Dentist</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="cal-plus-icon"><i class="isax isax-hospital5"></i></a>
                                            </div>
                                            <div class="date-time">
                                                <p><i class="isax isax-clock5"></i>21 Mar 2024 - 10:30 PM </p>
                                            </div>
                                            <div class="card-btns gap-3">
                                                <a href="{{url('chat')}}" class="btn btn-md btn-light rounded-pill"><i
                                                        class="isax isax-messages-25"></i>Chat Now</a>
                                                <a href="{{url('patient-appointments')}}"
                                                    class="btn  btn-md btn-primary-gradient rounded-pill"><i
                                                        class="isax isax-calendar-tick5"></i>Attend</a>
                                            </div>
                                        </div>
                                        <div class="appointment-dash-card">
                                            <div class="doctor-fav-list">
                                                <div class="doctor-info-profile">
                                                    <a href="#" class="table-avatar">
                                                        <img src="{{URL::asset('build/img/doctors/doctor-17.jpg')}}"
                                                            alt="Img">
                                                    </a>
                                                    <div class="doctor-name-info">
                                                        <h5><a href="#">Dr.Juliet Gabriel</a></h5>
                                                        <span class="fs-12 fw-medium">Cardiologist</span>
                                                    </div>
                                                </div>
                                                <a href="#" class="cal-plus-icon"><i class="isax isax-video5"></i></a>
                                            </div>
                                            <div class="date-time">
                                                <p><i class="isax isax-clock5"></i>22 Mar 2024 - 10:30 PM </p>
                                            </div>
                                            <div class="card-btns gap-3">
                                                <a href="{{url('chat')}}" class="btn btn-md btn-light rounded-pill"><i
                                                        class="isax isax-messages-25"></i>Chat Now</a>
                                                <a href="{{url('patient-appointments')}}"
                                                    class="btn  btn-md btn-primary-gradient rounded-pill"><i
                                                        class="isax isax-calendar-tick5"></i>Attend</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                      
                        <div class="col-xl-6 d-flex flex-column">
                            
                            <div class="dashboard-card flex-fill">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Past Appointments</h5>
                                    </div>
                                    <div class="card-view-link">
                                        <div class="owl-nav slide-nav2 text-end nav-control"></div>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="past-appointments-slider owl-carousel">
                                        <div class="appointment-dash-card past-appointment mt-0">
                                            <div class="doctor-fav-list">
                                                <div class="doctor-info-profile">
                                                    <a href="#" class="table-avatar">
                                                        <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                                            alt="Img">
                                                    </a>
                                                    <div class="doctor-name-info">
                                                        <h5><a href="#">Dr.Edalin Hendry</a></h5>
                                                        <span>Dental Specialist</span>
                                                    </div>
                                                </div>
                                                <span class="bg-orange badge"><i class="isax isax-video5 me-1"></i>30
                                                    Min</span>
                                            </div>
                                            <div class="appointment-date-info">
                                                <h6>Thursday, Mar 2024</h6>
                                                <ul>
                                                    <li>
                                                        <span><i class="isax isax-clock5"></i></span>Time : 04:00 PM - 04:30
                                                        PM (30 Min)
                                                    </li>
                                                    <li>
                                                        <span><i class="isax isax-location5"></i></span>Newyork, United
                                                        States
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-btns">
                                                <a href="{{url('patient-appointments')}}"
                                                    class="btn btn-md btn-outline-primary ms-0 me-3 rounded-pill">Reschedule</a>
                                                <a href="{{url('patient-appointment-details')}}"
                                                    class="btn btn-md btn-primary-gradient rounded-pill">View Details</a>
                                            </div>
                                        </div>
                                        <div class="appointment-dash-card past-appointment mt-0">
                                            <div class="doctor-fav-list">
                                                <div class="doctor-info-profile">
                                                    <a href="#" class="table-avatar">
                                                        <img src="{{URL::asset('build/img/doctors/doctor-17.jpg')}}"
                                                            alt="Img">
                                                    </a>
                                                    <div class="doctor-name-info">
                                                        <h5><a href="#">Dr.Juliet Gabriel</a></h5>
                                                        <span>Cardiologist</span>
                                                    </div>
                                                </div>
                                                <span class="bg-orange badge"><i class="isax isax-video5 me-1"></i>30
                                                    Min</span>
                                            </div>
                                            <div class="appointment-date-info">
                                                <h6>Friday, Mar 2024</h6>
                                                <ul>
                                                    <li>
                                                        <span><i class="isax isax-clock5"></i></span>Time : 03:00 PM - 03:30
                                                        PM (30 Min)
                                                    </li>
                                                    <li>
                                                        <span><i class="isax isax-location5"></i></span>Newyork, United
                                                        States
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-btns">
                                                <a href="{{url('patient-appointments')}}"
                                                    class="btn btn-md btn-outline-primary ms-0 me-3 rounded-pill">Reschedule</a>
                                                <a href="{{url('medical-details')}}"
                                                    class="btn btn-md btn-primary-gradient rounded-pill">View Details</a>
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