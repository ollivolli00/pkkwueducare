<?php

use App\Http\Controllers\Auth\PerusahaansignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\PerusahaanController;
use App\Http\Controllers\BeasiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('beasiswa', BeasiswaController::class);
Auth::routes();
Route::middleware(['auth', 'multiAuthUser:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard');
});
 
// Super Admin Routes
Route::middleware(['auth', 'multiAuthUser:admin'])->group(function () {
  
    Route::get('/admin/dashboard', [HomeController::class, 'AdminDashboard'])->name('admin');
});  
Route::middleware(['auth', 'perusahaan'])->group(function () {
    Route::get('/dashboard', [PerusahaanController::class, 'dashboard'])->name('perusahaan.dashboard');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profil', function () {
    return view('profil');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/djarum', function () {
    return view('isikonten1');
});
Route::get('/bca', function () {
    return view('isikonten4');
});
Route::get('/lpdp', function () {
    return view('isikonten2');
});
Route::get('/unggulan', function () {
    return view('isikonten3');
});
Route::get('/dashboard', function () {
    return view('perusahaan.home');
});
Route::get('/applist-1', function () {
    return view('perusahaan.applist1');
})->name('applist-1');
Route::get('/applist-2', function () {
    return view('perusahaan.applist2');
})->name('applist-2');
Route::get('/uplist', function () {
    return view('perusahaan.uplist');
})->name('uplist');
Route::get('/applistup', function () {
    return view('perusahaan.aplistup');
});

Route::get('/signup', [PerusahaansignController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [PerusahaansignController::class, 'create'])->name('signup.post');
Route::get('/signin', [PerusahaanController::class, 'showLoginForm'])->name('loginn');
Route::post('/signin', [PerusahaanController::class, 'loginn'])->name('loginn.post');

// Route::middleware(['auth', 'multiAuthUser:2'])->group(function () {
//     Route::get('/dashboard', [PerusahaanController::class, 'dashboard'])->name('dashboard');
// });



