<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Reminder</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 0;
            color: #334155;
        }

        .wrapper {
            max-width: 580px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(15, 23, 42, .08);
        }

        .header {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            padding: 36px 32px;
            text-align: center;
        }

        .header h1 {
            color: #fff;
            margin: 0 0 6px;
            font-size: 22px;
            font-weight: 700;
        }

        .header p {
            color: rgba(255, 255, 255, .85);
            margin: 0;
            font-size: 14px;
        }

        .body {
            padding: 32px;
        }

        .greeting {
            font-size: 16px;
            margin-bottom: 16px;
        }

        .intro {
            font-size: 14px;
            color: #475569;
            margin-bottom: 20px;
        }

        .appt-card {
            background: #f8fafc;
            border-radius: 10px;
            border-left: 4px solid #0ea5e9;
            padding: 18px 20px;
            margin: 20px 0;
        }

        .appt-card h3 {
            margin: 0 0 14px;
            font-size: 14px;
            font-weight: 700;
            color: #0f172a;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .appt-card .row {
            display: flex;
            gap: 8px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .appt-card .row:last-child {
            margin-bottom: 0;
        }

        .appt-card .label {
            color: #64748b;
            min-width: 110px;
        }

        .appt-card .value {
            font-weight: 600;
            color: #0f172a;
        }

        .checklist {
            margin: 20px 0;
            padding: 0;
        }

        .checklist p {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
            margin: 0 0 10px;
        }

        .checklist ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .checklist ul li {
            font-size: 14px;
            color: #475569;
            padding: 4px 0 4px 20px;
            position: relative;
        }

        .checklist ul li::before {
            content: "•";
            position: absolute;
            left: 4px;
            color: #0ea5e9;
            font-weight: 700;
        }

        .cta {
            text-align: center;
            margin: 28px 0;
        }

        .cta a {
            background: linear-gradient(135deg, #0ea5e9, #0284c7);
            color: #fff;
            text-decoration: none;
            padding: 14px 36px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 15px;
            display: inline-block;
        }

        .note {
            font-size: 13px;
            color: #64748b;
            margin-top: 20px;
        }

        .footer {
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            padding: 20px 32px;
            text-align: center;
            font-size: 12px;
            color: #94a3b8;
            line-height: 1.7;
        }

        .footer a {
            color: #0ea5e9;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <h1>Appointment Reminder</h1>
            <p>Your upcoming appointment with PriGina Global Telemed</p>
        </div>
        <div class="body">
            <p class="greeting">Dear {{ $appointment['patientName'] ?? 'Patient' }},</p>
            <p class="intro">This is a friendly reminder about your upcoming appointment with PriGina Global Telemed.
            </p>

            <div class="appt-card">
                <h3>Appointment Details</h3>
                <div class="row">
                    <span class="label">Doctor</span>
                    <span class="value">Dr. {{ $appointment['doctorName'] ?? 'N/A' }}</span>
                </div>
                @if (!empty($appointment['specialty']))
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
                    <span
                        class="value">{{ $appointment['patientLocalTime'] ?? ($appointment['startTime'] ?? '') . ' – ' . ($appointment['endTime'] ?? '') }}</span>
                </div>
                <div class="row">
                    <span class="label">Consultation</span>
                    <span class="value">Video Consultation</span>
                </div>
            </div>

            <div class="checklist">
                <p>Please ensure you:</p>
                <ul>
                    <li>Have a stable internet connection</li>
                    <li>Join from a quiet and private environment</li>
                    <li>Upload any necessary medical records before your appointment</li>
                    <li>Join a few minutes early</li>
                </ul>
            </div>

            <p style="font-size:14px; color:#475569;">To access your consultation, please click the button below:</p>

            <div class="cta">
                <a href="{{ route('patient.appointments') }}">Join Appointment</a>
            </div>

            <p class="note">If you need to reschedule or cancel your appointment, please do so in advance through your
                patient dashboard.</p>

            <p style="font-size:14px; color:#334155; margin-top:24px;">Thank you for choosing PriGina Global
                Telemed.<br><em>Healthcare without borders.</em></p>
        </div>
        <div class="footer">
            <strong>Warm regards,</strong><br>
            PriGina Global Telemed Team<br>
            <a href="{{ config('app.url') }}">{{ config('app.url') }}</a> &nbsp;|&nbsp;
            <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a><br><br>
            &copy; {{ date('Y') }} PriGina Global Telemed. All rights reserved.
        </div>
    </div>
</body>

</html>
