<?php

use App\Livewire\Browse;
use App\Livewire\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', Browse::class)->name('browse');
Route::get('/{article:slug}', Show::class)->name('show');
