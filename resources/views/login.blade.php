<?php $page = 'login'; ?>
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
                                    <h3>Login <span>PriGina Global Telemed</span></h3>
                                </div>
                                <form onsubmit="return handleLogin(event)">    
                                    @csrf                                
                                    <div class="mb-3">
                                        <label class="form-label">E-mail</label>
                                        <input type="text" id="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group-flex">
                                            <label class="form-label">Password</label>
                                            <a href="{{ url('forgot-password') }}" class="forgot-link">Forgot password?</a>
                                        </div>
                                        <div class="pass-group">
                                            <input type="password" id="password" class="form-control pass-input">
                                            <span class="feather-eye-off toggle-password"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 form-check-box">
                                        <div class="form-group-flex">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" id="remember" checked>
                                                <label class="form-check-label" for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <button id="loginBtn" class="btn btn-primary-gradient w-100" type="submit">
                                        <span id="btnText">Sign in</span>
                                        <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2 d-none"></span>
                                    </button>
                                    <div class="login-or">
                                        <span class="or-line"></span>
                                        <span class="span-or">or</span>
                                    </div>
                                    <div class="social-login-btn">
                                        <a href="javascript:void(0);" onclick="googleLogin()" class="btn w-100">
                                            <img src="{{ URL::asset('build/img/icons/google-icon.svg') }}"
                                                alt="google-icon">Sign in With Google
                                        </a>
                                    </div>
                                    <div class="account-signup">
                                        <p>Don't have an account ? <a href="{{ url('register') }}">Sign up</a></p>
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
async function handleLogin(e) {
    e.preventDefault();

    const btn = document.getElementById('loginBtn');
    const spinner = document.getElementById('btnSpinner');
    const text = document.getElementById('btnText');

    // start loading
    btn.disabled = true;
    spinner.classList.remove('d-none');
    text.innerText = 'Signing in...';

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    try {
        const userCredential = await auth.signInWithEmailAndPassword(email, password);
        const token = await userCredential.user.getIdToken();

        await sendTokenToBackend(token);

    } catch (error) {
        alert(error.message);

        // stop loading on error
        btn.disabled = false;
        spinner.classList.add('d-none');
        text.innerText = 'Sign in';
    }
}
</script>
<script>
async function googleLogin() {
    const provider = new firebase.auth.GoogleAuthProvider();

    try {
        const result = await auth.signInWithPopup(provider);
        const token = await result.user.getIdToken();

        await sendTokenToBackend(token);

    } catch (error) {
        alert(error.message);
    }
}
async function sendTokenToBackend(token) {
    const btn = document.getElementById('loginBtn');
    const spinner = document.getElementById('btnSpinner');
    const text = document.getElementById('btnText');

    const response = await fetch('/auth/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
        credentials: 'same-origin',
        body: JSON.stringify({ token })
    });

    const data = await response.json();

    if (response.ok) {
        window.location.href = '/dashboard';
    } else {
        alert(data.error || 'Login failed');

        btn.disabled = false;
        spinner.classList.add('d-none');
        text.innerText = 'Sign in';
    }
}
</script>
@endpush
