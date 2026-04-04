<?php $page = 'available-timings'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Available Timings', 'li_2' => 'Available Timings'])
    @endcomponent

    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    <div class="profile-sidebar doctor-sidebar profile-sidebar-new">
                        <div class="widget-profile pro-widget-content">
                            <div class="profile-info-widget">
                                <a href="{{url('doctor-profile')}}" class="booking-doc-img">
                                    <img src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                        alt="User Image">
                                </a>
                                <div class="profile-det-info">
                                    <h3><a href="{{url('doctor-profile')}}">Dr Edalin Hendry</a></h3>
                                    <div class="patient-details">
                                        <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
                                    </div>
                                    <span class="badge doctor-role-badge"><i class="fa-solid fa-circle"></i>Dentist</span>
                                </div>
                            </div>
                        </div>
                        <div class="doctor-available-head">
                            <div class="input-block input-block-new">
                                <label class="form-label">Availability <span class="text-danger">*</span></label>
                                <select class="select form-control">
                                    <option>I am Available Now</option>
                                    <option>Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="dashboard-widget">
                            <nav class="dashboard-menu">
                                <ul>
                                    <li>
                                        <a href="{{url('doctor-dashboard')}}">
                                            <i class="isax isax-category-2"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-request')}}">
                                            <i class="isax isax-clipboard-tick"></i>
                                            <span>Requests</span>
                                            <small class="unread-msg">2</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('appointments')}}">
                                            <i class="isax isax-calendar-1"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{url('available-timings')}}">
                                            <i class="isax isax-calendar-tick"></i>
                                            <span>Available Timings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('my-patients')}}">
                                            <i class="fa-solid fa-user-injured"></i>
                                            <span>My Patients</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-specialities')}}">
                                            <i class="isax isax-clock"></i>
                                            <span>Specialties & Services</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('reviews')}}">
                                            <i class="isax isax-star-1"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('accounts')}}">
                                            <i class="isax isax-profile-tick"></i>
                                            <span>Accounts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('invoices')}}">
                                            <i class="isax isax-document-text"></i>
                                            <span>Invoices</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-payment')}}">
                                            <i class="fa-solid fa-money-bill-1"></i>
                                            <span>Payout Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('chat-doctor')}}">
                                            <i class="isax isax-messages-1"></i>
                                            <span>Message</span>
                                            <small class="unread-msg">7</small>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-blog')}}">
                                            <i class="isax isax-grid-5"></i>
                                            <span>Blog</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-profile-settings')}}">
                                            <i class="isax isax-setting-2"></i>
                                            <span>Profile Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('social-media')}}">
                                            <i class="fa-solid fa-shield-halved"></i>
                                            <span>Social Media</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-change-password')}}">
                                            <i class="isax isax-key"></i>
                                            <span>Change Password</span>
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

                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header">
                        <h3>Available Timings</h3>
                    </div>

                    <div class="appointment-tabs">
                        <ul class="nav available-nav">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#" data-bs-toggle="tab"
                                    data-bs-target="#general-availability">General Availability</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#" data-bs-toggle="tab"
                                    data-bs-target="#clinic-availability">Clinic Availability</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content pt-0 timing-content">

                        <!-- General Availability -->
                        <div class="tab-pane fade show active" id="general-availability">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3>Select Available Slots</h3>
                                    </div>

                                    <div class="available-tab">
                                        <label class="form-label">Select Available days</label>
                                        <ul class="nav">
                                            <li>
                                                <a href="#" class="active" data-bs-toggle="tab"
                                                    data-bs-target="#monday">Monday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#tuesday">Tuesday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#wednesday">Wednesday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#thursday">Thursday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#friday">Friday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#saturday">Saturday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#sunday">Sunday</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content pt-0">

                                        <!-- Slot -->
                                        <div class="tab-pane active show" id="monday">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Monday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <ul class="time-slots">
                                                        <li><i class="isax isax-clock"></i>09:00 AM</li>
                                                        <li><i class="isax isax-clock"></i>09:30 AM</li>
                                                        <li><i class="isax isax-clock"></i>10:00 AM</li>
                                                        <li><i class="isax isax-clock"></i>10:30 AM</li>
                                                        <li><i class="isax isax-clock"></i>11:00 AM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="tuesday">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Tuesday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="wednesday">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Wednesday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="thursday">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Thursday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="friday">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Friday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="saturday">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Saturday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="sunday">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Sunday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <div class="form-wrap">
                                            <label class="col-form-label">Appointment Fees ($)</label>
                                            <input type="text" class="form-control" value="254">
                                        </div>
                                        <div class="modal-btn text-end">
                                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                                data-bs-dismiss="modal">Cancel</a>
                                            <button class="btn btn-primary prime-btn">Save Changes</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /General Availability -->

                        <!-- Clinic Availability -->
                        <div class="tab-pane fade" id="clinic-availability">
                            <div class="clinic-wrap">
                                <h5>Select Clinic</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="select-img">
                                            <option
                                                data-image="{{URL::asset('build/img/doctors-dashboard/clinic-01.jpg')}}">The
                                                Family Dentistry Clinic</option>
                                            <option
                                                data-image="{{URL::asset('build/img/doctors-dashboard/clinic-02.jpg')}}">
                                                Dentistry Clinic</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card custom-card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h3>Select Available Slots</h3>
                                    </div>

                                    <div class="available-tab">
                                        <label class="form-label">Select Available days</label>
                                        <ul class="nav">
                                            <li>
                                                <a href="#" class="active" data-bs-toggle="tab"
                                                    data-bs-target="#monday-slot">Monday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#tuesday-slot">Tuesday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab"
                                                    data-bs-target="#wednesday-slot">Wedneday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab"
                                                    data-bs-target="#thursday-slot">Thursday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#friday-slot">Friday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab"
                                                    data-bs-target="#saturday-slot">Saturday</a>
                                            </li>
                                            <li>
                                                <a href="#" data-bs-toggle="tab" data-bs-target="#sunday-slot">Sunday</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content pt-0">

                                        <!-- Slot -->
                                        <div class="tab-pane active show" id="monday-slot">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Monday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <ul class="time-slots">
                                                        <li><i class="isax isax-clock"></i>09:00 AM</li>
                                                        <li><i class="isax isax-clock"></i>09:30 AM</li>
                                                        <li class="slot-space">Space : 2</li>
                                                        <li><i class="isax isax-clock"></i>10:30 AM</li>
                                                        <li><i class="isax isax-clock"></i>11:00 AM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="tuesday-slot">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Tuesday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="wednesday-slot">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Wednesday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="thursday-slot">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Thursday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="friday-slot">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Friday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="saturday-slot">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Saturday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <!-- Slot -->
                                        <div class="tab-pane fade" id="sunday-slot">
                                            <div class="slot-box">
                                                <div class="slot-header">
                                                    <h5>Sunday</h5>
                                                    <ul>
                                                        <li>
                                                            <a href="#" class="add-slot" data-bs-toggle="modal"
                                                                data-bs-target="#add_slot">Add Slots</a>
                                                        </li>
                                                        <li>
                                                            <a href="#" class="del-slot" data-bs-toggle="modal"
                                                                data-bs-target="#delete_slot">Delete All</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="slot-body">
                                                    <p>No Slots Available</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Slot -->

                                        <div class="form-wrap">
                                            <label class="col-form-label">Appointment Fees ($)</label>
                                            <input type="text" class="form-control" value="254">
                                        </div>
                                        <div class="modal-btn text-end">
                                            <a href="#" class="btn btn-gray" data-bs-toggle="modal"
                                                data-bs-dismiss="modal">Cancel</a>
                                            <button class="btn btn-primary prime-btn">Save Changes</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /Clinic Availability -->

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection