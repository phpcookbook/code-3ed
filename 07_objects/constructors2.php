<?php
class user {
  public $username;

  function __construct($username, $password) { 
     if ($this->validate_user($username, $password)) {
       $this->username = $username;
     }
  }
}

$user = new user('Grif', 'Mistoffelees'); // using built-in constructor
