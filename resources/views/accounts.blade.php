<?php $page = 'accounts'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Accounts', 'li_2' => 'Accounts'])
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
                                    <li>
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
                                    <li class="active">
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
                    <div class="accunts-sec">
                        <div class="dashboard-header">
                            <div class="header-back">
                                <h3>Accounts</h3>
                            </div>
                        </div>
                        <div class="account-details-box">
                            <div class="row">
                                <div class="col-xxl-6 col-lg-7">
                                    <div class="account-payment-info">
                                        <h4>Statistics</h4>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="payment-amount">
                                                    <h6><i class="fa-solid fa-file-invoice-dollar text-success"></i>Total
                                                        Balance</h6>
                                                    <span>$900</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="payment-amount">
                                                    <h6><i class="fa-solid fa-money-bill-1 text-orange"></i>Earned</h6>
                                                    <span>$906</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="payment-amount">
                                                    <h6><i class="fa-solid fa-circle-question text-pink"></i>Requested</h6>
                                                    <span>$50</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payment-request">
                                            <span>Last Payment request : 24 Mar 2023</span>
                                            <a href="#payment_request" class="btn btn-primary prime-btn"
                                                data-bs-toggle="modal">Request Payment</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-1 d-lg-none d-xxl-block"></div>
                                <div class="col-lg-5">
                                    <div class="bank-details-info">
                                        <h3>Bank Details</h3>
                                        <ul>
                                            <li>
                                                <h6>Bank Name</h6>
                                                <h5>Citi Bank Inc</h5>
                                            </li>
                                            <li>
                                                <h6>Account Number</h6>
                                                <h5>5396 5250 1908 XXXX</h5>
                                            </li>
                                            <li>
                                                <h6>Branch Name</h6>
                                                <h5>London</h5>
                                            </li>
                                            <li>
                                                <h6>Account Name</h6>
                                                <h5>Darren</h5>
                                            </li>
                                        </ul>
                                        <div class="edit-detail-link">
                                            <a href="#account_details" data-bs-toggle="modal">Edit Details</a>
                                            <a href="#other_accounts" data-bs-toggle="modal">Other Accounts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="account-detail-table">
                                <!-- Tab Menu -->
                                <nav class="accounts-tab">
                                    <ul class="nav nav-tabs-bottom">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#pat_accounts"
                                                data-bs-toggle="tab">Accounts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pat_refundrequest" data-bs-toggle="tab">Refund
                                                Request</a>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- /Tab Menu -->

                                <!-- Tab Content -->
                                <div class="tab-content pt-0">

                                    <!-- Accounts Tab -->
                                    <div id="pat_accounts" class="tab-pane fade show active">
                                        <ul class="header-list-btns d-inline-block mb-4">
                                            <li>
                                                <div class="input-block dash-search-input">
                                                    <input type="text" class="form-control" placeholder="Search">
                                                    <span class="search-icon"><i
                                                            class="fa-solid fa-magnifying-glass"></i></span>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="custom-new-table">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Requested Date</th>
                                                            <th>Account No</th>
                                                            <th>Credited On</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1234</span></a>
                                                            </td>
                                                            <td>24 Mar 2024</td>
                                                            <td>5396 5250 1908 XXXX</td>
                                                            <td>26 Mar 2024</td>
                                                            <td>$300</td>
                                                            <td>
                                                                <span class="badge badge-success-bg">Completed</span>
                                                            </td>
                                                            <td>
                                                                <a href="#request_details_modal" class="account-action"
                                                                    data-bs-toggle="modal"><i
                                                                        class="isax isax-link-2"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1235</span></a>
                                                            </td>
                                                            <td>28 Mar 2024</td>
                                                            <td>8833 8942 9013 XXXX</td>
                                                            <td>30 Mar 2024</td>
                                                            <td>$400</td>
                                                            <td>
                                                                <span class="badge badge-success-bg">Completed</span>
                                                            </td>
                                                            <td>
                                                                <a href="#request_details_modal" class="account-action"
                                                                    data-bs-toggle="modal"><i
                                                                        class="isax isax-link-2"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1236</span></a>
                                                            </td>
                                                            <td>02 Apr 2024</td>
                                                            <td>8920 4041 4725 XXXX</td>
                                                            <td>04 Apr 2024</td>
                                                            <td>$350</td>
                                                            <td>
                                                                <span class="badge badge-danger-bg">Cancelled</span>
                                                            </td>
                                                            <td>
                                                                <a href="#request_cancel_modal" class="account-action"
                                                                    data-bs-toggle="modal"><i
                                                                        class="isax isax-link-2"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1237</span></a>
                                                            </td>
                                                            <td>10 Apr 2024</td>
                                                            <td>5730 4892 0492 XXXX</td>
                                                            <td>12 Apr 2024</td>
                                                            <td>$220</td>
                                                            <td>
                                                                <span class="badge badge-warning-bg">Pending</span>
                                                            </td>
                                                            <td>
                                                                <a href="#" class="account-action"><i
                                                                        class="isax isax-link-2"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1238</span></a>
                                                            </td>
                                                            <td>16 Apr 2024</td>
                                                            <td>7922 9024 5824 XXXX</td>
                                                            <td>18 Apr 2024</td>
                                                            <td>$470</td>
                                                            <td>
                                                                <span class="badge badge-success-bg">Completed</span>
                                                            </td>
                                                            <td>
                                                                <a href="#request_details_modal" class="account-action"
                                                                    data-bs-toggle="modal"><i
                                                                        class="isax isax-link-2"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Pagination -->
                                        <div class="pagination dashboard-pagination">
                                            <ul>
                                                <li>
                                                    <a href="#" class="page-link"><i
                                                            class="fa-solid fa-chevron-left"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link active">2</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link">3</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link">4</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link">...</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link"><i
                                                            class="fa-solid fa-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /Pagination -->
                                    </div>
                                    <!-- /Accounts Tab -->

                                    <!-- Refund Request Tab -->
                                    <div class="tab-pane fade" id="pat_refundrequest">
                                        <ul class="header-list-btns d-inline-block mb-4">
                                            <li>
                                                <div class="input-block dash-search-input">
                                                    <input type="text" class="form-control" placeholder="Search">
                                                    <span class="search-icon"><i
                                                            class="fa-solid fa-magnifying-glass"></i></span>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="custom-new-table">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Patient</th>
                                                            <th>Appointment Date</th>
                                                            <th>Payment</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1234</span></a>
                                                            </td>
                                                            <td>
                                                                <div class="table-avtatar">
                                                                    <a href="{{url('patient-profile')}}"><img
                                                                            src="{{URL::asset('build/img/doctors-dashboard/doctor-profile-img.jpg')}}"
                                                                            alt="Img">Edalin Hendry</a>
                                                                </div>
                                                            </td>
                                                            <td>24 Mar 2024 - 10:30 AM</td>
                                                            <td>$300</td>
                                                            <td>
                                                                <span class="badge badge-success-bg">Paid</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="account-action me-2"><i
                                                                            class="isax isax-link-2"></i></a>
                                                                    <a href="#" class="account-action text-success me-2"><i
                                                                            class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="account-action text-danger me-2"><i
                                                                            class="fa-solid fa-x"></i></a>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1235</span></a>
                                                            </td>
                                                            <td>
                                                                <div class="table-avtatar">
                                                                    <a href="{{url('patient-profile')}}"><img
                                                                            src="{{URL::asset('build/img/doctors/doctor-thumb-01.jpg')}}"
                                                                            alt="Img">Shanta Neill</a>
                                                                </div>
                                                            </td>
                                                            <td>28 Mar 2024 - 11:15 AM</td>
                                                            <td>$250</td>
                                                            <td>
                                                                <span class="badge badge-success-bg">Paid</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="account-action me-2"><i
                                                                            class="isax isax-link-2"></i></a>
                                                                    <a href="#" class="account-action text-success me-2"><i
                                                                            class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="account-action text-danger me-2"><i
                                                                            class="fa-solid fa-x"></i></a>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1236</span></a>
                                                            </td>
                                                            <td>
                                                                <div class="table-avtatar">
                                                                    <a href="{{url('patient-profile')}}"><img
                                                                            src="{{URL::asset('build/img/doctors/doctor-thumb-02.jpg')}}"
                                                                            alt="Img">Anthony Tran</a>
                                                                </div>
                                                            </td>
                                                            <td>02 Apr 2024 - 04:15 PM</td>
                                                            <td>$380</td>
                                                            <td>
                                                                <span class="badge badge-success-bg">Paid</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="account-action me-2"><i
                                                                            class="isax isax-link-2"></i></a>
                                                                    <a href="#" class="account-action text-success me-2"><i
                                                                            class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="account-action text-danger me-2"><i
                                                                            class="fa-solid fa-x"></i></a>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1237</span></a>
                                                            </td>
                                                            <td>
                                                                <div class="table-avtatar">
                                                                    <a href="{{url('patient-profile')}}"><img
                                                                            src="{{URL::asset('build/img/doctors/doctor-thumb-03.jpg')}}"
                                                                            alt="Img">Susan Lingo</a>
                                                                </div>
                                                            </td>
                                                            <td>13 Apr 2024 - 05:30 PM</td>
                                                            <td>$400</td>
                                                            <td>
                                                                <span class="badge badge-warning-bg">Pending</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="account-action me-2"><i
                                                                            class="isax isax-link-2"></i></a>
                                                                    <a href="#" class="account-action text-success me-2"><i
                                                                            class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="account-action text-danger me-2"><i
                                                                            class="fa-solid fa-x"></i></a>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1238</span></a>
                                                            </td>
                                                            <td>
                                                                <div class="table-avtatar">
                                                                    <a href="{{url('patient-profile')}}"><img
                                                                            src="{{URL::asset('build/img/doctors/doctor-thumb-08.jpg')}}"
                                                                            alt="Img">Joseph Boyd</a>
                                                                </div>
                                                            </td>
                                                            <td>21 Apr 2024 - 12:30 PM</td>
                                                            <td>$320</td>
                                                            <td>
                                                                <span class="badge badge-success-bg">Paid</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="account-action me-2"><i
                                                                            class="isax isax-link-2"></i></a>
                                                                    <a href="#" class="account-action text-success me-2"><i
                                                                            class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="account-action text-danger me-2"><i
                                                                            class="fa-solid fa-x"></i></a>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <a href="#"><span class="text-blue">#AC-1239</span></a>
                                                            </td>
                                                            <td>
                                                                <div class="table-avtatar">
                                                                    <a href="{{url('patient-profile')}}"><img
                                                                            src="{{URL::asset('build/img/doctors/doctor-thumb-06.jpg')}}"
                                                                            alt="Img">Juliet Grabriel</a>
                                                                </div>
                                                            </td>
                                                            <td>17 May 2024 - 09:20 AM</td>
                                                            <td>$280</td>
                                                            <td>
                                                                <span class="badge badge-success-bg">Paid</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a href="#" class="account-action me-2"><i
                                                                            class="isax isax-link-2"></i></a>
                                                                    <a href="#" class="account-action text-success me-2"><i
                                                                            class="fa-solid fa-check"></i></a>
                                                                    <a href="#" class="account-action text-danger me-2"><i
                                                                            class="fa-solid fa-x"></i></a>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Pagination -->
                                        <div class="pagination dashboard-pagination">
                                            <ul>
                                                <li>
                                                    <a href="#" class="page-link"><i
                                                            class="fa-solid fa-chevron-left"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link">1</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link active">2</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link">3</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link">4</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link">...</a>
                                                </li>
                                                <li>
                                                    <a href="#" class="page-link"><i
                                                            class="fa-solid fa-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /Pagination -->
                                    </div>
                                    <!-- /Refund Request Tab -->

                                </div>
                                <!-- Tab Content -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection