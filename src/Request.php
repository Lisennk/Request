<?php

namespace Lisennk\Request;

/**
 * Class Request provides single way to access data passed both via HTTP/CLI
 *
 * @package Lisennk\Request
 */
class Request
{
    /**
     * CLI options cache
     *
     * @var array
     */
    private $cliOptions = [];

    /**
     * Returns HTTP/CLI request value associated with $key
     *
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $this->getCliOption($key);
    }

    /**
     * Returns HTTP/CLI request value associated with $key,
     * or $placeholder if key does not exists
     *
     * @param $key
     * @param mixed $placeholder
     * @return mixed|bool
     */
    public function input($key, $placeholder = false)
    {
        if ($this->has($key)) {
            return $this->__get($key);
        } else {
            return $placeholder;
        }
    }

    /**
     * True if $key exists, false if not
     *
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return $this->__get($key) ? true : false;
    }

    /**
     * False if $key exists, true if not.
     * Inversion of has() method.
     *
     * @param $key
     * @return bool
     */
    public function hasnt($key)
    {
        return $this->has($key) ? false : true;
    }

    /**
     * Returns CLI request value associated with $key
     *
     * @see http://php.net/manual/en/function.getopt.php
     * @param $key
     * @return mixed
     */
    private function getCliOption($key)
    {
        if (empty($this->cliOptions[$key])) {
            $this->cliOptions[$key] = getopt('', [$key . ':'])[$key];
        }
        return $this->cliOptions[$key];
    }
}