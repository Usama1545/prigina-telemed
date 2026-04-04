<?php $page = 'invoice-view'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'Invoice View', 'li_2' => 'Invoice View'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="invoice-content">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{URL::asset('build/img/logo.svg')}}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        <strong>Order:</strong> #00124 <br>
                                        <strong>Issued:</strong> 20/07/2023
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <strong class="customer-text">Invoice From</strong>
                                        <p class="invoice-details invoice-details-two">
                                            Dr. Darren Elder <br>
                                            806 Twin Willow Lane, Old Forge,<br>
                                            Newyork, USA <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info invoice-info2">
                                        <strong class="customer-text">Invoice To</strong>
                                        <p class="invoice-details">
                                            Walter Roberson <br>
                                            299 Star Trek Drive, Panama City, <br>
                                            Florida, 32405, USA <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="invoice-info">
                                        <strong class="customer-text">Payment Method</strong>
                                        <p class="invoice-details invoice-details-two">
                                            Debit Card <br>
                                            XXXXXXXXXXXX-2541 <br>
                                            HDFC Bank<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="invoice-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th class="text-center">Quantity</th>
                                                        <th class="text-center">VAT</th>
                                                        <th class="text-end">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>General Consultation</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center">$0</td>
                                                        <td class="text-end">$100</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Video Call Booking</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center">$0</td>
                                                        <td class="text-end">$250</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 ms-auto">
                                    <div class="table-responsive">
                                        <table class="invoice-table-two table">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td><span>$350</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount:</th>
                                                    <td><span>-10%</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td><span>$315</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Information -->
                        <div class="other-info">
                            <h4>Other information</h4>
                            <p class="mb-0">An account of the present illness, which includes the circumstances surrounding
                                the onset of recent health changes and the chronology of subsequent events that have led the
                                patient to seek medicine

                            </p>
                        </div>
                        <!-- /Invoice Information -->

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection