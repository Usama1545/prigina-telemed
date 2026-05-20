<?php $page = 'profile'; ?>
@extends('admin.layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="profile-header">
                        <div class="row align-items-center">
                            <div class="col-auto profile-image">
                                <a href="#">
                                    <img class="rounded-circle" alt="User Image" src="{{URL::asset('build/admin/img/profiles/avatar-01.jpg')}}">
                                </a>
                            </div>
                            <div class="col ml-md-n2 profile-user-info">
                                <h4 class="user-name mb-0">Ryan Taylor</h4>
                                <h6 class="text-muted">ryantaylor@admin.com</h6>
                                <div class="user-Location"><i class="fa-solid fa-location-dot"></i> Florida, United States</div>
                                <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                            </div>
                            <div class="col-auto profile-btn">

                                <a href="#" class="btn btn-primary">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-menu">
                        <ul class="nav nav-tabs nav-tabs-solid">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content profile-tab-cont">

                        <!-- Personal Details Tab -->
                        <div class="tab-pane fade show active" id="per_details_tab">

                            <!-- Personal Details -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title d-flex justify-content-between">
                                                <span>Personal Details</span>
                                                <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit me-1"></i>Edit</a>
                                            </h5>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted">Name</p>
                                                <p class="col-sm-10">John Doe</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted">Date of Birth</p>
                                                <p class="col-sm-10">24 Jul 1983</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted">Email ID</p>
                                                <p class="col-sm-10">johndoe@example.com</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted">Mobile</p>
                                                <p class="col-sm-10">305-310-5857</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-2 text-muted">Address</p>
                                                <p class="col-sm-10 mb-0">4663  Agriculture Lane,<br>
                                                Miami,<br>
                                                Florida - 33165,<br>
                                                United States.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Details Modal -->
                                    <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document" >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Personal Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="row">
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">First Name</label>
                                                                    <input type="text" class="form-control" value="John">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Last Name</label>
                                                                    <input type="text"  class="form-control" value="Doe">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Date of Birth</label>
                                                                    <div class="cal-icon">
                                                                        <input type="text" class="form-control datetimepicker" value="24-07-1983">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Email ID</label>
                                                                    <input type="email" class="form-control" value="johndoe@example.com">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Mobile</label>
                                                                    <input type="text" value="+1 202-555-0125" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <h5 class="form-title"><span>Address</span></h5>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="mb-3">
                                                                <label class="mb-2">Address</label>
                                                                    <input type="text" class="form-control" value="4663 Agriculture Lane">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">City</label>
                                                                    <input type="text" class="form-control" value="Miami">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">State</label>
                                                                    <input type="text" class="form-control" value="Florida">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Zip Code</label>
                                                                    <input type="text" class="form-control" value="22434">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-6">
                                                                <div class="mb-3">
                                                                    <label class="mb-2">Country</label>
                                                                    <input type="text" class="form-control" value="United States">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary w-100">Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Edit Details Modal -->

                                </div>


                            </div>
                            <!-- /Personal Details -->

                        </div>
                        <!-- /Personal Details Tab -->

                        <!-- Change Password Tab -->
                        <div id="password_tab" class="tab-pane fade">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Change Password</h5>
                                    <div class="row">
                                        <div class="col-md-10 col-lg-6">
                                            <form>
                                                <div class="mb-3">
                                                    <label class="mb-2">Old Password</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="mb-2">New Password</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="mb-2">Confirm Password</label>
                                                    <input type="password" class="form-control">
                                                </div>
                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Change Password Tab -->

                    </div>
                </div>
            </div>

        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
