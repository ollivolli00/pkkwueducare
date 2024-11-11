<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Beasiswa;
use App\Models\Daftar;
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
 // Pastikan pengguna adalah perusahaan yang sudah login
 if (Auth::guard('perusahaan')->check()) {
    $perusahaan = Auth::guard('perusahaan')->user();

    $totalBeasiswa = Beasiswa::count();
    $published = Beasiswa::where('is_published', 1)->count();
    $unpublished = Beasiswa::where('is_published', 0)->count();

    $applicants = Daftar::count();  // Mengambil jumlah perusahaan

    return view('perusahaan.home', compact('totalBeasiswa', 'published', 'unpublished', 'applicants'));
}
return redirect()->route('signin'); // Redirect jika tidak ada pengguna yang login
}

}
