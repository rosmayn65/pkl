<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;

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
// ApiProvinsi
Route::get('provinsi', [ProvinsiController::class, 'index']);
Route::post('provinsi', [ProvinsiController::class, 'store']);
Route::get('provinsi/{id}', [ProvinsiController::class, 'show']);
Route::post('provinsi/update/{id}', [ProvinsiController::class, 'update']);
Route::delete('provinsi/{id}', [ProvinsiController::class, 'destroy']);

//Api Crud Api
Route::get('/api',[ApiController::class,'rw']);
Route::post('/api/store',[ApiController::class,'store']);
Route::get('/api/{id?}',[ApiController::class,'show']);
Route::post('/api/update/{id?}',[ApiController::class,'update']);
Route::delete('/api/{id?}',[ApiController::class,'destroy']);