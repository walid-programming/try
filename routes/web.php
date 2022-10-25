<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class,'index'])->name('all');
Route::name('product.')->group(function() {
    Route::get('/create', [ProductController::class,'create'])->name('create');
    Route::post('/create', [ProductController::class,'store'])->name('store');
});
Route::get('/cat/{categoryId}', [FilterController::class,'filter'])->name('filter');
