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

Route::post('/medicaments/{id}/prendre', [MedicamentController::class, 'prendre'])->name('medicaments.prendre');

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
        Route::get('/dashboardAdmin', [MedicamentController::class, 'dashboardAdmin'])->name('dashboardAdmin');

        Route::resource('medicaments', MedicamentController::class);


        // Routes pour les messages
        Route::get('/messages/recu', [MessageController::class, 'messageRecu'])->name('messagesRecu');
        Route::get('/messages/envoyer', [MessageController::class, 'formMessage'])->name('formMessage');
        Route::post('/messages/envoyer', [MessageController::class, 'store'])->name('messages.store');

        // Admin
        Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages');
        Route::post('/admin/messages/{message}/repondre', [MessageController::class, 'repondre'])->name('messages.repondre');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');


    });
});
