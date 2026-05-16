    <!-- Footer Section -->
    <footer class="footer inner-footer footer-info bg-primary">
        <div class="footer-top bg-primary" style="background: var(--primary);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-7">
                        <div class="footer-widget">
                            <img src="{{ asset('build/img/logo.webp') }}" alt="logo" class="img-fluid" style="max-width: 300px;">
                            <div class="social-icon">
                                <h6 class="mb-3 footer-title text-white">Connect With Us</h6>
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
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu text-white">
                                    <h6 class="footer-title text-white">For Patients</h6>
                                    <ul>
                                        <li><a class="text-white" href="{{ route('for-patients') }}">How It Works</a></li>
                                        <li><a class="text-white" href="{{ route('patient-faqs') }}">Faqs</a></li>
                                        <li><a class="text-white" href="{{ route('patient-reviews') }}">Patient Stories</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu text-white">
                                    <h6 class="footer-title text-white">For Doctors</h6>
                                    <ul>
                                        <li><a class="text-white" href="{{ route('for-doctors') }}">Join Our Network</a></li>
                                        <li><a class="text-white" href="{{ route('doctor-faqs') }}">FAQs</a></li>
                                        <li><a class="text-white" href="{{ route('doctor-reviews') }}">Doctor Stories</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu text-white">
                                    <h6 class="footer-title text-white">Company</h6>
                                    <ul>
                                        <li><a class="text-white" href="{{ route('about-us') }}">About Us</a></li>
                                        <li><a class="text-white" href="{{ url('our-mission') }}">Our Mission</a></li>
                                        <li><a class="text-white" href="{{ route('contact-us') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu text-white">
                                    <h6 class="footer-title text-white">Legal</h6>
                                    <ul>
                                        <li><a class="text-white" href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                        <li><a class="text-white" href="{{ route('terms-conditions') }}">Terms & Conditions</a></li>
                                        <li><a class="text-white" href="{{ route('risk-disclaimer') }}">Risk Disclaimer</a></li>
                                    </ul>
                                </div>
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
                        <p class="mb-0 ">Copyright © 2025 PriGina Global Telemed. All Rights Reserved</p>
                    </div>
                    <!-- Copyright Menu -->
                    <div class="copyright-menu">
                        <ul class="policy-menu mb-0">
                            <li><a href="#">Legal Notice</a></li>
                            <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
      
                </div>
                <!-- /Copyright -->
            </div>
        </div>
    </footer>
    <!-- /Footer Section -->

