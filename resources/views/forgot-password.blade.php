<?php $page = 'forgot-password'; ?>
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
                                    <h3>Forgot Password</h3>
                                    <p>Enter your email and we will send you a link to reset your password.</p>
                                </div>
                                <form action="{{ url('login') }}">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email">
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary-gradient w-100" type="submit">Submit</button>
                                    </div>
                                    <div class="account-signup">
                                        <p>Remember Password? <a href="{{ url('login') }}">Sign In</a></p>
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
