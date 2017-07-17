<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package laravel-alertify
 */

namespace odannyc\Alertify;

use Illuminate\Support\Facades\Facade;

class Alertify extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'odannyc.alertify';
    }
}
