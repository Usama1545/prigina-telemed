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
                                    @if (($doctor['available'] ?? false) === true)
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
                                        <li><a href="{{ route('conversation.create', $doctor['uid']) }}"><span><img
                                                        src="{{ URL::asset('build/img/icons/device-message2.svg') }}"
                                                        alt="Img"></span>Contact Doctor</a></li>
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
                            @if (session('firebase_token'))
                                <p><span>Price : {{ $doctor['consultationFee'] }} </span> for a Session</p>
                            @endif
                            <div class="clinic-booking">
                                <a class="apt-btn" href="javascript:void(0)" onclick="handleBookingClick()">
                                    Book Appointment
                                </a>
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
    <div class="modal fade" id="consentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="border-radius: 20px;">
                <div class="modal-header border-0 pb-0">
                    <h4 class="modal-title fw-bold">Medical Consent Agreement</h4>
                </div>

                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">

                    <h5 class="mb-3 text-warning">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                        Before You Continue
                    </h5>

                    <p>
                        PriGina Global TeleMed provides medical second opinions only.
                    </p>

                    <p>
                        This service:<br>
                        • Is advisory in nature<br>
                        • Does NOT replace your primary physician<br>
                        • Does NOT provide emergency care<br>
                        • Does NOT establish ongoing treatment relationship
                    </p>

                    <hr>

                    <h5 class="mb-3 text-danger">🚨 Not for Emergencies</h5>

                    <p class="text-danger fw-semibold">
                        If you are experiencing chest pain, difficulty breathing, stroke symptoms,
                        severe bleeding, or any life-threatening condition:
                    </p>

                    <p class="text-danger fw-semibold">
                        Call 911 (U.S.) or your local emergency number immediately.
                    </p>

                    <p class="text-danger fw-semibold">
                        Do NOT use this platform for urgent or emergency medical care.
                    </p>

                    <hr>

                    <h5 class="mb-3 text-primary">📋 Important Acknowledgements</h5>

                    <p>
                        By continuing, you confirm that:
                    </p>

                    <p>
                        ✔ You are voluntarily requesting a second medical opinion<br>
                        ✔ You understand this is not primary treatment<br>
                        ✔ You will consult your treating physician before making medical decisions<br>
                        ✔ You will provide complete and accurate medical records<br>
                        ✔ You understand that outcomes are not guaranteed
                    </p>

                    <hr>

                    <h5 class="mb-3 text-secondary">🔒 Telemedicine Notice</h5>

                    <p>
                        You understand that:<br>
                        • Your consultation will occur electronically<br>
                        • No physical examination will be performed<br>
                        • Recommendations are based solely on information you provide
                    </p>

                    <hr>

                    <h5 class="mb-3 text-info">🌍 Cross-Border Notice</h5>

                    <p>
                        Physicians may be licensed in specific jurisdictions.
                        Regulatory rules may differ in your location.
                        This service is consultative only.
                    </p>

                    <hr>

                    <h5 class="mb-3 text-success">✅ Consent</h5>

                    <p>
                        By selecting “I Agree”, you confirm that:
                    </p>

                    <p>
                        • You have read and understood this disclaimer<br>
                        • You accept the risks and limitations<br>
                        • You consent to receive a second opinion via telemedicine
                    </p>

                    <p class="fw-semibold">
                        This consent is valid for 1 year from today.
                    </p>

                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="agreeConsent">
                        <label class="form-check-label" for="agreeConsent">
                            I agree to the conditions above
                        </label>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-primary" id="agreeBtn" disabled>
                        Agree & Continue
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const bookingUrl = "{{ url($doctor['uid'] . '/booking-slots') }}";

        function handleBookingClick() {

            const user = @json(current_user());

            const consentAgreed = user?.consentAgreed;
            const consentAgreedAt = user?.consentAgreedAt;

            let shouldShowModal = false;

            if (!consentAgreed || !consentAgreedAt) {
                shouldShowModal = true;
            } else {
                const agreedDate = new Date(consentAgreedAt);
                const now = new Date();

                const diffInMs = now - agreedDate;
                const diffInDays = diffInMs / (1000 * 60 * 60 * 24);

                if (diffInDays > 365) {
                    shouldShowModal = true;
                }
            }

            if (!shouldShowModal) {
                window.location.href = bookingUrl;
                return;
            }

            const modal = new bootstrap.Modal(document.getElementById('consentModal'));
            modal.show();
        }

        document.getElementById('agreeConsent').addEventListener('change', function() {
            document.getElementById('agreeBtn').disabled = !this.checked;
        });

        document.getElementById('agreeBtn').addEventListener('click', async function() {

            const btn = this;

            btn.disabled = true;
            btn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2"></span>
        Please wait...
    `;

            try {

                const response = await fetch("{{ route('consent.agree') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        consentAgreed: true
                    })
                });

                if (!response.ok) {
                    throw new Error('Request failed');
                }

                window.location.href = bookingUrl;

            } catch (e) {

                btn.disabled = false;
                btn.innerHTML = 'Agree & Continue';

                alert('Something went wrong. Please try again.');
            }
        });
    </script>
    <!-- /Page Content -->
@endsection
