<?php $page = 'settings'; ?>
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
                        <h3 class="page-title">General Settings</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                            <li class="breadcrumb-item active">General Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <div class="col-12">

                    <!-- General -->

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">General</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form method="POST" action="{{ route('admin.settings.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="mb-2">Platform Commission (%)</label>
                                    <input type="number" name="platformCommission" class="form-control" min="0"
                                        max="100" step="0.01"
                                        value="{{ old('platformCommission', $settings['defaultPlatformFeePercent'] ?? 0) }}">
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary">Save Settings</button>
                                </div>

                            </form>
                        </div>
                    </div>

                    <!-- /General -->

                </div>
            </div>

        </div>
        <!-- End Content -->

    </div>

    <!-- ========================
                        End Page Content
                    ========================= -->
@endsection
