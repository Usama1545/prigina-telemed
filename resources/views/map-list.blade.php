<?php $page = 'map-list'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Doctors List', 'li_2' => 'Doctors List'])
    @endcomponent

    <!-- Page Content -->
    <div class="content mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-4">
                        <h3 class="main-title">Showing <span class="text-secondary">450</span> Doctors For You</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-end mb-4">
                        <div class="dropdown header-dropdown me-2">
                            <a class="dropdown-toggle sort-dropdown" data-bs-toggle="dropdown" href="javascript:void(0);"
                                aria-expanded="false">
                                <span>Sort By</span>Price (Low to High)
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    Price (Low to High)
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    Price (High to Low)
                                </a>
                            </div>
                        </div>
                        <a href="{{url('doctor-grid')}}" class="btn btn-sm head-icon me-2"><i
                                class="isax isax-grid-7"></i></a>
                        <a href="{{url('search-2')}}" class="btn btn-sm head-icon me-2"><i
                                class="isax isax-row-vertical"></i></a>
                        <a href="{{url('map-list')}}" class="btn btn-sm head-icon active"><i
                                class="isax isax-location"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-sm-4 col-6">
                                    <div class="mb-4">
                                        <select class="select form-control">
                                            <option>Specialities</option>
                                            <option>Urology</option>
                                            <option>Psychiatry</option>
                                            <option>Psychiatry</option>
                                            <option>Cardiology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="mb-4">
                                        <select class="select form-control">
                                            <option>Reviews</option>
                                            <option>5 Star</option>
                                            <option>4 Star</option>
                                            <option>3 Star</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-6">
                                    <div class="mb-4">
                                        <select class="select form-control">
                                            <option>Clinic</option>
                                            <option>Bright Smiles Dental Clinic</option>
                                            <option>Family Care Clinic</option>
                                            <option>Express Health Clinic</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="text-end mb-3">
                                <a href="#" class="fw-medium text-secondary text-decoration-underline">Clear All</a>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex align-items-center justify-content-between border-bottom pb-3 mb-3">
                        <div class="doctor-filter-availability">
                            <p>Availability</p>
                            <div class="status-toggle status-tog">
                                <input type="checkbox" id="status_6" class="check">
                                <label for="status_6" class="checktoggle">checkbox</label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{url('map-grid')}}" class="btn btn-sm head-icon me-2"><i
                                    class="isax isax-grid-7"></i></a>
                            <a href="{{url('map-list')}}" class="btn btn-sm head-icon active"><i
                                    class="isax isax-row-vertical"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card doctor-list-card">
                                <div class="d-md-flex">
                                    <div class="card-img card-img-hover">
                                        <a href="{{url('doctor-profile')}}"><img
                                                src="{{URL::asset('build/img/doctor-grid/doctor-list-01.jpg')}}" alt=""></a>
                                        <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                            <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.8</span>
                                            <a href="javascript:void(0)" class="fav-icon">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                            <a href="#" class="text-teal fw-medium fs-14">Neurologist</a>
                                            <span class="badge bg-success-light d-inline-flex align-items-center">
                                                <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                Available
                                            </span>
                                        </div>
                                        <div class="p-3">
                                            <div class="doctor-info-detail pb-3">
                                                <div class="row align-items-center gy-3">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <h6 class="d-flex align-items-center mb-1">
                                                                <a href="{{url('doctor-profile')}}">Dr. Charles Scott</a>
                                                                <i class="isax isax-tick-circle5 text-success ms-2"></i>
                                                            </h6>
                                                            <p class="mb-2">MBBS, DNB - Neurology</p>
                                                            <p class="d-flex align-items-center mb-0 fs-14"><i
                                                                    class="isax isax-location me-2"></i>Hamshire, TX
                                                                <a href="#"
                                                                    class="text-primary text-decoration-underline ms-2">Get
                                                                    Direction</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i
                                                                    class="isax isax-language-circle text-dark me-2"></i>English,
                                                                French
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i class="isax isax-like-1 text-dark me-2"></i>98% (252 /
                                                                287 Votes)
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14">
                                                                <i class="isax isax-archive-14 text-dark me-2"></i>20 Years
                                                                of Experience
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mt-3">
                                                <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                    <div class="me-3">
                                                        <p class="mb-1">Consultation Fees</p>
                                                        <h3 class="text-orange">$600</h3>
                                                    </div>
                                                    <p class="mb-0">Next available at <br>10:00 AM - 15 Oct, Tue</p>
                                                </div>
                                                <a href="{{url('booking')}}"
                                                    class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill">
                                                    <i class="isax isax-calendar-1 me-2"></i>
                                                    Book Appointment
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card doctor-list-card">
                                <div class="d-md-flex">
                                    <div class="card-img card-img-hover">
                                        <a href="{{url('doctor-profile')}}"><img
                                                src="{{URL::asset('build/img/doctor-grid/doctor-list-02.jpg')}}" alt=""></a>
                                        <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                            <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.3</span>
                                            <a href="javascript:void(0)" class="fav-icon">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                            <a href="#" class="text-info fw-medium fs-14">Cardiologist</a>
                                            <span class="badge bg-danger-light d-inline-flex align-items-center">
                                                <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                Unavailable
                                            </span>
                                        </div>
                                        <div class="p-3">
                                            <div class="doctor-info-detail pb-3">
                                                <div class="row align-items-center gy-3">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <h6 class="d-flex align-items-center mb-1">
                                                                <a href="{{url('doctor-profile')}}">Dr. Robert Thomas</a>
                                                                <i class="isax isax-tick-circle5 text-success ms-2"></i>
                                                            </h6>
                                                            <p class="mb-2">MBBS, MD - Cardialogy</p>
                                                            <p class="d-flex align-items-center mb-0 fs-14"><i
                                                                    class="isax isax-location me-2"></i>Oakland, CA
                                                                <a href="#"
                                                                    class="text-primary text-decoration-underline ms-2">Get
                                                                    Direction</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i
                                                                    class="isax isax-language-circle text-dark me-2"></i>English,
                                                                Spanish
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i class="isax isax-like-1 text-dark me-2"></i>92% (270 /
                                                                300 Votes)
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14">
                                                                <i class="isax isax-archive-14 text-dark me-2"></i>30 Years
                                                                of Experience
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mt-3">
                                                <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                    <div class="me-3">
                                                        <p class="mb-1">Consultation Fees</p>
                                                        <h3 class="text-orange">$450</h3>
                                                    </div>
                                                    <p class="mb-0">Next available at <br>11.00 AM - 19 Oct, Sat</p>
                                                </div>
                                                <a href="{{url('booking')}}"
                                                    class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill">
                                                    <i class="isax isax-calendar-1 me-2"></i>
                                                    Book Appointment
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card doctor-list-card">
                                <div class="d-md-flex">
                                    <div class="card-img card-img-hover">
                                        <a href="{{url('doctor-profile')}}"><img
                                                src="{{URL::asset('build/img/doctor-grid/doctor-list-03.jpg')}}" alt=""></a>
                                        <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                            <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.7</span>
                                            <a href="javascript:void(0)" class="fav-icon">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                            <a href="#" class="text-indigo fw-medium fs-14">Psychologist</a>
                                            <span class="badge bg-success-light d-inline-flex align-items-center">
                                                <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                Available
                                            </span>
                                        </div>
                                        <div class="p-3">
                                            <div class="doctor-info-detail pb-3">
                                                <div class="row align-items-center gy-3">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <h6 class="d-flex align-items-center mb-1">
                                                                <a href="{{url('doctor-profile')}}">Dr. Margaret Koller</a>
                                                                <i class="isax isax-tick-circle5 text-success ms-2"></i>
                                                            </h6>
                                                            <p class="mb-2"> B.S, M.S - Psychology</p>
                                                            <p class="d-flex align-items-center mb-0 fs-14"><i
                                                                    class="isax isax-location me-2"></i>Killeen, TX
                                                                <a href="#"
                                                                    class="text-primary text-decoration-underline ms-2">Get
                                                                    Direction</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i
                                                                    class="isax isax-language-circle text-dark me-2"></i>English,
                                                                Portuguese
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i class="isax isax-like-1 text-dark me-2"></i>94% (268 /
                                                                312 Votes)
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14">
                                                                <i class="isax isax-archive-14 text-dark me-2"></i>15 Years
                                                                of Experience
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mt-3">
                                                <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                    <div class="me-3">
                                                        <p class="mb-1">Consultation Fees</p>
                                                        <h3 class="text-orange">$700</h3>
                                                    </div>
                                                    <p class="mb-0">Next available at <br>10.30 AM - 29 Oct, Tue</p>
                                                </div>
                                                <a href="{{url('booking')}}"
                                                    class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill">
                                                    <i class="isax isax-calendar-1 me-2"></i>
                                                    Book Appointment
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card doctor-list-card">
                                <div class="d-md-flex">
                                    <div class="card-img card-img-hover">
                                        <a href="{{url('doctor-profile')}}"><img
                                                src="{{URL::asset('build/img/doctor-grid/doctor-list-04.jpg')}}" alt=""></a>
                                        <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                            <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.5</span>
                                            <a href="javascript:void(0)" class="fav-icon">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                            <a href="#" class="text-pink fw-medium fs-14">Pediatrician</a>
                                            <span class="badge bg-danger-light d-inline-flex align-items-center">
                                                <i class="fa-solid fa-circle fs-5 me-1"></i>
                                                Unavailable
                                            </span>
                                        </div>
                                        <div class="p-3">
                                            <div class="doctor-info-detail pb-3">
                                                <div class="row align-items-center gy-3">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <h6 class="d-flex align-items-center mb-1">
                                                                <a href="{{url('doctor-profile')}}">Dr. Cath Busick</a>
                                                                <i class="isax isax-tick-circle5 text-success ms-2"></i>
                                                            </h6>
                                                            <p class="mb-2">MBBS, MD - Pediatrics</p>
                                                            <p class="d-flex align-items-center mb-0 fs-14"><i
                                                                    class="isax isax-location me-2"></i>Schenectady, NY
                                                                <a href="#"
                                                                    class="text-primary text-decoration-underline ms-2">Get
                                                                    Direction</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i
                                                                    class="isax isax-language-circle text-dark me-2"></i>English,
                                                                Arabic
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i class="isax isax-like-1 text-dark me-2"></i>87% (237 /
                                                                250 Votes)
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14">
                                                                <i class="isax isax-archive-14 text-dark me-2"></i>12 Years
                                                                of Experience
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mt-3">
                                                <div class="d-flex align-items-center flex-wrap row-gap-3">
                                                    <div class="me-3">
                                                        <p class="mb-1">Consultation Fees</p>
                                                        <h3 class="text-orange">$750</h3>
                                                    </div>
                                                    <p class="mb-0">Next available at <br>02:00 PM - 04 Nov, Mon</p>
                                                </div>
                                                <a href="{{url('booking')}}"
                                                    class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill">
                                                    <i class="isax isax-calendar-1 me-2"></i>
                                                    Book Appointment
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pagination dashboard-pagination mt-md-3 mt-0 mb-4">
                                <ul>
                                    <li>
                                        <a href="#" class="page-link prev">Prev</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">1</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link active">2</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">3</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link">4</a>
                                    </li>
                                    <li>
                                        <a href="#" class="page-link next">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div id="map" class="map-listing h-100"></div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Content -->
@endsection