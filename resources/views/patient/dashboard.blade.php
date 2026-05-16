<?php $page = 'patient-dashboard'; ?>
@extends('layouts.mainlayout')
@section('content')
    @php
        $patient = current_user();
        $futureAppointments = collect($futureAppointments ?? []);
        $categories = collect($categories ?? [])->take(8);
        $doctors = collect($doctors ?? [])->take(8);
        $tips = collect($tips ?? [])->take(3);
        $nextAppointment = $futureAppointments->first();
        $defaultCategoryImages = [
            'build/img/icons/cardiology.png',
            'build/img/category/category-02.svg',
            'build/img/category/category-01.svg',
            'build/img/category/category-03.svg',
            'build/img/category/category-04.svg',
        ];
    @endphp

    <div class="content patient-content patient-home-page">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('partials.patient-sidebar')
                </div>

                <div class="col-lg-8 col-xl-9">
                   

                    <form class="patient-search-card" action="{{ route('doctors') }}" method="GET">
                        <i class="isax isax-search-normal-1"></i>
                        <input type="search" name="search" placeholder="Search doctors, specialities, symptoms...">
                        <button type="submit" aria-label="Search filters">
                            <i class="isax isax-setting-4"></i>
                        </button>
                    </form>

                    <section class="patient-section">
                        <div class="patient-section-head">
                            <h2>Categories</h2>
                            <a href="{{ route('doctors') }}">View All</a>
                        </div>
                        <div class="patient-category-grid">
                            @forelse($categories as $index => $category)
                                @php
                                    $categoryImage = $category['image']
                                        ?? $category['imageUrl']
                                        ?? $category['icon']
                                        ?? $category['iconUrl']
                                        ?? asset($defaultCategoryImages[$index % count($defaultCategoryImages)]);
                                @endphp
                                <a href="{{ route('doctors', ['category[]' => $category['name'] ?? $category['id'] ?? '']) }}"
                                   class="patient-category-card category-tone-{{ ($index % 5) + 1 }}">
                                    <span>
                                        <img src="{{ $categoryImage }}" alt="{{ $category['name'] ?? 'Category' }}">
                                    </span>
                                    <strong>{{ $category['name'] ?? 'Speciality' }}</strong>
                                </a>
                            @empty
                                @foreach(['Cardiology', 'Clinical Documents', 'Dentist', 'Neurology', 'Pediatrics'] as $index => $name)
                                    <a href="{{ route('doctors') }}" class="patient-category-card category-tone-{{ ($index % 5) + 1 }}">
                                        <span>
                                            <img src="{{ asset($defaultCategoryImages[$index % count($defaultCategoryImages)]) }}" alt="{{ $name }}">
                                        </span>
                                        <strong>{{ $name }}</strong>
                                    </a>
                                @endforeach
                            @endforelse
                        </div>
                    </section>

                    <section class="patient-section">
                        <div class="patient-section-head">
                            <h2>Upcoming Appointments</h2>
                            <a href="{{ route('patient.appointments') }}">View All</a>
                        </div>

                        <article class="patient-appointment-card">
                            <div class="appointment-icon">
                                <i class="isax isax-calendar-tick"></i>
                            </div>
                            @if($nextAppointment)
                                <div class="appointment-copy">
                                    <h3>Dr. {{ $nextAppointment['doctorName'] ?? 'Doctor' }}</h3>
                                    <p>{{ $nextAppointment['patientLocalTime'] ?? (($nextAppointment['startTime'] ?? '') . ' - ' . ($nextAppointment['endTime'] ?? '')) }}</p>
                                    <a href="{{ route('patient.appointments') }}">View Appointment</a>
                                </div>
                            @else
                                <div class="appointment-copy">
                                    <h3>No upcoming appointments</h3>
                                    <p>Book your first appointment with a doctor and take charge of your health.</p>
                                    <a href="{{ route('doctors') }}">Book Now</a>
                                </div>
                            @endif
                            <div class="appointment-illustration">
                                <i class="isax isax-calendar-2"></i>
                                <i class="isax isax-clock"></i>
                            </div>
                        </article>
                    </section>

                    <section class="patient-section">
                        <div class="patient-section-head">
                            <h2>Top Doctors</h2>
                            <a href="{{ route('doctors') }}">View All</a>
                        </div>

                        <div class="patient-doctor-row">
                            @forelse($doctors as $doctor)
                                @php
                                    $doctorId = $doctor['uid'] ?? $doctor['id'] ?? null;
                                @endphp
                                <article class="patient-doctor-card">
                                    <div class="doctor-card-top">
                                        <img src="{{ $doctor['profilePicture'] ?? asset('build/img/doctor-grid/doctor-grid-01.jpg') }}" alt="{{ $doctor['name'] ?? 'Doctor' }}">
                                        <div>
                                            <h3>
                                                Dr. {{ $doctor['name'] ?? 'Doctor' }}
                                                <i class="fa-solid fa-circle-check"></i>
                                            </h3>
                                            <p>{{ $doctor['specializations'][0] ?? 'Specialist' }}</p>
                                            <small>{{ $doctor['experience'] ?? 'Experienced' }} experience</small>
                                            <div class="doctor-rating">
                                                <i class="fa-solid fa-star"></i>
                                                {{ number_format((float) ($doctor['rating'] ?? 0), 1) }}
                                                <span>({{ $doctor['totalReviews'] ?? 0 }})</span>
                                            </div>
                                            <div class="doctor-availability">
                                                <i class="fa-solid fa-circle-check"></i>
                                                {{ ($doctor['available'] ?? false) ? 'Available' : 'Not Available' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="doctor-card-bottom">
                                        <strong>${{ number_format((float) ($doctor['consultationFee'] ?? 0), 0) }}</strong>
                                        <a href="{{ $doctorId ? route('doctor-details', $doctorId) : route('doctors') }}">Book Now</a>
                                    </div>
                                </article>
                            @empty
                                <article class="patient-doctor-card">
                                    <div class="doctor-card-top">
                                        <img src="{{ asset('build/img/doctor-grid/doctor-grid-01.jpg') }}" alt="Doctor">
                                        <div>
                                            <h3>Find a Specialist <i class="fa-solid fa-circle-check"></i></h3>
                                            <p>Second opinion care</p>
                                            <small>Global physicians</small>
                                            <div class="doctor-rating"><i class="fa-solid fa-star"></i> 5.0 <span>(0)</span></div>
                                            <div class="doctor-availability"><i class="fa-solid fa-circle-check"></i> Available</div>
                                        </div>
                                    </div>
                                    <div class="doctor-card-bottom">
                                        <strong>$0</strong>
                                        <a href="{{ route('doctors') }}">Book Now</a>
                                    </div>
                                </article>
                            @endforelse
                        </div>
                    </section>

                    <section class="patient-section patient-tips-section">
                        <h2>Health Tips for You</h2>
                        <div class="patient-tips-list">
                            @forelse($tips as $tip)
                                <article class="patient-tip-card">
                                    <div class="tip-icon">
                                        <i class="isax isax-shield-tick"></i>
                                    </div>
                                    <div>
                                        <span>{{ $tip['category'] ?? $tip['type'] ?? 'Wellness' }}</span>
                                        <h3>{{ $tip['title'] ?? 'Stay protected' }}</h3>
                                        <p class="tip-description">{{ $tip['description'] ?? $tip['content'] ?? 'Small daily habits can support better long-term health.' }}</p>
                                        <button type="button" class="tip-read-more">Read More <i class="isax isax-arrow-down-1"></i></button>
                                    </div>
                                </article>
                            @empty
                                <article class="patient-tip-card">
                                    <div class="tip-icon">
                                        <i class="isax isax-shield-tick"></i>
                                    </div>
                                    <div>
                                        <span>Wellness</span>
                                        <h3>Protect Your Health</h3>
                                        <p class="tip-description">Keep your records updated, follow doctor guidance, and schedule care when symptoms change.</p>
                                        <button type="button" class="tip-read-more">Read More <i class="isax isax-arrow-down-1"></i></button>
                                    </div>
                                </article>
                            @endforelse
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f7fbff !important;
        }

        .patient-home-page {
            padding-top: 22px;
            padding-bottom: 100px;
            background:
                radial-gradient(circle at 82% 0%, rgba(37, 99, 235, .12), transparent 28%),
                #f7fbff;
        }

        .patient-home-page,
        .patient-home-page * {
            letter-spacing: 0;
        }

        .patient-home-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 20px;
        }

        .patient-home-header p {
            margin: 0 0 4px;
            color: #5c6880;
            font-size: 18px;
        }

        .patient-home-header h1 {
            margin: 0;
            color: #071842;
            font-size: 31px;
            font-weight: 800;
            line-height: 1.15;
        }

        .patient-home-header h1 span {
            font-size: 25px;
        }

        .patient-alert-btn {
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 58px;
            height: 58px;
            color: #075bd8;
            border-radius: 18px;
            background: rgba(255, 255, 255, .86);
            box-shadow: 0 12px 28px rgba(15, 43, 92, .09);
        }

        .patient-alert-btn i {
            font-size: 30px;
        }

        .patient-alert-btn span {
            position: absolute;
            right: 12px;
            top: 11px;
            width: 10px;
            height: 10px;
            border: 2px solid #fff;
            border-radius: 50%;
            background: #ef2b47;
        }

        .patient-search-card {
            display: grid;
            grid-template-columns: 34px minmax(0, 1fr) 42px;
            align-items: center;
            gap: 12px;
            min-height: 56px;
            padding: 0 20px;
            margin-bottom: 24px;
            border: 1px solid #e1eaf7;
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 16px 35px rgba(15, 43, 92, .08);
        }

        .patient-search-card i {
            color: #0a3e88;
            font-size: 29px;
        }

        .patient-search-card input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            color: #071842;
            font-size: 18px;
        }

        .patient-search-card input::placeholder {
            color: #7b879b;
        }

        .patient-search-card button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px;
            height: 42px;
            border: 0;
            color: #0a3e88;
            background: transparent;
        }

        .patient-hero-card {
            position: relative;
            display: flex;
            align-items: stretch;
            justify-content: space-between;
            min-height: 238px;
            margin-bottom: 28px;
            overflow: hidden;
            border: 1px solid #dbe9fb;
            border-radius: 18px;
            background:
                radial-gradient(circle at 62% 50%, rgba(60, 154, 225, .18), transparent 30%),
                linear-gradient(110deg, #f6fbff 0%, #eaf4ff 100%);
            box-shadow: 0 16px 36px rgba(15, 43, 92, .08);
        }

        .patient-hero-card::after {
            content: "";
            position: absolute;
            inset: 30px 160px 25px auto;
            width: 260px;
            opacity: .22;
            background: url("{{ asset('build/img/bg/map.png') }}") center/contain no-repeat;
        }

        .patient-hero-copy {
            position: relative;
            z-index: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 58%;
            padding: 32px;
        }

        .patient-hero-copy img {
            width: 210px;
            max-width: 100%;
            margin-bottom: 26px;
        }

        .patient-hero-copy h2 {
            margin: 0 0 8px;
            color: #071842;
            font-size: 25px;
            font-weight: 800;
        }

        .patient-hero-copy p {
            margin: 0;
            color: #5f6f87;
            font-size: 20px;
        }

        .patient-hero-doctor {
            position: relative;
            z-index: 1;
            align-self: flex-end;
            width: 38%;
            height: 238px;
            object-fit: cover;
            object-position: top center;
        }

        .patient-section {
            margin-bottom: 28px;
        }

        .patient-section-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 18px;
        }

        .patient-section-head h2,
        .patient-tips-section > h2 {
            margin: 0;
            color: #071842;
            font-size: 24px;
            font-weight: 800;
        }

        .patient-section-head a {
            color: #075bd8;
            font-size: 16px;
            font-weight: 700;
        }

        .patient-category-grid {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: minmax(138px, 158px);
            gap: 16px;
            overflow-x: auto;
            padding-bottom: 8px;
            scrollbar-width: thin;
        }

        .patient-category-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 154px;
            padding: 18px 12px;
            color: #071842;
            border: 1px solid #edf2fb;
            border-radius: 16px;
            text-align: center;
        }

        .patient-category-card span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 72px;
            height: 72px;
            margin-bottom: 14px;
        }

        .patient-category-card img {
            max-width: 58px;
            max-height: 58px;
            object-fit: contain;
        }

        .patient-category-card strong {
            font-size: 16px;
            line-height: 1.25;
        }

        .category-tone-1 { background: #fff0f3; }
        .category-tone-2 { background: #f0f7ff; }
        .category-tone-3 { background: #eefbf8; }
        .category-tone-4 { background: #f4efff; }
        .category-tone-5 { background: #fff5eb; }

        .patient-appointment-card {
            position: relative;
            display: grid;
            grid-template-columns: 104px minmax(0, 1fr) 220px;
            align-items: center;
            gap: 24px;
            min-height: 184px;
            padding: 28px;
            overflow: hidden;
            border: 1px solid #cfe2fb;
            border-radius: 18px;
            background: linear-gradient(110deg, #eef7ff 0%, #dcecff 100%);
        }

        .appointment-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 92px;
            height: 92px;
            color: #1267f1;
            border-radius: 18px;
            background: #f8fbff;
        }

        .appointment-icon i {
            font-size: 44px;
        }

        .appointment-copy h3 {
            margin: 0 0 8px;
            color: #071842;
            font-size: 22px;
            font-weight: 800;
        }

        .appointment-copy p {
            max-width: 430px;
            margin: 0 0 18px;
            color: #5f6f87;
            font-size: 17px;
            line-height: 1.45;
        }

        .appointment-copy a,
        .doctor-card-bottom a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 138px;
            min-height: 50px;
            padding: 0 22px;
            color: #fff;
            border-radius: 10px;
            background: linear-gradient(135deg, #1267f1, #0045b8);
            font-size: 16px;
            font-weight: 800;
        }

        .appointment-illustration {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 130px;
            color: rgba(18, 103, 241, .32);
        }

        .appointment-illustration i:first-child {
            font-size: 112px;
        }

        .appointment-illustration i:last-child {
            position: absolute;
            right: 20px;
            bottom: 6px;
            color: rgba(18, 103, 241, .68);
            font-size: 58px;
            background: #e9f4ff;
            border-radius: 50%;
        }

        .patient-doctor-row {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: minmax(340px, 390px);
            gap: 16px;
            overflow-x: auto;
            padding-bottom: 8px;
            scrollbar-width: thin;
        }

        .patient-doctor-card {
            padding: 18px;
            border: 1px solid #e1eaf7;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 14px 32px rgba(15, 43, 92, .07);
        }

        .doctor-card-top {
            display: grid;
            grid-template-columns: 120px minmax(0, 1fr);
            gap: 18px;
            align-items: start;
            margin-bottom: 18px;
        }

        .doctor-card-top img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            background: #edf5ff;
        }

        .doctor-card-top h3 {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 2px 0 8px;
            color: #071842;
            font-size: 20px;
            font-weight: 800;
            line-height: 1.2;
        }

        .doctor-card-top h3 i {
            color: #1267f1;
            font-size: 16px;
        }

        .doctor-card-top p,
        .doctor-card-top small {
            display: block;
            margin: 0 0 7px;
            color: #5f6f87;
            font-size: 15px;
        }

        .doctor-rating,
        .doctor-availability {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #071842;
            font-size: 15px;
            font-weight: 700;
        }

        .doctor-rating {
            margin: 10px 0 8px;
        }

        .doctor-rating i {
            color: #f7aa20;
        }

        .doctor-rating span {
            color: #65728b;
            font-weight: 500;
        }

        .doctor-availability {
            color: #11a983;
        }

        .doctor-card-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
        }

        .doctor-card-bottom strong {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 76px;
            height: 48px;
            color: #075bd8;
            border-radius: 10px;
            background: #eaf3ff;
            font-size: 18px;
            font-weight: 800;
        }

        .patient-tips-section > h2 {
            margin-bottom: 18px;
        }

        .patient-tips-list {
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: minmax(360px, 520px);
            gap: 14px;
            overflow-x: auto;
            padding-bottom: 8px;
            scrollbar-width: thin;
        }

        .patient-tip-card {
            position: relative;
            display: grid;
            grid-template-columns: 96px minmax(0, 1fr);
            align-items: center;
            gap: 22px;
            padding: 26px;
            border: 1px solid #cfeada;
            border-radius: 18px;
            background: linear-gradient(110deg, #ecfbf3, #f8fffb);
            overflow: hidden;
        }

        .tip-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 104px;
            height: 104px;
            color: #10a981;
            border-radius: 18px;
            background: #d9f7e8;
        }

        .tip-icon i {
            font-size: 54px;
        }

        .patient-tip-card span {
            display: inline-flex;
            align-items: center;
            min-height: 28px;
            padding: 0 12px;
            margin-bottom: 10px;
            color: #0c966f;
            border-radius: 8px;
            background: #ccf5df;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .patient-tip-card h3 {
            margin: 0 0 8px;
            color: #071842;
            font-size: 22px;
            font-weight: 800;
        }

        .patient-tip-card p {
            max-width: 620px;
            margin: 0 0 12px;
            color: #4f617b;
            font-size: 16px;
            line-height: 1.45;
        }

        .tip-description {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .patient-tip-card.is-expanded .tip-description {
            display: block;
            overflow: visible;
        }

        .tip-read-more {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 0;
            border: 0;
            background: transparent;
            color: #0c966f;
            font-size: 16px;
            font-weight: 800;
        }

        @media (max-width: 1399px) {
            .patient-category-grid {
                grid-auto-columns: minmax(132px, 152px);
            }
        }

        @media (max-width: 1199px) {
            .patient-category-grid {
                grid-auto-columns: minmax(128px, 148px);
            }

            .patient-appointment-card {
                grid-template-columns: 92px minmax(0, 1fr);
            }

            .appointment-illustration {
                display: none;
            }
        }

        @media (max-width: 991px) {
            .patient-home-page {
                padding-top: 16px;
                padding-bottom: 116px;
            }
        }

        @media (max-width: 767px) {
            .patient-home-header h1 {
                font-size: 28px;
            }

            .patient-section {
                margin-bottom: 22px;
            }

            .patient-section-head {
                margin-bottom: 12px;
            }

            .patient-section-head h2,
            .patient-tips-section > h2 {
                font-size: 20px;
            }

            .patient-section-head a {
                font-size: 14px;
            }

            .patient-search-card {
                min-height: 52px;
                grid-template-columns: 22px minmax(0, 1fr) 30px;
                gap: 8px;
                padding: 0 14px;
                margin-bottom: 18px;
                border-radius: 14px;
            }

            .patient-search-card input {
                font-size: 13px;
            }

            .patient-search-card i {
                font-size: 20px;
            }

            .patient-search-card button {
                width: 30px;
                height: 30px;
            }

            .patient-hero-card {
                min-height: 210px;
            }

            .patient-hero-copy {
                width: 64%;
                padding: 22px;
            }

            .patient-hero-copy img {
                width: 160px;
                margin-bottom: 22px;
            }

            .patient-hero-copy h2 {
                font-size: 21px;
            }

            .patient-hero-copy p {
                font-size: 17px;
            }

            .patient-hero-doctor {
                width: 38%;
                height: 210px;
            }

            .patient-category-grid {
                grid-auto-columns: 116px;
                gap: 10px;
            }

            .patient-category-card {
                min-height: 104px;
                padding: 12px 8px;
                border-radius: 14px;
            }

            .patient-category-card span {
                width: 48px;
                height: 48px;
                margin-bottom: 8px;
            }

            .patient-category-card img {
                max-width: 38px;
                max-height: 38px;
            }

            .patient-category-card strong {
                font-size: 13px;
            }

            .patient-appointment-card {
                grid-template-columns: 64px minmax(0, 1fr);
                gap: 12px;
                min-height: auto;
                padding: 16px;
            }

            .appointment-icon {
                width: 58px;
                height: 58px;
                border-radius: 14px;
            }

            .appointment-icon i {
                font-size: 30px;
            }

            .appointment-copy h3 {
                font-size: 17px;
                margin-bottom: 5px;
            }

            .appointment-copy p {
                margin-bottom: 10px;
                font-size: 13px;
                line-height: 1.35;
            }

            .appointment-copy a,
            .doctor-card-bottom a {
                min-width: 112px;
                min-height: 40px;
                padding: 0 14px;
                border-radius: 9px;
                font-size: 13px;
            }

            .patient-doctor-row {
                grid-auto-columns: minmax(282px, 86vw);
                gap: 12px;
            }

            .patient-doctor-card {
                padding: 14px;
            }

            .doctor-card-top {
                grid-template-columns: 78px minmax(0, 1fr);
                gap: 12px;
                margin-bottom: 12px;
            }

            .doctor-card-top img {
                width: 78px;
                height: 78px;
            }

            .doctor-card-top h3 {
                font-size: 16px;
                margin-bottom: 5px;
            }

            .doctor-card-top p,
            .doctor-card-top small,
            .doctor-rating,
            .doctor-availability {
                font-size: 12px;
                margin-bottom: 4px;
            }

            .doctor-rating {
                margin-top: 6px;
            }

            .doctor-card-bottom {
                gap: 10px;
            }

            .doctor-card-bottom strong {
                min-width: 68px;
                height: 40px;
                font-size: 15px;
            }

            .patient-tip-card {
                grid-template-columns: 66px minmax(0, 1fr);
                align-items: center;
                gap: 12px;
                padding: 16px;
            }

            .patient-tips-list {
                grid-auto-columns: minmax(284px, 86vw);
                gap: 12px;
            }

            .tip-icon {
                width: 58px;
                height: 58px;
                border-radius: 14px;
            }

            .tip-icon i {
                font-size: 30px;
            }

            .patient-tip-card span {
                min-height: 22px;
                padding: 0 9px;
                margin-bottom: 6px;
                font-size: 10px;
            }

            .patient-tip-card h3 {
                margin-bottom: 5px;
                font-size: 17px;
            }

            .patient-tip-card p {
                margin-bottom: 8px;
                font-size: 13px;
                line-height: 1.35;
            }

            .tip-read-more {
                font-size: 13px;
            }
        }

        @media (max-width: 575px) {
            .patient-category-grid {
                grid-auto-columns: 112px;
            }

            .patient-category-card {
                min-height: 100px;
            }

            .patient-hero-copy {
                width: 70%;
                padding: 18px;
            }

            .patient-hero-copy img {
                width: 132px;
                margin-bottom: 18px;
            }

            .patient-hero-doctor {
                width: 34%;
                opacity: .95;
            }

            .doctor-card-bottom strong,
            .doctor-card-bottom a {
                width: auto;
            }
        }
    </style>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.tip-read-more').forEach(function (button) {
        button.addEventListener('click', function () {
            const card = button.closest('.patient-tip-card');
            const expanded = card.classList.toggle('is-expanded');

            button.innerHTML = expanded
                ? 'Show Less <i class="isax isax-arrow-up-2"></i>'
                : 'Read More <i class="isax isax-arrow-down-1"></i>';
        });
    });
});
</script>
@endpush
