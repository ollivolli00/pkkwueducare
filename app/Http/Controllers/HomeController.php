<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Perusahaansign;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function AdminDashboard()
    {
        // Mengambil jumlah pengguna yang login
         $totalUsers = User::where('type', 0)->count();// Mengambil jumlah seluruh pengguna
        
        // Mengambil jumlah perusahaan
        $totalPerusahaan = Perusahaansign::count();  // Mengambil jumlah perusahaan

        // Mengirim data ke view
        return view('admin.admin', compact('totalUsers', 'totalPerusahaan'));
    }
    public function PerusahaanDashboard()
    {
        // Hitung total beasiswa yang di-upload
        $totalBeasiswa = Beasiswa::count(); // Menggunakan count() untuk menghitung jumlah beasiswa
    
        // Hitung total beasiswa yang sudah dipublikasikan (is_published = 1)
        $published = Beasiswa::where('is_published', 1)->count(); // Pastikan menggunakan count(), tanpa ?? 0
    
        // Hitung total beasiswa yang belum dipublikasikan (is_published = 0)
        $unpublished = Beasiswa::where('is_published', 0)->count(); // Sama seperti published
    
        // Kirim data ke view
        return view('perusahaan.home', compact('totalBeasiswa', 'published', 'unpublished'));
    }
    
}
