<?php $page = 'error-500'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Error 500 -->
    <div class="container-fluid p-0">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-8 col-md-12 text-center">
                    <div class="error-info">
                        <div class="error-404-img">
                            <img src="{{URL::asset('build/img/error-500.png')}}" class="img-fluid" alt="error-500-image">
                            <div class="error-content">
                                <h5 class="mb-2">Oops! That Page Can’t Be Found.</h5>
                                <p>The page you are looking for was never existed.</p>
                                <a href="{{url('index')}}" class="btn btn-primary-gradient btn-sm">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Error 500 -->
@endsection