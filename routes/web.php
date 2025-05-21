<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Dashboard\Index as Dashboard;
use App\Livewire\Pages\General\Index as HomePage;
use App\Livewire\Auth\Profile\Index as Profile;

Route::get('/', HomePage::class)->name('home-page');

Route::middleware(['auth'])->group(function() {
    Route::get('profile', Profile::class)->name('profile.edit');
});

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

require __DIR__.'/auth.php';
