@include('layouts.header')

<div class="account-pages mt-5 mb-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6 col-xl-4">
        <div class="text-center">
          <a href="index.html">
            <img src="{{asset('adminto/images/logo-dark.png')}}" alt="" height="22" class="mx-auto">
          </a>
          <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
        </div>
        <div class="card">

          <div class="card-body p-4">

            <div class="text-center mb-4">
              <h4 class="text-uppercase mt-0">Daftar</h4>
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

            <form class="form-horizontal m-t-20" enctype="multipart/form-data" method="POST" action="{{route('register')}}">
              @csrf

              <div class="mb-3">
                <label for="nik" class="form-label">Nomor Induk Keluarga</label>
                <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" placeholder="Sesuai KTP" required autocomplete="off">

                @error('nik')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Sesuai KTP" required autocomplete="off">

                @error('nama')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input class="form-control  @error('password') is-invalid @enderror" value="{{ old('password') }}" type="password"  name="password" required id="password" placeholder="Masukkan Kata Sandi">
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="mb-3">
                <div class="form-check">
                  <input type="checkbox" required class="form-check-input" id="checkbox-signup">
                  <label class="form-check-label"  for="checkbox-signup">Saya Menyetujui <a href="javascript: void(0);" class="text-dark">Syarat dan Ketentuan yang berlaku.</a></label>
                </div>
              </div>
              <div class="mb-3 text-center d-grid">
                <button class="btn btn-primary" type="submit"> Daftar </button>
              </div>

            </form>

          </div> <!-- end card-body -->
        </div>
        <!-- end card -->

        <div class="row mt-3">
          <div class="col-12 text-center">
            <p class="text-muted">Sudah punya akun? <a href="{{route('login')}}" class="text-dark ms-1"><b>Masuk</b></a></p>
          </div> <!-- end col -->
        </div>
        <!-- end row -->

      </div> <!-- end col -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div>


@include('layouts.footer')