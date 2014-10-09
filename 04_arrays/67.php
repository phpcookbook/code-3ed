<?php
$array = array(1, '2', 'three');

in_array(0, $array);        // true!
in_array(0, $array, true);  // false
in_array(1, $array);        // true
in_array(1, $array, true);  // true
in_array(2, $array);        // true
in_array(2, $array, true);  // false
