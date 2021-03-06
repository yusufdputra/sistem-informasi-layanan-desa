<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        setlocale(LC_ALL, 'IND');
    }

    static function cekProfil()
    {
        $warga = Warga::select('tempat_lhr')->where('id_user',Auth::user()->id)->first();
       
        if ($warga->tempat_lhr != null) {
            return true;
        }
        return false;
    }

    public function dataWarga()
    {
        $title = "Data Warga Desa Makmur";
        $warga = Warga::where('tempat_lhr' ,'!=', null)->get();
        $alamat_warga = [];
        foreach ($warga as $key => $value) {
            $alamat_warga[$key] = DaerahIndonesiaController::getAlamatWarga($value->provinsi, $value->kabupaten,$value->kecamatan, $value->kelurahan);
        }
        return view('admin.warga.index', compact('title', 'warga','alamat_warga'));
    }   
    
}
