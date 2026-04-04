<?php $page = 'medical-records'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Medical Records', 'li_2' => 'Medical Records'])
    @endcomponent

    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container">

            <div class="row">

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
                                    <li class="active">
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

                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header flex-wrap">
                        <h3>Records</h3>
                        <div class="appointment-tabs">
                            <ul class="nav">
                                <li>
                                    <a href="#" class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#medical">Medical Records</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#prescription">Prescriptions</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content pt-0">

                        <!-- Prescription Tab -->
                        <div class="tab-pane fade" id="prescription">
                            <div class="dashboard-header border-0 m-0">
                                <ul class="header-list-btns">
                                    <li>
                                        <div class="input-block dash-search-input">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <span class="search-icon"><i class="isax isax-search-normal"></i></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="custom-table">
                                <div class="table-responsive">
                                    <table class="table table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Created Date</th>
                                                <th>Prescriped By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#view_prescription">#P1236</a></td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        class="lab-icon prescription">Prescription</a>
                                                </td>
                                                <td>24 Mar 2024, 10:30 AM</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('doctor-profile')}}">Edalin Hendry</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#view_prescription">#P3656</a></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon prescription">
                                                        Prescription
                                                    </a>
                                                </td>
                                                <td>27 Mar 2024, 11:15 AM</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors/doctor-thumb-05.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('doctor-profile')}}">John Homes</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#view_prescription">#P1246</a></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon prescription">
                                                        Prescription
                                                    </a>
                                                </td>
                                                <td>11 Apr 2024, 09:00 AM</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors/doctor-thumb-03.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('doctor-profile')}}">Shanta Neill</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#view_prescription">#P6985</a></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon prescription">
                                                        Prescription
                                                    </a>
                                                </td>
                                                <td>15 Apr 2024, 02:30 PM</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors/doctor-thumb-08.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('doctor-profile')}}">Anthony Tran</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#view_prescription">#P3659</a></td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon prescription">
                                                        Prescription
                                                    </a>
                                                </td>
                                                <td>23 Apr 2024, 06:40 PM</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors/doctor-thumb-01.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('doctor-profile')}}">Susan Lingo</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
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

                            <!-- Pagination -->
                            <div class="pagination dashboard-pagination">
                                <ul>
                                    <li>
                                        <a href="#" class="page-link prev">Prev</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link active">2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">4</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link next">Next</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Pagination -->

                        </div>
                        <!-- /Prescription Tab -->

                        <!-- Medical Records Tab -->
                        <div class="tab-pane fade show active" id="medical">
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
                                    data-bs-target="#add_medical_records">Add Medical Record</a>
                            </div>

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
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#view_report">#MR1236</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon">Electro cardiography</a>
                                                </td>
                                                <td>24 Mar 2024</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('patient-details')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors-dashboard/profile-06.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('patient-details')}}">Hendrita Clark</a>
                                                    </h2>
                                                </td>
                                                <td>Take Good Rest</td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_report">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#edit_medical_records">
                                                            <i class="isax isax-edit-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#view_report">#MR3656</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon">Complete Blood Count </a>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('patient-details')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors-dashboard/profile-05.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('patient-details')}}">Laura Stewart</a>
                                                    </h2>
                                                </td>
                                                <td>Stable, no change</td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_report">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#edit_medical_records">
                                                            <i class="isax isax-edit-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#view_report">#MR1246</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon">Blood Glucose Test</a>
                                                </td>
                                                <td>10 Apr 2024</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('patient-details')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors-dashboard/profile-02.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('patient-details')}}">Mathew Charles </a>
                                                    </h2>
                                                </td>
                                                <td>All Clear</td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_report">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#edit_medical_records">
                                                            <i class="isax isax-edit-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#view_report">#MR6985</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon">Liver Function Tests</a>
                                                </td>
                                                <td>19 Apr 2024</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('patient-details')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors-dashboard/profile-03.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('patient-details')}}">Christopher Joseph</a>
                                                    </h2>
                                                </td>
                                                <td>Stable, no change</td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_report">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#edit_medical_records">
                                                            <i class="isax isax-edit-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#delete_modal">
                                                            <i class="isax isax-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="link-primary" href="javascript:void(0);"
                                                        data-bs-toggle="modal" data-bs-target="#view_report">#MR3659</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0);" class="lab-icon">Blood Cultures</a>
                                                </td>
                                                <td>27 Apr 2024</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{url('patient-details')}}" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-3"
                                                                src="{{URL::asset('build/img/doctors-dashboard/profile-08.jpg')}}"
                                                                alt="User Image">
                                                        </a>
                                                        <a href="{{url('patient-details')}}">Elisa Salcedo</a>
                                                    </h2>
                                                </td>
                                                <td>Take Good Rest</td>
                                                <td>
                                                    <div class="action-item">
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#view_report">
                                                            <i class="isax isax-link-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);" data-bs-toggle="modal"
                                                            data-bs-target="#edit_medical_records">
                                                            <i class="isax isax-edit-2"></i>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <i class="isax isax-import"></i>
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

                            <!-- Pagination -->
                            <div class="pagination dashboard-pagination">
                                <ul>
                                    <li>
                                        <a href="#" class="page-link prev">Prev</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link active">2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">4</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link next">Next</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Pagination -->

                        </div>
                        <!-- /Medical Records Tab -->


                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection