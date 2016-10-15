<?php

namespace Lisennk\Request;

use Lisennk\Request\Interfaces\RequestInterface;
use Lisennk\Request\Requests\CliRequest;
use Lisennk\Request\Requests\HttpRequest;

/**
 * Class Request
 * @package Lisennk\Request
 */
class Request implements RequestInterface
{
    /**
     * @var RequestInterface
     */
    public $provider;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $cli = new CliRequest();
        $http = new HttpRequest();
        $this->provider = $http->notEmpty() ? $http : $cli;
    }

    /**
     * Returns request data by its $key
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->provider->input($key);
    }

    /**
     * Returns data by its key or $default if not found
     *
     * @param $key
     * @param $default
     * @return mixed
     */
    public function input($key, $default)
    {
        return $this->provider->input($key, $default);
    }

    /**
     * True if $key exists, false if not
     *
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return $this->provider->has($key);
    }

    /**
     * True if there is any data
     *
     * @return bool
     */
    public function notEmpty()
    {
        return $this->provider->notEmpty();
    }
}