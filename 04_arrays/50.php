<?php
// make a four-element array
$array = array('apple', 'banana', 'coconut', 'dates');

// shrink to three elements
array_splice($array, 3);

// remove last element, equivalent to array_pop()
array_splice($array, -1);

// only remaining fruits are apple and banana
print_r($array);
