<?php

use App\Http\Controllers\WEB\v1;
use Illuminate\Support\Facades\Route;

Route::get('/v1/dashboard/me', [v1\BaseAuthController::class, 'userDetails'])->name('v1.web.protected.me');
Route::put('/v1/dashboard/me', [v1\BaseAuthController::class, 'updateUserDetails'])->name('v1.web.protected.me.update');
Route::get('/v1/dashboard/logout', [v1\BaseAuthController::class, 'logout'])->name('v1.web.protected.logout');

Route::inertia('/v1/dashboard/', 'dashboard/index')->name('v1.web.protected.index');

Route::get('/v1/about-us-contents/data', [v1\AboutUsContentController::class, 'data'])->name('v1.web.protected.about.us.contents.data');
Route::resource('/v1/about-us-contents', v1\AboutUsContentController::class)
    ->only([
        'index',
        'edit',
        'update'
    ])->names('v1.web.protected.about.us.contents');
