<?php

use App\Http\Livewire\Profile\ProfileDashboard;
use App\Http\Livewire\Profile\ProfileMessage;
use App\Http\Livewire\Profile\ProfileSettings;
use Illuminate\Support\Facades\Route;

Route::get('/', ProfileDashboard::class)->name('view');
Route::get('settings', ProfileSettings::class)->name('settings');
Route::get('message', ProfileMessage::class)->name('message');
