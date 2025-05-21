<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Dashboard\Index as Dashboard;

Route::middleware(['auth'])->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

require __DIR__.'/auth.php';
