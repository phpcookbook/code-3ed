<?php
$names = array('firstname' => "Baba",
               'lastname'  => "O'Riley");
               
array_walk($names, function (&$value, $key) {
    $value = htmlentities($value, ENT_QUOTES);
});

foreach ($names as $name) {
    print "$name\n";
}
