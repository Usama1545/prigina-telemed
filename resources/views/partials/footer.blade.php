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

    <style>
        .footer.footer-info {
            background: linear-gradient(150deg, #0A1834 0%, #1B2F63 55%, #14285C 100%) !important;
        }

        .footer .footer-top {
            background: transparent !important;
            padding: 64px 0 40px;
        }

        .footer .footer-title {
            font-family: 'IBM Plex Mono', monospace;
            font-size: 12px !important;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 18px !important;
            color: rgba(255, 255, 255, 0.9);
        }

        .footer .footer-widget.footer-menu ul li {
            margin-bottom: 10px;
        }

        .footer .footer-widget.footer-menu ul li a {
            padding-left: 0;
            font-size: 13.5px;
            color: rgba(255, 255, 255, 0.6);
        }

        .footer .footer-widget.footer-menu ul li a::before {
            content: none;
        }

        .footer .footer-widget.footer-menu ul li a:hover {
            padding-left: 0;
            color: #34D3C9;
            letter-spacing: 0;
        }

        .footer .social-icon ul li a {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.14);
            font-size: 14px;
        }

        .footer .social-icon ul li a:hover {
            background: linear-gradient(135deg, #4F9DFF, #34D3C9);
            border-color: transparent;
            color: #0A1834;
        }

        .footer .footer-bottom {
            background: transparent;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer .footer-bottom .copyright {
            border-top: none !important;
            padding: 22px 0 !important;
        }

        .footer .footer-bottom .copyright-text p {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.45);
        }

        .footer .policy-menu li a {
            font-size: 12.5px;
            color: rgba(255, 255, 255, 0.45);
        }

        .footer .policy-menu li a:hover {
            color: #34D3C9;
        }
    </style>
