<?php $page = 'reviews'; ?>
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
                        <h3 class="page-title">Reviews</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Reviews</li>
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
                                            <th>Patient Name</th>
                                            <th>Doctor Name</th>
                                            <th>Ratings</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient1.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Charlene Reed </a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Ruby Perrin</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>3 Nov 2023 <br><small>09.59 AM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient2.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Travis Trimble </a>
                                                </h2>
                                            </td>


                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Darren Elder</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>2 Nov 2023<br> <small>08.50 AM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient3.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Carl Kelly</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-03.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Deborah Angel</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>1 Nov 2023<br> <small>02.59 PM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient4.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}"> Michelle Fairfax</a>
                                                </h2>
                                            </td>


                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-04.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Sofia Brient</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>27 Sep 2023 <br><small>03.40 PM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient5.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Gina Moore</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-05.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Marvin Campbell</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>24 Sep 2023 <br><small>04.38 PM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient6.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Elsie Gilley</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-06.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Katharine Berthold</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>22 Aug 2023 <br><small>01.50 PM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient7.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Joan Gardner</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-07.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Linda Tobin</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>21 Jul 2023 <br><small>05.50 PM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient8.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Daniel Griffing</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-08.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Paul Richard</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>16 Jun 2023 <br><small>04.50 PM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient9.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Walter Roberson</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-09.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. John Gibbs</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>11 Mar 2023 <br><small>05.55 PM</small></td>
                                            <td>
                                                <div class="actions">
                                                    <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal" href="#delete_modal">
                                                        <i class="fe fe-trash"></i> Delete
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient10.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Harry Williams</a>
                                                </h2>
                                            </td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-10.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Olga Barlow</a>
                                                </h2>
                                            </td>

                                            <td>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star text-warning"></i>
                                                <i class="fe fe-star-o text-secondary"></i>
                                            </td>

                                            <td>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                            </td>
                                                <td>15 Feb 2023 <br><small>07.30 PM</small></td>
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
