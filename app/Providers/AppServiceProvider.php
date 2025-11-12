<?php

namespace App\Providers;

use App\Enums\ContactUsContentKeyEnum;
use App\Models\ContactPageContent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /** @var Collection<ContactPageContent>|ContactPageContent[] $data */
        $data = cache()->remember(
            ContactPageContent::CACHE_KEY,
            now()->addYear(),
            fn() => ContactPageContent::all()
        );

        $address = $data->firstWhere('key', ContactUsContentKeyEnum::ADDRESS->value);
        $phone = $data->firstWhere('key', ContactUsContentKeyEnum::PHONE->value);

        View::share('address', $address);
        View::share('phone', $phone);
    }
}
