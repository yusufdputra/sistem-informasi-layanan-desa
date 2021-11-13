@csrf
<input type="hidden" name="id_pengajuan" @if($pengajuan !=null) value="{{$pengajuan->id}}" @endif>
<input type="hidden" name="id_jenis_surat" value="{{$layanan->id}}">
<input type="hidden" name="id_warga" value="{{$profil->id}}">
<input type="hidden" name="id_surat" @if(isset($data_surat)) value="{{$data_surat->id}}" @endif>

<div class="col-lg-6">
  <div class="form-group mb-2">
    <label class=" col-form-label">Nama Lengkap</label>
    <input type="text" value="{{$profil->nama}}" class="form-control" name="nama" required placeholder="Sesuai KTP" />
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Tempat dan Tanggal Lahir</label>
    <div class="input-group">
      <input type="text" class="form-control" value="{{$profil->tempat_lhr}}" name="tempat_lhr" required placeholder="Ketikkan sesuatu..." />
      <input type="text" class="form-control" id="basic-datepicker" value="{{$profil->tanggal_lhr}}" name="tanggal_lhr" required placeholder="yyyy-mm-dd" />
    </div>
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
  <div class="form-group mb-2">
    <label class=" col-form-label">Pekerjaan</label>
    <input type="text" value="{{strtoupper($profil['pekerjaan'])}}" class="form-control" name="pekerjaan" required placeholder="Sesuai KTP" />
  </div>

  <!-- alamat -->
  @include('helper.getDataDaerah')
</div>
<div class="col-lg-6">
  <div class="form-group mb-2">
    <label class=" col-form-label">Nama Lengkap Ayah/Ibu</label>
    <input type="text" @if(isset($data_surat)) value="{{$data_surat->nama_ortu}}" @endif class="form-control" name="nama_ortu" required placeholder="Sesuai KTP" />
  </div>
  <div class="form-group mb-2">
    <label class=" col-form-label">Pekerjaan Ayah/Ibu</label>
    <input type="text" @if(isset($data_surat)) value="{{$data_surat->pekerjaan_ortu}}" @endif class="form-control" name="pekerjaan_ortu" required placeholder="Sesuai KTP" />
  </div>


  <div class="form-group mb-2">
    <label class=" col-form-label">Tempat dan Tanggal Lahir</label>
    <div class="input-group">
      <input type="text" class="form-control" @if(isset($data_surat)) value="{{$data_surat->tempat_lhr_ortu}}" @endif name="tempat_lhr_ortu" required placeholder="Ketikkan sesuatu..." />
      <input type="text" autocomplete="off" class="form-control basic-datepicker" @if(isset($data_surat)) value="{{$data_surat->tanggal_lhr_ortu}}" @endif name="tanggal_lhr_ortu" required placeholder="yyyy-mm-dd" />
    </div>
  </div>

  <div class="form-group mb-2">
    <label class=" col-form-label">Alamat Ayah/Ibu</label>
    <textarea type="text" class="form-control" rows="3" name="alamat_ortu" required placeholder="Ketikkan sesuatu...">@if(isset($data_surat)){{$data_surat->alamat_ortu}}@endif</textarea>
  </div>



  <div class="form-group mb-2">
    <label class=" col-form-label">Tujuan Pengajuan Surat (Nama Bantuan)</label>
    <textarea type="text" class="form-control" rows="5" name="tujuan" required placeholder="Ketikkan sesuatu...">@if(isset($data_surat)){{$data_surat->tujuan}}@endif</textarea>
  </div>
</div>