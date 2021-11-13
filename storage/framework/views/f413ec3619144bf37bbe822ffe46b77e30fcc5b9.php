<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="account-pages mt-5 mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="text-center">
          <a href="index.html">
            <img src="<?php echo e(asset('adminto/images/logo-dark.png')); ?>" alt="" height="22" class="mx-auto">
          </a>
          <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
        </div>
        <div class="card">

          <div class="card-body p-4">

            <div class="text-center mb-4">
              <h4 class="text-uppercase mt-0">Daftar</h4>
            </div>

            <?php if(\Session::has('alert')): ?>
            <div class="alert alert-danger">
              <div><?php echo e(Session::get('alert')); ?></div>
            </div>
            <?php endif; ?>

            <?php if(\Session::has('success')): ?>
            <div class="alert alert-success">
              <div><?php echo e(Session::get('success')); ?></div>
            </div>
            <?php endif; ?>

            <form class="form-horizontal m-t-20" enctype="multipart/form-data" method="POST" action="<?php echo e(route('register')); ?>">
              <?php echo csrf_field(); ?>

              <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Keluarga</label>
                <input type="number" class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nik" value="<?php echo e(old('nik')); ?>" placeholder="Sesuai KTP" required autocomplete="off">

                <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama" value="<?php echo e(old('nama')); ?>" placeholder="Sesuai KTP" required autocomplete="off">

                <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input class="form-control  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password')); ?>" type="password"  name="password" required id="password" placeholder="Masukkan Kata Sandi">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                  <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input type="checkbox" required class="form-check-input" id="checkbox-signup">
                  <label class="form-check-label"  for="checkbox-signup">Saya Menyetujui <a href="javascript: void(0);" class="text-dark">Syarat dan Ketentuan yang berlaku.</a></label>
                </div>
              </div>
              <div class="mb-3 text-center d-grid">
                <button class="btn btn-primary" type="submit"> Daftar </button>
              </div>

            </form>

          </div> <!-- end card-body -->
        </div>
        <!-- end card -->

        <div class="row mt-3">
          <div class="col-12 text-center">
            <p class="text-muted">Sudah punya akun? <a href="<?php echo e(route('login')); ?>" class="text-dark ms-1"><b>Masuk</b></a></p>
          </div> <!-- end col -->
        </div>
        <!-- end row -->

      </div> <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>


<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/auth/register.blade.php ENDPATH**/ ?>