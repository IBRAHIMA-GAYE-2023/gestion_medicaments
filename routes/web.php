<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\MessageController;
use App\Http\Controllers\MessageController;



// Page d’accueil
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentification
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Choisi ici le bon contrôleur

// Routes protégées par authentification
Route::middleware(['auth'])->group(function () {

    // Routes utilisateur
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/infirmerie', [AuthController::class, 'infirmerie'])->name('user.infirmerie');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');

    // Routes admin
    Route::prefix('admin')->group(function () {
        Route::get('/dashboardAdmin', function () {
            return view('admin.dashboardAdmin');
        })->name('dashboardAdmin');

        Route::resource('medicaments', MedicamentController::class);

        // Route::get('/messages', function () {
        //     return view('admin.messages');
        // })->name('messages');


        Route::get('/messages', [MessageController::class, 'index'])->name('messages');
        Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    });
});
