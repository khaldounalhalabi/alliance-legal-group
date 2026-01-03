<?php

namespace App\Providers;

use App\Models\ContactPageContent;
use App\Services\PageTitleResolver;
use App\Services\v1\ContactPageContent\ContactPageContentService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PageTitleResolver::class, function ($app) {
            return new PageTitleResolver;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('cache') && Schema::hasTable('contact_page_contents')) {
            /** @var Collection<ContactPageContent>|ContactPageContent[] $data */
            [$address, $email, $phone, , $lng, $lat] = ContactPageContentService::make()->getContactInfo();

            View::share('lng', $lng);
            View::share('lat', $lat);
            View::share('address', $address);
            View::share('phone', $phone);
            View::share('email', $email);
        }

        // Share the page title resolver with all views
        View::composer('*', function ($view) {
            $view->with('pageTitle', app(PageTitleResolver::class)->getTitle());
        });
    }
}
