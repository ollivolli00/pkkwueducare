<?php

use App\Http\Controllers\Auth\PerusahaansignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserBeasiswaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\Auth\PerusahaanController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('beasiswa', BeasiswaController::class);
Auth::routes();
Route::middleware(['auth', 'multiAuthUser :admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'AdminDashboard'])->name('admin');
});
Route::middleware(['auth', 'multiAuthUser :user'])->group(function () {
    Route::get('/home', [HomeController::class, 'dashboard'])->name('user');
    
Route::resource('pengguna', PenggunaController::class);
});
Route::middleware(['auth:perusahaan', 'perusahaan'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'PerusahaanDashboard'])->name('dashboard');
    Route::get('/applicants-list', [UserBeasiswaController::class, 'applicantsList'])->name('applist-1');
    Route::get('/applicants-list/{id}/status', [UserBeasiswaController::class, 'ubahStatus'])->name('ubahStatus');

    Route::get('/download-pdf', [BeasiswaController::class, 'downloadPDF'])->name('download.pdf');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/riwayat-pendaftaran', [HomeController::class, 'showDaftar'])->name('riwayat');
Route::get('/about', function () {
    return view('about');
})->name('about'); // Menambahkan nama pada rute

Route::get('/data-users', [AdminController::class, 'showDataUsers'])->name('datauser');
Route::get('/data-perusahaan', [AdminController::class, 'showDataPerusahaan'])->name('dataperusahaan');
Route::get('/manage-beasiswas', function () {
    return view('admin.manage');
})->name('manage');
// In routes/web.php

Route::get('uplist', [BeasiswaController::class, 'index'])->name('beasiswa.index');

Route::get('/applicants/pdf', [UserBeasiswaController::class, 'generatePDF'])->name('applicants.pdf');
Route::get('/beasiswa/{id}', [BeasiswaController::class, 'show'])->name('beasiswa.show');
Route::post('/beasiswa/{id}', [BeasiswaController::class, 'publish'])->name('beasiswa.publish');
Route::post('/beasiswa/{id}/unpublish', [BeasiswaController::class, 'unpublish'])->name('beasiswa.unpublish');
Route::get('/home', [UserBeasiswaController::class, 'indexx'])->name('beasiswa.indexx');
Route::resource('beasiswaa', UserBeasiswaController::class);
Route::post('/beasiswa/{beasiswaId}/daftar', [UserBeasiswaController::class, 'store'])->name('beasiswaa.store');

Route::get('/', [UserBeasiswaController::class, 'index'])->middleware('beasiswa');

Route::get('/beasiswa-lebih-banyak', [UserBeasiswaController::class, 'index1'])->middleware('beasiswa');
Route::get('/daftarbeasiswa/{id}', [UserBeasiswaController::class, 'show'])->name('beasiswaa.show');

// Route::get('/', [UserBeasiswaController::class, 'index'])->name('user.index');

Route::get('/signup', [PerusahaansignController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [PerusahaansignController::class, 'create'])->name('signup.post');
Route::get('/signin',[PerusahaanController::class, 'showLoginForm'])->name('signin');
Route::post('/signin', [PerusahaanController::class, 'loginn'])->name('signin.post');

Route::get('/applicant-list/download', [UserBeasiswaController::class, 'downloadPdf'])->name('applicant.downloadPdf');

Route::get('/search', [SearchController::class, 'index'])->name('search');