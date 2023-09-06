<?php

use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/',[LoginController::class,'handleLogin'])->name('handleLogin');

Route::get('/inscription',[RegisterController::class,'register'])->name('register');
Route::post('/inscription',[RegisterController::class,'handleRegister'])->name('handleRegister');



//Route securisee

