<?php

use App\Http\Controllers\Show;
use App\Livewire\Browse;
use Illuminate\Support\Facades\Route;

Route::get('/', Browse::class)->name('browse');
//Route::get('/{article:slug}', Show::class)->name('show');
Route::get('/{post}', Show::class)->name('show');
