<?php
function __autoload($class_name) {
    include "$class_name.php";
}

$person = new Person;
