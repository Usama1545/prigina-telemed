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
        let zp = null;
        let callEndHandled = false;

        function saveCallRecord(status, endTime) {
            console.log('SAVE CALL', status, endTime, callStartTime);
            if (callSaved) return;
            callSaved = true;

            const duration = (callStartTime && endTime) ?
                Math.round((endTime - callStartTime) / 1000) : 0;

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
            }).then(() => {
                console.log('Call record saved successfully');
            }).catch(err => {
                console.error('Failed to save call record:', err);
            });
        }

        function handleCallEnd(status) {
            if (callEndHandled) return;
            callEndHandled = true;

            console.log('Call ended with status:', status);
            saveCallRecord(status, Date.now());

            // Redirect after saving
            setTimeout(() => {
                window.location.href = backUrl;
            }, 500);
        }

        function log(msg, cls = '') {
            console[cls === 'e' ? 'error' : 'log']('[ZEGO]', msg);
        }

        function showErr(msg) {
            log(msg, 'e');
            document.getElementById('errText').textContent = msg;
            document.getElementById('errBanner').style.display = 'block';
        }

        // Validation
        if (!appID) {
            showErr('ZEGO_APP_ID missing');
            throw new Error('ZEGO_APP_ID missing');
        }

        if (!serverToken) {
            showErr('ZEGO token missing');
            throw new Error('ZEGO token missing');
        }

        // Main initialization
        (async function() {
            try {
                const kitToken = ZegoUIKitPrebuilt.generateKitTokenForProduction(
                    appID,
                    serverToken,
                    roomID,
                    userID,
                    userName
                );

                zp = ZegoUIKitPrebuilt.create(kitToken);

                // Add ZIM plugin
                zp.addPlugins({
                    ZIM
                });

                // Set up call event handlers BEFORE joining
                setupCallEventHandlers();

                // Join the room (this shows the UI)
                await joinRoom();

                // Send invitation after joining
                setTimeout(() => startCall(), 2000);

            } catch (err) {
                console.error(err);
                showErr('Failed to initialise call: ' + (err.message || err));
            }
        })();

        function setupCallEventHandlers() {
            // Set up invitation config for receiving events
            zp.setCallInvitationConfig({
                enableNotifyWhenAppRunningInBackgroundOrQuit: true,

                onIncomingCallReceived(callID, caller, callType, callees) {
                    console.log('Incoming call received from:', caller.userName);
                },

                onIncomingCallCanceled() {
                    console.log('Incoming call canceled');
                    handleCallEnd('missed');
                },

                onIncomingCallRejected() {
                    console.log('Incoming call rejected');
                    handleCallEnd('rejected');
                },

                onIncomingCallTimeout() {
                    console.log('Incoming call timeout');
                    handleCallEnd('missed');
                },

                onOutgoingCallAccepted() {
                    console.log('Outgoing call accepted');
                    callStartTime = Date.now();
                    callStatus = 'completed';
                },

                onOutgoingCallRejected() {
                    console.log('Outgoing call rejected');
                    handleCallEnd('rejected');
                },

                onOutgoingCallDeclined() {
                    console.log('Outgoing call declined');
                    handleCallEnd('rejected');
                },

                onOutgoingCallTimeout() {
                    console.log('Outgoing call timeout');
                    handleCallEnd('missed');
                },

                onCallEnd() {
                    console.log('Call ended event fired');
                    handleCallEnd(callStatus);
                }
            });
        }

        async function joinRoom() {
            return new Promise((resolve, reject) => {
                try {
                    // Configure the UI
                    const config = {
                        showPreJoinView: false, // Skip pre-join screen
                        showScreenSharingButton: false,
                        showTextChat: false,
                        showInviteButton: false,
                        showRemoveUserButton: false,
                        turnOnMicrophoneWhenJoining: true,
                        turnOnCameraWhenJoining: false,
                        showMyCameraToggleButton: false,
                        showAudioVideoSettingsButton: true,
                        onLeaveRoom: () => {
                            console.log('Left room');
                            handleCallEnd(callStatus);
                        },
                        onUserLeave: (users) => {
                            console.log('User left:', users);
                            // If the other person left and call was accepted
                            if (callStartTime && !callEndHandled) {
                                handleCallEnd(callStatus);
                            }
                        }
                    };

                    // Join the room
                    zp.joinRoom(roomID, config);
                    resolve();
                } catch (err) {
                    reject(err);
                }
            });
        }

        async function startCall(maxAttempts = 8, retryDelay = 1000) {
            for (let attempt = 1; attempt <= maxAttempts; attempt++) {
                try {
                    console.log(`Sending call invitation (attempt ${attempt}/${maxAttempts})…`);

                    const result = await zp.sendCallInvitation({
                        callees: [{
                            userID: receiverID,
                            userName: receiverName,
                        }],
                        callType: ZegoUIKitPrebuilt.InvitationTypeVoiceCall,
                        timeout: 60,
                    });

                    console.log('Invitation sent successfully', result);
                    return;
                } catch (err) {
                    const code = err?.code || err?.message;

                    if (err?.code === 6000121 && attempt < maxAttempts) {
                        console.log(`ZIM not ready (${err.code}), retrying in ${retryDelay}ms…`);
                        await new Promise(r => setTimeout(r, retryDelay));
                    } else {
                        console.error('Failed to send invitation:', err);
                        showErr('Failed to send invitation: ' + JSON.stringify({
                            code: err?.code,
                            message: err?.message
                        }));
                        return;
                    }
                }
            }
        }

        // Safety net: if page closes unexpectedly
        window.addEventListener('beforeunload', () => {
            if (callStartTime && !callSaved) {
                saveCallRecord(callStatus, Date.now());
            }
        });
    </script>

</body>

</html>
