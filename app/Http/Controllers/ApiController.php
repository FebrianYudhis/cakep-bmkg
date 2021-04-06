<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function absenpribadi()
    {
        $query = Absent::where('user_id', Auth::guard('user')->user()->id)->get();
        return datatables($query)
            ->editColumn('jam_masuk', function ($data) {
                if ($data->jam_masuk == null) {
                    return 'Belum Absen';
                } else {
                    return $data->jam_masuk;
                }
            })
            ->editColumn('jam_keluar', function ($data) {
                if ($data->jam_keluar == null) {
                    return 'Belum Absen';
                } else {
                    return $data->jam_keluar;
                }
            })
            ->rawColumns(['jam_masuk', 'jam_keluar'])
            ->toJson();
    }
}
