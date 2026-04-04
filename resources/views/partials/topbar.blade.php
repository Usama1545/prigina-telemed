@if (Route::is(['index']))
    <div class="header-theme header-theme-two">
        <button type="button" id="dark-mode-toggle" class="theme-toggle moon">
            <i class="isax isax-moon5"></i>
        </button>
        <button type="button" id="light-mode-toggle" class="theme-toggle sun">
            <i class="isax isax-sun-15"></i>
        </button>
    </div>

    <!-- Header -->
    <header class="header header-default">
        <div class="container">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="#">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                    <a href="{{ url('index') }}" class="navbar-brand logo">
                        <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="header-menu">
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="{{ url('index') }}" class="menu-logo">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="#">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="has-submenu megamenu active">
                                <a href="{{ url('/') }}" class="main-menu">Home</a>

                                {{-- <ul class="submenu mega-submenu">
                                    <li>
                                        <div class="megamenu-wrapper">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="single-demo active">
                                                        <div class="demo-img">
                                                            <a href="{{url('index')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index')}}" class="inner-demo-img">General Home 1</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo ">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-2')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-01.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-2')}}" class="inner-demo-img">General Home 2</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-3')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-02.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-3')}}" class="inner-demo-img">Dental</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-4')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-03.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-4')}}" class="inner-demo-img">Pediatrics</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-5')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-04.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-5')}}" class="inner-demo-img">ENT</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-6')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-05.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-6')}}" class="inner-demo-img">Veterinary</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo ">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-7')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-06.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-7')}}" class="inner-demo-img">Cardiology</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-8')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-07.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-8')}}" class="inner-demo-img">Eye Care</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-9')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-08.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-9')}}" class="inner-demo-img">Home Care</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-10')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-09.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-10')}}" class="inner-demo-img">Fertility</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-11')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-10.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-11')}}" class="inner-demo-img">Cosmetic Surgery</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-12')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-11.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-12')}}" class="inner-demo-img">Laboratory</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="{{url('index-13')}}" class="inner-demo-img"><img src="{{URL::asset('build/img/home/home-12.jpg')}}" class="img-fluid" alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="{{url('index-13')}}" class="inner-demo-img">Pharmacy</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="#" class="inner-demo-img"><img src="{{URL::asset('build/img/home/coming-soon.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="#" class="inner-demo-img">Coming Soon</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="single-demo">
                                                        <div class="demo-img">
                                                            <a href="#" class="inner-demo-img"><img src="{{URL::asset('build/img/home/coming-soon.jpg')}}" class="img-fluid " alt="img"></a>
                                                        </div>
                                                        <div class="demo-info">
                                                            <a href="#" class="inner-demo-img">Coming Soon</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul> --}}
                            </li>
                            <li class="has-submenu megamenu {{ request()->is('doctors*') ? 'active' : '' }}">
                                <a href="{{ url('doctors') }}" class="main-menu">Doctors</a>
                            </li>
                            {{-- <li class="has-submenu">
                                <a href="#" class="main-menu">Doctors <span><i class="fa-solid fa-chevron-down"></i></span></a>
                                <ul class="submenu sub-menu-one">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <ul class="sub-menu-list">
                                                    <li><a href="{{url('doctor-dashboard')}}">Doctor Dashboard</a></li>
                                                    <li><a href="{{url('appointments')}}">Appointments</a></li>
                                                    <li><a href="{{url('available-timings')}}">Available Timing</a></li>
                                                    <li><a href="{{url('my-patients')}}">Patients List</a></li>
                                                    <li><a href="{{url('chat-doctor')}}">Chat</a></li>
                                                    <li><a href="{{url('invoices')}}">Invoices</a></li>
                                                    <li><a href="{{url('doctor-profile-settings')}}">Profile Settings</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="menu-img">
                                                    <img src="{{URL::asset('build/img/home/menu-img-1.jpg')}}" alt="listing" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#" class="main-menu">Patients <span><i class="fa-solid fa-chevron-down"></i></span></a>
                                <ul class="submenu sub-menu-one sub-menu-two">
                                    <li>
                                        <div class="row">
                                            <div class="col-lg-4 sub-menu-left">
                                                <ul class="sub-menu-list">
                                                    <li><a href="{{url('patient-dashboard')}}">Patient Dashboard</a></li>
                                                    <li><a href="{{url('map-grid')}}">Doctors Grid</a></li>
                                                    <li><a href="{{url('map-list')}}">Doctors List</a></li>
                                                    <li><a href="{{url('map-list-availability')}}">Doctors Availability</a></li>
                                                    <li><a href="{{url('booking')}}">Booking</a></li>
                                                    <li><a href="{{url('booking-1')}}">Booking 1</a></li>
                                                    <li><a href="{{url('booking-2')}}">Booking 2</a></li>
                                                    <li><a href="{{url('booking-popup')}}">Booking Popup</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <ul class="sub-menu-list">
                                                    <li><a href="{{url('search')}}">Search Doctor 1</a></li>
                                                    <li><a href="{{url('search-2')}}">Search Doctor 2</a></li>
                                                    <li><a href="{{url('doctor-profile')}}">Doctor Profile 1</a></li>
                                                    <li><a href="{{url('doctor-profile-2')}}">Doctor Profile 2</a></li>
                                                    <li><a href="{{url('checkout')}}">Checkout</a></li>
                                                    <li><a href="{{url('favourites')}}">Favourites</a></li>
                                                    <li><a href="{{url('chat')}}">Chat</a></li>
                                                    <li><a href="{{url('profile-settings')}}">Profile Settings</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="menu-img">
                                                    <img src="{{URL::asset('build/img/home/menu-img-2.jpg')}}" alt="listing" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li> --}}


                        </ul>
                        <div class="header-items">
                            <!-- Item 1 -->
                            <div class="about-popup-item border-0 pb-0">
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
                            <!-- Item 2 -->
                            <div class="about-popup-item border-0 pb-0">
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

                            <div class="header-items-button">
                                <a href="{{ url('login') }}" class="btn btn-primary"><i
                                        class="isax isax-lock-1 me-2"></i>Sign In</a>
                                <a href="{{ url('register') }}" class="btn btn-secondary"><i
                                        class="isax isax-user-tick4 me-2"></i>Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav header-navbar-rht">
                    <li>
                        <a href="{{ url('login') }}" class="btn btn-md btn-primary">
                            <i class="isax isax-lock-1 me-2"></i><span>Sign Up</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('register') }}" class="btn btn-md btn-secondary">
                            <i class="isax isax-user-tick me-2"></i><span>Register</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="details-btn" data-bs-toggle="offcanvas" data-bs-target="#support_item">
                            <i class="isax isax-menu5"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /Header -->
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
        'accounts',
        'appointments',
        'available-timings',
        'booking',
        'booking-1',
        'booking-2',
        'booking-success',
        'booking-success-one',
        'calendar',
        'cart',
        'payment-success',
        'payment-checkout',
        'checkout',
        'change-password',
        'consultation',
        'doctor-appointments-grid',
        'doctor-appointment-details',
        'doctor-appointment-start',
        'two-factor-authentication',
        'delete-account',
        'dependent',
        'doctor-blog',
        'doctor-add-blog',
        'doctor-profile-settings',
        'doctor-experience-settings',
        'doctor-insurance-settings',
        'doctor-awards-settings',
        'doctor-business-settings',
        'doctor-clinics-settings',
        'doctor-education-settings',
        'doctor-upcoming-appointment',
        'doctor-cancelled-appointment-2',
        'doctor-cancelled-appointment',
        'doctor-completed-appointment',
        'doctor-dashboard',
        'doctor-grid',
        'doctor-payment',
        'doctor-pending-blog',
        'edit-blog',
        'search-2',
        'search',
        'favourites',
        'map-grid',
        'map-list',
        'map-list-availability',
        'profile-settings',
        'doctor-profile-2',
        'doctor-profile',
        'search-2',
        'search',
        'favourites',
        'map-grid',
        'map-list',
        'map-list-availability',
        'profile-settings',
        'doctor-register',
        'doctor-request',
        'doctor-specialities',
        'medical-details',
        'patient-invoices',
        'patient-accounts',
        'medical-records',
        'patient-appointments',
        'patient-appointments-grid',
        'patient-completed-appointment',
        'patient-appointment-details',
        'patient-cancelled-appointment',
        'patient-dependant-details',
        'patient-email',
        'patient-details',
        'patient-family-details',
        'patient-other-details',
        'patient-personalize',
        'patient-profile',
        'patient-upcoming-appointment',
        'my-patients',
        'patient-dashboard',
        'payment',
        'product-checkout',
        'reviews',
        'social-media',
    ]))
    <div class="header-theme header-theme-two">
        <button type="button" id="dark-mode-toggle" class="theme-toggle moon">
            <i class="isax isax-moon5"></i>
        </button>
        <button type="button" id="light-mode-toggle" class="theme-toggle sun">
            <i class="isax isax-sun-15"></i>
        </button>
    </div>

    <!-- Header -->
    <header class="header header-default">
        <div class="container">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="#">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                    <a href="{{ url('index') }}" class="navbar-brand logo">
                        <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="header-menu">
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="{{ url('index') }}" class="menu-logo">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="#">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="has-submenu megamenu">
                                <a href="{{ url('/') }}" class="main-menu">Home</a>

                            </li>
                            <li class="has-submenu megamenu {{ request()->is('doctors*') ? 'active' : '' }}">
                                <a href="{{ url('doctors') }}" class="main-menu">Doctors</a>
                            </li>

                        </ul>
                        <div class="header-items">
                            <!-- Item 1 -->
                            <div class="about-popup-item border-0 pb-0">
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
                            <!-- Item 2 -->
                            <div class="about-popup-item border-0 pb-0">
                                <h3 class="title">Follow Us</h3>
                                <ul class="d-flex align-items-center gap-2 social-iyem">
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="header-items-button">
                                <a href="{{ url('login') }}" class="btn btn-primary "><i
                                        class="isax isax-lock-1 me-2"></i>Sign In</a>
                                <a href="{{ url('register') }}" class="btn btn-secondary"><i
                                        class="isax isax-user-tick4 me-2"></i>Sign Up</a>
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav header-navbar-rht">
                    <li>
                        <a href="{{ url('login') }}" class="btn btn-md btn-primary-gradient">
                            <i class="isax isax-lock-1 me-2"></i><span>Sign Up</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('register') }}" class="btn btn-md btn-dark">
                            <i class="isax isax-user-tick me-2"></i><span>Register</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="details-btn" data-bs-toggle="offcanvas"
                            data-bs-target="#support_item">
                            <i class="isax isax-menu5"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /Header -->

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
                    medical services.</p>
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

@if (Route::is([
        'accounts',
        'appointments',
        'available-timings',
        'calendar',
        'doctor-appointments-grid',
        'doctor-appointment-details',
        'doctor-appointment-start',
        'doctor-blog',
        'doctor-add-blog',
        'doctor-profile-settings',
        'doctor-experience-settings',
        'doctor-insurance-settings',
        'doctor-awards-settings',
        'doctor-business-settings',
        'doctor-clinics-settings',
        'doctor-education-settings',
        'doctor-upcoming-appointment',
        'doctor-cancelled-appointment-2',
        'doctor-cancelled-appointment',
        'doctor-completed-appointment',
        'doctor-dashboard',
        'doctor-payment',
        'doctor-pending-blog',
        'edit-blog',
        'doctor-register',
        'doctor-request',
        'doctor-specialities',
        'doctor-invoices',
        'my-patients',
        'reviews',
        'social-media',
    ]))
    <div class="header-theme header-theme-two">
        <button type="button" id="dark-mode-toggle" class="theme-toggle moon">
            <i class="isax isax-moon5"></i>
        </button>
        <button type="button" id="light-mode-toggle" class="theme-toggle sun">
            <i class="isax isax-sun-15"></i>
        </button>
    </div>

    <!-- Header -->
    <header class="header header-default inner-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="#">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                    <a href="{{ url('index') }}" class="navbar-brand logo">
                        <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="header-menu">
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="{{ url('index') }}" class="menu-logo">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="#">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="has-submenu megamenu">
                                <a href="#" class="main-menu">Home </a>

                            </li>

                        </ul>
                        <div class="header-items">
                            <!-- Item 1 -->
                            <div class="about-popup-item border-0 pb-0">
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
                            <!-- Item 2 -->
                            <div class="about-popup-item border-0 pb-0">
                                <h3 class="title">Follow Us</h3>
                                <ul class="d-flex align-items-center gap-2 social-iyem">
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="header-items-button">
                                <a href="{{ url('login') }}" class="btn btn-primary btn-primary-gradient"><i
                                        class="isax isax-lock-1 me-2"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="search-item">
                        <a href="#" class="details-btn" tabindex="-1" data-bs-toggle="offcanvas"
                            data-bs-target="#search_popup" aria-controls="search_popup">
                            <i class="isax isax-search-normal-1"></i>
                        </a>
                    </li>
                    <li class="noti-nav dropdown">
                        <a href="#" class="details-btn" data-bs-toggle="dropdown" aria-label="Notification">
                            <i class="isax isax-notification-bing"></i>
                            <span class="badge"></span>
                        </a>
                        <div class="dropdown-menu notifications dropdown-menu-end">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="notify-block d-flex">
                                                <span class="avatar">
                                                    <img class="avatar-img" alt="Ruby perin"
                                                        src="{{ URL::asset('build/img/clients/client-01.jpg') }}">
                                                </span>
                                                <div class="media-body">
                                                    <h6>Travis Tremble <span class="notification-time">18.30 PM</span>
                                                    </h6>
                                                    <p class="noti-details">Sent a amount of $210 for his Appointment
                                                        <span class="noti-title">Dr.Ruby perin </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="notify-block d-flex">
                                                <span class="avatar">
                                                    <img class="avatar-img" alt="Hendry Watt"
                                                        src="{{ URL::asset('build/img/clients/client-02.jpg') }}">
                                                </span>
                                                <div class="media-body">
                                                    <h6>Kelly Stevens <span class="notification-time">12 Min
                                                            Ago</span></h6>
                                                    <p class="noti-details"> has booked her appointment to <span
                                                            class="noti-title">Dr. Hendry Watt</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="notify-block d-flex">
                                                <div class="avatar">
                                                    <img class="avatar-img" alt="Maria Dyen"
                                                        src="{{ URL::asset('build/img/clients/client-03.jpg') }}">
                                                </div>
                                                <div class="media-body">
                                                    <h6>Robert Joe <span class="notification-time">6 Min Ago</span>
                                                    </h6>
                                                    <p class="noti-details"> Sent a amount $210 for his Appointment
                                                        <span class="noti-title">Dr.Maria Dyen</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="notify-block d-flex">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img" alt="client-image"
                                                        src="{{ URL::asset('build/img/clients/client-04.jpg') }}">
                                                </div>
                                                <div class="media-body">
                                                    <h6>Samuel Jord <span class="notification-time">8.30 AM</span>
                                                    </h6>
                                                    <p class="noti-details"> Send a message to his doctor</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="details-btn" data-bs-toggle="offcanvas"
                            data-bs-target="#support_item">
                            <i class="isax isax-menu5"></i>
                        </a>
                    </li>
                    <li class="dropdown has-arrow logged-item">
                        <a href="#" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle"
                                    src="{{ URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg') }}"
                                    alt="Darren Elder">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="user-header">
                                <div class="avatar">
                                    <img src="{{ URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg') }}"
                                        alt="User Image" class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>Dr Edalin Hendry</h6>
                                    <p class="text-muted mb-0">Doctor</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ url('doctor-dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ url('doctor-profile-settings') }}">Profile
                                Settings</a>
                            <a class="dropdown-item" href="{{ url('login') }}">Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /Header -->

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
                    medical services.</p>
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

@if (Route::is([
        'booking',
        'booking-1',
        'booking-2',
        'booking-success',
        'booking-success-one',
        'cart',
        'payment-success',
        'payment-checkout',
        'change-password',
        'checkout',
        'two-factor-authentication',
        'delete-account',
        'dependent',
        'doctor-grid',
        'doctor-profile-2',
        'doctor-profile',
        'search-2',
        'search',
        'favourites',
        'map-grid',
        'map-list',
        'map-list-availability',
        'profile-settings',
        'medical-details',
        'patient-invoices',
        'patient-accounts',
        'medical-records',
        'patient-appointments',
        'patient-appointments-grid',
        'patient-completed-appointment',
        'patient-appointment-details',
        'patient-cancelled-appointment',
        'patient-dependant-details',
        'patient-email',
        'patient-details',
        'patient-family-details',
        'patient-other-details',
        'patient-personalize',
        'patient-profile',
        'patient-upcoming-appointment',
        'patient-dashboard',
        'product-checkout',
    ]))
    <div class="header-theme header-theme-two">
        <button type="button" id="dark-mode-toggle" class="theme-toggle moon">
            <i class="isax isax-moon5"></i>
        </button>
        <button type="button" id="light-mode-toggle" class="theme-toggle sun">
            <i class="isax isax-sun-15"></i>
        </button>
    </div>

    <!-- Header -->
    <header class="header header-default inner-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="#">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                    <a href="{{ url('index') }}" class="navbar-brand logo">
                        <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="header-menu">
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="{{ url('index') }}" class="menu-logo">
                                <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="#">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="has-submenu megamenu">
                                <a href="#" class="main-menu">Home </a>

                            </li>

                        </ul>
                        <div class="header-items">
                            <!-- Item 1 -->
                            <div class="about-popup-item border-0 pb-0">
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
                            <!-- Item 2 -->
                            <div class="about-popup-item border-0 pb-0">
                                <h3 class="title">Follow Us</h3>
                                <ul class="d-flex align-items-center gap-2 social-iyem">
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-x-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" class="social-icon"><i
                                                class="fa-brands fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="header-items-button">
                                <a href="{{ url('login') }}" class="btn btn-primary btn-primary-gradient"><i
                                        class="isax isax-lock-1 me-2"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav header-navbar-rht">
                    <li class="search-item">
                        <a href="#" class="details-btn" tabindex="-1" data-bs-toggle="offcanvas"
                            data-bs-target="#search_popup" aria-controls="search_popup">
                            <i class="isax isax-search-normal-1"></i>
                        </a>
                    </li>
                    <li class="noti-nav dropdown">
                        <a href="#" class="details-btn" data-bs-toggle="dropdown" aria-label="Notification">
                            <i class="isax isax-notification-bing"></i>
                            <span class="badge"></span>
                        </a>
                        <div class="dropdown-menu notifications dropdown-menu-end">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">Notifications</span>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="notify-block d-flex">
                                                <span class="avatar">
                                                    <img class="avatar-img" alt="Ruby perin"
                                                        src="{{ URL::asset('build/img/clients/client-01.jpg') }}">
                                                </span>
                                                <div class="media-body">
                                                    <h6>Travis Tremble <span class="notification-time">18.30 PM</span>
                                                    </h6>
                                                    <p class="noti-details">Sent a amount of $210 for his Appointment
                                                        <span class="noti-title">Dr.Ruby perin </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="notify-block d-flex">
                                                <span class="avatar">
                                                    <img class="avatar-img" alt="Hendry Watt"
                                                        src="{{ URL::asset('build/img/clients/client-02.jpg') }}">
                                                </span>
                                                <div class="media-body">
                                                    <h6>Kelly Stevens <span class="notification-time">12 Min
                                                            Ago</span></h6>
                                                    <p class="noti-details"> has booked her appointment to <span
                                                            class="noti-title">Dr. Hendry Watt</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="notify-block d-flex">
                                                <div class="avatar">
                                                    <img class="avatar-img" alt="Maria Dyen"
                                                        src="{{ URL::asset('build/img/clients/client-03.jpg') }}">
                                                </div>
                                                <div class="media-body">
                                                    <h6>Robert Joe <span class="notification-time">6 Min Ago</span>
                                                    </h6>
                                                    <p class="noti-details"> Sent a amount $210 for his Appointment
                                                        <span class="noti-title">Dr.Maria Dyen</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="notification-message">
                                        <a href="#">
                                            <div class="notify-block d-flex">
                                                <div class="avatar avatar-sm">
                                                    <img class="avatar-img" alt="client-image"
                                                        src="{{ URL::asset('build/img/clients/client-04.jpg') }}">
                                                </div>
                                                <div class="media-body">
                                                    <h6>Samuel Jord <span class="notification-time">8.30 AM</span>
                                                    </h6>
                                                    <p class="noti-details"> Send a message to his doctor</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @if (Route::is(['cart', 'payment-success', 'product-checkout']))
                        <li>
                            <a href="{{ url('cart') }}" class="details-btn">
                                <i class="isax isax-shopping-cart"></i>
                                <span class="badge"></span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="#" class="details-btn" data-bs-toggle="offcanvas"
                                data-bs-target="#support_item">
                                <i class="isax isax-menu5"></i>
                            </a>
                        </li>
                    @endif
                    <li class="dropdown has-arrow logged-item">
                        <a href="#" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img class="rounded-circle"
                                    src="{{ URL::asset('build/img/doctors-dashboard/profile-06.jpg') }}"
                                    alt="Darren Elder">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="user-header">
                                <div class="avatar">
                                    <img src="{{ URL::asset('build/img/doctors-dashboard/profile-06.jpg') }}"
                                        alt="User Image" class="avatar-img rounded-circle">
                                </div>
                                <div class="user-text">
                                    <h6>Hendrita Hayes</h6>
                                    <p class="text-muted mb-0">Patient</p>
                                </div>
                            </div>
                            <a class="dropdown-item" href="{{ url('patient-dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ url('profile-settings') }}">Profile Settings</a>
                            <a class="dropdown-item" href="{{ url('login') }}">Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- /Header -->

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
                    medical services.</p>
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

@if (Route::is(['consultation', 'payment']))
    <!-- Header -->
    <header class="header login-header-info">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ url('index') }}" class="navbar-brand logo">
                    <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ url('index') }}" class="menu-logo">
                        <img src="{{ URL::asset('build/img/logo.svg') }}" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li>
                        <a href="{{ url('faq') }}">FAQ</a>
                    </li>
                    <li>
                        <a href="{{ url('login-email') }}">Login</a>
                    </li>
                    <li class="flag-dropdown-hide">
                        <div class="flag-dropdown">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">
                                <img src="{{ URL::asset('build/img/flags/flag-01.png') }}" alt="flag-image"
                                    height="20" class="flag-img"> <span>English</span>
                            </a>
                            <div class="dropdown-menu">
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{ URL::asset('build/img/flags/flag-01.png') }}" alt="flag-image"
                                        height="16"> English
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{ URL::asset('build/img/flags/flag-02.png') }}" alt="flag-image"
                                        height="16"> French
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{ URL::asset('build/img/flags/flag-03.png') }}" alt="flag-image"
                                        height="16"> Spanish
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <img src="{{ URL::asset('build/img/flags/flag-05.png') }}" alt="flag-image"
                                        height="16"> German
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                <li class="nav-item dropdown">
                    <div class="flag-dropdown">
                        <a class="dropdown-toggle nav-link" data-bs-toggle="dropdown" href="#" role="button"
                            aria-expanded="false">
                            <img src="{{ URL::asset('build/img/flags/flag-01.png') }}" alt="flag-image"
                                height="20" class="flag-img"> <span>English</span>
                        </a>
                        <div class="dropdown-menu">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{ URL::asset('build/img/flags/flag-01.png') }}" alt="flag-image"
                                    height="16"> English
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{ URL::asset('build/img/flags/flag-02.png') }}" alt="flag-image"
                                    height="16"> French
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{ URL::asset('build/img/flags/flag-03.png') }}" alt="flag-image"
                                    height="16"> Spanish
                            </a>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <img src="{{ URL::asset('build/img/flags/flag-05.png') }}" alt="flag-image"
                                    height="16"> German
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <!-- /Header -->
@endif
