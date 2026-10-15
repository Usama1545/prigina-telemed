<?php $page = 'reviews'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => __('app.stories.patients'), 'li_1' => __('app.stories.stories'), 'li_2' => __('app.stories.stories')])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-xl-11">
                    <div class="doc-review">

                        <div class="dashboard-header">
                            <div class="header-back">
                                <h3>{{ __('app.stories.patient_title') }}</h3>
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
                                                    alt="{{ __('app.stories.user_image') }}">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Sarah M.</a></h6>
                                                <span>{{ \Carbon\Carbon::parse('15 May 2026')->translatedFormat('d M Y') }}</span>
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
                                            {{ __('app.stories.patient_1_text') }}
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
                                                    alt="{{ __('app.stories.user_image') }}">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Daniel K.</a></h6>
                                                <span>{{ \Carbon\Carbon::parse('11 May 2026')->translatedFormat('d M Y') }}</span>
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
                                            {{ __('app.stories.patient_2_text') }}
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
                                                    alt="{{ __('app.stories.user_image') }}">
                                            </a>
                                            <div class="patient-info">
                                                <h6><a href="javascript:void(0);">Michael A.</a></h6>
                                                <span>{{ \Carbon\Carbon::parse('05 May 2026')->translatedFormat('d M Y') }}</span>
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
                                            {{ __('app.stories.patient_3_text') }}
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
