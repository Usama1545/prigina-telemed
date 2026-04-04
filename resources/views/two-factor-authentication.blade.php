<?php $page = 'two-factor-authentication'; ?>
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
                                <a class="nav-link" href="{{url('change-password')}}">Change Password</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="{{url('two-factor-authentication')}}">2 Factor
                                    Authentication</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{url('delete-account')}}">Delete Account</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="card mb-0">
                        <div class="card-body">
                            <div
                                class="border-bottom d-flex align-items-center justify-content-between gap-3 flex-wrap pb-3 mb-3">
                                <h5>2 Factor Authentication</h5>
                                <div class="status-toggle">
                                    <input type="checkbox" id="status_2" class="check" checked>
                                    <label for="status_2" class="checktoggle">checkbox</label>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{url('two-factor-authentication')}}">
                                        <div class="mb-3">
                                            <h6 class="mb-1">Set up using an Email</h6>
                                            <p class="fs-14">Enter your Email which we send you code</p>
                                        </div>
                                        <div class="mb-3 pb-3 border-bottom">
                                            <label class="form-label">Email Address <span
                                                    class="text-danger">*</span></label>
                                            <div class="d-flex align-items-center w-100 gap-2">
                                                <div class="flex-grow-1">
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div>
                                                    <button
                                                        class="btn btn-md btn-primary-gradient rounded-pill">Continue</button>
                                                </div>
                                            </div>
                                        </div>
                                        <label class="form-label">Enter the code generated by Email</label>
                                        <div method="get" class="digit-group login-form-control" data-group-name="digits"
                                            data-autosubmit="false" autocomplete="off" ">
                                                <div class=" otp-box setting-otp">
                                            <div class="mb-2">
                                                <input type="text" id="digit-1" name="digit-1" data-next="digit-2"
                                                    maxlength="1">
                                                <input type="text" id="digit-2" name="digit-2" data-next="digit-3"
                                                    data-previous="digit-1" maxlength="1">
                                                <input type="text" id="digit-3" name="digit-3" data-next="digit-4"
                                                    data-previous="digit-2" maxlength="1">
                                                <input type="text" id="digit-4" name="digit-4" data-next="digit-5"
                                                    data-previous="digit-3" maxlength="1">
                                            </div>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Submit</button>
                                </form>
                            </div>
                        </div>
                        <div class="card mb-0">
                            <div class="card-body">
                                <form action="{{url('two-factor-authentication')}}">
                                    <div class="mb-3">
                                        <h6 class="mb-1">Set up using an SMS</h6>
                                        <p class="fs-14">Enter your phone number which we send you code</p>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center w-100 gap-2">
                                            <div class="flex-grow-1">
                                                <input type="text" class="form-control">
                                            </div>
                                            <div>
                                                <a href="#" class="btn btn-md btn-primary-gradient rounded-pill"
                                                    data-bs-target="#success-modal" data-bs-toggle="modal">Continue</a>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="form-label">Enter the code generated by SMS</label>
                                    <div method="get" class="digit-group login-form-control" data-group-name="digits"
                                        data-autosubmit="false" autocomplete="off" ">
                                                <div class=" otp-box setting-otp">
                                        <div class="mb-2">
                                            <input type="text" id="digit-1" name="digit-1" data-next="digit-2"
                                                maxlength="1">
                                            <input type="text" id="digit-2" name="digit-2" data-next="digit-3"
                                                data-previous="digit-1" maxlength="1">
                                            <input type="text" id="digit-3" name="digit-3" data-next="digit-4"
                                                data-previous="digit-2" maxlength="1">
                                            <input type="text" id="digit-4" name="digit-4" data-next="digit-5"
                                                data-previous="digit-3" maxlength="1">
                                        </div>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Change Password -->

    </div>
    </div>

    </div>
    <!-- /Page Content -->
@endsection