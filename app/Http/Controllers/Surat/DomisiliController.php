<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Warga\PengajuanController;
use App\Models\Surat\Domisili;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DomisiliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $query = ProfileController::updateUserAtForm($request);

        if ($query) {
            $id_pengajuan = PengajuanController::store($request);

            // simpan ke db surat
            $where_surat = [
                'id_pengajuan' => $request->id_pengajuan
            ];

            $values_surat = [
                'id_pengajuan' => $id_pengajuan,
                'tujuan' => strtoupper($request->tujuan),
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ];
            Domisili::updateOrInsert($where_surat, $values_surat);

            // update data warga berdasarkan inputan form
            ProfileController::updateWargaAtForm($request);

            return redirect()->route('pengajuan.index')->with('success', 'Berhasil disimpan');
        } else {
            return redirect()->route('pengajuan.index')->with('alert', 'Gagal disimpan. NIK sudah terdaftar.');
        }
    }
}
