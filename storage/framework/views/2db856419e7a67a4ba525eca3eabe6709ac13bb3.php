

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box">

          <div class="align-items-center ">
            <a href="<?php echo e(route('pengajuan.index')); ?>" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>

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
          <?php
          $target = $form.'.store';
          ?>
          <form class="row" enctype="multipart/form-data" action="<?php echo e(route($target)); ?>" method="POST">
            <?php echo $__env->make('formPengajuan.'.$form, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-12 d-grid mt-3">
              <button type="submit" class="btn btn-primary  waves-effect waves-light">Ajukan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/warga/form/index.blade.php ENDPATH**/ ?>