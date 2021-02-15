<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\FrontendController;


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

Route::resource('/index', FrontendController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Halaman Admin Utama
Route::get('test', function(){
    return view ('home');
});

//Routes Provinsi
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('provinsi', ProvinsiController::class);
});

//Routes Kota
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('kota', KotaController::class);
});

//Routes Kecamatan
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('kecamatan', KecamatanController::class);
});

//Routes Kelurahan
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('kelurahan', KelurahanController::class);
});

// Routes Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Routes RW
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('rw', RwController::class);
});

//Routes Tracking
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('tracking', TrackingController::class);
});

//Route Frontend
Route::get('frontend/index',function(){
    return view('frontend.index');
});