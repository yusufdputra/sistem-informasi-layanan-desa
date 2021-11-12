<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak LAPORAN</title>

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
      width: 200px;
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
        <img height="120px" src="<?php echo e(public_path('adminto/images/logo.png')); ?>" alt="">
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
          <strong style="font-size: 24px; "><u>SURAT KETERANGAN KURANG MAMPU</u></strong> <br>
          <span style="font-size: 14px; ">Nomor : <?php echo e($pengajuan->no_dokumen); ?></span>
        </div>

        <div style="font-size: 14px;">
         <br>
            Yang bertanda tangan di bawah ini:
        
          <table>
            <tr>
              <td style="width: 130px;">Nama</td>
              <td>: <?php echo e($kades->user->username); ?></td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>: Kepala Desa Makmur Kecamatan Pkl. Kerinci Kabupaten Pelalawan</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>: Desa Makmur Kecamatan Pkl. Kerinci Kabupaten Pelalawan</td>
            </tr>
          </table>

        </div>

        <div style="font-size: 14px;">
         
          Dengan ini menerangkan bahwa :
      
          <table>
            <tr>
              <td style="width: 130px;">Nama</td>
              <td>: <?php echo e($pengajuan->warga->nama); ?></td>
            </tr>
            <tr>
              <td>Tempat/ Tgl Lahir</td>
              <td>: <?php echo e($pengajuan->warga->tempat_lhr); ?> / <?php echo e(date('d-M-Y', strtotime($pengajuan->warga->tanggal_lhr))); ?></td>
            </tr>
            <tr>
              <td>Agama</td>
              <td>: <?php echo e($pengajuan->warga->agama); ?></td>
            </tr>
            <tr>
              <td>Pekerjaan</td>
              <td>: <?php echo e(strtoupper($pengajuan->warga->pekerjaan)); ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>: <?php echo e($pengajuan->warga->alamat); ?></td>
            </tr>
          </table>

          <div style="font-size: 14px;">
       
          Adalah Anak Dari: 
      
          <table >
            <tr>
              <td style="width: 130px;">Nama</td>
             
              <td>: <?php echo e($data_surat->nama_ortu); ?></td>
            </tr>
            <tr>
              <td>Tempat/ Tgl Lahir</td>
           
              <td>: <?php echo e(strtoupper($data_surat->tempat_lhr_ortu)); ?> / <?php echo e(date('d-M-Y', strtotime($data_surat->tanggal_lhr_ortu))); ?></td>
            </tr>
          
            <tr>
              <td>Pekerjaan</td>
    
              <td>: <?php echo e(strtoupper($data_surat->pekerjaan_ortu)); ?></td>
            </tr>
            <tr>
              <td>Alamat</td>
        
              <td>: <?php echo e($data_surat->alamat_ortu); ?></td>
            </tr>

         
          </table>

          <div class="indent">
            
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan data dan pengamatan kami keluarga tersebut termasuk dalam kategori <strong><u>Keluarga Kurang Mampu</u></strong>, yang layak untuk mendapatkan  bantuan <strong><u><?php echo e(strtoupper($data_surat->tujuan)); ?></u></strong>.
             
            </div>

            <div class="indent">
   
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat keterangan ini dibuat dengan sebenar-benarnya, untuk dapat digunakan seperlunya oleh yang bersangkutan tersebut.
      
            </div>
        </div>
      </div>
    </div>

    <div id="formttd">
          <p>
            <strong>
              Desa Makmur, <?php echo e(date('d-M-Y', strtotime($pengajuan->updated_at))); ?>

              <br>
              Kepala Desa,

              <img id="signature" height="120px" src="<?php echo e($kades['ttd_path']); ?>" alt="">

              <u>
                <?php echo e(strtoupper($kades->user->username)); ?>

              </u>
            </strong>
          </p>

        </div>
  </div>
</body>

</html><?php /**PATH C:\xampp\htdocs\SILADES\resources\views/cetak/kurang_mampu.blade.php ENDPATH**/ ?>