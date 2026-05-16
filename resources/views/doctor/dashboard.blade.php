<?php $page = 'doctor-dashboard'; ?>
@extends('layouts.mainlayout')
@section('content')
    @php
        $doctor = current_user();
        $rating = (float) ($doctor['rating'] ?? 0);
        $totalReviews = (int) ($doctor['totalReviews'] ?? 0);
        $profileImage = $doctor['profilePicture'] ?? URL::asset('build/img/doctors-dashboard/profile-06.jpg');
        $specialty = $doctor['specializations'][0] ?? ($doctor['qualification'] ?? 'Specialist');
        $license = $doctor['license_number'] ?? 'Not Set';
        $todayCount = $todayAppointments->count();
        $nextAppointment = $futureAppointments->first();
        $activityCount = count($notifications ?? []);
    @endphp

    <div class="content doctor-content doctor-home-page">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('partials.doctor-sidebar')
                </div>

                <div class="col-lg-8 col-xl-9">
                    

                    <section class="doctor-home-stats">
                        <article class="doctor-home-stat stat-blue">
                            <img src="{{ asset('build/img/doc-home/doc-logo-1.jpeg') }}" alt="">
                            <h2>Today's Appointments</h2>
                            <strong>{{ $todayCount }}</strong>
                            <p>{{ $todayCount ? 'Scheduled today' : 'No appointments today' }}</p>
                            <img class="stat-graph" src="{{ asset('build/img/doc-home/doc-home-1-1') }}" alt="">
                        </article>

                        <article class="doctor-home-stat stat-orange">
                            <img src="{{ asset('build/img/doc-home/doc-logo-4.jpeg') }}" alt="">
                            <h2>Waiting Patients</h2>
                            <strong>{{ $waitingAppointments }}</strong>
                            <p>{{ $waitingAppointments ? 'Patients in queue' : 'No patients waiting' }}</p>
                            <img class="stat-graph stat-line" src="{{ asset('build/img/doc-home/doc-logo-2-1.jpeg') }}" alt="">
                        </article>

                        <article class="doctor-home-stat stat-green">
                            <img src="{{ asset('build/img/doc-home/doc-logo-3.jpeg') }}" alt="">
                            <h2>Total Earnings</h2>
                            <strong>${{ number_format($totalEarnings, 0) }}</strong>
                            <p>This month</p>
                            <img class="stat-graph" src="{{ asset('build/img/doc-home/doc-logo-3-1.jpg') }}" alt="">
                        </article>

                        <article class="doctor-home-stat stat-purple">
                            <img src="{{ asset('build/img/doc-home/doc-logo-2.jpeg') }}" alt="">
                            <h2>Average Rating</h2>
                            <strong>{{ number_format($rating, 1) }}</strong>
                            <div class="doctor-home-stars" aria-label="Rating {{ number_format($rating, 1) }} out of 5">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fa-solid fa-star {{ $rating >= $i ? 'active' : '' }}"></i>
                                @endfor
                            </div>
                            <p>{{ $totalReviews ? $totalReviews . ' reviews' : 'No reviews yet' }}</p>
                        </article>
                    </section>

                    <section class="doctor-home-panels">
                        <article class="doctor-home-panel schedule-panel">
                            <div class="doctor-home-panel-head">
                                <h2>Today's Schedule</h2>
                                <span>{{ now()->format('M d, Y') }}</span>
                            </div>

                            @if($todayAppointments->isEmpty())
                                <div class="doctor-home-empty">
                                    <div class="empty-icon blue-soft">
                                        <i class="isax isax-calendar-tick"></i>
                                    </div>
                                    <h3>No appointments today</h3>
                                    <p>Enjoy your day off!</p>
                                </div>
                            @else
                                <div class="doctor-home-list">
                                    @foreach($todayAppointments->take(3) as $appointment)
                                        <a href="{{ route('doctor.appointments') }}" class="doctor-home-list-item">
                                            <span>
                                                <strong>{{ $appointment['patientName'] ?? 'Patient' }}</strong>
                                                {{ $appointment['patientLocalTime'] ?? (($appointment['startTime'] ?? '') . ' - ' . ($appointment['endTime'] ?? '')) }}
                                            </span>
                                            <i class="isax isax-arrow-right-3"></i>
                                        </a>
                                    @endforeach
                                </div>
                            @endif

                            <a href="{{ route('doctor.appointments') }}" class="doctor-home-outline-btn">View Full Schedule</a>
                        </article>

                        <article class="doctor-home-panel next-panel">
                            <div class="doctor-home-panel-head">
                                <h2>Next Up</h2>
                                <a href="{{ route('doctor.appointments') }}" aria-label="View appointments">
                                    <i class="isax isax-arrow-right-3"></i>
                                </a>
                            </div>

                            @if($nextAppointment)
                                <div class="doctor-home-empty">
                                    <div class="empty-icon green-soft">
                                        <i class="isax isax-calendar-tick"></i>
                                    </div>
                                    <h3>{{ $nextAppointment['patientName'] ?? 'Upcoming patient' }}</h3>
                                    <p>{{ $nextAppointment['patientLocalTime'] ?? (($nextAppointment['startTime'] ?? '') . ' - ' . ($nextAppointment['endTime'] ?? '')) }}</p>
                                </div>
                            @else
                                <div class="doctor-home-empty">
                                    <div class="empty-icon green-soft">
                                        <i class="isax isax-calendar-tick"></i>
                                    </div>
                                    <h3>No upcoming patients</h3>
                                    <p>Your next appointment will appear here.</p>
                                </div>
                            @endif
                        </article>
                    </section>

                    <section class="doctor-home-activity">
                        <div class="doctor-home-panel-head">
                            <h2>Recent Activities</h2>
                            <a href="#">View All</a>
                        </div>

                        @if(empty($notifications))
                            <div class="doctor-home-activity-empty">
                                <div class="empty-icon clock-soft">
                                    <i class="isax isax-clock"></i>
                                </div>
                                <span>
                                    <strong>No recent activities</strong>
                                    Your activities will appear here
                                </span>
                            </div>
                        @else
                            <div class="doctor-home-activity-list">
                                @foreach(array_slice($notifications, 0, 3) as $notification)
                                    <div class="doctor-home-activity-row">
                                        <div class="empty-icon clock-soft">
                                            <i class="fa-solid fa-bell"></i>
                                        </div>
                                        <span>
                                            <strong>{{ $notification['description'] ?? 'New activity' }}</strong>
                                            {{ isset($notification['createdAt']) ? \Carbon\Carbon::parse($notification['createdAt'])->format('M d, Y h:i A') : '' }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </section>

                    <section class="doctor-home-quick">
                        <h2>Quick Actions</h2>
                        <div class="doctor-home-actions">
                            <a href="{{ route('doctor.available-timings') }}" class="doctor-home-action">
                                <i class="isax isax-calendar-search"></i>
                                <span>
                                    <strong>View Payout</strong>
                                    Manage your connected payout methods
                                </span>
                            </a>
                            <a href="{{ route('doctor.appointments') }}" class="doctor-home-action orange-action">
                                <i class="fa-solid fa-users"></i>
                                <span>
                                    <strong>Waiting Patients</strong>
                                    See patients in queue
                                </span>
                            </a>
                            <a href="{{ route('doctor.conversations') }}" class="doctor-home-action purple-action">
                                <i class="isax isax-message-text"></i>
                                <span>
                                    <strong>New Message</strong>
                                    Check your messages
                                </span>
                            </a>
                            <a href="{{ route('doctor.settings') }}" class="doctor-home-action blue-action">
                                <i class="isax isax-document-text"></i>
                                <span>
                                    <strong>My Profile</strong>
                                    Update your details
                                </span>
                            </a>
                        </div>
                    </section>

                    <section class="doctor-home-trust">
                        <div>
                            <i class="isax isax-shield-tick"></i>
                            <span>
                                <strong>HIPAA Secure</strong>
                                Your data is encrypted and protected
                            </span>
                        </div>
                        <div>
                            <i class="isax isax-medal-star"></i>
                            <span>
                                <strong>Verified Profile</strong>
                                Your license is verified and active
                            </span>
                        </div>
                        <div>
                            <i class="isax isax-24-support"></i>
                            <span>
                                <strong>Support 24/7</strong>
                                We're here to help you anytime
                            </span>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <style>
        .doctor-home-page {
            background: #f7fbff;
            padding-top: 24px;
            padding-bottom: 96px;
        }

        .doctor-home-page,
        .doctor-home-page * {
            letter-spacing: 0;
        }

        .doctor-home-hero {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            min-height: 176px;
            padding: 26px;
            margin-bottom: 22px;
            overflow: hidden;
            border: 1px solid #e3ecfb;
            border-radius: 28px;
            background:
                linear-gradient(115deg, rgba(229, 240, 255, .98), rgba(246, 250, 255, .9)),
                radial-gradient(circle at 78% 20%, rgba(37, 99, 235, .18), transparent 34%);
            box-shadow: 0 18px 45px rgba(15, 43, 92, .08);
        }
         .doctor-home-trust {
                margin-bottom: 25px
            }

        .doctor-home-hero::after {
            content: "\f0f1";
            position: absolute;
            right: 105px;
            top: 12px;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 118px;
            color: rgba(37, 99, 235, .07);
            line-height: 1;
        }

        .doctor-home-profile {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: center;
            gap: 22px;
            min-width: 0;
        }

        .doctor-home-avatar {
            position: relative;
            flex: 0 0 auto;
        }

        .doctor-home-avatar img {
            width: 108px;
            height: 108px;
            object-fit: cover;
            border: 5px solid #fff;
            border-radius: 50%;
            box-shadow: 0 14px 34px rgba(15, 43, 92, .16);
        }

        .doctor-home-avatar span {
            position: absolute;
            right: 5px;
            bottom: 13px;
            width: 19px;
            height: 19px;
            border: 3px solid #fff;
            border-radius: 50%;
            background: #19c58a;
        }

        .doctor-home-profile p {
            margin: 0 0 6px;
            color: #17345f;
            font-size: 19px;
        }

        .doctor-home-profile h1 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            color: #061640;
            font-size: 36px;
            font-weight: 800;
            line-height: 1.15;
        }

        .doctor-home-profile h1 i {
            color: #1267f1;
            font-size: 24px;
        }

        .doctor-home-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 8px;
            color: #5a6782;
            font-size: 16px;
        }

        .doctor-home-meta span + span::before {
            content: "";
            display: inline-block;
            width: 5px;
            height: 5px;
            margin-right: 10px;
            vertical-align: middle;
            border-radius: 50%;
            background: #183d7a;
        }

        .doctor-home-alert {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            width: 72px;
            height: 72px;
            color: #071842;
            border-radius: 22px;
            background: #fff;
            box-shadow: 0 14px 36px rgba(15, 43, 92, .13);
        }

        .doctor-home-alert i {
            font-size: 32px;
        }

        .doctor-home-alert span {
            position: absolute;
            right: 12px;
            top: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 22px;
            height: 22px;
            padding: 0 6px;
            color: #fff;
            border-radius: 50px;
            background: #ef2b47;
            font-size: 12px;
            font-weight: 800;
        }

        .doctor-home-stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-bottom: 22px;
        }

        .doctor-home-stat,
        .doctor-home-panel,
        .doctor-home-activity,
        .doctor-home-trust {
            border: 1px solid #e4ecf8;
            border-radius: 22px;
            background: rgba(255, 255, 255, .92);
            box-shadow: 0 14px 36px rgba(15, 43, 92, .07);
        }

        .doctor-home-stat {
            display: flex;
            flex-direction: column;
            min-height: 246px;
            padding: 22px;
            overflow: hidden;
        }

        .doctor-home-stat > img:first-child {
            width: 52px;
            height: 52px;
            object-fit: cover;
            margin-bottom: 20px;
            border-radius: 14px;
            box-shadow: 0 10px 24px rgba(15, 43, 92, .14);
        }

        .doctor-home-stat h2 {
            min-height: 48px;
            margin: 0 0 12px;
            color: #071842;
            font-size: 18px;
            font-weight: 800;
            line-height: 1.25;
        }

        .doctor-home-stat strong {
            color: #074ed8;
            font-size: 34px;
            font-weight: 800;
            line-height: 1;
        }

        .doctor-home-stat p {
            margin: 12px 0 0;
            color: #65728b;
            font-size: 14px;
            line-height: 1.35;
        }

        .doctor-home-stat .stat-graph {
            width: 100%;
            max-height: 46px;
            object-fit: contain;
            object-position: left center;
            margin-top: auto;
            mix-blend-mode: multiply;
        }

        .doctor-home-stat .stat-line {
            max-height: 16px;
        }

        .stat-orange strong {
            color: #c54a00;
        }

        .stat-green strong {
            color: #01896e;
        }

        .stat-purple strong {
            color: #27128f;
        }

        .doctor-home-stars {
            display: flex;
            gap: 5px;
            margin-top: 14px;
            color: #cfd4df;
        }

        .doctor-home-stars i.active {
            color: #7c3aed;
        }

        .doctor-home-panels {
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) minmax(0, .9fr);
            gap: 18px;
            margin-bottom: 22px;
        }

        .doctor-home-panel {
            min-height: 330px;
            padding: 28px;
        }

        .doctor-home-panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 22px;
        }

        .doctor-home-panel-head h2,
        .doctor-home-quick h2 {
            margin: 0;
            color: #071842;
            font-size: 25px;
            font-weight: 800;
        }

        .doctor-home-panel-head span {
            display: inline-flex;
            align-items: center;
            min-height: 40px;
            padding: 0 17px;
            color: #075bd8;
            border-radius: 50px;
            background: #e8f0ff;
            font-size: 15px;
            font-weight: 700;
            white-space: nowrap;
        }

        .doctor-home-panel-head a {
            color: #0b4ba6;
            font-weight: 700;
        }

        .doctor-home-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 188px;
            text-align: center;
        }

        .empty-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 auto;
            width: 92px;
            height: 92px;
            margin-bottom: 18px;
            border-radius: 50%;
        }

        .empty-icon i {
            font-size: 44px;
        }

        .blue-soft {
            color: #1267f1;
            background: #eaf2ff;
        }

        .green-soft {
            color: #10a989;
            background: #e8f8f4;
        }

        .clock-soft {
            width: 68px;
            height: 68px;
            margin: 0;
            color: #1157c8;
            background: #f5f9ff;
            border: 1px solid #dce7f7;
        }

        .clock-soft i {
            font-size: 31px;
        }

        .doctor-home-empty h3 {
            margin: 0 0 8px;
            color: #071842;
            font-size: 21px;
            font-weight: 800;
        }

        .doctor-home-empty p {
            max-width: 260px;
            margin: 0;
            color: #65728b;
            font-size: 16px;
            line-height: 1.45;
        }

        .doctor-home-outline-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 54px;
            margin-top: 12px;
            color: #075bd8;
            border: 2px solid #0b5ac9;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 800;
        }

        .doctor-home-outline-btn:hover {
            color: #fff;
            background: #075bd8;
        }

        .doctor-home-list {
            display: grid;
            gap: 12px;
            margin-bottom: 18px;
        }

        .doctor-home-list-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 14px 16px;
            color: #65728b;
            border: 1px solid #e4ecf8;
            border-radius: 14px;
            background: #fbfdff;
        }

        .doctor-home-list-item strong {
            display: block;
            margin-bottom: 4px;
            color: #071842;
            font-size: 15px;
        }

        .doctor-home-activity {
            padding: 28px;
            margin-bottom: 28px;
        }

        .doctor-home-activity-empty,
        .doctor-home-activity-row {
            display: flex;
            align-items: center;
            gap: 24px;
            min-height: 118px;
            padding: 20px;
            border: 1px solid #dfe9f7;
            border-radius: 16px;
            background: #fbfdff;
        }

        .doctor-home-activity-empty span,
        .doctor-home-activity-row span {
            color: #65728b;
            font-size: 16px;
            line-height: 1.45;
        }

        .doctor-home-activity-empty strong,
        .doctor-home-activity-row strong {
            display: block;
            margin-bottom: 5px;
            color: #071842;
            font-size: 17px;
        }

        .doctor-home-activity-list {
            display: grid;
            gap: 12px;
        }

        .doctor-home-activity-row {
            min-height: 88px;
        }

        .doctor-home-quick {
            margin-bottom: 28px;
        }

        .doctor-home-quick h2 {
            margin-bottom: 18px;
        }

        .doctor-home-actions {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
        }

        .doctor-home-action {
            display: flex;
            align-items: center;
            gap: 14px;
            min-height: 124px;
            padding: 18px;
            color: #64718b;
            border: 1px solid #e4ecf8;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 12px 28px rgba(15, 43, 92, .06);
        }

        .doctor-home-action i {
            flex: 0 0 auto;
            color: #0a9f8d;
            font-size: 36px;
        }

        .doctor-home-action strong {
            display: block;
            margin-bottom: 4px;
            color: #071842;
            font-size: 14px;
            line-height: 1.25;
        }

        .doctor-home-action span {
            font-size: 13px;
            line-height: 1.35;
        }

        .doctor-home-action.orange-action i {
            color: #ff7417;
        }

        .doctor-home-action.purple-action i {
            color: #6d35d8;
        }

        .doctor-home-action.blue-action i {
            color: #075bd8;
        }

        .doctor-home-trust {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            padding: 22px;
        }

        .doctor-home-trust div {
            display: flex;
            align-items: center;
            gap: 16px;
            min-width: 0;
        }

        .doctor-home-trust div + div {
            border-left: 1px solid #e4ecf8;
            padding-left: 20px;
        }

        .doctor-home-trust i {
            color: #075bd8;
            font-size: 42px;
        }

        .doctor-home-trust span {
            color: #65728b;
            font-size: 14px;
            line-height: 1.4;
        }

        .doctor-home-trust strong {
            display: block;
            margin-bottom: 4px;
            color: #071842;
            font-size: 15px;
        }

        @media (max-width: 1399px) {
            .doctor-home-stat {
                padding: 18px;
            }

            .doctor-home-stat h2 {
                font-size: 16px;
            }

            .doctor-home-actions {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 1199px) {
            .doctor-home-stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 991px) {
            .doctor-home-page {
                padding-bottom: 116px;
            }

            .doctor-home-hero {
                margin-top: 0;
            }
        }

        @media (max-width: 767px) {
            .doctor-home-page {
                padding-top: 12px;
            }

            .doctor-home-hero {
                align-items: flex-start;
                padding: 20px;
                border-radius: 24px;
            }

            .doctor-home-profile {
                gap: 15px;
            }

            .doctor-home-avatar img {
                width: 78px;
                height: 78px;
                border-width: 4px;
            }

            .doctor-home-avatar span {
                width: 16px;
                height: 16px;
                right: 2px;
                bottom: 9px;
            }

            .doctor-home-profile p {
                font-size: 15px;
            }

            .doctor-home-profile h1 {
                font-size: 25px;
            }

            .doctor-home-profile h1 i {
                font-size: 18px;
            }

            .doctor-home-meta {
                gap: 6px;
                font-size: 13px;
            }

            .doctor-home-alert {
                width: 56px;
                height: 56px;
                border-radius: 18px;
            }

            .doctor-home-alert i {
                font-size: 25px;
            }

            .doctor-home-panels,
            .doctor-home-trust {
                grid-template-columns: 1fr;
            }

            .doctor-home-stat {
                min-height: 210px;
            }

            .doctor-home-panel {
                min-height: auto;
                padding: 22px;
            }

            .doctor-home-panel-head h2,
            .doctor-home-quick h2 {
                font-size: 22px;
            }

            .doctor-home-trust {
                margin-bottom: 50px
            }

            .doctor-home-action {
                min-height: 96px;
            }

            .doctor-home-trust div + div {
                border-left: 0;
                border-top: 1px solid #e4ecf8;
                padding-left: 0;
                padding-top: 18px;
            }
        }

        @media (max-width: 575px) {
            .doctor-home-hero {
                gap: 12px;
                padding: 18px;
            }

            .doctor-home-profile {
                align-items: flex-start;
            }

            .doctor-home-profile h1 {
                font-size: 22px;
            }

            .doctor-home-meta span {
                width: 100%;
            }

            .doctor-home-meta span + span::before {
                display: none;
            }

            .doctor-home-alert {
                width: 48px;
                height: 48px;
                border-radius: 16px;
            }

            .doctor-home-stat strong {
                font-size: 30px;
            }

            .doctor-home-panel-head {
                align-items: flex-start;
                flex-direction: column;
            }

            .doctor-home-activity {
                padding: 20px;
            }

            .doctor-home-activity-empty,
            .doctor-home-activity-row {
                align-items: flex-start;
                flex-direction: column;
                gap: 14px;
            }
        }
    </style>
@endsection
