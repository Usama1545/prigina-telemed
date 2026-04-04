<?php $page = 'dependent'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Dependents', 'li_2' => 'Dependents'])
    @endcomponent

    <!-- Page Content -->
    <div class="content doctor-content">
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
                                    <li class="active">
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
                        <h3>Dependants</h3>
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
                        <a href="#" class="btn btn-md btn-primary-gradient rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#add_dependent">Add Dependants</a>
                    </div>

                    <!-- Depeendent Item -->
                    <div class="dependent-wrap">
                        <div class="dependent-info">
                            <div class="patinet-information">
                                <a href="{{url('patient-profile')}}">
                                    <img src="{{URL::asset('build/img/dependent/dependent-01.jpg')}}" alt="User Image">
                                </a>
                                <div class="patient-info">
                                    <h5>Laura</h5>
                                    <ul>
                                        <li>Mother</li>
                                        <li>Female</li>
                                        <li>58 years 20 days</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blood-info">
                                <p>Blood Group</p>
                                <h6>AB+ve</h6>
                            </div>
                        </div>
                        <div class="dependent-status">
                            <div class="status-toggle">
                                <input type="checkbox" id="status_1" class="check" checked>
                                <label for="status_1" class="checktoggle">checkbox</label>
                            </div>
                            <a href="javascript:void(0);" class="edit-icon me-2" data-bs-toggle="modal"
                                data-bs-target="#edit_dependent"><i class="isax isax-edit-2"></i></a>
                            <a href="javascript:void(0);" class="edit-icon" data-bs-toggle="modal"
                                data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                        </div>
                    </div>
                    <!-- /Depeendent Item -->

                    <!-- Depeendent Item -->
                    <div class="dependent-wrap">
                        <div class="dependent-info">
                            <div class="patinet-information">
                                <a href="{{url('patient-profile')}}">
                                    <img src="{{URL::asset('build/img/dependent/dependent-02.jpg')}}" alt="User Image">
                                </a>
                                <div class="patient-info">
                                    <h5>Mathew</h5>
                                    <ul>
                                        <li>Father</li>
                                        <li>Male</li>
                                        <li>59 years 15 days</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blood-info">
                                <p>Blood Group</p>
                                <h6>AB+ve</h6>
                            </div>
                        </div>
                        <div class="dependent-status">
                            <div class="status-toggle">
                                <input type="checkbox" id="status_2" class="check" checked>
                                <label for="status_2" class="checktoggle">checkbox</label>
                            </div>
                            <a href="javascript:void(0);" class="edit-icon me-2" data-bs-toggle="modal"
                                data-bs-target="#edit_dependent"><i class="isax isax-edit-2"></i></a>
                            <a href="javascript:void(0);" class="edit-icon" data-bs-toggle="modal"
                                data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                        </div>
                    </div>
                    <!-- /Depeendent Item -->

                    <!-- Depeendent Item -->
                    <div class="dependent-wrap">
                        <div class="dependent-info">
                            <div class="patinet-information">
                                <a href="{{url('patient-profile')}}">
                                    <img src="{{URL::asset('build/img/dependent/dependent-03.jpg')}}" alt="User Image">
                                </a>
                                <div class="patient-info">
                                    <h5>Christopher</h5>
                                    <ul>
                                        <li>Brother</li>
                                        <li>Male</li>
                                        <li>32 years 6 Months</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blood-info">
                                <p>Blood Group</p>
                                <h6>A+ve</h6>
                            </div>
                        </div>
                        <div class="dependent-status">
                            <div class="status-toggle">
                                <input type="checkbox" id="status_3" class="check" checked>
                                <label for="status_3" class="checktoggle">checkbox</label>
                            </div>
                            <a href="javascript:void(0);" class="edit-icon me-2" data-bs-toggle="modal"
                                data-bs-target="#edit_dependent"><i class="isax isax-edit-2"></i></a>
                            <a href="javascript:void(0);" class="edit-icon" data-bs-toggle="modal"
                                data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                        </div>
                    </div>
                    <!-- /Depeendent Item -->

                    <!-- Depeendent Item -->
                    <div class="dependent-wrap">
                        <div class="dependent-info">
                            <div class="patinet-information">
                                <a href="{{url('patient-profile')}}">
                                    <img src="{{URL::asset('build/img/dependent/dependent-04.jpg')}}" alt="User Image">
                                </a>
                                <div class="patient-info">
                                    <h5>Elisa</h5>
                                    <ul>
                                        <li>Sister</li>
                                        <li>Female</li>
                                        <li>28 years 4 Months</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blood-info">
                                <p>Blood Group</p>
                                <h6>B+ve</h6>
                            </div>
                        </div>
                        <div class="dependent-status">
                            <div class="status-toggle checked">
                                <input type="checkbox" id="status_4" class="check">
                                <label for="status_4" class="checktoggle">checkbox</label>
                            </div>
                            <a href="javascript:void(0);" class="edit-icon me-2" data-bs-toggle="modal"
                                data-bs-target="#edit_dependent"><i class="isax isax-edit-2"></i></a>
                            <a href="javascript:void(0);" class="edit-icon" data-bs-toggle="modal"
                                data-bs-target="#delete_modal"><i class="isax isax-trash"></i></a>
                        </div>
                    </div>
                    <!-- /Depeendent Item -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection