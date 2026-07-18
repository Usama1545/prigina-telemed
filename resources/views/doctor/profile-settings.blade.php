<?php $page = 'doctor-profile-settings'; ?>
@extends('layouts.mainlayout')
@section('content')

    <!-- Page Content -->
    <div class="content doctor-content">
        <div class="container doc-container">

            <div class="row">
                <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Profile Sidebar -->
                    @include('partials.doctor-sidebar')
                    <!-- /Profile Sidebar -->

                </div>
                <div class="col-lg-8 col-xl-9">

                    <!-- Profile Settings -->
                    <div class="dashboard-header">
                        <h3>{{ __('app.profile.title') }}</h3>
                    </div>

                    {{-- Availability (mobile only, sidebar switch is hidden below lg) --}}
                    <div class="doctor-availability-card d-lg-none">
                        <label class="form-label">
                            {{ __('app.doctor_sidebar.availability') }}
                        </label>

                        @php $isAvailable = current_user()['available'] ?? true; @endphp

                        <select class="form-select modern-select availability-select"
                            data-url="{{ route('doctor.toggle-availability') }}" data-token="{{ csrf_token() }}">
                            <option value="1" {{ $isAvailable ? 'selected' : '' }}>
                                {{ __('app.doctor_sidebar.available_now') }}</option>
                            <option value="0" {{ !$isAvailable ? 'selected' : '' }}>
                                {{ __('app.doctor_sidebar.not_available') }}</option>
                        </select>
                    </div>

                    <div class="setting-title">
                        <h5>{{ __('app.profile.photo') }}</h5>
                    </div>

                    <form action="{{ route('doctor.settings.update') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('POST')
                        <input type="hidden" name="timezone" id="timezone">
                        <!-- Profile Image -->
                        <div class="setting-card bg-white">
                            <label class="form-label mb-2">{{ __('app.profile.photo') }}</label>
                            <div class="change-avatar img-upload">
                                <div class="profile-img">
                                    <i class="fa-solid fa-file-image"></i>
                                </div>
                                <div class="upload-img">
                                    <div class="imgs-load d-flex align-items-center">
                                        <div class="change-photo">
                                            {{ __('app.profile.upload_new') }}
                                            <input type="file" name="image" class="upload"
                                                accept=".jpg,.jpeg,.png,.webp">
                                        </div>
                                    </div>
                                    <p>{{ __('app.profile.image_limit') }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Details -->
                        <div class="setting-title">
                            <h5>{{ __('app.profile.personal_details') }}</h5>
                        </div>

                        <div class="setting-card bg-white">

                            <div class="row">

                                <!-- Name -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.name') }} <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', current_user()['name'] ?? '') }}" required>

                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.email_address') }} <span class="text-danger">*</span>
                                        </label>

                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', current_user()['email'] ?? '') }}" disabled>

                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.phone') }} <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', current_user()['phone'] ?? '') }}" required>

                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.bio') }}
                                        </label>

                                        @php
                                            $bioRaw = old('bio', current_user()['bio'] ?? '');
                                            $bioValues = is_array($bioRaw) ? $bioRaw : ['en' => $bioRaw];
                                            $bioLanguages = [
                                                'en' => __('app.profile.bio_lang_en'),
                                                'es' => __('app.profile.bio_lang_es'),
                                                'fr' => __('app.profile.bio_lang_fr'),
                                                'ar' => __('app.profile.bio_lang_ar'),
                                            ];
                                        @endphp

                                        <select class="form-control mb-2" id="bioLanguageSelect">
                                            @foreach ($bioLanguages as $code => $label)
                                                <option value="{{ $code }}">{{ $label }}</option>
                                            @endforeach
                                        </select>

                                        @foreach ($bioLanguages as $code => $label)
                                            <textarea name="bio[{{ $code }}]" class="form-control bio-textarea"
                                                data-lang="{{ $code }}"
                                                style="{{ $code !== 'en' ? 'display:none;' : '' }}"
                                                placeholder="{{ __('app.profile.bio_placeholder') }}">{{ $bioValues[$code] ?? '' }}</textarea>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Education & License Details -->
                        <div class="setting-title">
                            <h5>{{ __('app.profile.education_license_details') }}</h5>
                        </div>

                        <div class="setting-card bg-white">

                            <div class="row">

                                <!-- License -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.license_number') }}
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="licenseNumber" class="form-control"
                                            value="{{ old('licenseNumber', current_user()['licenseNumber'] ?? '') }}"
                                            required>

                                    </div>
                                </div>

                                <!-- Qualification -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.qualification') }} <span class="text-danger">*</span>
                                        </label>

                                        <select name="qualification" class="form-control" required>

                                            <option value="">
                                                {{ __('app.profile.select_qualification') }}
                                            </option>

                                            @foreach (['MBBS', 'MD', 'MS', 'DM', 'MCH', 'DNB', 'PHD'] as $qualification)
                                                <option value="{{ $qualification }}"
                                                    {{ old('qualification', current_user()['qualification'] ?? '') == $qualification ? 'selected' : '' }}>
                                                    {{ $qualification }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <!-- Experience -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.years_experience') }}
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select name="experience" class="form-control" required>

                                            <option value="">
                                                {{ __('app.profile.select_experience') }}
                                            </option>

                                            @foreach (['0-2 years', '3-5 years', '6-10 years', '11-15 years', '15+ years'] as $experience)
                                                <option value="{{ $experience }}"
                                                    {{ old('experience', current_user()['experience'] ?? '') == $experience ? 'selected' : '' }}>
                                                    {{ $experience }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>
                                </div>

                                <!-- Specializations -->
                                <div class="col-lg-12">

                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.specializations') }}
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select name="specializations[]" class="form-control select2" multiple required>

                                            @foreach ($specializations as $spec)
                                                <option value="{{ $spec['name'] }}"
                                                    {{ collect(old('specializations', current_user()['specializations'] ?? []))->contains($spec['name']) ? 'selected' : '' }}>
                                                    {{ $spec['name'] }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <!-- Languages -->
                                <div class="col-lg-6">

                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.languages_spoken') }}
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select name="languages[]" class="form-control select2 select2-languages" multiple
                                            required>

                                            @foreach (['English', 'Spanish', 'French', 'Arabic', 'German', 'Portuguese', 'Chinese (Mandarin)', 'Hindi', 'Japanese', 'Korean', 'Italian', 'Russian', 'Dutch', 'Turkish', 'Polish', 'Swedish', 'Norwegian', 'Danish', 'Romanian', 'Bengali', 'Urdu', 'Persian', 'Hebrew', 'Thai', 'Vietnamese', 'Indonesian', 'Malay', 'Swahili', 'Greek', 'Czech'] as $language)
                                                <option value="{{ $language }}"
                                                    {{ collect(old('languages', current_user()['languages'] ?? []))->contains($language) ? 'selected' : '' }}>
                                                    {{ $language }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <!-- Practice Country -->
                                <div class="col-lg-6">

                                    <div class="form-wrap">

                                        <label class="form-label">
                                            {{ __('app.profile.practice_country') }}
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select name="practiceCountry" class="form-control" required>

                                            <option value="">
                                                {{ __('app.profile.select_practice_country') }}
                                            </option>

                                            @foreach ($countries as $code => $countryName)
                                                <option value="{{ $code }}"
                                                    {{ old('practiceCountry', current_user()['practiceCountry'] ?? '') == $code ? 'selected' : '' }}>
                                                    {{ $countryName }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="setting-title">
                            <h5>{{ __('app.profile.availability_timing') }}</h5>
                        </div>

                        <div class="setting-card bg-white">
                            <small class="text-muted d-block mb-3">
                                <i class="isax isax-info-circle"></i>
                                {{ __('app.appointments.utc_notice') }}
                            </small>
                            <div class="row">
                                <div class="row mb-4">
                                    <div class="col-lg-6 col-md-6 ">
                                        <label class="form-label fw-semibold">
                                            {{ __('app.profile.consultation_fee') }} <span class="text-danger">*</span>
                                        </label>

                                        <div class="input-group">

                                            <span class="input-group-text">
                                                $
                                            </span>

                                            <input type="number" name="consultationFee" class="form-control"
                                                value="{{ current_user()['consultationFee'] ?? '' }}" min="0"
                                                step="0.01" required>

                                        </div>
                                    </div>

                                    <!-- Timezone -->
                                    <div class="col-lg-6 col-md-6">
                                        <label class="form-label fw-semibold">
                                            {{ __('app.profile.timezone') }} <span class="text-danger">*</span>
                                        </label>

                                        <select name="timezone_select" class="form-control" required>
                                            <option value="">{{ __('app.profile.select_timezone') }}</option>
                                            <!-- Americas -->
                                            <optgroup label="Americas">
                                                <option value="America/New_York"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/New_York' ? 'selected' : '' }}>
                                                    Eastern Time (US & Canada)</option>
                                                <option value="America/Chicago"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Chicago' ? 'selected' : '' }}>
                                                    Central Time (US & Canada)</option>
                                                <option value="America/Denver"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Denver' ? 'selected' : '' }}>
                                                    Mountain Time (US & Canada)</option>
                                                <option value="America/Los_Angeles"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Los_Angeles' ? 'selected' : '' }}>
                                                    Pacific Time (US & Canada)</option>
                                                <option value="America/Anchorage"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Anchorage' ? 'selected' : '' }}>
                                                    Alaska</option>
                                                <option value="Pacific/Honolulu"
                                                    {{ (current_user()['timezone'] ?? '') == 'Pacific/Honolulu' ? 'selected' : '' }}>
                                                    Hawaii</option>
                                                <option value="America/Toronto"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Toronto' ? 'selected' : '' }}>
                                                    Toronto</option>
                                                <option value="America/Mexico_City"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Mexico_City' ? 'selected' : '' }}>
                                                    Mexico City</option>
                                                <option value="America/Bogota"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Bogota' ? 'selected' : '' }}>
                                                    Colombia</option>
                                                <option value="America/Caracas"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Caracas' ? 'selected' : '' }}>
                                                    Venezuela</option>
                                                <option value="America/Sao_Paulo"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Sao_Paulo' ? 'selected' : '' }}>
                                                    São Paulo</option>
                                                <option value="America/Buenos_Aires"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Buenos_Aires' ? 'selected' : '' }}>
                                                    Buenos Aires</option>
                                                <option value="America/Santiago"
                                                    {{ (current_user()['timezone'] ?? '') == 'America/Santiago' ? 'selected' : '' }}>
                                                    Santiago</option>
                                            </optgroup>
                                            <!-- Europe -->
                                            <optgroup label="Europe">
                                                <option value="Europe/London"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/London' ? 'selected' : '' }}>
                                                    London (GMT/BST)</option>
                                                <option value="Europe/Paris"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Paris' ? 'selected' : '' }}>
                                                    Central European Time</option>
                                                <option value="Europe/Berlin"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Berlin' ? 'selected' : '' }}>
                                                    Berlin</option>
                                                <option value="Europe/Amsterdam"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Amsterdam' ? 'selected' : '' }}>
                                                    Amsterdam</option>
                                                <option value="Europe/Madrid"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Madrid' ? 'selected' : '' }}>
                                                    Madrid</option>
                                                <option value="Europe/Rome"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Rome' ? 'selected' : '' }}>
                                                    Rome</option>
                                                <option value="Europe/Vienna"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Vienna' ? 'selected' : '' }}>
                                                    Vienna</option>
                                                <option value="Europe/Prague"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Prague' ? 'selected' : '' }}>
                                                    Prague</option>
                                                <option value="Europe/Budapest"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Budapest' ? 'selected' : '' }}>
                                                    Budapest</option>
                                                <option value="Europe/Warsaw"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Warsaw' ? 'selected' : '' }}>
                                                    Warsaw</option>
                                                <option value="Europe/Stockholm"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Stockholm' ? 'selected' : '' }}>
                                                    Stockholm</option>
                                                <option value="Europe/Oslo"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Oslo' ? 'selected' : '' }}>
                                                    Oslo</option>
                                                <option value="Europe/Copenhagen"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Copenhagen' ? 'selected' : '' }}>
                                                    Copenhagen</option>
                                                <option value="Europe/Dublin"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Dublin' ? 'selected' : '' }}>
                                                    Dublin</option>
                                                <option value="Europe/Lisbon"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Lisbon' ? 'selected' : '' }}>
                                                    Lisbon</option>
                                                <option value="Europe/Moscow"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Moscow' ? 'selected' : '' }}>
                                                    Moscow</option>
                                                <option value="Europe/Istanbul"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Istanbul' ? 'selected' : '' }}>
                                                    Istanbul</option>
                                                <option value="Europe/Athens"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Athens' ? 'selected' : '' }}>
                                                    Athens</option>
                                                <option value="Europe/Helsinki"
                                                    {{ (current_user()['timezone'] ?? '') == 'Europe/Helsinki' ? 'selected' : '' }}>
                                                    Helsinki</option>
                                            </optgroup>
                                            <!-- Africa -->
                                            <optgroup label="Africa">
                                                <option value="Africa/Cairo"
                                                    {{ (current_user()['timezone'] ?? '') == 'Africa/Cairo' ? 'selected' : '' }}>
                                                    Cairo</option>
                                                <option value="Africa/Johannesburg"
                                                    {{ (current_user()['timezone'] ?? '') == 'Africa/Johannesburg' ? 'selected' : '' }}>
                                                    Johannesburg</option>
                                                <option value="Africa/Lagos"
                                                    {{ (current_user()['timezone'] ?? '') == 'Africa/Lagos' ? 'selected' : '' }}>
                                                    Lagos</option>
                                                <option value="Africa/Nairobi"
                                                    {{ (current_user()['timezone'] ?? '') == 'Africa/Nairobi' ? 'selected' : '' }}>
                                                    Nairobi</option>
                                                <option value="Africa/Casablanca"
                                                    {{ (current_user()['timezone'] ?? '') == 'Africa/Casablanca' ? 'selected' : '' }}>
                                                    Casablanca</option>
                                            </optgroup>
                                            <!-- Middle East -->
                                            <optgroup label="Middle East">
                                                <option value="Asia/Dubai"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Dubai' ? 'selected' : '' }}>
                                                    Dubai (Gulf Standard Time)</option>
                                                <option value="Asia/Baghdad"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Baghdad' ? 'selected' : '' }}>
                                                    Baghdad</option>
                                                <option value="Asia/Jerusalem"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Jerusalem' ? 'selected' : '' }}>
                                                    Jerusalem</option>
                                                <option value="Asia/Tehran"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Tehran' ? 'selected' : '' }}>
                                                    Tehran</option>
                                            </optgroup>
                                            <!-- Asia -->
                                            <optgroup label="Asia">
                                                <option value="Asia/Kolkata"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Kolkata' ? 'selected' : '' }}>
                                                    India Standard Time</option>
                                                <option value="Asia/Bangkok"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Bangkok' ? 'selected' : '' }}>
                                                    Indochina Time</option>
                                                <option value="Asia/Ho_Chi_Minh"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Ho_Chi_Minh' ? 'selected' : '' }}>
                                                    Ho Chi Minh City</option>
                                                <option value="Asia/Hong_Kong"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Hong_Kong' ? 'selected' : '' }}>
                                                    Hong Kong</option>
                                                <option value="Asia/Singapore"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Singapore' ? 'selected' : '' }}>
                                                    Singapore</option>
                                                <option value="Asia/Tokyo"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Tokyo' ? 'selected' : '' }}>
                                                    Tokyo</option>
                                                <option value="Asia/Seoul"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Seoul' ? 'selected' : '' }}>
                                                    Seoul</option>
                                                <option value="Asia/Shanghai"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Shanghai' ? 'selected' : '' }}>
                                                    Shanghai</option>
                                                <option value="Asia/Manila"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Manila' ? 'selected' : '' }}>
                                                    Manila</option>
                                                <option value="Asia/Kuala_Lumpur"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Kuala_Lumpur' ? 'selected' : '' }}>
                                                    Kuala Lumpur</option>
                                                <option value="Asia/Karachi"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Karachi' ? 'selected' : '' }}>
                                                    Karachi</option>
                                                <option value="Asia/Kathmandu"
                                                    {{ (current_user()['timezone'] ?? '') == 'Asia/Kathmandu' ? 'selected' : '' }}>
                                                    Kathmandu</option>
                                            </optgroup>
                                            <!-- Oceania -->
                                            <optgroup label="Oceania">
                                                <option value="Australia/Sydney"
                                                    {{ (current_user()['timezone'] ?? '') == 'Australia/Sydney' ? 'selected' : '' }}>
                                                    Sydney</option>
                                                <option value="Australia/Melbourne"
                                                    {{ (current_user()['timezone'] ?? '') == 'Australia/Melbourne' ? 'selected' : '' }}>
                                                    Melbourne</option>
                                                <option value="Australia/Brisbane"
                                                    {{ (current_user()['timezone'] ?? '') == 'Australia/Brisbane' ? 'selected' : '' }}>
                                                    Brisbane</option>
                                                <option value="Australia/Perth"
                                                    {{ (current_user()['timezone'] ?? '') == 'Australia/Perth' ? 'selected' : '' }}>
                                                    Perth</option>
                                                <option value="Pacific/Auckland"
                                                    {{ (current_user()['timezone'] ?? '') == 'Pacific/Auckland' ? 'selected' : '' }}>
                                                    New Zealand</option>
                                                <option value="Pacific/Fiji"
                                                    {{ (current_user()['timezone'] ?? '') == 'Pacific/Fiji' ? 'selected' : '' }}>
                                                    Fiji</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <!-- Working Days -->
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        {{ __('app.profile.working_days') }} <span class="text-danger">*</span>
                                    </label>
                                    <select name="workingDays[]" class="form-control select2" multiple required>
                                        @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                            <option value="{{ $day }}"
                                                {{ in_array($day, $workingDays ?? []) ? 'selected' : '' }}>
                                                {{ $day }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        {{ __('app.profile.appointment_duration') }} <span class="text-danger">*</span>
                                    </label>

                                    <select name="slotDuration" class="form-control" required>

                                        @foreach ([
            [
                'value' => 15,
                'label' => '15 Minutes',
            ],
            [
                'value' => 30,
                'label' => '30 Minutes',
            ],
            [
                'value' => 45,
                'label' => '45 Minutes',
            ],
            [
                'value' => 60,
                'label' => '60 Minutes',
            ],
            [
                'value' => 90,
                'label' => '90 Minutes',
            ],
            [
                'value' => 120,
                'label' => '120 Minutes',
            ],
        ] as $day)
                                            <option value="{{ $day['value'] }}"
                                                {{ $day['value'] == current_user()['slotDuration'] ? 'selected' : '' }}>
                                                {{ $day['label'] }}
                                            </option>
                                        @endforeach


                                    </select>
                                </div>

                                <!-- Working Hours -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">
                                                {{ __('app.profile.start_time') }} <span class="text-danger">*</span>
                                            </label>

                                            <select name="workingHours[]" class="form-control" required>
                                                <option value="">{{ __('app.profile.select_timezone') }}</option>
                                                @php
                                                    $startTimes = [];
                                                    for ($i = 0; $i < 24; $i++) {
                                                        for ($j = 0; $j < 60; $j += 30) {
                                                            $time = sprintf('%02d:%02d', $i, $j);
                                                            $startTimes[] = $time;
                                                        }
                                                    }
                                                @endphp

                                                @foreach ($startTimes as $time)
                                                    <option value="{{ $time }}"
                                                        {{ ($workingHours[0] ?? '') == $time ? 'selected' : '' }}>
                                                        {{ date('g:i A', strtotime($time)) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label class="form-label fw-semibold">
                                                {{ __('app.profile.end_time') }} <span class="text-danger">*</span>
                                            </label>

                                            <select name="workingHours[]" class="form-control" required>
                                                <option value="">{{ __('app.profile.select_timezone') }}</option>
                                                @php
                                                    $endTimes = [];
                                                    for ($i = 0; $i < 24; $i++) {
                                                        for ($j = 0; $j < 60; $j += 30) {
                                                            $time = sprintf('%02d:%02d', $i, $j);
                                                            $endTimes[] = $time;
                                                        }
                                                    }
                                                @endphp

                                                @foreach ($endTimes as $time)
                                                    <option value="{{ $time }}"
                                                        {{ ($workingHours[1] ?? '') == $time ? 'selected' : '' }}>
                                                        {{ date('g:i A', strtotime($time)) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Breaks -->
                                <div class="mb-3 d-flex align-items-center justify-content-between">

                                    <label class="form-label fw-semibold mb-0">
                                        Break Timings
                                    </label>

                                    <button type="button" class="btn btn-sm btn-primary" id="addBreakBtn">
                                        Add Break
                                    </button>

                                </div>

                                <div id="breakContainer">
                                    @if (!empty($breaks))
                                        @foreach ($breaks as $index => $break)
                                            @php
                                                $times = explode('-', $break);
                                                $startTime = $times[0] ?? '';
                                                $endTime = $times[1] ?? '';
                                            @endphp

                                            <div class="row break-row mb-3">
                                                <div class="col-md-5">
                                                    <select class="form-control break-start" name="break_start[]"
                                                        required>
                                                        <option value="">Select start time</option>
                                                        @php
                                                            $timeOptions = '';
                                                            for ($i = 0; $i < 24; $i++) {
                                                                for ($j = 0; $j < 60; $j += 30) {
                                                                    $time = sprintf('%02d:%02d', $i, $j);
                                                                    $display = date('g:i A', strtotime($time));
                                                                    $selected = $startTime == $time ? 'selected' : '';
                                                                    $timeOptions .= "<option value=\"{$time}\" {$selected}>{$display}</option>";
                                                                }
                                                            }
                                                        @endphp
                                                        {!! $timeOptions !!}
                                                    </select>
                                                </div>

                                                <div class="col-md-5">
                                                    <select class="form-control break-end" name="break_end[]" required>
                                                        <option value="">Select end time</option>
                                                        @php
                                                            $timeOptions = '';
                                                            for ($i = 0; $i < 24; $i++) {
                                                                for ($j = 0; $j < 60; $j += 30) {
                                                                    $time = sprintf('%02d:%02d', $i, $j);
                                                                    $display = date('g:i A', strtotime($time));
                                                                    $selected = $endTime == $time ? 'selected' : '';
                                                                    $timeOptions .= "<option value=\"{$time}\" {$selected}>{$display}</option>";
                                                                }
                                                            }
                                                        @endphp
                                                        {!! $timeOptions !!}
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-danger remove-break w-100">
                                                        Remove
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <!-- Hidden Input -->
                                <input type="hidden" name="breaks" id="breaksInput">
                            </div>
                            <div class="modal-btn text-end pb-3">

                                <a href="#" class="btn btn-gray">
                                    {{ __('app.common.cancel') }}
                                </a>

                                <button type="submit" class="btn btn-primary prime-btn">
                                    {{ __('app.profile.save_changes') }}
                                </button>

                            </div>

                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="border-bottom pb-3 mb-3">
                                    <h5>{{ __('app.help_support.title') }}</h5>
                                </div>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ route('doctor.help-support') }}" class="btn btn-primary prime-btn">
                                        <i class="isax isax-message-question me-1"></i>
                                        {{ __('app.help_support.title') }}
                                    </a>
                                    <a href="{{ route('doctor.my-tickets') }}" class="btn btn-gray">
                                        <i class="isax isax-note-2 me-1"></i> {{ __('app.help_support.my_tickets') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>

                </form>
                <!-- /Profile Settings -->

                <div class="card border-danger">
                    <div class="card-body">
                        <div class="border-bottom pb-3 mb-3">
                            <h5 class="text-danger">{{ __('app.profile.delete_account') }}</h5>
                        </div>
                        <p class="text-muted">{{ __('app.profile.delete_account_notice') }}</p>
                        <form id="deleteAccountForm" action="{{ route('doctor.settings.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">
                                {{ __('app.profile.delete_account') }}
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <style>
        body {
            background-color: #f5f7fb !important
        }

        @media (max-width: 991px) {
            .break-row {
                gap: 8px;
            }
        }

        .mb-6 {
            margin-bottom: 25px !important;
        }

        .bio-textarea {
            margin-bottom: 8px;
        }

        .select2-selection__choice {
            background-color: var(--primary) !important;
            border: 1px solid #ffffff !important;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-top: 3px;
            padding: 0 5px;
        }
    </style>
    <!-- /Page Content -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            $('.select2').select2({
                placeholder: "Select Specializations",
                allowClear: true,
                width: '100%'
            });

            $('.select2-languages').select2({
                placeholder: "Select Languages Spoken",
                allowClear: true,
                width: '100%'
            });

            // Update timezone from dropdown if selected, otherwise keep browser default
            document.addEventListener('change', function(e) {
                if (e.target && e.target.name === 'timezone_select' && e.target.value) {
                    document.getElementById('timezone').value = e.target.value;
                }
            });

            // Set default timezone if not already set
            if (!document.getElementById('timezone').value) {
                document.getElementById('timezone').value =
                    Intl.DateTimeFormat().resolvedOptions().timeZone;
            }
        });
    </script>
    <script>
        // Show only the bio textarea for the language currently selected
        document.getElementById('bioLanguageSelect').addEventListener('change', function() {
            const selected = this.value;
            document.querySelectorAll('.bio-textarea').forEach(function(textarea) {
                textarea.style.display = textarea.dataset.lang === selected ? 'block' : 'none';
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select Working Days',
                width: '100%'
            });
        });

        // Helper function to generate time options HTML
        function generateTimeOptions(selected = '') {
            let html = '<option value="">Select time</option>';
            for (let i = 0; i < 24; i++) {
                for (let j = 0; j < 60; j += 30) {
                    const time = `${String(i).padStart(2, '0')}:${String(j).padStart(2, '0')}`;
                    const hours = i % 12 || 12;
                    const ampm = i < 12 ? 'AM' : 'PM';
                    const display = `${hours}:${String(j).padStart(2, '0')} ${ampm}`;
                    const selectedAttr = selected === time ? 'selected' : '';
                    html += `<option value="${time}" ${selectedAttr}>${display}</option>`;
                }
            }
            return html;
        }

        // Add break button handler
        document.getElementById('addBreakBtn').addEventListener('click', function() {
            const html = `
        <div class="row break-row mb-3">
            <div class="col-md-5">
                <select class="form-control break-start" required>
                    ${generateTimeOptions()}
                </select>
            </div>
            <div class="col-md-5">
                <select class="form-control break-end" required>
                    ${generateTimeOptions()}
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-break w-100">
                    Remove
                </button>
            </div>
        </div>
    `;

            document.getElementById('breakContainer').insertAdjacentHTML('beforeend', html);
        });

        // Remove break handler
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-break')) {
                e.target.closest('.break-row').remove();
            }
        });

        // Form submission handler
        document.querySelector('form').addEventListener('submit', function() {
            let breaks = [];

            document.querySelectorAll('.break-row').forEach(row => {
                const start = row.querySelector('.break-start').value;
                const end = row.querySelector('.break-end').value;

                if (start && end) {
                    breaks.push(`${start}-${end}`);
                }
            });

            document.getElementById('breaksInput').value = breaks.join(',');
        });

        // Delete account confirmation
        const deleteAccountForm = document.getElementById('deleteAccountForm');
        if (deleteAccountForm) {
            deleteAccountForm.addEventListener('submit', function(e) {
                if (!confirm('{{ __('app.profile.delete_account_confirm') }}')) {
                    e.preventDefault();
                }
            });
        }
    </script>
@endpush
