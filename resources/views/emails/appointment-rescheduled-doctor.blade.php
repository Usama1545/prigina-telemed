<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Rescheduled</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; color: #334155; }
        .wrapper { max-width: 580px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(15,23,42,.08); }
        .header { background: linear-gradient(135deg, #7c3aed, #6d28d9); padding: 36px 32px; text-align: center; }
        .header h1 { color: #fff; margin: 0 0 6px; font-size: 22px; font-weight: 700; }
        .header p { color: rgba(255,255,255,.85); margin: 0; font-size: 14px; }
        .body { padding: 32px; }
        .greeting { font-size: 16px; margin-bottom: 16px; }
        .intro { font-size: 14px; color: #475569; margin-bottom: 20px; }
        .appt-card { background: #f8fafc; border-radius: 10px; border-left: 4px solid #7c3aed; padding: 18px 20px; margin: 20px 0; }
        .appt-card h3 { margin: 0 0 14px; font-size: 14px; font-weight: 700; color: #0f172a; text-transform: uppercase; letter-spacing: .5px; }
        .appt-card .row { display: flex; gap: 8px; margin-bottom: 8px; font-size: 14px; }
        .appt-card .row:last-child { margin-bottom: 0; }
        .appt-card .label { color: #64748b; min-width: 110px; }
        .appt-card .value { font-weight: 600; color: #0f172a; }
        .status-badge { display: inline-block; background: #ede9fe; color: #6d28d9; border: 1px solid #c4b5fd; border-radius: 50px; padding: 4px 14px; font-size: 13px; font-weight: 600; margin: 4px 0 16px; }
        .cta { text-align: center; margin: 28px 0; }
        .cta a { background: linear-gradient(135deg, #7c3aed, #6d28d9); color: #fff; text-decoration: none; padding: 14px 36px; border-radius: 8px; font-weight: 700; font-size: 15px; display: inline-block; }
        .note { font-size: 13px; color: #64748b; margin-top: 20px; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 32px; text-align: center; font-size: 12px; color: #94a3b8; line-height: 1.7; }
        .footer a { color: #7c3aed; text-decoration: none; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Appointment Rescheduled &#x1F4C5;</h1>
        <p>You rescheduled an appointment for a patient</p>
    </div>
    <div class="body">
        <p class="greeting">Dear Dr. {{ $appointment['doctorName'] ?? 'Doctor' }},</p>
        <p class="intro">
            This is a confirmation that you have rescheduled the appointment for
            <strong>{{ $appointment['patientName'] ?? 'your patient' }}</strong>.
            The patient has been notified of the new time.
        </p>

        <span class="status-badge">&#x1F504; Rescheduled</span>

        <div class="appt-card">
            <h3>Updated Appointment Details</h3>
            <div class="row">
                <span class="label">Patient</span>
                <span class="value">{{ $appointment['patientName'] ?? 'N/A' }}</span>
            </div>
            <div class="row">
                <span class="label">New Date</span>
                <span class="value">
                    @php
                        $d = $appointment['date'] ?? null;
                        echo $d ? \Carbon\Carbon::parse($d)->format('l, F j, Y') : 'N/A';
                    @endphp
                </span>
            </div>
            <div class="row">
                <span class="label">New Time</span>
                <span class="value">{{ ($appointment['startTime'] ?? '') . ' – ' . ($appointment['endTime'] ?? '') }}</span>
            </div>
            <div class="row">
                <span class="label">Consultation</span>
                <span class="value">Video Consultation</span>
            </div>
        </div>

        <div class="cta">
            <a href="{{ url('/doctor/appointments') }}">View My Appointments</a>
        </div>

        <p class="note">
            If you need to make further changes, you can do so from your doctor dashboard.
        </p>

        <p style="font-size:14px; color:#334155; margin-top:24px;">
            Thank you for using PriGina Global Telemed.<br>
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
