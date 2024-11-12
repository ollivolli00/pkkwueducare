<?php

namespace App\Http\Controllers;
use App\Models\Notification; // Pastikan ini adalah model Notification yang Anda buat
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
    public function showPerusahaanWithBeasiswa()
    {
        // Retrieve all companies with their related scholarships
        $perusahaan = Perusahaansign::with('beasiswas')->get();
    
        return view('admin.dataperusahaan', compact('perusahaan'));
    }
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')->take(10)->get(); // Ambil 10 notifikasi terbaru
        return view('admin.admin', compact('notifications'));
    }
}
