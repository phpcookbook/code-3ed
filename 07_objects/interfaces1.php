<?php
interface Nameable {
    public function getName();
    public function setName($name);
}

class Book implements Nameable {
    private $name;

    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        return $this->name = $name;
    }
}
