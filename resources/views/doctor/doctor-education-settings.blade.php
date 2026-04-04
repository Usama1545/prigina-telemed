<?php $page = 'doctor-education-settings'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Doctor Profile', 'li_2' => 'Doctor Profile'])
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
                                            <i class="fa-solid fa-shapes"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-request')}}">
                                            <i class="fa-solid fa-calendar-check"></i>
                                            <span>Requests</span>
                                            <small class="unread-msg">2</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('appointments')}}">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('available-timings')}}">
                                            <i class="fa-solid fa-calendar-day"></i>
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
                                            <i class="fa-solid fa-clock"></i>
                                            <span>Specialties & Services</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('reviews')}}">
                                            <i class="fas fa-star"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('accounts')}}">
                                            <i class="fa-solid fa-file-contract"></i>
                                            <span>Accounts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('invoices')}}">
                                            <i class="fa-solid fa-file-lines"></i>
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
                                            <i class="fa-solid fa-comments"></i>
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
                                    <li class="active">
                                        <a href="{{url('doctor-profile-settings')}}">
                                            <i class="fa-solid fa-user-pen"></i>
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
                                            <i class="fa-solid fa-key"></i>
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

                    <!-- Profile Settings -->
                    <div class="dashboard-header">
                        <h3>Profile Settings</h3>
                    </div>

                    <!-- Settings List -->
                    <div class="setting-tab">
                        <div class="appointment-tabs">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('doctor-profile-settings')}}">Basic Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('doctor-experience-settings')}}">Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{url('doctor-education-settings')}}">Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('doctor-awards-settings')}}">Awards</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('doctor-insurance-settings')}}">Insurances</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('doctor-clinics-settings')}}">Clinics</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('doctor-business-settings')}}">Business Hours</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Settings List -->

                    <div class="dashboard-header border-0 mb-0">
                        <h3>Education</h3>
                        <ul>
                            <li>
                                <a href="#" class="btn btn-primary prime-btn add-educations">Add New Education</a>
                            </li>
                        </ul>
                    </div>

                    <form action="{{url('doctor-education-settings')}}">
                        <div class="accordions education-infos" id="list-accord">

                            <!-- Education Item -->
                            <div class="user-accordion-item">
                                <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                    data-bs-target="#education1">Education<span>Delete</span></a>
                                <div class="accordion-collapse collapse show" id="education1" data-bs-parent="#list-accord">
                                    <div class="content-collapse">
                                        <div class="add-service-info">
                                            <div class="add-info">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-wrap mb-2">
                                                            <div class="change-avatar img-upload">
                                                                <div class="profile-img">
                                                                    <i class="fa-solid fa-file-image"></i>
                                                                </div>
                                                                <div class="upload-img">
                                                                    <h5>Logo</h5>
                                                                    <div class="imgs-load d-flex align-items-center">
                                                                        <div class="change-photo">
                                                                            Upload New
                                                                            <input type="file" class="upload">
                                                                        </div>
                                                                        <a href="#" class="upload-remove">Remove</a>
                                                                    </div>
                                                                    <p class="form-text">Your Image should Below 4 MB,
                                                                        Accepted format jpg,png,svg</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Name of the institution</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Course</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Start Date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-icon">
                                                                <input type="text" class="form-control datetimepicker">
                                                                <span class="icon"><i
                                                                        class="fa-regular fa-calendar-days"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">End Date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-icon">
                                                                <input type="text" class="form-control datetimepicker">
                                                                <span class="icon"><i
                                                                        class="fa-regular fa-calendar-days"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">No of Years <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Description <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea class="form-control" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <a href="#" class="reset more-item">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Education Item -->

                            <!-- Education Item -->
                            <div class="user-accordion-item">
                                <a href="#" class="collapsed accordion-wrap" data-bs-toggle="collapse"
                                    data-bs-target="#education2">Cambridge (MBBS)<span>Delete</span></a>
                                <div class="accordion-collapse collapse" id="education2" data-bs-parent="#list-accord">
                                    <div class="content-collapse">
                                        <div class="add-service-info">
                                            <div class="add-info">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="form-wrap mb-2">
                                                            <div class="change-avatar img-upload">
                                                                <div class="profile-img">
                                                                    <i class="fa-solid fa-file-image"></i>
                                                                </div>
                                                                <div class="upload-img">
                                                                    <h5>Logo</h5>
                                                                    <div class="imgs-load d-flex align-items-center">
                                                                        <div class="change-photo">
                                                                            Upload New
                                                                            <input type="file" class="upload">
                                                                        </div>
                                                                        <a href="#" class="upload-remove">Remove</a>
                                                                    </div>
                                                                    <p class="form-text">Your Image should Below 4 MB,
                                                                        Accepted format jpg,png,svg</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Name of the institution</label>
                                                            <input type="text" class="form-control" value="Cambridge">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Course</label>
                                                            <input type="text" class="form-control" value="MBBS">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Start Date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-icon">
                                                                <input type="text" class="form-control datetimepicker"
                                                                    value="12-6-2000">
                                                                <span class="icon"><i
                                                                        class="fa-regular fa-calendar-days"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">End Date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-icon">
                                                                <input type="text" class="form-control datetimepicker"
                                                                    value="09-05-2005">
                                                                <span class="icon"><i
                                                                        class="fa-regular fa-calendar-days"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">No of Years <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" value="5">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Description <span
                                                                    class="text-danger">*</span></label>
                                                            <textarea class="form-control" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <a href="#" class="reset more-item">Reset</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Education Item -->

                        </div>

                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray">Cancel</a>
                            <button class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </form>
                    <!-- /Profile Settings -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection