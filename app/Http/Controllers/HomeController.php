<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Magang;
use App\Models\Peminjaman;
use App\Models\Pengajuan;
use App\Models\Periode;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        setlocale(LC_ALL, 'IND');
        $title = "Halaman Utama";
        if (Auth::check()) {

            $pengajuan['selesai'] = Pengajuan::where('status', 'selesai')->count();
            $pengajuan['proses'] = Pengajuan::where('status', 'proses')->count();

            return view('home', compact('title', 'pengajuan'));
        }

        $data['staff'] = Staff::all();
        $data['layanan'] = Layanan::all();
        $data['berita'] = Berita::orderBy('updated_at', 'DESC')->limit(6)->get();


        return view('landing.index', compact('data'));
    }


    public function auth()
    {
        
        setlocale(LC_ALL, 'IND');
        $data['staff'] = Staff::all();
        $data['layanan'] = Layanan::all();
        $data['berita'] = Berita::orderBy('updated_at', 'DESC')->limit(6)->get();


        return view('landing.index', compact('data'));
    }
}
