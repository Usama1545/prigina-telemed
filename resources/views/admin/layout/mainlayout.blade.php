<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.partials.head-css')
    @include('admin.partials.title-meta')
</head>

@if(Request::is('admin/error-404', 'admin/error-500'))
<body class="error-page">
@else
<body>
@endif

    @if(Request::is('admin/login', 'admin/register', 'admin/forgot-password', 'admin/lock-screen'))
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
    @else
    <!-- Main Wrapper -->
    <div class="main-wrapper">
    @endif

        @if(!Request::is('admin/error-404', 'admin/error-500', 'admin/login', 'admin/register', 'admin/forgot-password', 'admin/lock-screen'))
        @include('admin.partials.topbar')
        @include('admin.partials.sidebar')
        @endif

            @yield('content')

    </div>
    <!-- /Main Wrapper -->

@component('admin.components.modal-popup')
@endcomponent

@include('admin.partials.vendor-scripts')

</body>
</html>
