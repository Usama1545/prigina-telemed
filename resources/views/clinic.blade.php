<?php $page = 'clinic'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'Clinics', 'li_2' => 'Clinics'])
    @endcomponent

    <!-- Specialties -->
    <div class="content doctor-content">
        <div class="container">

            <!-- Hospital Tabs -->
            <nav class="settings-tab hospital-tab">
                <ul class="nav nav-tabs-bottom justify-content-center " role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{url('hospitals')}}">Hospitals</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{url('speciality')}}">Specialities</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{url('clinic')}}">Clinics</a>
                    </li>
                </ul>
            </nav>
            <!-- /Hospital Tabs -->

            <!-- Show Result -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap result-wrap gap-3">
                        <h5>Showing <span class="text-secondary">450</span> Clinics For You</h5>
                        <div class="d-flex align-items-center flex-wrap gap-3">
                            <select class="select">
                                <option>United States Of America</option>
                                <option>United Kingdom</option>
                            </select>
                            <select class="select">
                                <option>All Hospitals</option>
                                <option>Jamesburg Clincs</option>
                                <option>Medical Zone</option>
                            </select>
                            <div class="input-block dash-search-input">
                                <input type="text" class="form-control" placeholder="Search Clinics">
                                <span class="search-icon"><i class="feather-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Show Result -->

            <div class="row">

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="javascript:void(0)" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-01.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="javascript:void(0)">Jamesburg Clincs</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>Santa Fe Springs</p>
                                        <p class="fs-14 mb-0">180 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{url('doctor-grid')}}" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-02.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Berkshire Medical Clinic</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>Indianapolis</p>
                                        <p class="fs-14 mb-0">60 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{url('doctor-grid')}}" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-03.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{url('doctor-grid')}}">First Priority Clinics</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>Saginaw</p>
                                        <p class="fs-14 mb-0">90 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{url('doctor-grid')}}" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-04.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Medical Zone</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>Saint Louis</p>
                                        <p class="fs-14 mb-0">78 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{url('doctor-grid')}}" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-05.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Healing Helpers Medical</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>Jamesburg</p>
                                        <p class="fs-14 mb-0">96 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{url('doctor-grid')}}" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-06.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Body Regenerate</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>Piscataway</p>
                                        <p class="fs-14 mb-0">180 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{url('doctor-grid')}}" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-07.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Union Family Health Center</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>Moscow Mills</p>
                                        <p class="fs-14 mb-0">68 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{url('doctor-grid')}}" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-08.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Treatment Solutions</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>Hamburg</p>
                                        <p class="fs-14 mb-0">64 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

                <!-- Clinic Item -->
                <div class="col-lg-4 col-md-6">
                    <div class="card clinic-item">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <a href="{{url('doctor-grid')}}" class="clinic-icon">
                                    <img src="{{URL::asset('build/img/clinic/clinic-09.svg')}}" alt="img">
                                </a>
                                <div class="ms-3">
                                    <h6 class="mb-1"><a href="{{url('doctor-grid')}}">The Vitality Visit</a></h6>
                                    <div class="d-flex align-items-center flex-wrap clinic-location gap-2">
                                        <p class="fs-14 mb-0"><i class="isax isax-location me-2"></i>San Diego</p>
                                        <p class="fs-14 mb-0">89 Doctors</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clinic Item -->

            </div>
            <div class="loader-item text-center">
                <a href="#" class="btn btn-primary d-inline-flex align-items-center">
                    <i class="isax isax-d-cube-scan me-2"></i>Load More 150 Clinics
                </a>
            </div>
        </div>
    </div>
    <!-- /Specialties -->
@endsection