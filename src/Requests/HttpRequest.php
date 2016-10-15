<?php

namespace Lisennk\Request\Requests;

use Lisennk\Request\Interfaces\RequestInterface;

/**
 * Class HttpRequest represents input passed via HTTP (POST, GET, COOKIE)
 */
class HttpRequest implements RequestInterface
{
    /**
     * @var array
     */
    private $input;

    /**
     * HttpRequest constructor: set up request input
     */
    public function __construct()
    {
        $this->input = $_REQUEST;
    }

    /**
     * Returns data by its key or $default if not found
     *
     * @param $key
     * @param mixed $default
     * @return mixed
     */
    public function input($key, $default = null)
    {
        return isset($this->input[$key]) ? $this->input[$key] : $default;
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
        return !empty($this->input);
    }
}