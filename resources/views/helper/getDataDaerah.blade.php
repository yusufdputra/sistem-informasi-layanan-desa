<div class="form-group mb-2">
  <label class=" col-form-label">Provinsi & Kabupaten</label>

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
  <label class=" col-form-label">Kecamatan & Kelurahan</label>
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
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kabupaten = new Option(element['name'], element['id'])
          $('#kabupaten').append(opt_kabupaten)
        })
      )

  })
  // get data kecamatan
  document.getElementById('kabupaten').addEventListener('change', function() {
    $('#kecamatan').html('')
    $('#kelurahan').html('')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/districts/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kecamatan = new Option(element['name'], element['id'])
          $('#kecamatan').append(opt_kecamatan)
        })
      )

  })
  // get data kelurahan
  document.getElementById('kecamatan').addEventListener('change', function() {
    $('#kelurahan').html('')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/villages/' + this.value + '.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kelurahan = new Option(element['name'], element['id'])
          $('#kelurahan').append(opt_kelurahan)
        })
      )

  })
</script>