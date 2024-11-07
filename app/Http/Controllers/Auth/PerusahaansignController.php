<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Perusahaansign;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PerusahaansignController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'namadepan' => ['required', 'string', 'max:255'],
            'namabelakang' => ['required', 'string', 'max:255'],
            'emailperusahaan' => ['required', 'string', 'email', 'max:255', 'unique:perusahaansigns'],
            'namaperusahaan' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showSignupForm()
    {
        return view('auth.registerp');
    }

    public function create(Request $request)
    {
        // Validasi data sebelum membuat pengguna
        $this->validator($request->all())->validate();

        // Buat pengguna baru
        $this->registerPerusahaan($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('auth.loginp')->with('success', 'Registration successful! Please log in.');
    }

    protected function registerPerusahaan(array $data)
    {
        return Perusahaansign::create([
            'namadepan' => $data['namadepan'],
            'namabelakang' => $data['namabelakang'],
            'emailperusahaan' => $data['emailperusahaan'],
            'namaperusahaan' => $data['namaperusahaan'],
            'password' => Hash::make($data['password']),
        ]);
    }
}