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
                            <h4 class="text-uppercase mt-0">Lupa Kata Sandi</h4>
                            <p class="text-muted">Kirim melalui email</p>
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

                        <form method="POST" action="{{ route('password.kirim') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" id="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Masukkan Email Anda">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="mb-3 d-grid text-center">
                                <button class="btn btn-primary" type="submit"> Kirim Email </button>
                            </div>
                        </form>

                        <div class="row mt-3">
                            <div class="col-12 text-center">

                                <p class="text-muted">Batalkan? <a href="{{route('/')}}" class="text-primary m-l-5"><b>Masuk</b></a></p>
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