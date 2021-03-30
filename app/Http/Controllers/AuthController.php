<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function masukuser()
    {
        $data = [
            'judul' => "Masuk"
        ];

        return view('auth.user.masuk', $data);
    }

    public function masukuserpost()
    {
        dd('Masuk');
    }

    public function daftaruser()
    {
        $data = [
            'judul' => "Daftar"
        ];

        return view('auth.user.daftar', $data);
    }

    public function daftaruserpost()
    {
        dd('Daftar');
    }

    public function masukadmin()
    {
        $data = [
            'judul' => "Masuk"
        ];

        return view('auth.admin.masuk', $data);
    }

    public function masukadminpost()
    {
        dd('Masuk Admin');
    }
}
