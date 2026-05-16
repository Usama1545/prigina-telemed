<?php $page = 'available-timings'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => 'Doctor', 'li_1' => 'Available Timings', 'li_2' => 'Available Timings'])
    @endcomponent

    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    @include('partials.doctor-sidebar')
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-lg-8 col-xl-9">

                    <div class="dashboard-header">
                        <h3>Available Timings</h3>
                    </div>

                   
                    <div class="tab-content pt-0 timing-content">

                        <!-- General Availability -->
                        <div class="tab-pane fade show active" id="general-availability">

                            <div class="card custom-card">
                                <div class="card-body">

                                    <div class="card-header mb-4">
                                        <h3>Select Available Slots</h3>
                                    </div>

                                    <form action="{{ route('doctor.update-availability') }}" method="POST">

                                        @csrf

                                        

                                        <div class="mt-4">
                                            <button class="btn btn-primary">
                                                Save Availability
                                            </button>
                                        </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                        <!-- /General Availability -->

                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection