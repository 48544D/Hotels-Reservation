<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;

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

// Storage link
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});


Route::get('/', function () {
    return view('index');
});

// Create hotel
Route::get('/hotels/create', [HotelController::class, 'create']);


// Add hotel to DB
Route::post('/hotels', [HotelController::class, 'store']);

// Show all hotels
Route::get('/hotels', [HotelController::class, 'index']);

// Add room to hotel
Route::post('/rooms/add', [RoomController::class, 'add']);

// Get route for roooms
Route::get('/rooms/add', [RoomController::class, 'check']);

