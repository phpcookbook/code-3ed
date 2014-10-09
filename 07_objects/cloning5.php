<?php
class Person {
 // ... everything from before
 public function __clone() { 
  $this->address = clone $this->address;
 }
}
