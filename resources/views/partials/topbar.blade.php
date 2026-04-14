    <div class="header-theme header-theme-two">
        <button type="button" id="dark-mode-toggle" class="theme-toggle moon">
            <i class="isax isax-moon5"></i>
        </button>
        <button type="button" id="light-mode-toggle" class="theme-toggle sun">
            <i class="isax isax-sun-15"></i>
        </button>
    </div>

    <!-- Header -->
    <header class="header header-default ">
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
                            <li class="megamenu active">
                                <a href="{{ url('/') }}" class="main-menu">Home</a>
                            </li>
                            <li class="megamenu {{ request()->is('doctors*') ? 'active' : '' }}">
                                <a href="{{ url('doctors') }}" class="main-menu">Doctors</a>
                            </li>
                        </ul>
                        <div class="header-items">
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
                                @if(session('firebase_token'))
                                    <ul class="main-nav">
                                        <li class="megamenu ">
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                        </li>
                                        <li class="megamenu ">
                                            <a class="dropdown-item" href="{{ route('profile') }}">Profile Settings</a>                                    </li>
                                        <li class="megamenu ">
                                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                        </li>
                                        
                                    </ul>
                                   
                                    
                                @else
                                    {{-- ❌ Guest --}}
                                    <li>
                                        <a href="{{ url('login') }}" class="btn btn-md btn-primary">
                                            <i class="isax isax-lock-1 me-2"></i><span>Sign In</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('register') }}" class="btn btn-md btn-secondary">
                                            <i class="isax isax-user-tick me-2"></i><span>Register</span>
                                        </a>
                                    </li>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="nav header-navbar-rht">
                    @if(session('firebase_token'))
                        <li class="dropdown has-arrow logged-item">
                            <a href="#" data-bs-toggle="dropdown">
                                <span class="user-img">
                                    <i class="isax isax-user rounded-circle" style="
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
                                <a class="dropdown-item" href="{{ route('profile') }}">Profile
                                    Settings</a>
                                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </li>
                        
                    @else
                        {{-- ❌ Guest --}}
                        <li>
                            <a href="{{ url('login') }}" class="btn btn-md btn-primary">
                                <i class="isax isax-lock-1 me-2"></i><span>Sign In</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('register') }}" class="btn btn-md btn-secondary">
                                <i class="isax isax-user-tick me-2"></i><span>Register</span>
                            </a>
                        </li>
                    @endif

                    <li>
                        <a href="#" class="details-btn" data-bs-toggle="offcanvas" data-bs-target="#support_item">
                            <i class="isax isax-menu5"></i>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </header>
    <div style="position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;">

        @if(session('success'))
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
    <!-- /Header -->

