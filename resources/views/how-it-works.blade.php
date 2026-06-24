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
            <div class="row justify-content-center text-center g-4">

                <!-- STEP 1 -->
                <div class="col-md-2">
                    <div class="step-card h-100 p-4 position-relative">
                        <span class="step-badge">1</span>

                        <div class="step-icon">
                            <i class="fi fi-rr-upload"></i>
                        </div>

                        <h6 class="fw-semibold mt-3">{{ __('app.how_it_works.step1_title') }}</h6>
                        <p class="text-muted small">
                            {{ __('app.how_it_works.step1_desc') }}
                        </p>
                    </div>
                </div>

                <!-- STEP 2 -->
                <div class="col-md-2">
                    <div class="step-card h-100 p-4 position-relative">
                        <span class="step-badge">2</span>

                        <div class="step-icon">
                            <i class="fi fi-rr-user-md"></i>
                        </div>

                        <h6 class="fw-semibold mt-3">
                            {{ __('app.how_it_works.step2_title') }}
                        </h6>
                        <p class="text-muted small">
                            {{ __('app.how_it_works.step2_desc') }}
                        </p>
                    </div>
                </div>

                <!-- STEP 3 -->
                <div class="col-md-2">
                    <div class="step-card h-100 p-4 position-relative">
                        <span class="step-badge">3</span>

                        <div class="step-icon">
                            <i class="fi fi-rr-file-medical"></i>
                        </div>

                        <h6 class="fw-semibold mt-3">{{ __('app.how_it_works.step3_title') }}</h6>
                        <p class="text-muted small">
                            {{ __('app.how_it_works.step3_desc') }}
                        </p>
                    </div>
                </div>

                <!-- STEP 4 -->
                <div class="col-md-2">
                    <div class="step-card h-100 p-4 position-relative">
                        <span class="step-badge">4</span>

                        <div class="step-icon">
                            <i class="fi fi-rr-video-camera"></i>
                        </div>

                        <h6 class="fw-semibold mt-3">{{ __('app.how_it_works.step4_title') }}</h6>
                        <p class="text-muted small">
                            {{ __('app.how_it_works.step4_desc') }}
                        </p>
                    </div>
                </div>

                <!-- STEP 5 -->
                <div class="col-md-2">
                    <div class="step-card h-100 p-4 position-relative">
                        <span class="step-badge">5</span>

                        <div class="step-icon">
                            <i class="fi fi-rr-heart"></i>
                        </div>

                        <h6 class="fw-semibold mt-3">{{ __('app.how_it_works.step5_title') }}</h6>
                        <p class="text-muted small">
                            {{ __('app.how_it_works.step5_desc') }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FEATURES STRIP -->
    <section class="py-4">
        <div class="container">
            <div class="row g-3 feature-strip text-center">

                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fi fi-rr-shield-check"></i>
                        <h6>{{ __('app.how_it_works.secure') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.secure_desc') }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fi fi-rr-globe"></i>
                        <h6>{{ __('app.how_it_works.global_access') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.global_access_desc') }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fi fi-rr-award"></i>
                        <h6>{{ __('app.how_it_works.trusted') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.trusted_desc') }}</p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fi fi-rr-clock"></i>
                        <h6>{{ __('app.how_it_works.convenient') }}</h6>
                        <p class="text-muted small">{{ __('app.how_it_works.convenient_desc') }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- DISCLAIMER -->
    <section class="py-4">
        <div class="container">
            <div class="disclaimer d-flex align-items-center mx-5">
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
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        /* NUMBER BADGE */
        .step-badge {
            position: absolute;
            top: -12px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--secondary);
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ICON */
        .step-icon {
            font-size: 40px;
            color: var(--secondary);
        }

        /* FEATURE STRIP */
        .feature-strip {
            background: #f8f9fb;
            border-radius: 12px;
            padding: 20px;
        }

        .feature-box i {
            font-size: 28px;
            color: var(--secondary);
            margin-bottom: 10px;
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
