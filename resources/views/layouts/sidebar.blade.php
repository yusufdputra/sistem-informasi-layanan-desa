<div class="left-side-menu">

  <div class="h-100" data-simplebar>

    <!-- User box -->
    <div class="user-box text-center">

      <img src="{{asset('adminto/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
      <div class="dropdown">
        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false">{{strtoupper(Auth::user()->username)}}</a>

      </div>

    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

      <ul id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
          <a href="{{route('home.index')}}">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Dashboard </span>
          </a>
        </li>

        @role('admin')

        <li>
          <a href="#website" data-bs-toggle="collapse">
            <i class="mdi mdi-web"></i>
            <span> Kelola Website </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="website">
            <ul class="nav-second-level">

              <li>
                <a href="{{route('staff.index')}}">Staff Desa</a>
              </li>
              <li>
                <a href="{{route('berita.index')}}">Berita</a>
              </li>
              <li>
                <a href="{{route('layanan.index')}}">Layanan</a>
              </li>
            </ul>
          </div>
        </li>
        <li>
          <a href="#layanan" data-bs-toggle="collapse">
            <i class="mdi mdi-email-newsletter"></i>
            <span> Kelola Layanan </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="layanan">
            <ul class="nav-second-level">

              <li>
                <a href="{{('pengajuan')}}">Pengajuan</a>
              </li>
              <li>
                <a href="{{('arsip')}}">Arsip</a>
              </li>
            </ul>
          </div>
        </li>

        <li>
          <a href="{{('warga')}}">
            <i class="mdi mdi-human-male-female"></i>
            <span> Data Warga </span>
          </a>
        </li>


        @endrole

      </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

  </div>
  <!-- Sidebar -left -->

</div>