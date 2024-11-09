<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Beasiswa;

class BeasiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil data beasiswa terbaru
        $beasiswaa = Beasiswa::latest()->first();

        // Bagikan data ke view
        view()->share('beasiswaa', $beasiswaa);

        return $next($request);
    }
}