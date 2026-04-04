<?php $page = 'login'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ URL::asset('build/img/login-banner.png') }}" class="img-fluid"
                                    alt="PriGina Global Telemed Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Login <span>PriGina Global Telemed</span></h3>
                                </div>
                                <form action="{{ url('index') }}">
                                    <div class="mb-3">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group-flex">
                                            <label class="form-label">Password</label>
                                            <a href="{{ url('forgot-password') }}" class="forgot-link">Forgot password?</a>
                                        </div>
                                        <div class="pass-group">
                                            <input type="password" class="form-control pass-input">
                                            <span class="feather-eye-off toggle-password"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-check-box">
                                        <div class="form-group-flex">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" id="remember" checked>
                                                <label class="form-check-label" for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" id="remember1">
                                                <label class="form-check-label" for="remember1">
                                                    Login with OTP
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary-gradient w-100" type="submit">Sign in</button>
                                    </div>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="social-login-btn">
                                        <a href="javascript:void(0);" class="btn w-100">
                                            <img src="{{ URL::asset('build/img/icons/google-icon.svg') }}"
                                                alt="google-icon">Sign in With Google
                                        </a>
                                        <a href="javascript:void(0);" class="btn w-100">
                                            <img src="{{ URL::asset('build/img/icons/facebook-icon.svg') }}"
                                                alt="fb-icon">Sign in With Facebook
                                        </a>
                                    </div>
                                    <div class="account-signup">
                                        <p>Don't have an account ? <a href="{{ url('register') }}">Sign up</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
