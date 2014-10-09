<?php
$delim = '|';

$fh = fopen('books.txt','r') or die("can't open: $php_errormsg");
while (! feof($fh)) {
    $fields = fgetcsv($fh, 1000, $delim);
    // ... do something with the data ... 
    print_r($fields);
}
fclose($fh) or die("can't close: $php_errormsg");
