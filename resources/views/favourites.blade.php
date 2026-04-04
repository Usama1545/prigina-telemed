<?php $page = 'favourites'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Patient', 'li_1' => 'Favourites', 'li_2' => 'Favourites'])
    @endcomponent

    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container">
            <div class="row">

                <!-- Profile Sidebar -->
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar patient-sidebar profile-sidebar-new">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="{{url('profile-settings')}}" class="booking-doc-img">
                                    <img src="{{URL::asset('build/img/doctors-dashboard/profile-06.jpg')}}"
                                        alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="{{url('profile-settings')}}">Hendrita Hayes</a></h3>
                                    <div class="patient-details">
                                        <h5 class="mb-0">Patient ID : PT254654</h5>
                                    </div>
                                    <span>Female <i class="fa-solid fa-circle"></i> 32 years 03 Months</span>
                                </div>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="{{url('patient-dashboard')}}">
                                            <i class="isax isax-category-2"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('patient-appointments')}}">
                                            <i class="isax isax-calendar-1"></i>
                                            <span>My Appointments</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{url('favourites')}}">
                                            <i class="isax isax-star-1"></i>
                                            <span>Favourites</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('dependent')}}">
                                            <i class="isax isax-user-octagon"></i>
                                            <span>Dependants</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('medical-records')}}">
                                            <i class="isax isax-note-21"></i>
                                            <span>Medical Records</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('patient-accounts')}}">
                                            <i class="isax isax-wallet-2"></i>
                                            <span>Wallet</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('patient-invoices')}}">
                                            <i class="isax isax-document-text"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('chat')}}">
                                            <i class="isax isax-messages-1"></i>
                                            <span>Message</span>
                                            <small class="unread-msg">7</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('medical-details')}}">
                                            <i class="isax isax-note-1"></i>
                                            <span>Vitals</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('profile-settings')}}">
                                            <i class="isax isax-setting-2"></i>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('login')}}">
                                            <i class="isax isax-logout"></i>
                                            <span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- /Profile Sidebar -->

                </div>
                <!-- / Profile Sidebar -->

                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header">
                        <h3>Favourites</h3>
                        <ul class="header-list-btns">
                            <li>
                                <div class="input-block dash-search-input">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="search-icon"><i class="isax isax-search-normal"></i></span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Favourites -->
                    <div class="row">
                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-21.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.Edalin Hendry</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">MD - Cardiology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <span class="d-inline-block average-rating">5.0</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span> 23
                                                Mar 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> Newyork, USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 21 Jan 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-13.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.Shanta Nesmith</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">DO - Oncology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">(35)</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span> 27
                                                Mar 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> Los Angeles,
                                                USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 18 Jan 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-14.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.John Ewel</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">MD - Orthopedics</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">5.0</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span> 02
                                                Apr 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> Dallas, USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 28 Jan 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-15.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.Susan Fenimore</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">DO - Dermatology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">4.0</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span> 11
                                                Apr 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> Chicago, USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 08 Feb 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-16.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.Juliet Rios</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">MD - Neurology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">5.0</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span>18
                                                Apr 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> Detroit, USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 16 Feb 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-17.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.Joseph Engels</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">MD - Pediatrics</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">4.0</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span> 10
                                                May 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> Las Vegas,
                                                USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 08 Mar 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-18.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.Victoria Selzer</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">DO - Anesthesiology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">5.0</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span> 20
                                                May 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> Denver, USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 18 Mar 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-19.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.Benjamin Hedge</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">DO - Endocrinology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">4.0</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span> 24
                                                May 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> Miami, USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 21 Mar 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 d-flex">
                            <div class="profile-widget patient-favour flex-fill">
                                <div class="fav-head">
                                    <a href="javascript:void(0)" class="fav-btn favourite-btn">
                                        <span class="favourite-icon favourite"><i class="isax isax-heart5"></i></span>
                                    </a>
                                    <div class="doc-img">
                                        <a href="{{url('doctor-profile')}}">
                                            <img class="img-fluid" alt="User Image"
                                                src="{{URL::asset('build/img/doctors/doctor-thumb-20.jpg')}}">
                                        </a>
                                    </div>
                                    <div class="pro-content">
                                        <h3 class="title">
                                            <a href="{{url('doctor-profile')}}">Dr.Kristina Lepley</a>
                                            <i class="isax isax-tick-circle5 verified"></i>
                                        </h3>
                                        <p class="speciality">MD - Urology</p>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                            <span class="d-inline-block average-rating">5.0</span>
                                        </div>
                                        <ul class="available-info">
                                            <li>
                                                <i class="isax isax-calendar5 me-1"></i><span>Next Availability :</span> 13
                                                Jun 2024
                                            </li>
                                            <li>
                                                <i class="isax isax-location5 me-1"></i><span>Location :</span> San Jose,
                                                USA
                                            </li>
                                        </ul>
                                        <div class="last-book">
                                            <p>Last Book on 10 Apr 2023</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="fav-footer">
                                    <a href="{{url('booking')}}" class="btn btn-md btn-outline-primary w-100">Book Now</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /Favourites -->

                    <div class="col-md-12">
                        <div class="loader-item text-center mt-0">
                            <a href="javascript:void(0);" class="btn btn-outline-primary rounded-pill">Load More</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
@endsection