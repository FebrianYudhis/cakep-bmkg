<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        dd('Halaman Utama');
    }

    public function terkunci()
    {
        $data = [
            'nama' => Auth::guard('user')->user()->nama,
            'tanggal' => Carbon::parse(Auth::guard('user')->user()->created_at)->format('l,d M Y - H:i'),
        ];
        return view('app.status', $data);
    }
}
