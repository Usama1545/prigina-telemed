@extends('layouts.mainlayout')

@section('content')
    <!-- HERO -->
    <section class="pb-5 ">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT -->
                <div class="col-lg-6 mb-4 mb-md-0">
                    <h6 class="text-secondary">{{ __('app.for_patients.label') }}</h6>

                    <h1 class="fw-bold mb-3">
                        {{ __('app.for_patients.headline') }}
                    </h1>

                    <p class="text-muted">
                        {{ __('app.for_patients.desc') }}
                    </p>

                    <!-- FEATURES -->
                    <div class="row mt-4 text-center justify-content-center ">

                        <!-- ITEM 1 -->
                        <div class="col-md-4 col-6 mb-3 mb-md-0">
                            <div class="px-3 h-100">
                                <div class="icon-circle-soft mx-auto">
                                    <i class="fi fi-rr-globe" style="font-size: 2.5rem; margin-top: 10px;"></i>
                                </div>
                                <p class=" fw-bold mt-2 mb-2 text-black">{{ __('app.for_patients.global_expertise') }}</p>
                                <p class="small">{{ __('app.for_patients.global_expertise_desc') }}</p>
                            </div>
                        </div>

                        <!-- ITEM 2 (CENTER WITH BORDERS) -->
                        <div class="col-md-4 col-6 mb-3 border-start border-end">
                            <div class="px-3 h-100">
                                <div class="icon-circle-soft mx-auto">
                                    <i class="fi fi-rr-bulb" style="font-size: 2.5rem; margin-top: 10px;"></i>
                                </div>
                                <p class="fw-bold mt-2 mb-2 text-black">{{ __('app.for_patients.independent_opinions') }}</p>
                                <p class="small">{{ __('app.for_patients.independent_opinions_desc') }}</p>
                            </div>
                        </div>

                        <!-- ITEM 3 -->
                        <div class="col-md-4 col-6 mt-3 mt-md-0">
                            <div class="px-3 h-100">
                                <div class="icon-circle-primary mx-auto ">
                                    <i class="fi fi-rr-lock" style="font-size: 2.5rem; margin-top: 10px;"></i>
                                </div>
                                <p class="fw-bold mt-2 mb-2 text-black">{{ __('app.for_patients.secure_confidential') }}</p>
                                <p class="small">{{ __('app.for_patients.secure_confidential_desc') }}</p>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="col-lg-6 position-relative text-center hero-image">
                    <img src="{{ asset('build/img/for-patient.jpeg') }}" class="img-fluid">

                    <!-- TESTIMONIAL -->
                    <div class="testimonial-box text-start">
                        <p class="mb-2">
                            <span class="quote-mark">"</span>
                            {{ __('app.for_patients.testimonial') }}
                        </p>
                        <small class="text-secondary">{{ __('app.for_patients.testimonial_author') }}</small>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- HOW IT WORKS -->
    <section class="py-5 text-center">
        <div class="container">
            @php
                $steps = [
                    [
                        'icon'  => 'upload',
                        'title' => __('app.for_patients.step1_title'),
                        'desc'  => __('app.for_patients.step1_desc'),
                    ],
                    [
                        'icon'  => 'user-md',
                        'title' => __('app.for_patients.step2_title'),
                        'desc'  => __('app.for_patients.step2_desc'),
                    ],
                    [
                        'icon'  => 'folder',
                        'title' => __('app.for_patients.step3_title'),
                        'desc'  => __('app.for_patients.step3_desc'),
                    ],
                    [
                        'icon'  => 'file',
                        'title' => __('app.for_patients.step4_title'),
                        'desc'  => __('app.for_patients.step4_desc'),
                    ],
                    [
                        'icon'  => 'video-camera',
                        'title' => __('app.for_patients.step5_title'),
                        'desc'  => __('app.for_patients.step5_desc'),
                    ],
                ];
            @endphp
            <h2 class="fw-bold mb-4 text-center text-primary">{{ __('app.for_patients.how_works_headline') }}</h2>

            <div class="row g-4 justify-content-center position-relative">

                @foreach ($steps as $index => $step)
                    <div class="col-md-2 position-relative">
                        <div class="step-simple text-center">

                            <!-- ICON -->
                            <div class="step-icon-circle position-relative">
                                <i class="fi fi-rr-{{ $step['icon'] }} text-primary fs-20"></i>
                            </div>

                            <!-- NUMBER -->
                            <span class="step-number-small">{{ $index + 1 }}</span>

                            <h6 class="mt-3 text-primary">{{ $step['title'] }}</h6>
                            <p class="text-muted small mt-1">{{ $step['desc'] }}</p>

                        </div>

                        <!-- ARROW (except last) -->
                        @if (!$loop->last)
                            <div class="step-arrow d-none d-md-block">
                                <i class="fi fi-rr-arrow-small-right"></i>
                            </div>
                        @endif

                    </div>
                @endforeach

            </div>

        </div>
    </section>


    <!-- DISCLAIMER -->
    <section class="py-3">
        <div class="container">
            <div class="disclaimer d-flex align-items-center mx-5">
                <i class="fi fi-rr-info text-secondary"></i>
                <p class="mb-0 ms-3 text-primary">
                    {{ __('app.for_patients.disclaimer') }}
                </p>
            </div>
        </div>
    </section>


    <!-- WHY -->
    <section class="py-5 text-center">
        <div class="container">

            <h2 class="fw-bold mb-5 text-primary">{{ __('app.for_patients.why_headline') }}</h2>

            <div class="d-flex flex-wrap justify-content-center gap-2 md-gap-4 ">

                <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                    <i class="fi fi-rr-users text-secondary fs-3 mb-2 d-block"></i>
                    <h6 class="fw-semibold mb-1">{{ __('app.for_patients.top_specialists') }}</h6>
                    <p class="small text-muted mb-0">{{ __('app.for_patients.top_specialists_desc') }}</p>
                </div>

                <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                    <i class="fi fi-rr-clock text-secondary fs-3 mb-2 d-block"></i>
                    <h6 class="fw-semibold mb-1">{{ __('app.for_patients.convenient') }}</h6>
                    <p class="small text-muted mb-0">{{ __('app.for_patients.convenient_desc') }}</p>
                </div>

                <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                    <i class="fi fi-rr-heart text-secondary fs-3 mb-2 d-block"></i>
                    <h6 class="fw-semibold mb-1">{{ __('app.for_patients.better_decisions') }}</h6>
                    <p class="small text-muted mb-0">{{ __('app.for_patients.better_decisions_desc') }}</p>
                </div>

                <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                    <i class="fi fi-rr-globe text-secondary fs-3 mb-2 d-block"></i>
                    <h6 class="fw-semibold mb-1">{{ __('app.for_patients.worldwide') }}</h6>
                    <p class="small text-muted mb-0">{{ __('app.for_patients.worldwide_desc') }}</p>
                </div>

                <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                    <i class="fi fi-rr-shield-check text-secondary fs-3 mb-2 d-block"></i>
                    <h6 class="fw-semibold mb-1">{{ __('app.for_patients.privacy') }}</h6>
                    <p class="small text-muted mb-0">{{ __('app.for_patients.privacy_desc') }}</p>
                </div>

            </div>

        </div>
    </section>


    <!-- Info Section -->
    <section class="info-section my-3">
        <div class="container">
            <div class="contact-info">
                <div class="info-col">
                    <div class="wow fadeInUp" data-wow-duration="1s">
                        <h3 class="info-title">{{ __('app.for_patients.info_headline') }}</h3>
                        <p class="mb-0 text-white">{{ __('app.for_patients.info_desc1') }}</p>
                        <p class="mb-0 text-white">{{ __('app.for_patients.info_desc2') }}</p>
                    </div>
                    <div class="support-info wow fadeInUp" data-wow-duration="1s">
                        <a href="{{ check() ? route('doctors') : route('login') }}" class="btn btn-light px-4 mt-3 mt-md-0">
                            {{ __('app.for_patients.info_cta') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        /* ICON CIRCLE */
        .icon-circle-soft {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--secondary) 12%, white);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .icon-circle-soft i {
            color: var(--secondary);
        }

        .icon-circle-primary {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--primary) 12%, white);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }

        .icon-circle-primary i {
            color: var(--primary);
        }

        /* TESTIMONIAL */
        .testimonial-box {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            /* centers horizontally */
            background: #fff;
            padding: 16px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px;
        }

        .quote-mark {
            font-size: 28px;
            color: var(--primary);
            font-weight: bold;
            margin-right: 6px;
        }

        .hero-image {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            display: block;

            /* smooth fade on all sides */
            -webkit-mask-image: radial-gradient(circle at center,
                    rgba(0, 0, 0, 1) 70%,
                    rgba(0, 0, 0, 0.6) 85%,
                    rgba(0, 0, 0, 0) 100%);
            mask-image: radial-gradient(circle at center,
                    rgba(0, 0, 0, 1) 70%,
                    rgba(0, 0, 0, 0.6) 85%,
                    rgba(0, 0, 0, 0) 100%);
        }

        .step-number-small {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            margin: 10px auto 0;
            border-radius: 50%;
            background: var(--secondary);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
        }

        .step-icon-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 1px dashed #dcdcdc;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            background: #fff;
        }

        .step-arrow {
            position: absolute;
            top: 15%;
            right: -18px;
            transform: translateY(-50%);
            font-size: 20px;
            color: var(--secondary);
        }

        /* FEATURE */
        .feature-card {
            width: 200px;
        }

        /* DISCLAIMER */
        .disclaimer {
            background: #f1f5f9;
            padding: 10px 15px;
            border-radius: 8px;
        }
    </style>
@endsection
