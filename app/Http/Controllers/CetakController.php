<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Warga\PengajuanController;
use App\Models\Kades;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use PDF;
class CetakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cetak($id_pengajuan)
    {
        $pengajuan = Pengajuan::with('warga','jenis_surat')->find($id_pengajuan); 
        $jenis_surat = PengajuanController::cekJenisForm($pengajuan->jenis_surat->nama);
        $data_surat = PengajuanController::getDataSurat($pengajuan->jenis_surat->nama, $id_pengajuan);
        $kades = Kades::first();

        // get alamat warga
        $alamat = DaerahIndonesiaController::getAlamatWarga($pengajuan->warga->provinsi, $pengajuan->warga->kabupaten, $pengajuan->warga->kecamatan, $pengajuan->warga->kelurahan);

        $pdf = PDF::loadview('cetak.'.$jenis_surat, compact('pengajuan','kades', 'data_surat','alamat'))->setPaper('a4', 'potrait');
    
        return $pdf->stream();
        // return $pdf->download('pengajuan_'.$jenis_surat.'.pdf');
    }
}
