<?php $page = 'doctor-profile'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', [
        'title' => __('app.doctor_profile.breadcrumb_title'),
        'li_1' => __('app.doctor_profile.breadcrumb_profile'),
        'li_2' => __('app.doctor_profile.breadcrumb_details'),
    ])
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
                                @if (($doctor['available'] ?? false) === true)
                                    <span class="badge doc-avail-badge">
                                        <i class="fa-solid fa-circle fs-5 me-1"></i>
                                        {{ __('app.doctor_profile.available') }}

                                    </span>
                                @else
                                    <span
                                        class="badge doc-avail-badge bg-danger bg-danger-light d-inline-flex align-items-center">
                                        <i class="fa-solid fa-circle fs-5 me-1"></i>
                                        {{ __('app.doctor_profile.not_available') }}
                                    </span>
                                @endif
                                <h4 class="doc-name">{{ $doctor['name'] }} <img
                                        src="{{ URL::asset('build/img/icons/badge-check.svg') }}" alt="Img">
                                    @foreach ($doctor['specializations'] as $specialization)
                                        <span class="badge doctor-role-badge">
                                            <i class="fa-solid fa-circle"></i>
                                            {{ ucwords(str_replace('_', ' ', $specialization)) }}
                                        </span>
                                    @endforeach
                                </h4>
                                <p>
                                    {{ is_array($doctor['qualification'] ?? null)
                                        ? implode(', ', $doctor['qualification'])
                                        : $doctor['qualification'] ?? '' }}
                                </p>
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
                                    <a href="#" class="d-inline-block average-rating">{{ $totalReviews }}
                                        {{ __('app.doctor_profile.reviews') }}</a>
                                </div>

                            </div>
                        </div>
                        <div class="doc-info-right">
                            <ul class="doctors-activities">
                                {{-- <li>
                                    <div class="hospital-info">
                                        <span class="list-icon"><img
                                                src="{{ URL::asset('build/img/icons/watch-icon.svg') }}"
                                                alt="Img"></span>
                                        <p>Full Time, Online Therapy Available</p>
                                    </div>

                                </li> --}}
                                <li>
                                    <div class="hospital-info">
                                        <span class="list-icon"><img
                                                src="{{ URL::asset('build/img/icons/thumb-icon.svg') }}"
                                                alt="Img"></span>
                                        <p><b>{{ $recommendationPercentage }} %</b>
                                            {{ __('app.doctor_profile.recommended') }}</p>
                                    </div>
                                </li>
                                <li>

                                    @if ($hasAppointment)
                                        <ul class="contact-doctors">
                                            <li><a href="{{ route('conversation.create', $doctor['uid']) }}"><span><img
                                                            src="{{ URL::asset('build/img/icons/device-message2.svg') }}"
                                                            alt="Img"></span>{{ __('app.doctor_profile.contact_doctor') }}</a>
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="doc-profile-card-bottom">
                        <ul>
                            <li>
                                <span class="bg-blue"><img src="{{ URL::asset('build/img/icons/calendar3.svg') }}"
                                        alt="Img"></span>
                                {{ __('app.doctor_profile.appointments_booked', ['count' => $appointmentCount]) }}
                            </li>
                            <li>
                                <span class="bg-dark-blue"><img src="{{ URL::asset('build/img/icons/bullseye.svg') }}"
                                        alt="Img"></span>
                                {{ __('app.doctor_profile.in_practice_for', ['experience' => $doctor['experience']]) }}
                            </li>

                        </ul>
                        <div class="bottom-book-btn">
                            @if (session('firebase_token'))
                                <p><span>{{ __('app.doctor_profile.consultation_fee') }}:
                                        ${{ $doctor['consultationFee'] }} </span>
                                    {{ __('app.doctor_profile.per_session') }}</p>
                            @endif
                            @if ($doctor['isActive'] == true && $doctor['isVerified'] == true)
                                <div class="clinic-booking">
                                    <a class="apt-btn" href="javascript:void(0)" onclick="handleBookingClick()">
                                        {{ __('app.doctor_profile.book_appointment') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Doctor Widget -->

            <div class="doctors-detailed-info">
                <ul class="information-title-list">
                    <li class="active">
                        <a href="#doc_bio">{{ __('app.doctor_profile.doctor_bio') }}</a>
                    </li>

                    <li>
                        <a href="#speciality">{{ __('app.doctor_profile.speciality') }}</a>
                    </li>
                    <li>
                        <a href="#languages">{{ __('app.doctor_profile.languages') }}</a>
                    </li>
                    <li>
                        <a href="#availability">{{ __('app.doctor_profile.availability') }}</a>
                    </li>
                    <li>
                        <a href="#review">{{ __('app.doctor_profile.review') }}</a>
                    </li>
                </ul>
                <div class="doc-information-main">
                    <div class="doc-information-details bio-detail" id="doc_bio">
                        <div class="detail-title">
                            <h4>{{ __('app.doctor_profile.doctor_bio') }}</h4>
                        </div>
                        <?php
                        $name = $doctor['name'] ?? 'Dr. John Doe';
                        $qualification = $doctor['qualification'] ?? '';
                        
                        $experience = $doctor['experience'] ?? '';
                        
                        $specializations = $doctor['specializations'] ?? [];
                        $bio = $doctor['bio'] ?? '';
                        if (is_array($bio)) {
                            $locale = app()->getLocale();
                            $bio = $bio[$locale] ?? ($bio['en'] ?? '');
                        }
                        if (empty($bio)) {
                            if (!empty($specializations)) {
                                $specializationsList = implode(
                                    ', ',
                                    array_map(function ($spec) {
                                        return ucwords(str_replace('_', ' ', $spec));
                                    }, $specializations),
                                );
                                $bio = __('app.doctor_profile.bio_with_specialization', [
                                    'name' => $name,
                                    'qualification' => is_array($doctor['qualification'] ?? null) ? implode(', ', $doctor['qualification']) : $doctor['qualification'] ?? '',
                                    'experience' => $experience,
                                    'specializations' => $specializationsList,
                                ]);
                            } else {
                                $bio = __('app.doctor_profile.bio_without_specialization', [
                                    'name' => $name,
                                    'qualification' => $qualification,
                                    'experience' => $experience,
                                ]);
                            }
                        }
                        ?>
                        <p>{{ $bio }}
                        </p>

                    </div>

                    <div class="doc-information-details" id="speciality">
                        <div class="detail-title">
                            <h4>{{ __('app.doctor_profile.speciality') }}</h4>
                        </div>

                        <ul class="special-links">
                            @foreach ($doctor['specializations'] as $specialization)
                                <li>
                                    <a href="#">
                                        {{ ucwords(str_replace('_', ' ', $specialization)) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @if (!empty($doctor['languages']))
                        <div class="doc-information-details" id="languages">
                            <div class="detail-title">
                                <h4>{{ __('app.doctor_profile.languages_spoken') }}</h4>
                            </div>
                            <ul class="special-links">
                                @foreach ($doctor['languages'] as $language)
                                    <li><a href="#">{{ $language }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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
                                        <h6>{{ __('app.doctor_profile.availability') }}</h6>
                                    </div>
                                    <span class="badge doc-avail-badge">
                                        <i class="fa-solid fa-circle"></i> {{ __('app.doctor_profile.available') }}
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
                            <h4>{{ __('app.doctor_profile.reviews_with_count', ['count' => $totalReviews]) }}</h4>
                        </div>
                        @foreach ($reviews as $review)
                            <div class="doc-review-card">
                                <div class="user-info-review">
                                    <div class="reviewer-img">
                                        <div class="review-star">
                                            <a
                                                href="#">{{ isset($review['patientName']) && $review['patientName'] ? $review['patientName'] : $review['patientName'] ?? __('app.doctor_profile.guest_user') }}</a>
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
                                        <span class="thumb-icon"><i
                                                class="fa-regular fa-thumbs-up"></i>{{ __('app.doctor_profile.recommend_for_appointment') }}</span>
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
                    <h4 class="modal-title fw-bold">{{ __('app.doctor_profile.consent_title') }}</h4>
                </div>

                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">

                    <h5 class="mb-3 text-warning">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>
                        {{ __('app.doctor_profile.before_you_continue') }}
                    </h5>

                    <p>
                        {{ __('app.doctor_profile.consent_intro') }}
                    </p>

                    <p>
                        {{ __('app.doctor_profile.service_intro') }}<br>
                        • {{ __('app.doctor_profile.service_advisory') }}<br>
                        • {{ __('app.doctor_profile.service_not_replace') }}<br>
                        • {{ __('app.doctor_profile.service_not_emergency') }}<br>
                        • {{ __('app.doctor_profile.service_not_ongoing') }}
                    </p>

                    <hr>

                    <h5 class="mb-3 text-danger">🚨 {{ __('app.doctor_profile.not_for_emergencies') }}</h5>

                    <p class="text-danger fw-semibold">
                        {{ __('app.doctor_profile.emergency_warning') }}
                    </p>

                    <p class="text-danger fw-semibold">
                        {{ __('app.doctor_profile.call_911') }}
                    </p>

                    <p class="text-danger fw-semibold">
                        {{ __('app.doctor_profile.no_urgent_use') }}
                    </p>

                    <hr>

                    <h5 class="mb-3 text-primary">📋 {{ __('app.doctor_profile.important_acknowledgements') }}</h5>

                    <p>
                        {{ __('app.doctor_profile.confirm_intro') }}
                    </p>

                    <p>
                        ✔ {{ __('app.doctor_profile.ack_voluntary') }}<br>
                        ✔ {{ __('app.doctor_profile.ack_not_primary') }}<br>
                        ✔ {{ __('app.doctor_profile.ack_consult_physician') }}<br>
                        ✔ {{ __('app.doctor_profile.ack_accurate_records') }}<br>
                        ✔ {{ __('app.doctor_profile.ack_no_guarantee') }}
                    </p>

                    <hr>

                    <h5 class="mb-3 text-secondary">🔒 {{ __('app.doctor_profile.telemedicine_notice') }}</h5>

                    <p>
                        {{ __('app.doctor_profile.telemedicine_intro') }}<br>
                        • {{ __('app.doctor_profile.telemedicine_electronic') }}<br>
                        • {{ __('app.doctor_profile.telemedicine_no_exam') }}<br>
                        • {{ __('app.doctor_profile.telemedicine_based_on_info') }}
                    </p>

                    <hr>

                    <h5 class="mb-3 text-info">🌍 {{ __('app.doctor_profile.cross_border_notice') }}</h5>

                    <p>
                        {{ __('app.doctor_profile.cross_border_text') }}
                    </p>

                    <hr>

                    <h5 class="mb-3 text-success">✅ {{ __('app.doctor_profile.consent_heading') }}</h5>

                    <p>
                        {{ __('app.doctor_profile.agree_confirm_intro') }}
                    </p>

                    <p>
                        • {{ __('app.doctor_profile.consent_read') }}<br>
                        • {{ __('app.doctor_profile.consent_risks') }}<br>
                        • {{ __('app.doctor_profile.consent_telemedicine') }}
                    </p>

                    <p class="fw-semibold">
                        {{ __('app.doctor_profile.consent_valid_1_year') }}
                    </p>

                    <div class="form-check mt-4">
                        <input class="form-check-input" type="checkbox" id="agreeConsent">
                        <label class="form-check-label" for="agreeConsent">
                            {{ __('app.doctor_profile.agree_checkbox_label') }}
                        </label>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-primary" id="agreeBtn" disabled>
                        {{ __('app.doctor_profile.agree_continue') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const bookingUrl = "{{ url($doctor['uid'] . '/booking-slots') }}";
        const doctorNotAvailableAlert = @json(__('app.doctor_profile.doctor_not_available_alert'));
        const doctorNoAvailabilityAlert = @json(__('app.doctor_profile.doctor_no_availability_alert'));
        const pleaseWaitText = @json(__('app.doctor_profile.please_wait'));
        const agreeContinueText = @json(__('app.doctor_profile.agree_continue'));
        const somethingWentWrongText = @json(__('app.doctor_profile.something_went_wrong'));

        function handleBookingClick() {

            const doctor = @json($doctor);
            const user = @json(current_user());

            if (!doctor.available) {
                showAlert(doctorNotAvailableAlert);
                return;
            }

            if (!doctor.workingDays || doctor.workingDays.length === 0 || !doctor.workingHours || doctor.workingHours
                .length <= 1) {
                showAlert(doctorNoAvailabilityAlert);
                return;
            }

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
        ${pleaseWaitText}
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
                btn.innerHTML = agreeContinueText;

                alert(somethingWentWrongText);
            }
        });
    </script>
    <!-- /Page Content -->
@endsection
