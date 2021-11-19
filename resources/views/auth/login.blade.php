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
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Masuk</h4>
                        </div>

                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor Induk Keluarga</label>
                                <input class="form-control @error('nik') is-invalid @enderror" name="nik" type="text" id="nik" value="{{ old('nik') }}" required autocomplete="off" placeholder="Masukkan Nomor Induk Keluarga">
                                @error('nik')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input placeholder="Masukkan Kata Sandi Anda" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" name="password" data-toggle="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3 d-grid text-center">
                                <button class="btn btn-primary" type="submit"> Masuk </button>
                            </div>
                        </form>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="{{ route('password.index') }}" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Lupa Kata Sandi?</a></p>
                                <p class="text-muted">Tidak punya akun? <a href="{{('register')}}" class="text-dark ms-1"><b>Daftar</b></a></p>
                            </div> <!-- end col -->
                        </div>

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