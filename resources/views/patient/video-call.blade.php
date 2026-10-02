<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ __('app.calls.video_title') }} — Prigina</title>

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
        <a onclick="window.location.href=backUrl">{{ __('app.calls.go_back') }}</a>
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
        const userName = @json($user['name'] ?: __('app.calls.user'));
        const roomID = "call_{{ substr(md5($id), 0, 12) }}";
        const receiverID = @json($doctor['uid'] ?? '');
        const receiverName = @json($doctor['name'] ?: __('app.calls.user'));
        const backUrl = @json($backUrl ?? url('/dashboard'));
        const conversationId = @json($id);
        const callerId = @json($user['uid']);
        const csrfToken = @json(csrf_token());
        // Our call record (created by the server inside the appointment's call
        // window). Connection and end are stamped server-side; this page only
        // reports when they happen.
        const callId = @json($callId);

        let callStatus = 'missed';
        let callSaved = false;
        let zp = null;
        let callEndHandled = false;
        let callAccepted = false;
        let forceRedirect = false;

        function postCall(url, body) {
            return fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(body),
                keepalive: true,
            }).catch(err => console.error('Call record update failed:', err));
        }

        function markConnected() {
            postCall('/calls/connected', { callId });
        }

        function saveCallRecord(status) {
            if (callSaved) return;
            callSaved = true;
            postCall('/calls/ended', { callId, reason: status });
        }

        function handleCallEnd(status) {
            console.log('HANDLE CALL END', status);

            if (callEndHandled) return;
            callEndHandled = true;

            console.log('Call ended with status:', status);
            saveCallRecord(status);

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

                // Force H264 at express engine level for mobile interoperability
                try {
                    if (zp.express && typeof zp.express.setVideoConfig === 'function') {
                        zp.express.setVideoConfig({ codecID: 1 }); // 1 = H264
                        console.log('[ZEGO] H264 set at express engine level');
                    }
                } catch (e) {
                    console.warn('[ZEGO] express setVideoConfig error:', e);
                }

                // Add ZIM plugin
                zp.addPlugins({
                    ZIM
                });

                // Send invitation directly without joining room first
                await sendDirectCallInvitation();

            } catch (err) {
                console.error('Initialization error:', err);
                showErr(@json(__('app.calls.init_failed')) + ' ' + (err.message || err));
            }
        })();

        async function sendDirectCallInvitation(maxAttempts = 5, retryDelay = 1000) {
            // First, wait for ZIM to be ready
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
                        callType: ZegoUIKitPrebuilt.InvitationTypeVideoCall,
                        timeout: 60,
                    });

                    console.log('Invitation sent successfully', invitationResult);
                    if (invitationResult && invitationResult.callID) {
                        postCall(`/calls/${callId}/zego`, { zegoCallId: invitationResult.callID });
                    }

                    // After invitation is sent, join the room to show the call UI

                    return;
                } catch (err) {
                    console.error(`Attempt ${attempt} failed:`, err);

                    if (attempt === maxAttempts) {
                        showErr(@json(__('app.calls.invite_failed')) + ' ' + (err.message || JSON.stringify(err)));
                    } else {
                        await new Promise(r => setTimeout(r, retryDelay));
                    }
                }
            }
        }

        function setupCallEventHandlers() {

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

                    callStatus = 'completed';

                    markConnected();
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

                onCallInvitationEnded(reason, data) {
                    console.log('Call invitation ended', reason, data);

                    if (!callAccepted && !callEndHandled) {
                        handleCallEnd('missed');
                    }
                },

                onSetRoomConfigBeforeJoining(callType) {

                    console.log('Preparing room config');

                    return {

                        showPreJoinView: false,
                        showLeavingView: false,

                        scenario: {
                            mode: ZegoUIKitPrebuilt.OneOOneCall,
                            config: { videoCodec: 'H264' },
                        },

                        onJoinRoom() {
                            console.log('ROOM JOINED');

                            if (!callAccepted) {
                                callAccepted = true;
                                callStatus = 'completed';
                                markConnected();
                            }
                        },

                        onUserJoin(user) {
                            console.log('REMOTE USER JOINED', user);

                            if (!callAccepted) {
                                callAccepted = true;
                                callStatus = 'completed';
                                markConnected();
                            }
                        },

                        onUserLeave(user) {
                            console.log('REMOTE USER LEFT', user);

                            if (!callEndHandled) {
                                handleCallEnd(callStatus);
                            }
                        },

                        onLeaveRoom() {
                            console.log('LOCAL USER LEFT ROOM');

                            if (!callEndHandled) {
                                handleCallEnd(callStatus);
                            }
                        }
                    };
                }
            });
        }
        // Safety net: if page closes unexpectedly
        window.addEventListener('beforeunload', () => {
            if (!callSaved) {
                saveCallRecord(callStatus);
            }
        });
    </script>

</body>

</html>
