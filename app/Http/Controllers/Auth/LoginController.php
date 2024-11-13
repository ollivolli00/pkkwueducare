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

    // Set the redirect path after login
    protected $redirectTo = '/'; // Change this to your home route

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Log the login attempt
        Log::info('Login attempt for email: ' . $request->email);

        // Attempt to authenticate the user from the users table
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Retrieve the authenticated user
            $user = Auth::user();
            Log::info('User  ID: ' . $user->id);

            // Redirect based on user type
            if ($user->type == 'admin') {
                return redirect()->route('admin'); // Redirect to admin route
            } elseif ($user->type == 'perusahaan') {
                return redirect()->route('dashboard'); // Redirect to perusahaan dashboard
            } else {
                return redirect('/'); // Default redirect for other user types
            }
        } else {
            // Check if the email exists in the perusahaansign table
            $perusahaan = Perusahaansign::where('email', $request->email)->first();
            if ($perusahaan && Hash::check($request->password, $perusahaan->password)) {
                // Use the perusahaan guard to log in
                Auth::guard('perusahaan')->login($perusahaan);
                return redirect()->route('dashboard'); // Redirect to perusahaan dashboard
            }

            // If both attempts fail, redirect back with an error
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
        }
    }
}