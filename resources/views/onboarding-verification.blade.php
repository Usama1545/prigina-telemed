<?php $page = 'onboarding-verification'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Onboarding Verification -->
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
                                    <a href="{{ url('onboarding-email') }}">
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
                                    <a href="{{ url('onboarding-identity') }}">
                                        <div class="onboarding-progress active">
                                            <span>2</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Upload Identity</h6>
                                            <p>Upload your Identity for Verification</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('onboarding-personalize') }}">
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
                                    <a href="{{ url('onboarding-verification') }}">
                                        <div class="onboarding-progress active">
                                            <span>4</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Doctor Verification</h6>
                                            <p>Upload Documents for the Verification</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('onboarding-payments') }}">
                                        <div class="onboarding-progress ">
                                            <span>5</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Payment details</h6>
                                            <p>Setup Your Payment Details</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('onboarding-preferences') }}">
                                        <div class="onboarding-progress ">
                                            <span>6</span>
                                        </div>
                                        <div class="onboarding-list">
                                            <h6>Preferences</h6>
                                            <p>Setup Your Preferences for your Account</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="onboarding-content-box">
                            <div class="onboarding-title">
                                <h2>Doctor Verification<span>*</span></h2>
                                <h6>Please provide the details below and attach copies for your:</h6>
                            </div>
                            <div class="onboarding-content passcode-wrap mail-box">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="verify-box">
                                            <ul class="verify-list">
                                                <li class="verify-item">Certificate of Registration with the Maltese
                                                    Medical Council OR Registration from the appropriate Professional
                                                    Council</li>
                                                <li class="verify-item">Certificate of Good Standing (from the Maltese
                                                    Medical Council - valid for 3 months from the date of issue).
                                                    Doctors applying from overseas are to provide a Certificate of Good
                                                    Standing issued from the most recent country of residence / practise
                                                    (valid for 3 months from the date of issue) (only applicable for
                                                    Medical Doctors)</li>
                                                <li class="verify-item">Curriculum Vitae</li>
                                                <li class="verify-item">Specialist Registration Certificate</li>
                                                <li class="verify-item">Digital signature: copy of the signature and
                                                    registration number</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 mt-4">
                                            <label class="onboarding-lable">Medical council registration number
                                                <span>*</span></label>
                                            <input type="text" placeholder="Medical council registration number"
                                                class="form-control placeholder-style" required="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="call-option file-option ">
                                                <input type="file" id="radio1" name="selector" class="option-radio">
                                                <label for="radio1" class="call-lable verify-lable verify-file"> <img
                                                        src="{{ URL::asset('./build/img/icons/file.png') }}"
                                                        alt="file-icon">Upload Document</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3 mt-4">
                                            <label class="onboarding-lable">Area of Specialisation<span>*</span></label>
                                            <select class="select">
                                                <option selected disabled>Select Area of Specialisation</option>
                                                <option>Surgery</option>
                                                <option>Heart</option>
                                                <option>Ortho</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="onboarding-btn Personalize-btn">
                                <a href="{{ url('onboarding-payments') }}">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Onboarding Verification -->
@endsection
