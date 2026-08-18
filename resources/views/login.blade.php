<?php $page = 'login'; ?>
@extends('layouts.mainlayout')

@section('content')
    <div class="content container-fluid">

        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1">

                <div class="account-content">

                    <div class="col-md-7 col-lg-6 login-left">

                        <img src="{{ asset('build/img/login-1.jpeg') }}" class="img-fluid" alt="PriGina Global Telemed Login">

                    </div>

                    <div class="col-md-12 col-lg-6 login-right">

                        <div class="login-header text-center mb-4" id="loginHeader">

                            <div class="d-flex align-items-center justify-content-center gap-3 mb-2">

                                <div class="rounded-circle bg-light d-flex align-items-center justify-content-center"
                                    style="width: 100px; height: 100px;">

                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" width="100%"
                                        height="100%">
                                        <!-- Background -->
                                        <circle cx="100" cy="100" r="90" fill="#EBF3FA" />

                                        <!-- Scaled-up figures, centered in the circle -->
                                        <g transform="translate(100 100) scale(1.3) translate(-100.5 -85)">

                                            <!-- ================= DOCTOR ================= -->
                                            <g stroke="#003B7A" stroke-linecap="round" stroke-linejoin="round">
                                                <!-- Doctor Neck -->
                                                <path d="M72 88 V96
                 C72 100 88 100 88 96
                 V88" fill="#FFFFFF" stroke-width="4" />
                                                <!-- Doctor Head -->
                                                <circle cx="80" cy="68" r="18" fill="#FFFFFF"
                                                    stroke-width="4.5" />
                                                <!-- Hair -->
                                                <path d="M64 65
                 C65 53 72 48 81 49
                 C91 49 97 56 96 66
                 C92 61 87 59 82 60
                 C75 61 70 64 64 65Z" fill="#003B7A" stroke="none" />
                                                <!-- Doctor Body / Coat -->
                                                <path d="M62 122
                 V105
                 C62 96 68 91 75 89
                 L80 98
                 L85 89
                 C92 91 98 96 98 105
                 V122 Z" fill="#FFFFFF" stroke-width="4.5" />
                                                <!-- Coat Lapels -->
                                                <path d="M75 89 L80 99 L85 89" fill="none" stroke-width="3" />
                                                <!-- Shirt -->
                                                <path d="M75 90 L80 98 L85 90" fill="#EBF3FA" stroke-width="2" />
                                                <!-- Stethoscope -->
                                                <path d="M68 92
                 V101
                 C68 111 80 113 80 103
                 V98" fill="none" stroke-width="3" />
                                                <path d="M80 103 V111" fill="none" stroke-width="3" />
                                                <!-- Stethoscope Chest Piece -->
                                                <circle cx="80" cy="114" r="3.5" fill="#003B7A"
                                                    stroke-width="1.5" />
                                                <!-- Medical Cross -->
                                                <rect x="88" y="103" width="7" height="3" rx="1.5"
                                                    fill="#003B7A" stroke="none" />
                                                <rect x="90" y="101" width="3" height="7" rx="1.5"
                                                    fill="#003B7A" stroke="none" />
                                            </g>

                                            <!-- ================= PATIENT ================= -->
                                            <g stroke="#003B7A" stroke-linecap="round" stroke-linejoin="round">
                                                <!-- Patient Neck -->
                                                <path d="M113 91 V98
                 C113 102 127 102 127 98
                 V91" fill="#FFFFFF" stroke-width="3.5" />
                                                <!-- Patient Head -->
                                                <circle cx="120" cy="73" r="17" fill="#FFFFFF"
                                                    stroke-width="4" />
                                                <!-- Patient Hair -->
                                                <path d="M104 70
                 C105 59 112 54 121 55
                 C130 55 136 62 136 72
                 C132 67 127 65 121 66
                 C115 66 110 68 104 70Z" fill="#003B7A" stroke="none" />
                                                <!-- Patient Body -->
                                                <path d="M101 122
                 V108
                 C101 99 108 95 113 93
                 L120 101
                 L127 93
                 C133 95 139 100 139 108
                 V122 Z" fill="#003B7A" stroke-width="3.5" />
                                                <!-- Shirt Collar -->
                                                <path d="M113 94 L120 102 L127 94" fill="none" stroke="#FFFFFF"
                                                    stroke-width="2.5" />
                                            </g>

                                        </g>
                                    </svg>

                                </div>


                            </div>
                            <h2 class="mb-0 fw-bold text-primary">
                                {{ __('app.login.sign_in') }}
                            </h2>

                            <p class="text-muted mb-0 mt-2">
                                {{ __('app.login.account_desc') }}
                            </p>

                        </div>
                        <form id="loginForm" onsubmit="return handleLogin(event)">

                            @csrf

                            <div class="mb-3">

                                <label class="form-label">
                                    {{ __('app.login.email') }}
                                </label>

                                <input type="text" id="email" class="form-control">

                            </div>

                            <div class="mb-3">

                                <div class="form-group-flex">

                                    <label class="form-label">
                                        {{ __('app.login.password') }}
                                    </label>

                                    <a href="{{ route('forgot-password') }}" class="forgot-link">
                                        {{ __('app.login.forgot_password') }}
                                    </a>

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
                                            {{ __('app.login.remember_me') }}
                                        </label>

                                    </div>

                                </div>

                            </div>

                            <button id="loginBtn" class="btn btn-primary-gradient w-100" type="submit">

                                <span id="btnText">
                                    {{ __('app.login.sign_in_btn') }}
                                </span>

                                <span id="btnSpinner" class="spinner-border spinner-border-sm ms-2 d-none"></span>

                            </button>

                            <div class="login-or">

                                <span class="or-line"></span>

                                <span class="span-or">
                                    {{ __('app.login.or') }}
                                </span>

                            </div>

                            <div class="social-login-btn">

                                <a href="javascript:void(0);" onclick="googleLogin()" class="btn w-100">

                                    <img src="{{ URL::asset('build/img/icons/google-icon.svg') }}" alt="google-icon">

                                    {{ __('app.login.sign_in_google') }}

                                </a>

                            </div>

                            <div class="account-signup">

                                <p>
                                    {{ __('app.login.no_account') }}
                                    <a href="{{ url('register') }}">
                                        {{ __('app.login.sign_up') }}
                                    </a>
                                </p>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>


    </div>
    <style>
        .login-right {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .account-content {
            min-height: calc(100vh - 180px);
            display: flex;
            align-items: center;
        }

        .login-left img {
            max-width: 850px;
            width: 100%;
        }

        .account-page .content {
            padding: 40px 0 60px;
            background: #fafbff !important;
        }

        .account-content {
            margin: 0 20px;
        }

        .content {
            min-height: 200px;
            padding: 60px 0 36px;
            background: #fafbff;
        }
    </style>
@endsection

@push('scripts')
    <script>
        let pendingVerificationUser = null;

        function firebaseErrorMessage(error) {
            const messages = {
                'auth/user-not-found': 'No account found with this email address.',
                'auth/wrong-password': 'Incorrect password. Please try again.',
                'auth/invalid-credential': 'Invalid email or password.',
                'auth/invalid-email': 'Please enter a valid email address.',
                'auth/user-disabled': 'This account has been disabled. Please contact support.',
                'auth/too-many-requests': 'Too many failed attempts. Please try again later.',
                'auth/network-request-failed': 'Network error. Please check your connection.',
                'auth/popup-closed-by-user': 'Sign-in popup was closed before completing.',
                'auth/cancelled-popup-request': 'Sign-in was cancelled.',
            };
            return messages[error.code] || 'Login failed. Please try again.';
        }

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

            text.innerText = '{{ __('app.login.signing_in') }}';

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
                    firebaseErrorMessage(error)
                );

                btn.disabled = false;

                spinner.classList.add('d-none');

                text.innerText = '{{ __('app.login.sign_in_btn') }}';
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

                await fetch('/api/auth/send-verification-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        email: pendingVerificationUser.email
                    })
                });

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
                    firebaseErrorMessage(error)
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

                    'X-CSRF-TOKEN': document.querySelector(
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
