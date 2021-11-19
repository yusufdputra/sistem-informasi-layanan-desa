<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="account-pages my-5 authentication-bg authentication-bg-pattern">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="text-center">
          <a href="<?php echo e(('/')); ?>">
            <img src="<?php echo e(asset('adminto/images/logo-dark.png')); ?>" alt="" class="mx-auto">
          </a>
          <p class="text-muted mt-2 mb-4">Sistem Informasi Layanan Desa Makmur</p>

        </div>
        <div class="card">



          <div class="card-body p-4">

            <div class="text-center mb-4">
              <h4 class="text-uppercase mt-0">Ubah Kata Sandi</h4>
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

            <form method="POST" action="<?php echo e(route('password.ubah')); ?>">
              <?php echo csrf_field(); ?>
              <div class="mb-3">
                <input type="hidden" value="<?php echo e($token); ?>" name="token">
                <label for="email" class="form-label">Email</label>
                <input id="password" placeholder="Kata Sandi" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" data-toggle="password" required autocomplete="current-password">

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


              <div class="mb-3 d-grid text-center">
                <button class="btn btn-primary" type="submit"> Ubah </button>
              </div>
            </form>

           

          </div> <!-- end card-body -->
        </div>
        <!-- end card -->


        <!-- end row -->

      </div> <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/auth/passwords/forgot.blade.php ENDPATH**/ ?>