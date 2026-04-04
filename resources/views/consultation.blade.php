<?php $page = 'consultation'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="doctor-content">
        <div class="container">

            <!-- Consultation -->
            <div class="row">
                <div class="col-md-12">
                    <div class="back-link">
                        <a href="{{url('patient-details')}}"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="paitent-header">
                        <h4 class="paitent-title">Type of Consultation</h4>
                    </div>
                    <div class="consultation-grid">
                        <div class="consultation-info">
                            <p>Online Consultation</p>
                            <div class="consultation-list">
                                <ul>
                                    <li>
                                        <div class="consultation-types active">
                                            <a href="javascript:void(0);">
                                                <i class="feather-video"></i> Video Consulting
                                            </a>
                                            <span><i class="fas fa-circle-check"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="consultation-types">
                                            <a href="javascript:void(0);">
                                                <i class="feather-mic"></i> Audio Consulting
                                            </a>
                                            <span><i class="fas fa-circle-check"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="consultation-types">
                                            <a href="javascript:void(0);">
                                                <i class="feather-message-square"></i> Chat Consulting
                                            </a>
                                            <span><i class="fas fa-circle-check"></i></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="consultation-info">
                            <p>Home Visit</p>
                            <div class="consultation-list">
                                <ul>
                                    <li>
                                        <div class="consultation-types">
                                            <a href="javascript:void(0);">
                                                <i class="feather-home"></i> Home Visit
                                            </a>
                                            <span><i class="fas fa-circle-check"></i></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="consultation-types">
                                            <a href="javascript:void(0);">
                                                <i class="feather-users"></i> Consult Instatly
                                            </a>
                                            <span><i class="fas fa-circle-check"></i></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="booking-btn">
                        <a href="{{url('payment')}}"
                            class="btn btn-primary prime-btn justify-content-center align-items-center">
                            Next <i class="feather-arrow-right-circle"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="booking-header">
                        <h4 class="booking-title">Booking Summary</h4>
                    </div>
                    <div class="card booking-card">
                        <div class="card-body booking-card-body">
                            <div class="booking-doctor-details">
                                <div class="booking-doctor-left">
                                    <div class="booking-doctor-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img src="{{URL::asset('build/img/doctors/doctor-02.jpg')}}" alt="John Doe">
                                        </a>
                                    </div>
                                    <div class="booking-doctor-info">
                                        <h4><a href="{{url('doctor-profile')}}">Dr. John Doe</a></h4>
                                        <p>MBBS, Dentist</p>
                                    </div>
                                </div>
                                <div class="booking-doctor-right">
                                    <p>
                                        <i class="fas fa-circle-check"></i>
                                        <a href="{{url('doctor-profile-settings')}}">Edit</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card booking-card">
                        <div class="card-body booking-card-body booking-list-body">
                            <div class="booking-list">
                                <div class="booking-date-list">
                                    <ul>
                                        <li>Booking Date: <span>Sun, 30 Aug 2023</span></li>
                                        <li>Booking Time: <span>10.00AM to 11:00AM</span></li>
                                    </ul>
                                </div>
                                <div class="booking-doctor-right">
                                    <p>
                                        <a href="{{url('booking')}}">Edit</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card booking-card">
                        <div class="card-body booking-card-body">
                            <div class="booking-doctor-details">
                                <div class="booking-doctor-left">
                                    <div class="booking-doctor-img">
                                        <a href="javascript:void(0);">
                                            <img src="{{URL::asset('build/img/patients/patient3.jpg')}}" alt="John Smith">
                                        </a>
                                    </div>
                                    <div class="booking-doctor-info">
                                        <h4><a href="{{url('profile-settings')}}">John Smith</a></h4>
                                        <p>P123456</p>
                                    </div>
                                </div>
                                <div class="booking-doctor-right">
                                    <p>
                                        <a href="{{url('profile-settings')}}">Edit</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card booking-card">
                        <div class="card-body booking-card-body">
                            <div class="booking-doctor-details">
                                <div class="booking-device">
                                    <div class="booking-device-img">
                                        <img src="{{URL::asset('build/img/icons/device-message.svg')}}"
                                            alt="device-message-image">
                                    </div>
                                    <div class="booking-doctor-info">
                                        <h3>We can help you</h3>
                                        <p class="device-text">Call us +1 888-888-8888 (or) chat with our customer support
                                            team.</p>
                                        <a href="{{url('chat')}}" class="btn">Chat With Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card booking-card mb-0">
                        <div class="card-body booking-card-body">
                            <div class="booking-doctor-details">
                                <div class="booking-device">
                                    <div class="booking-device-img">
                                        <img src="{{URL::asset('build/img/icons/smart-phone.svg')}}" alt="smart-phone">
                                    </div>
                                    <div class="booking-doctor-info">
                                        <h3>Get the App</h3>
                                        <p class="device-text">Download our app for better experience and for more feature
                                        </p>
                                        <div class="app-images">
                                            <a href="javascript:void(0);">
                                                <img src="{{URL::asset('build/img/google-img.svg')}}" alt="google-image">
                                            </a>
                                            <a href="javascript:void(0);">
                                                <img src="{{URL::asset('build/img/app-img.svg')}}" alt="app-image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Consultation -->

        </div>
    </div>
    <!-- /Page Content -->
@endsection