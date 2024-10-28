<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Perusahaansign;

class PerusahaanController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.loginp');
    }
    
    public function dashboard(Request $request, string $id)
    {
        // Pastikan pengguna adalah perusahaan yang sudah login
        if (Auth::guard('perusahaan')->check()) {
            $perusahaan = Auth::guard('perusahaan')->user(); // Ambil data pengguna perusahaan yang login

            // Ambil data perusahaan berdasarkan ID
            $dataPerusahaan = Perusahaansign::findOrFail($id); // Pastikan ID perusahaan sesuai

            return view('perusahaan.home', compact('dataPerusahaan'));
        }

        return redirect()->route('login'); // Redirect jika tidak ada pengguna yang login
    }

    public function loginn(Request $request)
    {
        $this->validate($request, [
            'emailperusahaan' => 'required|email',
            'password' => 'required',
        ]);

        // Mencari user berdasarkan email
        $user = Perusahaansign::where('emailperusahaan', $request->input('emailperusahaan'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            return redirect()->intended($this->redirectTo); // Arahkan ke dashboard
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withErrors(['emailperusahaan' => 'These credentials do not match our records.'])
            ->withInput($request->only('emailperusahaan'));
    }
}
