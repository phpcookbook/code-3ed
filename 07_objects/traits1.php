<?php
trait NameTrait {
    private $name;

    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        return $this->name = $name;
    }
}

class Book {
    use NameTrait;
}

class Child {
    use NameTrait;
}
