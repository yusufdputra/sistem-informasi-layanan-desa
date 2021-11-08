<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaerahIndonesiaController extends Controller
{
    public function getKabupaten($id)
    {
        $json = file_get_contents('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/'.$id.'.json');
        return (json_decode($json));
    }
}
