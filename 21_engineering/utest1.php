<?php

class StrReplaceTest extends PHPUnit_Framework_TestCase
{
    public function testStrReplaceWorks()
    {
        $str = 'Hello, all!';
        $this->assertEquals('Hello, world!', str_replace('all', 'world', $str));
    }
}
