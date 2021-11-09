

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
            <input type="hidden" name="id_berita" <?php if($berita !=null): ?> value="<?php echo e($berita->id); ?>" <?php endif; ?>>
            <div class="row">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-12">
                  <textarea type="text" class="form-control" name="judul" required placeholder="Ketikkan sesuatu..."><?php if($berita !=null): ?> <?php echo e($berita->judul); ?> <?php endif; ?></textarea>
                </div>
              </div>

              <div class="row mb-3 mt-3">
                <label for="nama" class="col-sm-2 col-form-label">Foto</label>
                <?php if(isset($berita) && $berita->foto_path != null): ?>
                <div class="">
                  <input type="hidden" name="id" value="<?php echo e($berita->id); ?>" id="">
                  <input type="hidden" name="file_lama" value="<?php echo e($berita->foto_path); ?>" id="">
                  
                </div>

                <?php endif; ?>
                <div class="col-sm-5">
                  <input type="file" accept="image/*"  <?php if(isset($berita)): ?> data-default-file="../../storage/<?php echo e($berita->foto_path); ?>" <?php else: ?> required <?php endif; ?> data-plugins="dropify" name="file_foto" data-max-file-size="1M" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-12">
                  <textarea type="text" id="editor" class="form-control" rows="10" cols="80" name="deskripsi" placeholder="Ketikkan sesuati"><?php if($berita !=null): ?> <?php echo $berita->isi; ?> <?php endif; ?></textarea>
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
  // class MyUploadAdapter {
  //   constructor(loader) {
  //     // The file loader instance to use during the upload. It sounds scary but do not
  //     // worry — the loader will be passed into the adapter later on in this guide.
  //     this.loader = loader;
  //   }

  //   // Starts the upload process.
  //   upload() {
  //     return this.loader.file
  //       .then(file => new Promise((resolve, reject) => {
  //         this._initRequest();
  //         this._initListeners(resolve, reject, file);
  //         this._sendRequest(file);
  //       }));
  //   }

  //   // Aborts the upload process.
  //   abort() {
  //     if (this.xhr) {
  //       this.xhr.abort();
  //     }
  //   }
  //   // Initializes the XMLHttpRequest object using the URL passed to the constructor.
  //   _initRequest() {
  //     const xhr = this.xhr = new XMLHttpRequest();

  //     // Note that your request may look different. It is up to you and your editor
  //     // integration to choose the right communication channel. This example uses
  //     // a POST request with JSON as a data structure but your configuration
  //     // could be different.
  //     xhr.open('POST', '<?php echo e(route("berita.store")); ?>', true);
  //     xhr.setRequestHeader('x-csrf-token', '<?php echo e(csrf_token()); ?>');
  //     xhr.responseType = 'json';
  //   }

  //   // Initializes XMLHttpRequest listeners.
  //   _initListeners(resolve, reject, file) {
  //     const xhr = this.xhr;
  //     const loader = this.loader;
  //     const genericErrorText = `Couldn't upload file: ${ file.name }.`;

  //     xhr.addEventListener('error', () => reject(genericErrorText));
  //     xhr.addEventListener('abort', () => reject());
  //     xhr.addEventListener('load', () => {
  //       const response = xhr.response;

  //       // This example assumes the XHR server's "response" object will come with
  //       // an "error" which has its own "message" that can be passed to reject()
  //       // in the upload promise.
  //       //
  //       // Your integration may handle upload errors in a different way so make sure
  //       // it is done properly. The reject() function must be called when the upload fails.
  //       if (!response || response.error) {
  //         return reject(response && response.error ? response.error.message : genericErrorText);
  //       }

  //       // If the upload is successful, resolve the upload promise with an object containing
  //       // at least the "default" URL, pointing to the image on the server.
  //       // This URL will be used to display the image in the content. Learn more in the
  //       // UploadAdapter#upload documentation.
  //       resolve({
  //         default: response.url
  //       });
  //     });

  //     // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
  //     // properties which are used e.g. to display the upload progress bar in the editor
  //     // user interface.
  //     if (xhr.upload) {
  //       xhr.upload.addEventListener('progress', evt => {
  //         if (evt.lengthComputable) {
  //           loader.uploadTotal = evt.total;
  //           loader.uploaded = evt.loaded;
  //         }
  //       });
  //     }
  //   }


  //   // Prepares the data and sends the request.
  //   _sendRequest(file) {
  //     // Prepare the form data.
  //     const data = new FormData();

  //     data.append('upload', file);

  //     // Important note: This is the right place to implement security mechanisms
  //     // like authentication and CSRF protection. For instance, you can use
  //     // XMLHttpRequest.setRequestHeader() to set the request headers containing
  //     // the CSRF token generated earlier by your application.

  //     // Send the request.
  //     this.xhr.send(data);
  //   }
  //   // ...
  // }

  // function SimpleUploadAdapterPlugin(editor) {
  //   editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
  //     // Configure the URL to the upload script in your back-end here!
  //     return new MyUploadAdapter(loader);
  //   };
  // }


  ClassicEditor
    .create(document.querySelector('#editor')
      // , {
      //   extraPlugins: [SimpleUploadAdapterPlugin],

      //   // ...
      // }
    )
    .catch(error => {
      console.error(error);
    });
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/admin/berita/form.blade.php ENDPATH**/ ?>