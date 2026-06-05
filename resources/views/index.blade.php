@extends('layouts.mainlayout')

@section('content')
    <!-- index -->
    <!-- HERO -->
    <section class="mb-5 mt-2">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5">
                    <h1 class="fw-bold text-primary display-5">
                        When the Diagnosis Matters,<br>
                        <span class="text-secondary">Get a Second Opinion.</span>
                    </h1>

                    <p class="text-muted mt-3">
                        Access experienced physicians worldwide for independent medical insights —
                        giving you clarity, confidence, and control over your health decisions.
                    </p>

                    <div class="d-flex align-items-center gap-3 mt-4 trust-badges">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fi fi-rr-shield-check trust-badge-icon text-secondary"></i>
                            <div>
                                <p class="mb-0 fw-bold small lh-sm">USA-Registered</p>
                                <p class="mb-0 text-muted small lh-sm">Telemedicine Company</p>
                            </div>
                        </div>
                        <div class="trust-divider"></div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fi fi-rr-globe trust-badge-icon text-secondary"></i>
                            <div>
                                <p class="mb-0 fw-bold small lh-sm">Healthcare</p>
                                <p class="mb-0 text-muted small lh-sm">Without Borders</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-3">
                        <a href="{{ check() ? route('doctors') : route('login') }}" class="btn btn-primary px-4 py-2">
                            Get a Second Opinion
                        </a>
                        <a href="{{ route('how-it-works') }}" class="btn btn-outline-secondary px-4 py-2">
                            How It Works
                        </a>
                    </div>

                    <div class="hero-features mt-5">

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="hero-feat-icon" style="background:#dce8f7;">
                                        <i class="fa fa-globe" style="color:#2e6dc8;"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-1 small">Global Physician Network</p>
                                        <p class="text-muted mb-0 small">Connect with specialists worldwide.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="hero-feat-icon" style="background:#d5f0ec;">
                                        <i class="fa fa-shield-alt" style="color:#1a9e87;"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-1 small">Private & Secure</p>
                                        <p class="text-muted mb-0 small">Your data and health information are always
                                            protected.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="my-3">

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="hero-feat-icon" style="background:#e8e0f8;">
                                        <i class="fa fa-file-alt" style="color:#7c4dbd;"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-1 small">Detailed Expert Review</p>
                                        <p class="text-muted mb-0 small">Comprehensive, evidence-based second opinions.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="hero-feat-icon" style="background:#fdeede;">
                                        <i class="fa fa-clock" style="color:#e07b28;"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-1 small">Fast Turnaround</p>
                                        <p class="text-muted mb-0 small">Timely insights so you can make confident decisions
                                            sooner.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-primary mt-4 mb-0 d-flex align-items-center gap-3" role="alert"
                                style="background: #e0e5ed">

                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-lock text-primary"></i>
                                </div>

                                <span>Specialist profiles become visible after account creation.</span>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-7 text-center  hero-image mt-4 mt-md-0">
                    <img src="{{ asset('build/img/home-1.jpeg') }}" class="img-fluid">
                </div>

            </div>
        </div>
    </section>


    <section class="py-5 text-center how-works">
        <div class="container">
            <h6 class="text-muted">HOW IT WORKS</h6>
            <h2 class="fw-bold mb-5">Simple. Structured. Expert-Driven.</h2>

            <div class="row align-items-stretch position-relative">

                <!-- STEP 1 -->
                <div class="col-md-4 mb-4 mb-md-0 position-relative">
                    <div class="step-card p-4 border rounded h-100 position-relative">

                        <span class="step-number">1</span>

                        <div class="step-icon">
                            <img src="{{ asset('build/img/home-icon-1.png') }}" alt="Submit your case">
                        </div>

                        <h5>Sign up and submit your case</h5>
                        <p class="text-muted mb-0">
                            Upload your medical records and describe your condition.
                        </p>
                    </div>

                    <!-- Arrow -->
                    <div class="step-arrow d-none d-md-block">
                        <i class="fi fi-rr-arrow-small-right"></i>
                    </div>
                </div>

                <!-- STEP 2 -->
                <div class="col-md-4 mb-4 mb-md-0 position-relative">
                    <div class="step-card p-4 border rounded h-100 position-relative">

                        <span class="step-number">2</span>

                        <div class="step-icon">
                            <img src="{{ asset('build/img/home-icon-2.png') }}" alt="Get matched with an expert">
                        </div>

                        <h5>Schedule Appointment with an Expert</h5>
                        <p class="text-muted mb-0">
                            We connect you with a qualified specialist best suited to your case.
                        </p>
                    </div>

                    <!-- Arrow -->
                    <div class="step-arrow d-none d-md-block">
                        <i class="fi fi-rr-arrow-small-right"></i>
                    </div>
                </div>

                <!-- STEP 3 -->
                <div class="col-md-4 position-relative">
                    <div class="step-card p-4 border rounded h-100 position-relative">

                        <span class="step-number">3</span>

                        <div class="step-icon">
                            <img src="{{ asset('build/img/icon-3.webp') }}" alt="Receive your second opinion">
                        </div>

                        <h5>Receive Your Second Opinion</h5>
                        <p class="text-muted mb-0">
                            Get a detailed expert review and personalized recommendations.
                        </p>
                    </div>
                </div>

            </div>

            <a href="{{ route('patient.dashboard') }}" class="btn btn-secondary mt-5 px-4">Start Your Review</a>
        </div>
    </section>

    <section class="py-5 bg-light text-center">
        <div class="container">
            <h6 class="text-secondary">WHY PRIGINA?</h6>
            <h2 class="fw-bold mb-5">Built for Better Medical Decisions</h2>

            <div class="row align-items-stretch">

                <!-- ITEM 1 -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="px-3 h-100">
                        <div class="mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-sm  icon-soft-primary"
                                style="width:70px;height:70px;">
                                <i class="fa fa-user-md text-primary  d-block lh-1 text-primary"
                                    style="font-size: 2.9rem; margin-top: 10px;"></i>
                            </div>
                        </div>

                        <h5>Independent Expert Insight</h5>
                        <p class="mx-4 text-muted mb-0">
                            Unbiased medical opinions focused on your case — not institutional constraints.
                        </p>
                    </div>
                </div>

                <!-- ITEM 2 (WITH BORDERS) -->
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="px-3 h-100 position-relative border-start border-end">

                        <div class="mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-sm icon-soft-secondary"
                                style="width:70px;height:70px;">

                                <i class="fi fi-rr-globe d-block lh-1 text-secondary"
                                    style="font-size: 2.9rem; margin-top: 10px;"></i>
                            </div>
                        </div>

                        <h5>Global Access</h5>
                        <p class="mx-4 text-muted mb-0">
                            Connect with top specialists across borders, without travel or long wait times.
                        </p>

                    </div>
                </div>

                <!-- ITEM 3 -->
                <div class="col-md-4">
                    <div class="px-3 h-100">
                        <div class="mb-3">
                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-sm icon-soft-primary"
                                style="width:70px;height:70px;">
                                <i class="fi fi-rr-shield-plus d-block lh-1 text-primary"
                                    style="font-size: 2.9rem; margin-top: 10px;"></i>
                            </div>
                        </div>

                        <h5>Secure & Confidential</h5>
                        <p class="mx-4 text-muted mb-0">
                            Your medical data is handled with strict privacy and security standards.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- DOCTORS -->
    @if (check())
        <section class="py-5">
            <div class="container">
                <div class="position-relative mb-5">
                    <div class="text-center">
                        <h6 class="text-secondary">FEATURED SPECIALISTS</h6>
                        <h2 class="fw-bold mb-0">Experienced Physicians. Trusted Insights.</h2>
                    </div>
                    <a href="{{ route('doctors') }}"
                        class="view-specialists-link text-primary fw-semibold text-decoration-none d-inline-flex align-items-center mt-3 mt-md-0">
                        View All Specialists <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <div class="doctors-slider">

                    @foreach ($doctors as $doctor)
                        <div class="slide-item wow fadeInUp" data-wow-duration="1s">
                            <div class="card doctor-item">
                                <div class="card-img card-img-hover">
                                    <a href="{{ route('doctor-details', $doctor['id']) }}"><img
                                            src="{{ $doctor['profilePicture'] ?? URL::asset('build/img/doctor-grid/doctor-grid-01.jpg') }}"
                                            alt="" class="dr-card-img"></a>
                                    <div class="grid-overlay-item">
                                        <span class="badge bg-orange"><i
                                                class="fa-solid fa-star me-1"></i>{{ $doctor['rating'] ?? 0 }}</span>
                                        <a href="javascript:void(0)" class="fav-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="d-flex active-bar">
                                        <a href="#"
                                            class="text-indigo fw-medium fs-14">{{ $doctor['specializations'][0] ?? '' }}</a>
                                        @if (($doctor['available'] ?? false) === true)
                                            <span class="badge bg-success-light d-inline-flex align-items-center">
                                                <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                Available
                                            </span>
                                        @else
                                            <span class="badge bg-danger-light d-inline-flex align-items-center">
                                                <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                Not Available
                                            </span>
                                        @endif
                                    </div>
                                    <div class="doctor-info">
                                        <div class="doctor-info-detail">
                                            <h3 class="mb-1 custom-title"><a
                                                    href="{{ route('doctor-details', $doctor['id']) }}">{{ $doctor['name'] }}</a>
                                            </h3>
                                            <div class="doctor-location">
                                                <p class="location-title"></i><span class="fw-medium">Experience:
                                                        {{ $doctor['experience'] }}</span>
                                                </p>
                                            </div>
                                            @if (isset($doctor['practiceCountry']))
                                                <div class="d-flex align-items-center gap-2">
                                                    <img src="https://flagcdn.com/24x18/{{ strtolower($doctor['practiceCountry']) }}.png"
                                                        alt="{{ $doctor['practiceCountry'] }}" width="24"
                                                        class="rounded-sm" />

                                                    <span class="fw-medium">
                                                        {{ Symfony\Component\Intl\Countries::getName($doctor['practiceCountry']) }}
                                                    </span>
                                                </div>
                                            @endif

                                        </div>

                                        <div class="doctor-footer">
                                            <div>
                                                <p class="mb-1">Consultation Fees</p>
                                                <div class="price">{{ $doctor['consultationFee'] }}</div>
                                            </div>
                                            <a href="{{ url('doctor-details', $doctor['id']) }}"
                                                class="btn btn-md book-btn">
                                                <i class="isax isax-calendar-1 icon-1"></i>
                                                <i class="isax isax-export-3 icon-2"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @else
        <section class="py-5 leftpadding">
            <div class="container">
                <div class="text-center mb-5">
                    <h6 class="text-secondary fw-semibold">GLOBAL MEDICAL SPECIALTIES</h6>
                    <h2 class="fw-bold">Access Expert Second Opinions<br>Across Multiple Specialties</h2>
                    <p class="text-muted mx-auto" style="max-width:480px;">
                        Connect with experienced physicians across a wide range of medical specialties worldwide.
                    </p>
                </div>

                <div class="row g-3 justify-content-center">
                    @php
                        $specialties = [
                            [
                                'name' => 'Cardiology',
                                'icon' => 'fa-solid fa-heart-pulse',
                                'color' => '#e74c3c',
                                'bg' => '#fdecea',
                            ],
                            [
                                'name' => 'Neurology',
                                'icon' => 'fa-solid fa-brain',
                                'color' => '#8e44ad',
                                'bg' => '#f3eafd',
                            ],
                            [
                                'name' => 'Orthopedics',
                                'icon' => 'fa-solid fa-bone',
                                'color' => '#2980b9',
                                'bg' => '#eaf4fd',
                            ],
                            [
                                'name' => 'Pulmonology',
                                'icon' => 'fa-solid fa-lungs',
                                'color' => '#16a085',
                                'bg' => '#e8f8f5',
                            ],
                            [
                                'name' => 'Pediatrics',
                                'icon' => 'fa-solid fa-baby',
                                'color' => '#e67e22',
                                'bg' => '#fef5ec',
                            ],
                            [
                                'name' => "Women's Health",
                                'icon' => 'fa-solid fa-venus',
                                'color' => '#e91e8c',
                                'bg' => '#fde8f4',
                            ],
                            [
                                'name' => 'Internal Medicine',
                                'icon' => 'fa-solid fa-stethoscope',
                                'color' => '#1abc9c',
                                'bg' => '#e8faf6',
                            ],
                            [
                                'name' => 'Oncology',
                                'icon' => 'fa-solid fa-ribbon',
                                'color' => '#9b59b6',
                                'bg' => '#f5eefa',
                            ],
                            [
                                'name' => 'Endocrinology',
                                'icon' => 'fa-solid fa-dna',
                                'color' => '#5b6abf',
                                'bg' => '#edeffe',
                            ],
                            [
                                'name' => 'Family Medicine',
                                'icon' => 'fa-solid fa-people-group',
                                'color' => '#27ae60',
                                'bg' => '#eafaf1',
                            ],
                            [
                                'name' => 'ENT',
                                'icon' => 'fa-solid fa-ear-listen',
                                'color' => '#f39c12',
                                'bg' => '#fef9ec',
                            ],
                            [
                                'name' => 'Dermatology',
                                'icon' => 'fa-solid fa-hand-dots',
                                'color' => '#00b4d8',
                                'bg' => '#e8f8fc',
                            ],
                        ];
                    @endphp

                    @foreach ($specialties as $spec)
                        <div class="col-6 col-md-3">
                            <div class="specialty-card text-center p-3 border rounded-3 bg-white h-100">
                                <div class="specialty-icon mx-auto mb-3"
                                    style="background:{{ $spec['bg'] }}; color:{{ $spec['color'] }};">
                                    <i class="{{ $spec['icon'] }}"></i>
                                </div>
                                <p class="fw-semibold mb-0 small">{{ $spec['name'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4 p-3 border rounded-3 d-flex align-items-center gap-3 specialty-note">
                    <div class="specialty-note-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <p class="mb-0 fw-bold">And many more specialties available.</p>
                        <p class="mb-0 text-muted small">Specialist profiles become visible after account creation.</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="bg-light">
        <div class="container pt-3 pt-md-0">
            <div class="row align-items-center">

                <div class="col-md-3">
                    <h6 class="text-secondary text-start">WHAT YOU RECEIVE</h6>

                    <h2>Your Second Opinion Includes:</h2>

                    <ul class="mt-4 list-check">
                        <li>
                            <span class="check-icon">
                                <i class="fi fi-rr-check"></i>
                            </span>
                            Detailed medical case review by a qualified specialist
                        </li>

                        <li>
                            <span class="check-icon">
                                <i class="fi fi-rr-check"></i>
                            </span>
                            Expert-written opinion report with clear insights
                        </li>

                        <li>
                            <span class="check-icon">
                                <i class="fi fi-rr-check"></i>
                            </span>
                            Personalized recommendations and next-step guidance
                        </li>

                        <li>
                            <span class="check-icon">
                                <i class="fi fi-rr-check"></i>
                            </span>
                            Optional follow-up discussion with your physician
                        </li>
                    </ul>
                </div>

                <div class="col-md-9 text-center recieve-section-image">
                    <img src="{{ asset('build/img/home-2.jpeg') }}" class="img-fluid">
                </div>

            </div>
        </div>
    </section>


    <section class="py-4 mx-md-4">
        <div class="container ">
            <div class="p-4 border rounded bg-light mx-5 d-flex align-items-stretch disclaimer-box">

                <!-- ICON -->
                <div class="disclaimer-icon">
                    <i class="fi fi-rr-shield-check"></i>
                </div>

                <!-- TEXT -->
                <div class="ms-3">
                    <h6 class="mb-1 mt-2 fw-bold text-primary">
                        PriGina Global Telemed provides structured second medical opinions to support your healthcare
                        decisions.
                    </h6>

                    <p class="text-muted small mb-0">
                        This service does not replace your primary physician and does not provide diagnosis, treatment, or
                        prescriptions.
                    </p>
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
                        <h3 class="info-title">Get the Clarity You Deserve.</h3>
                        <p class="mb-0 text-white">Make informed medical decisions with confidence.</p>
                    </div>
                    <div class="support-info wow fadeInUp" data-wow-duration="1s">
                        <a href="{{ check() ? route('doctors') : route('login') }}"
                            class="btn btn-light px-4 mt-3 mt-md-0">
                            Request Your Second Opinion →
                        </a>
                    </div>
                </div>
                <img src="{{ URL::asset('build/img/bg/info-bg.png') }}" alt="element" class="img-fluid element-01">
            </div>
        </div>
    </section>
    <!-- /Info Section -->
    <!-- App Section -->
    <section class="app-section app-sec-one p-0 mb-3">
        <div class="container">
            <div class="app-bg">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="app-content d-flex flex-column justify-content-center">

                            <div class="section-header section-header-one wow fadeInUp" data-wow-duration="1s">
                                <p class="mt-0 mb-0">Working for Your Better Health.</p>
                                <h2 class="section-title"> Download the PriGina Global Telemed App today! </h2>
                            </div>
                            <div class="google-imgs wow fadeInUp" data-wow-duration="1s">
                                <a href="#"><img src="{{ URL::asset('build/img/icons/app-store.svg') }}"
                                        alt="img"></a>
                                <a href="#"><img src="{{ URL::asset('build/img/icons/google-play.svg') }}"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-duration="1s">
                        <div class="mobile-img">
                            <img src="{{ asset('build/img/mobiles-Photoroom.png') }}" class="img-fluid width-50"
                                alt="img">
                        </div>
                    </div>
                </div>
                <div class="app-bgs">
                    <img src="{{ URL::asset('build/img/bg/app-bg-02.png') }}" alt="img" class="app-bg-01">
                    <img src="{{ URL::asset('build/img/bg/app-bg-03.png') }}" alt="img" class="app-bg-02">
                    <img src="{{ URL::asset('build/img/bg/app-bg-04.png') }}" alt="img" class="app-bg-03">
                </div>
            </div>
        </div>
    </section>
    <!-- /App Section -->




    <style>
        /* CARD */
        .step-card {
            background: #fff;
            transition: all 0.3s ease;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .width-50 {
            width: 50%;
        }

        @media (max-width: 1440.96px) {
            .width-50 {
                width: 100%;
            }
        }

        .card-img-hover {
            position: relative;
            overflow: hidden;
            border-radius: 12px 12px 0 0;
        }

        .dr-card-img {
            width: 100%;
            aspect-ratio: 612 / 391;
            object-fit: cover;
            display: block;
        }

        /* NUMBER (top-left badge) */
        .step-number {
            position: absolute;
            top: -12px;
            left: -12px;
            background: var(--primary);
            color: #fff;
            width: 32px;
            height: 32px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ICON */
        .step-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 15px;
            background: color-mix(in srgb, var(--primary) 12%, white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .step-icon i {
            font-size: 26px;
            color: var(--primary);
            display: block;
            line-height: 1;
        }

        .step-icon img {
            width: 42px;
            height: 42px;
            object-fit: contain;
            display: block;
        }

        /* ARROW BETWEEN CARDS */
        .step-arrow {
            position: absolute;
            top: 50%;
            right: -12px;
            transform: translateY(-50%);
            font-size: 22px;
            color: var(--secondary);
        }

        .view-specialists-link {
            justify-content: center;
            width: 100%;
        }

        @media (min-width: 768px) {
            .view-specialists-link {
                position: absolute;
                right: 0;
                bottom: 0;
                width: auto;
            }

        }

        .list-check {
            list-style: none;
            padding: 0;
            margin: 0;
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

        .recieve-section-image {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }

        .recieve-section-image img {
            width: 100%;
            display: block;

            /* smooth blend into left content */
            -webkit-mask-image: linear-gradient(to left, black 75%, transparent 100%);
            mask-image: linear-gradient(to left, black 75%, transparent 100%);
        }


        .list-check li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
            line-height: 1.6;
            font-size: 15px;
            color: #5f6c72;
            /* softer text like screenshot */
        }

        /* green filled circle */
        .check-icon {
            width: 22px;
            height: 22px;
            min-width: 22px;
            border-radius: 50%;
            background: var(--secondary);
            /* your brand color */
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 3px;
        }

        /* white check */
        .check-icon i {
            color: #fff;
            font-size: 11px;
            display: block;
            line-height: 1;
        }

        .disclaimer-box {
            gap: 15px;
        }

        /* ICON FULL HEIGHT */
        .disclaimer-icon {
            width: 60px;
            min-width: 60px;
            height: 60px;
            border-radius: 10px;
            background: color-mix(in srgb, var(--primary) 12%, white);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ICON STYLE */
        .disclaimer-icon i {
            font-size: 38px;
            color: var(--primary);
            display: block;
            line-height: 1;
        }

        /* SPECIALTIES GRID (guest view) */
        .specialty-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .specialty-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .specialty-icon {
            width: 74px;
            height: 74px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }

        .specialty-note {
            background: #f8f9fa;
        }

        .specialty-note-icon {
            width: 44px;
            min-width: 44px;
            height: 44px;
            border-radius: 10px;
            background: color-mix(in srgb, var(--primary) 12%, white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: var(--primary);
        }

        .hero-feat-icon {
            width: 56px;
            min-width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .trust-badge-icon {
            font-size: 2rem;
            display: block;
            line-height: 1;
        }

        .trust-divider {
            width: 1px;
            height: 36px;
            background: #dee2e6;
        }

        .leftpadding {
            padding: 0 220px;
        }

        @media (max-width: 1200px) {
            .leftpadding {
                padding: 0 100px;
            }
        }

        @media (max-width: 768px) {
            .leftpadding {
                padding: 0 20px;
            }
        }

        @media (max-width: 480px) {
            .leftpadding {
                padding: 0 10px;
            }
        }
    </style>
@endsection
