<?php $page = 'about-us'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['li_1' => 'About Us', 'li_2' => 'About Us'])
    @endcomponent

    <!-- About Us -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-img-info">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-inner-img">
                                    <div class="about-img">
                                        <img src="{{URL::asset('build/img/about-img1.jpg')}}" class="img-fluid" alt="about-image">
                                    </div>
                                    <div class="about-img">
                                        <img src="{{URL::asset('build/img/about-img2.jpg')}}" class="img-fluid" alt="about-image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-inner-img">
                                    <div class="about-box">
                                        <h4>Over 25+ Years Experience</h4>
                                    </div>
                                    <div class="about-img">
                                        <img src="{{URL::asset('build/img/about-img3.jpg')}}" class="img-fluid" alt="about-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="section-inner-header about-inner-header">
                        <h6>About Our Company</h6>
                        <h2>We Are Always Ensure Best Medical Treatment For Your Health</h2>
                    </div>
                    <div class="about-content">
                        <div class="about-content-details">
                            <p>At PriGina Global Telemed, we understand the importance of accessible and convenient healthcare. Our mission is to simplify the process of finding and booking appointments with qualified healthcare professionals, ensuring that you receive the care you need when you need it.</p>
                            <p>We envision a world where healthcare is easily accessible to everyone. Whether you're seeking routine check-ups, specialized consultations, or emergency care, we strive to connect you with the right medical professionals effortlessly.</p>
                        </div>
                        <div class="about-contact">
                            <div class="about-contact-icon">
                                <span><i class="isax isax-call-calling5"></i></span>
                            </div>
                            <div class="about-contact-text">
                                <p>Need Emergency?</p>
                                <h4>+1 315 369 5943</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /About Us -->

    <!-- Why Choose Us -->
    <section class="why-choose-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-inner-header text-center">
                        <h2>Why Choose Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card why-choose-card w-100">
                        <div class="card-body">
                            <div class="why-choose-icon">
                                <span><img src="{{URL::asset('build/img/icons/choose-01.svg')}}" alt="choose-image"></span>
                            </div>
                            <div class="why-choose-content">
                                <h4>Qualified Staff of Doctors</h4>
                                <p>Our platform exclusively partners with highly qualified doctors who bring expertise & commitment to delivering top-notch healthcare.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card why-choose-card w-100">
                        <div class="card-body">
                            <div class="why-choose-icon">
                                <span><img src="{{URL::asset('build/img/icons/choose-02.svg')}}" alt="choose-image"></span>
                            </div>
                            <div class="why-choose-content">
                                <h4>24 Hours Service</h4>
                                <p>Experience the healthcare access with our 24/7 service. Whether it's day or night, you can find & book appointments.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card why-choose-card w-100">
                        <div class="card-body">
                            <div class="why-choose-icon">
                                <span><img src="{{URL::asset('build/img/icons/choose-03.svg')}}" alt="choose-image"></span>
                            </div>
                            <div class="why-choose-content">
                                <h4>Quality Lab Services</h4>
                                <p>Partnering with accredited labs, your health is our priority, and our quality lab services reflect our dedication to excellence.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="card why-choose-card w-100">
                        <div class="card-body">
                            <div class="why-choose-icon">
                                <span><img src="{{URL::asset('build/img/icons/choose-04.svg')}}" alt="choose-image"></span>
                            </div>
                            <div class="why-choose-content">
                                <h4>Free Consultations</h4>
                                <p>Your well-being is important, and our commitment to providing accessible care begins with a free initial consultation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Why Choose Us -->

    <!-- Way Section -->
    <section class="way-section">
        <div class="container">
            <div class="way-bg">
                <div class="way-shapes-img">
                    <div class="way-shapes-left">
                        <img src="{{URL::asset('build/img/shape-06.png')}}" alt="shape-image">
                    </div>
                    <div class="way-shapes-right">
                        <img src="{{URL::asset('build/img/shape-07.png')}}" alt="shape-image">
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-lg-7 col-md-12">
                        <div class="section-inner-header way-inner-header mb-0">
                            <h2>Be on Your Way to Feeling Better with the PriGina Global Telemed</h2>
                            <p>Be on your way to feeling better as we prioritize your health journey with personalized and accessible services.</p>
                            <a href="{{url('contact-us')}}" class="btn btn-primary">Contact With Us</a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="way-img">
                            <img src="{{URL::asset('build/img/way-img.png')}}" class="img-fluid" alt="doctor-way-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Way Choose Us -->

    <!-- Doctors Section -->
    <section class="doctors-section professional-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-inner-header text-center">
                        <h2>Best Doctors</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Doctor Item -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="doctor-profile-widget doc-item w-100">
                        <div class="doc-pro-img">
                            <a href="{{url('doctor-profile')}}">
                                <div class="doctor-profile-img">
                                    <img src="{{URL::asset('build/img/doctors/doctor-03.jpg')}}" class="img-fluid" alt="Ruby Perrin">
                                </div>
                            </a>
                            <div class="doctor-amount">
                                <span>$200</span>
                            </div>
                        </div>
                        <div class="doc-content">
                            <div class="doc-pro-info">
                                <div class="doc-pro-name">
                                    <a href="{{url('doctor-profile')}}">Dr. Ruby Perrin</a>
                                    <p>Cardiology</p>
                                </div>
                                <div class="reviews-ratings">
                                    <p>
                                        <span><i class="fas fa-star"></i> 4.5</span> (35)
                                    </p>
                                </div>
                            </div>
                            <div class="doc-pro-location">
                                <p><i class="isax isax-location"></i>Newyork, USA</p>
                                <span class="badge badge-success doc-badge"><i class="fa-solid fa-circle"></i>Available</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Item -->

                <!-- Doctor Item -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="doctor-profile-widget doc-item w-100">
                        <div class="doc-pro-img">
                            <a href="{{url('doctor-profile')}}">
                                <div class="doctor-profile-img">
                                    <img src="{{URL::asset('build/img/doctors/doctor-04.jpg')}}" class="img-fluid" alt="Darren Elder">
                                </div>
                            </a>
                            <div class="doctor-amount">
                                <span>$360</span>
                            </div>
                        </div>
                        <div class="doc-content">
                            <div class="doc-pro-info">
                                <div class="doc-pro-name">
                                    <a href="{{url('doctor-profile')}}">Dr. Darren Elder</a>
                                    <p>Neurology</p>
                                </div>
                                <div class="reviews-ratings">
                                    <p>
                                        <span><i class="fas fa-star"></i> 4.0</span> (20)
                                    </p>
                                </div>
                            </div>
                            <div class="doc-pro-location">
                                <p><i class="isax isax-location"></i>Florida, USA</p>
                                <span class="badge badge-success doc-badge"><i class="fa-solid fa-circle"></i>Available</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Item -->

                <!-- Doctor Item -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="doctor-profile-widget doc-item w-100">
                        <div class="doc-pro-img">
                            <a href="{{url('doctor-profile')}}">
                                <div class="doctor-profile-img">
                                    <img src="{{URL::asset('build/img/doctors/doctor-05.jpg')}}" class="img-fluid" alt="Sofia Brient">
                                </div>
                            </a>
                            <div class="doctor-amount">
                                <span>$450</span>
                            </div>
                        </div>
                        <div class="doc-content">
                            <div class="doc-pro-info">
                                <div class="doc-pro-name">
                                    <a href="{{url('doctor-profile')}}">Dr. Sofia Brient</a>
                                    <p>Urology</p>
                                </div>
                                <div class="reviews-ratings">
                                    <p>
                                        <span><i class="fas fa-star"></i> 4.5</span> (30)
                                    </p>
                                </div>
                            </div>
                            <div class="doc-pro-location">
                                <p><i class="isax isax-location"></i>Georgia, USA</p>
                                <span class="badge badge-danger doc-badge"><i class="fa-solid fa-circle"></i>Unavailable</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Item -->

                <!-- Doctor Item -->
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="doctor-profile-widget doc-item w-100">
                        <div class="doc-pro-img">
                            <a href="{{url('doctor-profile')}}">
                                <div class="doctor-profile-img">
                                    <img src="{{URL::asset('build/img/doctors/doctor-02.jpg')}}" class="img-fluid" alt="Paul Richard">
                                </div>
                            </a>
                            <div class="doctor-amount">
                                <span>$570</span>
                            </div>
                        </div>
                        <div class="doc-content">
                            <div class="doc-pro-info">
                                <div class="doc-pro-name">
                                    <a href="{{url('doctor-profile')}}">Dr. Paul Richard</a>
                                    <p>Orthopedic</p>
                                </div>
                                <div class="reviews-ratings">
                                    <p>
                                        <span><i class="fas fa-star"></i> 4.3</span> (45)
                                    </p>
                                </div>
                            </div>
                            <div class="doc-pro-location">
                                <p><i class="isax isax-location"></i>Michigan, USA</p>
                                <span class="badge badge-success doc-badge"><i class="fa-solid fa-circle"></i>Available</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Doctor Item -->

            </div>
        </div>
    </section>
    <!-- /Doctors Section -->

    <!-- Testimonial Section -->
    <section class="testimonial-section">
        <div class="testimonial-shape-img">
            <div class="testimonial-shape-left">
                <img src="{{URL::asset('build/img/shape-04.png')}}" alt="shape-image">
            </div>
            <div class="testimonial-shape-right">
                <img src="{{URL::asset('build/img/shape-05.png')}}" alt="shape-image">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-slider slick">
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img">
                                    <img src="{{URL::asset('build/img/clients/client-01.jpg')}}" class="img-fluid" alt="client-image">
                                </div>
                                <div class="testimonial-content">
                                    <div class="section-inner-header testimonial-header">
                                        <h6>Testimonials</h6>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>PriGina Global Telemed exceeded my expectations in healthcare. The seamless booking process, coupled with the expertise of the doctors, made my experience exceptional. Their commitment to quality care and convenience truly sets them apart. I highly recommend PriGina Global Telemed for anyone seeking reliable and accessible healthcare services..</p>
                                        <h6><span>John Doe</span> New York</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img">
                                    <img src="{{URL::asset('build/img/clients/client-02.jpg')}}" class="img-fluid" alt="client-image">
                                </div>
                                <div class="testimonial-content">
                                    <div class="section-inner-header testimonial-header">
                                        <h6>Testimonials</h6>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>PriGina Global Telemed exceeded my expectations in healthcare. The seamless booking process, coupled with the expertise of the doctors, made my experience exceptional. Their commitment to quality care and convenience truly sets them apart. I highly recommend PriGina Global Telemed for anyone seeking reliable and accessible healthcare services..</p>
                                        <h6><span>Amanda Warren</span> Florida</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img">
                                    <img src="{{URL::asset('build/img/clients/client-03.jpg')}}" class="img-fluid" alt="client-image">
                                </div>
                                <div class="testimonial-content">
                                    <div class="section-inner-header testimonial-header">
                                        <h6>Testimonials</h6>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>PriGina Global Telemed exceeded my expectations in healthcare. The seamless booking process, coupled with the expertise of the doctors, made my experience exceptional. Their commitment to quality care and convenience truly sets them apart. I highly recommend PriGina Global Telemed for anyone seeking reliable and accessible healthcare services..</p>
                                        <h6><span>Betty Carlson</span> Georgia</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img">
                                    <img src="{{URL::asset('build/img/clients/client-04.jpg')}}" class="img-fluid" alt="client-image">
                                </div>
                                <div class="testimonial-content">
                                    <div class="section-inner-header testimonial-header">
                                        <h6>Testimonials</h6>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>PriGina Global Telemed exceeded my expectations in healthcare. The seamless booking process, coupled with the expertise of the doctors, made my experience exceptional. Their commitment to quality care and convenience truly sets them apart. I highly recommend PriGina Global Telemed for anyone seeking reliable and accessible healthcare services..</p>
                                        <h6><span>Veronica</span> California</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-grid">
                            <div class="testimonial-info">
                                <div class="testimonial-img">
                                    <img src="{{URL::asset('build/img/clients/client-05.jpg')}}" class="img-fluid" alt="client-image">
                                </div>
                                <div class="testimonial-content">
                                    <div class="section-inner-header testimonial-header">
                                        <h6>Testimonials</h6>
                                        <h2>What Our Client Says</h2>
                                    </div>
                                    <div class="testimonial-details">
                                        <p>PriGina Global Telemed exceeded my expectations in healthcare. The seamless booking process, coupled with the expertise of the doctors, made my experience exceptional. Their commitment to quality care and convenience truly sets them apart. I highly recommend PriGina Global Telemed for anyone seeking reliable and accessible healthcare services..</p>
                                        <h6><span>Richard</span> Michigan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Testimonial Section -->

    <!-- FAQ Section -->
    <section class="faq-section faq-section-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-inner-header text-center">
                        <h6>Get Your Answer</h6>
                        <h2>Frequently Asked Questions</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="faq-img">
                        <img src="{{URL::asset('build/img/faq-img.png')}}" class="img-fluid" alt="img">
                        <div class="faq-patients-count">
                            <div class="faq-smile-img">
                                <img src="{{URL::asset('build/img/icons/smiling-icon.svg')}}" alt="icon">
                            </div>
                            <div class="faq-patients-content">
                                <h4><span class="count-digit">95</span>k+</h4>
                                <p>Happy Patients</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="faq-info">
                        <div class="accordion" id="accordionExample">

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <a href="javascript:void(0)" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        How do I book an appointment?
                                    </a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a doctor based on specialization, location, or availability & confirm your booking. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"  data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        Can i make an Appointment Online with White Plains Hospital Kendi?
                                    </a>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a doctor based on specialization, location, or availability & confirm your booking. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <a href="javascript:void(0)"
                                    class="accordion-button collapsed"  data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Is my personal information secure?
                                    </a>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a doctor based on specialization, location, or availability & confirm your booking. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"  data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        Can I cancel or reschedule my appointment?
                                    </a>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a doctor based on specialization, location, or availability & confirm your booking. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /FAQ Item -->

                            <!-- FAQ Item -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <a href="javascript:void(0)" class="accordion-button collapsed"  data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        How do I find a specific doctor or specialist?
                                    </a>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="accordion-content">
                                            <p>Yes, simply visit our website and log in or create an account. Search for a doctor based on specialization, location, or availability & confirm your booking. </p>
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
    </section>
    <!-- /FAQ Section -->
@endsection