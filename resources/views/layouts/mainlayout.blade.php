<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.title-meta')
</head>

@if(Route::is(['index-2']))

    <body class="theme-1">
@elseif(Route::is(['index-3']))

        <body class="theme-2">
    @elseif(Route::is(['index-4']))

            <body class="theme-3">
        @elseif(Route::is(['index-5']))

                <body class="theme-4">
            @elseif(Route::is(['index-6']))

                    <body class="theme-5">
                @elseif(Route::is(['index-7']))

                        <body class="theme-6">
                    @elseif(Route::is(['index-8']))

                            <body class="theme-7">
                        @elseif(Route::is(['index-9']))

                                <body class="theme-8">
                            @elseif(Route::is(['index-10']))

                                    <body class="theme-9">
                                @elseif(Route::is(['index-11']))

                                        <body class="theme-10">
                                    @elseif(Route::is(['index-12']))

                                            <body class="theme-11">
                                        @elseif(Route::is(['index-13']))

                                                <body class="theme-12">
                                            @elseif(Route::is(['chat-doctor', 'chat', 'patient.conversations', 'doctor.conversations', 'doctor.conversations.show', 'patient.conversations.show']))

                                                    <body class="main-chat-blk">
                                                @elseif(Route::is(['doctor-register-step1', 'doctor-register-step2', 'doctor-regsiter-step3', 'doctor-register', 'forgot-password', 'login', 'patient-register-step1', 'patient-register-step2', 'patient-register-step3', 'patient-register-step4', 'patient-register-step5', 'pharmacy-register-step1', 'pharmacy-register-step2', 'pharmacy-register-step3', 'pharmacy-register', 'register']))

                                                        <body class="account-page">
                                                    @elseif(Route::is(['doctor-signup', 'email-otp', 'forgot-password2', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'patient-singup', 'reset-password', 'signup-succes', 'signup']))

                                                            <body class="login-body">
                                                        @elseif(Route::is(['video-call', 'voice-call']))

                                                                <body class="call-page">
                                                            @else

                                                                    <body>
                                                                @endif
                                                                    
                                                                    @if(!Route::is(['onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-email-otp', 'onboarding-email-step-2-verify', 'onboarding-email', 'onboarding-identity', 'onboarding-lock', 'onboarding-password', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone-otp', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-dependant-details', 'patient-details', 'patient-email', 'patient-family-details', 'patient-other-details', 'patient-personalize']))
                                                                        @include('partials.main-wrapper')
                                                                    @endif

                                                                    @if(!Route::is(['booking-popup', 'coming-soon', 'doctor-register-step1', 'doctor-register-step2', 'doctor-register-step3', 'doctor-signup', 'email-otp', 'error-404', 'error-500', 'forgot-password', 'forgot-password2', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'maintenance', 'mobile-otp', 'patient-details', 'patient-register-step1', 'patient-register-step2', 'patient-register-step3', 'patient-register-step4', 'patient-register-step5', 'patient-signup', 'pharmacy-register-step1', 'pharmacy-register-step2', 'pharmacy-register-step3', 'reset-password', 'signup-success', 'signup', 'onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-email-otp', 'onboarding-email-step-2-verify', 'onboarding-email', 'onboarding-identity', 'onboarding-lock', 'onboarding-password', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone-otp', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-dependant-details', 'patient-details', 'patient-email', 'patient-family-details', 'patient-other-details', 'patient-personalize']))
                                                                        @include('partials.topbar')
                                                                    @endif
                                                                    @yield('content')

                                                                    @if(!request()->routeIs('doctor.*') && !request()->routeIs('patient.*') && !Route::is(['chat-doctor', 'chat', 'patient.conversations', 'doctor.conversations', 'doctor.conversations.show', 'patient.conversations.show','booking-popup', 'booking-success-one', 'booking', 'coming-soon', 'consultation', 'doctor-register-step1', 'doctor-register-step2', 'doctor-register-step3', 'doctor-signup', 'email-otp', 'error-404', 'error-500', 'forgot-password', 'forgot-password2', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'maintenance', 'mobile-otp', 'patient-details', 'patient-register-step1', 'patient-register-step2', 'patient-register-step3', 'patient-register-step4', 'patient-register-step5', 'patient-signup', 'payment', 'pharmacy-register-step1', 'pharmacy-register-step2', 'pharmacy-register-step3', 'reset-password', 'signup-success', 'signup', 'onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-email-otp', 'onboarding-email-step-2-verify', 'onboarding-email', 'onboarding-identity', 'onboarding-lock', 'onboarding-password', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone-otp', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-dependant-details', 'patient-details', 'patient-email', 'patient-family-details', 'patient-other-details', 'patient-personalize', '']))
                                                                        @include('partials.footer')
                                                                    @endif

                                                                    @if(Route::is(['about-us', 'booking-popup', 'booking-success-one', 'booking', 'clinic', 'coming-soon', 'consultation', 'doctor-grid', 'doctor-signup', 'email-otp', 'error-404', 'error-500', 'forgot-password2', 'hospitals', 'index-2', 'index-3', 'index-4', 'index-6', 'index-7', 'index-8', 'index-9', 'index-10', 'index-11', 'index-12', 'index-13', 'index', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'maintenance', 'map-grid', 'map-list-availability', 'map-list', 'mobile-otp', 'patient-details', 'patient-signup', 'payment', 'pricing', 'privacy-policy', 'reset-password', 'search-2', 'search', 'signup-success', 'signup', 'speciality', 'terms-condition']))
                                                                        @component('components.cursor')
                                                                        @endcomponent
                                                                    @endif

                                                                    @if(!Route::is(['onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-email-otp', 'onboarding-email-step-2-verify', 'onboarding-email', 'onboarding-identity', 'onboarding-lock', 'onboarding-password', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone-otp', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-dependant-details', 'patient-details', 'patient-email', 'patient-family-details', 'patient-other-details', 'patient-personalize']))
                                                                        </div>
                                                                        <!-- /Main Wrapper -->
                                                                    @endif

                                                                    @component('components.modal-popup')
                                                                    @endcomponent

                                                                    @if(Route::is(['index-2', 'index-3', 'index-4', 'index-6', 'index-7', 'index-8', 'index-9', 'index-10', 'index-11', 'index-12', 'index-13', 'index']))
                                                                        @component('components.scroll-top')
                                                                        @endcomponent
                                                                    @endif

                                                                    @include('partials.vendor-scripts')
                                                                    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
                                                                    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>

                                                                    <script>
                                                                        const firebaseConfig = {
                                                                            apiKey: "AIzaSyDdtNU3YTCSTyLJ5W09NRjlMuT2JBwlzTI",
                                                                            authDomain: "doctorapp-f33bf.firebaseapp.com",
                                                                        };

                                                                        firebase.initializeApp(firebaseConfig);
                                                                        const auth = firebase.auth();
                                                                    </script>

                                                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                                                    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

                                                                    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
                                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/laravel-echo/1.15.0/echo.iife.js"></script>
                                                                    <script>
                                                                        window.Pusher = Pusher;

                                                                        window.Echo = new Echo({
                                                                            broadcaster: 'pusher',
                                                                            key: "{{ config('broadcasting.connections.pusher.key') }}",
                                                                            cluster: "{{ config('broadcasting.connections.pusher.options.cluster') }}",
                                                                            forceTLS: true,
                                                                            authEndpoint: '/broadcasting/auth',

                                                                            withCredentials: true, // ✅ REQUIRED

                                                                            auth: {
                                                                                headers: {
                                                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                                                }
                                                                            }
                                                                        });

                                                                        const userId = "{{ optional(current_user())['uid'] ?? '' }}";
                                                                        const userRole = "{{ optional(current_user())['role'] ?? '' }}";
                                                                        Pusher.logToConsole = true;
                                                                            Echo.channel(`chat.${userId}`)
                                                                            .listen('.new.message', (e) => {

                                                                                showNotification(e);

                                                                                console.log('new message', e);

                                                                                // refresh sidebar
                                                                                if (typeof refreshConversationList === 'function') {
                                                                                    refreshConversationList();
                                                                                }

                                                                                // refresh open chat only if same conversation
                                                                                if (
                                                                                    typeof loadMessages === 'function' &&
                                                                                    window.currentConversationId === e.conversationId
                                                                                ) {

                                                                                    loadMessages(e.conversationId, true, true);

                                                                                    markMessagesAsRead(e.conversationId);
                                                                                }
                                                                            });
                                                                            Echo.channel(`appointments.${userId}`)
                                                                                .listen('.new.appointment', (e) => {

                                                                                    console.log('new appointment', e);

                                                                                    showAppointmentNotification(e);

                                                                                    // optional refresh
                                                                                    if (typeof loadAppointments === 'function') {
                                                                                        loadAppointments();
                                                                                    }
                                                                                });
                                                                            // ── Audio Notifications ─────────────────────────────────────────────
                                                                            let _audioCtx = null;

                                                                            function _getCtx() {
                                                                                if (!_audioCtx) _audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                                                                                if (_audioCtx.state === 'suspended') _audioCtx.resume();
                                                                                return _audioCtx;
                                                                            }

                                                                            // Unlock audio on first user gesture (browser autoplay policy)
                                                                            ['click','keydown','touchstart'].forEach(e =>
                                                                                document.addEventListener(e, () => _getCtx(), { once: true, passive: true })
                                                                            );

                                                                            function _tone(ctx, freq, start, dur, vol = 0.28) {
                                                                                const osc = ctx.createOscillator(), g = ctx.createGain();
                                                                                osc.connect(g); g.connect(ctx.destination);
                                                                                osc.type = 'sine';
                                                                                osc.frequency.setValueAtTime(freq, start);
                                                                                g.gain.setValueAtTime(0, start);
                                                                                g.gain.linearRampToValueAtTime(vol, start + 0.01);
                                                                                g.gain.exponentialRampToValueAtTime(0.0001, start + dur);
                                                                                osc.start(start); osc.stop(start + dur + 0.02);
                                                                            }

                                                                            // Two-note chime  (C6 → E6)  — new message
                                                                            function playMessageSound() {
                                                                                try {
                                                                                    const ctx = _getCtx(), t = ctx.currentTime;
                                                                                    _tone(ctx, 1047, t,        0.38);
                                                                                    _tone(ctx, 1319, t + 0.14, 0.48);
                                                                                } catch (_) {}
                                                                            }

                                                                            // Three-note ascending chime  (G5 → C6 → E6)  — new appointment
                                                                            function playAppointmentSound() {
                                                                                try {
                                                                                    const ctx = _getCtx(), t = ctx.currentTime;
                                                                                    _tone(ctx, 784,  t,        0.25);
                                                                                    _tone(ctx, 1047, t + 0.14, 0.25);
                                                                                    _tone(ctx, 1319, t + 0.28, 0.48);
                                                                                } catch (_) {}
                                                                            }
                                                                            // ────────────────────────────────────────────────────────────────────

                                                                            function showNotification(data) {
                                                                                playMessageSound();
                                                                                const conversationUrl =
                                                                                    userRole === 'doctor'
                                                                                        ? `/doctor/conversations/${data.conversationId}`
                                                                                        : `/patient/conversations/${data.conversationId}`;
                                                                                const popup = document.createElement('div');
                                                                                popup.innerHTML = `
                                                                                    <div style="
                                                                                        position: fixed;
                                                                                        top: 20px;
                                                                                        right: 20px;
                                                                                        background: #333;
                                                                                        color: #fff;
                                                                                        padding: 12px 16px;
                                                                                        border-radius: 8px;
                                                                                        z-index: 9999;
                                                                                        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                                                                                        cursor: pointer;
                                                                                        min-width: 280px;
                                                                                    ">
                                                                                        <strong>
                                                                                            ${data.senderName ?? 'New Message'}
                                                                                        </strong>
                                                                                        <br>

                                                                                        ${data.text ?? ''}
                                                                                    </div>
                                                                                `;
                                                                                popup.onclick = () => {
                                                                                    window.location.href = conversationUrl;
                                                                                };
                                                                                document.body.appendChild(popup);
                                                                                setTimeout(() => {
                                                                                    popup.remove();
                                                                                }, 10000);
                                                                            }
                                                                            function showAppointmentNotification(data) {
                                                                                playAppointmentSound();
                                                                                const appointmentUrl =
                                                                                    userRole === 'doctor'
                                                                                        ? `/doctor/appointments`
                                                                                        : `/patient/appointments`;
                                                                                const popup = document.createElement('div');
                                                                                popup.innerHTML = `
                                                                                    <div style="
                                                                                        position: fixed;
                                                                                        top: 20px;
                                                                                        right: 20px;
                                                                                        background: #198754;
                                                                                        color: #fff;
                                                                                        padding: 14px 18px;
                                                                                        border-radius: 8px;
                                                                                        z-index: 9999;
                                                                                        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                                                                                        min-width: 280px;
                                                                                        cursor: pointer;
                                                                                    ">
                                                                                        <strong>
                                                                                            New Appointment Booking 📅
                                                                                        </strong>
                                                                                        <br>

                                                                                        ${data.patientName ?? 'Patient'}
                                                                                        booked an appointment
                                                                                    </div>
                                                                                `;
                                                                                popup.onclick = () => {
                                                                                    window.location.href = appointmentUrl;
                                                                                };
                                                                                document.body.appendChild(popup);
                                                                                setTimeout(() => {
                                                                                    popup.remove();
                                                                                }, 10000);
                                                                            }
                                                                    </script>
                                                                    <script>
                                                                        function showAlert(message, type = 'danger') {

                                                                            let container = document.getElementById('js-alert-container');

                                                                            if (!container) {
                                                                                container = document.createElement('div');
                                                                                container.id = 'js-alert-container';
                                                                                container.style.position = 'fixed';
                                                                                container.style.top = '20px';
                                                                                container.style.right = '20px';
                                                                                container.style.zIndex = '9999';
                                                                                container.style.maxWidth = '420px';
                                                                                document.body.appendChild(container);
                                                                            }

                                                                            const alert = document.createElement('div');

                                                                            alert.className = `alert alert-${type} alert-dismissible fade show shadow`;

                                                                            alert.innerHTML = `
                                                                                ${message}
                                                                                <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="alert">
                                                                                </button>
                                                                            `;

                                                                            container.appendChild(alert);

                                                                            setTimeout(() => {
                                                                                alert.remove();
                                                                            }, 5000);
                                                                        }
                                                                    </script>
                                                                    @include('partials.zego-call-listener')
                                                                    @stack('scripts')
                                                                </body>

</html>
