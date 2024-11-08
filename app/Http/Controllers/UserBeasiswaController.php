<?php

namespace App\Http\Controllers;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class UserBeasiswaController extends Controller
{
    public function index()
    {
        // Mengambil hanya beasiswa yang sudah dipublikasikan
        $beasiswa = Beasiswa::where('is_published', true)->get();
    
        // Mengirimkan data beasiswa ke view
        return view('welcome', compact('beasiswa'));
    }
    

    
}
