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
          <div class="row">
            @include('formPengajuan.'.$form)
            <div class="row">
              <div class="col-sm-12">
                <div class="text-end">
                  <button type="button" data-bs-toggle="modal" data-bs-target="#tolak-modal"   class="btn btn-danger waves-effect waves-light me-1 tolak_modal"> Tolak </button>
                  <a href="{{route('pengajuan/terima/', $pengajuan->id)}}" class="btn btn-success waves-effect waves-light me-1"> Terima </a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<div id="tolak-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Tolak Pengajuan Ini</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('pengajuan.tolak')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="text-left">

            <input type="hidden" name="id_pengajuan" value="{{$pengajuan->id}}" id="edit_id">

            <div class="row mb-3">
              <label for="nama" class="col-4 col-xl-3 col-form-label">Alasan Penolakan</label>
              <div class="col-8 col-xl-9">
                <textarea class="form-control" type="text" autocomplete="off" name="alasan" rows="5" required="" placeholder="Ketikkan Sesuatu..."></textarea>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection