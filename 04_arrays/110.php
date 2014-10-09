<?php
class FakeArray implements ArrayAccess {

    private $elements;
    
    public function __construct() {
        $this->elements = array();
    }
    
    public function offsetExists($offset) {
        return isset($this->elements[$offset]);
    }

    public function offsetGet($offset) {
        return $this->elements[$offset];
    }
    
    public function offsetSet($offset, $value) {
        return $this->elements[$offset] = $value;
    }
    
    public function offsetUnset($offset) {
        unset($this->elements[$offset]);
    }
}
