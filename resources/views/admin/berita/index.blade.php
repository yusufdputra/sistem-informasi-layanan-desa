@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box table-responsive">

          <div class="align-items-center">

            <a href="{{route('berita.add')}}" class="btn btn-primary m-l-10 waves-light  mb-2"> <i class="mdi mdi-plus-circle me-1"></i> Tambah</a>


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

          <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>
              <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Foto</th>
                <th>Isi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($berita AS $key=>$value)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->judul}}</td>
                <td> <img src="storage/{{$value->foto_path}}" alt="image" class="img-fluid avatar-xl img-thumbnail " /></td>
                <td>
                  <div class="card-header" id="heading{{$key}}">
                    <h5 class="m-0">
                      <a class="text-dark" data-bs-toggle="collapse" href="#collapse{{$key}}" aria-expanded="false">
                        <i class="mdi mdi-help-circle me-1 text-primary"></i>
                        Lihat disini!!
                      </a>
                    </h5>
                  </div>

                  <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-bs-parent="#accordion">
                    <div class="card-body">

                      {!! $value->isi !!}
                    </div>
                  </div>
                </td>


                <td>
                  <a href="{{route('berita/edit/', $value->id)}}" class="btn btn-success btn-sm modal_edit"><i class="fa fa-edit"></i></a>

                  <button type="button" data-bs-toggle="modal" data-bs-target="#hapus-modal" data-id='{{$value->id}}' data-nama="{{$value->judul}}" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></button>



                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="hapus-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Hapus Berita</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('berita.hapus')}}" method="POST">
        @csrf
        <div class="modal-body">
          <input type="hidden" id='id_hapus' name='id'>
          <h5 id="exampleModalLabel">Apakah anda yakin ingin mengapus <span class="badge badge-soft-danger" id="nama_hapus"></span>?</h5>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
        </div>


      </form>

    </div>
  </div>

</div>

<script type="text/javascript">
  $('.modal_edit').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    var jabatan = $(this).data('jabatan');
    var foto = $(this).data('foto');
    $('#edit_id').val(id)
    $('#edit_nama').val(nama)
    $('#edit_jabatan').val(jabatan)
    $('#file_lama').val(foto)
    $('#edit_foto').attr('src', 'storage/' + foto)

  });

  $('.hapus').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    $('#id_hapus').val(id);
    $('#nama_hapus').html(nama);
  });
</script>
@endsection