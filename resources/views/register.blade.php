<?php $page = 'register'; ?>

@extends('layouts.mainlayout')

@section('content')
    <div class="content container-fluid">

        <div class="row">

            <div class="col-md-12 col-lg-10 offset-lg-1">

                <div class="account-content">


                    <div class="col-md-7 col-lg-7 login-left">

                        <img src="{{ asset('build/img/patient-register.jpeg') }}" class="img-fluid"
                            alt="{{ __('app.doctor_register.image_alt') }}">

                    </div>

                    <div class="col-md-12 col-lg-5 login-right">

                        <div class="login-header">

                            <h3 class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <span></span>

                                <span class="d-flex align-items-center gap-2">
                                    <small>{{ __('app.register.are_you_physician') }}</small>

                                    <a href="{{ url('doctor-register') }}" class="btn btn-outline-primary btn-sm">
                                        {{ __('app.register.join_network') }}
                                    </a>
                                </span>
                            </h3>

                        </div>

                        <form id="patientRegisterForm">

                            @csrf
                            @method('POST')

                            <input type="hidden" name="timezone" id="timezone">

                            <div class="mb-3">

                                <label class="form-label">
                                    {{ __('app.common.name') }}
                                </label>

                                <input type="text" placeholder="{{ __('app.doctor_register.name') }}" name="name" class="form-control"
                                    value="{{ old('name') }}" required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    {{ __('app.common.email') }}
                                </label>

                                <input type="email" placeholder="{{ __('app.common.email') }}" name="email" class="form-control"
                                    value="{{ old('email') }}" required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    {{ __('app.common.phone') }}
                                </label>

                                <input class="form-control form-control-lg group_formcontrol form-control-phone"
                                    id="Userphone" name="phone" type="text" value="{{ old('phone') }}" required>
                                <input type="hidden" name="country_code" id="country_code">

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    {{ __('app.profile.dob') }}
                                </label>

                                <input class="form-control" name="dob" type="date" value="{{ old('dob') }}"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">
                                    {{ __('app.profile.gender') }}
                                </label>

                                <select class="form-control" name="gender" required>

                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>
                                        {{ __('app.profile.male') }}
                                    </option>

                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>
                                        {{ __('app.profile.female') }}
                                    </option>

                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>
                                        {{ __('app.profile.other') }}
                                    </option>

                                </select>

                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('app.country_of_residence.label') }}</label>
                                @include('partials.country-select', [
                                    'name' => 'countryOfResidence',
                                    'selected' => old('countryOfResidence'),
                                    'required' => true,
                                    'placeholder' => __('app.country_of_residence.select'),
                                ])
                                <small class="text-muted">{{ __('app.country_of_residence.hint') }}</small>
                            </div>

                            <div class="mb-3">

                                <div class="form-group-flex">

                                    <label class="form-label">
                                        {{ __('app.doctor_register.password') }}
                                    </label>

                                </div>

                                <div class="pass-group">

                                    <input type="password" class="form-control pass-input" name="password" required>

                                    <span class="feather-eye-off toggle-password"></span>

                                </div>

                            </div>

                            <div class="mb-3">

                                <div class="form-group-flex">

                                    <label class="form-label">
                                        {{ __('app.doctor_register.confirm_password') }}
                                    </label>

                                </div>

                                <div class="pass-group">

                                    <input type="password" class="form-control pass-input" name="password_confirmation"
                                        required>

                                    <span class="feather-eye-off toggle-password"></span>

                                </div>

                            </div>

                            <div class="mb-3">

                                <button class="btn btn-primary-gradient w-100" type="submit" id="registerBtn">

                                    <span id="registerSpinner" class="spinner-border spinner-border-sm d-none me-2"></span>

                                    <span id="registerText">
                                        {{ __('app.doctor_register.sign_up') }}
                                    </span>

                                </button>

                            </div>

                            <div class="login-or">

                                <span class="or-line"></span>
                                <span class="span-or">{{ __('app.login.or') }}</span>

                            </div>

                            <div class="social-login-btn">

                                <button type="button" id="googleRegisterBtn" class="btn w-100">

                                    <img src="{{ URL::asset('build/img/icons/google-icon.svg') }}" alt="google-icon">

                                    {{ __('app.login.sign_in_google') }}

                                </button>

                            </div>

                            <div class="account-signup">

                                <p>
                                    {{ __('app.doctor_register.already_account') }}
                                    <a href="{{ url('login') }}">
                                        {{ __('app.doctor_register.sign_in') }}
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
            background: #f6fafd;
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
        const phoneInput = document.querySelector("#Userphone");

        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "auto",
            separateDialCode: true,
            preferredCountries: ["us"],
            geoIpLookup: function(callback) {

                fetch("https://ipinfo.io/json?token=")
                    .then((res) => res.json())
                    .then((data) => {
                        console.log(data);
                        callback(data.country?.toLowerCase() || "us");
                    })
                    .catch(() => {
                        callback("us");
                    });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        document.getElementById('timezone').value =
            Intl.DateTimeFormat().resolvedOptions().timeZone;

        async function parseJsonResponse(response) {
            const contentType = response.headers.get('content-type') || '';

            if (contentType.includes('application/json')) {
                return await response.json();
            }

            const text = await response.text();

            throw new Error(
                text ?
                @json(__('app.doctor_register.server_unexpected_response')) :
                @json(__('app.register.server_empty_response'))
            );
        }

        async function firebasePatientRegister(formData) {
            const btn = document.getElementById('registerBtn');

            const spinner =
                document.getElementById('registerSpinner');

            const text =
                document.getElementById('registerText');

            btn.disabled = true;

            spinner.classList.remove('d-none');

            text.innerText = @json(__('app.doctor_register.creating_account'));

            try {

                const response = await fetch(
                    "{{ route('patient-register') }}", {
                        method: 'POST',

                        headers: {
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]'
                            ).getAttribute('content'),

                            'Accept': 'application/json',
                        },

                        body: formData
                    }
                );

                const data = await parseJsonResponse(response);

                if (!response.ok) {

                    let message = @json(__('app.doctor_register.registration_failed'));

                    if (data.errors) {

                        message = Object.values(data.errors)
                            .flat()
                            .join('<br>');
                    } else if (data.message) {

                        message = data.message;
                    }

                    showAlert(message);

                    btn.disabled = false;

                    spinner.classList.add('d-none');

                    text.innerText = @json(__('app.doctor_register.sign_up'));

                    return;
                }

                const userCredential =
                    await auth.signInWithEmailAndPassword(
                        data.email,
                        data.password
                    );

                await fetch('/api/auth/send-verification-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ email: data.email })
                });

                await auth.signOut();

                showAlert(
                    @json(__('app.register.registration_success')),
                    'success'
                );

                setTimeout(() => {

                    window.location.href = '/login';

                }, 1500);

            } catch (error) {

                console.error(error);

                showAlert(
                    error.message || @json(__('app.doctor_register.something_wrong'))
                );

                btn.disabled = false;

                spinner.classList.add('d-none');

                text.innerText = @json(__('app.doctor_register.sign_up'));
            }
        }

        // Country of residence: follows the phone number's country until the patient picks one.
        const residenceSelect = document.getElementById('countryOfResidence');
        let residenceTouched = !!residenceSelect.value;
        residenceSelect.addEventListener('change', () => residenceTouched = true);
        function syncResidenceFromPhone() {
            const iso2 = iti.getSelectedCountryData()?.iso2;
            if (!residenceTouched && iso2) residenceSelect.value = iso2.toUpperCase();
        }
        phoneInput.addEventListener('countrychange', syncResidenceFromPhone);
        syncResidenceFromPhone();

        document
            .getElementById('patientRegisterForm')
            .addEventListener('submit', function(e) {

                e.preventDefault();

                firebasePatientRegister(new FormData(this));
            });

        document
            .getElementById('googleRegisterBtn')
            .addEventListener('click', async function() {

                try {

                    const provider =
                        new firebase.auth.GoogleAuthProvider();

                    const result =
                        await auth.signInWithPopup(provider);

                    const user = result.user;

                    const token =
                        await user.getIdToken();

                    const response = await fetch(
                        "{{ route('google-patient-register') }}", {
                            method: 'POST',

                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',

                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]'
                                ).getAttribute('content')
                            },

                            body: JSON.stringify({
                                token: token
                            })
                        }
                    );

                    const data = await parseJsonResponse(response);

                    if (!response.ok) {

                        showAlert(
                            data.message || @json(__('app.register.google_failed'))
                        );

                        return;
                    }

                    showAlert(
                        @json(__('app.register.account_created')),
                        'success'
                    );

                    setTimeout(() => {

                        window.location.href =
                            data.redirect || '/patient/dashboard';

                    }, 1000);

                } catch (error) {

                    console.error(error);

                    showAlert(
                        error.message || @json(__('app.register.google_failed'))
                    );
                }

            });
    </script>
@endpush
