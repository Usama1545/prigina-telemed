<?php $page = 'checkout'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Checkout', 'li_2' => 'Checkout'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <div class="card">
                        <div class="card-body">

                            <!-- Checkout Form -->
                            <form action="{{url('booking-success')}}">

                                <!-- Personal Information -->
                                <div class="info-widget">
                                    <h4 class="card-title">Personal Information</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3 card-label">
                                                <label class="mb-2">First Name</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3 card-label">
                                                <label class="mb-2">Last Name</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3 card-label">
                                                <label class="mb-2">Email</label>
                                                <input class="form-control" type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="mb-3 card-label">
                                                <label class="mb-2">Phone</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="exist-customer">Existing Customer? <a href="{{url('login')}}">Click here to
                                            login</a></div>
                                </div>
                                <!-- /Personal Information -->

                                <div class="payment-widget">
                                    <h4 class="card-title">Payment Method</h4>

                                    <!-- Credit Card Payment -->
                                    <div class="payment-list">
                                        <label class="payment-radio credit-card-option">
                                            <input type="radio" name="radio" checked>
                                            <span class="checkmark"></span>
                                            Credit card
                                        </label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3 card-label">
                                                    <label for="card_name">Name on Card</label>
                                                    <input class="form-control" id="card_name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 card-label">
                                                    <label for="card_number">Card Number</label>
                                                    <input class="form-control" id="card_number"
                                                        placeholder="1234 5678 9876 5432" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3 card-label">
                                                    <label for="expiry_month">Expiry Month</label>
                                                    <input class="form-control" id="expiry_month" placeholder="MM"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3 card-label">
                                                    <label for="expiry_year">Expiry Year</label>
                                                    <input class="form-control" id="expiry_year" placeholder="YY"
                                                        type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3 card-label">
                                                    <label for="cvv">CVV</label>
                                                    <input class="form-control" id="cvv" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Credit Card Payment -->

                                    <!-- Paypal Payment -->
                                    <div class="payment-list">
                                        <label class="payment-radio paypal-option">
                                            <input type="radio" name="radio">
                                            <span class="checkmark"></span>
                                            Paypal
                                        </label>
                                    </div>
                                    <!-- /Paypal Payment -->

                                    <!-- Terms Accept -->
                                    <div class="terms-accept">
                                        <div class="custom-checkbox">
                                            <input type="checkbox" id="terms_accept">
                                            <label for="terms_accept">I have read and accept <a
                                                    href="{{url('terms-condition')}}">Terms &amp; Conditions</a></label>
                                        </div>
                                    </div>
                                    <!-- /Terms Accept -->

                                    <!-- Submit Section -->
                                    <div class="submit-section mt-4">
                                        <button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
                                    </div>
                                    <!-- /Submit Section -->

                                </div>
                            </form>
                            <!-- /Checkout Form -->

                        </div>
                    </div>

                </div>

                <div class="col-md-5 col-lg-4 theiaStickySidebar">

                    <!-- Booking Summary -->
                    <div class="card booking-card">
                        <div class="card-header">
                            <h4 class="card-title">Booking Summary</h4>
                        </div>
                        <div class="card-body">

                            <!-- Booking Doctor Info -->
                            <div class="booking-doc-info">
                                <a href="{{url('doctor-profile')}}" class="booking-doc-img">
                                    <img src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="{{url('doctor-profile')}}">Dr. Darren Elder</a></h4>
                                    <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">35</span>
                                    </div>
                                    <div class="clinic-details">
                                        <p class="doc-location"><i class="fas fa-map-marker-alt"></i> Newyork, USA</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Booking Doctor Info -->

                            <div class="booking-summary">
                                <div class="booking-item-wrap">
                                    <ul class="booking-date">
                                        <li>Date :<span> 16 Nov 2023</span></li>
                                        <li>Time :<span> 10:00 AM</span></li>
                                    </ul>
                                    <ul class="booking-fee">
                                        <li>Consulting Fee <span>$100</span></li>
                                        <li>Booking Fee <span>$10</span></li>
                                        <li>Video Call <span>$50</span></li>
                                    </ul>
                                    <div class="booking-total">
                                        <ul class="booking-total-list">
                                            <li>
                                                <span>Total</span>
                                                <span class="total-cost">$160</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Booking Summary -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection