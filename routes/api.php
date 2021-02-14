<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/prov',[ApiController::class,'index']);
Route::post('/prov/store',[ProvinsiController::class,'store']);
Route::get('/prov/{id?}',[ProvinsiController::class,'show']);
Route::put('/prov/{id?}',[ProvinsiController::class,'update']);
Route::delete('/prov/{id?}',[ProvinsiController::class,'destroy']);

Route::get('/provinsi',[ApiController::class,'provinsi']);
Route::get('/kota',[ApiController::class,'kota']);
Route::get('/kecamatan',[ApiController::class,'kecamatan']);
Route::get('/kelurahan',[ApiController::class,'kelurahan']);
Route::get('/rw',[ApiController::class,'rw']);
Route::get('/track',[ApiController::class,'track']);
Route::get('/indonesia',[ApiController::class,'indonesia']);
Route::get('/positif',[ApiController::class,'positif']);
Route::get('/sembuh',[ApiController::class,'sembuh']);
Route::get('/meninggal',[ApiController::class,'meninggal']);


// berdasarkan id
Route::get('/sprov/{id}',[ApiController::class,'sprov']);