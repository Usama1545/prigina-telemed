    {{-- <div class="header-theme header-theme-two">
        <button type="button" id="dark-mode-toggle" class="theme-toggle moon">
            <i class="isax isax-moon5"></i>
        </button>
        <button type="button" id="light-mode-toggle" class="theme-toggle sun">
            <i class="isax isax-sun-15"></i>
        </button>
    </div> --}}

    <!-- Header -->
    <header class="header header-default ">
        <div class="container-fluid px-4 px-xxl-5 pb-0">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a id="mobile_btn" href="#">
                        <i class="fa-solid fa-bars"></i>
                    </a>
                    @if (check())
                        <div class="mobile-header-actions d-lg-none">
                            <a href="{{ route('dashboard') }}" aria-label="Dashboard">
                                <i class="isax isax-category-2"></i>
                            </a>
                            <a href="{{ route('logout') }}" aria-label="Logout" class="logout">
                                <i class="isax isax-logout"></i>
                            </a>
                        </div>
                    @endif

                    <a href="{{ url('index') }}" class="navbar-brand logo">
                        <img src="{{ asset('build/img/logo.webp') }}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="header-menu">
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="{{ url('index') }}" class="menu-logo">
                                <img src="{{ asset('build/img/logo.webp') }}" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="#">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">

                            <li class="megamenu {{ request()->is('/') ? 'active' : '' }}">
                                <a href="{{ url('/') }}" class="main-menu">Home</a>
                            </li>

                            <li class="megamenu {{ request()->is('how-it-works') ? 'active' : '' }}">
                                <a href="{{ url('how-it-works') }}" class="main-menu">How It Works</a>
                            </li>

                            <li class="megamenu {{ request()->is('doctors') ? 'active' : '' }}">
                                <a href="{{ url('doctors') }}" class="main-menu">Specialists</a>
                            </li>

                            <li class="megamenu {{ request()->is('for-patients') ? 'active' : '' }}">
                                <a href="{{ url('for-patients') }}" class="main-menu">For Patients</a>
                            </li>

                            <li class="megamenu {{ request()->is('for-doctors') ? 'active' : '' }}">
                                <a href="{{ url('for-doctors') }}" class="main-menu">For Doctors</a>
                            </li>

                            <li class="megamenu {{ request()->is('about-us') ? 'active' : '' }}">
                                <a href="{{ url('about-us') }}" class="main-menu">About Us</a>
                            </li>

                            <li class="megamenu {{ request()->is('contact-us') ? 'active' : '' }}">
                                <a href="{{ url('contact-us') }}" class="main-menu">Contact Us</a>
                            </li>
                            @if (!check())
                                {{-- ❌ Guest --}}
                                <li class="megamenu d-block d-lg-none">
                                    <a href="{{ url('login') }}" class="btn btn-md btn-primary">
                                        <span>Get a Second Opinion</span>
                                    </a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </div>

                <ul class="nav header-navbar-rht">
                    @if (check())
                        <li class="dropdown has-arrow logged-item">
                            <a href="#" data-bs-toggle="dropdown">
                                <span class="user-img">
                                    <i class="isax isax-user rounded-circle"
                                        style="
                                        width: 35px;
                                        height: 35px;
                                        border-radius: 50%;
                                        background: #9c9c9c;
                                        color: #ffffff;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        font-weight: bold;
                                    "></i>

                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">

                                <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>

                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </li>
                    @else
                        {{-- ❌ Guest --}}
                        <li>
                            <a href="{{ url('login') }}" class="btn btn-md btn-primary">
                                <i class="isax isax-lock-1 me-2"></i><span>Get a Second Opinion</span>
                            </a>
                        </li>
                    @endif



                </ul>
            </nav>
        </div>
    </header>
    <div style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show shadow">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

    </div>
    <div id="js-alert-container" style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;">
    </div>
    <style>
        .header-nav {
            min-height: 80px;
        }

        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding-bottom: env(safe-area-inset-bottom);
        }

        .main-nav {
            gap: 6px;
        }

        .main-nav>li>a {
            white-space: nowrap;
            font-size: 15px;
            padding: 10px 12px !important;
        }

        .header-navbar-rht {
            margin-left: auto;
            flex-shrink: 0;
        }

        .header-navbar-rht .btn {
            white-space: nowrap;
        }

        .mobile-header-actions {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-left: 10px;
        }

        .mobile-header-actions a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            color: #0b5ed7;
            border: 1px solid #e1e8f5;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 4px 12px rgba(15, 43, 92, .08);
        }

        .logout {
            color: #ff0202 !important;
        }

        .mobile-header-actions a i {
            font-size: 18px;
        }

        @media (max-width: 1199px) {

            .main-nav>li>a {
                font-size: 14px;
                padding: 10px 8px !important;
            }

        }

        @media (max-width: 991px) {
            .navbar-header {
                display: flex;
                align-items: center;
                gap: 8px;
            }
        }

        .header.header-default {
            position: sticky !important;
            top: 0;
            z-index: 999;
            background: #fff;
            box-shadow: 0 2px 20px rgba(0, 0, 0, .04);
        }
    </style>
    <!-- /Header -->
