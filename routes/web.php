<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Client\PostController;
use Illuminate\Support\Facades\Route;

// Client:
Route::get('/',                                     [PostController::class, 'index'])->name('client.home');
Route::get('/categories/{id}',                      [PostController::class, 'categories'])->name('client.category');
Route::get('/show/{id}',                            [PostController::class, 'show'])->name('client.show');

// Admin:
Route::get('admin/dashboard',                       [DashboardController::class, 'index'])->name('admin.dashboard');

// Admin - Posts - Category:
Route::get('admin/categories',                      [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('admin/categories/create',               [CategoryController::class, 'create'])->name('admin.categories.create');
Route::get('admin/categories/update/{id}',          [CategoryController::class, 'update'])->name('admin.categories.update');
Route::get('admin/categories/show/{id}',            [CategoryController::class, 'show'])->name('admin.categories.show');

// Admin - Posts:
Route::get('admin/posts',                           [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::get('admin/posts/create',                    [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::get('admin/posts/update/{id}',               [AdminPostController::class, 'update'])->name('admin.posts.update');
Route::get('admin/posts/show/{id}',                 [AdminPostController::class, 'show'])->name('admin.posts.show');

// Admin - Users:
Route::get('admin/users',                           [AdminPostController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create',                    [AdminPostController::class, 'create'])->name('admin.users.create');
Route::get('admin/users/update/{id}',               [AdminPostController::class, 'update'])->name('admin.users.update');
Route::get('admin/users/show/{id}',                 [AdminPostController::class, 'show'])->name('admin.users.show');

// Route::get('/', PostController::class .'@index')->name('posts.index');