<?php $page = 'available-timings'; ?>
@extends('layouts.mainlayout')
@section('content')
    @component('components.breadcrumb', ['title' => __('app.appointments.doctor'), 'li_1' => __('app.availability.title'), 'li_2' => __('app.availability.title')])
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
                        <h3>{{ __('app.availability.title') }}</h3>
                    </div>

                   
                    <div class="tab-content pt-0 timing-content">

                        <!-- General Availability -->
                        <div class="tab-pane fade show active" id="general-availability">

                            <div class="card custom-card">
                                <div class="card-body">

                                    <div class="card-header mb-4">
                                        <h3>{{ __('app.availability.select_slots') }}</h3>
                                    </div>

                                    <form action="{{ route('doctor.update-availability') }}" method="POST">

                                        @csrf

                                        

                                        <div class="mt-4">
                                            <button class="btn btn-primary">
                                                {{ __('app.availability.save') }}
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