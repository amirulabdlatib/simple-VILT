<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::inertia('/register','Auth/Register')->name('register');

Route::get('/login',function(){
    return Inertia::render('Auth/Login');
})->name('login');

// Alternative 
// Route::inertia('/about','About',['user' => 'Mike']);