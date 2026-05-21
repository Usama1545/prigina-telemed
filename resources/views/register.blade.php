<?php $page = 'register'; ?>

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

                            <div class="login-header">

                                <h3>
                                    Patient Register

                                    <a href="{{ url('doctor-register') }}">
                                        Are you a Doctor?
                                    </a>
                                </h3>

                            </div>

                            <form id="patientRegisterForm">

                                @csrf
                                @method('POST')

                                <input
                                    type="hidden"
                                    name="timezone"
                                    id="timezone"
                                >

                                <div class="mb-3">

                                    <label class="form-label">
                                        Name
                                    </label>

                                    <input
                                        type="text"
                                        placeholder="Full name"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name') }}"
                                        required
                                    >

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        placeholder="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email') }}"
                                        required
                                    >

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <input
                                        class="form-control form-control-lg group_formcontrol form-control-phone"
                                        id="Userphone"
                                        name="phone"
                                        type="text"
                                        value="{{ old('phone') }}"
                                        required
                                    >
                                    <input type="hidden" name="country_code" id="country_code">

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Date of Birth
                                    </label>

                                    <input
                                        class="form-control"
                                        name="dob"
                                        type="date"
                                        value="{{ old('dob') }}"
                                        required
                                    >

                                </div>

                                <div class="mb-3">

                                    <label class="form-label">
                                        Gender
                                    </label>

                                    <select
                                        class="form-control"
                                        name="gender"
                                        required
                                    >

                                        <option value="male"
                                            {{ old('gender') == 'male' ? 'selected' : '' }}>
                                            Male
                                        </option>

                                        <option value="female"
                                            {{ old('gender') == 'female' ? 'selected' : '' }}>
                                            Female
                                        </option>

                                        <option value="other"
                                            {{ old('gender') == 'other' ? 'selected' : '' }}>
                                            Other
                                        </option>

                                    </select>

                                </div>

                                <div class="mb-3">

                                    <div class="form-group-flex">

                                        <label class="form-label">
                                            Create Password
                                        </label>

                                    </div>

                                    <div class="pass-group">

                                        <input
                                            type="password"
                                            class="form-control pass-input"
                                            name="password"
                                            required
                                        >

                                        <span class="feather-eye-off toggle-password"></span>

                                    </div>

                                </div>

                                <div class="mb-3">

                                    <div class="form-group-flex">

                                        <label class="form-label">
                                            Confirm Password
                                        </label>

                                    </div>

                                    <div class="pass-group">

                                        <input
                                            type="password"
                                            class="form-control pass-input"
                                            name="password_confirmation"
                                            required
                                        >

                                        <span class="feather-eye-off toggle-password"></span>

                                    </div>

                                </div>

                                <div class="mb-3">

                                    <button
                                        class="btn btn-primary-gradient w-100"
                                        type="submit"
                                        id="registerBtn"
                                    >

                                        <span
                                            id="registerSpinner"
                                            class="spinner-border spinner-border-sm d-none me-2"
                                        ></span>

                                        <span id="registerText">
                                            Sign Up
                                        </span>

                                    </button>

                                </div>

                                <div class="login-or">

                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>

                                </div>

                                <div class="social-login-btn">

                                    <button
                                        type="button"
                                        id="googleRegisterBtn"
                                        class="btn w-100"
                                    >

                                        <img
                                            src="{{ URL::asset('build/img/icons/google-icon.svg') }}"
                                            alt="google-icon"
                                        >

                                        Sign in With Google

                                    </button>

                                </div>

                                <div class="account-signup">

                                    <p>
                                        Already have account?
                                        <a href="{{ url('login') }}">
                                            Sign In
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
const phoneInput = document.querySelector("#Userphone");

const iti = window.intlTelInput(phoneInput, {
    initialCountry: "auto",
    separateDialCode: true,
});
document.getElementById('timezone').value =
    Intl.DateTimeFormat().resolvedOptions().timeZone;

async function parseJsonResponse(response)
{
    const contentType = response.headers.get('content-type') || '';

    if (contentType.includes('application/json')) {
        return await response.json();
    }

    const text = await response.text();

    throw new Error(
        text
            ? 'Server returned an unexpected response. Check the Laravel logs for details.'
            : 'Server returned an empty response.'
    );
}

async function firebasePatientRegister(formData)
{
    const btn = document.getElementById('registerBtn');

    const spinner =
        document.getElementById('registerSpinner');

    const text =
        document.getElementById('registerText');

    btn.disabled = true;

    spinner.classList.remove('d-none');

    text.innerText = 'Creating account...';

    try {

        const response = await fetch(
            "{{ route('patient-register') }}",
            {
                method: 'POST',

                headers: {
                    'X-CSRF-TOKEN':
                        document.querySelector(
                            'meta[name="csrf-token"]'
                        ).getAttribute('content'),

                    'Accept': 'application/json',
                },

                body: formData
            }
        );

        const data = await parseJsonResponse(response);

        if (!response.ok) {

            let message = 'Registration failed';

            if (data.errors) {

                message = Object.values(data.errors)
                    .flat()
                    .join('<br>');
            }
            else if (data.message) {

                message = data.message;
            }

            showAlert(message);

            btn.disabled = false;

            spinner.classList.add('d-none');

            text.innerText = 'Sign Up';

            return;
        }

        const userCredential =
            await auth.signInWithEmailAndPassword(
                data.email,
                data.password
            );

        await userCredential.user.sendEmailVerification();

        await auth.signOut();

        showAlert(
            'Registration successful. Please verify your email before login.',
            'success'
        );

        setTimeout(() => {

            window.location.href = '/login';

        }, 1500);

    }
    catch (error) {

        console.error(error);

        showAlert(
            error.message || 'Something went wrong'
        );

        btn.disabled = false;

        spinner.classList.add('d-none');

        text.innerText = 'Sign Up';
    }
}

document
    .getElementById('patientRegisterForm')
    .addEventListener('submit', function(e) {

        e.preventDefault();

        const formData = new FormData(this);
        const countryData = iti.getSelectedCountryData();

        formData.append('practiceCountry', countryData.iso2.toUpperCase());

        firebasePatientRegister(formData);
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
                "{{ route('google-patient-register') }}",
                {
                    method: 'POST',

                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',

                        'X-CSRF-TOKEN':
                            document.querySelector(
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
                    data.message || 'Google signup failed'
                );

                return;
            }

            showAlert(
                'Account created successfully',
                'success'
            );

            setTimeout(() => {

                window.location.href =
                    data.redirect || '/patient/dashboard';

            }, 1000);

        }
        catch (error) {

            console.error(error);

            showAlert(
                error.message || 'Google signup failed'
            );
        }

});

</script>

@endpush
