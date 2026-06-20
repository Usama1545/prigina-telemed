<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Complete</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; color: #334155; }
        .wrapper { max-width: 580px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(15,23,42,.08); }
        .header { background: linear-gradient(135deg, #0891b2, #0e7490); padding: 36px 32px; text-align: center; }
        .header h1 { color: #fff; margin: 0 0 6px; font-size: 22px; font-weight: 700; }
        .header p { color: rgba(255,255,255,.85); margin: 0; font-size: 14px; }
        .body { padding: 32px; }
        .greeting { font-size: 16px; margin-bottom: 16px; }
        .intro { font-size: 14px; color: #475569; margin-bottom: 20px; }
        .appt-card { background: #f8fafc; border-radius: 10px; border-left: 4px solid #0891b2; padding: 18px 20px; margin: 20px 0; }
        .appt-card h3 { margin: 0 0 14px; font-size: 14px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: .5px; }
        .appt-card .row { display: flex; gap: 8px; margin-bottom: 8px; font-size: 14px; }
        .appt-card .row:last-child { margin-bottom: 0; }
        .appt-card .label { color: #64748b; min-width: 110px; }
        .appt-card .value { font-weight: 600; color: #0f172a; }
        .status-badge { display: inline-block; background: #e0f2fe; color: #0369a1; border: 1px solid #7dd3fc; border-radius: 50px; padding: 4px 14px; font-size: 13px; font-weight: 600; margin: 4px 0 16px; }
        .next-steps { background: #f0fdfa; border: 1px solid #99f6e4; border-radius: 10px; padding: 18px 20px; margin: 20px 0; }
        .next-steps h3 { margin: 0 0 10px; font-size: 15px; font-weight: 700; color: #134e4a; }
        .next-steps ul { list-style: none; margin: 0; padding: 0; }
        .next-steps ul li { font-size: 14px; color: #115e59; padding: 4px 0 4px 20px; position: relative; }
        .next-steps ul li::before { content: "→"; position: absolute; left: 0; color: #0891b2; font-weight: 700; }
        .cta { text-align: center; margin: 28px 0; }
        .cta a { background: linear-gradient(135deg, #0891b2, #0e7490); color: #fff; text-decoration: none; padding: 14px 36px; border-radius: 8px; font-weight: 700; font-size: 15px; display: inline-block; margin: 0 6px; }
        .cta a.secondary { background: #f1f5f9; color: #334155; }
        .note { font-size: 13px; color: #64748b; margin-top: 20px; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 32px; text-align: center; font-size: 12px; color: #94a3b8; line-height: 1.7; }
        .footer a { color: #0891b2; text-decoration: none; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Appointment Complete</h1>
        <p>Thank you for consulting with PriGina Global Telemed</p>
    </div>
    <div class="body">
        <p class="greeting">Dear {{ $appointment['patientName'] ?? 'Patient' }},</p>
        <p class="intro">
            Your consultation with <strong>Dr. {{ $appointment['doctorName'] ?? 'your doctor' }}</strong>
            has been completed. We hope the session was helpful and that you are feeling better.
        </p>

        <span class="status-badge">✓ Completed</span>

        <div class="appt-card">
            <h3>Consultation Summary</h3>
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
            <div class="row">
                <span class="label">Type</span>
                <span class="value">Video Consultation</span>
            </div>
        </div>

        <div class="next-steps">
            <h3>What to do next</h3>
            <ul>
                <li>Follow the doctor's advice and any prescribed treatment plan</li>
                <li>Download your consultation report from the patient dashboard</li>
                <li>Book a follow-up appointment if recommended</li>
                <li>Contact support if you have any questions about your consultation</li>
            </ul>
        </div>

        <div style="background:#f0fdf4; border:1px solid #86efac; border-radius:10px; padding:22px 24px; margin:24px 0; text-align:center;">
            <p style="font-size:20px; letter-spacing:4px; margin:0 0 8px;">⭐⭐⭐⭐⭐</p>
            <p style="font-size:15px; font-weight:700; color:#14532d; margin:0 0 6px;">How was your consultation?</p>
            <p style="font-size:13px; color:#166534; margin:0 0 18px;">Your feedback helps other patients find the right doctor and helps us improve our service.</p>
            <a href="{{ $reviewUrl }}" style="background:linear-gradient(135deg,#10b981,#059669); color:#fff; text-decoration:none; padding:12px 32px; border-radius:8px; font-weight:700; font-size:15px; display:inline-block;">Leave a Review</a>
            <p style="font-size:12px; color:#4ade80; margin:10px 0 0;">Or copy this link: <a href="{{ $reviewUrl }}" style="color:#0284c7; word-break:break-all;">{{ $reviewUrl }}</a></p>
        </div>

        <div class="cta">
            <a href="{{ url('/patient/appointments') }}">View My Appointments</a>
        </div>

        <p class="note">
            If you experience any worsening symptoms, please seek immediate medical attention or contact an emergency service.
        </p>

        <p style="font-size:14px; color:#334155; margin-top:24px;">
            Thank you for trusting PriGina Global Telemed.<br>
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
