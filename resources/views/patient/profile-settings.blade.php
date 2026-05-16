<?php $page = 'profile-settings'; ?>
@extends('layouts.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content patient-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    @include('partials.patient-sidebar')
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-lg-8 col-xl-9">
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom pb-3 mb-3">
                                <h5>Profile Settings</h5>
                            </div>
                            <form action="{{ route('patient.settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="setting-card">
                                    <label class="form-label mb-2">Profile Photo</label>
                                    <div class="change-avatar img-upload">
                                        <div class="profile-img">
                                            <i class="fa-solid fa-file-image"></i>
                                        </div>
                                        <div class="upload-img">
                                            <div class="imgs-load d-flex align-items-center">
                                                <div class="change-photo">
                                                    Upload New
                                                    <input type="file" name="image" class="upload">
                                                </div>
                                            </div>
                                            <p>Your Image should Below 4 MB, Accepted format jpg,png,svg</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-title">
                                    <h6>Information</h6>
                                </div>
                                <div class="setting-card">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Full Name <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ $patient['name'] ?? '' }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="phone" value="{{ $patient['phone'] }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email Address <span
                                                        class="text-danger">*</span></label>
                                                <input type="email"  name="email" value="{{ $patient['email'] }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Date of Birth <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="date" class="form-control" name="dob" value="{{ $patient['dob'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="modal-btn text-end">
                                    <a href="#" class="btn btn-md btn-light rounded-pill">Cancel</a>
                                    <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom pb-3 mb-3">
                                <h5>Change Password</h5>
                            </div>
                            <form action="{{ route('patient.settings.changepassword' )}}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Current Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="pass-group">
                                                <input type="password" name="current_password" class="form-control pass-input-cur">
                                                <span class="feather-eye-off toggle-password-cur"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="pass-group">
                                                <input type="password" name="password" class="form-control pass-input">
                                                <span class="feather-eye-off toggle-password"></span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="pass-group">
                                                <input type="password" name="password_confirmation" class="form-control pass-input-sub">
                                                <span class="feather-eye-off toggle-password-sub"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-btn border-top pt-3 text-end">
                                    <a href="#" class="btn btn-md btn-light rounded-pill">Cancel</a>
                                    <button type="submit" class="btn btn-md btn-primary-gradient rounded-pill">Save
                                        Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <style>
        .toggle-password-cur {
            font-size: 16px;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            color: var(--gray-600);
            cursor: pointer;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <!-- /Page Content -->
@endsection
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // For Current Password
    const toggleCurrent = document.querySelector('.toggle-password-cur');
    const currentInput = document.querySelector('.pass-input-cur');
    
    if (toggleCurrent && currentInput) {
        toggleCurrent.addEventListener('click', function() {
            const type = currentInput.getAttribute('type') === 'password' ? 'text' : 'password';
            currentInput.setAttribute('type', type);
            this.classList.toggle('feather-eye');
            this.classList.toggle('feather-eye-off');
        });
    }
    
    // For New Password
    const toggleNew = document.querySelector('.toggle-password');
    const newInput = document.querySelector('.pass-input');
    
    if (toggleNew && newInput) {
        toggleNew.addEventListener('click', function() {
            const type = newInput.getAttribute('type') === 'password' ? 'text' : 'password';
            newInput.setAttribute('type', type);
            this.classList.toggle('feather-eye');
            this.classList.toggle('feather-eye-off');
        });
    }
    
    // For Confirm Password
    const toggleConfirm = document.querySelector('.toggle-password-sub');
    const confirmInput = document.querySelector('.pass-input-sub');
    
    if (toggleConfirm && confirmInput) {
        toggleConfirm.addEventListener('click', function() {
            const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmInput.setAttribute('type', type);
            this.classList.toggle('feather-eye');
            this.classList.toggle('feather-eye-off');
        });
    }
});
</script>
@endPush