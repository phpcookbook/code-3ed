<?php
class Person {
    public function __call($method, $arguments) {
            if (method_exists($this->address, $method)) {
                return call_user_func_array(
                    array($this->address, $method), $arguments);
            }
    }
}