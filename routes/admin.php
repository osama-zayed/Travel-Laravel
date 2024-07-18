<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TestController;
use \App\Http\Controllers\Admin\NewsController;
use \App\Http\Controllers\Admin\PlaneController;
use \App\Http\Controllers\Admin\AirlineController;
use \App\Http\Controllers\Admin\AirportController;
use \App\Http\Controllers\Admin\FlightController;
use \App\Http\Controllers\Admin\ReservationController;
use \App\Http\Controllers\Admin\RouteController;

//Route::middleware('auth', 'checkAdmin')->group(function (){


Route::get('/dashboard' ,function (){ return view('admin.home');} )->name('home');


Auth::routes();

//logout
//Route::post('/logout', \App\Http\Controllers\Auth\LoginController::class, 'logout' )->name('logout');


// News
Route::resource('news_1', \App\Http\Controllers\Admin\NewsController::class);

// Planes
Route::resource('plane_1', \App\Http\Controllers\Admin\PlaneController::class);

// Airport
Route::resource('airport_1', \App\Http\Controllers\Admin\AirportController::class);


// Route
Route::resource('route_1', \App\Http\Controllers\Admin\RouteController::class);

// Flight
Route::resource('flight_1', \App\Http\Controllers\Admin\FlightController::class);

// Reservation
Route::resource('reservation_1', \App\Http\Controllers\Admin\ReservationController::class);

//الصلاحيات
//Route::resource('', \App\Http\Controllers\Admin\::class );


//التقارير
//Route::resource('', \App\Http\Controllers\Admin\::class );

//التذاكر
//Route::resource('', \App\Http\Controllers\Admin\::class );
//});
