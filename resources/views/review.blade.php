<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Review — Prigina Telemed</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/img/prigina-gav.png') }}">
    <link rel="stylesheet" href="{{ asset('build/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/plugins/fontawesome/css/all.min.css') }}">
    <style>
        :root { --primary: #0ea5e9; --primary-dark: #0284c7; }
        body { background: #f1f5f9; min-height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; font-family: 'Segoe UI', system-ui, sans-serif; color: #334155; }
        .review-card { background: #fff; border-radius: 16px; box-shadow: 0 4px 32px rgba(15,23,42,.1); max-width: 520px; width: 100%; margin: 32px 16px; overflow: hidden; }
        .card-header-band { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); padding: 32px 36px 28px; text-align: center; }
        .card-header-band .logo { font-size: 22px; font-weight: 800; color: #fff; letter-spacing: -0.5px; margin-bottom: 6px; }
        .card-header-band h2 { color: #fff; font-size: 20px; font-weight: 700; margin: 0; }
        .card-header-band p { color: rgba(255,255,255,.8); margin: 6px 0 0; font-size: 14px; }
        .card-body-inner { padding: 32px 36px; }
        .appt-info { background: #f8fafc; border-radius: 10px; border-left: 4px solid var(--primary); padding: 16px 20px; margin-bottom: 24px; font-size: 14px; }
        .appt-info .row-item { display: flex; gap: 10px; margin-bottom: 6px; }
        .appt-info .row-item:last-child { margin-bottom: 0; }
        .appt-info .lbl { color: #64748b; min-width: 90px; }
        .appt-info .val { font-weight: 600; color: #0f172a; }

        /* Star rating */
        .star-group { display: flex; gap: 6px; justify-content: center; margin: 4px 0 20px; }
        .star-group input[type="radio"] { display: none; }
        .star-group label { font-size: 38px; cursor: pointer; color: #cbd5e1; line-height: 1; transition: color .15s, transform .1s; }
        .star-group label:hover,
        .star-group label:hover ~ label,
        .star-group input[type="radio"]:checked ~ label { color: #f59e0b; }
        .star-group label:hover { transform: scale(1.15); }

        /* Reverse stars trick */
        .star-group { flex-direction: row-reverse; }
        .star-group label:hover,
        .star-group label:hover ~ label { color: #f59e0b; }
        .star-group input[type="radio"]:checked ~ label { color: #f59e0b; }

        textarea.form-control { border-color: #e2e8f0; border-radius: 10px; resize: vertical; }
        textarea.form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(14,165,233,.15); outline: none; }
        .btn-submit { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border: none; border-radius: 10px; color: #fff; font-weight: 700; font-size: 16px; padding: 13px; width: 100%; transition: opacity .2s; }
        .btn-submit:hover { opacity: .9; color: #fff; }
        .thank-you-icon { font-size: 64px; text-align: center; margin: 8px 0 16px; }
        .rating-label { text-align: center; font-size: 13px; color: #64748b; margin-bottom: 4px; min-height: 20px; }
        .form-label { font-weight: 600; color: #374151; font-size: 14px; }
    </style>
</head>
<body>

<div class="review-card">
    <div class="card-header-band">
        <div class="logo">Prigina</div>
        @if($alreadyReviewed)
            <h2>Review Already Submitted</h2>
        @else
            <h2>Share Your Experience</h2>
            <p>Your feedback helps other patients</p>
        @endif
    </div>

    <div class="card-body-inner">

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius:10px;">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius:10px;">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Appointment summary --}}
        <div class="appt-info">
            <div class="row-item">
                <span class="lbl">Doctor</span>
                <span class="val">Dr. {{ $appointment['doctorName'] ?? 'N/A' }}</span>
            </div>
            @if(!empty($appointment['specialty']))
            <div class="row-item">
                <span class="lbl">Specialty</span>
                <span class="val">{{ $appointment['specialty'] }}</span>
            </div>
            @endif
            <div class="row-item">
                <span class="lbl">Date</span>
                <span class="val">
                    @php
                        $d = $appointment['date'] ?? null;
                        echo $d ? \Carbon\Carbon::parse($d)->format('M j, Y') : 'N/A';
                    @endphp
                </span>
            </div>
            <div class="row-item">
                <span class="lbl">Patient</span>
                <span class="val">{{ $appointment['patientName'] ?? 'N/A' }}</span>
            </div>
        </div>

        @if($alreadyReviewed)
            <div class="thank-you-icon">🎉</div>
            <p class="text-center text-muted">You've already submitted a review for this appointment. Thank you for your feedback!</p>
            <div class="text-center mt-3">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary" style="border-radius:8px;">Back to Home</a>
            </div>
        @else
            <form method="POST" action="{{ url('/' . $appointment['id'] . '/review') }}" id="reviewForm">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger" style="border-radius:10px; font-size:13px;">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <div class="mb-4">
                    <label class="form-label d-block text-center mb-1">Your Rating</label>
                    <div class="star-group" id="starGroup">
                        @for($i = 5; $i >= 1; $i--)
                            <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                                {{ old('rating') == $i ? 'checked' : '' }}>
                            <label for="star{{ $i }}" title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">&#9733;</label>
                        @endfor
                    </div>
                    <div class="rating-label" id="ratingLabel">Select a rating</div>
                </div>

                <div class="mb-4">
                    <label for="comment" class="form-label">Your Review <span class="text-muted fw-normal">(optional)</span></label>
                    <textarea class="form-control" id="comment" name="comment" rows="4"
                        placeholder="Tell us about your experience with the doctor...">{{ old('comment') }}</textarea>
                </div>

                <button type="submit" class="btn-submit" id="submitBtn">
                    Submit Review
                </button>
            </form>
        @endif
    </div>
</div>

<script src="{{ asset('build/admin/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('build/admin/js/bootstrap.bundle.min.js') }}"></script>
<script>
    const labels = ['', 'Poor', 'Fair', 'Good', 'Very Good', 'Excellent'];
    const ratingLabel = document.getElementById('ratingLabel');

    document.querySelectorAll('.star-group input[type="radio"]').forEach(input => {
        input.addEventListener('change', () => {
            ratingLabel.textContent = labels[input.value] || '';
        });
    });

    // Set label on page load if already selected (validation failure)
    const checked = document.querySelector('.star-group input[type="radio"]:checked');
    if (checked) ratingLabel.textContent = labels[checked.value] || '';

    // Prevent double-submit
    document.getElementById('reviewForm')?.addEventListener('submit', function () {
        const btn = document.getElementById('submitBtn');
        btn.disabled = true;
        btn.textContent = 'Submitting…';
    });
</script>
</body>
</html>
