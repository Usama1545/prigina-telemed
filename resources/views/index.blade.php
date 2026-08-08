@extends('layouts.mainlayout')

@section('content')
    <!-- index -->
    <!-- HERO -->
    <section class=" mt-2">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 order-2 order-lg-1">
                    <h1 class="fw-bold text-primary display-5 hero-anim" style="animation-delay:.05s;">
                        {{ __('app.home.hero_headline') }}<br>
                        <span class="text-secondary">{{ __('app.home.hero_headline_2') }}</span>
                    </h1>

                    <p class="text-muted mt-3 hero-anim" style="animation-delay:.15s;">
                        {{ __('app.home.hero_desc') }}
                    </p>

                    <div class="d-flex align-items-center gap-3 mt-4 trust-badges hero-anim" style="animation-delay:.25s;">
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

                    <div class="mt-4 d-flex gap-3 hero-anim" style="animation-delay:.35s;">
                        <a href="{{ patient_cta_route('login') }}" class="btn btn-primary px-4 py-2">
                            {{ __('app.home.get_second_opinion') }}
                        </a>
                        <a href="{{ route('how-it-works') }}" class="btn btn-outline-secondary px-4 py-2">
                            {{ __('app.home.how_it_works_btn') }}
                        </a>
                    </div>

                    <div class="hero-features mt-5 hero-anim" style="animation-delay:.45s;">

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

                <div class="col-lg-7 text-center hero-image order-1 order-lg-2 mb-4 mb-lg-0 hero-anim"
                    style="animation-delay:.1s;">
                    <div class="hero-video-wrap" id="heroVideoWrap">
                        <img id="heroVideoCover" class="hero-video-cover" src="{{ asset('build/img/home-1.jpeg') }}"
                            alt="{{ __('app.home.hero_headline') }}" aria-hidden="true">
                        <video id="heroVideo" class="hero-video" muted loop playsinline preload="metadata"
                            poster="{{ asset('build/img/home-1.jpeg') }}">
                            <source src="{{ asset('home/IMG_8070.mp4') }}" type="video/mp4">
                        </video>
                        <button type="button" id="heroPlayToggle" class="hero-play-toggle"
                            aria-label="{{ __('app.home.play_video') }}">
                            <i class="fa fa-play"></i>
                        </button>
                        <div class="hero-video-controls">
                            <button type="button" id="heroPauseBtn" class="hero-ctrl-btn"
                                aria-label="{{ __('app.home.pause_video') }}" hidden>
                                <i class="fa fa-pause"></i>
                            </button>
                            <button type="button" id="heroSoundToggle" class="hero-ctrl-btn"
                                aria-label="{{ __('app.home.toggle_sound') }}" hidden>
                                <i class="fa fa-volume-mute"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Brochure Download -->
    <section class="py-4">
        <div class="px-3">
            <div class="row justify-content-center">
                <div class="col-lg-8 reveal-on-scroll" data-reveal="fade-up">
                    <div class="d-flex align-items-center gap-4 p-4 rounded-3 border brochure-box"
                        style="background:#f8faff;">
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
            <h2 class="fw-bold mb-5 reveal-on-scroll" data-reveal="fade-up">
                <span class="text-dark">{{ __('app.home.services_headline_prefix') }}</span>
                <span class="text-primary">{{ __('app.home.services_headline_highlight') }}</span>
            </h2>

            @php
                $services = [
                    [
                        'accent' => 'blue',
                        'icon' => 'file-medical-alt',
                        'img' => 'IMG-1.jpeg',
                        'title' => __('app.home.service1_title'),
                        'desc' => __('app.home.service1_desc'),
                        'bullets' => [
                            __('app.home.service1_bullet1'),
                            __('app.home.service1_bullet2'),
                            __('app.home.service1_bullet3'),
                        ],
                    ],
                    [
                        'accent' => 'teal',
                        'icon' => 'user-md',
                        'img' => 'IMG-2.jpeg',
                        'title' => __('app.home.service2_title'),
                        'desc' => __('app.home.service2_desc'),
                        'bullets' => [
                            __('app.home.service2_bullet1'),
                            __('app.home.service2_bullet2'),
                            __('app.home.service2_bullet3'),
                        ],
                    ],
                    [
                        'accent' => 'green',
                        'icon' => 'marker',
                        'img' => 'IMG-3.jpeg',
                        'title' => __('app.home.service3_title'),
                        'desc' => __('app.home.service3_desc'),
                        'bullets' => [
                            __('app.home.service3_bullet1'),
                            __('app.home.service3_bullet2'),
                            __('app.home.service3_bullet3'),
                        ],
                    ],
                    [
                        'accent' => 'purple',
                        'icon' => 'users',
                        'img' => 'IMG-4.jpeg',
                        'title' => __('app.home.service4_title'),
                        'desc' => __('app.home.service4_desc'),
                        'bullets' => [
                            __('app.home.service4_bullet1'),
                            __('app.home.service4_bullet2'),
                            __('app.home.service4_bullet3'),
                            __('app.home.service4_bullet4'),
                        ],
                    ],
                ];
            @endphp

            <div class="row g-4 justify-content-center align-items-stretch">
                @foreach ($services as $service)
                    <div class="col-lg-3 col-md-6 reveal-on-scroll" data-reveal="fade-up"
                        data-reveal-delay="{{ $loop->index * 100 }}">
                        <div class="service-card h-100 text-start d-flex flex-column">

                            <div class="service-photo position-relative">
                                <img src="{{ asset('images/features/' . $service['img']) }}"
                                    alt="{{ $service['title'] }}" class="img-fluid">
                                <div class="service-icon-circle icon-grad-{{ $service['accent'] }}">
                                    <i class="fi fi-rr-{{ $service['icon'] }}"></i>
                                </div>
                            </div>

                            <div class="p-4 pt-5 d-flex flex-column flex-grow-1">
                                <h5 class="fw-bold text-center service-title-{{ $service['accent'] }}">
                                    {{ $service['title'] }}</h5>
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

                                {{-- <a href="{{ check() ? route('doctors') : route('register') }}"
                                    class="btn service-btn btn-{{ $service['accent'] }} w-100 mt-auto d-flex align-items-center justify-content-center gap-2">
                                    {{ __('app.home.service_cta') }} <i class="fi fi-rr-arrow-right"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- DOCTORS -->
    @if (check() && is_patient())
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
                    <h2 class="fw-bold specialties-headline">{{ __('app.home.specialties_headline') }}</h2>
                    <p class="text-muted mx-auto" style="max-width:480px;">
                        {{ __('app.home.specialties_desc') }}
                    </p>
                </div>

                <div class="row g-4 justify-content-center">
                    @php
                        $specialties = [
                            [
                                'name' => __('app.home.spec1_name'),
                                'desc' => __('app.home.spec1_desc'),
                                'img' => 'cardiology.jpeg',
                                'icon' => 'fa-solid fa-heart-pulse',
                                'color' => '#e74c3c',
                                'bg' => '#fdecea',
                            ],
                            [
                                'name' => __('app.home.spec2_name'),
                                'desc' => __('app.home.spec2_desc'),
                                'img' => 'brain.jpeg',
                                'icon' => 'fa-solid fa-brain',
                                'color' => '#8e44ad',
                                'bg' => '#f3eafd',
                            ],
                            [
                                'name' => __('app.home.spec3_name'),
                                'desc' => __('app.home.spec3_desc'),
                                'img' => 'bone.jpeg',
                                'icon' => 'fa-solid fa-bone',
                                'color' => '#2980b9',
                                'bg' => '#eaf4fd',
                            ],
                            [
                                'name' => __('app.home.spec4_name'),
                                'desc' => __('app.home.spec4_desc'),
                                'img' => 'chest.jpeg',
                                'icon' => 'fa-solid fa-lungs',
                                'color' => '#16a085',
                                'bg' => '#e8f8f5',
                            ],
                            [
                                'name' => __('app.home.spec5_name'),
                                'desc' => __('app.home.spec5_desc'),
                                'img' => 'pediatrics.jpeg',
                                'icon' => 'fa-solid fa-baby',
                                'color' => '#e67e22',
                                'bg' => '#fef5ec',
                            ],
                            [
                                'name' => __('app.home.spec6_name'),
                                'desc' => __('app.home.spec6_desc'),
                                'img' => 'womens-health.jpeg',
                                'icon' => 'fa-solid fa-venus',
                                'color' => '#e91e8c',
                                'bg' => '#fde8f4',
                            ],
                            [
                                'name' => __('app.home.spec7_name'),
                                'desc' => __('app.home.spec7_desc'),
                                'img' => 'interneal-medicine.jpeg',
                                'icon' => 'fa-solid fa-stethoscope',
                                'color' => '#1abc9c',
                                'bg' => '#e8faf6',
                            ],
                            [
                                'name' => __('app.home.spec8_name'),
                                'desc' => __('app.home.spec8_desc'),
                                'img' => 'oncology.jpeg',
                                'icon' => 'fa-solid fa-ribbon',
                                'color' => '#9b59b6',
                                'bg' => '#f5eefa',
                            ],
                            [
                                'name' => __('app.home.spec9_name'),
                                'desc' => __('app.home.spec9_desc'),
                                'img' => 'endo.jpeg',
                                'icon' => 'fa-solid fa-dna',
                                'color' => '#5b6abf',
                                'bg' => '#edeffe',
                            ],
                            [
                                'name' => __('app.home.spec10_name'),
                                'desc' => __('app.home.spec10_desc'),
                                'img' => 'family.jpeg',
                                'icon' => 'fa-solid fa-people-group',
                                'color' => '#27ae60',
                                'bg' => '#eafaf1',
                            ],
                            [
                                'name' => __('app.home.spec11_name'),
                                'desc' => __('app.home.spec11_desc'),
                                'img' => 'ent.jpeg',
                                'icon' => 'fa-solid fa-ear-listen',
                                'color' => '#f39c12',
                                'bg' => '#fef9ec',
                            ],
                            [
                                'name' => __('app.home.spec12_name'),
                                'desc' => __('app.home.spec12_desc'),
                                'img' => 'dermatology.jpeg',
                                'icon' => 'fa-solid fa-hand-dots',
                                'color' => '#00b4d8',
                                'bg' => '#e8f8fc',
                            ],
                        ];
                    @endphp

                    @foreach ($specialties as $spec)
                        <div class="col-6 col-md-3 {{ $loop->index >= 6 ? 'd-none d-md-block' : '' }} reveal-on-scroll"
                            data-reveal="fade-up" data-reveal-delay="{{ ($loop->index % 6) * 70 }}">
                            <div class="specialty-card-v2 h-100 bg-white">
                                <div class="specialty-photo position-relative">
                                    <img src="{{ asset('images/specs/' . $spec['img']) }}" alt="{{ $spec['name'] }}"
                                        class="img-fluid">
                                    <div class="specialty-photo-icon"
                                        style="background:{{ $spec['bg'] }}; color:{{ $spec['color'] }};">
                                        <i class="{{ $spec['icon'] }}"></i>
                                    </div>
                                </div>
                                <div class="specialty-body text-center p-3 pt-4">
                                    <h6 class="fw-bold text-primary mb-1">{{ $spec['name'] }}</h6>
                                    <p class="text-muted small mb-0">{{ $spec['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div
                    class="mt-4 p-3 rounded-3 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3 specialty-note">
                    <div class="d-flex align-items-center gap-3 text-center text-md-start">
                        <div class="specialty-note-icon">
                            <i class="fi fi-rr-shield-check"></i>
                        </div>
                        <div>
                            <p class="mb-0 fw-bold">{{ __('app.home.and_more') }}</p>
                            <p class="mb-0 text-muted small">{{ __('app.home.specialist_note') }}</p>
                        </div>
                    </div>
                    <a href="{{ patient_cta_route('register') }}"
                        class="btn btn-primary px-4 d-flex align-items-center justify-content-center gap-2 flex-shrink-0">
                        {{ __('app.home.create_free_account') }} <i class="fi fi-rr-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <section class="py-5 bg-light text-center">
        <div class="container">
            <h6 class="text-secondary reveal-on-scroll" data-reveal="fade-up">{{ __('app.home.why_label') }}</h6>
            <h2 class="fw-bold mb-5 reveal-on-scroll" data-reveal="fade-up" data-reveal-delay="80">
                {{ __('app.home.why_headline') }}</h2>

            <div class="row align-items-stretch">

                <!-- ITEM 1 -->
                <div class="col-md-4 mb-4 mb-md-0 reveal-on-scroll" data-reveal="fade-up" data-reveal-delay="100">
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
                <div class="col-md-4 mb-4 mb-md-0 reveal-on-scroll" data-reveal="fade-up" data-reveal-delay="200">
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
                <div class="col-md-4 reveal-on-scroll" data-reveal="fade-up" data-reveal-delay="300">
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


    <section class="pb-3 text-center how-works">
        <div class="container">

            <!-- STATS STRIP -->
            <div class="row g-3 how-stats-strip text-start reveal-on-scroll" data-reveal="fade-up">

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


    {{-- <section class="py-4 mx-md-4">
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
    </section> --}}

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
                        <a href="{{ patient_cta_route('login') }}" class="btn btn-light px-4 mt-3 mt-md-0">
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
    <section class="app-section-v2 py-5">
        <div class="container">
            <div class="app-showcase-card position-relative overflow-hidden">

                <div class="app-swoosh app-swoosh-1" aria-hidden="true"></div>
                <div class="app-swoosh app-swoosh-2" aria-hidden="true"></div>

                <div class="row align-items-stretch g-4 g-lg-5 app-showcase-row">

                    <div class="col-lg-3 col-md-4 order-1 text-center align-self-center reveal-on-scroll"
                        data-reveal="slide-left">
                        <div class="app-phone-mockup">
                            <img src="{{ asset('images/app/img-app.png') }}" class="img-fluid"
                                alt="{{ __('app.home.app_badge') }}">
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-8 order-2 align-self-center reveal-on-scroll" data-reveal="fade-up">
                        <span class="app-badge-pill">
                            <i class="fa-solid fa-mobile-screen-button me-2"></i>{{ __('app.home.app_badge') }}
                        </span>

                        <h2 class="app-showcase-title mt-3">
                            {{ __('app.home.app_headline_1') }}
                            <span>{{ __('app.home.app_headline_2') }}</span>
                        </h2>

                        <p class="app-showcase-sub text-muted mb-4">{{ __('app.home.app_subline') }}</p>

                        @php
                            $appFeatures = [
                                [
                                    'icon' => 'calendar-check',
                                    'title' => __('app.home.app_feat1_title'),
                                    'desc' => __('app.home.app_feat1_desc'),
                                ],
                                [
                                    'icon' => 'video',
                                    'title' => __('app.home.app_feat2_title'),
                                    'desc' => __('app.home.app_feat2_desc'),
                                ],
                                [
                                    'icon' => 'file-medical',
                                    'title' => __('app.home.app_feat3_title'),
                                    'desc' => __('app.home.app_feat3_desc'),
                                ],
                                [
                                    'icon' => 'comments',
                                    'title' => __('app.home.app_feat4_title'),
                                    'desc' => __('app.home.app_feat4_desc'),
                                ],
                                [
                                    'icon' => 'bell',
                                    'title' => __('app.home.app_feat5_title'),
                                    'desc' => __('app.home.app_feat5_desc'),
                                ],
                            ];
                        @endphp

                        <ul class="app-feature-list">
                            @foreach ($appFeatures as $feat)
                                <li class="reveal-on-scroll" data-reveal="fade-up"
                                    data-reveal-delay="{{ $loop->index * 80 }}">
                                    <span class="app-feature-icon"><i
                                            class="fa-solid fa-{{ $feat['icon'] }}"></i></span>
                                    <div>
                                        <p class="fw-bold mb-0">{{ $feat['title'] }}</p>
                                        <p class="text-muted small mb-0">{{ $feat['desc'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="google-imgs-v2 mt-4 reveal-on-scroll" data-reveal="fade-up" data-reveal-delay="400">
                            <a href="#"><img src="{{ URL::asset('build/img/icons/app-store.svg') }}"
                                    alt="App Store"></a>
                            <a href="#"><img src="{{ URL::asset('build/img/icons/google-play.svg') }}"
                                    alt="Google Play"></a>
                        </div>
                    </div>

                    <div class="col-lg-4 order-3 d-none d-lg-block reveal-on-scroll" data-reveal="slide-right">
                        <div class="app-photo-wrap">
                            <img src="{{ asset('images/app/app-girl.jpeg') }}" class="app-photo-img"
                                alt="{{ __('app.home.app_badge') }}">
                        </div>
                    </div>

                </div>

                @php
                    $appTrust = [
                        [
                            'icon' => 'shield-halved',
                            'title' => __('app.home.app_trust1_title'),
                            'desc' => __('app.home.app_trust1_desc'),
                        ],
                        [
                            'icon' => 'earth-americas',
                            'title' => __('app.home.app_trust2_title'),
                            'desc' => __('app.home.app_trust2_desc'),
                        ],
                        [
                            'icon' => 'language',
                            'title' => __('app.home.app_trust3_title'),
                            'desc' => __('app.home.app_trust3_desc'),
                        ],
                        [
                            'icon' => 'hand-holding-heart',
                            'title' => __('app.home.app_trust4_title'),
                            'desc' => __('app.home.app_trust4_desc'),
                        ],
                    ];
                @endphp

                <div class="app-trust-bar reveal-on-scroll" data-reveal="fade-up" data-reveal-delay="200">
                    @foreach ($appTrust as $trust)
                        <div class="app-trust-item">
                            <div class="app-trust-icon"><i class="fa-solid fa-{{ $trust['icon'] }}"></i></div>
                            <div>
                                <p class="fw-bold mb-0">{{ $trust['title'] }}</p>
                                <p class="text-muted small mb-0">{{ $trust['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- /App Section -->




    <style>
        /* BROCHURE BOX */
        .brochure-box {
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .brochure-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 36px rgba(15, 23, 42, 0.1);
        }

        /* OUR SERVICES: THE PRIGINA MODEL */
        .service-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.05);
        }

        .service-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.1);
        }

        .service-photo img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            display: block;
        }

        .service-icon-circle {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 50%);
            width: 76px;
            height: 76px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 28px;
            border: 4px solid #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
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
            border-radius: 24px;
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

        /* HERO VIDEO */
        .hero-video-wrap {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            background: #eef2f7;
            aspect-ratio: 16 / 11;
            cursor: pointer;
        }

        .hero-video-wrap.is-playing {
            cursor: default;
        }

        .hero-video,
        .hero-video-cover {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            background: #eef2f7;
            -webkit-mask-image: linear-gradient(to left, black 75%, transparent 100%);
            mask-image: linear-gradient(to left, black 75%, transparent 100%);
            transition: opacity 0.35s ease;
        }

        .hero-video-cover {
            z-index: 1;
        }

        .hero-video {
            z-index: 0;
        }

        .hero-video-wrap.is-playing .hero-video-cover {
            opacity: 0;
            pointer-events: none;
        }

        .hero-video-wrap:not(.is-playing) .hero-video {
            opacity: 0;
        }

        .hero-play-toggle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 72px;
            height: 72px;
            border-radius: 50%;
            border: none;
            background: rgba(15, 23, 42, 0.62);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.45rem;
            backdrop-filter: blur(6px);
            cursor: pointer;
            z-index: 3;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.25);
            transition: background 0.25s ease, transform 0.25s ease, opacity 0.25s ease;
        }

        .hero-play-toggle i {
            margin-left: 3px;
        }

        .hero-play-toggle:hover {
            background: rgba(15, 23, 42, 0.8);
            transform: translate(-50%, -50%) scale(1.06);
        }

        .hero-video-wrap.is-playing .hero-play-toggle {
            opacity: 0;
            pointer-events: none;
        }

        .hero-video-controls {
            position: absolute;
            right: 16px;
            bottom: 16px;
            display: flex;
            gap: 10px;
            z-index: 3;
        }

        .hero-ctrl-btn {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: none;
            background: rgba(15, 23, 42, 0.55);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            backdrop-filter: blur(4px);
            cursor: pointer;
            transition: background 0.25s ease, transform 0.25s ease;
        }

        .hero-ctrl-btn:hover {
            background: rgba(15, 23, 42, 0.75);
            transform: translateY(-2px);
        }

        .hero-video-wrap:not(.is-playing) .hero-video-controls {
            display: none;
        }

        @media (max-width: 767.98px) {
            .hero-video-wrap {
                aspect-ratio: 4 / 3;
                border-radius: 18px;
            }

            .hero-video,
            .hero-video-cover {
                border-radius: 18px;
                -webkit-mask-image: none;
                mask-image: none;
            }

            .hero-play-toggle {
                width: 60px;
                height: 60px;
                font-size: 1.2rem;
            }

            .hero-ctrl-btn {
                width: 40px;
                height: 40px;
                font-size: 0.95rem;
            }

            .hero-video-controls {
                right: 12px;
                bottom: 12px;
            }
        }

        /* HERO ENTRANCE ANIMATION */
        .hero-anim {
            opacity: 0;
            transform: translateY(24px);
            animation: heroFadeUp 0.7s ease forwards;
        }

        @keyframes heroFadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .hero-anim {
                animation: none;
                opacity: 1;
                transform: none;
            }
        }

        /* PREMIUM BUTTONS */
        .btn-primary,
        .btn-outline-secondary,
        .btn-secondary {
            border-radius: 10px;
            font-weight: 600;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .btn-primary {
            box-shadow: 0 10px 20px rgba(0, 58, 139, 0.18);
        }

        .btn-primary:hover,
        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(0, 58, 139, 0.22);
        }

        .btn-outline-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(28, 148, 134, 0.15);
        }

        .hero-features .d-flex.align-items-start:hover .hero-feat-icon {
            transform: translateY(-3px) scale(1.05);
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
        .specialties-headline {
            position: relative;
            display: inline-block;
        }

        .specialties-headline::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -6px;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            border-radius: 2px;
            background: var(--secondary);
        }

        .specialty-card-v2 {
            border: 1px solid #eee;
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04);
        }

        .specialty-card-v2:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.1);
        }

        .specialty-photo img {
            width: 100%;
            height: 165px;
            object-fit: cover;
            display: block;
        }

        .specialty-photo-icon {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 50%);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            border: 4px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.12);
        }

        .specialty-note {
            background: #f8f9fa;
            border: 1px solid #eee;
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
            box-shadow: 0 6px 16px rgba(15, 23, 42, 0.08);
            transition: transform 0.25s ease;
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

        /* APP SHOWCASE SECTION */
        .app-section-v2 {
            background: #f7f9fc;
        }

        .app-showcase-card {
            border-radius: 32px;
            background:
                radial-gradient(ellipse 55% 70% at 8% 88%, rgba(46, 130, 200, 0.14) 0%, transparent 70%),
                radial-gradient(ellipse 50% 60% at 92% 45%, rgba(0, 163, 173, 0.12) 0%, transparent 65%),
                linear-gradient(160deg, #eef5fc 0%, #f7fbfe 42%, #ffffff 100%);
            padding: 52px 44px 0;
            overflow: hidden;
        }

        .app-swoosh {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        .app-swoosh-1 {
            width: 340px;
            height: 340px;
            left: -120px;
            bottom: 40px;
            background: radial-gradient(circle, rgba(46, 109, 200, 0.16) 0%, transparent 68%);
        }

        .app-swoosh-2 {
            width: 420px;
            height: 420px;
            right: -80px;
            top: 10%;
            background: radial-gradient(circle, rgba(0, 163, 173, 0.14) 0%, transparent 70%);
        }

        .app-showcase-row {
            position: relative;
            z-index: 1;
        }

        .app-phone-mockup {
            position: relative;
            display: inline-block;
        }

        .app-phone-mockup img {
            width: 100%;
            max-width: 260px;
            transform: rotate(-6deg) translateY(8px);
            filter: drop-shadow(0 28px 40px rgba(15, 23, 42, 0.22));
            transition: transform 0.45s ease;
        }

        .app-phone-mockup:hover img {
            transform: rotate(-3deg) translateY(0);
        }

        .app-badge-pill {
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            border-radius: 30px;
            background: color-mix(in srgb, var(--secondary) 88%, #0a7c84);
            color: #fff;
            font-weight: 700;
            font-size: 12px;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            box-shadow: 0 8px 18px color-mix(in srgb, var(--secondary) 28%, transparent);
        }

        .app-showcase-title {
            font-weight: 800;
            font-size: 2.45rem;
            color: #0d2b55;
            line-height: 1.18;
        }

        .app-showcase-title span {
            display: inline;
            color: #0d2b55;
        }

        .app-showcase-sub {
            font-size: 1.05rem;
            color: #5f6c72 !important;
        }

        .app-feature-list {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .app-feature-list li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 11px 0;
        }

        .app-feature-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 12px;
            background: color-mix(in srgb, var(--secondary) 10%, white);
            border: 1.5px solid color-mix(in srgb, var(--secondary) 28%, transparent);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .google-imgs-v2 {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .google-imgs-v2 img {
            height: 44px;
            width: auto;
            transition: transform 0.25s ease;
        }

        .google-imgs-v2 a:hover img {
            transform: translateY(-2px);
        }

        .app-photo-wrap {
            position: relative;
            height: calc(100% + 100px);
            min-height: 400px;
            margin: -52px -44px -44px 12px;
        }

        .app-photo-wrap::before {
            content: '';
            position: absolute;
            top: 46%;
            right: -36px;
            transform: translateY(-50%);
            width: 340px;
            height: 340px;
            border-radius: 50%;
            background: color-mix(in srgb, var(--primary) 12%, transparent);
            z-index: 0;
        }

        .app-photo-img {
            position: relative;
            z-index: 1;
            width: 100%;
            height: 100%;
            min-height: 400px;
            object-fit: cover;
            object-position: 30% top;
            border-radius: 220px 0 32px 220px;
        }

        .app-trust-bar {
            position: relative;
            z-index: 1;
            margin-top: 36px;
            background: #fff;
            border-radius: 18px 18px 0 0;
            box-shadow: 0 -4px 30px rgba(15, 23, 42, 0.06);
            padding: 28px 12px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .app-trust-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 0 18px;
            position: relative;
        }

        .app-trust-item:not(:last-child)::after {
            content: '';
            position: absolute;
            right: 0;
            top: 8px;
            bottom: 8px;
            width: 1px;
            background: #e6ebf2;
        }

        .app-trust-icon {
            width: 48px;
            height: 48px;
            min-width: 48px;
            border-radius: 50%;
            background: var(--primary);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            box-shadow: 0 8px 18px color-mix(in srgb, var(--primary) 28%, transparent);
        }

        .app-trust-item .fw-bold {
            color: #0d2b55;
            font-size: 0.95rem;
        }

        @media (max-width: 991.98px) {
            .app-showcase-card {
                padding: 36px 24px 0;
            }

            .app-phone-mockup img {
                max-width: 200px;
                transform: none;
            }

            .app-trust-bar {
                grid-template-columns: repeat(2, 1fr);
                border-radius: 18px;
                margin-bottom: 24px;
                gap: 8px 0;
            }

            .app-trust-item:nth-child(2n)::after {
                display: none;
            }

            .app-trust-item:nth-child(-n+2) {
                padding-bottom: 16px;
                margin-bottom: 8px;
                border-bottom: 1px solid #eef2f7;
            }
        }

        @media (max-width: 575.98px) {
            .app-showcase-title {
                font-size: 1.75rem;
            }

            .app-trust-bar {
                grid-template-columns: 1fr;
            }

            .app-trust-item::after {
                display: none !important;
            }

            .app-trust-item:not(:last-child) {
                padding-bottom: 16px;
                margin-bottom: 8px;
                border-bottom: 1px solid #eef2f7;
            }
        }

        /* SCROLL REVEAL ANIMATIONS */
        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1),
                transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
            will-change: opacity, transform;
        }

        .reveal-on-scroll[data-reveal="slide-left"] {
            transform: translateX(-40px);
        }

        .reveal-on-scroll[data-reveal="slide-right"] {
            transform: translateX(40px);
        }

        .reveal-on-scroll[data-reveal="fade-up"] {
            transform: translateY(28px);
        }

        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: none;
        }

        @media (prefers-reduced-motion: reduce) {
            .reveal-on-scroll {
                opacity: 1;
                transform: none;
                transition: none;
            }
        }

        /* PREMIUM MOBILE REFINEMENTS */
        @media (max-width: 767.98px) {
            .display-5 {
                font-size: 2rem;
            }

            .service-card,
            .specialty-card-v2 {
                border-radius: 14px;
            }

            .how-stats-strip {
                text-align: center;
            }

            .how-stats-strip .d-flex {
                justify-content: center;
            }

            .app-showcase-card {
                border-radius: 20px;
            }

            .app-phone-mockup {
                margin-bottom: 8px;
            }
        }
    </style>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                /* ---- Hero video controls ---- */
                var wrap = document.getElementById('heroVideoWrap');
                var video = document.getElementById('heroVideo');
                var playBtn = document.getElementById('heroPlayToggle');
                var pauseBtn = document.getElementById('heroPauseBtn');
                var soundBtn = document.getElementById('heroSoundToggle');
                var playLabel = @json(__('app.home.play_video'));
                var pauseLabel = @json(__('app.home.pause_video'));

                function setPlaying(playing) {
                    if (!wrap) return;
                    wrap.classList.toggle('is-playing', playing);
                    if (playBtn) {
                        playBtn.setAttribute('aria-label', playing ? pauseLabel : playLabel);
                        playBtn.innerHTML = playing ? '<i class="fa fa-pause"></i>' : '<i class="fa fa-play"></i>';
                    }
                    if (pauseBtn) pauseBtn.hidden = !playing;
                    if (soundBtn) soundBtn.hidden = !playing;
                }

                function updateSoundIcon() {
                    if (!soundBtn || !video) return;
                    soundBtn.innerHTML = video.muted ?
                        '<i class="fa fa-volume-mute"></i>' :
                        '<i class="fa fa-volume-up"></i>';
                }

                function playVideo() {
                    if (!video) return;
                    video.muted = true;
                    var p = video.play();
                    if (p && typeof p.then === 'function') {
                        p.then(function() {
                            setPlaying(true);
                            updateSoundIcon();
                        }).catch(function() {
                            setPlaying(false);
                        });
                    } else {
                        setPlaying(true);
                        updateSoundIcon();
                    }
                }

                function pauseVideo() {
                    if (!video) return;
                    video.pause();
                    setPlaying(false);
                }

                if (video && wrap) {
                    setPlaying(false);
                    updateSoundIcon();

                    if (playBtn) {
                        playBtn.addEventListener('click', function() {
                            if (video.paused) playVideo();
                            else pauseVideo();
                        });
                    }

                    if (pauseBtn) {
                        pauseBtn.addEventListener('click', pauseVideo);
                    }

                    if (soundBtn) {
                        soundBtn.addEventListener('click', function() {
                            video.muted = !video.muted;
                            if (!video.muted) {
                                video.play().catch(function() {});
                            }
                            updateSoundIcon();
                        });
                    }

                    // Tap cover / video area to play when paused
                    wrap.addEventListener('click', function(e) {
                        if (e.target.closest('.hero-ctrl-btn') || e.target.closest('.hero-play-toggle')) {
                            return;
                        }
                        if (video.paused) playVideo();
                    });

                    video.addEventListener('play', function() {
                        setPlaying(true);
                    });
                    video.addEventListener('pause', function() {
                        if (!video.ended) setPlaying(false);
                    });
                }

                /* ---- Scroll reveal ---- */
                var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                var reveals = document.querySelectorAll('.reveal-on-scroll');

                if (prefersReduced) {
                    reveals.forEach(function(el) {
                        el.classList.add('is-visible');
                    });
                    return;
                }

                if ('IntersectionObserver' in window) {
                    var observer = new IntersectionObserver(function(entries) {
                        entries.forEach(function(entry) {
                            if (!entry.isIntersecting) return;
                            var el = entry.target;
                            var delay = parseInt(el.getAttribute('data-reveal-delay') || '0', 10);
                            if (delay) {
                                el.style.transitionDelay = delay + 'ms';
                            }
                            el.classList.add('is-visible');
                            observer.unobserve(el);
                        });
                    }, {
                        threshold: 0.14,
                        rootMargin: '0px 0px -40px 0px'
                    });

                    reveals.forEach(function(el) {
                        observer.observe(el);
                    });
                } else {
                    reveals.forEach(function(el) {
                        el.classList.add('is-visible');
                    });
                }
            });
        </script>
    @endpush
@endsection
