@csrf
<input type="hidden" name="id_pengajuan" @if($pengajuan !=null) value="{{$pengajuan->id}}" @endif>
<input type="hidden" name="id_jenis_surat" value="{{$layanan->id}}">
<input type="hidden" name="id_warga" value="{{$profil->id}}">
<input type="hidden" name="id_surat" @if(isset($data_surat)) value="{{$data_surat->id}}" @endif>

<div class="col-lg-6">
  <div class="form-group mb-2">
    <label class=" col-form-label">Nomor Induk Keluarga (NIK)</label>
    <input type="text" class="form-control" value="{{$profil->user->nik}}" name="nik" required placeholder="Ketikkan sesuatu..." />
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Nama Lengkap</label>
    <input type="text" value="{{$profil->nama}}" class="form-control" name="nama" required placeholder="Sesuai KTP" />
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
    <label class=" col-form-label">Tempat dan Tanggal Lahir</label>
    <div class="input-group">
      <input type="text" class="form-control" value="{{$profil->tempat_lhr}}" name="tempat_lhr" required placeholder="Ketikkan sesuatu..." />
      <input type="text" class="form-control" id="basic-datepicker" value="{{$profil->tanggal_lhr}}" name="tanggal_lhr" required placeholder="yyyy-mm-dd" />
    </div>
  </div>


</div>
<div class="col-lg-6">
  <div class="form-group mb-2">
    <label class=" col-form-label">Pekerjaan</label>
    <input type="text" value="{{$profil['pekerjaan']}}" class="form-control" name="pekerjaan" required placeholder="Sesuai KTP" />
  </div>

  <!-- alamat -->
  @include('helper.getDataDaerah')

  <div class="form-group mb-2">
    <label class=" col-form-label">Penghasilan</label>
    <div class="input-group mb-2">
      <div class="input-group-text">Rp.</div>
      <input type="" min="0"  @if(isset($data_surat)) value="{{$data_surat->penghasilan}}" @endif class="form-control" name="penghasilan" required placeholder="Rp. " />
    </div>
    
  </div>

</div>