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


</div>
<div class="col-lg-6">


  <!-- alamat -->
  <?php echo $__env->make('helper.getDataDaerah', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="form-group mb-2">
    <label class=" col-form-label">Nama Usaha</label>
    <input type="text" <?php if(isset($data_surat)): ?>value="<?php echo e($data_surat->nama_usaha); ?>" <?php endif; ?> class="form-control" name="nama_usaha" required placeholder="Ketikkan Sesuatu..." />
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Alamat Usaha</label>
    <textarea type="text" class="form-control" rows="5" name="alamat_usaha" required placeholder="Ketikkan sesuatu..."><?php if(isset($data_surat)): ?><?php echo e($data_surat->alamat_usaha); ?><?php endif; ?></textarea>
  </div>

</div>

<div class="col-lg-12 row portfolioContainer">
  <?php if(auth()->check() && auth()->user()->hasRole('admin|kades')): ?>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">

      <label class=" col-form-label">Foto KTP </label>
      <a href="../../storage/<?php echo e(($profil['ktp_path'])); ?>" class="image-popup" title="Foto KTP">
        <img src="../../storage/<?php echo e(($profil['ktp_path'])); ?>" class="thumb-img img-fluid" alt="Foto KTP">
      </a>

    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">

      <label class=" col-form-label">Foto Kartu Keluarga </label>
      <a href="../../storage/<?php echo e(($profil['kk_path'])); ?>" class="image-popup" title="Foto Kartu Keluarga">
        <img src="../../storage/<?php echo e(($profil['kk_path'])); ?>" class="thumb-img img-fluid" alt="Foto Kartu Keluarga">
      </a>

    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">

      <label class=" col-form-label">Foto Pengantar Dari RT </label>
      <a href="../../storage/<?php echo e(($data_surat->pengantar_path)); ?>" class="image-popup" title="Foto Pengantar Dari RT">
        <img src="../../storage/<?php echo e(($data_surat->pengantar_path)); ?>" class="thumb-img img-fluid" alt="Foto Pengantar Dari RT">
      </a>

    </div>
  </div>

  <?php endif; ?>



  <?php if(auth()->check() && auth()->user()->hasRole('warga')): ?>
  <div class="form-group mb-2">
    <label class=" col-form-label">Foto Pengantar Dari RT </label>
    <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['pengantar_path']); ?>" <?php endif; ?> name="file_lama">
    <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->pengantar_path)); ?>" <?php else: ?> required <?php endif; ?> name="file_pengantar" data-max-file-size="1M" data-height="300" />
  </div>

  <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/formPengajuan/usaha.blade.php ENDPATH**/ ?>