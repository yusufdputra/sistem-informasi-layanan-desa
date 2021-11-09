<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DaerahIndonesiaController;
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
        
        $profil = ProfileController::getProfil();
        if (!WargaController::cekProfil()) {
            //jika belum terisi arahkan ke edit profil
            $title = "Edit Profil ";

            $provinsi = DaerahIndonesiaController::getProvinsi();

            return view('profil.warga', compact('title', 'profil', 'provinsi'), ['alert', 'Silahkan lengkapi profil terlebih dahulu']);
        }

        $title = "Pengajuan Layanan Desa";
        $pengajuan = Pengajuan::with('jenis_surat')->where('id_warga', $profil->id)->get();
        $layanan = Layanan::all();



        return view('warga.pengajuan.index', compact('title', 'pengajuan', 'layanan'));
    }

    public function add(Request $request)
    {
        $id_layanan = $request->id_layanan;
        $layanan = Layanan::find($id_layanan);
        $title = "Pengajuan Layanan Desa " . $layanan->nama;
        $pengajuan = Pengajuan::with('jenis_surat', 'warga')->find(null);
        $profil = ProfileController::getProfil();
        $provinsi = DaerahIndonesiaController::getProvinsi();
        $daerah = DaerahIndonesiaController::getDaerahUser(
            $profil->provinsi,
            $profil->kabupaten,
            $profil->kecamatan
        );

        // kurang mampu
        $jenis = ['KURANG MAMPU', 'USAHA', 'BELUM MENIKAH', 'PENGHASILAN', 'BEDA NAMA', 'DOMISILI'];
        if (Str::contains($layanan->nama, $jenis[0])) {
            $form = 'kurang_mampu';
        }

        if (Str::contains($layanan->nama, $jenis[4])) {
            $form = 'beda_nama';
        }
        return view('warga.form.' . $form, compact('title', 'layanan', 'pengajuan','profil', 'provinsi','daerah'));
    }
}
