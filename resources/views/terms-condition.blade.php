<?php $page = 'terms-condition'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'Terms & Conditions', 'li_2' => 'Terms & Conditions'])
    @endcomponent

    <!-- Terms -->
    <div class="terms-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="terms-text">
                        <h6>Introduction</h6>
                        <p>Welcome to PriGina Global Telemed, a platform that allows you to book appointments with
                            healthcare professionals. By using our services, you agree to these Terms & Conditions. Please
                            read them carefully before proceeding.</p>
                    </div>
                    <div class="terms-text terms-list">
                        <h6>Introduction</h6>
                        <ul>
                            <li>You must be at least 18 years old to use this website or have parental/guardian consent.
                            </li>
                            <li>Ensure that all information provided is accurate and up-to-date.</li>
                            <li>You are responsible for maintaining the confidentiality of your account and password.</li>
                        </ul>
                    </div>
                    <div class="terms-text terms-list">
                        <h6>Booking Appointments</h6>
                        <ul>
                            <li>Appointments are booked in real-time, subject to availability.</li>
                            <li>Users are responsible for attending the scheduled appointments or canceling in a timely
                                manner.</li>
                            <li>Cancellations should be made before the appointment to avoid any penalties.</li>
                        </ul>
                    </div>
                    <div class="terms-text terms-list">
                        <h6>Medical Disclaimer</h6>
                        <ul>
                            <li>PriGina Global Telemed provides a platform for scheduling appointments and is not
                                responsible for the medical services provided.</li>
                            <li>Healthcare providers listed on the platform are independent practitioners, and [Website
                                Name] does not guarantee the quality or accuracy of medical advice provided.</li>
                        </ul>
                    </div>
                    <div class="terms-text terms-list">
                        <h6>Payment & Fees</h6>
                        <ul>
                            <li>Payment for appointments may be made through [Payment Method] and is subject to [Insert
                                Payment Terms].</li>
                            <li>Any additional fees, such as cancellation or no-show fees, will be disclosed at the time of
                                booking.</li>
                        </ul>
                    </div>
                    <div class="terms-text terms-list">
                        <h6>Changes to Terms & Conditions</h6>
                        <p>PriGina Global Telemed may update these Terms & Conditions periodically. Any changes will be
                            communicated through the website or via email.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Terms -->
@endsection
