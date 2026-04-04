<?php $page = 'patient-profile'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Patient Profile', 'li_2' => 'Patient Profile'])
    @endcomponent

    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar doctor-sidebar profile-sidebar-new">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="{{url('doctor-profile')}}" class="booking-doc-img">
                                    <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                        alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="{{url('doctor-profile')}}">Dr Edalin Hendry</a></h3>
                                    <div class="patient-details">
                                        <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                                    </div>
                                    <span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>Dentist</span>
                                </div>
                            </div>
                        </div>
                        <div class="doctor-available-head">
                            <div class="input-block input-block-new">
                                <label class="form-label">Availability <span class="text-danger">*</span></label>
                                <select class="select form-control">
                                    <option>I am Available Now</option>
                                    <option>Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="{{url('doctor-dashboard')}}">
                                            <i class="isax isax-category-2"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-request')}}">
                                            <i class="isax isax-clipboard-tick"></i>
                                            <span>Requests</span>
                                            <small class="unread-msg">2</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('appointments')}}">
                                            <i class="isax isax-calendar-1"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('available-timings')}}">
                                            <i class="isax isax-calendar-tick"></i>
                                            <span>Available Timings</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{url('my-patients')}}">
                                            <i class="fa-solid fa-user-injured"></i>
                                            <span>My Patients</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-specialities')}}">
                                            <i class="isax isax-clock"></i>
                                            <span>Specialties & Services</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('reviews')}}">
                                            <i class="isax isax-star-1"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('accounts')}}">
                                            <i class="isax isax-profile-tick"></i>
                                            <span>Accounts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('invoices')}}">
                                            <i class="isax isax-document-text"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-payment')}}">
                                            <i class="fa-solid fa-money-bill-1"></i>
                                            <span>Payout Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('chat-doctor')}}">
                                            <i class="isax isax-messages-1"></i>
                                            <span>Message</span>
                                            <small class="unread-msg">7</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-blog')}}">
                                            <i class="isax isax-grid-5"></i>
                                            <span>Blog</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-profile-settings')}}">
                                            <i class="isax isax-setting-2"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('social-media')}}">
                                            <i class="fa-solid fa-shield-halved"></i>
                                            <span>Social Media</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-change-password')}}">
                                            <i class="isax isax-key"></i>
                                            <span>Change Password</span>
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

                <!-- Patient Details -->
                <div class="col-lg-8 col-xl-9">
                    <div class="appointment-patient">

                        <div class="dashboard-header">
                            <h3><a href="{{url('my-patients')}}"><i class="fa-solid fa-arrow-left"></i> Patient Details</a>
                            </h3>
                        </div>

                        <div class="patient-wrap">
                            <div class="patient-info">
                                <img src="{{URL::asset('build/img/doctors-dashboard/profile-01.jpg')}}" alt="img">
                                <div class="user-patient">
                                    <h6>#P0016</h6>
                                    <h5>Adrian Marshall</h5>
                                    <ul>
                                        <li>Age : 42</li>
                                        <li>Male</li>
                                        <li>AB+ve</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="patient-book">
                                <p><i class="isax isax-calendar-1"></i>Last Booking</p>
                                <p>24 Mar 2024</p>
                            </div>
                        </div>

                        <!-- Appoitment Tabs -->
                        <div class="appointment-tabs user-tab">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#pat_appointments"
                                        data-bs-toggle="tab">Appointments</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#prescription" data-bs-toggle="tab">Prescription</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#medical" data-bs-toggle="tab">Medical Records</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#billing" data-bs-toggle="tab">Billing</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /Appoitment Tabs -->

                        <div class="tab-content pt-0">

                            <!-- Appointment Tab -->
                            <div id="pat_appointments" class="tab-pane fade show active">

                                <div class="search-header">
                                    <div class="search-field">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                </div>

                                <div class="custom-table">
                                    <div class="table-responsive">
                                        <table class="table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Doctor</th>
                                                    <th>Appt Date</th>
                                                    <th>Booking Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a class="text-blue-600"
                                                            href="{{url('patient-upcoming-appointment')}}">#Apt123</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Edalin Hendry</a>
                                                        </h2>
                                                    </td>
                                                    <td>24 Mar 2024</td>
                                                    <td>21 Mar 2024</td>
                                                    <td>$300</td>
                                                    <td><span class="badge badge-yellow status-badge">Upcoming</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="{{url('patient-upcoming-appointment')}}">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a class="text-blue-600"
                                                            href="{{url('patient-upcoming-appointment')}}">#Apt124</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-05.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">John Homes</a>
                                                        </h2>
                                                    </td>
                                                    <td>17 Mar 2024</td>
                                                    <td>14 Mar 2024</td>
                                                    <td>$450</td>
                                                    <td><span class="badge badge-yellow status-badge">Upcoming</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="{{url('patient-upcoming-appointment')}}">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a class="text-blue-600"
                                                            href="{{url('patient-upcoming-appointment')}}">#Apt125</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-03.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Shanta Neill</a>
                                                        </h2>
                                                    </td>
                                                    <td>11 Mar 2024</td>
                                                    <td>07 Mar 2024</td>
                                                    <td>$250</td>
                                                    <td><span class="badge badge-yellow status-badge">Upcoming</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="{{url('patient-upcoming-appointment')}}">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a class="text-blue-600"
                                                            href="{{url('patient-upcoming-appointment')}}">#Apt126</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-08.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Anthony Tran</a>
                                                        </h2>
                                                    </td>
                                                    <td>26 Feb 2024</td>
                                                    <td>23 Feb 2024</td>
                                                    <td>$320</td>
                                                    <td><span class="badge badge-yellow status-badge">Upcoming</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="{{url('patient-upcoming-appointment')}}">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a class="text-blue-600"
                                                            href="{{url('patient-upcoming-appointment')}}">#Apt127</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-01.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Susan Lingo</a>
                                                        </h2>
                                                    </td>
                                                    <td>18 Feb 2024</td>
                                                    <td>15 Feb 2024</td>
                                                    <td>$480</td>
                                                    <td><span class="badge badge-yellow status-badge">Upcoming</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="{{url('doctor-appointment-start')}}">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a class="text-blue-600"
                                                            href="{{url('patient-cancelled-appointment')}}">#Apt128</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-09.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Joseph Boyd</a>
                                                        </h2>
                                                    </td>
                                                    <td>10 Feb 2024</td>
                                                    <td>07 Feb 2024</td>
                                                    <td>$260</td>
                                                    <td><span class="badge badge-danger status-badge">Cancelled</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="{{url('patient-cancelled-appointment')}}">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a class="text-blue-600"
                                                            href="{{url('patient-completed-appointment')}}">#Apt129</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-07.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Juliet Gabriel</a>
                                                        </h2>
                                                    </td>
                                                    <td>28 Jan 2024</td>
                                                    <td>25 Jan 2024</td>
                                                    <td>$350</td>
                                                    <td><span class="badge badge-green status-badge">Completed</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="{{url('patient-completed-appointment')}}">
                                                                <i class="isax isax-link-2"></i>
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
                                            <a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
                                            <a href="#" class="page-link">...</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Pagination -->

                            </div>
                            <!-- /Appointment Tab -->

                            <!-- Prescription Tab -->
                            <div class="tab-pane fade" id="prescription">
                                <div class="search-header">
                                    <div class="search-field">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-primary prime-btn" data-bs-toggle="modal"
                                            data-bs-target="#add_prescription">Add New Prescription</a>
                                    </div>
                                </div>

                                <div class="custom-table">
                                    <div class="table-responsive">
                                        <table class="table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Prescriped By</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="javascript:void(0);" class="text-blue-600"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#Apt123</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Edalin Hendry</a>
                                                        </h2>
                                                    </td>
                                                    <td>Visit</td>
                                                    <td>25 Jan 2024</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0);" class="text-blue-600"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#Apt124</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-05.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">John Homes</a>
                                                        </h2>
                                                    </td>
                                                    <td>Visit</td>
                                                    <td>28 Jan 2024</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td><a href="javascript:void(0);" class="text-blue-600"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#Apt125</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-03.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Shanta Neill</a>
                                                        </h2>
                                                    </td>
                                                    <td>Visit</td>
                                                    <td>11 Feb 2024</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td><a href="javascript:void(0);" class="text-blue-600"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#Apt126</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-08.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Anthony Tran</a>
                                                        </h2>
                                                    </td>
                                                    <td>Visit</td>
                                                    <td>19 Feb 2024</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><a href="javascript:void(0);" class="text-blue-600"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view_prescription">#Apt127</a></td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            <a href="{{url('doctor-profile')}}"
                                                                class="avatar avatar-sm me-2">
                                                                <img class="avatar-img rounded-3"
                                                                    src="{{URL::asset('build/img/doctors/doctor-thumb-01.jpg')}}"
                                                                    alt="User Image">
                                                            </a>
                                                            <a href="{{url('doctor-profile')}}">Susan Lingo</a>
                                                        </h2>
                                                    </td>
                                                    <td>Visit</td>
                                                    <td>27 Feb 2024</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_prescription">
                                                                <i class="isax isax-link-2"></i>
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
                                            <a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
                                            <a href="#" class="page-link">...</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Pagination -->

                            </div>
                            <!-- /Prescription Tab -->

                            <!-- Medical Records Tab -->
                            <div class="tab-pane fade" id="medical">
                                <div class="search-header">
                                    <div class="search-field">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                    <div>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#add_medical_records"
                                            class="btn btn-primary prime-btn">Add Medical Record</a>
                                    </div>
                                </div>

                                <div class="custom-table">
                                    <div class="table-responsive">
                                        <table class="table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon">
                                                            <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                        </a>
                                                    </td>
                                                    <td>24 Mar 2024</td>
                                                    <td>Glucose Test V12</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
                                                                <i class="isax isax-edit-2"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-import"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon">
                                                            <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                        </a>
                                                    </td>
                                                    <td>27 Mar 2024</td>
                                                    <td>Complete Blood Count(CBC)</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
                                                                <i class="isax isax-edit-2"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-import"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon">
                                                            <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                        </a>
                                                    </td>
                                                    <td>10 Apr 2024</td>
                                                    <td>Echocardiogram</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
                                                                <i class="isax isax-edit-2"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-import"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon">
                                                            <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                        </a>
                                                    </td>
                                                    <td>19 Apr 2024</td>
                                                    <td>COVID-19 Test</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
                                                                <i class="isax isax-edit-2"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-import"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon">
                                                            <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                        </a>
                                                    </td>
                                                    <td>27 Apr 2024</td>
                                                    <td>Allergy Tests</td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
                                                                <i class="isax isax-edit-2"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-import"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="lab-icon">
                                                            <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                        </a>
                                                    </td>
                                                    <td>02 May 2024</td>
                                                    <td>Lipid Panel </td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#edit_medical_records">
                                                                <i class="isax isax-edit-2"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
                                                                <i class="isax isax-import"></i>
                                                            </a>
                                                            <a href="javascript:void(0);">
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
                                            <a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
                                            <a href="#" class="page-link">...</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Pagination -->

                            </div>
                            <!-- /Medical Records Tab -->

                            <!-- Billing Tab -->
                            <div class="tab-pane" id="billing">
                                <div class="search-header">
                                    <div class="search-field">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-primary prime-btn" data-bs-toggle="modal"
                                            data-bs-target="#add_billing">Add New Billing</a>
                                    </div>
                                </div>

                                <div class="custom-table">
                                    <div class="table-responsive">
                                        <table class="table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Billing Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>24 Mar 2024</td>
                                                    <td>$300</td>
                                                    <td><span class="badge badge-green status-badge">Paid</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_bill">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>28 Mar 2024</td>
                                                    <td>$350</td>
                                                    <td><span class="badge badge-green status-badge">Paid</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_bill">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>10 Apr 2024</td>
                                                    <td>$400</td>
                                                    <td><span class="badge badge-green status-badge">Paid</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_bill">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>19 Apr 2024</td>
                                                    <td>$250</td>
                                                    <td><span class="badge badge-green status-badge">Paid</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_bill">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>22 Apr 2024</td>
                                                    <td>$320</td>
                                                    <td><span class="badge badge-green status-badge">Paid</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_bill">
                                                                <i class="isax isax-link-2"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>02 May 2024</td>
                                                    <td>$480</td>
                                                    <td><span class="badge badge-danger status-badge">Unpaid</span></td>
                                                    <td>
                                                        <div class="action-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="modal"
                                                                data-bs-target="#view_bill">
                                                                <i class="isax isax-link-2"></i>
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
                                            <a href="#" class="page-link"><i class="fa-solid fa-chevron-left"></i></a>
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
                                            <a href="#" class="page-link">...</a>
                                        </li>
                                        <li>
                                            <a href="#" class="page-link"><i class="fa-solid fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /Pagination -->
                            </div>
                            <!-- Billing Tab -->

                        </div>
                    </div>
                </div>
                <!-- /Patient Details -->

            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection