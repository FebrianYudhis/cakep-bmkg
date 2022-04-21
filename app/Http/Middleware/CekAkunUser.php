<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CekAkunUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('user')->user()->status == 1) {
            if (Auth::guard('user')->user()->is_login == null) {
                Auth::guard('user')->logout();
                Alert::error('Gagal', 'Login Terlebih Dahulu !');
                return redirect()->route('user.masuk');
            } else {
                return $next($request);
            }
        }
        return redirect()->route('user.terkunci');
    }
}
