<?php

namespace TLE;

use Illuminate\Support\ServiceProvider;
use \TLESender;

class TLEServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadTranslationsFrom(

            __DIR__ . '/lang',

            'tle'

        );

        $configPath = __DIR__ . '/config/tle.php';

        $this->publishes([

            $configPath => config_path(

                'tle.php'

            )],

            'tle-config'
        );

    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('tle', function () {

            return new TLESender;

        });

    }

}
