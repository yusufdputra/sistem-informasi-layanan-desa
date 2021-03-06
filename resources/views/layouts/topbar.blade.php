<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-end mb-0">


        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
               
                <span class="pro-user-name ms-1">
                    {{strtoupper(Auth::user()->username)}} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Selamat Datang !</h6>
                </div>

                <!-- item-->
                <a href="{{route('profile.index')}}" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Akun Saya</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{('logout')}}" class="dropdown-item notify-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{('/')}}" class="logo logo-light text-center">
            <span class="logo-sm">
                <img src="{{asset('adminto/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('adminto/images/logo-light.png')}}" alt="" height="16">
            </span>
        </a>
        <a href="{{('/')}}" class="logo logo-dark text-center">
            <span class="logo-sm">
                <img src="{{asset('adminto/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('adminto/images/logo-dark.png')}}" alt="" height="16">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <h4 class="page-title-main">{{$title}}</h4>
        </li>

    </ul>

    <div class="clearfix"></div>

</div>