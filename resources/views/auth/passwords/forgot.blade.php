@include('layouts.header')

<div class="account-pages my-5 authentication-bg authentication-bg-pattern">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="text-center">
          <a href="{{('/')}}">
            <img src="{{asset('adminto/images/logo-dark.png')}}" alt="" class="mx-auto">
          </a>
          <p class="text-muted mt-2 mb-4">Sistem Informasi Layanan Desa Makmur</p>

        </div>
        <div class="card">



          <div class="card-body p-4">

            <div class="text-center mb-4">
              <h4 class="text-uppercase mt-0">Ubah Kata Sandi</h4>
            </div>

            @if(\Session::has('alert'))
            <div class="alert alert-danger">
              <div>{{Session::get('alert')}}</div>
            </div>
            @endif

            @if(\Session::has('success'))
            <div class="alert alert-success">
              <div>{{Session::get('success')}}</div>
            </div>
            @endif

            <form class="parsley-examples" method="POST" action="{{ route('password.ubah') }}">
              @csrf
              <div class="mb-3">
                <input type="hidden" value="{{$token}}" name="token">
                <div class="form-group mb-2 col-12">
                  <label class=" col-form-label">Kata Sandi Baru</label>
                  <!-- <div class="input-group input-group-merge">
                    <div class="input-group-text" data-password="false">
                      <span class="password-eye"></span>
                    </div> -->
                  <input id="hori-pass1" name="password" type="password" data-parsley-minlength="5" placeholder="Kata Sandi Baru" required class="form-control" />
                  <!-- </div> -->

                </div>
                <div class="form-group mb-2 col-12">
                  <label class=" col-form-label">Konfirmasi Kata Sandi Baru</label>
                  <!-- <div class="input-group input-group-merge">
                    <div class="input-group-text" data-password="false">
                      <span class="password-eye"></span>
                    </div> -->
                  <input data-parsley-equalto="#hori-pass1" data-parsley-minlength="5" type="password" required placeholder="Konfirmasi Kata Sandi Baru" class="form-control" id="hori-pass2" />
                  <!-- </div> -->

                </div>
                <!-- <input id="password" placeholder="Kata Sandi" type="password" class="form-control @error('password') is-invalid @enderror" name="password" data-toggle="password" required autocomplete="current-password"> -->

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>


              <div class="mb-3 d-grid text-center">
                <button class="btn btn-primary" type="submit"> Ubah </button>
              </div>
            </form>



          </div> <!-- end card-body -->
        </div>
        <!-- end card -->


        <!-- end row -->

      </div> <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>

@include('layouts.footer')