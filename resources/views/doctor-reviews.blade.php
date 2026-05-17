<?php $page = 'reviews'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctors', 'li_1' => 'Stories', 'li_2' => 'Stories'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
               
                <div class="col-lg-12 col-xl-11">
                    <div class="doc-review">

                        <div class="dashboard-header">
                            <div class="header-back">
                                <h3>Doctor Stories</h3>
                            </div>
                        </div>

                        <!-- Review Listing -->
                        <ul class="comments-list">

                           
                            <li>
                                <div class="comments">
                                    <div class="comment-head">
                                        <div class="patinet-information">
                                            <a href="javascript:void(0);">
                                                <img src="{{URL::asset('build/img/doctors-dashboard/profile-01.jpg')}}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Dr. Adrian Miles</a></h6>
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
                                        <p>PriGina Global Telemed has made it easier for me to provide structured second
                                            opinions to patients who need specialist guidance quickly. The case details and
                                            uploaded records are organized clearly, so I can focus on clinical review
                                            instead of chasing missing information.
                                        </p>
                                        
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
                                                <h6><a href="javascript:void(0);">Dr. Kelly Rahman</a></h6>
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
                                            Working with patients through PriGina has been smooth and professional. I can
                                            manage my profile, review patient submissions, and respond with clear guidance
                                            in one place. It is a practical way to extend specialist access beyond the
                                            limits of a traditional clinic schedule.
                                        </p>
                                        
                                    </div>
                                </div>
                               
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
                                                <h6><a href="javascript:void(0);">Dr. Samuel Ortiz</a></h6>
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
                                            The platform helps me give patients thoughtful recommendations without losing
                                            the context of their medical history. Having records, notes, and consultation
                                            details available before I respond makes the second-opinion process more
                                            efficient and clinically useful.
                                        </p>
                                        
                                    </div>
                                </div>

                            </li>
                        </ul>
                        <!-- /Comment List -->

                      
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection
