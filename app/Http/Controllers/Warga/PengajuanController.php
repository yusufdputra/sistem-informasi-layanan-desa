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
        $title = "Pengajuan Layanan Desa";
        $layanan = Layanan::all();
        if (Auth::user()->roles[0]['name'] == 'warga') {
            // cek apakah profil sudah dilengkapi
            $profil = ProfileController::getProfil();
            if (!WargaController::cekProfil()) {
                //jika belum terisi arahkan ke edit profil
                $title = "Edit Profil ";

                $provinsi = DaerahIndonesiaController::getProvinsi();

                return view('profil.warga', compact('title', 'profil', 'provinsi'), ['alert', 'Silahkan lengkapi profil terlebih dahulu']);
            }
            $pengajuan = Pengajuan::with('jenis_surat')->where('id_warga', $profil->id)->get();
            return view('warga.pengajuan.index', compact('title', 'pengajuan', 'layanan'));
        }
        if (Auth::user()->roles[0]['name'] == 'admin') {
            $pengajuan = Pengajuan::with('jenis_surat')->where('status', '!=', 'selesai')->get();
            return view('admin.pengajuan.index', compact('title', 'pengajuan', 'layanan'));
        }
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

        // cek form yang akan digunakan
        $form = PengajuanController::cekJenisForm($layanan->nama);
        return view('warga.form.index', compact('title', 'layanan', 'pengajuan', 'profil', 'provinsi', 'daerah', 'form'));
    }

    public function detail($id)
    {
        // get pengajuan by id
        $pengajuan = Pengajuan::with('jenis_surat', 'warga')->find($id);
        //get jenis surat
        $jenis_surat = $pengajuan->jenis_surat->nama;
        $layanan = $pengajuan->jenis_surat;
        $profil = $pengajuan->warga;
        $provinsi = DaerahIndonesiaController::getProvinsi();
        $daerah = DaerahIndonesiaController::getDaerahUser(
            $profil->provinsi,
            $profil->kabupaten,
            $profil->kecamatan
        );
        $title = "Proses Pengajuan Layanan Desa " . $layanan->nama;
        // cek form yang akan digunakan
        $form = PengajuanController::cekJenisForm($jenis_surat);
       
        return view('admin.form.index', compact('title', 'layanan', 'pengajuan', 'profil', 'provinsi', 'daerah', 'form'));
    }

    static function cekJenisForm($layanan)
    {
        $jenis = ['KURANG MAMPU', 'USAHA', 'BELUM MENIKAH', 'PENGHASILAN', 'BEDA NAMA', 'DOMISILI'];
        if (Str::contains($layanan, $jenis[0])) {
            return $form = 'kurang_mampu';
        }
        if (Str::contains($layanan, $jenis[1])) {
            return $form = 'usaha';
        }
        if (Str::contains($layanan, $jenis[2])) {
            return $form = 'belum_nikah';
        }
        if (Str::contains($layanan, $jenis[3])) {
            return $form = 'penghasilan';
        }

        if (Str::contains($layanan, $jenis[4])) {
            return $form = 'beda_nama';
        }
        if (Str::contains($layanan, $jenis[5])) {
            return $form = 'domisili';
        }
    }
}
