<?php $page = 'about-us'; ?>
@extends('layouts.mainlayout')

@section('content')

<!-- HERO SECTION -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6"> 
                <h6 class="text-secondary fw-bold">ABOUT US</h6>

                <h1 class="fw-bold mb-3 text-primary">
                    About PriGina Global Telemed LLC
                </h1>

                <h5 class="text-muted mb-4">
                    Expert Insights. Global Access. Better Decisions.
                </h5>

                <p>
                    PriGina Global Telemed LLC is a physician-led platform dedicated to providing structured second medical opinions to patients worldwide.
                </p>

                <p>
                    We connect individuals with experienced physicians across multiple specialties, offering independent medical insights that support clarity, confidence, and informed healthcare decisions.
                </p>
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
                    <h4 class="fw-bold text-primary">Our Mission</h4>
                    <p class="mb-0">
                        To make expert medical knowledge accessible beyond borders—empowering patients everywhere with trusted second opinions when it matters most.
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="p-4 bg-light rounded h-100 shadow-sm">
                    <h4 class="fw-bold text-primary">Our Vision</h4>
                    <p class="mb-0">
                        To become a trusted global platform for medical second opinions—where patients everywhere can access expert insights and make confident healthcare decisions.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- WHAT WE DO -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <h2 class="fw-bold mb-3 text-primary">What We Do</h2>

        <p class="mb-5">
            At PriGina Global Telemed, we deliver a simple, structured process designed to help patients better understand their medical conditions and available options.
        </p>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold text-secondary">1. Submit Your Records</h5>
                    <p>Patients securely submit their medical records</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold text-secondary">2. Expert Review</h5>
                    <p>Cases are reviewed by qualified physicians</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-white rounded shadow-sm h-100">
                    <h5 class="fw-bold text-secondary">3. Detailed Opinion</h5>
                    <p>A detailed expert opinion is provided to guide next steps</p>
                </div>
            </div>

        </div>

        <p class="mt-4">
            Our goal is to provide clear, case-based insights that empower better decision-making.
        </p>

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

                <h3 class="fw-bold mb-3 text-primary">Optional Expert Discussion</h3>

                <p>
                    In addition to your detailed second opinion report, PriGina Global Telemed offers the option to schedule a live video discussion with the reviewing physician.
                </p>

                <p>
                    This allows you to ask questions, gain further clarity, and better understand the expert’s insights regarding your case.
                </p>

                <div class="alert alert-info mt-3">
                    Video discussions are intended to provide clarification of the second medical opinion and do not constitute a medical consultation, diagnosis, treatment, or prescription service.
                </div>

            </div>

        </div>
    </div>
</section>


<!-- GLOBAL ACCESS -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <h3 class="fw-bold mb-3 text-primary">Global Access to Expertise</h3>

        <p>
            Healthcare decisions should not be limited by geography.
        </p>

        <p>
            Our platform enables patients to connect with experienced physicians worldwide—without the need for travel, long waiting times, or complex referrals.
        </p>

    </div>
</section>


<!-- OUR APPROACH -->
<section class="py-5">
    <div class="container text-center">

        <h2 class="fw-bold mb-5 text-primary">Our Approach</h2>

        <div class="row g-4">

            <div class="col-md-3">
                <div class="p-4 bg-light rounded h-100">
                    <h5 class="fw-bold text-secondary">Clarity</h5>
                    <p>simplifying complex medical information</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-4 bg-light rounded h-100">
                    <h5 class="fw-bold text-secondary">Independence</h5>
                    <p>unbiased expert opinions focused on your case</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-4 bg-light rounded h-100">
                    <h5 class="fw-bold text-secondary">Privacy</h5>
                    <p>secure and confidential handling of medical data</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-4 bg-light rounded h-100">
                    <h5 class="fw-bold text-secondary">Quality</h5>
                    <p>connecting you with experienced physicians</p>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- IMPORTANT NOTICE -->
<section class="py-4">
    <div class="container">
        <div class="alert alert-warning">

            <h5 class="fw-bold text-primary">Important Notice</h5>

            <p class="mb-2">
                PriGina Global Telemed provides second medical opinions for informational and educational purposes only.
            </p>

            <p class="mb-0">
                Our services do not replace your primary healthcare provider and do not include diagnosis, treatment, or prescription services. Patients are encouraged to consult their local physician before making medical decisions.
            </p>

        </div>
    </div>
</section>


<!-- CTA -->
   <section class="info-section my-3">
        <div class="container">
            <div class="contact-info">
                <div class="info-col">
                    <div class="wow fadeInUp" data-wow-duration="1s">
                        <h3 class="info-title">Expert Insights. Global Reach. Better Decisions.</h3>
                         <p class="mb-0 text-white"> Get the clarity you deserve with trusted second opinions from experienced physicians worldwide.</p>
                    </div>
                    <div class="support-info wow fadeInUp" data-wow-duration="1s">
                        <a href="#" class="btn btn-light px-4 mt-3 mt-md-0">
            Request Your Second Opinion →
        </a>
                    </div>
                </div>
                <img src="{{ URL::asset('build/img/bg/info-bg.png') }}" alt="element" class="img-fluid element-01">
            </div>
        </div>
    </section>


@endsection