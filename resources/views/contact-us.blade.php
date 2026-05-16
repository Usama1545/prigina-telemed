<?php $page = 'contact-us'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'Contact Us', 'li_2' => 'Contact Us'])
    @endcomponent

    <!-- Contact Us -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="section-inner-header contact-inner-header">
                        <h6>Get in touch</h6>
                        <h2>Have Any Question?</h2>
                    </div>
                    <div class="card contact-card">
                        <div class="card-body">
                            <div class="contact-icon">
                                <i class="isax isax-location5"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Address</h4>
                                <p>8432 Mante Highway, Aminaport, USA</p>
                            </div>
                        </div>
                    </div>
                    <div class="card contact-card">
                        <div class="card-body">
                            <div class="contact-icon">
                                <i class="isax isax-call5"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Phone Number</h4>
                                <p>+1 315 369 5943</p>
                            </div>
                        </div>
                    </div>
                    <div class="card contact-card">
                        <div class="card-body">
                            <div class="contact-icon">
                                <i class="isax isax-sms5"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email Address</h4>
                                <p>doccure@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 d-flex">
                    <div class="card contact-form-card w-100">
                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Services</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Message</label>
                                            <textarea class="form-control" rows="6"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group-btn mb-0">
                                            <button type="submit" class="btn btn-primary-gradient">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection