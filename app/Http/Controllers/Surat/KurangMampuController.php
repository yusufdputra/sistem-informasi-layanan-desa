<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Models\Pengajuan;
use App\Models\Surat\KurangMampu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurangMampuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $query = ProfileController::updateUserAtForm($request);

        if ($query) {
            $where_pengajuan = [
                'id' => $request->id_pengajuan
            ];

            $values_pengajuan = [
                'id_jenis_surat' => $request->id_jenis_surat,
                'id_warga' => $request->id_warga,
                'status' => 'proses',
                'keterangan' => null,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ];

            Pengajuan::updateOrInsert($where_pengajuan, $values_pengajuan);
            $id_pengajuan = DB::getPdo()->lastInsertId();
            if ($id_pengajuan == 0) {
                $id_pengajuan = $request->id_pengajuan;
            }

            // simpan ke db surat
            $where_surat = [
                'id_pengajuan' => $request->id_pengajuan
            ];

            $values_surat = [
                'id_pengajuan' => $id_pengajuan,
                'nama_ortu' => $request->nama_ortu,
                'tempat_lhr_ortu' => $request->tempat_lhr_ortu,
                'tanggal_lhr_ortu' => $request->tanggal_lhr_ortu,
                'pekerjaan_ortu' => $request->pekerjaan_ortu,
                'alamat_ortu' => $request->alamat_ortu,
                'tujuan' => $request->tujuan,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ];
            KurangMampu::updateOrInsert($where_surat, $values_surat);

            // update data warga berdasarkan inputan form
            ProfileController::updateWargaAtForm($request);

            return redirect()->route('pengajuan.index')->with('success', 'Berhasil disimpan');
        } else {
            return redirect()->route('pengajuan.index')->with('alert', 'Gagal disimpan. NIK sudah terdaftar.');
        }
    }
}
