<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDataUsers()
    {
        $users = User::where('type', 0)->get();  // Hanya ambil data user biasa
        return view('admin.datauser', compact('users'));

    }
}
