<?php $page = 'patient-register-step3'; ?>
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
                                        <li><a href="#" class="active">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                    </ul>
                                </div>
                                <form method="post">
                                    <div class="text-start mt-2">
                                        <p>Who all you want to cover in health insurance</p>
                                        <h4 class="mt-3">Select Members</h4>
                                    </div>
                                    <div class="checklist-col pregnant-col">
                                        <div class="remember-me-col d-flex justify-content-between">
                                            <span class="mt-1">Self</span>
                                            <label class="custom_check mb-3">
                                                <input type="checkbox" class="form-control" name="self" id="self"
                                                    value="1" checked="">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="remember-me-col d-flex justify-content-between">
                                            <span class="mt-1">Spouse</span>
                                            <label class="custom_check mb-3">
                                                <input type="checkbox" class="form-control" name="spouse" id="spouse"
                                                    value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="remember-me-col d-flex justify-content-between">
                                            <span class="mt-1">Child</span>
                                            <div class="increment-decrement mt-3">
                                                <div class="input-groups">
                                                    <input type="button" value="-" id="subs"
                                                        class="button-minus dec button">
                                                    <input type="text" name="child" id="child" value="0"
                                                        class="quantity-field">
                                                    <input type="button" value="+" id="adds"
                                                        class="button-plus inc button a1 a2 a3 a4 a0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="remember-me-col d-flex justify-content-between">
                                            <span class="mt-1">Mother</span>
                                            <label class="custom_check mb-3">
                                                <input type="checkbox" class="form-control" name="mother" id="mother"
                                                    value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="remember-me-col d-flex justify-content-between">
                                            <span class="mt-1">Father</span>
                                            <label class="custom_check mb-3">
                                                <input type="checkbox" class="form-control" name="father" id="father"
                                                    value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <a href="{{ url('patient-register-step4') }}"
                                            class="btn btn-primary w-100 btn-lg login-btn step3_submit">continue </a>
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
