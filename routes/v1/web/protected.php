<?php

use App\Http\Controllers\WEB\v1;
use Illuminate\Support\Facades\Route;

Route::get('/v1/dashboard/me', [v1\BaseAuthController::class, 'userDetails'])->name('v1.web.protected.me');
Route::put('/v1/dashboard/me', [v1\BaseAuthController::class, 'updateUserDetails'])->name('v1.web.protected.me.update');
Route::get('/v1/dashboard/logout', [v1\BaseAuthController::class, 'logout'])->name('v1.web.protected.logout');

Route::inertia('/v1/dashboard/', 'dashboard/index')->name('v1.web.protected.index');

Route::get('/v1/about-us-contents/data',
    [v1\AboutUsContentController::class, 'data'])->name('v1.web.protected.about.us.contents.data');
Route::resource('/v1/about-us-contents', v1\AboutUsContentController::class)
    ->only([
        'index',
        'edit',
        'update',
    ])->names('v1.web.protected.about.us.contents');

Route::get('/v1/team-members/data',
    [v1\TeamMemberController::class, 'data'])->name('v1.web.protected.team.members.data');
Route::resource('/v1/team-members', v1\TeamMemberController::class)->names('v1.web.protected.team.members');

Route::get('/v1/testimonials/data',
    [v1\TestimonialController::class, 'data'])->name('v1.web.protected.testimonials.data');
Route::resource('/v1/testimonials', v1\TestimonialController::class)->names('v1.web.protected.testimonials');

Route::get('/v1/messages/data', [v1\MessageController::class, 'data'])->name('v1.web.protected.messages.data');
Route::resource('/v1/messages', v1\MessageController::class)
    ->only([
        'index',
        'show',
        'destroy',
    ])->names('v1.web.protected.messages');

Route::get('/v1/contact-page-contents/data',
    [v1\ContactPageContentController::class, 'data'])->name('v1.web.protected.contact.page.contents.data');
Route::resource('/v1/contact-page-contents', v1\ContactPageContentController::class)
    ->only([
        'index',
        'show',
        'edit',
        'update',
    ])->names('v1.web.protected.contact.page.contents');

Route::get('/v1/categories/data', [v1\CategoryController::class, 'data'])->name('v1.web.protected.categories.data');
Route::resource('/v1/categories', v1\CategoryController::class)->names('v1.web.protected.categories');

Route::get('/v1/services/data', [v1\ServiceController::class, 'data'])->name('v1.web.protected.services.data');
Route::resource('/v1/services', v1\ServiceController::class)->names('v1.web.protected.services');
