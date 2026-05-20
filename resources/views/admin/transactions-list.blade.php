<?php $page = 'transactions-list'; ?>
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
                    <div class="col-sm-12">
                        <h3 class="page-title">Transactions</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Transactions</li>
                        </ul>
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
                                            <th>Invoice Number</th>
                                            <th>Patient ID</th>
                                            <th>Patient Name</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0001</a></td>
                                            <td>#PT001</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient1.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Charlene Reed </a>
                                                </h2>
                                            </td>
                                            <td>$100.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0002</a></td>
                                            <td>#PT002</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient2.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Travis Trimble </a>
                                                </h2>
                                            </td>
                                            <td>$200.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0003</a></td>
                                            <td>#PT003</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient3.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Carl Kelly</a>
                                                </h2>
                                            </td>
                                            <td>$250.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0004</a></td>
                                            <td>#PT004</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient4.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}"> Michelle Fairfax</a>
                                                </h2>
                                            </td>
                                            <td>$150.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0005</a></td>
                                            <td>#PT005</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient5.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Gina Moore</a>
                                                </h2>
                                            </td>
                                            <td>$350.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0006</a></td>
                                            <td>#PT006</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient6.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Elsie Gilley</a>
                                                </h2>
                                            </td>
                                            <td>$300.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0007</a></td>
                                            <td>#PT007</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient7.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}"> Joan Gardner</a>
                                                </h2>
                                            </td>
                                            <td>$250.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0008</a></td>
                                            <td>#PT008</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient8.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}"> Daniel Griffing</a>
                                                </h2>
                                            </td>
                                            <td>$150.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0009</a></td>
                                            <td>#PT009</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient9.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Walter Roberson</a>
                                                </h2>
                                            </td>
                                            <td>$100.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><a href="{{url('admin/invoice')}}">#IN0010</a></td>
                                            <td>#PT010</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient10.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Robert Rhodes </a>
                                                </h2>
                                            </td>
                                            <td>$120.00</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                            </td>
                                            <td>
                                                <div class="actions">
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
