<?php
function array_to_comma_string($array) {

    switch (count($array)) {
    case 0:
        return '';

    case 1:
        return reset($array);
    
    case 2:
        return join(' and ', $array);

    default:
        $last = array_pop($array);
        return join(', ', $array) . ", and $last";
    }
}
