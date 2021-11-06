@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box">

          <div class="align-items-center ">
            <a href="{{route('berita.index')}}" class="btn btn-danger m-l-10 waves-light  mb-2">Kembali</a>

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
          <form enctype="multipart/form-data" action="{{route('berita.store')}}" method="POST">
            @csrf
            <input type="hidden" name="id_pengajuan" @if($berita !=null) value="{{$berita->id}}" @endif>
            <div class="row">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Judul</label>
                <div class="col-sm-12">
                  <textarea type="text" class="form-control" value="{{$berita['nama']}}" name="judul" required placeholder="Ketikkan sesuatu..."></textarea>
                </div>
              </div>

              <div class="row mb-3 mt-3">
                <label for="nama" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-6">
                  <input type="file" accept="image/*" required data-plugins="dropify" name="file_foto" data-max-file-size="1M" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Deskripsi</label>
                <div class="col-sm-12">
                  <textarea type="text"  id="editor" class="form-control" rows="10" cols="80" name="deskripsi" placeholder="Ketikkan sesuati" ></textarea>
                </div>
              </div>



              <div class="form-group row">
                <div class="mt-3 d-grid">
                  <button type="submit" class="btn btn-primary waves-effect waves-light">
                    Submit
                  </button>
                </div>
              </div>



            </div><!-- end row -->
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>



@endsection