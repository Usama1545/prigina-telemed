<?php $page = 'onboarding-consultation'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Onboarding Consultation -->
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
                            <img src="{{ URL::asset('./build/img/onboard-img/onb-logo.png') }}" alt="doccure-logo">
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
                                        <div class="onboarding-progress active">
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
                                        <div class="onboarding-progress active">
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
                                <h2>
                                    Which are your preferred means <br> of online consultation?<span>*</span>
                                </h2>
                                <h6>You can select more than one from the below. These will show up as options for the
                                    patient when booking an appointment.</h6>
                            </div>
                            <div class="onboarding-content">
                                <div class="consult-option mb-lg-4 mb-sm-1">
                                    <div class="call-option">
                                        <input type="checkbox" id="radio1" name="selector" class="option-radio" checked>
                                        <label for="radio1" class="call-lable"> <img
                                                src="{{ URL::asset('./build/img/icons/mic-black.svg') }}"
                                                alt="mic-icon">Audio Call</label>
                                    </div>
                                    <div class="call-option">
                                        <input type="checkbox" id="radio2" name="selector" class="option-radio">
                                        <label for="radio2" class="call-lable"><img
                                                src="{{ URL::asset('./build/img/icons/video-icon.svg') }}"
                                                alt="video-icon">Video Call</label>
                                    </div>
                                    <div class="call-option">
                                        <input type="checkbox" id="radio3" name="selector" class="option-radio">
                                        <label for="radio3" class="call-lable"> <img
                                                src="{{ URL::asset('./build/img/icons/ch.svg') }}"
                                                alt="chat-icon">Chat</label>
                                    </div>
                                </div>
                                <div class="onboarding-title">
                                    <h6>Choose your preferred language for Audio, Video calls and chat. You can select
                                        more than one option.</h6>
                                </div>
                                <div class="mb-3">
                                    <label class="onboarding-lable">Language</label>
                                    <select class="select">
                                        <option disabled selected>Choose Your Language</option>
                                        <option>French</option>
                                        <option>English</option>
                                        <option>Spanish</option>
                                    </select>
                                </div>
                                <div class="onboarding-btn Consultation-btn">
                                    <a href="{{ url('onboarding-preferences') }}">Save</a>
                                    <a href="{{ url('onboarding-preferences') }}">Not Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Onboarding Consultation -->
@endsection
