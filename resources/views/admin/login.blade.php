<?php $page = 'login'; ?>
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
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <!-- Form -->
                        <form action="{{url('admin/index')}}">
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Password">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="text-center forgotpass"><a href="{{url('admin/forgot-password')}}">Forgot Password?</a></div>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <!-- Social Login -->
                        <div class="social-login">
                            <span>Login with</span>
                            <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a><a href="#" class="google"><i class="fa-brands fa-google"></i></a>
                        </div>
                        <!-- /Social Login -->

                        <div class="text-center dont-have">Don’t have an account? <a href="{{url('admin/register')}}">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
