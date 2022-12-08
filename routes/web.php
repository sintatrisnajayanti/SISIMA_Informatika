<?php

use App\Models\Post;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TopikController;
use App\Http\Controllers\DospemController;
use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\BrowsingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchingController;
use App\Http\Controllers\PenjurusanController;
use App\Http\Controllers\DetailSkripsiController;

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
    return view('main', [
        "title" => "Main",
    ]);
});


Route::get('/beranda', [DashboardController::class, 'index'])->middleware('auth'); 

Route::get('/detail/{judul}', [DetailSkripsiController::class, 'detail'])->middleware('auth'); 

Route::get('/penelusuran', [BrowsingController::class, 'browsing'])->middleware('auth'); 

Route::get('/penjurusan', [PenjurusanController::class, 'listPenjurusan'])->name('daftarpenjurusan')->middleware('auth');
Route::get('/penjurusan/{penjurusan}', [PenjurusanController::class, 'detailPenjurusan'])->name('detailpenjurusan')->middleware('auth');

Route::get('/dospem', [DospemController::class, 'listDospem'])->name('daftardospem')->middleware('auth');
Route::get('/dospem/{dosenpembimbing}', [DospemController::class, 'detailDospem'])->name('detaildospem')->middleware('auth');


Route::get('/angkatan', [AngkatanController::class, 'listAngkatan'])->name('daftarangkatan')->middleware('auth');
Route::get('/angkatan/{angkatan}', [AngkatanController::class, 'detailAngkatan'])->name('detailangkatan')->middleware('auth');

Route::get('/topikpermasalahan', [TopikController::class, 'listTopik'])->name('daftartopik')->middleware('auth');
Route::get('/topikpermasalahan/{topikpermasalahan}', [TopikController::class, 'detailTopik'])->name('detailtopik')->middleware('auth');

Route::get('/pencarian', [SearchingController::class, 'index'])->name('dropdownData')->middleware('auth');
Route::post('/pencarian', [SearchingController::class, 'searching'])->name('hasilSearching')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);

Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);