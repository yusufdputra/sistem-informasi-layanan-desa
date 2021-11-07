

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box table-responsive">

          <div class="align-items-center">

            <a href="<?php echo e(route('berita.add')); ?>" class="btn btn-primary m-l-10 waves-light  mb-2">Tambah</a>


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
                <th>Judul</th>
                <th>Foto</th>
                <th>Isi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($value->judul); ?></td>
                <td> <img src="storage/<?php echo e($value->foto_path); ?>" alt="image" class="img-fluid avatar-xl img-thumbnail " /></td>
                <td>
                  <div class="card-header" id="heading<?php echo e($key); ?>">
                    <h5 class="m-0">
                      <a class="text-dark" data-bs-toggle="collapse" href="#collapse<?php echo e($key); ?>" aria-expanded="false">
                        <i class="mdi mdi-help-circle me-1 text-primary"></i>
                        Lihat disini!!
                      </a>
                    </h5>
                  </div>

                  <div id="collapse<?php echo e($key); ?>" class="collapse" aria-labelledby="heading<?php echo e($key); ?>" data-bs-parent="#accordion">
                    <div class="card-body">

                      <?php echo $value->isi; ?>

                    </div>
                  </div>
                </td>


                <td>
                  <a href="<?php echo e(route('berita/edit/', $value->id)); ?>" class="btn btn-success btn-sm modal_edit"><i class="fa fa-edit"></i></a>

                  <button type="button" data-bs-toggle="modal" data-bs-target="#hapus-modal" data-id='<?php echo e($value->id); ?>' data-nama="<?php echo e($value->judul); ?>" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></button>



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


<div id="hapus-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Hapus Berita</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('berita.hapus')); ?>" method="POST">
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/admin/berita/index.blade.php ENDPATH**/ ?>