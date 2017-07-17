<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package laravel-alertify
 */

namespace odannyc\Alertify;

use Illuminate\Session\Store;

class AlertifyNotifier
{
    /**
     * An array of Logs
     * @var array $logs
     */
    private $logs = [];

    /**
     * The session class used to store sessions
     * @var Store
     */
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function flash()
    {
        $this->session->flash('odannyc.alertify.alert', $this->logs);
    }

    public function __call($name, $arguments)
    {
        $log = new Log();
        $log->$name(...$arguments);
        $this->logs[] = $log;

        return $log;
    }
}
