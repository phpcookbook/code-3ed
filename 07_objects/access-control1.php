<?php
class Person {
    public $name;     // accesible anywhere
    protected $age;   // accesible within the class and child classes
    private $salary;  // accesible only within this specific class

    public function __construct() {
    // ...
    }

    protected function set_age() {
    // ...
    }

    private function set_salary() {
    // ...
    }
}
