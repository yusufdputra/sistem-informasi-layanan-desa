<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        setlocale(LC_ALL, 'IND');
    }

    public function index()
    {
        $title = "Kelola Layanan Desa";
        $layanan = Layanan::all();
        return view('admin.layanan.index', compact('title', 'layanan'));
    }
    public function store(Request $request)
    {
        $where = [
            'id' => $request->id
        ];

        $values = [
            'nama' => strtoupper($request->nama),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];

        $query = Layanan::updateOrInsert($where, $values);

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil disimpan');
        } else {
            return redirect()->back()->with('alert', 'Gagal disimpan');
        }
    }

    public function hapus(Request $request)
    {
        $query = Layanan::where('id', $request->id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil dihapus');
        } else {
            return redirect()->back()->with('alert', 'Gagal dihapus');
        }
    }
}
