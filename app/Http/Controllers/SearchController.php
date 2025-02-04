<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use App\Models\Data; // Ganti dengan model Anda

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian dari input
        $searchQuery = $request->input('query');
    
        // Cari beasiswa yang sesuai dengan query berdasarkan namabeasiswa dan id
        $beasiswa = Beasiswa::where('namabeasiswa', 'like', '%' . $searchQuery . '%')
                            ->orWhere('id', $searchQuery) // Pencarian berdasarkan ID
                            ->get();
    
        // Kirim hasil pencarian ke view
        return view('search', compact('beasiswa', 'searchQuery'));
    }
    
}
