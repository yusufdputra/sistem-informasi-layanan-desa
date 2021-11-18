<div class="form-group mb-2">
  <label class=" col-form-label">Alamat</label>
  <input type="text" value="<?php echo e($profil['alamat']); ?>" class="form-control" name="alamat" required placeholder="Sesuai KTP" />
</div>


<div class="form-group mb-2">
  <label class=" col-form-label">RT / RW</label>
  <div class="input-group">
    <input type="text" value="<?php echo e($profil['rt']); ?>" class="form-control" name="rt" required placeholder="RT" />
    <input type="text" value="<?php echo e($profil['rw']); ?>" class="form-control" name="rw" required placeholder="RW" />
  </div>
</div>



<div class="form-group mb-2">
  <label class=" col-form-label">Provinsi & Kabupaten</label>

  <div class="input-group">
    <select required class="form-control" id="provinsi" name="provinsi">
      <option value="" selected disabled hidden>Silahkan Pilih Provinsi</option>
      <?php $__currentLoopData = $provinsi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e(($value->id)); ?>" <?php if(str_contains( $profil["provinsi"], $value->id)): ?> selected <?php endif; ?>><?php echo e($value->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <input type="hidden" id="val_kabupaten" value="<?php echo e($profil->kabupaten); ?>">
    <select required class="form-control" id="kabupaten" name="kabupaten">
      <option value="" selected disabled hidden>Silahkan Pilih Kabupaten</option>
      <?php if(isset($daerah)): ?>
      <?php $__currentLoopData = $daerah['kabupaten']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($value->id); ?>" <?= $profil['kabupaten'] == $value->id ? 'selected' : ''; ?>><?php echo e($value->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </select>
  </div>

</div>

<div class="form-group mb-2">
  <label class=" col-form-label">Kecamatan & Kelurahan</label>
  <div class="input-group">
    <input type="hidden" id="val_kecamatan" value="<?php echo e($profil->kecamatan); ?>">
    <select required class="form-control" id="kecamatan" name="kecamatan">
      <option value="" selected disabled hidden>Silahkan Pilih Kecamatan</option>
      <?php if(isset($daerah)): ?>
      <?php $__currentLoopData = $daerah['kecamatan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($value->id); ?>" <?= $profil['kecamatan'] == $value->id ? 'selected' : ''; ?>><?php echo e($value->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </select>
    <input type="hidden" id="val_kelurahan" value="<?php echo e($profil->kelurahan); ?>">
    <select required class="form-control" id="kelurahan" name="kelurahan">
      <option value="" selected disabled hidden>Silahkan Pilih Kelurahan</option>
      <?php if(isset($daerah)): ?>
      <?php $__currentLoopData = $daerah['kelurahan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($value->id); ?>" <?= $profil['kelurahan'] == $value->id ? 'selected' : ''; ?>><?php echo e($value->name); ?></option>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
    </select>
  </div>

</div>
<script type="text/javascript">
  // get data kabupaten
  document.getElementById('provinsi').addEventListener('change', function() {
    $('#kabupaten').html('')
    $('#kecamatan').html('')
    $('#kelurahan').html('')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kabupaten = new Option(element['name'], element['id'])
          $('#kabupaten').append(opt_kabupaten)
        })
      )

  })
  // get data kecamatan
  document.getElementById('kabupaten').addEventListener('change', function() {
    $('#kecamatan').html('')
    $('#kelurahan').html('')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/districts/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kecamatan = new Option(element['name'], element['id'])
          $('#kecamatan').append(opt_kecamatan)
        })
      )

  })
  // get data kelurahan
  document.getElementById('kecamatan').addEventListener('change', function() {
    $('#kelurahan').html('')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/villages/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kelurahan = new Option(element['name'], element['id'])
          $('#kelurahan').append(opt_kelurahan)
        })
      )

  })
</script><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/helper/getDataDaerah.blade.php ENDPATH**/ ?>