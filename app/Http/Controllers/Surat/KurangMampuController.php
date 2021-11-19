<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Warga\PengajuanController;
use App\Models\Pengajuan;
use App\Models\Surat\KurangMampu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KurangMampuController extends Controller
{
  public $target ;
  public function __construct()
  {
    $this->middleware('auth');
  }
  
  public function store(Request $request)
  {
    $this->target = "Pengajuan/Kurang Mampu/".Auth::user()->nik;
    $query = ProfileController::updateUserAtForm($request);

    if ($query) {
      $id_pengajuan = PengajuanController::store($request);

      try {
        // upload file pengantar dari rt
        $upload_pengantar = FileController::cekFile($request->file('file_pengantar'), $request->file_lama, $request->has('file_lama'), $this->target);
        // upload file saksi 1
        $upload_saksi1 = FileController::cekFile($request->file('ktp_saksi1_path'), $request->ktp_saksi1_path_lama, $request->has('ktp_saksi1_path_lama'), $this->target);
        // upload file saksi 2
        $upload_saksi2 = FileController::cekFile($request->file('ktp_saksi2_path'), $request->ktp_saksi2_path_lama, $request->has('ktp_saksi2_path_lama'), $this->target);
        // upload file Pernyataan RT dan Dua Saksi
        $upload_pernyataan_saksi = FileController::cekFile($request->file('pernyataan_saksi_path'), $request->pernyataan_saksi_path_lama, $request->has('pernyataan_saksi_path_lama'), $this->target);
        // upload file Rumah Tampak Depan
        $upload_rmh_depan = FileController::cekFile($request->file('rumah_depan_path'), $request->rumah_depan_path_lama, $request->has('rumah_depan_path_lama'), $this->target);
        // upload file Rumah Tampak Belakang
        $upload_rmh_blkng = FileController::cekFile($request->file('rumah_belakang_path'), $request->rumah_belakang_path_lama, $request->has('rumah_belakang_path_lama'), $this->target);
        // upload file Rumah Tampak Kanan
        $upload_rmh_kanan = FileController::cekFile($request->file('rumah_kanan_path'), $request->rumah_kanan_path_lama, $request->has('rumah_kanan_path_lama'), $this->target);
        // upload file Rumah Tampak Kiri
        $upload_rmh_kiri = FileController::cekFile($request->file('rumah_kiri_path'), $request->rumah_kiri_path_lama, $request->has('rumah_kiri_path_lama'), $this->target);

        // simpan ke db surat
        $where_surat = [
          'id_pengajuan' => $request->id_pengajuan
        ];

        $values_surat = [
          'id_pengajuan'            => $id_pengajuan,
          'nik_ortu'                => $request->nik_ortu,
          'nama_ortu'               => $request->nama_ortu,
          'tempat_lhr_ortu'         => $request->tempat_lhr_ortu,
          'tanggal_lhr_ortu'        => $request->tanggal_lhr_ortu,
          'pekerjaan_ortu'          => $request->pekerjaan_ortu,
          'alamat_ortu'             => $request->alamat_ortu,
          'tujuan'                  => $request->tujuan,
          'pengantar_path'          => $upload_pengantar,
          'ktp_saksi1_path'         => $upload_saksi1,
          'ktp_saksi2_path'         => $upload_saksi2,
          'pernyataan_saksi_path'   => $upload_pernyataan_saksi,
          'rumah_depan_path'        => $upload_rmh_depan,
          'rumah_belakang_path'     => $upload_rmh_blkng,
          'rumah_kanan_path'        => $upload_rmh_kanan,
          'rumah_kiri_path'         => $upload_rmh_kiri,
          'created_at'              => Carbon::now(),
          'updated_at'              => Carbon::now(),
        ];
        KurangMampu::updateOrInsert($where_surat, $values_surat);

        // update data warga berdasarkan inputan form
        ProfileController::updateWargaAtForm($request);

        return redirect()->route('pengajuan.index')->with('success', 'Berhasil disimpan');
      } catch (\Throwable $th) {
        //throw $th;
      }
    } else {
      return redirect()->route('pengajuan.index')->with('alert', 'Gagal disimpan. NIK sudah terdaftar.');
    }
  }
}
