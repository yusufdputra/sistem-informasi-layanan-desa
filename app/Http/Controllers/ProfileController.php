<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public $profile = 'profile';
    public $kk = 'profile/kk';
    public $ktp = 'profile/ktp';

    static function getProfil()
    {
        return Warga::where('id_user', Auth::user()->id)->first();
    }

    public function updateFotoProfil(Request $request)
    {
        $upload = FileController::cekFile($request->file('file_foto'),$request->file_lama,$request->has('file_lama'), $this->profile);
        if ($upload != false) {
            $where = [
                'id_user' => Auth::user()->id
            ];

            $values = [
                'profil_path' => $upload,
                'updated_at'   => Carbon::now(),
            ];

            $query = Warga::updateOrInsert($where, $values);

            if ($query) {
                return redirect()->back()->with('success', 'Berhasil disimpan');
            } else {
                return redirect()->back()->with('alert', 'Gagal disimpan');
            }
        }
        return redirect()->back()->with('alert', 'Gagal disimpan');
    }

    public function store(Request $request)
    {
        try {

            // upload kk
            $uploadKK = FileController::cekFile($request->file('file_foto_kk'),$request->file_lama_kk,$request->has('file_lama_kk'), $this->kk);
            // upload ktp
            $uploadKTP = FileController::cekFile($request->file('file_foto_ktp'),$request->file_lama_ktp,$request->has('file_lama_ktp'), $this->ktp);
            // upload ttd
            $uploadTTD = SaveSignatureController::store($request);


            if ($uploadKK != false && $uploadKTP != false && $uploadTTD != false) {
                $where = [
                    'id_user' => Auth::user()->id
                ];

                $values = [
                    'nama' => $request->nama,
                    'tempat_lhr' => strtoupper($request->tempat_lhr),
                    'tanggal_lhr' => $request->tanggal_lhr,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'rt' => $request->rt,
                    'rw' => $request->rw,
                    'provinsi' => $request->provinsi,
                    'kabupaten' => $request->kabupaten,
                    'kecamatan' => $request->kecamatan,
                    'kelurahan' => $request->kelurahan,
                    'agama' => $request->agama,
                    'status_kawin' => $request->status_kawin,
                    'pekerjaan' => $request->pekerjaan,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'goldar' => $request->goldar,
                    'ktp_path' => $uploadKK,
                    'kk_path' => $uploadKTP,
                    'ttd_path' => $uploadTTD,
                    'updated_at'   => Carbon::now(),
                ];

                $query = Warga::updateOrInsert($where, $values);

                if ($query) {
                    return redirect()->back()->with('success', 'Berhasil disimpan');
                } else {
                    return redirect()->back()->with('alert', 'Gagal disimpan');
                }
            }
            return redirect()->back()->with('alert', 'Gagal disimpan');
            //code...
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Gagal disimpan '. $th);
        }
    }
}
