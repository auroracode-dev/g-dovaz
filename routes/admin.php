<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteInitController;
use App\Http\Controllers\UserController;

/* Login */
Route::get('/', function () {
    return view('admin.login');
});

Route::post('/', [LoginController::class, "login"])->name('login');

Route::post('/logout', [LoginController::class, 'logout']);

// Admin routes
Route::get('/dashboard', [SiteInitController::class,'view'])->middleware('auth');

Route::put('/site-init/{site_init}', [SiteInitController::class, 'update'])->name('site_init')->middleware('auth');

Route::resource('/posts', PostController::class)->only(['index', 'create', 'edit'])->middleware('auth');

Route::resource('/gallery', GalleryController::class)->only(['index', 'create', 'edit'])->middleware('auth');

Route::resource('/products', ProductController::class)->only(['index', 'create', 'edit'])->middleware('auth');
Route::get('/products/download/{product}', [ProductController::class, 'download'])->middleware('auth')->name('products.download');

// User config
Route::get('/perfil', [UserController::class, 'index'])->middleware('auth');
Route::get('/change-password', [UserController::class, 'change_password'])->middleware('auth');

Route::put('/perfil/{user}', [UserController::class, 'update'])->middleware('auth')->name('perfil.update');
Route::put('/change_password/{user}', [UserController::class, 'update_password'])->middleware('auth')->name('perfil.update_password');
