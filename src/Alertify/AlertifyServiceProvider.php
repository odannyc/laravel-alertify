<?php
/**
 * @author Panchani Ankit <panchania83@gmail.com>
 * @package laravel-alertify
 */

namespace panchania83\Alertify;

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
        $this->app->singleton('panchania83.alertify', function () {
            return $this->app->make('panchania83\Alertify\AlertifyNotifier');
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
