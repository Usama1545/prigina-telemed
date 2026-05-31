<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ strtoupper(substr($appointment['id'] ?? 'N/A', 0, 8)) }} — PriGina Global Telemed</title>
    <link rel="stylesheet" href="{{ URL::asset('build/css/style.css') }}">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            padding: 32px 16px;
        }

        .page {
            max-width: 760px;
            margin: 0 auto;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 32px rgba(15, 23, 42, .10);
        }

        /* ── Header ── */
        .inv-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 36px 40px 28px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
        }

        .inv-header .brand h1 {
            color: #fff;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -.3px;
        }

        .inv-header .brand p {
            color: rgba(255, 255, 255, .75);
            font-size: 12px;
            margin-top: 4px;
        }

        .inv-header .inv-meta {
            text-align: right;
        }

        .inv-header .inv-meta .inv-number {
            color: #fff;
            font-size: 18px;
            font-weight: 700;
        }

        .inv-header .inv-meta .inv-label {
            color: rgba(255, 255, 255, .7);
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .6px;
            margin-bottom: 2px;
        }

        .inv-header .inv-meta .inv-date {
            color: rgba(255, 255, 255, .85);
            font-size: 13px;
            margin-top: 4px;
        }

        /* ── Status pill ── */
        .status-bar {
            background: #f0fdf4;
            border-bottom: 1px solid #bbf7d0;
            padding: 10px 40px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-bar .pill {
            background: #16a34a;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .status-bar .pill.cancelled {
            background: #dc2626;
        }

        .status-bar .pill.pending {
            background: #d97706;
        }

        .status-bar span.label {
            font-size: 13px;
            color: #475569;
        }

        /* ── Body ── */
        .inv-body {
            padding: 36px 40px;
        }

        /* Parties row */
        .parties {
            display: flex;
            gap: 32px;
            margin-bottom: 32px;
        }

        .party {
            flex: 1;
        }

        .party h4 {
            font-size: 10px;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 10px;
        }

        .party p {
            font-size: 14px;
            color: #334155;
            line-height: 1.7;
        }

        .party p strong {
            color: #0f172a;
            font-size: 15px;
        }

        /* Divider */
        .divider {
            border: none;
            border-top: 1px solid #e2e8f0;
            margin: 0 0 28px;
        }

        /* Service table */
        .service-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 28px;
            font-size: 14px;
        }

        .service-table thead tr {
            background: #f8fafc;
        }

        .service-table th {
            padding: 10px 14px;
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .5px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        .service-table th:last-child,
        .service-table td:last-child {
            text-align: right;
        }

        .service-table td {
            padding: 14px 14px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }

        .service-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* Totals */
        .totals {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 32px;
        }

        .totals-box {
            width: 260px;
        }

        .totals-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            padding: 6px 0;
            color: #475569;
        }

        .totals-row.total {
            border-top: 2px solid var(--primary);
            margin-top: 6px;
            padding-top: 10px;
            font-weight: 700;
            font-size: 16px;
            color: #0f172a;
        }

        /* Payment info */
        .payment-info {
            background: #f8fafc;
            border-radius: 10px;
            padding: 18px 20px;
            margin-bottom: 28px;
        }

        .payment-info h4 {
            font-size: 11px;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: .7px;
            margin-bottom: 12px;
        }

        .payment-info .pi-row {
            display: flex;
            gap: 8px;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .payment-info .pi-row:last-child {
            margin-bottom: 0;
        }

        .payment-info .pi-label {
            color: #64748b;
            min-width: 150px;
        }

        .payment-info .pi-value {
            font-weight: 600;
            color: #0f172a;
            word-break: break-all;
        }

        /* Footer note */
        .inv-note {
            font-size: 12px;
            color: #94a3b8;
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
            line-height: 1.7;
        }

        /* Print button */
        .actions {
            text-align: center;
            padding: 24px 40px 32px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }

        .btn-print {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            border: none;
            padding: 13px 36px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-back {
            color: #64748b;
            font-size: 13px;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        @media print {
            body {
                background: #fff;
                padding: 0;
            }

            .page {
                box-shadow: none;
                border-radius: 0;
            }

            .actions {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="page">

        {{-- Header --}}
        <div class="inv-header">
            <div class="brand">
                <h1>PriGina Global Telemed</h1>
                <p>Healthcare without borders.</p>
            </div>
            <div class="inv-meta">
                <div class="inv-label">Invoice</div>
                <div class="inv-number">#{{ strtoupper(substr($appointment['id'] ?? 'N/A', 0, 8)) }}</div>
                <div class="inv-date">
                    Issued:
                    @php
                        $issuedAt = $appointment['paymentCompletedAt'] ?? ($appointment['createdAt'] ?? null);
                        echo $issuedAt ? \Carbon\Carbon::parse($issuedAt)->format('d M Y') : now()->format('d M Y');
                    @endphp
                </div>
            </div>
        </div>

        {{-- Status bar --}}
        <div class="status-bar">
            @php
                $status = $appointment['paymentStatus'] ?? ($appointment['status'] ?? 'pending');
                $pillClass = $status === 'completed' ? '' : ($status === 'cancelled' ? 'cancelled' : 'pending');
                $pillText = $status === 'completed' ? 'Paid' : ucfirst($status);
            @endphp
            <span class="pill {{ $pillClass }}">{{ $pillText }}</span>
            <span class="label">Payment status for appointment
                #{{ strtoupper(substr($appointment['id'] ?? '', 0, 8)) }}</span>
        </div>

        <div class="inv-body">

            {{-- Parties --}}
            <div class="parties">
                <div class="party">
                    <h4>Billed To</h4>
                    <p>
                        <strong>{{ $appointment['patientName'] ?? 'N/A' }}</strong><br>
                        @if (!empty($appointment['email']))
                            {{ $appointment['email'] }}<br>
                        @endif
                        @if (!empty($appointment['phone']))
                            {{ $appointment['phone'] }}
                        @endif
                    </p>
                </div>
                <div class="party">
                    <h4>Service Provider</h4>
                    <p>
                        <strong>PriGina Global Telemed</strong><br>
                        {{ config('app.url') }}<br>
                        {{ config('mail.from.address') }}
                    </p>
                </div>
                <div class="party">
                    <h4>Consulting Doctor</h4>
                    <p>
                        <strong>Dr. {{ $appointment['doctorName'] ?? 'N/A' }}</strong><br>
                        @if (!empty($appointment['specialty']))
                            {{ $appointment['specialty'] }}
                        @endif
                    </p>
                </div>
            </div>

            <hr class="divider">

            {{-- Service table --}}
            <table class="service-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Appointment Date</th>
                        <th>Time</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            Video Consultation<br>
                            <span style="font-size:12px; color:#64748b;">with Dr.
                                {{ $appointment['doctorName'] ?? 'N/A' }}</span>
                        </td>
                        <td>
                            @php
                                $d = $appointment['date'] ?? null;
                                echo $d ? \Carbon\Carbon::parse($d)->format('d M Y') : 'N/A';
                            @endphp
                        </td>
                        <td>{{ $appointment['patientLocalTime'] ?? ($appointment['startTime'] ?? '') . ' – ' . ($appointment['endTime'] ?? '') }}
                        </td>
                        <td><strong>${{ number_format($appointment['amount'] ?? 0, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>

            {{-- Totals --}}
            <div class="totals">
                <div class="totals-box">
                    <div class="totals-row">
                        <span>Subtotal</span>
                        <span>${{ number_format($appointment['amount'] ?? 0, 2) }}</span>
                    </div>
                    <div class="totals-row">
                        <span>Tax</span>
                        <span>$0.00</span>
                    </div>
                    <div class="totals-row total">
                        <span>Total</span>
                        <span>${{ number_format($appointment['amount'] ?? 0, 2) }}</span>
                    </div>
                </div>
            </div>

            {{-- Payment info --}}
            <div class="payment-info">
                <h4>Payment Information</h4>
                @if (!empty($appointment['paymentMethod']))
                    <div class="pi-row">
                        <span class="pi-label">Payment Method</span>
                        <span class="pi-value">{{ $appointment['paymentMethod'] }}</span>
                    </div>
                @endif
                @if (!empty($appointment['paymentIntentId']))
                    <div class="pi-row">
                        <span class="pi-label">Transaction Reference</span>
                        <span class="pi-value">{{ $appointment['paymentIntentId'] }}</span>
                    </div>
                @endif
                @if (!empty($appointment['paymentCompletedAt']))
                    <div class="pi-row">
                        <span class="pi-label">Payment Date</span>
                        <span
                            class="pi-value">{{ \Carbon\Carbon::parse($appointment['paymentCompletedAt'])->format('d M Y, h:i A') }}</span>
                    </div>
                @endif
                <div class="pi-row">
                    <span class="pi-label">Appointment Status</span>
                    <span class="pi-value">{{ ucfirst($appointment['status'] ?? 'N/A') }}</span>
                </div>
            </div>

            <p class="inv-note">
                Thank you for choosing PriGina Global Telemed.<br>
                For any billing queries, please contact us at <strong>{{ config('mail.from.address') }}</strong>.<br>
                &copy; {{ date('Y') }} PriGina Global Telemed. All rights reserved.
            </p>

        </div>

        {{-- Actions --}}
        <div class="actions">
            <button class="btn-print" onclick="window.print()">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path d="M6 9V2h12v7M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                    <rect x="6" y="14" width="12" height="8" />
                </svg>
                Print / Save as PDF
            </button>
            <a href="{{ route('patient.appointments') }}" class="btn-back">← Back to appointments</a>
        </div>

    </div>

</body>

</html>
