<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email</title>
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
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            padding: 36px 32px;
            text-align: center;
        }

        .header .icon {
            font-size: 44px;
            margin-bottom: 12px;
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
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .info-box {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            border-radius: 8px;
            padding: 16px 18px;
            margin: 20px 0;
            font-size: 14px;
            color: #1e40af;
            line-height: 1.5;
        }

        .cta {
            text-align: center;
            margin: 32px 0;
        }

        .cta a {
            background: linear-gradient(135deg, #1d4ed8, #2563eb);
            color: #fff;
            text-decoration: none;
            padding: 16px 40px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 15px;
            display: inline-block;
            letter-spacing: .3px;
        }

        .fallback {
            margin-top: 24px;
            padding: 16px;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .fallback p {
            font-size: 13px;
            color: #64748b;
            margin: 0 0 8px;
        }

        .fallback a {
            font-size: 12px;
            color: #2563eb;
            word-break: break-all;
        }

        .note {
            font-size: 13px;
            color: #94a3b8;
            margin-top: 24px;
            line-height: 1.6;
        }

        .divider {
            border: none;
            border-top: 1px solid #e2e8f0;
            margin: 24px 0;
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
            color: #2563eb;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="icon">✉️</div>
            <h1>Verify Your Email Address</h1>
            <p>One quick step to activate your PriGina account</p>
        </div>
        <div class="body">
            <p class="greeting">Hello Dear User,</p>
            <p class="intro">
                Welcome to <strong>PriGina Global Telemed</strong>! We're excited to have you on board.
                To get started and access all features of your account, please confirm your email address
                by clicking the button below.
            </p>

            <div class="info-box">
                🔒 This link is unique to your account and expires in <strong>24 hours</strong>. Do not share it with
                anyone.
            </div>

            <div class="cta">
                <a href="{{ $verificationLink }}">Verify My Email Address</a>
            </div>

            <div class="fallback">
                <p>If the button above doesn't work, copy and paste the link below into your browser:</p>
                <a href="{{ $verificationLink }}">{{ $verificationLink }}</a>
            </div>

            <hr class="divider">

            <p class="note">
                If you did not create a PriGina account, you can safely ignore this email —
                no action is required and your email will not be added to our system.
            </p>

            <p style="font-size:14px; color:#334155; margin-top:24px;">
                Thank you for choosing PriGina Global Telemed.<br>
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
