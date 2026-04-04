<?php $page = 'medical-details'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Vitals', 'li_2' => 'Vitals'])
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
                                    <li class="active">
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
                        <h3>Vitals</h3>
                    </div>
                    <div class="dashboard-card w-100 medical-details-item">
                        <div class="dashboard-card-head medical-detail-head">
                            <div class="header-title">
                                <h6>Latest Updated Vitals</h6>
                            </div>
                            <div class="latest-update">
                                <p><i class="isax isax-calendar-tick5 me-2"></i>Last update on : 24Mar 2023</p>
                            </div>

                        </div>
                        <div class="dashboard-card-body">
                            <div class="row row-gap-3">
                                <div class="col-xl-2 col-lg-4 col-md-6">
                                    <div class="health-records icon-red mb-0">
                                        <span><i class="fa-solid fa-syringe"></i>Blood Pressure</span>
                                        <h3>100 mg/dl</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6">
                                    <div class="health-records icon-orange mb-0">
                                        <span><i class="fa-solid fa-heart"></i>Heart Rate</span>
                                        <h3>140 Bpm</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6">
                                    <div class="health-records icon-dark-blue mb-0">
                                        <span><i class="fa-solid fa-notes-medical"></i>Glucose Level</span>
                                        <h3>70 - 90</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6">
                                    <div class="health-records icon-amber mb-0">
                                        <span><i class="fa-solid fa-temperature-high"></i>Body Temprature</span>
                                        <h3>37.5 C</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6">
                                    <div class="health-records icon-purple mb-0">
                                        <span><i class="fa-solid fa-user-pen"></i>BMI </span>
                                        <h3>20.1 kg/m2</h3>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-4 col-md-6">
                                    <div class="health-records icon-blue mb-0">
                                        <span><i class="fa-solid fa-highlighter"></i>SPo2</span>
                                        <h3>96%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="dashboard-header border-0 m-0">
                        <ul class="header-list-btns">
                            <li>
                                <div class="input-block dash-search-input">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="search-icon"><i class="isax isax-search-normal"></i></span>
                                </div>
                            </li>
                        </ul>
                        <a href="#add-med-record" class="btn btn-md btn-primary-gradient rounded-pill"
                            data-bs-toggle="modal">Add Vitals</a>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="custom-table">
                                <div class="table-responsive">
                                    <table class="table table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Patient Name</th>
                                                <th>BMI</th>
                                                <th>Heart Rate</th>
                                                <th>FBC Status</th>
                                                <th>Weight</th>
                                                <th>Added on</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#med-detail">#MD1236</a></td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('patient-profile')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors-dashboard/profile-06.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('doctor-profile')}}">Hendrita Kearns</a>
                                                    </h2>
                                                </td>
                                                <td>23.5</td>
                                                <td>89</td>
                                                <td>140</td>
                                                <td>74Kg</td>
                                                <td>22 Mar 2024</td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#med-detail">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#edit-med-record">
                                                            <i class="isax isax-edit-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
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
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection