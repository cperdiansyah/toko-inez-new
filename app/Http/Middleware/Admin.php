<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // return $next($request);
        if (Auth::check()) {

            if (
                auth()->user()->is_admin == 1
            ) {
                return $next($request);
            }
        }

        return redirect('/')->with('loginAdminError', "Gagal mendapatkan akses, silahkan login dengan akses yang sesuai");
    }
}
