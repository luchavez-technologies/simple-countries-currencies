<?php

namespace Luchavez\SimpleCountriesCurrencies\Providers;

use Luchavez\SimpleCountriesCurrencies\Services\SimpleCountriesCurrencies;
use Luchavez\StarterKit\Abstracts\BaseStarterKitServiceProvider;

/**
 * Class SimpleCountriesCurrenciesServiceProvider
 *
 * @author James Carlo Luchavez <jamescarloluchavez@gmail.com>
 */
class SimpleCountriesCurrenciesServiceProvider extends BaseStarterKitServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        // Register the service the package provides.
        $this->app->singleton('simple-countries-currencies', function ($app) {
            return new SimpleCountriesCurrencies();
        });

        parent::register();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['simple-countries-currencies'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../../config/simple-countries-currencies.php' => config_path('simple-countries-currencies.php'),
        ], 'simple-countries-currencies.config');
    }

    /**
     * @param  bool  $is_api
     * @return array
     */
    public function getDefaultRouteMiddleware(bool $is_api): array
    {
        return []; // All routes in this package should be public by default
    }
}
