@php
    $authRole = session('auth_role');
    $needsListener = in_array($authRole, ['patient', 'doctor']);
    $tokenRoute = $authRole === 'doctor' ? route('doctor.zego-token') : route('patient.zego-token');
@endphp

<style>
    body.zego-call-active .header,
    body.zego-call-active .footer,
    body.zego-call-active .bottom-nav,
    body.zego-call-active .mobile-bottom-nav,
    body.zego-call-active .bottom-navigation,
    body.zego-call-active .sidebar {
        display: none !important;
    }

    body.zego-call-active #zego-container {
        z-index: 999999 !important;
        pointer-events: auto !important;
    }
</style>

@if ($needsListener)
    {{-- Global ZIM listener: shows ZEGO's built-in incoming call overlay on every patient/doctor page --}}

    <!-- ZIM SIGNALLING -->
    <script src="https://unpkg.com/zego-zim-web/index.js"></script>
    <!-- ZEGO PREBUILT -->
    <script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>

    <script>
        // ── State ─────────────────────────────────────────────────────────────────
        let currentCallID = null;
        let ringtoneInterval = null;

        // Outgoing call tracking (populated by window._startChatCall)
        let _callStartTime = null;
        let _callStatus = 'missed';
        let _callSaved = false;
        let _callConversationId = null;
        let _callCallerId = null;
        let _callReceiverId = null;
        let _callType = null;
        let _callCsrfToken = null;

        window._zegoReady = false;
        window._zegoInstance = null;
        window._zegoInitFailed = false;

        // ── Ringtone ──────────────────────────────────────────────────────────────

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

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) stopRingtone();
        });

        // ── Call record saving ────────────────────────────────────────────────────

        function _saveCallRecord(status, endTime) {
            // Only the caller saves the record
            if (_callSaved || !_callConversationId) return;
            _callSaved = true;

            const duration = (_callStartTime && endTime) ?
                Math.floor((endTime - _callStartTime) / 1000) :
                0;

            fetch(`/conversation/${_callConversationId}/save-call`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': _callCsrfToken,
                },
                body: JSON.stringify({
                    callerId: _callCallerId,
                    receiverId: _callReceiverId,
                    callType: _callType,
                    status: status,
                    duration: duration,
                    startTime: _callStartTime ? new Date(_callStartTime).toISOString() : null,
                    endTime: endTime ? new Date(endTime).toISOString() : null,
                }),
                keepalive: true,
            }).then(() => {
                // Refresh chat messages to surface the new call card
                if (window.loadMessages && window.currentConversationId) {
                    window.loadMessages(window.currentConversationId, true, true);
                }
            }).catch(() => {});
        }

        function _resetCallState() {
            _callStartTime = null;
            _callStatus = 'missed';
            _callSaved = false;
            _callConversationId = null;
            _callCallerId = null;
            _callReceiverId = null;
            _callType = null;
            _callCsrfToken = null;
        }

        // ── DOM-based call state detection ────────────────────────────────────────
        //
        // Watch #zego-container for ZEGO rendering/removing its call UI.
        // Called once the DOM is ready (the container is a permanent element in
        // each chat page, so it exists by the time this script runs).

        function _watchContainer() {
            const container = document.getElementById('zego-container');
            if (!container) return; // not on a chat page — nothing to do

            new MutationObserver(() => {
                if (container.children.length > 0) {
                    // ZEGO rendered its call UI → call is connected
                    if (!_callStartTime) {
                        _callStartTime = Date.now();
                        _callStatus = 'completed';
                        document.body.classList.add('zego-call-active');
                        stopRingtone();
                    }
                } else {
                    // ZEGO removed its call UI → call has ended
                    if (_callStartTime) {
                        const endTime = Date.now();
                        document.body.classList.remove('zego-call-active');
                        // _saveCallRecord(_callStatus, endTime);
                        _resetCallState();
                    }
                }
            }).observe(container, {
                childList: true
            });
        }

        // The listener partial is included after @yield('content'), so #zego-container
        // is already in the DOM at this point.
        _watchContainer();

        // ── Public API for chat pages ─────────────────────────────────────────────

        window._startChatCall = function(receiverId, receiverName, callType, conversationId, callerId, csrfToken) {
            if (!window._zegoInstance || !window._zegoReady) {
                console.warn('[ZEGO] Instance not ready yet — please wait a moment');
                return;
            }
            if (_callStartTime) {
                console.warn('[ZEGO] A call is already in progress');
                return;
            }

            _callConversationId = conversationId;
            _callCallerId = callerId;
            _callReceiverId = receiverId;
            _callType = callType;
            _callCsrfToken = csrfToken;
            _callSaved = false;
            _callStatus = 'missed';
            _callStartTime = null;

            const invitationType = callType === 'video' ?
                ZegoUIKitPrebuilt.InvitationTypeVideoCall :
                ZegoUIKitPrebuilt.InvitationTypeVoiceCall;

            (async function sendInvitation(maxAttempts = 8, retryDelay = 1000) {
                for (let attempt = 1; attempt <= maxAttempts; attempt++) {
                    try {
                        await window._zegoInstance.sendCallInvitation({
                            callees: [{
                                userID: receiverId,
                                userName: receiverName
                            }],
                            callType: invitationType,
                            timeout: 60,
                        });
                        console.log('[ZEGO] Call invitation sent');
                        return;
                    } catch (err) {
                        if (err?.code === 6000121 && attempt < maxAttempts) {
                            await new Promise(r => setTimeout(r, retryDelay));
                        } else {
                            console.error('[ZEGO] Failed to send invitation:', err);
                            _resetCallState();
                            return;
                        }
                    }
                }
            })();
        };

        // ── Init ──────────────────────────────────────────────────────────────────

        (async function() {
            try {
                const res = await fetch('{{ $tokenRoute }}');
                if (!res.ok) {
                    console.error('[ZEGO] Failed to fetch token');
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
                zp.addPlugins({
                    ZIM
                });

                window._zegoInstance = zp;
                window._zegoReady = true;

                zp.setCallInvitationConfig({
                    enableNotifyWhenAppRunningInBackgroundOrQuit: true,

                    // ── Incoming call events ──────────────────────────────────────

                    onIncomingCallReceived(callID, caller) {
                        console.log('[ZEGO] Incoming call from', caller.userName, 'callID:', callID);
                        currentCallID = callID;
                        startRingtone();

                        if (Notification.permission === 'granted') {
                            new Notification('Incoming Call', {
                                body: `${caller.userName} is calling you...`,
                                icon: '/favicon.ico',
                            });
                        }
                    },

                    onIncomingCallCanceled(callID) {
                        console.log('[ZEGO] Incoming call canceled, callID:', callID);
                        if (currentCallID === callID) {
                            stopRingtone();
                            currentCallID = null;
                        }
                    },

                    onIncomingCallTimeout(callID) {
                        console.log('[ZEGO] Incoming call timed out, callID:', callID);
                        if (currentCallID === callID) {
                            stopRingtone();
                            currentCallID = null;
                        }
                    },

                    onIncomingCallRejected(callID) {
                        console.log('[ZEGO] Incoming call rejected (by self), callID:', callID);
                        if (currentCallID === callID) {
                            stopRingtone();
                            currentCallID = null;
                        }
                    },

                    onIncomingCallAccepted(callID) {
                        console.log('[ZEGO] Incoming call accepted, callID:', callID);
                        stopRingtone();
                        currentCallID = null;
                        // UI transition is handled by _watchContainer detecting children in #zego-container
                    },

                    // ── Outgoing call pre-connected outcomes ──────────────────────
                    // These fire reliably before call room connects (no DOM to detect yet).
                });

                if ('Notification' in window && Notification.permission === 'default') {
                    Notification.requestPermission();
                }

            } catch (e) {
                console.error('[ZEGO] Call listener init failed:', e);
                window._zegoInitFailed = true;
            }
        })();

        window.addEventListener('beforeunload', () => {
            stopRingtone();
            if (_callStartTime && !_callSaved) {
                _saveCallRecord(_callStatus, Date.now());
            }
        });
    </script>
@endif
