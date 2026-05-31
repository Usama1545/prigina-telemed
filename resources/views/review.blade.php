```blade
@extends('layouts.mainlayout')

@section('content')

    <section class="py-5 review-page-bg">
        <div class="container">

            <div class="review-wrapper">

                {{-- ───────────────── HEADER ───────────────── --}}
                <div class="review-header">

                    <div class="row align-items-center g-4">

                        <div class="col-lg-7">

                            <img src="{{ asset('build/img/prigina-gav.png') }}" class="review-logo mb-4" alt="PriGina">

                            @if ($alreadyReviewed)
                                <h1 class="review-title">
                                    Thank You for Your Feedback!
                                </h1>

                                <p class="review-subtitle">
                                    Your review has already been submitted.
                                    We truly appreciate you taking the time to
                                    share your experience with PriGina Global Telemed.
                                </p>
                            @else
                                <h1 class="review-title">
                                    Thank You for Choosing<br>
                                    PriGina Global Telemed!
                                </h1>

                                <p class="review-subtitle">
                                    Thank you for trusting PriGina Global Telemed
                                    for your healthcare consultation.
                                    We appreciate the opportunity to support
                                    your health and well-being.
                                </p>
                            @endif

                        </div>

                        <div class="col-lg-5 text-center">

                            <img src="{{ asset('build/img/about-us.jpeg') }}" class="img-fluid review-hero-image"
                                alt="Doctor">

                        </div>

                    </div>

                </div>


                {{-- ───────────────── APPOINTMENT SUMMARY ───────────────── --}}
                <div class="summary-card">

                    <div class="summary-header">

                        <div class="summary-icon">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>

                        <h3>Appointment Summary</h3>

                    </div>

                    <div class="summary-grid">

                        <div class="summary-item">

                            <div class="summary-item-icon">
                                <i class="fa-solid fa-user-doctor"></i>
                            </div>

                            <div class="summary-label">Doctor</div>

                            <div class="summary-value">
                                Dr. {{ $appointment['doctorName'] ?? 'N/A' }}
                            </div>

                        </div>

                        @if (!empty($appointment['specialty']))
                            <div class="summary-item">

                                <div class="summary-item-icon">
                                    <i class="fa-solid fa-stethoscope"></i>
                                </div>

                                <div class="summary-label">Specialty</div>

                                <div class="summary-value">
                                    {{ $appointment['specialty'] }}
                                </div>

                            </div>
                        @endif

                        <div class="summary-item">

                            <div class="summary-item-icon">
                                <i class="fa-regular fa-calendar-check"></i>
                            </div>

                            <div class="summary-label">Date</div>

                            <div class="summary-value">

                                @php
                                    $d = $appointment['date'] ?? null;
                                    echo $d ? \Carbon\Carbon::parse($d)->format('M j, Y') : 'N/A';
                                @endphp

                            </div>

                        </div>

                        <div class="summary-item">

                            <div class="summary-item-icon">
                                <i class="fa-regular fa-clock"></i>
                            </div>

                            <div class="summary-label">Time</div>

                            <div class="summary-value">
                                {{ $appointment['patientLocalTime'] ??
                                    ($appointment['startTime'] ?? '') . ' – ' . ($appointment['endTime'] ?? '') }}
                            </div>

                        </div>

                        <div class="summary-item">

                            <div class="summary-item-icon">
                                <i class="fa-solid fa-video"></i>
                            </div>

                            <div class="summary-label">Consultation</div>

                            <div class="summary-value">
                                Video Consultation
                            </div>

                        </div>

                    </div>

                </div>


                {{-- ───────────────── REVIEW ───────────────── --}}
                <div class="feedback-section">

                    <h2 class="feedback-title">
                        Your Feedback Matters
                    </h2>

                    <p class="feedback-subtitle">
                        Your feedback helps us maintain the highest standards
                        of care and continually improve your experience
                        on our platform.
                    </p>

                    @if ($alreadyReviewed)
                        <div class="submitted-box">

                            <div class="submitted-icon">🎉</div>

                            <h4>Review Submitted</h4>

                            <p>
                                You've already shared your feedback
                                for this appointment.
                            </p>

                            <a href="{{ url('/') }}" class="btn review-btn">
                                Back to Home
                            </a>

                        </div>
                    @else
                        <div class="review-card">

                            <form method="POST" action="{{ url('/' . $appointment['id'] . '/review') }}" id="reviewForm">

                                @csrf

                                <h4 class="review-question">
                                    How would you rate your overall experience?
                                </h4>

                                {{-- Stars --}}
                                <div class="stars-wrapper">

                                    <div class="star-group">

                                        @for ($i = 5; $i >= 1; $i--)
                                            <input type="radio" name="rating" id="star{{ $i }}"
                                                value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>

                                            <label for="star{{ $i }}" data-value="{{ $i }}">
                                                <i class="fa-solid fa-star"></i>
                                            </label>
                                        @endfor

                                    </div>

                                    <div class="rating-text" id="ratingText">
                                        Select your rating
                                    </div>

                                </div>

                                {{-- Review --}}
                                <div class="mb-4">

                                    <label class="review-label">
                                        Share your experience
                                    </label>

                                    <textarea class="review-textarea" name="comment" rows="5"
                                        placeholder="Tell us about your consultation experience...">{{ old('comment') }}</textarea>

                                </div>

                                <button type="submit" class="btn review-btn w-100" id="submitBtn">
                                    Leave a Review
                                </button>

                            </form>

                        </div>
                    @endif

                </div>


                {{-- ───────────────── WHAT'S NEXT ───────────────── --}}
                <div class="next-section">

                    <h2 class="next-title">
                        What's Next?
                    </h2>

                    <p class="next-subtitle">
                        We're here to support you every step of the way.
                    </p>

                    <div class="row g-4 mt-2">

                        <div class="col-md-4">

                            <div class="next-card">

                                <div class="next-icon">
                                    <i class="fa-regular fa-calendar-plus"></i>
                                </div>

                                <h5>
                                    Book Follow-Up Appointment
                                </h5>

                                <p>
                                    Continue your care with your doctor.
                                </p>

                                <a href="{{ url('/') }}" class="btn review-btn btn-sm px-4">
                                    Book Now
                                </a>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="next-card">

                                <div class="next-icon">
                                    <i class="fa-solid fa-user-doctor"></i>
                                </div>

                                <h5>
                                    Consult Another Specialist
                                </h5>

                                <p>
                                    Get expert advice from other specialists.
                                </p>

                                <a href="{{ url('/') }}" class="btn review-btn btn-sm px-4">
                                    Find a Doctor
                                </a>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="next-card">

                                <div class="next-icon">
                                    <i class="fa-regular fa-folder-open"></i>
                                </div>

                                <h5>
                                    View Your Medical Records
                                </h5>

                                <p>
                                    Access your consultation summary and records.
                                </p>

                                <a href="{{ route('patient.appointments') }}" class="btn review-btn btn-sm px-4">
                                    View Records
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>


    @push('styles')
        <style>
            .review-page-bg {
                background: #f4f8fc;
            }

            .review-wrapper {
                background: #fff;
                border-radius: 28px;
                border: 1px solid #dce6f3;
                overflow: hidden;
                box-shadow: 0 10px 40px rgba(15, 23, 42, .06);
            }

            .review-header {
                padding: 50px;
                border-bottom: 1px solid #e8eef7;
            }

            .review-logo {
                width: 220px;
            }

            .review-title {
                font-size: 52px;
                line-height: 1.08;
                font-weight: 800;
                color: #0b2e74;
                margin-bottom: 18px;
            }

            .review-subtitle {
                font-size: 18px;
                line-height: 1.8;
                color: #475569;
                max-width: 680px;
            }

            .review-hero-image {
                border-radius: 24px;
                width: 100%;
                max-height: 360px;
                object-fit: cover;
            }

            .summary-card {
                padding: 40px 50px;
                border-bottom: 1px solid #e8eef7;
            }

            .summary-header {
                display: flex;
                align-items: center;
                gap: 14px;
                margin-bottom: 34px;
            }

            .summary-icon {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                background: #edf4ff;
                color: #0b2e74;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
            }

            .summary-header h3 {
                font-size: 32px;
                font-weight: 800;
                color: #0b2e74;
                margin: 0;
            }

            .summary-grid {
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                gap: 0;
                border: 1px solid #e2e8f0;
                border-radius: 22px;
                overflow: hidden;
            }

            .summary-item {
                padding: 30px 22px;
                text-align: center;
                background: #fff;
                position: relative;
            }

            .summary-item:not(:last-child) {
                border-right: 1px solid #e2e8f0;
            }

            .summary-item-icon {
                font-size: 34px;
                color: #0b2e74;
                margin-bottom: 14px;
            }

            .summary-label {
                font-size: 13px;
                text-transform: uppercase;
                font-weight: 700;
                color: #64748b;
                margin-bottom: 8px;
            }

            .summary-value {
                font-size: 17px;
                font-weight: 700;
                color: #0f172a;
                line-height: 1.5;
            }

            .feedback-section {
                padding: 60px 40px;
                text-align: center;
                border-bottom: 1px solid #e8eef7;
            }

            .feedback-title,
            .next-title {
                font-size: 44px;
                font-weight: 800;
                color: #0b2e74;
                margin-bottom: 12px;
            }

            .feedback-subtitle,
            .next-subtitle {
                color: #64748b;
                font-size: 18px;
                max-width: 820px;
                margin: 0 auto 40px;
                line-height: 1.8;
            }

            .review-card {
                max-width: 720px;
                margin: auto;
                border: 1px solid #dce6f3;
                border-radius: 28px;
                padding: 50px;
                background: #fbfdff;
            }

            .review-question {
                font-size: 28px;
                font-weight: 800;
                color: #0b2e74;
                margin-bottom: 34px;
            }

            .star-group {
                display: flex;
                flex-direction: row-reverse;
                justify-content: center;
                gap: 12px;
                margin-bottom: 18px;
            }

            .star-group input {
                display: none;
            }

            .star-group label {
                cursor: pointer;
                font-size: 56px;
                color: #d4dceb;
                transition: all .2s ease;
            }

            .star-group label:hover,
            .star-group label:hover~label,
            .star-group input:checked~label {
                color: #fbbf24;
                transform: translateY(-4px) scale(1.05);
            }

            .rating-text {
                font-size: 18px;
                font-weight: 700;
                color: #0b2e74;
                margin-bottom: 40px;
                min-height: 28px;
            }

            .review-label {
                display: block;
                text-align: left;
                margin-bottom: 12px;
                font-weight: 700;
                color: #0f172a;
            }

            .review-textarea {
                width: 100%;
                border-radius: 18px;
                border: 1px solid #dbe4f0;
                padding: 18px 20px;
                font-size: 16px;
                resize: none;
                transition: .2s;
            }

            .review-textarea:focus {
                outline: none;
                border-color: #0b2e74;
                box-shadow: 0 0 0 4px rgba(11, 46, 116, .08);
            }

            .review-btn {
                background: linear-gradient(135deg, #0b2e74, #123f9c);
                color: #fff !important;
                border: none;
                border-radius: 14px;
                padding: 16px 30px;
                font-weight: 700;
                transition: .2s;
                box-shadow: 0 10px 24px rgba(11, 46, 116, .18);
            }

            .review-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 14px 28px rgba(11, 46, 116, .24);
            }

            .next-section {
                padding: 60px 40px;
            }

            .next-card {
                border: 1px solid #e2e8f0;
                border-radius: 24px;
                padding: 40px 30px;
                text-align: center;
                height: 100%;
                transition: .2s;
                background: #fff;
            }

            .next-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 14px 30px rgba(15, 23, 42, .06);
            }

            .next-icon {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                background: #edf4ff;
                color: #0b2e74;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 24px;
                font-size: 34px;
            }

            .next-card h5 {
                font-size: 24px;
                font-weight: 800;
                color: #0b2e74;
                margin-bottom: 12px;
            }

            .next-card p {
                color: #64748b;
                line-height: 1.8;
                margin-bottom: 24px;
            }

            .submitted-box {
                max-width: 600px;
                margin: auto;
                border: 1px solid #dce6f3;
                border-radius: 24px;
                padding: 50px;
                background: #fff;
            }

            .submitted-icon {
                font-size: 64px;
                margin-bottom: 18px;
            }

            @media(max-width:991px) {

                .review-title {
                    font-size: 38px;
                }

                .feedback-title,
                .next-title {
                    font-size: 34px;
                }

                .summary-grid {
                    grid-template-columns: 1fr 1fr;
                }

                .summary-item {
                    border-right: none !important;
                    border-bottom: 1px solid #e2e8f0;
                }

                .review-header,
                .summary-card,
                .feedback-section,
                .next-section {
                    padding: 30px 22px;
                }

                .review-card {
                    padding: 30px 22px;
                }

                .star-group label {
                    font-size: 42px;
                }
            }

            @media(max-width:576px) {

                .summary-grid {
                    grid-template-columns: 1fr;
                }

                .review-title {
                    font-size: 32px;
                }

                .feedback-title,
                .next-title {
                    font-size: 28px;
                }

                .review-question {
                    font-size: 22px;
                }
            }
        </style>
    @endpush


    @push('scripts')
        <script>
            const labels = {
                1: 'Poor 😞',
                2: 'Fair 🙂',
                3: 'Good 😊',
                4: 'Very Good 😍',
                5: 'Excellent ⭐'
            };

            const ratingText = document.getElementById('ratingText');

            document.querySelectorAll('.star-group input').forEach(input => {

                input.addEventListener('change', () => {

                    ratingText.textContent =
                        labels[input.value] || '';
                });
            });

            const checked =
                document.querySelector('.star-group input:checked');

            if (checked) {

                ratingText.textContent =
                    labels[checked.value];
            }

            document.getElementById('reviewForm')
                ?.addEventListener('submit', function() {

                    const btn = document.getElementById('submitBtn');

                    btn.disabled = true;

                    btn.innerHTML = 'Submitting...';
                });
        </script>
    @endpush

@endsection
