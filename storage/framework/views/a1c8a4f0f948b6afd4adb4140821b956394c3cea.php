

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
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $warga; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key+1); ?></td>
                <td><?php echo e($value->user->nik); ?></td>
                <td><?php echo e(strtoupper($value->nama)); ?></td>
                <td><?php echo e($value->alamat); ?></td>
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
                        <tr>
                          <td>Alamat</td>
                          <td>:</td>
                          <td><?php echo e($value->alamat); ?></td>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/admin/warga/index.blade.php ENDPATH**/ ?>