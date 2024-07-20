<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',                                     [PostController::class, 'index'])->name('client.home');
Route::get('/categories/{id}',                      [PostController::class, 'categories'])->name('client.category');
Route::get('/show/{id}',                            [PostController::class, 'show'])->name('client.show');

// Route::get('/', PostController::class .'@index')->name('posts.index');