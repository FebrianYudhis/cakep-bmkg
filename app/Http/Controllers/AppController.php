<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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
            'judul' => 'Terkunci',
            'aktif' => '',
            'akun' => Auth::guard('user')->user(),
            'tanggal' => Carbon::parse(Auth::guard('user')->user()->created_at)->format('l,d M Y - H:i'),
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

    public function absendatang()
    {
        $data = [
            'judul' => 'Absen Datang',
            'aktif' => 'absen',
            'akun' => Auth::guard('user')->user()
        ];
        return view('app.absen.datang', $data);
    }

    public function catatabsendatang()
    {
        request()->validate([
            'tanggal' => 'required|date|before:' . Carbon::now()->addDay()->toDateString()
        ]);

        $cek = Absent::whereTanggal(request('tanggal'))->where('user_id', Auth::guard('user')->user()->id);
        $absen = $cek->first();

        if ($cek->count() > 0) {
            if ($absen->jam_masuk == null) {
                $absen->jam_masuk = Carbon::now();
                $absen->save();
                Alert::success('Berhasil', 'Absen Masuk Berhasil');
                return redirect()->route('user.dashboard');
            } else {
                Alert::error('Sudah Absen Masuk', 'Anda Sudah Absen Pada ' . Carbon::parse($absen->jam_masuk)->format('d M Y - H:i'));
                return redirect()->route('user.dashboard');
            }
        } else {
            Absent::create([
                'user_id' => Auth::guard('user')->user()->id,
                'tanggal' => request('tanggal'),
                'jam_masuk' => Carbon::now()
            ]);
            Alert::success('Berhasil', 'Absen Masuk Berhasil');
            return redirect()->route('user.dashboard');
        }
    }

    public function absenpulang()
    {
        dd("Absen Pulang");
    }
}
