<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->group(function() {

  
  Route::get('/dashboard', [HomeController::class, 'index'])->name('beranda');
  Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

  Route::group(['prefix' => 'produk', 'as' => 'produk.'], function () {
    Route::get('', [ProdukController::class, 'index'])->name('index');
    Route::get('/chart', [ProdukController::class, 'chart'])->name('chart');
  });

  Route::group(['prefix' => 'transaksi', 'as' => 'transaksi.'], function(){
    Route::get('', [TransaksiController::class, 'index'])->name('index');
    Route::get('/chart', [TransaksiController::class, 'chart'])->name('chart');
  });

});

Route::middleware('auth', 'level')->group(function() {
  Route::get('/user', [HomeController::class, 'user'])->name('user');
  Route::get('/admin', [HomeController::class, 'admin'])->name('admin');
});

require __DIR__.'/auth.php';
