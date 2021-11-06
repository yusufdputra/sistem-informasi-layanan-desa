<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public $target = 'staff';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Data Staff Desa";
        $staff = Staff::all();
        $jabatan = Jabatan::all();
        return view('admin.staff.index', compact('title', 'staff', 'jabatan'));
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
                'nama' => strtoupper($request->nama),
                'id_jabatan' => $request->id_jabatan,
                'foto_path' => $upload,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ];

            $query = Staff::updateOrInsert($where, $values);

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
        $query = Staff::where('id', $request->id)->delete();

        if($query){
            return redirect()->back()->with('success', 'Berhasil dihapus');
        }else{
            return redirect()->back()->with('alert', 'Gagal dihapus');
        }
    }
}
