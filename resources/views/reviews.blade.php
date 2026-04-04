<?php $page = 'reviews'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Reviews', 'li_2' => 'Reviews'])
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
                                    <li class="active">
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
                    <div class="doc-review">

                        <div class="dashboard-header">
                            <div class="header-back">
                                <h3>Reviews</h3>
                            </div>
                        </div>

                        <!-- Review Listing -->
                        <ul class="comments-list">

                            <li class="over-all-review">
                                <div class="review-content">
                                    <div class="review-rate">
                                        <h6>Overall Rating</h6>
                                        <div class="star-rated">
                                            <span>4.0</span>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="position-relative daterange-wraper">
                                        <div class="input-groupicon calender-input">
                                            <input type="text" class="form-control  date-range bookingrange"
                                                placeholder="From Date - To Date ">
                                        </div>
                                        <i class="isax isax-calendar-1"></i>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="comments">
                                    <div class="comment-head">
                                        <div class="patinet-information">
                                            <a href="javascript:void(0);">
                                                <img src="{{URL::asset('build/img/doctors-dashboard/profile-01.jpg')}}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Adrian</a></h6>
                                                <span>15 Mar 2024</span>
                                            </div>
                                        </div>
                                        <div class="star-rated">
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-info">
                                        <p> Dr. Edalin Hendry has been my family's trusted doctor for years.
                                            Their genuine care and thorough approach to our health concerns make every visit
                                            reassuring.
                                            Dr. Edalin Hendry's ability to listen and explain complex health issues in
                                            understandable terms
                                            is exceptional. We are grateful to have such a dedicated physician by our side
                                        </p>
                                        <div class="comment-reply">
                                            <a href="#" class="d-inline-flex align-items-center"><i
                                                    class="fa-solid fa-reply me-2"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="comments">
                                    <div class="comment-head">
                                        <div class="patinet-information">
                                            <a href="javascript:void(0);">
                                                <img src="{{URL::asset('build/img/doctors-dashboard/profile-02.jpg')}}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Kelly</a></h6>
                                                <span>11 Mar 2024</span>
                                            </div>
                                        </div>
                                        <div class="star-rated">
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-info">
                                        <p>
                                            I recently completed a series of dental treatments with Dr.Edalin Hendry,
                                            and I couldn't be more pleased with the results. From my very first appointment,
                                            Dr.
                                            Edalin Hendry and their team made me feel completely at ease, addressing all of
                                            my concerns
                                            with patience and understanding.
                                            Their state-of-the-art office and the staff's attention to comfort and
                                            cleanliness were beyond impressive.
                                        </p>
                                        <div class="comment-reply">
                                            <a href="#" class="d-inline-flex align-items-center replied-text"><i
                                                    class="fa-solid fa-reply me-2"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <div class="replied-comment">
                                            <div class="patinet-information">
                                                <a href="javascript:void(0);">
                                                    <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                                        alt="User Image">
                                                </a>
                                                <div class="patient-info">
                                                    <h6><a href="javascript:void(0);">Dr Edalin Hendry</a></h6>
                                                    <span>2 days ago</span>
                                                </div>
                                            </div>
                                            <div class="review-info">
                                                <p>
                                                    Thank you so much for taking the time to share your experience at
                                                    our dental clinic. We are deeply touched by your kind words and thrilled
                                                    to hear about
                                                    the positive impact of your treatment. Our team strives to provide a
                                                    comfortable,
                                                    welcoming environment for all our patients, and it’s heartening to know
                                                    we achieved this for you.
                                                </p>
                                                <div class="comment-reply">
                                                    <a href="#" class="d-inline-flex align-items-center"><i
                                                            class="fa-solid fa-reply me-2"></i> Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comments">
                                    <div class="comment-head">
                                        <div class="patinet-information">
                                            <a href="javascript:void(0);">
                                                <img src="{{URL::asset('build/img/doctors-dashboard/profile-03.jpg')}}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Samuel</a></h6>
                                                <span>05 Mar 2024</span>
                                            </div>
                                        </div>
                                        <div class="star-rated">
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star filled"></i>
                                            <i class="fa-solid fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="review-info">
                                        <p>
                                            From my first consultation through to the completion of my treatment,
                                            Dr. Edalin Hendry, my dentist, has been nothing short of extraordinary.
                                            Dental visits have always been a source of anxiety for me, but Dr. Edalin
                                            Hendry's office provided an
                                            atmosphere of calm and reassurance that I had not experienced elsewhere. Highly
                                            Recommended!
                                        </p>
                                        <div class="comment-reply">
                                            <a href="#" class="d-inline-flex align-items-center"><i
                                                    class="fa-solid fa-reply me-2"></i> Reply</a>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        </ul>
                        <!-- /Comment List -->

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
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection