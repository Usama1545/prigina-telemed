@php
    $currentUser = current_user() ?? [];
    $profileImage = ($currentUser['photoUrl'] ?? null) ?: URL::asset('build/img/doctors-dashboard/profile-06.jpg');
@endphp

<div class="profile-sidebar patient-sidebar profile-sidebar-new">

    {{-- Patient Profile Card --}}
    <div class="patient-profile-card">

        <div class="widget-profile pro-widget-content text-center">

            <div class="profile-info-widget">

                <a href="{{ route('patient.settings') }}" class="booking-doc-img">
                    <img src="{{ $profileImage }}"
                         alt="User Image">
                </a>

                <div class="profile-det-info">

                    <h3>
                        <a href="{{ route('patient.settings') }}">
                            {{ $currentUser['name'] ?? 'Patient' }}
                        </a>
                    </h3>

                </div>

            </div>

            <p class="patient-sub-info">
                {{ $currentUser['gender'] ?? '' }}
            </p>

            <div class="patient-email-box">
                {{ $currentUser['email'] ?? '' }}
            </div>

        </div>

    </div>

    {{-- Sidebar Navigation --}}
    <div class="dashboard-widget modern-sidebar-menu">

        <nav class="dashboard-menu p-2">

            <ul>

                <li class="{{ route('patient.dashboard') === url()->current() ? 'active' : '' }}">
                    <a href="{{ route('patient.dashboard') }}">
                        <i class="isax isax-category-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ route('patient.appointments') === url()->current() ? 'active' : '' }}">
                    <a href="{{ route('patient.appointments') }}">
                        <i class="isax isax-calendar-1"></i>
                        <span>My Appointments</span>
                    </a>
                </li>

                <li class="{{ route('patient.conversations') === url()->current() ? 'active' : '' }}">
                    <a href="{{ route('patient.conversations') }}">
                        <i class="isax isax-messages-1"></i>

                        <span>Messages</span>

                      
                    </a>
                </li>

                <li class="{{ route('patient.settings') === url()->current() ? 'active' : '' }}">
                    <a href="{{ route('patient.settings') }}">
                        <i class="isax isax-setting-2"></i>
                        <span>Settings</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('logout') }}">
                        <i class="isax isax-logout"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</div>

{{-- Mobile Bottom Navigation --}}
<div class="mobile-bottom-nav d-lg-none">

    <a href="{{ route('patient.dashboard') }}"
       class="{{ route('patient.dashboard') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-category-2"></i>
        <span>Home</span>

    </a>

    <a href="{{ route('patient.conversations') }}"
       class="{{ route('patient.conversations') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-messages-1"></i>
        <span>Chat</span>

    </a>

    <a href="{{ route('patient.appointments') }}"
       class="{{ route('patient.appointments') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-calendar-1"></i>
        <span>Appointments</span>

    </a>

    <a href="{{ route('patient.settings') }}"
       class="{{ route('patient.settings') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-setting-2"></i>
        <span>Profile</span>

    </a>

</div>

<style>

    .patient-profile-card {
        background: #fff;
        border-radius: 24px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    }

    .patient-profile-card .booking-doc-img img {
        width: 95px;
        height: 95px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #f3f6ff;
    }

    .patient-profile-card h3 {
        font-size: 22px;
        margin-top: 18px;
        margin-bottom: 8px;
    }

    .patient-profile-card h3 a {
        color: #111827;
    }

    .patient-sub-info {
        color: #6b7280;
        margin-bottom: 14px;
        font-size: 14px;
    }

    .patient-email-box {
        background: #eef2ff;
        color: #4338ca;
        padding: 10px 14px;
        border-radius: 14px;
        font-size: 13px;
        font-weight: 500;
        word-break: break-word;
    }

    .modern-sidebar-menu {
        background: #fff;
        border-radius: 24px;
        padding: 20px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    }

    .modern-unread-msg {
        margin-left: auto;
        background: #ef4444;
        color: #fff;
        min-width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
    }

    .mobile-bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background: #fff;
        border-top: 1px solid #e5e7eb;
        display: flex;
        justify-content: space-around;
        align-items: center;
        padding: 10px 5px;
        z-index: 9999;
        box-shadow: 0 -5px 25px rgba(0,0,0,0.06);
    }

    .mobile-bottom-nav a {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #6b7280;
        text-decoration: none;
        font-size: 11px;
        font-weight: 600;
        gap: 4px;
        width: 25%;
    }

    .mobile-bottom-nav a i {
        font-size: 22px;
    }

    .mobile-bottom-nav a.active {
        color: #2563eb;
    }

    @media (max-width: 991px) {

        .patient-sidebar {
            display: none;
        }

        .content {
            padding-bottom: 90px;
        }

        .doc-container {
            padding-bottom: 70px !important;
        }

        .doctor-content.content .container {
            padding-top: 0 !important;
        }

    }

</style>
