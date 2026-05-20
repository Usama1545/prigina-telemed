<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ Request::is('admin', 'admin/index') ? 'active' : '' }}">
                    <a href="{{ url('admin/index') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ Request::is('admin/appointment-list') ? 'active' : '' }}">
                    <a href="{{ url('admin/appointment-list') }}"><i class="fe fe-layout"></i> <span>Appointments</span></a>
                </li>
                <li class="{{ Request::is('admin/specialities') ? 'active' : '' }}">
                    <a href="{{ url('admin/specialities') }}"><i class="fe fe-users"></i> <span>Specialities</span></a>
                </li>
                <li class="{{ Request::is('admin/doctor-list') ? 'active' : '' }}">
                    <a href="{{ url('admin/doctor-list') }}"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>
                </li>
                <li class="{{ Request::is('admin/patient-list') ? 'active' : '' }}">
                    <a href="{{ url('admin/patient-list') }}"><i class="fe fe-user"></i> <span>Patients</span></a>
                </li>
                <li class="{{ Request::is('admin/reviews') ? 'active' : '' }}">
                    <a href="{{ url('admin/reviews') }}"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
                </li>
                <li class="{{ Request::is('admin/transactions-list') ? 'active' : '' }}">
                    <a href="{{ url('admin/transactions-list') }}"><i class="fe fe-activity"></i> <span>Transactions</span></a>
                </li>
                <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                    <a href="{{ url('admin/settings') }}"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href="#" class="{{ Request::is('admin/invoice-report', 'admin/invoice') ? 'active' : '' }}">
                        <i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li>
                            <a href="{{ url('admin/invoice-report') }}" class="{{ Request::is('admin/invoice-report', 'admin/invoice') ? 'active' : '' }}">Invoice Reports</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                    <a href="{{ url('admin/profile') }}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('admin/login') }}"> Login </a></li>
                        <li><a href="{{ url('admin/register') }}"> Register </a></li>
                        <li><a href="{{ url('admin/forgot-password') }}"> Forgot Password </a></li>
                        <li><a href="{{ url('admin/lock-screen') }}"> Lock Screen </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('admin/error-404') }}">404 Error </a></li>
                        <li><a href="{{ url('admin/error-500') }}">500 Error </a></li>
                    </ul>
                </li>
                <li class="{{ Request::is('admin/blank-page') ? 'active' : '' }}">
                    <a href="{{ url('admin/blank-page') }}"><i class="fe fe-file"></i> <span>Blank Page</span></a>
                </li>
                <li class="menu-title">
                    <span>UI Interface</span>
                </li>
                <li class="{{ Request::is('admin/components') ? 'active' : '' }}">
                    <a href="{{ url('admin/components') }}"><i class="fe fe-vector"></i> <span>Components</span></a>
                </li>
                <li class="submenu">
                    <a href="#" class="{{ Request::is('admin/form-basic-inputs', 'admin/form-input-groups', 'admin/form-horizontal', 'admin/form-vertical', 'admin/form-mask', 'admin/form-validation') ? 'active' : '' }}">
                        <i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ url('admin/form-basic-inputs') }}" class="{{ Request::is('admin/form-basic-inputs') ? 'active' : '' }}">Basic Inputs </a></li>
                        <li><a href="{{ url('admin/form-input-groups') }}" class="{{ Request::is('admin/form-input-groups') ? 'active' : '' }}">Input Groups </a></li>
                        <li><a href="{{ url('admin/form-horizontal') }}" class="{{ Request::is('admin/form-horizontal') ? 'active' : '' }}">Horizontal Form </a></li>
                        <li><a href="{{ url('admin/form-vertical') }}" class="{{ Request::is('admin/form-vertical') ? 'active' : '' }}"> Vertical Form </a></li>
                        <li><a href="{{ url('admin/form-mask') }}" class="{{ Request::is('admin/form-mask') ? 'active' : '' }}"> Form Mask </a></li>
                        <li><a href="{{ url('admin/form-validation') }}" class="{{ Request::is('admin/form-validation') ? 'active' : '' }}"> Form Validation </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#" class="{{ Request::is('admin/tables-basic', 'admin/data-tables') ? 'active' : '' }}">
                        <i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ url('admin/tables-basic') }}" class="{{ Request::is('admin/tables-basic') ? 'active' : '' }}">Basic Tables </a></li>
                        <li><a href="{{ url('admin/data-tables') }}" class="{{ Request::is('admin/data-tables') ? 'active' : '' }}">Data Table </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> <span>Level 1</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
