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
            return $th;
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

    static function getAlamatWarga($id_prov, $id_kab, $id_kec, $id_kel)
    {
        $nama_prov = '';
        $nama_kab = '';
        $nama_kec = '';
        $nama_kel = '';
        $provinsi = DaerahIndonesiaController::getProvinsi();
        foreach ($provinsi as $key => $value) {
            if (($id_prov == $value->id)) {
                $nama_prov = ($value->name);
                break;
            }
        }
        $kabupaten = DaerahIndonesiaController::getKabupaten($id_prov);
        foreach ($kabupaten as $key => $value) {
            if (($id_kab == $value->id)) {
                $nama_kab = ($value->name);
                break;
            }
        }
        $kecamatan = DaerahIndonesiaController::getKecamatan($id_kab);
        foreach ($kecamatan as $key => $value) {
            if (($id_kec == $value->id)) {
                $nama_kec = ($value->name);
                break;
            }
        }
        $kelurahan = DaerahIndonesiaController::getKelurahan($id_kec);
        foreach ($kelurahan as $key => $value) {
            if (($id_kel == $value->id)) {
                $nama_kel = ($value->name);
                break;
            }
        }

        return ('Kel./Desa '.($nama_kel).', Kec. '.$nama_kec.', Kab. '.$nama_kab.', Provinsi '.$nama_prov);
        
    }
}
