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
    public function input($key, $placeholder = null)
    {
        if (empty($this->input[$key])) $this->input[$key] = getopt('', [$key . ':'])[$key];
        return $this->input[$key] ? $this->input[$key] : $placeholder;
    }

    /**
     * True if $key exists, false if not
     *
     * @param $key
     * @return bool
     */
    public function has($key)
    {
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












