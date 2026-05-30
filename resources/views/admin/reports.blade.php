<?php $page = 'reports'; ?>
@extends('admin.layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            {{-- Page Header --}}
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Reports</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Reports</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <span class="text-muted small">
                            <i class="fe fe-clock me-1"></i>Data as of {{ now()->format('d M Y, H:i') }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Tab Navigation --}}
            <ul class="nav nav-tabs nav-tabs-solid mb-4" id="reportTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-overview" data-bs-toggle="tab" href="#pane-overview" role="tab"
                        aria-selected="true">
                        <i class="fe fe-grid me-1"></i>Overview
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-transactions" data-bs-toggle="tab" href="#pane-transactions" role="tab"
                        aria-selected="false">
                        <i class="fe fe-credit-card me-1"></i>Transactions
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-revenue" data-bs-toggle="tab" href="#pane-revenue" role="tab"
                        aria-selected="false">
                        <i class="fe fe-trending-up me-1"></i>Revenue
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-appointments" data-bs-toggle="tab" href="#pane-appointments" role="tab"
                        aria-selected="false">
                        <i class="fe fe-calendar me-1"></i>Appointments
                    </a>
                </li>
            </ul>

            <div class="tab-content pb-4" id="reportTabContent">

                {{-- ══════════ OVERVIEW TAB ══════════ --}}
                <div class="tab-pane fade show active" id="pane-overview" role="tabpanel">

                    {{-- Stat Cards --}}
                    <div class="row g-3 mb-4">
                        <div class="col-xl-3 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Total Revenue',
                                'value' => '$' . number_format($overview['totalRevenue'], 2),
                                'icon' => 'fe-dollar-sign',
                                'color' => 'success',
                            ])
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Total Appointments',
                                'value' => number_format($overview['totalAppointments']),
                                'icon' => 'fe-calendar',
                                'color' => 'primary',
                            ])
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Completed',
                                'value' => number_format($overview['completed']),
                                'icon' => 'fe-check-circle',
                                'color' => 'info',
                            ])
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Pending',
                                'value' => number_format($overview['pending']),
                                'icon' => 'fe-clock',
                                'color' => 'warning',
                            ])
                        </div>
                    </div>

                    {{-- Charts --}}
                    <div class="row g-3 mb-4">
                        <div class="col-lg-8">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Revenue Trend — Last 6 Months</h5>
                                </div>
                                <div class="card-body">
                                    <div style="position:relative;height:260px;">
                                        <canvas id="revenueChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Appointments — Last 7 Days</h5>
                                </div>
                                <div class="card-body">
                                    <div style="position:relative;height:260px;">
                                        <canvas id="apptGrowthChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Quick Stats --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Quick Stats</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Metric</th>
                                            <th class="text-end">Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><i class="fe fe-check-circle text-success me-2"></i>Completed Appointments
                                            </td>
                                            <td class="text-end fw-semibold">{{ number_format($overview['completed']) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="fe fe-clock text-warning me-2"></i>Pending Appointments</td>
                                            <td class="text-end fw-semibold">{{ number_format($overview['pending']) }}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="fe fe-x-circle text-danger me-2"></i>Cancelled Appointments</td>
                                            <td class="text-end fw-semibold">{{ number_format($overview['cancelled']) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><i class="fe fe-bar-chart-2 text-info me-2"></i>Average Appointment Value
                                            </td>
                                            <td class="text-end fw-semibold">${{ number_format($overview['avgValue'], 2) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>{{-- /overview --}}

                {{-- ══════════ TRANSACTIONS TAB ══════════ --}}
                <div class="tab-pane fade" id="pane-transactions" role="tabpanel">

                    {{-- Summary Cards --}}
                    <div class="row g-3 mb-4">
                        <div class="col-xl-3 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Platform Commission',
                                'value' => '$' . number_format($transactions['totalCommission'], 2),
                                'icon' => 'fe-percent',
                                'color' => 'primary',
                                'sub' => '15% of revenue',
                            ])
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Doctor Payouts',
                                'value' => '$' . number_format($transactions['totalDoctor'], 2),
                                'icon' => 'fe-send',
                                'color' => 'success',
                            ])
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Pending Payouts',
                                'value' => number_format($transactions['pendingPayouts']),
                                'icon' => 'fe-alert-circle',
                                'color' => 'warning',
                                'sub' => 'awaiting release',
                            ])
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Avg Transaction',
                                'value' => '$' . number_format($transactions['avgTxn'], 2),
                                'icon' => 'fe-activity',
                                'color' => 'info',
                            ])
                        </div>
                    </div>

                    {{-- Transactions Table --}}
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="card-title mb-0">Recent Transactions</h5>
                            <span class="badge bg-secondary">{{ count($transactions['documents']) }} records</span>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Doctor</th>
                                            <th>Patient</th>
                                            <th>Appt Date</th>
                                            <th>Payment Time</th>
                                            <th class="text-end">Amount</th>
                                            <th class="text-end">Commission</th>
                                            <th class="text-end">Doctor Amt</th>
                                            <th>Method</th>
                                            <th>Payout</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transactions['documents'] as $txn)
                                            @php
                                                $tPayout = $txn['payoutStatus'] ?? 'pending';
                                                $tPayTime = $txn['paymentCompletedAt'] ?? ($txn['createdAt'] ?? null);
                                                $tDate = $txn['date'] ?? ($txn['appointmentDate'] ?? null);
                                            @endphp
                                            <tr>
                                                <td>{{ $txn['doctorName'] ?? '-' }}</td>
                                                <td>{{ $txn['patientName'] ?? '-' }}</td>
                                                <td>{{ $tDate ? \Carbon\Carbon::parse($tDate)->format('d M Y') : '-' }}</td>
                                                <td>{{ $tPayTime ? \Carbon\Carbon::parse($tPayTime)->format('d M Y, H:i') : '-' }}
                                                </td>
                                                <td class="text-end fw-semibold">
                                                    ${{ number_format((float) ($txn['amount'] ?? 0), 2) }}
                                                </td>
                                                <td class="text-end text-muted">
                                                    ${{ number_format($txn['platformCommission'], 2) }}
                                                </td>
                                                <td class="text-end text-success">
                                                    ${{ number_format($txn['doctorAmount'], 2) }}
                                                </td>
                                                <td>{{ $txn['paymentMethod'] ?? 'Stripe' }}</td>
                                                <td>
                                                    @if (in_array($tPayout, ['completed', 'released']))
                                                        <span class="badge bg-success">Completed</span>
                                                    @elseif($tPayout === 'refunded')
                                                        <span class="badge bg-danger">Refunded</span>
                                                    @elseif($tPayout === 'held')
                                                        <span class="badge bg-info text-dark">Held</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-muted py-5">
                                                    <i class="fe fe-inbox d-block mb-2" style="font-size:2rem;"></i>
                                                    No completed transactions found.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>{{-- /transactions --}}

                {{-- ══════════ REVENUE TAB ══════════ --}}
                <div class="tab-pane fade" id="pane-revenue" role="tabpanel">

                    {{-- Stat Cards --}}
                    <div class="row g-3 mb-4">
                        <div class="col-xl-4 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Total Revenue',
                                'value' => '$' . number_format($revenue['totalRevenue'], 2),
                                'icon' => 'fe-dollar-sign',
                                'color' => 'success',
                                'sub' => 'from completed payments',
                            ])
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Avg per Appointment',
                                'value' => '$' . number_format($revenue['avgRevenue'], 2),
                                'icon' => 'fe-trending-up',
                                'color' => 'info',
                            ])
                        </div>
                        <div class="col-xl-4 col-sm-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Paid Appointments',
                                'value' => number_format($revenue['completedCount']),
                                'icon' => 'fe-check-circle',
                                'color' => 'primary',
                            ])
                        </div>
                    </div>

                    {{-- Monthly Revenue Chart --}}
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Monthly Revenue — Last 12 Months</h5>
                        </div>
                        <div class="card-body">
                            <div style="position:relative;height:300px;">
                                <canvas id="revenueMonthlyChart"></canvas>
                            </div>
                        </div>
                    </div>

                    {{-- Monthly Breakdown Table --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Monthly Breakdown</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Month</th>
                                            <th class="text-end">Revenue</th>
                                            <th style="width:45%">Trend</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $maxMonthRev = max(array_column($revenue['monthly'], 'revenue')) ?: 1;
                                        @endphp
                                        @foreach (array_reverse($revenue['monthly']) as $month)
                                            @php $pct = round($month['revenue'] / $maxMonthRev * 100); @endphp
                                            <tr>
                                                <td class="fw-semibold">{{ $month['label'] }}</td>
                                                <td class="text-end">${{ number_format($month['revenue'], 2) }}</td>
                                                <td>
                                                    <div class="progress" style="height:8px;">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width:{{ $pct }}%"
                                                            aria-valuenow="{{ $pct }}" aria-valuemin="0"
                                                            aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>{{-- /revenue --}}

                {{-- ══════════ APPOINTMENTS TAB ══════════ --}}
                <div class="tab-pane fade" id="pane-appointments" role="tabpanel">

                    {{-- Status Counts --}}
                    <div class="row g-3 mb-4">
                        @foreach ([['Total', $appointments['total'], 'primary', 'fe-calendar'], ['Completed', $appointments['completed'], 'success', 'fe-check-circle'], ['Confirmed', $appointments['confirmed'], 'info', 'fe-user-check'], ['Pending', $appointments['pending'], 'warning', 'fe-clock'], ['Cancelled', $appointments['cancelled'], 'danger', 'fe-x-circle']] as [$label, $val, $color, $icon])
                            <div class="col-xl col-sm-6">
                                @include('admin.partials.report-stat-card', [
                                    'title' => $label,
                                    'value' => number_format($val),
                                    'icon' => $icon,
                                    'color' => $color,
                                ])
                            </div>
                        @endforeach
                    </div>

                    {{-- Revenue summary --}}
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Total Revenue',
                                'value' => '$' . number_format($appointments['revenue'], 2),
                                'icon' => 'fe-dollar-sign',
                                'color' => 'success',
                            ])
                        </div>
                        <div class="col-md-6">
                            @include('admin.partials.report-stat-card', [
                                'title' => 'Avg Appointment Value',
                                'value' => '$' . number_format($appointments['avgValue'], 2),
                                'icon' => 'fe-trending-up',
                                'color' => 'info',
                            ])
                        </div>
                    </div>

                    {{-- Distribution + Doughnut --}}
                    <div class="row g-3 mb-4">
                        <div class="col-lg-8">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Status Distribution</h5>
                                </div>
                                <div class="card-body">
                                    @foreach ([['Completed', $appointments['completedPct'], 'success'], ['Confirmed', $appointments['confirmedPct'], 'info'], ['Pending', $appointments['pendingPct'], 'warning'], ['Cancelled', $appointments['cancelledPct'], 'danger']] as [$label, $pct, $color])
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between mb-1">
                                                <span class="fw-semibold">{{ $label }}</span>
                                                <span class="text-muted small">{{ $pct }}%</span>
                                            </div>
                                            <div class="progress" style="height:10px;">
                                                <div class="progress-bar bg-{{ $color }}" role="progressbar"
                                                    style="width:{{ $pct }}%"
                                                    aria-valuenow="{{ $pct }}" aria-valuemin="0"
                                                    aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Breakdown</h5>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <div style="position:relative;max-width:240px;width:100%;">
                                        <canvas id="statusDoughnutChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Daily chart --}}
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Daily Appointments — Last 30 Days</h5>
                        </div>
                        <div class="card-body">
                            <div style="position:relative;height:280px;">
                                <canvas id="apptDailyChart"></canvas>
                            </div>
                        </div>
                    </div>

                </div>{{-- /appointments --}}

            </div>{{-- /tab-content --}}
        </div>
    </div>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // ── PHP → JS data ──────────────────────────────────────────────────────────
        const REPORT = {
            revenueByMonth: @json(array_values($overview['revenueByMonth'])),
            appointmentsByDay: @json(array_values($overview['appointmentsByDay'])),
            revenueMonthly: @json(array_values($revenue['monthly'])),
            apptByDay30: @json(array_values($appointments['appointmentsByDay'])),
            apptStatus: {
                labels: ['Completed', 'Confirmed', 'Pending', 'Cancelled'],
                values: [
                    {{ $appointments['completed'] }},
                    {{ $appointments['confirmed'] }},
                    {{ $appointments['pending'] }},
                    {{ $appointments['cancelled'] }},
                ],
            },
        };

        // ── Palette ────────────────────────────────────────────────────────────────
        const C = {
            success: '#28a745',
            primary: '#0d6efd',
            warning: '#ffc107',
            danger: '#dc3545',
            info: '#17a2b8',
        };

        const baseScales = {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(0,0,0,0.05)'
                }
            },
            x: {
                grid: {
                    display: false
                }
            },
        };

        // ── Guard: only init each chart set once ──────────────────────────────────
        const inited = {};

        function initOverview() {
            if (inited.overview) return;
            inited.overview = true;

            new Chart(document.getElementById('revenueChart'), {
                type: 'bar',
                data: {
                    labels: REPORT.revenueByMonth.map(d => d.label),
                    datasets: [{
                        label: 'Revenue ($)',
                        data: REPORT.revenueByMonth.map(d => d.revenue),
                        backgroundColor: C.success + 'bb',
                        borderColor: C.success,
                        borderWidth: 1,
                        borderRadius: 4,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: ctx => '$' + ctx.parsed.y.toFixed(2)
                            }
                        },
                    },
                    scales: baseScales,
                },
            });

            new Chart(document.getElementById('apptGrowthChart'), {
                type: 'line',
                data: {
                    labels: REPORT.appointmentsByDay.map(d => d.label),
                    datasets: [{
                        label: 'Appointments',
                        data: REPORT.appointmentsByDay.map(d => d.count),
                        borderColor: C.primary,
                        backgroundColor: C.primary + '22',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 3,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        ...baseScales,
                        y: {
                            ...baseScales.y,
                            ticks: {
                                precision: 0
                            }
                        }
                    },
                },
            });
        }

        function initRevenue() {
            if (inited.revenue) return;
            inited.revenue = true;

            new Chart(document.getElementById('revenueMonthlyChart'), {
                type: 'bar',
                data: {
                    labels: REPORT.revenueMonthly.map(d => d.label),
                    datasets: [{
                        label: 'Revenue ($)',
                        data: REPORT.revenueMonthly.map(d => d.revenue),
                        backgroundColor: C.info + 'bb',
                        borderColor: C.info,
                        borderWidth: 1,
                        borderRadius: 4,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: ctx => '$' + ctx.parsed.y.toFixed(2)
                            }
                        },
                    },
                    scales: baseScales,
                },
            });
        }

        function initAppointments() {
            if (inited.appointments) return;
            inited.appointments = true;

            new Chart(document.getElementById('statusDoughnutChart'), {
                type: 'doughnut',
                data: {
                    labels: REPORT.apptStatus.labels,
                    datasets: [{
                        data: REPORT.apptStatus.values,
                        backgroundColor: [C.success, C.info, C.warning, C.danger],
                        borderWidth: 2,
                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 12
                            }
                        }
                    },
                },
            });

            new Chart(document.getElementById('apptDailyChart'), {
                type: 'bar',
                data: {
                    labels: REPORT.apptByDay30.map(d => d.label),
                    datasets: [{
                        label: 'Appointments',
                        data: REPORT.apptByDay30.map(d => d.count),
                        backgroundColor: C.primary + 'bb',
                        borderColor: C.primary,
                        borderWidth: 1,
                        borderRadius: 3,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        ...baseScales,
                        y: {
                            ...baseScales.y,
                            ticks: {
                                precision: 0
                            }
                        },
                        x: {
                            ...baseScales.x,
                            ticks: {
                                maxRotation: 45,
                                minRotation: 30
                            }
                        },
                    },
                },
            });
        }

        // ── Boot: overview is the default visible tab ─────────────────────────────
        document.addEventListener('DOMContentLoaded', initOverview);

        // ── Lazy-init other tabs on first show ────────────────────────────────────
        document.getElementById('tab-revenue')
            ?.addEventListener('shown.bs.tab', initRevenue);
        document.getElementById('tab-appointments')
            ?.addEventListener('shown.bs.tab', initAppointments);
    </script>
@endsection
