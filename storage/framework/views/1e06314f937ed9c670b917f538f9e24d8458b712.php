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
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Masuk</h4>
                        </div>

                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor Induk Keluarga</label>
                                <input class="form-control <?php $__errorArgs = ['nik'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nik" type="text" id="nik" value="<?php echo e(old('nik')); ?>" required autocomplete="off" placeholder="Masukkan Nomor Induk Keluarga">
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
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input placeholder="Masukkan Kata Sandi Anda" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('password')); ?>" name="password" data-toggle="password" required autocomplete="current-password">

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
                                <button class="btn btn-primary" type="submit"> Masuk </button>
                            </div>
                        </form>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="<?php echo e(route('password.index')); ?>" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Lupa Kata Sandi?</a></p>
                                <p class="text-muted">Tidak punya akun? <a href="<?php echo e(('register')); ?>" class="text-dark ms-1"><b>Daftar</b></a></p>
                            </div> <!-- end col -->
                        </div>

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

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/auth/login.blade.php ENDPATH**/ ?>