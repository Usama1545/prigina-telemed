<?php $page = 'search-2'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Doctor List', 'li_2' => 'Doctor List'])
    @endcomponent

    <!-- Page Content -->
    <div class="content mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card filter-lists">
                        <div class="card-header">
                            <div class="d-flex align-items-center filter-head justify-content-between">
                                <h4>Filter</h4>
                                <a href="#" class="text-secondary text-decoration-underline">Clear All</a>
                            </div>
                            <div class="filter-input">
                                <div class="position-relative input-icon">
                                    <input type="text" class="form-control">
                                    <span><i class="isax isax-search-normal-1"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header" id="heading1">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                        aria-controls="collapse1" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Specialities</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse1" class="accordion-collapse show" aria-labelledby="heading1">
                                    <div class="accordion-body pt-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm2"
                                                    checked="">
                                                <label class="form-check-label" for="checkebox-sm2">
                                                    Urology
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm3">
                                                <label class="form-check-label" for="checkebox-sm3">
                                                    Psychiatry
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm4">
                                                <label class="form-check-label" for="checkebox-sm4">
                                                    Cardiology
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm5">
                                                <label class="form-check-label" for="checkebox-sm5">
                                                    Pediatrics
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm6">
                                                <label class="form-check-label" for="checkebox-sm6">
                                                    Urology
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm7">
                                                <label class="form-check-label" for="checkebox-sm7">
                                                    Neurology
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm8">
                                                <label class="form-check-label" for="checkebox-sm8">
                                                    Pulmonology
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                        <div class="view-content">
                                            <div class="viewall-one">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkebox-sm9">
                                                        <label class="form-check-label" for="checkebox-sm9">
                                                            Orthopedics
                                                        </label>
                                                    </div>
                                                    <span class="filter-badge">21</span>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkebox-sm10">
                                                        <label class="form-check-label" for="checkebox-sm10">
                                                            Endocrinology
                                                        </label>
                                                    </div>
                                                    <span class="filter-badge">21</span>
                                                </div>
                                            </div>
                                            <div class="view-all">
                                                <a href="javascript:void(0);"
                                                    class="viewall-button-one text-secondary text-decoration-underline">View
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header" id="heading2">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse2"
                                        aria-controls="collapse2" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Gender</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse2" class="accordion-collapse show" aria-labelledby="heading2">
                                    <div class="accordion-body pt-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm11"
                                                    checked="">
                                                <label class="form-check-label" for="checkebox-sm11">
                                                    Male
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm12">
                                                <label class="form-check-label" for="checkebox-sm12">
                                                    Female
                                                </label>
                                            </div>
                                            <span class="filter-badge">21</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header" id="heading3">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse3"
                                        aria-controls="collapse3" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Availability</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse3" class="accordion-collapse show" aria-labelledby="heading3">
                                    <div class="accordion-body pt-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm13"
                                                    checked="">
                                                <label class="form-check-label" for="checkebox-sm13">
                                                    Available Today
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm14">
                                                <label class="form-check-label" for="checkebox-sm14">
                                                    Available Tomorrow
                                                </label>
                                            </div>
                                        </div>
                                        <div class="view-content">
                                            <div class="viewall-two">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkebox-sm15">
                                                        <label class="form-check-label" for="checkebox-sm15">
                                                            Available in Next 7 Days
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkebox-sm16">
                                                        <label class="form-check-label" for="checkebox-sm16">
                                                            Available in Next 30 Days
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="view-all">
                                                <a href="javascript:void(0);"
                                                    class="viewall-button-two text-secondary text-decoration-underline">View
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header" id="heading4">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse4"
                                        aria-controls="collapse4" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Pricing</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse4" class="accordion-collapse show" aria-labelledby="heading4">
                                    <div class="accordion-body pt-3">
                                        <div class="filter-range">
                                            <input type="text" id="range_03">
                                        </div>
                                        <p class="mb-0">Range : $200 - $5695</p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header" id="heading5">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse5"
                                        aria-controls="collapse5" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Experience</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse5" class="accordion-collapse show" aria-labelledby="heading5">
                                    <div class="accordion-body pt-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm21"
                                                    checked="">
                                                <label class="form-check-label" for="checkebox-sm21">
                                                    2+ Years
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm22">
                                                <label class="form-check-label" for="checkebox-sm22">
                                                    5+ Years
                                                </label>
                                            </div>
                                        </div>
                                        <div class="view-content">
                                            <div class="viewall-3">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkebox-sm23">
                                                        <label class="form-check-label" for="checkebox-sm23">
                                                            7+ Years
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkebox-sm24">
                                                        <label class="form-check-label" for="checkebox-sm24">
                                                            10+ Years
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="view-all">
                                                <a href="javascript:void(0);"
                                                    class="viewall-button-3 text-secondary text-decoration-underline">View
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header" id="heading6">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse6"
                                        aria-controls="collapse6" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Clinics</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse6" class="accordion-collapse show" aria-labelledby="heading6">
                                    <div class="accordion-body pt-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm25"
                                                    checked="">
                                                <label class="form-check-label" for="checkebox-sm25">
                                                    Bright Smiles Dental Clinic
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm26">
                                                <label class="form-check-label" for="checkebox-sm26">
                                                    Family Care Clinic
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm27">
                                                <label class="form-check-label" for="checkebox-sm27">
                                                    Express Health Clinic
                                                </label>
                                            </div>
                                        </div>
                                        <div class="view-content">
                                            <div class="viewall-4">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkebox-sm28">
                                                        <label class="form-check-label" for="checkebox-sm28">
                                                            Restore Physical Therapy
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="checkebox-sm29">
                                                        <label class="form-check-label" for="checkebox-sm29">
                                                            Blossom Women’s Health Clinic
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="view-all">
                                                <a href="javascript:void(0);"
                                                    class="viewall-button-4 text-secondary text-decoration-underline">View
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header" id="heading7">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse7"
                                        aria-controls="collapse7" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Consultation type</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse7" class="accordion-collapse show" aria-labelledby="heading7">
                                    <div class="accordion-body pt-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm30"
                                                    checked="">
                                                <label class="form-check-label" for="checkebox-sm30">
                                                    Audio Call
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm31">
                                                <label class="form-check-label" for="checkebox-sm31">
                                                    Video Call
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm32">
                                                <label class="form-check-label" for="checkebox-sm32">
                                                    Instant Counseling
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm33">
                                                <label class="form-check-label" for="checkebox-sm33">
                                                    Chat
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item border-bottom">
                                <div class="accordion-header" id="heading8">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse8"
                                        aria-controls="collapse8" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Languages</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse8" class="accordion-collapse show" aria-labelledby="heading8">
                                    <div class="accordion-body pt-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm34"
                                                    checked="">
                                                <label class="form-check-label" for="checkebox-sm34">
                                                    English
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm35">
                                                <label class="form-check-label" for="checkebox-sm35">
                                                    French
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm36">
                                                <label class="form-check-label" for="checkebox-sm36">
                                                    Spanish
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm37">
                                                <label class="form-check-label" for="checkebox-sm37">
                                                    German
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div class="accordion-header" id="heading9">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapse9"
                                        aria-controls="collapse9" role="button">
                                        <div class="d-flex align-items-center w-100">
                                            <h5>Languages</h5>
                                            <div class="ms-auto">
                                                <span><i class="fas fa-chevron-down"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse9" class="accordion-collapse show" aria-labelledby="heading9">
                                    <div class="accordion-body pt-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="checkebox-sm38"
                                                    checked="">
                                                <label class="form-check-label" for="checkebox-sm38">
                                                    <span>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                    </span>
                                                    5 Star
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm39">
                                                <label class="form-check-label" for="checkebox-sm39">
                                                    <span>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                    </span>
                                                    4 Star
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm40">
                                                <label class="form-check-label" for="checkebox-sm40">
                                                    <span>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                    </span>
                                                    3 Star
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm41">
                                                <label class="form-check-label" for="checkebox-sm41">
                                                    <span>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                    </span>
                                                    2 Star
                                                </label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="checkebox-sm42">
                                                <label class="form-check-label" for="checkebox-sm42">
                                                    <span>
                                                        <i class="fa-solid fa-star text-orange me-1"></i>
                                                    </span>
                                                    1 Star
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h3 class="main-title">Showing <span class="text-secondary">450</span> Doctors For You</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center justify-content-end mb-4">
                                <div class="doctor-filter-availability me-2">
                                    <p>Availability</p>
                                    <div class="status-toggle status-tog">
                                        <input type="checkbox" id="status_6" class="check">
                                        <label for="status_6" class="checktoggle">checkbox</label>
                                    </div>
                                </div>
                                <div class="dropdown header-dropdown me-2">
                                    <a class="dropdown-toggle sort-dropdown" data-bs-toggle="dropdown"
                                        href="javascript:void(0);" aria-expanded="false">
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
                                <a href="{{url('search-2')}}" class="btn btn-sm head-icon active me-2"><i
                                        class="isax isax-row-vertical"></i></a>
                                <a href="{{url('map-list')}}" class="btn btn-sm head-icon"><i
                                        class="isax isax-location"></i></a>
                            </div>
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
                        <div class="col-lg-12">
                            <div class="card doctor-list-card">
                                <div class="d-md-flex">
                                    <div class="card-img card-img-hover">
                                        <a href="{{url('doctor-profile')}}"><img
                                                src="{{URL::asset('build/img/doctor-grid/doctor-list-05.jpg')}}" alt=""></a>
                                        <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                            <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>5.0</span>
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
                                                                <a href="{{url('doctor-profile')}}">Dr. Michael Brown</a>
                                                                <i class="isax isax-tick-circle5 text-success ms-2"></i>
                                                            </h6>
                                                            <p class="mb-2"> B.S, M.S - Psychology</p>
                                                            <p class="d-flex align-items-center mb-0 fs-14"><i
                                                                    class="isax isax-location me-2"></i>Minneapolis, MN
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
                                                                German
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i class="isax isax-like-1 text-dark me-2"></i>90% (228 /
                                                                240 Votes)
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14">
                                                                <i class="isax isax-archive-14 text-dark me-2"></i>18 Years
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
                                                        <h3 class="text-orange">$400</h3>
                                                    </div>
                                                    <p class="mb-0">Next available at <br>04:00 PM - 20 Nov, Wed</p>
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
                                                src="{{URL::asset('build/img/doctor-grid/doctor-list-06.jpg')}}" alt=""></a>
                                        <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                            <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.6</span>
                                            <a href="javascript:void(0)" class="fav-icon">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                            <a href="#" class="text-pink fw-medium fs-14">Pediatrician</a>
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
                                                                <a href="{{url('doctor-profile')}}">Dr. Nicholas Tello</a>
                                                                <i class="isax isax-tick-circle5 text-success ms-2"></i>
                                                            </h6>
                                                            <p class="mb-2">MBBS, MD - Pediatrics</p>
                                                            <p class="d-flex align-items-center mb-0 fs-14"><i
                                                                    class="isax isax-location me-2"></i>Ogden, IA
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
                                                                Korean
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i class="isax isax-like-1 text-dark me-2"></i>95% (200 /
                                                                220 Votes)
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
                                                        <h3 class="text-orange">$400</h3>
                                                    </div>
                                                    <p class="mb-0">Next available at <br>11:00 AM - 14 Nov, Thu</p>
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
                                                src="{{URL::asset('build/img/doctor-grid/doctor-list-07.jpg')}}" alt=""></a>
                                        <div class="grid-overlay-item d-flex align-items-center justify-content-between">
                                            <span class="badge bg-orange"><i class="fa-solid fa-star me-1"></i>4.4</span>
                                            <a href="javascript:void(0)" class="fav-icon">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-center justify-content-between border-bottom p-3">
                                            <a href="#" class="text-info fw-medium fs-14">Cardiologist</a>
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
                                                                <a href="{{url('doctor-profile')}}">Dr. Tyrone Patrick</a>
                                                                <i class="isax isax-tick-circle5 text-success ms-2"></i>
                                                            </h6>
                                                            <p class="mb-2">MBBS, MD - Cardialogy</p>
                                                            <p class="d-flex align-items-center mb-0 fs-14"><i
                                                                    class="isax isax-location me-2"></i>Clark Fork, ID
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
                                                                Russian
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14 mb-2">
                                                                <i class="isax isax-like-1 text-dark me-2"></i>97% (232 /
                                                                248 Votes)
                                                            </p>
                                                            <p class="d-flex align-items-center mb-0 fs-14">
                                                                <i class="isax isax-archive-14 text-dark me-2"></i>22 Years
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
                                                        <h3 class="text-orange">$400</h3>
                                                    </div>
                                                    <p class="mb-0">Next available at <br>06:00 PM - 29 Nov, Fri</p>
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
            </div>

        </div>
    </div>
    <!-- /Page Content -->
@endsection