<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PerusahaanMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $perusahaan = $user->perusahaan; // Ambil data perusahaan terkait

            if (!$perusahaan) {
                return redirect()->back()->with('error', 'Data perusahaan tidak ditemukan.');
            }

            // Menyimpan data perusahaan ke dalam request agar bisa diakses di controller
            $request->attributes->set('perusahaan', $perusahaan);
        } else {
            return redirect()->route('auth.loginp'); // Ganti dengan route login Anda
        }

        return $next($request);
    }
}