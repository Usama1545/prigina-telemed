<?php $page = 'form-input-groups'; ?>
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
                    <div class="col">
                        <h3 class="page-title">Input Groups</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('admin/index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Input Groups</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Examples</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">Group Left</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">@</span>
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">Group Right</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">URL Example</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">https://</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">Group with Price</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <label class="col-form-label col-lg-2">Group with Price (Left)</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <span class="input-group-text">0.00</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sizing</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">Input Group Large</label>
                                    <div class="col-lg-10">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="sizing-addon1">@</span>
                                            <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">Input Group Default</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text" id="sizing-addon2">@</span>
                                            <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-form-label col-lg-2">Input Group Small</label>
                                    <div class="col-lg-10">
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text" id="sizing-addon3">@</span>
                                            <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon3">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Checkbox and Radio Addons</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">Checkbox</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <input type="checkbox">
                                            </span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-form-label col-lg-2">Radio</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <input type="radio">
                                            </span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Multiple Addons</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">Radio and Text Addons</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <input type="checkbox">
                                            </span>
                                            <span class="input-group-text">$</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-0">
                                    <label class="col-form-label col-lg-2">Two Addons</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <span class="input-group-text">0.00</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buttons with dropdowns</h4>
                        </div>
                        <div class="card-body">
                            <form action="#">
                                <div class="mb-3 row">
                                    <label class="col-form-label col-lg-2">Radio and Text Addons</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown">Action</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Left dropdown">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <label class="col-form-label col-lg-2">Two Addons</label>
                                    <div class="col-lg-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Right dropdown">
                                            <button type="button" class="btn btn-white dropdown-toggle" data-bs-toggle="dropdown">Action</button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
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
