@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box table-responsive">


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
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Detail</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($warga AS $key=>$value)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->user->nik}}</td>
                <td>{{strtoupper($value->nama)}}</td>
                <td>{{$value->alamat}}</td>
                <td>
                  <div class="card-header" id="heading{{$key}}">
                    <h5 class="m-0">
                      <a class="text-dark" data-bs-toggle="collapse" href="#collapse{{$key}}" aria-expanded="false">
                        <i class="mdi mdi-help-circle me-1 text-primary"></i>
                        Lihat disini!!!
                      </a>
                    </h5>
                  </div>

                  <div id="collapse{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-bs-parent="#accordion">
                    <div class="card-body">
                      <table class="table table-borderless mb-0">
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>:</td>
                          <td>
                            @if($value->jenis_kelamin == 'lk')
                            Laki-Laki
                            @else
                            Perempuan
                            @endif
                          </td>
                        </tr>
                        <tr>
                          <td>Tempat/ Tgl Lahir</td>
                          <td>:</td>
                          <td>{{$value->tempat_lhr}} / {{date('d-M-Y', strtotime($value->tanggal_lhr))}}</td>
                        </tr>

                        <tr>
                          <td>Agama</td>
                          <td>:</td>
                          <td>{{($value->agama)}}</td>
                        </tr>
                       
                        <tr>
                          <td>Pekerjaan</td>
                          <td>:</td>
                          <td>{{strtoupper($value->pekerjaan)}}</td>
                        </tr>
                        <tr>
                          <td>Status Kawin</td>
                          <td>:</td>
                          <td>{{strtoupper($value->status_kawin)}}</td>
                        </tr>
                        <tr>
                          <td>Golongan Darah</td>
                          <td>:</td>
                          <td>{{$value->goldar}}</td>
                        </tr>
                        <tr>
                          <td>Kewarganegaraan</td>
                          <td>:</td>
                          <td>{{$value->kewarganegaraan}}</td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>:</td>
                          <td>{{$value->alamat}}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
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

@endsection