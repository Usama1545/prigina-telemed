<?php $page = 'social-media'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Social Media', 'li_2' => 'Social Media'])
    @endcomponent

    <!-- Page Content -->
    <div class="content doctor">
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
                                    <li class="active">
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
                        <h3>Social Media</h3>
                    </div>
                    <div class="add-btn text-end mb-4">
                        <a href="#" class="btn btn-primary prime-btn add-social-media">Add New Social Media</a>
                    </div>
                    <form action="{{url('social-media')}}" class="social-media-form">
                        <div class="social-media-links d-flex align-items-center">
                            <div class="input-block input-block-new select-social-link">
                                <select class="select">
                                    <option selected>Facebook</option>
                                    <option>Linkedin</option>
                                    <option>Twitter</option>
                                    <option>Instagram</option>
                                </select>
                            </div>
                            <div class="input-block input-block-new flex-fill">
                                <input type="password" class="form-control" placeholder="Add Url">
                            </div>
                        </div>
                        <div class="social-media-links d-flex align-items-center">
                            <div class="input-block input-block-new select-social-link">
                                <select class="select">
                                    <option>Facebook</option>
                                    <option>Linkedin</option>
                                    <option selected>Twitter</option>
                                    <option>Instagram</option>
                                </select>
                            </div>
                            <div class="input-block input-block-new flex-fill">
                                <input type="password" class="form-control" placeholder="Add Url">
                            </div>
                        </div>
                        <div class="social-media-links d-flex align-items-center">
                            <div class="input-block input-block-new select-social-link">
                                <select class="select">
                                    <option>Facebook</option>
                                    <option selected>Linkedin</option>
                                    <option>Twitter</option>
                                    <option>Instagram</option>
                                </select>
                            </div>
                            <div class="input-block input-block-new flex-fill">
                                <input type="password" class="form-control" placeholder="Add Url">
                            </div>
                        </div>
                        <div class="social-media-links d-flex align-items-center">
                            <div class="input-block input-block-new select-social-link">
                                <select class="select">
                                    <option>Facebook</option>
                                    <option>Linkedin</option>
                                    <option>Twitter</option>
                                    <option selected>Instagram</option>
                                </select>
                            </div>
                            <div class="input-block input-block-new flex-fill">
                                <input type="password" class="form-control" placeholder="Add Url">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection