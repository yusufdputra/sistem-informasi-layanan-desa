<div class="form-group mb-2">
  <label class=" col-form-label">Alamat</label>
  <input type="text" value="{{$profil['alamat']}}" class="form-control" name="alamat" required placeholder="Sesuai KTP" />
</div>


<div class="form-group mb-2">
  <label class=" col-form-label">RT / RW</label>
  <div class="input-group">
    <input type="text" value="{{$profil['rt']}}" class="form-control" name="rt" required placeholder="RT" />
    <input type="text" value="{{$profil['rw']}}" class="form-control" name="rw" required placeholder="RW" />
  </div>
</div>



<div class="form-group mb-2">
  <label class=" col-form-label">Provinsi & Kabupaten <div id="loader1" class="visually-hidden"> <span class="  spinner-border text-warning spinner-border-sm me-1" role="status" aria-hidden="true"></span></div></label>

  <div class="input-group">
    <select required class="form-control" id="provinsi" name="provinsi">
      <option value="" selected disabled hidden>Silahkan Pilih Provinsi</option>
      @foreach($provinsi AS $key=>$value)
      <option value="{{($value->id)}}" @if(str_contains( $profil["provinsi"], $value->id)) selected @endif>{{$value->name}}</option>
      @endforeach
    </select>
    <input type="hidden" id="val_kabupaten" value="{{$profil->kabupaten}}">
    <select required class="form-control" id="kabupaten" name="kabupaten">
      <option value="" selected disabled hidden>Silahkan Pilih Kabupaten</option>
      @if(isset($daerah))
      @foreach ($daerah['kabupaten'] AS $key=>$value)
      <option value="{{$value->id}}" <?= $profil['kabupaten'] == $value->id ? 'selected' : ''; ?>>{{$value->name}}</option>
      @endforeach
      @endif
    </select>
  </div>

</div>

<div class="form-group mb-2">
  <label class=" col-form-label">Kecamatan & Kelurahan <div id="loader2" class="visually-hidden"> <span id="loader2" class="spinner-border text-warning spinner-border-sm me-1" role="status" aria-hidden="true"></span></div></label>
  <div class="input-group">
    <input type="hidden" id="val_kecamatan" value="{{$profil->kecamatan}}">
    <select required class="form-control" id="kecamatan" name="kecamatan">
      <option value="" selected disabled hidden>Silahkan Pilih Kecamatan</option>
      @if(isset($daerah))
      @foreach ($daerah['kecamatan'] AS $key=>$value)
      <option value="{{$value->id}}" <?= $profil['kecamatan'] == $value->id ? 'selected' : ''; ?>>{{$value->name}}</option>
      @endforeach
      @endif

    </select>
    <input type="hidden" id="val_kelurahan" value="{{$profil->kelurahan}}">
    <select required class="form-control" id="kelurahan" name="kelurahan">
      <option value="" selected disabled hidden>Silahkan Pilih Kelurahan</option>
      @if(isset($daerah))
      @foreach ($daerah['kelurahan'] AS $key=>$value)
      <option value="{{$value->id}}" <?= $profil['kelurahan'] == $value->id ? 'selected' : ''; ?>>{{$value->name}}</option>
      @endforeach
      @endif
    </select>
  </div>

</div>
<script type="text/javascript">
  // get data kabupaten
  document.getElementById('provinsi').addEventListener('change', function() {
    $('#kabupaten').html('')
    $('#kecamatan').html('')
    $('#kelurahan').html('')
    $('#loader1').attr('class', '')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kabupaten = new Option(element['name'], element['id'])
          $('#kabupaten').append(opt_kabupaten)
        })
      )
    $('#loader1').attr('class', 'visually-hidden')

  })
  // get data kecamatan
  document.getElementById('kabupaten').addEventListener('change', function() {
    $('#kecamatan').html('')
    $('#kelurahan').html('')
    $('#loader2').attr('class', '')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/districts/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kecamatan = new Option(element['name'], element['id'])
          $('#kecamatan').append(opt_kecamatan)
        })
      )
      $('#loader2').attr('class', 'visually-hidden')
  })
  // get data kelurahan
  document.getElementById('kecamatan').addEventListener('change', function() {
    $('#kelurahan').html('')
    $('#loader2').attr('class', '')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/villages/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kelurahan = new Option(element['name'], element['id'])
          $('#kelurahan').append(opt_kelurahan)
        })
      )
      $('#loader2').attr('class', 'visually-hidden')
  })
</script>