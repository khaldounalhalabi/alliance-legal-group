<?php

use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\AcceptedLanguagesMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('/locale', [SetLocaleController::class, 'setLanguage'])
    ->middleware('web')
    ->withoutMiddleware([AcceptedLanguagesMiddleware::class])
    ->name('set-locale');

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contactUs'])->name('contact');
Route::post('/contact/send-message', [SiteController::class, 'sendMessage'])->name('contact.send.message');
