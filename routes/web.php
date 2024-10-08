<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'home'])->name('upload.form');
Route::post('/upload-image', [HomeController::class, 'upload']);