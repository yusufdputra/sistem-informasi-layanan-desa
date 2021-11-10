<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pengajuan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NomorSuratController extends Controller
{

    static function makeNoSurat($id_pengajuan)
    {
        $id_jenis_surat = Pengajuan::find($id_pengajuan)->id_jenis_surat;
        $layanan = Layanan::find($id_jenis_surat)->nama;

        // buat akronim
        $jenis_surat = '';
        if (preg_match_all('/\b(\w)/', strtoupper($layanan), $m)) {
            $jenis_surat =  implode('', $m[1]);
        }
        

        // buat nomor surat
        $data = Pengajuan::select('id')
            ->where('id_jenis_surat', $id_jenis_surat)
            ->where('status', 'selesai')
            ->count();
        $nomor = str_pad(($data+1), 3, '0', STR_PAD_LEFT);

        $bulan = NomorSuratController::convertMonth(Carbon::now()->format('m'));
        $tahun = Carbon::now()->format('Y');
        $nomor_surat = strval($nomor.'/'.$jenis_surat.'/Pemdes-MKR/'.$bulan.'/'.$tahun);

        return $nomor_surat;
    }

    static function convertMonth($month)
    {
        switch ($month) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}
