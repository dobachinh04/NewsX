<?php

use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\PostController;
use App\Http\Middleware\AdminMiddleware;

use Illuminate\Support\Facades\Route;

// Client Views:
Route::get('/',                                         [PostController::class, 'index'])->name('client.home');
Route::get('/categories/{id}',                          [PostController::class, 'categories'])->name('client.category');
Route::get('/show/{id}',                                [PostController::class, 'show'])->name('client.show');
Route::get('/author/{id}',                              [PostController::class, 'show'])->name('client.author');

// Client - Login - Register:
// Display View:
Route::get('/login',                                    [AuthenticationController::class, 'displayLogin'])->name('client.login');
Route::get('/register',                                 [AuthenticationController::class, 'displayRegister'])->name('client.register');

// Login & Register:
Route::post('/login',                                   [AuthenticationController::class, 'login']);
Route::post('/register',                                [AuthenticationController::class, 'register']);

// Logout:
Route::post('/logout',                                  [AuthenticationController::class, 'logout'])->name('client.logout');

// Admin Auth:
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    // Admin - Dashboard:
    Route::get('/admin/dashboard',                      [DashboardController::class, 'index'])->name('dashboard');

    // Admin - Posts Categories:
    Route::prefix('categories')->name('categories.')->middleware('auth')->group(function() {
        Route::get('/',                                 [CategoryController::class, 'index'])->name('index');
        Route::get('/create',                           [CategoryController::class, 'create'])->name('create');
        Route::post('/',                                [CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit',                        [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}',                             [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}',                          [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Admin - Posts:
    Route::prefix('posts')->name('posts.')->middleware('auth')->group(function() {
        Route::get('/',                                 [AdminPostController::class, 'index'])->name('index');
        Route::get('/create',                           [AdminPostController::class, 'create'])->name('create');
        Route::post('/',                                [AdminPostController::class, 'store'])->name('store');
        Route::get('/{id}/edit',                        [AdminPostController::class, 'edit'])->name('edit');
        Route::put('/{id}',                             [AdminPostController::class, 'update'])->name('update');
        Route::get('/show/{id}',                        [AdminPostController::class, 'show'])->name('show');
        Route::delete('/{id}',                          [AdminPostController::class, 'destroy'])->name('destroy');
    });

    // Admin - Users:
    Route::prefix('users')->name('users.')->middleware('auth')->group(function() {
        Route::get('/',                                 [UserController::class, 'index'])->name('index');
        Route::get('/create',                           [UserController::class, 'create'])->name('create');
        Route::post('/',                                [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit',                        [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}',                             [UserController::class, 'update'])->name('update');
        Route::get('/show/{id}',                        [UserController::class, 'show'])->name('show');
        Route::delete('/{id}',                          [UserController::class, 'destroy'])->name('destroy');
    });
});
