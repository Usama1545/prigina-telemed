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