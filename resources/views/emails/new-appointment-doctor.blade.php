<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Appointment Booked</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; color: #334155; }
        .wrapper { max-width: 580px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(15,23,42,.08); }
        .header { background: linear-gradient(135deg, #1d4ed8, #2563eb); padding: 36px 32px; text-align: center; }
        .header h1 { color: #fff; margin: 0 0 6px; font-size: 22px; font-weight: 700; }
        .header p { color: rgba(255,255,255,.85); margin: 0; font-size: 14px; }
        .body { padding: 32px; }
        .greeting { font-size: 16px; margin-bottom: 16px; }
        .intro { font-size: 14px; color: #475569; margin-bottom: 20px; }
        .appt-card { background: #f8fafc; border-radius: 10px; border-left: 4px solid #1d4ed8; padding: 18px 20px; margin: 20px 0; }
        .appt-card h3 { margin: 0 0 14px; font-size: 14px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: .5px; }
        .appt-card .row { display: flex; gap: 8px; margin-bottom: 8px; font-size: 14px; }
        .appt-card .row:last-child { margin-bottom: 0; }
        .appt-card .label { color: #64748b; min-width: 130px; }
        .appt-card .value { font-weight: 600; color: #0f172a; }
        .action-required { background: #fef9ec; border: 1px solid #fcd34d; border-radius: 10px; padding: 16px 20px; margin: 20px 0; }
        .action-required p { margin: 0; font-size: 14px; color: #92400e; line-height: 1.6; }
        .cta { text-align: center; margin: 28px 0; }
        .cta a { background: linear-gradient(135deg, #1d4ed8, #2563eb); color: #fff; text-decoration: none; padding: 14px 36px; border-radius: 8px; font-weight: 700; font-size: 15px; display: inline-block; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 32px; text-align: center; font-size: 12px; color: #94a3b8; line-height: 1.7; }
        .footer a { color: #1d4ed8; text-decoration: none; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>New Appointment Request</h1>
        <p>A patient has booked a consultation with you</p>
    </div>
    <div class="body">
        <p class="greeting">Dear Dr. {{ $appointment['doctorName'] ?? 'Doctor' }},</p>
        <p class="intro">
            You have received a new appointment request from a patient. Please review the details below
            and confirm or manage the appointment through your doctor dashboard.
        </p>

        <div class="appt-card">
            <h3>Appointment Details</h3>
            <div class="row">
                <span class="label">Patient Name</span>
                <span class="value">{{ $appointment['patientName'] ?? 'N/A' }}</span>
            </div>
            <div class="row">
                <span class="label">Date</span>
                <span class="value">
                    @php
                        $d = $appointment['date'] ?? null;
                        echo $d ? \Carbon\Carbon::parse($d)->format('l, F j, Y') : 'N/A';
                    @endphp
                </span>
            </div>
            <div class="row">
                <span class="label">Time (Your Local)</span>
                <span class="value">{{ $appointment['doctorLocalTime'] ?? (($appointment['startTime'] ?? '') . ' – ' . ($appointment['endTime'] ?? '')) }}</span>
            </div>
            <div class="row">
                <span class="label">Consultation Type</span>
                <span class="value">Video Consultation</span>
            </div>
            @if(!empty($appointment['amount']))
            <div class="row">
                <span class="label">Amount Paid</span>
                <span class="value">${{ number_format($appointment['amount'], 2) }}</span>
            </div>
            @endif
            @if(!empty($appointment['symptoms']))
            <div class="row">
                <span class="label">Symptoms</span>
                <span class="value">{{ $appointment['symptoms'] }}</span>
            </div>
            @endif
            @if(!empty($appointment['notes']))
            <div class="row">
                <span class="label">Notes</span>
                <span class="value">{{ $appointment['notes'] }}</span>
            </div>
            @endif
        </div>

        <div class="action-required">
            <p>
                <strong>Action Required:</strong> Please log in to your dashboard to confirm or manage this appointment.
                The patient will be notified once you confirm.
            </p>
        </div>

        <div class="cta">
            <a href="{{ url('/doctor/appointments') }}">View Appointments</a>
        </div>

        <p style="font-size:14px; color:#334155; margin-top:24px;">
            Thank you for being part of PriGina Global Telemed.<br>
            <em>Healthcare without borders.</em>
        </p>
    </div>
    <div class="footer">
        <strong>PriGina Global Telemed Team</strong><br>
        <a href="{{ config('app.url') }}">{{ config('app.url') }}</a> &nbsp;|&nbsp;
        <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a><br><br>
        &copy; {{ date('Y') }} PriGina Global Telemed. All rights reserved.
    </div>
</div>
</body>
</html>
