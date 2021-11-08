@extends('layouts.app')

@section('content')

@role('admin')

<div class="row">
  <div class="col-12">
    <div class="card ">
      <div class="card-body">
        <h2><strong>Desa Makmur</strong></h2>
        <div class="col-lg-12 row">
          <div class="col-lg-4 col-xs-12 right">
            <img src="{{asset('adminto/images/brands/g-suite.png')}}" width="80%" class="" alt="profile-image">
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
@endrole


@role('warga')



@endrole



@endsection