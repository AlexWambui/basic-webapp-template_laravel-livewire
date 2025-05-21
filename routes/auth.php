<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Signup;

Route::middleware(['guest'])->group(function() {
    Route::get('login', Login::class)->name('login');
    Route::get('signup', Signup::class)->name('signup');
});
