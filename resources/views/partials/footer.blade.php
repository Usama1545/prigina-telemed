    <!-- Footer Section -->
    <footer class="footer inner-footer footer-info">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-lg-6 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Company</h6>
                                    <ul>
                                        <li><a href="{{ url('about-us') }}">About</a></li>
                                        <li><a href="{{ url('contact-us') }}">Contact</a></li>
                                        <li><a href="{{ url('doctors') }}">Doctors</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu">
                                    <h6 class="footer-title">Specialities</h6>
                                    <ul>
                                        @foreach(topSpeacilalization() as $specialization)
                                            <li><a href="{{ url('/doctors?category='.$specialization['name'].'') }}">{{ $specialization['name'] }}</a></li>
                                        @endforeach
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

