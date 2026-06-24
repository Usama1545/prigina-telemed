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
                                    <h3>{{ __('app.forgot_password.headline') }}</h3>
                                    <p>{{ __('app.forgot_password.desc') }}</p>
                                </div>

                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>
                                @endif

                                <form action="{{ route('forgot-password.email') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('app.forgot_password.email') }}</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <button class="btn btn-primary-gradient w-100" type="submit">{{ __('app.forgot_password.submit') }}</button>
                                    </div>
                                    <div class="account-signup">
                                        <p>{{ __('app.forgot_password.remember_password') }} <a href="{{ url('login') }}">{{ __('app.forgot_password.sign_in') }}</a></p>
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
