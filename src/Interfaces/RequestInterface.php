<?php

namespace Lisennk\Request\Interfaces;

/**
 * Interface RequestInterface
 * @package Lisennk\Request\Interfaces
 */
interface RequestInterface
{
    public function input($key, $default = null);
    public function has($key, $value = null);
    public function notEmpty();
}