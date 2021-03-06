@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box table-responsive">

          <div class="align-items-center">

            <button type="button" class="btn btn-primary m-l-10 waves-light  mb-2" data-bs-toggle="modal" data-bs-target="#tambah-modal"><i class="mdi mdi-plus-circle me-1"></i> Tambah</button>

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
                <th>Jenis Surat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($layanan AS $key=>$value)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->nama}}</td>
                <td>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#edit-modal" data-id='{{$value->id}}' data-nama="{{$value->nama}}"  class="btn btn-success btn-sm modal_edit"><i class="fa fa-edit"></i></button>

                  <button type="button" data-bs-toggle="modal" data-bs-target="#hapus-modal" data-id='{{$value->id}}' data-nama="{{$value->nama}}"  class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></button>



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
<!-- end row -->
<div id="tambah-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Tambah Jenis Surat Layanan Desa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('layanan.store')}}" method="POST">
            @csrf

            <div class="row mb-3">
              <label for="nama" class="col-4 col-xl-3 col-form-label">Jenis Surat</label>
              <div class="col-8 col-xl-9">
                <input class="form-control" type="text" autocomplete="off" name="nama" required="" placeholder="Ketikkan Sesuatu...">
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
  </div>

</div>

<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Edit Jenis Surat Layanan Desa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('layanan.store')}}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="text-left">

            <input type="hidden" name="id" id="edit_id">

            <div class="row mb-3">
              <label for="nama" class="col-4 col-xl-3 col-form-label">Jenis Surat</label>
              <div class="col-8 col-xl-9">
                <input class="form-control" type="text" autocomplete="off" id="edit_nama" name="nama" required="" placeholder="Ketikkan Sesuatu...">
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

<div id="hapus-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="fullWidthModalLabel">Hapus Jenis Surat Layanan Desa</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('layanan.hapus')}}" method="POST">
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
    $('#edit_id').val(id)
    $('#edit_nama').val(nama)

  });

  $('.hapus').click(function() {
    var id = $(this).data('id');
    var nama = $(this).data('nama');
    $('#id_hapus').val(id);
    $('#nama_hapus').html(nama);
  });
</script>
@endsection