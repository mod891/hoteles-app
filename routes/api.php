<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReservaController;

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
Route::get('hotel',[HotelController::class, 'index']);
Route::get('hoteles',[HotelController::class, 'hotels']);
Route::post('hotel',[HotelController::class, 'store']);
Route::delete('hotel/{id}',[HotelController::class,'delete']);
Route::put('hotel/{id}',[HotelController::class, 'edit']);

Route::post('room',[RoomController::class, 'store']);
Route::post('rooms',[RoomController::class, 'rooms']);
Route::post('toogleFavorito',[RoomController::class, 'toogleFavorito']);
Route::get('favorito',[RoomController::class, 'favorito']);
Route::get('favoritos',[RoomController::class, 'favoritosList']);

Route::get('user',[UserController::class,'index']);
Route::get('usuarios',[UserController::class,'users']);
Route::post('user',[UserController::class,'store']);
Route::delete('user/{id}',[UserController::class,'delete']);
Route::put('user/{id}',[UserController::class,'edit']);

Route::post('reserva', [ReservaController::class,'store']);
Route::get('reservas',[ReservaController::class, 'reservedList']);
Route::get('visitados',[ReservaController::class, 'visitedList']);
