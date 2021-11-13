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
                  <div style="text-align: justify;">

                    <p style="text-indent: 40px;" class="text-muted">Desa Makmur atau yang lebih dikenal dengan SP 6 mempunyai sejarah yang sangat panjang dari terbentuknya desa pada tahun 90 an oleh masyarakat tranmigrasi dari pulau jawa sampai sekarang, hingga terjadi pemekaran dusun antara timur, tengah, dan barat.</p>
                    <p style="text-indent: 40px;" class="text-muted">Dahulunya Desa Makmur masuk kabupaten Kampar dan kemudian pada tahun 1998 terjadi pemekaran wilayah kabupaten yaitu Kabupaten Pelalawan dan Kabupaten Kampar, maka sekarang Desa Makmur masuk Kabupaten Pelalawan. </p>
                    <p style="text-indent: 40px;" class="text-muted">Dengan mayoritas penduduknya adalah petani yang didukung oleh perkebunan Kelapa sawit, yang mana penduduknya banyak berasal dari pulau jawa yang ikut transmigrasi ke desa ini.</p>
                  </div>

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
                  <p>Membangun Desa Makmur yang Harmonis, Transparan dan Berkeadilan</p>

                  <h4><strong>MISI</strong></h4>
                  <ol>
                    <li>Memprioritaskan pembangunan berdasarkan kebutuhan Masyarakat.</li>
                    <li>Menekan kesenjangan pembangunan.</li>
                    <li>Menciptakan transparansi keuangan dan program pembangunan.</li>
                    <li>Meningkatkan kualitas Sumber Daya Manusia.</li>
                    <li>Menghilangkan pungli pada pengurusan surat tanah dan surat keterangan lainnya.</li>
                    <li>Meningkatkan Pendapatan Asli Desa.</li>
                    <li>Meningkatkan kapasitas dan fungsi seluruh lembaga dan aparatur Desa Makmur sehingga dapat bekerja maksimal sesuai dengan tupoksinya masing-masing.</li>
                    <li>Selalu memperbaharui data Masyarakat yang membutuhkan bantuan sosial Pemerintah.</li>
                    <li>Menjemput informasi aspirasi Masyarakat dari setiap RT secara berkelanjutan.</li>
                    <li>Mengaktifkan Siskamling yang terintegrasi dengan Babinsa dan Babhinkamtibmas.</li>

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
                @foreach ($data['staff'] AS $key=>$value)
                <div class="col-lg-4 col-sm-6">
                  <div class="demo-box text-center p-3 mt-4">
                    <a href="#profil" class="text-dark">
                      <div class="position-relative demo-content">
                        <div class="demo-img">
                          <img src="storage/{{$value->foto_path}}" alt="" style="height: 200px !important;" class="img-fluid  rounded">
                        </div>
                        <div class="demo-overlay">
                          <div class="overlay-icon">
                            <i class="pe-7s-expand1 h1 text-white"></i>
                          </div>
                        </div>
                      </div>
                      <div class="mt-3">
                        <h5 class="font-18">{{$value->nama}}</h5>
                        <p class="text-muted mb-1">Ketua {{$value->jabatan}}</p>
                      </div>
                    </a>
                  </div>
                </div>

                @endforeach
              </div>


            </div>
            <!-- end row -->
          </div>
          <div class="tab-pane fade" id="pills-demo" role="tabpanel" aria-labelledby="pills-demo-tab">
            <div class="row align-items-center justify-content-center">
              <div class="col-lg-4 col-sm-6">
                <div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15958.845994797575!2d101.83295417708713!3d0.4192679523081225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5c5a0ee1380f3%3A0x44806868f18a3905!2sMakmur%2C%20Kec.%20Pangkalan%20Kerinci%2C%20Kabupaten%20Pelalawan%2C%20Riau!5e0!3m2!1sid!2sid!4v1636797989958!5m2!1sid!2sid" width="450" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
              </div>
              <div class="col-lg-6 offset-lg-1">
                <div>
                  <div class="feature-icon mb-4">
                    <h1><i class="pe-7s-notebook text-primary"></i></h1>
                  </div>
                  <h5 class="mb-3">Batas Wilayah Desa</h5>
                  <p class="text-muted">Letak geografi Desa Makmur Kecamatan Pangkalan Kerinci Kabupaten Pelalawan terletak diantara:
                  <table class="text-muted">
                    <tr>
                      <td>Sebelah Utara</td>
                      <td>: PT. Asian AGRI</td>
                    </tr>
                    <tr>
                      <td>Sebelah Selatan</td>
                      <td>: Kelurahan Kerinci Barat</td>
                    </tr>
                    <tr>
                      <td>Sebelah Barat</td>
                      <td>: Desa Mekar jaya</td>
                    </tr>
                    <tr>
                      <td>Sebelah Timur</td>
                      <td>: Kelurahan Pangkalan Kerinci Kota</td>
                    </tr>
                  </table>
                  </p>
                  <h5 class="mb-3">Orbitasi</h5>
                  <table class="text-muted">
                    <tr>
                      <td>Jarak ke ibu kota kecamatan terdekat </td>
                      <td>: 5 km</td>
                    </tr>
                    <tr>
                      <td>Lama jarak tempuh ke ibu kota kecamatan</td>
                      <td>: 20 Menit</td>
                    </tr>
                    <tr>
                      <td>Jarak ke ibu kota kabupetan </td>
                      <td>: 5 Km</td>
                    </tr>
                    <tr>
                      <td>Lama jarak tempuh ke ibu kota Kabupaten </td>
                      <td>: 20 Menit</td>
                    </tr>
                  </table>

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
      <div class="col-xl-4 col-sm-6">
        <div class="services-box p-4 bg-white mt-4">
          <div class="services-img float-start me-4">
            <img src="{{asset('adminto/landing/images/pkk.png')}}" alt="">
          </div>
          <h5>P K K</h5>
          <div class="overflow-hidden">
            <p class="text-muted">Menyusun rencana kerja PKK Desa/Kelurahan, sesuai dengan basil Rakerda Kabupaten/Kota...</p>
            <a class="text-custom " data-bs-toggle="offcanvas" href="#canvasLembagaPkk" role="button" aria-controls="canvasLembagaPkk">Read more...</a>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-sm-6">
        <div class="services-box p-4 bg-white mt-4">
          <div class="services-img float-start me-4">
            <img src="{{asset('adminto/landing/images/karang-taruna.png')}}" alt="">
          </div>
          <h5>Karang Taruna</h5>
          <div class="overflow-hidden">
            <p class="text-muted">Tugas Pokok Karang Taruna adalah: Secara bersama sama dengan Pemerintah dan komponen...</p>
            <a class="text-custom " data-bs-toggle="offcanvas" href="#canvasLembagaKT" role="button" aria-controls="canvasLembagaKT">Read more...</a>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-sm-6">
        <div class="services-box p-4 bg-white mt-4">
          <div class="services-img float-start me-4">
            <img src="{{asset('adminto/landing/images/icons/solarsystem.png')}}" alt="">
          </div>
          <h5>Keagamaan</h5>
          <div class="overflow-hidden">
            <p class="text-muted">Keagamaan memilliki tugas untuk Meningkatkan kesadaran beragama, Membuat schedule...</p>
            <a class="text-custom " data-bs-toggle="offcanvas" href="#canvasLembagaAgama" role="button" aria-controls="canvasLembagaAgama">Read more...</a>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- end container-fluid -->
</section>

<div class="offcanvas offcanvas-start" tabindex="-1" id="canvasLembagaPkk" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Pemberdayaan Kesejahteraan Keluarga</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div> <!-- end offcanvas-header-->

  <div class="offcanvas-body">
    <div class="">
      <div class="services-img col-12 ">
        <img src="{{asset('adminto/landing/images/pkk.png')}}" class="img-fluid rounded" alt="">
      </div>
      <br>
      <div class="overflow-hidden">
        <p class="text-muted">
        <ol>
          <li>Menyusun rencana kerja PKK Desa/Kelurahan, sesuai dengan basil Rakerda Kabupaten/Kota;</li>
          <li>Melaksanakan kegiatan sesuai jadwal yang disepakati;</li>
          <li>Menyuluh dan menggerakkan kelompok-kelompok PKK Dusun/Lingkungan, RW, RT dan dasa wisma agar dapat mewujudkan kegiatan-kegiatan yang telah disusun dan disepakati;</li>
          <li>Menggali, menggerakan dan mengembangkan potensi masyarakat, khususnya keluarga untuk meningkatkan kesejahteraan keluarga sesuai dengan kebijaksanaan yang telah ditetapkan;</li>
          <li>Melaksanakan kegiatan penyuluhan kepada keluarga-keluarga yang mencakup kegiatan bimbingan dan motivasi dalam upaya mencapai keluarga sejahtera;</li>
          <li>Mengadakan pembinaan dan bimbingan mengenai pelaksanaan program kerja;</li>
          <li>Berpartisipasi dalam pelaksanaan program instansi yang berkaitan dengan kesejahteraan keluarga di desa/kelurahan;</li>
          <li>Membuat laporan basil kegiatan kepada Tim Penggerak PKK Kecamatan dengan tembusan kepada Ketua Dewan Penyantun Tim Penggerak PKK setempat;</li>
          <li>Melaksanakan tertib administrasi; dan</li>
          <li>Mengadakan konsultasi dengan Ketua Dewan Penyantun Tim Penggerak PKK setempat</li>
        </ol>
        </p>
      </div>
    </div>



  </div> <!-- end offcanvas-body-->
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="canvasLembagaKT" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Karang Taruna</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div> <!-- end offcanvas-header-->

  <div class="offcanvas-body">
    <div class="">
      <div class="services-img col-12 ">
        <img src="{{asset('adminto/landing/images/karang-taruna.png')}}" class="img-fluid rounded" alt="">
      </div>
      <br>
      <div class="overflow-hidden">
        <p class="text-muted indent">Tugas Pokok Karang Taruna adalah: Secara bersama sama dengan Pemerintah dan komponen masyarakat lainnya untuk menanggulangi berbagai masalah kesejahteraan sosial terutama yang dihadapi generasi muda, baik yang bersifat preventif, rehabilitatif maupun pengembangan potensi generasi muda di lingkungannya.</p>
        <p class="text-muted">
          Fungsi Karang Taruna adalah :
        <ol>
          <li>Penyelenggara Usaha Kesejahteraan Sosial.</li>
          <li>Penyelenggara Pendidikan dan Pelatihan bagi masyarakat.</li>
          <li>Penyelenggara pemberdayaan masyarakat terutama generasi muda secara komprehensif, terpacu dan terarah serta berkesinambungan.</li>
          <li>Penyelenggara kegiatan pengembangan jiwa kewirausahaan bagi generasi muda di lingkungannya.</li>
          <li>Penanaman pengertian, memupuk dan meningkatkan kesadaran tanggung jawab sosial generasi muda.</li>
          <li>Penumbuhan dan pengembangan semangat kebersamaan, jiwa kekeluargaan, kesetiakawanan sosial dan memperkuat nilai-nilai kearifan dalam bingkai Negara Kesatuan Republik lndonesia.</li>
          <li>Pemupukan kreatifitas generasi muda untuk dapat mengembangkan tanggung jawab sosial yang bersifat rekreatif, kreatif, edukatif, ekonomis produktif dan kegiatan praktis lainnya dengan mendayagunakan segala sumber dan potensi kesejahteraan sosial di lingkungannya secara swadaya.</li>
          <li>Penyelenggara rujukan, pendampingan, dan advokasi sosial bagi penyandang masalah kesejahteraan sosial.</li>
          <li>Penguatan sistem jaringan komunikasi, kerjasama, informasi dan kemitraan dengan berbagai sektor lainnya.</li>
          <li>Penyelenggara Usaha usaha pencegahan permasalahan sosial yang aktual.</li>

        </ol>
        </p>
      </div>
    </div>



  </div> <!-- end offcanvas-body-->
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="canvasLembagaAgama" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Keagamaan</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div> <!-- end offcanvas-header-->

  <div class="offcanvas-body">
    <div class="">
      <div class="services-img col-12 ">
        <!-- <img src="{{asset('adminto/landing/images/icons/solarsystem.png')}}" class="img-fluid rounded" alt=""> -->
      </div> <br>
      <div class="overflow-hidden">
        <p class="text-muted indent">Keagamaan memilliki tugas untuk Meningkatkan kesadaran beragama, Membuat schedule program keagamaan yang lebih baik/menyentuh/kontekstual dalam meningkatkan dan memakmurkan rumah ibadah.</p>
       
        <p class="text-muted">
          Keagamaan juga memiliki fungsi:
        <ol>
          <li>Rencana program-program keagamaan untuk 3 (tiga) tahun ke depan, dlam bentuk time table didalamnya mencakup jenis program dan pembiayaannya.</li>
          <li>Pelaporan dan bertanggung jawab langsung kepada Ketua.</li>
          <li>Penyusunan laporan secara berkala (triwulan, semester, tahunan).</li>
          <li>Pemberian saran dan pendapat pada Ketua sesuai bidang tugasnya.</li>
          <li>Penyelenggaraan tugas tertentu yang diberikan oleh Ketua yang berkaitan langsung dengan seksi Keagamaan.</li>


        </ol>
        </p>
      </div>
    </div>



  </div> <!-- end offcanvas-body-->
</div>
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