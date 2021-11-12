@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box ">

        

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

          <form class="form-horizontal m-t-20 parsley-examples" enctype="multipart/form-data" action="{{route('katasandi.reset')}}" method="POST">
            @csrf

            <h4 class="modal-title" id="standard-modalLabel">Atur Ulang Kata Sandi</h4>

            <div class="form-group mb-2">
              <label class=" col-form-label">Kata Sandi Lama</label>
              <div class="input-group input-group-merge">
                <div class="input-group-text" data-password="false">
                  <span class="password-eye"></span>
                </div>
                <input type="text" name="pass_lama" autocomplete="off" class="form-control" data-parsley-minlength="5" name="pass_old" required placeholder="Masukkan kata sandi lama anda" />
              </div>

            </div>

            <div class="form-group mb-2">
              <label class=" col-form-label">Kata Sandi Baru</label>
              <div class="input-group input-group-merge">
                <div class="input-group-text" data-password="false">
                  <span class="password-eye"></span>
                </div>
                <input id="hori-pass1" name="pass_baru" type="password" data-parsley-minlength="5" placeholder="Kata Sandi Baru" required class="form-control" />
              </div>

            </div>
            <div class="form-group mb-2">
              <label class=" col-form-label">Konfirmasi Kata Sandi Baru</label>
              <div class="input-group input-group-merge">
                <div class="input-group-text" data-password="false">
                  <span class="password-eye"></span>
                </div>
                <input data-parsley-equalto="#hori-pass1" data-parsley-minlength="5" type="password" required placeholder="Konfirmasi Kata Sandi Baru" class="form-control" id="hori-pass2" />
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light">update</button>
            </div>


          </form>
         
        </div>
      </div>
    </div>
  </div>
</div>



@endsection