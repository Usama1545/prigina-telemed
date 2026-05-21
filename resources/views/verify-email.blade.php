<?php $page = 'login'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container container-fluid">
            <div class="row">
                <div class="col-md-7 col-lg-6 login-left">
                    <img src="{{ URL::asset('build/img/login-banner.png') }}" class="img-fluid"
                        alt="PriGina Global Telemed Login">
                </div>
                <div class="col-md-12 col-lg-6 login-right">
                    <div class="text-center">

                        <div class="mb-4">

                            <div style="
                                width: 100px;
                                height: 100px;
                                background: rgba(28,148,134,0.1);
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                margin: auto;
                            ">

                                <i
                                    class="fas fa-envelope"
                                    style="
                                        font-size: 42px;
                                        color: #1c9486;
                                    "
                                ></i>

                            </div>

                        </div>

                        <h2 class="mb-3">
                            Verify Your Email
                        </h2>

                        <p class="text-muted mb-4">

                            We have sent a verification email to your inbox.

                            Please verify your account before logging in.

                        </p>

                    </div>
                    <div class="alert alert-warning">

                        <strong>Email not verified?</strong>

                        <ul class="mb-0 mt-2">
                            <li>Check your spam folder</li>
                            <li>Check promotions tab</li>
                            <li>Wait a few minutes for delivery</li>
                        </ul>

                    </div>
                    <button
                        id="resendBtn"
                        class="btn btn-primary-gradient w-100 mb-3"
                        onclick="resendVerificationEmail()"
                    >

                        <span id="resendText">
                            Resend Verification Email
                        </span>

                        <span
                            id="resendSpinner"
                            class="spinner-border spinner-border-sm ms-2 d-none"
                        ></span>

                    </button>
                    <a
                        href="{{ route('login') }}"
                        class="btn btn-light w-100"
                    >
                        Back To Login
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection
@push('scripts')
<script>
    async function resendVerificationEmail() {

    try {

        const resendBtn =
            document.getElementById('resendBtn');

        const resendSpinner =
            document.getElementById('resendSpinner');

        const resendText =
            document.getElementById('resendText');

        resendBtn.disabled = true;

        resendSpinner.classList.remove('d-none');

        resendText.innerText = 'Sending...';

        const response = await fetch(
            "{{ route('resend-verification-email') }}",
            {
                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',

                    'X-CSRF-TOKEN':
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        ).getAttribute('content')
                }
            }
        );

        const data = await response.json();

        if (!response.ok) {
            throw new Error(
                data.message || 'Failed to resend email'
            );
        }

        showAlert(
            'Verification email sent successfully',
            'success'
        );

    } catch (e) {

        showAlert(
            e.message || 'Failed to resend email'
        );

    } finally {

        resendBtn.disabled = false;

        resendSpinner.classList.add('d-none');

        resendText.innerText =
            'Resend Verification Email';
    }
}
</script>
@endpush
