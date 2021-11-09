<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaerahIndonesiaController extends Controller
{

    static function getDaerahUser($idProvinsi, $idKabupaten, $idkecamatan)
    {
        $kabupaten = DaerahIndonesiaController::getKabupaten($idProvinsi);
        $kecamatan = DaerahIndonesiaController::getKecamatan($idKabupaten);
        $kelurahan = DaerahIndonesiaController::getKelurahan($idkecamatan);
      
        return compact('kabupaten', 'kecamatan', 'kelurahan');
    }
    static function getProvinsi()
    {
        try {
            $json = file_get_contents('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
            return json_decode($json);
        } catch (\Throwable $th) {
            return [];
        }
    }

    static function getKabupaten($id_prov)
    {
        try {
            $json = file_get_contents('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' . $id_prov . '.json');
            return json_decode($json);
        } catch (\Throwable $th) {
            return [];
        }
    }
    static function getKecamatan($id_kab)
    {
        try {
            $json = file_get_contents('http://www.emsifa.com/api-wilayah-indonesia/api/districts/' . $id_kab . '.json');
            return json_decode($json);
        } catch (\Throwable $th) {
            return [];
        }
    }
    static function getKelurahan($id_kec)
    {
        try {
            $json = file_get_contents('http://www.emsifa.com/api-wilayah-indonesia/api/villages/' . $id_kec . '.json');
            return json_decode($json);
        } catch (\Throwable $th) {
            return [];
        }
    }
}
