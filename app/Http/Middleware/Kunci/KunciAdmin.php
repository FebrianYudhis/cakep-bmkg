<?php

namespace App\Http\Middleware\Kunci;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KunciAdmin
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
        if (!Auth::guard('admin')->check()) {
            Alert::error('Ditolak', 'Silahkan Login Dahulu !');
            return redirect()->route('admin.masuk');
        }
        return $next($request);
    }
}
