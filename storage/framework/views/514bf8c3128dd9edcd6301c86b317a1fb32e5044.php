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
<?php /**PATH C:\xampp\htdocs\SILADES\resources\views/formPengajuan/kurang_mampu.blade.php ENDPATH**/ ?>