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

                    <div class="row">
                        @foreach ($doctors as $doctor)
                            <div class="col-xxl-4 col-md-6">
                                <div class="card">
                                    <div class="card-img card-img-hover">
                                        <a href="{{ url('doctor-profile', $doctor['uid']) }}"><img
                                                src="{{ $doctor['profilePicture'] ?? URL::asset('build/img/doctor-grid/doctor-grid-01.jpg') }}"
                                                alt="" class="dr-card-img"></a>
                                        <div class="grid-overlay-item">
                                            <span class="badge bg-orange"><i
                                                    class="fa-solid fa-star me-1"></i>{{ $doctor['rating'] }}</span>
                                            <a href="javascript:void(0)" class="fav-icon">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex active-bar">
                                            <a href="#"
                                                class="text-indigo fw-medium fs-14">{{ $doctor['specializations'][0] }}</a>
                                            @if ($doctor['available'] == true)
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
                                            <div class="doctor-info-detail">
                                                <h3 class="mb-1 custom-title"><a
                                                        href="{{ url('doctor-profile', $doctor['uid']) }}">{{ $doctor['name'] }}</a>
                                                </h3>
                                                <div class="doctor-location">
                                                    <p class="location-title"></i><span class="fw-medium">Experience:
                                                            {{ $doctor['experience'] }}</span>
                                                    </p>

                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <p class="mb-1">Consultation Fees</p>
                                                    <div class="price">{{ $doctor['consultationFee'] }}</div>
                                                </div>
                                                <a href="{{ url('booking', $doctor['uid']) }}"
                                                    class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
                                                    <i class="isax isax-calendar-1 me-2"></i>
                                                    Book Now
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->
@endsection
