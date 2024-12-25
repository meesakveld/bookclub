<?php

use App\Http\Controllers\BookclubController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware('auth')->group(function () {
    // —— Dashboard ——
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // —— Bookclubs ——
    Route::get('/bookclubs', [BookclubController::class, 'index'])->name('bookclubs');
    Route::post('/bookclubs', [BookclubController::class, 'join'])->name('bookclubs.join');
    Route::get('/bookclubs/{id}', [BookclubController::class, 'show'])->name('bookclubs.show');

    // —— Profile ——
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
