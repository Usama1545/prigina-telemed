<?php $page = 'booking-success'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', [
        'title' => __('app.booking.bookings'),
        'li_1' => __('app.booking.booking_success_crumb'),
        'li_2' => __('app.booking.booking_success_crumb'),
    ])
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
                                <h3>{{ __('app.booking.booked_successfully') }}</h3>
                                <p>{!! __('app.booking.booked_with_on_at', [
                                    'doctor' => '<strong>' . e($appointment['doctorName']) . '</strong>',
                                    'date' => '<strong>' . e(\Carbon\Carbon::parse($appointment['date'])->translatedFormat('M d, Y')) . '</strong>',
                                    'time' => '<strong>' . e($appointment['patientLocalTime']) . '</strong>',
                                ]) !!}</p>
                                <a href="{{ route('patient.appointments') }}" class="btn btn-primary view-inv-btn">{{ __('app.booking.view_appointments') }}</a>
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
