<?php
$two  = bi_from_str('2');
$four = bi_add($two, $two);
// Use bi_to_str() to get strings from big_int resources
print bi_to_str($four); // prints 4

// Computing large factorials very quickly
$factorial = bi_fact(20);
