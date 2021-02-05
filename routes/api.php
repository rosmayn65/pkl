<?php

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

//Api crud provinsi
Route::get('/provinsi',[ProvinsiController::class,'provinsi']);
Route::get('/kota',[ProvinsiController::class,'kota']);
Route::get('/kecamatan',[ProvinsiController::class,'kecamatan']);
Route::get('/kelurahan',[ProvinsiController::class,'kelurahan']);
Route::get('/rw',[ProvinsiController::class,'rw']);
Route::get('/provinsi',[ProvinsiController::class,'index']);
Route::post('/provinsi/store',[ProvinsiController::class,'store']);
Route::get('/provinsi/{id?}',[ProvinsiController::class,'show']);
Route::put('/provinsi/{id?}',[ProvinsiController::class,'update']);
Route::delete('/provinsi/{id?}',[ProvinsiController::class,'destroy']);

//Api Crud Api
Route::get('/api',[ApiController::class,'rw']);
Route::post('/api/store',[ApiController::class,'store']);
Route::get('/api/{id?}',[ApiController::class,'show']);
Route::post('/api/update/{id?}',[ApiController::class,'update']);
Route::delete('/api/{id?}',[ApiController::class,'destroy']);