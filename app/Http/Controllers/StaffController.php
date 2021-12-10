<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public $target = 'staff';
    public function __construct()
    {
        $this->middleware('auth');
        
        setlocale(LC_ALL, 'IND');
    }

    public function index()
    {
        $title = "Kelola Data Staff Desa";
        $staff = Staff::all();
        return view('admin.staff.index', compact('title', 'staff'));
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
                'jabatan' => $request->jabatan,
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
