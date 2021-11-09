

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


          <form class="row" enctype="multipart/form-data" action="<?php echo e(route('/')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id_pengajuan" <?php if($pengajuan !=null): ?> value="<?php echo e($pengajuan->id); ?>" <?php endif; ?>>

            <div class="col-lg-6">
              <div class="form-group mb-2">
                <label class=" col-form-label">Nomor Induk Keluarga (NIK)</label>
                <input type="text" class="form-control" value="<?php echo e(Auth::user()->nik); ?>" name="nama" required placeholder="Ketikkan sesuatu..." />
              </div>
              <div class="form-group mb-2">
                <label class=" col-form-label">Nama Lengkap</label>
                <input type="text" value="<?php echo e(Auth::user()->username); ?>" class="form-control" name="nim" required placeholder="Sesuai KTP" />
              </div>
              <div class="form-group mb-2">
                <label class=" col-form-label">Tempat Lahir</label>
                <input type="text" value="<?php echo e(Auth::user()->username); ?>" class="form-control" name="nim" required placeholder="Sesuai KTP" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-2">
                <label class=" col-form-label">Nama Lengkap</label>
                <input type="text" class="form-control" value="<?php echo e($pengajuan['id']); ?>" name="nama" required placeholder="Ketikkan sesuatu..." />
              </div>
              <div class="form-group mb-2">
                <label class=" col-form-label">NIM</label>
                <input type="text" value="<?php echo e($pengajuan['id']); ?>" class="form-control" name="nim" required placeholder="Ketikkan sesuatu..." />
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/warga/form/kurang_mampu.blade.php ENDPATH**/ ?>