<?php $page = 'doctor-register'; ?>
@extends('layouts.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Login Tab Content -->
                    <div class="account-content">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-7 col-lg-6 login-left">
                                <img src="{{ URL::asset('build/img/login-banner.png') }}" class="img-fluid"
                                    alt="PriGina Global Telemed Login">
                            </div>
                            <div class="col-md-12 col-lg-6 login-right">
                                <div class="login-header">
                                    <h3>Doctor Register <a href="{{ route('register') }}">Not a Doctor?</a></h3>
                                </div>
                                <form action="{{ route('doctor-register') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')

                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>
                                        <input class="form-control group_formcontrol form-control-phone" id="phone"
                                            name="phone" type="text">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Medical License Number</label>
                                        <input type="text" name="license_number" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Qualification</label>
                                        <select name="qualification" class="form-control" required>
                                            <option value="">Select Qualification</option>
                                            <option value="MBBS">MBBS</option>
                                            <option value="MD">MD</option>
                                            <option value="MS">MS</option>
                                            <option value="DM">DM</option>
                                            <option value="MCH">MCH</option>
                                            <option value="DNB">DNB</option>
                                            <option value="PHD">PHD</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Years of Experience</label>
                                        <input type="number" name="experience" class="form-control" min="0" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Specialization</label>
                                        <select name="specialization[]" class="form-control select2" multiple required>
                                            @foreach($specializations as $spec)
                                                <option value="{{ $spec['id'] }}">{{ $spec['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Create Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>

                                    <hr>

                                    <h5>Required Documents</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Medical License</label>
                                        <input type="file" name="medical_license" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Degree Certificate</label>
                                        <input type="file" name="degree_certificate" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">ID Proof</label>
                                        <input type="file" name="id_proof" class="form-control" accept=".jpg,.jpeg,.png,.pdf" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Clinic Registration</label>
                                        <input type="file" name="clinic_registration" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary-gradient w-100" type="submit">Sign Up</button>
                                    </div>

                                    <div class="account-signup">
                                        <p>Already have account? <a href="{{ url('login') }}">Sign In</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Login Tab Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Select Specializations",
            allowClear: true,
            width: '100%'
        });
    });
</script>
@endpush
