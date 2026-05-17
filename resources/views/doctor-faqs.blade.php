<?php $page = 'faq'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'FAQ', 'li_2' => 'FAQ', 'title' => 'Doctor FAQ'])
    @endcomponent

    <!-- FAQ Section -->
    <section class="faq-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-inner-header text-center">
                        <h2>Doctor Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="faq-info faq-inner-info">
                        <div class="accordion" id="faq-details">

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        How do I join PriGina Global Telemed as a specialist?
                                    </a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Create a doctor account and complete your profile with your specialty,
                                                qualifications, license details, experience, and consultation preferences.
                                                Our team reviews submitted information before your profile is made
                                                available to patients.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        What documents do I need for verification?
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>You may be asked to provide medical license details, specialty
                                                certifications, proof of identity, professional experience, and any other
                                                documents required to confirm your eligibility to provide consultations.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        How do patients find and book me?
                                    </a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Patients can discover your profile by specialty, availability, experience,
                                                and consultation needs. Once they select your profile, they can request or
                                                book a consultation based on the availability you provide.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        Can I manage my own availability?
                                    </a>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes. You can update your consultation schedule, available time slots, and
                                                profile details from your doctor dashboard so patients see accurate
                                                booking options.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        How are consultations handled?
                                    </a>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Consultations are handled through the platform according to the selected
                                                service type. You can review the patient case details, medical records,
                                                and submitted notes before providing your expert opinion or guidance.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="faq-info faq-inner-info">
                        <div class="accordion" id="faq-details-info">

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                        aria-controls="collapseSix">
                                        Will I have access to patient medical records?
                                    </a>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, when a patient submits a case or books a consultation, you can access
                                                the relevant records and information they provide for that specific
                                                review, subject to platform privacy and consent policies.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false"
                                        aria-controls="collapseSeven">
                                        How do I set or update my consultation fee?
                                    </a>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    aria-labelledby="headingSeven" data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Your consultation fee can be added or updated from your doctor profile or
                                                dashboard. Fee visibility and payment handling depend on the platform
                                                settings enabled for your account.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEight">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseEight">
                                        Can I use the platform on mobile?
                                    </a>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    aria-labelledby="headingEight" data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes. PriGina Global Telemed can be accessed from supported mobile browsers,
                                                so you can review bookings, update availability, and manage your profile
                                                while away from your desk.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingNine">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false"
                                        aria-controls="collapseNine">
                                        How do I update my professional profile?
                                    </a>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                    data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>You can update your biography, specialty, experience, profile photo,
                                                availability, and other professional details from your doctor dashboard.
                                                Some changes may require review before appearing publicly.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTen">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false"
                                        aria-controls="collapseTen">
                                        What should I do if I cannot attend a scheduled consultation?
                                    </a>
                                </h2>
                                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                    data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>If you are unavailable, update your schedule as early as possible and use
                                                the platform workflow to reschedule or notify the patient according to the
                                                consultation policy.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /FAQ Section -->
@endsection
