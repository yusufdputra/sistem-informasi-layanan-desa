<?php

namespace App\Http\Controllers\Surat;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Surat\BedaNama;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedaNamaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $where_pengajuan = [
            'id' => $request->id_pengajuan
        ];

        $values_pengajuan = [
            'id_jenis_surat' => $request->id_jenis_surat,
            'id_warga' => $request->id_warga,
            'status' => 'proses',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];

        Pengajuan::updateOrInsert($where_pengajuan, $values_pengajuan);
        $id_pengajuan =DB::getPdo()->lastInsertId();
        
        // simpan ke db surat
        $where_surat = [
            'id' => $request->id_surat_beda_nama
        ];

        $values_surat = [
            'id_pengajuan' => $id_pengajuan,
            'tujuan' => $request->tujuan,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];
        $query = BedaNama::updateOrInsert($where_surat, $values_surat);


        if ($query) {
            return redirect()->route('pengajuan.index')->with('success', 'Berhasil disimpan');
        } else {
            return redirect()->route('pengajuan.index')->with('alert', 'Gagal disimpan');
        }
    }
}
