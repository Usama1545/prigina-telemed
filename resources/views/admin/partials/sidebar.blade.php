<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ Request::is('admin', 'admin/index') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ Request::is('admin/appointment-list') ? 'active' : '' }}">
                    <a href="{{ route('admin.appointment-list') }}"><i class="fe fe-layout"></i>
                        <span>Appointments</span></a>
                </li>
                <li class="{{ Request::is('admin/specialities') ? 'active' : '' }}">
                    <a href="{{ route('admin.specialities') }}"><i class="fe fe-users"></i>
                        <span>Specialities</span></a>
                </li>
                <li class="{{ Request::is('admin/doctor-list') ? 'active' : '' }}">
                    <a href="{{ route('admin.doctor-list') }}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li class="{{ Request::is('admin/patient-list') ? 'active' : '' }}">
                    <a href="{{ route('admin.patient-list') }}"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                <li class="{{ Request::is('admin/reviews') ? 'active' : '' }}">
                    <a href="{{ route('admin.reviews') }}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>
                <li class="{{ Request::is('admin/transactions-list') ? 'active' : '' }}">
                    <a href="{{ route('admin.transactions-list') }}"><i class="fe fe-activity"></i>
                        <span>Transactions</span></a>
                </li>
                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings') }}"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
                <li class="{{ Request::is('admin/reports') ? 'active' : '' }}">
                    <a href="{{ route('admin.reports') }}"
                        class="{{ Request::is('admin/reports', 'admin/invoice-report', 'admin/invoice') ? 'active' : '' }}">
                        <i class="fe fe-bar-chart"></i> <span>Reports</span>
                    </a>
                </li>
                <li class="{{ Request::is('admin/notifications*') ? 'active' : '' }}">
                    <a href="{{ route('admin.notifications') }}"><i class="fe fe-bell"></i> <span>Notifications</span></a>
                </li>
                <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                    <a href="{{ route('admin.profile') }}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
