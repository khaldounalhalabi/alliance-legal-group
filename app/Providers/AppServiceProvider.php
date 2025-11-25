<?php

namespace App\Providers;

use App\Enums\ContactUsContentKeyEnum;
use App\Models\ContactPageContent;
use App\Services\PageTitleResolver;
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
            return new PageTitleResolver();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('cache') && Schema::hasTable('contact_page_contents')) {
            /** @var Collection<ContactPageContent>|ContactPageContent[] $data */
            $data = cache()->remember(
                ContactPageContent::CACHE_KEY,
                now()->addYear(),
                fn() => ContactPageContent::all(),
            );

            $address = $data->firstWhere('key', ContactUsContentKeyEnum::ADDRESS->value);
            $phone = $data->firstWhere('key', ContactUsContentKeyEnum::PHONE->value);

            View::share('address', $address);
            View::share('phone', $phone);
        }

        // Share the page title resolver with all views
        View::composer('*', function ($view) {
            $view->with('pageTitle', app(PageTitleResolver::class)->getTitle());
        });
    }
}
