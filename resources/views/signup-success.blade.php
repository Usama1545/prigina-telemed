<?php $page = 'signup-success'; ?>
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
                            <div class="login-verify-img">
                                <i class="isax isax-tick-circle"></i>
                            </div>
                            <div class="login-title">
                                <h3>Success</h3>
                                <p>Your new password has been Successfully saved</p>
                            </div>
                            <form action="{{url('login-email')}}">
                                <div class="mb-3">
                                    <button class="btn btn-primary-gradient w-100" type="submit">Sign In</button>
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