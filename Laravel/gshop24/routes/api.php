<?php

use App\Http\Controllers\APIs\AllProductController;
use App\Http\Controllers\APIs\MainController;
use App\Http\Controllers\APIs\MenuController;
use App\Http\Controllers\APIs\PageController;
use App\Http\Controllers\APIs\ProductController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Home page
Route::get('sliders', [MainController::class, 'sliderShow']);
Route::get('page/{id}', [PageController::class, 'page']);
Route::get('categories', [MainController::class, 'index']);

#products
Route::get('product/{id}', [ProductController::class, 'product']);

#shop
Route::get('all-product', [AllProductController::class, 'index']);
Route::get('category/{id}', [MenuController::class, 'index']);
