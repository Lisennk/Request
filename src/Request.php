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
}