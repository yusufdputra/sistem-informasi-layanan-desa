

<?php $__env->startSection('content'); ?>

<?php if(auth()->check() && auth()->user()->hasAnyRole('admin|kades')): ?>
<div class="row">
  <div class="col-xl-6 col-md-6">
    <div class="card">
      <div class="card-body widget-user">
        <div class="text-center">
          <h2 class="fw-normal text-primary" ><?php echo e($pengajuan['proses']); ?></h2>
          <h5>Pengajuan Dalam Proses</h5>
          <h6 class="text-muted">Bulan <?php echo e(\Carbon\Carbon::now()->format('F')); ?></h6>
        </div>
      </div>
    </div>

  </div>

  <div class="col-xl-6 col-md-6">
    <div class="card">
      <div class="card-body widget-user">
        <div class="text-center">
          <h2 class="fw-normal text-success" ><?php echo e($pengajuan['selesai']); ?></h2>
          <h5>Pengajuan Telah Selesai</h5>
          <h6 class="text-muted">Bulan <?php echo e(\Carbon\Carbon::now()->format('F')); ?></h6>
        </div>
      </div>
    </div>

  </div>

  
</div>
<?php endif; ?>


<div class="row">
  <div class="col-12">
    <div class="card ">
      <div class="card-body">
        <h2><strong>Desa Makmur</strong></h2>
        <div class="col-lg-12 row">
          <div class="col-lg-4 mt-2 col-xs-12 right">
            <img src="<?php echo e(asset('adminto/images/brands/foto-kantor.jpg')); ?>" width="80%" class="img-fluid rounded" alt="profile-image">
          </div>
          <div class="col-lg-8 col-xs-12">
            <h4><strong>VISI</strong></h4>
            <p>Menjadikan Fakultas KIP UMRI sebagai penghasil tenaga pendidik dan kependidikan yang bermarwah, bermartabat, dan menguasai IPTEKS yang berlandaskan IMTAQ tahun 2030</p>

            <h4><strong>MISI</strong></h4>
            <ol>
              <li>Menyelenggarakanpendidikandanpengajaran yang bermutu untuk menghasilkan tenaga pendidik dan kependidikan yang unggul dan berkepribadian islami.</li>
              <li>Menyelenggarakan kegiatan penelitian di bidang pendidikan, keguruan, dan teknologi yang bermanfaat bagi pengembangan masyarakat.</li>
              <li>Melaksanakan kegiatan pengabdian pada masyarakat untuk mewujudkan masyarakat yang cerdas, kreatif, dan sejahtera.</li>
              <li>Menyelenggarakan kerjasama dengan berbagai pihak untuk meningkatkan mutu kinerja fakultas.</li>
              <li>Menyelenggarakan tatakelola kelembagaan secara efektif dan efesien untuk menunjang peningkatan mutu fakultas.</li>
            </ol>
          </div>


        </div>


      </div>
    </div>

  </div>
</div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/home.blade.php ENDPATH**/ ?>