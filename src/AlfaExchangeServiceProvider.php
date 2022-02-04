<?php

namespace AlfaExchange\Api;

use AlfaExchange\Api\Commands\AlfaExchangeLatestCommand;
use Carbon\Laravel\ServiceProvider;

/**
 * Class AlfaExchangeServiceProvider
 * @package AlfaExchange\Api
 */
class AlfaExchangeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('AlfaExchange', function () {
            return new AlfaExchangeService();
        });

        $this->app->alias('AlfaExchange', AlfaExchangeService::class);

        $this->commands([
            AlfaExchangeLatestCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/alfaexchange.php' => config_path('alfaexchange.php'),
        ]);
    }
}
