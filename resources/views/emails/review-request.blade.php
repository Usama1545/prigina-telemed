<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Share Your Experience</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; color: #334155; }
        .wrapper { max-width: 560px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(15,23,42,.08); }
        .header { background: linear-gradient(135deg, #10b981, #059669); padding: 36px 32px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 22px; font-weight: 700; }
        .header p { color: rgba(255,255,255,.85); margin: 6px 0 0; font-size: 14px; }
        .body { padding: 32px; }
        .greeting { font-size: 16px; margin-bottom: 20px; }
        .stars { text-align: center; font-size: 32px; letter-spacing: 4px; margin: 24px 0 8px; }
        .appt-card { background: #f8fafc; border-radius: 10px; border-left: 4px solid #10b981; padding: 18px 20px; margin: 20px 0; }
        .appt-card .row { display: flex; gap: 8px; margin-bottom: 8px; font-size: 14px; }
        .appt-card .row:last-child { margin-bottom: 0; }
        .appt-card .label { color: #64748b; min-width: 100px; }
        .appt-card .value { font-weight: 600; color: #0f172a; }
        .cta { text-align: center; margin: 28px 0; }
        .cta a { background: linear-gradient(135deg, #10b981, #059669); color: #fff; text-decoration: none; padding: 14px 36px; border-radius: 8px; font-weight: 700; font-size: 16px; display: inline-block; }
        .cta-sub { text-align: center; font-size: 12px; color: #94a3b8; margin-top: 8px; }
        .cta-sub a { color: #0ea5e9; text-decoration: none; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 32px; text-align: center; font-size: 12px; color: #94a3b8; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>How was your appointment?</h1>
        <p>Your feedback helps other patients find the right doctor</p>
    </div>
    <div class="body">
        <p class="greeting">Hi {{ $appointment['patientName'] ?? 'there' }},</p>

        <p>Your appointment with <strong>Dr. {{ $appointment['doctorName'] ?? 'your doctor' }}</strong> has been completed. We hope everything went well!</p>

        <p>Would you mind taking a moment to share your experience? Your review helps others make informed decisions and helps our doctors improve their service.</p>

        <div class="stars">⭐⭐⭐⭐⭐</div>

        <div class="appt-card">
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
        </div>

        <div class="cta">
            <a href="{{ $reviewUrl }}">Leave a Review</a>
        </div>
        <p class="cta-sub">
            Or copy this link: <a href="{{ $reviewUrl }}">{{ $reviewUrl }}</a>
        </p>

        <p style="font-size:13px; color:#64748b; margin-top:24px;">This review link is unique to your appointment. It only takes about 30 seconds to complete.</p>

        <hr style="border:none; border-top:1px solid #e2e8f0; margin:28px 0;">

        <p style="font-size:14px; color:#334155; margin-bottom:6px;"><strong>Need a copy of your receipt?</strong></p>
        <p style="font-size:13px; color:#64748b; margin-bottom:16px;">You can download or print an invoice for this appointment at any time from the button below.</p>
        <div style="text-align:center; margin-bottom:8px;">
            <a href="{{ $invoiceUrl }}" style="background:#f8fafc; color:#0284c7; text-decoration:none; padding:11px 28px; border-radius:8px; font-weight:600; font-size:14px; display:inline-block; border:1.5px solid #0ea5e9;">
                &#8681; Download Invoice / Receipt
            </a>
        </div>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Prigina Telemed. All rights reserved.<br>
        You received this because you recently completed an appointment on our platform.
    </div>
</div>
</body>
</html>
