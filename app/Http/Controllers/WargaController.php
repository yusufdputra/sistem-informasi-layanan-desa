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
    }

    static function cekProfil()
    {
        $warga = Warga::select('tempat_lhr')->where('id_user',Auth::user()->id)->first();
       
        if ($warga->tempat_lhr != null) {
            return true;
        }
        return false;
    }

    

   

    
}
