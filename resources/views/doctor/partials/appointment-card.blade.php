<div
    class="col-xl-4 col-lg-6 col-md-12 d-flex appointment-card"
    id="appointment-{{ $appointment['id'] }}"
>

    <div class="appointment-wrap appointment-grid-wrap w-100">

        <ul>

            <li>

                <div class="appointment-grid-head d-flex justify-content-between align-items-start">

                    <div class="patinet-information d-flex align-items-center">

                        <a href="#" class="me-2">

                            @if(!empty($appointment['patientImage']))

                                <img
                                    src="{{ $appointment['patientImage'] }}"
                                    alt=""
                                    class="rounded-circle"
                                    style="
                                        width: 50px;
                                        height: 50px;
                                        object-fit: cover;
                                    "
                                >

                            @else

                                <div
                                    class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="
                                        width: 50px;
                                        height: 50px;
                                        background: #e9f2ff;
                                    "
                                >

                                    <i
                                        class="fa-solid fa-user"
                                        style="
                                            color: #0d6efd;
                                            font-size: 20px;
                                        "
                                    ></i>

                                </div>

                            @endif

                        </a>

                        <div class="patient-info">

                            

                            <div class="d-flex align-items-center gap-2 flex-wrap">

                                <h6 class="mb-0">

                                    <a href="#">
                                        {{ $appointment['patientName'] ?? 'Patient' }}
                                    </a>

                                </h6>

                                <a
                                    href="{{ route('doctor.conversation.create', ['patient_id' => $appointment['patientId']]) }}"
                                    class="btn btn-xs btn-outline-primary rounded-pill px-2 py-1"
                                    title="Chat"
                                >

                                    <i class="isax isax-messages-25"></i>

                                </a>

                                <a
                                    href="{{ route('doctor.video-call', $appointment['id']) }}"
                                    class="btn btn-xs btn-outline-success rounded-pill px-2 py-1"
                                    title="Video Call"
                                >

                                    <i class="fa-solid fa-video"></i>

                                </a>

                            </div>

                            <span
                                class="badge mt-2
                                @if(($appointment['status'] ?? '') === 'confirmed')
                                    bg-success
                                @elseif(($appointment['status'] ?? '') === 'pending')
                                    bg-warning
                                @elseif(($appointment['status'] ?? '') === 'cancelled')
                                    bg-danger
                                @else
                                    bg-secondary
                                @endif"
                            >

                                {{ ucfirst($appointment['status'] ?? 'Pending') }}

                            </span>

                        </div>

                    </div>

                    <div>

                        <h6 class="text-primary fw-bold mb-0">
                            ${{ number_format($appointment['amount'] ?? 0, 2) }}
                        </h6>

                    </div>

                </div>

            </li>

            <li class="appointment-info mb-3">

                @php

                    $date = '';

                    if (!empty($appointment['date'])) {

                        if (is_numeric($appointment['date'])) {

                            $date =
                                \Carbon\Carbon::createFromTimestamp(
                                    $appointment['date']
                                )->format('d M Y');

                        } else {

                            $date =
                                \Carbon\Carbon::parse(
                                    $appointment['date']
                                )->format('d M Y');
                        }
                    }

                @endphp

                <div class="mb-2 d-flex align-items-center">

                    <i class="isax isax-calendar-1 me-2 text-primary"></i>

                    <span>
                        {{ $date }}
                    </span>

                </div>

                <div class="mb-2 d-flex align-items-center">

                    <i class="isax isax-clock5 me-2 text-success"></i>

                    <span>

                        {{ $appointment['startTime'] ?? '--' }}
                        -
                        {{ $appointment['endTime'] ?? '--' }}

                    </span>

                </div>

                @if(!empty($appointment['symptoms']))

                    <div class="mt-3">

                        <label class="fw-bold mb-1">
                            Symptoms
                        </label>

                        <p
                            class="mb-0 text-muted"
                            style="
                                display: -webkit-box;
                                -webkit-line-clamp: 2;
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                            "
                        >

                            {{ $appointment['symptoms'] }}

                        </p>

                    </div>

                @endif

            </li>

            @if(!in_array($appointment['status'] ?? '', ['completed', 'cancelled']))

                <li class="appointment-action">

                    <a class="btn btn-primary w-100 confirm-appointment-btn" data-id="{{ $appointment['id'] }}" href="{{ route('doctor.complete-appointment', $appointment['id']) }}">

                        <i class="fa-solid fa-check me-1"></i>

                        Mark as Complete

                    </a>

                </li>

            @endif

        </ul>

    </div>

</div>