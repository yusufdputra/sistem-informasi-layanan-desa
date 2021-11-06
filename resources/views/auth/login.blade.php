@include('layouts.header')

<div class="account-pages my-5 authentication-bg authentication-bg-pattern">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="text-center">
                    <a href="{{('/')}}">
                        <img src="{{asset('adminto/images/logo-dark.png')}}" alt="" height="22" class="mx-auto">
                    </a>
                    <p class="text-muted mt-2 mb-4">Sistem Informasi Layanan Desa</p>

                </div>
                <div class="card">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Masuk</h4>
                        </div>

                        <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">NIK/Username</label>
                                <input class="form-control @error('username') is-invalid @enderror" name="username" type="text" id="username" value="{{ old('username') }}" required autocomplete="off" placeholder="Masukkan NIK atau Username Anda">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Kata Sandi</label>
                                <input placeholder="Masukkan Kata Sandi Anda" type="password" class="form-control @error('password') is-invalid @enderror" name="password" data-toggle="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div> -->

                            <div class="mb-3 d-grid text-center">
                                <button class="btn btn-primary" type="submit"> Masuk </button>
                            </div>
                        </form>

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Lupa Kata Sandi?</a></p>
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