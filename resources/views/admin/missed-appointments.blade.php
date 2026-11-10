<?php $page = 'missed-appointments'; ?>
@extends('admin.layout.mainlayout')
@section('content')
    @php
        $confirmText = [
            'refund_patient' => 'Cancel the appointment and refund the held payment to the patient?',
            'pay_doctor' => 'Mark the appointment completed and release the held payment to the doctor?',
            'reschedule_allowed' => 'Keep the appointment and payment, and let the patient or doctor pick a new time?',
            'dismissed' => 'Close the reports without changing the appointment or the payment?',
        ];
        $fmt = fn ($value) => ($t = \App\Support\AppointmentTime::toUtc($value)) ? $t->format('M j, Y g:i A').' UTC' : '';
    @endphp
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Missed Appointments</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Missed Appointments</li>
                        </ul>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <p class="text-muted small">
                Confirmed appointments where no consultation call was held before the call window closed
                (10 minutes after the end). Nothing changes until you decide.
            </p>

            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#missed-review" type="button">
                        Needs review <span class="badge bg-light text-dark ms-1">{{ count($needsReview) }}</span>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#missed-done" type="button">
                        Reviewed <span class="badge bg-light text-dark ms-1">{{ count($done) }}</span>
                    </button>
                </li>
            </ul>

            <div class="tab-content">
                @foreach (['missed-review' => $needsReview, 'missed-done' => $done] as $pane => $cases)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $pane }}">
                        @forelse ($cases as $case)
                            @php
                                $a = $case['appointment'];
                                $review = $case['review'];
                                $activeReports = array_filter($case['reports'], fn ($r) => ($r['status'] ?? '') !== 'voided');
                            @endphp
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start gap-2 flex-wrap">
                                        <div>
                                            <h6 class="fw-bold mb-1">
                                                {{ $a['patientName'] ?? 'Patient' }} &middot; Dr. {{ $a['doctorName'] ?? '' }}
                                            </h6>
                                            <div class="text-muted small">{{ $case['when']['date'] ?? '' }} {{ $case['when']['label'] ?? '' }}</div>
                                            <div class="text-muted small">
                                                APT-{{ substr($a['id'], 0, 8) }} &middot;
                                                ${{ number_format((float) ($a['amount'] ?? 0), 2) }} &middot;
                                                payment {{ strtoupper($a['payoutStatus'] ?? 'held') }} &middot;
                                                status {{ $a['status'] ?? '' }}
                                            </div>
                                        </div>
                                        @if ($review)
                                            <span class="badge bg-secondary">{{ \App\Http\Controllers\Admin\AdminMissedAppointmentController::label($review['decision']) }}</span>
                                        @elseif ($activeReports)
                                            <span class="badge bg-danger">No-show reported</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Missed</span>
                                        @endif
                                    </div>

                                    <hr class="my-2">
                                    <div class="small fw-semibold mb-1">No-show reports</div>
                                    @forelse ($case['reports'] as $r)
                                        @php
                                            $role = $r['reporterRole'] ?? '';
                                            $voided = ($r['status'] ?? '') === 'voided';
                                        @endphp
                                        <div class="small {{ $voided ? 'text-muted text-decoration-line-through' : '' }}">
                                            &bull; {{ $role === 'doctor' ? 'The patient' : 'The doctor' }} didn't join, says the {{ $role }}
                                            ({{ $fmt($r['reportedAt'] ?? null) }}),
                                            {{ ! empty($r['callAttempted']) ? 'who tried calling' : "who didn't try calling" }}
                                            @if (($r['status'] ?? 'active') !== 'active')
                                                [{{ $r['status'] }}]
                                            @endif
                                        </div>
                                    @empty
                                        <div class="small text-muted">Nobody reported a no-show. Neither side may have joined.</div>
                                    @endforelse

                                    @if ($review)
                                        <hr class="my-2">
                                        <div class="small"><strong>Decision:</strong> {{ \App\Http\Controllers\Admin\AdminMissedAppointmentController::label($review['decision']) }}
                                            @if ($decided = $fmt($review['decidedAt'] ?? null))
                                                <span class="text-muted">({{ $decided }})</span>
                                            @endif
                                        </div>
                                        @if (! empty($review['note']))
                                            <div class="small"><strong>Note:</strong> {{ $review['note'] }}</div>
                                        @endif
                                    @endif

                                    @if ($case['isOpen'])
                                        <form method="POST" action="{{ route('admin.missed-appointments.resolve', $a['id']) }}" class="mt-3">
                                            @csrf
                                            <textarea name="note" rows="2" maxlength="500" class="form-control form-control-sm mb-2"
                                                placeholder="Note (shown to the patient and doctor, optional)"></textarea>
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach (['refund_patient' => ['Refund patient', 'btn-outline-danger'], 'pay_doctor' => ['Pay doctor', 'btn-outline-success'], 'reschedule_allowed' => ['Let them reschedule', 'btn-outline-primary'], 'dismissed' => ['Dismiss', 'btn-outline-secondary']] as $decision => [$label, $class])
                                                    @continue($decision === 'dismissed' && ($review['decision'] ?? null) === 'dismissed')
                                                    <button type="submit" name="decision" value="{{ $decision }}" class="btn btn-sm {{ $class }}"
                                                        onclick="return confirm(@js($confirmText[$decision]))">{{ $label }}</button>
                                                @endforeach
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="text-muted py-4 text-center">
                                {{ $pane === 'missed-review' ? 'No missed appointments waiting for review.' : 'No reviewed missed appointments yet.' }}
                            </div>
                        @endforelse
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
