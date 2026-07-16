@extends('layouts.mainlayout')

@section('content')
    <!-- HEADER -->
    <section class="py-5 text-center bg-light">
        <div class="container">
            <h1 class="fw-bold mb-3 text-primary">{{ __('app.how_it_works.headline') }}</h1>
            <p class="text-muted">
                {{ __('app.how_it_works.desc') }}
            </p>
        </div>
    </section>


    <!-- STEPS -->
    <section class="py-5">
        <div class="container">

            @php
                $steps = [
                    [
                        'icon' => 'upload',
                        'accent' => 'blue',
                        'title' => __('app.how_it_works.step1_title'),
                        'desc' => __('app.how_it_works.step1_desc'),
                    ],
                    [
                        'icon' => 'user-md',
                        'accent' => 'teal',
                        'title' => __('app.how_it_works.step2_title'),
                        'desc' => __('app.how_it_works.step2_desc'),
                    ],
                    [
                        'icon' => 'calendar',
                        'accent' => 'blue',
                        'title' => __('app.how_it_works.step3_title'),
                        'desc' => __('app.how_it_works.step3_desc'),
                    ],
                    [
                        'icon' => 'video-camera',
                        'accent' => 'teal',
                        'title' => __('app.how_it_works.step4_title'),
                        'desc' => __('app.how_it_works.step4_desc'),
                    ],
                    [
                        'icon' => 'document-signed',
                        'accent' => 'purple',
                        'title' => __('app.how_it_works.step5_title'),
                        'desc' => __('app.how_it_works.step5_desc'),
                    ],
                    [
                        'icon' => 'shield-check',
                        'accent' => 'blue',
                        'title' => __('app.how_it_works.step6_title'),
                        'desc' => __('app.how_it_works.step6_desc'),
                    ],
                ];
            @endphp

            <div class="row justify-content-center text-center g-4">
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


    <!-- FEATURES STRIP -->
    <section class="py-4">
        <div class="container">
            <div class="row g-3 feature-strip text-center">

                <div class="col-md col-6">
                    <div class="feature-box">
                        <div class="feature-icon-circle circle-blue mx-auto">
                            <i class="fi fi-rr-shield-check"></i>
                        </div>
                        <h6>{{ __('app.how_it_works.secure') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.secure_desc') }}</p>
                    </div>
                </div>

                <div class="col-md col-6">
                    <div class="feature-box">
                        <div class="feature-icon-circle circle-cyan mx-auto">
                            <i class="fi fi-rr-globe"></i>
                        </div>
                        <h6>{{ __('app.how_it_works.available_worldwide') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.available_worldwide_desc') }}</p>
                    </div>
                </div>

                <div class="col-md col-6">
                    <div class="feature-box">
                        <div class="feature-icon-circle circle-purple mx-auto">
                            <i class="fi fi-rr-award"></i>
                        </div>
                        <h6>{{ __('app.how_it_works.verified_specialists') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.verified_specialists_desc') }}</p>
                    </div>
                </div>

                <div class="col-md col-6">
                    <div class="feature-box">
                        <div class="feature-icon-circle circle-blue mx-auto">
                            <i class="fi fi-rr-document"></i>
                        </div>
                        <h6>{{ __('app.how_it_works.secure_video') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.secure_video_desc') }}</p>
                    </div>
                </div>

                <div class="col-md col-6">
                    <div class="feature-box">
                        <div class="feature-icon-circle circle-blue mx-auto">
                            <i class="fi fi-rr-bolt"></i>
                        </div>
                        <h6>{{ __('app.how_it_works.fast_turnaround') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.fast_turnaround_desc') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- CTA STATS BANNER -->
    <section class="py-4">
        <div class="container">
            <div class="cta-banner d-flex flex-wrap align-items-center justify-content-between gap-4">

                <div class="d-flex align-items-center gap-3">
                    <i class="fi fi-rr-shield-check cta-shield"></i>
                    <div>
                        <h4 class="fw-bold text-white mb-1">{{ __('app.how_it_works.cta_heading') }}</h4>
                        <p class="text-white-50 mb-0 small">{{ __('app.how_it_works.cta_desc') }}</p>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-4 cta-stats">

                    <div class="d-flex align-items-center gap-2">
                        <i class="fi fi-rr-users"></i>
                        <div class="text-start">
                            <div class="stat-number">{{ __('app.how_it_works.stat1_number') }}</div>
                            <div class="stat-label">{{ __('app.how_it_works.stat1_label') }}</div>
                            <div class="stat-sub">{{ __('app.how_it_works.stat1_sub') }}</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <i class="fi fi-rr-stethoscope"></i>
                        <div class="text-start">
                            <div class="stat-number">{{ __('app.how_it_works.stat2_number') }}</div>
                            <div class="stat-label">{{ __('app.how_it_works.stat2_label') }}</div>
                            <div class="stat-sub">{{ __('app.how_it_works.stat2_sub') }}</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <i class="fi fi-rr-globe"></i>
                        <div class="text-start">
                            <div class="stat-sub mb-1">{{ __('app.how_it_works.stat3_label') }}</div>
                            <div class="stat-label">{{ __('app.how_it_works.stat3_value') }}</div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <!-- DISCLAIMER -->
    <section class="py-4">
        <div class="container">
            <div class="disclaimer d-flex align-items-center mx-md-5">
                <i class="fi fi-rr-info"></i>
                <p class="mb-0 ms-3 small">
                    {{ __('app.how_it_works.disclaimer') }}
                </p>
            </div>
        </div>
    </section>

    <style>
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

        /* FEATURE STRIP */
        .feature-strip {
            background: #f8f9fb;
            border-radius: 12px;
            padding: 20px;
        }

        .feature-icon-circle {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .feature-icon-circle i {
            font-size: 22px;
        }

        .circle-blue {
            background: color-mix(in srgb, var(--primary) 12%, white);
        }

        .circle-blue i {
            color: var(--primary);
        }

        .circle-cyan {
            background: color-mix(in srgb, var(--secondary) 12%, white);
        }

        .circle-cyan i {
            color: var(--secondary);
        }

        .circle-purple {
            background: color-mix(in srgb, #7b3fe4 12%, white);
        }

        .circle-purple i {
            color: #7b3fe4;
        }

        /* CTA BANNER */
        .cta-banner {
            background: linear-gradient(120deg, var(--primary), #001f4d);
            border-radius: 16px;
            padding: 32px 40px;
        }

        .cta-shield {
            font-size: 42px;
            color: #fff;
        }

        .cta-stats i {
            font-size: 22px;
            color: #fff;
        }

        .stat-number {
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }

        .stat-label {
            font-weight: 600;
            color: #fff;
            font-size: 14px;
            line-height: 1.2;
        }

        .stat-sub {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.65);
        }

        /* DISCLAIMER */
        .disclaimer {
            background: #f1f5f9;
            padding: 12px 20px;
            border-radius: 8px;
        }

        .disclaimer i {
            font-size: 20px;
            color: var(--secondary);
        }
    </style>
@endsection
