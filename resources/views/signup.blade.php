<?php $page = 'signup'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="login-content-info">
        <div class="container">

            <!-- Signup -->
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="account-content">
                        <div class="account-info">
                            <div class="login-title">
                                <h3>Signup</h3>
                            </div>
                            <div class="signup-option-btns">
                                <a href="{{ url('doctor-signup') }}" class="signup-btn-info">
                                    <div class="signup-info">
                                        <div class="signup-icon">
                                            <img src="{{ URL::asset('build/img/icons/doctor-icon.svg') }}"
                                                alt="doctor-icon">
                                        </div>
                                        <div class="signup-content">
                                            <h4>Doctor</h4>
                                            <p>Join PriGina Global Telemed and Expand Your Practice</p>
                                        </div>
                                    </div>
                                    <div class="signup-arrow">
                                        <i class="isax isax-arrow-right-1"></i>
                                    </div>
                                </a>
                                <a href="{{ url('patient-signup') }}" class="signup-btn-info">
                                    <div class="signup-info">
                                        <div class="signup-icon">
                                            <img src="{{ URL::asset('build/img/icons/patient-icon.svg') }}"
                                                alt="patient-icon">
                                        </div>
                                        <div class="signup-content">
                                            <h4>Patient</h4>
                                            <p>Join PriGina Global Telemed and Take Control of Your Health</p>
                                        </div>
                                    </div>
                                    <div class="signup-arrow">
                                        <i class="isax isax-arrow-right-1"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Signup -->

        </div>
    </div>
    <!-- /Page Content -->
@endsection
