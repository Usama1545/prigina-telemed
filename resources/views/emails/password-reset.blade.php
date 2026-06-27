<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
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
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
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

        .warning-box {
            background: #faf5ff;
            border-left: 4px solid #7c3aed;
            border-radius: 8px;
            padding: 16px 18px;
            margin: 20px 0;
            font-size: 14px;
            color: #6d28d9;
            line-height: 1.5;
        }

        .cta {
            text-align: center;
            margin: 32px 0;
        }

        .cta a {
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
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
            color: #7c3aed;
            word-break: break-all;
        }

        .security-tips {
            margin: 24px 0;
        }

        .security-tips p {
            font-size: 14px;
            font-weight: 600;
            color: #0f172a;
            margin: 0 0 10px;
        }

        .security-tips ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .security-tips ul li {
            font-size: 14px;
            color: #475569;
            padding: 4px 0 4px 20px;
            position: relative;
        }

        .security-tips ul li::before {
            content: "•";
            position: absolute;
            left: 0;
            color: #7c3aed;
            font-weight: 700;
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
            color: #7c3aed;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="icon">🔑</div>
            <h1>Password Reset Request</h1>
            <p>We received a request to reset your password</p>
        </div>
        <div class="body">
            <p class="greeting">Hello Dear User,</p>
            <p class="intro">
                We received a request to reset the password for your <strong>PriGina Global Telemed</strong> account.
                Click the button below to choose a new password. This link is valid for <strong>1 hour</strong>.
            </p>

            <div class="warning-box">
                ⚠️ If you did not request a password reset, please ignore this email. Your password will remain
                unchanged and your account is safe.
            </div>

            <div class="cta">
                <a href="{{ $resetLink }}">Reset My Password</a>
            </div>

            <div class="fallback">
                <p>If the button above doesn't work, copy and paste the link below into your browser:</p>
                <a href="{{ $resetLink }}">{{ $resetLink }}</a>
            </div>

            <hr class="divider">

            <div class="security-tips">
                <p>Tips for a strong password:</p>
                <ul>
                    <li>Use at least 8 characters</li>
                    <li>Mix uppercase, lowercase, numbers and symbols</li>
                    <li>Avoid using the same password on multiple sites</li>
                    <li>Never share your password with anyone</li>
                </ul>
            </div>

            <p class="note">
                For your security, this link expires in 1 hour. If you need a new link, visit the
                <a href="{{ config('app.url') }}/forgot-password" style="color:#7c3aed;">forgot password page</a>.
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
