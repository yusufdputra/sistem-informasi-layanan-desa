<?php

namespace App\Http\Controllers;

use App\Models\Kades;
use App\Models\User;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public $profile = 'profile';
    public $kk = 'profile/kk';
    public $ktp = 'profile/ktp';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = "Kelola Data Profil";
        $role = Auth::user()->roles[0]['name'];
        if ($role == 'warga') {
            $profil = ProfileController::getProfilWarga();
            $daerah = DaerahIndonesiaController::getDaerahUser(
                $profil->provinsi,
                $profil->kabupaten,
                $profil->kecamatan
            );
            $provinsi = DaerahIndonesiaController::getProvinsi();

            return view('profil.warga', compact('title', 'profil', 'provinsi', 'daerah'));
        }
        if ($role == 'kades') {
            $profil = ProfileController::getProfilKades();
            return view('profil.kades', compact('title', 'profil'));
        }
        if ($role == 'admin') {
            $profil = ProfileController::getProfilAdmin();
            return view('profil.admin', compact('title', 'profil'));
        }
        
    }

    static function getProfilWarga()
    {
        return Warga::with('user')->where('id_user', Auth::user()->id)->first();
    }

    static function getProfilKades()
    {
        return Kades::with('user')->where('id_user', Auth::user()->id)->first();
    }
    static function getProfilAdmin()
    {
        return User::find(Auth::user()->id);
    }


    public function updateFotoProfil(Request $request)
    {
        $upload = FileController::cekFile($request->file('file_foto'), $request->file_lama, $request->has('file_lama'), $this->profile);
        if ($upload != false) {
            $where = [
                'id_user' => Auth::user()->id
            ];

            $values = [
                'profil_path' => $upload,
                'updated_at'   => Carbon::now(),
            ];

            $role = Auth::user()->roles[0]['name'];
            if ($role == 'warga') {
                $query = Warga::updateOrInsert($where, $values);
            } else if ($role == 'kades') {
                $query = Kades::updateOrInsert($where, $values);
            }

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
        $role = Auth::user()->roles[0]['name'];
        if ($role == 'warga') {
            try {
                $query = ProfileController::updateUserAtForm($request);

                if ($query) {
                    // upload kk
                    $uploadKK = FileController::cekFile($request->file('file_foto_kk'), $request->file_lama_kk, $request->has('file_lama_kk'), $this->kk);
                    // upload ktp
                    $uploadKTP = FileController::cekFile($request->file('file_foto_ktp'), $request->file_lama_ktp, $request->has('file_lama_ktp'), $this->ktp);

                    if ($uploadKK != false && $uploadKTP != false) {
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
                            'updated_at'   => Carbon::now(),
                        ];

                        $query = Warga::updateOrInsert($where, $values);

                        if ($query) {
                            return redirect()->back()->with('success', 'Berhasil disimpan');
                        } else {
                            return redirect()->back()->with('alert', 'Gagal disimpan');
                        }
                    }
                }
                return redirect()->back()->with('alert', 'Gagal menyimpan NIK. NIK sudah terdaftar.');
                //code...
            } catch (\Throwable $th) {
                return redirect()->back()->with('alert', 'Gagal disimpan');
            }
        } else if ($role == 'kades') {
            $where = [
                'id' => Auth::user()->id
            ];
            $values = [
                'username' => $request->nama,
                'updated_at'   => Carbon::now(),
            ];
            $query = User::updateOrInsert($where, $values);

            if ($query) {
                return redirect()->back()->with('success', 'Berhasil disimpan');
            } else {
                return redirect()->back()->with('alert', 'Gagal disimpan');
            }
        }
    }

    static function updateWargaAtForm(Request $request)
    {

        Warga::where('id_user', Auth::user()->id)
            ->update([
                'nama' => strtoupper($request->nama),
                'tempat_lhr' => strtoupper($request->tempat_lhr),
                'tanggal_lhr' => $request->tanggal_lhr,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'pekerjaan' => $request->pekerjaan,
                'provinsi' => $request->provinsi,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan,
                'updated_at'   => Carbon::now(),
            ]);
        return true;
    }

    static function updateUserAtForm(Request $request)
    {
        // update username
        User::where('id', Auth::user()->id)
            ->update([
                'username' => $request->nama
            ]);

        // update nik
        // validasi
        $nik_old = Auth::user()->nik;
        // jika berbeda
        if (isset($request->nik) && $nik_old != $request->nik) {

            $rules = [
                'nik' => 'required|unique:users',
            ];
            $pesan = [
                'nik.unique' => "Nomor induk sudah terdaftar",
            ];
            $validator = Validator::make($request->all(), $rules, $pesan);
            if ($validator->fails()) {
                return false;
            } else {
                $query = User::where('id', Auth::user()->id)
                    ->update([
                        'nik' => $request->nik
                    ]);
            }
        }
        return true;
    }
}
