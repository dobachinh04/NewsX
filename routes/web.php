<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\PostController;
use Illuminate\Support\Facades\Route;

// Client:
Route::get('/',                                     [PostController::class, 'index'])->name('client.home');
Route::get('/categories/{id}',                      [PostController::class, 'categories'])->name('client.category');
Route::get('/show/{id}',                            [PostController::class, 'show'])->name('client.show');
Route::get('/author/{id}',                          [PostController::class, 'show'])->name('client.author');

// Admin:
Route::get('admin/dashboard',                       [DashboardController::class, 'index'])->name('admin.dashboard');

// Admin - Posts - Categories:
Route::prefix('admin/categories')->name('admin.categories.')->group(function() {
    Route::get('/',                                 [CategoryController::class, 'index'])->name('index');
    Route::get('/create',                           [CategoryController::class, 'create'])->name('create');
    Route::post('/',                                [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit',                        [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}',                             [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}',                          [CategoryController::class, 'destroy'])->name('destroy');
});

// Admin - Posts:
Route::get('admin/posts',                           [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::get('admin/posts/create',                    [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::get('admin/posts/update/{id}',               [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::get('admin/posts/show/{id}',                 [AdminPostController::class, 'show'])->name('admin.posts.show');

// Admin - Users:
Route::get('admin/users',                           [UserController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create',                    [UserController::class, 'create'])->name('admin.users.create');
Route::get('admin/users/update/{id}',               [UserController::class, 'update'])->name('admin.users.update');
Route::get('admin/users/show/{id}',                 [UserController::class, 'show'])->name('admin.users.show');

// Route::get('/', PostController::class .'@index')->name('posts.index');
