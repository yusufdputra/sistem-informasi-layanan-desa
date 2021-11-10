

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="mt-0">Data Pengajuan Diproses & Ditolak</h5>
        <div class="card-box table-responsive">

          <div class="align-items-center">

            <button type="button" class="btn btn-primary m-l-10 waves-light  mb-2" data-bs-toggle="modal" data-bs-target="#tambah-modal"><i class="mdi mdi-plus-circle me-1"></i> Tambah</button>

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
                <th>Jenis Surat</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $pengajuan_proses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($value->jenis_surat->nama); ?></td>
                <td><?php echo e(date('d-F-Y', strtotime($value->created_at))); ?></td>
                <td>
                  <?php if($value->status == 'proses'): ?>
                  <span class="badge badge-outline-info rounded-pill p-2"><?php echo e(strtoupper($value->status)); ?></span>
                  <?php elseif($value->status == 'tolak'): ?>
                  <span class="badge badge-outline-danger rounded-pill p-2">DITOLAK</span>
                  <?php endif; ?>

                </td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#hapus-modal" data-nama="<?php echo e($value->jenis_surat->nama); ?>" data-id='<?php echo e($value->id); ?>' class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></button>
                  <?php if($value->status == 'tolak'): ?>
                  <a href="<?php echo e(route('pengajuan/detail/', $value->id)); ?>" class="btn btn-success btn-sm "><i class="fa fa-edit"></i></a>
                  <?php endif; ?>



                </td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>


        <h5 class="mt-3">Data Pengajuan Selesai</h5>
        <div class="card-box table-responsive">


          <table id="key-table" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>
              <tr>
                <th>No.</th>
                <th>Jenis Surat</th>
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Selesai</th>
                <th>Cetak</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $pengajuan_selesai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($value->jenis_surat->nama); ?></td>
                <td><?php echo e(date('d-F-Y', strtotime($value->created_at))); ?></td>
                <td><?php echo e(date('d-F-Y', strtotime($value->updated_at))); ?></td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id='<?php echo e($value->id); ?>' data-nama="<?php echo e($value->nama); ?>" class="btn btn-success btn-sm modal_edit"><i class="fa fa-print"></i></button>
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
<!-- end row -->
<div id="tambah-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Pilih Jenis Surat Layanan Desa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengajuan.add')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row mb-3">
              <label for="nama" class="col-md-3 col-xl-2 col-form-label">Jenis Surat</label>
              <div class="col-md-9 col-xl-10">
                <select required class="form-control" name="id_layanan">
                  <?php $__currentLoopData = $layanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e(Str::upper($value->nama)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light">Buat</button>
            </div>


          </form>

        </div>
      </div>
    </div>
  </div>

</div>


<div id="hapus-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Hapus Pengajuan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('pengajuan.hapus')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <input type="hidden" id='id_hapus' name='id_pengajuan'>
          <h5 id="exampleModalLabel">Apakah anda yakin ingin mengapus pengajuan <span class="badge badge-soft-danger" id="nama_hapus"></span>?</h5>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>

      </form>

    </div>
  </div>

</div>

<script type="text/javascript">
 
  $('.modal_edit').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    $('#edit_id').val(id)
    $('#edit_nama').val(nama)

  });

  $('.hapus').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    $('#id_hapus').val(id);
    $('#nama_hapus').html(nama);
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/warga/pengajuan/index.blade.php ENDPATH**/ ?>