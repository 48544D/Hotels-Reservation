<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\UserController;
use App\Models\Hotel;

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
    return view('index', ['hotels' => Hotel::latest()->filter(request(['search']))->paginate(6)]);
});

// Create hotel
Route::get('/hotels/create', [HotelController::class, 'create'])->middleware('auth:admin');


// Add hotel to DB
Route::post('/hotels', [HotelController::class, 'store'])->middleware('auth:admin');

// Show all hotels
Route::get('/hotels', [HotelController::class, 'index']);

// Add room to hotel
Route::post('/rooms/add', [RoomController::class, 'add'])->middleware('auth:admin');

// Get route for roooms
Route::get('/rooms/add', [RoomController::class, 'check'])->middleware('auth:admin');

// Login page
Route::get('/login', [UserController::class, 'login'])->middleware('guest');

// Auth the user
Route::post('/login', [UserController::class, 'auth'])->middleware('guest');

// Register page
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// Create new user
Route::post('/register', [UserController::class, 'create'])->middleware('guest');;

// Logout the user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');;