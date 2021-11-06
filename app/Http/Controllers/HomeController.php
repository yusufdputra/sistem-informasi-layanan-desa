<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Magang;
use App\Models\Peminjaman;
use App\Models\Periode;
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
        return view('landing.index');
    }


    public function auth()
    {

        return view('landing.index');
    }
}
