<?php

use App\Models\User;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ReservationController;

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
})->name('home');

// Hotels
Route::prefix('hotels')->controller(HotelController::class)->group(function() {
    // Create hotel
    Route::get('/create', 'create')->middleware('admin');
    // Add hotel to DB
    Route::post('/', 'store')->middleware('admin');

    // Show all hotels
    Route::get('/', 'index');

    // Show a hotel
    Route::get('/{hotel}', 'show');
});


// Rooms
Route::prefix('rooms')->controller(RoomController::class)->group(function() {
    // Add room to hotel
    Route::post('/add', 'add')->middleware('admin');

    // Get route for roooms
    Route::get('/add', 'check')->middleware('admin');

    // Choose rooms for reservation
    Route::post('/types', 'choose')->middleware('client');
});


// User
Route::controller(UserController::class)->group(function () {
    // Login page
    Route::get('/login', 'login')->middleware('guest');

    // Login the user
    Route::post('/login', 'auth')->middleware('guest');

    // Register page
    Route::get('/register', 'register')->middleware('guest');

    // Regsiter a new user
    Route::post('/register', 'create')->middleware('guest');

    // Logout the user
    Route::post('/logout', 'logout')->middleware('auth');

    // Dashboard client
    Route::get('/dashboard', 'dashboard')->middleware('client');

    // Dashboard admin
    Route::get('/adminDashboard', 'adminDashboard')->middleware('admin');
});

// Reservation
Route::prefix('reservations')->controller(ReservationController::class)->group(function () {
    // create a reservation
    Route::post('/create', 'create')->middleware('client');
});