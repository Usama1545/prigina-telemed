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
                ['icon' => 'user',         'title' => __('app.for_doctors.step1_title'), 'desc' => __('app.for_doctors.step1_desc')],
                ['icon' => 'shield-check', 'title' => __('app.for_doctors.step2_title'), 'desc' => __('app.for_doctors.step2_desc')],
                ['icon' => 'settings',     'title' => __('app.for_doctors.step3_title'), 'desc' => __('app.for_doctors.step3_desc')],
                ['icon' => 'file',         'title' => __('app.for_doctors.step4_title'), 'desc' => __('app.for_doctors.step4_desc')],
                ['icon' => 'dollar',       'title' => __('app.for_doctors.step5_title'), 'desc' => __('app.for_doctors.step5_desc')],
            ];
        @endphp

        <div class="row justify-content-center">

            @foreach($steps as $i => $step)
                <div class="col-md-2 position-relative">

                    <div class="step-simple text-center">

                        <div class="step-icon-circle">
                            <i class="fi fi-rr-{{ $step['icon'] }} text-primary " style="font-size: 3rem; margin-top: 10px;"></i>
                        </div>

                        <div class="d-flex align-items-center justify-content-center gap-2 mt-3">
                            <span class="step-number-small">{{ $i+1 }}</span>
                            <h6 class="mb-0">{{ $step['title'] }}</h6>
                        </div>

                        <p class="small text-muted mt-2">
                            {{ $step['desc'] }}
                        </p>

                    </div>

                    @if(!$loop->last)
                        <div class="step-arrow d-none d-md-block"></div>
                    @endif

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
                                        <i class="fi fi-rr-globe text-secondary" style="font-size: 3rem; margin-top: 10px;"></i>
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
                                        <i class="fi fi-rr-hand-holding-heart text-secondary" style="font-size: 3rem; margin-top: 10px;"></i>
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
                                        <i class="fi fi-rr-clock text-secondary" style="font-size: 3rem; margin-top: 10px;"></i>
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
}

.icon-circle-soft i {
    color: var(--primary);
}
.feature-card {
    width: 230px;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    background: #fff;
}

.feature-card i {
    font-size: 60px;
    color: var(--primary);
    margin-bottom: 15px;
}

.step-icon-circle {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 1px dashed #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: white;
    margin: auto;
}

.step-number-small {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: var(--secondary);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
}

.step-number-small {
    box-shadow: 0 4px 10px rgba(28,148,134,0.3);
}

/* Default for MOBILE (smallest screens) */
.step-arrow {
    display: none !important; /* Hide by default on mobile */
}
/* arrow head */
.step-arrow::after {
    display: none !important; /* Hide arrow head on mobile */
}

/* Medium screens (900px - 1199px) */
@media (min-width: 900px) and (max-width: 1199px) {
    .step-arrow {
        display: block !important;
        position: absolute;
        top: 22%;
        right: -10px;
        width: 20px;
        height: 2px;
        background: var(--black);
    }

    .step-arrow::after {
        display: block !important;
        content: '';
        position: absolute;
        right: -6px;
        top: -4px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
        border-left: 8px solid var(--black);
    }
}

/* Large screens (1200px+) */
@media (min-width: 1200px) {
    .step-arrow {
        display: block !important;
        position: absolute;
        top: 27%;
        right: -30px;
        width: 60px;
        height: 2px;
        background: black;
    }

    .step-arrow::after {
        display: block !important;
        content: '';
        position: absolute;
        right: -6px;
        top: -4px;
        border-top: 5px solid transparent;
        border-bottom: 5px solid transparent;
        border-left: 8px solid var(--black);
    }
}


.testimonial-box {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    padding: 15px;
    border-radius: 10px;
    max-width: 300px;
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
</style>
@endsection
