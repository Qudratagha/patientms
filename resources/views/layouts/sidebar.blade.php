<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect @if(request()->route()->action['as'] == 'dashboard') active @endif">
                        <i class='bx bxs-dashboard'></i>
                        <span >Dashboards</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('patients.index')}}" class="waves-effect @if(request()->route()->action['as'] == 'patients') active @endif">
                        <i class='bx bxs-dashboard'></i>
                        <span >Patients</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bxs-user'></i>
                        <span key="t-apps">Admin</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('users.index') }}"><span key="t-calendar">Users</span></a></li>
                        <li><a href="{{ route('role.index') }}"><span key="t-chat">Roles</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
