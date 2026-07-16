@extends('layouts.mainlayout')

@section('content')
    <!-- index -->
    <!-- HERO -->
    <section class=" mt-2">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 order-2 order-lg-1">
                    <h1 class="fw-bold text-primary display-5">
                        {{ __('app.home.hero_headline') }}<br>
                        <span class="text-secondary">{{ __('app.home.hero_headline_2') }}</span>
                    </h1>

                    <p class="text-muted mt-3">
                        {{ __('app.home.hero_desc') }}
                    </p>

                    <div class="d-flex align-items-center gap-3 mt-4 trust-badges">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fi fi-rr-shield-check trust-badge-icon text-secondary"></i>
                            <div>
                                <p class="mb-0 fw-bold small lh-sm">{{ __('app.home.badge_usa') }}</p>
                                <p class="mb-0 text-muted small lh-sm">{{ __('app.home.badge_telecom') }}</p>
                            </div>
                        </div>
                        <div class="trust-divider"></div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fi fi-rr-globe trust-badge-icon text-secondary"></i>
                            <div>
                                <p class="mb-0 fw-bold small lh-sm">{{ __('app.home.badge_healthcare') }}</p>
                                <p class="mb-0 text-muted small lh-sm">{{ __('app.home.badge_borders') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-3">
                        <a href="{{ check() ? route('doctors') : route('login') }}" class="btn btn-primary px-4 py-2">
                            {{ __('app.home.get_second_opinion') }}
                        </a>
                        <a href="{{ route('how-it-works') }}" class="btn btn-outline-secondary px-4 py-2">
                            {{ __('app.home.how_it_works_btn') }}
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
                                        <p class="fw-bold mb-1 small">{{ __('app.home.global_physician') }}</p>
                                        <p class="text-muted mb-0 small">{{ __('app.home.global_physician_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="hero-feat-icon" style="background:#d5f0ec;">
                                        <i class="fa fa-shield-alt" style="color:#1a9e87;"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-1 small">{{ __('app.home.private_secure') }}</p>
                                        <p class="text-muted mb-0 small">{{ __('app.home.private_secure_desc') }}</p>
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
                                        <p class="fw-bold mb-1 small">{{ __('app.home.detailed_expert') }}</p>
                                        <p class="text-muted mb-0 small">{{ __('app.home.detailed_expert_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-start gap-3">
                                    <div class="hero-feat-icon" style="background:#fdeede;">
                                        <i class="fa fa-clock" style="color:#e07b28;"></i>
                                    </div>
                                    <div>
                                        <p class="fw-bold mb-1 small">{{ __('app.home.fast_turnaround') }}</p>
                                        <p class="text-muted mb-0 small">{{ __('app.home.fast_turnaround_desc') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-primary mt-4 mb-0 d-flex align-items-center gap-3" role="alert"
                                style="background: #e0e5ed">

                                <div class="rounded-circle bg-white d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 50px; height: 50px;">
                                    <i class="fa-solid fa-lock text-primary"></i>
                                </div>

                                <span>{{ __('app.home.specialist_note') }}</span>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-7 text-center hero-image order-1 order-lg-2 mb-4 mb-lg-0">
                    <img src="{{ asset('build/img/home-1.jpeg') }}" class="img-fluid">
                </div>

            </div>
        </div>
    </section>


    <!-- Brochure Download -->
    <section class="py-4">
        <div class="px-3">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center gap-4 p-4 rounded-3 border" style="background:#f8faff;">
                        <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3"
                            style="width:72px;height:72px;background:#e8eef8;">
                            <i class="fi fi-rr-document d-block lh-1 text-primary"
                                style="font-size:2.2rem;margin-top:6px;"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="fw-bold mb-1">{{ __('app.home.brochure_title') }}</h5>
                            <p class="text-muted mb-2 small">{{ __('app.home.brochure_desc') }}</p>
                            <a href="{{ asset('build/file.pdf') }}" download
                                class="fw-semibold text-primary text-decoration-none">
                                {{ __('app.home.download_brochure') }} <i class="fi fi-rr-download ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Brochure Download -->

    <!-- OUR SERVICES: THE PRIGINA MODEL -->
    <section class="py-5 text-center services-model">
        <div class="container">
            <h2 class="fw-bold mb-5">
                <span class="text-dark">{{ __('app.home.services_headline_prefix') }}</span>
                <span class="text-primary">{{ __('app.home.services_headline_highlight') }}</span>
            </h2>

            @php
                $services = [
                    [
                        'accent' => 'blue',
                        'icon' => 'file-medical-alt',
                        'title' => __('app.home.service1_title'),
                        'desc' => __('app.home.service1_desc'),
                        'bullets' => [__('app.home.service1_bullet1'), __('app.home.service1_bullet2'), __('app.home.service1_bullet3')],
                    ],
                    [
                        'accent' => 'teal',
                        'icon' => 'user-md',
                        'title' => __('app.home.service2_title'),
                        'desc' => __('app.home.service2_desc'),
                        'bullets' => [__('app.home.service2_bullet1'), __('app.home.service2_bullet2'), __('app.home.service2_bullet3')],
                    ],
                    [
                        'accent' => 'green',
                        'icon' => 'marker',
                        'title' => __('app.home.service3_title'),
                        'desc' => __('app.home.service3_desc'),
                        'bullets' => [__('app.home.service3_bullet1'), __('app.home.service3_bullet2'), __('app.home.service3_bullet3')],
                    ],
                    [
                        'accent' => 'purple',
                        'icon' => 'users',
                        'title' => __('app.home.service4_title'),
                        'desc' => __('app.home.service4_desc'),
                        'bullets' => [__('app.home.service4_bullet1'), __('app.home.service4_bullet2'), __('app.home.service4_bullet3'), __('app.home.service4_bullet4')],
                    ],
                ];
            @endphp

            <div class="row g-4 justify-content-center align-items-stretch">
                @foreach ($services as $service)
                    <div class="col-lg-3 col-md-6">
                        <div class="service-card h-100 p-4 text-start d-flex flex-column">

                            <div class="service-icon-circle icon-grad-{{ $service['accent'] }} mx-auto">
                                <i class="fi fi-rr-{{ $service['icon'] }}"></i>
                            </div>

                            <h5 class="fw-bold text-center service-title-{{ $service['accent'] }} mt-3">{{ $service['title'] }}</h5>
                            <p class="text-muted text-center small">{{ $service['desc'] }}</p>

                            <span class="service-underline underline-{{ $service['accent'] }} d-block mx-auto"></span>

                            <ul class="service-bullets mt-3 mb-4">
                                @foreach ($service['bullets'] as $bullet)
                                    <li>
                                        <span class="service-check check-{{ $service['accent'] }}">
                                            <i class="fi fi-rr-check"></i>
                                        </span>
                                        {{ $bullet }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="{{ check() ? route('doctors') : route('register') }}"
                                class="btn service-btn btn-{{ $service['accent'] }} w-100 mt-auto d-flex align-items-center justify-content-center gap-2">
                                {{ __('app.home.service_cta') }} <i class="fi fi-rr-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-5 text-center how-works">
        <div class="container">
            <h6 class="how-works-label">{{ __('app.home.how_works_label') }}</h6>
            <h2 class="fw-bold mb-5">{{ __('app.home.how_works_headline') }}</h2>

            @php
                $howSteps = [
                    [
                        'img' => 'home-icon-1.png',
                        'title' => __('app.home.step1_title'),
                        'desc' => __('app.home.step1_desc'),
                    ],
                    [
                        'img' => 'home-icon-2.png',
                        'title' => __('app.home.step2_title'),
                        'desc' => __('app.home.step2_desc'),
                    ],
                    [
                        'img' => 'icon-3.webp',
                        'title' => __('app.home.step3_title'),
                        'desc' => __('app.home.step3_desc'),
                    ],
                ];
            @endphp

            <div class="row align-items-stretch g-4">

                @foreach ($howSteps as $index => $step)
                    <div class="col-lg-3 col-md-6 position-relative how-step-col">
                        <div class="how-step-icon mx-auto position-relative">
                            <img src="{{ asset('build/img/' . $step['img']) }}" alt="{{ $step['title'] }}">
                            <span class="how-step-badge">{{ $index + 1 }}</span>
                        </div>

                        <h5 class="fw-bold text-primary mt-3">{{ $step['title'] }}</h5>
                        <p class="text-muted small mb-0">{{ $step['desc'] }}</p>

                        {{-- @if (!$loop->last)
                            <span class="how-step-connector d-none d-lg-flex">
                                <i class="fi fi-rr-angle-small-right"></i>
                            </span>
                        @endif --}}
                    </div>
                @endforeach

                <!-- SIDE HIGHLIGHT CARD -->
                <div class="col-lg-3 col-md-6">
                    <div class="how-side-card h-100 d-flex align-items-center gap-3 p-4 text-start">
                        <i class="fi fi-rr-shield-check how-side-icon"></i>
                        <div>
                            <h6 class="fw-bold text-primary mb-1">{{ __('app.home.how_works_side_title') }}</h6>
                            <p class="text-muted small mb-0">{{ __('app.home.how_works_side_desc') }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- STATS STRIP -->
            <div class="row g-3 how-stats-strip text-start mt-4">

                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="how-stat-icon"><i class="fi fi-rr-users"></i></div>
                        <div>
                            <div class="how-stat-number">{{ __('app.home.how_works_stat1_number') }}</div>
                            <div class="how-stat-label">{{ __('app.home.how_works_stat1_label') }}</div>
                            <div class="how-stat-sub">{{ __('app.home.how_works_stat1_sub') }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="how-stat-icon"><i class="fi fi-rr-stethoscope"></i></div>
                        <div>
                            <div class="how-stat-number">{{ __('app.home.how_works_stat2_number') }}</div>
                            <div class="how-stat-label">{{ __('app.home.how_works_stat2_label') }}</div>
                            <div class="how-stat-sub">{{ __('app.home.how_works_stat2_sub') }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="how-stat-icon"><i class="fi fi-rr-globe"></i></div>
                        <div>
                            <div class="how-stat-label">{{ __('app.home.how_works_stat3_label') }}</div>
                            <div class="how-stat-sub">{{ __('app.home.how_works_stat3_sub') }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center gap-3">
                        <div class="how-stat-icon"><i class="fi fi-rr-lock"></i></div>
                        <div>
                            <div class="how-stat-number">{{ __('app.home.how_works_stat4_number') }}</div>
                            <div class="how-stat-label">{{ __('app.home.how_works_stat4_label') }}</div>
                            <div class="how-stat-sub">{{ __('app.home.how_works_stat4_sub') }}</div>
                        </div>
                    </div>
                </div>

            </div>

            <a href="{{ route('patient.dashboard') }}"
                class="btn btn-secondary mt-5 px-4">{{ __('app.home.start_review') }}</a>
        </div>
    </section>

    <section class="py-5 bg-light text-center">
        <div class="container">
            <h6 class="text-secondary">{{ __('app.home.why_label') }}</h6>
            <h2 class="fw-bold mb-5">{{ __('app.home.why_headline') }}</h2>

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

                        <h5>{{ __('app.home.independent_expert') }}</h5>
                        <p class="mx-4 text-muted mb-0">
                            {{ __('app.home.independent_expert_desc') }}
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

                        <h5>{{ __('app.home.global_access') }}</h5>
                        <p class="mx-4 text-muted mb-0">
                            {{ __('app.home.global_access_desc') }}
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

                        <h5>{{ __('app.home.secure_confidential') }}</h5>
                        <p class="mx-4 text-muted mb-0">
                            {{ __('app.home.secure_confidential_desc') }}
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
                        <h6 class="text-secondary">{{ __('app.home.featured_label') }}</h6>
                        <h2 class="fw-bold mb-0">{{ __('app.home.featured_headline') }}</h2>
                    </div>
                    <a href="{{ route('doctors') }}"
                        class="view-specialists-link text-primary fw-semibold text-decoration-none d-inline-flex align-items-center mt-3 mt-md-0">
                        {{ __('app.home.view_all_specialists') }} <i class="fa-solid fa-arrow-right ms-2"></i>
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
                                                {{ __('app.home.available') }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger-light d-inline-flex align-items-center">
                                                <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                {{ __('app.home.not_available') }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="doctor-info">
                                        <div class="doctor-info-detail">
                                            <h3 class="mb-1 custom-title"><a
                                                    href="{{ route('doctor-details', $doctor['id']) }}">{{ $doctor['name'] }}</a>
                                            </h3>
                                            <div class="doctor-location">
                                                <p class="location-title"><span
                                                        class="fw-medium">{{ __('app.home.experience') }}
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
                                                <p class="mb-1">{{ __('app.home.consultation_fees') }}</p>
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
                    <h6 class="text-secondary fw-semibold">{{ __('app.home.specialties_label') }}</h6>
                    <h2 class="fw-bold">{{ __('app.home.specialties_headline') }}</h2>
                    <p class="text-muted mx-auto" style="max-width:480px;">
                        {{ __('app.home.specialties_desc') }}
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
                        <div class="col-6 col-md-3 {{ $loop->index >= 6 ? 'd-none d-md-block' : '' }}">
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
                        <p class="mb-0 fw-bold">{{ __('app.home.and_more') }}</p>
                        <p class="mb-0 text-muted small">{{ __('app.home.specialist_note') }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="bg-light">
        <div class="container py-4 py-lg-0">
            <div class="row align-items-center">

                <div class="col-lg-3">
                    <h6 class="text-secondary text-start">{{ __('app.home.what_receive_label') }}</h6>

                    <h2>{{ __('app.home.what_receive_headline') }}</h2>

                    <ul class="mt-4 list-check">
                        <li>
                            <span class="check-icon">
                                <i class="fi fi-rr-check"></i>
                            </span>
                            {{ __('app.home.bullet1') }}
                        </li>

                        <li>
                            <span class="check-icon">
                                <i class="fi fi-rr-check"></i>
                            </span>
                            {{ __('app.home.bullet2') }}
                        </li>

                        <li>
                            <span class="check-icon">
                                <i class="fi fi-rr-check"></i>
                            </span>
                            {{ __('app.home.bullet3') }}
                        </li>

                        <li>
                            <span class="check-icon">
                                <i class="fi fi-rr-check"></i>
                            </span>
                            {{ __('app.home.bullet4') }}
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9 text-center recieve-section-image">
                    <img src="{{ asset('build/img/home-2.jpeg') }}" class="img-fluid">
                </div>

            </div>
        </div>
    </section>


    <section class="py-4 mx-md-4">
        <div class="container ">
            <div
                class="p-4 border rounded bg-light mx-5 d-flex flex-column flex-md-row align-items-center align-items-md-stretch disclaimer-box">

                <!-- ICON -->
                <div class="disclaimer-icon mb-3 mb-md-0">
                    <i class="fi fi-rr-shield-check"></i>
                </div>

                <!-- TEXT -->
                <div class="ms-md-3 text-center text-md-start">
                    <h6 class="mb-1 mt-2 fw-bold text-primary">
                        {{ __('app.home.disclaimer_title') }}
                    </h6>

                    <p class="text-muted small mb-0">
                        {{ __('app.home.disclaimer_desc') }}
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
                        <h3 class="info-title">{{ __('app.home.info_headline') }}</h3>
                        <p class="mb-0 text-white">{{ __('app.home.info_desc') }}</p>
                    </div>
                    <div class="support-info wow fadeInUp" data-wow-duration="1s">
                        <a href="{{ check() ? route('doctors') : route('login') }}"
                            class="btn btn-light px-4 mt-3 mt-md-0">
                            {{ __('app.home.info_cta') }}
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
                                <p class="mt-0 mb-0">{{ __('app.home.app_working') }}</p>
                                <h2 class="section-title">{{ __('app.home.app_headline') }}</h2>
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
        /* OUR SERVICES: THE PRIGINA MODEL */
        .service-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            transition: 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.06);
        }

        .service-icon-circle {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 32px;
        }

        .icon-grad-blue {
            background: linear-gradient(135deg, var(--primary), #2f7ed8);
        }

        .icon-grad-teal {
            background: linear-gradient(135deg, var(--secondary), #17c3a4);
        }

        .icon-grad-green {
            background: linear-gradient(135deg, #3f9142, #7cb342);
        }

        .icon-grad-purple {
            background: linear-gradient(135deg, #7b3fe4, #5b2fc2);
        }

        .service-title-blue {
            color: var(--primary);
        }

        .service-title-teal {
            color: var(--secondary);
        }

        .service-title-green {
            color: #3f9142;
        }

        .service-title-purple {
            color: #5b2fc2;
        }

        .service-underline {
            width: 32px;
            height: 3px;
            border-radius: 2px;
        }

        .underline-blue {
            background: var(--primary);
        }

        .underline-teal {
            background: var(--secondary);
        }

        .underline-green {
            background: #3f9142;
        }

        .underline-purple {
            background: #5b2fc2;
        }

        .service-bullets {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .service-bullets li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 10px;
            font-size: 14px;
            color: #5f6c72;
        }

        .service-check {
            width: 20px;
            height: 20px;
            min-width: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 2px;
        }

        .service-check i {
            color: #fff;
            font-size: 10px;
        }

        .check-blue {
            background: var(--primary);
        }

        .check-teal {
            background: var(--secondary);
        }

        .check-green {
            background: #3f9142;
        }

        .check-purple {
            background: #5b2fc2;
        }

        .service-btn {
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 10px 16px;
        }

        .btn-blue {
            background: var(--primary);
        }

        .btn-blue:hover {
            color: #fff;
            background: color-mix(in srgb, var(--primary) 85%, black);
        }

        .btn-teal {
            background: var(--secondary);
        }

        .btn-teal:hover {
            color: #fff;
            background: color-mix(in srgb, var(--secondary) 85%, black);
        }

        .btn-green {
            background: #3f9142;
        }

        .btn-green:hover {
            color: #fff;
            background: #357338;
        }

        .btn-purple {
            background: linear-gradient(135deg, #7b3fe4, #5b2fc2);
        }

        .btn-purple:hover {
            color: #fff;
            opacity: 0.9;
        }

        /* HOW IT WORKS LABEL */
        .how-works-label {
            color: var(--primary);
            font-weight: 700;
            letter-spacing: 1px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .how-works-label::before,
        .how-works-label::after {
            content: '';
            width: 32px;
            height: 2px;
            background: var(--secondary);
            display: inline-block;
        }

        /* STEP ICON (circle, image inside) */
        .how-step-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--primary) 10%, white);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .how-step-icon img {
            width: 42px;
            height: 42px;
            object-fit: contain;
            display: block;
        }

        /* NUMBER BADGE (bottom-right of icon circle) */
        .how-step-badge {
            position: absolute;
            bottom: 0;
            right: calc(50% - 45px);
            background: var(--primary);
            color: #fff;
            width: 28px;
            height: 28px;
            font-size: 13px;
            font-weight: 600;
            border-radius: 50%;
            border: 2px solid #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* DOTTED CONNECTOR BETWEEN STEPS */
        .how-step-connector {
            position: absolute;
            top: 45px;
            right: -18px;
            left: auto;
            width: calc(100% - 90px);
            align-items: center;
            justify-content: flex-end;
            border-top: 2px dashed var(--secondary);
            color: var(--secondary);
            font-size: 18px;
        }

        /* SIDE HIGHLIGHT CARD */
        .how-side-card {
            background: #f4f7fb;
            border-radius: 14px;
        }

        .how-side-icon {
            font-size: 34px;
            color: var(--primary);
            flex-shrink: 0;
        }

        /* STATS STRIP */
        .how-stats-strip {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 20px 12px;
        }

        .how-stat-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--primary) 10%, white);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 20px;
        }

        .how-stat-number {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            line-height: 1.2;
        }

        .how-stat-label {
            font-weight: 600;
            font-size: 14px;
            color: #212529;
            line-height: 1.3;
        }

        .how-stat-sub {
            font-size: 12px;
            color: #6c757d;
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
