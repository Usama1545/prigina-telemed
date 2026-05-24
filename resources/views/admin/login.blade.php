<?php $page = 'login'; ?>
@extends('admin.layout.mainlayout')
@section('content')

    <!-- ========================
                    Start Page Content
                ========================= -->

    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{ asset('build/img/logo.webp') }}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Admin Login</h1>
                        <p class="account-subtitle">Access to admin dashboard</p>

                        <!-- Display Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong>
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Display Success -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form id="adminLoginForm" method="POST" action="{{ route('admin.authenticate') }}">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Enter your password" required>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Hidden fields for Firebase tokens -->
                            <input type="hidden" id="firebase_token" name="firebase_token">
                            <input type="hidden" id="firebase_refresh_token" name="firebase_refresh_token">

                            <div class="mb-3">
                                <button class="btn btn-primary w-100" type="submit" id="loginBtn" disabled>
                                    <span id="loginBtnText">Login</span>
                                    <span id="loginBtnSpinner" class="spinner-border spinner-border-sm ms-2"
                                        style="display:none;"></span>
                                </button>
                            </div>
                        </form>

                        <p class="no-account">
                            Admin access only. Contact administrator for credentials.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================
                    End Page Content
                ========================= -->

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-auth-compat.js"></script>

    <script>
        // Initialize Firebase (Use your config)
        const firebaseConfig = {
            apiKey: "{{ config('services.firebase.api_key') }}",
            authDomain: "{{ config('services.firebase.auth_domain') }}",
            projectId: "{{ config('services.firebase.project_id') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket') }}",
            messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
            appId: "{{ config('services.firebase.app_id') }}"
        };

        firebase.initializeApp(firebaseConfig);
        const auth = firebase.auth();

        const adminLoginForm = document.getElementById('adminLoginForm');
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const firebaseTokenInput = document.getElementById('firebase_token');
        const firebaseRefreshTokenInput = document.getElementById('firebase_refresh_token');
        const loginBtn = document.getElementById('loginBtn');
        const loginBtnText = document.getElementById('loginBtnText');
        const loginBtnSpinner = document.getElementById('loginBtnSpinner');

        // Enable login button when both fields are filled
        [emailInput, passwordInput].forEach(input => {
            input.addEventListener('input', () => {
                loginBtn.disabled = !emailInput.value || !passwordInput.value;
            });
        });

        adminLoginForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const email = emailInput.value;
            const password = passwordInput.value;

            // Disable button and show spinner
            loginBtn.disabled = true;
            loginBtnSpinner.style.display = 'inline-block';
            loginBtnText.textContent = 'Signing in...';

            try {
                // Sign in with Firebase
                const result = await auth.signInWithEmailAndPassword(email, password);
                const idToken = await result.user.getIdToken();
                const refreshToken = result.user.refreshToken;

                // Store tokens in hidden inputs
                firebaseTokenInput.value = idToken;
                firebaseRefreshTokenInput.value = refreshToken;

                // Submit form with tokens
                adminLoginForm.submit();

            } catch (error) {
                loginBtn.disabled = false;
                loginBtnSpinner.style.display = 'none';
                loginBtnText.textContent = 'Login';

                let errorMessage = 'Login failed. Please try again.';

                if (error.code === 'auth/user-not-found') {
                    errorMessage = 'Email not found.';
                } else if (error.code === 'auth/wrong-password') {
                    errorMessage = 'Incorrect password.';
                } else if (error.code === 'auth/too-many-requests') {
                    errorMessage = 'Too many login attempts. Try again later.';
                } else if (error.message) {
                    errorMessage = error.message;
                }

                // Display error
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger alert-dismissible fade show';
                alertDiv.role = 'alert';
                alertDiv.innerHTML = `
                    <strong>Error!</strong> ${errorMessage}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                adminLoginForm.parentElement.insertBefore(alertDiv, adminLoginForm);
            }
        });
    </script>

@endsection
