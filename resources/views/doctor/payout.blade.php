<?php $page = 'doctor-payment'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    @include('partials.doctor-sidebar')
                    <!-- /Profile Sidebar -->

                </div>

                <!-- Payouts -->
                <div class="col-lg-8 col-xl-9">

                    <div class="payout-wrap">

                        <div class="payout-title mb-4">
                            <h4>{{ __('app.payout.title') }}</h4>

                            <p class="text-white">
                                {{ __('app.payout.desc') }}
                            </p>
                        </div>

                        <div class="stripe-wrapper">

                            <div
                                class="stripe-box w-100 d-flex align-items-center justify-content-between p-4 {{ $stripeSetupComplete ? 'active' : '' }}">

                                <div class="d-flex align-items-center gap-4">

                                    <div class="stripe-img">
                                        <img src="{{ URL::asset('build/img/icons/stripe.svg') }}" alt="Stripe">
                                    </div>

                                    <div>

                                        <h5 class="mb-2 d-flex align-items-center gap-2">

                                            {{ __('app.payout.stripe_payouts') }}

                                            @if ($stripeSetupComplete)
                                                <span class="badge bg-success">
                                                    <i class="fa-solid fa-circle-check me-1"></i>
                                                    {{ __('app.payout.connected') }}
                                                </span>
                                            @else
                                                <span class="badge bg-warning text-dark">
                                                    {{ __('app.payout.pending_setup') }}
                                                </span>
                                            @endif

                                        </h5>

                                        <p class="mb-0 text-muted">

                                            @if ($stripeSetupComplete)
                                                {{ __('app.payout.account_ready') }}
                                            @else
                                                {{ __('app.payout.click_connect') }}
                                            @endif

                                        </p>

                                    </div>

                                </div>

                                <div>

                                    <a href="{{ route('doctor.payout-setup') }}" class="btn btn-primary px-4">

                                        {{ $stripeSetupComplete ? __('app.payout.manage_account') : __('app.payout.connect_account') }}

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /Payouts -->

            </div>
        </div>
    </div>
    <style>
        body {
            background-color: #f5f7fb !important
        }

        .stripe-box {
            border-radius: 16px;
            background: #fff;
            border: 1px solid #e9ecef;
            transition: 0.3s ease;
        }

        .stripe-box.active {
            border-color: #198754;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.08);
        }

        .stripe-img img {
            width: 90px;
        }

        .payout-title p {
            color: #6c757d;
            max-width: 700px;
        }
    </style>
    <!-- /Page Content -->
@endsection
