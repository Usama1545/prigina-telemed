<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Call — Prigina</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/img/prigina-gav.png') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html, body { width: 100%; height: 100%; overflow: hidden; background: #0f172a; font-family: 'Segoe UI', system-ui, sans-serif; }

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
    const appID       = {{ (int) config('services.zego.app_id') }};
    const serverToken = @json($token);
    const userID      = @json($user['uid']);
    const userName    = @json($user['name'] ?? 'User');
    const roomID      = "call_{{ $id }}";
    const backUrl     = @json($backUrl ?? url('/dashboard'));

    const kitToken = ZegoUIKitPrebuilt.generateKitTokenForProduction(
        appID, serverToken, roomID, userID, userName
    );

    const zp = ZegoUIKitPrebuilt.create(kitToken);

    zp.joinRoom({
        container:       document.getElementById('zego-call-container'),
        sharedLinks:     [],
        showPreJoinView: false,
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
