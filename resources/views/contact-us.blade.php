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
                                <p>1600 laurel road , NJ 08021</p>
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
                                <p>+1 8564268693</p>
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
                                <p>info@priginaglobaltelemed.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 d-flex">
                    <div class="card contact-form-card w-100">
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success mb-3">{{ session('success') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger mb-3">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('contact-us.send') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Services</label>
                                            <input type="text" name="service" class="form-control" value="{{ old('service') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Message</label>
                                            <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="6">{{ old('message') }}</textarea>
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
