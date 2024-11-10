<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MultiAuthUser  
{
    public function handle(Request $request, Closure $next, ...$userTypes)
    {
        // Pastikan pengguna terautentikasi
        if (!auth()->check()) {
            return redirect('/signin'); // Redirect ke halaman login jika belum login
        }

        // Periksa apakah tipe pengguna ada dalam daftar yang diizinkan
        if (in_array(auth()->user()->type, $userTypes)) {
            return $next($request);
        }

        return response()->json(['message' => 'You do not have permission to access this page.'], 403);
    }
}