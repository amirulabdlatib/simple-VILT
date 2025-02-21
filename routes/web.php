<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {

    $users = User::paginate(10);
    return Inertia::render('Home',['users'=> $users]);
})->name('home');


Route::middleware(['guest'])->group(function(){
    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register',[AuthController::class,'register']);
    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login',[AuthController::class, 'login']);
});
   
Route::middleware(['auth'])->group(function(){
    Route::inertia('/dashboard','Dashboard')->name('dashboard');
    Route::resource('/tasks',TaskController::class);
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});