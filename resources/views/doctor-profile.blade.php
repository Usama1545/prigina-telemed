<?php $page = 'doctor-profile'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Doctor Profile', 'li_2' => 'Doctor Details'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <!-- Doctor Widget -->
            <div class="card doc-profile-card">
                <div class="card-body">
                    <div class="doctor-widget doctor-profile-two">
                        <div class="doc-info-left">
                            <div class="doctor-img">
                                <img src="{{ isset($doctor['profilePicture']) && $doctor['profilePicture'] ? $doctor['profilePicture'] : asset('build/img/doctors/doc-profile-02.jpg') }}"
                                    class="img-fluid" alt="User Image">
                            </div>
                            <div class="doc-info-cont">
                                <span class="badge doc-avail-badge">
                                    @if ($doctor['available'] == true)
                                        <i class="fa-solid fa-circle fs-5 me-1"></i>
                                        Available
                                    @else
                                        <i class="fa-solid fa-circle fs-5 me-1"></i>
                                        Not Available
                                    @endif
                                </span>
                                <h4 class="doc-name">{{ $doctor['name'] }} <img
                                        src="{{ URL::asset('build/img/icons/badge-check.svg') }}" alt="Img">
                                    @foreach ($doctor['specializations'] as $specialization)
                                        <span class="badge doctor-role-badge"><i
                                                class="fa-solid fa-circle"></i>{{ $specialization }}</span>
                                    @endforeach
                                </h4>
                                <p>{{ $doctor['qualification'] }}</p>
                                @php
                                    $rating = $doctor['rating'] ?? 0;
                                    $fullStars = floor($rating);
                                    $halfStar = $rating - $fullStars >= 0.5;
                                @endphp

                                <div class="rating">
                                    {{-- Full stars --}}
                                    @for ($i = 1; $i <= $fullStars; $i++)
                                        <i class="fas fa-star filled"></i>
                                    @endfor

                                    {{-- Half star --}}
                                    @if ($halfStar)
                                        <i class="fas fa-star-half-alt filled"></i>
                                    @endif

                                    {{-- Empty stars --}}
                                    @for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor

                                    <span>{{ number_format($rating, 1) }}</span>
                                    <a href="#" class="d-inline-block average-rating">{{ $totalReviews }} Reviews</a>
                                </div>

                            </div>
                        </div>
                        <div class="doc-info-right">
                            <ul class="doctors-activities">
                                <li>
                                    <div class="hospital-info">
                                        <span class="list-icon"><img
                                                src="{{ URL::asset('build/img/icons/watch-icon.svg') }}"
                                                alt="Img"></span>
                                        <p>Full Time, Online Therapy Available</p>
                                    </div>

                                </li>
                                <li>
                                    <div class="hospital-info">
                                        <span class="list-icon"><img
                                                src="{{ URL::asset('build/img/icons/thumb-icon.svg') }}"
                                                alt="Img"></span>
                                        <p><b>{{ $recommendationPercentage }} </b> Recommended</p>
                                    </div>
                                </li>
                                <li>

                                    <ul class="contact-doctors">
                                        <li><a href="{{ url('chat-doctor') }}"><span><img
                                                        src="{{ URL::asset('build/img/icons/device-message2.svg') }}"
                                                        alt="Img"></span>Chat</a></li>
                                        <li><a href="{{ url('voice-call') }}"><span class="bg-violet"><i
                                                        class="feather-phone-forwarded"></i></span>Audio Call</a></li>
                                        <li><a href="{{ url('video-call') }}"><span class="bg-indigo"><i
                                                        class="fa-solid fa-video"></i></span>Video Call</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="doc-profile-card-bottom">
                        <ul>
                            <li>
                                <span class="bg-blue"><img src="{{ URL::asset('build/img/icons/calendar3.svg') }}"
                                        alt="Img"></span>
                                Nearly {{ $appointmentCount }} Appointment Booked
                            </li>
                            <li>
                                <span class="bg-dark-blue"><img src="{{ URL::asset('build/img/icons/bullseye.svg') }}"
                                        alt="Img"></span>
                                In Practice for {{ $doctor['experience'] }}
                            </li>

                        </ul>
                        <div class="bottom-book-btn">
                            <p><span>Price : {{ $doctor['consultationFee'] }} </span> for a Session</p>
                            <div class="clinic-booking">
                                <a class="apt-btn" href="{{ url('booking') }}">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

            <div class="doctors-detailed-info">
                <ul class="information-title-list">
                    <li class="active">
                        <a href="#doc_bio">Doctor Bio</a>
                    </li>

                    <li>
                        <a href="#speciality">Speciality</a>
                    </li>
                    <li>
                        <a href="#availability">Availability</a>
                    </li>
                    <li>
                        <a href="#review">Review</a>
                    </li>
                </ul>
                <div class="doc-information-main">
                    <div class="doc-information-details bio-detail" id="doc_bio">
                        <div class="detail-title">
                            <h4>Doctor Bio</h4>
                        </div>
                        <p>“Highly motivated and experienced doctor with a passion for
                            providing excellent care to patients. Experienced in a wide variety of
                            medical settings, with particular expertise in diagnostics, primary care and emergency
                            medicine. Skilled in using the latest technology to streamline patient care. Committed to
                            delivering compassionate, personalized care to each and every patient.”
                        </p>

                    </div>

                    <div class="doc-information-details" id="speciality">
                        <div class="detail-title">
                            <h4>Speciality</h4>
                        </div>
                        <ul class="special-links">
                            @foreach ($doctor['specializations'] as $specialization)
                                <li><a href="#">{{ $specialization }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    @php
                        use Carbon\Carbon;

                        $today = Carbon::now();
                        $workingDays = $doctor['workingDays'] ?? [];
                        $workingHours = $doctor['workingHours'] ?? [];

                        // Generate next 7 days
                        $days = [];
                        for ($i = 0; $i < 7; $i++) {
                            $date = $today->copy()->addDays($i);
                            $dayName = $date->format('l');

                            if (in_array($dayName, $workingDays)) {
                                $days[] = [
                                    'label' => $dayName,
                                    'date' => $date->format('d M'),
                                ];
                            }
                        }

                        // Format hours
                        $formattedHours = '-';
                        if (is_array($workingHours) && count($workingHours) === 2) {
                            try {
                                $start = \Carbon\Carbon::createFromFormat('H:i', $workingHours[0])->format('h:i A');
                                $end = \Carbon\Carbon::createFromFormat('H:i', $workingHours[1])->format('h:i A');
                                $formattedHours = "$start - $end";
                            } catch (\Exception $e) {
                                $formattedHours = '-';
                            }
                        }
                    @endphp
                    <div class="doc-information-details" id="availability">
                        <div class="hours-business">
                            <ul>
                                <li style="align-items: start">
                                    <div class="today-hours">
                                        <h6>Availablity</h6>
                                    </div>
                                    <span class="badge doc-avail-badge">
                                        <i class="fa-solid fa-circle"></i> Available
                                    </span>
                                </li>
                                @foreach ($days as $day)
                                    <li>
                                        <div class="today-hours">
                                            <h6>{{ $day['label'] }}</h6>
                                            <span>{{ $day['date'] }}</span>
                                        </div>

                                        <div class="availed">

                                            <p>{{ $formattedHours }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="doc-information-details mt-2" id="review">
                        <div class="detail-title">
                            <h4>Reviews ({{ $totalReviews }})</h4>
                        </div>
                        @foreach ($reviews as $review)
                            <div class="doc-review-card">
                                <div class="user-info-review">
                                    <div class="reviewer-img">
                                        <div class="review-star">
                                            <a
                                                href="#">{{ isset($review['patientName']) && $review['patientName'] ? $review['patientName'] : $review['patientName'] ?? 'Guest User' }}</a>
                                            @php
                                                $rating = $review['rating'] ?? 0;
                                                $fullStars = floor($rating);
                                                $halfStar = $rating - $fullStars >= 0.5;
                                            @endphp

                                            <div class="rating">
                                                {{-- Full stars --}}
                                                @for ($i = 1; $i <= $fullStars; $i++)
                                                    <i class="fas fa-star filled"></i>
                                                @endfor

                                                {{-- Half star --}}
                                                @if ($halfStar)
                                                    <i class="fas fa-star-half-alt filled"></i>
                                                @endif

                                                {{-- Empty stars --}}
                                                @for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                                                    <i class="far fa-star"></i>
                                                @endfor

                                                <span>
                                                    {{ number_format($rating, 1) }} |
                                                    {{ \Carbon\Carbon::parse($review['createdAt'])->diffForHumans() }}
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    @if ($review['rating'] >= 4)
                                        <span class="thumb-icon"><i class="fa-regular fa-thumbs-up"></i>Yes,Recommend for
                                            Appointment</span>
                                    @endif
                                </div>
                                <p>{{ $review['comment'] }}
                                </p>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->
@endsection
