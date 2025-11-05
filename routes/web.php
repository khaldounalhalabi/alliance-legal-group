<?php

use App\Http\Controllers\SetLocaleController;
use App\Http\Middleware\AcceptedLanguagesMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('/locale', [SetLocaleController::class, 'setLanguage'])
    ->middleware('web')
    ->withoutMiddleware([AcceptedLanguagesMiddleware::class])
    ->name('set-locale');

Route::view('/', 'index')->name('index');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
