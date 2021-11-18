

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box">

          <div class="align-items-center ">
            <?php if($pengajuan['status'] == 'selesai'): ?>
            <a href="<?php echo e(route('arsip.index')); ?>" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>
            <?php else: ?>
            <a href="<?php echo e(route('pengajuan.index')); ?>" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>
            <?php endif; ?>
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
          <div class="row">
            <?php echo $__env->make('formPengajuan.'.$form, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="row">
              <div class="col-sm-12">

                <?php if($pengajuan['status'] != 'selesai'): ?>
                <div class="text-end">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#tolak-modal" class="btn btn-danger waves-effect waves-light me-1 tolak_modal"> Tolak </button>
                  <a href="<?php echo e(route('pengajuan/terima/', $pengajuan->id)); ?>" class="btn btn-success waves-effect waves-light me-1"> Terima </a>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div id="tolak-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Tolak Pengajuan Ini</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengajuan.tolak')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="text-left">

            <input type="hidden" name="id_pengajuan" value="<?php echo e($pengajuan->id); ?>" id="edit_id">

            <div class="row mb-3">
              <label for="nama" class="col-4 col-xl-3 col-form-label">Alasan Penolakan</label>
              <div class="col-8 col-xl-9">
                <textarea class="form-control" type="text" autocomplete="off" name="alasan" rows="5" required="" placeholder="Ketikkan Sesuatu..."></textarea>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/admin/form/index.blade.php ENDPATH**/ ?>