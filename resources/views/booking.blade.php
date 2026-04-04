<?php $page = 'booking'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Terms -->
    <div class="doctor-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="booking-wizard">
                        <ul class="form-wizard-steps d-sm-flex align-items-center justify-content-center" id="progressbar2">
                            <li class="progress-active">
                                <div class="profile-step">
                                    <span class="multi-steps">1</span>
                                    <div class="step-section">
                                        <h6>Specialty</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">2</span>
                                    <div class="step-section">
                                        <h6>Appointment Type</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">3</span>
                                    <div class="step-section">
                                        <h6>Date & Time</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">4</span>
                                    <div class="step-section">
                                        <h6>Basic Information</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">5</span>
                                    <div class="step-section">
                                        <h6>Payment</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">6</span>
                                    <div class="step-section">
                                        <h6>Confirmation</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="booking-widget multistep-form mb-5">
                        <fieldset id="first">
                            <div class="card booking-card mb-0">
                                <div class="card-header">
                                    <div class="booking-header pb-0">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div
                                                    class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                    <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0"><img
                                                            src="{{URL::asset('build/img/clients/client-15.jpg')}}"
                                                            alt=""></span>
                                                    <div>
                                                        <h4 class="mb-1">Dr. Michael Brown <span
                                                                class="badge bg-orange fs-12"><i
                                                                    class="fa-solid fa-star me-1"></i>5.0</span></h4>
                                                        <p class="text-indigo mb-3 fw-medium">Psychologist</p>
                                                        <p class="mb-0"><i class="isax isax-location me-2"></i>5th Street -
                                                            1011 W 5th St, Suite 120, Austin, TX 78703</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body booking-body">
                                    <div class="card mb-0">
                                        <div class="card-body pb-1">
                                            <div class="mb-4 pb-4 border-bottom">
                                                <label class="form-label">Select Speciality</label>
                                                <select class="select">
                                                    <option>Cardiology</option>
                                                    <option>Neurology</option>
                                                    <option>Urology</option>
                                                </select>
                                            </div>
                                            <h6 class="mb-3">Services</h6>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="service-item active">
                                                        <input class="form-check-input ms-0 mt-0" name="service1"
                                                            type="checkbox" id="service1" checked>
                                                        <label class="form-check-label ms-2" for="service1">
                                                            <span class="service-title d-block mb-1">Echocardiograms</span>
                                                            <span class="fs-14 d-block">$310</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="service-item">
                                                        <input class="form-check-input ms-0 mt-0" name="service1"
                                                            type="checkbox" id="service2">
                                                        <label class="form-check-label ms-2" for="service2">
                                                            <span class="service-title d-block mb-1">Stress tests</span>
                                                            <span class="fs-14 d-block">$754</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="service-item">
                                                        <input class="form-check-input ms-0 mt-0" name="service1"
                                                            type="checkbox" id="service3">
                                                        <label class="form-check-label ms-2" for="service3">
                                                            <span class="service-title d-block mb-1">Stress tests</span>
                                                            <span class="fs-14 d-block">$754</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="service-item">
                                                        <input class="form-check-input ms-0 mt-0" name="service1"
                                                            type="checkbox" id="service4">
                                                        <label class="form-check-label ms-2" for="service4">
                                                            <span class="service-title d-block mb-1">Heart
                                                                Catheterization</span>
                                                            <span class="fs-14 d-block">$150</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="service-item">
                                                        <input class="form-check-input ms-0 mt-0" name="service1"
                                                            type="checkbox" id="service5">
                                                        <label class="form-check-label ms-2" for="service5">
                                                            <span class="service-title d-block mb-1">Echocardiograms</span>
                                                            <span class="fs-14 d-block">$200</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="service-item">
                                                        <input class="form-check-input ms-0 mt-0" name="service1"
                                                            type="checkbox" id="service6">
                                                        <label class="form-check-label ms-2" for="service6">
                                                            <span class="service-title d-block mb-1">Echocardiograms</span>
                                                            <span class="fs-14 d-block">$200</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-dark inline-flex align-items-center rounded-pill">
                                            <i class="isax isax-arrow-left-2 me-1"></i>
                                            Back
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Select Appointment Type
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="card booking-card mb-0">
                                <div class="card-header">
                                    <div class="booking-header pb-0">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div
                                                    class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                    <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0"><img
                                                            src="{{URL::asset('build/img/clients/client-15.jpg')}}"
                                                            alt=""></span>
                                                    <div>
                                                        <h4 class="mb-1">Dr. Michael Brown <span
                                                                class="badge bg-orange fs-12"><i
                                                                    class="fa-solid fa-star me-1"></i>5.0</span></h4>
                                                        <p class="text-indigo mb-3 fw-medium">Psychologist</p>
                                                        <p class="mb-0"><i class="isax isax-location me-2"></i>5th Street -
                                                            1011 W 5th St, Suite 120, Austin, TX 78703</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body booking-body">
                                    <div class="card mb-0">
                                        <div class="card-body pb-1">
                                            <h6 class="mb-3">Select Appointment Type</h6>
                                            <div class="row">
                                                <div class="col-xl col-md-3 col-sm-4">
                                                    <div class="radio-select text-center">
                                                        <input class="form-check-input ms-0 mt-0" name="service2"
                                                            type="radio" id="service7" checked>
                                                        <label class="form-check-label" for="service7">
                                                            <i class="isax isax-hospital5"></i>
                                                            <span class="service-title d-block">Clinic</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl col-md-3 col-sm-4">
                                                    <div class="radio-select text-center">
                                                        <input class="form-check-input ms-0 mt-0" name="service2"
                                                            type="radio" id="service8">
                                                        <label class="form-check-label" for="service8">
                                                            <i class="isax isax-video5"></i>
                                                            <span class="service-title d-block">Video Call</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl col-md-3 col-sm-4">
                                                    <div class="radio-select text-center">
                                                        <input class="form-check-input ms-0 mt-0" name="service2"
                                                            type="radio" id="service9">
                                                        <label class="form-check-label" for="service9">
                                                            <i class="isax isax-call5"></i>
                                                            <span class="service-title d-block">Audio Call</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl col-md-3 col-sm-4">
                                                    <div class="radio-select text-center">
                                                        <input class="form-check-input ms-0 mt-0" name="service2"
                                                            type="radio" id="service10">
                                                        <label class="form-check-label" for="service10">
                                                            <i class="isax isax-messages-15"></i>
                                                            <span class="service-title d-block">Chat</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xl col-md-3 col-sm-4">
                                                    <div class="radio-select text-center">
                                                        <input class="form-check-input ms-0 mt-0" name="service2"
                                                            type="radio" id="service11">
                                                        <label class="form-check-label" for="service11">
                                                            <i class="isax isax-messages-15"></i>
                                                            <span class="service-title d-block">Home Visit</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clinics-path">
                                                <h6 class="mb-3">Select Clinics</h6>
                                                <div>
                                                    <div class="service-item">
                                                        <input class="form-check-input ms-0 mt-0" name="service2"
                                                            type="checkbox" id="service12">
                                                        <label class="form-check-label ms-2" for="service12">
                                                            <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                <span class="d-inline-block me-2"><img
                                                                        src="{{URL::asset('build/img/icons/clinic-icon-01.svg')}}"
                                                                        class="rounded-circle" alt=""></span>
                                                                <span>
                                                                    <span class="service-title d-block mb-1">AllCare Family
                                                                        Medicine</span>
                                                                    <span class="fs-14">3343 Private Lane, Valdosta</span>
                                                                    <i
                                                                        class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                                    <span class="fs-14">500 Meters</span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="service-item">
                                                        <input class="form-check-input ms-0 mt-0" name="service2"
                                                            type="checkbox" id="service13">
                                                        <label class="form-check-label ms-2" for="service13">
                                                            <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                <span class="d-inline-block me-2"><img
                                                                        src="{{URL::asset('build/img/icons/clinic-icon-02.svg')}}"
                                                                        class="rounded-circle" alt=""></span>
                                                                <span>
                                                                    <span class="service-title d-block mb-1">Vitalplus
                                                                        Clinic</span>
                                                                    <span class="fs-14">4223 Pleasant Hill Road, Miami, FL
                                                                        33169</span>
                                                                    <i
                                                                        class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                                    <span class="fs-14">12 KM </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <div class="service-item">
                                                        <input class="form-check-input ms-0 mt-0" name="service2"
                                                            type="checkbox" id="service13">
                                                        <label class="form-check-label ms-2" for="service13">
                                                            <span class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                                <span class="d-inline-block me-2"><img
                                                                        src="{{URL::asset('build/img/icons/clinic-icon-03.svg')}}"
                                                                        class="rounded-circle" alt=""></span>
                                                                <span>
                                                                    <span class="service-title d-block mb-1">Wellness Path
                                                                        Chiropractic</span>
                                                                    <span class="fs-14">418 Patton Lane, Garner, NC 27529,
                                                                        FL 33169</span>
                                                                    <i
                                                                        class="fa-solid fa-circle fs-5 text-primary mx-2 me-1"></i>
                                                                    <span class="fs-14">16 KM </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                            <i class="isax isax-arrow-left-2 me-1"></i>
                                            Back
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Select Date & Time
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="card booking-card mb-0">
                                <div class="card-header">
                                    <div class="booking-header pb-0">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div
                                                    class="d-flex align-items-center flex-wrap rpw-gap-2 mb-4 flex-wrap row-gap-2">
                                                    <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0"><img
                                                            src="{{URL::asset('build/img/clients/client-15.jpg')}}"
                                                            alt=""></span>
                                                    <div>
                                                        <h4 class="mb-1">Dr. Michael Brown <span
                                                                class="badge bg-orange fs-12"><i
                                                                    class="fa-solid fa-star me-1"></i>5.0</span></h4>
                                                        <p class="text-indigo mb-3 fw-medium">Psychologist</p>
                                                        <p class="mb-0"><i class="isax isax-location me-2"></i>5th Street -
                                                            1011 W 5th St, Suite 120, Austin, TX 78703</p>
                                                    </div>
                                                </div>
                                                <h6 class="mb-2">Booking Info</h6>
                                                <div class="row gx-2 gy-3">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Service</h6>
                                                            <p class="mb-0">Cardiology (30 Mins)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Service</h6>
                                                            <p class="mb-0">Echocardiograms</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Date & Time</h6>
                                                            <p class="mb-0">10:00 - 11:00 AM, 15, Oct</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Appointment type</h6>
                                                            <p class="mb-0">Clinic (Wellness Path)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body booking-body">
                                    <div class="card mb-0">
                                        <div class="card-body pb-1">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="card">
                                                        <div class="card-body p-2 pt-3">
                                                            <div id="datetimepickershow"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="card booking-wizard-slots">
                                                        <div class="card-body">
                                                            <div class="book-title">
                                                                <h6 class="fs-14 mb-2">Morning</h6>
                                                            </div>
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
                                                            </div>
                                                            <div class="book-title">
                                                                <h6 class="fs-14 mb-2">Afternoon</h6>
                                                            </div>
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
                                                            </div>
                                                            <div class="book-title">
                                                                <h6 class="fs-14 mb-2">Evening</h6>
                                                            </div>
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
                                                                        <span class="visit-rsn">-</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                            <i class="isax isax-arrow-left-2 me-1"></i>
                                            Back
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Add Basic Information
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="card booking-card mb-0">
                                <div class="card-header">
                                    <div class="booking-header pb-0">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div
                                                    class="d-flex align-items-center flex-wrap rpw-gap-2 mb-4 flex-wrap row-gap-2">
                                                    <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0"><img
                                                            src="{{URL::asset('build/img/clients/client-15.jpg')}}"
                                                            alt=""></span>
                                                    <div>
                                                        <h4 class="mb-1">Dr. Michael Brown <span
                                                                class="badge bg-orange fs-12"><i
                                                                    class="fa-solid fa-star me-1"></i>5.0</span></h4>
                                                        <p class="text-indigo mb-3 fw-medium">Psychologist</p>
                                                        <p class="mb-0"><i class="isax isax-location me-2"></i>5th Street -
                                                            1011 W 5th St, Suite 120, Austin, TX 78703</p>
                                                    </div>
                                                </div>
                                                <h6 class="mb-2">Booking Info</h6>
                                                <div class="row gx-2 gy-3">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Service</h6>
                                                            <p class="mb-0">Cardiology (30 Mins)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Service</h6>
                                                            <p class="mb-0">Echocardiograms</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Date & Time</h6>
                                                            <p class="mb-0">10:00 - 11:00 AM, 15, Oct</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <h6 class="fs-14 fw-medium mb-1">Appointment type</h6>
                                                            <p class="mb-0">Clinic (Wellness Path)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body booking-body">
                                    <div class="card mb-0">
                                        <div class="card-body pb-1">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email Address</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Patient</label>
                                                        <select class="select">
                                                            <option>Andrew Fletcher</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Symptoms</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Attachment</label>
                                                        <input type="file" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Reason for Visit</label>
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                            <i class="isax isax-arrow-left-2 me-1"></i>
                                            Back
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Select Payment
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="card booking-card mb-0">
                                <div class="card-header">
                                    <div class="booking-header pb-0">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div
                                                    class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                    <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0"><img
                                                            src="{{URL::asset('build/img/clients/client-15.jpg')}}"
                                                            alt=""></span>
                                                    <div>
                                                        <h4 class="mb-1">Dr. Michael Brown <span
                                                                class="badge bg-orange fs-12"><i
                                                                    class="fa-solid fa-star me-1"></i>5.0</span></h4>
                                                        <p class="text-indigo mb-3 fw-medium">Psychologist</p>
                                                        <p class="mb-0"><i class="isax isax-location me-2"></i>5th Street -
                                                            1011 W 5th St, Suite 120, Austin, TX 78703</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body booking-body">
                                    <div class="row">
                                        <div class="col-lg-6 d-flex">
                                            <div class="card flex-fill mb-3 mb-lg-0">
                                                <div class="card-body">
                                                    <h6 class="mb-3">Payment Gateway</h6>
                                                    <div class="payment-tabs">
                                                        <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">
                                                            <li class="nav-item col-sm-4" role="presentation">
                                                                <button class="nav-link active" id="pills-home-tab"
                                                                    data-bs-toggle="pill" data-bs-target="#pills-home"
                                                                    type="button" role="tab">
                                                                    <img src="{{URL::asset('build/img/icons/payment-icon-05.svg')}}"
                                                                        class="me-2" alt="">
                                                                    Credit Card
                                                                </button>
                                                            </li>
                                                            <li class="nav-item col-sm-4" role="presentation">
                                                                <button class="nav-link" id="pills-profile-tab"
                                                                    data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                                    type="button" role="tab">
                                                                    <img src="{{URL::asset('build/img/icons/payment-icon-06.svg')}}"
                                                                        class="me-2" alt="">
                                                                    Paypal
                                                                </button>
                                                            </li>
                                                            <li class="nav-item col-sm-4" role="presentation">
                                                                <button class="nav-link" id="pills-contact-tab"
                                                                    data-bs-toggle="pill" data-bs-target="#pills-contact"
                                                                    type="button" role="tab">
                                                                    <img src="{{URL::asset('build/img/icons/payment-icon-07.svg')}}"
                                                                        class="me-2" alt="">
                                                                    Stripe
                                                                </button>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="pills-tabContent">
                                                            <div class="tab-pane fade show active" id="pills-home"
                                                                role="tabpanel">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Card Holder Name</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-user"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Card Number</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-card-tick"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Expire Date</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-calendar-2"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-0">
                                                                    <label class="form-label">CVV</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-check"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Email Address</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-sms"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label class="form-label">Password</label>
                                                                    <div class="pass-group">
                                                                        <input type="password"
                                                                            class="form-control pass-input">
                                                                        <span
                                                                            class="feather-eye-off toggle-password"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="pills-contact" role="tabpanel">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Email Address</label>
                                                                    <div class="position-relative input-icon">
                                                                        <input type="text" class="form-control">
                                                                        <span><i class="isax isax-sms"></i></span>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label class="form-label">Password</label>
                                                                    <div class="pass-group">
                                                                        <input type="password"
                                                                            class="form-control pass-input-sub">
                                                                        <span
                                                                            class="feather-eye-off toggle-password-sub"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 d-flex">
                                            <div class="card flex-fill mb-0">
                                                <div class="card-body">
                                                    <h6 class="mb-3">Booking Info</h6>
                                                    <div class="mb-3">
                                                        <label class="form-label">Date & Time</label>
                                                        <div class="form-plain-text">10:00 - 11:00 AM, 15, Oct 2025 </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Appointment type</label>
                                                        <div class="form-plain-text">Clinic (Wellness Path) </div>
                                                    </div>
                                                    <div class="pt-3 border-top booking-more-info">
                                                        <h6 class="mb-3">Payment Info</h6>
                                                        <div
                                                            class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                            <p class="mb-0">Echocardiograms</p>
                                                            <span class="fw-medium d-block">$200</span>
                                                        </div>
                                                        <div
                                                            class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                            <p class="mb-0">Booking Fees</p>
                                                            <span class="fw-medium d-block">$20</span>
                                                        </div>
                                                        <div
                                                            class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                            <p class="mb-0">Tax</p>
                                                            <span class="fw-medium d-block">$18</span>
                                                        </div>
                                                        <div
                                                            class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                            <p class="mb-0">Discount</p>
                                                            <span class="fw-medium text-danger d-block">-$15</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="bg-primary d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between p-3 rounded">
                                                        <h6 class="text-white">Total</h6>
                                                        <h6 class="text-white">$320</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                            <i class="isax isax-arrow-left-2 me-1"></i>
                                            Back
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="btn btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                            Confirm & Pay
                                            <i class="isax isax-arrow-right-3 ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="card booking-card">
                                <div class="card-body booking-body pb-1">
                                    <div class="row">
                                        <div class="col-lg-8 d-flex">
                                            <div class="flex-fill">
                                                <div class="card ">
                                                    <div class="card-header">
                                                        <h5 class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                            <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                            Booking Confirmed
                                                        </h5>
                                                    </div>
                                                    <div class="card-header d-flex align-items-center flex-wrap rpw-gap-2">
                                                        <span
                                                            class="avatar avatar-lg avatar-rounded me-2 flex-shrink-0"><img
                                                                src="{{URL::asset('build/img/clients/client-16.jpg')}}"
                                                                alt=""></span>
                                                        <p class="mb-0">Your Booking has been Confirmed with <span
                                                                class="text-dark">Dr. Michael Brown </span> be on time
                                                            before <span class="text-dark">15 Mins </span> From the
                                                            appointment Time</p>
                                                    </div>
                                                    <div class="card-body pb-1">
                                                        <div
                                                            class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-3">
                                                            <h6>Booking Info</h6>
                                                            <a href="javascript:void(0);"
                                                                class="btn btn-light rounded-pill"><i
                                                                    class="isax isax-calendar me-1"></i>Reschedule</a>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Service</label>
                                                                    <div class="form-plain-text">Cardiology (30 Mins)</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Additional Service</label>
                                                                    <div class="form-plain-text">Echocardiograms</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Date & Time</label>
                                                                    <div class="form-plain-text">10:00 - 11:00 AM, 15, Oct
                                                                        2025 </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Appointment type</label>
                                                                    <div class="form-plain-text">Clinic </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Clinic Name & Location</label>
                                                                    <div class="form-plain-text">Wellness Path <a
                                                                            href="javascript:void(0);"
                                                                            class="text-primary">View Location</a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div
                                                        class="card-body d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                                        <div>
                                                            <h6 class="mb-1">Need Our Assistance</h6>
                                                            <p class="mb-0">Call us in case you face any Issue on Booking /
                                                                Cancellation</p>
                                                        </div>
                                                        <a href="javascript:void(0);" class="btn btn-light rounded-pill"><i
                                                                class="isax isax-call5 me-1"></i>Call Us</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body d-flex flex-column justify-content-between">
                                                    <div class="text-center">
                                                        <h6 class="fs-14 mb-2">Booking Number</h6>
                                                        <span class="booking-id-badge mb-3">DCRA12565</span>
                                                        <span class="d-block mb-3"><img
                                                                src="{{URL::asset('build/img/icons/payment-qr.svg')}}"
                                                                alt=""></span>
                                                        <p>Scan this QR Code to Download the details of Appointment</p>
                                                    </div>
                                                    <div>
                                                        <a href="javascript:void(0);"
                                                            class="btn w-100 mb-3 btn-md btn-dark prev_btns inline-flex align-items-center rounded-pill">
                                                            Add To Calendar
                                                        </a>
                                                        <a href="{{url('doctor-grid')}}"
                                                            class="btn w-100 btn-md btn-primary-gradient next_btns inline-flex align-items-center rounded-pill">
                                                            Start New Booking
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{url('booking')}}" class="">
                                    <i class="isax isax-arrow-left-2 me-1"></i>
                                    Back to Bookings
                                </a>
                            </div>
                        </fieldset>
                    </div>
                    <div class="text-center">
                        <p class="mb-0">Copyright © 2025. All Rights Reserved, PriGina Global Telemed</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- /Terms -->
@endsection