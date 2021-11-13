<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Lembaga;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public $target = 'lembaga';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Data Staff Desa";
        $lembaga = Lembaga::all();
        $jabatan = Jabatan::all();
        return view('admin.lembaga.index', compact('title', 'lembaga', 'jabatan'));
    }

    public function store(Request $request)
    {
        // upload file
        $upload = FileController::cekFile($request->file('file_foto'),$request->file_lama,$request->has('file_lama'), $this->target);

        if ($upload != false) {
            $where = [
                'id' => $request->id
            ];

            $values = [
                'nama' => strtoupper($request->nama),
                'id_jabatan' => $request->id_jabatan,
                'foto_path' => $upload,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ];

            $query = Lembaga::updateOrInsert($where, $values);

            if ($query) {
                return redirect()->back()->with('success', 'Berhasil disimpan');
            } else {
                return redirect()->back()->with('alert', 'Gagal disimpan');
            }
        }
        return redirect()->back()->with('alert', 'Gagal disimpan');
    }

    public function hapus(Request $request)
    {
        $query = Lembaga::where('id', $request->id)->delete();

        if($query){
            return redirect()->back()->with('success', 'Berhasil dihapus');
        }else{
            return redirect()->back()->with('alert', 'Gagal dihapus');
        }
    }
}
