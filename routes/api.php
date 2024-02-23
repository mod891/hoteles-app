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

Route::post('hotels',[HotelController::class, 'hotelsList']);
Route::get('favorito',[HotelController::class, 'favorito']);
Route::post('toogleFavorito',[HotelController::class, 'toogleFavorito']);

Route::delete('hotel/{id}',[HotelController::class,'delete']);
Route::put('hotel/{id}',[HotelController::class, 'edit']);
Route::get('favoritos',[HotelController::class, 'favoritosList']);
Route::get('provincias',[HotelController::class, 'provincias']);

Route::post('room',[RoomController::class, 'store']);
Route::post('rooms',[RoomController::class, 'rooms']);

Route::get('user',[UserController::class,'index']);
Route::get('usuarios',[UserController::class,'users']);
Route::post('user',[UserController::class,'store']);
Route::delete('user/{id}',[UserController::class,'delete']);
Route::put('user/{id}',[UserController::class,'edit']);

Route::post('reserva', [ReservaController::class,'store']);
Route::get('reservas',[ReservaController::class, 'reservedList']);
//Route::get('reserva/dias',[ReservaController::class, 'reservedDays']);
Route::get('visitados',[ReservaController::class, 'visitedList']);
Route::get('reserva/pdf',[ReservaController::class, 'pdf']);
