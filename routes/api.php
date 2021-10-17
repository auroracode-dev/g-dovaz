<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Gallery */
Route::apiResource('gallery', GalleryController::class)->except(['index']);
/* Posts */
Route::apiResource('posts', PostController::class)->except(['index']);
/* Products */
Route::apiResource('products', ProductController::class)->except(['index']);
