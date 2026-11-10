{{--
    A missed appointment (CallWindow::isMissed) in the patient's or doctor's
    Missed tab: what happens next, the admin's decision once made, the no-show
    report while it can still be sent (partials/call-gate), and Reschedule when
    an admin allowed it. Refunded / paid-out ones move to Cancelled / Completed.
    Same as the Flutter app's MissedAppointmentPanel.

    @include('partials.missed-appointment-card', ['appointment' => $appointment, 'role' => 'patient'|'doctor'])
--}}
@php
    $t = __('app.missed');
    $when = appointment_when($appointment);
    $review = \App\Support\CallWindow::missedReview($appointment);
    $decision = $review['decision'] ?? null;
    $note = trim($review['note'] ?? '');
    $isDoctor = $role === 'doctor';
    $other = $isDoctor ? ($appointment['patientName'] ?? '') : ($appointment['doctorName'] ?? '');
    [$alert, $icon, $message] = match ($decision) {
        'reschedule_allowed' => ['alert-info', 'fa-calendar-plus', $t['reschedule_allowed']],
        'dismissed' => ['alert-secondary', 'fa-circle-info', $t['reviewed_no_change']],
        default => ['alert-warning', 'fa-hourglass-half', $t['awaiting_review']],
    };
@endphp
<div class="col-xl-4 col-lg-6 col-md-12 d-flex appointment-card" id="appointment-{{ $appointment['id'] }}"
    @if ($decision === null) data-call-gate="appointment={{ urlencode($appointment['id']) }}" @endif>
    <div class="appointment-wrap appointment-grid-wrap w-100">
        <ul>
            <li>
                <div class="appointment-grid-head d-flex justify-content-between align-items-start">
                    <div class="patient-info">
                        <h6 class="mb-1">{{ $other }}</h6>
                        <span class="badge bg-warning text-dark">{{ $t['badge'] }}</span>
                    </div>
                    @if (!empty($appointment['amount']))
                        <h6 class="text-primary fw-bold mb-0">${{ number_format($appointment['amount'], 2) }}</h6>
                    @endif
                </div>
            </li>
            <li class="appointment-info mb-2">
                <div class="mb-2 d-flex align-items-center">
                    <i class="isax isax-calendar-1 me-2 text-primary"></i>
                    <span>{{ $when['date'] }}</span>
                </div>
                <div class="mb-2 d-flex align-items-center">
                    <i class="isax isax-clock5 me-2 text-success"></i>
                    <span>{{ $when['time'] ?: '--' }}</span>
                    <small class="text-muted ms-1" style="font-size:11px;">({{ $when['timezone'] ?? '' }})</small>
                </div>
                <div class="alert {{ $alert }} d-flex align-items-start gap-2 py-2 px-3 mb-2 small" role="status">
                    <i class="fa-solid {{ $icon }} mt-1"></i>
                    <div>
                        {{ $message }}
                        @if ($note !== '')
                            <div class="mt-1 text-muted">{{ str_replace(':note', $note, $t['admin_note']) }}</div>
                        @endif
                    </div>
                </div>
                @if ($decision === null)
                    {{-- Until an admin decides, either side can still report a no-show (see partials/call-gate) --}}
                    <div><small class="call-gate-hint" data-call-hint></small> <span class="call-gate-report" data-call-report></span></div>
                @endif
            </li>
            @if ($decision === 'reschedule_allowed')
                <li class="appointment-action">
                    <button type="button" class="btn btn-primary w-100 reschedule-btn"
                        data-id="{{ $appointment['id'] }}"
                        data-doctor-id="{{ $appointment['doctorId'] ?? '' }}"
                        data-date="{{ $appointment['date'] ?? '' }}"
                        data-start="{{ $appointment['startTime'] ?? '' }}"
                        data-end="{{ $appointment['endTime'] ?? '' }}"
                        data-bs-toggle="modal" data-bs-target="#rescheduleModal">
                        <i class="isax isax-calendar-edit me-1"></i>{{ __('app.appointments.reschedule') }}
                    </button>
                </li>
            @endif
        </ul>
    </div>
</div>
