<?php

use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('web.pages.home');
// })->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('web.pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('web.pages.contact');
})->name('contact');

Route::get('/galery', [GaleryController::class, 'index'])->name('galery');
Route::get('/cars', [\App\Http\Controllers\CarController::class, 'index'])->name('cars.index');
