<?php $page = 'doctor-register'; ?>
<link rel="stylesheet" href="{{ URL::asset('build/plugins/intltelinput/css/intlTelInput.css') }}">
<link rel="stylesheet" href="{{ URL::asset('build/plugins/intltelinput/css/demo.css') }}">
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content container-fluid">

        <div class="row">
            <div class="col-12">

                <!-- Login Tab Content -->
                <div class="account-content">
                    <div class="col-md-6 col-lg-5 login-left">
                        <img src="{{ asset('build/img/doctor-register.jpeg') }}" class="img-fluid"
                            alt="{{ __('app.doctor_register.image_alt') }}">
                    </div>
                    <div class="col-md-6 col-lg-7 login-right">
                        <div class="login-header">
                            <h3 class="text-primary">{{ __('app.doctor_register.title') }} <a href="{{ route('register') }}">{{ __('app.doctor_register.not_doctor') }}</a></h3>
                            <p>{{ __('app.doctor_register.subtitle') }}</p>
                        </div>
                        <form id="doctorRegisterForm" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="timezone" id="timezone">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.name') }}</label>

                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                        required>

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.email') }}</label>

                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" required>

                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">{{ __('app.doctor_register.phone') }}</label>

                                    <input
                                        class="form-control form-control-lg group_formcontrol form-control-phone @error('phone') is-invalid @enderror"
                                        id="Userphone" name="phone" type="text" value="{{ old('phone') }}">
                                    <input type="hidden" name="country_code" id="country_code">


                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.practice_country') }}</label>

                                    <select name="practiceCountry" id="practiceCountry"
                                        class="form-control @error('practiceCountry') is-invalid @enderror" required>
                                        <option value="">{{ __('app.doctor_register.select_country') }}</option>
                                    </select>

                                    @error('practiceCountry')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.license_number') }}</label>

                                    <input type="text" name="licenseNumber"
                                        class="form-control @error('licenseNumber') is-invalid @enderror"
                                        value="{{ old('licenseNumber') }}" required>

                                    @error('licenseNumber')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.qualification') }}</label>

                                    <select name="qualification"
                                        class="form-control @error('qualification') is-invalid @enderror" required>
                                        <option value="">{{ __('app.doctor_register.select_qualification') }}</option>

                                        @foreach (['MBBS', 'MD', 'MS', 'DM', 'MCH', 'DNB', 'PHD'] as $qualification)
                                            <option value="{{ $qualification }}"
                                                {{ old('qualification') == $qualification ? 'selected' : '' }}>
                                                {{ $qualification }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('qualification')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.experience') }}</label>

                                    <select name="experience" class="form-control @error('experience') is-invalid @enderror"
                                        required>
                                        <option value="">{{ __('app.doctor_register.select_experience') }}</option>

                                        @foreach (['0-2 years', '3-5 years', '6-10 years', '11-15 years', '15+ years'] as $experience)
                                            <option value="{{ $experience }}"
                                                {{ old('experience') == $experience ? 'selected' : '' }}>
                                                {{ $experience }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('experience')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.specializations') }}</label>

                                    <select name="specializations[]"
                                        class="form-control select2 @error('specializations') is-invalid @enderror" multiple
                                        required>
                                        @foreach ($specializations as $spec)
                                            <option value="{{ $spec['name'] }}"
                                                {{ collect(old('specializations'))->contains($spec['name']) ? 'selected' : '' }}>
                                                {{ $spec['name'] }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('specializations')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.password') }}</label>

                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" required>

                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.confirm_password') }}</label>

                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <hr>

                                <h5 class="text-primary fw-bold mb-3">{{ __('app.doctor_register.required_documents') }}</h5>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.medical_license') }}</label>

                                    <input type="file" name="medical_license"
                                        class="form-control @error('medical_license') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.pdf" required>

                                    @error('medical_license')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.degree_certificate') }}</label>

                                    <input type="file" name="degree_certificate"
                                        class="form-control @error('degree_certificate') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.pdf" required>

                                    @error('degree_certificate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.id_proof') }}</label>

                                    <input type="file" name="id_proof"
                                        class="form-control @error('id_proof') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.pdf" required>

                                    @error('id_proof')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">{{ __('app.doctor_register.clinic_registration') }}</label>

                                    <input type="file" name="clinic_registration"
                                        class="form-control @error('clinic_registration') is-invalid @enderror"
                                        accept=".jpg,.jpeg,.png,.pdf">

                                    @error('clinic_registration')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <button class="btn btn-primary-gradient w-100" type="submit" id="registerBtn">
                                        <span id="registerSpinner" class="spinner-border spinner-border-sm d-none me-2">
                                        </span>

                                        <span id="registerText">
                                            {{ __('app.doctor_register.sign_up') }}
                                        </span>

                                    </button>
                                </div>

                                <div class="account-signup">
                                    <p>
                                        {{ __('app.doctor_register.already_account') }}
                                        <a href="{{ url('login') }}">{{ __('app.doctor_register.sign_in') }}</a>
                                    </p>
                                </div>
                        </form>
                    </div>

                    <!-- /Login Tab Content -->

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
    <!-- /Page Content -->
@endsection
@push('scripts')
    <script src="{{ URL::asset('build/plugins/intltelinput/js/intlTelInput.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('.select2').select2({
                placeholder: @json(__('app.doctor_register.select_specializations')),
                allowClear: true,
                width: '100%'
            });

            document.getElementById('timezone').value =
                Intl.DateTimeFormat().resolvedOptions().timeZone;

            // Populate practice country dropdown using intlTelInput data
            const practiceCountrySelect = document.getElementById('practiceCountry');
            const allCountries = window.intlTelInputGlobals.getCountryData();
            const oldPracticeCountry = "{{ old('practiceCountry') }}";

            allCountries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.iso2.toUpperCase();
                option.text = country.name;
                if (oldPracticeCountry && oldPracticeCountry === country.iso2.toUpperCase()) {
                    option.selected = true;
                }
                practiceCountrySelect.appendChild(option);
            });
        });
    </script>
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
        const serverErrorPrefix = @json(__('app.doctor_register.server_error_prefix'));
        const serverUnexpectedResponse = @json(__('app.doctor_register.server_unexpected_response'));
        const registrationFailedText = @json(__('app.doctor_register.registration_failed'));
        const registrationSuccessText = @json(__('app.doctor_register.registration_success'));
        const somethingWrongText = @json(__('app.doctor_register.something_wrong'));
        const creatingAccountText = @json(__('app.doctor_register.creating_account'));
        const signUpText = @json(__('app.doctor_register.sign_up'));

        async function parseJsonResponse(response) {
            const contentType = response.headers.get('content-type') || '';

            if (contentType.includes('application/json')) {
                return await response.json();
            }

            const text = await response.text();
            const match = text.match(/<title>(.*?)<\/title>/i);
            const title = match ? match[1].trim() : '';

            throw new Error(
                title ?
                `${serverErrorPrefix}: ${title}` :
                serverUnexpectedResponse
            );
        }

        async function firebaseDoctorRegister(formData) {

            const btn = document.getElementById('registerBtn');
            const spinner = document.getElementById('registerSpinner');
            const text = document.getElementById('registerText');

            btn.disabled = true;
            spinner.classList.remove('d-none');
            text.innerText = creatingAccountText;

            try {

                const response = await fetch("{{ route('doctor-register') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await parseJsonResponse(response);

                if (!response.ok) {

                    let message = registrationFailedText;

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
                    text.innerText = signUpText;

                    return;
                }

                // SIGN IN EXISTING USER
                const userCredential = await auth.signInWithEmailAndPassword(
                    data.email,
                    data.password
                );

                // SEND CUSTOM BRANDED VERIFICATION EMAIL
                await fetch('/api/auth/send-verification-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        email: data.email
                    })
                });

                // LOGOUT AFTER EMAIL SENT
                await auth.signOut();

                showAlert(
                    registrationSuccessText,
                    'success'
                );

                setTimeout(() => {
                    window.location.href = '/login';
                }, 1500);

            } catch (error) {

                console.error(error);

                showAlert(error.message || somethingWrongText);

                btn.disabled = false;
                spinner.classList.add('d-none');
                text.innerText = signUpText;
            }
        }

        document.getElementById('doctorRegisterForm')
            .addEventListener('submit', function(e) {

                e.preventDefault();

                const formData = new FormData(this);
                const countryData = iti.getSelectedCountryData();

                // Set country_code from phone input
                if (countryData && countryData.dialCode) {
                    document.getElementById('country_code').value = countryData.dialCode;
                }

                firebaseDoctorRegister(formData);
            });
    </script>
@endpush
