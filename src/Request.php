<?php

namespace Lisennk\Request;

use Lisennk\Request\Interfaces\RequestInterface;
use Lisennk\Request\Requests\CliRequest;
use Lisennk\Request\Requests\HttpRequest;

/**
 * Class Request
 * @package Lisennk\Request
 */
class Request
{
    /**
     * @var RequestInterface
     */
    static private $provider;

    /**
     * @return RequestInterface
     */
    static public function instance()
    {
        if (!self::$provider) {
            $cli = new CliRequest();
            $http = new HttpRequest();
            self::$provider = $http->notEmpty() ? $http : $cli;
        }

        return self::$provider;
    }

    /**
     * Returns request value by its key
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        $request = self::instance();
        return $request->input($key);
    }

    /**
     * Static interface to access request methods such as input or has
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    static public function __callStatic($name, $arguments)
    {
        $request = self::instance();
        return $request->$name(...$arguments);
    }

    /**
     * Interface to access request methods such as input or has
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $request = self::instance();
        return $request->$name(...$arguments);
    }
}