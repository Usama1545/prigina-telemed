<?php $page = 'doctor-grid'; ?>
@extends('layouts.mainlayout')
@section('content')
    {{-- @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Doctor Grid', 'li_2' => 'Doctor Grid'])
    @endcomponent --}}

    <!-- Page Content -->
    <div class="content mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <form method="GET" action="{{ url()->current() }}">

                        @php
                            $selectedCategories = request()->category ?? [];
                            if (!is_array($selectedCategories)) {
                                $selectedCategories = [$selectedCategories];
                            }

                            $selectedDays = request()->availability ?? [];
                            if (!is_array($selectedDays)) {
                                $selectedDays = [$selectedDays];
                            }

                            $selectedExp = request()->experience ?? [];
                            if (!is_array($selectedExp)) {
                                $selectedExp = [$selectedExp];
                            }
                        @endphp

                        <div class="card filter-lists">

                            <!-- Header -->
                            <div class="card-header">
                                <div class="d-flex align-items-center filter-head justify-content-between">
                                    <h4>Filter</h4>
                                    <a href="{{ url()->current() }}" class="text-secondary text-decoration-underline">
                                        Clear All
                                    </a>
                                </div>

                                <div class="filter-input">
                                    <div class="position-relative input-icon">
                                        <input type="text" name="search" value="{{ request('search') }}"
                                            class="form-control" placeholder="Search">
                                        <span><i class="isax isax-search-normal-1"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">

                                <!-- ================= SPECIALITIES ================= -->
                                <div class="accordion-item border-bottom">
                                    <div class="accordion-header">
                                        <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                            <div class="d-flex align-items-center w-100">
                                                <h5>Specialities</h5>
                                                <div class="ms-auto">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapse1" class="accordion-collapse show">
                                        <div class="accordion-body pt-3">

                                            @foreach ($categories as $category)
                                                <div class="d-flex align-items-center justify-content-between mb-2">

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="category[]"
                                                            value="{{ $category['name'] }}" id="cat-{{ $category['name'] }}"
                                                            onchange="this.form.submit()"
                                                            {{ in_array($category['name'], $selectedCategories) ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="cat-{{ $category['name'] }}">
                                                            {{ $category['name'] }}
                                                        </label>
                                                    </div>

                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                                <!-- ================= AVAILABILITY ================= -->
                                <div class="accordion-item border-bottom">
                                    <div class="accordion-header">
                                        <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                            <div class="d-flex align-items-center w-100">
                                                <h5>Availability</h5>
                                                <div class="ms-auto">
                                                    <i class="fas fa-chevron-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="collapse3" class="accordion-collapse show">
                                        <div class="accordion-body pt-3">

                                            @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name="availability[]"
                                                        value="{{ $day }}" onchange="this.form.submit()"
                                                        {{ in_array($day, $selectedDays) ? 'checked' : '' }}>

                                                    <label class="form-check-label">
                                                        {{ ucfirst($day) }}
                                                    </label>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-9">

                    <div class="row" id="doctor-list">
                        @foreach ($doctors as $doctor)
                            <div class="col-xxl-4 col-md-6">
                                <div class="card">
                                    <div class="card-img card-img-hover">
                                        <a href="{{ route('doctor-details', $doctor['uid']) }}"><img
                                                src="{{ $doctor['profilePicture'] ?? URL::asset('build/img/doctor-grid/doctor-grid-01.jpg') }}"
                                                alt="" class="dr-card-img"></a>
                                        <div class="grid-overlay-item">
                                            <span class="badge bg-orange"><i
                                                    class="fa-solid fa-star me-1"></i>{{ $doctor['rating'] }}</span>

                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex active-bar">
                                            <a href="#"
                                                class="text-indigo fw-medium fs-14">{{ $doctor['specializations'][0] }}</a>
                                            @if(($doctor['available'] ?? false) === true)
                                                <span class="badge bg-success-light d-inline-flex align-items-center">
                                                    <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                    Available
                                                </span>
                                            @else
                                                <span class="badge bg-danger-light d-inline-flex align-items-center">
                                                    <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                    Not Available
                                                </span>
                                            @endif
                                        </div>
                                        <div class="p-3 pt-0">
                                            <div class="doctor-info">
                                                <div class="doctor-info-detail">
                                                    <h3 class="mb-1 custom-title"><a
                                                            href="{{ route('doctor-details', $doctor['id']) }}">{{ $doctor['name'] }}</a>
                                                    </h3>
                                                    <div class="doctor-location">
                                                        <p class="location-title"></i><span class="fw-medium">Experience:
                                                                {{ $doctor['experience'] }}</span>
                                                        </p>
                                                    </div>
                                                    @if(isset($doctor['practiceCountry']))
                                                            <div class="d-flex align-items-center gap-2">
                                                                <img
                                                                    src="https://flagcdn.com/24x18/{{ strtolower($doctor['practiceCountry']) }}.png"
                                                                    alt="{{ $doctor['practiceCountry'] }}"
                                                                    width="24"
                                                                    class="rounded-sm"
                                                                />

                                                                <span class="fw-medium">
                                                                    {{ Symfony\Component\Intl\Countries::getName($doctor['practiceCountry']) }}
                                                                </span>
                                                            </div>
                                                        @endif
                                                    
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                @if(session('firebase_token'))
                                                <div>
                                                    <p class="mb-1">Consultation Fees</p>
                                                    <div class="price">{{ $doctor['consultationFee'] }}</div>
                                                </div>
                                                @endif
                                                <a href="{{ url('doctor-details', $doctor['uid']) }}"
                                                    class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
                                                    <i class="isax isax-calendar-1 me-2"></i>
                                                    Book
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        @if ($nextCursor && $hasMore)
                            <a id="load-more-btn" class="btn d-flex align-items-center gap-2"
                                data-cursor='@json($nextCursor)'>

                                <span class="btn-text">Load More</span>

                                <span class="spinner-border spinner-border-sm d-none" id="btn-loader"
                                    role="status"></span>
                            </a>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div>
    <style>
        .card-img-hover {
            position: relative;
            overflow: hidden;
            border-radius: 12px 12px 0 0;
        }

        .dr-card-img {
            width: 100%;
            aspect-ratio: 612 / 391;
            object-fit: cover;
            display: block;
        }
    </style>
    <!-- /Page Content -->
    <script>
        document.getElementById('load-more-btn')?.addEventListener('click', function() {

            let button = this;
            let loader = button.querySelector('#btn-loader');
            let text = button.querySelector('.btn-text');

            // 🔒 disable button + show loader
            button.disabled = true;
            loader.classList.remove('d-none');
            text.innerText = 'Loading...';

            let cursor = JSON.parse(button.getAttribute('data-cursor'));

            let url = new URL(window.location.href);
            url.searchParams.set('cursor', JSON.stringify(cursor));

            fetch(url)
                .then(res => res.text())
                .then(html => {
                    let parser = new DOMParser();
                    let doc = parser.parseFromString(html, 'text/html');

                    let newDoctors = doc.querySelectorAll('#doctor-list .col-xxl-4');
                    let container = document.querySelector('#doctor-list');

                    newDoctors.forEach(el => container.appendChild(el));

                    let newCursorBtn = doc.querySelector('#load-more-btn');

                    if (newCursorBtn) {
                        button.setAttribute('data-cursor', newCursorBtn.getAttribute('data-cursor'));

                        // ✅ reset button
                        button.disabled = false;
                        loader.classList.add('d-none');
                        text.innerText = 'Load More';

                    } else {
                        // ❌ no more data
                        button.remove();
                    }
                })
                .catch(err => {
                    console.error(err);

                    // ❗ reset on error
                    button.disabled = false;
                    loader.classList.add('d-none');
                    text.innerText = 'Load More';
                });
        });
    </script>
@endsection
