<?php
class Person {
    public $name;
    protected $spouse;
    private $password;
    
    public function __construct($name) {
        $this->name = $name
    }

    public function getName() {
        return $name;
    }

    protected function setSpouse(Person $spouse) {
        if (!isset($this->spouse)) { 
            $this->spouse = $spouse;
        }
    }

    private function setPassword($password) {
        $this->password = $password;
    }
}
