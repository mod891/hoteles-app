<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('/', [LandingController::class, 'index'])->name('landingPage');
    Route::get('/login', [AuthController::class, 'index'])->name('login');

    Route::get('/inicio', [LandingController::class, 'inicio'])->name('user.inicio')->middleware('auth');

    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('auth');

    Route::get('/hotel/create', [HotelController::class, 'createForm'])->name('admin.hotel.new')->middleware('auth');
    Route::get('/hotel/edit/{id}', [HotelController::class, 'editForm'])->name('admin.hotel.edit')->middleware('auth');
    Route::get('/hotel/{id}', [HotelController::class, 'ficha'])->name('user.fichaHotel')->middleware('auth'); // 
    Route::get('/favoritos', [HotelController::class, 'favoritos'])->name('user.favoritos')->middleware('auth');

    Route::get('/room/create/{id}', [RoomController::class, 'createForm'])->name('admin.room.new')->middleware('auth');

    Route::get('/register', [UserController::class, 'registerForm'])->name('register');
    Route::get('/user/create', [UserController::class, 'createForm'])->name('admin.user.new')->middleware('auth');
    Route::get('/user/edit/{id}', [UserController::class, 'editForm'])->name('admin.user.edit')->middleware('auth');

    Route::get('/reservas', [ReservaController::class, 'reservas'])->name('user.reservas')->middleware('auth');
    Route::get('/visitados', [ReservaController::class, 'visitados'])->name('user.visitados')->middleware('auth');
    Route::get('reserva/{id}/pdf',[ReservaController::class, 'pdf']);

 
