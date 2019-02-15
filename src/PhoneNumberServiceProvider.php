<?php

namespace Viecngay\PhoneNumber;

use Illuminate\Support\ServiceProvider;

class PhoneNumberServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'viecngay');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'viecngay');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/phonenumber.php', 'phonenumber');

        // Register the service the package provides.
        $this->app->singleton('phonenumber', function ($app) {
            return new PhoneNumber;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['phonenumber'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/phonenumber.php' => config_path('phonenumber.php'),
        ], 'phonenumber.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/viecngay'),
        ], 'phonenumber.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/viecngay'),
        ], 'phonenumber.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/viecngay'),
        ], 'phonenumber.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
