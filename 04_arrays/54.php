<?php
$lc = array('a', 'b' => 'b'); // lower-case letters as values
$uc = array('A', 'b' => 'B'); // upper-case letters as values
$ac = array_merge($lc, $uc);  // all-cases?
print_r($ac);
