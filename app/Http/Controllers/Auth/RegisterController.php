<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

   
    public function create(Request $request)
    {
        // validasi
        $rules = [
            'nik' => 'required|unique:users',
            'password' => 'required|min:5'
        ];
        $pesan = [
            'nik.unique' => "Nomor induk sudah terdaftar",
            'password.min' => "Minimal 5 karakter",
        ];
        $validator = Validator::make($request->all(), $rules, $pesan);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        // simpan ke user
        $user = new User();
        $user->nik = $request->nik;
        $user->username = strtoupper( $request->nama);
        $user->password = bcrypt($request->password);
        $user->save();
        //tambah ke role
        $user->assignRole('warga');
        // simpan ke warga
        $mhs = Warga::insert([
            'id_user' => $user->id,
            'nama' => strtoupper($request->nama),
            'created_at' => Carbon::now(),
        ]);

        if ($mhs || $user) {
            Auth::login($user);
            return redirect()->route('/');
        } else {
            return redirect()->back()->with('alert', 'Akun gagal dibuat');
        }

    }

}
