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
                        <h3>Dashboard</h3>
                        <ul class="header-list-btns">
                            <li>
                                <div class="dropdown header-dropdown">
                                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/doctors-dashboard/profile-06.jpg')}}"
                                            class="avatar dropdown-avatar" alt="Img">
                                        Hendrita
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <img src="{{URL::asset('build/img/doctors-dashboard/profile-06.jpg')}}"
                                                class="avatar dropdown-avatar" alt="Img">
                                            Hendrita
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <img src="{{URL::asset('build/img/doctors-dashboard/profile-08.jpg')}}"
                                                class="avatar dropdown-avatar" alt="Img">
                                            Laura
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <img src="{{URL::asset('build/img/doctors-dashboard/profile-07.jpg')}}"
                                                class="avatar dropdown-avatar" alt="Img">
                                            Mathew
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 d-flex">
                            <div class="dashboard-card w-100">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Health Records</h5>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="health-records icon-orange">
                                                        <span><i class="fa-solid fa-heart"></i>Heart Rate</span>
                                                        <h3>140 Bpm <sup> 2%</sup></h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="health-records icon-amber">
                                                        <span><i class="fa-solid fa-temperature-high"></i>Body
                                                            Temprature</span>
                                                        <h3>37.5 C</h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="health-records icon-dark-blue">
                                                        <span><i class="fa-solid fa-notes-medical"></i>Glucose Level</span>
                                                        <h3>70 - 90<sup> 6%</sup></h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="health-records icon-blue">
                                                        <span><i class="fa-solid fa-highlighter"></i>SPo2</span>
                                                        <h3>96%</h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="health-records icon-red">
                                                        <span><i class="fa-solid fa-syringe"></i>Blood Pressure</span>
                                                        <h3>100 mg/dl<sup> 2%</sup></h3>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="health-records icon-purple">
                                                        <span><i class="fa-solid fa-user-pen"></i>BMI </span>
                                                        <h3>20.1 kg/m2</h3>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="report-gen-date">
                                                        <p>Report generated on last visit : 25 Mar 2024 <span><i
                                                                    class="fa-solid fa-copy"></i></span></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="chart-over-all-report">
                                                <h6>Overall Report</h6>
                                                <div class="circle-bar circle-bar3 report-chart">
                                                    <div class="circle-graph3" data-percent="66">
                                                        <p>Last visit
                                                            25 Mar 2024</p>
                                                    </div>
                                                </div>
                                                <span class="health-percentage">Your health is 95% Normal</span>
                                                <a href="{{url('medical-details')}}"
                                                    class="btn btn-dark w-100 rounded-pill">View Details<i
                                                        class="fa-solid fa-chevron-right ms-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-4 d-flex">
                            <div class="favourites-dashboard w-100">
                                <div class="book-appointment-head">
                                    <h3><span>Book a new</span>Appointment</h3>
                                    <span class="add-icon"><a href="{{url('search')}}"><i
                                                class="fa-solid fa-circle-plus"></i></a></span>
                                </div>
                                <div class="dashboard-card w-100">
                                    <div class="dashboard-card-head">
                                        <div class="header-title">
                                            <h5>Favourites</h5>
                                        </div>
                                        <div class="card-view-link">
                                            <a href="{{url('favourites')}}">View All</a>
                                        </div>
                                    </div>
                                    <div class="dashboard-card-body">
                                        <div class="doctor-fav-list">
                                            <div class="doctor-info-profile">
                                                <a href="#" class="table-avatar">
                                                    <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                                        alt="Img">
                                                </a>
                                                <div class="doctor-name-info">
                                                    <h5><a href="#">Dr. Edalin</a></h5>
                                                    <span>Endodontists</span>
                                                </div>
                                            </div>
                                            <a href="#" class="cal-plus-icon"><i class="isax isax-calendar5"></i></a>
                                        </div>
                                        <div class="doctor-fav-list">
                                            <div class="doctor-info-profile">
                                                <a href="#" class="table-avatar">
                                                    <img src="{{URL::asset('build/img/doctors/doctor-thumb-11.jpg')}}"
                                                        alt="Img">
                                                </a>
                                                <div class="doctor-name-info">
                                                    <h5><a href="#">Dr. Maloney</a></h5>
                                                    <span>Cardiologist</span>
                                                </div>
                                            </div>
                                            <a href="#" class="cal-plus-icon"><i class="isax isax-calendar5"></i></a>
                                        </div>
                                        <div class="doctor-fav-list">
                                            <div class="doctor-info-profile">
                                                <a href="#" class="table-avatar">
                                                    <img src="{{URL::asset('build/img/doctors/doctor-14.jpg')}}" alt="Img">
                                                </a>
                                                <div class="doctor-name-info">
                                                    <h5><a href="#">Dr. Wayne </a></h5>
                                                    <span>Dental Specialist</span>
                                                </div>
                                            </div>
                                            <a href="#" class="cal-plus-icon"><i class="isax isax-calendar5"></i></a>
                                        </div>
                                        <div class="doctor-fav-list">
                                            <div class="doctor-info-profile">
                                                <a href="#" class="table-avatar">
                                                    <img src="{{URL::asset('build/img/doctors/doctor-15.jpg')}}" alt="Img">
                                                </a>
                                                <div class="doctor-name-info">
                                                    <h5><a href="#">Dr. Marla</a></h5>
                                                    <span>Endodontists</span>
                                                </div>
                                            </div>
                                            <a href="#" class="cal-plus-icon"><i class="isax isax-calendar5"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-5 d-flex flex-column">
                            <div class="dashboard-card flex-fill">
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
                            <div class="dashboard-card flex-fill">
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
                                                <tr>
                                                    <td>
                                                        <div class="table-noti-info">
                                                            <div class="table-noti-icon color-violet">
                                                                <i class="fa-solid fa-bell"></i>
                                                            </div>

                                                            <div class="table-noti-message">
                                                                <h6><a href="#">Booking Confirmed on <span> 21 Mar 2024
                                                                        </span> 10:30 AM</a></h6>
                                                                <span class="message-time">Just Now</span>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="table-noti-info">
                                                            <div class="table-noti-icon color-blue">
                                                                <i class="fa-solid fa-star"></i>
                                                            </div>

                                                            <div class="table-noti-message">
                                                                <h6><a href="#">You have a <span> New </span> Review for
                                                                        your Appointment </a></h6>
                                                                <span class="message-time">5 Days ago</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="table-noti-info">
                                                            <div class="table-noti-icon color-red">
                                                                <i class="isax isax-calendar-tick5"></i>
                                                            </div>

                                                            <div class="table-noti-message">
                                                                <h6><a href="#">You have Appointment with <span> Ahmed
                                                                        </span> by 01:20 PM </a></h6>
                                                                <span class="message-time">12:55 PM</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="table-noti-info">
                                                            <div class="table-noti-icon color-yellow">
                                                                <i class="fa-solid fa-money-bill-1-wave"></i>
                                                            </div>

                                                            <div class="table-noti-message">
                                                                <h6><a href="#">Sent an amount of <span> $200 </span> for an
                                                                        Appointment by 01:20 PM </a></h6>
                                                                <span class="message-time">2 Days ago</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="table-noti-info">
                                                            <div class="table-noti-icon color-blue">
                                                                <i class="fa-solid fa-star"></i>
                                                            </div>

                                                            <div class="table-noti-message">
                                                                <h6><a href="#">You have a <span> New </span> Review for
                                                                        your Appointment </a></h6>
                                                                <span class="message-time">5 Days ago</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-xl-7 d-flex flex-column">
                            <div class="dashboard-card flex-fill">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Analytics</h5>
                                    </div>
                                    <div class="dropdown-links d-flex align-items-center flex-wrap">
                                        <div class="dropdown header-dropdown header-dropdown-two">
                                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);">
                                                Mar 14 - Mar 21
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    This Week
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    This Month
                                                </a>
                                                <a href="javascript:void(0);" class="dropdown-item">
                                                    This Year
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="dashboard-card-body pb-1">
                                    <div class="chart-tabs">
                                        <ul class="nav" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" href="#" data-bs-toggle="tab"
                                                    data-bs-target="#heart-rate" aria-selected="false" role="tab"
                                                    tabindex="-1">Heart Rate</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link " href="#" data-bs-toggle="tab"
                                                    data-bs-target="#blood-pressure" aria-selected="true" role="tab">Blood
                                                    Pressure</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content pt-0">

                                        <!-- Chart -->
                                        <div class="tab-pane fade active show" id="heart-rate" role="tabpanel">
                                            <div id="heart-rate-chart"></div>
                                        </div>
                                        <!-- /Chart -->

                                        <!-- Chart -->
                                        <div class="tab-pane fade" id="blood-pressure" role="tabpanel">
                                            <div id="blood-pressure-chart"></div>
                                        </div>
                                        <!-- /Chart -->
                                    </div>
                                </div>
                            </div>
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
                            <div class="dashboard-card flex-fill">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Dependant</h5>
                                    </div>
                                    <div class="card-view-link">
                                        <a href="#" class="add-new" data-bs-toggle="modal"
                                            data-bs-target="#add_dependent"><i class="fa-solid fa-circle-plus me-1"></i>Add
                                            New</a>
                                        <a href="{{url('dependent')}}">View All</a>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="doctor-fav-list">
                                        <div class="doctor-info-profile">
                                            <a href="#" class="table-avatar">
                                                <img src="{{URL::asset('build/img/patients/patient-20.jpg')}}" alt="Img">
                                            </a>
                                            <div class="doctor-name-info">
                                                <h5><a href="#">Laura</a></h5>
                                                <span>Mother - 58 years 20 days</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="cal-plus-icon me-2"><i class="isax isax-calendar5"></i></a>
                                            <a href="{{url('dependent')}}" class="cal-plus-icon"><i
                                                    class="isax isax-eye4"></i></a>
                                        </div>
                                    </div>
                                    <div class="doctor-fav-list">
                                        <div class="doctor-info-profile">
                                            <a href="#" class="table-avatar">
                                                <img src="{{URL::asset('build/img/patients/patient-21.jpg')}}" alt="Img">
                                            </a>
                                            <div class="doctor-name-info">
                                                <h5><a href="#">Mathew</a></h5>
                                                <span>Father - 59 years 15 days</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="cal-plus-icon me-2"><i class="isax isax-calendar5"></i></a>
                                            <a href="{{url('dependent')}}" class="cal-plus-icon"><i
                                                    class="isax isax-eye4"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 d-flex">
                            <div class="dashboard-card w-100">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Reports</h5>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="account-detail-table">
                                        <!-- Tab Menu -->
                                        <nav class="patient-dash-tab border-0 pb-0">
                                            <ul class="nav nav-tabs-bottom">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#appoint-tab"
                                                        data-bs-toggle="tab">Appointments</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#medical-tab" data-bs-toggle="tab">Medical
                                                        Records</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#prsc-tab"
                                                        data-bs-toggle="tab">Prescriptions</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#invoice-tab"
                                                        data-bs-toggle="tab">Invoices</a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- /Tab Menu -->

                                        <!-- Tab Content -->
                                        <div class="tab-content pt-0">

                                            <!-- Appointments Tab -->
                                            <div id="appoint-tab" class="tab-pane fade show active">
                                                <div class="custom-new-table">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Doctor</th>
                                                                    <th>Date</th>
                                                                    <th>Type</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:void(0);"><span
                                                                                class="link-primary">#AP1236</span></a>
                                                                    </td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-24.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Dr. Robert
                                                                                Womack</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>21 Mar 2024, 10:30 AM</td>
                                                                    <td>Video call</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-xs p-2 badge-soft-purple inline-flex align-items-center"><i
                                                                                class="fa-solid fa-circle me-1 fs-5"></i>Upcoming</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:void(0);"><span
                                                                                class="link-primary">#AP3656</span></a>
                                                                    </td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-23.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Dr. Patricia
                                                                                Cassidy</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>28 Mar 2024, 11:40 AM</td>
                                                                    <td>Clinic Visit</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-xs p-2 badge-soft-purple inline-flex align-items-center"><i
                                                                                class="fa-solid fa-circle me-1 fs-5"></i>Completed</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:void(0);"><span
                                                                                class="link-primary">#AP1246</span></a>
                                                                    </td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-22.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Dr. Kevin
                                                                                Evans</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>02 Apr 2024, 09:20 AM</td>
                                                                    <td>Audio Call</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-xs p-2 badge-soft-success inline-flex align-items-center"><i
                                                                                class="fa-solid fa-circle me-1 fs-5"></i>Completed</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:void(0);"><span
                                                                                class="link-primary">#AP6985</span></a>
                                                                    </td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-25.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Dr. Lisa
                                                                                Keating</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>15 Apr 2024, 04:10 PM</td>
                                                                    <td>Clinic Visit</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-xs p-2 badge-soft-danger inline-flex align-items-center"><i
                                                                                class="fa-solid fa-circle me-1 fs-5"></i>Cancelled</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <a href="javascript:void(0);"><span
                                                                                class="link-primary">#AP3659</span></a>
                                                                    </td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-26.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Dr. John
                                                                                Hammer</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>10 May 2024, 06:00 PM</td>
                                                                    <td>Video Call</td>
                                                                    <td>
                                                                        <span
                                                                            class="badge badge-xs p-2 badge-soft-purple inline-flex align-items-center"><i
                                                                                class="fa-solid fa-circle me-1 fs-5"></i>Upcoming</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Appointments Tab -->

                                            <!-- Medical Records Tab -->
                                            <div class="tab-pane fade" id="medical-tab">
                                                <div class="custom-table">
                                                    <div class="table-responsive">
                                                        <table class="table table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Date</th>
                                                                    <th>Record For</th>
                                                                    <th>Comments</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="javascript:void(0);"
                                                                            class="link-primary">#MR1236</a></td>
                                                                    <td>
                                                                        <a href="javascript:void(0);"
                                                                            class="lab-icon">Electro cardiography</a>
                                                                    </td>
                                                                    <td>24 Mar 2024</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('patient-details')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors-dashboard/profile-06.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('patient-details')}}">Hendrita
                                                                                Clark</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>Take Good Rest</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_report">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="javascript:void(0);"
                                                                            class="link-primary">#MR3656</a></td>
                                                                    <td>
                                                                        <a href="javascript:void(0);"
                                                                            class="lab-icon">Complete Blood Count</a>
                                                                    </td>
                                                                    <td>10 Apr 2024</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('patient-details')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/dependent/dependent-01.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('patient-details')}}">Laura
                                                                                Stewart</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>Stable, no change</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_report">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="javascript:void(0);"
                                                                            class="link-primary">#MR1246</a></td>
                                                                    <td>
                                                                        <a href="javascript:void(0);" class="lab-icon">Blood
                                                                            Glucose Test</a>
                                                                    </td>
                                                                    <td>19 Apr 2024</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('patient-details')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/dependent/dependent-02.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('patient-details')}}">Mathew
                                                                                Charles </a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>All Clear</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_report">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="javascript:void(0);"
                                                                            class="link-primary">#MR6985</a></td>
                                                                    <td>
                                                                        <a href="javascript:void(0);" class="lab-icon">Liver
                                                                            Function Tests</a>
                                                                    </td>
                                                                    <td>27 Apr 2024</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('patient-details')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/dependent/dependent-03.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('patient-details')}}">Christopher
                                                                                Joseph</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>Stable, no change</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_report">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" class="link-primary">#MR3659</a></td>
                                                                    <td>
                                                                        <a href="javascript:void(0);" class="lab-icon">Blood
                                                                            Cultures</a>
                                                                    </td>
                                                                    <td>10 May 2024</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('patient-details')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/dependent/dependent-04.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('patient-details')}}">Elisa
                                                                                Salcedo</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>Take Good Rest</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_report">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Medical Records Tab -->

                                            <!-- Prescriptions Tab -->
                                            <div class="tab-pane fade" id="prsc-tab">
                                                <div class="custom-table">
                                                    <div class="table-responsive">
                                                        <table class="table table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Date</th>
                                                                    <th>Prescriped By</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="link-primary"><a href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#view_prescription">#P1236</a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0);"
                                                                            class="lab-icon prescription">Prescription</a>
                                                                    </td>
                                                                    <td>21 Mar 2024, 10:30 AM</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Edalin
                                                                                Hendry</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_prescription">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link-primary"><a href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#view_prescription">#P3656</a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0);"
                                                                            class="lab-icon prescription">Prescription</a>
                                                                    </td>
                                                                    <td>28 Mar 2024, 11:40 AM</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-05.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">John
                                                                                Homes</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_prescription">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link-primary"><a href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#view_prescription">#P1246</a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0);"
                                                                            class="lab-icon prescription">Prescription</a>
                                                                    </td>
                                                                    <td>11 Apr 2024, 09:00 AM</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-03.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Shanta
                                                                                Neill</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_prescription">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link-primary"><a href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#view_prescription">#P6985</a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0);"
                                                                            class="lab-icon prescription">Prescription</a>
                                                                    </td>
                                                                    <td>15 Apr 2024, 02:30 PM</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-08.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Anthony
                                                                                Tran</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_prescription">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="link-primary"><a href="#"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#view_prescription">#P3659</a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="javascript:void(0);"
                                                                            class="lab-icon prescription">Prescription</a>
                                                                    </td>
                                                                    <td>23 Apr 2024, 06:40 PM</td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-01.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Susan
                                                                                Lingo</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#view_prescription">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);">
                                                                                <i class="isax isax-import"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Prescriptions Tab -->

                                            <!--Invoices Tab -->
                                            <div class="tab-pane fade" id="invoice-tab">
                                                <div class="custom-table">
                                                    <div class="table-responsive">
                                                        <table class="table table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Doctor</th>
                                                                    <th>Appointment Date</th>
                                                                    <th>Booked on</th>
                                                                    <th>Amount</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#invoice_view"
                                                                            class="link-primary">#INV1236</a></td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-21.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Edalin
                                                                                Hendry</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>24 Mar 2024</td>
                                                                    <td>21 Mar 2024</td>
                                                                    <td>$300</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#invoice_view">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#invoice_view"
                                                                            class="link-primary">#NV3656</a></td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-13.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">John
                                                                                Homes</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>17 Mar 2024</td>
                                                                    <td>14 Mar 2024</td>
                                                                    <td>$450</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#invoice_view">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#invoice_view"
                                                                            class="link-primary">#INV1246</a></td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-03.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Shanta
                                                                                Neill</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>11 Mar 2024</td>
                                                                    <td>07 Mar 2024</td>
                                                                    <td>$250</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#invoice_view">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#invoice_view"
                                                                            class="link-primary">#INV6985</a></td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-08.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Anthony
                                                                                Tran</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>26 Feb 2024</td>
                                                                    <td>23 Feb 2024</td>
                                                                    <td>$320</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#invoice_view">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#invoice_view"
                                                                            class="link-primary">#INV3659</a></td>
                                                                    <td>
                                                                        <h2 class="table-avatar">
                                                                            <a href="{{url('doctor-profile')}}"
                                                                                class="avatar avatar-sm me-2">
                                                                                <img class="avatar-img rounded-3"
                                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-01.jpg')}}"
                                                                                    alt="User Image">
                                                                            </a>
                                                                            <a href="{{url('doctor-profile')}}">Susan
                                                                                Lingo</a>
                                                                        </h2>
                                                                    </td>
                                                                    <td>18 Feb 2024</td>
                                                                    <td>15 Feb 2024</td>
                                                                    <td>$480</td>
                                                                    <td>
                                                                        <div class="action-item">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#invoice_view">
                                                                                <i class="isax isax-link-2"></i>
                                                                            </a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#delete_modal">
                                                                                <i class="isax isax-trash"></i>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Invoices Tab -->

                                        </div>
                                        <!-- Tab Content -->
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