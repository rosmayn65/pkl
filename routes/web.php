<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\RWController;
use App\Http\Controllers\TrackingController;


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

Route::get('test', function(){
    return view ('home');
});

//admin route
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('provinsi', ProvinsiController::class);
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('kota', KotaController::class);
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('kecamatan', KecamatanController::class);
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('kelurahan', KelurahanController::class);
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('rw', RwController::class);
});
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], function () {
    Route::resource('tracking', TrackingController::class);
});