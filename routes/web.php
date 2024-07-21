<?php

use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Client\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',                                     [PostController::class, 'index'])->name('client.home');
Route::get('/categories/{id}',                      [PostController::class, 'categories'])->name('client.category');
Route::get('/show/{id}',                            [PostController::class, 'show'])->name('client.show');

Route::get('admin/dashboard',                            [AdminPostController::class, 'index'])->name('admin.dashboard');

// Route::get('/', PostController::class .'@index')->name('posts.index');