<?php
function array_find_value($needle, &$haystack) {
    foreach ($haystack as $key => $value) {
        if ($needle == $value) {
            return $key;
        }
    }
}

$minnesota = array('Bob Dylan', 'F. Scott Fitzgerald',
                   'Prince', 'Charles Schultz');

$prince = array_find_value('Prince', $minnesota);
// The ASCII version of Prince's unpronounceable symbol
$minnesota[$prince] = 'O(+>'; 
