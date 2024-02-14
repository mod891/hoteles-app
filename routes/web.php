<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;

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
    Route::get('/inicio', [RoomController::class, 'inicio'])->name('user.inicio');

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/hotel/create', [HotelController::class, 'createForm'])->name('admin.hotel.new');
    Route::get('/hotel/edit/{id}', [HotelController::class, 'editForm'])->name('admin.hotel.edit');

    Route::get('/room/create/{id}', [RoomController::class, 'createForm'])->name('admin.room.new');
    Route::get('/room/{id}', [RoomController::class, 'ficha'])->name('user.fichaHabitacion');

    Route::get('/register', [UserController::class, 'registerForm'])->name('register');
    
    Route::get('/user/create', [UserController::class, 'createForm'])->name('admin.user.new');
    Route::get('/user/edit/{id}', [UserController::class, 'editForm'])->name('admin.user.edit');

    //Route::group(['middleware' => ['web']], function () {});
