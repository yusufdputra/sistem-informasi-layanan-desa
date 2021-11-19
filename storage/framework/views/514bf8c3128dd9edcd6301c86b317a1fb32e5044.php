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
    <label class=" col-form-label">NIK Ayah/Ibu</label>
    <input type="text" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat->nik_ortu); ?>" <?php endif; ?> class="form-control" name="nik_ortu" required placeholder="Sesuai KTP" />
  </div>
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
    <textarea type="text" class="form-control" rows="5" name="alamat_ortu" required placeholder="Ketikkan sesuatu..."><?php if(isset($data_surat)): ?><?php echo e($data_surat->alamat_ortu); ?><?php endif; ?></textarea>
  </div>



  <div class="form-group mb-2">
    <label class=" col-form-label">Tujuan Pengajuan Surat (Nama Bantuan)</label>
    <textarea type="text" class="form-control" rows="5" name="tujuan" required placeholder="Ketikkan sesuatu..."><?php if(isset($data_surat)): ?><?php echo e($data_surat->tujuan); ?><?php endif; ?></textarea>
  </div>
</div>

<div class="col-lg-12 row portfolioContainer">
  <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
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
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">
      <label class=" col-form-label">Foto KTP Saksi 1</label>
      <a href="../../storage/<?php echo e(($data_surat->ktp_saksi1_path)); ?>" class="image-popup" title="Foto KTP Saksi 1">
        <img src="../../storage/<?php echo e(($data_surat->ktp_saksi1_path)); ?>" class="thumb-img img-fluid" alt="Foto KTP Saksi 1">
      </a>
    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">
      <label class=" col-form-label">Foto KTP Saksi 2</label>
      <a href="../../storage/<?php echo e(($data_surat->ktp_saksi2_path)); ?>" class="image-popup" title="Foto KTP Saksi 2">
        <img src="../../storage/<?php echo e(($data_surat->ktp_saksi2_path)); ?>" class="thumb-img img-fluid" alt="Foto KTP Saksi 2">
      </a>
    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">
      <label class=" col-form-label">Foto Dokumen Pernyataan RT dan Dua Saksi</label>
      <a href="../../storage/<?php echo e(($data_surat->pernyataan_saksi_path)); ?>" class="image-popup" title="Foto Dokumen Pernyataan RT dan Dua Saksi">
        <img src="../../storage/<?php echo e(($data_surat->pernyataan_saksi_path)); ?>" class="thumb-img img-fluid" alt="Foto Dokumen Pernyataan RT dan Dua Saksi">
      </a>
    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">
      <label class=" col-form-label">Foto Rumah Tampak Depan</label>
      <a href="../../storage/<?php echo e(($data_surat->rumah_depan_path)); ?>" class="image-popup" title="Foto Rumah Tampak Depan">
        <img src="../../storage/<?php echo e(($data_surat->rumah_depan_path)); ?>" class="thumb-img img-fluid" alt="Foto Rumah Tampak Depan">
      </a>
    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">
      <label class=" col-form-label">Foto Rumah Tampak Belakang</label>
      <a href="../../storage/<?php echo e(($data_surat->rumah_belakang_path)); ?>" class="image-popup" title="Foto Rumah Tampak Belakang">
        <img src="../../storage/<?php echo e(($data_surat->rumah_belakang_path)); ?>" class="thumb-img img-fluid" alt="Foto Rumah Tampak Belakang">
      </a>
    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">
      <label class=" col-form-label">Foto Rumah Tampak Samping Kanan</label>
      <a href="../../storage/<?php echo e(($data_surat->rumah_kanan_path)); ?>" class="image-popup" title="Foto Rumah Tampak Samping Kanan">
        <img src="../../storage/<?php echo e(($data_surat->rumah_kanan_path)); ?>" class="thumb-img img-fluid" alt="Foto Rumah Tampak Samping Kanan">
      </a>
    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">
      <label class=" col-form-label">Foto Rumah Tampak Samping Kiri</label>
      <a href="../../storage/<?php echo e(($data_surat->rumah_kiri_path)); ?>" class="image-popup" title="Foto Rumah Tampak Samping Kiri">
        <img src="../../storage/<?php echo e(($data_surat->rumah_kiri_path)); ?>" class="thumb-img img-fluid" alt="Foto Rumah Tampak Samping Kiri">
      </a>
    </div>
  </div>

  <?php endif; ?>



  <?php if(auth()->check() && auth()->user()->hasRole('warga')): ?>
  
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto Pengantar Dari RT </label>
      <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['pengantar_path']); ?>" <?php endif; ?> name="file_lama">
      <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->pengantar_path)); ?>" <?php else: ?> required <?php endif; ?> name="file_pengantar" data-max-file-size="1M" data-height="300" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto KTP Saksi 1</label>
      <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['ktp_saksi1_path']); ?>" <?php endif; ?> name="ktp_saksi1_path_lama">
      <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->ktp_saksi1_path)); ?>" <?php else: ?> required <?php endif; ?> name="ktp_saksi1_path" data-max-file-size="1M" data-height="300" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto KTP Saksi 2</label>
      <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['ktp_saksi2_path']); ?>" <?php endif; ?> name="ktp_saksi2_path_lama">
      <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->ktp_saksi2_path)); ?>" <?php else: ?> required <?php endif; ?> name="ktp_saksi2_path" data-max-file-size="1M" data-height="300" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto Dokumen Pernyataan RT dan Dua Saksi</label>
      <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['pernyataan_saksi_path']); ?>" <?php endif; ?> name="pernyataan_saksi_path_lama">
      <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->pernyataan_saksi_path)); ?>" <?php else: ?> required <?php endif; ?> name="pernyataan_saksi_path" data-max-file-size="1M" data-height="300" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto Rumah Tampak Depan</label>
      <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['rumah_depan_path']); ?>" <?php endif; ?> name="rumah_depan_path_lama">
      <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->rumah_depan_path)); ?>" <?php else: ?> required <?php endif; ?> name="rumah_depan_path" data-max-file-size="1M" data-height="300" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto Rumah Tampak Belakang</label>
      <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['rumah_belakang_path']); ?>" <?php endif; ?> name="rumah_belakang_path_lama">
      <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->rumah_belakang_path)); ?>" <?php else: ?> required <?php endif; ?> name="rumah_belakang_path" data-max-file-size="1M" data-height="300" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto Rumah Tampak Samping Kanan</label>
      <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['rumah_kanan_path']); ?>" <?php endif; ?> name="rumah_kanan_path_lama">
      <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->rumah_kanan_path)); ?>" <?php else: ?> required <?php endif; ?> name="rumah_kanan_path" data-max-file-size="1M" data-height="300" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto Rumah Tampak Samping Kiri</label>
      <input type="hidden" <?php if(isset($data_surat)): ?> value="<?php echo e($data_surat['rumah_kiri_path']); ?>" <?php endif; ?> name="rumah_kiri_path_lama">
      <input type="file" accept="image/*" data-plugins="dropify" <?php if(isset($data_surat)): ?> data-default-file="../../storage/<?php echo e(($data_surat->rumah_kiri_path)); ?>" <?php else: ?> required <?php endif; ?> name="rumah_kiri_path" data-max-file-size="1M" data-height="300" />
    </div>
  </div>

  <?php endif; ?>
</div><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/formPengajuan/kurang_mampu.blade.php ENDPATH**/ ?>