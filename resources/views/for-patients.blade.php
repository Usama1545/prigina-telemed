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
                                <p class="fw-bold mt-2 mb-2 text-black">{{ __('app.for_patients.independent_opinions') }}
                                </p>
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
                        'icon' => 'upload',
                        'accent' => 'blue',
                        'title' => __('app.for_patients.step1_title'),
                        'desc' => __('app.for_patients.step1_desc'),
                    ],
                    [
                        'icon' => 'user-md',
                        'accent' => 'teal',
                        'title' => __('app.for_patients.step2_title'),
                        'desc' => __('app.for_patients.step2_desc'),
                    ],
                    [
                        'icon' => 'folder',
                        'accent' => 'blue',
                        'title' => __('app.for_patients.step3_title'),
                        'desc' => __('app.for_patients.step3_desc'),
                    ],
                    [
                        'icon' => 'file',
                        'accent' => 'teal',
                        'title' => __('app.for_patients.step4_title'),
                        'desc' => __('app.for_patients.step4_desc'),
                    ],
                    [
                        'icon' => 'video-camera',
                        'accent' => 'purple',
                        'title' => __('app.for_patients.step5_title'),
                        'desc' => __('app.for_patients.step5_desc'),
                    ],
                    [
                        'icon' => 'shield-check',
                        'accent' => 'blue',
                        'title' => __('app.how_it_works.step6_title'),
                        'desc' => __('app.how_it_works.step6_desc'),
                    ],
                ];
            @endphp
            <h2 class="fw-bold mb-4 text-center text-primary">{{ __('app.for_patients.how_works_headline') }}</h2>

            <div class="row justify-content-center text-center g-4 mt-4">
                @foreach ($steps as $index => $step)
                    <div class="col-6 col-md-4 col-lg position-relative step-col">
                        <div class="step-card h-100 position-relative">

                            <div class="step-icon-circle icon-grad-{{ $step['accent'] }}">
                                <i class="fi fi-rr-{{ $step['icon'] }}"></i>
                            </div>
                            <span class="badge badge-{{ $step['accent'] }} mt-2">{{ $index + 1 }}</span>


                            <h6 class="fw-semibold mt-3">{{ $step['title'] }}</h6>
                            <p class="text-muted small">{{ $step['desc'] }}</p>

                            <span class="step-underline underline-{{ $step['accent'] }}"></span>
                        </div>


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
                        <a href="{{ check() ? route('doctors') : route('login') }}"
                            class="btn btn-light px-4 mt-3 mt-md-0">
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

        /* STEP CARD */
        .step-card {
            border: 1px solid #eee;
            border-radius: 12px;
            background: #fff;
            transition: 0.3s;
            padding: 44px 16px 24px;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        /* STEP ICON CIRCLE — sits half in / half out of the card's top border */
        .step-icon-circle {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 28px;
        }

        .icon-grad-blue {
            background: linear-gradient(135deg, var(--primary), #2f7ed8);
        }

        .icon-grad-teal {
            background: linear-gradient(135deg, var(--secondary), #17c3a4);
        }

        .icon-grad-purple {
            background: linear-gradient(135deg, #7b3fe4, #5b2fc2);
        }

        /* NUMBER BADGE (bottom of icon circle) */
        .step-badge {
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 600;
            border: 2px solid #fff;
        }

        .badge-blue {
            background: var(--primary);
        }

        .badge-teal {
            background: var(--secondary);
        }

        .badge-purple {
            background: #5b2fc2;
        }

        /* UNDERLINE */
        .step-underline {
            display: inline-block;
            width: 32px;
            height: 3px;
            border-radius: 2px;
            margin-top: 14px;
        }

        .underline-blue {
            background: var(--primary);
        }

        .underline-teal {
            background: var(--secondary);
        }

        .underline-purple {
            background: #5b2fc2;
        }

        /* CONNECTOR ARROW — aligned with the icon circle sitting on the card's top border */
        .step-arrow {
            position: absolute;
            top: 0;
            right: -22px;
            transform: translateY(-50%);
            align-items: center;
            justify-content: center;
            color: var(--secondary);
            font-size: 20px;
            z-index: 2;
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
