<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        setlocale(LC_ALL, 'IND');
        $title = "Arsip Pengajuan Layanan Desa";
        $arsip = Pengajuan::where('status', 'selesai')->orderBy('updated_at','DESC')->get();
        $layanan = Layanan::all();
        return view('arsip.index', compact('title', 'arsip', 'layanan'));
    }
}
