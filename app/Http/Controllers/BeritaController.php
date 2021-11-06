<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public $target = 'berita';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Berita Desa";
        $berita = Berita::all();
        return view('admin.berita.index', compact('title', 'berita'));
    }

    public function add()
    { 
        $title = "Tambah Berita Desa";
        $berita = null;
        return view('admin.berita.form', compact('title', 'berita'));
    }

    public function store(Request $request)
    {
        if (($request->file('file_foto') != null)) {
            //jika ada upload foto
            //cek apakah ada file lama atau tidak
            if ($request->has('file_lama')) {
               $file_lama = $request->file_lama;
            }else{
                $file_lama = null;
            }
            $upload = FileController::uploadFile($this->target, $request->file('file_foto'), $file_lama);
        }else{
            // jika tidak ada ubah foto
            $upload = $request->file_lama;
        }
        if ($upload != false) {
            $where = [
                'id' => $request->id
            ];
    
            $values = [
                'judul' => ($request->judul),
                'isi' => $request->deskripsi,
                'foto_path' => $upload,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ];
    
            $query = Berita::updateOrInsert($where, $values);
    
            if ($query) {
                return redirect()->back()->with('success', 'Berhasil disimpan');
            } else {
                return redirect()->back()->with('alert', 'Gagal disimpan');
            }
        }else{
            return redirect()->back()->with('alert', 'Gagal disimpan');
        }
        
    }
}
