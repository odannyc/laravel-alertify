<?php
/**
 * @author Danny Carrillo <odannycx@gmail.com>
 * @package laravel-alertify
 */

namespace odannyc\Alertify;

class Log
{
    /**
     * The message of the alert log
     * @var string $message
     */
    public $message;

    /**
     * The delay in milliseconds to keep the alert shown
     * @var int $delay
     */
    public $delay = 4000;

    /**
     * Close the alert on click?
     * @var bool $clickToClose
     */
    public $clickToClose = false;

    /**
     * The type of alert this is, this can be:
     * log, success, error or
     * @var string $type
     */
    public $type = 'log';

    /**
     * The position of the alert
     * @var string $position
     */
    public $position = 'top right';

    /**
     * The parent that the alert is attached to.
     *
     * @var string $parent
     */
    public $parent = 'document.body';

    /**
     * Sets a standard alert
     *
     * @param string $message The standard alert
     * @return Log
     */
    public function standard(?string $message = null): Log
    {
        if (!is_null($message)) {
            $this->message = $message;
        }
        $this->type = 'log';
        Alertify::flash();
        return $this;
    }

    /**
     * Sets a success message.
     *
     * @param string $message The success message
     * @return Log
     */
    public function success(?string $message = null): Log
    {
        if (!is_null($message)) {
            $this->message = $message;
        }
        $this->type = 'success';
        Alertify::flash();
        return $this;
    }

    /**
     * Sets an error message.
     *
     * @param string $message The error message
     * @return Log
     */
    public function error(?string $message = null): Log
    {
        if (!is_null($message)) {
            $this->message = $message;
        }
        $this->type = 'error';
        Alertify::flash();
        return $this;
    }

    /**
     * Sets the delay of the alert.
     *
     * @param int $time The time delay in milliseconds
     * @return Log
     */
    public function delay(int $time): Log
    {
        $this->delay = $time;
        Alertify::flash();
        return $this;
    }

    /**
     * Sets the position of the alert.
     *
     * @param string $position The position of the alert
     * @throws \Exception
     * @return Log
     */
    public function position(string $position): Log
    {
        $acceptablePositions = [
            'top right',
            'top left',
            'bottom right',
            'bottom left'
        ];

        if (array_search(strtolower($position), $acceptablePositions) === false) {
            $acceptablePositions = implode(', ', $acceptablePositions);
            throw new \Exception("position can only be: ${acceptablePositions}");
        }

        $this->position = $position;
        Alertify::flash();
        return $this;
    }

    /**
     * Sets click to close to true
     *
     * @return Log
     */
    public function clickToClose(): Log
    {
        $this->clickToClose = true;
        Alertify::flash();
        return $this;
    }

    /**
     * Makes the log message persistent
     *
     * @return Log
     */
    public function persistent(): Log
    {
        $this->delay = 0;
        Alertify::flash();
        return $this;
    }

    /**
     * Sets the parent of the log/alert.
     * This is usually an HTML element
     *
     * @param string $element
     * @return Log
     */
    public function attach(string $element): Log
    {
        $this->parent = $element;
        return $this;
    }
}
