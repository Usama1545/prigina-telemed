@if (Route::is(['index']))
    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-offset offcanvas-end support_popup" tabindex="-1" id="support_item">
        <div class="offcanvas-header">
            <a href="{{ url('index') }}"><img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo"
                    class="img-fluid logo"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>

        <div class="offcanvas-body">

            <!-- Item 1 -->
            <div class="about-popup-item">
                <h3 class="title">About PriGina Global Telemed</h3>
                <p>Modern healthcare platform designed to simplify the way patients connect with doctors, clinics &
                    medical
                    services.</p>
                <div class="about-img d-flex align-items-center gap-2 justify-content-between">
                    <a href="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="about-popup-item">
                <h3 class="title">Our Locations</h3>
                <div class="loction-item mb-3">
                    <h4 class="title">California</h4>
                    <p class="location">1250 Sunset, Los Angeles, CA</p>
                </div>
                <div class="loction-item">
                    <h4 class="title">Los Angeles</h4>
                    <p class="location">669 Boulevard, Los Angeles</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item">
                <h3 class="title">Contact Information</h3>
                <div class="support-item mb-3">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-messages-3"></i>
                    </div>
                    <div>
                        <p class="title">General Inquiries</p>
                        <h5 class="link"><a href="#">info@example.com</a></h5>
                    </div>
                </div>
                <div class="support-item">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-call-calling"></i>
                    </div>
                    <div>
                        <p class="title">Emergency Cases</p>
                        <h5 class="link"><a href="#">+1 24565 89856</a></h5>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item border-0">
                <h3 class="title">Follow Us</h3>
                <ul class="d-flex align-items-center gap-2 social-iyem">
                    <li>
                        <a href="#" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/offcanvas-bg.png') }}" alt="element" class="element-01">
    </div>
    <!-- end offcanvas -->
@endif

@if (Route::is(['index-3']))
    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-top search_popup" tabindex="-1" id="search_popup">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>
        <div class="offcanvas-body">

            <div class="support-item-three w-50">
                <input type="text" class="inpts" placeholder="Search Your Keywords">
                <a href="#" class="submit btn"> <i class="isax isax-arrow-right-1"></i></a>
            </div>

        </div>
    </div>

    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-offset offcanvas-end support_popup" tabindex="-1" id="support_item">
        <div class="offcanvas-header">
            <a href="{{ url('index-3') }}"><img src="{{ URL::asset('build/img/logo-03.svg') }}" alt="logo"
                    class="img-fluid logo"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>

        <div class="offcanvas-body">
            <!-- Item 1 -->
            <div class="about-popup-item">
                <h3 class="title">About PriGina Global Telemed</h3>
                <p>Modern healthcare platform designed to simplify the way patients connect with doctors, clinics &
                    medical
                    services.</p>
                <div class="about-img d-flex align-items-center gap-2 justify-content-between">
                    <a href="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="about-popup-item">
                <h3 class="title">Our Locations</h3>
                <div class="loction-item mb-3">
                    <h4 class="title">California</h4>
                    <p class="location">1250 Sunset, Los Angeles, CA</p>
                </div>
                <div class="loction-item">
                    <h4 class="title">Los Angeles</h4>
                    <p class="location">669 Boulevard, Los Angeles</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item">
                <h3 class="title">Contact Information</h3>
                <div class="support-item mb-3">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-messages-3"></i>
                    </div>
                    <div>
                        <p class="title">General Inquiries</p>
                        <h5 class="link">info@example.com</h5>
                    </div>
                </div>
                <div class="support-item">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-call-calling"></i>
                    </div>
                    <div>
                        <p class="title">Emergency Cases</p>
                        <h5 class="link">+1 24565 89856</h5>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item border-0">
                <h3 class="title">Follow Us</h3>
                <ul class="d-flex align-items-center gap-2 social-iyem">
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/offcanvas-bg.png') }}" alt="element" class="element-01">
    </div>
    <!-- end offcanvas -->
@endif

@if (Route::is(['index-4']))
    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-top search_popup" tabindex="-1" id="search_popup">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>
        <div class="offcanvas-body">

            <div class="support-item-three w-50">
                <input type="text" class="inpts" placeholder="Search Your Keywords">
                <a href="#" class="submit btn"> <i class="isax isax-arrow-right-1"></i></a>
            </div>

        </div>
    </div>
    <!-- end offcanvas -->

    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-offset offcanvas-end support_popup" tabindex="-1" id="support_item">
        <div class="offcanvas-header">
            <a href="{{ url('index') }}"><img src="{{ URL::asset('build/img/logo-04.svg') }}" alt="logo"
                    class="img-fluid logo"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>

        <div class="offcanvas-body">
            <!-- Item 1 -->
            <div class="about-popup-item">
                <h3 class="title">About PriGina Global Telemed</h3>
                <p>Modern healthcare platform designed to simplify the way patients connect with doctors, clinics &
                    medical
                    services.</p>
                <div class="about-img d-flex align-items-center gap-2 justify-content-between">
                    <a href="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="about-popup-item">
                <h3 class="title">Our Locations</h3>
                <div class="loction-item mb-3">
                    <h4 class="title">California</h4>
                    <p class="location">1250 Sunset, Los Angeles, CA</p>
                </div>
                <div class="loction-item">
                    <h4 class="title">Los Angeles</h4>
                    <p class="location">669 Boulevard, Los Angeles</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item">
                <h3 class="title">Contact Information</h3>
                <div class="support-item mb-3">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-messages-3"></i>
                    </div>
                    <div>
                        <p class="title">General Inquiries</p>
                        <h5 class="link">info@example.com</h5>
                    </div>
                </div>
                <div class="support-item">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-call-calling"></i>
                    </div>
                    <div>
                        <p class="title">Emergency Cases</p>
                        <h5 class="link">+1 24565 89856</h5>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item border-0">
                <h3 class="title">Follow Us</h3>
                <ul class="d-flex align-items-center gap-2 social-iyem">
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/offcanvas-bg.png') }}" alt="element" class="element-01">
    </div>
    <!-- end offcanvas -->
@endif

@if (Route::is(['index-7']))
    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-top search_popup" tabindex="-1" id="search_popup">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>
        <div class="offcanvas-body">

            <div class="support-item-three w-50">
                <input type="text" class="inpts" placeholder="Search Your Keywords">
                <a href="#" class="submit btn"> <i class="isax isax-arrow-right-1"></i></a>
            </div>

        </div>
    </div>

    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-offset offcanvas-end support_popup" tabindex="-1" id="support_item">
        <div class="offcanvas-header">
            <a href="{{ url('index-7') }}"><img src="{{ URL::asset('build/img/logo-07.svg') }}" alt="logo"
                    class="img-fluid logo"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>

        <div class="offcanvas-body">
            <!-- Item 1 -->
            <div class="about-popup-item">
                <h3 class="title">About PriGina Global Telemed</h3>
                <p>Modern healthcare platform designed to simplify the way patients connect with doctors, clinics &
                    medical
                    services.</p>
                <div class="about-img d-flex align-items-center gap-2 justify-content-between">
                    <a href="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="about-popup-item">
                <h3 class="title">Our Locations</h3>
                <div class="loction-item mb-3">
                    <h4 class="title">California</h4>
                    <p class="location">1250 Sunset, Los Angeles, CA</p>
                </div>
                <div class="loction-item">
                    <h4 class="title">Los Angeles</h4>
                    <p class="location">669 Boulevard, Los Angeles</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item">
                <h3 class="title">Contact Information</h3>
                <div class="support-item mb-3">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-messages-3"></i>
                    </div>
                    <div>
                        <p class="title">General Inquiries</p>
                        <h5 class="link">info@example.com</h5>
                    </div>
                </div>
                <div class="support-item">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-call-calling"></i>
                    </div>
                    <div>
                        <p class="title">Emergency Cases</p>
                        <h5 class="link">+1 24565 89856</h5>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item border-0">
                <h3 class="title">Follow Us</h3>
                <ul class="d-flex align-items-center gap-2 social-iyem">
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/offcanvas-bg.png') }}" alt="element" class="element-01">
    </div>
    <!-- end offcanvas -->
@endif

@if (Route::is(['index-9']))
    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-offset offcanvas-end support_popup" tabindex="-1" id="support_item">
        <div class="offcanvas-header">
            <a href="{{ url('index-9') }}"><img src="{{ URL::asset('build/img/logo-dark-09.svg') }}" alt="logo"
                    class="img-fluid logo"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>

        <div class="offcanvas-body">
            <!-- Item 1 -->
            <div class="about-popup-item">
                <h3 class="title">About PriGina Global Telemed</h3>
                <p>Modern healthcare platform designed to simplify the way patients connect with doctors, clinics &
                    medical
                    services.</p>
                <div class="about-img d-flex align-items-center gap-2 justify-content-between">
                    <a href="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="about-popup-item">
                <h3 class="title">Our Locations</h3>
                <div class="loction-item mb-3">
                    <h4 class="title">California</h4>
                    <p class="location">1250 Sunset, Los Angeles, CA</p>
                </div>
                <div class="loction-item">
                    <h4 class="title">Los Angeles</h4>
                    <p class="location">669 Boulevard, Los Angeles</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item">
                <h3 class="title">Contact Information</h3>
                <div class="support-item mb-3">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-messages-3"></i>
                    </div>
                    <div>
                        <p class="title">General Inquiries</p>
                        <h5 class="link">info@example.com</h5>
                    </div>
                </div>
                <div class="support-item">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-call-calling"></i>
                    </div>
                    <div>
                        <p class="title">Emergency Cases</p>
                        <h5 class="link">+1 24565 89856</h5>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item border-0">
                <h3 class="title">Follow Us</h3>
                <ul class="d-flex align-items-center gap-2 social-iyem">
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/offcanvas-bg.png') }}" alt="element" class="element-01">
    </div>
    <!-- end offcanvas -->
@endif

@if (Route::is(['index-11']))
    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-top search_popup" tabindex="-1" id="search_popup">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>
        <div class="offcanvas-body">
            <div class="support-item-three w-50">
                <input type="text" class="inpts" placeholder="Search Your Keywords">
                <a href="#" class="submit btn"> <i class="isax isax-arrow-right-1"></i></a>
            </div>

        </div>
    </div>
    <!-- end offcanvas -->

    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-offset offcanvas-end support_popup" tabindex="-1" id="support_item">
        <div class="offcanvas-header">
            <a href="{{ url('index-11') }}"><img src="{{ URL::asset('build/img/logo-11.svg') }}" alt="logo"
                    class="img-fluid logo"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>

        <div class="offcanvas-body">
            <!-- Item 1 -->
            <div class="about-popup-item">
                <h3 class="title">About PriGina Global Telemed</h3>
                <p>Modern healthcare platform designed to simplify the way patients connect with doctors, clinics &
                    medical
                    services.</p>
                <div class="about-img d-flex align-items-center gap-2 justify-content-between">
                    <a href="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="about-popup-item">
                <h3 class="title">Our Locations</h3>
                <div class="loction-item mb-3">
                    <h4 class="title">California</h4>
                    <p class="location">1250 Sunset, Los Angeles, CA</p>
                </div>
                <div class="loction-item">
                    <h4 class="title">Los Angeles</h4>
                    <p class="location">669 Boulevard, Los Angeles</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item">
                <h3 class="title">Contact Information</h3>
                <div class="support-item mb-3">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-messages-3"></i>
                    </div>
                    <div>
                        <p class="title">General Inquiries</p>
                        <h5 class="link">info@example.com</h5>
                    </div>
                </div>
                <div class="support-item">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-call-calling"></i>
                    </div>
                    <div>
                        <p class="title">Emergency Cases</p>
                        <h5 class="link">+1 24565 89856</h5>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item border-0">
                <h3 class="title">Follow Us</h3>
                <ul class="d-flex align-items-center gap-2 social-iyem">
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/offcanvas-bg.png') }}" alt="element" class="element-01">
    </div>
    <!-- end offcanvas -->
@endif

@if (Route::is(['index-12']))
    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-offset offcanvas-end support_popup" tabindex="-1" id="support_item">
        <div class="offcanvas-header">
            <a href="{{ url('index-12') }}"><img src="{{ URL::asset('build/img/logo-12.svg') }}" alt="logo"
                    class="img-fluid logo"></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                    class="isax isax-close-circle"></i></button>
        </div>

        <div class="offcanvas-body">
            <!-- Item 1 -->
            <div class="about-popup-item">
                <h3 class="title">About PriGina Global Telemed</h3>
                <p>Modern healthcare platform designed to simplify the way patients connect with doctors, clinics &
                    medical
                    services.</p>
                <div class="about-img d-flex align-items-center gap-2 justify-content-between">
                    <a href="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-1.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-2.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                    <a href="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" data-fancybox="gallery"><img
                            src="{{ URL::asset('build/img/banner/about-img-3.jpg') }}" alt="about-img-1"
                            class="img-fluid"></a>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="about-popup-item">
                <h3 class="title">Our Locations</h3>
                <div class="loction-item mb-3">
                    <h4 class="title">California</h4>
                    <p class="location">1250 Sunset, Los Angeles, CA</p>
                </div>
                <div class="loction-item">
                    <h4 class="title">Los Angeles</h4>
                    <p class="location">669 Boulevard, Los Angeles</p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item">
                <h3 class="title">Contact Information</h3>
                <div class="support-item mb-3">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-messages-3"></i>
                    </div>
                    <div>
                        <p class="title">General Inquiries</p>
                        <h5 class="link">info@example.com</h5>
                    </div>
                </div>
                <div class="support-item">
                    <div class="avatar avatar-lg bg-primary rounded-circle">
                        <i class="isax isax-call-calling"></i>
                    </div>
                    <div>
                        <p class="title">Emergency Cases</p>
                        <h5 class="link">+1 24565 89856</h5>
                    </div>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="about-popup-item border-0">
                <h3 class="title">Follow Us</h3>
                <ul class="d-flex align-items-center gap-2 social-iyem">
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-x-twitter"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <img src="{{ URL::asset('build/img/bg/offcanvas-bg.png') }}" alt="element" class="element-01">
    </div>
    <!-- end offcanvas -->
@endif

@if (Route::is(['index-13']))
    <!-- start offcanvas -->
    <div class="offcanvas offcanvas-top pharmacy_menu" tabindex="-1" id="pharmacy_menu">
        <div class="offcanvas-body">
            <div class="row g-0">
                <div class="col-md-6 d-flex">
                    <div class="menu-content flex-fill">
                        <div class="menu-wrap">
                            <ul>
                                <li>
                                    <a href="{{ url('index-13') }}"><span>01</span>Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('pharmacy-details') }}"><span>02</span>Pharmacy Details</a>
                                </li>
                                <li>
                                    <a href="{{ url('pharmacy-search') }}"><span>03</span>Pharmacy Search</a>
                                </li>
                                <li>
                                    <a href="{{ url('product-all') }}"><span>04</span>Products</a>
                                </li>
                                <li>
                                    <a href="{{ url('product-description') }}"><span>05</span>Product Description</a>
                                </li>
                                <li>
                                    <a href="{{ url('cart') }}"><span>06</span>Cart</a>
                                </li>
                                <li>
                                    <a href="{{ url('product-checkout') }}"><span>07</span>Checkout</a>
                                </li>
                                <li>
                                    <a href="{{ url('pharmacy-register') }}"><span>08</span>Registration</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="supplement-content flex-fill">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i
                                class="isax isax-close-circle"></i></button>
                        <h2>Essentials Nutrition & Supplements from all over the suppliers around the World</h2>
                        <img src="{{ URL::asset('build/img/home/pharmacy.png') }}" alt="pharmacy" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (Route::is(['accounts']))
    <!-- Payment Request Moodal -->
    <div class="modal fade custom-modal custom-modal-two modal-lg" id="payment_request">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment Request <span class="text-danger request-id">Request ID :
                            #RQ-1323</span></h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('accounts') }}">
                        <div class="input-block input-block-new">
                            <label class="form-label">Request Amount</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input-block input-block-new">
                            <label class="form-label">Description</label>
                            <textarea rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-set-button">
                            <button class="btn btn-light" type="button">Cancel</button>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- /Payment Request Moodal -->

    <!-- Account Details Modal-->
    <div class="modal fade custom-modal custom-modal-two modal-lg" id="account_details">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Account Details</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('accounts') }}">
                        <div class="input-block input-block-new">
                            <label class="form-label">Bank Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input-block input-block-new">
                            <label class="form-label">Branch Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input-block input-block-new">
                            <label class="form-label">Account Number</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="input-block input-block-new">
                            <label class="form-label">Account Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-set-button">
                            <button class="btn btn-light" type="button">Cancel</button>
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- /Account Details Modal-->

    <!-- Other Accounts Modal-->
    <div class="modal fade custom-modal custom-modal-two modal-lg" id="other_accounts">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Other Accounts</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="other-accounts-info">
                        <ul>
                            <li>
                                <ul class="other-bank-info">
                                    <li>
                                        <h6>Name</h6>
                                        <span>Citi Bank Inc</span>
                                    </li>
                                    <li>
                                        <h6>Account No</h6>
                                        <span>5396 5250 1908 XXXX</span>
                                    </li>
                                    <li>
                                        <h6>Branch</h6>
                                        <span>London</span>
                                    </li>
                                    <li>
                                        <h6>Name on Bank Account</h6>
                                        <span>Edalin Hendry</span>
                                    </li>
                                    <li>
                                        <a href="#">Current</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="other-bank-info">
                                    <li>
                                        <h6>Name</h6>
                                        <span>HDFC Bank Inc</span>
                                    </li>
                                    <li>
                                        <h6>Account No</h6>
                                        <span>7382 4924 4924 XXXX</span>
                                    </li>
                                    <li>
                                        <h6>Branch</h6>
                                        <span>New York</span>
                                    </li>
                                    <li>
                                        <h6>Name on Bank Account</h6>
                                        <span>Edalin Hendry</span>
                                    </li>
                                    <li>
                                        <a href="#">Change to default</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="other-bank-info">
                                    <li>
                                        <h6>Name</h6>
                                        <span>Union Bank Inc</span>
                                    </li>
                                    <li>
                                        <h6>Account No</h6>
                                        <span>8934 4902 9024 XXXX</span>
                                    </li>
                                    <li>
                                        <h6>Branch</h6>
                                        <span>Chicago</span>
                                    </li>
                                    <li>
                                        <h6>Name on Bank Account</h6>
                                        <span>Edalin Hendry</span>
                                    </li>
                                    <li>
                                        <a href="#">Change to default</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="other-bank-info">
                                    <li>
                                        <h6>Name</h6>
                                        <span>KVB Bank Inc</span>
                                    </li>
                                    <li>
                                        <h6>Account No</h6>
                                        <span>5892 4920 4829 XXXX</span>
                                    </li>
                                    <li>
                                        <h6>Branch</h6>
                                        <span>Austin</span>
                                    </li>
                                    <li>
                                        <h6>Name on Bank Account</h6>
                                        <span>Edalin Hendry</span>
                                    </li>
                                    <li>
                                        <a href="#">Change to default</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-primary prime-btn w-100 mt-2"
                            data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Other Accounts Modal-->

    <!-- Request Completed Modal-->
    <div class="modal fade custom-modal custom-modal-two" id="request_details_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request Details <span class="badge badge-success-bg">Completed</span></h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="completed-request">
                        <ul>
                            <li>
                                <h6>ID</h6>
                                <span>#AC-1234</span>
                            </li>
                            <li>
                                <h6>Requested on</h6>
                                <span>24 Mar 2024</span>
                            </li>
                            <li>
                                <h6>Credited Date</h6>
                                <span>24 Mar 2024</span>
                            </li>
                            <li>
                                <h6>Amount</h6>
                                <span class="text-blue">$300</span>
                            </li>
                        </ul>
                        <div class="bank-detail">
                            <h4>Bank Details</h4>
                            <div class="accont-information">
                                <h6>Name</h6>
                                <span>Citi Bank Inc</span>
                            </div>
                            <div class="accont-information">
                                <h6>Account No</h6>
                                <span>5396 5250 1908 XXXX</span>
                            </div>
                            <div class="accont-information">
                                <h6>Branch</h6>
                                <span>London</span>
                            </div>
                        </div>
                        <div class="request-des">
                            <h4>Reqeust Description</h4>
                            <p>I recently completed a series of dental treatments with Dr.Edalin Hendry,
                                and I couldn't be more pleased with the results. From my very first appointment.
                            </p>
                        </div>
                        <a href="#" class="btn btn-primary prime-btn w-100" data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Request Completed Modal-->

    <!-- Request Cancel Modal-->
    <div class="modal fade custom-modal custom-modal-two" id="request_cancel_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request Details <span class="badge badge-danger-bg">Cancelled</span></h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cancelled-request">
                        <div class="canceled-user-info d-flex align-items-center">
                            <div class="patinet-information">
                                <a href="{{ url('doctor-upcoming-appointment') }}">
                                    <img src="{{ URL::asset('build/img/doctors-dashboard/profile-01.jpg') }}"
                                        alt="User Image">
                                </a>
                                <div class="patient-info">
                                    <p>#Apt0001</p>
                                    <h6><a href="{{ url('doctor-upcoming-appointment') }}">Adrian</a></h6>
                                </div>
                            </div>
                            <div class="email-info">
                                <ul>
                                    <li><i class="fa-solid fa-envelope"></i>adran@example.com</li>
                                    <li><i class="fa-solid fa-phone"></i>+1 504 368 6874</li>
                                </ul>
                            </div>
                        </div>
                        <div class="cancellation-fees">
                            <h6>Consultation Fees : $200</h6>
                            <div class="cancellation-info">
                                <div class="appointment-type">
                                    <p class="md-text">Type of Appointment</p>
                                    <p><i class="fa-solid fa-building text-green"></i>Direct Visit</p>
                                </div>
                                <div class="appointment-type">
                                    <p class="md-text">Clinic Location</p>
                                    <p>Adrian’s Dentistry</p>
                                </div>
                            </div>
                        </div>
                        <div class="cancel-reason">
                            <h5>Reason</h5>
                            <p>I have an urgent surgery, while our Appointment so i am rejecting appointment </p>
                            <span class="text-danger">Cancelled By You on 23 Mar 2024</span>
                        </div>
                        <span class="text-blue refund">Status : Refund Accepted</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Request Cancel Modal-->
@endif

@if (Route::is(['appointments']))
    <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal" id="appt_details">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="info-details">
                        <li>
                            <div class="details-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="title">#APT0001</span>
                                        <span class="text">21 Oct 2023 10:00 AM</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-end">
                                            <button type="button" class="btn bg-success-light btn-sm"
                                                id="topup_status">Completed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="title">Status:</span>
                            <span class="text">Completed</span>
                        </li>
                        <li>
                            <span class="title">Confirm Date:</span>
                            <span class="text">29 Jun 2023</span>
                        </li>
                        <li>
                            <span class="title">Paid Amount</span>
                            <span class="text">$450</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Details Modal -->
@endif

@if (Route::is(['available-timings']))
    <!-- Add Slots -->
    <div class="modal fade custom-modals" id="add_slot">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Slot</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('available-timings') }}">
                    <div class="modal-body">
                        <div class="timing-modal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Start Time</label>
                                        <input type="text" class="form-control timepicker1" value="04:00 PM">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">End Time</label>
                                        <input type="text" class="form-control timepicker1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Appointment Intervals</label>
                                        <select class="select">
                                            <option>10 Minutes</option>
                                            <option>20 Minutes</option>
                                            <option>30 Minutes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Appointment Durations</label>
                                        <select class="select">
                                            <option>30 Minutes</option>
                                            <option>1 Hour</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-wrap mb-0">
                                        <label class="col-form-label d-block">Assign Appointment Spaces</label>
                                        <div class="custom-control form-check custom-control-inline">
                                            <input type="radio" id="space1" name="rating_option"
                                                class="form-check-input" value="price_free" checked="">
                                            <label class="form-check-label" for="space1">Space 1</label>
                                        </div>
                                        <div class="custom-control form-check custom-control-inline">
                                            <input type="radio" id="space2" name="rating_option"
                                                class="form-check-input" value="price_free" checked="">
                                            <label class="form-check-label" for="space2">Space 2</label>
                                        </div>
                                        <div class="custom-control form-check custom-control-inline">
                                            <input type="radio" id="space3" name="rating_option"
                                                class="form-check-input" value="price_free" checked="">
                                            <label class="form-check-label" for="space3">Space 3</label>
                                        </div>
                                        <div class="custom-control form-check custom-control-inline">
                                            <input type="radio" id="space4" name="rating_option"
                                                class="form-check-input" value="price_free" checked="">
                                            <label class="form-check-label" for="space4">Space 4</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Slots -->

    <!-- Remove Slots -->
    <div class="modal fade info-modal" id="delete_slot">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="success-wrap">
                        <div class="success-info">
                            <div class="text-center">
                                <span class="icon-success bg-red"><i class="fa-solid fa-xmark"></i></span>
                                <h3>Remove Slots</h3>
                                <p>Are you sure you want to remove this slots?</p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-btn text-center">
                        <a href="#" class="btn btn-gray" data-bs-toggle="modal" data-bs-dismiss="modal">Yes,
                            Remove</a>
                        <button class="btn btn-primary prime-btn">No, i Changed my mind</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Remove Slots -->
@endif

@if (Route::is(['calendar']))
    <!-- Add Event Modal -->
    <div id="add_event" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Event</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="mb-2">Event Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Event Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="text">
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Event Modal -->

    <!-- Add Event Modal -->
    <div class="modal custom-modal fade none-border" id="my_event">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Event</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success save-event submit-btn">Create event</button>
                    <button type="button" class="btn btn-danger delete-event submit-btn"
                        data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Event Modal -->

    <!-- Add Category Modal -->
    <div class="modal custom-modal fade" id="add_new_event">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="mb-2">Category Name</label>
                            <input class="form-control form-white" placeholder="Enter name" type="text"
                                name="category-name">
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Choose Category Color</label>
                            <select class="form-select form-control form-white" data-placeholder="Choose a color..."
                                name="category-color">
                                <option value="success">Success</option>
                                <option value="danger">Danger</option>
                                <option value="info">Info</option>
                                <option value="primary">Primary</option>
                                <option value="warning">Warning</option>
                                <option value="inverse">Inverse</option>
                            </select>
                        </div>
                        <div class="submit-section text-center">
                            <button type="button" class="btn btn-primary save-category submit-btn"
                                data-bs-dismiss="modal">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Category Modal -->
@endif

@if (Route::is(['chat-doctor']))
    <!-- Voice Call Modal -->
    <div class="modal fade call-modal" id="voice_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <!-- Outgoing Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img alt="User Image" src="{{ URL::asset('build/img/patients/patient.jpg') }}"
                                        class="call-avatar">
                                    <h4>Richard Wilson</h4>
                                    <span>Connecting...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('voice-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">call</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Outgoing Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Voice Call Modal -->

    <!-- Video Call Modal -->
    <div class="modal fade call-modal" id="video_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <!-- Incoming Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img class="call-avatar" src="{{ URL::asset('build/img/patients/patient.jpg') }}"
                                        alt="User Image">
                                    <h4>Richard Wilson</h4>
                                    <span>Calling ...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('video-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">videocam</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Incoming Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- Video Call Modal -->
@endif

@if (Route::is(['chat']))
    <!-- Voice Call Modal -->
    <div class="modal fade call-modal" id="voice_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Outgoing Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img alt="User Image"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                        class="call-avatar">
                                    <h4>Darren Elder</h4>
                                    <span>Connecting...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('voice-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">call</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Outgoing Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Voice Call Modal -->

    <!-- Video Call Modal -->
    <div class="modal fade call-modal" id="video_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <!-- Incoming Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img class="call-avatar"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                        alt="User Image">
                                    <h4>Darren Elder</h4>
                                    <span>Calling ...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('video-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">videocam</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Incoming Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- Video Call Modal -->
@endif

@if (Route::is(['components']))
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal"
                        data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-secondary" type="button" data-bs-original-title=""
                        title="">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                    <p>but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                    <p>but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                    <p>but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                    <p>but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                    <p>but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                        type
                        and scrambled it to make a type specimen book. It has survived not only five centuries,</p>
                    <p>but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in
                        the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                        with desktop publishing</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                        data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the
                        industry's standard dummy text ever since the 1500s,</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                        data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tooltipmodal" tabindex="-1" role="dialog" aria-labelledby="tooltipmodal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <h5>Popover in a modal</h5>
                    <p>This <a class="btn btn-primary popover-test" href="#" role="button" title=""
                            data-content="Popover body content is set in this attribute."
                            data-container="#exampleModalPopovers" data-bs-original-title="Popover title">button</a>
                        triggers a popover on click.</p>
                    <hr>
                    <h5>Tooltips in a modal</h5>
                    <p><a class="tooltip-test" href="#" title=""
                            data-container="#exampleModalPopovers" data-bs-original-title="Tooltip">This link</a>
                        and <a class="tooltip-test" href="#" title=""
                            data-container="#exampleModalPopovers" data-bs-original-title="Tooltip">that link</a>
                        have
                        tooltips on hover.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                        data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="grid-modal" tabindex="-1" role="dialog" aria-labelledby="grid-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body grid-showcase">
                    <div class="container-fluid bd-example-row">
                        <div class="row">
                            <div class="col-md-4"><span>.col-md-4</span></div>
                            <div class="col-md-4 ms-auto"><span>.col-md-4 .ms-auto</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 ms-auto"><span>.col-md-3 .ms-auto</span></div>
                            <div class="col-md-2 ms-auto"><span>.col-md-2 .ms-auto</span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ms-auto"><span>.col-md-6 .ms-auto</span></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-9"><span>Level 1: .col-sm-9</span>
                                <div class="row">
                                    <div class="col-8 col-sm-6"><span>Level 2: .col-8 .col-sm-6</span></div>
                                    <div class="col-4 col-sm-6"><span>Level 2: .col-4 .col-sm-6</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                        data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">New message</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">Recipient:</label>
                            <input class="form-control" type="text" value="@fat" data-bs-original-title=""
                                title="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="message-text">Message:</label>
                            <textarea class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                        data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Send
                        message</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalmdo" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New message</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">Recipient:</label>
                            <input class="form-control" id="recipient-name" type="text" value="@Mat"
                                data-bs-original-title="" title="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="message-text">Message:</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                        data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Send
                        message</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalgetbootstrap" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New message</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="col-form-label" for="recipient-name">Recipient:</label>
                            <input class="form-control" type="text" value="@getbootstrap"
                                data-bs-original-title="" title="">
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label" for="message-text">Message:</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal"
                        data-bs-original-title="" title="">Close</button>
                    <button class="btn btn-primary" type="button" data-bs-original-title="" title="">Send
                        message</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">...</div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel1">Large modal</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">...</div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
        aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="mySmallModalLabel">Small modal</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
                <div class="modal-body">...</div>
            </div>
        </div>
    </div>
@endif

@if (Route::is(['delete-account']))
    <!-- Delete Account -->
    <div class="modal fade custom-modals" id="del-acc" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Delete Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('login') }}">
                    <div class="modal-body">
                        <h6 class="FS-16 mb-1">Why Are You Deleting Your Account?</h6>
                        <p class="mb-3">We're sorry to see you go! To help us improve, please let us know your
                            reason for
                            deleting your account</p>
                        <div class="form-check d-flex mb-3">
                            <input class="form-check-input" type="radio" name="delete" id="del-acc1">
                            <label class="form-check-label fs-14 ms-2" for="del-acc1">
                                <span class="text-gray-9 fw-medium">No longer using the service</span>
                                <span class="d-block">I no longer need this service and won’t be using it in the
                                    future.</span>
                            </label>
                        </div>
                        <div class="form-check d-flex mb-3">
                            <input class="form-check-input" type="radio" name="delete" id="del-acc2">
                            <label class="form-check-label fs-14 ms-2" for="del-acc2">
                                <span class="text-gray-9 fw-medium">Privacy concerns</span>
                                <span class="d-block">I am concerned about how my data is handled and want to remove
                                    my
                                    information.</span>
                            </label>
                        </div>
                        <div class="form-check d-flex mb-3">
                            <input class="form-check-input" type="radio" name="delete" id="del-acc3">
                            <label class="form-check-label fs-14 ms-2" for="del-acc3">
                                <span class="text-gray-9 fw-medium">Too many notifications/emails</span>
                                <span class="d-block">I’m overwhelmed by the volume of notifications or emails and
                                    would
                                    like to reduce them.</span>
                            </label>
                        </div>
                        <div class="form-check d-flex mb-3">
                            <input class="form-check-input" type="radio" name="delete" id="del-acc4">
                            <label class="form-check-label fs-14 ms-2" for="del-acc4">
                                <span class="text-gray-9 fw-medium">Poor user experience</span>
                                <span class="d-block">I’ve had difficulty using the platform, and it didn’t meet my
                                    expectations.</span>
                            </label>
                        </div>
                        <div class="form-check d-flex mb-3">
                            <input class="form-check-input" type="radio" name="delete" id="del-acc5"
                                checked>
                            <label class="form-check-label fs-14 ms-2" for="del-acc5">
                                <span class="text-gray-9 fw-medium">Other (Please specify)</span>
                            </label>
                        </div>
                        <div class="ms-4">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Delete
                                Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Delete Account -->
@endif

@if (Route::is(['dependent']))
    <!-- Add Dependent Modal-->
    <div class="modal fade custom-modals" id="add_dependent">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Dependant</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="add-dependent">
                        <div class="modal-body pb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap pb-0">
                                        <label class="form-label">Profile Photo </label>
                                        <div class="change-avatar img-upload">
                                            <div class="profile-img">
                                                <i class="fa-solid fa-file-image"></i>
                                            </div>
                                            <div class="upload-img">
                                                <div class="imgs-load d-flex align-items-center">
                                                    <div class="change-photo">
                                                        Upload New
                                                        <input type="file" class="upload">
                                                    </div>
                                                    <a href="#" class="upload-remove">Remove</a>
                                                </div>
                                                <p>Your Image should Below 4 MB, Accepted format jpg,png,svg</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="form-label">Relationship <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="form-label">Date of Birth <span
                                                class="text-danger">*</span></label>
                                        <div class="form-icon">
                                            <input type="text" class="form-control datetimepicker">
                                            <span class="icon"><i class="isax isax-calendar-1"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="form-label">Select Gender <span
                                                class="text-danger">*</span></label>
                                        <div class="radio-selection d-flex border">
                                            <div class="flex-grow-1">
                                                <input type="radio" class="btn-check" name="options"
                                                    id="option1" autocomplete="off" checked>
                                                <label class="btn btn-white" for="option1">Male</label>
                                            </div>
                                            <div class="flex-grow-1">
                                                <input type="radio" class="btn-check" name="options"
                                                    id="option2" autocomplete="off">
                                                <label class="btn btn-white" for="option2">Female</label>
                                            </div>
                                            <div class="flex-grow-1">
                                                <input type="radio" class="btn-check" name="options"
                                                    id="option3" autocomplete="off">
                                                <label class="btn btn-white" for="option3">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Add
                                Dependant</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Dependent Modal-->

    <!-- Edit Dependent Modal-->
    <div class="modal fade custom-modals" id="edit_dependent">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Dependant</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="add-dependent">
                        <div class="modal-body pb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap pb-0">
                                        <label class="form-label">Profile Photo </label>
                                        <div class="change-avatar img-upload">
                                            <div class="profile-img">
                                                <i class="fa-solid fa-file-image"></i>
                                            </div>
                                            <div class="upload-img">
                                                <div class="imgs-load d-flex align-items-center">
                                                    <div class="change-photo">
                                                        Upload New
                                                        <input type="file" class="upload">
                                                    </div>
                                                    <a href="#" class="upload-remove">Remove</a>
                                                </div>
                                                <p>Your Image should Below 4 MB, Accepted format jpg,png,svg</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="Laura">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="form-label">Relationship <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="Mother">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="form-label">DOB <span class="text-danger">*</span></label>
                                        <div class="form-icon">
                                            <input type="text" class="form-control datetimepicker"
                                                value="08/01/1960">
                                            <span class="icon"><i class="isax isax-calendar-1"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="form-label">Select Gender <span
                                                class="text-danger">*</span></label>
                                        <div class="radio-selection d-flex border">
                                            <div class="flex-grow-1">
                                                <input type="radio" class="btn-check" name="options"
                                                    id="option1" autocomplete="off" checked>
                                                <label class="btn btn-white" for="option1">Male</label>
                                            </div>
                                            <div class="flex-grow-1">
                                                <input type="radio" class="btn-check" name="options"
                                                    id="option2" autocomplete="off">
                                                <label class="btn btn-white" for="option2">Female</label>
                                            </div>
                                            <div class="flex-grow-1">
                                                <input type="radio" class="btn-check" name="options"
                                                    id="option3" autocomplete="off">
                                                <label class="btn btn-white" for="option3">Others</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save
                                Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Dependent Modal-->

    <!-- Delete -->
    <div class="modal fade custom-modals" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-4 text-center">
                    <form action="{{ url('dependent') }}">
                        <span class="del-icon mb-2 mx-auto">
                            <i class="isax isax-trash"></i>
                        </span>
                        <h3 class="mb-2">Delete Dependent</h3>
                        <p class="mb-3">Are you sure you want to delete this dependent?</p>
                        <div class="d-flex justify-content-center flex-wrap gap-3">
                            <a href="#" class="btn btn-md btn-dark rounded-pill"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Yes
                                Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete -->
@endif

@if (Route::is(['doctor-add-blog']))
    <!-- Model -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg"></p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel"
                        data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteNotConfirmModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Active Service?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg1">Service is Booked and Inprogress..</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger si_accept_cancel"
                        data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Model -->
@endif

@if (Route::is(['doctor-appointment-details']))
    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Vitals</h5>
                            <ul>
                                <li><span>Pulse : </span> 64 Bpm</li>
                                <li><span>Systolic BP : </span>100mmHg</li>
                                <li><span>Diastolic : </span>60mmHg</li>
                                <li><span>Spo2 : </span>100%</li>
                                <li><span>BSA : </span>1.68</li>
                                <li><span>Height : </span>159 cm</li>
                                <li><span>Weight : </span>64 Kg</li>
                                <li><span>Patient Direct from : </span>Walk in / OPD</li>
                                <li><span>Body Mass Index : </span>25.16 BMI</li>
                                <li><span>Allergies : </span>Pain near left chest, Pelvic salinity</li>
                            </ul>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Previous Medical History</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Clinical Notes</h5>
                            <p>The patient presents with a 3-day history of worsening cough and fever, peaking at
                                38.5°C,
                                noted for decreased appetite. Physical examination reveals bilateral wheezing and
                                crackles
                                on lung auscultation, suggestive of a respiratory infection.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Complaint</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medi</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Medications</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNO</th>
                                                    <th>Medecine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription2">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Advice</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medicine</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Lab Tests</h5>
                            <p class="mb-0">1. Liver Function Tests (LFTs)</p>
                            <p>2. Hemoglobin A1c (HbA1c)</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Follow Up</h5>
                            <p class="mb-0">After 3 Months in empty Stomach</p>
                            <p>Lab test for Glucose Level</p>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription"
                                    data-bs-dismiss="modal">02</a> of 02</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->
@endif

@if (Route::is(['doctor-appointment-start']))
    <!-- Appointment End Modal -->
    <div class="modal fade info-modal" id="end_session">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="success-wrap">
                        <div class="success-info">
                            <div class="text-center">
                                <span class="icon-success bg-blue"><i class="fa-solid fa-calendar-check"></i></span>
                                <h3>Session Ended</h3>
                                <p>Your Appointment has been Ended</p>
                            </div>
                        </div>
                    </div>

                    <div class="modal-btn text-center">
                        <a href="#" class="btn btn-gray" data-bs-toggle="modal" data-bs-dismiss="modal">Go
                            to
                            Appointments</a>
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription"
                            class="btn btn-primary prime-btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment End Modal -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Vitals</h5>
                            <ul>
                                <li><span>Pulse : </span> 64 Bpm</li>
                                <li><span>Systolic BP : </span>100mmHg</li>
                                <li><span>Diastolic : </span>60mmHg</li>
                                <li><span>Spo2 : </span>100%</li>
                                <li><span>BSA : </span>1.68</li>
                                <li><span>Height : </span>159 cm</li>
                                <li><span>Weight : </span>64 Kg</li>
                                <li><span>Patient Direct from : </span>Walk in / OPD</li>
                                <li><span>Body Mass Index : </span>25.16 BMI</li>
                                <li><span>Allergies : </span>Pain near left chest, Pelvic salinity</li>
                            </ul>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Previous Medical History</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Clinical Notes</h5>
                            <p>The patient presents with a 3-day history of worsening cough and fever, peaking at
                                38.5°C,
                                noted for decreased appetite. Physical examination reveals bilateral wheezing and
                                crackles
                                on lung auscultation, suggestive of a respiratory infection.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Complaint</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medi</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Medications</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Advice</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medicine</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Lab Tests</h5>
                            <p class="mb-0">1. Liver Function Tests (LFTs)</p>
                            <p>2. Hemoglobin A1c (HbA1c)</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Follow Up</h5>
                            <p class="mb-0">After 3 Months in empty Stomach</p>
                            <p>Lab test for Glucose Level</p>
                        </div>


                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNO</th>
                                                    <th>Medecine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of 02</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->
@endif

@if (Route::is(['doctor-appointments-grid']))
    <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal" id="appt_details">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Appointment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="info-details">
                        <li>
                            <div class="details-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="title">#APT0001</span>
                                        <span class="text">21 Oct 2023 10:00 AM</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="text-end">
                                            <button type="button" class="btn bg-success-light btn-sm"
                                                id="topup_status">Completed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="title">Status:</span>
                            <span class="text">Completed</span>
                        </li>
                        <li>
                            <span class="title">Confirm Date:</span>
                            <span class="text">29 Jun 2023</span>
                        </li>
                        <li>
                            <span class="title">Paid Amount</span>
                            <span class="text">$450</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Details Modal -->
@endif

@if (Route::is(['doctor-blog']))
    <!-- Model -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg"></p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel"
                        data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteNotConfirmModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Inactive Service?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg1">Service is Booked and Inprogress..</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger si_accept_cancel"
                        data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Model -->
@endif

@if (Route::is(['doctor-cancelled-appointment-2']))
    <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal custom-modal-two" id="reject_reason">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Reason</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="reason-of-rejection">
                        <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book
                            an
                            reschedule by next week.</p>
                        <span class="text-danger">Cancelled By You on 23 March 2023</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Details Modal -->
@endif

@if (Route::is(['doctor-cancelled-appointment']))
    <!-- Appointment Cancel Reason Modal -->
    <div class="modal fade custom-modal custom-modal-two" id="reject_reason">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Reason</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="reason-of-rejection">
                        <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book
                            an
                            reschedule by next week.</p>
                        <span class="text-danger">Cancelled By You on 23 March 2023</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Cancel Reason Modal -->
@endif

@if (Route::is(['doctor-completed-appointments']))
    <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal custom-modal-two" id="reject_reason">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Reason</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="reason-of-rejection">
                        <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book
                            an
                            reschedule by next week.</p>
                        <span class="text-danger">Cancelled By You on 23 March 2023</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Details Modal -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Vitals</h5>
                            <ul>
                                <li><span>Pulse : </span> 64 Bpm</li>
                                <li><span>Systolic BP : </span>100mmHg</li>
                                <li><span>Diastolic : </span>60mmHg</li>
                                <li><span>Spo2 : </span>100%</li>
                                <li><span>BSA : </span>1.68</li>
                                <li><span>Height : </span>159 cm</li>
                                <li><span>Weight : </span>64 Kg</li>
                                <li><span>Patient Direct from : </span>Walk in / OPD</li>
                                <li><span>Body Mass Index : </span>25.16 BMI</li>
                                <li><span>Allergies : </span>Pain near left chest, Pelvic salinity</li>
                            </ul>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Previous Medical History</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Clinical Notes</h5>
                            <p>The patient presents with a 3-day history of worsening cough and fever, peaking at
                                38.5°C,
                                noted for decreased appetite. Physical examination reveals bilateral wheezing and
                                crackles
                                on lung auscultation, suggestive of a respiratory infection.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Complaint</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medi</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Medications</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNO</th>
                                                    <th>Medecine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription2">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Advice</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medicine</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Lab Tests</h5>
                            <p class="mb-0">1. Liver Function Tests (LFTs)</p>
                            <p>2. Hemoglobin A1c (HbA1c)</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Follow Up</h5>
                            <p class="mb-0">After 3 Months in empty Stomach</p>
                            <p>Lab test for Glucose Level</p>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription"
                                    data-bs-dismiss="modal">02</a> of 02</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->
@endif

@if (Route::is(['doctor-payment']))
    <!-- Configuration -->
    <div class="modal fade custom-modals" id="add_configure">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Configuration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('available-timings') }}">
                    <div class="modal-body">
                        <div class="timing-modal">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap mb-0">
                                        <label class="col-form-label">Email Address</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Configuration -->
@endif

@if (Route::is(['doctor-pending-blog']))
    <!-- Model -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg"></p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel"
                        data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteNotConfirmModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Active Service?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg1">Service is Booked and Inprogress..</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger si_accept_cancel"
                        data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Model -->
@endif

@if (Route::is(['doctor-profile']))
    <!-- Voice Call Modal -->
    <div class="modal fade call-modal" id="voice_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Outgoing Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img alt="User Image"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                        class="call-avatar">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Connecting...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('voice-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">call</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Outgoing Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Voice Call Modal -->

    <!-- Video Call Modal -->
    <div class="modal fade call-modal" id="video_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <!-- Incoming Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img class="call-avatar"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                        alt="User Image">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Calling ...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('video-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">videocam</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Incoming Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- Video Call Modal -->
@endif

@if (Route::is(['doctor-request']))
    <!-- Appointment Accepted Modal -->
    <div class="modal fade info-modal" id="accept_appointment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="success-wrap text-center">
                        <span class="icon-success"><i class="fa-solid fa-calendar-check"></i></span>
                        <h3>Appointment Accepted</h3>
                        <p>Your Appointment has been scheduled on 23 Mar 2023</p>
                        <a href="{{ url('appointments') }}" class="btn btn-primary prime-btn">Go to
                            Appointments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Accepted Modal -->

    <!-- Appointment Cancel Modal -->
    <div class="modal fade info-modal" id="cancel_appointment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="success-wrap">
                        <div class="success-info">
                            <div class="text-center">
                                <span class="icon-success bg-red"><i class="fa-solid fa-xmark"></i></span>
                                <h3>Are you Sure</h3>
                                <p>Do you want to Cancel Appointment</p>
                            </div>
                            <div class="form-wrap">
                                <label class="col-form-label">Cancel Reason <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-wrap">
                                <div class="custom-control form-check custom-control-inline">
                                    <input type="radio" id="reshedule" name="rating_option"
                                        class="form-check-input" value="price_free" checked="">
                                    <label class="form-check-label" for="reshedule">Cancel with Reschedule</label>
                                </div>
                            </div>
                            <div class="form-wrap">
                                <div class="custom-control form-check custom-control-inline">
                                    <input type="radio" id="refund" name="rating_option"
                                        class="form-check-input" value="price_free" checked="">
                                    <label class="form-check-label" for="refund">Cancel with Request
                                        Refund</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-button">
                            <div class="row gx-3">
                                <div class="col-sm-6">
                                    <a href="#" class="btn btn-gray w-100" data-bs-toggle="modal"
                                        data-bs-dismiss="modal">No, I change my mind</a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{ url('appointments') }}" class="btn btn-primary prime-btn w-100">Go
                                        to
                                        Appointments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Cancel Modal -->
@endif

@if (Route::is(['doctor-upcoming-details']))
    <!-- Appointment Details Modal -->
    <div class="modal fade custom-modal custom-modal-two" id="reject_reason">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Reason</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="reason-of-rejection">
                        <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book
                            an
                            reschedule by next week.</p>
                        <span class="text-danger">Cancelled By You on 23 March 2023</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Details Modal -->
@endif

@if (Route::is(['edit-blog']))
    <!-- Model -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteConfirmModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg"></p>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0)" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel"
                        data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteNotConfirmModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Active Service?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="acc_msg1">Service is Booked and Inprogress..</p>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-danger si_accept_cancel"
                        data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Model -->
@endif

@if (Route::is(['invoices']))
    <!--View Invoice -->
    <div class="modal fade custom-modals" id="invoice_view">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Invoice</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="isax isax-printer5"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe invoice-content">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        <strong>Invoice No : </strong> #INV005<br>
                                        <strong>Issued:</strong> 21 Mar 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing From</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Edalin Hendry <br>
                                            806 Twin Willow Lane, <br>
                                            Newyork, USA <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing To</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Richard Wilson <br>
                                            299 Star Trek Drive<br>
                                            Florida, 32405, USA<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info invoice-info2">
                                        <h6 class="customer-text">Payment Method</h6>
                                        <p class="invoice-details">
                                            Debit Card <br>
                                            XXXXXXXXXXXX-2541<br>
                                            HDFC Bank<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Invoice Details</h6>
                                    <div class="table-responsive">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Quatity</th>
                                                    <th>VAT</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>General Consultation</td>
                                                    <td>1</td>
                                                    <td>$0</td>
                                                    <td>$150</td>
                                                </tr>
                                                <tr>
                                                    <td>Video Call</td>
                                                    <td>1</td>
                                                    <td>$0</td>
                                                    <td>$100</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 ms-auto">
                                    <div class="table-responsive">
                                        <table class="invoice-table-two table">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td><span>$350</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount:</th>
                                                    <td><span>-10%</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td><span>$315</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Information -->
                        <div class="other-info mb-0">
                            <h4>Other information</h4>
                            <p class="mb-0">An account of the present illness, which includes the circumstances
                                surrounding
                                the onset of recent health changes and the chronology of subsequent events that have led
                                the
                                patient to seek medicine</p>
                        </div>
                        <!-- /Invoice Information -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Invoice -->
@endif

@if (Route::is(['medical-details']))
    <!-- Add Medical Detail -->
    <div class="modal fade custom-modals" id="add-med-record">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Vitals</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('medical-details') }}">
                    <div class="modal-body pb-0">
                        <div class="timing-modal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">BMI <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Heart Rate <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Weight <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">FBC <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="col-form-label">Date <span
                                                class="text-danger">*</span></label>
                                        <div class="form-icon">
                                            <input type="text" class="form-control datetimepicker"
                                                placeholder="dd/mm/yyyy">
                                            <span class="icon"><i class="isax isax-calendar-1"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Add
                                Details</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Medical Detail -->

    <!-- Edit Medical Detail -->
    <div class="modal fade custom-modals" id="edit-med-record">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Medical Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('medical-details') }}">
                    <div class="modal-body">
                        <div class="timing-modal">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">BMI <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="20.1 kg/m2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Heart Rate <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="140 Bpm">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Weight <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="300">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">FBC <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="70 - 90">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="col-form-label">Date <span
                                                class="text-danger">*</span></label>
                                        <div class="form-icon">
                                            <input type="text" class="form-control datetimepicker"
                                                value="23/12/2024">
                                            <span class="icon"><i class="isax isax-calendar-1"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save
                                Details</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Medical Detail -->

    <!-- Medical Detail -->
    <div class="modal fade custom-modals" id="med-detail">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vital Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('medical-details') }}">
                    <div class="modal-body pb-0">
                        <div class="med-detail-patient">
                            <div class="med-patient">
                                <span><img src="{{ URL::asset('build/img/doctors-dashboard/profile-06.jpg') }}"
                                        alt="Img"></span>
                                <div class="name-detail">
                                    <h5>Hendrita Kearns</h5>
                                    <ul>
                                        <li>Age : 42 </li>
                                        <li>Female</li>
                                        <li>AB+ve</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="date-cal">
                                <p><span><i class="isax isax-calendar-tick5 me-1"></i>Last Updated</span>24 Mar 2024
                                </p>
                            </div>
                        </div>
                        <div class="med-detail-item pb-3">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="health-records icon-red">
                                        <span><i class="fa-solid fa-syringe"></i>Blood Pressure</span>
                                        <h3>100 mg/dl</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="health-records icon-orange">
                                        <span><i class="fa-solid fa-heart"></i>Heart Rate</span>
                                        <h3>140 Bpm</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="health-records icon-dark-blue">
                                        <span><i class="fa-solid fa-notes-medical"></i>Glucose Level</span>
                                        <h3>70 - 90</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="health-records icon-amber mb-0">
                                        <span><i class="fa-solid fa-temperature-high"></i>Body Temprature</span>
                                        <h3>37.5 C</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="health-records icon-purple mb-0">
                                        <span><i class="fa-solid fa-user-pen"></i>BMI </span>
                                        <h3>20 kg/m2</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="health-records icon-blue mb-0">
                                        <span><i class="fa-solid fa-highlighter"></i>SPo2</span>
                                        <h3>96%</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Medical Detail -->

    <!-- Delete -->
    <div class="modal fade custom-modals" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-4 text-center">
                    <form action="{{ url('medical-details') }}">
                        <span class="del-icon mb-2 mx-auto">
                            <i class="isax isax-trash"></i>
                        </span>
                        <h3 class="mb-2">Delete Vital</h3>
                        <p class="mb-3">Are you sure you want to delete this vital?</p>
                        <div class="d-flex justify-content-center flex-wrap gap-3">
                            <a href="#" class="btn btn-md btn-dark rounded-pill"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Yes
                                Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete -->
@endif

@if (Route::is(['medical-records']))
    <!-- Add Medical Records Modal -->
    <div class="modal fade custom-modals" id="add_medical_records">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Medical Record</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form>
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Record For <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Date <span class="text-danger">*</span></label>
                                    <div class="form-icon">
                                        <input type="text" class="form-control datetimepicker">
                                        <span class="icon"><i class="isax isax-calendar-1"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Comments <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Record <span class="text-danger">*</span></label>
                                    <div>
                                        <div class="file-upload">
                                            <input type="file">
                                            <p><i class="isax isax-document-upload me-1"></i>Upload File</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Add Medical
                                Records</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Medical Records Modal -->

    <!-- Edit Medical Records Modal -->
    <div class="modal fade custom-modals" id="edit_medical_records">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Medical Record</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form>
                    <div class="modal-body pb-0">
                        <div class="row">
                            <div class="mb-3">
                                <label class="col-form-label">Title</label>
                                <input type="text" class="form-control" value="Glucose Test V12">
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Record For <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="Hendrita Clark">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Date <span class="text-danger">*</span></label>
                                    <div class="form-icon">
                                        <input type="text" class="form-control datetimepicker"
                                            value="23/04/2024">
                                        <span class="icon"><i class="isax isax-calendar-1"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Comments <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="3">Take Good Rest</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="col-form-label">Record <span class="text-danger">*</span></label>
                                    <div>
                                        <div class="file-upload">
                                            <input type="file">
                                            <p><i class="isax isax-document-upload me-1"></i>Upload File</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save Medical
                                Records</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Medical Records Modal -->

    <!--View Report -->
    <div class="modal fade custom-modals" id="view_report">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Report</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download gap-2">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-md btn-primary-gradient rounded-pill">Download</a>
                            </li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details p-0 border-0">

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info d-flex align-items-center">
                                        <div
                                            class="clinic-image d-inline-flex align-items-center justify-content-center">
                                            <img src="{{ URL::asset('build/img/icons/vtaplus.svg') }}"
                                                alt="img">
                                        </div>
                                        <div>
                                            <h6 class="fs-16 fw-semibold">Vitalplus Clinic</h6>
                                            <p class="fs-14 fw-medium">Dr. Sandy Maria</p>
                                            <p class="fs-14">MBLS,MS</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Test Type : </span>CBC</p>
                                        <p><span>Collected On : </span>20 Mar 2024, 10:00 AM</p>
                                        <p><span>Reported On : </span>21 Mar 2024, 11:00 AM</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div
                                        class="patient-infos d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-2">
                                                <img src="{{ URL::asset('build/img/doctors-dashboard/profile-06.jpg') }}"
                                                    class="rounded" alt="img">
                                            </span>
                                            <div>
                                                <h6 class="fs-14 fw-medium">Hendrita Kearns</h6>
                                                <p>Patient ID : PT254654</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-medium">Gender</h6>
                                            <p>Female</p>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-medium">Age</h6>
                                            <p>32 years </p>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-medium">Blood</h6>
                                            <p>O+</p>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-medium">Type</h6>
                                            <p>Outpatient</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                            <h6>Complete Blood Count(CBC)</h6>
                            <p class="fs-14 mb-0"><span class="text-gray-9">Primary Test Type :</span> Blood</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Investigation</th>
                                                    <th>Result</th>
                                                    <th>Reference Value</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="report-title" colspan="4">HEMOGLOBIN</td>
                                                </tr>
                                                <tr>
                                                    <td>Hemoglobin (Hb)</td>
                                                    <td>12.5<span
                                                            class="badge badge-info-transparent text-xs d-inline-block rounded-pill ms-1">Low</span>
                                                    </td>
                                                    <td>13.0 - 17.0</td>
                                                    <td>g/dL</td>
                                                </tr>
                                                <tr>
                                                    <td class="report-title" colspan="4">RBC COUNT</td>
                                                </tr>
                                                <tr>
                                                    <td>Total RBC Count</td>
                                                    <td>5.2</td>
                                                    <td>4.5 - 5.5</td>
                                                    <td>million cells/µL</td>
                                                </tr>
                                                <tr>
                                                    <td class="report-title" colspan="4">BLOOD INDICES</td>
                                                </tr>
                                                <tr>
                                                    <td>Packed Cell Volume (PCV)</td>
                                                    <td class="text-danger">57.5<span
                                                            class="badge badge-danger-transparent text-xs d-inline-block rounded-pill ms-1">High</span>
                                                    </td>
                                                    <td>40 - 50</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Mean Corpuscular Volume (MCV) <span
                                                            class="fs-10 text-gray-6">Calculated</span></td>
                                                    <td>87.75</td>
                                                    <td>83 - 101</td>
                                                    <td>fL</td>
                                                </tr>
                                                <tr>
                                                    <td>MCH Calculated</td>
                                                    <td>27.72</td>
                                                    <td>27 - 32</td>
                                                    <td>pg</td>
                                                </tr>
                                                <tr>
                                                    <td>MCHC Calculated</td>
                                                    <td>32.8</td>
                                                    <td>32.5 - 34.5</td>
                                                    <td>g/dL</td>
                                                </tr>
                                                <tr>
                                                    <td>RDW</td>
                                                    <td>13.6</td>
                                                    <td>11.6 - 14.0</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td class="report-title" colspan="4">WBC COUNT</td>
                                                </tr>
                                                <tr>
                                                    <td>Total WBC Count</td>
                                                    <td>9000</td>
                                                    <td>4000 - 11000</td>
                                                    <td>cells/µL</td>
                                                </tr>
                                                <tr>
                                                    <td class="report-title" colspan="4">DIFFERENTIAL WBC COUNT
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Neutrophils</td>
                                                    <td>60</td>
                                                    <td>50 - 62</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Lymphocytes</td>
                                                    <td>31</td>
                                                    <td>20 - 40</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Eosinophils</td>
                                                    <td>01</td>
                                                    <td>00 - 06</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Monocytes</td>
                                                    <td>07</td>
                                                    <td>00 - 10</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Basophils</td>
                                                    <td>01</td>
                                                    <td>00 - 02</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Platelet Count</td>
                                                    <td>248157</td>
                                                    <td>150000 - 410000</td>
                                                    <td>µL</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <p class="mb-2"><span class="text-gray-9 fw-medium">Instruments :</span> Fully Automated
                            Cell
                            Counter - Mindray 300</p>
                        <p class="mb-3"><span class="text-gray-9 fw-medium">Interpretation :</span> Further
                            confirm for
                            Anemia</p>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Report -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="isax isax-printer"></i></a></li>
                            <li><a href="#" class="btn btn-primary-gradient rounded-pill">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe invoice-content mb-0">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        <strong>Prescription ID :</strong> #PR-123 <br>
                                        <strong>Issued:</strong> 21 Mar 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Doctor Details</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Edalin Hendry <br>
                                            806 Twin Willow Lane, <br>
                                            Newyork, USA <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info invoice-info2">
                                        <h6 class="customer-text">Patient Details</h6>
                                        <p class="invoice-details">
                                            Adrian Marshall <br>
                                            299 Star Trek Drive,<br>
                                            Florida, 32405, USA <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Prescription Details</h6>
                                    <div class="table-responsive">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Information -->
                        <div class="other-info">
                            <h4>Other information</h4>
                            <p class="mb-0">An account of the present illness, which includes the circumstances
                                surrounding
                                the onset of recent health changes and the chronology of subsequent events that have led
                                the
                                patient to seek medicine</p>
                        </div>
                        <div class="other-info">
                            <h4>Follow Up</h4>
                            <p class="mb-0">Follow up after 3 months, Have to come on empty stomach</p>
                        </div>
                        <div class="prescriber-info">
                            <h6>Dr. Edalin Hendry</h6>
                            <p>Dept of Cardiology</p>
                        </div>
                        <!-- /Invoice Information -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!-- Delete -->
    <div class="modal fade custom-modals" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-4 text-center">
                    <form action="{{ url('medical-records') }}">
                        <span class="del-icon mb-2 mx-auto">
                            <i class="isax isax-trash"></i>
                        </span>
                        <h3 class="mb-2">Delete Record</h3>
                        <p class="mb-3">Are you sure you want to delete this record?</p>
                        <div class="d-flex justify-content-center flex-wrap gap-3">
                            <a href="#" class="btn btn-md btn-dark rounded-pill"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Yes
                                Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete -->
@endif

@if (Route::is(['patient-accounts']))
    <!-- Payment Moodal -->
    <div class="modal fade custom-modals" id="payment_request">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('patient-accounts') }}">
                    <div class="modal-body pb-0">
                        <div class="mb-3">
                            <label class="form-label">Enter Amount <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Select Payment Gateway <span
                                    class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select</option>
                                <option>Card</option>
                                <option>Paypal</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Add to
                                Wallet</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Payment Moodal -->

    <!-- Account Details Modal-->
    <div class="modal fade custom-modals" id="add_card">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('patient-accounts') }}">
                    <div class="modal-body pb-0">
                        <div class="mb-3">
                            <label class="form-label">Card Holder Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Card Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Expire Date <span class="text-danger">*</span></label>
                            <div class="form-icon">
                                <input type="text" class="form-control datetimepicker">
                                <span class="icon"><i class="isax isax-calendar-1"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">CVV <span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Branch <span class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select</option>
                                <option>London</option>
                                <option>Newyork</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div
                            class="modal-btn d-flex align-items-center justify-content-between flex-wrap gap-3 w-100">
                            <div class="form-check d-flex">
                                <input class="form-check-input" type="checkbox" id="mark">
                                <label class="form-check-label fs-14 ms-2" for="mark">
                                    Mark as Default
                                </label>
                            </div>
                            <div>
                                <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Add
                                    Card</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Account Details Modal-->

    <!-- Account Details Modal-->
    <div class="modal fade custom-modals" id="edit_card">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('patient-accounts') }}">
                    <div class="modal-body pb-0">
                        <div class="mb-3">
                            <label class="form-label">Card Holder Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="Darren">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Card Number <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="5396 5250 1908 1647">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Expire Date <span class="text-danger">*</span></label>
                            <div class="form-icon">
                                <input type="text" class="form-control datetimepicker" value="15-04-2026">
                                <span class="icon"><i class="isax isax-calendar-1"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">CVV <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" value="556">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Branch <span class="text-danger">*</span></label>
                            <select class="select">
                                <option>Select</option>
                                <option selected>London</option>
                                <option>Newyork</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div
                            class="modal-btn d-flex align-items-center justify-content-between flex-wrap gap-3 w-100">
                            <div class="form-check d-flex">
                                <input class="form-check-input" type="checkbox" id="mark1" checked>
                                <label class="form-check-label fs-14 ms-2" for="mark1">
                                    Mark as Default
                                </label>
                            </div>
                            <div>
                                <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save
                                    Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Account Details Modal-->

    <!-- Other Accounts Modal-->
    <div class="modal fade custom-modals modal-lg" id="other_accounts">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Other Accounts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="other-accounts-info">
                        <ul>
                            <li>
                                <ul class="other-bank-info">
                                    <li>
                                        <h6>Name</h6>
                                        <span>Citi Bank Inc</span>
                                    </li>
                                    <li>
                                        <h6>Account No</h6>
                                        <span>5396 5250 1908 XXXX</span>
                                    </li>
                                    <li>
                                        <h6>Branch</h6>
                                        <span>London</span>
                                    </li>
                                    <li>
                                        <h6>Name on Bank Account</h6>
                                        <span>Edalin Hendry</span>
                                    </li>
                                    <li>
                                        <a href="#">Current</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="other-bank-info">
                                    <li>
                                        <h6>Name</h6>
                                        <span>HDFC Bank Inc</span>
                                    </li>
                                    <li>
                                        <h6>Account No</h6>
                                        <span>7382 4924 4924 XXXX</span>
                                    </li>
                                    <li>
                                        <h6>Branch</h6>
                                        <span>New York</span>
                                    </li>
                                    <li>
                                        <h6>Name on Bank Account</h6>
                                        <span>Edalin Hendry</span>
                                    </li>
                                    <li>
                                        <a href="#">Change to default</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="other-bank-info">
                                    <li>
                                        <h6>Name</h6>
                                        <span>Union Bank Inc</span>
                                    </li>
                                    <li>
                                        <h6>Account No</h6>
                                        <span>8934 4902 9024 XXXX</span>
                                    </li>
                                    <li>
                                        <h6>Branch</h6>
                                        <span>Chicago</span>
                                    </li>
                                    <li>
                                        <h6>Name on Bank Account</h6>
                                        <span>Edalin Hendry</span>
                                    </li>
                                    <li>
                                        <a href="#">Change to default</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="other-bank-info">
                                    <li>
                                        <h6>Name</h6>
                                        <span>KVB Bank Inc</span>
                                    </li>
                                    <li>
                                        <h6>Account No</h6>
                                        <span>5892 4920 4829 XXXX</span>
                                    </li>
                                    <li>
                                        <h6>Branch</h6>
                                        <span>Austin</span>
                                    </li>
                                    <li>
                                        <h6>Name on Bank Account</h6>
                                        <span>Edalin Hendry</span>
                                    </li>
                                    <li>
                                        <a href="#">Change to default</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="modal-btn text-end">
                        <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Other Accounts Modal-->

    <!-- Request Completed Modal-->
    <div class="modal fade custom-modal custom-modal-two" id="request_details_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request Details <span class="badge badge-success-bg">Completed</span>
                    </h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="completed-request">
                        <ul>
                            <li>
                                <h6>ID</h6>
                                <span>#AC-1234</span>
                            </li>
                            <li>
                                <h6>Requested on</h6>
                                <span>24 Mar 2024</span>
                            </li>
                            <li>
                                <h6>Credited Date</h6>
                                <span>24 Mar 2024</span>
                            </li>
                            <li>
                                <h6>Amount</h6>
                                <span class="link-primary">$300</span>
                            </li>
                        </ul>
                        <div class="bank-detail">
                            <h4>Bank Details</h4>
                            <div class="accont-information">
                                <h6>Name</h6>
                                <span>Citi Bank Inc</span>
                            </div>
                            <div class="accont-information">
                                <h6>Account No</h6>
                                <span>5396 5250 1908 XXXX</span>
                            </div>
                            <div class="accont-information">
                                <h6>Branch</h6>
                                <span>London</span>
                            </div>
                        </div>
                        <div class="request-des">
                            <h4>Reqeust Description</h4>
                            <p>I recently completed a series of dental treatments with Dr.Edalin Hendry,
                                and I couldn't be more pleased with the results. From my very first appointment.
                            </p>
                        </div>
                        <a href="#" class="btn btn-primary prime-btn w-100"
                            data-bs-dismiss="modal">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Request Completed Modal-->

    <!-- Request Cancel Modal-->
    <div class="modal fade custom-modal custom-modal-two" id="request_cancel_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Request Details <span class="badge badge-danger-bg">Cancelled</span>
                    </h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="cancelled-request">
                        <div class="canceled-user-info d-flex align-items-center">
                            <div class="patinet-information">
                                <a href="{{ url('doctor-upcoming-appointment') }}">
                                    <img src="{{ URL::asset('build/img/doctors-dashboard/profile-01.jpg') }}"
                                        alt="User Image">
                                </a>
                                <div class="patient-info">
                                    <p>#Apt0001</p>
                                    <h6><a href="{{ url('doctor-upcoming-appointment') }}">Adrian</a></h6>
                                </div>
                            </div>
                            <div class="email-info">
                                <ul>
                                    <li><i class="isax isax-sms5"></i>adran@example.com</li>
                                    <li><i class="isax isax-call5"></i>+1 504 368 6874</li>
                                </ul>
                            </div>
                        </div>
                        <div class="cancellation-fees">
                            <h6>Consultation Fees : $200</h6>
                            <div class="cancellation-info">
                                <div class="appointment-type">
                                    <p class="md-text">Type of Appointment</p>
                                    <p><i class="fa-solid fa-building text-green"></i>Direct Visit</p>
                                </div>
                                <div class="appointment-type">
                                    <p class="md-text">Clinic Location</p>
                                    <p>Adrian’s Dentistry</p>
                                </div>
                            </div>
                        </div>
                        <div class="cancel-reason">
                            <h5>Reason</h5>
                            <p>I have an urgent surgery, while our Appointment so i am rejecting appointment </p>
                            <span class="text-danger">Cancelled By You on 23 Mar 2024</span>
                        </div>
                        <div class="refund-status">
                            <span class="link-primary refund">Status : Initiated</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Request Cancel Modal-->

    <!-- Refund Request Modal-->
    <div class="modal fade info-modal" id="refund-request">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="success-wrap text-center">
                        <span class="icon-success"><i class="fa-solid fa-calendar-check"></i></span>
                        <h3>Refund initiated Successfully</h3>
                        <p>Your Payment will be credited in your bank account in 3 working days</p>
                        <a href="#" class="btn btn-primary prime-btn" data-bs-dismiss="modal">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Refund Request Modal-->
@endif

@if (Route::is(['patient-appointment-details']))
    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Vitals</h5>
                            <ul>
                                <li><span>Pulse : </span> 64 Bpm</li>
                                <li><span>Systolic BP : </span>100mmHg</li>
                                <li><span>Diastolic : </span>60mmHg</li>
                                <li><span>Spo2 : </span>100%</li>
                                <li><span>BSA : </span>1.68</li>
                                <li><span>Height : </span>159 cm</li>
                                <li><span>Weight : </span>64 Kg</li>
                                <li><span>Patient Direct from : </span>Walk in / OPD</li>
                                <li><span>Body Mass Index : </span>25.16 BMI</li>
                                <li><span>Allergies : </span>Pain near left chest, Pelvic salinity</li>
                            </ul>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Previous Medical History</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Clinical Notes</h5>
                            <p>The patient presents with a 3-day history of worsening cough and fever, peaking at
                                38.5°C,
                                noted for decreased appetite. Physical examination reveals bilateral wheezing and
                                crackles
                                on lung auscultation, suggestive of a respiratory infection.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Complaint</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medi</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Medications</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNO</th>
                                                    <th>Medecine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription2">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Advice</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medicine</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Lab Tests</h5>
                            <p class="mb-0">1. Liver Function Tests (LFTs)</p>
                            <p>2. Hemoglobin A1c (HbA1c)</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Follow Up</h5>
                            <p class="mb-0">After 3 Months in empty Stomach</p>
                            <p>Lab test for Glucose Level</p>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription"
                                    data-bs-dismiss="modal">02</a> of 02</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!-- Appointment Cancel Reason Modal -->
    <div class="modal fade custom-modal custom-modal-two" id="reject_reason">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Reason</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="reason-of-rejection">
                        <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book
                            an
                            reschedule by next week.</p>
                        <span class="text-danger">Cancelled By You on 23 March 2023</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Cancel Reason Modal -->
@endif

@if (Route::is(['patient-appoitnments']))
    <!-- Edit Dependent Modal-->
    <div class="modal fade custom-modals" id="add_review">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Review</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="add-dependent">
                        <div class="modal-body pb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Rating <span class="text-danger">*</span></label>
                                        <div class="selection-wrap">
                                            <div class="d-inline-block">
                                                <div class="rating-selction">
                                                    <input type="radio" name="rating" value="5"
                                                        id="rating5">
                                                    <label for="rating5"><i class="fa-solid fa-star"></i></label>
                                                    <input type="radio" name="rating" value="4"
                                                        id="rating4">
                                                    <label for="rating4"><i class="fa-solid fa-star"></i></label>
                                                    <input type="radio" name="rating" value="3"
                                                        id="rating3">
                                                    <label for="rating3"><i class="fa-solid fa-star"></i></label>
                                                    <input type="radio" name="rating" value="2"
                                                        id="rating2" checked>
                                                    <label for="rating2"><i class="fa-solid fa-star"></i></label>
                                                    <input type="radio" name="rating" value="1"
                                                        id="rating1" checked>
                                                    <label for="rating1"><i class="fa-solid fa-star"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Comments <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-md btn-dark rounded-pill" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Add
                                Review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Dependent Modal-->

    <!-- Edit Dependent Modal-->
    <div class="modal fade custom-modals" id="view_review">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Review Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body pb-0">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between flex-wrap gap-3">
                                <div>
                                    <label class="form-label text-gray-6">Review for</label>
                                    <div class="d-flex align-items-center">
                                        <span class="user-avatar me-2">
                                            <img src="{{ URL::asset('build/img/doctors/doctor-thumb-01.jpg') }}"
                                                alt="img">
                                        </span>
                                        <h6 class="fs-16 fw-medium">Dr Edalin</h6>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label text-gray-6">Review By </label>
                                    <div class="d-flex align-items-center">
                                        <span class="user-avatar me-2">
                                            <img src="{{ URL::asset('build/img/doctors-dashboard/profile-06.jpg') }}"
                                                alt="img">
                                        </span>
                                        <h6 class="fs-16 fw-medium">Hendrita</h6>
                                    </div>
                                </div>
                                <div>
                                    <label class="form-label text-gray-6">Rating</label>
                                    <div class="d-flex align-items-center rating-list">
                                        <i class="fa-solid fa-star selected"></i>
                                        <i class="fa-solid fa-star selected"></i>
                                        <i class="fa-solid fa-star selected"></i>
                                        <i class="fa-solid fa-star selected"></i>
                                        <i class="fa-solid fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div class="review-wrap">
                                <label class="form-label text-gray-6">Review</label>
                                <p class="mb-0">Dr. Edalin provided exceptional care and took the time to listen to
                                    my
                                    concerns. I’m feeling better than ever and highly recommend him!"</p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Dependent Modal-->
@endif

@if (Route::is(['patient-cancelled-appointment']))
    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Vitals</h5>
                            <ul>
                                <li><span>Pulse : </span> 64 Bpm</li>
                                <li><span>Systolic BP : </span>100mmHg</li>
                                <li><span>Diastolic : </span>60mmHg</li>
                                <li><span>Spo2 : </span>100%</li>
                                <li><span>BSA : </span>1.68</li>
                                <li><span>Height : </span>159 cm</li>
                                <li><span>Weight : </span>64 Kg</li>
                                <li><span>Patient Direct from : </span>Walk in / OPD</li>
                                <li><span>Body Mass Index : </span>25.16 BMI</li>
                                <li><span>Allergies : </span>Pain near left chest, Pelvic salinity</li>
                            </ul>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Previous Medical History</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Clinical Notes</h5>
                            <p>The patient presents with a 3-day history of worsening cough and fever, peaking at
                                38.5°C,
                                noted for decreased appetite. Physical examination reveals bilateral wheezing and
                                crackles
                                on lung auscultation, suggestive of a respiratory infection.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Complaint</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medi</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Medications</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNO</th>
                                                    <th>Medecine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription2">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Advice</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medicine</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Lab Tests</h5>
                            <p class="mb-0">1. Liver Function Tests (LFTs)</p>
                            <p>2. Hemoglobin A1c (HbA1c)</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Follow Up</h5>
                            <p class="mb-0">After 3 Months in empty Stomach</p>
                            <p>Lab test for Glucose Level</p>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription"
                                    data-bs-dismiss="modal">02</a> of 02</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!-- Appointment Cancel Reason Modal -->
    <div class="modal fade custom-modal custom-modal-two" id="reject_reason">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Reason</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="reason-of-rejection">
                        <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book
                            an
                            reschedule by next week.</p>
                        <span class="text-danger">Cancelled By You on 23 March 2023</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Cancel Reason Modal -->
@endif

@if (Route::is(['patient-completed-appointment']))
    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Vitals</h5>
                            <ul>
                                <li><span>Pulse : </span> 64 Bpm</li>
                                <li><span>Systolic BP : </span>100mmHg</li>
                                <li><span>Diastolic : </span>60mmHg</li>
                                <li><span>Spo2 : </span>100%</li>
                                <li><span>BSA : </span>1.68</li>
                                <li><span>Height : </span>159 cm</li>
                                <li><span>Weight : </span>64 Kg</li>
                                <li><span>Patient Direct from : </span>Walk in / OPD</li>
                                <li><span>Body Mass Index : </span>25.16 BMI</li>
                                <li><span>Allergies : </span>Pain near left chest, Pelvic salinity</li>
                            </ul>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Previous Medical History</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Clinical Notes</h5>
                            <p>The patient presents with a 3-day history of worsening cough and fever, peaking at
                                38.5°C,
                                noted for decreased appetite. Physical examination reveals bilateral wheezing and
                                crackles
                                on lung auscultation, suggestive of a respiratory infection.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Complaint</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medi</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Medications</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNO</th>
                                                    <th>Medecine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription2">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.png') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Advice</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medicine</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Lab Tests</h5>
                            <p class="mb-0">1. Liver Function Tests (LFTs)</p>
                            <p>2. Hemoglobin A1c (HbA1c)</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Follow Up</h5>
                            <p class="mb-0">After 3 Months in empty Stomach</p>
                            <p>Lab test for Glucose Level</p>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription"
                                    data-bs-dismiss="modal">02</a> of 02</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!-- Appointment Cancel Reason Modal -->
    <div class="modal fade custom-modal custom-modal-two" id="reject_reason">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Reason</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="reason-of-rejection">
                        <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book
                            an
                            reschedule by next week.</p>
                        <span class="text-danger">Cancelled By You on 23 March 2023</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Cancel Reason Modal -->
@endif

@if (Route::is(['patient-dashboard']))
    <!-- Add Dependent Modal-->
    <div class="modal fade custom-modals" id="add_dependent">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Dependant</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="add-dependent">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-wrap pb-0">
                                        <div class="change-avatar img-upload">
                                            <div class="profile-img">
                                                <i class="fa-solid fa-file-image"></i>
                                            </div>
                                            <div class="upload-img">
                                                <h5>Profile Image</h5>
                                                <div class="imgs-load d-flex align-items-center">
                                                    <div class="change-photo">
                                                        Upload New
                                                        <input type="file" class="upload">
                                                    </div>
                                                    <a href="#" class="upload-remove">Remove</a>
                                                </div>
                                                <p>Your Image should Below 4 MB, Accepted format jpg,png,svg</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Relationship</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">DOB <span class="text-danger">*</span></label>
                                        <div class="form-icon">
                                            <input type="text" class="form-control datetimepicker">
                                            <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Select Gender</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Dependent Modal-->

    <!--View Invoice -->
    <div class="modal fade custom-modals" id="invoice_view">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Invoice</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="isax isax-printer"></i></a></li>
                            <li><a href="#" class="btn btn-md btn-primary-gradient rounded-pill">Download</a>
                            </li>
                        </ul>
                    </div>
                    <div class="view-prescribe invoice-content mb-0">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        Invoice No : <span> #INV005</span><br>
                                        Issued: <span>21 Mar 2024</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing From</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Edalin Hendry <br>
                                            806 Twin Willow Lane, <br>
                                            Newyork, USA <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing To</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Richard Wilson <br>
                                            299 Star Trek Drive<br>
                                            Florida, 32405, USA<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info invoice-info2">
                                        <h6 class="customer-text">Payment Method</h6>
                                        <p class="invoice-details">
                                            Debit Card <br>
                                            XXXXXXXXXXXX-2541<br>
                                            HDFC Bank<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Invoice Details</h6>
                                    <div class="invoice-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Quatity</th>
                                                        <th>VAT</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-gray-9">General Consultation</td>
                                                        <td>1</td>
                                                        <td>$0</td>
                                                        <td>$150</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-gray-9">Video Call</td>
                                                        <td>1</td>
                                                        <td>$0</td>
                                                        <td>$100</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 ms-auto">
                                    <div class="table-responsive">
                                        <table class="invoice-table-two table">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td><span>$350</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount:</th>
                                                    <td><span>-10%</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td><span>$315</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Information -->
                        <div class="other-info mb-0">
                            <h6 class="mb-2">Other information</h6>
                            <p class="text-gray-9 mb-0">An account of the present illness, which includes the
                                circumstances
                                surrounding the onset of recent health changes and the chronology of subsequent events
                                that
                                have led the patient to seek medicine</p>
                        </div>
                        <!-- /Invoice Information -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Invoice -->

    <!--View Report -->
    <div class="modal fade custom-modals" id="view_report">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Report</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download gap-2">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-md btn-primary-gradient rounded-pill">Download</a>
                            </li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details p-0 border-0">

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info d-flex align-items-center">
                                        <div
                                            class="clinic-image d-inline-flex align-items-center justify-content-center">
                                            <img src="{{ URL::asset('build/img/icons/vtaplus.svg') }}"
                                                alt="img">
                                        </div>
                                        <div>
                                            <h6 class="fs-16 fw-semibold">Vitalplus Clinic</h6>
                                            <p class="fs-14 fw-medium">Dr. Sandy Maria</p>
                                            <p class="fs-14">MBLS,MS</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Test Type : </span>CBC</p>
                                        <p><span>Collected On : </span>20 Mar 2024, 10:00 AM</p>
                                        <p><span>Reported On : </span>21 Mar 2024, 11:00 AM</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div
                                        class="patient-infos d-flex align-items-center justify-content-between gap-3 flex-wrap">
                                        <div class="d-flex align-items-center">
                                            <span class="avatar me-2">
                                                <img src="{{ URL::asset('build/img/doctors-dashboard/profile-06.jpg') }}"
                                                    class="rounded" alt="img">
                                            </span>
                                            <div>
                                                <h6 class="fs-14 fw-medium">Hendrita Kearns</h6>
                                                <p>Patient ID : PT254654</p>
                                            </div>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-medium">Gender</h6>
                                            <p>Female</p>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-medium">Age</h6>
                                            <p>32 years </p>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-medium">Blood</h6>
                                            <p>O+</p>
                                        </div>
                                        <div>
                                            <h6 class="fs-14 fw-medium">Type</h6>
                                            <p>Outpatient</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-3">
                            <h6>Complete Blood Count(CBC)</h6>
                            <p class="fs-14 mb-0"><span class="text-gray-9">Primary Test Type :</span> Blood</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Investigation</th>
                                                    <th>Result</th>
                                                    <th>Reference Value</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="report-title" colspan="4">HEMOGLOBIN</td>
                                                </tr>
                                                <tr>
                                                    <td>Hemoglobin (Hb)</td>
                                                    <td>12.5<span
                                                            class="badge badge-info-transparent text-xs d-inline-block rounded-pill ms-1">Low</span>
                                                    </td>
                                                    <td>13.0 - 17.0</td>
                                                    <td>g/dL</td>
                                                </tr>
                                                <tr>
                                                    <td class="report-title" colspan="4">RBC COUNT</td>
                                                </tr>
                                                <tr>
                                                    <td>Total RBC Count</td>
                                                    <td>5.2</td>
                                                    <td>4.5 - 5.5</td>
                                                    <td>million cells/µL</td>
                                                </tr>
                                                <tr>
                                                    <td class="report-title" colspan="4">BLOOD INDICES</td>
                                                </tr>
                                                <tr>
                                                    <td>Packed Cell Volume (PCV)</td>
                                                    <td class="text-danger">57.5<span
                                                            class="badge badge-danger-transparent text-xs d-inline-block rounded-pill ms-1">High</span>
                                                    </td>
                                                    <td>40 - 50</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Mean Corpuscular Volume (MCV) <span
                                                            class="fs-10 text-gray-6">Calculated</span></td>
                                                    <td>87.75</td>
                                                    <td>83 - 101</td>
                                                    <td>fL</td>
                                                </tr>
                                                <tr>
                                                    <td>MCH Calculated</td>
                                                    <td>27.72</td>
                                                    <td>27 - 32</td>
                                                    <td>pg</td>
                                                </tr>
                                                <tr>
                                                    <td>MCHC Calculated</td>
                                                    <td>32.8</td>
                                                    <td>32.5 - 34.5</td>
                                                    <td>g/dL</td>
                                                </tr>
                                                <tr>
                                                    <td>RDW</td>
                                                    <td>13.6</td>
                                                    <td>11.6 - 14.0</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td class="report-title" colspan="4">WBC COUNT</td>
                                                </tr>
                                                <tr>
                                                    <td>Total WBC Count</td>
                                                    <td>9000</td>
                                                    <td>4000 - 11000</td>
                                                    <td>cells/µL</td>
                                                </tr>
                                                <tr>
                                                    <td class="report-title" colspan="4">DIFFERENTIAL WBC COUNT
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Neutrophils</td>
                                                    <td>60</td>
                                                    <td>50 - 62</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Lymphocytes</td>
                                                    <td>31</td>
                                                    <td>20 - 40</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Eosinophils</td>
                                                    <td>01</td>
                                                    <td>00 - 06</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Monocytes</td>
                                                    <td>07</td>
                                                    <td>00 - 10</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Basophils</td>
                                                    <td>01</td>
                                                    <td>00 - 02</td>
                                                    <td>%</td>
                                                </tr>
                                                <tr>
                                                    <td>Platelet Count</td>
                                                    <td>248157</td>
                                                    <td>150000 - 410000</td>
                                                    <td>µL</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <p class="mb-2"><span class="text-gray-9 fw-medium">Instruments :</span> Fully Automated
                            Cell
                            Counter - Mindray 300</p>
                        <p class="mb-3"><span class="text-gray-9 fw-medium">Interpretation :</span> Further
                            confirm for
                            Anemia</p>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Report -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="isax isax-printer"></i></a></li>
                            <li><a href="#" class="btn btn-primary-gradient rounded-pill">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe invoice-content mb-0">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        <strong>Prescription ID :</strong> #PR-123 <br>
                                        <strong>Issued:</strong> 21 Mar 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Doctor Details</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Edalin Hendry <br>
                                            806 Twin Willow Lane, <br>
                                            Newyork, USA <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info invoice-info2">
                                        <h6 class="customer-text">Patient Details</h6>
                                        <p class="invoice-details">
                                            Adrian Marshall <br>
                                            299 Star Trek Drive,<br>
                                            Florida, 32405, USA <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Prescription Details</h6>
                                    <div class="table-responsive">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Information -->
                        <div class="other-info">
                            <h4>Other information</h4>
                            <p class="mb-0">An account of the present illness, which includes the circumstances
                                surrounding
                                the onset of recent health changes and the chronology of subsequent events that have led
                                the
                                patient to seek medicine</p>
                        </div>
                        <div class="other-info">
                            <h4>Follow Up</h4>
                            <p class="mb-0">Follow up after 3 months, Have to come on empty stomach</p>
                        </div>
                        <div class="prescriber-info">
                            <h6>Dr. Edalin Hendry</h6>
                            <p>Dept of Cardiology</p>
                        </div>
                        <!-- /Invoice Information -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!-- Delete -->
    <div class="modal fade custom-modals" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body p-4 text-center">
                    <form action="{{ url('patient-dashboard') }}">
                        <span class="del-icon mb-2 mx-auto">
                            <i class="isax isax-trash"></i>
                        </span>
                        <h3 class="mb-2">Delete Record</h3>
                        <p class="mb-3">Are you sure you want to delete this record?</p>
                        <div class="d-flex justify-content-center flex-wrap gap-3">
                            <a href="#" class="btn btn-md btn-dark rounded-pill"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Yes
                                Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete -->
@endif

@if (Route::is(['patient-invoices']))
    <!--View Invoice -->
    <div class="modal fade custom-modals" id="invoice_view">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Invoice</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="isax isax-printer"></i></a></li>
                            <li><a href="#" class="btn btn-md btn-primary-gradient rounded-pill">Download</a>
                            </li>
                        </ul>
                    </div>
                    <div class="view-prescribe invoice-content mb-0">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        Invoice No : <span> #INV005</span><br>
                                        Issued: <span>21 Mar 2024</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing From</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Edalin Hendry <br>
                                            806 Twin Willow Lane, <br>
                                            Newyork, USA <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing To</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Richard Wilson <br>
                                            299 Star Trek Drive<br>
                                            Florida, 32405, USA<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info invoice-info2">
                                        <h6 class="customer-text">Payment Method</h6>
                                        <p class="invoice-details">
                                            Debit Card <br>
                                            XXXXXXXXXXXX-2541<br>
                                            HDFC Bank<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Invoice Details</h6>
                                    <div class="invoice-table">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Description</th>
                                                        <th>Quatity</th>
                                                        <th>VAT</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-gray-9">General Consultation</td>
                                                        <td>1</td>
                                                        <td>$0</td>
                                                        <td>$150</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-gray-9">Video Call</td>
                                                        <td>1</td>
                                                        <td>$0</td>
                                                        <td>$100</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 ms-auto">
                                    <div class="table-responsive">
                                        <table class="invoice-table-two table">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td><span>$350</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount:</th>
                                                    <td><span>-10%</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td><span>$315</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Information -->
                        <div class="other-info mb-0">
                            <h6 class="mb-2">Other information</h6>
                            <p class="mb-0">An account of the present illness, which includes the circumstances
                                surrounding
                                the onset of recent health changes and the chronology of subsequent events that have led
                                the
                                patient to seek medicine</p>
                        </div>
                        <!-- /Invoice Information -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Invoice -->
@endif

@if (Route::is(['patient-profile']))
    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe invoice-content">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        <strong>Prescription ID :</strong> #PR-123 <br>
                                        <strong>Issued:</strong> 21 Mar 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Doctor Details</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Edalin Hendry <br>
                                            806 Twin Willow Lane, <br>
                                            Newyork, USA <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info invoice-info2">
                                        <h6 class="customer-text">Patient Details</h6>
                                        <p class="invoice-details">
                                            Adrian Marshall <br>
                                            299 Star Trek Drive,<br>
                                            Florida, 32405, USA <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Prescription Details</h6>
                                    <div class="table-responsive">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Medicine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                </tr>
                                                <tr>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Information -->
                        <div class="other-info">
                            <h4>Other information</h4>
                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Vivamus sed
                                dictum ligula, cursus blandit risus. Maecenas eget metus non tellus dignissim aliquam ut
                                a
                                ex. Maecenas sed vehicula dui, ac suscipit lacus. Sed finibus leo vitae lorem interdum,
                                eu
                                scelerisque tellus fermentum. Curabitur sit amet lacinia lorem. Nullam finibus
                                pellentesque
                                libero.</p>
                        </div>
                        <div class="other-info">
                            <h4>Follow Up</h4>
                            <p class="text-muted mb-0">Follow u p after 3 months, Have to come on empty stomach</p>
                        </div>
                        <div class="prescriber-info">
                            <h6>Dr. Edalin Hendry</h6>
                            <p>Dept of Cardiology</p>
                        </div>
                        <!-- /Invoice Information -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_bill">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>View Billing</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe invoice-content">
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-logo">
                                        <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="invoice-details">
                                        <strong>Invoice No : </strong> #INV005<br>
                                        <strong>Issued:</strong> 21 Mar 2024
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing From</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Edalin Hendry <br>
                                            806 Twin Willow Lane, <br>
                                            Newyork, USA <br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Billing To</h6>
                                        <p class="invoice-details invoice-details-two">
                                            Richard Wilson <br>
                                            299 Star Trek Drive<br>
                                            Florida, 32405, USA<br>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="invoice-info invoice-info2">
                                        <h6 class="customer-text">Payment Method</h6>
                                        <p class="invoice-details">
                                            Debit Card <br>
                                            XXXXXXXXXXXX-2541<br>
                                            HDFC Bank<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Invoice Details</h6>
                                    <div class="table-responsive">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Description</th>
                                                    <th>Quatity</th>
                                                    <th>VAT</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>General Consultation</td>
                                                    <td>1</td>
                                                    <td>$0</td>
                                                    <td>$150</td>
                                                </tr>
                                                <tr>
                                                    <td>Video Call</td>
                                                    <td>1</td>
                                                    <td>$0</td>
                                                    <td>$100</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 ms-auto">
                                    <div class="table-responsive">
                                        <table class="invoice-table-two table">
                                            <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td><span>$350</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount:</th>
                                                    <td><span>-10%</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount:</th>
                                                    <td><span>$315</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <!-- Invoice Information -->
                        <div class="other-info mb-0">
                            <h4>Other information</h4>
                            <p class="text-muted mb-0">An account of the present illness, which includes the
                                circumstances
                                surrounding the onset of recent health changes and the chronology of subsequent events
                                that
                                have led the patient to seek medicine</p>
                        </div>
                        <!-- /Invoice Information -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!-- Add Medical Records Modal -->
    <div class="modal fade custom-modals" id="add_medical_records">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Medical Record</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select Patient</option>
                                        <option>Adrian Marshall</option>
                                        <option>Kelly Stevens</option>
                                        <option>Catherine Gracey</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Start Date <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control datetimepicker">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Hospital Name</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <label class="col-form-label">Symptoms <span
                                            class="text-danger">*</span></label>
                                    <div class="input-block input-block-new mb-0">
                                        <input class="input-tags form-control" id="inputBox3" type="text"
                                            data-role="tagsinput" placeholder="Type New" name="Label"
                                            value="Fever, Headache">
                                        <a href="#" class="input-text save-btn">Save</a>
                                    </div>
                                </div>
                                <div class="form-wrap mb-0">
                                    <label class="col-form-label">Report</label>
                                    <div class="upload-file">
                                        <input type="file">
                                        <p>Drop files or Click to upload</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Medical Records Modal -->

    <!-- Add Medical Records Modal -->
    <div class="modal fade custom-modals" id="edit_medical_records">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Edit Medical Record</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" class="form-control" value="Echocardiogram	">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Select Patient</label>
                                    <select class="select">
                                        <option>Select Patient</option>
                                        <option selected>Adrian Marshall</option>
                                        <option>Kelly Stevens</option>
                                        <option>Catherine Gracey</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Start Date <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control datetimepicker" value="17/03/2024">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <label class="col-form-label">Hospital Name</label>
                                    <input type="text" class="form-control" value="ENT Hospital">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <label class="col-form-label">Symptoms <span
                                            class="text-danger">*</span></label>
                                    <div class="input-block input-block-new mb-0">
                                        <input class="input-tags form-control" id="inputBox3" type="text"
                                            data-role="tagsinput" placeholder="Type New" name="Label"
                                            value="Fever, Headache">
                                        <a href="#" class="input-text save-btn">Save</a>
                                    </div>
                                </div>
                                <div class="form-wrap mb-0">
                                    <label class="col-form-label">Report</label>
                                    <div class="upload-file">
                                        <input type="file">
                                        <p>Drop files or Click to upload</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Medical Records Modal -->

    <!-- Add Prescription -->
    <div class="modal fade custom-modals" id="add_prescription">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ url('patient-profile') }}">
                    <div class="modal-body">
                        <div class="patient-wrap">
                            <div class="patient-info mt-0">
                                <img src="{{ URL::asset('build/img/doctors-dashboard/profile-01.jpg') }}"
                                    alt="img">
                                <div class="user-patient">
                                    <h6>#P0016</h6>
                                    <h5>Adrian Marshall</h5>
                                    <ul>
                                        <li>299 Star Trek Drive, Florida, 32405, USA</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="patient-book patien-inv">
                                <h6>#INV0001</h6>
                                <p>1 November 2023</p>
                            </div>
                        </div>
                        <div class="add-prescripe-info">
                            <div class="row prescripe-cont">
                                <div class="col-xl-2 xol-lg-3 col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-2 xol-lg-3 col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Type</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>Visit</option>
                                            <option>Online</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-2 xol-lg-3 col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Dosage</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-2 xol-lg-3 col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Frequency</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-2 xol-lg-3 col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Duration</label>
                                        <select class="select">
                                            <option>Select</option>
                                            <option>1 Month</option>
                                            <option>1 Day</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-2 xol-lg-3 col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="form-wrap w-100">
                                            <label class="col-form-label">Instruction</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-wrap ms-2">
                                            <label class="col-form-label d-block">&nbsp;</label>
                                            <a href="#" class="trash"><i class="isax isax-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="#" class="add-prescribe">Add More</a>
                        </div>
                        <div class="wrap-sign">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sign-wrapper">
                                        <div class="upload-sign">
                                            <p>Click here to sign</p>
                                        </div>
                                        <div class="info-name">
                                            <h6>( Dr. Darren Elder )</h6>
                                            <p>Signature</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Prescription -->

    <!-- Add Billing -->
    <div class="modal fade custom-modals" id="add_billing">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Add Billing</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <div class="patient-wrap">
                            <div class="patient-info">
                                <img src="{{ URL::asset('build/img/doctors-dashboard/profile-01.jpg') }}"
                                    alt="img">
                                <div class="user-patient">
                                    <h6>#P0016</h6>
                                    <h5>Adrian Marshall</h5>
                                    <ul>
                                        <li>Age : 42</li>
                                        <li>Male</li>
                                        <li>AB+ve</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="patient-book patien-inv">
                                <h6>#INV0001</h6>
                                <p>1 November 2023</p>
                            </div>
                        </div>
                        <div class="add-billing-info">
                            <div class="row bill-cont">
                                <div class="col-md-6">
                                    <div class="form-wrap">
                                        <label class="col-form-label">Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <div class="form-wrap w-100">
                                            <label class="col-form-label">Amount</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="form-wrap ms-2">
                                            <label class="col-form-label d-block">&nbsp;</label>
                                            <a href="#" class="trash">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="#" class="add-bill">Add More</a>
                        </div>
                        <div class="wrap-sign">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sign-wrapper">
                                        <div class="upload-sign">
                                            <p>Click here to sign</p>
                                        </div>
                                        <div class="info-name">
                                            <h6>( Dr. Darren Elder )</h6>
                                            <p>Signature</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-btn text-end">
                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                data-bs-dismiss="modal">Cancel</a>
                            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Billing -->
@endif

@if (Route::is(['patient-upcoming-appointments']))
    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Vitals</h5>
                            <ul>
                                <li><span>Pulse : </span> 64 Bpm</li>
                                <li><span>Systolic BP : </span>100mmHg</li>
                                <li><span>Diastolic : </span>60mmHg</li>
                                <li><span>Spo2 : </span>100%</li>
                                <li><span>BSA : </span>1.68</li>
                                <li><span>Height : </span>159 cm</li>
                                <li><span>Weight : </span>64 Kg</li>
                                <li><span>Patient Direct from : </span>Walk in / OPD</li>
                                <li><span>Body Mass Index : </span>25.16 BMI</li>
                                <li><span>Allergies : </span>Pain near left chest, Pelvic salinity</li>
                            </ul>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Previous Medical History</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Clinical Notes</h5>
                            <p>The patient presents with a 3-day history of worsening cough and fever, peaking at
                                38.5°C,
                                noted for decreased appetite. Physical examination reveals bilateral wheezing and
                                crackles
                                on lung auscultation, suggestive of a respiratory infection.</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Complaint</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medi</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Medications</h5>
                            <p>The patient has a history of type 2 diabetes mellitus diagnosed in 2018, well-controlled
                                on
                                metformin. Additionally, the patient underwent appendectomy in 2020 without
                                postoperative
                                complications.</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item invoice-table-wrap">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive inv-table">
                                        <table class="invoice-table table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SNO</th>
                                                    <th>Medecine Name</th>
                                                    <th>Dosage</th>
                                                    <th>Frequency</th>
                                                    <th>Duration</th>
                                                    <th>Timings</th>
                                                    <th>Instruction</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Ecosprin 75MG [Asprin 75 MG Oral Tab]</td>
                                                    <td>75 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Alexer 90MG Tab</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>Before Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Ramistar XL2.5</td>
                                                    <td>60 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-0</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Metscore</td>
                                                    <td>90 mg <span>Oral Tab</span></td>
                                                    <td>1-0-0-1</td>
                                                    <td>1 month</td>
                                                    <td>After Meal</td>
                                                    <td>Take in alternate das, with hot water</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page 01 of <a href="#" data-bs-toggle="modal"
                                    data-bs-target="#view_prescription2" data-bs-dismiss="modal">02</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!--View Prescription -->
    <div class="modal fade custom-modals" id="view_prescription2">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">View Prescription</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="prescribe-download">
                        <h5>21 Mar 2024</h5>
                        <ul>
                            <li><a href="javascript:void(0);" class="print-link"><i
                                        class="fa-solid fa-print"></i></a></li>
                            <li><a href="#" class="btn btn-primary prime-btn">Download</a></li>
                        </ul>
                    </div>
                    <div class="view-prescribe-details">
                        <div class="hospital-addr">
                            <div class="invoice-logo">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" alt="logo">
                            </div>
                            <h5>16, Wardlow, Buxton, Derbyshire, SK17 8RW. Phone : 01298 872268 </h5>
                            <p>Monday to Sunday - 09:30am to 12:00pm</p>
                        </div>

                        <!-- Invoice Item -->
                        <div class="invoice-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="invoice-info">
                                        <h6 class="customer-text">Dr Edalin Hendry</h6>
                                        <p>BDS, MDS - Oral & Maxillofacial Surgery</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="invoice-info2">
                                        <p><span>Date : </span>25 Jan 2024, 07:00</p>
                                        <p><span>Appointment Type : </span>Video</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="patient-id">
                                        <h6>Patient Details</h6>
                                        <div class="patient-det">
                                            <h6>Kelly Joseph</h6>
                                            <ul>
                                                <li>28Y / Male</li>
                                                <li>Blood : O+ve</li>
                                                <li>Patient / Consult ID : OP1245654 / C243546566 </li>
                                                <li>Type : Outpatient</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Invoice Item -->

                        <div class="appointment-notes">
                            <h3>Appointment Note</h3>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Advice</h5>
                            <p>An account of the present illness, which includes the circumstances surrounding the onset
                                of
                                recent health changes and the chronology of subsequent events that have led the patient
                                to
                                seek medicine</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Lab Tests</h5>
                            <p class="mb-0">1. Liver Function Tests (LFTs)</p>
                            <p>2. Hemoglobin A1c (HbA1c)</p>
                        </div>
                        <div class="appoint-wrap">
                            <h5>Follow Up</h5>
                            <p class="mb-0">After 3 Months in empty Stomach</p>
                            <p>Lab test for Glucose Level</p>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="scan-wrap">
                                    <h6>Scan to download report</h6>
                                    <img src="{{ URL::asset('build/img/scan.png') }}" alt="scan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="prescriber-info">
                                    <h6>Dr. Edalin Hendry</h6>
                                    <p>Dept of Cardiology</p>
                                </div>
                            </div>
                        </div>

                        <ul class="nav inv-paginate justify-content-center">
                            <li>Page <a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription"
                                    data-bs-dismiss="modal">02</a> of 02</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /View Prescription -->

    <!-- Appointment Cancel Reason Modal -->
    <div class="modal fade custom-modal custom-modal-two" id="reject_reason">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reject Reason</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span><i class="fa-solid fa-x"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="reason-of-rejection">
                        <p>I have an urgent surgery, while our Appointment so i am rejecting appointment, you can book
                            an
                            reschedule by next week.</p>
                        <span class="text-danger">Cancelled By You on 23 March 2023</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /Appointment Cancel Reason Modal -->
@endif

@if (Route::is(['pharmacy-details']))
    <!-- Voice Call Modal -->
    <div class="modal fade call-modal" id="voice_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Outgoing Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img alt="User Image"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                        class="call-avatar">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Connecting...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('voice-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">call</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Outgoing Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Voice Call Modal -->

    <!-- Video Call Modal -->
    <div class="modal fade call-modal" id="video_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <!-- Incoming Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img class="call-avatar"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                        alt="User Image">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Calling ...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('video-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">videocam</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Incoming Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- Video Call Modal -->
@endif

@if (Route::is(['product-description']))
    <!-- Voice Call Modal -->
    <div class="modal fade call-modal" id="voice_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Outgoing Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img alt="User Image"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                        class="call-avatar">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Connecting...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('voice-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">call</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Outgoing Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Voice Call Modal -->

    <!-- Video Call Modal -->
    <div class="modal fade call-modal" id="video_call">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <!-- Incoming Call -->
                    <div class="call-box incoming-box">
                        <div class="call-wrapper">
                            <div class="call-inner">
                                <div class="call-user">
                                    <img class="call-avatar"
                                        src="{{ URL::asset('build/img/doctors/doctor-thumb-02.jpg') }}"
                                        alt="User Image">
                                    <h4>Dr. Darren Elder</h4>
                                    <span>Calling ...</span>
                                </div>
                                <div class="call-items">
                                    <a href="javascript:void(0);" class="btn call-item call-end"
                                        data-bs-dismiss="modal" aria-label="Close"><i
                                            class="material-icons">call_end</i></a>
                                    <a href="{{ url('video-call') }}" class="btn call-item call-start"><i
                                            class="material-icons">videocam</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Incoming Call -->

                </div>
            </div>
        </div>
    </div>
    <!-- Video Call Modal -->
@endif

@if (Route::is(['two-factor-authentication']))
    <!-- Delete Account -->
    <div class="modal fade custom-modals" id="success-modal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <div class="success-wraps">
                            <div
                                class="icon-success bg-success d-inline-flex align-items-center justify-content-center text-white mb-4">
                                <i class="isax isax-shield-tick fs-24  text-white"></i>
                            </div>
                            <h5 class="mb-1">Successfully Enabled</h5>
                            <p class="mb-4">Authentication code will send to given Phone number for login</p>
                            <a href="#" data-bs-dismiss="modal"
                                class="btn btn-md btn-primary-gradient rounded-pill">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Account -->
@endif
