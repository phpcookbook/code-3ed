<?php

function &array_find_value($needle, &$haystack) {
    foreach ($haystack as $key => $value) {
        if ($needle == $value) {
            return $haystack[$key];
        }
    }
}

$minnesota = array('Bob Dylan', 'F. Scott Fitzgerald',
                   'Prince', 'Charles Schultz');

$prince =& array_find_value('Prince', $minnesota);

$prince = 'O(+>'; // The ASCII version of Prince's unpronounceable symbol

print_r($minnesota);
