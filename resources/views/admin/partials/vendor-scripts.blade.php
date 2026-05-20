    <!-- jQuery -->
    <script src="{{URL::asset('build/admin/js/jquery-3.7.1.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{URL::asset('build/admin/js/bootstrap.bundle.min.js')}}"></script>

 @if(!Route::is(['admin.error-404', 'admin.error-500', 'admin.forgot-password', 'admin.lock-screen', 'admin.login', 'admin.register']))
    <!-- Slimscroll JS -->
    <script src="{{URL::asset('build/admin/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
@endif

@if(Route::is(['admin.calendar', 'admin.profile']))
    <!-- Datetimepicker JS -->
    <script src="{{URL::asset('build/admin/js/moment.min.js')}}"></script>
    <script src="{{URL::asset('build/admin/js/bootstrap-datetimepicker.min.js')}}"></script>
@endif

@if(Route::is(['admin.appointment-list', 'admin.data-tables', 'admin.doctor-list', 'admin.invoice-report', 'admin.invoice', 'admin.patient-list', 'admin.reviews', 'admin.specialities', 'admin.transactions-list']))
    <!-- Datatables JS -->
    <script src="{{URL::asset('build/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('build/admin/plugins/datatables/datatables.min.js')}}"></script>
@endif

@if(Route::is(['admin.calendar']))
    <!-- Full Calendar JS -->
    <script src="{{URL::asset('build/admin/js/fullcalendar.min.js')}}"></script>
    <script src="{{URL::asset('build/admin/js/jquery.fullcalendar.js')}}"></script>
@endif

@if(Route::is(['admin.form-mask']))
    <!-- Mask JS -->
    <script src="{{URL::asset('build/admin/js/jquery.maskedinput.min.js')}}"></script>
    <script src="{{URL::asset('build/admin/js/mask.js')}}"></script>
@endif

@if(Route::is(['admin.index', 'admin.index-page']))
    <!-- Morris JS -->
    <script src="{{URL::asset('build/admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{URL::asset('build/admin/plugins/morris/morris.min.js')}}"></script>
    <script src="{{URL::asset('build/admin/js/chart.morris.js')}}"></script>
@endif

@if(Route::is(['admin.form-vertical', 'admin.form-horizontal']))
    <!-- Select2 JS -->
    <script src="{{URL::asset('build/admin/js/select2.min.js')}}"></script>
@endif

@if(Route::is(['admin.form-validation']))
    <!-- Form Validation JS -->
    <script src="{{URL::asset('build/admin/js/form-validation.js')}}"></script>
@endif

    <!-- Custom JS -->
    <script  src="{{URL::asset('build/admin/js/script.js')}}"></script>
