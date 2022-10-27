<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
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
Route::name('product.')->group(function() {
    Route::get('/products', [ProductController::class,'index'])->name('index');
    Route::get('/products/filter', [ProductController::class,'getByCategory'])->name('getByCategory');
    Route::get('/products/filterByPrice', [ProductController::class,'getByPrice'])->name('getByPrice');
});
Route::name('categories.')->group(function() {
    Route::get('/categories', [CategoryController::class,'index'])->name('index');
});
