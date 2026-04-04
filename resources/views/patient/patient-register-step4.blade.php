<?php $page = 'patient-register-step4'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content login-page pt-0">
        <div class="container-fluid">

            <!-- Register Content -->
            <div class="account-content">
                <div class="d-flex align-items-center">
                    <div class="login-right">
                        <div class="inner-right-login">
                            <div class="login-header">
                                <div class="logo-icon">
                                    <img src="{{ URL::asset('build/img/logo.png') }}" alt="doccure-logo">
                                </div>
                                <div class="step-list">
                                    <ul>
                                        <li><a href="#" class="active-done">1</a></li>
                                        <li><a href="#" class="active-done">2</a></li>
                                        <li><a href="#" class="active-done">3</a></li>
                                        <li><a href="#" class="active">4</a></li>
                                        <li><a href="#">5</a></li>
                                    </ul>
                                </div>
                                <form method="post" id="famil_age">
                                    <div class="text-start mt-2">
                                        <p>Add age of the each members</p>
                                        <h4 class="mt-3">Age</h4>
                                    </div>
                                    <div class="step-process-col mt-4">
                                        <div class="mb-3">
                                            <label class="mb-2">Child_1 Age</label>
                                            <input type="text" class="form-control" id="Child_1_age" name="Child_1_age">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Child_1 Image</label>
                                            <input type="file" class="form-control" id="Child_1_image"
                                                name="Child_1_image">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Spouse Age</label>
                                            <input type="text" class="form-control" id="spouse_age" name="spouse_age">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Spouse Image</label>
                                            <input type="file" class="form-control" id="spouse_file" name="spouse_file">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Father</label>
                                            <input type="text" class="form-control" id="father_age" name="father_age">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Father Image</label>
                                            <input type="file" class="form-control" id="father_file" name="father_file">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Mother</label>
                                            <input type="text" class="form-control" id="mother_age" name="mother_age">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-2">Mother Image</label>
                                            <input type="file" class="form-control" id="mother_file" name="mother_file">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <a href="{{ url('patient-register-step5') }}"
                                            class="btn btn-primary w-100 btn-lg login-btn step4_submit">continue </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="login-bottom-copyright">
                            <span>© 2024 PriGina Global Telemed. All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Register Content -->

        </div>

    </div>
    <!-- /Page Content -->
@endsection
