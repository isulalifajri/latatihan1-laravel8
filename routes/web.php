<?php

use App\Http\Controllers\ContohController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;

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

Route::get('/halo', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class,'index']);
Route::get('/home/show_html', [HomeController::class,'show_html']);
Route::get('/home/belajar_blade', [HomeController::class,'belajar_blade']);
Route::get('/home/penggunaan_layouts', [HomeController::class,'penggunaan_layouts']);

Route::get('/home/contoh', [HomeController::class,'contoh']);
Route::post('/home/contoh', [HomeController::class,'contoh_post']);

// Route::get('/contoh', [ContohController::class,'index']);
// Route::get('/contoh/create', [ContohController::class,'create']);
// Route::post('/contoh/create', [ContohController::class,'store']);

Route::resource('contoh', ContohController::class);

Route::get('/', [PegawaiController::class,'index']);
Route::resource('pegawai', PegawaiController::class);

//penjelasan resource di atas bisa mengakses di bawah ini
    // Route get => pegawai => index
    // Route get => pegawai/create => create
    // Route post => pegawai => store
    // Route get => pegawai/{id} => show
    // Route put => pegawai/{id} => update
    // Route delete => pegawai/{id} => delete
    // Route get => pegawai/{id}/edit => edit
