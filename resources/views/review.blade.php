@extends('layouts.mainlayout')

@section('content')

    {{-- ───────────────── HERO ───────────────── --}}
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">

                <div class="col-lg-6">
                    <h6 class="text-secondary fw-bold text-uppercase mb-2">{{ __('app.review.eyebrow') }}</h6>
                    @if ($alreadyReviewed)
                        <h1 class="fw-bold mb-3 text-primary">{{ __('app.review.thanks_feedback') }}</h1>
                        <p class="text-muted">{{ __('app.review.already_submitted_desc') }}</p>
                    @else
                        <h1 class="fw-bold mb-3 text-primary">{!! __('app.review.thanks_choosing') !!}</h1>
                        <p class="text-muted ">{{ __('app.review.thanks_trusting') }}</p>
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
                {{ __('app.review.appointment_summary') }}
            </h6>

            <h2 class="fw-bold mb-5 text-white">
                {{ __('app.review.consultation_details') }}
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

                        <h5 class="text-white">{{ __('app.appointments.doctor') }}</h5>

                        <p class="mx-2 text-white mb-0">
                            {{ __('app.review.dr_name', ['name' => $appointment['doctorName'] ?? __('app.review.na')]) }}
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

                            <h5 class="text-white">{{ __('app.reports.specialty') }}</h5>

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

                        <h5 class="text-white">{{ __('app.common.date') }}</h5>

                        <p class="mx-2 text-white mb-0">

                            @php
                                $d = $appointment['date'] ?? null;
                                echo e($d ? \Carbon\Carbon::parse($d)->translatedFormat('M j, Y') : __('app.review.na'));
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

                        <h5 class="text-white">{{ __('app.common.time') }}</h5>

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

                        <h5 class="text-white">{{ __('app.review.consultation') }}</h5>

                        <p class="mx-2 text-white mb-0">
                            {{ __('app.review.video_consultation') }}
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
                <h2 class="fw-bold text-primary">{{ __('app.review.feedback_matters') }}</h2>
                <p class="text-muted">{{ __('app.review.feedback_matters_desc') }}</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">

                    @if ($alreadyReviewed)
                        <div class="bg-white rounded shadow-sm p-5 text-center">
                            <div style="font-size:56px; margin-bottom:12px;">🎉</div>
                            <h4 class="fw-bold text-primary mb-2">{{ __('app.review.review_submitted') }}</h4>
                            <p class="text-muted mb-4">{{ __('app.review.review_submitted_desc') }}</p>
                            <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">{{ __('app.review.back_home') }}</a>
                        </div>
                    @else
                        <div class="">
                            <h5 class="fw-bold text-center mb-4">{{ __('app.review.rate_question') }}</h5>

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
                                        {{ __('app.review.select_rating') }}
                                    </div>
                                </div>
                                {{-- Comment --}}
                                <div class="mb-4">
                                    <label for="comment" class="form-label fw-semibold">{{ __('app.review.your_review') }} <span
                                            class="text-muted fw-normal">({{ __('app.review.optional') }})</span></label>
                                    <textarea class="form-control" id="comment" name="comment" rows="4"
                                        style="border-radius:10px; border-color:#e2e8f0;" placeholder="{{ __('app.review.comment_placeholder') }}">{{ old('comment') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary-gradient w-100 py-3 fw-bold" id="submitBtn"
                                    style="font-size:16px; border-radius:10px;">
                                    {{ __('app.review.leave_review') }}
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
                <h2 class="fw-bold text-primary">{{ __('app.review.whats_next') }}</h2>
                <p class="text-muted">{{ __('app.review.whats_next_desc') }}</p>
            </div>

            <div class="row g-4 justify-content-center">

                <div class="col-md-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                        <div class="mb-3" style="font-size:36px; color:#0284c7;"><i
                                class="fa-regular fa-calendar-plus"></i></div>
                        <h5 class="fw-bold mb-2">{{ __('app.review.follow_up_title') }}</h5>
                        <p class="text-muted small mb-4">{{ __('app.review.follow_up_desc') }}</p>
                        <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">{{ __('app.doctors.book_now') }}</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                        <div class="mb-3" style="font-size:36px; color:#0284c7;"><i
                                class="fa-solid fa-user-doctor"></i></div>
                        <h5 class="fw-bold mb-2">{{ __('app.review.another_specialist_title') }}</h5>
                        <p class="text-muted small mb-4">{{ __('app.review.another_specialist_desc') }}</p>
                        <a href="{{ url('/') }}" class="btn btn-primary-gradient px-4">{{ __('app.review.find_doctor') }}</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="p-4 bg-light rounded shadow-sm h-100 text-center">
                        <div class="mb-3" style="font-size:36px; color:#0284c7;"><i
                                class="fa-regular fa-folder-open"></i></div>
                        <h5 class="fw-bold mb-2">{{ __('app.review.records_title') }}</h5>
                        <p class="text-muted small mb-4">{{ __('app.review.records_desc') }}</p>
                        <a href="{{ route('patient.appointments') }}" class="btn btn-primary-gradient px-4">{{ __('app.review.view_records') }}</a>
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
                        <h3 class="info-title">{{ __('app.review.cta_title') }}</h3>
                        <p class="mb-0 text-white">{{ __('app.review.cta_desc') }}</p>
                    </div>
                    <div class="support-info wow fadeInUp" data-wow-duration="1s">
                        <a href="{{ url('/') }}" class="btn btn-light px-4 mt-3 mt-md-0">{{ __('app.review.back_home') }} →</a>
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
            const labels = @js(['', __('app.review.rating_poor'), __('app.review.rating_fair'), __('app.review.rating_good'), __('app.review.rating_very_good'), __('app.review.rating_excellent')]);
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
                btn.textContent = @json(__('app.review.submitting'));
            });
        </script>
    @endpush

@endsection
