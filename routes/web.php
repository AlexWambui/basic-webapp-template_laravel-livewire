<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Profile\Index as Profile;
use App\Livewire\Pages\Dashboard\Index as Dashboard;
use App\Livewire\Pages\General\Index as HomePage;
use App\Livewire\Pages\General\About as AboutPage;
use App\Livewire\Pages\General\Contact\Index as ContactPage;
use App\Livewire\Pages\ContactMessages\Index as ContactMessages;
use App\Livewire\Pages\Users\Index as Users;

Route::get('/', HomePage::class)->name('home-page');
Route::get('about', AboutPage::class)->name('about-page');
Route::get('contact', ContactPage::class)->name('contact-page');

Route::middleware(['auth'])->group(function() {
    Route::get('profile', Profile::class)->name('profile.edit');
});

Route::middleware(['authenticated_user'])->group(function() {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

Route::middleware(['admin_only'])->group(function() {
    Route::get('users', Users::class)->name('users.index');

    Route::get('contact-messages', ContactMessages::class)->name('contact-messages.index');
});

require __DIR__.'/auth.php';
