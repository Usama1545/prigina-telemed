<?php $page = 'mobile-otp'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="login-content-info">
        <div class="container">

            <!-- Login Phone Otp -->
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="account-content">
                        <div class="account-info">
                            <div class="login-verify-img">
                                <i class="isax isax-mobile"></i>
                            </div>
                            <div class="login-title">
                                <h3>Phone OTP</h3>
                                <p class="mb-0">OTP sent to your mobile number ending ******9575</p>
                            </div>
                            <form method="get" class="digit-group login-form-control" data-group-name="digits"
                                data-autosubmit="false" autocomplete="off" action="{{url('doctor-dashboard')}}">
                                <div class="otp-box">
                                    <div class="mb-3">
                                        <input type="text" id="digit-1" name="digit-1" data-next="digit-2" maxlength="1">
                                        <input type="text" id="digit-2" name="digit-2" data-next="digit-3"
                                            data-previous="digit-1" maxlength="1">
                                        <input type="text" id="digit-3" name="digit-3" data-next="digit-4"
                                            data-previous="digit-2" maxlength="1">
                                        <input type="text" id="digit-4" name="digit-4" data-next="digit-5"
                                            data-previous="digit-3" maxlength="1">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="otp-info">
                                        <div class="otp-code">
                                            <p>Didn't receive OTP code? <a href="javascript:void(0);">Resend Code</a></p>
                                        </div>
                                        <div class="otp-sec">
                                            <p><i class="isax isax-clock"></i>00:59 secs</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="reset-btn">
                                    <button class="btn btn-primary-gradient w-100" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Login Phone Otp -->

        </div>
    </div>
    <!-- /Page Content -->
@endsection