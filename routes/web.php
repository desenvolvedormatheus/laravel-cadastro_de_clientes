<?php

use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('listagem', [VendasController::class, 'index'])->name('listagem');
    Route::resource('vendas', VendasController::class)->except(['show']);

    Route::get('analitico', [VendasController::class, 'index'])->name('analitico');
});

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';
