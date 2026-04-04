<?php $page = 'patient-family-details'; ?>
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
                                        <div class="onboarding-progress">
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
                                        <div class="onboarding-progress">
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
                                    <h2>Select Members<span>*</span></h2>
                                    <h6>Who all you want to cover in health insurance</h6>
                                </div>
                                <div class="onboarding-content">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="post">
                                                <div class="checklist-col pregnant-col">
                                                    <div class="remember-me-col d-flex justify-content-between">
                                                        <span class="mt-1">Self</span>
                                                        <label class="custom_check">
                                                            <input type="checkbox" class="form-control" name="self"
                                                                id="self" value="1" checked="">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="remember-me-col d-flex align-items-center justify-content-between">
                                                        <span class="mt-1">Spouse</span>
                                                        <label class="custom_check">
                                                            <input type="checkbox" class="form-control" name="spouse"
                                                                id="spouse" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="remember-me-col d-flex align-items-center justify-content-between">
                                                        <span class="mt-1">Child</span>
                                                        <div class="increment-decrement">
                                                            <div class="input-groups">
                                                                <input type="button" value="-" id="subs"
                                                                    class="button-minus dec button">
                                                                <input type="text" name="child" id="child"
                                                                    value="0" class="quantity-field">
                                                                <input type="button" value="+" id="adds"
                                                                    class="button-plus inc button a1 a2 a3 a4 a0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="remember-me-col d-flex align-items-center justify-content-between">
                                                        <span class="mt-1">Mother</span>
                                                        <label class="custom_check">
                                                            <input type="checkbox" class="form-control" name="mother"
                                                                id="mother" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                    <div
                                                        class="remember-me-col d-flex align-items-center justify-content-between">
                                                        <span class="mt-1">Father</span>
                                                        <label class="custom_check">
                                                            <input type="checkbox" class="form-control" name="father"
                                                                id="father" value="1">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="onboarding-btn">
                                <a href="{{ url('patient-dependant-details') }}">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Onboarding Email -->
@endsection
