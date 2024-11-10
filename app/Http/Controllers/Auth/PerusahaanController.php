<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Perusahaansign;
use App\Models\Beasiswa;

class PerusahaanController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        // Hanya yang sudah login sebagai perusahaan yang bisa mengakses
        $this->middleware('auth:perusahaan')->except('logout'); // Middleware untuk perusahaan yang sudah login
    }

    public function showLoginForm()
    {
        // Jika pengguna sudah terautentikasi, arahkan ke dashboard
        if (Auth::guard('perusahaan')->check()) {
            return redirect()->route('dashboard'); // Redirect ke halaman dashboard
        }
        // Jika belum terautentikasi, tampilkan form login
        return view('auth.loginp');
    }

    public function dashboard(Request $request)
    {
        // Pastikan pengguna adalah perusahaan yang sudah login
        if (Auth::guard('perusahaan')->check()) {
            $perusahaan = Auth::guard('perusahaan')->user(); // Ambil data pengguna perusahaan yang login

            // Ambil data perusahaan berdasarkan ID
            $dataPerusahaan = $perusahaan; // Menggunakan data perusahaan dari pengguna yang login
            $totalPublished = Beasiswa::where('is_published', 1)->count(); // Mengambil jumlah beasiswa yang dipublikasikan
            $totalUnpublished = Beasiswa::where('is_published', 0)->count(); // Mengambil jumlah beasiswa yang belum dipublikasikan
            $totalUploads = Beasiswa::count(); // Mengambil total beasiswa yang diupload

            return view('perusahaan.home', compact('totalPublished', 'totalUnpublished', 'totalUploads', 'dataPerusahaan'));
        }

        return redirect()->route('login'); // Redirect jika tidak ada pengguna yang login
    }

    public function loginn(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencari user berdasarkan email
        $user = Perusahaansign::where('email', $request->input('email'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::guard('perusahaan')->login($user); // Gunakan guard perusahaan
            return redirect()->route('dashboard'); // Pastikan diarahkan ke halaman dashboard perusahaan
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withErrors(['email' => 'These credentials do not match our records. '])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('perusahaan')->logout(); // Logout pengguna perusahaan
        return redirect('/'); // Redirect setelah logout
    }
}