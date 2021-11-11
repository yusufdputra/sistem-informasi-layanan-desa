

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box table-responsive">

          <div class="row mb-3">
            <label for="nama" class="col-md-3 col-xl-1 col-form-label">Jenis Surat</label>
            <div class="col-md-12 col-xl-5">
              <select id="jenis_layanan" required onchange="filterTable()" class="form-control" name="id_layanan">
                <option value="" selected>SEMUA PENGAJUAN</option>
                <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value->nama); ?>"><?php echo e(Str::upper($value->nama)); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
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

          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>
              <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama Pengaju</th>
                <th>Jenis Surat</th>
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Cetak</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $arsip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($value->warga->user->nik); ?></td>
                <td><?php echo e($value->warga->nama); ?></td>
                <td><?php echo e($value->jenis_surat->nama); ?></td>
                <td><?php echo e(date('d-F-Y', strtotime($value->created_at))); ?></td>
                <td><?php echo e(date('d-F-Y', strtotime($value->updated_at))); ?></td>
                <td><span class="badge badge-outline-info rounded-pill p-2"><?php echo e(strtoupper($value->status)); ?></span></td>
                <td>
                  <a href="<?php echo e(route('cetak/', $value->id)); ?>" target="_BLANK" class="btn btn-success btn-sm "><i class="fa fa-print"></i></a>
                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


  <script type="text/javascript">
    function filterTable() {

      $('#datatable').DataTable()

      function filterData() {
        $('#datatable').DataTable().search(
          document.getElementById('jenis_layanan').value
        ).draw()
      }
      filterData()
    }

  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/arsip/index.blade.php ENDPATH**/ ?>