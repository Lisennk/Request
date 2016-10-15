<?php

namespace Lisennk\Request\Interfaces;

/**
 * Interface RequestInterface
 * @package Lisennk\Request\Interfaces
 */
interface RequestInterface
{
    public function input($key, $placeholder);
    public function has($key);
    public function notEmpty();
}