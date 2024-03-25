<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('guest')->group(function () {
    Route::get('/', [ClientController::class, 'create'])->name('create.profile');
    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
    Route::get('/client/{client}', [ClientController::class, 'show'])->name('client');
    Route::post('/profile/client', [ClientController::class, 'store'])->name('profile.client');
});

// Route::get('/welcome/mail/test', function () {
//     $profile = ['first_name' => 'Omotayo', 'last_name', 'testing@gmail.com'];
//     return new App\Mail\WelcomeEmail($profile);
// });


// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
