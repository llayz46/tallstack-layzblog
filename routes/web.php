<?php

use App\Livewire\Browse;
use Illuminate\Support\Facades\Route;

Route::get('/', Browse::class)->name('browse');
