<?php $page = 'patient-dependant-details'; ?>
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
                                    <h2>Dependant details<span>*</span></h2>
                                    <h6>Add age & Photo of the each members</h6>
                                </div>
                                <div class="onboarding-content passcode-wrap mail-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapseOne"
                                                            aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                                            Child
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseOne"
                                                        class="accordion-collapse collapse show"
                                                        aria-labelledby="panelsStayOpen-headingOne">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 ">
                                                                        <div
                                                                            class="passcode-wrap input-placeholder form-focus">
                                                                            <label class="focus-label">Name</label>
                                                                            <input type="text"
                                                                                class="form-control floating"
                                                                                required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 ">
                                                                        <div
                                                                            class="passcode-wrap input-placeholder form-focus">
                                                                            <label class="focus-label">Age
                                                                                <span>*</span></label>
                                                                            <input type="text"
                                                                                class="form-control floating"
                                                                                required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <div class="relative-form">
                                                                            <span>Upload Photo</span>
                                                                            <label class="relative-file-upload">
                                                                                File Upload <input type="file">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapseTwo"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseTwo">
                                                            Spouse
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseTwo"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingTwo">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 ">
                                                                        <div
                                                                            class="passcode-wrap input-placeholder form-focus">
                                                                            <label class="focus-label">Name</label>
                                                                            <input type="text"
                                                                                class="form-control floating"
                                                                                required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 ">
                                                                        <div
                                                                            class="passcode-wrap input-placeholder form-focus">
                                                                            <label class="focus-label">Age
                                                                                <span>*</span></label>
                                                                            <input type="text"
                                                                                class="form-control floating"
                                                                                required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <div class="relative-form">
                                                                            <span>Upload Photo</span>
                                                                            <label class="relative-file-upload">
                                                                                File Upload <input type="file">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapseThree"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapseThree">
                                                            Father
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseThree"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingThree">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 ">
                                                                        <div
                                                                            class="passcode-wrap input-placeholder form-focus">
                                                                            <label class="focus-label">Name</label>
                                                                            <input type="text"
                                                                                class="form-control floating"
                                                                                required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 ">
                                                                        <div
                                                                            class="passcode-wrap input-placeholder form-focus">
                                                                            <label class="focus-label">Age
                                                                                <span>*</span></label>
                                                                            <input type="text"
                                                                                class="form-control floating"
                                                                                required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <div class="relative-form">
                                                                            <span>Upload Photo</span>
                                                                            <label class="relative-file-upload">
                                                                                File Upload <input type="file">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingfour">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#panelsStayOpen-collapsefour"
                                                            aria-expanded="false"
                                                            aria-controls="panelsStayOpen-collapsefour">
                                                            Mother
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapsefour"
                                                        class="accordion-collapse collapse"
                                                        aria-labelledby="panelsStayOpen-headingfour">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 ">
                                                                        <div
                                                                            class="passcode-wrap input-placeholder form-focus">
                                                                            <label class="focus-label">Name</label>
                                                                            <input type="text"
                                                                                class="form-control floating"
                                                                                required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 ">
                                                                        <div
                                                                            class="passcode-wrap input-placeholder form-focus">
                                                                            <label class="focus-label">Age
                                                                                <span>*</span></label>
                                                                            <input type="text"
                                                                                class="form-control floating"
                                                                                required="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <div class="relative-form">
                                                                            <span>Upload Photo</span>
                                                                            <label class="relative-file-upload">
                                                                                File Upload <input type="file">
                                                                            </label>
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
                            </div>
                            <div class="onboarding-btn">
                                <a href="{{ url('patient-other-details') }}">Continue</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Onboarding Email -->
@endsection
