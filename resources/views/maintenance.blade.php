<?php $page = 'maintenance'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Maintenance -->
    <div class="container-fluid p-0">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-8 col-md-12 text-center">
                    <div class="error-info">
                        <div class="error-404-img">
                            <img src="{{URL::asset('build/img/maintenance.png')}}" class="img-fluid" alt="error-500-image">
                            <div class="error-content">
                                <h5 class="mb-2">We are Under Maintenance.</h5>
                                <p>Our website is currently undergoing scheduled maintenance, will be right  back in a few minutes.</p>
                                <a href="{{url('index')}}" class="btn btn-primary-gradient btn-sm">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Maintenance -->
@endsection