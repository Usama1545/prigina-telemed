<?php $page = 'doctor-blog'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Doctor Blog', 'li_2' => 'Doctor Blog'])
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
                                <a href="{{ url('doctor-profile') }}" class="booking-doc-img">
                                    <img src="{{ URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg') }}"
                                        alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="{{ url('doctor-profile') }}">Dr Edalin Hendry</a></h3>
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
                                        <a href="{{ url('doctor-dashboard') }}">
                                            <i class="fa-solid fa-shapes"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('doctor-request') }}">
                                            <i class="fa-solid fa-calendar-check"></i>
                                            <span>Requests</span>
                                            <small class="unread-msg">2</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('appointments') }}">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('available-timings') }}">
                                            <i class="fa-solid fa-calendar-day"></i>
                                            <span>Available Timings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('my-patients') }}">
                                            <i class="fa-solid fa-user-injured"></i>
                                            <span>My Patients</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('doctor-specialities') }}">
                                            <i class="fa-solid fa-clock"></i>
                                            <span>Specialties & Services</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('reviews') }}">
                                            <i class="fas fa-star"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('accounts') }}">
                                            <i class="fa-solid fa-file-contract"></i>
                                            <span>Accounts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('invoices') }}">
                                            <i class="fa-solid fa-file-lines"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('doctor-payment') }}">
                                            <i class="fa-solid fa-money-bill-1"></i>
                                            <span>Payout Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('chat-doctor') }}">
                                            <i class="fa-solid fa-comments"></i>
                                            <span>Message</span>
                                            <small class="unread-msg">7</small>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ url('doctor-blog') }}">
                                            <i class="isax isax-grid-5"></i>
                                            <span>Blog</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('doctor-profile-settings') }}">
                                            <i class="fa-solid fa-user-pen"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('social-media') }}">
                                            <i class="fa-solid fa-shield-halved"></i>
                                            <span>Social Media</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('doctor-change-password') }}">
                                            <i class="fa-solid fa-key"></i>
                                            <span>Change Password</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('login') }}">
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
                    <div class="doc-review review-listing">

                        <div class="row mb-5">
                            <div class="col">
                                <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ url('doctor-blog') }}">Acitive Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('doctor-pending-blog') }}">Pending Blog</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-primary btn-sm" href="{{ url('doctor-add-blog') }}"><i
                                        class="fas fa-plus me-1"></i> Add Blog</a>
                            </div>
                        </div>

                        <!-- Blog -->
                        <div class="row blog-grid-row">

                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-01.jpg') }}" alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-01.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Ruby Perrin</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 4 Dec 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">PriGina Global Telemed –
                                                Making your
                                                clinic painless visit?</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-02.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Darren Elder</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 3 Dec 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">What are the benefits
                                                of
                                                Online Doctor Booking?</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-03.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-03.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Deborah Angel</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 3 Dec 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">Benefits of consulting
                                                with
                                                an Online Doctor</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-04.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-04.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Sofia Brient</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 2 Dec 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">5 Great reasons to use
                                                an
                                                Online Doctor</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-05.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-05.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Marvin Campbell</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 1 Dec 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">Online Doctor
                                                Appointment
                                                Scheduling</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-06.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-06.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Katharine Berthold</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 30 Nov 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">Simple steps to make
                                                your
                                                doctor visits exceptional!</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-07.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-07.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Linda Tobin</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 28 Nov 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">Choose your own Online
                                                Doctor Appointment</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-08.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-08.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Paul Richard </span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 25 Nov 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">Simple steps to visit
                                                your
                                                doctor today</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-09.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-09.jpg') }}"
                                                            alt="Post Author"> <span>Dr. John Gibbs</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 24 Nov 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">5 Great reasons to use
                                                an
                                                Online Doctor</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                            <div class="col-md-6 col-xl-4 col-sm-12">

                                <!-- Blog Post -->
                                <div class="blog grid-blog">
                                    <div class="blog-image">
                                        <a href="{{ url('blog-details') }}"><img class="img-fluid"
                                                src="{{ URL::asset('build/img/blog/blog-10.jpg') }}"
                                                alt="Post Image"></a>
                                    </div>
                                    <div class="blog-content">
                                        <ul class="entry-meta meta-item">
                                            <li>
                                                <div class="post-author">
                                                    <a href="{{ url('doctor-profile') }}"><img
                                                            src="{{ URL::asset('build/img/doctors/doctor-thumb-10.jpg') }}"
                                                            alt="Post Author"> <span>Dr. Olga Barlow</span></a>
                                                </div>
                                            </li>
                                            <li><i class="isax isax-clock"></i> 23 Nov 2023</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ url('blog-details') }}">Online Doctoral
                                                Programs</a></h3>
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed
                                            do
                                            eiusmod tempor.</p>
                                    </div>
                                    <div class="row pt-3">
                                        <div class="col"><a href="{{ url('edit-blog') }}" class="text-success"><i
                                                    class="isax isax-edit"></i> Edit</a></div>

                                        <div class="col text-end"><a href="javascript:void(0);" class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#deleteNotConfirmModal"><i
                                                    class="isax isax-trash"></i> Inactive</a></div>
                                    </div>
                                </div>
                                <!-- /Blog Post -->

                            </div>
                        </div>

                        <!-- Blog Pagination -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="blog-pagination">
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1"><i
                                                        class="fas fa-angle-double-left"></i></a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="#">2 <span
                                                        class="visually-hidden">(current)</span></a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#"><i
                                                        class="fas fa-angle-double-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- /Blog Pagination -->
                        <!-- /Blog -->

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection
