<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\response;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\PlaneController;
use App\Http\Controllers\Api\FlightController;
use App\Http\Controllers\Api\AirportController;
use App\Http\Controllers\Api\PassengerController;
use App\Http\Controllers\Api\RouteController;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Ticket;
use App\Models\Flight;

/*

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('users', [LoginController::class, 'index']);
    Route::apiResources(
        [
            'airport' => AirportController::class,
            'fligt' => FlightController::class,
            'news' => NewsController::class,
            'planes' => PlaneController::class,
            'reservation' => ReservationController::class,
            'route' => RouteController::class,
            'ticket' => TicketController::class,
            'passenger' => PassengerController::class,
        ]);

});

Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);




