<?php
class Person {
    // list person and email as valid properties
    protected $__data = array('person', 'email');

    public function __get($property) {
        if (isset($this->__data[$property])) {
            return $this->__data[$property];
        } else {
            return false;
        }
    }

    // enforce the restriction of only setting 
    // pre-defined properties
    public function __set($property, $value) {
        if (isset($this->__data[$property])) {
            return $this->__data[$property] = $value;
        } else {
            return false;
        }
    }
}
