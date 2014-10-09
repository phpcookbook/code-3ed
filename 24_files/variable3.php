<?php
$fh = fopen('books.txt','r') or die("can't open: $php_errormsg");
while (! feof($fh)) {
    list($title,$author,$publication_year) = fgetcsv($fh, 1000, '|');
    // ... do something with the data ... 
}
fclose($fh) or die("can't close: $php_errormsg");
