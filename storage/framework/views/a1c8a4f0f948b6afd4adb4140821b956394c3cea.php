

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box table-responsive">


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
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Foto KTP</th>
                <th>Foto KK</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $warga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($value->user->nik); ?></td>
                <td><?php echo e(strtoupper($value->nama)); ?></td>
                <td><?php echo e($value->alamat); ?>, <?php echo e($alamat_warga[$key]); ?></td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-title="KTP" data-bs-target="#foto-modal" data-foto="<?php echo e($value->ktp_path); ?>" class="btn btn-success btn-sm modal_foto"><i class="fa fa-eye"></i></button>
                </td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-title="Kartu Keluarga" data-bs-target="#foto-modal" data-foto="<?php echo e($value->kk_path); ?>" class="btn btn-success btn-sm modal_foto"><i class="fa fa-eye"></i></button>
                </td>
                <td>
                  <div class="card-header" id="heading<?php echo e($key); ?>">
                    <h5 class="m-0">
                      <a class="text-dark" data-bs-toggle="collapse" href="#collapse<?php echo e($key); ?>" aria-expanded="false">
                        <i class="mdi mdi-help-circle me-1 text-primary"></i>
                        Lihat disini!!!
                      </a>
                    </h5>
                  </div>

                  <div id="collapse<?php echo e($key); ?>" class="collapse" aria-labelledby="heading<?php echo e($key); ?>" data-bs-parent="#accordion">
                    <div class="card-body">
                      <table class="table table-borderless mb-0">
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>:</td>
                          <td>
                            <?php if($value->jenis_kelamin == 'lk'): ?>
                            Laki-Laki
                            <?php else: ?>
                            Perempuan
                            <?php endif; ?>
                          </td>
                        </tr>
                        <tr>
                          <td>Tempat/ Tgl Lahir</td>
                          <td>:</td>
                          <td><?php echo e($value->tempat_lhr); ?> / <?php echo e(date('d-M-Y', strtotime($value->tanggal_lhr))); ?></td>
                        </tr>

                        <tr>
                          <td>Agama</td>
                          <td>:</td>
                          <td><?php echo e(($value->agama)); ?></td>
                        </tr>

                        <tr>
                          <td>Pekerjaan</td>
                          <td>:</td>
                          <td><?php echo e(strtoupper($value->pekerjaan)); ?></td>
                        </tr>
                        <tr>
                          <td>Status Kawin</td>
                          <td>:</td>
                          <td><?php echo e(strtoupper($value->status_kawin)); ?></td>
                        </tr>
                        <tr>
                          <td>Golongan Darah</td>
                          <td>:</td>
                          <td><?php echo e($value->goldar); ?></td>
                        </tr>
                        <tr>
                          <td>Kewarganegaraan</td>
                          <td>:</td>
                          <td><?php echo e($value->kewarganegaraan); ?></td>
                        </tr>

                      </table>
                    </div>
                  </div>
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

<div id="foto-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Foto <span id="title"></span></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('staff.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="text-left">
            <div class="row mb-3">
              <div class="col-12">
                <img src="" id="lihat_foto" alt="image" class="img-fluid" />
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  $('.modal_foto').click(function() {
    var foto = $(this).data('foto');
    var title = $(this).data('title');
    $('#lihat_foto').attr('src', 'storage/' + foto)
    $('#title').html(title);



  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/admin/warga/index.blade.php ENDPATH**/ ?>