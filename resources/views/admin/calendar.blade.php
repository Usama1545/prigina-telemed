<?php $page = 'calendar'; ?>
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
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Calendar</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Calendar</li>
                        </ul>
                    </div>
                    <div class="col-auto text-end float-end ms-auto">
                        <a href="#" class="add-btn" data-bs-toggle="modal" data-bs-target="#add_event"><span><i class="fe fe-plus"></i></span> Create New</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <h4 class="card-title">Drag & Drop Event</h4>
                    <div id="calendar-events" class="mb-3">
                        <div class="calendar-events" data-class="bg-info"><i class="fa fa-circle text-info"></i> My Event One</div>
                        <div class="calendar-events" data-class="bg-success"><i class="fa fa-circle text-success"></i> My Event Two</div>
                        <div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle text-danger"></i> My Event Three</div>
                        <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle text-warning"></i> My Event Four</div>
                    </div>
                    <div class="checkbox  mb-3">
                        <input id="drop-remove" type="checkbox">
                        <label for="drop-remove">
                            Remove after drop
                        </label>
                    </div>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add_new_event" class="btn mb-3 btn-primary w-100">
                        <i class="fa fa-plus"></i> Add Category
                    </a>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Event Modal -->
            <div id="add_event" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="mb-2">Event Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Event Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Event Modal -->

            <!-- Add Event Modal -->
            <div class="modal fade none-border" id="my_event">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Event</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body"></div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-success save-event submit-btn">Create event</button>
                            <button type="button" class="btn btn-danger delete-event submit-btn" data-bs-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Event Modal -->

            <!-- Add Category Modal -->
            <div class="modal fade" id="add_new_event">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Category</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="mb-2">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" >
                                </div>
                                <div class="mb-0">
                                    <label class="mb-2">Choose Category Color</label>
                                    <select class="form-select form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                        <option value="inverse">Inverse</option>
                                    </select>
                                </div>
                                <div class="submit-section">
                                    <button type="button" class="btn btn-primary save-category submit-btn mt-3" data-bs-dismiss="modal">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Category Modal -->

        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
