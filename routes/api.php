<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HotelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// TODO protect routes api token just for admin
Route::get('hoteles',[HotelController::class, 'hotels']);
Route::post('hotel',[HotelController::class, 'store']);
Route::get('hotel',[HotelController::class, 'index']);
Route::delete('hotel/{id}',[HotelController::class,'delete']);
Route::put('hotel/{id}',[HotelController::class, 'edit']);

//Route::post('hotel','HotelController@store');