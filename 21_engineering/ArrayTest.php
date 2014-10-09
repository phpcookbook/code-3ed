<?php
class ArrayTest extends PHPUnit_Framework_TestCase
{
    function testArrayFlip()
    {
        $array = array('foo' => 'bar', 'cheese' => 'hotdog');
        $flipped = array_flip($array);
        $this->assertEquals('foo', reset($flipped));
    }

    function testArrayPop()
    {
        $array = array('foo' => 'bar', 'cheese' => 'hotdog');
        $popped = array_pop($array);
        $this->assertEquals('hotdog', $popped);
        $this->assertEquals(1, sizeof($array));
    }
}
