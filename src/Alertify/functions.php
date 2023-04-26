<?php
/**
 *  @author Panchani Ankit <panchania83@gmail.com>
 * @package laravel-alertify
 */

if (!function_exists('alertify')) {
    /**
     * Arrange for an alert message.
     *
     * @param string|null $message
     *
     * @return \panchania83\Alertify\AlertifyNotifier
     */
    function alertify($message = null)
    {
        $notifier = app('panchania83.alertify');
        if (!is_null($message)) {
            return $notifier->standard($message);
        }
        return $notifier;
    }
}
