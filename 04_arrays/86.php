<?php
function u_length($a, $b) {
    $a = strlen($a);
    $b = strlen($b);

    if ($a == $b) return  0;
    if ($a  > $b) return  1;
                  return -1;
}

function map_length($a) {
    return strlen($a);
}

$tests = array('one', 'two', 'three', 'four', 'five',
               'six', 'seven', 'eight', 'nine', 'ten');

// faster for < 5 elements using u_length()
usort($tests, 'u_length');

// faster for >= 5 elements using map_length()
$tests = array_sort($tests, 'map_length');
