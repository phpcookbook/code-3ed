<?php
$string = '';
foreach ($fields as $key => $value) {
    // don't include password
    if ('password' != $value) {
        if (!empty($string)) { $string .= ','; }
        $string .= "<b>$value</b>";
    }
}
