<?php

use App\Http\Controllers\Api\LoginController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\TestController;


Route::prefix(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale())->get('/home' ,function (){
    return view('home');
} );


Auth::routes();

//logout
//Route::post('/logout', \App\Http\Controllers\Auth\LoginController::class, 'logout' )->name('logout');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('admin/airport_1/{airport_1}', [App\Http\Controllers\Admin\AirportController::class, 'show'])->name('shot');

//Route::post('admin/news_1/{news_1}', [App\Http\Controllers\NewsController::class, 'update'])->name('admin.news_1.update');
