<?php

namespace Lisennk\Request\Requests;

use Lisennk\Request\Interfaces\RequestInterface;

/**
 * Class CliRequest represents data passed via command agruments
 */
class CliRequest implements RequestInterface
{
    /**
     * @var array
     */
    private $input;

    /**
     * @param $key
     * @param mixed $placeholder
     * @return mixed
     */
    public function input($key, $default = null)
    {
        if (empty($this->input[$key])) $this->input[$key] = getopt('', [$key . ':'])[$key];
        return $this->input[$key] ? $this->input[$key] : $placeholder;
    }

    /**
     * True if $key exists, false if not
     * If $value passed, returns true if $key's value are the same as $value
     *
     * @param $key
     * @param $value
     * @return bool
     */
    public function has($key, $value = null)
    {
        if ($value) {
            return $this->input($key) == $value ? true : false;
        }

        return $this->input($key) ? true : false;
    }

    /**
     * True if request has any input
     *
     * @return bool
     */
    public function notEmpty()
    {
        return isset($argv);
    }
}












