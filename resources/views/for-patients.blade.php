@extends('layouts.mainlayout')

@section('content')

<!-- HERO -->
<section class="pb-5 ">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-lg-6 mb-4 mb-md-0">
                <h6 class="text-secondary">FOR PATIENTS</h6>

                <h1 class="fw-bold mb-3">
                    Expert Second Opinions.<br>
                    Greater Clarity. Better Decisions.
                </h1>

                <p class="text-muted">
                    PriGina Global Telemed helps you connect with leading physicians worldwide
                    for comprehensive second medical opinions—so you can feel confident about your next steps.
                </p>

                <!-- FEATURES -->
                <div class="row mt-4 text-center justify-content-center ">

                    <!-- ITEM 1 -->
                    <div class="col-md-4 col-6 mb-3 mb-md-0">
                        <div class="px-3 h-100">
                            <div class="icon-circle-soft mx-auto">
                                <i class="fi fi-rr-globe" style="font-size: 2.5rem; margin-top: 10px;"></i>
                            </div>
                            <p class=" fw-bold mt-2 mb-2 text-black">Global Expertise</p>
                            <p class="small"> Access top specialists accross the world, no matter where you are.</p>

                        </div>
                    </div>

                    <!-- ITEM 2 (CENTER WITH BORDERS) -->
                    <div class="col-md-4 col-6 mb-3 border-start border-end">
                        <div class="px-3 h-100">
                            <div class="icon-circle-soft mx-auto">
                                <i class="fi fi-rr-bulb" style="font-size: 2.5rem; margin-top: 10px;"></i>
                            </div>
                            <p class="fw-bold mt-2 mb-2 text-black">Independent Opinions</p>
                            <p class="small">Recieve unbiased expert insights focused on your case.</p>
                        </div>
                    </div>

                    <!-- ITEM 3 -->
                    <div class="col-md-4 col-6 mt-3 mt-md-0">
                        <div class="px-3 h-100">
                            <div class="icon-circle-primary mx-auto ">
                                <i class="fi fi-rr-lock" style="font-size: 2.5rem; margin-top: 10px;"></i>
                            </div>
                            <p class="fw-bold mt-2 mb-2 text-black">Secure & Confidential</p>
                            <p class="small">Your health information is protected with advanced security and privacy.</p>
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
                        <span class="quote-mark">“</span>
                        Getting a second opinion gave us the  clarity 
                        we needed and the confidence to move 
                        forward with the right treatment plan.
                    </p>
                    <small class="text-secondary">— PriGina Patient</small>
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
                    ['icon' => 'upload', 'title' => 'Submit Your Case', 'desc' => 'Upload your medical records and share details about your confition securely.'],
                    ['icon' => 'user-md', 'title' => 'We Assign a Specialist', 'desc' => 'We match youyr ccase with an experienced physician in the relevant specialty.'],
                    ['icon' => 'folder', 'title' => 'Case Review', 'desc' => 'The physician reviews your case and prepares a detialed second opinion.'],
                    ['icon' => 'file', 'title' => 'Receive Report', 'desc' => 'You receive a comprehensive second opinion report with expert insignts and recommendations.'],
                    ['icon' => 'video-camera', 'title' => 'Discuss (Optional)', 'desc' => 'Sehedule an optional video discussion with the physician to ask questions and get further clarity.'],
                ];
            @endphp
        <h2 class="fw-bold mb-4 text-center text-primary">How It Works for Patients</h2>

        <div class="row g-4 justify-content-center position-relative">

            @foreach($steps as $index => $step)
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
                    @if(!$loop->last)
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
                Our service provides a second medical opinion for informational and educational purposes only. </br>
                It does not replace your primary doctor. and not a substitute for medical consultation, diagnosis, treatment or prescription.
            </p>

        </div>
    </div>
</section>


<!-- WHY -->
<section class="py-5 text-center">
    <div class="container">

        <h2 class="fw-bold mb-5 text-primary">Why Patients Choose PriGina Global Telemed</h2>

        <div class="d-flex flex-wrap justify-content-center gap-2 md-gap-4 ">

            <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                <i class="fi fi-rr-users text-secondary fs-3 mb-2 d-block"></i>
                <h6 class="fw-semibold mb-1">Top Specialists</h6>
                <p class="small text-muted mb-0">Contact with board-certified physicians and leading experts across a wide range of specialties.</p>
            </div>

            <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                <i class="fi fi-rr-clock text-secondary fs-3 mb-2 d-block"></i>
                <h6 class="fw-semibold mb-1">Convenient</h6>
                <p class="small text-muted mb-0">No travel. No long waits. Get expert opinions from the comfort for your home.</p>
            </div>

            <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                <i class="fi fi-rr-heart text-secondary fs-3 mb-2 d-block"></i>
                <h6 class="fw-semibold mb-1">Better Decisions</h6>
                <p class="small text-muted mb-0">Gain clarity and confidence with expert insights to guide your heathcaer choices.</p>
            </div>

            <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                <i class="fi fi-rr-globe text-secondary fs-3 mb-2 d-block"></i>
                <h6 class="fw-semibold mb-1">Worldwide</h6>
                <p class="small text-muted mb-0">Our services are available to patients anywhere in the world.</p>
            </div>

            <div class="text-center border rounded p-3 bg-white shadow-sm" style="width: 200px;">
                <i class="fi fi-rr-shield-check text-secondary fs-3 mb-2 d-block"></i>
                <h6 class="fw-semibold mb-1">Privacy</h6>
                <p class="small text-muted mb-0">We follow strict security standards to keep your information safe.</p>
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
                        <h3 class="info-title">Take the Next Step Toward Clarity.</h3>
                         <p class="mb-0 text-white">A second opinion can make all the difference.</p>
                         <p class="mb-0 text-white">We're here to help you maek informed decisions about your health.</p>
                    </div>
                    <div class="support-info wow fadeInUp" data-wow-duration="1s">
                    <a href="{{ check() ? route('doctors') : route('login') }}" class="btn btn-light px-4 mt-3 mt-md-0">
            Get a Second Opinion →
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
    transform: translateX(-50%); /* centers horizontally */
    background: #fff;
    padding: 16px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
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
    -webkit-mask-image: radial-gradient(
        circle at center,
        rgba(0,0,0,1) 70%,
        rgba(0,0,0,0.6) 85%,
        rgba(0,0,0,0) 100%
    );
    mask-image: radial-gradient(
        circle at center,
        rgba(0,0,0,1) 70%,
        rgba(0,0,0,0.6) 85%,
        rgba(0,0,0,0) 100%
    );
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