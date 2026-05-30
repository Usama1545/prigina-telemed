    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('build/img/prigina-gav.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('build/admin/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ URL::asset('build/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/plugins/fontawesome/css/all.min.css') }}">
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/4.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ URL::asset('build/admin/css/feathericon.min.css') }}">

    @if (Route::is(['admin.calendar', 'admin.profile']))
        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="{{ URL::asset('build/admin/css/bootstrap-datetimepicker.min.css') }}">
    @endif

    @if (Route::is(['admin.calendar']))
        <!-- Full Calander CSS -->
        <link rel="stylesheet" href="{{ URL::asset('build/admin/css/fullcalendar.min.css') }}">
    @endif

    @if (Route::is([
            'admin.appointment-list',
            'admin.data-tables',
            'admin.doctor-list',
            'admin.invoice-report',
            'admin.invoice',
            'admin.patient-list',
            'admin.reviews',
            'admin.specialities',
            'admin.transactions-list',
        ]))
        <!-- Datatables CSS -->
        <link rel="stylesheet" href="{{ URL::asset('build/admin/plugins/datatables/datatables.min.css') }}">
    @endif

    @if (Route::is(['admin.index', 'admin.index-page']))
        <!-- Morris CSS -->
        <link rel="stylesheet" href="{{ URL::asset('build/admin/plugins/morris/morris.css') }}">
    @endif

    @if (Route::is(['admin.form-vertical', 'admin.form-horizontal']))
        <!-- Select2 CSS -->
        <link rel="stylesheet" href="{{ URL::asset('build/admin/css/select2.min.css') }}">
    @endif

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ URL::asset('build/admin/css/custom.css') }}">
    <!-- Theme overrides -->
    <link rel="stylesheet" href="{{ URL::asset('build/admin/css/admin-theme.css') }}">
