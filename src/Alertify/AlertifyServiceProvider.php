<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package laravel-alertify
 */

namespace odannyc\Alertify;

use Illuminate\Support\ServiceProvider;

class AlertifyServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('odannyc.alertify', function () {
            return $this->app->make('odannyc\Alertify\AlertifyNotifier');
        });
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'alertify');
    }
}
