<?php $page = 'form-vertical'; ?>
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
                        <h3 class="page-title">Vertical Form</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Vertical Form</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="mb-3">
                                    <label class="mb-2">First Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Last Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Email Address</label>
                                    <input type="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Username</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Repeat Password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Address Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="mb-3">
                                    <label class="mb-2">Address Line 1</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Address Line 2</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">City</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">State</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Country</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Postal Code</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Two Column Vertical Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <h4 class="card-title">Personal Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">First Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Last Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Blood Group</label>
                                            <select class="form-select">
                                                <option>Select</option>
                                                <option value="1">A+</option>
                                                <option value="2">O+</option>
                                                <option value="3">B+</option>
                                                <option value="4">AB+</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="d-block">Gender:</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender_male" value="option1">
                                                <label class="form-check-label" for="gender_male">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender_female" value="option2">
                                                <label class="form-check-label" for="gender_female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Username</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Email</label>
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-2">Password</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Repeat Password</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="card-title">Postal Address</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">Address Line 1</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Address Line 2</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">State</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="mb-2">City</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Country</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Postal Code</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Two Column Vertical Form</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title">Personal details</h4>
                                        <div class="mb-3">
                                            <label class="mb-2">Name:</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Password:</label>
                                            <input type="password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">State:</label>
                                            <select class="form-select">
                                                <option>Select State</option>
                                                <option value="1">California</option>
                                                <option value="2">Texas</option>
                                                <option value="3">Florida</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Your Message:</label>
                                            <textarea rows="5" cols="5" class="form-control" placeholder="Enter message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="card-title">Personal details</h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">First Name:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">Last Name:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">Email:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">Phone:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="mb-2">Address line:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">Country:</label>
                                                    <select class="form-select">
                                                        <option>Select Country</option>
                                                        <option value="1">USA</option>
                                                        <option value="2">France</option>
                                                        <option value="3">India</option>
                                                        <option value="4">Spain</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">State/Province:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">ZIP code:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="mb-2">City:</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
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
