<?php $page = 'change-password'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Settings', 'li_2' => 'Settings'])
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
                                    <li class="active">
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

                <!-- Change Password -->
                <div class="col-lg-8 col-xl-9">
                    <nav class="settings-tab mb-1">
                        <ul class="nav nav-tabs-bottom" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{url('profile-settings')}}">Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="{{url('change-password')}}">Change Password</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{url('two-factor-authentication')}}">2 Factor Authentication</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{url('delete-account')}}">Delete Account</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom pb-3 mb-3">
                                <h5>Change Password</h5>
                            </div>
                            <form action="{{url('change-password')}}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Current Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="form-control pass-input-sub">
                                                <span class="feather-eye-off toggle-password-sub"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="form-control pass-input">
                                                <span class="feather-eye-off toggle-password"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="pass-group">
                                                <input type="password" class="form-control pass-input-sub">
                                                <span class="feather-eye-off toggle-password-sub"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-btn border-top pt-3 text-end">
                                    <a href="#" class="btn btn-md btn-light rounded-pill">Cancel</a>
                                    <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Change Password -->

            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection