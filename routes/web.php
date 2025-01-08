<?php

use App\Http\Controllers\BookclubController;
use App\Http\Controllers\BookclubPostController;
use App\Http\Controllers\BookController;
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
    Route::get('/bookclubs/{id}', [BookclubController::class, 'show'])->name('bookclubs.show');
    Route::post('/bookclubs/{id}', [BookclubController::class, 'join'])->name('bookclubs.join');


    // —— Bookclubs posts ——
    // Create
    Route::get('/bookclubs/{id}/posts/create', [BookclubPostController::class, 'create'])->name('bookclubs.post.create');
    Route::post('/bookclubs/{id}/posts/create', [BookclubPostController::class, 'store'])->name('bookclubs.post.create.store');

    // Read
    Route::get('/bookclubs/{id}/posts/{bookPostId}', [BookclubPostController::class, 'index'])->name('bookclubs.post');
    Route::delete('/bookclubs/{id}/posts/{bookPostId}', [BookclubPostController::class, 'destroy'])->name('bookclubs.post.destroy');
    
    // Comment
    Route::post('/bookclubs/{id}/posts/{bookPostId}/comment', [BookclubPostController::class, 'comment'])->name('bookclubs.post.comment');
    Route::delete('/bookclubs/{id}/posts/{bookPostId}/comment', [BookclubPostController::class, 'commentDelete'])->name('bookclubs.post.comment.delete');


    // —— Books ——
    Route::get('/books', [BookController::class, 'index'])->name('books');

    // —— Profile ——
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
