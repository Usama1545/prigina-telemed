@extends('layouts.mainlayout')

@section('content')

<!-- HERO -->
<section class="mb-5">
    <div class="container">
        <div class="row align-items-center">

            <!-- LEFT -->
            <div class="col-lg-5">
                <h6 class="text-secondary">FOR DOCTORS</h6>

                <h1 class="fw-bold mb-3 text-primary">
                    Join a Global Network <br>
                    of Trusted Physicians
                </h1>

                <p class="text-muted">
                    PriGina Global Telemed connects experienced physicians with patients worldwide.
                    Share your knowledge, impact lives, and practice on your terms.
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
                                Make a Difference
                            </p>

                            <p class="small text-muted">
                                Help patients gain clarity and confidence in their healthcare decisions.
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
                                Work from Anywhere
                            </p>

                            <p class="small text-muted">
                                Provide expert opinions 100% online on a schedule that works for you.
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
                                Secure & Compliant
                            </p>

                            <p class="small text-muted">
                                Our platform ensures privacy, security, and HIPAA compliance.
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
                        <span class="quote-mark text-secondary">“</span>
                        Being part of PriGina allows me to contribute beyond borders
                        and help patients when it matters most.
                    </p>
                    <small>— PriGina Physician</small>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- WHY JOIN -->
<section class="py-5 text-center">
    <div class="container">

        <h2 class="fw-bold mb-5 text-primary">Why Join PriGina Global Telemed?</h2>

        <div class="d-flex flex-wrap justify-content-center gap-4">

            <div class="feature-card bg-light">
                <i class="fi fi-rr-globe"></i>
                <h6>Global Impact</h6>
                <p class="mt-2">Reach patients around the world and make a difference.</p>
            </div>

            <div class="feature-card bg-light">
                <i class="fi fi-rr-calendar"></i>
                <h6>Flexible Schedule</h6>
                <p class="mt-2">Choose the number of cases you want to review and set your availability.</p>
            </div>

            <div class="feature-card bg-light">
                <i class="fi fi-rr-dollar"></i>
                <h6>Competitive Pay</h6>
                <p class="mt-2">Enjoy fair and transparent compensation for your expertise.</p>
            </div>

            <div class="feature-card bg-light">
                <i class="fi fi-rr-graduation-cap"></i>
                <h6>Professional Growth</h6>
                <p class="mt-2">Collaborate with a diverse network of physicians accross specialties.</p>
            </div>

            <div class="feature-card bg-light">
                <i class="fi fi-rr-shield-check"></i>
                <h6>Secure Platform</h6>
                <p class="mt-2">HIPAA-compliant platform with industry-leading security standards.</p>
            </div>

        </div>

    </div>
</section>


<!-- HOW IT WORKS -->
<section class="py-5 text-center bg-light">
    <div class="container">

        <h2 class="fw-bold mb-5">How It Works for Doctors</h2>

        @php
            $steps = [
                ['icon'=>'user','title'=>'Apply','desc'=>'Submit your application and professional credentials'],
                ['icon'=>'shield-check','title'=>'Verification','desc'=>'Our team reviews and verifies your credentials and experience'],
                ['icon'=>'settings','title'=>'Onboard','desc'=>'Complete onboarding and set your availability'],
                ['icon'=>'file','title'=>'Review Cases','desc'=>'Receive cases that match your specialties and provide your expert opinion'],
                ['icon'=>'dollar','title'=>'Get Paid','desc'=>'Earn competitive compensation for every completed case'],
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
                        <h3 class="info-title text-white">Ready to share your expertise ?</h3>
                        <p class="mb-0 text-white">
                            Join Prigina Global Telemed and be part of a mission to make expert opinions accessible worldwide.
                        </p>
                        <a href="{{ route('register') }}" class="btn btn-light px-4 mt-3">
                            Apply Now
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
                                        Global Reach
                                    </p>
                                    <p class="small text-white">
                                        Connect with patients accross the world.
                                    </p>
                                </div>
                            </div>

                            <!-- ITEM 1 -->
                            <div class="col-md-4 border-start border-end">
                                <div class="h-100">
                                    <div class="mx-auto">
                                        <i class="fi fi-rr-hand-holding-heart text-secondary" style="font-size: 3rem; margin-top: 10px;"></i>
                                    </div>
                                    <p class="fw-bold mt-1 mb-1 text-white">
                                        Rewarding Work
                                    </p>
                                    <p class="small text-white">
                                        Your expertise can change lives.
                                    </p>
                                </div>
                            </div>

                            <!-- ITEM 2 -->
                           
                            <!-- ITEM 3 -->
                            <div class="col-md-4">
                                <div class="h-100">
                                    <div class=" mx-auto">
                                        <i class="fi fi-rr-clock text-secondary" style="font-size: 3rem; margin-top: 10px;"></i>
                                    </div>
                                    <p class="fw-bold mt-1 mb-1 text-white">
                                        Work on Your Terms
                                    </p>
                                    <p class="small text-white">
                                        Maintain flexibility and  work-life balance.
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