<?php

namespace App\Http\Controllers;

use App\Models\Perusahaansign;
use App\Models\User;
use App\Models\Beasiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDataUsers()
    {
        $users = User::where('type', 0)->get();  // Hanya ambil data user biasa
        return view('admin.datauser', compact('users'));

    }

    public function showDataPerusahaan()
    {
        $perusahaan = Perusahaansign::all(); // Hanya ambil data user biasa
        return view('admin.dataperusahaan', compact('perusahaan'));

    }
    public function showBeasiswa()
{
    $beasiswas = Beasiswa::with('loginPerusahaan')->get(); // Mengambil data beasiswa beserta data perusahaan

    return view('admin.datauser', compact('beasiswas'));
}

}