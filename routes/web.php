<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicamentController;

// Page d’accueil (welcome)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentification
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CRUD Médicaments (protégé par auth)
Route::middleware('auth')->group(function () {
    Route::resource('medicaments', MedicamentController::class);
});
