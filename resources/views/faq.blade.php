<?php $page = 'faq'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'FAQ', 'li_2' => 'FAQ'])
    @endcomponent

    <!-- FAQ Section -->
    <section class="faq-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-inner-header text-center">
                        <h2>Frequently Asked Questions</h2>
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
                                        How do I book an appointment?
                                    </a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        Can i make an Appointment Online with White Plains Hospital Kendi?
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        Is my personal information secure?
                                    </a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        Can I cancel or reschedule my appointment?
                                    </a>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        How do I find a specific doctor or specialist?
                                    </a>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        Can I book appointments for family members through my account?
                                    </a>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        Is my payment information secure?
                                    </a>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    aria-labelledby="headingSeven" data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        Can I use PriGina Global Telemed on my mobile device?
                                    </a>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    aria-labelledby="headingEight" data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        How can I change my password or update my account information?
                                    </a>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                    data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
                                        What happens if my chosen doctor is unavailable for the selected time?
                                    </a>
                                </h2>
                                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                    data-bs-parent="#faq-details-info">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
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
