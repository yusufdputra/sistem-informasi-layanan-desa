<?php

namespace App\Http\Controllers;

use App\Models\Kades;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveSignatureController extends Controller
{
    public function store(Request $request)
    {

        //unlink
        // if ($request->ttd_path_lama != null) {
        //     FileController::unlinkFile($request->ttd_path_lama);
        // }

        // $folderPath = public_path('storage/uploads/signatures/');
        $image_parts = explode(";base64,", $request->ttd_json);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        // $file = $folderPath . uniqid() . '.' . $image_type;
        // $upload =  file_put_contents($file, $image_base64);
        // if ($upload) {
            # code...

            $where = [
                'id_user' => Auth::user()->id
            ];

            $values = [
                // 'ttd_path' => $file,
                'signature_json' => $request->ttd_json,
                'updated_at'   => Carbon::now(),
            ];

            $role = Auth::user()->roles[0]['name'];
            if ($role == 'warga') {
                $query = Warga::updateOrInsert($where, $values);
            }else if ($role == 'kades') {
                $query = Kades::updateOrInsert($where, $values);
                
            }


            

            if ($query) {
                return redirect()->back()->with('success', 'Berhasil disimpan');
            } else {
                return redirect()->back()->with('alert', 'Gagal disimpan');
            }
        // }else{
        //     return redirect()->back()->with('alert', 'Gagal disimpan');
        // }
    }
}
