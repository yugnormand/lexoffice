<?php

namespace Todocoding\Lexoffice;

use Illuminate\Support\ServiceProvider;

class LexofficeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/lexoffice.php' => config_path('lexoffice.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('lexoffice', function () {
            return new lexoffice();
        });
    }
}
