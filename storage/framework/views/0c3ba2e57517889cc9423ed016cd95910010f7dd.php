<script type="text/javascript">

  // get data kabupaten
  document.getElementById('provinsi').addEventListener('change', function() {
    $('#kabupaten').html('')
    $('#kecamatan').html('')
    $('#kelurahan').html('')
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/'+this.value+'.json')
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
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/districts/'+this.value+'.json')
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
    fetch('http://www.emsifa.com/api-wilayah-indonesia/api/villages/'+this.value+'.json')
      .then(response => response.json())
      .then(regencies =>
        regencies.forEach(element => {
          var opt_kelurahan = new Option(element['name'], element['id'])
          $('#kelurahan').append(opt_kelurahan)
        })
      )

  })
</script><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/helper/getDataDaerah.blade.php ENDPATH**/ ?>