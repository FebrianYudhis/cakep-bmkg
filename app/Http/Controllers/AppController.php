<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use App\Models\User;
use Illuminate\Http\Request;
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
            'akun' => Auth::guard('user')->user(),
            'absendatang' => Absent::where('user_id', Auth::guard('user')->user()->id)->where('tanggal', '>=', Carbon::now()->subMonth()->lastOfMonth())->whereNull('jam_masuk')->count(),
            'absenpulang' => Absent::where('user_id', Auth::guard('user')->user()->id)->where('tanggal', '>=', Carbon::now()->subMonth()->lastOfMonth())->whereNull('jam_keluar')->count(),
        ];
        return view('app.dashboard', $data);
    }

    public function terkunci()
    {
        if (Auth::guard('user')->user()->status == 1) {
            return redirect()->route('user.dashboard');
        }
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
            'akun' => Auth::guard('user')->user(),
            'jam' => Carbon::now(),
            'tanggal' => Carbon::now()->format('Y-m-d')
        ];
        return view('app.absen.datang', $data);
    }

    public function catatabsendatang(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|before:' . Carbon::now()->addDay()->toDateString() . '|after:' . Carbon::now()->subDays(2)->toDateString()
        ]);

        $cek = Absent::where('tanggal', request('tanggal'))->where('user_id', Auth::guard('user')->user()->id);

        if ($cek->count() > 0) {
            $absen = $cek->where('jam_masuk', null)->first();

            if ($absen != null) {
                $absen->jam_masuk = Carbon::now();
                $absen->save();
                Alert::success('Berhasil', 'Absen Masuk Berhasil');
                return redirect()->route('user.dashboard');
            } else {
                if (isset($request->tetapPresensi)) {
                    Absent::create([
                        'user_id' => Auth::guard('user')->user()->id,
                        'tanggal' => request('tanggal'),
                        'jam_masuk' => Carbon::now()
                    ]);
                    Alert::success('Berhasil', 'Absen Masuk Berhasil');
                    return redirect()->route('user.dashboard');
                } else {
                    Alert::error('Absen Ditolak', 'Anda Sudah Absen');
                    return redirect()->route('user.dashboard');
                }
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
        $data = [
            'judul' => 'Absen Pulang',
            'aktif' => 'absen',
            'akun' => Auth::guard('user')->user(),
            'jam' => Carbon::now(),
            'tanggal' => Carbon::now()->format('Y-m-d')
        ];
        return view('app.absen.pulang', $data);
    }

    public function catatabsenpulang(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date|before:' . Carbon::now()->addDay()->toDateString() . '|after:' . Carbon::now()->subDays(2)->toDateString()
        ]);

        $cek = Absent::where('tanggal', request('tanggal'))->where('user_id', Auth::guard('user')->user()->id);

        if ($cek->count() > 0) {
            $absen = $cek->where('jam_keluar', null)->first();

            if ($absen != null) {
                $absen->jam_keluar = Carbon::now();
                $absen->save();
                Alert::success('Berhasil', 'Absen Pulang Berhasil');
                return redirect()->route('user.dashboard');
            } else {
                if (isset($request->tetapPresensi)) {
                    Absent::create([
                        'user_id' => Auth::guard('user')->user()->id,
                        'tanggal' => request('tanggal'),
                        'jam_keluar' => Carbon::now()
                    ]);
                    Alert::success('Berhasil', 'Absen Pulang Berhasil');
                    return redirect()->route('user.dashboard');
                } else {
                    Alert::error('Absen Ditolak', 'Anda Sudah Absen');
                    return redirect()->route('user.dashboard');
                }
            }
        } else {
            Absent::create([
                'user_id' => Auth::guard('user')->user()->id,
                'tanggal' => request('tanggal'),
                'jam_keluar' => Carbon::now()
            ]);
            Alert::success('Berhasil', 'Absen Pulang Berhasil');
            return redirect()->route('user.dashboard');
        }
    }
}
