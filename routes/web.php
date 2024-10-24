<?php

use App\Http\Controllers\Auth\PerusahaansignController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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
});
Route::get('/applist-2', function () {
    return view('perusahaan.applist2');
});
Route::get('/uplist', function () {
    return view('perusahaan.uplist');
});
Route::get('/applistup', function () {
    return view('perusahaan.aplistup');
});
// Route::get('/dashboard', function () {
//     return view('perusahaan.home')->middleware('auth');
// });
Route::get('/signup', [App\Http\Controllers\Auth\PerusahaansignController::class, 'showSignupForm'])->name('signup');
Route::post('/signup', [App\Http\Controllers\Auth\PerusahaansignController::class, 'create'])->name('signup.post');
Route::get('/signin', 'App\Http\Controllers\Auth\PerusahaanController@showLoginForm')->name('loginn');
Route::post('/signin', 'App\Http\Controllers\Auth\PerusahaanController@loginn')->name('loginn.post');
Route::get('/dashboard', [App\Http\Controllers\Auth\PerusahaanController::class, 'dashboard'])->name('dashboard');