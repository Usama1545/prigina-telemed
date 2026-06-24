    <!-- Footer Section -->
    <footer class="footer inner-footer footer-info bg-primary">
        <div class="footer-top bg-primary" style="background: var(--primary);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-7">
                        <div class="footer-widget">
                            <img src="{{ asset('build/logo-2.png') }}" alt="logo" class="img-fluid"
                                style="max-width: 300px;">
                            <div class="social-icon">
                                <h6 class="mb-3 footer-title text-white">{{ __('app.footer.connect_with_us') }}</h6>
                                <ul>
                                    <li>
                                        <a
                                            href="https://www.facebook.com/profile.php?id=61588898595327&mibextid=wwXIfr&mibextid=wwXIfr"><i
                                                class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://www.instagram.com/prigina_global_telemed?igsh=MTh3YjVjejQ1cnJvcA=="><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/prigina-global-telemed-llc/"><i
                                                class="fa-brands fa-linkedin"></i></a>
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
                                    <h6 class="footer-title text-white">{{ __('app.footer.for_patients') }}</h6>
                                    <ul>
                                        <li><a class="text-white" href="{{ route('for-patients') }}">{{ __('app.footer.how_it_works') }}</a></li>
                                        <li><a class="text-white" href="{{ route('patient-faqs') }}">{{ __('app.footer.faqs') }}</a></li>
                                        <li><a class="text-white" href="{{ route('patient-reviews') }}">{{ __('app.footer.patient_stories') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu text-white">
                                    <h6 class="footer-title text-white">{{ __('app.footer.for_doctors') }}</h6>
                                    <ul>
                                        <li><a class="text-white" href="{{ route('for-doctors') }}">{{ __('app.footer.join_our_network') }}</a></li>
                                        <li><a class="text-white" href="{{ route('doctor-faqs') }}">{{ __('app.footer.faqs') }}</a></li>
                                        <li><a class="text-white" href="{{ route('doctor-reviews') }}">{{ __('app.footer.doctor_stories') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu text-white">
                                    <h6 class="footer-title text-white">{{ __('app.footer.company') }}</h6>
                                    <ul>
                                        <li><a class="text-white" href="{{ route('about-us') }}">{{ __('app.footer.about_us') }}</a></li>
                                        <li><a class="text-white" href="{{ route('our-mission') }}">{{ __('app.footer.our_mission') }}</a></li>
                                        <li><a class="text-white" href="{{ route('contact-us') }}">{{ __('app.footer.contact_us') }}</a></li>
                                        <li><a class="text-white" href="{{ route('admin.login') }}">{{ __('app.footer.admin_login') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget footer-menu text-white">
                                    <h6 class="footer-title text-white">{{ __('app.footer.legal') }}</h6>
                                    <ul>
                                        <li><a class="text-white" href="{{ route('privacy-policy') }}">{{ __('app.footer.privacy_policy') }}</a></li>
                                        <li><a class="text-white" href="{{ route('terms-conditions') }}">{{ __('app.footer.terms_conditions') }}</a></li>
                                        <li><a class="text-white" href="{{ route('risk-disclaimer') }}">{{ __('app.footer.risk_disclaimer') }}</a></li>
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
                        <p class="mb-0 ">{{ __('app.footer.copyright') }}</p>
                    </div>
                    <!-- Copyright Menu -->
                    <div class="copyright-menu">
                        <ul class="policy-menu mb-0">
                            <li><a href="{{ route('legal-notice') }}">{{ __('app.footer.legal_notice') }}</a></li>
                            <li><a href="{{ url('privacy-policy') }}">{{ __('app.footer.privacy_policy') }}</a></li>
                        </ul>
                    </div>

                </div>
                <!-- /Copyright -->
            </div>
        </div>
    </footer>
    <!-- /Footer Section -->
