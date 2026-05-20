<?php $page = 'doctor-list'; ?>
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
                        <h3 class="page-title">List of Doctors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                            <li class="breadcrumb-item active">Doctor</li>
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
                                            <th>Doctor Name</th>
                                            <th>Speciality</th>
                                            <th>Member Since</th>
                                            <th>Earned</th>
                                            <th>Account Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Ruby Perrin</a>
                                                </h2>
                                            </td>
                                            <td>Dental</td>

                                            <td>14 Jan 2023 <br><small>02.59 AM</small></td>

                                            <td>$3100.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_1" class="check" checked>
                                                    <label for="status_1" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Darren Elder</a>
                                                </h2>
                                            </td>
                                            <td>Dental</td>

                                            <td>11 Jun 2023 <br><small>4.50 AM</small></td>

                                            <td>$5000.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_2" class="check" checked>
                                                    <label for="status_2" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-03.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Deborah Angel</a>
                                                </h2>
                                            </td>
                                            <td>Cardiology</td>

                                            <td>4 Jan 2018 <br><small>9.40 AM</small></td>

                                            <td>$3300.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_3" class="check" checked>
                                                    <label for="status_3" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-04.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Sofia Brient</a>
                                                </h2>
                                            </td>
                                            <td>Urology</td>

                                            <td>5 Jul 2023 <br><small>12.59 AM</small></td>

                                            <td>$3500.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_4" class="check" checked>
                                                    <label for="status_4" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-05.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Marvin Campbell</a>
                                                </h2>
                                            </td>
                                            <td>Orthopaedics</td>

                                            <td>24 Jan 2023 <br><small>02.59 AM</small></td>

                                            <td>$3700.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_5" class="check" checked>
                                                    <label for="status_5" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-06.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Katharine Berthold</a>
                                                </h2>
                                            </td>
                                            <td>Orthopaedics</td>

                                            <td>23 Mar 2023 <br><small>02.50 PM</small></td>

                                            <td>$4000.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_6" class="check" checked>
                                                    <label for="status_6" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-07.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Linda Tobin</a>
                                                </h2>
                                            </td>
                                            <td>Neurology</td>

                                            <td>14 Dec 2018 <br><small>01.59 AM</small></td>

                                            <td>$2000.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_7" class="check" checked>
                                                    <label for="status_7" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-08.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Paul Richard</a>
                                                </h2>
                                            </td>
                                            <td>Dermatology</td>

                                            <td>11 Jan 2023 <br><small>02.59 AM</small></td>

                                            <td>$3000.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_8" class="check" checked>
                                                    <label for="status_8" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-09.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. John Gibbs</a>
                                                </h2>
                                            </td>
                                            <td>Dental</td>

                                            <td>21 Apr 2018 <br><small>02.59 PM</small></td>

                                            <td>$4100.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_9" class="check" checked>
                                                    <label for="status_9" class="checktoggle">checkbox</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/doctors/doctor-thumb-10.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Dr. Olga Barlow</a>
                                                </h2>
                                            </td>
                                            <td>Dental</td>

                                            <td>15 Feb 2018 <br><small>03.59 AM</small></td>

                                            <td>$3500.00</td>

                                            <td>
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_10" class="check" checked>
                                                    <label for="status_10" class="checktoggle">checkbox</label>
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
