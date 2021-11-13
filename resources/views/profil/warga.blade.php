@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="card-box ">

          @if(!$provinsi)
          <div class="alert alert-danger">
            <div>Terjadi kesalahan saat memanggil data wilayah. Silahkan cek internet anda!!!</div>
          </div>
          @endif

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
          <form class="row" enctype="multipart/form-data" data-parsley-validate="" action="{{route('profile.store')}}" method="POST">
            <div class="row align-items-top">
              <div class="col-lg-2 text-center">

                @if($profil['profil_path'] == null)
                <img src="{{asset('adminto/images/users/user-1.jpg')}} " width="200" height="200" class="flex-shrink-0  rounded-circle img-thumbnail float-start me-3 " alt="profile-image">
                @else
                <img src="storage/{{$profil['profil_path']}}" width="200" height="200" class="flex-shrink-0  rounded-circle img-thumbnail float-start me-3 " alt="profile-image">

                @endif

                <div class="input-group ">
                  <button type="button" class="btn btn-outline-success btn-sm mt-2 rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#foto-modal">Foto Profil</button>
                  <button type="button" class="btn btn-outline-primary btn-sm mt-2 rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#pass-modal">Kata Sandi</button>
                </div>
              </div>

              <div class="col-lg-9">

                <div class="flex-grow-1 overflow-hidden">
                  <div class="form-group mb-2">
                    <label class=" col-form-label">Nomor Induk Keluarga (NIK)</label>
                    <input type="text" class="form-control" value="{{Auth::user()->nik}}" name="nik" required placeholder="Ketikkan sesuatu..." />
                  </div>
                  <div class="form-group mb-2">
                    <label class=" col-form-label">Nama Lengkap</label>
                    <input type="text" value="{{Auth::user()->username}}" class="form-control" name="nama" required placeholder="Sesuai KTP" />
                  </div>
                  <div class="form-group mb-2">
                    <label class=" col-form-label">Agama</label>
                    <select required class="form-control" name="agama">
                      <option value="" selected disabled hidden>Silahkan Pilih</option>
                      <option value="ISLAM" <?= $profil['agama'] == 'ISLAM' ? 'selected' : ''; ?>>ISLAM</option>
                      <option value="PROTESTAN" <?= $profil['agama'] == 'PROTESTAN' ? 'selected' : ''; ?>>PROTESTAN</option>
                      <option value="KATOLIK" <?= $profil['agama'] == 'KATOLIK' ? 'selected' : ''; ?>>KATOLIK</option>
                      <option value="HINDU" <?= $profil['agama'] == 'HINDU' ? 'selected' : ''; ?>>HINDU</option>
                      <option value="BUDDHA" <?= $profil['agama'] == 'BUDDHA' ? 'selected' : ''; ?>>BUDDHA</option>
                      <option value="KHONGHUCU" <?= $profil['agama'] == 'KHONGHUCU' ? 'selected' : ''; ?>>KHONGHUCU</option>
                    </select>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>

              <div class="col-lg-12 row">
                <div class="col-lg-6">
                  <div class="form-group mb-2">
                    <label class=" col-form-label">Tempat & Tanggal Lahir</label>
                    <div class="input-group">
                      <input type="text" class="form-control" value="{{$profil->tempat_lhr}}" name="tempat_lhr" required placeholder="Ketikkan sesuatu..." />
                      <input type="text" class="form-control" id="basic-datepicker" value="{{$profil->tanggal_lhr}}" name="tanggal_lhr" required placeholder="yyyy-mm-dd" />
                    </div>
                  </div>

                  <div class="form-group mb-2">
                      <label class=" col-form-label">Jenis Kelamin</label>
                      <select required class="form-control" name="jenis_kelamin">
                        <option value="" selected disabled hidden>Silahkan Pilih</option>
                        <option value="lk" <?= $profil['jenis_kelamin'] == 'lk' ? 'selected' : ''; ?>>Laki-Laki</option>
                        <option value="pr" <?= $profil['jenis_kelamin'] == 'pr' ? 'selected' : ''; ?>>Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group mb-2">
                      <label class=" col-form-label">Status kawin</label>
                      <select required class="form-control" name="status_kawin">
                        <option value="" selected disabled hidden>Silahkan Pilih</option>
                        <option value="Belum Kawin" <?= $profil['status_kawin'] == 'Belum Kawin' ? 'selected' : ''; ?>>Belum Kawin</option>
                        <option value="Kawin" <?= $profil['status_kawin'] == 'Kawin' ? 'selected' : ''; ?>>Kawin</option>
                        <option value="Cerai Hidup" <?= $profil['status_kawin'] == 'Cerai Hidup' ? 'selected' : ''; ?>>Cerai Hidup</option>
                        <option value="Cerai Mati" <?= $profil['status_kawin'] == 'Cerai Mati' ? 'selected' : ''; ?>>Cerai Mati</option>
                      </select>
                    </div>

                    <div class="form-group mb-2">
                      <label class=" col-form-label">Pekerjaan</label>
                      <input type="text" value="{{$profil['pekerjaan']}}" class="form-control" name="pekerjaan" required placeholder="Sesuai KTP" />
                    </div>


                  @include('helper.getDataDaerah')

                </div>

                <div class="col-lg-6">
                  <div class="">
                    

                    <div class="form-group mb-2">
                      <label class=" col-form-label">Kewarganegaraan</label>
                      <select required class="form-control" name="kewarganegaraan">
                        <option value="" selected disabled hidden>Silahkan Pilih</option>
                        <option value="WNI" <?= $profil['kewarganegaraan'] == 'WNI' ? 'selected' : ''; ?>>WNI</option>
                        <option value="WNA" <?= $profil['kewarganegaraan'] == 'WNA' ? 'selected' : ''; ?>>WNA</option>
                      </select>
                    </div>

                    <div class="form-group mb-2">
                      <label class=" col-form-label">Golongan Darah</label>
                      <select required class="form-control" name="goldar">
                        <option value="" selected disabled hidden>Silahkan Pilih</option>
                        <option value="O" <?= $profil['goldar'] == 'O' ? 'selected' : ''; ?>>O</option>
                        <!-- <option value="O+" <?= $profil['goldar'] == 'O+' ? 'selected' : ''; ?>>O+</option> -->
                        <option value="A" <?= $profil['goldar'] == 'A' ? 'selected' : ''; ?>>A</option>
                        <!-- <option value="A+" <?= $profil['goldar'] == 'A+' ? 'selected' : ''; ?>>A+</option> -->
                        <option value="B" <?= $profil['goldar'] == 'B' ? 'selected' : ''; ?>>B</option>
                        <!-- <option value="B+" <?= $profil['goldar'] == 'B+' ? 'selected' : ''; ?>>B+</option> -->
                        <!-- <option value="AB-" <?= $profil['goldar'] == 'AB-' ? 'selected' : ''; ?>>AB-</option> -->
                        <option value="AB" <?= $profil['goldar'] == 'AB' ? 'selected' : ''; ?>>AB</option>
                        <option value="Lainnya" <?= $profil['goldar'] == 'Lainnya' ? 'selected' : ''; ?>>Lainnya</option>
                      </select>
                    </div>
                    <div class="form-group mb-2">
                      <label class=" col-form-label">Foto KTP</label>
                      <input type="hidden" value="{{$profil['ktp_path']}}" name="file_lama_ktp">
                      <input type="file" accept="image/*" data-plugins="dropify" @if($profil['ktp_path']!=null) data-default-file="storage/{{$profil['ktp_path']}}" @else required @endif name="file_foto_ktp" data-max-file-size="1M" />
                    </div>

                    <div class="form-group mb-2">
                      <label class=" col-form-label">Foto Kartu Keluarga</label>
                      <input type="hidden" value="{{$profil['kk_path']}}" name="file_lama_kk">
                      <input type="file" accept="image/*" @if($profil['kk_path']!=null) data-default-file="storage/{{$profil['kk_path']}}" @else required @endif data-plugins="dropify" name="file_foto_kk" data-max-file-size="1M" />
                    </div>
                  </div>

                </div>
              </div>


              @csrf
              <div class="col-lg-6" style="display: none;">
                <div class="form-group row mb-2">
                  <label class=" col-form-label">Foto Tanda Tangan</label>
                  <div class="col-lg-12">

                    <div id="sig_lama"></div>
                  </div>
                  <p style="clear: both;">
                    <button type="button" class="btn btn-outline-success btn-sm mt-2 rounded-pill waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#ttd-modal">Ubah</button>
                    <textarea id="signature64_lama" cols="30" style="display: none;" rows="10">{{$profil['signature_json']}}</textarea>
                  </p>
                </div>
              </div>
            </div>
        </div>

        <div class="col-12 d-grid mt-3">
          <button type="submit" class="btn btn-primary  waves-effect waves-light">Simpan</button>
        </div>


        </form>
      </div>
    </div>
  </div>
</div>
</div>

<div id="ttd-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Masukkan Tanda Tangan Anda</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('profile.upSignature')}}" method="POST">
            @csrf

            <div class="form-group mb-2">

              <div id="sig"></div>
              <input type="hidden" name="ttd_path_lama" value="{{$profil['ttd_path']}}" id="">
              <textarea name="ttd_json" id="signature64" style="display: none;">{{$profil['signature_json']}}</textarea>
              <button type="button" id="clear" class="btn btn-outline-danger btn-sm mt-2 rounded-pill waves-effect waves-light">Ulangi</button>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
            </div>


          </form>

        </div>
      </div>
    </div>
  </div>

</div>

<div id="foto-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Pilih Foto</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20" enctype="multipart/form-data" action="{{route('profile.upFotoProfil')}}" method="POST">
            @csrf

            <div class="form-group mb-2">

              <input type="hidden" value="{{$profil['profil_path']}}" name="file_lama" id="file_lama">
              <input type="file" accept="image/*" required data-plugins="dropify" name="file_foto" data-max-file-size="1M" />
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

<div id="pass-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="standard-modalLabel">Atur Ulang Kata Sandi</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-left">
          <form class="form-horizontal m-t-20 parsley-examples" enctype="multipart/form-data" action="{{route('katasandi.reset')}}" method="POST">
            @csrf

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





<script>
  jq2 = jQuery.noConflict();
  jq2(function($) {
    // $('#sig').draggable()
    var sig = $('#sig_lama').signature({
      syncField: '#signature64',
      syncFormat: 'PNG'
    });
    try {
      sig.signature('enable').
      signature('draw', $('#signature64_lama').val()).
      signature('disable');
      jq2('#sig_lama').signature({
        disabled: true
      });
    } catch (error) {
      sig.signature('disable');
    }

  });


  jq2(function($) {
    // $('#sig').draggable()
    var sig = $('#sig').signature({
      syncField: '#signature64',
      syncFormat: 'PNG'
    });

    $('#clear').click(function() {
      sig.signature('clear');
    });

  });
</script>

<script type="text/javascript">

</script>


@endsection