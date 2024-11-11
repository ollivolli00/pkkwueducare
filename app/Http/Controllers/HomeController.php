<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
            $perusahaan = Auth::guard('perusahaan')->user(); // Ambil pengguna yang terautentikasi
    
            // Log informasi pengguna
            Log::info('User   ID: ' . $perusahaan->id);
    
            // Mengambil data beasiswa terkait perusahaan
            $beasiswaRecords = $perusahaan->beasiswa; // Ambil semua beasiswa yang terkait dengan perusahaan
    
            // Cek apakah ada beasiswa yang terkait
            if ($beasiswaRecords->isNotEmpty()) {
                // Ambil company_id dari beasiswa pertama (atau sesuaikan logika sesuai kebutuhan)
                $company_id = $beasiswaRecords->first()->company_id; // Ambil company_id dari beasiswa pertama
                
                // Mengambil data statistik berdasarkan company_id
                $totalBeasiswa = Beasiswa::where('company_id', $company_id)->count();
                $published = Beasiswa::where('company_id', $company_id)->where('is_published', 1)->count();
                $unpublished = Beasiswa::where('company_id', $company_id)->where('is_published', 0)->count();
    
                // Log hasil
                Log::info('Company ID from Beasiswa: ' . $company_id);
                Log::info('Total Beasiswa: ' . $totalBeasiswa);
                Log::info('Published Beasiswa: ' . $published);
                Log::info('Unpublished Beasiswa: ' . $unpublished);
    
                // Kirim data ke view
                return view('perusahaan.home', compact('totalBeasiswa', 'published', 'unpublished', 'company_id'));
            } else {
                Log::warning('No Beasiswa records found for the authenticated perusahaan.');
                // Handle case where no beasiswa records exist
                return view('perusahaan.home', compact('company_id')); // You may want to show a message or handle this case
            }
        }
    
        // Jika tidak ada pengguna yang login, redirect ke halaman signin
        Log::info('User  not authenticated, redirecting to signin');
        return redirect()->route('signin');
    }
}
