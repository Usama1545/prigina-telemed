<?php $page = 'form-mask'; ?>
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
                        <h3 class="page-title">Form Mask</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Form Mask</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Form Mask</h5>
                            <p class="card-text">Input masks can be used to force the user to enter data conform a specific format. Unlike validation, the user can't enter any other key than the ones specified by the mask.</p>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="mb-3">
                                    <label class="mb-2">Phone</label>
                                    <input type="text" id="phone" class="form-control">
                                    <span class="form-text text-muted">(999) 999-9999</span>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Date</label>
                                    <input type="text" id="date" class="form-control">
                                    <span class="form-text text-muted">dd/mm/yyyy</span>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">SSN field 1</label>
                                    <input type="text" id="ssn" class="form-control">
                                    <span class="form-text text-muted">e.g "999-99-9999"</span>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Phone field + ext.</label>
                                    <input type="text" id="phoneExt" class="form-control">
                                    <span class="form-text text-muted">+40 999 999 999</span>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Product Key</label>
                                    <input type="text" id="product" class="form-control">
                                    <span class="form-text text-muted">e.g a*-999-a999</span>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Currency</label>
                                    <input type="text" id="currency" class="form-control">
                                    <span class="form-text text-muted">$ 999,999,999.99</span>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Eye Script</label>
                                    <input type="text" id="eyescript" class="form-control">
                                    <span class="form-text text-muted">~9.99 ~9.99 999</span>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2">Percent</label>
                                    <input type="text" id="pct" class="form-control">
                                    <span class="form-text text-muted">e.g "99%"</span>
                                </div>
                                <div class="mb-0">
                                    <label class="mb-2">Credit Card Number</label>
                                    <input type="text" class="form-control" id="ccn">
                                    <span class="form-text text-muted">e.g "999.999.999.9999"</span>
                                </div>
                            </form>
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
