<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeController;
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


Route::get('/',[AuthController::class,'login'])->name('login');
Route::post('/', [AuthController::class,'handleLogin'])->name('handleLogin');

Route::get('/inscription',[CreateUserController::class,'inscription'])->name('inscription');
Route::post('/inscription', [CreateUserController::class,'handleInscription'])->name('handleInscription');

//Route securisee
Route::middleware('auth')->group(function(){
Route::get('dashboard', [AppController::class,'index'])->name('dashboard');

    Route::prefix('departements')->group(function(){
        Route::get('/',[DepartementController::class,'index'])->name('departement.index');
        Route::get('/create',[DepartementController::class,'create'])->name('departement.create');
        Route::post('/create',[DepartementController::class,'store'])->name('departement.store');
        Route::get('/edit/{departement}',[DepartementController::class,'edit'])->name('departement.edit');
        Route::put('/update/{departement}',[DepartementController::class,'update'])->name('departement.update');
        Route::get('/delete/{departement}',[DepartementController::class,'delete'])->name('departement.delete');

    });

    Route::prefix('employers')->group(function(){
        Route::get('/',[EmployeController::class,'index'])->name('employer.index');
        Route::get('/create',[EmployeController::class,'create'])->name('employer.create');
        Route::get('/edit/{employer}',[EmployeController::class,'edit'])->name('employer.edit');
        Route::get('/{employer}',[EmployeController::class,'delete'])->name('employer.delete');

        //Route d'actions
        Route::post('/store', [EmployeController::class,'store'])->name('employer.store');
        Route::put('/update/{employer}', [EmployeController::class,'update'])->name('employer.update');
        Route::get('/delete/{employer}', [EmployeController::class,'delete'])->name('employer.delete');
    });

    Route::prefix('configurations')->group(function(){
        Route::get('/',[ConfigurationController::class,'index'])->name('configuration');
    });
});
