<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Cancelled</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; color: #334155; }
        .wrapper { max-width: 580px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(15,23,42,.08); }
        .header { background: linear-gradient(135deg, #ef4444, #dc2626); padding: 36px 32px; text-align: center; }
        .header h1 { color: #fff; margin: 0 0 6px; font-size: 22px; font-weight: 700; }
        .header p { color: rgba(255,255,255,.85); margin: 0; font-size: 14px; }
        .body { padding: 32px; }
        .greeting { font-size: 16px; margin-bottom: 16px; }
        .intro { font-size: 14px; color: #475569; margin-bottom: 20px; }
        .appt-card { background: #f8fafc; border-radius: 10px; border-left: 4px solid #ef4444; padding: 18px 20px; margin: 20px 0; }
        .appt-card h3 { margin: 0 0 14px; font-size: 14px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: .5px; }
        .appt-card .row { display: flex; gap: 8px; margin-bottom: 8px; font-size: 14px; }
        .appt-card .row:last-child { margin-bottom: 0; }
        .appt-card .label { color: #64748b; min-width: 110px; }
        .appt-card .value { font-weight: 600; color: #0f172a; }
        .refund-box { background: #fef9ec; border: 1px solid #fcd34d; border-radius: 10px; padding: 18px 20px; margin: 24px 0; }
        .refund-box h3 { margin: 0 0 10px; font-size: 15px; font-weight: 700; color: #92400e; }
        .refund-box p { margin: 0; font-size: 14px; color: #78350f; line-height: 1.6; }
        .cta { text-align: center; margin: 28px 0; }
        .cta a { background: linear-gradient(135deg, #0ea5e9, #0284c7); color: #fff; text-decoration: none; padding: 14px 36px; border-radius: 8px; font-weight: 700; font-size: 15px; display: inline-block; }
        .note { font-size: 13px; color: #64748b; margin-top: 20px; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 32px; text-align: center; font-size: 12px; color: #94a3b8; line-height: 1.7; }
        .footer a { color: #0ea5e9; text-decoration: none; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Appointment Cancelled</h1>
        <p>We're sorry to see you go</p>
    </div>
    <div class="body">
        <p class="greeting">Dear {{ $appointment['patientName'] ?? 'Patient' }},</p>
        <p class="intro">
            We want to confirm that your appointment has been successfully cancelled.
            We hope to see you again soon.
        </p>

        <div class="appt-card">
            <h3>Cancelled Appointment Details</h3>
            <div class="row">
                <span class="label">Doctor</span>
                <span class="value">Dr. {{ $appointment['doctorName'] ?? 'N/A' }}</span>
            </div>
            @if(!empty($appointment['specialty']))
            <div class="row">
                <span class="label">Specialty</span>
                <span class="value">{{ $appointment['specialty'] }}</span>
            </div>
            @endif
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
                <span class="label">Time</span>
                <span class="value">{{ $appointment['patientLocalTime'] ?? (($appointment['startTime'] ?? '') . ' – ' . ($appointment['endTime'] ?? '')) }}</span>
            </div>
        </div>

        <div class="refund-box">
            <h3>Refund Information</h3>
            <p>
                If a payment was made for this appointment, your refund will be processed
                and credited back to your original payment method within <strong>2 weeks</strong>
                from the date of cancellation. Please allow some additional time for your
                bank or payment provider to reflect the amount.
            </p>
        </div>

        <p style="font-size:14px; color:#475569;">
            If you have any questions about your refund or would like to rebook, feel free to
            contact our support team or visit your patient dashboard.
        </p>

        <div class="cta">
            <a href="{{ url('/patient/appointments') }}">View My Appointments</a>
        </div>

        <p class="note">
            We're sorry for any inconvenience. Thank you for choosing PriGina Global Telemed.
        </p>

        <p style="font-size:14px; color:#334155; margin-top:24px;">
            Warm regards,<br>
            <strong>PriGina Global Telemed Team</strong><br>
            <em>Healthcare without borders.</em>
        </p>
    </div>
    <div class="footer">
        <a href="{{ config('app.url') }}">{{ config('app.url') }}</a> &nbsp;|&nbsp;
        <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a><br><br>
        &copy; {{ date('Y') }} PriGina Global Telemed. All rights reserved.
    </div>
</div>
</body>
</html>
