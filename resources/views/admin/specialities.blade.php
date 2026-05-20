<?php $page = 'specialities'; ?>
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
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">Specialities</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Specialities</li>
                        </ul>
                    </div>
                    <div class="col-sm-5 col">
                        <a href="#Add_Specialities_details" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Specialities</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#SP001</td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img" src="{{URL::asset('build/admin/img/specialities/specialities-01.png')}}" alt="Speciality">
                                                    </a>
                                                    <a href="{{url('admin/profile')}}">Urology</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#SP002</td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img" src="{{URL::asset('build/admin/img/specialities/specialities-02.png')}}" alt="Speciality">
                                                    </a>
                                                    <a href="{{url('admin/profile')}}">Neurology</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#SP003</td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img" src="{{URL::asset('build/admin/img/specialities/specialities-03.png')}}" alt="Speciality">
                                                    </a>
                                                    <a href="{{url('admin/profile')}}">Orthopedic</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#SP004</td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img" src="{{URL::asset('build/admin/img/specialities/specialities-04.png')}}" alt="Speciality">
                                                    </a>
                                                    <a href="{{url('admin/profile')}}">Cardiologist</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a  data-bs-toggle="modal" href="#delete_modal" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#SP005</td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2">
                                                        <img class="avatar-img" src="{{URL::asset('build/admin/img/specialities/specialities-05.png')}}" alt="Speciality">
                                                    </a>
                                                    <a href="{{url('admin/profile')}}">Dentist</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" href="#edit_specialities_details">
                                                        <i class="fe fe-pencil"></i> Edit
                                                    </a>
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
