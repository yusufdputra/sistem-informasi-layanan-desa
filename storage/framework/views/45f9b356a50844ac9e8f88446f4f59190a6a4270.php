<?php echo csrf_field(); ?>
<input type="hidden" name="id_pengajuan" <?php if($pengajuan !=null): ?> value="<?php echo e($pengajuan->id); ?>" <?php endif; ?>>
<input type="hidden" name="id_jenis_surat" value="<?php echo e($layanan->id); ?>">
<input type="hidden" name="id_warga" value="<?php echo e($profil->id); ?>">
<input type="hidden" name="id_surat" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat->id); ?>" <?php endif; ?>>

<div class="col-lg-6">
  <div class="form-group mb-2">
    <label class=" col-form-label">Nomor Induk Keluarga (NIK)</label>
    <input type="text" class="form-control" value="<?php echo e($profil->user->nik); ?>" name="nik" required placeholder="Ketikkan sesuatu..." />
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Nama Lengkap</label>
    <input type="text" value="<?php echo e($profil->nama); ?>" class="form-control" name="nama" required placeholder="Sesuai KTP" />
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Jenis Kelamin</label>
    <select required class="form-control" name="jenis_kelamin">
      <option value="" selected disabled hidden>Silahkan Pilih</option>
      <option value="lk" <?= $profil['jenis_kelamin'] == 'lk' ? 'selected' : ''; ?>>Laki-Laki</option>
      <option value="pr" <?= $profil['jenis_kelamin'] == 'pr' ? 'selected' : ''; ?>>Perempuan</option>
    </select>
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Tempat dan Tanggal Lahir</label>
    <div class="input-group">
      <input type="text" class="form-control" value="<?php echo e($profil->tempat_lhr); ?>" name="tempat_lhr" required placeholder="Ketikkan sesuatu..." />
      <input type="text" class="form-control" id="basic-datepicker" value="<?php echo e($profil->tanggal_lhr); ?>" name="tanggal_lhr" required placeholder="yyyy-mm-dd" />
    </div>
  </div>


</div>
<div class="col-lg-6">
  <div class="form-group mb-2">
    <label class=" col-form-label">Pekerjaan</label>
    <input type="text" value="<?php echo e($profil['pekerjaan']); ?>" class="form-control" name="pekerjaan" required placeholder="Sesuai KTP" />
  </div>

  <!-- alamat -->
  <?php echo $__env->make('helper.getDataDaerah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="form-group mb-2">
    <label class=" col-form-label">Penghasilan</label>
    <div class="input-group mb-2">
      <div class="input-group-text">Rp.</div>
      <input type="" min="0"  <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat->penghasilan); ?>" <?php endif; ?> class="form-control" name="penghasilan" required placeholder="Rp. " />
    </div>
    
  </div>

</div><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/formPengajuan/penghasilan.blade.php ENDPATH**/ ?>