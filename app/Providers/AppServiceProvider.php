<?php

namespace App\Providers;

use App\Enums\AboutUsKeyEnum;
use App\Models\AboutUsContent;
use App\Models\Category;
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

            /**
             * @var Collection<Category>|Category[] $categories
             */
            $categories = cache()->remember(Category::CACHE_KEY, now()->addYear(), fn () => Category::all());

            /** @var Collection<AboutUsContent> $about */
            $about = cache()->remember(AboutUsContent::CACHE_KEY, now()->addYear(), fn () => AboutUsContent::all());

            /** @var AboutUsContent $aboutFooter */
            $aboutFooter = $about->firstWhere('type', AboutUsKeyEnum::ABOUT_US_FOOTER->value);

            View::share('lng', $lng);
            View::share('lat', $lat);
            View::share('address', $address);
            View::share('phone', $phone);
            View::share('email', $email);
            View::share('categories', $categories);
            View::share('aboutFooter', $aboutFooter);
        }

        // Share the page title resolver with all views
        View::composer('*', function ($view) {
            $view->with('pageTitle', app(PageTitleResolver::class)->getTitle());
        });
    }
}
