<?php $page = 'doctor-register'; ?>
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
                                    <h3>Doctor Register <a href="{{ route('register') }}">Not a Doctor?</a></h3>
                                </div>
                                <form id="doctorRegisterForm" enctype="multipart/form-data">
                                        @csrf
                                    @method('POST')
                                    <input type="hidden" name="timezone" id="timezone">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>

                                        <input
                                            type="text"
                                            name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}"
                                            required
                                        >

                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>

                                        <input
                                            type="email"
                                            name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email') }}"
                                            required
                                        >

                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Phone</label>

                                        <input
                                            class="form-control group_formcontrol form-control-phone @error('phone') is-invalid @enderror"
                                            id="Userphone"
                                            name="phone"
                                            type="text"
                                            value="{{ old('phone') }}"
                                        >

                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Medical License Number</label>

                                        <input
                                            type="text"
                                            name="license_number"
                                            class="form-control @error('license_number') is-invalid @enderror"
                                            value="{{ old('license_number') }}"
                                            required
                                        >

                                        @error('license_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Qualification</label>

                                        <select
                                            name="qualification"
                                            class="form-control @error('qualification') is-invalid @enderror"
                                            required
                                        >
                                            <option value="">Select Qualification</option>

                                            @foreach(['MBBS','MD','MS','DM','MCH','DNB','PHD'] as $qualification)

                                                <option
                                                    value="{{ $qualification }}"
                                                    {{ old('qualification') == $qualification ? 'selected' : '' }}
                                                >
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

                                    <div class="mb-3">
                                        <label class="form-label">Years of Experience</label>

                                        <select
                                            name="experience"
                                            class="form-control @error('experience') is-invalid @enderror"
                                            required
                                        >
                                            <option value="">Select Experience</option>

                                            @foreach([
                                                '0-2 years',
                                                '3-5 years',
                                                '6-10 years',
                                                '11-15 years',
                                                '15+ years'
                                            ] as $experience)

                                                <option
                                                    value="{{ $experience }}"
                                                    {{ old('experience') == $experience ? 'selected' : '' }}
                                                >
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

                                    <div class="mb-3">
                                        <label class="form-label">Specializations</label>

                                        <select
                                            name="specializations[]"
                                            class="form-control select2 @error('specializations') is-invalid @enderror"
                                            multiple
                                            required
                                        >
                                            @foreach($specializations as $spec)

                                                <option
                                                    value="{{ $spec['id'] }}"
                                                    {{ collect(old('specializations'))->contains($spec['id']) ? 'selected' : '' }}
                                                >
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

                                    <div class="mb-3">
                                        <label class="form-label">Create Password</label>

                                        <input
                                            type="password"
                                            name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            required
                                        >

                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>

                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            class="form-control"
                                            required
                                        >
                                    </div>

                                    <hr>

                                    <h5 class="text-primary fw-bold mb-3">Required Documents</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Medical License</label>

                                        <input
                                            type="file"
                                            name="medical_license"
                                            class="form-control @error('medical_license') is-invalid @enderror"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            required
                                        >

                                        @error('medical_license')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Degree Certificate</label>

                                        <input
                                            type="file"
                                            name="degree_certificate"
                                            class="form-control @error('degree_certificate') is-invalid @enderror"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            required
                                        >

                                        @error('degree_certificate')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">ID Proof</label>

                                        <input
                                            type="file"
                                            name="id_proof"
                                            class="form-control @error('id_proof') is-invalid @enderror"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                            required
                                        >

                                        @error('id_proof')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Clinic Registration</label>

                                        <input
                                            type="file"
                                            name="clinic_registration"
                                            class="form-control @error('clinic_registration') is-invalid @enderror"
                                            accept=".jpg,.jpeg,.png,.pdf"
                                        >

                                        @error('clinic_registration')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary-gradient w-100" type="submit" id="registerBtn">
                                            <span id="registerSpinner"
                                                class="spinner-border spinner-border-sm d-none me-2">
                                            </span>

                                            <span id="registerText">
                                                Sign Up
                                            </span>

                                        </button>
                                    </div>

                                    <div class="account-signup">
                                        <p>
                                            Already have account?
                                            <a href="{{ url('login') }}">Sign In</a>
                                        </p>
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
    $(document).ready(function () {

        $('.select2').select2({
            placeholder: "Select Specializations",
            allowClear: true,
            width: '100%'
        });

        document.getElementById('timezone').value =
            Intl.DateTimeFormat().resolvedOptions().timeZone;
    });
</script>
<script>
const phoneInput = document.querySelector("#Userphone");

const iti = window.intlTelInput(phoneInput, {
    initialCountry: "auto",
    separateDialCode: true,
    utilsScript:
        "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
});
async function parseJsonResponse(response)
{
    const contentType = response.headers.get('content-type') || '';

    if (contentType.includes('application/json')) {
        return await response.json();
    }

    const text = await response.text();
    const match = text.match(/<title>(.*?)<\/title>/i);
    const title = match ? match[1].trim() : '';

    throw new Error(
        title
            ? `Server error: ${title}`
            : 'Server returned an unexpected response. Check the Laravel logs for details.'
    );
}

async function firebaseDoctorRegister(formData) {

    const btn = document.getElementById('registerBtn');
    const spinner = document.getElementById('registerSpinner');
    const text = document.getElementById('registerText');

    btn.disabled = true;
    spinner.classList.remove('d-none');
    text.innerText = 'Creating account...';

    try {

        const response = await fetch("{{ route('doctor-register') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: formData
        });

        const data = await parseJsonResponse(response);

        if (!response.ok) {

            let message = 'Registration failed';

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
            text.innerText = 'Sign Up';

            return;
        }

        // SIGN IN EXISTING USER
        const userCredential = await auth.signInWithEmailAndPassword(
            data.email,
            data.password
        );

        // SEND FIREBASE EMAIL
        await userCredential.user.sendEmailVerification();

        // LOGOUT AFTER EMAIL SENT
        await auth.signOut();

        showAlert(
            'Registration successful. Your account is pending verification by our team. You will receive an email once your account is verified..',
            'success'
        );

        setTimeout(() => {
            window.location.href = '/login';
        }, 1500);

    } catch (error) {

        console.error(error);

        showAlert(error.message || 'Something went wrong');

        btn.disabled = false;
        spinner.classList.add('d-none');
        text.innerText = 'Sign Up';
    }
}

document.getElementById('doctorRegisterForm')
    .addEventListener('submit', function(e) {

        e.preventDefault();

        const formData = new FormData(this);
        const countryData = iti.getSelectedCountryData();

        formData.append('practiceCountry', countryData.iso2.toUpperCase());

        firebaseDoctorRegister(formData);
});

</script>

@endpush
