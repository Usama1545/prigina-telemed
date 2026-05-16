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

                   <form action="{{ route('doctor.settings.update') }}"
                    method="POST"
                    enctype="multipart/form-data">

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
                                            <input
                                                type="file"
                                                name="image"
                                                class="upload"
                                                accept=".jpg,.jpeg,.png,.webp"
                                            >                                    
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

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name', current_user()['name'] ?? '') }}"
                                        required
                                    >

                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-wrap">

                                    <label class="form-label">
                                        Email Address <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email', current_user()['email'] ?? '') }}"
                                        disabled
                                    >

                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-wrap">

                                    <label class="form-label">
                                        Phone Number <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        value="{{ old('phone', current_user()['phone'] ?? '') }}"
                                        required
                                    >

                                </div>
                            </div>

                            <!-- License -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-wrap">

                                    <label class="form-label">
                                        Medical License Number
                                        <span class="text-danger">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="license_number"
                                        class="form-control"
                                        value="{{ old('license_number', current_user()['license_number'] ?? '') }}"
                                        required
                                    >

                                </div>
                            </div>

                            <!-- Qualification -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-wrap">

                                    <label class="form-label">
                                        Qualification <span class="text-danger">*</span>
                                    </label>

                                    <select
                                        name="qualification"
                                        class="form-control"
                                        required
                                    >

                                        <option value="">
                                            Select Qualification
                                        </option>

                                        @foreach(['MBBS','MD','MS','DM','MCH','DNB','PHD'] as $qualification)

                                            <option
                                                value="{{ $qualification }}"
                                                {{ old('qualification', current_user()['qualification'] ?? '') == $qualification ? 'selected' : '' }}
                                            >
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

                                    <select
                                        name="experience"
                                        class="form-control"
                                        required
                                    >

                                        <option value="">
                                            Select Experience
                                        </option>

                                        @foreach([
                                            '0-2 years',
                                            '3-5 years',
                                            '6-10 years',
                                            '11-15 years',
                                            '15+ years'
                                        ] as $experience)

                                            <option
                                                value="{{ $experience }}"
                                                {{ old('experience', current_user()['experience'] ?? '') == $experience ? 'selected' : '' }}
                                            >
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

                                    <select
                                        name="specializations[]"
                                        class="form-control select2"
                                        multiple
                                        required
                                    >

                                        @foreach($specializations as $spec)

                                            <option
                                                value="{{ $spec['id'] }}"
                                                {{ collect(old('specializations', current_user()['specializations'] ?? []))->contains($spec['id']) ? 'selected' : '' }}
                                            >
                                                {{ $spec['name'] }}
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

                                    <input
                                        type="number"
                                        name="consultationFee"
                                        class="form-control"
                                        value="{{ current_user()['consultationFee'] ?? '' }}"
                                        min="0"
                                        step="0.01"
                                        required
                                    >

                                </div>
                            </div>

                            <!-- Working Days -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">
                                    Working Days <span class="text-danger">*</span>
                                </label>
                                <select name="workingDays[]" class="form-control select2" multiple required>
                                    @foreach([
                                        'Monday',
                                        'Tuesday',
                                        'Wednesday',
                                        'Thursday',
                                        'Friday',
                                        'Saturday',
                                        'Sunday'
                                    ] as $day)

                                        <option
                                            value="{{ $day }}"
                                            {{ in_array($day, $workingDays ?? []) ? 'selected' : '' }}
                                        >
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

                                    @foreach([
                                        [
                                            'value' => 15,
                                            'label' => '15 Minutes'
                                        ],
                                        [
                                            'value' => 30,
                                            'label' => '30 Minutes'
                                        ],
                                        [
                                            'value' => 45,
                                            'label' => '45 Minutes'
                                        ],
                                        [
                                            'value' => 60,
                                            'label' => '60 Minutes'
                                        ],
                                            [
                                            'value' => 90,
                                            'label' => '90 Minutes'
                                        ],
                                        [
                                            'value' => 120,
                                            'label' => '120 Minutes'
                                        ]
                                    ] as $day)

                                        <option
                                            value="{{ $day['value'] }}"
                                            {{ $day['value'] == current_user()['slotDuration'] ? 'selected' : '' }}
                                        >
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
                                                        $time = sprintf("%02d:%02d", $i, $j);
                                                        $startTimes[] = $time;
                                                    }
                                                }
                                            @endphp
                                            
                                            @foreach($startTimes as $time)
                                                <option value="{{ $time }}" {{ ($workingHours[0] ?? '') == $time ? 'selected' : '' }}>
                                                    {{ date("g:i A", strtotime($time)) }}
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
                                                        $time = sprintf("%02d:%02d", $i, $j);
                                                        $endTimes[] = $time;
                                                    }
                                                }
                                            @endphp
                                            
                                            @foreach($endTimes as $time)
                                                <option value="{{ $time }}" {{ ($workingHours[1] ?? '') == $time ? 'selected' : '' }}>
                                                    {{ date("g:i A", strtotime($time)) }}
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

                                <button
                                    type="button"
                                    class="btn btn-sm btn-primary"
                                    id="addBreakBtn"
                                >
                                    Add Break
                                </button>

                            </div>

                            <div id="breakContainer">
                                @if(!empty($breaks))
                                    @foreach($breaks as $index => $break)
                                        @php
                                            $times = explode('-', $break);
                                            $startTime = $times[0] ?? '';
                                            $endTime = $times[1] ?? '';
                                        @endphp

                                        <div class="row break-row mb-3">
                                            <div class="col-md-5">
                                                <select class="form-control break-start" name="break_start[]" required>
                                                    <option value="">Select start time</option>
                                                    @php
                                                        $timeOptions = '';
                                                        for ($i = 0; $i < 24; $i++) {
                                                            for ($j = 0; $j < 60; $j += 30) {
                                                                $time = sprintf("%02d:%02d", $i, $j);
                                                                $display = date("g:i A", strtotime($time));
                                                                $selected = ($startTime == $time) ? 'selected' : '';
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
                                                                $time = sprintf("%02d:%02d", $i, $j);
                                                                $display = date("g:i A", strtotime($time));
                                                                $selected = ($endTime == $time) ? 'selected' : '';
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
    </style>
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
$(document).ready(function () {
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
document.getElementById('addBreakBtn').addEventListener('click', function () {
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
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-break')) {
        e.target.closest('.break-row').remove();
    }
});

// Form submission handler
document.querySelector('form').addEventListener('submit', function () {
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
<style>
    
</style>