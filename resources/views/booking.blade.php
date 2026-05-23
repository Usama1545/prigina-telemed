<?php $page = 'booking'; ?>
@extends('layouts.mainlayout')
@section('content')
    <!-- Terms -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="booking-wizard">
                        <ul class="form-wizard-steps d-sm-flex align-items-center justify-content-center" id="progressbar2">
                            <li class="progress-active">
                                <div class="profile-step">
                                    <span class="multi-steps">1</span>
                                    <div class="step-section">
                                        <h6>Date & Time</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">2</span>
                                    <div class="step-section">
                                        <h6>Basic Information</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">3</span>
                                    <div class="step-section">
                                        <h6>Payment</h6>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="profile-step">
                                    <span class="multi-steps">4</span>
                                    <div class="step-section">
                                        <h6>Confirmation</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="booking-widget multistep-form mb-5">
                        <form id="bookingForm" action="{{ route('booking.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{ $doctor['uid'] ?? '' }}">
                            <input type="hidden" name="doctor_name" value="{{ $doctor['name'] ?? '' }}">
                            <input type="hidden" name="selected_slot" id="selectedSlotInput">
                            <input type="hidden" name="selected_date" id="selectedDateInput">
                            <input type="hidden" name="payment_gateway" id="paymentGateway" value="">
                            <input type="hidden" name="amount" value="{{ $doctor['consultationFee'] ?? 0 }}">

                            <!-- Step 1: Date & Time -->
                            <fieldset id="first">
                                <div class="card booking-card mb-0">
                                    <div class="card-header">
                                        <div class="booking-header pb-0">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                        <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0">
                                                            <img src="{{ $doctor['image'] ?? URL::asset('build/img/clients/client-15.jpg') }}"
                                                                alt="">
                                                        </span>
                                                        <div>
                                                            <h4 class="mb-1">{{ $doctor['name'] }}
                                                                <span class="badge bg-orange fs-12">
                                                                    <i
                                                                        class="fa-solid fa-star me-1"></i>{{ $doctor['rating'] ?? '5.0' }}
                                                                </span>
                                                            </h4>
                                                            <p class="text-indigo fw-medium">
                                                                @foreach ($doctor['specializations'] ?? [] as $specialization)
                                                                    <span>{{ $specialization }}, </span>
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body booking-body">
                                        <div class="card mb-0">
                                            <div class="card-body booking-body">
                                                <div class="card mb-0">
                                                    <div class="card-body pb-1">
                                                        <div class="mb-4 pb-4 border-bottom">
                                                            <label class="form-label">Select Day</label>
                                                            <select class="form-select" id="daySelect">
                                                                @foreach ($availability as $index => $day)
                                                                    <option value="{{ $index }}">
                                                                        {{ $day['day'] }} ({{ $day['date'] }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <h6 class="mb-3">Available Slots</h6>
                                                        <div id="slotsContainer" class="row">
                                                            {{-- Slots will render here --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                            <a href="javascript:void(0);"
                                                class="btn btn-md btn-dark inline-flex align-items-center rounded-pill"
                                                disabled>
                                                <i class="isax isax-arrow-left-2 me-1"></i> Back
                                            </a>
                                            <button type="button"
                                                class="btn btn-md btn-primary-gradient nextStep inline-flex align-items-center rounded-pill">
                                                Add Details
                                                <i class="isax isax-arrow-right-3 ms-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Step 2: Basic Information -->
                            <fieldset>
                                <div class="card booking-card mb-0">
                                    <div class="card-header">
                                        <div class="booking-header pb-0">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                        <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0">
                                                            <img src="{{ $doctor['image'] ?? URL::asset('build/img/clients/client-15.jpg') }}"
                                                                alt="">
                                                        </span>
                                                        <div>
                                                            <h4 class="mb-1">{{ $doctor['name'] }}
                                                                <span class="badge bg-orange fs-12">
                                                                    <i
                                                                        class="fa-solid fa-star me-1"></i>{{ $doctor['rating'] ?? '5.0' }}
                                                                </span>
                                                            </h4>
                                                            <p class="text-indigo fw-medium">
                                                                @foreach ($doctor['specializations'] ?? [] as $specialization)
                                                                    <span>{{ $specialization }}, </span>
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <h6 class="mb-2">Booking Info</h6>
                                                    <div class="row gx-2 gy-3">
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <h6 class="fs-14 fw-medium mb-1">Doctor</h6>
                                                                <p class="mb-0">{{ $doctor['name'] }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <h6 class="fs-14 fw-medium mb-1">Date & Time</h6>
                                                                <p class="mb-0" id="selectedSlotDisplay">Not selected</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div>
                                                                <h6 class="fs-14 fw-medium mb-1">Consultation Fee</h6>
                                                                <p class="mb-0 text-primary fw-bold">
                                                                    ${{ number_format($doctor['consultationFee'] ?? 0, 2) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body booking-body">
                                        <div class="card mb-0">
                                            <div class="card-body pb-1">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Full Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ current_user()['name'] ?? '' }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Phone Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" name="phone"
                                                                value="{{ current_user()['phone'] ?? '' }}"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4">
                                                        <div class="mb-3">
                                                            <label class="form-label">Email Address <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" name="email"
                                                                value="{{ current_user()['email'] ?? '' }}"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Symptoms (Optional)</label>
                                                            <input type="text" class="form-control" name="symptoms">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Files (Optional)</label>
                                                            <input type="file" name="files[]" class="form-control"
                                                                name="symptoms" multiple>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Explain your problem
                                                                (Optional)</label>
                                                            <textarea class="form-control" rows="3" name="problem"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                            <button type="button"
                                                class="btn btn-md btn-dark prevStep inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-arrow-left-2 me-1"></i> Back
                                            </button>
                                            <button type="button"
                                                class="btn btn-md btn-primary-gradient nextStep inline-flex align-items-center rounded-pill">
                                                Select Payment
                                                <i class="isax isax-arrow-right-3 ms-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Step 3: Payment Gateway Selection -->
                            <fieldset>
                                <div class="card booking-card mb-0">
                                    <div class="card-header">
                                        <div class="booking-header pb-0">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex align-items-center flex-wrap rpw-gap-2 flex-wrap row-gap-2">
                                                        <span class="avatar avatar-xxxl avatar-rounded me-2 flex-shrink-0">
                                                            <img src="{{ $doctor['image'] ?? URL::asset('build/img/clients/client-15.jpg') }}"
                                                                alt="">
                                                        </span>
                                                        <div>
                                                            <h4 class="mb-1">{{ $doctor['name'] }}
                                                                <span class="badge bg-orange fs-12">
                                                                    <i
                                                                        class="fa-solid fa-star me-1"></i>{{ $doctor['rating'] ?? '5.0' }}
                                                                </span>
                                                            </h4>
                                                            <p class="text-indigo fw-medium">
                                                                @foreach ($doctor['specializations'] ?? [] as $specialization)
                                                                    <span>{{ $specialization }}, </span>
                                                                @endforeach
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body booking-body">
                                        <div class="row">
                                            <div class="col-lg-6 d-flex">
                                                <div class="card flex-fill mb-3 mb-lg-0">
                                                    <div class="card-body">
                                                        <h6 class="mb-3">Select Payment Gateway</h6>
                                                        <div class="payment-gateway-options">
                                                            <div class="gateway-option mb-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input gateway-radio"
                                                                        type="radio" name="gateway" id="gatewayStripe"
                                                                        value="stripe">
                                                                    <label
                                                                        class="form-check-label d-flex align-items-center"
                                                                        for="gatewayStripe">
                                                                        <img src="{{ URL::asset('build/img/icons/payment-icon-05.svg') }}"
                                                                            class="me-2" alt="" width="40">
                                                                        <div>
                                                                            <strong>Stripe</strong>
                                                                            <p class="mb-0 text-muted small">Pay with
                                                                                Credit/Debit Card via Stripe</p>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="gateway-option">
                                                                <div class="form-check">
                                                                    <input class="form-check-input gateway-radio"
                                                                        type="radio" name="gateway"
                                                                        id="gatewayFlutterwave" value="flutterwave">
                                                                    <label
                                                                        class="form-check-label d-flex align-items-center"
                                                                        for="gatewayFlutterwave">
                                                                        <img src="{{ URL::asset('build/img/icons/payment-icon-06.svg') }}"
                                                                            class="me-2" alt="" width="40">
                                                                        <div>
                                                                            <strong>Flutterwave</strong>
                                                                            <p class="mb-0 text-muted small">Pay with Card,
                                                                                Mobile Money, Bank Transfer</p>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex">
                                                <div class="card flex-fill mb-0">
                                                    <div class="card-body">
                                                        <h6 class="mb-3">Booking Summary</h6>
                                                        <div class="mb-3">
                                                            <label class="form-label">Doctor</label>
                                                            <div class="form-plain-text">{{ $doctor['name'] }}</div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Date & Time</label>
                                                            <div class="form-plain-text" id="summarySlotDisplay">Not
                                                                selected</div>
                                                        </div>
                                                        <div class="pt-3 border-top booking-more-info">
                                                            <h6 class="mb-3">Payment Info</h6>
                                                            <div
                                                                class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-2">
                                                                <p class="mb-0">Consultation Fee</p>
                                                                <span
                                                                    class="fw-medium d-block">${{ number_format($doctor['consultationFee'] ?? 0, 2) }}</span>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="bg-primary d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between p-3 rounded">
                                                            <h6 class="text-white">Total</h6>
                                                            <h6 class="text-white">
                                                                ${{ number_format($doctor['consultationFee'] ?? 0, 2) }}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between">
                                            <button type="button"
                                                class="btn btn-md btn-dark prevStep inline-flex align-items-center rounded-pill">
                                                <i class="isax isax-arrow-left-2 me-1"></i> Back
                                            </button>
                                            <button type="submit"
                                                class="btn btn-md btn-primary-gradient inline-flex align-items-center rounded-pill"
                                                id="confirmPayBtn">
                                                Confirm & Pay
                                                <i class="isax isax-arrow-right-3 ms-1"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                        <!-- Step 4: Confirmation (will be shown after successful payment) -->
                        <fieldset>
                            <div class="card booking-card">
                                <div class="card-body booking-body pb-1">
                                    <div class="row">
                                        <div class="col-lg-8 d-flex">
                                            <div class="flex-fill">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="d-flex align-items-center flex-wrap rpw-gap-2">
                                                            <i class="isax isax-tick-circle5 text-success me-2"></i>
                                                            Booking Confirmed
                                                        </h5>
                                                    </div>
                                                    <div class="card-header d-flex align-items-center flex-wrap rpw-gap-2">
                                                        <span class="avatar avatar-lg avatar-rounded me-2 flex-shrink-0">
                                                            <img src="{{ URL::asset('build/img/clients/client-16.jpg') }}"
                                                                alt="">
                                                        </span>
                                                        <p class="mb-0">Your Booking has been Confirmed with <span
                                                                class="text-dark">{{ $doctor['name'] }}</span></p>
                                                    </div>
                                                    <div class="card-body pb-1">
                                                        <div
                                                            class="d-flex align-items-center flex-wrap rpw-gap-2 justify-content-between mb-3">
                                                            <h6>Booking Info</h6>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Doctor</label>
                                                                    <div class="form-plain-text">{{ $doctor['name'] }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Date & Time</label>
                                                                    <div class="form-plain-text"
                                                                        id="confirmationSlotDisplay"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Booking ID</label>
                                                                    <div class="form-plain-text" id="bookingId"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 d-flex">
                                            <div class="card flex-fill">
                                                <div class="card-body d-flex flex-column justify-content-between">
                                                    <div class="text-center">
                                                        <span class="d-block mb-3"><img
                                                                src="{{ URL::asset('build/img/icons/payment-qr.svg') }}"
                                                                alt=""></span>
                                                        <p>Your appointment has been confirmed</p>
                                                    </div>
                                                    <div>
                                                        <a href="{{ url('doctor-grid') }}"
                                                            class="btn w-100 btn-md btn-primary-gradient rounded-pill">
                                                            Start New Booking
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const availability = @json($availability);
        let selectedSlotValue = '';
        let selectedDateValue = '';

        const daySelect = document.getElementById('daySelect');
        const slotsContainer = document.getElementById('slotsContainer');
        const selectedSlotDisplay = document.getElementById('selectedSlotDisplay');
        const summarySlotDisplay = document.getElementById('summarySlotDisplay');
        const selectedSlotInput = document.getElementById('selectedSlotInput');
        const selectedDateInput = document.getElementById('selectedDateInput');

        function renderSlots(index) {
            const dayData = availability[index];
            slotsContainer.innerHTML = '';

            dayData.slots.forEach(slot => {
                const col = document.createElement('div');
                col.className = 'col-lg-3 col-md-4 col-6 mb-3';

                const slotId = `slot_${dayData.date}_${slot.replace(/:/g, '')}`;

                col.innerHTML = `
                <div class="service-item text-center" style="padding: 0px !important">
                    <input class="form-check-input d-none" 
                           type="radio" 
                           name="selected_slot_radio" 
                           value="${slot}" 
                           id="${slotId}"
                           data-date="${dayData.date}"
                           data-time="${slot}">

                    <label class="form-check-label w-100 p-2 border rounded slot-label" 
                           for="${slotId}">
                        ${slot}
                    </label>
                </div>
            `;

                slotsContainer.appendChild(col);
            });

            attachSlotListeners();
        }

        function attachSlotListeners() {
            document.querySelectorAll('input[name="selected_slot_radio"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    document.querySelectorAll('.slot-label').forEach(label => {
                        label.classList.remove('active', 'bg-primary', 'text-white',
                            'border-primary');
                    });

                    const label = this.nextElementSibling;
                    label.classList.add('active', 'bg-primary', 'text-white', 'border-primary');

                    selectedSlotValue = `${this.dataset.time}`;
                    selectedDateValue = this.dataset.date;
                    const fullSlot = `${selectedDateValue} ${selectedSlotValue}`;

                    selectedSlotInput.value = fullSlot;
                    selectedDateInput.value = selectedDateValue;
                    selectedSlotDisplay.innerText = fullSlot;
                    summarySlotDisplay.innerText = fullSlot;
                });
            });
        }

        renderSlots(0);

        daySelect.addEventListener('change', function() {
            renderSlots(this.value);
        });

        // Multi-step form navigation
        const fieldsets = document.querySelectorAll('fieldset');
        let currentStep = 0;

        function showStep(step) {
            fieldsets.forEach((fieldset, index) => {
                fieldset.style.display = index === step ? 'block' : 'none';
            });

            // Update progress bar
            const steps = document.querySelectorAll('#progressbar2 li');
            steps.forEach((stepEl, index) => {
                if (index <= step) {
                    stepEl.classList.add('progress-active');
                } else {
                    stepEl.classList.remove('progress-active');
                }
            });
        }

        document.querySelectorAll('.nextStep').forEach(btn => {
            btn.addEventListener('click', function() {
                if (currentStep === 0) {
                    if (!selectedSlotInput.value) {
                        alert('Please select a time slot before proceeding');
                        return;
                    }
                }
                if (currentStep < fieldsets.length - 2) {
                    currentStep++;
                    showStep(currentStep);
                }
            });
        });

        document.querySelectorAll('.prevStep').forEach(btn => {
            btn.addEventListener('click', function() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });

        // Payment gateway selection
        const gatewayRadios = document.querySelectorAll('.gateway-radio');
        const confirmPayBtn = document.getElementById('confirmPayBtn');
        const paymentGatewayInput = document.getElementById('paymentGateway');
        const bookingForm = document.getElementById('bookingForm');

        gatewayRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                paymentGatewayInput.value = this.value;
                confirmPayBtn.disabled = false;
            });
        });

        confirmPayBtn.disabled = true;

        bookingForm.addEventListener('submit', function(e) {
            if (!paymentGatewayInput.value) {
                e.preventDefault();
                alert('Please select a payment gateway (Stripe or Flutterwave)');
                return false;
            }

            if (!selectedSlotInput.value) {
                e.preventDefault();
                alert('Please select a time slot');
                return false;
            }

            confirmPayBtn.disabled = true;
            confirmPayBtn.innerHTML = 'Processing... <i class="isax isax-loading ms-1"></i>';

            return true;
        });

        showStep(0);
    </script>

    <style>
        .slot-label {
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            text-align: center;
        }

        .slot-label:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
        }

        .slot-label.active {
            background-color: #0d6efd !important;
            color: white !important;
            border-color: #0d6efd !important;
        }

        .gateway-option {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 15px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .gateway-option:hover {
            border-color: #0d6efd;
            background-color: #f8f9fa;
        }

        .gateway-radio:checked+label {
            color: #0d6efd;
        }

        input[type="radio"]:checked+label .gateway-option {
            border-color: #0d6efd;
            background-color: #e7f1ff;
        }

        .form-wizard-steps li {
            list-style: none;
        }
    </style>
@endpush
