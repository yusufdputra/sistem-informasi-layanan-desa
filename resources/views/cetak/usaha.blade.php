<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Pengajuan</title>

  <style>
    html,
    body {
      font-family: 'Times New Roman', Times, serif;
      margin: 0.9cm;
      padding: 0;
      height: 100%;
    }

    #container {
      min-height: 100%;
      position: relative;
    }

    #header {
      z-index: 1;
    }

    #body {
      line-height: 1.5;
      padding-right: 20px;
      padding-left: 20px;
      font-size: 14px;
      z-index: 1;
      /* Height of the footer */
    }

    #footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 60px;
    }

    #formttd {
      position: absolute;
      bottom: 0px;
      right: 0px;
      width: 230px;
      height: 100px;
    }

    #signature {
      margin-left: -50px !important;
      margin-top: 20px;
      margin-bottom: -20px;
      z-index: -100;
    }

    table {
      padding-left: 40px;
      padding-right: 40px;
    }

    table td {
      vertical-align: top;
    }

    .indent {
      text-align: justify;
    }
  </style>

</head>

<body>

  <div id="container">
    <div id="header">
      <div style="float: left;">
        <img height="120px" src="{{public_path('adminto/images/logo.png')}}" alt="">
      </div>
      <div style="text-align: center; ">
        <span style="font-size: 24px; font-weight: bold; ">PEMERINTAH KABUPATEN PELALAWAN</span> <br>
        <span style="font-size: 24px; font-weight: bold; ">KECAMATAN PANGKALAN KERINCI</span> <br>
        <span style="font-size: 26px; font-weight: bold; ">DESA MAKMUR</span> <br>
        <span style="font-size: 14px; font-weight: bold;  ">Alamat: Jln. Hang Tuah Tlp: 0812 7604 0885 Kode Pos: 28381</span><br>
        <br>
        <hr>
      </div>
    </div>
    <div id="body">
      <div>
        <div style="text-align: center;">
          <strong style="font-size: 24px; "><u>SURAT KETERANGAN USAHA</u></strong> <br>
          <span style="font-size: 14px; ">Nomor : {{$pengajuan->no_dokumen}}</span>
        </div>
        <br>
        <div style="font-size: 14px;">
          <p>

            Yang bertanda tangan di bawah ini Kepala Desa Makmur Kecamatan Pkl. Kerinci Kabupaten Pelalawan dengan ini menerangkan bahwa:
          </p>
          <table>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td>{{$pengajuan->warga->nama}}</td>
            </tr>
            <tr>
              <td>Tempat/ Tgl Lahir</td>
              <td>:</td>
              <td>{{$pengajuan->warga->tempat_lhr}} / {{\Carbon\Carbon::parse($pengajuan->warga->tanggal_lhr)->formatLocalized('%d %B %Y')}}</td>
            </tr>
         
            <tr>
              <td>Nomor Induk Keluarga</td>
              <td>:</td>
              <td>{{$pengajuan->warga->user->nik}}</td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>:</td>
              <td>{{$pengajuan->warga->agama}}</td>
            </tr>
            <tr>
              <td>Pekerjaan</td>
              <td>:</td>
              <td>{{strtoupper($pengajuan->warga->pekerjaan)}}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td>{{$pengajuan->warga->alamat}}, {{$alamat}}</td>
            </tr>


          </table>
          <div class="indent">
            <p>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nama yang tersebut di atas adalah benar penduduk yang berdomisili di Desa Makmur Kecamatan Pkl. Kerinci Kabupaten Pelalawan. Berdasarkan pengamatan kami bahwa orang yang bersangkutan adalah benar memiliki usaha <strong><u>{{$data_surat->nama_usaha}}</u></strong> diwilayah <strong><u>{{$data_surat->alamat_usaha}}</u></strong>.
            </p>
          </div>

          <div class="indent">
            <p>

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Demikian Surat Keterangan Usaha ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
            </p>
          </div>


        </div>

        <div id="formttd">
          <p>
            <strong>
              Desa Makmur, {{\Carbon\Carbon::parse($pengajuan->updated_at)->formatLocalized('%d %B %Y')}}
              <br>
              Kepala Desa,

              <img id="signature" height="120px" src="{{$kades['ttd_path']}}" alt="">

              <u>
                {{strtoupper($kades->user->username)}}
              </u>
            </strong>
          </p>

        </div>


      </div>
    </div>
  </div>
</body>

</html>