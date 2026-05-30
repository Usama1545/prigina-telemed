<?php $page = 'profile'; ?>
@extends('admin.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12">

                    {{-- Admin identity (read-only) --}}
                    <div class="card mb-4">
                        <div class="card-body d-flex align-items-center gap-3 py-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center flex-shrink-0"
                                style="width:52px;height:52px;">
                                <i class="fe fe-user text-primary" style="font-size:1.4rem;"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">{{ session('admin_name') ?: 'Admin' }}</h6>
                                <span class="text-muted small">{{ session('auth_email') }}</span>
                            </div>
                            <span class="badge bg-primary ms-auto">Admin</span>
                        </div>
                    </div>

                    {{-- Change Password --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="fe fe-lock me-2 text-muted"></i>Change Password
                            </h5>
                        </div>
                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fe fe-check-circle me-2"></i>{{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fe fe-alert-circle me-2"></i>
                                    {{ $errors->first() }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.profile.password') }}" id="passwordForm">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label fw-semibold" for="current_password">
                                        Current Password
                                    </label>
                                    <div class="input-group">
                                        <input type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            id="current_password" name="current_password"
                                            placeholder="Enter current password" autocomplete="current-password">
                                        <button class="btn btn-outline-secondary toggle-pw" type="button"
                                            data-target="current_password" tabindex="-1">
                                            <i class="fi fi-rr-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold" for="password">
                                        New Password
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="At least 8 characters"
                                            autocomplete="new-password">
                                        <button class="btn btn-outline-secondary toggle-pw" type="button"
                                            data-target="password" tabindex="-1">
                                            <i class="fi fi-rr-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold" for="password_confirmation">
                                        Confirm New Password
                                    </label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Repeat new password"
                                            autocomplete="new-password">
                                        <button class="btn btn-outline-secondary toggle-pw" type="button"
                                            data-target="password_confirmation" tabindex="-1">
                                            <i class="fi fi-rr-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary w-100" id="saveBtn">
                                    <i class="fe fe-save me-1"></i>Save Changes
                                </button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        // Show/hide password toggle
        document.querySelectorAll('.toggle-pw').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = document.getElementById(this.dataset.target);
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fi-rr-eye', 'fi-rr-eye-crossed');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fi-rr-eye-crossed', 'fi-rr-eye');
                }
            });
        });

        // Spinner on submit
        document.getElementById('passwordForm').addEventListener('submit', function() {
            const btn = document.getElementById('saveBtn');
            btn.innerHTML =
                '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>Saving…';
            btn.disabled = true;
        });
    </script>
@endsection
