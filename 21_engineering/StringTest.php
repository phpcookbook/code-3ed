<?php
class StringTest extends PHPUnit_Framework_TestCase
{
    function testStrReplace()
    {
        $str = 'Hello, all!';
        $this->assertEquals('Hello, world!', str_replace('all', 'world', $str));
    }

    function testSubstr()
    {
        $str = 'Hello, all!';
        $this->assertEquals('e', substr($str, 1, 1));
    }
}
