<?php $page = 'lock-screen'; ?>
@extends('admin.layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{URL::asset('build/admin/img/logo.png')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <div class="lock-user">
                            <img class="rounded-circle" src="{{URL::asset('build/admin/img/profiles/avatar-02.jpg')}}" alt="User Image">
                            <h4>John Doe</h4>
                        </div>

                        <!-- Form -->
                        <form action="{{url('admin/index')}}">
                            <div class="mb-3">
                                <input class="form-control" type="text" placeholder="Password">
                            </div>
                            <div class="mb-0">
                                <button class="btn btn-primary w-100" type="submit">Enter</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="text-center dont-have">Sign in as a different user? <a href="{{url('admin/login')}}">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
