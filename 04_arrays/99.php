<?php
$names = array('firstnames' => array("Baba", "Bill"),
               'lastnames'  => array("O'Riley", "O'Reilly"));

array_walk_recursive($names, function (&$value, $key) {
    $value = htmlentities($value, ENT_QUOTES);
});
               
foreach ($names as $nametypes) {
    foreach ($nametypes as $name) {
        print "$name\n";
    }
}
