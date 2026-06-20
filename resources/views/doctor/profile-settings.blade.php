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
                        <h3>Profile Settings</h3>
                    </div>



                    <div class="setting-title">
                        <h5>Profile</h5>
                    </div>

                    <form action="{{ route('doctor.settings.update') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('POST')
                        <input type="hidden" name="timezone" id="timezone">
                        <!-- Profile Image -->
                        <div class="setting-card bg-white">
                            <label class="form-label mb-2">Profile Photo</label>
                            <div class="change-avatar img-upload">
                                <div class="profile-img">
                                    <i class="fa-solid fa-file-image"></i>
                                </div>
                                <div class="upload-img">
                                    <div class="imgs-load d-flex align-items-center">
                                        <div class="change-photo">
                                            Upload New
                                            <input type="file" name="image" class="upload"
                                                accept=".jpg,.jpeg,.png,.webp">
                                        </div>
                                    </div>
                                    <p>Your Image should Below 4 MB, Accepted format jpg,png,jpeg,webp</p>
                                </div>
                            </div>
                        </div>

                        <!-- Information -->
                        <div class="setting-title">
                            <h5>Information</h5>
                        </div>

                        <div class="setting-card bg-white">

                            <div class="row">

                                <!-- Name -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            Full Name <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', current_user()['name'] ?? '') }}" required>

                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            Email Address <span class="text-danger">*</span>
                                        </label>

                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', current_user()['email'] ?? '') }}" disabled>

                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            Phone Number <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone', current_user()['phone'] ?? '') }}" required>

                                    </div>
                                </div>

                                <!-- License -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            Medical License Number
                                            <span class="text-danger">*</span>
                                        </label>

                                        <input type="text" name="license_number" class="form-control"
                                            value="{{ old('license_number', current_user()['license_number'] ?? '') }}"
                                            required>

                                    </div>
                                </div>

                                <!-- Qualification -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-wrap">

                                        <label class="form-label">
                                            Qualification <span class="text-danger">*</span>
                                        </label>

                                        <select name="qualification" class="form-control" required>

                                            <option value="">
                                                Select Qualification
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
                                            Years of Experience
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select name="experience" class="form-control" required>

                                            <option value="">
                                                Select Experience
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
                                            Specializations
                                            <span class="text-danger">*</span>
                                        </label>

                                        <select name="specializations[]" class="form-control select2" multiple required>

                                            @foreach ($specializations as $spec)
                                                <option value="{{ $spec['id'] }}"
                                                    {{ collect(old('specializations', current_user()['specializations'] ?? []))->contains($spec['id']) ? 'selected' : '' }}>
                                                    {{ $spec['name'] }}
                                                </option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <!-- Languages -->
                                <div class="col-lg-12">

                                    <div class="form-wrap">

                                        <label class="form-label">
                                            Languages Spoken
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

                            </div>
                        </div>
                        <div class="setting-title">
                            <h5>Availability Timing</h5>
                        </div>

                        <div class="setting-card bg-white">
                            <div class="row">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">
                                        Consultation Fee <span class="text-danger">*</span>
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
                                    <div class="mb-4">
                                        <label class="form-label fw-semibold">
                                            Timezone <span class="text-danger">*</span>
                                        </label>

                                        <select name="timezone_select" class="form-control" required>
                                            <option value="">Select Timezone</option>
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
                                        Working Days <span class="text-danger">*</span>
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
                                        Appointment Duration <span class="text-danger">*</span>
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
                                                Start Time <span class="text-danger">*</span>
                                            </label>

                                            <select name="workingHours[]" class="form-control" required>
                                                <option value="">Select start time</option>
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
                                                End Time <span class="text-danger">*</span>
                                            </label>

                                            <select name="workingHours[]" class="form-control" required>
                                                <option value="">Select end time</option>
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

                        </div>
                </div>

                {{-- <!-- Documents -->
                    <div class="setting-title">
                        <h5>Documents</h5>
                    </div>

                    <div class="setting-card">

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-wrap">

                                    <label class="form-label">
                                        Medical License
                                    </label>

                                    <input
                                        type="file"
                                        name="medical_license"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                    >

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-wrap">

                                    <label class="form-label">
                                        Degree Certificate
                                    </label>

                                    <input
                                        type="file"
                                        name="degree_certificate"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                    >

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-wrap">

                                    <label class="form-label">
                                        ID Proof
                                    </label>

                                    <input
                                        type="file"
                                        name="id_proof"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                    >

                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-wrap">

                                    <label class="form-label">
                                        Clinic Registration
                                    </label>

                                    <input
                                        type="file"
                                        name="clinic_registration"
                                        class="form-control"
                                        accept=".jpg,.jpeg,.png,.pdf"
                                    >

                                </div>
                            </div>

                        </div>

                    </div> --}}

                <div class="modal-btn text-end">

                    <a href="#" class="btn btn-gray">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary prime-btn">
                        Save Changes
                    </button>

                </div>

                </form>
                <!-- /Profile Settings -->

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
    </script>
@endpush
