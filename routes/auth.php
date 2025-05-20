<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;

Route::middleware(['guest'])->group(function() {
    Route::get('login', Login::class)->name('login');
});
