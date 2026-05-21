<?php $page = 'login'; ?>
@extends('layouts.mainlayout')

@section('content')

<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="account-content">

                    <div class="row align-items-center justify-content-center">

                        <div class="col-md-7 col-lg-6 login-left">

                            <img
                                src="{{ URL::asset('build/img/login-banner.png') }}"
                                class="img-fluid"
                                alt="PriGina Global Telemed Login"
                            >

                        </div>

                        <div class="col-md-12 col-lg-6 login-right">

                            <div
                                class="login-header"
                                id="loginHeader"
                            >
                                <h3>
                                    Login
                                    <span>PriGina Global Telemed</span>
                                </h3>
                            </div>

                            <form
                                id="loginForm"
                                onsubmit="return handleLogin(event)"
                            >

                                @csrf

                                <div class="mb-3">

                                    <label class="form-label">
                                        E-mail
                                    </label>

                                    <input
                                        type="text"
                                        id="email"
                                        class="form-control"
                                    >

                                </div>

                                <div class="mb-3">

                                    <div class="form-group-flex">

                                        <label class="form-label">
                                            Password
                                        </label>

                                        <a
                                            href="{{ route('forgot-password') }}"
                                            class="forgot-link"
                                        >
                                            Forgot password?
                                        </a>

                                    </div>

                                    <div class="pass-group">

                                        <input
                                            type="password"
                                            id="password"
                                            class="form-control pass-input"
                                        >

                                        <span class="feather-eye-off toggle-password"></span>

                                    </div>

                                </div>

                                <div class="mb-3 form-check-box">

                                    <div class="form-group-flex">

                                        <div class="form-check mb-0">

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                id="remember"
                                                checked
                                            >

                                            <label
                                                class="form-check-label"
                                                for="remember"
                                            >
                                                Remember Me
                                            </label>

                                        </div>

                                    </div>

                                </div>

                                <button
                                    id="loginBtn"
                                    class="btn btn-primary-gradient w-100"
                                    type="submit"
                                >

                                    <span id="btnText">
                                        Sign in
                                    </span>

                                    <span
                                        id="btnSpinner"
                                        class="spinner-border spinner-border-sm ms-2 d-none"
                                    ></span>

                                </button>

                                <div class="login-or">

                                    <span class="or-line"></span>

                                    <span class="span-or">
                                        or
                                    </span>

                                </div>

                                <div class="social-login-btn">

                                    <a
                                        href="javascript:void(0);"
                                        onclick="googleLogin()"
                                        class="btn w-100"
                                    >

                                        <img
                                            src="{{ URL::asset('build/img/icons/google-icon.svg') }}"
                                            alt="google-icon"
                                        >

                                        Sign in With Google

                                    </a>

                                </div>

                                <div class="account-signup">

                                    <p>
                                        Don't have an account ?
                                        <a href="{{ url('register') }}">
                                            Sign up
                                        </a>
                                    </p>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')

<script>

let pendingVerificationUser = null;

async function handleLogin(e) {

    e.preventDefault();

    const btn =
        document.getElementById('loginBtn');

    const spinner =
        document.getElementById('btnSpinner');

    const text =
        document.getElementById('btnText');

    btn.disabled = true;

    spinner.classList.remove('d-none');

    text.innerText = 'Signing in...';

    const email =
        document.getElementById('email').value;

    const password =
        document.getElementById('password').value;

    try {

        const userCredential =
            await auth.signInWithEmailAndPassword(
                email,
                password
            );

        const user =
            userCredential.user;

        if (!user.emailVerified) {

            showVerificationView(user);

            return;
        }

        const token =
            await user.getIdToken();

        const refreshToken =
            user.refreshToken;

        await sendTokenToBackend(
            token,
            refreshToken
        );

    } catch (error) {

        showAlert(
            error.message || 'Login failed'
        );

        btn.disabled = false;

        spinner.classList.add('d-none');

        text.innerText = 'Sign in';
    }
}

function showVerificationView(user) {

    pendingVerificationUser = user;

    document
        .getElementById('loginHeader')
        .innerHTML = `
            <h3>
                Verify Email
                <span>PriGina Global Telemed</span>
            </h3>
        `;

    document
        .getElementById('loginForm')
        .innerHTML = `

            <div class="text-center mb-4">

                <div style="
                    width: 90px;
                    height: 90px;
                    background: rgba(28,148,134,0.1);
                    border-radius: 50%;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    margin:auto;
                ">

                    <i
                        class="fas fa-envelope"
                        style="
                            font-size:38px;
                            color:#1c9486;
                        "
                    ></i>

                </div>

            </div>

            <div class="alert alert-warning">

                Your email address
                <strong>${user.email}</strong>
                is not verified yet.

                <hr>

                Please verify your email before logging in.

            </div>

            <button
                type="button"
                class="btn btn-primary-gradient w-100 mb-3"
                onclick="resendVerificationEmail()"
                id="resendBtn"
            >
                Resend Verification Email
            </button>

            <button
                type="button"
                class="btn btn-success w-100 mb-3"
                onclick="checkVerificationStatus()"
                id="checkBtn"
            >
                I Have Verified My Email
            </button>

            <button
                type="button"
                class="btn btn-light w-100"
                onclick="window.location.reload()"
            >
                Back To Login
            </button>
        `;
}

async function resendVerificationEmail() {

    try {

        const btn =
            document.getElementById('resendBtn');

        btn.disabled = true;

        btn.innerText = 'Sending...';

        await pendingVerificationUser
            .sendEmailVerification();

        showAlert(
            'Verification email sent successfully',
            'success'
        );

    } catch (e) {

        showAlert(
            e.message || 'Failed to resend email'
        );

    } finally {

        const btn =
            document.getElementById('resendBtn');

        btn.disabled = false;

        btn.innerText =
            'Resend Verification Email';
    }
}

async function checkVerificationStatus() {

    try {

        const btn =
            document.getElementById('checkBtn');

        btn.disabled = true;

        btn.innerText = 'Checking...';

        await pendingVerificationUser.reload();

        const refreshedUser =
            auth.currentUser;

        if (!refreshedUser.emailVerified) {

            showAlert(
                'Email is still not verified'
            );

            return;
        }

        const token =
            await refreshedUser.getIdToken();

        const refreshToken =
            refreshedUser.refreshToken;

        await sendTokenToBackend(
            token,
            refreshToken
        );

    } catch (e) {

        showAlert(
            e.message || 'Verification failed'
        );

    } finally {

        const btn =
            document.getElementById('checkBtn');

        if (btn) {

            btn.disabled = false;

            btn.innerText =
                'I Have Verified My Email';
        }
    }
}

async function googleLogin() {

    const provider =
        new firebase.auth.GoogleAuthProvider();

    try {

        const result =
            await auth.signInWithPopup(provider);

        const user =
            result.user;

        if (!user.emailVerified) {

            showVerificationView(user);

            return;
        }

        const token =
            await user.getIdToken();

        const refreshToken =
            user.refreshToken;

        await sendTokenToBackend(
            token,
            refreshToken
        );

    } catch (error) {

        showAlert(
            error.message || 'Google login failed'
        );
    }
}

async function refreshCsrfToken() {

    const response =
        await fetch('/csrf-token', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
            credentials: 'same-origin',
        });

    const data =
        await response.json();

    const csrfMeta =
        document.querySelector(
            'meta[name="csrf-token"]'
        );

    const csrfInput =
        document.querySelector(
            'input[name="_token"]'
        );

    if (data.token && csrfMeta) {
        csrfMeta.setAttribute(
            'content',
            data.token
        );
    }

    if (data.token && csrfInput) {
        csrfInput.value = data.token;
    }

    return data.token;
}

async function postLoginToken(token, refreshToken) {

    return fetch('/auth/login', {

        method: 'POST',

        headers: {
            'Content-Type': 'application/json',

            'X-CSRF-TOKEN':
                document.querySelector(
                    'meta[name="csrf-token"]'
                ).getAttribute('content'),

            'Accept': 'application/json',
        },

        credentials: 'same-origin',

        body: JSON.stringify({
            token: token,
            refreshToken: refreshToken
        })
    });
}

async function sendTokenToBackend(
    token,
    refreshToken
) {

    let response =
        await postLoginToken(
            token,
            refreshToken
        );

    if (response.status === 419) {

        await refreshCsrfToken();

        response =
            await postLoginToken(
                token,
                refreshToken
            );
    }

    const data =
        await response.json();

    if (response.ok) {

        window.location.href =
            '/dashboard';

    } else {

        showAlert(
            data.error || 'Login failed'
        );
    }
}

</script>

@endpush