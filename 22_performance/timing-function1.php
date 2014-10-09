<?php

// create a long nonsense string
$long_str = uniqid(php_uname('a'), true);

// start timing from here
$start = microtime(true);

// function to test
$md5 = md5($long_str);

$elapsed = microtime(true) - $start;

echo "That took $elapsed seconds.\n";
