<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Call — Prigina</title>
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
            max-height: 200px;
            overflow-y: auto;
            background: rgba(0, 0, 0, .88);
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
            background: rgba(255, 255, 255, .1);
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
        const userName = @json($user['name'] ?: 'User');
        const roomID = "call_{{ substr(md5($id), 0, 12) }}";
        const receiverID = @json($doctor['uid'] ?? '');
        const receiverName = @json($doctor['name'] ?? 'User');
        const backUrl = @json($backUrl ?? url('/dashboard'));

        // ── Logging ───────────────────────────────────────────────────────────────────
        const dbg = document.getElementById('dbgLog');

        function log(msg, cls) {
            const ts = new Date().toTimeString().slice(0, 8);
            const line = document.createElement('div');
            if (cls) line.className = cls;
            line.textContent = `[${ts}] ${msg}`;
            dbg.appendChild(line);
            dbg.scrollTop = dbg.scrollHeight;
            console[cls === 'e' ? 'error' : 'log']('[ZegoCall]', msg);
        }
        document.getElementById('dbgToggle').onclick = () => {
            dbg.style.display = dbg.style.display === 'block' ? 'none' : 'block';
        };
        document.addEventListener('keydown', e => {
            if (e.key === 'd' || e.key === 'D') dbg.style.display = dbg.style.display === 'block' ? 'none' :
            'block';
        });

        function showErr(msg) {
            log(msg, 'e');
            document.getElementById('errText').textContent = msg;
            document.getElementById('errBanner').style.display = 'block';
        }

        log(`appID=${appID}`);
        log(`roomID=${roomID}`);
        log(`userID=${userID}`);
        log(`receiverID=${receiverID}`);

        if (!appID) {
            showErr('ZEGO_APP_ID is not configured.');
        }
        if (!serverToken) {
            showErr('Token generation failed — check ZEGO_SERVER_SECRET.');
        }

        // ── ZegoUIKit Prebuilt ────────────────────────────────────────────────────────
        try {
            const kitToken = ZegoUIKitPrebuilt.generateKitTokenForProduction(
                appID, serverToken, roomID, userID, userName
            );
            // log('Kit token generated', 's');

            const zp = ZegoUIKitPrebuilt.create(kitToken);
            // log('ZEGO instance created', 's');

            zp.addPlugins({
                ZIM
            });
            // log('ZIM plugin attached', 's');

            zp.setCallInvitationConfig({

                enableNotifyWhenAppRunningInBackgroundOrQuit: true,

                onIncomingCallReceived(callID, caller, callType, callees) {
                    // log(`Incoming call from ${caller.userName}`, 's');
                },

                onIncomingCallCanceled() {
                    // log('Incoming call canceled');
                },

                onIncomingCallRejected() {
                    // log('Incoming call rejected');
                },

                onIncomingCallTimeout() {
                    // log('Incoming call timeout');
                },

                onOutgoingCallAccepted() {
                    // log('Call accepted', 's');
                },

                onOutgoingCallRejected() {
                    // log('Call rejected');
                    window.location.href = backUrl;
                },

                onOutgoingCallTimeout() {
                    // log('Outgoing call timeout');
                    window.location.href = backUrl;
                },

                onCallEnd() {
                    // log('Call ended, redirecting…');
                    window.location.href = backUrl;
                },
            });

            // ── SEND INVITATION (with ZIM-ready retry) ────────────────────────────────
            // ZIM login is async — error 6000121 means "not logged in yet".
            // Retry up to 8 times with 1 s gaps before giving up.
            async function startCall(maxAttempts = 8, retryDelay = 1000) {

                for (let attempt = 1; attempt <= maxAttempts; attempt++) {

                    try {

                        // log(`Sending video call invitation (attempt ${attempt}/${maxAttempts})…`);

                        await zp.sendCallInvitation({

                            callees: [{
                                userID: receiverID,
                                userName: receiverName,
                            }],

                            callType: ZegoUIKitPrebuilt.InvitationTypeVideoCall,

                            timeout: 60,
                        });

                        // log('Invitation sent', 's');
                        return;

                    } catch (err) {

                        // 6000121 = ZIM not logged in yet; wait and retry
                        if (err?.code === 6000121 && attempt < maxAttempts) {

                            // log(`ZIM not ready (${err.code}), retrying in ${retryDelay}ms…`);

                            await new Promise(r => setTimeout(r, retryDelay));

                        } else {

                            console.error(err);

                            showErr(
                                'Failed to send invitation: ' +
                                JSON.stringify({
                                    code: err?.code,
                                    message: err?.message
                                })
                            );

                            return;
                        }
                    }
                }
            }

            // Kick off after a short initial pause so ZIM can log in
            setTimeout(() => startCall(), 1500);

        } catch (err) {
            showErr('Failed to initialise call: ' + (err.message || err));
        }
    </script>
</body>

</html>
