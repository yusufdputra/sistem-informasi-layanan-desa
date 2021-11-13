<?php echo csrf_field(); ?>
<input type="hidden" name="id_pengajuan" <?php if($pengajuan !=null): ?> value="<?php echo e($pengajuan->id); ?>" <?php endif; ?>>
<input type="hidden" name="id_jenis_surat" value="<?php echo e($layanan->id); ?>">
<input type="hidden" name="id_warga" value="<?php echo e($profil->id); ?>">
<input type="hidden" name="id_surat" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat->id); ?>" <?php endif; ?>>

<div class="col-lg-6">
  <div class="form-group mb-2">
    <label class=" col-form-label">Nama Lengkap</label>
    <input type="text" value="<?php echo e($profil->nama); ?>" class="form-control" name="nama" required placeholder="Sesuai KTP" />
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Tempat dan Tanggal Lahir</label>
    <div class="input-group">
      <input type="text" class="form-control" value="<?php echo e($profil->tempat_lhr); ?>" name="tempat_lhr" required placeholder="Ketikkan sesuatu..." />
      <input type="text" class="form-control" id="basic-datepicker" value="<?php echo e($profil->tanggal_lhr); ?>" name="tanggal_lhr" required placeholder="yyyy-mm-dd" />
    </div>
  </div>

  <div class="form-group mb-2">
    <label class=" col-form-label">Agama</label>
    <select required class="form-control" name="agama">
      <option value="" selected disabled hidden>Silahkan Pilih</option>
      <option value="ISLAM" <?= $profil['agama'] == 'ISLAM' ? 'selected' : ''; ?>>ISLAM</option>
      <option value="PROTESTAN" <?= $profil['agama'] == 'PROTESTAN' ? 'selected' : ''; ?>>PROTESTAN</option>
      <option value="KATOLIK" <?= $profil['agama'] == 'KATOLIK' ? 'selected' : ''; ?>>KATOLIK</option>
      <option value="HINDU" <?= $profil['agama'] == 'HINDU' ? 'selected' : ''; ?>>HINDU</option>
      <option value="BUDDHA" <?= $profil['agama'] == 'BUDDHA' ? 'selected' : ''; ?>>BUDDHA</option>
      <option value="KHONGHUCU" <?= $profil['agama'] == 'KHONGHUCU' ? 'selected' : ''; ?>>KHONGHUCU</option>
    </select>
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Pekerjaan</label>
    <input type="text" value="<?php echo e(strtoupper($profil['pekerjaan'])); ?>" class="form-control" name="pekerjaan" required placeholder="Sesuai KTP" />
  </div>

  <!-- alamat -->
  <?php echo $__env->make('helper.getDataDaerah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="col-lg-6">
  <div class="form-group mb-2">
    <label class=" col-form-label">Nama Lengkap Ayah/Ibu</label>
    <input type="text" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat->nama_ortu); ?>" <?php endif; ?> class="form-control" name="nama_ortu" required placeholder="Sesuai KTP" />
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Pekerjaan Ayah/Ibu</label>
    <input type="text" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat->pekerjaan_ortu); ?>" <?php endif; ?> class="form-control" name="pekerjaan_ortu" required placeholder="Sesuai KTP" />
  </div>


  <div class="form-group mb-2">
    <label class=" col-form-label">Tempat dan Tanggal Lahir</label>
    <div class="input-group">
      <input type="text" class="form-control" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat->tempat_lhr_ortu); ?>" <?php endif; ?> name="tempat_lhr_ortu" required placeholder="Ketikkan sesuatu..." />
      <input type="text" autocomplete="off" class="form-control basic-datepicker" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat->tanggal_lhr_ortu); ?>" <?php endif; ?> name="tanggal_lhr_ortu" required placeholder="yyyy-mm-dd" />
    </div>
  </div>

  <div class="form-group mb-2">
    <label class=" col-form-label">Alamat Ayah/Ibu</label>
    <textarea type="text" class="form-control" rows="3" name="alamat_ortu" required placeholder="Ketikkan sesuatu..."><?php if(isset($data_surat)): ?><?php echo e($data_surat->alamat_ortu); ?><?php endif; ?></textarea>
  </div>



  <div class="form-group mb-2">
    <label class=" col-form-label">Tujuan Pengajuan Surat (Nama Bantuan)</label>
    <textarea type="text" class="form-control" rows="5" name="tujuan" required placeholder="Ketikkan sesuatu..."><?php if(isset($data_surat)): ?><?php echo e($data_surat->tujuan); ?><?php endif; ?></textarea>
  </div>
</div><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/formPengajuan/kurang_mampu.blade.php ENDPATH**/ ?>