

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box">

          <div class="align-items-center ">
            <a href="<?php echo e(route('berita.index')); ?>" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>

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
          <form enctype="multipart/form-data" action="<?php echo e(route('berita.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id_pengajuan" <?php if($berita !=null): ?> value="<?php echo e($berita->id); ?>" <?php endif; ?>>
            <div class="row">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-12">
                  <textarea type="text" class="form-control" value="<?php echo e($berita['nama']); ?>" name="judul" required placeholder="Ketikkan sesuatu..."></textarea>
                </div>
              </div>

              <div class="row mb-3 mt-3">
                <label for="nama" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-6">
                  <input type="file" accept="image/*" required data-plugins="dropify" name="file_foto" data-max-file-size="1M" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-12">
                  <textarea type="text"  id="editor" class="form-control" rows="10" cols="80" name="deskripsi" placeholder="Ketikkan sesuati" ></textarea>
                </div>
              </div>



              <div class="form-group row">
                <div class="mt-3 d-grid">
                  <button type="submit" class="btn btn-primary waves-effect waves-light">
                    Submit
                  </button>
                </div>
              </div>



            </div><!-- end row -->
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/admin/berita/form.blade.php ENDPATH**/ ?>