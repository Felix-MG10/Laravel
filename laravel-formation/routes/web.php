<?php

use App\Http\Controllers\ArticleControllers;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/acceuil', [ArticleControllers::class,'index'])->name('acceuil');

Route::middleware('guest')->group(function(){
    Route::get('register',[UserController::class,'register'])->name('registration');
    Route::post('register', [UserController::class,'handleRegistration'])->name('registration');
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'handleLogin'])->name('login');
});


Route::middleware('auth')->group(function(){ // verification qu'un utilisateur est deja connecte pour avoir access a toutes ces routes
    Route::prefix('articles')->group(function(){
        Route:: post('/', [ArticleControllers::class,'store'])->name('articles');
        Route::get('/{id}',[ArticleControllers::class,'show'])->name('articles.show')->withoutMiddleware('auth');
        Route::get('/{id}/edit', [ArticleControllers::class,'edit'])->name('articles.edit');
        Route::put('/{id}/update',[ArticleControllers::class,'update'])->name('articles.update');
        Route::delete('/{id}/delete',[ArticleControllers::class,'delete'])->name('articles.delete');

        //Les name permettent de renommer les routes
    });
    Route::get('home',[UserController::class,'dashboard']);
});

Route::get('/mine', [ArticleControllers::class,'mine'])->name('articles.mine');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

