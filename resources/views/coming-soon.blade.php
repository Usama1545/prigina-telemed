<?php $page = 'coming-soon'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Coming Soon -->
    <div class="container-fluid p-0">
        <div class="w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
                <div class="col-lg-8 col-md-12 text-center">
                    <div class="error-info">
                        <div class="error-404-img">
                            <img src="{{URL::asset('build/img/coming-soon.png')}}" class="img-fluid" alt="error-500-image">
                            <div class="error-content">
                                <h5 class="mb-2">We’re getting ready to launch</h5>
                                <p>We'll be here soon with our new awesome site, subscribe to be notified.</p>
                            </div>
                            <div class="coming-soon-info">
                                <div class="coming-soon-count">
                                    <h4 id="day-box">5</h4>
                                    <p>Days</p>
                                </div>
                                <div class="coming-soon-count">
                                    <h4 id="hr-box">8</h4>
                                    <p>Hours</p>
                                </div>
                                <div class="coming-soon-count">
                                    <h4 id="min-box">48</h4>
                                    <p>Minutes</p>
                                </div>
                                <div class="coming-soon-count">
                                    <h4 id="sec-box">20</h4>
                                    <p>Seconds</p>
                                </div>
                            </div>
                            <a href="{{url('index')}}" class="btn btn-primary-gradient btn-sm">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Coming Soon -->
@endsection