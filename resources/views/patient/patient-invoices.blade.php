<?php $page = 'patient-invoices'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Invoices', 'li_2' => 'Invoices'])
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
                                    <li class="active">
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

                <!-- Invoices -->
                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header">
                        <h3>Invoices</h3>
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
                                        <th>Doctor</th>
                                        <th>Appointment Date</th>
                                        <th>Booked on</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="link-primary" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#INV1236</a></td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-3"
                                                        src="{{URL::asset('build/img/doctors/doctor-thumb-21.jpg')}}"
                                                        alt="User Image">
                                                </a>
                                                <a href="{{url('doctor-profile')}}">Edalin Hendry</a>
                                            </h2>
                                        </td>
                                        <td>24 Mar 2024</td>
                                        <td>21 Mar 2024</td>
                                        <td>$300</td>
                                        <td>
                                            <div class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#invoice_view">
                                                    <i class="isax isax-link-2"></i>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <i class="isax isax-import"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="link-primary" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#NV3656</a></td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-3"
                                                        src="{{URL::asset('build/img/doctors/doctor-thumb-13.jpg')}}"
                                                        alt="User Image">
                                                </a>
                                                <a href="{{url('doctor-profile')}}">John Homes</a>
                                            </h2>
                                        </td>
                                        <td>17 Mar 2024</td>
                                        <td>14 Mar 2024</td>
                                        <td>$450</td>
                                        <td>
                                            <div class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#invoice_view">
                                                    <i class="isax isax-link-2"></i>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <i class="isax isax-import"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="link-primary" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#INV1246</a></td>
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
                                        <td>11 Mar 2024</td>
                                        <td>07 Mar 2024</td>
                                        <td>$250</td>
                                        <td>
                                            <div class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#invoice_view">
                                                    <i class="isax isax-link-2"></i>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <i class="isax isax-import"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="link-primary" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#INV6985</a></td>
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
                                        <td>26 Feb 2024</td>
                                        <td>23 Feb 2024</td>
                                        <td>$320</td>
                                        <td>
                                            <div class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#invoice_view">
                                                    <i class="isax isax-link-2"></i>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <i class="isax isax-import"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="link-primary" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#INV3659</a></td>
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
                                        <td>18 Feb 2024</td>
                                        <td>15 Feb 2024</td>
                                        <td>$480</td>
                                        <td>
                                            <div class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#invoice_view">
                                                    <i class="isax isax-link-2"></i>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <i class="isax isax-import"></i>
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
                <!-- /Invoices -->

            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection