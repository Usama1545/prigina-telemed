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
                                            @elseif(Route::is(['chat-doctor', 'chat', 'patient.conversations']))

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

                                                                    @if(!Route::is(['booking-popup', 'booking-success-one', 'booking', 'coming-soon', 'consultation', 'doctor-register-step1', 'doctor-register-step2', 'doctor-register-step3', 'doctor-signup', 'email-otp', 'error-404', 'error-500', 'forgot-password', 'forgot-password2', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'maintenance', 'mobile-otp', 'patient-details', 'patient-register-step1', 'patient-register-step2', 'patient-register-step3', 'patient-register-step4', 'patient-register-step5', 'patient-signup', 'payment', 'pharmacy-register-step1', 'pharmacy-register-step2', 'pharmacy-register-step3', 'reset-password', 'signup-success', 'signup', 'onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-email-otp', 'onboarding-email-step-2-verify', 'onboarding-email', 'onboarding-identity', 'onboarding-lock', 'onboarding-password', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone-otp', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-dependant-details', 'patient-details', 'patient-email', 'patient-family-details', 'patient-other-details', 'patient-personalize']))
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
                                                                        Pusher.logToConsole = true;
                                                                            Echo.channel(`chat.${userId}`).listen('.new.message', (e) => {
                                                                                showNotification(e);
                                                                                console.log('new message', e);
                                                                                if (typeof loadMessages === 'function') {
                                                                                    if (currentConversationId === e.conversationId) {
                                                                                        loadMessages(e.conversationId, true);
                                                                                    }
                                                                                }
                                                                            });
                                                                            function showNotification(data) {
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
                                                                                    ">
                                                                                        <strong>New Message</strong><br>
                                                                                        ${data.text ?? ''}
                                                                                    </div>
                                                                                `;

                                                                                document.body.appendChild(popup);

                                                                                // auto remove after 4 sec
                                                                                setTimeout(() => {
                                                                                    popup.remove();
                                                                                }, 10000);
                                                                            }
                                                                    </script>
                                                                    @stack('scripts')
                                                                </body>

</html>