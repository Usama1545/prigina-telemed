@php
    $authRole = session('auth_role');
    $needsListener = in_array($authRole, ['patient', 'doctor']);
    $tokenRoute    = $authRole === 'doctor' ? route('doctor.zego-token') : route('patient.zego-token');
    $dashRoute     = $authRole === 'doctor' ? route('doctor.dashboard')   : route('patient.dashboard');
@endphp

@if($needsListener)
{{-- Global ZIM listener: shows ZEGO's built-in incoming call overlay on every patient/doctor page --}}

<!-- ZIM SIGNALLING -->
<script src="https://unpkg.com/zego-zim-web/index.js"></script>
<!-- ZEGO PREBUILT -->
<script src="https://unpkg.com/@zegocloud/zego-uikit-prebuilt/zego-uikit-prebuilt.js"></script>

<script>
(async function () {
    try {
        const res = await fetch('{{ $tokenRoute }}');
        if (!res.ok) return;
        const { token, userID, userName, appID } = await res.json();

        const kitToken = ZegoUIKitPrebuilt.generateKitTokenForProduction(
            appID, token, 'listener_' + userID, userID, userName
        );

        const zp = ZegoUIKitPrebuilt.create(kitToken);
        zp.addPlugins({ ZIM });

        zp.setCallInvitationConfig({
            enableNotifyWhenAppRunningInBackgroundOrQuit: true,

            onIncomingCallReceived(callID, caller, callType) {
                console.log('[ZEGO] Incoming call from', caller.userName, 'type', callType);
            },

            onIncomingCallCanceled() {
                console.log('[ZEGO] Caller cancelled');
            },

            onIncomingCallTimeout() {
                console.log('[ZEGO] Incoming call timed out');
            },

            onCallEnd() {
                window.location.href = '{{ $dashRoute }}';
            },
        });

    } catch (e) {
        console.warn('[ZEGO] Call listener init failed:', e);
    }
})();
</script>
@endif
