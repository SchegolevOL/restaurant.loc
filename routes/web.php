<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function (){
    Route::resource('menus',\App\Http\Controllers\admin\MenuController::class);
    Route::resource('chiefs',\App\Http\Controllers\admin\ChiefController::class);
    Route::resource('testimonials',\App\Http\Controllers\admin\TestimonialController::class);
    Route::resource('bookings',\App\Http\Controllers\admin\BookingController::class);
    Route::resource('users', \App\Http\Controllers\admin\UserController::class);
    Route::resource('types',\App\Http\Controllers\admin\TypeController::class);
    Route::resource('designations',\App\Http\Controllers\admin\DesignationController::class);
});
Route::resource('resister', \App\Http\Controllers\admin\RegisterController::class);
