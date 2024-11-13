<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Perusahaansign;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
    // Validate the incoming request data
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Log the login attempt
    Log::info('Login attempt for email: ' . $request->email);

    // Attempt to authenticate the user from the users table
    if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Log user ID
        Log::info('User  ID: ' . $user->id);

        // Check the user type and handle accordingly
        if ($user->type == 'admin') {
            return redirect()->route('admin'); // Redirect to admin route
        } elseif ($user->type == 'perusahaan') {
           
            return redirect()->route('dashboard'); // Replace with your actual route
        } else {
            // Handle other user types if necessary
            return redirect()->route('user'); // Redirect to default dashboard
        }
    } else {
       
        // Check if the email exists in the perusahaansign table
        $perusahaan = Perusahaansign::where('email', $request->email)->first();
        if ($perusahaan && Hash::check($request->password, $perusahaan->password)) {
            // Use the perusahaan guard to log in
            auth()->guard('perusahaan')->login($perusahaan);
            
            return redirect()->route('dashboard'); // Redirect to perusahaan dashboard
        }

        // If both attempts fail, redirect back with an error
        return redirect ()->back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }
}

   
}