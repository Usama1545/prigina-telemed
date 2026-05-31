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
                                                <img src="{{ URL::asset('build/img/doctors-dashboard/profile-01.jpg') }}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Dr. Eunice N, General practice</a></h6>
                                                <span>14 May 2026</span>
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
                                        <p>As a physician, I often wanted to help patients outside my immediate community,
                                            but geography limited my reach. Joining PriGina Global Telemed allowed me to
                                            connect with patients from different parts of the world seeking professional
                                            second opinions. One patient had been struggling with a chronic condition for
                                            years and simply needed clarity about their treatment options. Being able to
                                            provide guidance and reassurance reminded me why I became a doctor in the first
                                            place. Through PriGina, I am making a meaningful impact beyond borders.
                                        </p>

                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="comments">
                                    <div class="comment-head">
                                        <div class="patinet-information">
                                            <a href="javascript:void(0);">
                                                <img src="{{ URL::asset('build/img/doctors-dashboard/profile-02.jpg') }}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Dr. Jerry J. Internal Medicine</a></h6>
                                                <span>11 May 2026</span>
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
                                            PriGina Global Telemed has given me the opportunity to continue serving patients
                                            while maintaining flexibility in my schedule. The platform is straightforward,
                                            professional, and focused on quality care. I recently consulted with a patient
                                            who was considering a major surgery and wanted a second opinion. After reviewing
                                            the medical records and discussing the options, the patient felt more confident
                                            in making an informed decision. Experiences like this demonstrate the value of
                                            accessible expert medical guidance.
                                        </p>

                                    </div>
                                </div>

                            </li>
                            <li>
                                <div class="comments">
                                    <div class="comment-head">
                                        <div class="patinet-information">
                                            <a href="javascript:void(0);">
                                                <img src="{{ URL::asset('build/img/doctors-dashboard/profile-03.jpg') }}"
                                                    alt="User Image">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Dr. David N., Specialist Physician</a>
                                                </h6>
                                                <span>07 May 2026</span>
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
                                            Many patients simply want reassurance that they are on the right path. Through
                                            PriGina Global Telemed, I have been able to provide independent medical
                                            perspectives that help patients better understand their diagnoses and treatment
                                            plans. One consultation involved a patient who had received conflicting
                                            recommendations from multiple sources. After a thorough review, we clarified the
                                            situation and helped the patient move forward with confidence. Knowing that my
                                            expertise can bring peace of mind to patients worldwide is incredibly rewarding.
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
