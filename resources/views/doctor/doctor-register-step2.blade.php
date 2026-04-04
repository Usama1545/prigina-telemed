<?php $page = 'doctor-register-step2'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content login-page pt-0">
        <div class="container-fluid">

            <!-- Register Content -->
            <div class="account-content">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="login-right">
                        <div class="inner-right-login">
                            <div class="login-header">
                                <div class="logo-icon">
                                    <img src="{{ URL::asset('build/img/logo.png') }}" alt="doccure-logo">
                                </div>
                                <div class="step-list">
                                    <ul>
                                        <li><a href="#" class="active-done">1</a></li>
                                        <li><a href="#" class="active">2</a></li>
                                        <li><a href="#">3</a></li>
                                    </ul>
                                </div>
                                <form id="personal_details" enctype="multipart/form-data">
                                    <div class="text-start mt-2">
                                        <h4 class="mt-3">Select Your Gender</h4>
                                    </div>
                                    <div class="select-gender-col">
                                        <div class="row">
                                            <div class="col-6 pe-2">
                                                <input type="radio" id="test1" name="gender" checked=""
                                                    value="Male">
                                                <label for="test1">
                                                    <span class="gender-icon"><img
                                                            src="{{ URL::asset('build/img/icons/male.png') }}"
                                                            alt="male-icon"></span>
                                                    <span>Male</span>
                                                </label>
                                            </div>
                                            <div class="col-6 ps-2">
                                                <input type="radio" id="test2" name="gender" value="Female">
                                                <label for="test2">
                                                    <span class="gender-icon"><img
                                                            src="{{ URL::asset('build/img/icons/female.png') }}"
                                                            alt="female-icon"></span>
                                                    <span>Female</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pregnant-col pt-4">
                                        <div>
                                            <div class="remember-me-col d-flex justify-content-between">
                                                <span class="mt-1">Are you Registered?</span>
                                                <label class="custom_check">
                                                    <input type="checkbox" class="form-control" id="is_registered"
                                                        name="isregistered" value="1">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-process-col mt-4">
                                        <div class="mb-3" id="preg_div" style="display: none;">
                                            <label class="mb-2">How many years have you been registered?</label>
                                            <select class="form-select form-control" id="register_years"
                                                name="register_years" tabindex="-1" aria-hidden="true">
                                                <option value="">Select year</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10+">10+</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Registered Clinic address</label>
                                            <input type="text" name="address" class="form-control" id="address">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Address 2</label>
                                            <input type="text" name="address2" class="form-control" id="address2">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Pincode / Zipcoode</label>
                                            <input type="text" name="zipcode" class="form-control" id="zipcode">
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-2">Certification and Employer</label>
                                            <div class="row justify-content-center">
                                                <div class="col-12 col-md-6 d-flex">
                                                    <div class="profile-pic-upload d-flex flex-wrap justify-content-center">
                                                        <div class="cam-col">
                                                            <img src="{{ URL::asset('build/img/icons/camera.svg') }}"
                                                                alt="camera-image">
                                                        </div>
                                                        <span class="text-center">Upload Rigth To sell Certigifcate</span>
                                                        <input type="file" id="quali_certificate"
                                                            name="quali_certificate">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 d-flex">
                                                    <div
                                                        class="profile-pic-upload d-flex flex-wrap justify-content-center">
                                                        <div class="cam-col">
                                                            <img src="{{ URL::asset('build/img/icons/camera.svg') }}"
                                                                alt="camera-image">
                                                        </div>
                                                        <span class="text-center">Upload Photo ID</span>
                                                        <input type="file" id="photo_id" name="photo_id">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6 d-flex">
                                                    <div
                                                        class="profile-pic-upload d-flex flex-wrap justify-content-center">
                                                        <div class="cam-col">
                                                            <img src="{{ URL::asset('build/img/icons/camera.svg') }}"
                                                                alt="camera-image">
                                                        </div>
                                                        <span class="text-center">Upload Clinical employment</span>
                                                        <input type="file" id="clinical_employment"
                                                            name="clinical_employment">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Your Weight</label>
                                            <div class="row">
                                                <div class="col-7 pe-2">
                                                    <input type="text" class="form-control" name="weight"
                                                        id="weight">
                                                </div>
                                                <div class="col-5 ps-2">
                                                    <select class="form-select form-control" id="weight_unit"
                                                        name="weight_unit" tabindex="-1" aria-hidden="true">
                                                        <option value="kg">Kg</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Your Height</label>
                                            <div class="row">
                                                <div class="col-7 pe-2">
                                                    <input type="text" class="form-control" id="height">
                                                </div>
                                                <div class="col-5 ps-2">
                                                    <select class="form-select form-control" id="height_unit"
                                                        name="height_unit" tabindex="-1" aria-hidden="true">
                                                        <option value="cm">cm</option>
                                                        <option value="ft">ft</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Your Age</label>
                                            <input type="text" name="age" class="form-control" id="age">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Blood Type</label>
                                            <select class="form-select form-control" id="blood_group" name="blood_group"
                                                tabindex="-1" aria-hidden="true">
                                                <option value="">Select your blood group</option>
                                                <option value="A-">A-</option>
                                                <option value="A+">A+</option>
                                                <option value="B-">B-</option>
                                                <option value="B+">B+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <a href="{{ url('doctor-register-step3') }}"
                                            class="btn btn-primary w-100 btn-lg login-btn step2_submit">continue </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="login-bottom-copyright">
                            <span>© 2024 PriGina Global Telemed. All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Register Content -->

        </div>

    </div>
    <!-- /Page Content -->
@endsection
