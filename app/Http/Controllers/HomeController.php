<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.admin');
    }
    public function PerusahaanDashboard()
    {
        // Mengambil pengguna yang sedang login
        $perusahaan = Auth::user(); // Ambil data pengguna yang sedang login

        return view('perusahaan.home', compact('perusahaan')); // Kirim data pengguna ke view
    }
}
