<?php
$number = 31415.92653; // your number
list($int, $dec) = explode('.', $number);
// $formatted is 31,415.92653
$formatted = number_format($number, strlen($dec));
