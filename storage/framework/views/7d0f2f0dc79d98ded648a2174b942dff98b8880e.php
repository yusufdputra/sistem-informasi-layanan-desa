

<?php $__env->startSection('content'); ?>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box ">

        

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
          <form class="row" enctype="multipart/form-data" data-parsley-validate="" action="<?php echo e(route('profile.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row align-items-top">
              <div class="col-lg-2 text-center">

                <?php if($profil['profil_path'] == null): ?>
                <img src="<?php echo e(asset('adminto/images/users/user-1.jpg')); ?> " width="200" height="200" class="flex-shrink-0  rounded-circle img-thumbnail float-start me-3 " alt="profile-image">
                <?php else: ?>
                <img src="storage/<?php echo e($profil['profil_path']); ?>" width="200" height="200" class="flex-shrink-0  rounded-circle img-thumbnail float-start me-3 " alt="profile-image">

                <?php endif; ?>

                <div class="input-group ">
                  <button type="button" class="btn btn-outline-success btn-sm mt-2 rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#foto-modal">Foto Profil</button>
                  <button type="button" class="btn btn-outline-primary btn-sm mt-2 rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#pass-modal">Kata Sandi</button>
                </div>
              </div>

              <div class="col-lg-9">

                <div class="flex-grow-1 overflow-hidden">
                  <div class="form-group mb-2">
                    <label class=" col-form-label">Nama Lengkap</label>
                    <input type="text" value="<?php echo e(strtoupper(Auth::user()->username)); ?>" class="form-control" name="nama" required placeholder="Sesuai KTP" />
                  </div>
                  <div class="form-group row mb-2">
                    <label class=" col-form-label">Foto Tanda Tangan</label>
                    <div class="col-lg-12">

                      <div id="sig_lama"></div>
                    </div>
                    <p style="clear: both;">
                      <button type="button" class="btn btn-outline-success btn-sm mt-2 rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#ttd-modal">Ubah</button>
                      <textarea id="signature64_lama" cols="30" style="display: none;" rows="10"><?php echo e($profil['signature_json']); ?></textarea>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 d-grid mt-3">
              <button type="submit" class="btn btn-primary  waves-effect waves-light">Simpan</button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="ttd-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Masukkan Tanda Tangan Anda</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('profile.upSignature')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group mb-2">

              <div id="sig"></div>
              <input type="hidden" name="ttd_path_lama" value="<?php echo e($profil['ttd_path']); ?>" id="">
              <textarea name="ttd_json" id="signature64" style="display: none;"><?php echo e($profil['signature_json']); ?></textarea>
              <button type="button" id="clear" class="btn btn-outline-danger btn-sm mt-2 rounded-pill waves-effect waves-light">Ulangi</button>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
            </div>


          </form>

        </div>
      </div>
    </div>
  </div>

</div>

<div id="foto-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Pilih Foto</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="<?php echo e(route('profile.upFotoProfil')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group mb-2">

              <input type="hidden" value="<?php echo e($profil['profil_path']); ?>" name="file_lama" id="file_lama">
              <input type="file" accept="image/*" required data-plugins="dropify" name="file_foto" data-max-file-size="1M" />
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light">update</button>
            </div>


          </form>

        </div>
      </div>
    </div>
  </div>

</div>

<div id="pass-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Atur Ulang Kata Sandi</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20 parsley-examples" enctype="multipart/form-data" action="<?php echo e(route('katasandi.reset')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-group mb-2">
              <label class=" col-form-label">Kata Sandi Lama</label>
              <div class="input-group input-group-merge">
                <div class="input-group-text" data-password="false">
                  <span class="password-eye"></span>
                </div>
                <input type="text" name="pass_lama" autocomplete="off" class="form-control" data-parsley-minlength="5" name="pass_old" required placeholder="Masukkan kata sandi lama anda" />
              </div>

            </div>

            <div class="form-group mb-2">
              <label class=" col-form-label">Kata Sandi Baru</label>
              <div class="input-group input-group-merge">
                <div class="input-group-text" data-password="false">
                  <span class="password-eye"></span>
                </div>
                <input id="hori-pass1" name="pass_baru" type="password" data-parsley-minlength="5" placeholder="Kata Sandi Baru" required class="form-control" />
              </div>

            </div>
            <div class="form-group mb-2">
              <label class=" col-form-label">Konfirmasi Kata Sandi Baru</label>
              <div class="input-group input-group-merge">
                <div class="input-group-text" data-password="false">
                  <span class="password-eye"></span>
                </div>
                <input data-parsley-equalto="#hori-pass1" data-parsley-minlength="5" type="password" required placeholder="Konfirmasi Kata Sandi Baru" class="form-control" id="hori-pass2" />
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light">update</button>
            </div>


          </form>

        </div>
      </div>
    </div>
  </div>

</div>





<script>
  jq2 = jQuery.noConflict();
  jq2(function($) {
    // $('#sig').draggable()
    var sig = $('#sig_lama').signature({
      syncField: '#signature64',
      syncFormat: 'PNG'
    });
    try {
      sig.signature('enable').
      signature('draw', $('#signature64_lama').val()).
      signature('disable');
      jq2('#sig_lama').signature({
        disabled: true
      });
    } catch (error) {
      sig.signature('disable');
    }

  });


  jq2(function($) {
    // $('#sig').draggable()
    var sig = $('#sig').signature({
      syncField: '#signature64',
      syncFormat: 'PNG'
    });

    $('#clear').click(function() {
      sig.signature('clear');
    });

  });
</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/profil/kades.blade.php ENDPATH**/ ?>