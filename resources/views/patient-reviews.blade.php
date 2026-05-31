<?php $page = 'reviews'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patients', 'li_1' => 'Stories', 'li_2' => 'Stories'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-xl-11">
                    <div class="doc-review">

                        <div class="dashboard-header">
                            <div class="header-back">
                                <h3>Patient Stories</h3>
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
                                                <h6><a href="javascript:void(0);">Sarah M.</a></h6>
                                                <span>15 May 2026</span>
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
                                        <p> I was treated for recurring migraines for nearly a year, but my symptoms
                                            continued to worsen. I felt frustrated and unsure about my diagnosis. Through
                                            PriGina Global Telemed, I connected with an experienced physician for a second
                                            opinion. After reviewing my medical history and test results, the doctor
                                            recommended additional investigations that revealed an underlying condition that
                                            had been overlooked. Today, I am receiving the right treatment and finally have
                                            peace of mind. PriGina gave me clarity when I needed it most.
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
                                                <h6><a href="javascript:void(0);">Daniel K.</a></h6>
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
                                            Living in a rural community made it difficult to access specialist care. When my
                                            mother’s health condition became more complicated, we wanted another medical
                                            opinion before making an important treatment decision. PriGina Global Telemed
                                            connected us with a qualified doctor thousands of miles away. The consultation
                                            was professional, detailed, and reassuring. We received clear explanations and
                                            guidance that helped us make informed decisions about her care. The experience
                                            showed us that quality healthcare truly has no borders.
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
                                                <h6><a href="javascript:void(0);">Michael A.</a></h6>
                                                <span>05 May 2026</span>
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
                                            After being advised to undergo surgery, I felt uncertain and wanted to explore
                                            all my options. Through PriGina Global Telemed, I obtained a second opinion from
                                            another physician who carefully reviewed my records and explained the benefits,
                                            risks, and alternatives available to me. Having that additional expert
                                            perspective gave me the confidence to move forward with a treatment plan that
                                            was right for me. PriGina empowered me to take control of my healthcare journey.
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
