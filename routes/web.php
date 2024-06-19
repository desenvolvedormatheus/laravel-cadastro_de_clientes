<?php

use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [VendasController::class, 'index'])->name('dashboard');
    Route::resource('vendas', VendasController::class)->except(['show']);
});

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';
