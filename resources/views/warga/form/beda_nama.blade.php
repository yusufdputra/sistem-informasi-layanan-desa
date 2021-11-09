@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box">

          <div class="align-items-center ">
            <a href="{{route('pengajuan.index')}}" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>

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


          <form class="row" enctype="multipart/form-data" action="{{route('bedaNama.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id_pengajuan" @if($pengajuan !=null) value="{{$pengajuan->id}}" @endif>
            <input type="hidden" name="id_jenis_surat" value="{{$layanan->id}}" >
            <input type="hidden" name="id_warga" value="{{$profil->id}}" >
            <input type="hidden" name="id_surat_beda_nama"  @if(isset($surat)) value="{{$surat->id}}" @endif >

            <div class="col-lg-6">
              <div class="form-group mb-2">
                <label class=" col-form-label">Nomor Induk Keluarga (NIK)</label>
                <input type="text" class="form-control" value="{{Auth::user()->nik}}" name="nama" required placeholder="Ketikkan sesuatu..." />
              </div>
              <div class="form-group mb-2">
                <label class=" col-form-label">Nama Lengkap</label>
                <input type="text" value="{{Auth::user()->username}}" class="form-control" name="nim" required placeholder="Sesuai KTP" />
              </div>
              <div class="form-group mb-2">
                <label class=" col-form-label">Tempat Lahir</label>
                <div class="input-group">
                  <input type="text" class="form-control" value="{{$profil->tempat_lhr}}" name="tempat_lhr" required placeholder="Ketikkan sesuatu..." />
                  <input type="text" class="form-control" id="basic-datepicker" value="{{$profil->tanggal_lhr}}" name="tanggal_lhr" required placeholder="yyyy-mm-dd" />
                </div>
              </div>

              <div class="form-group mb-2">
                <label class=" col-form-label">Pekerjaan</label>
                <input type="text" value="{{$profil['pekerjaan']}}" class="form-control" name="pekerjaan" required placeholder="Sesuai KTP" />
              </div>
            </div>
            <div class="col-lg-6">


              <!-- alamat -->
              @include('helper.getDataDaerah')

              <div class="form-group mb-2">
                <label class=" col-form-label">Tujuan Pengajuan Surat</label>
                <textarea type="text" class="form-control" rows="5" name="tujuan" required placeholder="Ketikkan sesuatu..."></textarea>
              </div>
            </div>

            <div class="col-12 d-grid mt-3">
              <button type="submit" class="btn btn-primary  waves-effect waves-light">Ajukan Surat</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection