<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages\General\HomePage;

use App\Livewire\Pages\Dashboards\Index as Dashboard;

Route::get('/', HomePage::class)->name('home-page');

Route::middleware(['authenticated_user'])->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

require __DIR__.'/auth.php';
