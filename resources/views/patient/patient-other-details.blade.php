<?php $page = 'patient-other-details'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Onboarding Email -->
    <div class="onboard-wrapper">
        <div class="left-panel">
            <div class="onboarding-logo text-center">
                <a href="{{ url('index') }}"><img src="{{ URL::asset('build/img/onboard-img/onb-logo.png') }}"
                        class="img-fluid" alt="doccure-logo"></a>
            </div>
            <div class="onboard-img">
                <img src="{{ URL::asset('build/img/onboard-img/onb-slide-img.png') }}" class="img-fluid" alt="onboard-slider">
            </div>
            <div class="onboarding-slider">
                <!-- Slider -->
                <div id="onboard-slider" class="owl-carousel owl-theme onboard-slider slider">
                    <!-- Slider Item -->
                    <div class="onboard-item text-center">
                        <div class="onboard-content">
                            <h3>Welcome to PriGina Global Telemed</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                            </p>
                        </div>
                    </div>
                    <!-- /Slider Item -->
                    <!-- Slider Item -->
                    <div class="onboard-item text-center">
                        <div class="onboard-content">
                            <h3>Welcome to PriGina Global Telemed</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                            </p>
                        </div>
                    </div>
                    <!-- /Slider Item -->
                    <!-- Slider Item -->
                    <div class="onboard-item text-center">
                        <div class="onboard-content">
                            <h3>Welcome to PriGina Global Telemed</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                            </p>
                        </div>
                    </div>
                    <!-- /Slider Item -->

                </div>
                <!-- /Slider -->
            </div>
        </div>
        <div class="right-panel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div class="right-panel-title text-center">
                            <a href="{{ url('index') }}"> <img
                                    src="{{ URL::asset('./build/img/onboard-img/onb-logo.png') }}" alt="doccure-logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="on-board-wizard">
                            <ul>
                                <li>
                                    <a href="{{ url('patient-email') }}">
                                        <div class="onboarding-progress active">
                                            <span>1</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Registration</h6>
                                            <p>Enter Details for Register </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('patient-personalize') }}">
                                        <div class="onboarding-progress active">
                                            <span>2</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Profile Picture</h6>
                                            <p>Upload Profile picture</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('patient-details') }}">
                                        <div class="onboarding-progress active">
                                            <span>3</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Personal Details</h6>
                                            <p>Enter your Personal Details</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('patient-family-details') }}">
                                        <div class="onboarding-progress active">
                                            <span>4</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Select Members</h6>
                                            <p>Enter Details for Register </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('patient-dependant-details') }}">
                                        <div class="onboarding-progress active">
                                            <span>5</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Dependant details</h6>
                                            <p>Dependants Profile</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('patient-other-details') }}">
                                        <div class="onboarding-progress active">
                                            <span>6</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Other Detail</h6>
                                            <p>More information</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="onboarding-content-box content-wrap">
                            <div class="onborad-set">
                                <div class="onboarding-title">
                                    <h2>Other Details<span>*</span></h2>
                                    <h6>Please fill the details below</h6>
                                </div>
                                <div class="onboarding-content passcode-wrap mail-box">
                                    <div class="row">
                                        <form method="post">
                                            <div class="col-lg-12">
                                                <div class="mb-3 ">
                                                    <div class="input-placeholder form-focus passcode-wrap">
                                                        <label class="focus-label">Enter Address</label>
                                                        <input type="text" class="form-control floating" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <select class="select">
                                                        <option disabled selected>Select City</option>
                                                        <option>New York</option>
                                                        <option>Los Angeles</option>
                                                        <option>Chicago</option>
                                                        <option>Houston</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <select class="select">
                                                        <option disabled selected>Select State</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Hawaii</option>
                                                        <option>Georgia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <select class="select">
                                                        <option disabled selected>Select Country</option>
                                                        <option>Argentina</option>
                                                        <option>Brazil</option>
                                                        <option>Chile</option>
                                                        <option>Egypt</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3 ">
                                                    <div class="form-floating input-placeholder passcode-wrap">
                                                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 135px"></textarea>
                                                        <label for="floatingTextarea2">Other Information</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="onboarding-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#profile-completed">Continue</a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade fade-custom" id="profile-completed" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog id-upload modal-dialog-centered">
                                    <div class="modal-content id-pop-content">
                                        <div class="modal-header id-pop-header justify-content-center">
                                            <img src="{{ URL::asset('./build/img/icons/success-tick.svg') }}"
                                                alt="success-tick">
                                        </div>
                                        <div class="modal-body id-pop-body text-center">
                                            <h3>Thank you</h3>
                                            <span> Mr.Dennis</span>
                                            <p class="pb-0">your Account has been completed successfully</p>
                                        </div>
                                        <div class="modal-footer id-pop-footer text-center">
                                            <div class="onboarding-btn pop-btn ">
                                                <a href="{{ url('patient-dashboard') }}">Go to Dashboard</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Onboarding Email -->
@endsection
