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
        // upload file
        dd($request->file_foto);
        $upload = FileController::cekFile($request->file('file_foto'),$request->file_lama,$request->has('file_lama'), $this->target);

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
        } else {
            return redirect()->back()->with('alert', 'Gagal disimpan');
        }
    }

    public function edit($id)
    {
        $title = "Ubah Berita Desa";
        $berita = Berita::find($id);
        return view('admin.berita.form', compact('title', 'berita'));
    }

    public function hapus(Request $request)
    {
        $query = Berita::where('id', $request->id)->delete();

        if ($query) {
            return redirect()->back()->with('success', 'Berhasil dihapus');
        } else {
            return redirect()->back()->with('alert', 'Gagal dihapus');
        }
    }
}
