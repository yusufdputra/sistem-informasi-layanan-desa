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
          <?php
          $target = $form.'.store';
          ?>
          <form class="row" enctype="multipart/form-data" action="{{route($target)}}" method="POST">
            @include('formPengajuan.'.$form)
            <div class="col-12 d-grid mt-3">
              <button type="submit" class="btn btn-primary  waves-effect waves-light">Ajukan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection