<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::inertia('/register','Auth/Register')->name('register');
Route::post('/register',[AuthController::class,'register']);

Route::inertia('/login','Auth/Login')->name('login');
Route::post('/login',[AuthController::class, 'login']);

// Alternative 
// Route::inertia('/about','About',['user' => 'Mike']);