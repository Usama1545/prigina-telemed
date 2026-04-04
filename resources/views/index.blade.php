<?php $page = 'index'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Home Banner -->
    <section class="banner-section banner-sec-one">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7">
                    <div class="banner-content wow fadeInUp" data-wow-duration="1s">
                        <div class="rating-appointment">
                            <div class="avatar-list-stacked avatar-group-lg">
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-22.jpg') }}" alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-23.jpg') }}" alt="img">
                                </span>
                                <span class="avatar avatar-rounded">
                                    <img class="border border-white"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-24.jpg') }}" alt="img">
                                </span>
                            </div>
                            <div>
                                <p class="mb-1 avatar-ttile">5K+ Appointments</p>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-star me-1"></i>
                                        <i class="fa-solid fa-star me-1"></i>
                                        <i class="fa-solid fa-star me-1"></i>
                                        <i class="fa-solid fa-star me-1"></i>
                                        <i class="fa-solid fa-star me-1"></i>
                                    </div>
                                    <p class="rating ms-2">5.0 Ratings</p>
                                </div>
                            </div>
                        </div>
                        <h1 class="title">Discover Health: Find Your Trusted <span class="banner-icon"><img
                                    src="{{ URL::asset('build/img/icons/video.svg') }}" alt="img"></span> Doctors Today
                        </h1>
                        <div class="search-box-one wow fadeInDown" data-wow-duration="1s">
                            <form action="{{ url('search-2') }}">
                                <div class="search-input search-line">
                                    <div class="select-item">
                                        <i class="isax isax-main-component5"></i>
                                        <select class="select">
                                            <option>Select Speciality</option>
                                            <option>Cardiology</option>
                                            <option>Neurology</option>
                                            <option>Orthopedics</option>
                                            <option>Paediatrics</option>
                                            <option>Psychiatry</option>
                                            <option>Urology</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input search-map-line">
                                    <i class="isax isax-search-normal"></i>
                                    <div class=" mb-0">
                                        <input type="text" class="form-control"
                                            placeholder="Search for Medical Procedures, hospitals">
                                    </div>
                                </div>
                                <div class="form-search-btn">
                                    <button class="btn btn-primary btn-primary" type="submit">Search</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="banner-img position-relative wow zoomIn" data-wow-duration="1s">
                        <img src="{{ URL::asset('build/img/banner/banner-doctor.svg') }}" class="img-fluid"
                            alt="patient-image">

                        <div class="call-info">
                            <div class="call-item">
                                <a href="#" class="item-1 item"><i class="isax isax-video"></i></a>
                                <a href="#" class="item-2 item"><i class="isax isax-call-slash"></i></a>
                                <a href="#" class="item-3 item"><i class="isax isax-microphone-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-bg">
            <img src="{{ URL::asset('build/img/bg/banner-element-01.png') }}" alt="img" class="banner-element-01">
            <img src="{{ URL::asset('build/img/bg/banner-element-02.png') }}" alt="img" class="banner-element-02">
            <img src="{{ URL::asset('build/img/bg/banner-element-03.png') }}" alt="img" class="banner-element-03">
            <img src="{{ URL::asset('build/img/bg/banner-star.svg') }}" alt="img" class="banner-element-04">
            <img src="{{ URL::asset('build/img/bg/banner-star.svg') }}" alt="img" class="banner-element-05">
            <img src="{{ URL::asset('build/img/bg/banner-star.svg') }}" alt="img" class="banner-element-06">
        </div>
    </section>
    <!-- /Home Banner -->

    <!-- List -->
    <div class="list-section">
        <div class="container">
            <div class="list-card card mb-0 overflow-hidden">
                <div class="card-body">
                    <div class="list-wraps">
                        <h6>
                            <a href="{{ url('booking') }}" class="list-item wow fadeInUp" data-wow-duration="1s">
                                <div class="list-icon bg-secondary">
                                    <img src="{{ URL::asset('build/img/icons/list-icon-01.svg') }}" alt="img">
                                </div>
                                Book Appointment
                            </a>
                        </h6>
                        <h6>
                            <a href="{{ url('doctor-grid') }}" class="list-item wow fadeInUp" data-wow-duration="1.5s">
                                <div class="list-icon bg-primary">
                                    <img src="{{ URL::asset('build/img/icons/list-icon-02.svg') }}" alt="img">
                                </div>
                                Talk to Doctors
                            </a>
                        </h6>
                        <h6>
                            <a href="{{ url('index-3') }}" class="list-item wow fadeInUp" data-wow-duration="2.5s">
                                <div class="list-icon bg-cyan">
                                    <img src="{{ URL::asset('build/img/icons/list-icon-04.svg') }}" alt="img">
                                </div>
                                Healthcare
                            </a>
                        </h6>
                        <h6>
                            <a href="{{ url('index-13') }}" class="list-item wow fadeInUp" data-wow-duration="3s">
                                <div class="list-icon bg-purple">
                                    <img src="{{ URL::asset('build/img/icons/list-icon-05.svg') }}" alt="img">
                                </div>
                                Medicine prescriptions
                            </a>
                        </h6>
                        <h6>
                            <a href="{{ url('index-13') }}" class="list-item wow fadeInUp" data-wow-duration="4s">
                                <div class="list-icon bg-teal">
                                    <img src="{{ URL::asset('build/img/icons/list-icon-07.svg') }}" alt="img">
                                </div>
                                <h6>Home Care</h6>
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /List -->

    <!-- Speciality Section -->
    <section class="speciality-section section overflow-hidden">
        <div class="container">
            <div class="section-header section-header-one text-center wow fadeInUp" data-wow-duration="1s">
                <div class="title">Top Specialties</div>
                <h2 class="section-title">Highlighting the <span class="text-primary">Care & Support</span></h2>
            </div>
            <div class="speciality-slider-info">
                <div class="spciality-slider">
                    @foreach ($categories as $category)
                        <div class="slide-item wow fadeInUp" data-wow-duration="1s">
                            <div class="spaciality-item">
                                <div class="spaciality-img">
                                    <a href="{{ url('doctors?category=' . $category['name']) }}">
                                        <img src="{{ asset('build/img/specialities/speciality-01.jpg') }}"
                                            alt="img">

                                        <span class="spaciality-icon">
                                            <i class="fa fa-{{ $category['icon'] }}"></i>
                                        </span>
                                    </a>
                                </div>

                                <h3 class="custom-title">
                                    <a href="{{ url('doctors?category=' . $category['name']) }}">
                                        {{ $category['name'] }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="slide-btn">
                    <button type="button" class="slick-arrow spciality-prev"><i
                            class="isax isax-arrow-left"></i></button>
                    <button type="button" class="slick-arrow spciality-next"><i
                            class="isax isax-arrow-right-1"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="doctor-section section">
        <div class="container">
            <div class="section-header section-header-one text-center wow fadeInUp" data-wow-duration="1s">
                <div class="title">Featured Doctors</div>
                <h2 class="section-title"> Our <span class="text-primary">Highlighted </span>Doctor</h2>
            </div>

            <div class="doctors-slider">

                <!-- Item 1 -->
                @foreach ($doctors as $doctor)
                    <div class="slide-item wow fadeInUp" data-wow-duration="1s">
                        <div class="card doctor-item">
                            <div class="card-img card-img-hover">
                                <a href="{{ url('doctor-profile', $doctor['id']) }}"><img
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
                                <div class="doctor-info">
                                    <div class="doctor-info-detail">
                                        <h3 class="mb-1 custom-title"><a
                                                href="{{ url('doctor-profile', $doctor['id']) }}">{{ $doctor['name'] }}</a>
                                        </h3>
                                        <div class="doctor-location">
                                            <p class="location-title"></i><span class="fw-medium">Experience:
                                                    {{ $doctor['experience'] }}</span>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="doctor-footer">
                                        <div>
                                            <p class="mb-1">Consultation Fees</p>
                                            <div class="price">{{ $doctor['consultationFee'] }}</div>
                                        </div>
                                        <a href="{{ url('booking', $doctor['id']) }}" class="btn btn-md book-btn">
                                            <i class="isax isax-calendar-1 icon-1"></i>
                                            <i class="isax isax-export-3 icon-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- /Doctor Section -->

    <!-- Services Section -->
    <section class="services-section wow fadeInUp" data-wow-duration="1s">
        <div class="horizontal-slide d-flex" data-direction="right" data-speed="slow">
            <div class="slide-list d-flex gap-4">
                <div class="services-slide">
                    <h6><a href="#">Multi Speciality Treatments & Doctors</a></h6>
                </div>
                <div class="services-slide">
                    <h6><a href="#">Lab Testing Services</a></h6>
                </div>
                <div class="services-slide">
                    <h6><a href="#">Medecines & Supplies</a></h6>
                </div>
                <div class="services-slide">
                    <h6><a href="#">Hospitals & Clinics</a></h6>
                </div>
                <div class="services-slide">
                    <h6><a href="#">Health Care Services</a></h6>
                </div>
                <div class="services-slide">
                    <h6><a href="#">Talk to Doctors</a></h6>
                </div>
                <div class="services-slide">
                    <h6><a href="#">Home Care Services</a></h6>
                </div>
            </div>
        </div>
    </section>
    <!-- /Services Section -->

    <!-- Reasons Section -->
    <section class="reason-section section">
        <div class="container">
            <div class="section-header section-header-one text-center wow fadeInUp" data-wow-duration="1s">
                <div class="title">Why Book With Us</div>
                <h2 class="section-title"> Compelling <span class="text-primary">Reasons </span>to Choose</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="reason-item wow fadeInUp" data-wow-duration="1s">
                        <div class="avatar bg-soft-orange">
                            <i class="isax isax-tag-user5 text-orange"></i>
                        </div>
                        <h3 class="custom-title">Follow-Up Care</h3>
                        <p>We ensure continuity of care through regular follow-ups and communication, helping you stay on
                            track with health goals.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="reason-item wow fadeInUp" data-wow-duration="1s">
                        <div class="avatar bg-soft-primary">
                            <i class="isax isax-voice-cricle text-primary"></i>
                        </div>
                        <h3 class="custom-title">Patient-Centered</h3>
                        <p>We prioritize your comfort and preferences, tailoring our services to meet your individual needs
                            and Care from Our Experts</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="reason-item wow fadeInUp" data-wow-duration="1s">
                        <div class="avatar bg-light">
                            <i class="isax isax-wallet-add-15 text-cyan"></i>
                        </div>
                        <h3 class="custom-title">Convenient Access</h3>
                        <p>Easily book appointments online or through our dedicated customer service team, with flexible
                            hours to fit your schedule.</p>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/reason-bg-one.png') }}" alt="element" class="img-fluid element-01">
        <img src="{{ URL::asset('build/img/bg/reason-bg-two.png') }}" alt="element" class="img-fluid element-02">
    </section>
    <!-- /Reasons Section -->

    <!-- Bookus Section -->
    <section class="bookus-section bg-dark section">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <div class="bookus-img pe-lg-4">
                        <div class="row g-3">
                            <div class="col-md-12 wow fadeInUp" data-wow-duration="1s">
                                <img src="{{ URL::asset('build/img/book-01.jpg') }}" alt="img"
                                    class="img-fluid img-1">
                            </div>
                            <div class="col-sm-6 wow fadeInUp" data-wow-duration="1s">
                                <img src="{{ URL::asset('build/img/book-02.jpg') }}" alt="img"
                                    class="img-fluid img-1">
                            </div>
                            <div class="col-sm-6 wow fadeInUp" data-wow-duration="1s">
                                <img src="{{ URL::asset('build/img/book-03.jpg') }}" alt="img"
                                    class="img-fluid img-1">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-header section-header-one wow fadeInUp" data-wow-duration="1s">
                        <div class="title">About Us</div>
                        <h2 class="section-title"> We are committed to <br> understanding your <span
                                class="text-gradient">unique <br> needs and delivering care. </span></h2>
                        <p>As a trusted health as a trusted healthcare provider in our community, we are passionate about
                            promoting health and wellness beyond the clinic.</p>
                    </div>
                    <div class="faq-info wow fadeInUp" data-wow-duration="1s">
                        <div class="accordion" id="faq-details">

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingTen">
                                    <a href="#" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="true">
                                        Our Vision
                                    </a>
                                </h3>
                                <div id="collapseSix" class="accordion-collapse collapse show"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>We envision a community where everyone has access to high-quality healthcare
                                                and the resources they need to lead healthy, fulfilling lives.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingEleven">
                                    <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven" aria-controls="collapseSeven">
                                        Our Mission
                                    </a>
                                </h3>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    data-bs-parent="#faq-details">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>We envision a community where everyone has access to high-quality healthcare
                                                and the resources they need to lead healthy, fulfilling lives.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="bookus-sec">
                <div class="row g-5">
                    <div class="col-xl-3 col-md-6">
                        <div class="book-item wow fadeInUp" data-wow-duration="1s">
                            <div class="book-icon bg-primary">
                                <i class="isax isax-search-normal5"></i>
                            </div>
                            <div class="book-info">
                                <h3 class="custom-title">Search For Doctors</h3>
                                <p>Search for a doctor based on specialization, location, or availability for your
                                    Treatements</p>
                            </div>
                            <div class="way-icon">
                                <img src="{{ URL::asset('build/img/icons/way-icon.svg') }}" alt="img">
                            </div>
                            <div class="book-no">
                                <h4>01</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="book-item wow fadeInUp" data-wow-duration="1.5s">
                            <div class="book-icon bg-orange">
                                <i class="isax isax-security-user5"></i>
                            </div>
                            <div class="book-info">
                                <h3 class="custom-title">Check Doctor Profile</h3>
                                <p>Explore detailed doctor profiles on our platform to make informed healthcare decisions.
                                </p>
                            </div>
                            <div class="way-icon">
                                <img src="{{ URL::asset('build/img/icons/way-icon.svg') }}" alt="img">
                            </div>
                            <div class="book-no">
                                <h4>02</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="book-item wow fadeInUp" data-wow-duration="2s">
                            <div class="book-icon bg-cyan">
                                <i class="isax isax-calendar5"></i>
                            </div>
                            <div class="book-info">
                                <h3 class="custom-title">Schedule Appointment</h3>
                                <p>After choose your preferred doctor, select a convenient time slot, & confirm your
                                    appointment.</p>
                            </div>
                            <div class="way-icon">
                                <img src="{{ URL::asset('build/img/icons/way-icon.svg') }}" alt="img">
                            </div>
                            <div class="book-no">
                                <h4>03</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="book-item wow fadeInUp" data-wow-duration="2.5s">
                            <div class="book-icon bg-indigo">
                                <i class="isax isax-blend5"></i>
                            </div>
                            <div class="book-info">
                                <h3 class="custom-title">Get Your Solution</h3>
                                <p>Discuss your health with the doctor and the personalized advice & with solution.</p>
                            </div>
                            <div class="book-no">
                                <h4>04</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/aboutus-bg.png') }}" alt="element" class="element-01">
        <img src="{{ URL::asset('build/img/bg/aboutus-bg-one.png') }}" alt="element" class="element-02">
    </section>
    <!-- /Bookus Section -->

    <!-- Testimonial Section -->
    <section class="testimonial-section-one section">
        <div class="container">
            <div class="section-header section-header-one text-center wow fadeInUp" data-wow-duration="1s">
                <div class="title">Testimonials</div>
                <h2 class="section-title"> 15k Users <span class="text-primary">Trust PriGina Global Telemed
                    </span>Worldwide </h2>
            </div>

            <!-- Testimonial Slider -->
            <div class="testimonials-slider ">
                <!-- Item 1 -->
                <div class="slide-item">
                    <div class="testimonials-item wow fadeInUp" data-wow-duration="1s">
                        <div class="testimonials-info">
                            <div class="review-star justify-content-between">
                                <div class="rating d-flex">
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                </div>
                                <span>
                                    <img src="{{ URL::asset('build/img/icons/quote-icon.svg') }}" alt="img">
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <h3 class="title">Nice Treatment</h3>
                                <p class="description">I had a wonderful experience the staff was friendly and attentive,
                                    and Dr. Smith took the time to explain everything clearly.</p>
                            </div>
                            <div class="testimonial-author">
                                <a href="#" class="avatar avatar-lg">
                                    <img src="{{ URL::asset('build/img/patients/patient22.jpg') }}"
                                        class="rounded-circle" alt="img">
                                </a>
                                <div>
                                    <p class="author-name"><a href="#">Deny Hendrawan</a></p>
                                    <p class="author-location">United States</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="slide-item">
                    <div class="testimonials-item wow fadeInUp" data-wow-duration="2s">
                        <div class="testimonials-info">
                            <div class="review-star justify-content-between">
                                <div class="rating d-flex">
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                </div>
                                <span>
                                    <img src="{{ URL::asset('build/img/icons/quote-icon.svg') }}" alt="img">
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <h3 class="title">Nice Support</h3>
                                <p class="description">My experience was excellent. The staff was polite and attentive, and
                                    the doctor took the time to explain every step clearly.</p>
                            </div>
                            <div class="testimonial-author">
                                <a href="#" class="avatar avatar-lg">
                                    <img src="{{ URL::asset('build/img/patients/patient2.jpg') }}" class="rounded-circle"
                                        alt="img">
                                </a>
                                <div>
                                    <p class="author-name"><a href="#">Brooks Steave</a></p>
                                    <p class="author-location">Dallas, CA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="slide-item">
                    <div class="testimonials-item wow fadeInUp" data-wow-duration="3s">
                        <div class="testimonials-info">
                            <div class="review-star justify-content-between">
                                <div class="rating d-flex">
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                </div>
                                <span>
                                    <img src="{{ URL::asset('build/img/icons/quote-icon.svg') }}" alt="img">
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <h3 class="title">Excellent Service</h3>
                                <p class="description">I had a wonderful experience the staff was friendly and attentive,
                                    and Dr. Smith took the time to explain everything clearly.</p>
                            </div>
                            <div class="testimonial-author">
                                <a href="#" class="avatar avatar-lg">
                                    <img src="{{ URL::asset('build/img/patients/patient23.jpg') }}"
                                        class="rounded-circle" alt="img">
                                </a>
                                <div>
                                    <p class="author-name"><a href="#">Sofia Doe</a></p>
                                    <p class="author-location">Los Boston, USA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="slide-item">
                    <div class="testimonials-item wow fadeInUp" data-wow-duration="4s">
                        <div class="testimonials-info">
                            <div class="review-star justify-content-between">
                                <div class="rating d-flex">
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled me-1"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                </div>
                                <span>
                                    <img src="{{ URL::asset('build/img/icons/quote-icon.svg') }}" alt="img">
                                </span>
                            </div>
                            <div class="testimonial-content">
                                <h3 class="title">Good Hospitability</h3>
                                <p class="description">Genuinely cares about his patients. He helped me understand my
                                    condition and worked with me to create a plan.</p>
                            </div>
                            <div class="testimonial-author">
                                <a href="#" class="avatar avatar-lg">
                                    <img src="{{ URL::asset('build/img/patients/patient21.jpg') }}"
                                        class="rounded-circle" alt="img">
                                </a>
                                <div>
                                    <p class="author-name"><a href="#">Johnson DWayne</a></p>
                                    <p class="author-location">San Francisco, CA</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Testimonial Slider -->

            <!-- Counter -->
            <div class="testimonial-counter">
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
                    <div class="counter-item text-center wow fadeInUp" data-wow-duration="1s">
                        <h4 class="display-6 success-count"><span class="count-digit">500</span>+</h4>
                        <p>Doctors Available</p>
                    </div>
                    <div class="counter-item text-center wow fadeInUp" data-wow-duration="1s">
                        <h4 class="display-6 secondary-count"><span class="count-digit">18</span>+</h4>
                        <p>Specialities</p>
                    </div>
                    <div class="counter-item text-center wow fadeInUp" data-wow-duration="1s">
                        <h4 class="display-6 purple-count"><span class="count-digit">30</span>K</h4>
                        <p>Bookings Done</p>
                    </div>
                    <div class="counter-item text-center wow fadeInUp" data-wow-duration="1s">
                        <h4 class="display-6 pink-count"><span class="count-digit">97</span>+</h4>
                        <p>Hospitals & Clinic</p>
                    </div>
                    <div class="counter-item text-center wow fadeInUp" data-wow-duration="1s">
                        <h4 class="display-6 warning-count"><span class="count-digit">317</span>+</h4>
                        <p>Lab Tests Available</p>
                    </div>
                </div>
            </div>
            <!-- /Counter -->

        </div>
    </section>
    <!-- /Testimonial Section -->


    <!-- FAQ Section -->
    <section class="faq-section-one section">
        <div class="container">
            <div class="section-header section-header-one text-center wow fadeInUp" data-wow-duration="1s">
                <div class="title">FAQ'S</div>
                <h2 class="section-title"> Your Questions are <span class="text-primary">Answered </span> </h2>
            </div>

            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="faq-info wow zoomIn" data-wow-duration="1s">
                        <div class="accordion" id="faq-details-one">

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne">
                                    <a href="#" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How do I book an appointment with a doctor?
                                    </a>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#faq-details-one">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a
                                                doctor based on specialization, location, or availability & confirm your
                                                booking.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingTwo">
                                    <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Can I request a specific doctor when booking my appointment?
                                    </a>
                                </h3>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#faq-details-one">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, you can usually request a specific doctor when booking your appointment,
                                                though availability may vary based on their schedule.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingThree">
                                    <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        What should I do if I need to cancel or reschedule my appointment?
                                    </a>
                                </h3>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#faq-details-one">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>If you need to cancel or reschedule your appointment, contact the doctor as
                                                soon as possible to inform them and to reschedule for another available time
                                                slot.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFour">
                                    <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        What if I'm running late for my appointment?
                                    </a>
                                </h3>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    data-bs-parent="#faq-details-one">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>If you know you will be late, it's courteous to call the doctor's office and
                                                inform them. Depending on their policy and schedule, they may be able to
                                                accommodate you or reschedule your appointment.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFive">
                                    <a href="#" class="accordion-button collapsed" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        Can I book appointments for family members or dependents?
                                    </a>
                                </h3>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    data-bs-parent="#faq-details-one">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, in many cases, you can book appointments for family members or
                                                dependents. However, you may need to provide their personal information and
                                                consent to do so.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/faq-bg.png') }}" alt="element" class="img-fluid element-01">
        <img src="{{ URL::asset('build/img/bg/faq-bg-one.png') }}" alt="element" class="img-fluid element-02">
    </section>
    <!-- /FAQ Section -->

    <!-- App Section -->
    <section class="app-section app-sec-one p-0">
        <div class="container">
            <div class="app-bg">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="app-content d-flex flex-column justify-content-center">

                            <div class="section-header section-header-one wow fadeInUp" data-wow-duration="1s">
                                <p class="mt-0 mb-0">Working for Your Better Health.</p>
                                <h2 class="section-title"> Download the PriGina Global Telemed App today! </h2>
                            </div>
                            <div class="google-imgs wow fadeInUp" data-wow-duration="1s">
                                <a href="#"><img src="{{ URL::asset('build/img/icons/app-store.svg') }}"
                                        alt="img"></a>
                                <a href="#"><img src="{{ URL::asset('build/img/icons/google-play.svg') }}"
                                        alt="img"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 wow fadeInUp" data-wow-duration="1s">
                        <div class="mobile-img">
                            <img src="{{ URL::asset('build/img/mobile-img.png') }}" class="img-fluid" alt="img">
                        </div>
                    </div>
                </div>
                <div class="app-bgs">
                    <img src="{{ URL::asset('build/img/bg/app-bg-02.png') }}" alt="img" class="app-bg-01">
                    <img src="{{ URL::asset('build/img/bg/app-bg-03.png') }}" alt="img" class="app-bg-02">
                    <img src="{{ URL::asset('build/img/bg/app-bg-04.png') }}" alt="img" class="app-bg-03">
                </div>
            </div>
        </div>
    </section>
    <!-- /App Section -->



    <!-- Info Section -->
    <section class="info-section mt-3">
        <div class="container">
            <div class="contact-info">
                <div class="info-col">
                    <div class="wow fadeInUp" data-wow-duration="1s">
                        <h3 class="info-title">Working for Your Better Health.</h3>
                    </div>
                    <div class="support-info wow fadeInUp" data-wow-duration="1s">
                        <div class="con-info">
                            <span class="con-icon">
                                <i class="isax isax-headphone5"></i>
                            </span>
                            <div class="con-details">
                                <p class="title">Customer Support</p>
                                <p class="description">+1 56589 54598</p>
                            </div>
                        </div>
                        <div class="con-info">
                            <span class="con-icon">
                                <i class="isax isax-message-25"></i>
                            </span>
                            <div class="con-details">
                                <p class="title">Drop Us an Email</p>
                                <p class="description">info1256@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="{{ URL::asset('build/img/bg/info-bg.png') }}" alt="element" class="img-fluid element-01">
            </div>
        </div>
    </section>
    <!-- /Info Section -->
@endsection
