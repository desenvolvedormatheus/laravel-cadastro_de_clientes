<?php

use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('dashboard', [VendasController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::get('create', [VendasController::class, 'create'])
->middleware(['auth', 'verified'])
->name('create');

Route::post('store', [VendasController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('store');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';
