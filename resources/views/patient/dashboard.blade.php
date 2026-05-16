<?php $page = 'patient-dashboard'; ?>
@extends('layouts.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content patient-content pt-3">
        <div class="container">

            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                   @include('partials.patient-sidebar')
                    <!-- /Profile Sidebar -->

                </div>
                <!-- / Profile Sidebar -->

                <div class="col-lg-8 col-xl-9">
                    <div class="dashboard-header">
                        <h3>Dashboard</h3>   
                        <div class="favourites-dashboard w-100">
                            <div class="book-appointment-head">
                                <h3><span>Book a new</span>Appointment</h3>
                                <span class="add-icon"><a href="{{url('doctors')}}"><i
                                            class="fa-solid fa-circle-plus"></i></a></span>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 d-flex">
                            <div class="dashboard-card w-100">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Appointment</h5>
                                    </div>
                                    <div class="card-view-link">
                                        <div class="owl-nav slide-nav text-end nav-control"></div>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="apponiment-dates">
                                        @php
                                            use Carbon\Carbon;

                                            $startDate = Carbon::today();
                                            $days = 7;
                                        @endphp

                                        <ul class="appointment-calender-slider">
                                            @for ($i = 0; $i < $days; $i++)
                                                @php
                                                    $date = $startDate->copy()->addDays($i);
                                                @endphp
                                                <li>
                                                    <a href="#" 
                                                    class="date-item {{ $i == 0 ? 'active-date' : '' }}" 
                                                    data-date="{{ $date->format('Y-m-d') }}">
                                                        <h5>
                                                            {{ $date->format('d') }} 
                                                            <span>{{ $date->format('D') }}</span>
                                                        </h5>
                                                    </a>
                                                </li>
                                            @endfor
                                        </ul>
                                        @foreach($futureAppointments as $appointment)
                                            @php
                                                $appointmentDate = \Carbon\Carbon::parse($appointment['date'])->format('Y-m-d');
                                            @endphp

                                            <div class="appointment-dash-card appointment-dash-card-active" data-date="{{ $appointmentDate }}">
                                                <div class="doctor-fav-list">
                                                    <div class="doctor-info-profile">
                                                        <a href="#" class="table-avatar">
                                                            <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                                                alt="Img">
                                                        </a>
                                                        <div class="doctor-name-info">
                                                            <h5><a href="#">Dr. {{ $appointment['doctorName'] }}</a></h5>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="cal-plus-icon"><i class="isax isax-hospital5"></i></a>
                                                </div>
                                                <div class="date-time">
                                                    <p><i class="isax isax-clock5"></i>Time : {{ $appointment['patientLocalTime'] ?? $appointment['startTime'] . ' - ' . $appointment['endTime'] ??  '' }} </p>
                                                </div>
                                                <div class="card-btns gap-3">
                                                    <a href="{{url('chat')}}" class="btn btn-md btn-light rounded-pill"><i
                                                            class="isax isax-messages-25"></i>Chat Now</a>
                                                    <a href="{{url('patient-appointments')}}"
                                                        class="btn  btn-md btn-primary-gradient rounded-pill"><i
                                                            class="isax isax-calendar-tick5"></i>Attended</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                      
                        <div class="col-xl-12 d-flex flex-column">
                            
                            <div class="dashboard-card flex-fill">
                                <div class="dashboard-card-head">
                                    <div class="header-title">
                                        <h5>Past Appointments</h5>
                                    </div>
                                    <div class="card-view-link">
                                        <div class="owl-nav slide-nav2 text-end nav-control"></div>
                                    </div>
                                </div>
                                <div class="dashboard-card-body">
                                    <div class="past-appointments-slider">
                                        @foreach($pastAppointments as $pastAppointment)
                                        <div class="appointment-dash-card past-appointment mt-0 mb-3">
                                            <div class="doctor-fav-list">
                                                <div class="doctor-info-profile">
                                                    <a href="#" class="table-avatar">
                                                        <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                                            alt="Img">
                                                    </a>
                                                    <div class="doctor-name-info">
                                                        <h5><a href="#">{{ $pastAppointment['doctorName'] }}</a></h5>
                                                    </div>
                                                </div>
                                                <span class="bg-orange badge"><i class="isax isax-video5 me-1"></i>{{ $pastAppointment['status'] }}</span>
                                            </div>
                                            <div class="appointment-date-info">
                                                <h6>{{ $pastAppointment['date'] }}</h6>
                                                <ul>
                                                    <li>
                                                        <span><i class="isax isax-clock5"></i></span>Time : {{ $pastAppointment['patientLocalTime'] ?? $pastAppointment['startTime'] . ' - ' . $pastAppointment['endTime'] ??  '' }}
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            {{-- <div class="card-btns">
                                                <a href="{{url('patient-appointment-details')}}"
                                                    class="btn btn-md btn-primary-gradient rounded-pill">View Details</a>
                                            </div> --}}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                   
                </div>
            </div>

        </div>
    </div>
    <style>
        body {
            background-color: #f5f7fb !important
        }
        .appointment-calender-slider {
            display: flex;
            gap: 10px;
            overflow-x: auto;   /* important */
            padding-bottom: 5px;
        }

        .appointment-calender-slider::-webkit-scrollbar {
            height: 6px;
        }

        .appointment-calender-slider li {
            list-style: none;
            flex: 0 0 auto;   /* prevents stretching */
        }

        .date-item {
            display: block;
            padding: 12px 14px;
            border-radius: 16px;
            background: #ffffff;
            text-align: center;
            min-width: 75px;
            position: relative;
            transition: all .3s ease;
            border: 1px solid #edf2f7;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }

        .date-item:hover {
            transform: translateY(-2px);
        }

        .date-item h5 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
        }

        .date-item h5 span {
            display: block;
            margin-top: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .date-item.active-date {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #fff;
            box-shadow: 0 10px 25px rgba(37,99,235,.25);
        }

        .date-item.has-appointment::after {
            content: '';
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #22c55e;
        }

        .date-item.active-date.has-appointment::after {
            background: #fff;
        }
    </style>
    <!-- /Page Content -->
@endsection
@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    const dateItems = document.querySelectorAll(".date-item");
    const cards = document.querySelectorAll(".appointment-dash-card-active");

    // collect appointment dates
    const appointmentDates = [];

    cards.forEach(card => {

        const cardDate = card.dataset.date;

        if (!appointmentDates.includes(cardDate)) {
            appointmentDates.push(cardDate);
        }

    });

    // add dot on dates with appointments
    dateItems.forEach(item => {

        const itemDate = item.dataset.date;

        if (appointmentDates.includes(itemDate)) {
            item.classList.add("has-appointment");
        }

    });

    // filter function
    function filterAppointments(selectedDate) {

        let found = false;

        cards.forEach(card => {

            if (card.dataset.date === selectedDate) {

                card.style.display = "block";
                found = true;

            } else {

                card.style.display = "none";

            }

        });

        // empty state
        let emptyState = document.querySelector(".empty-appointment-state");

        if (!found) {

            if (!emptyState) {

                emptyState = document.createElement("div");

                emptyState.classList.add("empty-appointment-state");

                emptyState.innerHTML = `
                    <div class="text-center py-5">
                        <i class="fa-regular fa-calendar-xmark mb-3"
                           style="font-size:40px;color:#94a3b8;"></i>

                        <h5 class="mb-2">No Appointments</h5>

                        <p class="text-muted mb-0">
                            No appointments scheduled for this day
                        </p>
                    </div>
                `;

                document
                    .querySelector(".apponiment-dates")
                    .appendChild(emptyState);

            }

        } else {

            if (emptyState) {
                emptyState.remove();
            }

        }

    }

    // click handling
    dateItems.forEach(item => {

        item.addEventListener("click", function (e) {

            e.preventDefault();

            dateItems.forEach(i => {
                i.classList.remove("active-date");
            });

            this.classList.add("active-date");

            const selectedDate = this.dataset.date;

            filterAppointments(selectedDate);

        });

    });

    // auto select FIRST date with appointment
    let firstAppointmentDate = null;

    dateItems.forEach(item => {

        const itemDate = item.dataset.date;

        if (appointmentDates.includes(itemDate) && !firstAppointmentDate) {

            firstAppointmentDate = item;

        }

    });

    // remove default active
    dateItems.forEach(i => {
        i.classList.remove("active-date");
    });

    // if appointment exists select it
    if (firstAppointmentDate) {

        firstAppointmentDate.classList.add("active-date");

        filterAppointments(firstAppointmentDate.dataset.date);

        // auto scroll into view on mobile
        firstAppointmentDate.scrollIntoView({
            behavior: "smooth",
            inline: "center",
            block: "nearest"
        });

    } else {

        // fallback to first date
        const firstDate = document.querySelector(".date-item");

        if (firstDate) {

            firstDate.classList.add("active-date");

            filterAppointments(firstDate.dataset.date);

        }

    }

});
</script>
@endpush