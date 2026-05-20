<?php $page = 'error-404'; ?>
@extends('admin.layout.mainlayout')
@section('content')

    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="error-box">
        <h1>404</h1>
        <h3 class="h2 mb-3"><i class="fa fa-warning"></i> Oops! Page not found!</h3>
        <p class="h4 fw-medium">The page you requested was not found.</p>
        <a href="{{url('admin/index')}}" class="btn btn-primary">Back to Home</a>
    </div>

    <!-- ========================
        End Page Content
    ========================= -->

@endsection
