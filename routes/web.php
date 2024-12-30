<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\formateurController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\GroupeController;



Route::get('/', function () {
    return view('layout');
});
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('formateurs', formateurController::class);
Route::resource('filieres', FiliereController::class);
Route::resource('groupes', GroupeController::class);

