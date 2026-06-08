@php
    $authRole = session('auth_role');
    $needsListener = in_array($authRole, ['patient', 'doctor']);
    $tokenRoute = $authRole === 'doctor' ? route('doctor.zego-token') : route('patient.zego-token');
@endphp

<style>
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

    body.zego-call-active .header.header-default,
    body.zego-call-active .bottom-nav,
    body.zego-call-active .mobile-bottom-nav {
        display: none !important;
    }

    body.zego-call-active #zego-container {
        z-index: 9999 !important;
    }
</style>

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
        let callAcceptedObserver = null;
        let preCallUrl = window.location.href;

        // ── UI helpers ────────────────────────────────────────────────────────────

        function hideCallBars() {
            const header = document.querySelector('header.header-default');
            const bottomNav = document.querySelector('.mobile-bottom-nav');
            if (header) header.style.display = 'none';
            if (bottomNav) bottomNav.style.display = 'none';
        }

        function showCallBars() {
            const header = document.querySelector('header.header-default');
            const bottomNav = document.querySelector('.mobile-bottom-nav');
            if (header) header.style.display = '';
            if (bottomNav) bottomNav.style.display = '';
        }

        function toggleCallMode(enabled) {

            const selectors = [
                '.header',
                '.footer',
                '.bottom-navigation',
                '.sidebar',
                '.topbar',
                '.navbar',
                '.main-wrapper > *:not(script)',
                '.page-content',
            ];

            selectors.forEach(selector => {

                document.querySelectorAll(selector)
                    .forEach(el => {

                        if (enabled) {

                            el.dataset.prevDisplay =
                                el.style.display || '';

                            el.style.display = 'none';

                        } else {

                            el.style.display =
                                el.dataset.prevDisplay || '';
                        }
                    });
            });

            document.body.style.background =
                enabled ? '#000' : '';

            document.body.style.overflow =
                enabled ? 'hidden' : '';
        }

        // Watches for ZEGO adding its full-screen call-room overlay to <body>,
        // which signals the user accepted the call. Stops ringtone when detected.
        function startCallAcceptWatcher() {
            stopCallAcceptWatcher();
            callAcceptedObserver = new MutationObserver((mutations) => {
                if (!currentCallID) {
                    stopCallAcceptWatcher();
                    return;
                }
                for (const m of mutations) {
                    for (const node of m.addedNodes) {
                        if (node.nodeType !== 1) continue;
                        // Check after a tick so ZEGO finishes sizing the element
                        setTimeout(() => {
                            if (!currentCallID) return;
                            const rect = node.getBoundingClientRect();
                            if (rect.width > window.innerWidth * 0.7 &&
                                rect.height > window.innerHeight * 0.7) {
                                stopRingtone();
                                stopCallAcceptWatcher();
                            }
                        }, 150);
                    }
                }
            });
            callAcceptedObserver.observe(document.body, {
                childList: true
            });
        }

        function stopCallAcceptWatcher() {
            if (callAcceptedObserver) {
                callAcceptedObserver.disconnect();
                callAcceptedObserver = null;
            }
        }

        // ── Ringtone ─────────────────────────────────────────────────────────────

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) stopRingtone();
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
                    stopRingtone();
                    currentCallID = null;
                } catch (e) {}
            }
        }

        // ── Init ─────────────────────────────────────────────────────────────────

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
                console.log(zp.express);
                console.log(Object.keys(zp.express));
                console.log(zp.express.zegoWebRTC);
                console.log(zp.express.zegoWebRTM);
                zimPlugin = {
                    ZIM
                };
                zp.addPlugins(zimPlugin);
                let inCall = false;

                const observer = new MutationObserver(() => {

                    const zegoContainer =
                        document.getElementById('zego-container');

                    if (zegoContainer) {

                        document.body.classList.add('zego-call-active');

                        stopRingtone();
                    } else {

                        document.body.classList.remove('zego-call-active');
                    }
                });

                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });

                // setInterval(() => {

                //     const players =
                //         document.querySelectorAll('[id^="zg-rtc-player-"]');

                //     console.log('PLAYERS FOUND:', players.length);

                // }, 1000);
                let pageReloaded = false;

                zp.setCallInvitationConfig({
                    enableNotifyWhenAppRunningInBackgroundOrQuit: true,

                    onIncomingCallReceived(callID, caller, callType) {
                        console.log('[ZEGO] Incoming call from', caller.userName, 'callID:', callID);
                        currentCallID = callID;
                        startRingtone();
                        // hideCallBars();
                        // startCallAcceptWatcher();

                        if (Notification.permission === 'granted') {
                            new Notification('Incoming Call', {
                                body: `${caller.userName} is calling you...`,
                                icon: '/favicon.ico'
                            });
                        }

                    },

                    onIncomingCallCanceled(callID) {
                        console.log('[ZEGO] Incoming call canceled, callID:', callID);
                        if (currentCallID === callID) {
                            stopRingtone();
                            showCallBars();
                            stopCallAcceptWatcher();
                            currentCallID = null;
                        }
                    },

                    onIncomingCallTimeout(callID) {
                        console.log('[ZEGO] Incoming call timed out, callID:', callID);
                        if (currentCallID === callID) {
                            stopRingtone();
                            showCallBars();
                            stopCallAcceptWatcher();
                            currentCallID = null;
                        }
                    },

                    onIncomingCallRejected(callID) {
                        console.log('[ZEGO] Incoming call rejected, callID:', callID);
                        if (currentCallID === callID) {
                            stopRingtone();
                            showCallBars();
                            stopCallAcceptWatcher();
                            currentCallID = null;
                        }
                    },

                    // Fires on the caller side when callee accepts; kept here
                    // as a fallback in case the SDK fires it on the callee too.
                    onIncomingCallAccepted(callID) {
                        console.log('[ZEGO] Incoming call accepted, callID:', callID);
                        preCallUrl = window.location.href;
                        stopRingtone();
                        // stopCallAcceptWatcher();
                        // toggleCallMode(true);
                        currentCallID = null;
                    },


                    onSetRoomConfigBeforeJoining(callType) {

                        const isVideoCall = callType === ZegoUIKitPrebuilt.InvitationTypeVideoCall;

                        return {

                            showPreJoinView: false,
                            showLeavingView: false,

                            ...(isVideoCall ? {
                                scenario: {
                                    mode: ZegoUIKitPrebuilt.OneOOneCall,
                                    config: { videoCodec: 'H264' },
                                }
                            } : {}),

                            onLeaveRoom() {

                                console.log('LOCAL LEFT ROOM');

                                if (pageReloaded) return;
                                pageReloaded = true;

                                setTimeout(() => {
                                    window.location.reload();
                                }, 500);
                            },

                            onUserLeave(user) {

                                console.log('REMOTE LEFT ROOM', user);

                                if (pageReloaded) return;
                                pageReloaded = true;

                                setTimeout(() => {
                                    window.location.reload();
                                }, 500);
                            }
                        };
                    }
                });

                if ('Notification' in window && Notification.permission === 'default') {
                    Notification.requestPermission();
                }

            } catch (e) {
                console.warn('[ZEGO] Call listener init failed:', e);
            }
        })();

        window.addEventListener('beforeunload', () => {
            if (currentCallID && zimPlugin) rejectCall(currentCallID);
            stopRingtone();
        });
    </script>
@endif
