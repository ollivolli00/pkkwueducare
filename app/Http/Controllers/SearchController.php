<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use App\Models\Data; // Ganti dengan model Anda

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $results = [];

        if ($query) {
            // Mencari beasiswa berdasarkan nama yang sesuai dengan query
            $results = Beasiswa::where('namabeasiswa', 'like', '%' . $query . '%')->get(['id', 'namabeasiswa']);
        }

        return view('welcome', compact('results', 'query'));
    }
}
