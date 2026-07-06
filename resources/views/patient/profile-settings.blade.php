<?php $page = 'profile-settings'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Page Content -->
    <div class="content patient-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    @include('partials.patient-sidebar')
                    <!-- /Profile Sidebar -->

                </div>

                <div class="col-lg-8 col-xl-9">

                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom pb-3 mb-3">
                                <h5>{{ __('app.profile.title') }}</h5>
                            </div>
                            <form action="{{ route('patient.settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="setting-card">
                                    <label class="form-label mb-2">{{ __('app.profile.photo') }}</label>
                                    <div class="change-avatar img-upload">
                                        <div class="profile-img">
                                            <i class="fa-solid fa-file-image"></i>
                                        </div>
                                        <div class="upload-img">
                                            <div class="imgs-load d-flex align-items-center">
                                                <div class="change-photo">
                                                    {{ __('app.profile.upload_new') }}
                                                    <input type="file" name="image" class="upload">
                                                </div>
                                            </div>
                                            <p>{{ __('app.profile.image_limit') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="setting-title">
                                    <h6>{{ __('app.profile.information') }}</h6>
                                </div>
                                <div class="setting-card">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ $patient['name'] ?? '' }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.phone') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="phone" value="{{ $patient['phone'] ?? '' }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.email') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email" value="{{ $patient['email'] ?? '' }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        @php
                                            $dob = !empty($patient['dob'])
                                                ? \Carbon\Carbon::parse($patient['dob'])->format('Y-m-d')
                                                : '';
                                        @endphp

                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    {{ __('app.profile.dob') }}
                                                    <span class="text-danger">*</span>
                                                </label>

                                                <div class="form-icon">
                                                    <input type="date" class="form-control" name="dob"
                                                        value="{{ old('dob', $dob) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.gender') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="date" class="form-control" name="gender"
                                                        value="{{ $patient['gender'] ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.timezone') }} <span
                                                        class="text-danger">*</span></label>
                                                <select name="timezone" class="form-control" required>
                                                    <option value="">{{ __('app.profile.select_timezone') }}</option>
                                                    <!-- Americas -->
                                                    <optgroup label="Americas">
                                                        <option value="America/New_York"
                                                            {{ ($patient['timezone'] ?? '') == 'America/New_York' ? 'selected' : '' }}>
                                                            Eastern Time (US & Canada)</option>
                                                        <option value="America/Chicago"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Chicago' ? 'selected' : '' }}>
                                                            Central Time (US & Canada)</option>
                                                        <option value="America/Denver"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Denver' ? 'selected' : '' }}>
                                                            Mountain Time (US & Canada)</option>
                                                        <option value="America/Los_Angeles"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Los_Angeles' ? 'selected' : '' }}>
                                                            Pacific Time (US & Canada)</option>
                                                        <option value="America/Anchorage"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Anchorage' ? 'selected' : '' }}>
                                                            Alaska</option>
                                                        <option value="Pacific/Honolulu"
                                                            {{ ($patient['timezone'] ?? '') == 'Pacific/Honolulu' ? 'selected' : '' }}>
                                                            Hawaii</option>
                                                        <option value="America/Toronto"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Toronto' ? 'selected' : '' }}>
                                                            Toronto</option>
                                                        <option value="America/Mexico_City"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Mexico_City' ? 'selected' : '' }}>
                                                            Mexico City</option>
                                                        <option value="America/Bogota"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Bogota' ? 'selected' : '' }}>
                                                            Colombia</option>
                                                        <option value="America/Caracas"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Caracas' ? 'selected' : '' }}>
                                                            Venezuela</option>
                                                        <option value="America/Sao_Paulo"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Sao_Paulo' ? 'selected' : '' }}>
                                                            São Paulo</option>
                                                        <option value="America/Buenos_Aires"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Buenos_Aires' ? 'selected' : '' }}>
                                                            Buenos Aires</option>
                                                        <option value="America/Santiago"
                                                            {{ ($patient['timezone'] ?? '') == 'America/Santiago' ? 'selected' : '' }}>
                                                            Santiago</option>
                                                    </optgroup>
                                                    <!-- Europe -->
                                                    <optgroup label="Europe">
                                                        <option value="Europe/London"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/London' ? 'selected' : '' }}>
                                                            London (GMT/BST)</option>
                                                        <option value="Europe/Paris"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Paris' ? 'selected' : '' }}>
                                                            Central European Time</option>
                                                        <option value="Europe/Berlin"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Berlin' ? 'selected' : '' }}>
                                                            Berlin</option>
                                                        <option value="Europe/Amsterdam"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Amsterdam' ? 'selected' : '' }}>
                                                            Amsterdam</option>
                                                        <option value="Europe/Madrid"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Madrid' ? 'selected' : '' }}>
                                                            Madrid</option>
                                                        <option value="Europe/Rome"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Rome' ? 'selected' : '' }}>
                                                            Rome</option>
                                                        <option value="Europe/Vienna"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Vienna' ? 'selected' : '' }}>
                                                            Vienna</option>
                                                        <option value="Europe/Prague"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Prague' ? 'selected' : '' }}>
                                                            Prague</option>
                                                        <option value="Europe/Budapest"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Budapest' ? 'selected' : '' }}>
                                                            Budapest</option>
                                                        <option value="Europe/Warsaw"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Warsaw' ? 'selected' : '' }}>
                                                            Warsaw</option>
                                                        <option value="Europe/Stockholm"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Stockholm' ? 'selected' : '' }}>
                                                            Stockholm</option>
                                                        <option value="Europe/Oslo"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Oslo' ? 'selected' : '' }}>
                                                            Oslo</option>
                                                        <option value="Europe/Copenhagen"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Copenhagen' ? 'selected' : '' }}>
                                                            Copenhagen</option>
                                                        <option value="Europe/Dublin"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Dublin' ? 'selected' : '' }}>
                                                            Dublin</option>
                                                        <option value="Europe/Lisbon"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Lisbon' ? 'selected' : '' }}>
                                                            Lisbon</option>
                                                        <option value="Europe/Moscow"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Moscow' ? 'selected' : '' }}>
                                                            Moscow</option>
                                                        <option value="Europe/Istanbul"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Istanbul' ? 'selected' : '' }}>
                                                            Istanbul</option>
                                                        <option value="Europe/Athens"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Athens' ? 'selected' : '' }}>
                                                            Athens</option>
                                                        <option value="Europe/Helsinki"
                                                            {{ ($patient['timezone'] ?? '') == 'Europe/Helsinki' ? 'selected' : '' }}>
                                                            Helsinki</option>
                                                    </optgroup>
                                                    <!-- Africa -->
                                                    <optgroup label="Africa">
                                                        <option value="Africa/Cairo"
                                                            {{ ($patient['timezone'] ?? '') == 'Africa/Cairo' ? 'selected' : '' }}>
                                                            Cairo</option>
                                                        <option value="Africa/Johannesburg"
                                                            {{ ($patient['timezone'] ?? '') == 'Africa/Johannesburg' ? 'selected' : '' }}>
                                                            Johannesburg</option>
                                                        <option value="Africa/Lagos"
                                                            {{ ($patient['timezone'] ?? '') == 'Africa/Lagos' ? 'selected' : '' }}>
                                                            Lagos</option>
                                                        <option value="Africa/Nairobi"
                                                            {{ ($patient['timezone'] ?? '') == 'Africa/Nairobi' ? 'selected' : '' }}>
                                                            Nairobi</option>
                                                        <option value="Africa/Casablanca"
                                                            {{ ($patient['timezone'] ?? '') == 'Africa/Casablanca' ? 'selected' : '' }}>
                                                            Casablanca</option>
                                                    </optgroup>
                                                    <!-- Middle East -->
                                                    <optgroup label="Middle East">
                                                        <option value="Asia/Dubai"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Dubai' ? 'selected' : '' }}>
                                                            Dubai (Gulf Standard Time)</option>
                                                        <option value="Asia/Baghdad"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Baghdad' ? 'selected' : '' }}>
                                                            Baghdad</option>
                                                        <option value="Asia/Jerusalem"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Jerusalem' ? 'selected' : '' }}>
                                                            Jerusalem</option>
                                                        <option value="Asia/Tehran"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Tehran' ? 'selected' : '' }}>
                                                            Tehran</option>
                                                    </optgroup>
                                                    <!-- Asia -->
                                                    <optgroup label="Asia">
                                                        <option value="Asia/Kolkata"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Kolkata' ? 'selected' : '' }}>
                                                            India Standard Time</option>
                                                        <option value="Asia/Bangkok"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Bangkok' ? 'selected' : '' }}>
                                                            Indochina Time</option>
                                                        <option value="Asia/Ho_Chi_Minh"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Ho_Chi_Minh' ? 'selected' : '' }}>
                                                            Ho Chi Minh City</option>
                                                        <option value="Asia/Hong_Kong"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Hong_Kong' ? 'selected' : '' }}>
                                                            Hong Kong</option>
                                                        <option value="Asia/Singapore"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Singapore' ? 'selected' : '' }}>
                                                            Singapore</option>
                                                        <option value="Asia/Tokyo"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Tokyo' ? 'selected' : '' }}>
                                                            Tokyo</option>
                                                        <option value="Asia/Seoul"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Seoul' ? 'selected' : '' }}>
                                                            Seoul</option>
                                                        <option value="Asia/Shanghai"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Shanghai' ? 'selected' : '' }}>
                                                            Shanghai</option>
                                                        <option value="Asia/Manila"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Manila' ? 'selected' : '' }}>
                                                            Manila</option>
                                                        <option value="Asia/Kuala_Lumpur"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Kuala_Lumpur' ? 'selected' : '' }}>
                                                            Kuala Lumpur</option>
                                                        <option value="Asia/Karachi"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Karachi' ? 'selected' : '' }}>
                                                            Karachi</option>
                                                        <option value="Asia/Kathmandu"
                                                            {{ ($patient['timezone'] ?? '') == 'Asia/Kathmandu' ? 'selected' : '' }}>
                                                            Kathmandu</option>
                                                    </optgroup>
                                                    <!-- Oceania -->
                                                    <optgroup label="Oceania">
                                                        <option value="Australia/Sydney"
                                                            {{ ($patient['timezone'] ?? '') == 'Australia/Sydney' ? 'selected' : '' }}>
                                                            Sydney</option>
                                                        <option value="Australia/Melbourne"
                                                            {{ ($patient['timezone'] ?? '') == 'Australia/Melbourne' ? 'selected' : '' }}>
                                                            Melbourne</option>
                                                        <option value="Australia/Brisbane"
                                                            {{ ($patient['timezone'] ?? '') == 'Australia/Brisbane' ? 'selected' : '' }}>
                                                            Brisbane</option>
                                                        <option value="Australia/Perth"
                                                            {{ ($patient['timezone'] ?? '') == 'Australia/Perth' ? 'selected' : '' }}>
                                                            Perth</option>
                                                        <option value="Pacific/Auckland"
                                                            {{ ($patient['timezone'] ?? '') == 'Pacific/Auckland' ? 'selected' : '' }}>
                                                            New Zealand</option>
                                                        <option value="Pacific/Fiji"
                                                            {{ ($patient['timezone'] ?? '') == 'Pacific/Fiji' ? 'selected' : '' }}>
                                                            Fiji</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-btn text-end">
                                    <a href="#"
                                        class="btn btn-md btn-light rounded-pill">{{ __('app.common.cancel') }}</a>
                                    <button type="submit"
                                        class="btn btn-md btn-primary-gradient rounded-pill">{{ __('app.profile.save_changes') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom pb-3 mb-3">
                                <h5>{{ __('app.profile.medical_information') }}</h5>
                            </div>
                            <form action="{{ route('patient.settings.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="setting-card">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.blood_group') }}</label>
                                                <select name="bloodGroup" class="form-control">
                                                    <option value="">{{ __('app.profile.select_blood_group') }}
                                                    </option>
                                                    @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bloodGroup)
                                                        <option value="{{ $bloodGroup }}"
                                                            {{ ($patient['bloodGroup'] ?? '') == $bloodGroup ? 'selected' : '' }}>
                                                            {{ $bloodGroup }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.height') }}</label>
                                                <input type="text" name="height"
                                                    value="{{ $patient['height'] ?? '' }}"
                                                    placeholder="{{ __('app.profile.height_placeholder') }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.weight') }}</label>
                                                <input type="text" name="weight"
                                                    value="{{ $patient['weight'] ?? '' }}"
                                                    placeholder="{{ __('app.profile.weight_placeholder') }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.allergies') }}</label>
                                                <input type="text" name="allergies"
                                                    value="{{ $patient['allergies'] ?? '' }}"
                                                    placeholder="{{ __('app.profile.allergies_placeholder') }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label
                                                    class="form-label">{{ __('app.profile.medical_conditions') }}</label>
                                                <textarea name="medicalConditions" rows="3"
                                                    placeholder="{{ __('app.profile.medical_conditions_placeholder') }}" class="form-control">{{ $patient['medicalConditions'] ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-btn text-end">
                                    <button type="submit"
                                        class="btn btn-md btn-primary-gradient rounded-pill">{{ __('app.profile.save_changes') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if (($patient['provider'] ?? 'email') !== 'google')
                        <div class="card">
                            <div class="card-body">
                                <div class="border-bottom pb-3 mb-3">
                                    <h5>{{ __('app.profile.change_password') }}</h5>
                                </div>
                                <form action="{{ route('patient.settings.changepassword') }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.current_password') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="pass-group">
                                                    <input type="password" name="current_password"
                                                        class="form-control pass-input-cur">
                                                    <span class="feather-eye-off toggle-password-cur"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.new_password') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="pass-group">
                                                    <input type="password" name="password"
                                                        class="form-control pass-input">
                                                    <span class="feather-eye-off toggle-password"></span>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">{{ __('app.profile.confirm_password') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="pass-group">
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control pass-input-sub">
                                                    <span class="feather-eye-off toggle-password-sub"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-btn border-top pt-3 text-end">
                                        <a href="#"
                                            class="btn btn-md btn-light rounded-pill">{{ __('app.common.cancel') }}</a>
                                        <button type="submit"
                                            class="btn btn-md btn-primary-gradient rounded-pill">{{ __('app.profile.save_changes') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
    <style>
        .toggle-password-cur {
            font-size: 16px;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            color: var(--gray-600);
            cursor: pointer;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <!-- /Page Content -->
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // For Current Password
            const toggleCurrent = document.querySelector('.toggle-password-cur');
            const currentInput = document.querySelector('.pass-input-cur');

            if (toggleCurrent && currentInput) {
                toggleCurrent.addEventListener('click', function() {
                    const type = currentInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    currentInput.setAttribute('type', type);
                    this.classList.toggle('feather-eye');
                    this.classList.toggle('feather-eye-off');
                });
            }

            // For New Password
            const toggleNew = document.querySelector('.toggle-password');
            const newInput = document.querySelector('.pass-input');

            if (toggleNew && newInput) {
                toggleNew.addEventListener('click', function() {
                    const type = newInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    newInput.setAttribute('type', type);
                    this.classList.toggle('feather-eye');
                    this.classList.toggle('feather-eye-off');
                });
            }

            // For Confirm Password
            const toggleConfirm = document.querySelector('.toggle-password-sub');
            const confirmInput = document.querySelector('.pass-input-sub');

            if (toggleConfirm && confirmInput) {
                toggleConfirm.addEventListener('click', function() {
                    const type = confirmInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmInput.setAttribute('type', type);
                    this.classList.toggle('feather-eye');
                    this.classList.toggle('feather-eye-off');
                });
            }
        });
    </script>
@endPush
