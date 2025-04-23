<?php

declare(strict_types=1);

use App\Livewire\Public\Suggestions\Index as SuggestionsIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', SuggestionsIndex::class)->name('home.index');
