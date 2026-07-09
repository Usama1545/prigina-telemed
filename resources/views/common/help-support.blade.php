<?php $page = $role . '-help-support'; ?>
@extends('layouts.mainlayout')

@section('content')

    @php
        $isDoctor = $role === 'doctor';
        $ticketRoute = $isDoctor ? route('doctor.help-support.ticket') : route('patient.help-support.ticket');
        $myTicketsRoute = $isDoctor ? route('doctor.my-tickets') : route('patient.my-tickets');
        $faqRoute = $isDoctor ? route('doctor-faqs') : route('patient-faqs');
        $user = current_user();
    @endphp

    <div class="content {{ $role }}-content">
        <div class="container {{ $isDoctor ? 'doc-container' : '' }}">
            <div class="row">

                <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('partials.' . $role . '-sidebar')
                </div>

                <div class="col-lg-8 col-xl-9">

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3 pt-3">
                        <div>
                            <span class="fw-bold text-dark" style="font-size:18px;">{{ __('app.help_support.title') }}</span>
                        </div>
                        <a href="{{ $myTicketsRoute }}" class="btn btn-outline-primary btn-sm">
                            <i class="isax isax-message-question me-1"></i> {{ __('app.help_support.my_tickets') }}
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Quick help --}}
                    <div class="row g-3 mb-4">
                        <div class="col-6 col-md-3">
                            <a href="#submitTicketCard" class="text-decoration-none">
                                <div class="card border-0 shadow-sm h-100 text-center p-3">
                                    <i class="isax isax-message-add text-primary mb-2" style="font-size:22px;"></i>
                                    <span class="small fw-semibold text-dark">{{ __('app.help_support.submit_ticket') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="mailto:{{ $contact['email'] }}" class="text-decoration-none">
                                <div class="card border-0 shadow-sm h-100 text-center p-3">
                                    <i class="isax isax-sms text-primary mb-2" style="font-size:22px;"></i>
                                    <span class="small fw-semibold text-dark">{{ __('app.help_support.email_support') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="tel:{{ $contact['phone'] }}" class="text-decoration-none">
                                <div class="card border-0 shadow-sm h-100 text-center p-3">
                                    <i class="isax isax-call text-primary mb-2" style="font-size:22px;"></i>
                                    <span class="small fw-semibold text-dark">{{ __('app.help_support.call_support') }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-3">
                            <a href="#businessHours" data-bs-toggle="collapse" class="text-decoration-none">
                                <div class="card border-0 shadow-sm h-100 text-center p-3">
                                    <i class="isax isax-clock text-primary mb-2" style="font-size:22px;"></i>
                                    <span class="small fw-semibold text-dark">{{ __('app.help_support.business_hours') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div id="businessHours" class="collapse mb-4">
                        <div class="alert alert-light border">
                            <i class="isax isax-clock me-1"></i> {{ $contact['hours'] }}
                        </div>
                    </div>

                    {{-- FAQs pointer --}}
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4 d-flex align-items-center justify-content-between flex-wrap gap-2">
                            <div>
                                <h6 class="mb-1">{{ __('app.help_support.faqs_title') }}</h6>
                                <p class="text-muted small mb-0">{{ __('app.help_support.faqs_subtitle') }}</p>
                            </div>
                            <a href="{{ $faqRoute }}" class="btn btn-outline-primary btn-sm">
                                {{ __('app.help_support.view_faqs') }}
                            </a>
                        </div>
                    </div>

                    {{-- Contact info --}}
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h6 class="mb-3">{{ __('app.help_support.contact_info') }}</h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="text-muted small">{{ __('app.help_support.email') }}</div>
                                    <a href="mailto:{{ $contact['email'] }}" class="fw-semibold">{{ $contact['email'] }}</a>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-muted small">{{ __('app.help_support.phone') }}</div>
                                    <a href="tel:{{ $contact['phone'] }}" class="fw-semibold">{{ $contact['phone'] }}</a>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-muted small">{{ __('app.help_support.response_time') }}</div>
                                    <span class="fw-semibold">{{ $contact['responseTime'] }}</span>
                                </div>
                            </div>
                            @if (!empty($contact['emergencyNote']))
                                <div class="alert alert-warning mt-3 mb-0 py-2 px-3 small">
                                    <i class="isax isax-info-circle me-1"></i>{{ $contact['emergencyNote'] }}
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Submit ticket --}}
                    <div class="report-section card border-0 shadow-sm mb-4" id="submitTicketCard">
                        <div class="card-body p-4">
                            <h6 class="mb-3">{{ __('app.help_support.ticket_form_title') }}</h6>
                            <form method="POST" action="{{ $ticketRoute }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.help_support.name') }}</label>
                                        <input type="text" class="form-control" value="{{ $user['name'] ?? '' }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{ __('app.help_support.email') }}</label>
                                        <input type="text" class="form-control" value="{{ $user['email'] ?? '' }}" readonly>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.help_support.subject') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="subject" value="{{ old('subject') }}" required
                                            class="form-control" maxlength="255">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.help_support.message') }} <span class="text-danger">*</span></label>
                                        <textarea name="message" rows="5" required class="form-control">{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="isax isax-send-2 me-1"></i> {{ __('app.help_support.submit') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
