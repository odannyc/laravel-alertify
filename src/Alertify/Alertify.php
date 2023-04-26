<?php
/**
 * @author Panchani Ankit <panchania83@gmail.com>
 * @package laravel-alertify
 */

namespace panchania83\Alertify;

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
        return 'panchania83.alertify';
    }
}
