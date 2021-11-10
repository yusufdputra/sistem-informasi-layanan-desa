<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DaerahIndonesiaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WargaController;
use App\Models\Layanan;
use App\Models\Pengajuan;
use App\Models\Surat\BedaNama;
use App\Models\Surat\BelumNikah;
use App\Models\Surat\Domisili;
use App\Models\Surat\KurangMampu;
use App\Models\Surat\Penghasilan;
use App\Models\Surat\Usaha;
use App\Models\Warga;
use Carbon\Carbon;
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
            $pengajuan_proses = Pengajuan::with('jenis_surat')
            ->where('id_warga', $profil->id)
            ->where('status', '!=', 'selesai')
            ->get();

            $pengajuan_selesai = Pengajuan::with('jenis_surat')
            ->where('id_warga', $profil->id)
            ->where('status', 'selesai')
            ->get();

            return view('warga.pengajuan.index', compact('title', 'pengajuan_proses', 'pengajuan_selesai','layanan'));
        }
        if (Auth::user()->roles[0]['name'] == 'admin') {
            $pengajuan = Pengajuan::with('jenis_surat')->where('status', 'proses')->get();
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

    public function detail($id_pengajuan)
    {
        // get pengajuan by id
        $pengajuan = Pengajuan::with('jenis_surat', 'warga')->find($id_pengajuan);
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
        $title = "Proses Pengajuan Layanan Desa " . $jenis_surat;
        // cek form yang akan digunakan
        $form = PengajuanController::cekJenisForm($jenis_surat);
        // get data surat pengajuan
        $data_surat = PengajuanController::getDataSurat($jenis_surat,$id_pengajuan);
       
        return view('admin.form.index', compact('title', 'layanan', 'pengajuan', 'profil', 'provinsi', 'daerah', 'form', 'data_surat'));
    }

    public function terima($id_pengajuan)
    {
        $query = Pengajuan::where('id', $id_pengajuan)->update([
            'status'        => 'selesai',
            'updated_at'    => Carbon::now()
        ]);
        if ($query) {
            return redirect()->route('pengajuan.index')->with('success', 'Berhasil disimpan');
        } else {
            return redirect()->route('pengajuan.index')->with('alert', 'Gagal disimpan');
        }
    }

    public function tolak(Request $request)
    {
        $query = Pengajuan::where('id', $request->id_pengajuan)->update([
            'status'        => 'tolak',
            'keterangan'    => $request->alasan,
            'updated_at'    => Carbon::now()
        ]);
        if ($query) {
            return redirect()->route('pengajuan.index')->with('success', 'Berhasil disimpan');
        } else {
            return redirect()->route('pengajuan.index')->with('alert', 'Gagal disimpan');
        }
    }

    public function hapus(Request $request)
    {
        $query = Pengajuan::where('id', $request->id_pengajuan)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil menghapus');
        } else {
            return redirect()->back()->with('alert', 'Gagal menghapus');
        }
    }

    static function cekJenisForm($layanan)
    {
        $jenis = ['KURANG MAMPU', 'USAHA', 'BELUM MENIKAH', 'PENGHASILAN', 'BEDA NAMA', 'DOMISILI'];
        if (Str::contains($layanan, $jenis[0])) {
            return 'kurang_mampu';
        }
        if (Str::contains($layanan, $jenis[1])) {
            return 'usaha';
        }
        if (Str::contains($layanan, $jenis[2])) {
            return 'belum_nikah';
        }
        if (Str::contains($layanan, $jenis[3])) {
            return 'penghasilan';
        }

        if (Str::contains($layanan, $jenis[4])) {
            return 'beda_nama';
        }
        if (Str::contains($layanan, $jenis[5])) {
            return 'domisili';
        }
    }

    static function getDataSurat($layanan, $id_pengajuan)
    {
        $jenis = ['KURANG MAMPU', 'USAHA', 'BELUM MENIKAH', 'PENGHASILAN', 'BEDA NAMA', 'DOMISILI'];
        if (Str::contains($layanan, $jenis[0])) {
            return KurangMampu::where('id_pengajuan', $id_pengajuan)->first();
        }
        if (Str::contains($layanan, $jenis[1])) {
            return Usaha::where('id_pengajuan', $id_pengajuan)->first();
        }
        if (Str::contains($layanan, $jenis[2])) {
            return BelumNikah::where('id_pengajuan', $id_pengajuan)->first();
        }
        if (Str::contains($layanan, $jenis[3])) {
            return Penghasilan::where('id_pengajuan', $id_pengajuan)->first();
        }

        if (Str::contains($layanan, $jenis[4])) {
            return BedaNama::where('id_pengajuan', $id_pengajuan)->first();
        }
        if (Str::contains($layanan, $jenis[5])) {
            return Domisili::where('id_pengajuan', $id_pengajuan)->first();
        }
    }
}
