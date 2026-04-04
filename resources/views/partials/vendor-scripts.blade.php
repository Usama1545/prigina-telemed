<!-- jQuery -->
<script src="{{URL::asset('build/js/jquery-3.7.1.min.js')}}"></script>

@if(Route::is(['calendar', 'dependent', 'medical-details']))
    <!-- jQuery UI -->
    <script src="{{URL::asset('build/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
@endif

<!-- Bootstrap Bundle JS -->
<script src="{{URL::asset('build/js/bootstrap.bundle.min.js')}}"></script>

@if(Route::is(['about-us', 'booking-popup', 'booking-success-one', 'booking', 'clinic', 'coming-soon', 'consultation', 'doctor-grid', 'doctor-signup', 'email-otp', 'error-404', 'error-500', 'forgot-password2', 'hosptials', 'index-4', 'index-5', 'index-7', 'index-8', 'index-9', 'index-10', 'index-11', 'index-12', 'index', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'maintenance', 'map-grid', 'map-list-availability', 'map-list', 'mobile-otp', 'onboarding-consultation', 'onboarding-identity', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-details', 'patient-signup', 'payment', 'pricing', 'privacy-policy', 'reset-password', 'search-2', 'search', 'signup-sucess', 'signup', 'speciality', 'terms-condition']))
    <!-- Feather Icon JS -->
    <script src="{{URL::asset('build/js/feather.min.js')}}"></script>
@endif

@if(Route::is(['available-timings', 'booking-popup', 'booking', 'calendar', 'dependent', 'doctor-awards-settings', 'doctor-business-settings', 'doctor-clinics-settings', 'doctor-education-settings', 'doctor-experience-settings', 'doctor-grid', 'doctor-insurnce-settings', 'doctor-specialities', 'index-4', 'index-5', 'map-grid', 'map-list-availability', 'map-list', 'medical-details', 'medical-records', 'my-patients', 'onboarding-availability', 'onboarding-consultation', 'onboarding-payments', 'onboarding-personalize', 'onboarding-preferences', 'onboarding-verify-account', 'patient-accounts', 'patient-dashboard', 'patient-details', 'patient-personalize', 'patient-profile', 'pharmacy-search', 'product-all', 'product-description', 'profile-settings', 'search-2', 'search']))
    <!-- Datetimepicker JS -->
    <script src="{{URL::asset('build/js/moment.min.js')}}"></script>
    <script src="{{URL::asset('build/js/bootstrap-datetimepicker.min.js')}}"></script>
@endif

@if(Route::is(['appointments', 'booking-1', 'booking-2', 'contact-us', 'doctor-appointment-details', 'doctor-appointment-start', 'doctor-appointments-grid', 'doctor-cancelled-appointment-2', 'doctor-cancelled-appointment', 'doctor-completed-appointment', 'doctor-upcoming-appointment', 'faq', 'my-patients', 'patient-appointments-grid', 'patient-appointments', 'reviews']))
    <!-- Daterangepikcer JS -->
    <script src="{{URL::asset('build/js/moment.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/daterangepicker/daterangepicker.js')}}"></script>
@endif

@if(Route::is(['accounts', 'appointments', 'available-timings', 'blog-details', 'blog-grid', 'blog-list', 'calendar', 'checkout', 'change-password', 'delete-account', 'dependent', 'doctor-add-blog', 'doctor-appointment-details', 'doctor-appointment-start', 'doctor-appointments-grid', 'doctor-awards-settings', 'doctor-blog', 'doctor-business-settings', 'doctor-cancelled-appointment-2', 'doctor-cancelled-appointment', 'doctor-change-password', 'doctor-clinics-settings', 'doctor-completed-appointment', 'doctor-dashboard', 'doctor-education-settings', 'doctor-experience-settings', 'doctor-insurance-settings', 'doctor-payment', 'doctor-pending-blog', 'doctor-profile-settings', 'doctor-request', 'doctor-specialities', 'doctor-upcoming-appointment', 'edit-blog', 'favourites', 'invoices', 'medical-details', 'medical-records', 'my-patients', 'patient-accounts', 'patient-appointment-details', 'patient-appointments-grid', 'patient-appointments', 'patient-cancelled-appointment', 'patient-completed-appointment', 'patient-dashboard', 'patient-invoices', 'patient-profile', 'patient-upcoming-appointment', 'pharmacy-search', 'product-all', 'product-checkout', 'product-description', 'profile-settings', 'reviews', 'social-media', 'two-factor-authentication']))
    <!-- Sticky Sidebar JS -->
    <script src="{{URL::asset('build/plugins/theia-sticky-sidebar/ResizeSensor.js')}}"></script>
    <script src="{{URL::asset('build/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}"></script>
@endif

@if(Route::is(['calendar']))
    <!-- Full Calendar JS -->
    <script src="{{URL::asset('build/js/fullcalendar.min.js')}}"></script>
    <script src="{{URL::asset('build/js/jquery.fullcalendar.js')}}"></script>
@endif

@if(Route::is(['accounts', 'appointments', 'available-timings', 'booking-popup', 'booking', 'clinic', 'consultation', 'dependent', 'doctor-blog', 'doctor-add-blog', 'doctor-appointment-details', 'doctor-appointment-start', 'doctor-appointments-grid', 'doctor-awards-settings', 'doctor-business-settings', 'doctor-cancelled-appointment-2', 'doctor-cancelled-appointment', 'doctor-change-password', 'doctor-clinics-settings', 'doctor-completed-appointment', 'doctor-dashboard', 'doctor-education-settings', 'doctor-experience-settings', 'doctor-insurance-settings', 'doctor-payment', 'doctor-profile-settings', 'doctor-register-step2', 'doctor-register-step3', 'doctor-request', 'doctor-specialities', 'doctor-upcoming-appointment', 'edit-blog', 'hospitals', 'index-4', 'index', 'invoices', 'map-grid', 'map-list-availability', 'map-list', 'medical-records', 'my-patients', 'onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-identity', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-accounts', 'patient-appointment-details', 'patient-appointments-grid', 'patient-appointments', 'patient-cancelled-appointment', 'patient-completed-appointment', 'patient-dashboard', 'patient-details', 'patient-other-details', 'patient-personalize', 'patient-profile', 'patient-register-step2', 'patient-register-step5', 'patient-upcoming-appointment', 'payment', 'pharmacy-register-step2', 'pharmacy-register-step3', 'pharmacy-search', 'product-all', 'product-description', 'profile-settings', 'reviews', 'search', 'social-media', 'speciality']))
    <!-- Select2 JS -->
    <script src="{{URL::asset('build/plugins/select2/js/select2.min.js')}}"></script>
@endif

@if(Route::is(['chat-doctor', 'chat']))
    <!-- Swiper JS -->
    <script src="{{URL::asset('build/plugins/swiper/swiper.min.js')}}"></script>
@endif

@if(Route::is(['about-us', 'booking-2', 'index-2', 'index-3', 'index-4', 'index-5', 'index-7', 'index-8', 'index-9', 'index-10', 'index-11', 'index-12', 'index-13', 'map-list-availability']))
    <!-- Slick JS -->
    <script src="{{URL::asset('build/js/slick.js')}}"></script>
@endif

@if(Route::is(['index']))
    <!-- Slick Slider -->
    <script src="{{URL::asset('build/plugins/slick/slick.min.js')}}"></script>
@endif

@if(!Route::is(['booking-popup', 'booking-success-one', 'booking', 'coming-soon', 'consultation', 'doctor-register-step1', 'doctor-register-step2', 'doctor-register-step3', 'doctor-signup', 'email-otp', 'error-404', 'error-500', 'forgot-password', 'forgot-password2', 'login-email-otp', 'login-email', 'login-phone-otp', 'login-phone', 'maintenance', 'mobile-otp', 'patient-details', 'patient-register-step1', 'patient-register-step2', 'patient-register-step3', 'patient-register-step4', 'patient-register-step5', 'patient-signup', 'payment', 'pharmacy-register-step1', 'pharmacy-register-step2', 'pharmacy-register-step3', 'reset-password', 'signup-success', 'signup']))
    <!-- Fancybox JS -->
    <script src="{{URL::asset('build/plugins/fancybox/jquery.fancybox.min.js')}}"></script>
@endif

@if(Route::is(['doctor-profile', 'onboarding-availability', 'onboarding-consultation', 'onboarding-cost', 'onboarding-email-otp', 'onboarding-email-step-2-verify', 'onboarding-email', 'onboarding-identity', 'onboarding-lock', 'onboarding-password', 'onboarding-payments', 'onboarding-personalize', 'onboarding-phone-otp', 'onboarding-phone', 'onboarding-preferences', 'onboarding-verification', 'onboarding-verify-account', 'patient-appointment-details', 'patient-cancelled-appointment', 'patient-completed-appointment', 'patient-dashboard', 'patient-dependant-details', 'patient-details', 'patient-email', 'patient-family-details', 'patient-other-details', 'patient-personalize', 'patient-upcoming-appointment']))
    <!-- Owl Carousel JS -->
    <script src="{{URL::asset('build/js/owl.carousel.min.js')}}"></script>
@endif

@if(Route::is(['doctor-appointment-start', 'doctor-profile-settings', 'medical-records', 'patient-profile']))
    <!-- Bootstrap Tagsinput JS -->
    <script src="{{URL::asset('build/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
@endif

@if(Route::is(['index-13']))
    <!-- Coming Soon JS -->
    <script src="{{URL::asset('build/js/coming-soon.js')}}"></script>
@endif

@if(Route::is(['about-us', 'index-8', 'index']))
    <!-- Counter JS -->
    <script src="{{URL::asset('build/js/counter.js')}}"></script>
@endif

@if(Route::is(['index-4', 'index-7', 'index-10']))
    <!-- counterup JS -->
    <script src="{{URL::asset('build/js/jquery.waypoints.js')}}"></script>
    <script src="{{URL::asset('build/js/jquery.counterup.min.js')}}"></script>
@endif

@if(Route::is(['index', 'index-2', 'index-3', 'index-4', 'index-5', 'index-6', 'index-7', 'index-8', 'index-9', 'index-10', 'index-11', 'index-12', 'index-13']))
    <!-- Wow JS -->
    <script src="{{URL::asset('build/plugins/wow/js/wow.min.js')}}"></script>
@endif

@if(Route::is(['index-2', 'index-3', 'index-4', 'index-6', 'index-7', 'index-10', 'index-11', 'index-13', 'index']))
    <!-- BacktoTop JS -->
    <script src="{{URL::asset('build/js/backToTop.js')}}"></script>
@endif

@if(Route::is(['index-4']))
    <!-- Skrollr JS -->
    <script src="{{URL::asset('build/js/skrollr.min.js')}}"></script>
@endif

@if(Route::is(['doctor-register', 'doctor-signup', 'email-otp', 'forgot-password2', 'forgot-password', 'login-phone-otp', 'login-phone', 'mobile-otp', 'onboarding-phone', 'patient-signup', 'pharmacy-register', 'register', 'signup-success']))
    <!-- Mobile Input -->
    <script src="{{URL::asset('build/plugins/intltelinput/js/intlTelInput.js')}}"></script>
@endif

@if(Route::is(['doctor-grid', 'search-2']))
    <!-- Rangeslider JS -->
    <script src="{{URL::asset('build/plugins/ion-rangeslider/js/ion.rangeSlider.js')}}"></script>
    <script src="{{URL::asset('build/plugins/ion-rangeslider/js/custom-rangeslider.js')}}"></script>
    <script src="{{URL::asset('build/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
@endif

@if(Route::is(['index-2', 'index-9']))
    <!-- Gsap JS -->
    <script src="{{URL::asset('build/plugins/gsap/gsap.min.js')}}"></script>
@endif

@if(Route::is(['map-grid', 'map-list-availability', 'map-list']))
    <!-- Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6adZVdzTvBpE2yBRK8cDfsss8QXChK0I"></script>
    <script src="{{URL::asset('build/js/map.js')}}"></script>
@endif

@if(Route::is(['doctor-dashboard', 'patient-appointment-details', 'patient-cancelled-appointment', 'patient-comlpleted-appointment', 'patient-dashboard', 'patient-upcoming-appointment']))
    <!-- Apexchart JS -->
    <script src="{{URL::asset('build/plugins/apex/apexcharts.min.js')}}"></script>
    <script src="{{URL::asset('build/plugins/apex/chart-data.js')}}"></script>
@endif

@if(Route::is(['reset-password']))
    <!-- Validation-->
    <script src="{{URL::asset('build/js/validation.js')}}"></script>
@endif

@if(Route::is(['doctor-dashboard', 'patient-appointment-details', 'patient-cancelled-appointment', 'patient-comlpleted-appointment', 'patient-dashboard', 'patient-upcoming-appointment']))
    <!-- Circle Progress JS -->
    <script src="{{URL::asset('build/js/circle-progress.min.js')}}"></script>
@endif

@if(Route::is(['depentent', 'doctor-awards-settings', 'doctor-business-settings', 'doctor-clinics-settings', 'doctor-education-settings', 'doctor-experience-settings', 'doctor-insurance-settings', 'doctor-profile-settings', 'doctor-specialities', 'patient-profile']))
    <!-- Profile Settings JS -->
    <script src="{{URL::asset('build/js/profile-settings.js')}}"></script>
@endif

<!-- Main JS -->
<script src="{{URL::asset('build/js/script.js')}}"></script>