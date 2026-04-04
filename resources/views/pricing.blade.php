<?php $page = 'pricing'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'Pricing Plan', 'li_2' => 'Pricing Plan'])
    @endcomponent

    <!-- Pricing -->
    <section class="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-inner-header pricing-inner-header">
                        <h2>Our Pricing Plan</h2>
                        <div class="plan-choose-info">
                            <label class="monthly-plan">Monthly</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" checked>
                                </div>
                            <label class="yearly-plan">Yearly</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card w-100">
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-icon">
                                        <span>
                                            <img src="{{URL::asset('build/img/icons/price-icon1.svg')}}" alt="icon">
                                        </span>
                                    </div>
                                    <div class="pricing-title">
                                        <p>For individuals</p>
                                        <h4>Basic</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-amount">
                                    <h2>$99 <span>/monthly</span></h2>
                                    <h6>What’s included</h6>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li>Profile Creation</li>
                                        <li>Appointment Booking</li>
                                        <li>Notification Alerts</li>
                                        <li>Limited Telemedicine Access</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="{{url('login-email')}}" class="btn btn-primary">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card active w-100">
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-icon">
                                        <span>
                                            <img src="{{URL::asset('build/img/icons/price-icon2.svg')}}" alt="icon">
                                        </span>
                                    </div>
                                    <div class="pricing-title">
                                        <p>For startups</p>
                                        <h4>Premium</h4>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge">Popular</span>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-amount">
                                    <h2>$199 <span>/monthly</span></h2>
                                    <h6>What’s included</h6>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li>Profile Creation</li>
                                        <li>Appointment Booking</li>
                                        <li>Notification Alerts</li>
                                        <li>Extended Telemedicine Access</li>
                                        <li>Exclusive Discounts</li>
                                        <li>Appointment History</li>
                                        <li>Priority Customer Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="{{url('login-email')}}" class="btn btn-primary">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card w-100">
                        <div class="card-body">
                            <div class="pricing-header">
                                <div class="pricing-header-info">
                                    <div class="pricing-icon">
                                        <span>
                                            <img src="{{URL::asset('build/img/icons/price-icon3.svg')}}" alt="icon">
                                        </span>
                                    </div>
                                    <div class="pricing-title">
                                        <p>For big companies</p>
                                        <h4>Enterprise</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-info">
                                <div class="pricing-amount">
                                    <h2>$399 <span>/monthly</span></h2>
                                    <h6>What’s included</h6>
                                </div>
                                <div class="pricing-list">
                                    <ul>
                                        <li>All Basic plan features</li>
                                        <li>All Premium plan features</li>
                                        <li>Personalized Health Insights</li>
                                        <li>Family Account Management</li>
                                    </ul>
                                </div>
                                <div class="pricing-btn">
                                    <a href="{{url('login-email')}}" class="btn btn-primary">Choose Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Pricing -->
@endsection