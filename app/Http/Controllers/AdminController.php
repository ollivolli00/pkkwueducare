<?php

namespace App\Http\Controllers;

use App\Models\Perusahaansign;
use App\Models\User;
use App\Models\Daftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function showDataUsers()
    {
        $users = User::where('type', 0)->paginate(5);  // Hanya ambil data user biasa
        return view('admin.datauser', compact('users'));

    }

    public function showDataPerusahaan()
    {
        $perusahaan = Perusahaansign::with('beasiswas')->paginate(5); // Tampilkan 10 data per halaman
        return view('admin.dataperusahaan', compact('perusahaan'));
    }
    
    public function showPerusahaanWithBeasiswa()
    {
        // Retrieve all companies with their related scholarships
        $perusahaan = Perusahaansign::with('beasiswas')->get();
    
        return view('admin.dataperusahaan', compact('perusahaan'));
    }
  
   
   

}
