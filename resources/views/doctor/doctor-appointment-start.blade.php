<?php $page = 'doctor-appointment-start'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Appointment Details', 'li_2' => 'Appointment Details'])
    @endcomponent

    <!-- Page Content -->
    <div class="content">
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
                                            <i class="fa-solid fa-shapes"></i>
                                            <span>Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('doctor-request')}}">
                                            <i class="fa-solid fa-calendar-check"></i>
                                            <span>Requests</span>
                                            <small class="unread-msg">2</small>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{url('appointments')}}">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <span>Appointments</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('available-timings')}}">
                                            <i class="fa-solid fa-calendar-day"></i>
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
                                            <i class="fa-solid fa-clock"></i>
                                            <span>Specialties & Services</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('reviews')}}">
                                            <i class="fas fa-star"></i>
                                            <span>Reviews</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('accounts')}}">
                                            <i class="fa-solid fa-file-contract"></i>
                                            <span>Accounts</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('invoices')}}">
                                            <i class="fa-solid fa-file-lines"></i>
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
                                            <i class="fa-solid fa-comments"></i>
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
                                            <i class="fa-solid fa-user-pen"></i>
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
                                            <i class="fa-solid fa-key"></i>
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
                        <div class="header-back">
                            <a href="{{url('appointments')}}" class="back-arrow"><i class="fa-solid fa-arrow-left"></i></a>
                            <h3>Appointment Details</h3>
                        </div>
                    </div>
                    <div class="appointment-details-wrap">

                        <!-- Appointment Detail Card -->
                        <div class="appointment-wrap appointment-detail-card">
                            <ul>
                                <li>
                                    <div class="patinet-information">
                                        <a href="{{url('patient-profile')}}">
                                            <img src="{{URL::asset('build/img/doctors-dashboard/profile-02.jpg')}}"
                                                alt="User Image">
                                        </a>
                                        <div class="patient-info">
                                            <p>#Apt0001</p>
                                            <h6><a href="{{url('patient-profile')}}">Kelly Joseph </a></h6>
                                            <div class="mail-info-patient">
                                                <ul>
                                                    <li><i class="fa-solid fa-envelope"></i>kelly@example.com</li>
                                                    <li><i class="fa-solid fa-phone"></i>+1 504 368 6874</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="appointment-info">
                                    <div class="person-info">
                                        <p>Person with patient</p>
                                        <ul class="d-flex apponitment-types">
                                            <li>Andrew (45)</li>
                                        </ul>
                                    </div>
                                    <div class="person-info">
                                        <p>Type of Appointment</p>
                                        <ul class="d-flex apponitment-types">
                                            <li><i class="fa-solid fa-hospital text-green"></i>Direct Visit</li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="appointment-action">
                                    <div class="detail-badge-info">
                                        <span class="badge bg-yellow">Upcoming</span>
                                    </div>
                                    <div class="consult-fees">
                                        <h6>Consultation Fees : $200</h6>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa-solid fa-comments"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa-solid fa-xmark"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="detail-card-bottom-info">
                                <li>
                                    <h6>Appointment Date & Time</h6>
                                    <span>22 Jul 2023 - 12:00 pm</span>
                                </li>
                                <li>
                                    <h6>Clinic Location</h6>
                                    <span>Adrian’s Dentistry</span>
                                </li>
                                <li>
                                    <h6>Location</h6>
                                    <span>Newyork, United States</span>
                                </li>
                                <li>
                                    <h6>Visit Type</h6>
                                    <span>General</span>
                                </li>
                                <li>
                                    <div class="start-btn">
                                        <a href="#" class="btn btn-secondary">Inprogress</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /Appointment Detail Card -->

                        <div class="create-appointment-details">
                            <div class="session-end-head">
                                <h6><span>Session Ends in</span>08M:00S</h6>
                            </div>
                            <h5 class="head-text">Create Appointment Details</h5>
                            <div class="create-details-card">
                                <div class="create-details-card-head">
                                    <div class="card-title-text">
                                        <h5>Patient Information</h5>
                                    </div>
                                    <div class="patient-info-box">
                                        <div class="row">
                                            <div class="col-xl-3 col-md-6">
                                                <ul class="info-list">
                                                    <li>Age / Gender</li>
                                                    <li>
                                                        <h6>28 Years / Female</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <ul class="info-list">
                                                    <li>Address</li>
                                                    <li>
                                                        <h6>Newyork, United States</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <ul class="info-list">
                                                    <li>Blood Group</li>
                                                    <li>
                                                        <h6>O+ve</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <ul class="info-list">
                                                    <li>No of Visit</li>
                                                    <li>
                                                        <h6>0</h6>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="create-details-card-body">
                                    <form action="{{url('doctor-appointment-start')}}">
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Vitals</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">Temprature</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="Eg : 97.8">
                                                            <span class="input-group-text">F</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">Pulse</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="454">
                                                            <span class="input-group-text">mmHg</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">Respiratory Rate</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="Eg : 97.8">
                                                            <span class="input-group-text">rpm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">SPO2</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="Eg : 98">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">Height</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="Eg : 97.8">
                                                            <span class="input-group-text">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">Weight</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="Eg : 97.8">
                                                            <span class="input-group-text">Kg</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">Waist</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="Eg : 97.8">
                                                            <span class="input-group-text">cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">BSA</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="Eg : 54">
                                                            <span class="input-group-text">M</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-md-6">
                                                    <div class="input-block input-block-new">
                                                        <label class="form-label">BMI</label>
                                                        <div class="input-text-field">
                                                            <input type="text" class="form-control" placeholder="Eg : 454">
                                                            <span class="input-group-text">kg/cm</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Previous Medical History</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Clinical Notes</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Clinical Notes</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <input class="input-tags form-control" id="inputBox" type="text"
                                                            data-role="tagsinput" placeholder="Type New" name="Label"
                                                            value="Skin Allergy">
                                                        <a href="#" class="input-text save-btn">Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Laboratory Tests</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <input class="input-tags form-control" id="inputBox2" type="text"
                                                            data-role="tagsinput" placeholder="Type New" name="Label"
                                                            value="Hemoglobin A1c (HbA1c),Liver Function Tests (LFTs)">
                                                        <a href="#" class="input-text save-btn">Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Complaints</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <input class="input-tags form-control" id="inputBox3" type="text"
                                                            data-role="tagsinput" placeholder="Type New" name="Label"
                                                            value="Fever,Headache,Stomach Pain">
                                                        <a href="#" class="input-text save-btn">Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Diagonosis</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <div class="input-field-set">
                                                            <label class="form-label">Fever</label>
                                                            <input type="text" class="form-control" placeholder="Diagnosis">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <div class="input-field-set">
                                                            <label class="form-label">Headache</label>
                                                            <input type="text" class="form-control" placeholder="Diagnosis">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <div class="input-field-set">
                                                            <label class="form-label">Stomach Pain</label>
                                                            <input type="text" class="form-control" placeholder="Diagnosis">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Medications</h5>
                                            </div>
                                            <div class="row meditation-row">
                                                <div class="col-md-12">
                                                    <div class="d-flex flex-wrap medication-wrap align-items-center">
                                                        <div class="input-block input-block-new">
                                                            <label class="form-label">Name</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="input-block input-block-new">
                                                            <label class="form-label">Type</label>
                                                            <select class="select form-control">
                                                                <option>Select</option>
                                                                <option>Direct Visit</option>
                                                                <option>Video Call</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-block input-block-new">
                                                            <label class="form-label">Dosage</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="input-block input-block-new">
                                                            <label class="form-label">Duration</label>
                                                            <input type="text" class="form-control" placeholder="1-0-0">
                                                        </div>
                                                        <div class="input-block input-block-new">
                                                            <label class="form-label">Duration</label>
                                                            <select class="select form-control">
                                                                <option>Select</option>
                                                                <option>Not Available</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-block input-block-new">
                                                            <label class="form-label">Instruction</label>
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="delete-row">
                                                            <a href="#"
                                                                class="delete-btn delete-medication trash text-danger"><i
                                                                    class="fa-solid fa-trash-can"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="add-new-med text-end mb-4">
                                                        <a href="#" class="add-medical more-item mb-0">Add New</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Advice</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="start-appointment-set">
                                            <div class="form-bg-title">
                                                <h5>Follow Up</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-block input-block-new">
                                                        <textarea class="form-control" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-set-button">
                                                <button class="btn btn-light" type="button">Cancel</button>
                                                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                    data-bs-target="#end_session">Save & End Appointment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection