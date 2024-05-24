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

Route::get('/', [\App\Http\Controllers\front\FrontController::class, 'home'])->name('home');
Route::get('/booking', [\App\Http\Controllers\front\FrontController::class, 'booking'])->name('booking');
Route::get('/about', [\App\Http\Controllers\front\FrontController::class, 'about'])->name('about');
Route::get('/contact', [\App\Http\Controllers\front\FrontController::class, 'contact'])->name('contact');
Route::get('/menu', [\App\Http\Controllers\front\FrontController::class, 'menu'])->name('menu');
Route::get('/service', [\App\Http\Controllers\front\FrontController::class, 'service'])->name('service');
Route::get('/team', [\App\Http\Controllers\front\FrontController::class, 'team'])->name('team');
Route::get('/testimonial', [\App\Http\Controllers\front\FrontController::class, 'testimonial'])->name('testimonial');
Route::get('/register', [\App\Http\Controllers\user\UserController::class, 'create'])->name('register.create');
Route::get('/login', [\App\Http\Controllers\user\UserController::class, 'loginForm'])->name('register.loginForm');
Route::post('/register', [\App\Http\Controllers\user\UserController::class, 'store'])->name('register.store');
Route::post('/login', [\App\Http\Controllers\user\UserController::class, 'login'])->name('register.login');
Route::get('/logout', [\App\Http\Controllers\user\UserController::class, 'logout'])->name('register.logout');
Route::post('/booking', [\App\Http\Controllers\front\FrontController::class, 'store'])->name('store');


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
