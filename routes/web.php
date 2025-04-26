<?php

declare(strict_types=1);

use App\Livewire\Public\Suggestions\Index as SuggestionsIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', SuggestionsIndex::class)->name('home.index');

// NOTE: Authentication routes.
Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login.index')->name('login');
    Route::view('/register', 'auth.register.index')->name('register');
});
