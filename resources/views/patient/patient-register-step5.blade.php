<?php $page = 'patient-register-step5'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content login-page pt-0">
        <div class="container-fluid">

            <!-- Register Content -->
            <div class="account-content">
                <div class="d-flex align-items-center">
                    <div class="login-right">
                        <div class="inner-right-login">
                            <div class="login-header">
                                <div class="logo-icon">
                                    <img src="{{ URL::asset('build/img/logo.png') }}" alt="doccure-logo">
                                </div>
                                <div class="step-list">
                                    <ul>
                                        <li><a href="#" class="active-done">1</a></li>
                                        <li><a href="#" class="active-done">2</a></li>
                                        <li><a href="#" class="active-done">3</a></li>
                                        <li><a href="#" class="active-done">4</a></li>
                                        <li><a href="#" class="active">5</a></li>
                                    </ul>
                                </div>
                                <form method="post">
                                    <h3 class="my-4">Your Location</h3>
                                    <div class="mb-3">
                                        <label class="mb-2">Select City</label>
                                        <select class="form-select form-control" id="heart_rate" name="heart_rate"
                                            tabindex="-1" aria-hidden="true">
                                            <option value="">Select Your City</option>
                                            <option value="1">City 1</option>
                                            <option value="2">City 2</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-2">Select State</label>
                                        <select class="form-select form-control" id="bp" name="bp"
                                            tabindex="-1" aria-hidden="true">
                                            <option value="">Select Your State</option>
                                            <option value="1">State 1</option>
                                            <option value="2">State 2</option>
                                        </select>
                                    </div>

                                    <div class="mt-5">
                                        <a href="{{ url('patient-dashboard') }}"
                                            class="btn btn-primary w-100 btn-lg login-btn step5_submit">continue </a>
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
