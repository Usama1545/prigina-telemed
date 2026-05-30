<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Call — Prigina</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/img/prigina-gav.png') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { width: 100%; height: 100%; overflow: hidden; background: #0f172a; font-family: 'Segoe UI', system-ui, sans-serif; }

        /* Top bar */
        .call-topbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 10;
            display: flex; align-items: center; gap: 14px;
            padding: 12px 20px;
            background: rgba(15, 23, 42, .85);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255,255,255,.06);
        }
        .call-topbar .avatar {
            width: 42px; height: 42px; border-radius: 50%; object-fit: cover;
            border: 2px solid rgba(255,255,255,.2);
        }
        .call-topbar .info { flex: 1; }
        .call-topbar .info .name { color: #f1f5f9; font-weight: 600; font-size: 15px; }
        .call-topbar .info .status { color: #94a3b8; font-size: 12px; }

        /* ZegoUIKit container — full screen minus topbar */
        #zego-call-container {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            z-index: 1;
        }
    </style>
</head>
<body>

<div id="zego-call-container"></div>

<script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>
<script>
    const appID      = {{ (int) config('services.zego.app_id') }};
    const serverToken = @json($token);
    const userID     = @json($user['uid']);
    const userName   = @json($user['name'] ?? 'User');
    const roomID     = "call_{{ $id }}";
    const backUrl    = @json($backUrl ?? url('/dashboard'));

    const kitToken = ZegoUIKitPrebuilt.generateKitTokenForProduction(
        appID, serverToken, roomID, userID, userName
    );

    const zp = ZegoUIKitPrebuilt.create(kitToken);

    zp.joinRoom({
        container:          document.getElementById('zego-call-container'),
        sharedLinks:        [],
        showPreJoinView:    false,
        turnOffCameraOnJoin: true,   // audio-only call
        scenario: {
            mode: ZegoUIKitPrebuilt.OneONoneCall,
        },
        onLeaveRoom: () => {
            window.location.href = backUrl;
        },
        onUserLeave: () => {
            window.location.href = backUrl;
        },
    });
</script>
</body>
</html>
