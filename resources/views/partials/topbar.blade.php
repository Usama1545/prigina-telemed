    @php
        $currentLang = app()->getLocale();
        $langFlags = ['en' => '🇺🇸', 'fr' => '🇫🇷', 'es' => '🇪🇸', 'ar' => '🇸🇦'];
        $langCodes = ['en' => 'EN', 'fr' => 'FR', 'es' => 'ES', 'ar' => 'AR'];
    @endphp

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
                    <div class="mobile-header-actions d-lg-none">
                        @if (check())
                            <a href="{{ route('dashboard') }}" aria-label="Dashboard" class="mobile-header-actions-a">
                                <i class="isax isax-category-2"></i>
                            </a>
                        @endif
                        <div class="dropdown" style="position:relative;">
                            <a href="#" data-bs-toggle="dropdown" aria-label="Language"
                                style="display:inline-flex;align-items:center;justify-content:center;border:1px solid var(--primary);border-radius:50px;padding:7px;background:#fff;box-shadow:0 4px 12px rgba(15,43,92,.08);font-size:12px;text-decoration:none; color: var(--primary);">
                                {{ __('app.common.language') }}<i class="fa fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu mt-1" style="z-index:1100;">
                                <a class="dropdown-item {{ $currentLang === 'en' ? 'active' : '' }}"
                                    href="{{ route('lang.switch', 'en') }}">🇺🇸 {{ __('app.lang.en') }}</a>
                                <a class="dropdown-item {{ $currentLang === 'fr' ? 'active' : '' }}"
                                    href="{{ route('lang.switch', 'fr') }}">🇫🇷 {{ __('app.lang.fr') }}</a>
                                <a class="dropdown-item {{ $currentLang === 'es' ? 'active' : '' }}"
                                    href="{{ route('lang.switch', 'es') }}">🇪🇸 {{ __('app.lang.es') }}</a>
                                <a class="dropdown-item {{ $currentLang === 'ar' ? 'active' : '' }}"
                                    href="{{ route('lang.switch', 'ar') }}">🇸🇦 {{ __('app.lang.ar') }}</a>
                            </div>
                        </div>
                        @if (check())
                            <a href="{{ route('logout') }}" aria-label="Logout" class="logout mobile-header-actions-a">
                                <i class="isax isax-logout"></i>
                            </a>
                        @endif
                    </div>

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
                                <a href="{{ url('/') }}" class="main-menu">{{ __('app.nav.home') }}</a>
                            </li>

                            <li class="megamenu {{ request()->is('how-it-works') ? 'active' : '' }}">
                                <a href="{{ url('how-it-works') }}"
                                    class="main-menu">{{ __('app.nav.how_it_works') }}</a>
                            </li>

                            @unless (is_doctor())
                                <li class="megamenu {{ request()->is('doctors') ? 'active' : '' }}">
                                    <a href="{{ url('doctors') }}"
                                        class="main-menu">{{ __('app.nav.specialists') }}</a>
                                </li>
                            @endunless

                            <li class="megamenu {{ request()->is('for-patients') ? 'active' : '' }}">
                                <a href="{{ url('for-patients') }}"
                                    class="main-menu">{{ __('app.nav.for_patients') }}</a>
                            </li>

                            <li class="megamenu {{ request()->is('for-doctors') ? 'active' : '' }}">
                                <a href="{{ url('for-doctors') }}"
                                    class="main-menu">{{ __('app.nav.for_doctors') }}</a>
                            </li>

                            <li class="megamenu {{ request()->is('about-us') ? 'active' : '' }}">
                                <a href="{{ url('about-us') }}" class="main-menu">{{ __('app.nav.about_us') }}</a>
                            </li>

                            <li class="megamenu {{ request()->is('contact-us') ? 'active' : '' }}">
                                <a href="{{ url('contact-us') }}" class="main-menu">{{ __('app.nav.contact_us') }}</a>
                            </li>
                            @if (!check())
                                {{-- ❌ Guest --}}
                                <li class="megamenu d-block d-lg-none">
                                    <a href="{{ url('login') }}" class="btn btn-md btn-primary">
                                        <span>{{ __('app.nav.get_second_opinion') }}</span>
                                    </a>
                                </li>
                            @endif


                        </ul>
                    </div>
                </div>

                <ul class="nav header-navbar-rht">

                    {{-- Language switcher --}}
                    <li class="dropdown has-arrow logged-item">
                        <a href="#" data-bs-toggle="dropdown"
                            style="align-items:center;justify-content:center;border:1px solid var(--primary);border-radius:50px;padding:7px;font-size:14px;text-decoration:none; color: var(--primary);">
                            <span>{{ __('language') }}<i class="fa fa-caret-down"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item {{ $currentLang === 'en' ? 'active' : '' }}"
                                href="{{ route('lang.switch', 'en') }}">🇺🇸 {{ __('app.lang.en') }}</a>
                            <a class="dropdown-item {{ $currentLang === 'fr' ? 'active' : '' }}"
                                href="{{ route('lang.switch', 'fr') }}">🇫🇷 {{ __('app.lang.fr') }}</a>
                            <a class="dropdown-item {{ $currentLang === 'es' ? 'active' : '' }}"
                                href="{{ route('lang.switch', 'es') }}">🇪🇸 {{ __('app.lang.es') }}</a>
                            <a class="dropdown-item {{ $currentLang === 'ar' ? 'active' : '' }}"
                                href="{{ route('lang.switch', 'ar') }}">🇸🇦 {{ __('app.lang.ar') }}</a>
                        </div>
                    </li>

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

                                <a class="dropdown-item"
                                    href="{{ route('dashboard') }}">{{ __('app.nav.dashboard') }}</a>

                                <a class="dropdown-item" href="{{ route('logout') }}">{{ __('app.nav.logout') }}</a>
                            </div>
                        </li>
                    @else
                        {{-- ❌ Guest --}}
                        <li>
                            <a href="{{ url('login') }}" class="btn btn-md btn-primary">
                                <i
                                    class="isax isax-lock-1 me-2"></i><span>{{ __('app.nav.get_second_opinion') }}</span>
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
            flex-wrap: nowrap !important;
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
            margin-left: 4px;
            flex-shrink: 0;
            gap: 4px;
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

        .mobile-header-actions-a {
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

        .mobile-header-actions-a i {
            font-size: 18px;
        }

        @media (max-width: 1199px) {
            .main-nav>li>a {
                font-size: 14px;
                padding: 10px 8px !important;
            }
        }

        @media (min-width: 992px) and (max-width: 1200px) {
            .main-nav {
                gap: 0;
            }

            .main-nav>li>a {
                font-size: 13px;
                padding: 10px 5px !important;
            }

            .navbar-brand.logo img {
                max-width: 120px;
            }

            .header-navbar-rht .dropdown>a,
            .header-navbar-rht .logged-item>a {
                padding: 5px 8px !important;
                font-size: 12px !important;
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
            /* No backdrop-filter/transform/filter directly on this element:
               any of those would make it a containing block for its
               position:fixed descendants (the mobile .main-menu-wrapper
               drawer), breaking the drawer's fixed positioning against the
               viewport. The blur lives on the ::before pseudo instead. */
            box-shadow: 0 1px 0 rgba(10, 24, 52, 0.06);
            border-bottom: 1px solid rgba(10, 24, 52, 0.06);
        }

        .header.header-default::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background: rgba(255, 255, 255, 0.78);
            backdrop-filter: blur(16px) saturate(160%);
            -webkit-backdrop-filter: blur(16px) saturate(160%);
        }

        .dropdown-item:active {
            background-color: var(--primary) !important;
        }

        /* PREMIUM NAV REFINEMENTS */
        .main-nav > li > a {
            position: relative;
            font-weight: 500;
        }

        .main-nav > li > a::after {
            content: "";
            position: absolute;
            left: 12px;
            right: 12px;
            bottom: 4px;
            height: 2px;
            border-radius: 2px;
            background: linear-gradient(135deg, #4F9DFF, #34D3C9);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform .25s ease;
        }

        .main-nav > li > a:hover::after,
        .main-nav > li.active > a::after {
            transform: scaleX(1);
        }

        .header-navbar-rht .btn.btn-primary,
        .main-nav .btn.btn-primary {
            background: linear-gradient(135deg, #4F9DFF, #34D3C9);
            border: none;
            border-radius: 100px;
            box-shadow: 0 8px 20px -8px rgba(79, 157, 255, 0.55);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .header-navbar-rht .btn.btn-primary:hover,
        .main-nav .btn.btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 26px -6px rgba(79, 157, 255, 0.7);
        }

        .navbar-brand.logo img {
            transition: transform .25s ease;
        }
    </style>
    <!-- /Header -->
