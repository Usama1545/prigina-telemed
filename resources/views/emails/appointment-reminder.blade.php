<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Reminder</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f5f9; margin: 0; padding: 0; color: #334155; }
        .wrapper { max-width: 560px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(15,23,42,.08); }
        .header { background: linear-gradient(135deg, #0ea5e9, #0284c7); padding: 36px 32px; text-align: center; }
        .header img { height: 40px; margin-bottom: 12px; }
        .header h1 { color: #fff; margin: 0; font-size: 22px; font-weight: 700; }
        .header p { color: rgba(255,255,255,.8); margin: 6px 0 0; font-size: 14px; }
        .body { padding: 32px; }
        .greeting { font-size: 16px; margin-bottom: 20px; }
        .appt-card { background: #f8fafc; border-radius: 10px; border-left: 4px solid #0ea5e9; padding: 18px 20px; margin: 20px 0; }
        .appt-card .row { display: flex; gap: 8px; margin-bottom: 8px; font-size: 14px; }
        .appt-card .row:last-child { margin-bottom: 0; }
        .appt-card .label { color: #64748b; min-width: 100px; }
        .appt-card .value { font-weight: 600; color: #0f172a; }
        .cta { text-align: center; margin: 28px 0; }
        .cta a { background: linear-gradient(135deg, #0ea5e9, #0284c7); color: #fff; text-decoration: none; padding: 13px 32px; border-radius: 8px; font-weight: 600; font-size: 15px; display: inline-block; }
        .footer { background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 20px 32px; text-align: center; font-size: 12px; color: #94a3b8; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>Appointment Reminder</h1>
        <p>Your appointment is scheduled for tomorrow</p>
    </div>
    <div class="body">
        <p class="greeting">
            Hi {{ $appointment['patientName'] ?? 'there' }},
        </p>
        <p>This is a friendly reminder that you have an appointment coming up <strong>tomorrow</strong>. Here are the details:</p>

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
            <div class="row">
                <span class="label">Time</span>
                <span class="value">{{ $appointment['time'] ?? $appointment['slotTime'] ?? 'N/A' }}</span>
            </div>
            @if(!empty($appointment['consultationType']))
            <div class="row">
                <span class="label">Type</span>
                <span class="value">{{ ucfirst($appointment['consultationType']) }}</span>
            </div>
            @endif
        </div>

        <p>Please make sure to be available at the scheduled time. If you need to reschedule or cancel, please do so through the app as soon as possible.</p>

        <div class="cta">
            <a href="{{ url('/patient/appointments') }}">View My Appointments</a>
        </div>

        <p style="font-size:13px; color:#64748b;">If you have any questions, please don't hesitate to reach out to us.</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} Prigina Telemed. All rights reserved.<br>
        You're receiving this because you have an upcoming appointment.
    </div>
</div>
</body>
</html>
