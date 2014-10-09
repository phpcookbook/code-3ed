<?php
class Person {
    // Rest of class here

    public function __toString() {
        return "$this->name <$this->email>";
    }
}
