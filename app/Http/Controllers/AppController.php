<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AppController extends Controller
{
    public function index()
    {
        $data = [
            'judul' => 'Dashboard User',
            'aktif' => 'dashboard',
            'akun' => Auth::guard('user')->user()
        ];
        return view('app.dashboard', $data);
    }

    public function terkunci()
    {
        $data = [
            'nama' => Auth::guard('user')->user()->nama,
            'tanggal' => Carbon::parse(Auth::guard('user')->user()->created_at)->format('l,d M Y - H:i'),
            'status' => Auth::guard('user')->user()->status
        ];
        return view('app.status', $data);
    }

    public function gantipassword()
    {
        $data = [
            'judul' => 'Ganti Password',
            'aktif' => '',
            'akun' => Auth::guard('user')->user()
        ];
        return view('app.gantipassword', $data);
    }

    public function gantipasswordpost()
    {
        request()->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed',
        ]);

        $akun = User::find(Auth::guard('user')->user()->id);

        if (Hash::check(request('password_lama'), $akun->password)) {
            $akun->password = Hash::make(request('password_baru'));
            $akun->save();

            Alert::success('Berhasil', 'Password Berhasil Diganti');
            return redirect()->route('user.gantipassword');
        } else {
            Alert::error('Gagal', 'Password Lama Salah');
            return redirect()->route('user.gantipassword');
        }
    }
}
