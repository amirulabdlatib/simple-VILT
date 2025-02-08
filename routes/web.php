<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::inertia('/register','Auth/Register')->name('register');

Route::get('/login',function(){
    return Inertia::render('Auth/Login');
})->name('login');

Route::post('/register',[AuthController::class,'register']);

// Alternative 
// Route::inertia('/about','About',['user' => 'Mike']);