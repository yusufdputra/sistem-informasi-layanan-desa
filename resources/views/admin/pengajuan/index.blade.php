@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box table-responsive">

          <div class="row mb-3">
            <label for="nama" class="col-md-3 col-xl-1 col-form-label">Jenis Surat</label>
            <div class="col-md-12 col-xl-5">
              <select id="jenis_layanan" required onchange="filterTable()" class="form-control" name="id_layanan">
                <option value="" selected>SEMUA PENGAJUAN</option>
                @foreach ($layanan as $key => $value)
                <option value="{{$value->nama}}">{{Str::upper($value->nama)}}</option>
                @endforeach
              </select>
            </div>
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
                <th>NIK</th>
                <th>Nama Pengaju</th>
                <th>Jenis Surat</th>
                <th>Tanggal Pengajuan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pengajuan AS $key=>$value)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->warga->user->nik}}</td>
                <td>{{$value->warga->nama}}</td>
                <td>{{$value->jenis_surat->nama}}</td>
                <td>{{date('d-F-Y', strtotime($value->created_at))}}</td>
                <td><span class="badge badge-outline-info rounded-pill p-2">{{strtoupper($value->status)}}</span></td>
                <td>
                  <a href="{{route('pengajuan/detail/', $value->id)}}" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i></a>

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


<script type="text/javascript">
  function filterTable() {

    $('#datatable').DataTable()

    function filterData() {
      $('#datatable').DataTable().search(
        document.getElementById('jenis_layanan').value
      ).draw()
    }
    filterData()
  }

</script>
@endsection