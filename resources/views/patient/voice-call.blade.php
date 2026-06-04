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
            position: relative;
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

        /* Hide Zego's post-call UI and other unwanted elements */
        .zego-leave-room-container,
        .zego-leave-room,
        [class*="post-call"],
        [class*="leave-room"],
        .dialog-post-call,
        .zego-dialog-post-call {
            display: none !important;
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
        let callAccepted = false;
        let forceRedirect = false;

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

            // Force redirect without showing Zego's UI
            forceRedirect = true;

            // Destroy Zego instance to prevent its UI from showing
            if (zp && zp.destroy) {
                try {
                    zp.destroy();
                } catch (e) {
                    console.error('Error destroying Zego:', e);
                }
            }

            // Clear the container
            const container = document.getElementById('zego-container');
            if (container) {
                container.innerHTML = '';
            }

            // Redirect after saving
            setTimeout(() => {
                window.location.href = backUrl;
            }, 500);
        }

        function showErr(msg) {
            console.error('[ZEGO]', msg);
            document.getElementById('errText').textContent = msg;
            document.getElementById('errBanner').style.display = 'block';

            // Redirect back after error
            setTimeout(() => {
                window.location.href = backUrl;
            }, 3000);
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

        if (!receiverID) {
            showErr('Receiver ID missing');
            throw new Error('Receiver ID missing');
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

                // Send invitation directly without joining room first
                await sendDirectCallInvitation();

            } catch (err) {
                console.error('Initialization error:', err);
                showErr('Failed to initialise call: ' + (err.message || err));
            }
        })();

        async function sendDirectCallInvitation(maxAttempts = 5, retryDelay = 1000) {
            // First, wait for ZIM to be ready
            await waitForZIM(maxAttempts, retryDelay);

            // Set up call event handlers
            setupCallEventHandlers();

            // Send the invitation
            for (let attempt = 1; attempt <= maxAttempts; attempt++) {
                try {
                    console.log(`Sending call invitation (attempt ${attempt}/${maxAttempts})…`);

                    const invitationResult = await zp.sendCallInvitation({
                        callees: [{
                            userID: receiverID,
                            userName: receiverName,
                        }],
                        callType: ZegoUIKitPrebuilt.InvitationTypeVoiceCall,
                        timeout: 60,
                    });

                    console.log('Invitation sent successfully', invitationResult);

                    // After invitation is sent, join the room to show the call UI
                    await joinCallRoom();

                    return;
                } catch (err) {
                    console.error(`Attempt ${attempt} failed:`, err);

                    if (attempt === maxAttempts) {
                        showErr('Failed to send invitation: ' + (err.message || JSON.stringify(err)));
                    } else {
                        await new Promise(r => setTimeout(r, retryDelay));
                    }
                }
            }
        }

        async function waitForZIM(maxAttempts = 5, retryDelay = 1000) {
            for (let attempt = 1; attempt <= maxAttempts; attempt++) {
                try {
                    const zim = zp.getPlugin('ZIM');
                    if (zim && zim.isLoggedIn) {
                        console.log('ZIM is ready');
                        return;
                    }

                    console.log(`Waiting for ZIM (attempt ${attempt}/${maxAttempts})…`);
                    await new Promise(r => setTimeout(r, retryDelay));
                } catch (err) {
                    console.log(`ZIM check attempt ${attempt} failed:`, err);
                    await new Promise(r => setTimeout(r, retryDelay));
                }
            }
            console.log('ZIM may not be ready, continuing anyway...');
        }

        function setupCallEventHandlers() {
            // Set up invitation config
            zp.setCallInvitationConfig({
                enableNotifyWhenAppRunningInBackgroundOrQuit: true,

                onIncomingCallReceived(callID, caller, callType, callees) {
                    console.log('Incoming call received from:', caller.userName);
                },

                onIncomingCallCanceled() {
                    console.log('Incoming call canceled');
                    if (!callAccepted && !callEndHandled) {
                        handleCallEnd('missed');
                    }
                },

                onIncomingCallRejected() {
                    console.log('Incoming call rejected');
                    if (!callAccepted && !callEndHandled) {
                        handleCallEnd('rejected');
                    }
                },

                onIncomingCallTimeout() {
                    console.log('Incoming call timeout');
                    if (!callAccepted && !callEndHandled) {
                        handleCallEnd('missed');
                    }
                },

                onOutgoingCallAccepted(data) {
                    console.log('Outgoing call accepted', data);
                    callAccepted = true;
                    callStartTime = Date.now();
                    callStatus = 'completed';
                },

                onOutgoingCallRejected(data) {
                    console.log('Outgoing call rejected', data);
                    if (!callAccepted && !callEndHandled) {
                        handleCallEnd('rejected');
                    }
                },

                onOutgoingCallDeclined(data) {
                    console.log('Outgoing call declined', data);
                    if (!callAccepted && !callEndHandled) {
                        handleCallEnd('rejected');
                    }
                },

                onOutgoingCallTimeout(data) {
                    console.log('Outgoing call timeout', data);
                    if (!callAccepted && !callEndHandled) {
                        handleCallEnd('missed');
                    }
                },

                onCallEnd(data) {
                    console.log('Call ended event fired', data);
                    if (!callEndHandled) {
                        handleCallEnd(callStatus);
                    }
                }
            });
        }

        async function joinCallRoom() {
            return new Promise((resolve, reject) => {
                try {
                    // Configure the UI - hide all unnecessary UI elements
                    const config = {
                        showPreJoinView: false, // Don't show pre-join screen
                        showScreenSharingButton: false,
                        showTextChat: false,
                        showInviteButton: false,
                        showRemoveUserButton: false,
                        turnOnMicrophoneWhenJoining: true,
                        turnOnCameraWhenJoining: false,
                        showMyCameraToggleButton: false,
                        showAudioVideoSettingsButton: true,
                        showLayoutButton: false,
                        showNonVideoUser: true,
                        showLeaveRoomButton: true, // Show leave button but we'll handle it
                        showRoomDetailsButton: false,
                        showUserListButton: false,
                        container: document.getElementById('zego-container'),
                        onLeaveRoom: () => {
                            console.log('Leave room button clicked');
                            if (!callEndHandled) {
                                if (callAccepted) {
                                    handleCallEnd(callStatus);
                                } else {
                                    handleCallEnd('missed');
                                }
                            }
                        },
                        onUserLeave: (users) => {
                            console.log('User left:', users);
                            // If the other person left and call was accepted
                            if (callAccepted && !callEndHandled) {
                                handleCallEnd(callStatus);
                            }
                        },
                        onJoinRoom: () => {
                            console.log('Joined room successfully');
                            // Hide any post-call dialogs that might appear
                            setTimeout(hidePostCallUI, 100);
                        }
                    };

                    // Join the room
                    zp.joinRoom(roomID, config);

                    // Continuously hide unwanted UI elements
                    const hideInterval = setInterval(() => {
                        if (forceRedirect || callEndHandled) {
                            clearInterval(hideInterval);
                            return;
                        }
                        hidePostCallUI();
                    }, 500);

                    resolve();
                } catch (err) {
                    reject(err);
                }
            });
        }

        function hidePostCallUI() {
            // Hide any post-call or leave room dialogs
            const selectors = [
                '.zego-leave-room-container',
                '.zego-leave-room',
                '.dialog-post-call',
                '.zego-dialog-post-call',
                '[class*="post-call"]',
                '[class*="leave-room"]',
                '.zego-dialog-container',
                '.zego-float-tool-box',
                // Add more selectors as needed
            ];

            selectors.forEach(selector => {
                const elements = document.querySelectorAll(selector);
                elements.forEach(el => {
                    if (el && el.style) {
                        el.style.display = 'none';
                        // Also try to remove if it's a dialog
                        if (el.classList && el.classList.contains('zego-dialog-container')) {
                            el.remove();
                        }
                    }
                });
            });

            // Also hide any backdrop/modals
            const modals = document.querySelectorAll('.modal, .dialog, [role="dialog"]');
            modals.forEach(modal => {
                if (modal && modal.style && !modal.closest('#zego-container')) {
                    modal.style.display = 'none';
                }
            });
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
