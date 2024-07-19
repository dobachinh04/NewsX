<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',                                     [PostController::class, 'index'])->name('client.home');
Route::get('/categories',                           [PostController::class, 'index'])->name('client.home');
Route::get('/{id}/show',                            [PostController::class, 'index'])->name('client.home');

// Route::get('/', PostController::class .'@index')->name('posts.index');

// Route::get('/posts/create', PostController::class . '@create')->name('posts.create');

// Route::post('/posts', PostController::class . '@store')->name('posts.store');

// Route::get('/posts/{post}', PostController::class . '@show')->name('posts.show');

// Route::get('/posts/{post}/edit', PostController::class . '@edit')->name('posts.edit');

// Route::put('/posts/{post}', PostController::class . '@update')->name('posts.update');

// Route::delete('/posts/{post}', PostController::class . '@destroy')->name('posts.destroy');