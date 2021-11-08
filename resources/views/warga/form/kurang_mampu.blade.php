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


          <form class="row" enctype="multipart/form-data" action="{{route('/')}}" method="POST">
            @csrf
            <input type="hidden" name="id_pengajuan" @if($pengajuan !=null) value="{{$pengajuan->id}}" @endif>

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
                <input type="text" value="{{Auth::user()->username}}" class="form-control" name="nim" required placeholder="Sesuai KTP" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group mb-2">
                <label class=" col-form-label">Nama Lengkap</label>
                <input type="text" class="form-control" value="{{$pengajuan['id']}}" name="nama" required placeholder="Ketikkan sesuatu..." />
              </div>
              <div class="form-group mb-2">
                <label class=" col-form-label">NIM</label>
                <input type="text" value="{{$pengajuan['id']}}" class="form-control" name="nim" required placeholder="Ketikkan sesuatu..." />
              </div>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection