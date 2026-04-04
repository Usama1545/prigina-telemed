<?php $page = 'patient-accounts'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Wallet', 'li_2' => 'Wallet'])
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
                                    <li class="active">
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
                    <div class="accunts-sec">
                        <div class="dashboard-header">
                            <div class="header-back">
                                <h3>Wallet</h3>
                            </div>
                        </div>
                        <div class="account-details-box">
                            <div class="row">
                                <div class="col-xxl-7 col-lg-7">
                                    <div class="account-payment-info">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="payment-amount">
                                                    <h6><i class="isa isax-wallet-25 text-warning"></i>Total Balance</h6>
                                                    <span>$1200</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="payment-amount">
                                                    <h6><i class="isax isax-document5 text-success"></i>Total Transaction
                                                    </h6>
                                                    <span>$2300</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payment-request">
                                            <span>Last Payment request : 24 Mar 2023</span>
                                            <a href="#payment_request" class="btn btn-md btn-primary-gradient rounded-pill"
                                                data-bs-toggle="modal">Add Payment</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-5 col-lg-5">
                                    <div class="bank-details-info">
                                        <h3>Bank Details</h3>
                                        <ul>
                                            <li>
                                                <h6>Bank Name</h6>
                                                <h5>Citi Bank Inc</h5>
                                            </li>
                                            <li>
                                                <h6>Account Number</h6>
                                                <h5>5396 5250 1908 XXXX</h5>
                                            </li>
                                            <li>
                                                <h6>Branch Name</h6>
                                                <h5>London</h5>
                                            </li>
                                            <li>
                                                <h6>Account Name</h6>
                                                <h5>Darren</h5>
                                            </li>
                                        </ul>
                                        <div
                                            class="edit-detail-link d-flex align-items-center justify-content-between w-100">
                                            <div>
                                                <a href="#edit_card" data-bs-toggle="modal">Edit Details</a>
                                                <a href="#add_card" data-bs-toggle="modal">Add Cards</a>
                                            </div>
                                            <a href="#other_accounts" data-bs-toggle="modal">Other Accounts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="account-detail-table">

                                <div class="custom-new-table">
                                    <div class="table-responsive">
                                        <table class="table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Account No</th>
                                                    <th>Reason</th>
                                                    <th>Debited / Credited On</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-primary">#AC1234</a>
                                                    </td>
                                                    <td class="text-gray-9">5396 5250 1908 XXXX</td>
                                                    <td>Appointment</td>
                                                    <td>26 Mar 2024</td>
                                                    <td>$300</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-success-transparent inline-flex align-items-center"><i
                                                                class="fa-solid fa-circle me-1 fs-5"></i>Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-primary">#AC3656</a>
                                                    </td>
                                                    <td class="text-gray-9">6372 4902 4902 XXXX</td>
                                                    <td>Appointment</td>
                                                    <td>28 Mar 2024</td>
                                                    <td>$480</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-success-transparent inline-flex align-items-center"><i
                                                                class="fa-solid fa-circle me-1 fs-5"></i>Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-primary">#AC1246</a>
                                                    </td>
                                                    <td class="text-gray-9">4892 0204 4924 XXXX</td>
                                                    <td>Appointment</td>
                                                    <td>11 Apr 2024</td>
                                                    <td>$250</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-success-transparent inline-flex align-items-center"><i
                                                                class="fa-solid fa-circle me-1 fs-5"></i>Completed</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-primary">#AC6985</a>
                                                    </td>
                                                    <td class="text-gray-9">5730 4892 0492 XXXX</td>
                                                    <td>Refund</td>
                                                    <td>18 Apr 2024</td>
                                                    <td>$220</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-warning-transparent inline-flex align-items-center"><i
                                                                class="fa-solid fa-circle me-1 fs-5"></i>Pending</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" class="link-primary">#AC3659</a>
                                                    </td>
                                                    <td class="text-gray-9">7922 9024 5824 XXXX</td>
                                                    <td>Appointment</td>
                                                    <td>29 Apr 2024</td>
                                                    <td>$350</td>
                                                    <td>
                                                        <span
                                                            class="badge badge-success-transparent inline-flex align-items-center"><i
                                                                class="fa-solid fa-circle me-1 fs-5"></i>Completed</span>
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

    </div>
    <!-- /Page Content -->
@endsection