<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
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

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('category/{category:slug}', [CategoryController::class, 'view'])->name('category.page');

Route::get('product/{product:slug}', [ProductController::class, 'view'])->name('product.page');

Route::get('{page:slug}', [PageController::class, 'view'])->name('front.page');
