<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WargaController;
use App\Models\Layanan;
use App\Models\Pengajuan;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PengajuanController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }

    public function index()
    {
        // cek apakah profil sudah dilengkapi
        if (!WargaController::cekProfil()) {
            //jika belum terisi arahkan ke edit profil
            $title = "Edit Profil ";
            $profil = ProfileController::getProfil();

            $json = file_get_contents('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
            $provinsi = json_decode($json);

            return view('profil.warga', compact('title', 'profil', 'provinsi'), ['alert', 'Silahkan lengkapi profil terlebih dahulu']);
        }

        $title = "Pengajuan Layanan Desa";
        $pengajuan = Pengajuan::all();
        $layanan = Layanan::all();



        return view('warga.pengajuan.index', compact('title', 'pengajuan', 'layanan'));
    }

    public function add(Request $request)
    {
        $layanan = Layanan::find($request->id_layanan);
        $title = "Pengajuan Layanan Desa " . $layanan->nama;
        $pengajuan = Pengajuan::with('jenis_surat', 'warga')->find(null);

        // kurang mampu
        $jenis = ['KURANG MAMPU', 'USAHA', 'BELUM MENIKAH', 'KELAHIRAN', 'KEMATIAN', 'PENGHASILAN', 'BEDA NAMA', 'DOMISILI'];
        if (Str::contains($layanan->nama, $jenis[0])) {
            $form = 'kurang_mampu';
        }
        return view('warga.form.' . $form, compact('title', 'layanan', 'pengajuan'));
    }
}
