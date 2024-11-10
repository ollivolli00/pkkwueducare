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
            // Cek apakah rute yang diminta adalah /signin
            if ($request->is('signin')) {
                // Jika sudah terautentikasi dan mencoba mengakses /signin, redirect ke dashboard
                return redirect()->route('dashboard'); // Ganti dengan rute dashboard Anda
            }

            // Jika pengguna sudah terautentikasi, ambil data perusahaan
            $user = Auth::guard('perusahaan')->user();
            $perusahaan = $user->perusahaan; // Ambil data perusahaan terkait

            if (!$perusahaan) {
                return redirect()->back()->with('error', 'Data perusahaan tidak ditemukan.');
            }

            // Menyimpan data perusahaan ke dalam request agar bisa diakses di controller
            $request->attributes->set('perusahaan', $perusahaan);
        }

        return $next($request);
    }
}