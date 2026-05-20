<?php $page = 'error-500'; ?>
@extends('admin.layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="error-box">
        <h1>500</h1>
        <h3 class="h2 mb-3"><i class="fa fa-warning"></i> Oops! Something went wrong</h3>
        <p class="h4 fw-medium">The page you requested was not found.</p>
        <a href="{{url('admin/index')}}" class="btn btn-primary">Back to Home</a>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
