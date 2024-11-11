<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Perusahaansign;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
{
    $input = $request->all();

    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Cek di tabel user
    if (auth()->attempt(['email' => $input['email'], 'password' => $input['password']])) {
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin');
        } elseif (auth()->user()->type == 'perusahaan') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('user');
        }
    }

    // Jika tidak ada di tabel user, cek di tabel perusahaansign
    $perusahaan = Perusahaansign::where('email', $input['email'])->first();
    if ($perusahaan && Hash::check($input['password'], $perusahaan->password)) {
        // Gunakan guard perusahaan untuk login
        auth()->guard('perusahaan')->login($perusahaan);
        return redirect()->route('dashboard'); // Arahkan ke halaman perusahaan
    }

    return redirect()->route('login')->with('error', 'Email-Address And Password Are Wrong.');
}

   
}