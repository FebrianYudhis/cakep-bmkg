<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('user')->attempt(request()->only('username', 'password'), request()->filled('remember'))) {
            request()->session()->regenerate();
            return redirect()->intended(route('user.dashboard'));
        } elseif (User::whereUsername(request('username'))->count() == 0) {
            Alert::error('Salah', 'Username Tidak Ada !');
            return redirect()->route('user.masuk');
        } else {
            Alert::error('Salah', 'Password Salah !');
            return redirect()->route('user.masuk');
        }
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
        request()->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|alpha_dash|min:8|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        $user = User::create([
            'username' => request('username'),
            'nama' => request('nama'),
            'password' => Hash::make(request('nama')),
            'status' => 0
        ]);

        Auth::guard()->login($user);

        return redirect()->intended(route('user.dashboard'));
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

    public function keluar()
    {
        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        request()->session()->invalidate();

        request()->session()->regenerateToken();

        Alert::success('Berhasil', 'Berhasil Keluar');
        return redirect()->route('user.masuk');
    }
}
