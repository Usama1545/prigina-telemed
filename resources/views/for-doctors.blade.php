@extends('layouts.mainlayout')

@section('content')
    <!-- HERO -->
    <section class="mb-5">
        <div class="container">
            <div class="row align-items-center">

                <!-- LEFT -->
                <div class="col-lg-5">
                    <h6 class="text-secondary">{{ __('app.for_doctors.label') }}</h6>

                    <h1 class="fw-bold mb-3 text-primary">
                        {{ __('app.for_doctors.headline') }}
                    </h1>

                    <p class="text-muted">
                        {{ __('app.for_doctors.desc') }}
                    </p>

                    <!-- FEATURES -->
                    <div class="row mt-4 text-center">

                        <!-- ITEM 1 -->
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="h-100">
                                <div class="icon-circle-soft mx-auto">
                                    <i class="fi fi-rr-users" style="font-size: 2rem; margin-top: 10px;"></i>
                                </div>

                                <p class="fw-bold mt-3 mb-1 text-black">
                                    {{ __('app.for_doctors.make_difference') }}
                                </p>

                                <p class="small text-muted">
                                    {{ __('app.for_doctors.make_difference_desc') }}
                                </p>
                            </div>
                        </div>

                        <!-- ITEM 2 (CENTER WITH BORDER) -->
                        <div class="col-md-4 mb-3 mb-md-0 border-md">
                            <div class="h-100">
                                <div class="icon-circle-soft mx-auto">
                                    <i class="fi fi-rr-globe" style="font-size: 2rem; margin-top: 10px;"></i>
                                </div>

                                <p class="fw-bold mt-3 mb-1 text-black">
                                    {{ __('app.for_doctors.work_anywhere') }}
                                </p>

                                <p class="small text-muted">
                                    {{ __('app.for_doctors.work_anywhere_desc') }}
                                </p>
                            </div>
                        </div>

                        <!-- ITEM 3 -->
                        <div class="col-md-4">
                            <div class=" h-100">
                                <div class="icon-circle-soft mx-auto">
                                    <i class="fi fi-rr-shield-check" style="font-size: 2rem; margin-top: 10px;"></i>
                                </div>

                                <p class="fw-bold mt-3 mb-1 text-black">
                                    {{ __('app.for_doctors.secure_compliant') }}
                                </p>

                                <p class="small text-muted">
                                    {{ __('app.for_doctors.secure_compliant_desc') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT -->
                <div class="col-lg-7 position-relative text-center hero-image">
                    <img src="{{ asset('build/img/for-doctors.jpeg') }}" class="img-fluid">

                    <!-- TESTIMONIAL -->
                    <div class="testimonial-box bg-primary text-white">
                        <p class="mb-2 small text-white">
                            <span class="quote-mark text-secondary">"</span>
                            {{ __('app.for_doctors.testimonial') }}
                        </p>
                        <small>{{ __('app.for_doctors.testimonial_author') }}</small>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- WHY JOIN -->
    <section class="py-5 text-center">
        <div class="container">

            <h2 class="fw-bold mb-5 text-primary">{{ __('app.for_doctors.why_headline') }}</h2>

            <div class="d-flex flex-wrap justify-content-center gap-4">

                <div class="feature-card bg-light">
                    <i class="fi fi-rr-globe"></i>
                    <h6>{{ __('app.for_doctors.global_impact') }}</h6>
                    <p class="mt-2">{{ __('app.for_doctors.global_impact_desc') }}</p>
                </div>

                <div class="feature-card bg-light">
                    <i class="fi fi-rr-calendar"></i>
                    <h6>{{ __('app.for_doctors.flexible_schedule') }}</h6>
                    <p class="mt-2">{{ __('app.for_doctors.flexible_schedule_desc') }}</p>
                </div>

                <div class="feature-card bg-light">
                    <i class="fi fi-rr-dollar"></i>
                    <h6>{{ __('app.for_doctors.competitive_pay') }}</h6>
                    <p class="mt-2">{{ __('app.for_doctors.competitive_pay_desc') }}</p>
                </div>

                <div class="feature-card bg-light">
                    <i class="fi fi-rr-graduation-cap"></i>
                    <h6>{{ __('app.for_doctors.professional_growth') }}</h6>
                    <p class="mt-2">{{ __('app.for_doctors.professional_growth_desc') }}</p>
                </div>

                <div class="feature-card bg-light">
                    <i class="fi fi-rr-shield-check"></i>
                    <h6>{{ __('app.for_doctors.secure_platform') }}</h6>
                    <p class="mt-2">{{ __('app.for_doctors.secure_platform_desc') }}</p>
                </div>

            </div>

        </div>
    </section>


    <!-- HOW IT WORKS -->
    <section class="py-5 text-center bg-light">
        <div class="container">

            <h2 class="fw-bold mb-5">{{ __('app.for_doctors.how_works_headline') }}</h2>

            @php
                $steps = [
                    [
                        'icon' => 'user',
                        'accent' => 'blue',
                        'title' => __('app.for_doctors.step1_title'),
                        'desc' => __('app.for_doctors.step1_desc'),
                    ],
                    [
                        'icon' => 'shield-check',
                        'accent' => 'teal',
                        'title' => __('app.for_doctors.step2_title'),
                        'desc' => __('app.for_doctors.step2_desc'),
                    ],
                    [
                        'icon' => 'settings',
                        'accent' => 'purple',
                        'title' => __('app.for_doctors.step3_title'),
                        'desc' => __('app.for_doctors.step3_desc'),
                    ],
                    [
                        'icon' => 'file',
                        'accent' => 'teal',
                        'title' => __('app.for_doctors.step4_title'),
                        'desc' => __('app.for_doctors.step4_desc'),
                    ],
                    [
                        'icon' => 'dollar',
                        'accent' => 'blue',
                        'title' => __('app.for_doctors.step5_title'),
                        'desc' => __('app.for_doctors.step5_desc'),
                    ],
                ];
            @endphp

            <div class="row g-4 justify-content-center text-center">

                @foreach ($steps as $i => $step)
                    <div class="col-6 col-md-4 col-lg position-relative step-col">

                        <div class="step-card-doc h-100 position-relative d-flex flex-column">

                            <div class="step-icon-circle-doc icon-grad-{{ $step['accent'] }}">
                                <i class="fi fi-rr-{{ $step['icon'] }}"></i>
                                <span class="step-badge-doc badge-{{ $step['accent'] }}">{{ $i + 1 }}</span>
                            </div>

                            <div class="p-3 pt-5 d-flex flex-column flex-grow-1">
                                <h6 class="fw-semibold">{{ $step['title'] }}</h6>
                                <p class="small text-muted">{{ $step['desc'] }}</p>

                                <span class="step-underline-doc underline-{{ $step['accent'] }}"></span>
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <!-- Info Section -->
    <section class="info-section my-3">
        <div class="container">
            <div class="contact-info">
                <div class="row align-items-center">

                    <!-- LEFT SIDE -->
                    <div class="col-lg-5">
                        <div class="wow fadeInUp" data-wow-duration="1s">
                            <h3 class="info-title text-white">{{ __('app.for_doctors.cta_headline') }}</h3>
                            <p class="mb-0 text-white">
                                {{ __('app.for_doctors.cta_desc') }}
                            </p>
                            <a href="{{ route('doctor-register') }}" class="btn btn-light px-4 mt-3">
                                {{ __('app.for_doctors.apply_now') }}
                            </a>
                        </div>
                    </div>

                    <!-- RIGHT SIDE -->
                    <div class="col-lg-7">
                        <div class="support-info wow fadeInUp" data-wow-duration="1s">
                            <div class="row text-center">
                                <div class="col-md-4 ">
                                    <div class="h-100">
                                        <div class=" mx-auto">
                                            <i class="fi fi-rr-globe text-secondary"
                                                style="font-size: 3rem; margin-top: 10px;"></i>
                                        </div>
                                        <p class="fw-bold mt-1 mb-1 text-white">
                                            {{ __('app.for_doctors.global_reach') }}
                                        </p>
                                        <p class="small text-white">
                                            {{ __('app.for_doctors.global_reach_desc') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4 border-start border-end">
                                    <div class="h-100">
                                        <div class="mx-auto">
                                            <i class="fi fi-rr-hand-holding-heart text-secondary"
                                                style="font-size: 3rem; margin-top: 10px;"></i>
                                        </div>
                                        <p class="fw-bold mt-1 mb-1 text-white">
                                            {{ __('app.for_doctors.rewarding_work') }}
                                        </p>
                                        <p class="small text-white">
                                            {{ __('app.for_doctors.rewarding_work_desc') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="h-100">
                                        <div class=" mx-auto">
                                            <i class="fi fi-rr-clock text-secondary"
                                                style="font-size: 3rem; margin-top: 10px;"></i>
                                        </div>
                                        <p class="fw-bold mt-1 mb-1 text-white">
                                            {{ __('app.for_doctors.work_on_terms') }}
                                        </p>
                                        <p class="small text-white">
                                            {{ __('app.for_doctors.work_on_terms_desc') }}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <style>
        .icon-circle-soft {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--primary) 12%, white);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08);
            transition: transform 0.25s ease;
        }

        .icon-circle-soft:hover {
            transform: translateY(-3px) scale(1.05);
        }

        .icon-circle-soft i {
            color: var(--primary);
        }

        .feature-card {
            width: 230px;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            text-align: center;
            background: #fff;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.1);
        }

        .feature-card i {
            font-size: 60px;
            color: var(--primary);
            margin-bottom: 15px;
        }

        /* HOW IT WORKS FOR DOCTORS — premium gradient icon cards */
        .step-card-doc {
            border: 1px solid #eee;
            border-radius: 16px;
            background: #fff;
            overflow: visible;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.05);
        }

        .step-card-doc:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.1);
        }

        .step-icon-circle-doc {
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
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.18);
        }

        .step-badge-doc {
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 700;
            border: 2px solid #fff;
        }

        .step-underline-doc {
            display: inline-block;
            width: 32px;
            height: 3px;
            border-radius: 2px;
            margin-top: auto;
            margin-left: auto;
            margin-right: auto;
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

        .badge-blue {
            background: var(--primary);
        }

        .badge-teal {
            background: var(--secondary);
        }

        .badge-purple {
            background: #5b2fc2;
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

        .testimonial-box {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            padding: 15px;
            border-radius: 14px;
            max-width: 300px;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.2);
        }

        .quote-mark {
            font-size: 20px;
        }

        .disclaimer {
            background: #f1f5f9;
            padding: 10px;
            border-radius: 8px;
        }

        .hero-image {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .hero-image img {
            width: 100%;
            display: block;

            /* smooth blend into left content */
            -webkit-mask-image: linear-gradient(to left, black 75%, transparent 100%);
            mask-image: linear-gradient(to left, black 75%, transparent 100%);
        }


        .quote-mark {
            font-size: 28px;
            color: var(--secondary);
            font-weight: bold;
            margin-right: 6px;
        }

        /* PREMIUM MOBILE REFINEMENTS */
        @media (max-width: 767.98px) {
            .feature-card {
                width: 100%;
                max-width: 280px;
            }

            .testimonial-box {
                max-width: 90%;
                padding: 12px;
            }
        }
    </style>
@endsection
