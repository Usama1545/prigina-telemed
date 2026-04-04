<?php $page = 'forgot-password2'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="login-content-info">
        <div class="container">

            <!-- Login Phone -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="account-content">
                        <div class="account-info">
                            <div class="login-title">
                                <h3>Forgot Password</h3>
                                <p>Enter your email and we will send you a link to reset your password.</p>
                            </div>
                            <form action="{{url('login-email')}}">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="email">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary-gradient w-100" type="submit">Submit</button>
                                </div>
                                <div class="account-signup">
                                    <p>Remember Password? <a href="{{url('login-email')}}">Sign In</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Login Phone -->

        </div>
    </div>
    <!-- /Page Content -->
@endsection