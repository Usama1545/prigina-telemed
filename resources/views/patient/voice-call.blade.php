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
    </style>
</head>

<body>

    <div id="errBanner">
        <span id="errText"></span>
        <a onclick="window.location.href=backUrl">Go back</a>
    </div>

    <div id="zego-container"></div>

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

        const receiverName = @json($doctor['name'] ?: 'User');

        const backUrl = @json($backUrl ?? url('/dashboard'));

        const conversationId = @json($id);
        const callerId = @json($user['uid']);
        const csrfToken = @json(csrf_token());

        let callStartTime = null;
        let callStatus = 'missed';
        let callSaved = false;

        function saveCallRecord(status, endTime) {
            console.log(
                'SAVE CALL',
                status,
                endTime,
                callStartTime
            );
            if (callSaved) return;
            callSaved = true;
            const duration = (callStartTime && endTime) ?
                Math.round((endTime - callStartTime) / 1000) :
                0;
            fetch(`/conversation/${conversationId}/save-call`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    callerId: callerId,
                    receiverId: receiverID,
                    callType: 'audio',
                    status: status,
                    duration: duration,
                    startTime: callStartTime ? new Date(callStartTime).toISOString() : null,
                    endTime: endTime ? new Date(endTime).toISOString() : null,
                }),
                keepalive: true,
            }).catch(() => {});
        }

        function log(msg, cls = '') {
            console[cls === 'e' ? 'error' : 'log']('[ZEGO]', msg);
        }

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

        console.log(`appID=${appID}`);
        console.log(`roomID=${roomID}`);
        console.log(`userID=${userID}`);
        console.log(`receiverID=${receiverID}`);

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

            console.log('Kit token generated', 's');

            const zp = ZegoUIKitPrebuilt.create(kitToken);

            console.log('ZEGO instance created', 's');

            // IMPORTANT
            zp.addPlugins({
                ZIM,
            });
            setInterval(() => {

                const container =
                    document.getElementById('zego-container');

                console.log(
                    'CHILDREN:',
                    container.children.length
                );

            }, 2000);

            let callStartedAt = null;

            const observer = new MutationObserver(() => {

                const container =
                    document.getElementById('zego-container');

                console.log(
                    'MUTATION',
                    'children:',
                    container.children.length,
                    'html length:',
                    container.innerHTML.length
                );

            });

            observer.observe(
                document.getElementById('zego-container'), {
                    childList: true,
                    subtree: true
                }
            );
            console.log('OBSERVER ATTACHED');

            // ─────────────────────────────────────────────────────────
            // Incoming Call Listener
            // ─────────────────────────────────────────────────────────

            zp.setCallInvitationConfig({

                enableNotifyWhenAppRunningInBackgroundOrQuit: true,


                onInvitationUserStateChanged(userInfos) {
                    console.log(
                        'onInvitationUserStateChanged',
                        JSON.stringify(userInfos)
                    );
                },

                onIncomingCallAcceptButtonPressed() {
                    console.log('ACCEPT BUTTON PRESSED');
                },

                onIncomingCallDeclineButtonPressed() {
                    console.log('DECLINE BUTTON PRESSED');
                },

                onOutgoingCallCancelButtonPressed() {
                    console.log('CANCEL BUTTON PRESSED');
                }

                onIncomingCallReceived(callID, caller, callType, callees) {
                    // caller side only — incoming call on this page is not expected;
                    // do not set callStatus here to avoid corrupting the outgoing record
                },

                onIncomingCallCanceled() {
                    saveCallRecord('missed', Date.now());
                    window.location.href = backUrl;
                },

                onIncomingCallRejected() {
                    saveCallRecord('rejected', Date.now());
                    window.location.href = backUrl;
                },

                onIncomingCallTimeout() {
                    saveCallRecord('missed', Date.now());
                    window.location.href = backUrl;
                },

                onOutgoingCallAccepted() {
                    callStartTime = Date.now();
                    callStatus = 'completed';
                },

                onOutgoingCallRejected() {
                    saveCallRecord('rejected', Date.now());
                    window.location.href = backUrl;
                },

                onOutgoingCallDeclined() {
                    saveCallRecord('rejected', Date.now());
                    window.location.href = backUrl;
                },

                onOutgoingCallTimeout() {
                    saveCallRecord('missed', Date.now());
                    window.location.href = backUrl;
                },

                onCallEnd() {
                    saveCallRecord(callStatus, Date.now());
                    setTimeout(() => {
                        window.location.href = backUrl;
                    }, 400);
                },
            });

            // ─────────────────────────────────────────────────────────
            // SEND INVITATION (with ZIM-ready retry)
            // ─────────────────────────────────────────────────────────

            // ZIM login is async — error 6000121 means "not logged in yet".
            // Retry up to 8 times with 1 s gaps before giving up.
            async function startCall(maxAttempts = 8, retryDelay = 1000) {

                for (let attempt = 1; attempt <= maxAttempts; attempt++) {

                    try {

                        console.log(`Sending call invitation (attempt ${attempt}/${maxAttempts})…`);

                        await zp.sendCallInvitation({

                            callees: [{
                                userID: receiverID,
                                userName: receiverName,
                            }],

                            callType: ZegoUIKitPrebuilt.InvitationTypeVoiceCall,

                            timeout: 60,
                        });

                        console.log('Invitation sent', 's');
                        return;

                    } catch (err) {

                        const code = err?.code ?? err?.message;

                        // 6000121 = ZIM not logged in yet; wait and retry
                        if (err?.code === 6000121 && attempt < maxAttempts) {

                            console.log(`ZIM not ready (${err.code}), retrying in ${retryDelay}ms…`);

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

            console.error(err);

            showErr(
                'Failed to initialise call: ' +
                (err.message || err)
            );
        }

        // Safety net: if ZEGO navigates away without firing onCallEnd, save here
        window.addEventListener('beforeunload', () => {
            console.log('BEFORE UNLOAD');

            if (callStartTime) {
                saveCallRecord(callStatus, Date.now());
            }
        });
    </script>

</body>

</html>
