<?php

namespace App\Providers;

use App\Faker\FakeLongHTMLContentProvider;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class, function ($app) {
            $locale = $app['config']->get('app.faker_locale', 'en_US');
            $faker = Factory::create($locale);
            $faker->addProvider(new FakeLongHTMLContentProvider($faker));

            return $faker;
        });

        $this->app->bind(
            Generator::class.':'.$this->app['config']->get('app.faker_locale', 'en_US'),
            Generator::class,
        );
    }
}
