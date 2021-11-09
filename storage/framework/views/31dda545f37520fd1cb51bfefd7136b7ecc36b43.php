

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


          <form class="row" enctype="multipart/form-data" action="<?php echo e(route('bedaNama.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id_pengajuan" <?php if($pengajuan !=null): ?> value="<?php echo e($pengajuan->id); ?>" <?php endif; ?>>
            <input type="hidden" name="id_jenis_surat" value="<?php echo e($layanan->id); ?>" >
            <input type="hidden" name="id_warga" value="<?php echo e($profil->id); ?>" >
            <input type="hidden" name="id_surat_beda_nama"  <?php if(isset($surat)): ?> value="<?php echo e($surat->id); ?>" <?php endif; ?> >

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
                <div class="input-group">
                  <input type="text" class="form-control" value="<?php echo e($profil->tempat_lhr); ?>" name="tempat_lhr" required placeholder="Ketikkan sesuatu..." />
                  <input type="text" class="form-control" id="basic-datepicker" value="<?php echo e($profil->tanggal_lhr); ?>" name="tanggal_lhr" required placeholder="yyyy-mm-dd" />
                </div>
              </div>

              <div class="form-group mb-2">
                <label class=" col-form-label">Pekerjaan</label>
                <input type="text" value="<?php echo e($profil['pekerjaan']); ?>" class="form-control" name="pekerjaan" required placeholder="Sesuai KTP" />
              </div>
            </div>
            <div class="col-lg-6">


              <!-- alamat -->
              <?php echo $__env->make('helper.getDataDaerah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="form-group mb-2">
                <label class=" col-form-label">Tujuan Pengajuan Surat</label>
                <textarea type="text" class="form-control" rows="5" name="tujuan" required placeholder="Ketikkan sesuatu..."></textarea>
              </div>
            </div>

            <div class="col-12 d-grid mt-3">
              <button type="submit" class="btn btn-primary  waves-effect waves-light">Ajukan Surat</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/warga/form/beda_nama.blade.php ENDPATH**/ ?>