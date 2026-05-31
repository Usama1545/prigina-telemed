@extends('layouts.mainlayout')

@section('content')

{{-- ───────────────── HERO ───────────────── --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-4">

            <div class="col-lg-7">
                <h6 class="text-secondary fw-bold text-uppercase mb-2">Appointment Review</h6>
                @if($alreadyReviewed)
                    <h1 class="fw-bold mb-3 text-primary">Thank You for Your Feedback!</h1>
                    <p class="text-muted fs-5">Your review has already been submitted. We truly appreciate you taking the time to share your experience.</p>
                @else
                    <h1 class="fw-bold mb-3 text-primary">Thank You for Choosing<br>PriGina Global Telemed!</h1>
                    <p class="text-muted fs-5">Thank you for trusting PriGina Global Telemed for your healthcare consultation. We appreciate the opportunity to support your health and well-being.</p>
                @endif

                @if(session('success'))
                    <div class="alert alert-success mt-3" style="border-radius:10px;">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger mt-3" style="border-radius:10px;">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    </div>
                @endif
            </div>

            <div class="col-lg-5 text-center">
                <img src="{{ asset('build/img/about-us.jpeg') }}" class="img-fluid rounded shadow" style="max-height:300px; object-fit:cover; width:100%;">
            </div>

        </div>
    </div>
</section>


{{-- ───────────────── APPOINTMENT SUMMARY ───────────────── --}}
<section class="py-5">
    <div class="container">

        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Appointment Summary</h2>
        </div>

        <div class="row g-3 justify-content-center">

            <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 bg-light rounded text-center h-100 shadow-sm">
                    <div class="mb-2" style="font-size:28px; color:#0284c7;"><i class="fa-solid fa-user-doctor"></i></div>
                    <div class="text-muted small fw-bold text-uppercase mb-1">Doctor</div>
                    <div class="fw-semibold" style="font-size:14px;">Dr. {{ $appointment['doctorName'] ?? 'N/A' }}</div>
                </div>
            </div>

            @if(!empty($appointment['specialty']))
            <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 bg-light rounded text-center h-100 shadow-sm">
                    <div class="mb-2" style="font-size:28px; color:#0284c7;"><i class="fa-solid fa-stethoscope"></i></div>
                    <div class="text-muted small fw-bold text-uppercase mb-1">Specialty</div>
                    <div class="fw-semibold" style="font-size:14px;">{{ $appointment['specialty'] }}</div>
                </div>
            </div>
            @endif

            <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 bg-light rounded text-center h-100 shadow-sm">
                    <div class="mb-2" style="font-size:28px; color:#0284c7;"><i class="fa-regular fa-calendar-check"></i></div>
                    <div class="text-muted small fw-bold text-uppercase mb-1">Date</div>
                    <div class="fw-semibold" style="font-size:14px;">
                        @php
                            $d = $appointment['date'] ?? null;
                            echo $d ? \Carbon\Carbon::parse($d)->format('M j, Y') : 'N/A';
                        @endphp
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 bg-light rounded text-center h-100 shadow-sm">
                    <div class="mb-2" style="font-size:28px; color:#0284c7;"><i class="fa-regular fa-clock"></i></div>
                    <div class="text-muted small fw-bold text-uppercase mb-1">Time</div>
                    <div class="fw-semibold" style="font-size:14px;">{{ $appointment['patientLocalTime'] ?? (($appointment['startTime'] ?? '') . ' – ' . ($appointment['endTime'] ?? '')) }}</div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-2">
                <div class="p-3 bg-light rounded text-center h-100 shadow-sm">
                    <div class="mb-2" style="font-size:28px; color:#0284c7;"><i class="fa-solid fa-video"></i></div>
                    <div class="text-muted small fw-bold text-uppercase mb-1">Consultation</div>
                    <div class="fw-semibold" style="font-size:14px;">Video Consultation</div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ───────────────── FEEDBACK / FORM ───────────────── --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-primary">Your Feedback Matters</h2>
            <p class="text-muted">Your feedback helps us maintain the highest standards of care and<br class="d-none d-md-block"> continually improve your experience on our platform.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">

                @if($alreadyReviewed)
                    <div class="bg-white rounded shadow-sm p-5 text-center">
                        <div style="font-size:56px; margin-bottom:12px;">🎉</div>
                        <h4 class="fw-bold text-primary mb-2">Review Submitted</h4>
                        <p class="text-muted mb-4">You've already shared your feedback for this appointment. Thank you — it means a lot to us!</p>
                        <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">Back to Home</a>
                    </div>
                @else
                    <div class="bg-white rounded shadow-sm p-4 p-md-5">
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
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                                            {{ old('rating') == $i ? 'checked' : '' }}>
                                        <label for="star{{ $i }}" title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">&#9733;</label>
                                    @endfor
                                </div>
                                <div class="rating-label mt-2" id="ratingLabel">Select a rating</div>
                            </div>

                            {{-- Comment --}}
                            <div class="mb-4">
                                <label for="comment" class="form-label fw-semibold">Your Review <span class="text-muted fw-normal">(optional)</span></label>
                                <textarea class="form-control" id="comment" name="comment" rows="4"
                                    style="border-radius:10px; border-color:#e2e8f0;"
                                    placeholder="Tell us about your experience with the doctor...">{{ old('comment') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary-gradient w-100 py-3 fw-bold" id="submitBtn" style="font-size:16px; border-radius:10px;">
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
            <p class="text-muted">We're here to support you every step of the way. Explore the options below to<br class="d-none d-md-block"> continue your care journey with PriGina Global Telemed.</p>
        </div>

        <div class="row g-4 justify-content-center">

            <div class="col-md-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                    <div class="mb-3" style="font-size:36px; color:#0284c7;"><i class="fa-regular fa-calendar-plus"></i></div>
                    <h5 class="fw-bold mb-2">Book Follow-Up Appointment</h5>
                    <p class="text-muted small mb-4">Continue your care with your doctor.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">Book Now</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                    <div class="mb-3" style="font-size:36px; color:#0284c7;"><i class="fa-solid fa-user-doctor"></i></div>
                    <h5 class="fw-bold mb-2">Consult Another Specialist</h5>
                    <p class="text-muted small mb-4">Get expert advice from other specialists.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">Find a Doctor</a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                    <div class="mb-3" style="font-size:36px; color:#0284c7;"><i class="fa-regular fa-folder-open"></i></div>
                    <h5 class="fw-bold mb-2">View Your Medical Records</h5>
                    <p class="text-muted small mb-4">Access your consultation summary and records.</p>
                    <a href="{{ route('patient.appointments') }}" class="btn btn-primary-gradient px-4">View Records</a>
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
                    <p class="mb-0 text-white">PriGina Global Telemed is committed to providing safe, confidential, and quality healthcare across the globe.</p>
                </div>
                <div class="support-info wow fadeInUp" data-wow-duration="1s">
                    <a href="{{ url('/') }}" class="btn btn-light px-4 mt-3 mt-md-0">Back to Home →</a>
                </div>
            </div>
            <img src="{{ URL::asset('build/img/bg/info-bg.png') }}" alt="" class="img-fluid element-01">
        </div>
    </div>
</section>


@push('styles')
<style>
    .star-group {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
        gap: 4px;
    }
    .star-group input[type="radio"] { display: none; }
    .star-group label {
        font-size: 42px;
        cursor: pointer;
        color: #cbd5e1;
        line-height: 1;
        transition: color .15s, transform .1s;
    }
    .star-group label:hover,
    .star-group label:hover ~ label,
    .star-group input[type="radio"]:checked ~ label { color: #f59e0b; }
    .star-group label:hover { transform: scale(1.15); }
    .rating-label { font-size: 13px; color: #64748b; min-height: 20px; }
</style>
@endpush

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

    document.getElementById('reviewForm')?.addEventListener('submit', function () {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.textContent = 'Submitting…';
    });
</script>
@endpush

@endsection
