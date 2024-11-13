<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PerusahaanMiddleware
{
    public function handle($request, Closure $next)
    {
        // Cek apakah pengguna sudah terautentikasi dengan guard 'perusahaan'
        if (Auth::guard('perusahaan')->check()) {
            // Jika pengguna sudah login dan mencoba mengakses /signin
            if ($request->is('signin')) {
                // Kembalikan tampilan login dengan pesan
                return response()->view('perusahaan.home', ['message' => 'Anda sudah login.']);
            }
        }
    
        return $next($request);
    }
}
