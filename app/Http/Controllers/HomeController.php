<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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
        // Mengambil pengguna yang sedang login
        $perusahaan = Auth::user(); // Ambil data pengguna yang sedang login

        return view('perusahaan.home', compact('perusahaan')); // Kirim data pengguna ke view
    }
}
