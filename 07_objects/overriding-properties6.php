<?php
class Person {
    // list person and email as valid properties
    protected $data = array('person', 'email');

    public function __get($property) {
        if (isset($this->data[$property])) {
            return $this->data[$property];
        } else {
            return null;
        }
    }

    // enforce the restriction of only setting 
    // pre-defined properties
    public function __set($property, $value) {
        if (isset($this->data[$property])) {
            $this->data[$property] = $value;
        }
    }

    public function __isset($property) {
        return isset($this->data[$property]);
    }

    public function __unset($property) {
        if (isset($this->data[$property])) {
            unset($this->data[$property]);
        }
    }
}
