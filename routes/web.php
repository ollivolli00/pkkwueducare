<?php

use App\Http\Controllers\Auth\PerusahaansignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserBeasiswaController;
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
  
    Route::get('/home', [HomeController::class, 'index'])->name('user')->middleware('beasiswa');
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
Route::get('/beasiswa', function () {
    return view('beasiswa');
})->name('beasiswa');

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
})->name('dashboard');

Route::get('/applist-1', function () {
    return view('perusahaan.applist1');
})->name('applist-1');
Route::get('/applist-2', function () {
    return view('perusahaan.applist2');
})->name('applist-2');
Route::get('uplist', [BeasiswaController::class, 'index'])->name('beasiswa.index');
// routes/web.php

Route::get('/beasiswa/{id}', [BeasiswaController::class, 'show'])->name('beasiswa.show');
Route::post('/beasiswa/{id}', [BeasiswaController::class, 'publish'])->name('beasiswa.publish');

Route::get('/signup', [PerusahaansignController::class, 'showSignupForm'])->name('signup');

Route::post('/signup', [PerusahaansignController::class, 'create'])->name('signup.post');

Route::get('/signin', [PerusahaanController::class, 'showLoginForm'])->name('loginn');
Route::post('/signinn', [PerusahaanController::class, 'loginn'])->name('loginn.post');
// Route::middleware(['auth', 'multiAuthUser:2'])->group(function () {
//     Route::get('/dashboard', [PerusahaanController::class, 'dashboard'])->name('dashboard');
// });
Route::resource('beasiswaa', UserBeasiswaController::class);
Route::get('/', [UserBeasiswaController::class, 'index'])->middleware('beasiswa');
Route::get('/daftarbeasiswa/{id}', [UserBeasiswaController::class, 'show'])->name('beasiswa.show');
// Route::get('/', [UserBeasiswaController::class, 'index'])->name('user.index');



