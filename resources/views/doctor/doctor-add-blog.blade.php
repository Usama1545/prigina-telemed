<?php $page = 'doctor-add-blog'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Add Blog', 'li_2' => 'Add Blog'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
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
                                    <li class="active">
                                        <a href="{{url('doctor-blog')}}">
                                            <i class="isax isax-grid-5"></i>
                                            <span>Blog</span>
                                        </a>
                                    </li>
                                    <li>
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
                    <div class="doc-review review-listing custom-edit-service">

                        <div class="row mb-5">
                            <div class="col">
                                <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('doctor-blog')}}">Acitive Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('doctor-pending-blog')}}">Pending Blog</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-primary btn-sm" href="{{url('doctor-add-blog')}}"><i
                                        class="fas fa-plus me-1"></i> Add Blog</a>
                            </div>
                        </div>

                        <!-- Add Blog -->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="pb-3">Add Blog</h3>

                                <form method="post" enctype="multipart/form-data" autocomplete="off" id="update_service"
                                    action="{{url('doctor-blog')}}">
                                    <input type="hidden" name="csrf_token_name" value="0146f123a4c7ae94253b39bca6bd5a5e">

                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="mb-2">Blog Title <span
                                                            class="text-danger">*</span></label>
                                                    <input type="hidden" name="service_id" id="service_id" value="18">
                                                    <input class="form-control" type="text" name="service_title"
                                                        id="service_title"
                                                        value="PriGina Global Telemed – Making your clinic painless visit?" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">Category <span class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="category" required="">
                                                        <option value="">Automobile</option>
                                                        <option value="2" selected="selected">Construction</option>
                                                        <option value="3">Interior</option>
                                                        <option value="4">Cleaning</option>
                                                        <option value="5">Electrical</option>
                                                        <option value="6">Carpentry</option>
                                                        <option value="7">Computer</option>
                                                        <option value="8">Painting</option>
                                                        <option value="9">Car Wash</option>
                                                        <option value="10">Category Test</option>
                                                        <option value="11">dfdf</option>
                                                        <option value="12">Equipment</option>
                                                        <option value="13">Test category1</option>
                                                        <option value="14">Farming</option>
                                                        <option value="15">Test Category02</option>
                                                        <option value="16">Laundry</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">Sub Category <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select form-control" name="subcategory">
                                                        <option value="5">Others</option>
                                                        <option value="6">Others</option>
                                                        <option value="7">Others</option>
                                                        <option value="8">House cleaning</option>
                                                        <option value="9">Others</option>
                                                        <option value="10">Others</option>
                                                        <option value="11">Others</option>
                                                        <option value="12">Others</option>
                                                        <option value="13">Full Car Wash</option>
                                                        <option value="14" selected="selected">Testing category</option>
                                                        <option value="15">Test Sub category</option>
                                                        <option value="16">Harvesting pine</option>
                                                        <option value="17">Test Sub category name</option>
                                                        <option value="18">Test Sub category name</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="mb-2">Descriptions <span
                                                            class="text-danger">*</span></label>
                                                    <textarea id="about" class="form-control service-desc"
                                                        name="about">note.</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="service-upload">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <span>Upload Blog Images *</span>
                                                    <input type="file" name="images[]" id="images" multiple=""
                                                        accept="image/jpeg, image/png, image/gif">

                                                </div>
                                                <div id="uploadPreview">
                                                    <ul class="upload-wrap">
                                                        <li>
                                                            <div class=" upload-images">
                                                                <img alt="Blog Image"
                                                                    src="{{URL::asset('build/img/img-01.jpg')}}">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class=" upload-images">
                                                                <img alt="Blog Image"
                                                                    src="{{URL::asset('build/img/img-02.jpg')}}">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class=" upload-images">
                                                                <img alt="Blog Image"
                                                                    src="{{URL::asset('build/img/img-03.jpg')}}">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="mb-2">Video id <span class="text-danger">*</span></label>
                                                    <input type="hidden" name="video_id" id="video_id" value="18">
                                                    <input class="form-control" type="text" name="video_id1" id="video_id1"
                                                        value="Rf34rhkWW1" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn" type="submit" name="form_submit"
                                            value="submit">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- /Add Blog -->

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection