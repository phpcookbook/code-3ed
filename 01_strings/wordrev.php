<?php

$s = "Once upon a time there was a turtle.";
// break the string up into words
$words = explode(' ',$s);
// reverse the array of words
$words = array_reverse($words);
// rebuild the string
$s = implode(' ',$words);
print $s;
