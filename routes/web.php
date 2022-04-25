<?php

use Illuminate\Support\Facades\Route;

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
    if (Auth::check()) {
        return redirect()->route('home');
        }
        return view('auth.login');
});

Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
    })->name("register");
    
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('instansi', \App\Http\Controllers\InstansiController::class)->middleware('auth');
Route::resource('klasifikasi', \App\Http\Controllers\KlasifikasiController::class)->middleware('auth');
Route::resource('arsip', \App\Http\Controllers\ArsipController::class)->middleware('auth');
Route::get('/arsip/download/{id}',[\App\Http\Controllers\ArsipController::class, 'download'])->name('arsip.download')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
