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
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'namadepan' => ['required', 'string', 'max:255'],
            'namabelakang' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:perusahaansign'],
            'namaperusahaan' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function showSignupForm()
    {
        return view('auth.registerp');
    }
    
    public function create(Request $request)
    {
        $data = $request->all();
        // Validate the data and create a new Perusahaansign
        $this->registerPerusahaan($data); 
        return redirect($this->redirectTo); // Redirect after registration
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
    }}
