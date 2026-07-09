<?php $page = $role . '-my-tickets'; ?>
@extends('layouts.mainlayout')

@section('content')

    @php
        $isDoctor = $role === 'doctor';
        $helpSupportRoute = $isDoctor ? route('doctor.help-support') : route('patient.help-support');

        $statusMeta = [
            'open' => ['badge' => 'bg-warning text-dark', 'label' => __('app.help_support.status_open')],
            'in_progress' => ['badge' => 'bg-info text-dark', 'label' => __('app.help_support.status_in_progress')],
            'resolved' => ['badge' => 'bg-success', 'label' => __('app.help_support.status_resolved')],
        ];
    @endphp

    <div class="content {{ $role }}-content">
        <div class="container {{ $isDoctor ? 'doc-container' : '' }}">
            <div class="row">

                <div class="col-lg-4 col-xl-3 theiaStickySidebar">
                    @include('partials.' . $role . '-sidebar')
                </div>

                <div class="col-lg-8 col-xl-9">

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3 pt-3">
                        <span class="fw-bold text-dark" style="font-size:18px;">{{ __('app.help_support.my_tickets') }}</span>
                        <a href="{{ $helpSupportRoute }}" class="btn btn-primary btn-sm">
                            <i class="isax isax-message-add me-1"></i> {{ __('app.help_support.submit_ticket') }}
                        </a>
                    </div>

                    @forelse ($tickets as $ticket)
                        @php
                            $status = $ticket['status'] ?? 'open';
                            $meta = $statusMeta[$status] ?? $statusMeta['open'];
                            $createdAt = !empty($ticket['createdAt']) ? \Carbon\Carbon::parse($ticket['createdAt'])->format('M d, Y \a\t h:i A') : '';
                        @endphp
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                                    <h6 class="mb-0">{{ $ticket['subject'] ?? '' }}</h6>
                                    <span class="badge {{ $meta['badge'] }}">{{ $meta['label'] }}</span>
                                </div>
                                <p class="text-muted small mb-2">{{ __('app.help_support.created_on') }} {{ $createdAt }}</p>
                                <p class="mb-0" style="white-space:pre-wrap;">{{ $ticket['message'] ?? '' }}</p>
                                @if ($status !== 'resolved')
                                    <div class="alert alert-light border mt-3 mb-0 py-2 px-3 small">
                                        <i class="isax isax-clock me-1"></i>{{ __('app.help_support.awaiting_response') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4 text-center text-muted">
                                {{ __('app.help_support.no_tickets') }}
                            </div>
                        </div>
                    @endforelse

                </div>

            </div>
        </div>
    </div>

@endsection
