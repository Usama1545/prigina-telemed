<?php $page = 'doctor-payment'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Payout Settings', 'li_2' => 'Payout Settings'])
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
                                    <li>
                                        <a href="{{url('invoices')}}">
                                            <i class="isax isax-document-text"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li class="active">
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

                <!-- Payouts -->
                <div class="col-lg-8 col-xl-9">

                    <div class="payout-wrap">
                        <div class="payout-title">
                            <h4>Settings</h4>
                            <p>All the earning will be sent to below selected payout method</p>
                        </div>
                        <div class="stripe-wrapper">
                            <div class="stripe-box">
                                <div class="stripe-img">
                                    <img src="{{URL::asset('build/img/icons/stripe.svg')}}" alt="img">
                                </div>
                                <a href="javascript:void(0);" class="btn"><i class="fa-solid fa-gear"></i>Configure</a>
                            </div>
                            <div class="stripe-box active">
                                <div class="stripe-img">
                                    <img src="{{URL::asset('build/img/icons/paypal.svg')}}" alt="img">
                                </div>
                                <a href="javascript:void(0);" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#add_configure"><i class="fa-solid fa-gear"></i>Configure</a>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-header">
                        <h3>Payouts</h3>
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
                                        <th>Date</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>24 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$300</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$200</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>25 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$300</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$300</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$300</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$300</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>27 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$200</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>29 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$350</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24 Mar 2024</td>
                                        <td>Paypal</td>
                                        <td>$100</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>04 Apr 2024</td>
                                        <td>Paypal</td>
                                        <td>$180</td>
                                        <td>
                                            <span class="badge badge-green status-badge">Completed</span>
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
                <!-- /Payouts -->

            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection