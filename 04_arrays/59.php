<?php
$string = '';

foreach ($fields as $key => $value) {
    // don't include password
    if ('password' != $key) {
        $string .= ",<b>$value</b>";
    }
}

$string = substr($string, 1); // remove leading ","
