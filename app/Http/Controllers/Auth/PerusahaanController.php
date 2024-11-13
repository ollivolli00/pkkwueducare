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
        
            // Cek apakah pengguna sudah terautentikasi
            if (session('perusahaan_logged_in')) {
                // Jika sudah login, arahkan ke halaman dashboard
                return redirect()->route('dashboard');
            }
        
            // Jika belum login, tampilkan form login
            return view('auth.loginp'); // Pastikan ini adalah tampilan yang benar untuk form login
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