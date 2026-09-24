<?php $page = 'login'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container container-fluid">
            <div class="row">
                <div class="col-md-7 col-lg-6 login-left">
                    <img src="{{ URL::asset('build/img/login-banner.png') }}" class="img-fluid"
                        alt="{{ __('app.doctor_register.image_alt') }}">
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
                            {{ __('app.auth.verify_email') }}
                        </h2>

                        <p class="text-muted mb-4">

                            {{ __('app.verify_email.sent_desc') }}

                        </p>

                    </div>
                    <div class="alert alert-warning">

                        <strong>{{ __('app.verify_email.not_verified') }}</strong>

                        <ul class="mb-0 mt-2">
                            <li>{{ __('app.verify_email.tip_spam') }}</li>
                            <li>{{ __('app.verify_email.tip_promotions') }}</li>
                            <li>{{ __('app.verify_email.tip_wait') }}</li>
                        </ul>

                    </div>
                    <button
                        id="resendBtn"
                        class="btn btn-primary-gradient w-100 mb-3"
                        onclick="resendVerificationEmail()"
                    >

                        <span id="resendText">
                            {{ __('app.auth.resend_verification') }}
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
                        {{ __('app.verify_email.back_to_login') }}
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

        resendText.innerText = @json(__('app.verify_email.sending'));

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
                data.message || @json(__('app.verify_email.resend_failed'))
            );
        }

        showAlert(
            @json(__('app.verify_email.resend_success')),
            'success'
        );

    } catch (e) {

        showAlert(
            e.message || @json(__('app.verify_email.resend_failed'))
        );

    } finally {

        resendBtn.disabled = false;

        resendSpinner.classList.add('d-none');

        resendText.innerText =
            @json(__('app.auth.resend_verification'));
    }
}
</script>
@endpush
