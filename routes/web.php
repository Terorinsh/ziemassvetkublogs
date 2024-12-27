<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\PostAdminController;

// Dashboard for authenticated users
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/', [PostController::class, 'index'])->name('posts.index');

require __DIR__.'/auth.php';


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts', [PostAdminController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/{post}/edit', [PostAdminController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [PostAdminController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostAdminController::class, 'destroy'])->name('admin.posts.destroy');
    Route::post('/admin/posts/{post}/toggle', [PostAdminController::class, 'toggleStatus'])->name('admin.posts.toggle');
});
