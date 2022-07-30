<?php

declare(strict_types = 1);

namespace NeueCommerce\LaravelAddresses;

use Illuminate\Support\ServiceProvider;

class AddressesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerResources();

        $this->offerPublishing();
    }

    public function register()
    {
        $this->configure();
    }

    private function configure(): void
    {
        $this->mergeConfigFrom(
            realpath(__DIR__.'/../config/laravel-addresses.php'), 'neue.laravel-addresses'
        );
    }

    private function registerResources(): void
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(
                realpath(__DIR__.'/../database/migrations')
            );
        }
    }

    private function offerPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                realpath(__DIR__.'/../database/migrations') => $this->app->databasePath('migrations'),
            ], ['neue', 'laravel-addresses', 'migrations']);

            $this->publishes([
                realpath(__DIR__.'/../config/laravel-addresses.php') => $this->app->configPath('neue/laravel-addresses.php'),
            ], ['neue', 'laravel-addresses', 'config']);
        }
    }
}
