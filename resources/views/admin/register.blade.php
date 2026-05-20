<?php $page = 'register'; ?>
@extends('admin.layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{URL::asset('build/admin/img/logo-white.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Form -->
                        <form action="{{url('admin/login')}}">
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Confirm Password">
                            </div>
                            <div class="mb-0">
                                <button class="btn btn-primary w-100" type="submit">Register</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <!-- Social Login -->
                        <div class="social-login">
                            <span>Register with</span>
                            <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a><a href="#" class="google"><i class="fa-brands fa-google"></i></a>
                        </div>
                        <!-- /Social Login -->

                        <div class="text-center dont-have">Already have an account? <a href="{{url('admin/login')}}">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
