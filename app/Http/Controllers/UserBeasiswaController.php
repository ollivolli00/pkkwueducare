<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class UserBeasiswaController extends Controller
{
    public function index()
    {
        // Mengambil hanya beasiswa yang sudah dipublikasikan
        $beasiswaa = Beasiswa::where('is_published', true)->latest()->first();
    
        // Mengirimkan data beasiswa ke view
        return view('welcome', compact('beasiswaa'));
    }
    

    
}
