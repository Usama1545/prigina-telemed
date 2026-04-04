<?php $page = 'speciality'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'Specialities', 'li_2' => 'Specialities'])
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
                        <a class="nav-link active" href="{{url('speciality')}}">Specialities</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="{{url('clinic')}}">Clinics</a>
                    </li>
                </ul>
            </nav>
            <!-- /Hospital Tabs -->

            <!-- Show Result -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between flex-wrap result-wrap gap-3">
                        <h5>Showing <span class="text-secondary">124</span> Specialities For You</h5>
                        <div class="d-flex align-items-center flex-wrap gap-3">
                            <div class="input-block dash-search-input">
                                <input type="text" class="form-control" placeholder="Search Specialities">
                                <span class="search-icon"><i class="isax isax-search-normal"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Show Result -->

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-01.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Orthopedics</a></h6>
                                        <p class="fs-14 mb-0">151 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-02.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Neurology</a></h6>
                                        <p class="fs-14 mb-0">25 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-03.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Psychiatry</a></h6>
                                        <p class="fs-14 mb-0">121 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-04.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Endocrinology</a></h6>
                                        <p class="fs-14 mb-0">104 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-05.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Pulmonology</a></h6>
                                        <p class="fs-14 mb-0">41 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-06.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Urology</a></h6>
                                        <p class="fs-14 mb-0">39 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-07.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Cardiology</a></h6>
                                        <p class="fs-14 mb-0">254 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-08.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Adult Endocrinology</a></h6>
                                        <p class="fs-14 mb-0">99 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-09.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">General Medicine</a></h6>
                                        <p class="fs-14 mb-0">41 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-10.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">ENT</a></h6>
                                        <p class="fs-14 mb-0">37 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-11.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Fertility</a></h6>
                                        <p class="fs-14 mb-0">547 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card speciality-item">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <a href="{{url('doctor-grid')}}" class="speciality-icon">
                                        <img src="{{URL::asset('build/img/specialities/speciality-12.svg')}}" alt="img">
                                    </a>
                                    <div class="ms-3">
                                        <h6 class="mb-1"><a href="{{url('doctor-grid')}}">Family Medicine</a></h6>
                                        <p class="fs-14 mb-0">121 Doctors</p>
                                    </div>
                                </div>
                                <a href="{{url('doctor-grid')}}" class="link-icon"><i
                                        class="isax isax-arrow-right-3"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="loader-item text-center">
                <a href="#" class="btn btn-primary d-inline-flex align-items-center">
                    <i class="isax isax-d-cube-scan me-2"></i>Load More 15 Specialities
                </a>
            </div>
        </div>
    </div>
    <!-- /Specialties -->
@endsection