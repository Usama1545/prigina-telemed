@php
    $authRole = session('auth_role');
    $needsListener = in_array($authRole, ['patient', 'doctor']);
    $tokenRoute = $authRole === 'doctor' ? route('doctor.zego-token') : route('patient.zego-token');
    $dashRoute = $authRole === 'doctor' ? route('doctor.dashboard') : route('patient.dashboard');
@endphp

@if ($needsListener)
    {{-- Global ZIM listener: shows ZEGO's built-in incoming call overlay on every patient/doctor page --}}

    <!-- ZIM SIGNALLING -->
    <script src="https://unpkg.com/zego-zim-web/index.js"></script>
    <!-- ZEGO PREBUILT -->
    <script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>

    <script>
        let currentCallID = null;
        let ringtoneInterval = null;
        let zimPlugin = null;

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                stopRingtone();
            }
        });

        window.addEventListener('focus', () => {
            stopRingtone();
        });

        function startRingtone() {
            stopRingtone();

            function beep() {
                try {
                    const ctx = _getCtx();
                    const t = ctx.currentTime;
                    _tone(ctx, 1200, t, 0.15, 0.7);
                    _tone(ctx, 1200, t + 0.18, 0.15, 0.7);
                } catch (_) {}
            }

            beep();
            ringtoneInterval = setInterval(beep, 1200);
        }

        function stopRingtone() {
            if (ringtoneInterval) {
                clearInterval(ringtoneInterval);
                ringtoneInterval = null;
            }
        }

        async function rejectCall(callID) {
            if (zimPlugin && callID) {
                try {
                    await zimPlugin.rejectCall(callID, {});
                    console.log('[ZEGO] Call rejected');
                    stopRingtone();
                    currentCallID = null;
                } catch (e) {
                    console.error('[ZEGO] Failed to reject call:', e);
                }
            }
        }

        (async function() {
            try {
                const res = await fetch('{{ $tokenRoute }}');
                if (!res.ok) {
                    console.error('[ZEGO] Failed to get token');
                    return;
                }

                const {
                    token,
                    userID,
                    userName,
                    appID
                } = await res.json();

                const kitToken = ZegoUIKitPrebuilt.generateKitTokenForProduction(
                    appID, token, 'listener_' + userID, userID, userName
                );

                const zp = ZegoUIKitPrebuilt.create(kitToken);
                zimPlugin = {
                    ZIM
                };
                zp.addPlugins(zimPlugin);

                zp.setCallInvitationConfig({
                    enableNotifyWhenAppRunningInBackgroundOrQuit: true,

                    // Custom UI for incoming call (optional but recommended)
                    incomingCall: {
                        // You can customize the incoming call UI here
                        // Or let ZEGO use its default overlay
                    },

                    onIncomingCallReceived(callID, caller, callType) {
                        console.log('[ZEGO] Incoming call from', caller.userName, 'type', callType);
                        currentCallID = callID;
                        startRingtone();

                        // Optional: Show a browser notification
                        if (Notification.permission === 'granted') {
                            new Notification('Incoming Call', {
                                body: `${caller.userName} is calling you...`,
                                icon: '/favicon.ico'
                            });
                        }
                    },

                    onIncomingCallCanceled(callID) {
                        console.log('[ZEGO] Caller cancelled call:', callID);
                        if (currentCallID === callID) {
                            stopRingtone();
                            currentCallID = null;
                        }
                    },

                    onIncomingCallTimeout(callID) {
                        console.log('[ZEGO] Incoming call timed out');
                        if (currentCallID === callID) {
                            stopRingtone();
                            currentCallID = null;
                        }
                    },

                    onCallEnd(callID) {
                        console.log('[ZEGO] Call ended');
                        stopRingtone();
                        currentCallID = null;
                        window.location.href = '{{ $dashRoute }}';
                    },

                    onIncomingCallAccepted(callID) {
                        console.log('[ZEGO] Call accepted');
                        stopRingtone();
                        currentCallID = null;
                    },

                    // Add this to handle rejection
                    onIncomingCallRejected(callID, reason) {
                        console.log('[ZEGO] Call rejected:', reason);
                        stopRingtone();
                        currentCallID = null;
                    }
                });

                // Request notification permission
                if ('Notification' in window && Notification.permission === 'default') {
                    Notification.requestPermission();
                }

            } catch (e) {
                console.warn('[ZEGO] Call listener init failed:', e);
            }
        })();

        // Optional: Clean up on page unload
        window.addEventListener('beforeunload', () => {
            if (currentCallID && zimPlugin) {
                rejectCall(currentCallID);
            }
            stopRingtone();
        });
    </script>
@endif
