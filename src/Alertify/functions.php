<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package laravel-alertify
 */

if (!function_exists('alertify')) {
    /**
     * Arrange for an alert message.
     *
     * @param string|null $message
     *
     * @return \odannyc\Alertify\AlertifyNotifier
     */
    function alertify($message = null)
    {
        $notifier = app('odannyc.alertify');
        if (!is_null($message)) {
            return $notifier->standard($message);
        }
        return $notifier;
    }
}
