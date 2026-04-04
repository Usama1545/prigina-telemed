<?php $page = 'doctor-specialities'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Speciality & Services', 'li_2' => 'Speciality & Services'])
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
                                    <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}" alt="User Image">
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
                                    <li class="active">
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

                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header">
                        <h3>Speciality & Services</h3>
                        <ul>
                            <li>
                                <a href="#" class="btn btn-primary prime-btn add-speciality">Add New Speciality</a>
                            </li>
                        </ul>
                    </div>

                    <div class="accordions" id="list-accord">

                        <!-- Spaciality Item -->
                        <div class="user-accordion-item">
                            <a href="#" class="accordion-wrap" data-bs-toggle="collapse" data-bs-target="#cardiology">Cardiology<span>Delete</span></a>
                            <div class="accordion-collapse collapse show" id="cardiology" data-bs-parent="#list-accord">
                                <div class="content-collapse">
                                    <div class="add-service-info">
                                        <div class="add-info">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Speciality <span class="text-danger">*</span></label>
                                                        <select class="select">
                                                            <option>Cardiology</option>
                                                            <option>Neurology</option>
                                                            <option>Urology</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row service-cont">
                                                <div class="col-md-3">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Service <span class="text-danger">*</span></label>
                                                        <select class="select">
                                                            <option>Select Service</option>
                                                            <option>Surgery</option>
                                                            <option>General Checkup</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Price ($) <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="454">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-wrap w-100">
                                                            <label class="form-label">About Service</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-wrap ms-2">
                                                            <label class="col-form-label d-block">&nbsp;</label>
                                                            <a href="#" class="trash-icon trash">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="#" class="add-serv more-item mb-0">Add New Service</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Spaciality Item -->

                        <!-- Spaciality Item -->
                        <div class="user-accordion-item">
                            <a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse" data-bs-target="#neurology">Neurology<span>Delete</span></a>
                            <div class="accordion-collapse" id="neurology" data-bs-parent="#list-accord">
                                <div class="content-collapse">
                                    <div class="add-service-info">
                                        <div class="add-info">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Speciality <span class="text-danger">*</span></label>
                                                        <select class="select">
                                                            <option>Cardiology</option>
                                                            <option selected>Neurology</option>
                                                            <option>Urology</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row service-cont">
                                                <div class="col-md-3">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Service <span class="text-danger">*</span></label>
                                                        <select class="select">
                                                            <option>Select Service</option>
                                                            <option>Surgery</option>
                                                            <option>General Checkup</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Price ($) <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="454">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-wrap w-100">
                                                            <label class="form-label">About Service</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-wrap ms-2">
                                                            <label class="col-form-label d-block">&nbsp;</label>
                                                            <a href="#" class="trash-icon trash">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="#" class="add-serv more-item mb-0">Add New Service</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Spaciality Item -->

                        <!-- Spaciality Item -->
                        <div class="user-accordion-item">
                            <a href="#" class="accordion-wrap collapsed" data-bs-toggle="collapse" data-bs-target="#urology">Urology<span>Delete</span></a>
                            <div class="accordion-collapse" id="urology" data-bs-parent="#list-accord">
                                <div class="content-collapse">
                                    <div class="add-service-info">
                                        <div class="add-info">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Speciality <span class="text-danger">*</span></label>
                                                        <select class="select">
                                                            <option>Cardiology</option>
                                                            <option>Neurology</option>
                                                            <option selected>Urology</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row service-cont">
                                                <div class="col-md-3">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Service <span class="text-danger">*</span></label>
                                                        <select class="select">
                                                            <option>Select Service</option>
                                                            <option>Surgery</option>
                                                            <option>General Checkup</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-wrap">
                                                        <label class="form-label">Price ($) <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" placeholder="454">
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-wrap w-100">
                                                            <label class="form-label">About Service</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="form-wrap ms-2">
                                                            <label class="col-form-label d-block">&nbsp;</label>
                                                            <a href="#" class="trash-icon trash">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <a href="#" class="add-serv more-item mb-0">Add New Service</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Spaciality Item -->

                    </div>

                    <div class="modal-btn text-end">
                        <a href="#" class="btn btn-gray">Cancel</a>
                        <button class="btn btn-primary prime-btn">Save Changes</button>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection