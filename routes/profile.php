<?php

use App\Http\Controllers\Profile\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'view'])->name('view');
