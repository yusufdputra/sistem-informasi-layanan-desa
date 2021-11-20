<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        $title = "";
        return view('auth.passwords.reset', compact('title'));
    }

    public function kirim(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (($user) == null) {
            return redirect()->back()->with('alert', 'Email tidak ditemukan.');
        }


        // insert ke tabel password reset
        PasswordReset::insert([
            'email' => $request->email,
            'token' => $request->_token,
            'created_at' => Carbon::now(),
        ]);

        // send to email
        try {
            $detail = [
                'email' => $request->email,
                'token' => $request->_token,
            ];

            Mail::to($request->email)->send(new SendMail($detail));
            return redirect()->route('login')->with('success', 'Berhasil, Silahkan Periksa Email Anda.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('alert', 'Tidak dapat mengirim email.');
        }
    }

    public function forgot($token)
    {
        $title = "";
        return view('auth.passwords.forgot', compact('title','token'));
    }

    public function ubah(Request $request)
    {
        // check token
        $token = PasswordReset::where('token', $request->token)->first();
        if ($token == null) {
            return redirect()->back()->with('alert', 'Token anda sudah kadarluasa. Silahkan coba lagi.');
        }
        // update passsword
        User::where('email', $token->email)
        ->update([
            'password'=> bcrypt($request->password),
        ]);

        // hapus token
        $query = PasswordReset::where('email', $token->email)->delete();
        if ($query) {
            return redirect()->route('login')->with('success', 'Berhasil mengubah kata sandi');
        } else {
            return redirect()->back()->with('alert', 'Gagal mengubah kata sandi');
        }

    }
}
