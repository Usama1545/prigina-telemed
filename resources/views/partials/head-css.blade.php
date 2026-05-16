<!-- Favicon -->
<link rel="shortcut icon" href="{{URL::asset('build/img/favicon.png')}}" type="image/x-icon">

<!-- Apple Touch Icon -->
<link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('build/img/apple-touch-icon.png')}}">

@if(!Route::is(['booking-popup', 'booking-success-one', 'booking', 'coming-soon', 'consultation', 'doctor-register-step1', 'doctor-register-step2', 'doctor-register-step3', 'doctor-signup', 'email-otp', 'error-404', 'error-500', 'forgot-password', 'forgot-password2', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'maintenance', 'mobile-otp', 'patient-details', 'patient-register-step1', 'patient-register-step2', 'patient-register-step3', 'patient-register-step4', 'patient-register-step5', 'patient-signup', 'payment', 'pharmacy-register-step1', 'pharmacy-register-step2', 'pharmacy-register-step3', 'reset-password', 'signup-success', 'signup', 'onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-email-otp', 'onboarding-email-step-2-verify', 'onboarding-email', 'onboarding-identity', 'onboarding-lock', 'onboarding-password', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone-otp', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-dependant-details', 'patient-details', 'patient-email', 'patient-family-details', 'patient-other-details', 'patient-personalize']))
    <!-- Theme Settings Js -->
    <script src="{{URL::asset('build/js/theme-script.js')}}"></script>
@endif

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{URL::asset('build/css/bootstrap.min.css')}}">

@if(Route::is(['index']))
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/animate.css')}}">
@endif

<!-- Fontawesome CSS -->
<link rel="stylesheet" href="{{URL::asset('build/plugins/fontawesome/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{URL::asset('build/plugins/fontawesome/css/all.min.css')}}">
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

<!-- Iconsax CSS-->
<link rel="stylesheet" href="{{URL::asset('build/css/iconsax.css')}}">

<!-- Feathericon CSS -->
<link rel="stylesheet" href="{{URL::asset('build/css/feather.css')}}">

@if(Route::is(['available-timings', 'booking-popup', 'booking', 'calendar', 'dependent', 'doctor-awards-settings', 'doctor-business-settings', 'doctor-clinics-settings', 'doctor-education-settings', 'doctor-experience-settings', 'doctor-grid', 'doctor-insurnce-settings', 'doctor-specialities', 'index-4', 'index-5', 'map-grid', 'map-list-availability', 'map-list', 'medical-details', 'medical-records', 'my-patients', 'onboarding-availability', 'onboarding-consultation', 'onboarding-payments', 'onboarding-personalize', 'onboarding-preferences', 'onboarding-verify-account', 'patient-accounts', 'patient-dashboard', 'patient-details', 'patient-personalize', 'patient-profile', 'pharmacy-search', 'product-all', 'product-description', 'profile-settings', 'search-2', 'search']))
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/bootstrap-datetimepicker.min.css')}}">
@endif

@if(Route::is(['appointments', 'booking-1', 'booking-2', 'contact-us', 'doctor-appointment-details', 'doctor-appointment-start', 'doctor-appointments-grid', 'doctor-cancelled-appointment-2', 'doctor-cancelled-appointment', 'doctor-completed-appointment', 'doctor-upcoming-appointment', 'faq', 'my-patients', 'patient-appointments-grid', 'patient-appointments', 'reviews']))
    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/daterangepicker/daterangepicker.css')}}">
@endif

@if(Route::is(['chat-doctor', 'chat']))
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/swiper/swiper.min.css')}}">
@endif

@if(Route::is(['index-9', 'index-12', 'index']))
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{URL::asset('build/plugins/slick/slick-theme.css')}}">
@endif

@if(Route::is(['index-11', 'index-13']))
    <!-- Slick slider CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/slick.css')}}">
@endif

@if(Route::is(['doctor-profile', 'onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-email-otp', 'onboarding-email-step-2-verify', 'onboarding-email', 'onboarding-identity', 'onboarding-lock', 'onboarding-password', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone-otp', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-appointment-details', 'patient-cancelled-appointment', 'patient-completed-appointment', 'patient-dashboard', 'patient-dependant-details', 'patient-details', 'patient-email', 'patient-family-details', 'patient-other-details', 'patient-personalize', 'patient-upcoming-appointment']))
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/owl.carousel.min.css')}}">
@endif

@if(Route::is(['calendar']))
    <!-- Full Calander CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/css/fullcalendar.min.css')}}">
@endif

@if(Route::is(['doctor-appointment-start', 'doctor-profile-settings', 'medical-records', 'patient-profile']))
    <!-- Bootstrap Tagsinput CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}">
@endif

@if(Route::is(['index', 'index-2', 'index-3', 'index-4', 'index-5', 'index-6', 'index-7', 'index-8', 'index-9', 'index-10', 'index-11', 'index-12', 'index-13']))
    <!-- Wow CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/wow/css/animate.css')}}">
@endif

@if(!Route::is(['booking-popup', 'booking-success-one', 'booking', 'coming-soon', 'consultation', 'doctor-register-step1', 'doctor-register-step2', 'doctor-register-step3', 'doctor-signup', 'email-otp', 'error-404', 'error-500', 'forgot-password', 'forgot-password2', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'maintenance', 'mobile-otp', 'patient-details', 'patient-register-step1', 'patient-register-step2', 'patient-register-step3', 'patient-register-step4', 'patient-register-step5', 'patient-signup', 'payment', 'pharmacy-register-step1', 'pharmacy-register-step2', 'pharmacy-register-step3', 'reset-password', 'signup-success', 'signup']))
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/fancybox/jquery.fancybox.min.css')}}">
@endif

@if(Route::is(['doctor-grid', 'search-2']))
    <!-- Rangeslider CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" href="{{URL::asset('build/plugins/ion-rangeslider/css/ion.rangeSlider.min.css')}}">
@endif

@if(Route::is(['doctor-register', 'doctor-signup', 'email-otp', 'forgot-password2', 'forgot-password', 'login-phone-otp', 'login-phone', 'mobile-otp', 'onboarding-phone', 'patient-signup', 'pharmacy-register', 'register', 'signup-success']))
    <!-- Mobile CSS-->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/intltelinput/css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{URL::asset('build/plugins/intltelinput/css/demo.css')}}">
@endif

@if(Route::is(['accounts', 'appointments', 'available-timings', 'booking-popup', 'booking', 'clinic', 'consultation', 'dependent', 'doctor-blog', 'doctor-add-blog', 'doctor-appointment-details', 'doctor-appointment-start', 'doctor-appointments-grid', 'doctor-awards-settings', 'doctor-business-settings', 'doctor-cancelled-appointment-2', 'doctor-cancelled-appointment', 'doctor-change-password', 'doctor-clinics-settings', 'doctor-completed-appointment', 'doctor-dashboard', 'doctor-education-settings', 'doctor-experience-settings', 'doctor-insurance-settings', 'doctor-payment', 'doctor-profile-settings', 'doctor-register-step2', 'doctor-register-step3', 'doctor-request', 'doctor-specialities', 'doctor-upcoming-appointment', 'edit-blog', 'hospitals', 'index-4', 'index', 'invoices', 'map-grid', 'map-list-availability', 'map-list', 'medical-records', 'my-patients', 'onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-identity', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-accounts', 'patient-appointment-details', 'patient-appointments-grid', 'patient-appointments', 'patient-cancelled-appointment', 'patient-completed-appointment', 'patient-dashboard', 'patient-details', 'patient-other-settings', 'patient-personalize', 'patient-profile', 'patient-register-step2', 'patient-register-step5', 'patient-upcoming-appointment', 'payment', 'pharmacy-register-step2', 'pharmacy-register-step3', 'pharmacy-search', 'product-all', 'product-description', 'profile-settings', 'reviews', 'search', 'social-media', 'speciality']))
    <!-- select CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/select2/css/select2.min.css')}}">
@endif

@if(Route::is(['doctor-dashboard', 'patient-appointment-details', 'patient-cancelled-appointment', 'patient-comlpleted-appointment', 'patient-dashboard', 'patient-upcoming-appointment']))
    <!-- Apex CSS -->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/apex/apexcharts.css')}}">
@endif

@if(Route::is(['calendar', 'dependent', 'medical-details']))
    <!-- Jquery UI-->
    <link rel="stylesheet" href="{{URL::asset('build/plugins/jquery-ui/jquery-ui.min.css')}}">
@endif

<!-- Main CSS -->
<link rel="stylesheet" href="{{URL::asset('build/css/style.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
