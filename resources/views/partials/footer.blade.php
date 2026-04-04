@if (Route::is(['index']))
    <!-- Footer Section -->
    <footer class="footer inner-footer footer-info">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Company</h6>
                                    <ul>
                                        <li><a href="{{ url('about-us') }}">About</a></li>
                                        <li><a href="{{ url('search') }}">Features</a></li>
                                        <li><a href="#">Works</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="#">Locations</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Treatments</h6>
                                    <ul>
                                        <li><a href="{{ url('search') }}">Dental</a></li>
                                        <li><a href="{{ url('search') }}">Cardiac</a></li>
                                        <li><a href="{{ url('search') }}">Spinal Cord</a></li>
                                        <li><a href="{{ url('search') }}">Hair Growth</a></li>
                                        <li><a href="{{ url('search') }}">Anemia & Disorder</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Specialities</h6>
                                    <ul>
                                        <li><a href="{{ url('search') }}">Transplant</a></li>
                                        <li><a href="{{ url('search') }}">Cardiologist</a></li>
                                        <li><a href="{{ url('search') }}">Oncology</a></li>
                                        <li><a href="{{ url('search') }}">Pediatrics</a></li>
                                        <li><a href="{{ url('search') }}">Gynacology</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Utilites</h6>
                                    <ul>
                                        <li><a href="{{ url('pricing') }}">Pricing</a></li>
                                        <li><a href="{{ url('contact-us') }}">Contact</a></li>
                                        <li><a href="{{ url('contact-us') }}">Request A Quote</a></li>
                                        <li><a href="#">Premium Membership</a></li>
                                        <li><a href="#">Integrations</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-7">
                        <div class="footer-widget">
                            <h6 class="footer-title">Newsletter</h6>
                            <p class="mb-2 text-dark">Subscribe & Stay Updated from the PriGina Global Telemed</p>
                            <div class="subscribe-input">
                                <form action="#">
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit"
                                        class="btn btn-md btn-primary-gradient d-inline-flex align-items-center"><i
                                            class="isax isax-send-25 me-1"></i>Send</button>
                                </form>
                            </div>
                            <div class="social-icon">
                                <h6 class="mb-3 footer-title">Connect With Us</h6>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <!-- Copyright -->
                <div class="copyright">
                    <div class="copyright-text mb-0">
                        <p class="mb-0">Copyright © 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                    <!-- Copyright Menu -->
                    <div class="copyright-menu">
                        <ul class="policy-menu mb-0">
                            <li><a href="#">Legal Notice</a></li>
                            <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                        </ul>
                    </div>
                    <!-- /Copyright Menu -->
                    <ul class="payment-method">
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-01.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-02.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-03.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-04.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-05.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-06.svg') }}"
                                    alt="Img"></a></li>
                    </ul>
                </div>
                <!-- /Copyright -->
            </div>
        </div>
    </footer>
    <!-- /Footer Section -->
@endif

@if (Route::is(['index-2']))
    <!-- Footer -->
    <footer class="footer-two">

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-4 col-lg-3 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <img src="{{ URL::asset('build/img/logo-02.svg') }}" alt="logo">
                            </div>
                            <div class="footer-about-content">
                                <p>We are a dedicated Eye Care and Vision Health Center committed to providing advanced,
                                    Diagnostic Treatments.</p>
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);">FB</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">TW</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">LN</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">YT</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-lg-2 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Company</h5>
                            <ul class="footer-menu">
                                <li><a href="{{ url('about-us') }}">About</a></li>
                                <li><a href="{{ url('clinic') }}">Clinics</a></li>
                                <li><a href="{{ url('hospitals') }}">Hospitals</a></li>
                                <li><a href="{{ url('speciality') }}">Specialities</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-contact">
                            <h5 class="footer-title">Need help?</h5>
                            <div class="contact-info">
                                <span>Visit Our Clinic</span>
                                <p>1250 Sunset Boulevard</p>
                            </div>
                            <div class="contact-info">
                                <span>General Inquiries</span>
                                <p><a href="mailto:info@example.com">info@example.com</a></p>
                            </div>
                            <div class="contact-info">
                                <span>Call us on</span>
                                <p><a href="tel:5456564578">+1 54565 64578</a></p>
                            </div>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-lg-4 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Keep in touch with us</h5>
                            <div class="footer-subscribe">
                                <p>Subscribe our newsletter to get the latest news and updates From PriGina Global
                                    Telemed !</p>
                                <div class="subscribe-input">
                                    <form action="#">
                                        <input type="email" class="form-control" placeholder="Enter Email Address">
                                        <button type="submit" class="btn-icon btn btn-primary-gradient"><i
                                                class="isax isax-arrow-right-1"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                </div>
            </div>
            <img src="{{ URL::asset('build/img/bg/footer-bg-06.png') }}" alt="bg" class="footer-bg-01">
            <img src="{{ URL::asset('build/img/bg/footer-bg-07.png') }}" alt="bg" class="footer-bg-02">
        </div>
        <!-- /Footer Top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">

                <!-- Copyright -->
                <div class="copyright">
                    <div class="copyright-text">
                        <p class="mb-0">Copyright &copy; 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                    <div class="copyright-menu">
                        <ul>
                            <li><a href="#">Legal Notice</a></li>
                            <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Copyright End -->

            </div>
        </div>
        <!-- Footer Bottom End -->

    </footer>
    <!-- Footer End -->
@endif

@if (Route::is(['index-3']))
    <!-- Footer -->
    <footer class="footer-three">

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">

                <!-- start row -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-title">
                            <h2 class="section-title">
                                Looking for Professional <br> Dentist for <span>Consultation</span>
                            </h2>
                            <div class="more-btn">
                                <a href="javascript:void(0);" class="btn btn-primary theme-2-btn"><span>Get
                                        Started<span class="icon"><i
                                                class="isax isax-arrow-up-34"></i></span></span></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- start row -->
                        <div class="row footer-row-top">
                            <!-- Menu 1 -->
                            <div class="col-lg-6 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h3 class="footer-title"><i class="fa-solid fa-circle"></i>Company</h3>
                                    <ul>
                                        <li><a href="{{ url('about-us') }}">About</a></li>
                                        <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                                        <li><a href="{{ url('hospitals') }}">Hospitals</a></li>
                                        <li><a href="{{ url('speciality') }}">Specialities</a></li>
                                        <li><a href="{{ url('clinic') }}">Clinics</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Menu 2 -->
                            <div class="col-lg-6 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h3 class="footer-title"><i class="fa-solid fa-circle"></i>For Patients</h3>
                                    <ul>
                                        <li><a href="#">Braces & Aligners</a></li>
                                        <li><a href="#">Cosmetic Dentistry</a></li>
                                        <li><a href="#">Root Canal Specialist</a></li>
                                        <li><a href="#">Teeth Cleaning & Care</a></li>
                                        <li><a href="#">General Dentistry</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- /Footer Top -->

        <!-- Services Section -->
        <section class="slider-section slider-section-three position-relative wow fadeInUp" data-wow-duration="1s">
            <div class="horizontal-slide slide-three d-flex" data-direction="left" data-speed="slow">
                <div class="slide-list d-flex gap-4">
                    <div class="services-slide">
                        <h2>Dental Clinic <img src="{{ URL::asset('build/img/icons/footer-icon-1.svg') }}"
                                alt="" class="img-fluid img-1"> </h2>
                    </div>
                    <div class="services-slide">
                        <h2>Dental Clinic <img src="{{ URL::asset('build/img/icons/footer-icon-2.svg') }}"
                                alt="" class="img-fluid img-1"> </h2>
                    </div>
                    <div class="services-slide">
                        <h2>Dental Clinic <img src="{{ URL::asset('build/img/icons/footer-icon-1.svg') }}"
                                alt="" class="img-fluid img-1"></h2>
                    </div>
                    <div class="services-slide">
                        <h2>Dental Clinic <img src="{{ URL::asset('build/img/icons/footer-icon-2.svg') }}"
                                alt="" class="img-fluid img-1"></h2>
                    </div>
                    <div class="services-slide">
                        <h2>Dental Clinic <img src="{{ URL::asset('build/img/icons/footer-icon-1.svg') }}"
                                alt="" class="img-fluid img-1"></h2>
                    </div>
                    <div class="services-slide">
                        <h2>Dental Clinic <img src="{{ URL::asset('build/img/icons/footer-icon-2.svg') }}"
                                alt="" class="img-fluid img-1"></h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Services Section -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">

                <!-- Copyright -->
                <div class="copyright">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 col-lg-6">
                            <div class="copyright-text">
                                <p class="mb-0">&copy; 2025 PriGina Global Telemed. All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                            <div class="social-icon">
                                <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Copyright -->

            </div>
        </div>
        <!-- /Footer Bottom -->

        <img src="{{ URL::asset('build/img/bg/footer-element-1.png') }}" alt="element" class="img-fluid img-1">
        <img src="{{ URL::asset('build/img/bg/footer-bg-1.png') }}" alt="element" class="img-fluid img-2">

    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-4']))
    <!-- Footer -->
    <footer class="footer-four">

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">

                <div class="row g-4">

                    <div class="col-xl-4 col-lg-3 col-md-6">
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <a href="{{ url('index-4') }}"><img src="{{ URL::asset('build/img/logo-04.svg') }}"
                                        alt="logo" class="img-fluid"></a>
                            </div>
                            <p>Supporting you to keep your child healthy with easy access to high-quality paediatric
                                care.
                            </p>
                            <div class="social-icon">
                                <ul>

                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-title">Company</h4>
                            <ul class="footer-menu">
                                <li><a href="{{ url('about-us') }}">About</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                                <li><a href="{{ url('hospitals') }}">Hospitals</a></li>
                                <li><a href="{{ url('speciality') }}">Specialities</a></li>
                                <li><a href="{{ url('clinic') }}">Clinics</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-title">Services</h4>
                            <ul class="footer-menu">
                                <li><a href="{{ url('search') }}">Newborn & Infant Care</a></li>
                                <li><a href="{{ url('search') }}">Growth & Development</a></li>
                                <li><a href="{{ url('search') }}">Immunizations</a></li>
                                <li><a href="{{ url('search') }}">Common Illness</a></li>
                                <li><a href="{{ url('search') }}">Adolescent Health</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <h4 class="footer-title">Subscribe</h4>
                            <div class="footer-subscribe">
                                <p>Our conversation is just getting started</p>
                                <div class="subscribe-input">
                                    <form action="#">
                                        <input type="email" class="form-control" placeholder="Enter Email Address">
                                        <button type="submit" class="btn-icon btn btn-secondary"><i
                                                class="isax isax-arrow-right-1"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <img src="{{ URL::asset('build/img/bg/footer-bg-09.png') }}" alt="bg" class="footer-bg-02">
            <img src="{{ URL::asset('build/img/bg/footer-bg-10.png') }}" alt="bg" class="footer-bg-03">
            <img src="{{ URL::asset('build/img/bg/footer-bg-11.png') }}" alt="bg" class="footer-bg-04">
        </div>
        <!-- Footer Top End -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright">
                    <div class="copyright-text">
                        <p class="mb-0">Copyright &copy; 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                    <div class="copyright-menu">
                        <ul class="policy-menu">
                            <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ url('terms-condition') }}">Terms and Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->

        <img src="{{ URL::asset('build/img/bg/footer-bg-08.png') }}" alt="bg" class="footer-bg-01">

        <!-- ScrollToTop -->
        <div class="progress-wrap active-progress progress-four">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
                </path>
            </svg>
        </div>
        <!-- ScrollToTop End -->

    </footer>
    <!-- Footer End -->
@endif

@if (Route::is(['index-5']))
    <!-- Footer -->
    <footer class="footer-five">

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-3 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <img src="{{ URL::asset('build/img/logo-white-05.svg') }}" alt="logo">
                            </div>
                            <div class="footer-about-content">
                                <ul class="social-icon">
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!-- /Footer Widget -->
                    </div>

                    <div class="col-lg-2 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget divide-line">
                            <h5 class="footer-title">Company</h5>
                            <ul class="footer-menu">
                                <li><a href="{{ url('about-us') }}">About</a></li>
                                <li><a href="{{ url('clinic') }}">Clinics</a></li>
                                <li><a href="{{ url('hospitals') }}">Hospitals</a></li>
                                <li><a href="{{ url('speciality') }}">Specialities</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- /Footer Widget -->
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-contact divide-line">
                            <h5 class="footer-title">Contact</h5>
                            <div class="contact-info">
                                <span class="title">Call / E-mail</span>
                                <p class="mb-1"><a href="tel:5456564578">+1 54565 64578</a></p>
                                <p><a href="mailto:info@example.com">info@example.com</a></p>
                            </div>
                            <div class="contact-info mb-0">
                                <span class="title">Our Address</span>
                                <p>8432 Mante Highway, Aminaport, USA</p>
                            </div>
                        </div>
                        <!-- /Footer Widget -->
                    </div>

                    <div class="col-lg-4 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Subscribe Newsletter's</h5>
                            <div class="footer-subscribe">
                                <p>Expert insights, health tips, and important updates to help you breathe easier, hear
                                    clearly</p>
                                <div class="subscribe-input">
                                    <form action="#">
                                        <input type="email" class="form-control" placeholder="Enter Email Address">
                                        <button type="submit" class="btn-icon btn btn-primary-gradient"><i
                                                class="isax isax-arrow-right-1"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Footer Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Top -->

        <!-- Services Section -->
        <div class="horizontal-slide slide-five d-flex" data-direction="left" data-speed="slow">
            <div class="slide-list d-flex gap-4">
                <div class="services-slide">
                    <h2>Modern ENT Center </h2>
                </div>
                <div class="services-slide">
                    <h2>Better Everyday Health </h2>
                </div>
                <div class="services-slide">
                    <h2>Advanced ENT Care </h2>
                </div>
                <div class="services-slide">
                    <h2>Modern ENT Center</h2>
                </div>
                <div class="services-slide">
                    <h2>Better Everyday Health</h2>
                </div>
                <div class="services-slide">
                    <h2>Advanced ENT Care</h2>
                </div>
            </div>
        </div>
        <!-- /Services Section -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">

                <!-- Copyright -->
                <div class="copyright text-center">
                    <div class="copyright-text">
                        <p class="mb-0">Copyright &copy; 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                </div>
                <!-- /Copyright -->

            </div>
        </div>
        <!-- /Footer Bottom -->
        <img src="{{ URL::asset('build/img/icons/star-icon.png') }}" alt="star-icon"
            class="img-fluid element-1 star-5">
        <img src="{{ URL::asset('build/img/icons/star-icon.png') }}" alt="star-icon"
            class="img-fluid element-2 star-5">
    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-6']))
    <!-- Footer -->
    <footer class="footer-six footer">

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-5 col-lg-4 col-md-4">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <img src="{{ URL::asset('build/img/logo-06.svg') }}" alt="logo">
                            </div>
                            <p class="description">We’re a trusted veterinary clinic dedicated to keeping<span
                                    class="d-block"> your pets healthy and happy.</span> </p>
                            <div class="footer-about-content">
                                <ul class="social-icon">
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!-- /Footer Widget -->
                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-4">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Company</h5>
                            <ul class="footer-menu">
                                <li><a href="{{ url('about-us') }}">About</a></li>
                                <li><a href="{{ url('clinic') }}">Clinics</a></li>
                                <li><a href="{{ url('hospitals') }}">Hospitals</a></li>
                                <li><a href="{{ url('speciality') }}">Specialities</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- /Footer Widget -->
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Veterinary Services</h5>
                            <ul class="footer-menu">
                                <li><a href="{{ url('about-us') }}">Pet Health Checkups</a></li>
                                <li><a href="{{ url('clinic') }}">Vaccinations & Preventions</a></li>
                                <li><a href="{{ url('hospitals') }}">Surgery & Orthopedics</a></li>
                                <li><a href="{{ url('speciality') }}">Dental Care for Pets</a></li>
                                <li><a href="{{ url('contact-us') }}">Emergency & Critical Care</a></li>
                            </ul>
                        </div>
                        <!-- /Footer Widget -->

                    </div>
                </div>
            </div>
            <img src="{{ URL::asset('build/img/bg/footer-img-1.png') }}" alt="footer-img-1"
                class="img-fluid footer-img-1">
            <img src="{{ URL::asset('build/img/icons/banner-icon-6.png') }}" alt="banner-icon"
                class="img-fluid icon-one">
            <img src="{{ URL::asset('build/img/icons/foot-prints-4.png') }}" alt="banner-icon"
                class="img-fluid icon-two">
        </div>
        <!-- /Footer Top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">

                <!-- Copyright -->
                <div class="copyright">
                    <div class="row justify-content-center g-4">
                        <div class="col-lg-6">
                            <div class="copyright-text">
                                <p class="mb-0">Copyright &copy; 2025 PriGina Global Telemed. All Rights Reserved</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-links">
                                <a href="{{ url('terms-condition') }}">Terms & Conditions</a>
                                <span>/</span>
                                <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Copyright -->

            </div>
        </div>
        <!-- /Footer Bottom -->
    </footer>
    <!-- /Footer -->
@endif

@if (Route::is(['index-7']))
    <!-- Footer -->
    <footer class="footer-seven">
        <div class="footer-top">
            <div class="container">

                <div class="row g-4">

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget footer-about">
                            <div class="footer-logo">
                                <a href="{{ url('index-7') }}"><img src="{{ URL::asset('build/img/logo-07.svg') }}"
                                        alt="logo" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget footer-contact">
                            <h5 class="footer-title">PriGina Global Telemed - USA</h5>
                            <p>1250 Sunset Boulevard, Los Angeles, CA 90026, USA</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget footer-contact">
                            <h5 class="footer-title">PriGina Global Telemed - Canada</h5>
                            <p>123 King Street West, Toronto, ON M5H 1A1, Canada</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget footer-contact">
                            <h5 class="footer-title">Contact Info</h5>
                            <p>+1 89320 43454, +1 32365 54157</p>
                            <p>info@example.com</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-middle">
            <div class="container">
                <div class="footer-links">
                    <ul class="footer-menu">
                        <li><a href="{{ url('index-7') }}">Home</a></li>
                        <li><a href="{{ url('about-us') }}">About</a></li>
                        <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                        <li><a href="{{ url('hospitals') }}">Hospitals</a></li>
                        <li><a href="{{ url('speciality') }}">Specialities</a></li>
                        <li><a href="{{ url('clinic') }}">Clinics</a></li>
                    </ul>
                    <div class="social-icon">
                        <ul>
                            <li>
                                <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright">
                    <div class="copyright-text">&copy; 2025 PriGina Global Telemed</div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
@endif

@if (Route::is(['index-8']))
    <!-- Footer -->
    <footer class="footer-eight footer position-relative">

        <!-- Slide Section -->
        <div class="horizontal-slide slide-eight d-flex" data-direction="left" data-speed="slow">
            <div class="slide-list d-flex gap-4">
                <div class="services-slide">
                    <h2>PERSONALIZED CARE PLANS</h2>
                </div>
                <div class="services-slide">
                    <i class="fa-solid fa-circle"></i>
                </div>
                <div class="services-slide">
                    <h2>EXPERIENCED SPECIALISTS</h2>
                </div>
                <div class="services-slide">
                    <i class="fa-solid fa-circle"></i>
                </div>
                <div class="services-slide">
                    <h2>PERSONALIZED CARE PLANS</h2>
                </div>
                <div class="services-slide">
                    <i class="fa-solid fa-circle"></i>
                </div>
                <div class="services-slide">
                    <h2>EXPERIENCED SPECIALISTS</h2>
                </div>
                <div class="services-slide">
                    <i class="fa-solid fa-circle"></i>
                </div>
            </div>
        </div>
        <!-- /Slide Section -->

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row g-md-5 g-4">
                    <div class="col-xl-5 col-lg-12 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-about">
                            <div class="footer-logo mb-4">
                                <img src="{{ URL::asset('build/img/logo-08.svg') }}" alt="logo">
                            </div>
                            <div class="footer-about-content mb-3">
                                <p class="description">
                                    We are a dedicated Eye Care and Vision Health Center committed to providing
                                    advanced,
                                    compassionate, and personalized treatment
                                </p>
                            </div>
                            <div class="footer-available">
                                <h4 class="title">We Are Available !!</h4>
                                <p class="date">Monday - Friday : 8:30 AM to 6:30 PM</p>
                            </div>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Company</h5>
                            <ul class="footer-menu">
                                <li><a href="{{ url('about-us') }}"><i class="isax isax-arrow-right-3"></i>About</a>
                                </li>
                                <li><a href="{{ url('clinic') }}"><i class="isax isax-arrow-right-3"></i>Clinics</a>
                                </li>
                                <li><a href="{{ url('hospitals') }}"><i
                                            class="isax isax-arrow-right-3"></i>Hospitals</a></li>
                                <li><a href="{{ url('speciality') }}"><i
                                            class="isax isax-arrow-right-3"></i>Specialities</a>
                                </li>
                                <li><a href="{{ url('contact-us') }}"><i class="isax isax-arrow-right-3"></i>Contact
                                        Us</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-xl-2 col-lg-4 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Our Services</h5>
                            <ul class="footer-menu">
                                <li><a href="#"><i class="isax isax-arrow-right-3"></i>Cataract Evaluation</a>
                                </li>
                                <li><a href="#"><i class="isax isax-arrow-right-3"></i>Pediatric Eye Care</a>
                                </li>
                                <li><a href="#"><i class="isax isax-arrow-right-3"></i>LASIK Surgery</a></li>
                                <li><a href="#"><i class="isax isax-arrow-right-3"></i>Glaucoma Screening</a>
                                </li>
                                <li><a href="#"><i class="isax isax-arrow-right-3"></i>Diabetic Eye Care</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Keep in touch with us</h5>
                            <div class="footer-support">
                                <div class="support-item mb-3">
                                    <div class="avatar avatar-lg bg-secondary rounded-circle flex-shrink-0">
                                        <i class="isax isax-location-tick4"></i>
                                    </div>
                                    <div>
                                        <p class="title">Visit Our Clinic</p>
                                        <h5 class="link">1250 Sunset Boulevard, USA</h5>
                                    </div>
                                </div>
                                <div class="support-item mb-3">
                                    <div class="avatar avatar-lg bg-secondary rounded-circle flex-shrink-0">
                                        <i class="isax isax-messages-3"></i>
                                    </div>
                                    <div>
                                        <p class="title">General Inquiries</p>
                                        <h5 class="link"><a href="mailto:info@example.com">info@example.com</a></h5>
                                    </div>
                                </div>
                                <div class="support-item mb-3">
                                    <div class="avatar avatar-lg bg-secondary rounded-circle flex-shrink-0">
                                        <i class="isax isax-call-calling"></i>
                                    </div>
                                    <div>
                                        <p class="title">Emergency Cases</p>
                                        <h5 class="link">+1 24565 89856</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">

                <!-- Copyright -->
                <div class="copyright">
                    <div class="copyright-text">
                        <p class="mb-0">Copyright &copy; 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                    <div class="social-icon">
                        <ul class="d-flex align-items-center gap-2 social-item">
                            <li>
                                <a href="javascript:void(0);" class="social-icon"><i
                                        class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="social-icon"><i
                                        class="fa-brands fa-x-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="social-icon"><i
                                        class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="social-icon"><i
                                        class="fa-brands fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Copyright End -->

            </div>
            <img src="{{ URL::asset('build/img/bg/footer-1.png') }}" alt="footer-bg" class="img-fluid shadow-1">
            <img src="{{ URL::asset('build/img/bg/footer-2.png') }}" alt="footer-bg" class="img-fluid shadow-2">
        </div>
        <!-- Footer Bottom End -->

    </footer>
    <!-- Footer End -->
@endif

@if (Route::is(['index-9']))
    <!-- Footer -->
    <footer class="footer-nine footer">
        <img src="{{ URL::asset('build/img/bg/footer-img-one.png') }}" alt="footer-bg"
            class="img-fluid footer-img-one">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="row g-md-5 g-4">
                    <div class="col-xl-6 col-lg-12 col-md-12">

                        <!-- Footer Widget -->
                        <div class="footer-widget footer-about">
                            <h2 class="title-main">Ready Discover More? Contact Us Today!</h2>
                            <div class="about-popup-item border-0 mb-0 pb-0">
                                <div class="support-item">
                                    <div class="avatar avatar-lg bg-primary rounded-circle">
                                        <i class="isax isax-messages-3"></i>
                                    </div>
                                    <div>
                                        <span class="title">General Inquiries</span>
                                        <p class="link"><a href="mailto:info@example.com">info@example.com</a></p>
                                    </div>
                                </div>
                                <div class="support-item">
                                    <div class="avatar avatar-lg bg-primary rounded-circle">
                                        <i class="isax isax-call-calling"></i>
                                    </div>
                                    <div>
                                        <span class="title">Emergency Cases</span>
                                        <p class="link"><a href="tel:+12456589856">+1 24565 89856</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-xl-3 col-lg-3 col-sm-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h3 class="footer-title">Our Services</h3>
                            <ul class="footer-menu">
                                <li><a href="#">Cataract Evaluation</a></li>
                                <li><a href="#">Pediatric Eye Care</a></li>
                                <li><a href="#">Lasik Surgery</a></li>
                                <li><a href="#">Glaucoma Screening</a></li>
                                <li><a href="#">Diabetic Eye Care</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-xl-3 col-lg-3 col-sm-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h3 class="footer-title">Quick Links</h3>
                            <ul class="footer-menu">
                                <li><a href="{{ url('index-9') }}">Home</a></li>
                                <li><a href="{{ url('about-us') }}">About Us</a></li>
                                <li><a href="#">Services & Plans</a></li>
                                <li><a href="#">Nurses & Caretakers</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->

                    </div>
                </div>
            </div>
            <img src="{{ URL::asset('build/img/bg/footer-bg-one.png') }}" alt="footer-bg"
                class="img-fluid footer-bg-one">
            <img src="{{ URL::asset('build/img/bg/footer-img-2.png') }}" alt="footer-bg"
                class="img-fluid footer-bg-two">
            <img src="{{ URL::asset('build/img/bg/footer-bg-13.png') }}" alt="footer-bg"
                class="img-fluid footer-bg-three">
        </div>
        <!-- /Footer Top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">

                <!-- Copyright -->
                <div class="copyright">
                    <div class="copyright-text">
                        <p class="mb-0">Copyright &copy; 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                    <ul class="d-flex align-items-center gap-2 social-icon-list">
                        <li>
                            <a href="javascript:void(0);" class="social-icon"><i
                                    class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="social-icon"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="social-icon"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="social-icon"><i
                                    class="fa-brands fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- Copyright End -->
                <a href="#" class="back-to-top"><i class="isax isax-arrow-up-25"></i> </a>
            </div>
        </div>
        <!-- Footer Bottom End -->

    </footer>
    <!-- Footer End -->
@endif

@if (Route::is(['index-10']))
    <!-- Footer -->
    <footer class="footer-ten">
        <div class="container">
            <div class="footer-top">

                <div class="row g-4">

                    <div class="col-xl-6 col-md-6 d-flex">
                        <div class="footer-widget footer-about flex-fill">
                            <div>
                                <div class="footer-logo">
                                    <a href="{{ url('index-10') }}"><img
                                            src="{{ URL::asset('build/img/logo-10.svg') }}" alt="logo"
                                            class="img-fluid"></a>
                                </div>
                                <p>Begin your parenthood journey with compassionate experts and advanced fertility care
                                    tailored just for you.</p>
                            </div>
                            <div>
                                <a href="{{ url('booking') }}" class="btn btn-secondary"><i
                                        class="isax isax-calendar-edit me-2"></i>Book Consultaion</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 d-flex">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Company</h5>
                            <ul class="footer-menu">
                                <li><a href="{{ url('about-us') }}">About</a></li>
                                <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                                <li><a href="{{ url('hospitals') }}">Hospitals</a></li>
                                <li><a href="{{ url('speciality') }}">Specialities</a></li>
                                <li><a href="{{ url('blog-grid') }}">Blogs</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">

                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h5 class="footer-title">Our Services</h5>
                            <ul class="footer-menu">
                                <li><a href="{{ url('speciality') }}">Fertility Consultation</a></li>
                                <li><a href="{{ url('speciality') }}">IVF & ICSI Treatments</a></li>
                                <li><a href="{{ url('speciality') }}">IUI Procedures</a></li>
                                <li><a href="{{ url('speciality') }}">Egg Freezing</a></li>
                                <li><a href="{{ url('speciality') }}">Genetic Testing</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->

                    </div>

                </div>
            </div>
            <div class="footer-bottom">
                <div class="copyright">
                    <p class="copyright-text">Copyright &copy; 2025 PriGina Global Telemed. All Rights Reserved</p>
                </div>
            </div>
        </div>

        <img src="{{ URL::asset('build/img/bg/plus-bg.png') }}" alt="icon" class="footer-bg-01">
        <img src="{{ URL::asset('build/img/bg/footer-bg-14.png') }}" alt="icon" class="footer-bg-02">
    </footer>
    <!-- Footer End -->
@endif

@if (Route::is(['index-11']))
    <!-- Footer Section Start -->
    <footer class="footer-eleven footer">
        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">
                <!-- start row-->
                <div class="row g-md-5 g-4">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <!-- Footer Widget -->
                        <div class="footer-widget footer-about">
                            <h2 class="title-main">
                                ENHANCE BEAUTY, BOOST
                                CONFIDENCE, START TODAY!
                            </h2>
                            <div class="subscribe-input">
                                <form action="#">
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit" class="btn-icon btn btn-secondary"><i
                                            class="isax isax-arrow-right-1"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Footer Widget End -->
                    </div>

                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h3 class="footer-title">Company</h3>
                            <ul class="footer-menu">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Hospitals</a></li>
                                <li><a href="#">Specialities</a></li>
                                <li><a href="#">Clinics</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->
                    </div>

                    <div class="col-xl-3 col-lg-3 col-sm-6">
                        <!-- Footer Widget -->
                        <div class="footer-widget">
                            <h3 class="footer-title">Contact</h3>
                            <div class="footer-support">
                                <h4 class="support-title">Call / Email</h4>
                                <a href="tel:+12456589856">+1 24579 54581</a>
                                <a href="mailto:contact@example.com">Info@example.com</a>
                            </div>
                            <div class="footer-support">
                                <h4 class="support-title">Our Address</h4>
                                <p>8432 Mante Highway, Aminaport, USA</p>
                            </div>
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                </div>
                <!-- end row-->
            </div>
            <!-- <img src="{{ URL::asset('build/img/bg/footer-bg-one.png') }}" alt="footer-bg" class="img-fluid footer-bg-one">
                <img src="{{ URL::asset('build/img/bg/footer-img-2.png') }}" alt="footer-bg" class="img-fluid footer-bg-two">
                <img src="{{ URL::asset('build/img/bg/footer-bg-13.png') }}" alt="footer-bg" class="img-fluid footer-bg-three"> -->
        </div>
        <!-- /Footer Top -->

        <div class="footer-bottom">
            <div class="container">
                <!-- start row-->
                <div class="row g-4">
                    <div class="col-lg-5">
                        <ul class="social-icon">
                            <li>
                                <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                            </li>
                        </ul>
                        <div class="copy-right">
                            Copyright © 2025 PriGina Global Telemed. All Rights Reserved
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="animate-refelect-text">
                            <div class="animate-text" data-text="PriGina Global Telemed">PriGina Global Telemed</div>
                        </div>
                    </div>
                </div>
                <!-- start row-->
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/footer-bg-3.png') }}" alt="footer" class="img-fluid shadow-1">
        <img src="{{ URL::asset('build/img/bg/footer-bg-4.png') }}" alt="footer" class="img-fluid shadow-2">
        <img src="{{ URL::asset('build/img/bg/footer-bg-5.png') }}" alt="footer" class="img-fluid shadow-3">
    </footer>
    <!-- Footer Section End -->
@endif

@if (Route::is(['index-12']))
    <!-- Footer Section Start -->
    <footer class="footer-twelve">

        <!-- Footer Top -->
        <div class="footer-top">
            <div class="container">

                <!-- Start row -->
                <div class="row g-4">

                    <div class="col-xl-5 col-lg-4 col-md-12">
                        <div class="footer-widget footer-about">
                            <p class="paragraph">Supporting you to keep your child healthy with easy access to
                                high-quality
                                paediatric care. </p>
                            <div class="footer-logo">
                                <h2 class="text-gradient">PriGina Global Telemed</h2>
                            </div>
                            <ul class="social-icon">
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa-brands fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-support">
                            <h4 class="footer-title">Services</h4>
                            <div class="support-item">
                                <div class="suppor-icon">
                                    <i class="isax isax-call"></i>
                                </div>
                                <a href="callto:">+1 24565 89856</a>
                            </div>
                            <div class="support-item">
                                <div class="suppor-icon">
                                    <i class="isax isax-sms"></i>
                                </div>
                                <a href="mailto:">contact@example.com</a>
                            </div>
                            <div class="support-item mb-0">
                                <div class="suppor-icon">
                                    <i class="isax isax-location"></i>
                                </div>
                                <p class="text-truncate">183 Marina Avenue, Miami, Florida State, USA</p>
                            </div>
                            <img src="{{ URL::asset('build/img/bg/footer-shape-img.png') }}" alt="shape"
                                class="img-fluid footer-shape-img">
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-support">
                            <h4 class="footer-title">Subscribe to get new updates</h4>
                            <div class="footer-subscribe">
                                <div class="subscribe-input">
                                    <form action="#">
                                        <input type="email" class="form-control" placeholder="Enter Email Address">
                                        <button type="submit" class="btn-icon btn btn-secondary"><i
                                                class="isax isax-arrow-right-1"></i></button>
                                    </form>
                                </div>
                            </div>
                            <h5 class="sub-title">Join our Community</h5>
                            <p>Get the latest news, offers, and insights delivered straight to your inbox.</p>
                            <img src="{{ URL::asset('build/img/bg/footer-shape-img.png') }}" alt="shape"
                                class="img-fluid footer-shape-img-1">
                        </div>
                    </div>

                </div>
                <!-- End row -->

                <div class="footer-menus footer-about">
                    <ul class="footer-social-menu">
                        <li><a href="{{ url('about-us') }}">About</a></li>
                        <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                        <li><a href="{{ url('hospitals') }}">Hospitals</a></li>
                        <li><a href="{{ url('speciality') }}">Specialities</a></li>
                        <li><a href="{{ url('clinic') }}">Clinics</a></li>
                    </ul>
                    <ul class="footer-social-menu">
                        <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('terms-condition') }}">Terms & Conditions</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <!-- Footer Top End -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright">
                    <div class="copyright-text">
                        <p class="mb-0">Copyright &copy; 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                    <div class="copyright-menu">
                        <div class="copy-img">
                            <a href="#"><img src="{{ URL::asset('build/img/icons/pay-1.svg') }}"
                                    alt="icon" class="img-fluid pay-1"></a>
                            <a href="#"><img src="{{ URL::asset('build/img/icons/pay-2.svg') }}"
                                    alt="icon" class="img-fluid pay-1"></a>
                            <a href="#"><img src="{{ URL::asset('build/img/icons/pay-3.svg') }}"
                                    alt="icon" class="img-fluid pay-1"></a>
                            <a href="#"><img src="{{ URL::asset('build/img/icons/pay-4.svg') }}"
                                    alt="icon" class="img-fluid pay-1"></a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" class="back-to-top"><i class="isax isax-arrow-up-2"></i> </a>
        </div>
        <!-- Footer Bottom End -->

        <img src="{{ URL::asset('build/img/bg/footer-lab-shadow.png') }}" alt="footer"
            class="img-fluid footer-shadow-img">
        <img src="{{ URL::asset('build/img/bg/footer-lab-img.png') }}" alt="footer"
            class="img-fluid footer-lab-img">

    </footer>
    <!-- Footer Section End -->
@endif

@if (Route::is(['index-13']))
    <!-- footer section start -->
    <footer class="footer footer-thirteen">
        <div class="footer-top">
            <div class="container">

                <!-- start row -->
                <div class="row g-sm-5 g-4">
                    <!--  Menu 1 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                        <div class="footer-widget mt-0">
                            <h4 class="footer-title">About Us</h4>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>
                                    <a href="#">About</a>
                                </li>
                                <li>
                                    <a href="#">Shop</a>
                                </li>
                                <li>
                                    <a href="#">Order Tracking</a>
                                </li>
                                <li>
                                    <a href="#">Offers</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--  Menu 2 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                        <div class="footer-widget">
                            <h4 class="footer-title">Top Categories</h4>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">Pain Relief</a>
                                </li>
                                <li>
                                    <a href="#">Antibiotics</a>
                                </li>
                                <li>
                                    <a href="#">IUI Procedures</a>
                                </li>
                                <li>
                                    <a href="#">Heart Care</a>
                                </li>
                                <li>
                                    <a href="#">Genetic Testing</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--  Menu 3 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                        <div class="footer-widget">
                            <h4 class="footer-title">Best Sellers</h4>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">Supplements</a>
                                </li>
                                <li>
                                    <a href="#">Baby Care</a>
                                </li>
                                <li>
                                    <a href="#">Ayurveda</a>
                                </li>
                                <li>
                                    <a href="#">Surgical & Devices</a>
                                </li>
                                <li>
                                    <a href="#"> BP Medicines</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--  Menu 4 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                        <div class="footer-widget">
                            <h4 class="footer-title">Support</h4>
                            <ul class="footer-menu">
                                <li>
                                    <a href="{{ url('contact-us') }}">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Returns</a>
                                </li>
                                <li>
                                    <a href="#">Prescription Upload</a>
                                </li>
                                <li>
                                    <a href="#">My Account</a>
                                </li>
                                <li>
                                    <a href="#">Customer Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--  Menu 5 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                        <div class="footer-widget">
                            <h4 class="footer-title">Policies</h4>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">Terms</a>
                                </li>
                                <li>
                                    <a href="#">Privacy</a>
                                </li>
                                <li>
                                    <a href="#">Shipping</a>
                                </li>
                                <li>
                                    <a href="#">Payment</a>
                                </li>
                                <li>
                                    <a href="#">Refund</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--  Menu 6 -->
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4">
                        <div class="footer-widget">
                            <h4 class="footer-title">Others</h4>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">Download App</a>
                                </li>
                                <li>
                                    <a href="#">Order Status</a>
                                </li>
                                <li>
                                    <a href="#">Contact Support</a>
                                </li>
                                <li>
                                    <a href="#">WhatsApp Chat</a>
                                </li>
                                <li>
                                    <a href="#">Pharmacy Locator</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div>
            <img src="{{ URL::asset('build/img/icons/footer-thirteen-img.svg') }}" alt="footer"
                class="img-fluid element-1">
            <div class="animated-text">PHARMACY</div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <!-- start row -->
                <div class="row g-4 align-items-center">
                    <div class="col-xl-4 col-lg-12 col-md-12">
                        <p>© 2025 PriGina Global Telemed — Your Health, Our Priority.</p>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <div class="pay-img">
                            <img src="{{ URL::asset('build/img/icons/pay-1.svg') }}" alt="pay"
                                class="img-fluid img-1">
                            <img src="{{ URL::asset('build/img/icons/pay-2.svg') }}" alt="pay"
                                class="img-fluid img-1">
                            <img src="{{ URL::asset('build/img/icons/pay-3.svg') }}" alt="pay"
                                class="img-fluid img-1">
                            <img src="{{ URL::asset('build/img/icons/pay-4.svg') }}" alt="pay"
                                class="img-fluid img-1">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                        <ul class="social-icon">
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-x-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa-brands fa-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>

    </footer>
    <!-- footer section end -->
@endif

@if (
    !Route::is([
        'index',
        'index-2',
        'index-3',
        'index-4',
        'index-5',
        'index-6',
        'index-7',
        'index-8',
        'index-9',
        'index-10',
        'index-11',
        'index-12',
        'index-13',
    ]))
    <!-- Footer Section -->
    <footer class="footer inner-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Company</h6>
                                    <ul>
                                        <li><a href="{{ url('about-us') }}">About</a></li>
                                        <li><a href="{{ url('search') }}">Features</a></li>
                                        <li><a href="#">Works</a></li>
                                        <li><a href="#">Careers</a></li>
                                        <li><a href="{{ url('contact-us') }}">Locations</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Treatments</h6>
                                    <ul>
                                        <li><a href="{{ url('search') }}">Dental</a></li>
                                        <li><a href="{{ url('search') }}">Cardiac</a></li>
                                        <li><a href="{{ url('search') }}">Spinal Cord</a></li>
                                        <li><a href="{{ url('search') }}">Hair Growth</a></li>
                                        <li><a href="{{ url('search') }}">Anemia & Disorder</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Specialities</h6>
                                    <ul>
                                        <li><a href="{{ url('search') }}">Transplant</a></li>
                                        <li><a href="{{ url('search') }}">Cardiologist</a></li>
                                        <li><a href="{{ url('search') }}">Oncology</a></li>
                                        <li><a href="{{ url('search') }}">Pediatrics</a></li>
                                        <li><a href="{{ url('search') }}">Gynacology</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Utilites</h6>
                                    <ul>
                                        <li><a href="{{ url('pricing') }}">Pricing</a></li>
                                        <li><a href="{{ url('contact-us') }}">Contact</a></li>
                                        <li><a href="{{ url('contact-us') }}">Request A Quote</a></li>
                                        <li><a href="#">Premium Membership</a></li>
                                        <li><a href="#">Integrations</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-7">
                        <div class="footer-widget">
                            <h6 class="footer-title">Newsletter</h6>
                            <p class="mb-2 text-dark">Subscribe & Stay Updated from the PriGina Global Telemed</p>
                            <div class="subscribe-input">
                                <form action="#">
                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                    <button type="submit"
                                        class="btn btn-md btn-primary-gradient d-inline-flex align-items-center"><i
                                            class="isax isax-send-25 me-1"></i>Send</button>
                                </form>
                            </div>
                            <div class="social-icon">
                                <h6 class="mb-3 footer-title">Connect With Us</h6>
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <!-- Copyright -->
                <div class="copyright">
                    <div class="copyright-text mb-0">
                        <p class="mb-0">Copyright © 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                    <!-- Copyright Menu -->
                    <div class="copyright-menu">
                        <ul class="policy-menu mb-0">
                            <li><a href="#">Legal Notice</a></li>
                            <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                        </ul>
                    </div>
                    <!-- /Copyright Menu -->
                    <ul class="payment-method">
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-01.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-02.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-03.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-04.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-05.svg') }}"
                                    alt="Img"></a></li>
                        <li><a href="#"><img src="{{ URL::asset('build/img/icons/card-06.svg') }}"
                                    alt="Img"></a></li>
                    </ul>
                </div>
                <!-- /Copyright -->
            </div>
        </div>
    </footer>
    <!-- /Footer Section -->
@endif
