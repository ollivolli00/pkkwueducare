<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Notification;
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
        $totalUsers = User::where('type', 0)->count(); // Mengambil jumlah seluruh pengguna
        
        // Mengambil jumlah perusahaan
        $totalPerusahaan = Perusahaansign::count();  // Mengambil jumlah perusahaan
    
        // Mengambil 5 data beasiswa terbaru
        $recentBeasiswa = Beasiswa::with('perusahaan')
            ->orderBy('created_at', 'desc')
            ->paginate(5); // Mengambil 5 data per halaman
        
        // Fetching applicants along with their beasiswa and user (pengguna) data
        $recentApplicants = Daftar::with(['beasiswa', 'pengguna']) // Memuat relasi beasiswa dan pengguna
            ->orderBy('created_at', 'desc')
            ->paginate(5); // Paginate results with 5 per page
        
        // Mengirim data ke view
        return view('admin.admin', compact('totalUsers', 'recentBeasiswa', 'totalPerusahaan', 'recentApplicants'));
    }
     

    public function PerusahaanDashboard()
    {
        // Pastikan pengguna adalah perusahaan yang sudah login
        if (Auth::guard('perusahaan')->check()) {
            $perusahaan = Auth::guard('perusahaan')->user(); // Ambil pengguna yang terautentikasi
    
            // Log informasi pengguna
            Log::info('User ID: ' . $perusahaan->id);
    
            // Mengambil data beasiswa terkait perusahaan
            $beasiswaRecords = $perusahaan->beasiswas; // Ambil semua beasiswa yang terkait dengan perusahaan
    
            // Initialize variables
            $company_id = null;
            $totalBeasiswa = 0;
            $published = 0;
            $unpublished = 0;
            $applicants = 0;
            $recentApplicants = collect(); // Inisialisasi dengan koleksi kosong

            // Cek apakah ada beasiswa yang terkait
            if ($beasiswaRecords->isNotEmpty()) {
                // Ambil company_id dari beasiswa pertama
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
                
               // Ambil data pendaftar terbaru berdasarkan company_id dan beasiswa_id
$recentApplicants = Daftar::with(['beasiswa' => function($query) use ($company_id) {
    // Filter beasiswa berdasarkan company_id
    $query->where('company_id', $company_id);
}])
->orderBy('created_at', 'desc')
->take(5)
->get();

  // Menghitung jumlah pendaftar untuk beasiswa yang diupload oleh perusahaan
  $applicants = Daftar::whereHas('beasiswa', function ($query) use ($company_id) {
    $query->where('company_id', $company_id);
})->count();

// Log recent applicants
Log::info('Recent Applicants: ', $recentApplicants->toArray());

                
                // Log recent applicants
                Log::info('Recent Applicants: ', $recentApplicants->toArray());
            } else {
                Log::warning('No Beasiswa records found for the authenticated perusahaan.');
            }
    
            // Kirim data ke view
            return view('perusahaan.home', compact('totalBeasiswa', 'published', 'unpublished', 'company_id', 'recentApplicants', 'applicants'));
        }
    
        // Jika tidak ada pengguna yang login, redirect ke halaman signin
        Log::info('User not authenticated, redirecting to signin');
        return redirect()->route('signin');
    }
    
    public function showDaftar()
{
    $userId = auth()->user()->id;

    $data = Daftar::where('user_id', $userId)
        ->with('beasiswa') // Relasi dengan tabel beasiswa
        ->get();

    return view('riwayat', compact('data'));
}

}
