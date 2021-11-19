@csrf
<input type="hidden" name="id_pengajuan" @if($pengajuan !=null) value="{{$pengajuan->id}}" @endif>
<input type="hidden" name="id_jenis_surat" value="{{$layanan->id}}">
<input type="hidden" name="id_warga" value="{{$profil->id}}">
<input type="hidden" name="id_surat_beda_nama" @if(isset($data_surat)) value="{{$data_surat->id}}" @endif>

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
    <label class=" col-form-label">Tempat dan Tanggal Lahir</label>
    <div class="input-group">
      <input type="text" class="form-control" value="{{$profil->tempat_lhr}}" name="tempat_lhr" required placeholder="Ketikkan sesuatu..." />
      <input type="text" class="form-control" id="basic-datepicker" value="{{$profil->tanggal_lhr}}" name="tanggal_lhr" required placeholder="yyyy-mm-dd" />
    </div>
  </div>

  <div class="form-group mb-2">
    <label class=" col-form-label">Pekerjaan</label>
    <input type="text" value="{{strtoupper($profil['pekerjaan'])}}" class="form-control" name="pekerjaan" required placeholder="Sesuai KTP" />
  </div>

</div>

<div class="col-lg-6">

  <!-- alamat -->
  @include('helper.getDataDaerah')


</div>

<div class="col-lg-12">
  <div class="form-group mb-2">
    <label class=" col-form-label">Tujuan Pengajuan Surat</label>
    <textarea type="text" class="form-control" rows="5" name="tujuan" required placeholder="Ketikkan sesuatu...">@if(isset($data_surat)){{$data_surat->tujuan}}@endif</textarea>
  </div>
</div>


<div class="col-lg-12 row portfolioContainer">
  @role('admin|kades')
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">

      <label class=" col-form-label">Foto KTP </label>
      <a href="../../storage/{{($profil['ktp_path'])}}" class="image-popup" title="Foto KTP">
        <img src="../../storage/{{($profil['ktp_path'])}}" class="thumb-img img-fluid" alt="Foto KTP">
      </a>

    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">

      <label class=" col-form-label">Foto Kartu Keluarga </label>
      <a href="../../storage/{{($profil['kk_path'])}}" class="image-popup" title="Foto Kartu Keluarga">
        <img src="../../storage/{{($profil['kk_path'])}}" class="thumb-img img-fluid" alt="Foto Kartu Keluarga">
      </a>

    </div>
  </div>
  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">

      <label class=" col-form-label">Foto Pengantar Dari RT </label>
      <a href="../../storage/{{($data_surat->pengantar_path)}}" class="image-popup" title="Foto Pengantar Dari RT">
        <img src="../../storage/{{($data_surat->pengantar_path)}}" class="thumb-img img-fluid" alt="Foto Pengantar Dari RT">
      </a>

    </div>
  </div>

  <div class="col-lg-6 natural personal">
    <div class="gal-detail thumb">

      <label class=" col-form-label">Foto Dokumen Yang Berbeda Nama </label>
      <a href="../../storage/{{($data_surat->dokumen_beda)}}" class="image-popup" title="Foto Dokumen Yang Berbeda Nama">
        <img src="../../storage/{{($data_surat->dokumen_beda)}}" class="thumb-img img-fluid" alt="Foto Dokumen Yang Berbeda Nama">
      </a>

    </div>
  </div>

  @endrole



  @role('warga')
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto Pengantar Dari RT </label>
      <input type="hidden" @if (isset($data_surat)) value="{{$data_surat['pengantar_path']}}" @endif name="file_lama">
      <input type="file" accept="image/*" data-plugins="dropify" @if (isset($data_surat)) data-default-file="../../storage/{{($data_surat->pengantar_path)}}" @else required @endif name="file_pengantar" data-max-file-size="1M" data-height="300" />
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group mb-2">
      <label class=" col-form-label">Foto Dokumen Yang Berbeda Nama </label>
      <input type="hidden" @if (isset($data_surat)) value="{{$data_surat['dokumen_beda']}}" @endif name="file_lama_beda">
      <input type="file" accept="image/*" data-plugins="dropify" @if (isset($data_surat)) data-default-file="../../storage/{{($data_surat->dokumen_beda)}}" @else required @endif name="file_dokumen_beda" data-max-file-size="1M" data-height="300" />
    </div>
  </div>


  @endrole
</div>