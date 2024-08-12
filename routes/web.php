<?php

use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Middleware\AdminMiddleware;

use Illuminate\Support\Facades\Route;

// Client Views:
Route::get('/',                                         [PostController::class, 'index'])->name('client.home');
Route::get('/categories/{id}',                          [PostController::class, 'categories'])->name('client.category');
Route::get('/author/{id}',                              [PostController::class, 'author'])->name('client.author');
Route::get('/show/{id}',                                [PostController::class, 'show'])->name('client.show');

// Client - Login - Register:
// Display View:
Route::get('/login',                                    [AuthenticationController::class, 'displayLogin'])->name('client.login');
Route::get('/register',                                 [AuthenticationController::class, 'displayRegister'])->name('client.register');

// Login & Register:
Route::post('/login',                                   [AuthenticationController::class, 'login']);
Route::post('/register',                                [AuthenticationController::class, 'register']);

// Logout:
Route::post('/logout',                                  [AuthenticationController::class, 'logout'])->name('client.logout');

// Forgot Password:
Route::get('forgot-password',                           [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password',                          [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}',                    [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password',                           [ResetPasswordController::class, 'reset'])->name('password.update');

// Admin Auth:
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    // Admin - Dashboard:
    Route::get('/dashboard',                            [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/chart',                                [DashboardController::class, 'chart'])->name('chart');

    // Admin - Posts Categories:
    Route::prefix('categories')->name('categories.')->group(function() {
        Route::get('/',                                 [CategoryController::class, 'index'])->name('index');
        Route::get('/create',                           [CategoryController::class, 'create'])->name('create');
        Route::post('/',                                [CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit',                        [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}',                             [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}',                          [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Admin - Posts:
    Route::prefix('posts')->name('posts.')->group(function() {
        Route::get('/',                                 [AdminPostController::class, 'index'])->name('index');
        Route::get('/create',                           [AdminPostController::class, 'create'])->name('create');
        Route::post('/',                                [AdminPostController::class, 'store'])->name('store');
        Route::get('/{post}/edit',                      [AdminPostController::class, 'edit'])->name('edit');
        Route::put('/{post}',                           [AdminPostController::class, 'update'])->name('update');
        Route::get('/show/{post}',                      [AdminPostController::class, 'show'])->name('show');
        Route::delete('/{post}',                        [AdminPostController::class, 'destroy'])->name('destroy');
    });

    // Admin - Users:
    Route::prefix('users')->name('users.')->group(function() {
        Route::get('/',                                 [UserController::class, 'index'])->name('index');
        Route::get('/create',                           [UserController::class, 'create'])->name('create');
        Route::post('/',                                [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit',                        [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}',                             [UserController::class, 'update'])->name('update');
        Route::get('/show/{id}',                        [UserController::class, 'show'])->name('show');
        Route::delete('/{id}',                          [UserController::class, 'destroy'])->name('destroy');
    });
});
