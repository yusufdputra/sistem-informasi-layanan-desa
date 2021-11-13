<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Magang;
use App\Models\Peminjaman;
use App\Models\Periode;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $title = "Dashboard";
        if (Auth::check()) {

            return view('home', compact('title'));
        }

       
        // $staff = Staff::all();
        return view('landing.index', compact('staff'));
    }


    public function auth()
    {
        $data['staff'] = Staff::all();
        $data['layanan'] = Layanan::all();
        $data['berita'] = Berita::orderBy('updated_at', 'DESC')->limit(6)->get();

  
        return view('landing.index', compact('data'));
    }
}
