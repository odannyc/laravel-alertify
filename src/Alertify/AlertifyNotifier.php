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

    /**
     * AlertifyNotifier constructor.
     *
     * @param Store $session
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Saves a flash to the session
     *
     * @return void
     */
    public function flash(): void
    {
        $this->session->flash('odannyc.alertify.logs', $this->logs);
    }

    /**
     * Any request that comes in gets stored as a log
     * and then the log gets returned
     *
     * @param $name
     * @param $arguments
     *
     * @return Log
     */
    public function __call($name, $arguments): Log
    {
        $log = new Log();
        $this->logs[] = $log;
        $log->$name(...$arguments);

        return $log;
    }
}
