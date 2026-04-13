<?php $page = 'booking-success'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Bookings', 'li_1' => 'Booking Success', 'li_2' => 'Booking Success'])
    @endcomponent

    <!-- Page Content -->
    <div class="content success-page-cont">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <!-- Success Card -->
                    <div class="card success-card">
                        <div class="card-body">
                            <div class="success-cont">
                                <i class="fas fa-check"></i>
                                <h3>Appointment booked Successfully!</h3>
                                <p>Appointment booked with <strong>{{ $appointment['doctorName'] }}</strong><br> on <strong>{{ $appointment['date'] }}</strong> at <strong>
                                    {{ $appointment['patientLocalTime'] }}</strong></p>
                                <a href="{{url('index')}}" class="btn btn-primary view-inv-btn">Back to Home</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Success Card -->

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->
@endsection