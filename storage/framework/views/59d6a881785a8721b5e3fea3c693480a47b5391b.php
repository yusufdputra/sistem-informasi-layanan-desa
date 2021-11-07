<div class="left-side-menu">

  <div class="h-100" data-simplebar>

    <!-- User box -->
    <div class="user-box text-center">

      <img src="<?php echo e(asset('adminto/images/users/user-1.jpg')); ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
      <div class="dropdown">
        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown" aria-expanded="false"><?php echo e(strtoupper(Auth::user()->username)); ?></a>

      </div>

    </div>

    <!--- Sidemenu -->
    <div id="sidebar-menu">

      <ul id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
          <a href="<?php echo e(route('home.index')); ?>">
            <i class="mdi mdi-view-dashboard"></i>
            <span> Dashboard </span>
          </a>
        </li>

        <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>

        <li>
          <a href="#website" data-bs-toggle="collapse">
            <i class="mdi mdi-web"></i>
            <span> Kelola Website </span>
            <span class="menu-arrow"></span>
          </a>
          <div class="collapse" id="website">
            <ul class="nav-second-level">

              <li>
                <a href="<?php echo e(route('staff.index')); ?>">Staff Desa</a>
              </li>
              <li>
                <a href="<?php echo e(route('berita.index')); ?>">Berita</a>
              </li>
              <li>
                <a href="<?php echo e(route('layanan.index')); ?>">Layanan</a>
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
                <a href="<?php echo e(('pengajuan')); ?>">Pengajuan</a>
              </li>
              <li>
                <a href="<?php echo e(('arsip')); ?>">Arsip</a>
              </li>
            </ul>
          </div>
        </li>

        <li>
          <a href="<?php echo e(('warga')); ?>">
            <i class="mdi mdi-human-male-female"></i>
            <span> Data Warga </span>
          </a>
        </li>


        <?php endif; ?>

      </ul>

    </div>
    <!-- End Sidebar -->

    <div class="clearfix"></div>

  </div>
  <!-- Sidebar -left -->

</div><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>