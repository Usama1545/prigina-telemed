<?php $page = 'about-us'; ?>
@extends('layouts.mainlayout')

@section('content')

<!-- HERO SECTION -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <h6 class="text-secondary fw-bold">{{ __('app.about_us.label') }}</h6>

                <h1 class="fw-bold mb-3 text-primary">
                    {{ __('app.about_us.headline') }}
                </h1>

                <h5 class="text-muted mb-4">
                    {{ __('app.about_us.subtitle') }}
                </h5>

                <p>{{ __('app.about_us.p1') }}</p>

                <p>{{ __('app.about_us.p2') }}</p>
            </div>

            <div class="col-lg-6 text-center">
                <img src="{{asset('build/img/about-us.jpeg')}}" class="img-fluid rounded shadow">
            </div>

        </div>
    </div>
</section>


<!-- MISSION & VISION -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">

            <div class="col-md-6">
                <div class="p-4 bg-light rounded h-100 shadow-sm">
                    <h4 class="fw-bold text-primary">{{ __('app.about_us.our_mission') }}</h4>
                    <p class="mb-0">{{ __('app.about_us.mission_desc') }}</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 bg-light rounded h-100 shadow-sm">
                    <h4 class="fw-bold text-primary">{{ __('app.about_us.our_vision') }}</h4>
                    <p class="mb-0">{{ __('app.about_us.vision_desc') }}</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- WHAT WE DO -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <h2 class="fw-bold mb-3 text-primary">{{ __('app.about_us.what_we_do') }}</h2>

        <p class="mb-5">{{ __('app.about_us.what_we_do_desc') }}</p>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold text-secondary">{{ __('app.about_us.step1_title') }}</h5>
                    <p>{{ __('app.about_us.step1_desc') }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold text-secondary">{{ __('app.about_us.step2_title') }}</h5>
                    <p>{{ __('app.about_us.step2_desc') }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold text-secondary">{{ __('app.about_us.step3_title') }}</h5>
                    <p>{{ __('app.about_us.step3_desc') }}</p>
                </div>
            </div>

        </div>

        <p class="mt-4">{{ __('app.about_us.what_we_do_close') }}</p>

    </div>
</section>


<!-- OPTIONAL DISCUSSION -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6">
                <img src="{{asset('build/img/home-1.jpeg')}}" class="img-fluid rounded shadow">
            </div>

            <div class="col-lg-6">

                <h3 class="fw-bold mb-3 text-primary">{{ __('app.about_us.optional_headline') }}</h3>

                <p>{{ __('app.about_us.optional_p1') }}</p>

                <p>{{ __('app.about_us.optional_p2') }}</p>

                <div class="alert alert-info mt-3">
                    {{ __('app.about_us.optional_alert') }}
                </div>

            </div>

        </div>
    </div>
</section>


<!-- GLOBAL ACCESS -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <h3 class="fw-bold mb-3 text-primary">{{ __('app.about_us.global_access') }}</h3>

        <p>{{ __('app.about_us.global_p1') }}</p>

        <p>{{ __('app.about_us.global_p2') }}</p>

    </div>
</section>


<!-- OUR APPROACH -->
<section class="py-5">
    <div class="container text-center">

        <h2 class="fw-bold mb-5 text-primary">{{ __('app.about_us.approach_headline') }}</h2>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="p-4 bg-light rounded h-100">
                    <h5 class="fw-bold text-secondary">{{ __('app.about_us.clarity') }}</h5>
                    <p>{{ __('app.about_us.clarity_desc') }}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-4 bg-light rounded h-100">
                    <h5 class="fw-bold text-secondary">{{ __('app.about_us.independence') }}</h5>
                    <p>{{ __('app.about_us.independence_desc') }}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-4 bg-light rounded h-100">
                    <h5 class="fw-bold text-secondary">{{ __('app.about_us.privacy') }}</h5>
                    <p>{{ __('app.about_us.privacy_desc') }}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-4 bg-light rounded h-100">
                    <h5 class="fw-bold text-secondary">{{ __('app.about_us.quality') }}</h5>
                    <p>{{ __('app.about_us.quality_desc') }}</p>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- IMPORTANT NOTICE -->
<section class="py-4">
    <div class="container">
        <div class="alert alert-warning">

            <h5 class="fw-bold text-primary">{{ __('app.about_us.notice_headline') }}</h5>

            <p class="mb-2">{{ __('app.about_us.notice_p1') }}</p>

            <p class="mb-0">{{ __('app.about_us.notice_p2') }}</p>

        </div>
    </div>
</section>


<!-- CTA -->
<section class="info-section my-3">
    <div class="container">
        <div class="contact-info">
            <div class="info-col">
                <div class="wow fadeInUp" data-wow-duration="1s">
                    <h3 class="info-title">{{ __('app.about_us.cta_headline') }}</h3>
                    <p class="mb-0 text-white">{{ __('app.about_us.cta_desc') }}</p>
                </div>
                <div class="support-info wow fadeInUp" data-wow-duration="1s">
                    <a href="{{ check() ? route('doctors') : route('login') }}" class="btn btn-light px-4 mt-3 mt-md-0">
                        {{ __('app.about_us.cta_btn') }}
                    </a>
                </div>
            </div>
            <img src="{{ URL::asset('build/img/bg/info-bg.png') }}" alt="element" class="img-fluid element-01">
        </div>
    </div>
</section>

@endsection
