@extends('landing.app')

@section('content')
<!-- home start -->
<section class="bg-home bg-gradient" id="home">
  <div class="home-center">
    <div class="home-desc-center">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-6 col-sm-6">
            <div class="home-title">
              <h5 class="mb-3 text-white-50">Selamat Datang</h5>
              <h2 class="mb-4 text-white">Sistem Informasi Layanan Desa Makmur</h2>
              <p class="text-white-50 home-desc font-16 mb-5">Melayani pengajuan surat menyurat yang ada di Desa Makmur Kecamatan Pkl. Kerinci Kabupaten Pelalawan. </p>
              <div class="watch-video mt-5">
                <a href="#layanan" class="btn btn-custom me-4 ">Ajukan Surat? <i class="mdi mdi-chevron-right ms-1"></i></a>

              </div>

            </div>
          </div>
          <div class="col-lg-5 offset-lg-1 col-sm-6">
            <div class="home-img mo-mt-20">
              <img src="{{asset('adminto/landing/images/svg/home.svg')}}" alt="" class="img-fluid mx-auto d-block">
            </div>
          </div>
        </div>
        <!-- end row -->

      </div>
      <!-- end container-fluid -->
    </div>
  </div>
</section>
<!-- home end -->

<!-- features start -->
<section class="features" id="profil">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <ul class="nav nav-pills nav-justified features-tab mb-5" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="pills-code-tab" data-bs-toggle="pill" href="#pills-code" role="tab" aria-controls="pills-code" aria-selected="true">
              <div class="clearfix">
                <div class="features-icon float-end">
                  <h1><i class="pe-7s-notebook tab-icon"></i></h1>
                </div>
                <div class="d-none d-lg-block me-4">
                  <h5 class="tab-title">Sejarah</h5>
                  <p>Desa Makmur</p>
                </div>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" id="pills-customize-tab" data-bs-toggle="pill" href="#pills-customize" role="tab" aria-controls="pills-customize" aria-selected="false">
              <div class="clearfix">
                <div class="features-icon float-end">
                  <h1><i class="pe-7s-edit tab-icon"></i></h1>
                </div>
                <div class="d-none d-lg-block me-4">
                  <h5 class="tab-title">Visi dan Misi</h5>
                </div>
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-support-tab" data-bs-toggle="pill" href="#pills-support" role="tab" aria-controls="pills-support" aria-selected="false">
              <div class="features-icon float-end">
                <h1><i class="pe-7s-headphones tab-icon"></i></h1>
              </div>
              <div class="d-none d-lg-block me-4">
                <h5 class="tab-title">Staff Desa</h5>
                <p>Desa Makmur</p>
              </div>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" id="pills-demo-tab" data-bs-toggle="pill" href="#pills-demo" role="tab" aria-controls="pills-support" aria-selected="false">
              <div class="features-icon float-end">
                <h1><i class="pe-7s-map-2 tab-icon"></i></h1>
              </div>
              <div class="d-none d-lg-block me-4">
                <h5 class="tab-title">Demografi</h5>
                <p>Desa Makmur</p>
              </div>
            </a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade" id="pills-code" role="tabpanel" aria-labelledby="pills-code-tab">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-4 col-sm-6">
                <div>
                  <img src="{{asset('adminto/landing/images/svg/sejarah.svg')}}" alt="" class="img-fluid mx-auto d-block">
                </div>
              </div>
              <div class="col-lg-6 offset-lg-1">
                <div>
                  <div class="feature-icon mb-4">
                    <h1><i class="pe-7s-notebook text-primary"></i>
                      <h1>
                  </div>
                  <h5 class="mb-3">Sejarah Desa Makmur</h5>
                  <p class="text-muted">It will be as simple as Occidental in fact, it will be Occidental. To an English person it will seem like simplified English as a skeptical Cambridge.</p>
                  <p class="text-muted">If several languages coalesce the grammar of the resulting language </p>

                </div>

              </div>

            </div>
            <!-- end row -->
          </div>
          <div class="tab-pane fades how active" id="pills-customize" role="tabpanel" aria-labelledby="pills-customize-tab">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-4 col-sm-6">
                <div>
                  <img src="{{asset('adminto/landing/images/svg/visi.svg')}}" alt="" class="img-fluid mx-auto d-block">
                </div>
              </div>
              <div class="col-lg-6 offset-lg-1">
                <div>

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
            <!-- end row -->
          </div>
          <div class="tab-pane fade" id="pills-support" role="tabpanel" aria-labelledby="pills-support-tab">

            <div class="row align-items-center text-center justify-content-center">

              <h5 class="mb-3">Staff Desa Makmur</h5>
              <div class="row">
                @if(isset($staff))
                @foreach ($data['staff'] AS $key=>$value)
                <div class="col-lg-4 col-sm-6">
                  <div class="demo-box text-center p-3 mt-4">
                    <a href="#profil" class="text-dark">
                      <div class="position-relative demo-content">
                        <div class="demo-img">
                          <img src="storage/{{$value->foto_path}}" alt="" class="img-fluid mx-auto d-block rounded">
                        </div>
                        <div class="demo-overlay">
                          <div class="overlay-icon">
                            <i class="pe-7s-expand1 h1 text-white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="mt-3">
                        <h5 class="font-18">{{$value->nama}}</h5>
                        <p class="text-muted mb-1">Ketua {{$value->jabatan->nama}}</p>
                      </div>
                    </a>
                  </div>
                </div>

                @endforeach
                @endif
              </div>


            </div>
            <!-- end row -->
          </div>
          <div class="tab-pane fade" id="pills-demo" role="tabpanel" aria-labelledby="pills-demo-tab">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-4 col-sm-6">
                <div>
                  <img src="{{asset('adminto/landing/images/svg/sejarah.svg')}}" alt="" class="img-fluid mx-auto d-block">
                </div>
              </div>
              <div class="col-lg-6 offset-lg-1">
                <div>
                  <div class="feature-icon mb-4">
                    <h1><i class="pe-7s-notebook text-primary"></i>
                      <h1>
                  </div>
                  <h5 class="mb-3">Demografi & Peta Desa</h5>

                </div>

              </div>

            </div>
            <!-- end row -->
          </div>
        </div>
        <!-- end tab-content -->
      </div>
    </div>
    <!-- end row -->
  </div>
  <!-- end container-fluid -->
</section>
<!-- features end -->

<!-- services start -->
<section class="section bg-light" id="berita">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="title text-center">
          <h6 class="text-primary small-title">Berita Terbaru Hari Ini</h6>
          <p class="text-muted">{{\Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y")}}</p>
        </div>
      </div>
    </div>
    <div class="row">

      @foreach($data['berita'] AS $key=>$value)
      <div class="col-xl-4 col-sm-6">
        <div class="services-box p-4 bg-white mt-4">
          <h5 class="text-center">{{$value->judul}}</h5>
          <h6 class="text-muted">Post : {{ \Carbon\Carbon::parse($value->updated_at)->diffForHumans() }}</h6>
          <div class="overflow-hidden">
            <a class="text-custom " data-bs-toggle="offcanvas" href="#canvasBerita{{$value->id}}" role="button" aria-controls="canvasBerita{{$value->id}}">Read more...</a>
          </div>
        </div>
      </div>


      @endforeach

    </div>
    <!-- end row -->
  </div>
  <!-- end container-fluid -->
</section>
<!-- services end -->

@foreach($data['berita'] AS $key=>$value)
<div class="offcanvas offcanvas-start" tabindex="-1" id="canvasBerita{{$value->id}}" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Detail Berita</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div> <!-- end offcanvas-header-->

  <div class="offcanvas-body">
    <div class="">
      <h5 class="text-center">{{$value->judul}}</h5>
      <h6 class="text-muted">Post : {{ \Carbon\Carbon::parse($value->updated_at)->diffForHumans() }} </h6>
      <div class="services-img col-12 ">
        <img src="storage/{{$value->foto_path}}" class="img-fluid rounded" alt="">
      </div>
      <div class="overflow-hidden">
        <p class="text-muted">
          {!!$value->isi!!}
        </p>
      </div>
    </div>



  </div> <!-- end offcanvas-body-->
</div>
@endforeach

<!-- Demo start -->
<section class="section" id="lembaga">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="title text-center">
          <h6 class="text-primary small-title">Lembaga Desa Makmur</h6>

        </div>
      </div>
    </div>
    <div class="row">
      @foreach ($data['staff'] AS $key=>$value)
      <div class="col-lg-4 col-sm-6">
        <div class="demo-box text-center p-3 mt-4">
          <a href="#profil" class="text-dark">
            <div class="position-relative demo-content">
              <div class="demo-img">
                <img src="storage/{{$value->foto_path}}" alt="" class="img-fluid mx-auto d-block rounded">
              </div>
              <div class="demo-overlay">
                <div class="overlay-icon">
                  <i class="pe-7s-expand1 h1 text-white"></i>
                </div>
              </div>
            </div>
            <div class="mt-3">
              <h5 class="font-18">{{$value->nama}}</h5>
              <p class="text-muted mb-1 font-14">Ketua {{$value->jabatan->nama}}</p>

            </div>
          </a>
        </div>
      </div>

      @endforeach
    </div>

  </div>
  <!-- end container-fluid -->
</section>
<!-- Demo end -->

<!-- clients start -->
<section class="section bg-light" id="layanan">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="title text-center mb-4">
          <h6 class="text-primary small-title">Layanan Desa Makmur</h6>
          <p class="text-muted">Kami melayani pengajuan surat secara online.</p>
        </div>
      </div>
    </div>
    <!-- end row -->
    <div class="row ">

      @foreach($data['layanan'] AS $key=>$value)
      <div class="col-lg-4">
        <div class="pricing-plans bg-white text-center p-4 mt-4 ">
          <h5 class="plan-title mt-2 mb-4">PENGAJUAN {{$value->nama}}</h5>



          <div class="pt-4">
            <a href="{{route('login')}}" class="btn btn-custom d-block">Ajukan Sekarang</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!-- end row -->

  </div>
  <!-- end container-fluid -->
</section>
<!-- clients end -->


@endsection