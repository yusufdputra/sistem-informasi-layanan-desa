<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Warga\PengajuanController;
use App\Models\Pengajuan;
use App\Models\Surat\BedaNama;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BedaNamaController extends Controller
{
    public $target = "Pengajuan/Beda Nama";
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $query = ProfileController::updateUserAtForm($request);

        if ($query) {
            $id_pengajuan = PengajuanController::store($request);

            // upload file pengantar dari rt
            $upload_pengantar = FileController::cekFile($request->file('file_pengantar'), $request->file_lama, $request->has('file_lama'), $this->target);

            // upload file dokumen beda nama
            $upload_dok_beda = FileController::cekFile($request->file('file_dokumen_beda'), $request->file_lama_beda, $request->has('file_lama_beda'), $this->target);

            if ($upload_pengantar && $upload_dok_beda) {
                // simpan ke db surat
                $where_surat = [
                    'id_pengajuan' => $request->id_pengajuan
                ];

                $values_surat = [
                    'id_pengajuan' => $id_pengajuan,
                    'tujuan' => $request->tujuan,
                    'pengantar_path' => $upload_pengantar,
                    'dokumen_beda' => $upload_dok_beda,
                    'created_at'   => Carbon::now(),
                    'updated_at'   => Carbon::now(),
                ];
                BedaNama::updateOrInsert($where_surat, $values_surat);

                // update data warga berdasarkan inputan form
                ProfileController::updateWargaAtForm($request);

                return redirect()->route('pengajuan.index')->with('success', 'Berhasil disimpan');
            } else {
                return redirect()->route('pengajuan.index')->with('alert', 'Gagal disimpan. Terjadi kesalahan saat simpan foto');
            }
        } else {
            return redirect()->route('pengajuan.index')->with('alert', 'Gagal disimpan. NIK sudah terdaftar.');
        }
    }
}
