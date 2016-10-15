<?php

use Lisennk\Request\Request;

class HttpRequestTest extends \PHPUnit\Framework\TestCase
{
    public function testInput()
    {
        $key = 'key';
        $value = 'value';

        $_REQUEST['key'] = $value;

        $this->assertEquals($value, Request::instance()->input($key));
    }

    public function testNullInput()
    {
        $this->assertEquals(null, Request::instance()->input('KeyThatNotExist'));
    }

    public function testHas()
    {
        $key = 'key';
        $value = 'value';

        $_REQUEST['key'] = $value;

        $this->assertEquals(true, Request::instance()->has($key));
    }

    public function testHasnt()
    {
        $this->assertEquals(false, Request::instance()->has('KeyThatNotExist'));
    }

    public function testHasValue()
    {
        $key = 'key';
        $value = 'value';

        $_REQUEST['key'] = $value;

        $this->assertEquals(true, Request::instance()->has($key, $value));
    }

    public function testNotEmpty()
    {
        $key = 'key';
        $value = 'value';

        $_REQUEST['key'] = $value;

        $this->assertEquals(true, Request::instance()->notEmpty());
    }

    public function testMagicGet()
    {
        $key = 'key';
        $value = 'value';

        $_REQUEST['key'] = $value;

        $this->assertEquals($value, (new Request())->key);
    }

    public function testMagicCall()
    {
        $this->assertEquals(false, (new Request())->has('RandomKey'));
    }

    public function testMagicStaticCall()
    {
        $key = 'key';
        $value = 'value';

        $_REQUEST['key'] = $value;

        $this->assertEquals(true, Request::has($key));
    }
}