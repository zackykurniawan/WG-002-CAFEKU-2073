<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// route halaman beranda
Route::get('/', [MenuController::class, 'tampil']);

Auth::routes();

Route::middleware(['auth', 'owner'])->group(function () {

    // route halaman user
    Route::resource('user', UserController::class);
    Route::get('deluser/{user}', [UserController::class, 'destroy']);

});

Route::middleware(['auth',])->group(function () {

    // route halaman dashboard
    Route::get('order', [OrderController::class, 'index'])->name('order');
    Route::post('order', [OrderController::class, 'order'])->name('order');

    // route halaman kategori
    Route::resource('kategori', KategoriController::class);
    Route::get('delkategori/{kategori}', [KategoriController::class, 'destroy']);

    // route halaman menu
    Route::resource('menu', MenuController::class);
    Route::get('delmenu/{menu}', [MenuController::class, 'destroy']);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
