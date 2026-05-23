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
                    <img class="img-fluid" src="{{ asset('build/img/logo.webp')}}" alt="Logo">
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

                     
                        <!-- /Social Login -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
