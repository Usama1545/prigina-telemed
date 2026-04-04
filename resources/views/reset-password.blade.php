<?php $page = 'reset-password'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="login-content-info">
        <div class="container">

            <!-- Reset Password -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="account-content">
                        <div class="login-shapes">
                            <div class="shape-img-left">
                                <img src="{{URL::asset('build/img/shape-01.png')}}" alt="shape-image">
                            </div>
                            <div class="shape-img-right">
                                <img src="{{URL::asset('build/img/shape-02.png')}}" alt="shape-image">
                            </div>
                        </div>
                        <div class="account-info">
                            <div class="login-back">
                                <a href="{{url('index')}}"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                            </div>
                            <div class="login-title">
                                <h3>Reset Password</h3>
                                <p>Your new password must be different from previous used passwords.</p>
                            </div>
                            <form action="#">
                                <div class="mb-3">
                                    <label class="mb-2">New Password</label>
                                    <div class="pass-group" id="passwordInput">
                                        <input type="password" class="form-control pass-input" placeholder="*************">
                                        <span class="toggle-password feather-eye-off"></span>
                                        <span class="pass-checked"><i class="feather-check"></i></span>
                                    </div>
                                    <div class="password-strength" id="passwordStrength">
                                        <span id="poor"></span>
                                        <span id="weak"></span>
                                        <span id="strong"></span>
                                        <span id="heavy"></span>
                                    </div>
                                    <div id="passwordInfo"></div>
                                    <div class="password-info">
                                        <p>Use 8 or more characters with a mix of letters, numbers & symbols.</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input-sub"
                                            placeholder="*************">
                                        <span class="feather-eye-off toggle-password-sub"></span>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button class="btn btn-primary w-100" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Reset Password -->

        </div>
    </div>
    <!-- /Page Content -->
@endsection