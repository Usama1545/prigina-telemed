<?php $page = 'map-list-availability'; ?>
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
                        <h3>Found <span class="text-secondary">06</span> Doctors For You</h3>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="doctor-available-profile">
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="position-relative">
                                                        <span class="avail-img"><img
                                                                src="{{URL::asset('build/img/doctor-grid/doctor-grid-05.jpg')}}"
                                                                alt=""></span>
                                                        <span class="avail-check"><i
                                                                class="isax isax-tick-circle5 text-success"></i></span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1">Dr. Charles Scott</h6>
                                                        <span class="d-block fs-14 mb-3">MBBS, Neurologist</span>
                                                        <span class="fs-14 d-block">2197 Haven Lane</span>
                                                        <a href="#" class="text-primary text-decoration-underline">Get
                                                            Direction</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="fs-14 fw-normal mb-1">Speciality</h6>
                                                    <p class="mb-3">Orthopedic Consultation, Delivery Blocks</p>
                                                    <p class="mb-2">Consultation Fees : <span
                                                            class="text-orange fw-semibold fs-18">$650</span></p>
                                                    <a href="#"
                                                        class="btn btn-md w-100 btn-dark d-inline-flex justify-content-center align-items-center rounded-pill">
                                                        <i class="isax isax-chart-success me-2"></i>
                                                        Book Online Consultation
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="booking-date-slider booking-wizard-slots">
                                                <ul class="date-slider slick mb-4">
                                                    <li class="active">
                                                        <h4>Mon</h4>
                                                        <p>Jan 16</p>
                                                    </li>
                                                    <li>
                                                        <h4>Tue</h4>
                                                        <p>Jan 17</p>
                                                    </li>
                                                    <li>
                                                        <h4>Wed</h4>
                                                        <p>Jan 18</p>
                                                    </li>
                                                    <li>
                                                        <h4>Thu</h4>
                                                        <p>Jan 19</p>
                                                    </li>
                                                    <li>
                                                        <h4>Fri</h4>
                                                        <p>Jan 20</p>
                                                    </li>
                                                    <li>
                                                        <h4>Sat</h4>
                                                        <p>Jan 21</p>
                                                    </li>
                                                    <li>
                                                        <h4>Sun</h4>
                                                        <p>Jan 22</p>
                                                    </li>
                                                </ul>
                                                <div class="token-slot mt-2 mb-2">
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment" checked>
                                                            <span class="visit-rsn">09:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">-</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">-</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">09:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">-</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline visits me-0">
                                                        <label class="visit-btns">
                                                            <input type="checkbox" class="form-check-input"
                                                                name="appintment">
                                                            <span class="visit-rsn">10:45</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <a href="#" class="text-primary text-decoration-underline">View More
                                                        Schedule</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="doctor-available-profile">
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="position-relative">
                                                        <span class="avail-img"><img
                                                                src="{{URL::asset('build/img/doctor-grid/doctor-grid-05.jpg')}}"
                                                                alt=""></span>
                                                        <span class="avail-check"><i
                                                                class="isax isax-tick-circle5 text-success"></i></span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1">Dr. Charles Scott</h6>
                                                        <span class="d-block fs-14 mb-3">MBBS, Neurologist</span>
                                                        <span class="fs-14 d-block">2197 Haven Lane</span>
                                                        <a href="#" class="text-primary text-decoration-underline">Get
                                                            Direction</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="fs-14 fw-normal mb-1">Speciality</h6>
                                                    <p class="mb-3">Orthopedic Consultation, Delivery Blocks</p>
                                                    <p class="mb-2">Consultation Fees : <span
                                                            class="text-orange fw-semibold fs-18">$650</span></p>
                                                    <a href="#"
                                                        class="btn btn-md w-100 btn-dark d-inline-flex justify-content-center align-items-center rounded-pill">
                                                        <i class="isax isax-chart-success me-2"></i>
                                                        Book Online Consultation
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="booking-date-slider booking-wizard-slots">
                                                <ul class="date-slider slick mb-4">
                                                    <li class="active">
                                                        <h4>Mon</h4>
                                                        <p>Jan 16</p>
                                                    </li>
                                                    <li>
                                                        <h4>Tue</h4>
                                                        <p>Jan 17</p>
                                                    </li>
                                                    <li>
                                                        <h4>Wed</h4>
                                                        <p>Jan 18</p>
                                                    </li>
                                                    <li>
                                                        <h4>Thu</h4>
                                                        <p>Jan 19</p>
                                                    </li>
                                                    <li>
                                                        <h4>Fri</h4>
                                                        <p>Jan 20</p>
                                                    </li>
                                                    <li>
                                                        <h4>Sat</h4>
                                                        <p>Jan 21</p>
                                                    </li>
                                                    <li>
                                                        <h4>Sun</h4>
                                                        <p>Jan 22</p>
                                                    </li>
                                                </ul>
                                                <div class="text-center mb-5 mt-5">
                                                    <div class="card d-inline-block">
                                                        <div class="card-body p-2">
                                                            <h6 class="mb-1 fw-medium fs-14">Next available at</h6>
                                                            <p class="mb-0 fs-14">10:00 AM - 15 Oct, Tue</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <a href="#" class="text-primary text-decoration-underline">View More
                                                        Schedule</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-lg-5">
                                            <div class="doctor-available-profile">
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="position-relative">
                                                        <span class="avail-img"><img
                                                                src="{{URL::asset('build/img/doctor-grid/doctor-grid-05.jpg')}}"
                                                                alt=""></span>
                                                        <span class="avail-check"><i
                                                                class="isax isax-tick-circle5 text-success"></i></span>
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-1">Dr. Charles Scott</h6>
                                                        <span class="d-block fs-14 mb-3">MBBS, Neurologist</span>
                                                        <span class="fs-14 d-block">2197 Haven Lane</span>
                                                        <a href="#" class="text-primary text-decoration-underline">Get
                                                            Direction</a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <h6 class="fs-14 fw-normal mb-1">Speciality</h6>
                                                    <p class="mb-3">Orthopedic Consultation, Delivery Blocks</p>
                                                    <p class="mb-2">Consultation Fees : <span
                                                            class="text-orange fw-semibold fs-18">$650</span></p>
                                                    <a href="#"
                                                        class="btn btn-md w-100 btn-dark d-inline-flex justify-content-center align-items-center rounded-pill">
                                                        <i class="isax isax-chart-success me-2"></i>
                                                        Book Online Consultation
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <div class="booking-date-slider booking-wizard-slots">
                                                <div class="text-center">
                                                    <div class="card d-inline-block">
                                                        <div class="card-body p-2">
                                                            <p class="mb-0 fs-14">No Schedule for this Week, Contact
                                                                Customer <br>
                                                                Support or call +1 34565 65678</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center mb-4">
                                <a href="{{url('login')}}"
                                    class="btn btn-md btn-primary-gradient d-inline-flex align-items-center rounded-pill">
                                    <i class="isax isax-d-cube-scan5 me-2"></i>
                                    Load More 425 Doctors
                                </a>
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