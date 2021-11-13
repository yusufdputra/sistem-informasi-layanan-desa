@extends('layouts.app')

@section('content')

@hasanyrole('admin|kades')
<div class="row">
  <div class="col-xl-6 col-md-6">
    <div class="card">
      <div class="card-body widget-user">
        <div class="text-center">
          <h2 class="fw-normal text-primary">{{$pengajuan['proses']}}</h2>
          <h5>Pengajuan Dalam Proses</h5>
          <h6 class="text-muted">Bulan {{ \Carbon\Carbon::now()->format('F') }}</h6>
        </div>
      </div>
    </div>

  </div>

  <div class="col-xl-6 col-md-6">
    <div class="card">
      <div class="card-body widget-user">
        <div class="text-center">
          <h2 class="fw-normal text-success">{{$pengajuan['selesai']}}</h2>
          <h5>Pengajuan Telah Selesai</h5>
          <h6 class="text-muted">Bulan {{ \Carbon\Carbon::now()->format('F') }}</h6>
        </div>
      </div>
    </div>

  </div>


</div>
@endhasanyrole


<div class="row">
  <div class="col-12">
    <div class="card ">
      <div class="card-body">
        <h2><strong>Desa Makmur</strong></h2>
        <div class="col-lg-12 row">
          <div class="col-lg-4 mt-2 col-xs-12 right">
            <img src="{{asset('adminto/images/brands/foto-kantor.jpg')}}" width="80%" class="img-fluid rounded" alt="profile-image">
          </div>
          <div class="col-lg-8 col-xs-12">
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
    </div>

  </div>
</div>




@endsection