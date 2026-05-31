@extends('layouts.mainlayout')

@section('content')

    {{-- ───────────────── HERO ───────────────── --}}
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-lg-6">
                    <h6 class="text-secondary fw-bold text-uppercase mb-2">Appointment Review</h6>
                    @if ($alreadyReviewed)
                        <h1 class="fw-bold mb-3 text-primary">Thank You for Your Feedback!</h1>
                        <p class="text-muted fs-5">Your review has already been submitted. We truly appreciate you taking the
                            time to share your experience.</p>
                    @else
                        <h1 class="fw-bold mb-3 text-primary">Thank You for Choosing<br>PriGina Global Telemed!</h1>
                        <p class="text-muted ">Thank you for trusting PriGina Global Telemed for your healthcare
                            consultation. We appreciate the opportunity to support your health and well-being.</p>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success mt-3" style="border-radius:10px;">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger mt-3" style="border-radius:10px;">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="col-lg-6 text-center">
                    <img src="{{ asset('build/img/about-us.jpeg') }}" class="img-fluid rounded shadow"
                        style="max-height:300px; object-fit:cover; width:100%;">
                </div>

            </div>
        </div>
    </section>

    {{-- ───────────────── APPOINTMENT SUMMARY ───────────────── --}}
    <section class="py-5 bg-primary text-center">
        <div class="container">

            <h6 class="text-secondary text-uppercase fw-semibold">
                Appointment Summary
            </h6>

            <h2 class="fw-bold mb-5 text-white">
                Your Consultation Details
            </h2>

            <div class="row align-items-stretch justify-content-center">

                {{-- DOCTOR --}}
                <div class="col-md-4 col-lg mb-4 mb-lg-0">

                    <div class="px-3 h-100 text-white">

                        <div class="mb-3">

                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-sm icon-soft-primary"
                                style="width:70px;height:70px;">

                                <i class="fa fa-user-md d-block lh-1 text-primary" style="font-size:2.4rem;"></i>

                            </div>

                        </div>

                        <h5 class="text-white">Doctor</h5>

                        <p class="mx-2 text-white mb-0">
                            Dr. {{ $appointment['doctorName'] ?? 'N/A' }}
                        </p>

                    </div>

                </div>


                {{-- SPECIALTY --}}
                @if (!empty($appointment['specialty']))
                    <div class="col-md-4 col-lg mb-4 mb-lg-0">

                        <div class="px-3 h-100 position-relative border-start border-end">

                            <div class="mb-3">

                                <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-sm icon-soft-secondary"
                                    style="width:70px;height:70px;">

                                    <i class="fa-solid fa-stethoscope d-block lh-1 text-secondary"
                                        style="font-size:2.4rem;"></i>

                                </div>

                            </div>

                            <h5 class="text-white">Specialty</h5>

                            <p class="mx-2 text-white mb-0">
                                {{ $appointment['specialty'] }}
                            </p>

                        </div>

                    </div>
                @endif


                {{-- DATE --}}
                <div class="col-md-4 col-lg mb-4 mb-lg-0">

                    <div class="px-3 h-100">

                        <div class="mb-3">

                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-sm icon-soft-primary"
                                style="width:70px;height:70px;">

                                <i class="fa-regular fa-calendar-check d-block lh-1 text-primary"
                                    style="font-size:2.4rem;"></i>

                            </div>

                        </div>

                        <h5 class="text-white">Date</h5>

                        <p class="mx-2 text-white mb-0">

                            @php
                                $d = $appointment['date'] ?? null;
                                echo $d ? \Carbon\Carbon::parse($d)->format('M j, Y') : 'N/A';
                            @endphp

                        </p>

                    </div>

                </div>


                {{-- TIME --}}
                <div class="col-md-4 col-lg mb-4 mb-lg-0">

                    <div class="px-3 h-100 position-relative border-start border-end">

                        <div class="mb-3">

                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-sm icon-soft-secondary"
                                style="width:70px;height:70px;">

                                <i class="fa-regular fa-clock d-block lh-1 text-secondary" style="font-size:2.4rem;"></i>

                            </div>

                        </div>

                        <h5 class="text-white">Time</h5>

                        <p class="mx-2 text-white mb-0">

                            {{ $appointment['patientLocalTime'] ??
                                ($appointment['startTime'] ?? '') . ' – ' . ($appointment['endTime'] ?? '') }}

                        </p>

                    </div>

                </div>


                {{-- CONSULTATION --}}
                <div class="col-md-4 col-lg">

                    <div class="px-3 h-100">

                        <div class="mb-3">

                            <div class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-sm icon-soft-primary"
                                style="width:70px;height:70px;">

                                <i class="fa-solid fa-video d-block lh-1 text-primary" style="font-size:2.4rem;"></i>

                            </div>

                        </div>

                        <h5 class="text-white">Consultation</h5>

                        <p class="mx-2 text-white mb-0">
                            Video Consultation
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </section>


    {{-- ───────────────── FEEDBACK / FORM ───────────────── --}}
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-primary">Your Feedback Matters</h2>
                <p class="text-muted">Your feedback helps us maintain the highest standards of care and<br
                        class="d-none d-md-block"> continually improve your experience on our platform.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">

                    @if ($alreadyReviewed)
                        <div class="bg-white rounded shadow-sm p-5 text-center">
                            <div style="font-size:56px; margin-bottom:12px;">🎉</div>
                            <h4 class="fw-bold text-primary mb-2">Review Submitted</h4>
                            <p class="text-muted mb-4">You've already shared your feedback for this appointment. Thank you —
                                it means a lot to us!</p>
                            <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">Back to Home</a>
                        </div>
                    @else
                        <div class="">
                            <h5 class="fw-bold text-center mb-4">How would you rate your overall experience?</h5>

                            <form method="POST" action="{{ url('/' . $appointment['id'] . '/review') }}" id="reviewForm">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger" style="border-radius:10px; font-size:13px;">
                                        @foreach ($errors->all() as $error)
                                            <div>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif

                                {{-- Stars --}}
                                <div class="mb-4 text-center">
                                    <div class="star-group" id="starGroup">
                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" name="rating" id="star{{ $i }}"
                                                value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>

                                            <label for="star{{ $i }}">
                                                <i class="fa-solid fa-star"></i>
                                            </label>
                                        @endfor
                                    </div>

                                    <div class="rating-label mt-2" id="ratingLabel">
                                        Select a rating
                                    </div>
                                </div>
                                {{-- Comment --}}
                                <div class="mb-4">
                                    <label for="comment" class="form-label fw-semibold">Your Review <span
                                            class="text-muted fw-normal">(optional)</span></label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4"
                                        style="border-radius:10px; border-color:#e2e8f0;" placeholder="Tell us about your experience with the doctor...">{{ old('comment') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary-gradient w-100 py-3 fw-bold" id="submitBtn"
                                    style="font-size:16px; border-radius:10px;">
                                    Leave a Review
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>


    {{-- ───────────────── WHAT'S NEXT ───────────────── --}}
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-primary">What's Next?</h2>
                <p class="text-muted">We're here to support you every step of the way. Explore the options below to<br
                        class="d-none d-md-block"> continue your care journey with PriGina Global Telemed.</p>
            </div>

            <div class="row g-4 justify-content-center">

                <div class="col-md-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                        <div class="mb-3" style="font-size:36px; color:#0284c7;"><i
                                class="fa-regular fa-calendar-plus"></i></div>
                        <h5 class="fw-bold mb-2">Book Follow-Up Appointment</h5>
                        <p class="text-muted small mb-4">Continue your care with your doctor.</p>
                        <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">Book Now</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                        <div class="mb-3" style="font-size:36px; color:#0284c7;"><i
                                class="fa-solid fa-user-doctor"></i></div>
                        <h5 class="fw-bold mb-2">Consult Another Specialist</h5>
                        <p class="text-muted small mb-4">Get expert advice from other specialists.</p>
                        <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">Find a Doctor</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                        <div class="mb-3" style="font-size:36px; color:#0284c7;"><i
                                class="fa-regular fa-folder-open"></i></div>
                        <h5 class="fw-bold mb-2">View Your Medical Records</h5>
                        <p class="text-muted small mb-4">Access your consultation summary and records.</p>
                        <a href="{{ route('patient.appointments') }}" class="btn btn-primary-gradient px-4">View
                            Records</a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- ───────────────── CTA BANNER ───────────────── --}}
    <section class="info-section my-3">
        <div class="container">
            <div class="contact-info">
                <div class="info-col">
                    <div class="wow fadeInUp" data-wow-duration="1s">
                        <h3 class="info-title">Your Health. Our Priority.</h3>
                        <p class="mb-0 text-white">PriGina Global Telemed is committed to providing safe, confidential, and
                            quality healthcare across the globe.</p>
                    </div>
                    <div class="support-info wow fadeInUp" data-wow-duration="1s">
                        <a href="{{ url('/') }}" class="btn btn-light px-4 mt-3 mt-md-0">Back to Home →</a>
                    </div>
                </div>
                <img src="{{ URL::asset('build/img/bg/info-bg.png') }}" alt="" class="img-fluid element-01">
            </div>
        </div>
    </section>


    <style>
        .star-group {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            gap: 10px;
        }

        .star-group input[type="radio"] {
            display: none !important;
        }

        .star-group label {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .star-group label i {
            font-size: 48px;
            color: #d1d5db;
            transition: all 0.2s ease;
        }

        .star-group label:hover i,
        .star-group label:hover~label i {
            color: #fbbf24;
            transform: scale(1.08);
        }

        .star-group input:checked~label i {
            color: #f59e0b;
        }

        .rating-label {
            font-size: 14px;
            font-weight: 600;
            color: #64748b;
            min-height: 22px;
        }
    </style>

    @push('scripts')
        <script>
            const labels = ['', 'Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
            const ratingLabel = document.getElementById('ratingLabel');

            document.querySelectorAll('.star-group input[type="radio"]').forEach(input => {
                input.addEventListener('change', () => {
                    ratingLabel.textContent = labels[input.value] || '';
                });
            });

            const checked = document.querySelector('.star-group input[type="radio"]:checked');
            if (checked) ratingLabel.textContent = labels[checked.value] || '';

            document.getElementById('reviewForm')?.addEventListener('submit', function() {
                const btn = document.getElementById('submitBtn');
                btn.disabled = true;
                btn.textContent = 'Submitting…';
            });
        </script>
    @endpush

@endsection
