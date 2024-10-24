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
        $this->middleware('auth')->only('logout');
    }
    public function showLoginForm()
    {
        return view('auth.loginp');
    }
    
    public function dashboard()
    {
        return view('perusahaan.home');
    }
    public function loginn(Request $request)
{
    $emailperusahaan = $request->input('emailperusahaan');
    $password = $request->input('password');

    // Tambahkan debug di sini
    dd($emailperusahaan, $password);

    $user = Perusahaansign::where('emailperusahaan', $emailperusahaan)->first();

    if ($user && Hash::check($password, $user->password)) {
        Auth::login($user);
        dd('Logged in successfully:', auth()->user()); // Cek user yang sedang login
        return redirect()->route('home');
    }
    
    return $this->sendFailedLoginResponse($request);
}

    protected function attemptLogin(Request $request)
    {
        $emailperusahaan = $request->input('emailperusahaan');
        $password = $request->input('password');

        $user = Perusahaansign::where('emailperusahaan', $emailperusahaan)->first();

        if (!$emailperusahaan || !Hash::check($password, $emailperusahaan->password)) {
            return false;
        }

        $this->guard()->login($user);

        return true;
    }
}