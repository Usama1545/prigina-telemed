<div class="profile-sidebar doctor-sidebar profile-sidebar-new">

    {{-- Doctor Profile Card --}}
    <div class="doctor-profile-card">
        <div class="widget-profile pro-widget-content text-center">
            <div class="profile-info-widget">
                <a href="{{url('profile-settings')}}" class="booking-doc-img">
                    <img src="{{ current_user()['profilePicture'] ? current_user()['profilePicture'] : URL::asset('build/img/doctors-dashboard/profile-06.jpg')}}"
                        alt="User Image">
                </a>
                <div class="profile-det-info">
                    <h3><a href="{{url('profile-settings')}}">{{ current_user()['name'] }}</a></h3>
                </div>
            </div>
            <p class="doctor-qualification">
                {{ current_user()['qualification'] }}
            </p>

            <div class="doctor-specialities">

                @foreach (current_user()['specializations'] as $specialization)
                    <span class="doctor-speciality-badge">
                        {{ $specialization }}
                    </span>
                @endforeach

            </div>
        </div>

    </div>

    {{-- Availability --}}
    <div class="doctor-availability-card">

        <label class="form-label">
            Availability
        </label>

        <select class="form-select modern-select">
            <option>I am Available Now</option>
            <option>Not Available</option>
        </select>

    </div>

    {{-- Sidebar Navigation --}}
   <div class="dashboard-widget modern-sidebar-menu">
        <nav class="dashboard-menu p-2">
            <ul>
                <li class="{{ route('doctor.dashboard') === url()->current() ? 'active' : '' }}">
                    <a href="{{route('doctor.dashboard')}}">
                        <i class="isax isax-category-2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ route('doctor.appointments') === url()->current() ? 'active' : '' }}">
                    <a href="{{route('doctor.appointments')}}">
                        <i class="isax isax-calendar-1"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                {{-- <li class="{{ route('doctor.available-timings') === url()->current() ? 'active' : '' }}">
                    <a href="{{route('doctor.available-timings')}}">
                        <i class="isax isax-calendar-tick"></i>
                        <span>Available Timings</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{url('reviews')}}">
                        <i class="isax isax-star-1"></i>
                        <span>Reviews</span>
                    </a>
                </li> --}}
                <li class="{{ route('doctor.payout') === url()->current() ? 'active' : '' }}">
                    <a href="{{route('doctor.payout')}}">
                        <i class="fa-solid fa-money-bill-1"></i>
                        <span>Payout Settings</span>
                    </a>
                </li>
                <li class="{{ route('doctor.conversations') === url()->current() ? 'active' : '' }}">
                    <a href="{{route('doctor.conversations')}}">
                        <i class="isax isax-messages-1"></i>
                        <span>Message</span>
                        <small class="unread-msg">7</small>
                    </a>
                </li>
                <li class="{{ route('doctor.settings') === url()->current() ? 'active' : '' }}">
                    <a href="{{route('doctor.settings')}}">
                        <i class="isax isax-setting-2"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
               
               
                <li>
                    <a href="{{route('login')}}">
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

    <a href="{{ route('doctor.dashboard') }}"
       class="{{ route('doctor.dashboard') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-category-2"></i>
        <span>Home</span>

    </a>

    <a href="{{ route('doctor.appointments') }}"
       class="{{ route('doctor.appointments') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-calendar-1"></i>
        <span>Appointments</span>

    </a>

    <a href="{{ route('doctor.conversations') }}"
       class="{{ route('doctor.conversations') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-messages-1"></i>
        <span>Chat</span>

    </a>

    <a href="{{ route('doctor.payout') }}"
       class="{{ route('doctor.payout') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-money"></i>
        <span>Payout</span>

    </a>

    <a href="{{ route('doctor.settings') }}"
       class="{{ route('doctor.settings') === url()->current() ? 'active' : '' }}">

        <i class="isax isax-setting-2"></i>
        <span>Profile</span>

    </a>

</div>

<style>

    .doctor-profile-card {
        background: #fff;
        border-radius: 24px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    }

    .doctor-profile-top {
        text-align: center;
        position: relative;
    }

    .doctor-profile-image img {
        width: 95px;
        height: 95px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #f3f6ff;
    }

    .doctor-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #ecfdf3;
        color: #16a34a;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        margin-top: 15px;
    }

    .doctor-status-badge span {
        width: 8px;
        height: 8px;
        background: #22c55e;
        border-radius: 50%;
    }

    .doctor-profile-content {
        text-align: center;
        margin-top: 18px;
    }

    .doctor-profile-content h3 {
        font-size: 22px;
        margin-bottom: 8px;
    }

    .doctor-profile-content h3 a {
        color: #111827;
    }

    .doctor-qualification {
        color: #6b7280;
        margin-bottom: 18px;
    }

    .doctor-specialities {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .doctor-speciality-badge {
        background: #eef2ff;
        color: #4338ca;
        padding: 7px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
    }

    .doctor-availability-card {
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    }

    .modern-select {
        border-radius: 14px;
        min-height: 48px;
        border: 1px solid #e5e7eb;
    }

    .modern-sidebar-menu {
        background: #fff;
        border-radius: 24px;
        padding: 20px;
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
        width: 20%;
    }

    .mobile-bottom-nav a i {
        font-size: 22px;
    }

    .mobile-bottom-nav a.active {
        color: #2563eb;
    }

    .doc-container {
            padding-bottom: 25px !important;
        }
     

    @media (max-width: 991px) {

        .doctor-sidebar {
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