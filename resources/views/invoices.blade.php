<?php $page = 'invoices'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Invoices', 'li_2' => 'Invoices'])
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
                                    <li>
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
                                    <li class="active">
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

                <!-- Invoices -->
                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header">
                        <h3>Invoices</h3>
                    </div>

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
                                        <th>Patient</th>
                                        <th>Appointment Date</th>
                                        <th>Booked on</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#Inv-2021</a></td>
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
                                                    <i class="isax isax-printer5"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#Inv-2021</a></td>
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
                                                    <i class="isax isax-printer5"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#Inv-2021</a></td>
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
                                                    <i class="isax isax-printer5"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#Inv-2021</a></td>
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
                                                    <i class="isax isax-printer5"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#Inv-2021</a></td>
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
                                                    <i class="isax isax-printer5"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#IApt123</a></td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
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
                                        <td>
                                            <div class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#invoice_view">
                                                    <i class="isax isax-link-2"></i>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <i class="isax isax-printer5"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript:void(0);" class="text-blue-600" data-bs-toggle="modal"
                                                data-bs-target="#invoice_view">#Inv-2021</a></td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{url('doctor-profile')}}" class="avatar avatar-sm me-2">
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
                                        <td>
                                            <div class="action-item">
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#invoice_view">
                                                    <i class="isax isax-link-2"></i>
                                                </a>
                                                <a href="javascript:void(0);">
                                                    <i class="isax isax-printer5"></i>
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
                <!-- /Invoices -->

            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection