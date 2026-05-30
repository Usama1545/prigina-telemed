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
        // ── Call ringtone (Web Audio) ────────────────────────────────────────────────
        // Uses the shared _getCtx / _tone helpers defined in mainlayout.
        // let _callRinger = null;

        // function _startRingtone() {
        //     _stopRingtone();
        //     let active = true;
        //     _callRinger = {
        //         stop() {
        //             active = false;
        //         }
        //     };

        //     (function ring() {
        //         if (!active) return;
        //         try {
        //             const ctx = _getCtx(),
        //                 t = ctx.currentTime;
        //             // Two short pulses — classic phone ring feel
        //             _tone(ctx, 1200, t, 0.18, 0.65);
        //             _tone(ctx, 1200, t + 0.22, 0.18, 0.65);
        //         } catch (_) {}
        //         setTimeout(ring, 1100);
        //     })();
        // }

        // function _stopRingtone() {
        //     if (_callRinger) {
        //         _callRinger.stop();
        //         _callRinger = null;
        //     }
        // }

        // ────────────────────────────────────────────────────────────────────────────

        (async function() {
            try {

                const res = await fetch('{{ $tokenRoute }}');
                if (!res.ok) return;
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
                window.zpCallListener = zp;
                zp.addPlugins({
                    ZIM
                });

                zp.setCallInvitationConfig({
                    enableNotifyWhenAppRunningInBackgroundOrQuit: true,

                    onIncomingCallReceived(callID, caller, callType) {
                        console.log('[ZEGO] Incoming call from', caller.userName, 'type', callType);
                        // _startRingtone();
                    },

                    onIncomingCallCanceled() {
                        console.log('[ZEGO] Caller cancelled');
                        // _stopRingtone();
                    },

                    onIncomingCallTimeout() {
                        console.log('[ZEGO] Incoming call timed out');
                        // _stopRingtone();
                    },

                    onCallEnd() {
                        // _stopRingtone();
                        window.location.href = '{{ $dashRoute }}';
                    },

                    onIncomingCallAccepted() {
                        // _stopRingtone();
                    }
                });

            } catch (e) {
                console.warn('[ZEGO] Call listener init failed:', e);
            }
        })();
    </script>
@endif
