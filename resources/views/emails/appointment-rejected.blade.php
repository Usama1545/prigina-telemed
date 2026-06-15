<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Could Not Be Confirmed</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; color: #334155; }
        .wrapper { max-width: 580px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(15,23,42,.08); }
        .header { background: linear-gradient(135deg, #ea580c, #c2410c); padding: 36px 32px; text-align: center; }
        .header h1 { color: #fff; margin: 0 0 6px; font-size: 22px; font-weight: 700; }
        .header p { color: rgba(255,255,255,.85); margin: 0; font-size: 14px; }
        .body { padding: 32px; }
        .greeting { font-size: 16px; margin-bottom: 16px; }
        .intro { font-size: 14px; color: #475569; margin-bottom: 20px; }
        .appt-card { background: #f8fafc; border-radius: 10px; border-left: 4px solid #ea580c; padding: 18px 20px; margin: 20px 0; }
        .appt-card h3 { margin: 0 0 14px; font-size: 14px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: .5px; }
        .appt-card .row { display: flex; gap: 8px; margin-bottom: 8px; font-size: 14px; }
        .appt-card .row:last-child { margin-bottom: 0; }
        .appt-card .label { color: #64748b; min-width: 110px; }
        .appt-card .value { font-weight: 600; color: #0f172a; }
        .status-badge { display: inline-block; background: #ffedd5; color: #9a3412; border: 1px solid #fed7aa; border-radius: 50px; padding: 4px 14px; font-size: 13px; font-weight: 600; margin: 4px 0 16px; }
        .refund-box { background: #fef9ec; border: 1px solid #fcd34d; border-radius: 10px; padding: 18px 20px; margin: 20px 0; }
        .refund-box h3 { margin: 0 0 10px; font-size: 15px; font-weight: 700; color: #92400e; }
        .refund-box p { margin: 0; font-size: 14px; color: #78350f; line-height: 1.6; }
        .cta { text-align: center; margin: 28px 0; }
        .cta a { background: linear-gradient(135deg, #1d4ed8, #2563eb); color: #fff; text-decoration: none; padding: 14px 36px; border-radius: 8px; font-weight: 700; font-size: 15px; display: inline-block; }
        .note { font-size: 13px; color: #64748b; margin-top: 20px; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 32px; text-align: center; font-size: 12px; color: #94a3b8; line-height: 1.7; }
        .footer a { color: #1d4ed8; text-decoration: none; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Appointment Could Not Be Confirmed</h1>
        <p>We apologise for the inconvenience</p>
    </div>
    <div class="body">
        <p class="greeting">Dear {{ $appointment['patientName'] ?? 'Patient' }},</p>
        <p class="intro">
            We regret to inform you that your appointment with
            <strong>Dr. {{ $appointment['doctorName'] ?? 'your doctor' }}</strong>
            could not be confirmed. This may be due to the doctor's unavailability or a scheduling conflict.
            We sincerely apologise for any inconvenience caused.
        </p>

        <span class="status-badge">✕ Not Confirmed</span>

        <div class="appt-card">
            <h3>Appointment Details</h3>
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
                A full refund will be processed to your original payment method within
                <strong>2 weeks</strong>. Please allow some additional time for your bank or
                payment provider to reflect the amount. If you have not received your refund
                after this period, please contact our support team.
            </p>
        </div>

        <p style="font-size:14px; color:#475569;">
            You are welcome to book a new appointment with another available doctor at your convenience.
        </p>

        <div class="cta">
            <a href="{{ url('/') }}">Find Another Doctor</a>
        </div>

        <p class="note">
            We're sorry for the inconvenience. If you have any questions, please reach out to our support team.
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
