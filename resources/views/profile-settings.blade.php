<?php $page = 'profile-settings'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Settings', 'li_2' => 'Settings'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
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

                <div class="col-lg-8 col-xl-9">
                    <nav class="settings-tab mb-1">
                        <ul class="nav nav-tabs-bottom" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="{{url('profile-settings')}}">Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="{{url('change-password')}}">Change Password</a>
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
                                <h5>Profile Settings</h5>
                            </div>
                            <form action="{{url('profile-settings')}}">
                                <div class="setting-card">
                                    <label class="form-label mb-2">Profile Photo</label>
                                    <div class="change-avatar img-upload">
                                        <div class="profile-img">
                                            <i class="fa-solid fa-file-image"></i>
                                        </div>
                                        <div class="upload-img">
                                            <div class="imgs-load d-flex align-items-center">
                                                <div class="change-photo">
                                                    Upload New
                                                    <input type="file" class="upload">
                                                </div>
                                                <a href="#" class="upload-remove">Remove</a>
                                            </div>
                                            <p>Your Image should Below 4 MB, Accepted format jpg,png,svg</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-title">
                                    <h6>Information</h6>
                                </div>
                                <div class="setting-card">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date of Birth <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text" class="form-control datetimepicker"
                                                        placeholder="dd/mm/yyyy">
                                                    <span class="icon"><i class="isax isax-calendar-1"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Blood Group <span
                                                        class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>B+ve</option>
                                                    <option>AB+ve</option>
                                                    <option>B-ve</option>
                                                    <option>O+ve</option>
                                                    <option>O-ve</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-title">
                                    <h6>Address</h6>
                                </div>
                                <div class="setting-card">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">City <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">State <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Country <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Pincode <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-btn text-end">
                                    <a href="#" class="btn btn-md btn-light rounded-pill">Cancel</a>
                                    <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection