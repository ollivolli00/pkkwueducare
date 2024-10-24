<?php
  
// app/Http/Middleware/MultiAuthUser.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MultiAuthUser
{  
    public function handle(Request $request, Closure $next, $userType)
{
    // // Pastikan pengguna terautentikasi
    // if (!auth()->check()) {
    //     return redirect('/signin'); // Redirect ke halaman login jika belum login
    // }

    // Periksa tipe pengguna
    if (auth()->user()->type == $userType) {
        return $next($request);
    }

    return response()->json(['message' => 'You do not have permission to access this page.'], 403);
}

    
}
