<?php $page = 'map-grid'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Doctor List', 'li_2' => 'Doctor List'])
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
                            <a href="{{url('map-grid')}}" class="btn btn-sm head-icon active me-2"><i
                                    class="isax isax-grid-7"></i></a>
                            <a href="{{url('map-list')}}" class="btn btn-sm head-icon"><i
                                    class="isax isax-row-vertical"></i></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card">
                                <div class="card-img card-img-hover">
                                    <a href="{{url('doctor-profile')}}"><img
                                            src="{{URL::asset('build/img/doctor-grid/doctor-grid-01.jpg')}}" alt=""></a>
                                    <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                        <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>5.0</span>
                                        <a href="javascript:void(0)" class="fav-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="d-flex active-bar align-items-center justify-content-between p-3">
                                        <a href="#" class="text-indigo fw-medium fs-14">Psychologist</a>
                                        <span class="badge bg-success-light d-inline-flex align-items-center">
                                            <i class="fa-solid fa-circle fs-5 me-1"></i>
                                            Available
                                        </span>
                                    </div>
                                    <div class="p-3 pt-0">
                                        <div class="doctor-info-detail mb-3 pb-3">
                                            <h3 class="mb-1"><a href="{{url('doctor-profile')}}">Dr. Michael Brown</a></h3>
                                            <div class="d-flex align-items-center">
                                                <p class="d-flex align-items-center mb-0 fs-14"><i
                                                        class="isax isax-location me-2"></i>Minneapolis, MN</p>
                                                <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                <span class="fs-14 fw-medium">30 Min</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-1">Consultation Fees</p>
                                                <h3 class="text-orange">$650</h3>
                                            </div>
                                            <a href="{{url('booking')}}"
                                                class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-calendar-1 me-2"></i>
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card">
                                <div class="card-img card-img-hover">
                                    <a href="{{url('doctor-profile')}}"><img
                                            src="{{URL::asset('build/img/doctor-grid/doctor-grid-02.jpg')}}" alt=""></a>
                                    <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                        <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.6</span>
                                        <a href="javascript:void(0)" class="fav-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div
                                        class="d-flex active-bar active-bar-pink align-items-center justify-content-between p-3">
                                        <a href="#" class="text-pink fw-medium fs-14">Pediatrician</a>
                                        <span class="badge bg-success-light d-inline-flex align-items-center">
                                            <i class="fa-solid fa-circle fs-5 me-1"></i>
                                            Available
                                        </span>
                                    </div>
                                    <div class="p-3 pt-0">
                                        <div class="doctor-info-detail mb-3 pb-3">
                                            <h3 class="mb-1"><a href="{{url('doctor-profile')}}">Dr. Nicholas Tello</a></h3>
                                            <div class="d-flex align-items-center">
                                                <p class="d-flex align-items-center mb-0 fs-14"><i
                                                        class="isax isax-location me-2"></i>Ogden, IA</p>
                                                <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                <span class="fs-14 fw-medium">60 Min</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-1">Consultation Fees</p>
                                                <h3 class="text-orange">$400</h3>
                                            </div>
                                            <a href="{{url('booking')}}"
                                                class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-calendar-1 me-2"></i>
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card">
                                <div class="card-img card-img-hover">
                                    <a href="{{url('doctor-profile')}}"><img
                                            src="{{URL::asset('build/img/doctor-grid/doctor-grid-03.jpg')}}" alt=""></a>
                                    <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                        <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.8</span>
                                        <a href="javascript:void(0)" class="fav-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div
                                        class="d-flex active-bar active-bar-teal align-items-center justify-content-between p-3">
                                        <a href="#" class="text-teal fw-medium fs-14">Neurologist</a>
                                        <span class="badge bg-success-light d-inline-flex align-items-center">
                                            <i class="fa-solid fa-circle fs-5 me-1"></i>
                                            Available
                                        </span>
                                    </div>
                                    <div class="p-3 pt-0">
                                        <div class="doctor-info-detail mb-3 pb-3">
                                            <h3 class="mb-1"><a href="{{url('doctor-profile')}}">Dr. Harold Bryant</a></h3>
                                            <div class="d-flex align-items-center">
                                                <p class="d-flex align-items-center mb-0 fs-14"><i
                                                        class="isax isax-location me-2"></i>Winona, MS</p>
                                                <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                <span class="fs-14 fw-medium">30 Min</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-1">Consultation Fees</p>
                                                <h3 class="text-orange">$500</h3>
                                            </div>
                                            <a href="{{url('booking')}}"
                                                class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-calendar-1 me-2"></i>
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card">
                                <div class="card-img card-img-hover">
                                    <a href="{{url('doctor-profile')}}"><img
                                            src="{{URL::asset('build/img/doctor-grid/doctor-grid-04.jpg')}}" alt=""></a>
                                    <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                        <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.8</span>
                                        <a href="javascript:void(0)" class="fav-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div
                                        class="d-flex active-bar active-bar-info align-items-center justify-content-between p-3">
                                        <a href="#" class="text-info fw-medium fs-14">Cardiologist</a>
                                        <span class="badge bg-success-light d-inline-flex align-items-center">
                                            <i class="fa-solid fa-circle fs-5 me-1"></i>
                                            Available
                                        </span>
                                    </div>
                                    <div class="p-3 pt-0">
                                        <div class="doctor-info-detail mb-3 pb-3">
                                            <h3 class="mb-1"><a href="{{url('doctor-profile')}}">Dr. Sandra Jones</a></h3>
                                            <div class="d-flex align-items-center">
                                                <p class="d-flex align-items-center mb-0 fs-14"><i
                                                        class="isax isax-location me-2"></i>Beckley, WV</p>
                                                <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                <span class="fs-14 fw-medium">30 Min</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-1">Consultation Fees</p>
                                                <h3 class="text-orange">$550</h3>
                                            </div>
                                            <a href="{{url('booking')}}"
                                                class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-calendar-1 me-2"></i>
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card">
                                <div class="card-img card-img-hover">
                                    <a href="{{url('doctor-profile')}}"><img
                                            src="{{URL::asset('build/img/doctor-grid/doctor-grid-05.jpg')}}" alt=""></a>
                                    <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                        <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.2</span>
                                        <a href="javascript:void(0)" class="fav-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div
                                        class="d-flex active-bar active-bar-teal align-items-center justify-content-between p-3">
                                        <a href="#" class="text-teal fw-medium fs-14">Neurologist</a>
                                        <span class="badge bg-success-light d-inline-flex align-items-center">
                                            <i class="fa-solid fa-circle fs-5 me-1"></i>
                                            Available
                                        </span>
                                    </div>
                                    <div class="p-3 pt-0">
                                        <div class="doctor-info-detail mb-3 pb-3">
                                            <h3 class="mb-1"><a href="{{url('doctor-profile')}}">Dr. Charles Scott</a></h3>
                                            <div class="d-flex align-items-center">
                                                <p class="d-flex align-items-center mb-0 fs-14"><i
                                                        class="isax isax-location me-2"></i>Hamshire, TX</p>
                                                <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                <span class="fs-14 fw-medium">30 Min</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-1">Consultation Fees</p>
                                                <h3 class="text-orange">$600</h3>
                                            </div>
                                            <a href="{{url('booking')}}"
                                                class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-calendar-1 me-2"></i>
                                                Book Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div class="card">
                                <div class="card-img card-img-hover">
                                    <a href="{{url('doctor-profile')}}"><img
                                            src="{{URL::asset('build/img/doctor-grid/doctor-grid-06.jpg')}}" alt=""></a>
                                    <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                        <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.2</span>
                                        <a href="javascript:void(0)" class="fav-icon">
                                            <i class="fa fa-heart"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div
                                        class="d-flex active-bar active-bar-info align-items-center justify-content-between p-3">
                                        <a href="#" class="text-info fw-medium fs-14">Cardiologist</a>
                                        <span class="badge bg-success-light d-inline-flex align-items-center">
                                            <i class="fa-solid fa-circle fs-5 me-1"></i>
                                            Available
                                        </span>
                                    </div>
                                    <div class="p-3 pt-0">
                                        <div class="doctor-info-detail mb-3 pb-3">
                                            <h3 class="mb-1"><a href="{{url('doctor-profile')}}">Dr. Robert Thomas</a></h3>
                                            <div class="d-flex align-items-center">
                                                <p class="d-flex align-items-center mb-0 fs-14"><i
                                                        class="isax isax-location me-2"></i>Oakland, CA</p>
                                                <i class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                <span class="fs-14 fw-medium">30 Min</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <p class="mb-1">Consultation Fees</p>
                                                <h3 class="text-orange">$450</h3>
                                            </div>
                                            <a href="{{url('booking')}}"
                                                class="btn btn-md btn-dark d-inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-calendar-1 me-2"></i>
                                                Book Now
                                            </a>
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