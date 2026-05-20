<?php $page = 'patient-list'; ?>
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
                        <h3 class="page-title">List of Patient</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                            <li class="breadcrumb-item active">Patient</li>
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
                                <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Patient ID</th>
                                            <th>Patient Name</th>
                                            <th>Age</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Last Visit</th>
                                            <th>Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#PT001</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient1.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Charlene Reed </a>
                                                </h2>
                                            </td>
                                            <td>29</td>
                                            <td>4417  Goosetown Drive, Taylorsville, North Carolina, 28681</td>
                                            <td>8286329170</td>
                                            <td>20 Oct 2023</td>
                                            <td>$100.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT002</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient2.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Travis Trimble </a>
                                                </h2>
                                            </td>
                                            <td>23</td>
                                            <td>4026  Fantages Way, Brunswick, Maine, 04011</td>
                                            <td>2077299974</td>
                                            <td>22 Oct 2023</td>
                                            <td>$200.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT003</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient3.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Carl Kelly</a>
                                                </h2>
                                            </td>
                                            <td>29</td>
                                            <td>2037 Pearcy Avenue, Decatur, Indiana, 46733</td>
                                            <td>2607247769</td>
                                            <td>21 Oct 2023</td>
                                            <td>$250.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT004</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient4.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}"> Michelle Fairfax</a>
                                                </h2>
                                            </td>
                                            <td>25</td>
                                            <td>2037 Pearcy Avenue, Decatur, Indiana, 46733</td>
                                            <td>5043686874</td>
                                            <td>21 Sep 2023</td>
                                            <td>$150.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT005</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient5.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Gina Moore</a>
                                                </h2>
                                            </td>
                                            <td>23</td>
                                            <td>888  Everette Alley, Hialeah, Florida, 33012</td>
                                            <td>9548207887</td>
                                            <td>18 Sep 2023</td>
                                            <td>$350.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT006</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient6.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Elsie Gilley</a>
                                                </h2>
                                            </td>
                                            <td>16</td>
                                            <td>644  Coffman Alley, Bowling Green, Kentucky, 42101</td>
                                            <td>3153844562</td>
                                            <td>18 Sep 2023</td>
                                            <td>$300.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT007</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient7.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}"> Joan Gardner</a>
                                                </h2>
                                            </td>
                                            <td>25</td>
                                            <td>2399  Hillview Drive, San Francisco, California, 94103</td>
                                            <td>7072202603</td>
                                            <td>18 Sep 2023</td>
                                            <td>$250.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT008</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient8.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}"> Daniel Griffing</a>
                                                </h2>
                                            </td>
                                            <td>21</td>
                                            <td>4914  Hilltop Haven Drive, Passaic, New Jersey, 07055</td>
                                            <td>9737739497</td>
                                            <td>7 Sep 2023</td>
                                            <td>$150.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT009</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient9.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Walter Roberson</a>
                                                </h2>
                                            </td>
                                            <td>18</td>
                                            <td>1299  Star Trek Drive, Panama City, Florida, 32405</td>
                                            <td>8503584445</td>
                                            <td>11 Sep 2023</td>
                                            <td>$100.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT010</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient10.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Robert Rhodes</a>
                                                </h2>
                                            </td>
                                            <td>19</td>
                                            <td>1214  Hamill Avenue, Del Mar, California, 92014</td>
                                            <td>8582595285</td>
                                            <td>12 Sep 2023</td>
                                            <td>$120.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT011</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient11.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Harry Williams</a>
                                                </h2>
                                            </td>
                                            <td>9</td>
                                            <td>4566  Sampson Street, Denver, Colorado, 80202</td>
                                            <td>3036077075</td>
                                            <td>14 Sep 2023</td>
                                            <td>$130.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT012</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient12.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Robert Johnston</a>
                                                </h2>
                                            </td>
                                            <td>29</td>
                                            <td>1996  Crummit Lane, Beatrice, Nebraska, 68310</td>
                                            <td>4022231492</td>
                                            <td>7 Nov 2023</td>
                                            <td>$260.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT013</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient13.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Tracy Mason</a>
                                                </h2>
                                            </td>
                                            <td>32</td>
                                            <td>4211  Vesta Drive, TOLEDO, Washington, 98591</td>
                                            <td>7737265795</td>
                                            <td>9 Nov 2023</td>
                                            <td>$290.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT014</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient14.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}"> Daniel Finch</a>
                                                </h2>
                                            </td>
                                            <td>23</td>
                                            <td>186  Bryan Street, Greensboro, North Carolina, 27409</td>
                                            <td>3362314023</td>
                                            <td>5 Nov 2023</td>
                                            <td>$300.00</td>
                                        </tr>
                                        <tr>
                                            <td>#PT015</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="{{url('admin/profile')}}" class="avatar avatar-sm me-2"><img class="avatar-img rounded-circle" src="{{URL::asset('build/admin/img/patients/patient15.jpg')}}" alt="User Image"></a>
                                                    <a href="{{url('admin/profile')}}">Jessica Garza</a>
                                                </h2>
                                            </td>
                                            <td>10</td>
                                            <td>4672  Rose Street, Schaumburg, Illinois, 60173</td>
                                            <td>7082788201</td>
                                            <td>6 Nov 2023</td>
                                            <td>$310.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
