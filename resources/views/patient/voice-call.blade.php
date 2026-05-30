```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Audio Call — Prigina</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/img/prigina-gav.png') }}">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow: hidden;
            background: #0f172a;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        #zego-container {
            width: 100%;
            height: 100vh;
        }

        #errBanner {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            background: #7f1d1d;
            color: #fca5a5;
            padding: 12px 20px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
        }

        #errBanner a {
            color: #fde68a;
            margin-left: 16px;
            cursor: pointer;
            text-decoration: underline;
        }

        #dbgLog {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 9999;
            max-height: 220px;
            overflow-y: auto;
            background: rgba(0, 0, 0, .92);
            font-family: monospace;
            font-size: 11px;
            color: #94a3b8;
            padding: 8px;
        }

        #dbgLog .e {
            color: #f87171;
        }

        #dbgLog .s {
            color: #86efac;
        }

        #dbgToggle {
            position: fixed;
            bottom: 8px;
            right: 8px;
            z-index: 10000;
            background: rgba(255, 255, 255, .12);
            border: none;
            color: #94a3b8;
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div id="errBanner">
        <span id="errText"></span>
        <a onclick="window.location.href=backUrl">Go back</a>
    </div>

    <div id="zego-container"></div>

    <button id="dbgToggle">🐛</button>

    <div id="dbgLog"></div>

    <!-- ZIM SIGNALLING -->
    <script src="https://unpkg.com/zego-zim-web/index.js"></script>

    <!-- ZEGO PREBUILT -->
    <script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>

    <script>
        const appID = {{ (int) config('services.zego.app_id') }};

        const serverToken = @json($token);

        const userID = @json($user['uid']);

        const userName = @json($user['name'] ?? 'User');

        const roomID = "call_{{ substr(md5($id), 0, 12) }}";

        const receiverID = @json($doctor['uid'] ?? '');

        const receiverName = @json($doctor['name'] ?? 'User');

        const backUrl = @json($backUrl ?? url('/dashboard'));

        // ─────────────────────────────────────────────────────────────
        // Debug Logger
        // ─────────────────────────────────────────────────────────────

        const dbg = document.getElementById('dbgLog');

        function log(msg, cls = '') {

            const ts = new Date().toTimeString().slice(0, 8);

            const line = document.createElement('div');

            if (cls) line.className = cls;

            line.textContent = `[${ts}] ${msg}`;

            dbg.appendChild(line);

            dbg.scrollTop = dbg.scrollHeight;

            console[cls === 'e' ? 'error' : 'log']('[ZEGO]', msg);
        }

        document.getElementById('dbgToggle').onclick = () => {

            dbg.style.display =
                dbg.style.display === 'block' ?
                'none' :
                'block';
        };

        // ─────────────────────────────────────────────────────────────
        // Error UI
        // ─────────────────────────────────────────────────────────────

        function showErr(msg) {

            log(msg, 'e');

            document.getElementById('errText').textContent = msg;

            document.getElementById('errBanner').style.display = 'block';
        }

        // ─────────────────────────────────────────────────────────────
        // Validation
        // ─────────────────────────────────────────────────────────────

        log(`appID=${appID}`);
        log(`roomID=${roomID}`);
        log(`userID=${userID}`);
        log(`receiverID=${receiverID}`);

        if (!appID) {
            showErr('ZEGO_APP_ID missing');
            throw new Error('ZEGO_APP_ID missing');
        }

        if (!serverToken) {
            showErr('ZEGO token missing');
            throw new Error('ZEGO token missing');
        }

        // ─────────────────────────────────────────────────────────────
        // ZEGO INIT
        // ─────────────────────────────────────────────────────────────

        try {

            const kitToken =
                ZegoUIKitPrebuilt.generateKitTokenForProduction(
                    appID,
                    serverToken,
                    roomID,
                    userID,
                    userName
                );

            log('Kit token generated', 's');

            const zp = ZegoUIKitPrebuilt.create(kitToken);

            log('ZEGO instance created', 's');

            // IMPORTANT
            zp.addPlugins({
                ZIM,
            });

            log('ZIM plugin attached', 's');

            // ─────────────────────────────────────────────────────────
            // Incoming Call Listener
            // ─────────────────────────────────────────────────────────

            zp.setCallInvitationConfig({

                enableNotifyWhenAppRunningInBackgroundOrQuit: true,

                onIncomingCallReceived(callID, caller, callType, callees) {

                    log(
                        `Incoming call from ${caller.userName}`,
                        's'
                    );
                },

                onIncomingCallCanceled() {

                    log('Incoming call canceled');
                },

                onIncomingCallRejected() {

                    log('Incoming call rejected');
                },

                onIncomingCallTimeout() {

                    log('Incoming call timeout');
                },

                onOutgoingCallAccepted() {

                    log('Call accepted', 's');
                },

                onOutgoingCallRejected() {

                    log('Call rejected');
                },

                onOutgoingCallTimeout() {

                    log('Outgoing call timeout');
                },
            });

            log('joinRoom called', 's');

            // ─────────────────────────────────────────────────────────
            // SEND INVITATION
            // ─────────────────────────────────────────────────────────

            async function startCall() {

                try {

                    log('Sending call invitation...');

                    await zp.sendCallInvitation({

                        callees: [{
                            userID: receiverID,
                            userName: receiverName,
                        }],

                        callType: ZegoUIKitPrebuilt.InvitationTypeVoiceCall,

                        timeout: 60,
                    });

                    log('Invitation sent', 's');

                } catch (err) {

                    console.error(err);

                    showErr(
                        'Failed to send invitation: ' +
                        (err.message || err)
                    );
                }
            }

            // Auto start
            startCall();

        } catch (err) {

            console.error(err);

            showErr(
                'Failed to initialise call: ' +
                (err.message || err)
            );
        }
    </script>

</body>

</html>
```
