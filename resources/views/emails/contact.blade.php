<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; font-size: 15px; }
        .label { font-weight: bold; color: #555; }
        .field { margin-bottom: 14px; }
        .message-box { background: #f4f6f9; padding: 14px; border-radius: 6px; margin-top: 4px; }
    </style>
</head>
<body>
    <h2 style="color:#1a56a0;">New Contact Form Submission</h2>

    <div class="field"><span class="label">Name:</span> {{ $data['name'] }}</div>
    <div class="field"><span class="label">Email:</span> {{ $data['email'] }}</div>
    <div class="field"><span class="label">Phone:</span> {{ $data['phone'] ?: '—' }}</div>
    <div class="field"><span class="label">Service:</span> {{ $data['service'] ?: '—' }}</div>
    <div class="field">
        <span class="label">Message:</span>
        <div class="message-box">{{ $data['message'] }}</div>
    </div>
</body>
</html>
