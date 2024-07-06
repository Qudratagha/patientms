<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('dashboard')}}" class="logo logo-light" style="color: white">
                    <span class="logo-sm" >
                        PMS
                    </span>
                    <span class="logo-lg">
                        Patient MS
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 vertinav-toggle header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <button type="button" class="btn btn-sm px-3 font-size-16 horinav-toggle header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect show" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="/assets/images/users/avatar-1.jpg"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1"> {{ ucfirst(Auth::user()->name) }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <h6 class="dropdown-header">Welcome {{ ucfirst(Auth::user()->name) }}!</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('profile.show') }}"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ ucfirst(Auth::user()->name) }}&nbsp;Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i>&nbsp;&nbsp;{{ __(' Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>


{{--            <div class="dropdown d-inline-block">--}}
{{--                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">--}}
{{--                    <i class="bx bx-cog bx-spin"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
    </div>
</header>
