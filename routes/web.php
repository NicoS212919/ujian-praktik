<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Models\Services;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
// Route::get('/services', [PageController::class, 'services'])->name('services');
Route::resource('/services', ServicesController::class);

Route::resource('/contact', ContactController::class);



Auth::routes();

