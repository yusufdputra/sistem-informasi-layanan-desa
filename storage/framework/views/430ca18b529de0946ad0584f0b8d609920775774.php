

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
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
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($value->nama); ?></td>
                <td><?php echo e($value->jabatan); ?></td>
                <td> <img src="storage/<?php echo e($value->foto_path); ?>" alt="image" class="img-fluid avatar-xl img-thumbnail rounded-circle" /></td>


                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id='<?php echo e($value->id); ?>' data-nama="<?php echo e($value->nama); ?>" data-jabatan="<?php echo e($value->jabatan); ?>" data-foto="<?php echo e($value->foto_path); ?>" class="btn btn-success btn-sm modal_edit"><i class="fa fa-edit"></i></button>

                  <button type="button" data-bs-toggle="modal" data-bs-target="#hapus-modal" data-id='<?php echo e($value->id); ?>' data-nama="<?php echo e($value->nama); ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></button>



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
        <h4 class="modal-title" id="standard-modalLabel">Tambah Staff Desa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('staff.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="row mb-3">
              <label for="nama" class="col-4 col-xl-3 col-form-label">Nama Lengkap</label>
              <div class="col-8 col-xl-9">
                <input class="form-control" type="text" autocomplete="off" name="nama" required="" placeholder="Nama Lengkap">
              </div>
            </div>
            <div class="row mb-3">
              <label for="jabatan" class="col-4 col-xl-3 col-form-label">Jabatan</label>
              <div class="col-8 col-xl-9">
                <select required class="form-control" name="jabatan">
                  <option value="" selected disabled hidden>Silahkan Pilih</option>
                  <option value="Kepala Desa"  >Kepala Desa</option>
                  <option value="Sekertaris Desa" >Sekertaris Desa</option>
                  <option value="Kasi Pemerintahan" >Kasi Pemerintahan</option>
                  <option value="Kasi Kesejahteraan" >Kasi Kesejahteraan</option>
                  <option value="Kaur Umum & Perencanaan">Kaur Umum & Perencanaan</option>
                  <option value="Kaur Keuangan" >Kaur Keuangan</option>
                  <option value="Staff Pelayanan" >Staff Pelayanan</option>
                  <option value="Staff Keuangan" >Staff Keuangan</option>
                </select>
                
              </div>
            </div>
            <div class="row mb-3">
              <label for="nama" class="col-4 col-xl-3 col-form-label">Foto</label>
              <div class="col-8 col-xl-9">
                <input type="file" accept="image/*" required data-plugins="dropify" name="file_foto" data-max-file-size="1M" />
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
  </div>

</div>

<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Edit Staff Desa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('staff.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="text-left">

            <input type="hidden" name="id" id="edit_id">

            <div class="row mb-3">
              <label for="nama" class="col-4 col-xl-3 col-form-label">Nama Lengkap</label>
              <div class="col-8 col-xl-9">
                <input class="form-control" type="text" autocomplete="off" id="edit_nama" name="nama" required="" placeholder="Nama Lengkap">
              </div>
            </div>
            <div class="row mb-3">
              <label for="jabatan" class="col-4 col-xl-3 col-form-label">Jabatan</label>
              <div class="col-8 col-xl-9">
              <select required class="form-control" id="edit_jabatan" name="jabatan">
                  <option value="" selected disabled hidden>Silahkan Pilih</option>
                  <option value="Kepala Desa" >Kepala Desa</option>
                  <option value="Sekertaris Desa" >Sekertaris Desa</option>
                  <option value="Kasi Pemerintahan" >Kasi Pemerintahan</option>
                  <option value="Kasi Kesejahteraan" >Kasi Kesejahteraan</option>
                  <option value="Kaur Umum & Perencanaan" >Kaur Umum & Perencanaan</option>
                  <option value="Kaur Keuangan" >Kaur Keuangan</option>
                  <option value="Staff Pelayanan" >Staff Pelayanan</option>
                  <option value="Staff Keuangan" >Staff Keuangan</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nama" class="col-4 col-xl-3  col-form-label">Foto <br>
                <img src="" id="edit_foto" alt="image" class="img-fluid avatar-xl rounded " />
              </label>
              <div class="col-8 col-xl-9">
                <input type="hidden" name="file_lama" id="file_lama">
                <input type="file" accept="image/*" data-plugins="dropify" name="file_foto" data-max-file-size="1M" />
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

<div id="hapus-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Hapus Staff Desa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('staff.hapus')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <input type="hidden" id='id_hapus' name='id'>
          <h5 id="exampleModalLabel">Apakah anda yakin ingin mengapus <span class="badge badge-soft-danger" id="nama_hapus"></span>?</h5>
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
    var jabatan = $(this).data('jabatan');
    var foto = $(this).data('foto');
    $('#edit_id').val(id)
    $('#edit_nama').val(nama)
    $('#edit_jabatan').val(jabatan)
    $('#file_lama').val(foto)
    $('#edit_foto').attr('src', 'storage/' + foto)

  });

  $('.hapus').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    $('#id_hapus').val(id);
    $('#nama_hapus').html(nama);
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/admin/staff/index.blade.php ENDPATH**/ ?>