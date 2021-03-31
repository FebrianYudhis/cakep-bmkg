<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'judul' => "Dashboard Admin"
        ];
        return view('admin.dashboard', $data);
    }
}
